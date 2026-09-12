<?php
// app/Models/LoanRepaymentSchedule.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRepaymentSchedule extends Model
{
    use HasFactory;

    protected $table = 'loan_repayment_schedule';

    protected $fillable = [
        'loan_id', 'installment_no', 'due_date', 'amount', 'principal',
        'interest', 'status', 'paid_date', 'transaction_reference'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'principal' => 'decimal:2',
        'interest' => 'decimal:2',
        'due_date' => 'date',
        'paid_date' => 'date',
    ];

    // Relationships
    public function loan()
    {
        return $this->belongsTo(LoanAdvance::class, 'loan_id');
    }
}
