<?php

use App\Http\Controllers\Admin\AuthController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::middleware(['auth:admin'])->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('employees', EmployeeController::class);
    Route::resource('salaries', SalaryController::class);
});
