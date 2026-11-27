<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
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
            'role'         => $validated['role'] ?? 'Employee',
            'password'     => Hash::make($validated['password']),
        ]);

        return response()->json([
            'message' => 'Account created successfully.',
            'user'    => $user,
        ], 201);
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
        ])) {
            return response()->json([
                'message' => 'Invalid email/ID or password.',
            ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('paywise-token')->plainTextToken;

        $isAdmin = in_array($user->role, ['HR / Admin', 'Payroll Admin', 'HR', 'Administrator'])
            || ($credentials['role_tab'] ?? '') === 'HR / Admin';

        return response()->json([
            'message' => 'Login successful.',
            'token'   => $token,
            'user'    => $user,
            'role'    => $isAdmin ? 'admin' : 'employee',
        ]);
    }
}