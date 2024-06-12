<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Salary;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $email= $request['email'];
        $password = $request['password'];
        if (Auth::guard('admin')->attempt(['email'=>$email, 'password'=>$password])) {
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function dashboard()
    {
        $totalEmployees = Employee::count();
        $employees= Employee::all();        
        $thisMonthAttendancePercent = $this->calculateAttendancePercent(now()->month, now()->year);
        $lastMonthAttendancePercent = $this->calculateAttendancePercent(now()->subMonth()->month, now()->subMonth()->year);
        return view('admin.dashboard', compact('totalEmployees','employees', 'thisMonthAttendancePercent', 'lastMonthAttendancePercent'));
    }

    protected function calculateAttendancePercent($month, $year)
    {
        $totalEmployees = Employee::count();
        if ($totalEmployees == 0) {
            return 0;
        }

        $salaries = Salary::where('month', $month)->where('year', $year)->get();
        
        $totalAttendanceDays = 0;
        $totalWorkingDays = 0;

        foreach ($salaries as $salary) {
            $attendanceDays = $salary->total_working_days - $salary->total_leave_taken;
            $totalAttendanceDays += $attendanceDays;
            $totalWorkingDays += $salary->total_working_days;
        }

        if ($totalWorkingDays == 0) {
            return 0;
        }

        return ($totalAttendanceDays / $totalWorkingDays) * 100;
    }
}
