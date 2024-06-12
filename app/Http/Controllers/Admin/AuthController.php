<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

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
        $thisMonthAttendancePercent = $this->calculateAttendancePercent(now()->month);
        $lastMonthAttendancePercent = $this->calculateAttendancePercent(now()->subMonth()->month);
        return view('admin.dashboard', compact('totalEmployees', 'thisMonthAttendancePercent', 'lastMonthAttendancePercent'));
    }

    protected function calculateAttendancePercent($month)
    {
        // Implement attendance calculation logic
    }
}
