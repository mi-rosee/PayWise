<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
<<<<<<< HEAD
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function showAdminDashboard()
    {
        return view('auth.admindb');
    }

    public function showEmployeeDashboard()
    {
        return view('employee.dashboard');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'first_name'   => ['required', 'string', 'max:255'],
            'last_name'    => ['required', 'string', 'max:255'],
            'email'        => ['required', 'email', 'max:255', 'unique:users,email'],
            'company_code' => ['nullable', 'string', 'max:255'],
            'role'         => ['nullable', 'string', 'max:255'],
            'password'     => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'first_name'   => $validated['first_name'],
            'last_name'    => $validated['last_name'],
            'email'        => $validated['email'],
            'company_code' => $validated['company_code'] ?? null,
=======
    public function register(Request $request)
    {
        $validated = $request->validate([
            'firstName'   => ['required', 'string', 'max:255'],
            'lastName'    => ['required', 'string', 'max:255'],
            'workEmail'   => ['required', 'email', 'max:255', 'unique:users,work_email'],
            'companyCode' => ['nullable', 'string', 'max:255'],
            'role'        => ['nullable', 'string', 'max:255'],
            'password'    => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'first_name'   => $validated['firstName'],
            'last_name'    => $validated['lastName'],
            'work_email'   => $validated['workEmail'],
            'company_code' => $validated['companyCode'] ?? null,
>>>>>>> 0b9b54c578ba0190fd490b49e8a79c43769e2367
            'role'         => $validated['role'] ?? 'Employee',
            'password'     => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('employee.dashboard')
            ->with('status', 'Account created successfully.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'identifier' => ['required', 'string'],
            'password'   => ['required', 'string'],
            'role_tab'   => ['nullable', 'string'],
        ]);

        $loginField = filter_var($credentials['identifier'], FILTER_VALIDATE_EMAIL)
            ? 'work_email'
            : 'id';

        if (! Auth::attempt([
            $loginField => $credentials['identifier'],
            'password'  => $credentials['password'],
<<<<<<< HEAD
        ], $remember)) {
            return back()
                ->withInput($request->only('identifier', 'role_tab'))
                ->withErrors(['identifier' => 'Invalid email/ID or password.']);
=======
        ])) {
            return response()->json([
                'message' => 'Invalid email/ID or password.',
            ], 401);
>>>>>>> 0b9b54c578ba0190fd490b49e8a79c43769e2367
        }

        $user = Auth::user();
        $token = $user->createToken('paywise-token')->plainTextToken;

        $isAdmin = in_array($user->role, ['HR / Admin', 'Payroll Admin', 'HR', 'Administrator'])
            || ($credentials['role_tab'] ?? '') === 'HR / Admin';

<<<<<<< HEAD
        if ($isAdmin) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('employee.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
=======
        return response()->json([
            'message' => 'Login successful.',
            'token'   => $token,
            'user'    => $user,
            'role'    => $isAdmin ? 'admin' : 'employee',
        ]);
>>>>>>> 0b9b54c578ba0190fd490b49e8a79c43769e2367
    }
}