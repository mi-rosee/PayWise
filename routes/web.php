<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLogin'])->name('home');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/employee/dashboard', [AuthController::class, 'showEmployeeDashboard'])
    ->name('employee.dashboard');

Route::get('/employee/payslips', fn () => view('employee.payslips'))
    ->name('employee.payslips');

Route::get('/employee/attendance', fn () => view('employee.attendance'))
    ->name('employee.attendance');

Route::get('/employee/leave', fn () => view('employee.attendance'))
    ->name('employee.leave');

Route::get('/employee/profile', fn () => view('employee.profile'))
    ->name('employee.profile');

Route::put('/employee/profile', fn (Illuminate\Http\Request $request) => back()->with('status', 'Profile details updated.'))
    ->name('employee.profile.update');

Route::put('/employee/profile/password', fn (Illuminate\Http\Request $request) => back()->with('status', 'Password updated.'))
    ->name('employee.profile.password');

Route::get('/admin/dashboard', [AuthController::class, 'showAdminDashboard'])
    ->name('admin.dashboard');

Route::get('/management/dashboard', fn () => view('employee.dashboard'))
    ->name('management.dashboard');

Route::post('/employee/leave', function (Illuminate\Http\Request $request) {
    $request->validate([
        'leave_type' => ['required', 'string', 'max:100'],
        'start_date' => ['required', 'date'],
        'end_date'   => ['required', 'date', 'after_or_equal:start_date'],
        'reason'     => ['nullable', 'string', 'max:500'],
    ]);

    return back()->with('status', 'Leave request submitted for review.');
})->name('employee.leave.store');