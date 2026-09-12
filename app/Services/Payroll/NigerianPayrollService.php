<?php
// app/Services/Payroll/NigerianPayrollService.php

namespace App\Services\Payroll;

use App\Models\StaffSalaryStructure;
use App\Models\PayrollPeriod;
use App\Models\PayrollRun;
use App\Models\StaffPayment;
use App\Services\Accounting\AccountingService;
use Illuminate\Support\Facades\DB;

class NigerianPayrollService
{
    protected $accountingService;

    // Nigerian Tax Brackets (FIRS)
    protected $taxBrackets = [
        ['up_to' => 300000, 'rate' => 0.07],
        ['up_to' => 600000, 'rate' => 0.11],
        ['up_to' => 1100000, 'rate' => 0.15],
        ['up_to' => 1600000, 'rate' => 0.19],
        ['up_to' => 3200000, 'rate' => 0.21],
        ['up_to' => PHP_INT_MAX, 'rate' => 0.24],
    ];

    const CRA_MINIMUM = 200000;
    const CRA_PERCENTAGE = 0.20;
    const EMPLOYEE_PENSION_RATE = 0.08;
    const EMPLOYER_PENSION_RATE = 0.10;
    const NHF_RATE = 0.025;
    const NSITF_RATE = 0.01;

    public function __construct(AccountingService $accountingService)
    {
        $this->accountingService = $accountingService;
    }

    /**
     * Calculate PAYE Tax
     */
    public function calculatePAYE($monthlyGrossPay)
    {
        $annualGrossPay = $monthlyGrossPay * 12;

        // Consolidated Relief Allowance
        $cra = max(self::CRA_MINIMUM, $annualGrossPay * self::CRA_PERCENTAGE);

        // Taxable Income
        $taxableIncome = max(0, $annualGrossPay - $cra);

        // Apply tax brackets
        $annualTax = 0;
        $remaining = $taxableIncome;
        $previousBracket = 0;

        foreach ($this->taxBrackets as $bracket) {
            $bracketAmount = min($remaining, $bracket['up_to'] - $previousBracket);
            if ($bracketAmount <= 0) break;

            $annualTax += $bracketAmount * $bracket['rate'];
            $remaining -= $bracketAmount;
            $previousBracket = $bracket['up_to'];

            if ($remaining <= 0) break;
        }

        return round($annualTax / 12, 2);
    }

    /**
     * Calculate employee pension
     */
    public function calculateEmployeePension($grossPay)
    {
        return round($grossPay * self::EMPLOYEE_PENSION_RATE, 2);
    }

    /**
     * Calculate employer pension
     */
    public function calculateEmployerPension($grossPay)
    {
        return round($grossPay * self::EMPLOYER_PENSION_RATE, 2);
    }

    /**
     * Calculate NHF
     */
    public function calculateNHF($basicSalary)
    {
        return round($basicSalary * self::NHF_RATE, 2);
    }

    /**
     * Calculate NSITF
     */
    public function calculateNSITF($grossPay)
    {
        return round($grossPay * self::NSITF_RATE, 2);
    }

    /**
     * Process payroll for a period
     */
    public function processPayroll($periodId)
    {
        $period = PayrollPeriod::findOrFail($periodId);

        if ($period->status !== 'draft') {
            throw new \Exception('Payroll period must be in draft status');
        }

        return DB::transaction(function () use ($period) {
            $staffList = \App\Models\StaffRecord::where('status', 'active')->get();

            $periodTotals = [
                'total_gross_pay' => 0,
                'total_employee_pension' => 0,
                'total_employer_pension' => 0,
                'total_tax' => 0,
                'total_nhf' => 0,
                'total_loan_deductions' => 0,
                'total_net_pay' => 0,
            ];

            foreach ($staffList as $staff) {
                $salaryStructure = StaffSalaryStructure::where('staff_id', $staff->id)
                    ->where('is_active', true)
                    ->where('effective_from', '<=', $period->end_date)
                    ->where(function ($q) use ($period) {
                        $q->whereNull('effective_to')->orWhere('effective_to', '>=', $period->start_date);
                    })
                    ->first();

                if (!$salaryStructure) {
                    continue;
                }

                $grossPay = $this->calculateGrossPay($salaryStructure);
                $payeTax = $this->calculatePAYE($grossPay);
                $employeePension = $this->calculateEmployeePension($grossPay);
                $nhf = $this->calculateNHF($salaryStructure->basic_salary);
                $loanRepayment = 0;

                $totalDeductions = $payeTax + $employeePension + $nhf + $loanRepayment;
                $netPay = $grossPay - $totalDeductions;

                PayrollRun::create([
                    'payroll_period_id' => $period->id,
                    'staff_id' => $staff->id,
                    'salary_structure_id' => $salaryStructure->id,
                    'basic_salary' => $salaryStructure->basic_salary,
                    'housing_allowance' => $salaryStructure->housing_allowance,
                    'transport_allowance' => $salaryStructure->transport_allowance,
                    'meal_allowance' => $salaryStructure->meal_allowance,
                    'medical_allowance' => $salaryStructure->medical_allowance,
                    'utility_allowance' => $salaryStructure->utility_allowance,
                    'other_allowances' => $salaryStructure->other_allowances,
                    'total_earnings' => $grossPay,
                    'paye_tax' => $payeTax,
                    'employee_pension' => $employeePension,
                    'employer_pension' => $this->calculateEmployerPension($grossPay),
                    'nhf' => $nhf,
                    'loan_repayment' => $loanRepayment,
                    'total_deductions' => $totalDeductions,
                    'net_pay' => $netPay,
                    'status' => 'draft',
                ]);

                $periodTotals['total_gross_pay'] += $grossPay;
                $periodTotals['total_employee_pension'] += $employeePension;
                $periodTotals['total_employer_pension'] += $this->calculateEmployerPension($grossPay);
                $periodTotals['total_tax'] += $payeTax;
                $periodTotals['total_nhf'] += $nhf;
                $periodTotals['total_loan_deductions'] += $loanRepayment;
                $periodTotals['total_net_pay'] += $netPay;
            }

            $period->update([
                'total_gross_pay' => $periodTotals['total_gross_pay'],
                'total_employee_pension' => $periodTotals['total_employee_pension'],
                'total_employer_pension' => $periodTotals['total_employer_pension'],
                'total_tax' => $periodTotals['total_tax'],
                'total_nhf' => $periodTotals['total_nhf'],
                'total_loan_deductions' => $periodTotals['total_loan_deductions'],
                'total_net_pay' => $periodTotals['total_net_pay'],
                'status' => 'processing',
            ]);

            return $period;
        });
    }

    /**
     * Calculate gross pay
     */
    private function calculateGrossPay($salaryStructure)
    {
        $grossPay = $salaryStructure->basic_salary
            + $salaryStructure->housing_allowance
            + $salaryStructure->transport_allowance
            + $salaryStructure->meal_allowance
            + $salaryStructure->medical_allowance
            + $salaryStructure->utility_allowance
            + $salaryStructure->other_allowances;

        if ($salaryStructure->custom_allowances) {
            foreach (json_decode($salaryStructure->custom_allowances ?? '[]', true) as $allowance) {
                $grossPay += $allowance['amount'] ?? 0;
            }
        }

        return $grossPay;
    }

    /**
     * Approve payroll
     */
    public function approvePayroll($periodId)
    {
        $period = PayrollPeriod::findOrFail($periodId);

        if ($period->status !== 'processing') {
            throw new \Exception('Payroll must be processed before approval');
        }

        return DB::transaction(function () use ($period) {
            PayrollRun::where('payroll_period_id', $period->id)->update(['status' => 'approved']);

            $period->update([
                'status' => 'approved',
                'approved_by' => auth()->id(),
                'approved_at' => now(),
            ]);

            return $period;
        });
    }

    /**
     * Record staff payment
     */
    public function recordStaffPayment($staffId, $payrollRunId, $paymentData)
    {
        $payrollRun = PayrollRun::findOrFail($payrollRunId);

        if ($payrollRun->payment_status === 'paid') {
            throw new \Exception('This payroll has already been paid');
        }

        $payment = StaffPayment::create([
            'staff_id' => $staffId,
            'payroll_run_id' => $payrollRunId,
            'payment_reference' => $this->generatePaymentReference(),
            'payment_type' => 'salary',
            'amount' => $payrollRun->net_pay,
            'payment_date' => $paymentData['payment_date'],
            'payment_method' => $paymentData['payment_method'],
            'bank_name' => $paymentData['bank_name'] ?? null,
            'account_number' => $paymentData['account_number'] ?? null,
            'transaction_ref' => $paymentData['transaction_ref'] ?? null,
            'purpose' => "Salary payment",
            'payment_status' => 'paid',
            'created_by' => auth()->id(),
        ]);

        $payrollRun->update([
            'payment_status' => 'paid',
            'paid_at' => now(),
            'transaction_reference' => $payment->payment_reference,
        ]);

        return $payment;
    }

    /**
     * Generate payment reference
     */
    private function generatePaymentReference()
    {
        return 'PAY-' . date('Ymd') . '-' . strtoupper(uniqid());
    }

    /**
     * Get active loan deductions
     */
    public function getActiveLoanDeductions($staffId)
    {
        return [
            'total_deduction' => 0,
            'loans' => []
        ];
    }
}

