<?php

use \App\Http\Controllers\SchoolInformationController;
use App\Http\Controllers\Admin\AdminScoreEntryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\PaymentGatewayController;
use App\Http\Controllers\Admin\ScholarshipController;
use App\Http\Controllers\Admin\SiblingGroupController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\Api\DeviceAttendanceController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceSettingController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\BroadsheetController;
use App\Http\Controllers\CBTController;
use App\Http\Controllers\ClassBroadsheetController;
use App\Http\Controllers\ClasscategoryController;
use App\Http\Controllers\ClassOperationController;
use App\Http\Controllers\ClassTeacherController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\CompulsorySubjectClassController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceUserMappingController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamPauseController;
use App\Http\Controllers\ExamTimetableController;
use App\Http\Controllers\Finance\PayrollController;
use App\Http\Controllers\Finance\StaffPaymentController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobStatusController;
use App\Http\Controllers\LiveAttendanceController;
use App\Http\Controllers\MockSubjectVettingController;
use App\Http\Controllers\MyClassController;
use App\Http\Controllers\MyMockSubjectVettingsController;
use App\Http\Controllers\MyPrincipalsCommentController;
use App\Http\Controllers\MyresultroomController;
use App\Http\Controllers\MyScoreSheetController;
use App\Http\Controllers\MySubjectController;
use App\Http\Controllers\MySubjectVettingsController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\Payment\EnhancedSchoolPaymentController;
use App\Http\Controllers\Payment\FlexibleOnlinePaymentController;
use App\Http\Controllers\Payment\OnlinePaymentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PrincipalsCommentController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\PromotionRuleTemplateController;
use App\Http\Controllers\PromotionSettingController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Reports\AnalysisReportController;
use App\Http\Controllers\Reports\FinancialReportController;
use App\Http\Controllers\Reports\ReminderController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SchoolArmController;
use App\Http\Controllers\SchoolBillController;
use App\Http\Controllers\SchoolBillTermSessionController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\SchoolHouseController;
use App\Http\Controllers\SchoolPaymentController;
use App\Http\Controllers\SchoolsessionController;
use App\Http\Controllers\SchooltermController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StaffAttendanceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffImageUploadController;
use App\Http\Controllers\StudentAssessmentController;
use App\Http\Controllers\StudentClassOperationsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentHouseController;
use App\Http\Controllers\StudentIdCardController;
use App\Http\Controllers\StudentImageUploadController;
use App\Http\Controllers\StudentPaymentController;
use App\Http\Controllers\StudentpersonalityprofileController;
use App\Http\Controllers\StudentResultsController;
use App\Http\Controllers\SubjectClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubjectOperationController;
use App\Http\Controllers\SubjectTeacherController;
use App\Http\Controllers\SubjectVettingController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\TimetableReportController;
use App\Http\Controllers\TranscriptController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewStudentController;
use App\Http\Controllers\ViewStudentMockReportController;
use App\Http\Controllers\ViewStudentReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Root & public utility routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/test-sibling-data/{id}', function ($id) {
    $group = DB::table('sibling_groups')->where('id', $id)->first();
    $students = DB::table('sibling_group_students')
        ->where('sibling_group_id', $id)
        ->join('studentRegistration', 'sibling_group_students.student_id', '=', 'studentRegistration.id')
        ->select('studentRegistration.id', 'studentRegistration.firstname', 'studentRegistration.lastname', 'studentRegistration.admissionNo')
        ->get();

    return response()->json([
        'group'         => $group,
        'students'      => $students,
        'student_count' => $students->count(),
    ]);
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

// CSRF refresh (used by the auto-refresh feature)
Route::get('/refresh-csrf', function () {
    if (request()->ajax()) {
        Session::regenerateToken();
        return response()->json(['csrf_token' => csrf_token()]);
    }
    return abort(404);
})->middleware('web')->name('refresh.csrf');

// Public ID card verification
Route::get('/student-id-cards/verify/{token}', [StudentIdCardController::class, 'verify'])
    ->name('student-id-cards.verify');

// Test/session helper routes — outside auth so they can be hit without a session
Route::get('/test-session-expired', function () {
    return redirect()->route('login')
        ->with('session_expired', true)
        ->with('error', 'Your session has expired. Please login again.')
        ->with('intended', url()->previous() ?? '/dashboard');
})->name('test.session.expired');

Route::get('/force-419', function () {
    if (auth()->check()) {
        auth()->logout();
    }
    session()->flush();
    session()->regenerate();

    return redirect()->route('login')
        ->with('session_expired', true)
        ->with('error', 'Your session has expired. Please login again.')
        ->with('intended', '/dashboard');
})->name('force.419');

/*
|--------------------------------------------------------------------------
| Public / Signed Routes
|--------------------------------------------------------------------------
| ICS calendar feed and webhooks MUST sit outside the auth group so
| signed URLs and third-party callbacks work without a logged-in session.
*/

// ICS calendar feed — public, verified via signed URL
Route::get('/timetable/ics/{teacherId}', [TimetableController::class, 'exportIcs'])
    ->name('timetable.ics')
    ->middleware('signed');

// Payment gateway webhooks — no CSRF, no auth
Route::prefix('webhook')->group(function () {
    Route::post('/paystack',    [FlexibleOnlinePaymentController::class, 'webhook'])->name('webhook.paystack');
    Route::post('/remita',      [FlexibleOnlinePaymentController::class, 'webhook'])->name('webhook.remita');
    Route::post('/flutterwave', [FlexibleOnlinePaymentController::class, 'webhook'])->name('webhook.flutterwave');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['auth']], function () {

    // ===================================================================
    // USER MANAGEMENT
    // ===================================================================
    Route::get('/users/all', [UserController::class, 'allUsers'])->name('users.all');
    Route::get('/users/paginate', [UserController::class, 'paginate'])->name('users.paginate');
    Route::get('/users/get-students', [UserController::class, 'getStudents'])->name('get.students');
    Route::get('/users/add-student', [UserController::class, 'createFromStudentForm'])->name('users.add-student-form');

    Route::post('/users/store-student', [UserController::class, 'storeStudent'])->name('users.store-student');
    Route::post('/users/mass-create-students', [UserController::class, 'massCreateStudents'])->name('users.mass-create-students');
    Route::post('/users/create-from-student', [UserController::class, 'createFromStudent'])->name('users.createFromStudent');

    Route::post('/users/revoke-student-password', [UserController::class, 'revokeStudentPassword'])->name('users.revoke-student-password');
    Route::post('/users/reset-single-password/{id}', [UserController::class, 'resetSingleStudentPassword'])->name('users.reset-single-password');

    Route::post('/users/get-student-credentials', [UserController::class, 'getStudentCredentials'])->name('users.get-student-credentials');
    Route::post('/users/bulk-reprint', [UserController::class, 'bulkReprintCredentials'])->name('users.bulk-reprint');

    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/staff/template', [UserController::class, 'generateStaffTemplate'])->name('users.staff.template');
    Route::post('/users/staff/import', [UserController::class, 'importStaffUsers'])->name('users.staff.import');

    Route::resource('users', UserController::class);


    // ===================================================================
    // ROLES & PERMISSIONS
    // ===================================================================
    Route::post('roles/bulk-remove-users', [RoleController::class, 'bulkRemoveUsers'])->name('roles.bulkremoveusers');
    Route::get('/roles/{role}/users', [RoleController::class, 'getRoleUsers'])->name('roles.users');
    Route::resource('roles', RoleController::class);

    Route::get('/user/overview/{id}', [UserController::class, 'show'])->name('users.overview');
    Route::get('/users/roles', [UserController::class, 'roles']);
    Route::resource('permissions', PermissionController::class);

    Route::get('/adduser/{id}', [RoleController::class, 'adduser'])->name('roles.adduser');
    Route::post('/updateuserrole', [RoleController::class, 'updateuserrole'])->name('roles.updateuserrole');
    Route::delete('roles/removeuserrole/{userid}/{roleid}', [RoleController::class, 'removeuserrole'])->name('roles.removeuserrole');

    // ===================================================================
    // DASHBOARD
    // ===================================================================
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/chart-data', [DashboardController::class, 'getChartData'])->name('chart-data');
        Route::get('/quick-stats', [DashboardController::class, 'getQuickStats'])->name('quick-stats');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ===================================================================
    // PROFILE & BIODATA
    // ===================================================================
    // Route::prefix('profile')->name('profile.')->group(function () {
    //     Route::get('/settings/{id}', [BiodataController::class, 'show'])->name('settings');

    //     Route::post('/update-info', [BiodataController::class, 'updateProfile'])->name('update-info');
    //     Route::post('/update-avatar', [BiodataController::class, 'updateAvatar'])->name('update-avatar');

    //     Route::post('/update-student-info', [BiodataController::class, 'updateStudentInfo'])->name('update-student-info');
    //     Route::post('/update-parent-info', [BiodataController::class, 'updateParentInfo'])->name('update-parent-info');

    //     Route::post('/update-employment-info', [BiodataController::class, 'updateEmploymentInfo'])->name('update-employment-info');
    //     Route::post('/add-qualification', [BiodataController::class, 'storeQualification'])->name('add-qualification');
    //     Route::post('/update-qualification/{id}', [BiodataController::class, 'updateQualification'])->name('update-qualification');
    //     Route::delete('/delete-qualification/{id}', [BiodataController::class, 'deleteQualification'])->name('delete-qualification');

    //     Route::post('/update-email', [BiodataController::class, 'ajaxemailupdate'])->name('update-email');
    //     Route::post('/update-password', [BiodataController::class, 'ajaxpasswordupdate'])->name('update-password');
    // });


    // ===================================================================
    // SPOTLIGHT SEARCH
    // ===================================================================
    // Route::get('/api/search', [SearchController::class, 'search'])->name('api.search');
});
