<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/employee/dashboard', function () {
    return view('employee.dashboard');
})->name('employee.dashboard');

Route::get('/employee/payslips', function () {
    return view('employee.dashboard');
})->name('employee.payslips');

Route::get('/employee/attendance', function () {
    return view('employee.dashboard');
})->name('employee.attendance');

Route::get('/employee/leave', function () {
    return view('employee.dashboard');
})->name('employee.leave');

Route::get('/admin/dashboard', function () {
    return view('employee.dashboard');
})->name('admin.dashboard');

Route::get('/management/dashboard', function () {
    return view('employee.dashboard');
})->name('management.dashboard');