<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // 1. Validate incoming form inputs
        $validated = $request->validate([
            'firstName'   => 'required|string|max:50',
            'lastName'    => 'required|string|max:50',
            'workEmail'   => 'required|email|unique:users,work_email',
            'companyCode' => 'required|string|max:50',
            'role'        => 'required|string',
            'password'    => 'required|string|min:8',
        ]);

        // 2. Create and store the user in the 'paywise' database
        User::create([
            'first_name'   => $validated['firstName'],
            'last_name'    => $validated['lastName'],
            'work_email'   => $validated['workEmail'],
            'company_code' => $validated['companyCode'],
            'role'         => $validated['role'],
            'password'     => Hash::make($validated['password']),
        ]);

        // 3. Return a JSON success response for your JS modal
        return response()->json([
            'status' => 'success',
            'message' => 'Account created successfully!'
        ]);
    }
}