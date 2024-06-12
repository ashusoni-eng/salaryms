<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CalculateSalaries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salaries:calculate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate employee salaries';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $salaries = Salary::where('is_salary_calculated', 0)->get();
        foreach ($salaries as $salary) {
            $employee = Employee::find($salary->employee_id);
            $perDaySalary = $employee->base_salary / $salary->total_working_days;
            $totalSalary = $perDaySalary * ($salary->total_working_days - $salary->total_leave_taken + $salary->overtime / 8);
            $salary->total_salary_made = $totalSalary;
            $salary->is_salary_calculated = 1;
            $salary->save();

            // Mail the salary details
            Mail::to($employee->email)->queue(new SalaryDetailsMail($salary));
        }
    }
}
