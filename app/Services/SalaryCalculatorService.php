<?php
// app/Services/SalaryCalculatorService.php
namespace App\Services;
use App\Models\AllEmployeeEmp;

use Carbon\Carbon;

class SalaryCalculatorService
{
    protected $pfRate = 0.12; // 12%
    protected $esiRate = 0.0075; // 0.75%

    public function calculateSalary(AllEmployeeEmp $employee, $month = null)
    {
        $month = $month ?? Carbon::now()->format('Y-m');
        
        $basic = $employee->basic_salary;
        $hra = $employee->hra ?? $basic * 0.4; // Default HRA 40% of basic
        $da = $employee->da ?? $basic * 0.2; // Default DA 20% of basic

        // Calculate gross salary
        $gross = $basic + $hra + $da;

        // Deductions
        $pf = $this->pfRate * $basic;
        $esi = $this->esiRate * $gross;
        
        // Other deductions (you can fetch these from database)
        $advance = $employee->advances()->whereMonth('date', Carbon::parse($month)->month)->sum('amount');
        $uniform = $employee->uniform_deductions ?? 0;
        $fine = $employee->fines()->whereMonth('date', Carbon::parse($month)->month)->sum('amount');

        // Net pay calculation
        $totalDeductions = $pf + $esi + $advance + $uniform + $fine;
        $netPay = $gross - $totalDeductions;

        return [
            'emp_id' => $employee->id,
            'salary_month' => $month,
            'net_pay' => round($netPay, 2),
            'wages' => $employee->wages ?? 0,
            'basic' => $basic,
            'hra' => $hra,
            'gross' => $gross,
            'pf' => $pf,
            'esi' => $esi,
            'advance' => $advance,
            'uniform' => $uniform,
            'fine' => $fine
        ];
    }
}