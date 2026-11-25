<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

Route::get('/empdb', function () {
    return view('auth.empdb');
});

Route::get('/employee/dashboard', function () {
    return view('employee.dashboard');
})->name('employee.dashboard');
Displaying web.php.