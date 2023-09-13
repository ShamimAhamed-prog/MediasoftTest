<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginApiController extends Controller
{
    public function adminLogin(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => 'Invalid email or password', 'status' => 400], 400);
    }

    if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
        $user = Auth::guard('web')->user();

        return response()->json(['message' => 'Login successful', 'user' => $user], 200);
    }

    return response()->json(['error' => 'Invalid email or password', 'status' => 401], 401);
}

public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:users',
        'name' => 'required',
        'password' => 'required|min:8',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors(), 'status' => 400], 400);
    }

    $user = User::create([
        'email' => $request->input('email'),
        'name' => $request->input('name'),
        'password' => Hash::make($request->input('password')),
    ]);

    auth()->login($user);

    return response()->json(['message' => 'Registration successful!', 'user' => $user], 201);
}

}
