<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Mirrors App\Models\Studenthouse exactly: primaryKey is studentid, so a
 * student has at most one club record at a time (overwritten across terms
 * via updateOrCreate keyed on studentid), matching how House selection
 * already behaves in this app.
 */
class StudentClub extends Model
{
    use HasFactory;

    protected $table = "studentclubs";
    protected $primaryKey = "studentid";

    protected $fillable = [
        'studentid',
        'clubid',
        'termid',
        'sessionid',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'studentid');
    }

    public function club()
    {
        return $this->belongsTo(Club::class, 'clubid');
    }

    public function term()
    {
        return $this->belongsTo(Schoolterm::class, 'termid');
    }

    public function session()
    {
        return $this->belongsTo(Schoolsession::class, 'sessionid');
    }
}