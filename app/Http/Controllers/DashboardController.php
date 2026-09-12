<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Schoolclass;
use App\Models\Subject;
use App\Models\Schoolterm;
use App\Models\Schoolsession;
use App\Models\Studentclass;
use App\Models\Exam;
use App\Models\AttendanceSummary;
use App\Models\AttendanceTermSetting;
use App\Models\SchoolBill;
use App\Models\SchoolPayment;
use App\Models\Broadsheets;
use App\Models\Subjectclass;
use App\Models\ClassTeacher;
use App\Models\StudentAttendance;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:dashboard', ['only' => ['index']]);
    }

    public function index(Request $request)
    {
        $pagetitle = "School Analytics Dashboard";

        // ============================================================
        // TERM / SESSION SELECTOR
        // All terms, all sessions for dropdowns
        // ============================================================
        $allTerms    = Schoolterm::orderBy('id')->get();
        $allSessions = Schoolsession::orderByDesc('id')->get();

        // Resolve selected term/session (default = current active ones)
        $currentTerm    = Schoolterm::where('status', true)->first()
                       ?? $allTerms->last();
        $currentSession = Schoolsession::where('status', 'Current')->first()
                       ?? $allSessions->first();

        $selectedTermId    = (int) $request->input('term_id',    $currentTerm?->id    ?? 0);
        $selectedSessionId = (int) $request->input('session_id', $currentSession?->id ?? 0);

        $selectedTerm    = Schoolterm::find($selectedTermId)    ?? $currentTerm;
        $selectedSession = Schoolsession::find($selectedSessionId) ?? $currentSession;

        // ============================================================
        // POPULATION STATS (session-wide, not term-filtered)
        // ============================================================
        $currentMonth   = Carbon::now()->startOfMonth();
        $previousMonth  = Carbon::now()->subMonth()->startOfMonth();

        $total_population = Student::count();
        $previous_population = Student::where('created_at', '<', $currentMonth)
            ->where('created_at', '>=', $previousMonth)->count();
        $population_percentage = $previous_population > 0
            ? number_format((($total_population - $previous_population) / $previous_population) * 100, 2)
            : ($total_population > 0 ? 100.00 : 0.00);

        $gender_counts = Student::groupBy('gender')
            ->selectRaw('gender, COUNT(*) as gender_count')
            ->pluck('gender_count', 'gender')
            ->toArray();
        $gender_counts = [
            'Male'   => $gender_counts['Male']   ?? 0,
            'Female' => $gender_counts['Female'] ?? 0,
        ];

        $status_counts = Student::groupBy('statusId')
            ->selectRaw("CASE WHEN statusId=1 THEN 'Old Student' WHEN statusId=2 THEN 'New Student' ELSE 'Other' END as student_status, COUNT(*) as student_count")
            ->pluck('student_count', 'student_status')->toArray();
        $status_counts = [
            'Old Student' => $status_counts['Old Student'] ?? 0,
            'New Student' => $status_counts['New Student'] ?? 0,
        ];

        // ============================================================
        // STUDENTS ENROLLED IN SELECTED SESSION/TERM
        // ============================================================
        $students_in_selected_term = 0;
        $students_by_class         = [];

        if ($selectedSession && $selectedTerm) {
            $students_in_selected_term = Studentclass::where('sessionid', $selectedSession->id)
                ->where('termid', $selectedTerm->id)
                ->distinct('studentId')->count('studentId');

            $students_by_class = Studentclass::with(['schoolclass', 'schoolclass.armRelation'])
                ->where('sessionid', $selectedSession->id)
                ->where('termid', $selectedTerm->id)
                ->select('schoolclassid', DB::raw('count(*) as total'))
                ->groupBy('schoolclassid')
                ->get()
                ->map(fn($item) => [
                    'class_name' => $item->schoolclass?->schoolclass ?? 'N/A',
                    'arm'        => $item->schoolclass?->armRelation?->arm ?? '',
                    'total'      => $item->total,
                ])
                ->sortByDesc('total')
                ->take(10)
                ->values()
                ->toArray();
        }

        // ============================================================
        // STAFF STATS
        // ============================================================
        $staff_count = User::whereHas('roles', fn($q) =>
            $q->whereIn('name', ['staff', 'teacher', 'admin'])
        )->count();

        $staff_by_role = User::with('roles')
            ->whereHas('roles', fn($q) => $q->whereIn('name', ['staff', 'teacher', 'admin']))
            ->get()
            ->groupBy(fn($u) => $u->roles->first()->name ?? 'Unknown')
            ->map(fn($g) => $g->count())
            ->toArray();

        // ============================================================
        // CLASS / SUBJECT STATS
        // ============================================================
        $total_classes  = Schoolclass::count();
        $total_subjects = Subject::count();

        // Classes with arm details
        $classes_with_arms = Schoolclass::with(['armRelation'])
            ->leftJoin('schoolarm', 'schoolarm.id', '=', 'schoolclass.arm')
            ->select(['schoolclass.*', 'schoolarm.arm as arm_label'])
            ->get()
            ->map(fn($c) => [
                'id'         => $c->id,
                'class_name' => $c->schoolclass,
                'arm'        => $c->arm_label ?? '',
            ])
            ->toArray();

        // Class capacity utilization (selected session)
        $class_capacity_data = Schoolclass::withCount([
                'studentCurrentTerms as student_count' => fn($q) =>
                    $selectedSession ? $q->where('sessionId', $selectedSession->id) : $q
            ])
            ->leftJoin('schoolarm', 'schoolarm.id', '=', 'schoolclass.arm')
            ->select(['schoolclass.*', 'schoolarm.arm as arm_label'])
            ->get()
            ->map(function ($class) {
                $capacity    = $class->capacity ?? 40;
                $utilization = $capacity > 0
                    ? round(($class->student_count / $capacity) * 100, 1) : 0;
                return [
                    'class_name'  => $class->schoolclass,
                    'arm'         => $class->arm_label ?? '',
                    'students'    => $class->student_count,
                    'capacity'    => $capacity,
                    'utilization' => $utilization,
                ];
            })
            ->sortByDesc('students')
            ->values()
            ->toArray();

        // ============================================================
        // ACADEMIC PERFORMANCE (selected term + session)
        // ============================================================
        $academic_performance  = [];
        $top_students          = [];
        $subject_performance   = [];
        $grade_distribution    = [];
        $class_performance     = [];

        if (class_exists(Broadsheets::class) && $selectedTerm && $selectedSession) {

            // Average score per class + arm
            $academic_performance = Broadsheets::where('broadsheets.term_id', $selectedTerm->id)
                ->join('broadsheet_records', 'broadsheet_records.id', '=', 'broadsheets.broadsheet_record_id')
                ->where('broadsheet_records.session_id', $selectedSession->id)
                ->join('schoolclass', 'schoolclass.id', '=', 'broadsheet_records.schoolclass_id')
                ->leftJoin('schoolarm', 'schoolarm.id', '=', 'schoolclass.arm')
                ->select(
                    'broadsheet_records.schoolclass_id',
                    'schoolclass.schoolclass as class_name',
                    'schoolarm.arm as arm_name',
                    DB::raw('AVG(broadsheets.total) as avg_score'),
                    DB::raw('MAX(broadsheets.total) as max_score'),
                    DB::raw('MIN(broadsheets.total) as min_score'),
                    DB::raw('COUNT(DISTINCT broadsheet_records.student_id) as student_count')
                )
                ->groupBy('broadsheet_records.schoolclass_id', 'schoolclass.schoolclass', 'schoolarm.arm')
                ->get()
                ->map(fn($item) => [
                    'class_name'    => $item->class_name ?? 'N/A',
                    'arm'           => $item->arm_name ?? '',
                    'avg_score'     => round($item->avg_score, 1),
                    'max_score'     => round($item->max_score, 1),
                    'min_score'     => round($item->min_score, 1),
                    'student_count' => $item->student_count,
                    'label'         => trim(($item->class_name ?? '') . ' ' . ($item->arm_name ?? '')),
                ])
                ->sortBy('class_name')
                ->values()
                ->toArray();

            // Top 10 performing students with class, arm, grade details
            $top_students = Broadsheets::where('broadsheets.term_id', $selectedTerm->id)
                ->join('broadsheet_records', 'broadsheet_records.id', '=', 'broadsheets.broadsheet_record_id')
                ->where('broadsheet_records.session_id', $selectedSession->id)
                ->join('studentRegistration', 'studentRegistration.id', '=', 'broadsheet_records.student_id')
                ->join('schoolclass', 'schoolclass.id', '=', 'broadsheet_records.schoolclass_id')
                ->leftJoin('schoolarm', 'schoolarm.id', '=', 'schoolclass.arm')
                ->select(
                    'broadsheet_records.student_id',
                    'broadsheet_records.schoolclass_id',
                    'schoolclass.schoolclass as class_name',
                    'schoolarm.arm as arm_name',
                    'studentRegistration.firstname',
                    'studentRegistration.lastname',
                    'studentRegistration.admissionNo as admission_no',
                    DB::raw('AVG(broadsheets.total) as avg_score'),
                    DB::raw('SUM(broadsheets.cum) as total_cum'),
                    DB::raw('COUNT(DISTINCT broadsheet_records.subject_id) as subject_count')
                )
                ->groupBy(
                    'broadsheet_records.student_id',
                    'broadsheet_records.schoolclass_id',
                    'schoolclass.schoolclass',
                    'schoolarm.arm',
                    'studentRegistration.firstname',
                    'studentRegistration.lastname',
                    'studentRegistration.admissionNo'
                )
                ->orderByDesc('avg_score')
                ->limit(10)
                ->get()
                ->map(fn($item) => [
                    'student_id'   => $item->student_id,
                    'name'         => $item->firstname . ' ' . $item->lastname,
                    'admission_no' => $item->admission_no,
                    'class'        => $item->class_name ?? 'N/A',
                    'arm'          => $item->arm_name ?? '',
                    'average'      => round($item->avg_score, 1),
                    'total_cum'    => round($item->total_cum, 1),
                    'subject_count'=> $item->subject_count,
                    'grade'        => $this->calculateGrade((float)$item->avg_score),
                ])
                ->toArray();

            // Subject performance with teacher info - FIXED: Convert teachers to arrays
            $subject_performance = Broadsheets::where('broadsheets.term_id', $selectedTerm->id)
                ->join('broadsheet_records', 'broadsheet_records.id', '=', 'broadsheets.broadsheet_record_id')
                ->where('broadsheet_records.session_id', $selectedSession->id)
                ->join('subject', 'subject.id', '=', 'broadsheet_records.subject_id')
                ->select(
                    'broadsheet_records.subject_id',
                    'subject.subject as subject_name',
                    DB::raw('AVG(broadsheets.total) as avg_score'),
                    DB::raw('MAX(broadsheets.total) as max_score'),
                    DB::raw('MIN(broadsheets.total) as min_score'),
                    DB::raw('COUNT(*) as total_entries'),
                    DB::raw('SUM(CASE WHEN broadsheets.total >= 40 THEN 1 ELSE 0 END) as passed')
                )
                ->groupBy('broadsheet_records.subject_id', 'subject.subject')
                ->get()
                ->map(function ($item) use ($selectedSession, $selectedTerm) {
                    // Get teacher(s) for this subject - convert to array explicitly
                    $teachers = DB::table('subjectteacher as st')
                        ->join('subjectclass as sc', 'sc.subjectteacherid', '=', 'st.id')
                        ->join('users', 'users.id', '=', 'st.staffid')
                        ->where('st.subjectid', $item->subject_id)
                        ->select('users.id', 'users.name', 'users.avatar')
                        ->distinct()
                        ->limit(3)
                        ->get()
                        ->map(function($teacher) {
                            // Convert each teacher to an array
                            return [
                                'id' => $teacher->id,
                                'name' => $teacher->name,
                                'avatar' => $teacher->avatar
                            ];
                        })
                        ->toArray(); // Convert the collection to an array

                    $passRate = $item->total_entries > 0
                        ? round(($item->passed / $item->total_entries) * 100, 1) : 0;

                    return [
                        'subject_id'   => $item->subject_id,
                        'subject_name' => $item->subject_name,
                        'avg_score'    => round($item->avg_score, 1),
                        'max_score'    => round($item->max_score, 1),
                        'min_score'    => round($item->min_score, 1),
                        'pass_rate'    => $passRate,
                        'total_entries'=> $item->total_entries,
                        'teachers'     => $teachers, // Now this is an array, not stdClass objects
                    ];
                })
                ->sortByDesc('avg_score')
                ->values()
                ->toArray();

            // Grade distribution
            $grade_distribution = $this->getGradeDistribution($selectedTerm, $selectedSession);
        }

        // ============================================================
        // BEST PERFORMING TEACHERS
        // Teacher score = average of their students' scores in their subjects
        // ============================================================
        $top_teachers = $this->getTopTeachers($selectedTerm, $selectedSession);

        // ============================================================
        // ATTENDANCE STATS — per class, arm
        // ============================================================
        $overall_attendance_rate = 0;
        $attendance_by_class     = [];
        $attendance_trend        = [];

        if (class_exists(AttendanceSummary::class) && $selectedTerm && $selectedSession) {
            // Overall rate
            $att = AttendanceSummary::where('term_id', $selectedTerm->id)
                ->where('session_id', $selectedSession->id)
                ->selectRaw('SUM(days_present) as total_present, SUM(total_school_days) as total_days')
                ->first();

            if ($att && $att->total_days > 0) {
                $overall_attendance_rate = round(($att->total_present / $att->total_days) * 100, 1);
            }

            // Attendance by class + arm
            $attendance_by_class = AttendanceSummary::where('attendance_summaries.term_id', $selectedTerm->id)
                ->where('attendance_summaries.session_id', $selectedSession->id)
                ->join('schoolclass', 'schoolclass.id', '=', 'attendance_summaries.schoolclass_id')
                ->leftJoin('schoolarm', 'schoolarm.id', '=', 'schoolclass.arm')
                ->select(
                    'attendance_summaries.schoolclass_id',
                    'schoolclass.schoolclass as class_name',
                    'schoolarm.arm as arm_name',
                    DB::raw('SUM(attendance_summaries.days_present) as total_present'),
                    DB::raw('SUM(attendance_summaries.total_school_days) as total_days'),
                    DB::raw('COUNT(DISTINCT attendance_summaries.student_id) as student_count'),
                    DB::raw('SUM(attendance_summaries.days_absent) as total_absent'),
                    DB::raw('SUM(attendance_summaries.days_late) as total_late')
                )
                ->groupBy(
                    'attendance_summaries.schoolclass_id',
                    'schoolclass.schoolclass',
                    'schoolarm.arm'
                )
                ->get()
                ->map(fn($row) => [
                    'class_name'    => $row->class_name ?? 'N/A',
                    'arm'           => $row->arm_name ?? '',
                    'label'         => trim(($row->class_name ?? '') . ' ' . ($row->arm_name ?? '')),
                    'student_count' => $row->student_count,
                    'rate'          => $row->total_days > 0
                        ? round(($row->total_present / $row->total_days) * 100, 1) : 0,
                    'total_present' => $row->total_present,
                    'total_absent'  => $row->total_absent,
                    'total_late'    => $row->total_late ?? 0,
                    'total_days'    => $row->total_days,
                ])
                ->sortByDesc('rate')
                ->values()
                ->toArray();

            // Attendance trend — last 30 recorded days (deduplicated dates)
            if (class_exists(StudentAttendance::class)) {
                $attendance_trend = StudentAttendance::where('term_id', $selectedTerm->id)
                    ->where('session_id', $selectedSession->id)
                    ->select(
                        'attendance_date',
                        DB::raw('SUM(CASE WHEN status="present" OR status="late" THEN 1 ELSE 0 END) as present_count'),
                        DB::raw('SUM(CASE WHEN status="absent" THEN 1 ELSE 0 END) as absent_count'),
                        DB::raw('COUNT(*) as total')
                    )
                    ->groupBy('attendance_date')
                    ->orderBy('attendance_date')
                    ->limit(30)
                    ->get()
                    ->map(fn($r) => [
                        'date'          => Carbon::parse($r->attendance_date)->format('d M'),
                        'rate'          => $r->total > 0
                            ? round(($r->present_count / $r->total) * 100, 1) : 0,
                        'present_count' => $r->present_count,
                        'absent_count'  => $r->absent_count,
                    ])
                    ->toArray();
            }
        }

        // ============================================================
        // PAYMENT / FINANCE (selected session)
        // ============================================================
        $total_payments     = 0;
        $payment_percentage = 0;
        $pending_payments   = 0;
        $completed_payments = 0;
        $total_bills        = 0;
        $collection_rate    = 0;

        if (class_exists(SchoolPayment::class)) {
            $total_payments     = SchoolPayment::sum('amount_paid') ?? 0;
            $pending_payments   = SchoolPayment::where('status', 'pending')->count();
            $completed_payments = SchoolPayment::where('status', 'completed')->count();
        }
        if (class_exists(SchoolBill::class)) {
            $total_bills = SchoolBill::sum('amount') ?? 0;
        }
        $collection_rate = $total_bills > 0
            ? round(($total_payments / $total_bills) * 100, 1) : 0;

        // ============================================================
        // EXAM STATS
        // ============================================================
        $total_exams     = 0;
        $upcoming_exams  = 0;
        $completed_exams = 0;
        if (class_exists(Exam::class)) {
            $total_exams     = Exam::count();
            $upcoming_exams  = Exam::where('start_time', '>', Carbon::now())->count();
            $completed_exams = Exam::where('end_time', '<', Carbon::now())->count();
        }

        // ============================================================
        // ALL-TERM COMPARISON (for dropdown history graphs)
        // ============================================================
        $all_terms_performance = [];
        if (class_exists(Broadsheets::class) && $selectedSession) {
            foreach ($allTerms as $term) {
                $avgScore = Broadsheets::where('broadsheets.term_id', $term->id)
                    ->join('broadsheet_records', 'broadsheet_records.id', '=', 'broadsheets.broadsheet_record_id')
                    ->where('broadsheet_records.session_id', $selectedSession->id)
                    ->avg('broadsheets.total');

                $all_terms_performance[] = [
                    'term'      => $term->term,
                    'term_id'   => $term->id,
                    'avg_score' => round($avgScore ?? 0, 1),
                ];
            }
        }

        // ============================================================
        // ENROLLMENT TREND (monthly, last 12 months)
        // ============================================================
        $yearly_trends = [];
        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $yearly_trends[] = [
                'month'    => $month->format('M Y'),
                'students' => Student::whereYear('created_at', $month->year)
                    ->whereMonth('created_at', $month->month)->count(),
            ];
        }

        // ============================================================
        // RECENT ACTIVITIES
        // ============================================================
        $recent_activities = $this->getRecentActivities();

        // ============================================================
        // CLASS TEACHER MAP (for display)
        // ============================================================
        $class_teachers = [];
        if (class_exists(ClassTeacher::class) && $selectedTerm && $selectedSession) {
            $class_teachers = ClassTeacher::where('termid', $selectedTerm->id)
                ->where('sessionid', $selectedSession->id)
                ->join('schoolclass', 'schoolclass.id', '=', 'classteacher.schoolclassid')
                ->leftJoin('schoolarm', 'schoolarm.id', '=', 'schoolclass.arm')
                ->join('users', 'users.id', '=', 'classteacher.staffid')
                ->select(
                    'classteacher.schoolclassid',
                    'schoolclass.schoolclass as class_name',
                    'schoolarm.arm as arm_name',
                    'users.id as teacher_id',
                    'users.name as teacher_name',
                    'users.avatar as teacher_avatar'
                )
                ->get()
                ->map(fn($r) => [
                    'class_id'       => $r->schoolclassid,
                    'class_name'     => $r->class_name,
                    'arm'            => $r->arm_name ?? '',
                    'teacher_id'     => $r->teacher_id,
                    'teacher_name'   => $r->teacher_name,
                    'teacher_avatar' => $r->teacher_avatar,
                ])
                ->toArray();
        }

        return view('dashboards.dashboard', compact(
            'pagetitle',
            // Selectors
            'allTerms', 'allSessions', 'selectedTerm', 'selectedSession',
            'currentTerm', 'currentSession',
            // Population
            'total_population', 'population_percentage',
            'gender_counts', 'status_counts',
            // Enrollment
            'students_in_selected_term', 'students_by_class',
            // Staff
            'staff_count', 'staff_by_role',
            // Classes
            'total_classes', 'total_subjects',
            'classes_with_arms', 'class_capacity_data',
            // Academic
            'academic_performance', 'top_students',
            'subject_performance', 'grade_distribution',
            'all_terms_performance',
            // Teachers
            'top_teachers',
            // Attendance
            'overall_attendance_rate', 'attendance_by_class', 'attendance_trend',
            // Finance
            'total_payments', 'payment_percentage',
            'pending_payments', 'completed_payments',
            'total_bills', 'collection_rate',
            // Exams
            'total_exams', 'upcoming_exams', 'completed_exams',
            // Misc
            'recent_activities', 'yearly_trends',
            'class_teachers'
        ));
    }

    // =========================================================================
    // TOP TEACHERS — ranked by average student score in their subjects
    // =========================================================================
    private function getTopTeachers(?Schoolterm $term, ?Schoolsession $session): array
    {
        if (!$term || !$session || !class_exists(Broadsheets::class)) {
            return [];
        }

        // Simplified query to avoid closure issues
        $rows = DB::table('broadsheets')
            ->join('broadsheet_records', 'broadsheet_records.id', '=', 'broadsheets.broadsheet_record_id')
            ->where('broadsheets.term_id', $term->id)
            ->where('broadsheet_records.session_id', $session->id)
            ->join('subjectteacher', 'subjectteacher.subjectid', '=', 'broadsheet_records.subject_id')
            ->join('users', 'users.id', '=', 'subjectteacher.staffid')
            ->select(
                'users.id as teacher_id',
                'users.name as teacher_name',
                'users.avatar as teacher_avatar',
                DB::raw('AVG(broadsheets.total) as avg_score'),
                DB::raw('COUNT(DISTINCT broadsheet_records.subject_id) as subject_count'),
                DB::raw('COUNT(DISTINCT broadsheet_records.student_id) as student_count'),
                DB::raw('SUM(CASE WHEN broadsheets.total >= 40 THEN 1 ELSE 0 END) as passed'),
                DB::raw('COUNT(*) as total_entries'),
                DB::raw('MAX(broadsheets.total) as max_score')
            )
            ->groupBy('users.id', 'users.name', 'users.avatar')
            ->orderByDesc('avg_score')
            ->limit(8)
            ->get();

        return $rows->map(function ($row) use ($term, $session) {
            // Get subjects this teacher handles - convert to array
            $subjects = DB::table('subjectteacher')
                ->where('staffid', $row->teacher_id)
                ->join('subject', 'subject.id', '=', 'subjectteacher.subjectid')
                ->select('subject.subject')
                ->distinct()
                ->limit(4)
                ->pluck('subject')
                ->toArray(); // Ensure this is an array

            // Subjects taught in this term - convert to array
            $termSubjects = DB::table('broadsheet_records')
                ->where('broadsheet_records.session_id', $session->id)
                ->join('subjectteacher', 'subjectteacher.subjectid', '=', 'broadsheet_records.subject_id')
                ->where('subjectteacher.staffid', $row->teacher_id)
                ->join('broadsheets', 'broadsheets.broadsheet_record_id', '=', 'broadsheet_records.id')
                ->where('broadsheets.term_id', $term->id)
                ->join('subject', 'subject.id', '=', 'broadsheet_records.subject_id')
                ->select('subject.subject')
                ->distinct()
                ->limit(4)
                ->pluck('subject')
                ->toArray(); // Ensure this is an array

            $passRate = $row->total_entries > 0
                ? round(($row->passed / $row->total_entries) * 100, 1) : 0;

            return [
                'teacher_id'     => $row->teacher_id,
                'name'           => $row->teacher_name,
                'avatar'         => $row->teacher_avatar,
                'avg_score'      => round($row->avg_score, 1),
                'subject_count'  => $row->subject_count,
                'student_count'  => $row->student_count,
                'pass_rate'      => $passRate,
                'max_score'      => round($row->max_score, 1),
                'subjects'       => array_unique(array_merge($termSubjects, $subjects)),
            ];
        })->toArray();
    }

    // =========================================================================
    // GRADE DISTRIBUTION
    // =========================================================================
    private function getGradeDistribution(?Schoolterm $term, ?Schoolsession $session): array
    {
        if (!$term || !$session || !class_exists(Broadsheets::class)) return [];

        $grades = Broadsheets::where('broadsheets.term_id', $term->id)
            ->join('broadsheet_records', 'broadsheet_records.id', '=', 'broadsheets.broadsheet_record_id')
            ->where('broadsheet_records.session_id', $session->id)
            ->select('broadsheets.grade', DB::raw('count(*) as count'))
            ->groupBy('broadsheets.grade')
            ->pluck('count', 'grade')
            ->toArray();

        $gradeOrder = ['A1', 'B2', 'B3', 'C4', 'C5', 'C6', 'D7', 'E8', 'F9'];
        $result     = [];
        foreach ($gradeOrder as $grade) {
            $result[$grade] = $grades[$grade] ?? 0;
        }
        return $result;
    }

    // =========================================================================
    // GRADE HELPER
    // =========================================================================
    private function calculateGrade(float $score): string
    {
        if ($score >= 75) return 'A1';
        if ($score >= 70) return 'B2';
        if ($score >= 65) return 'B3';
        if ($score >= 60) return 'C4';
        if ($score >= 55) return 'C5';
        if ($score >= 50) return 'C6';
        if ($score >= 45) return 'D7';
        if ($score >= 40) return 'E8';
        return 'F9';
    }

    // =========================================================================
    // RECENT ACTIVITIES
    // =========================================================================
    private function getRecentActivities(): array
    {
        $activities = [];

        $recent_students = Student::orderBy('created_at', 'desc')->take(3)->get();
        foreach ($recent_students as $student) {
            $activities[] = [
                'type'        => 'student',
                'title'       => 'New Student Enrolled',
                'description' => $student->firstname . ' ' . $student->lastname . ' joined the school',
                'time'        => $student->created_at->diffForHumans(),
                'icon'        => 'ph-user-plus',
                'color'       => 'primary',
                'raw_time'    => $student->created_at->timestamp,
            ];
        }

        $recent_staff = User::whereHas('roles', fn($q) =>
            $q->whereIn('name', ['staff', 'teacher'])
        )->orderBy('created_at', 'desc')->take(2)->get();

        foreach ($recent_staff as $staff) {
            $activities[] = [
                'type'        => 'staff',
                'title'       => 'New Staff Member',
                'description' => $staff->name . ' joined as ' . ($staff->roles->first()->name ?? 'staff'),
                'time'        => $staff->created_at->diffForHumans(),
                'icon'        => 'ph-chalkboard-teacher',
                'color'       => 'success',
                'raw_time'    => $staff->created_at->timestamp,
            ];
        }

        usort($activities, fn($a, $b) => $b['raw_time'] - $a['raw_time']);
        return array_slice($activities, 0, 6);
    }
}
