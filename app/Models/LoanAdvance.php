<?php
// app/Models/LoanAdvance.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanAdvance extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'loans_advances';

    protected $fillable = [
        'staff_id', 'type', 'reference_no', 'amount', 'interest_rate',
        'repayment_months', 'monthly_repayment', 'balance', 'approval_date',
        'first_repayment_date', 'purpose', 'attachment', 'status',
        'approved_by', 'approved_at', 'rejection_reason', 'created_by'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'interest_rate' => 'decimal:2',
        'monthly_repayment' => 'decimal:2',
        'balance' => 'decimal:2',
        'approval_date' => 'date',
        'first_repayment_date' => 'date',
        'approved_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Relationships
    public function staff()
    {
        return $this->belongsTo(StaffRecord::class, 'staff_id');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function repaymentSchedule()
    {
        return $this->hasMany(LoanRepaymentSchedule::class, 'loan_id');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    // Accessors
    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => 'warning',
            'approved' => 'info',
            'active' => 'success',
            'completed' => 'secondary',
            'defaulted' => 'danger',
        ];
        $color = $badges[$this->status] ?? 'secondary';
        return "<span class='badge bg-{$color}'>{$this->status}</span>";
    }
}
