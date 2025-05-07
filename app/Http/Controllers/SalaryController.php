<?php

// app/Http/Controllers/SalaryController.php

namespace App\Http\Controllers;

use App\Models\AllEmployeeEmp;

use App\Models\Salary;
use App\Services\SalaryCalculatorService;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    protected $salaryCalculator;

    public function __construct(SalaryCalculatorService $salaryCalculator)
    {
        $this->salaryCalculator = $salaryCalculator;
    }

    public function generateSalary(Request $request)
    {
        $request->validate([
            'month' => 'sometimes|date_format:Y-m',
            'employee_id' => 'sometimes|exists:employees,id'
        ]);

        $month = $request->input('month') ?? now()->format('Y-m');

        if ($request->has('employee_id')) {
            $employee = AllEmployeeEmp::find($request->employee_id);
            $salaryData = $this->salaryCalculator->calculateSalary($employee, $month);
            $salary = Salary::create($salaryData);

            return response()->json([
                'message' => 'Salary generated successfully',
                'salary' => $salary
            ]);
        }

        // Bulk generate for all employees
        $employees = AllEmployeeEmp::all();
        $generated = [];

        foreach ($employees as $employee) {
            $salaryData = $this->salaryCalculator->calculateSalary($employee, $month);
            $salary = Salary::create($salaryData);
            $generated[] = $salary;
        }

        return response()->json([
            'message' => 'Salaries generated for all employees',
            'count' => count($generated),
            'salaries' => $generated
        ]);
    }

    public function getSalary($id)
    {
        $salary = Salary::with('employee')->findOrFail($id);
        return response()->json($salary);
    }

    public function getEmployeeSalaries($empId)
    {
        $salaries = Salary::where('emp_id', $empId)->orderBy('salary_month', 'desc')->get();
        return response()->json($salaries);
    }
}
