<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
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
            ? 'email'
            : 'id';

        $remember = $request->boolean('remember');

        if (! Auth::attempt([
            $loginField => $credentials['identifier'],
            'password'  => $credentials['password'],
        ], $remember)) {
            return back()
                ->withInput($request->only('identifier', 'role_tab'))
                ->withErrors(['identifier' => 'Invalid email/ID or password.']);
        }

        $request->session()->regenerate();
        $user = Auth::user();

        $isAdmin = in_array($user->role, ['HR / Admin', 'Payroll Admin', 'HR', 'Administrator'])
            || ($credentials['role_tab'] ?? '') === 'HR / Admin';

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
    }
}