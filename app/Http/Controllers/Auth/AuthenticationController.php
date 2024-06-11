<?php

namespace App\Http\Controllers\Auth;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'email' => 'required|string|email|max:255|unique:users',
            'nama_lengkap' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $penyewaData = [
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'role' => 'Penyewa',
        ];

        $user = Users::create($penyewaData);
        $token = $user->createToken('penyewa-BTP')->plainTextToken;
        $user->remember_token = $token;
        $user->save();

        return response()->json([
            'user' => [
                'username' => $user->username,
                'email' => $user->email,
                'nama_lengkap' => $user->nama_lengkap,
                'role' => $user->role,
            ],
            'token' => $token
        ], 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = Users::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid Credentials'
            ], 422);
        }

        $token = $user->createToken('penyewa-BTP')->plainTextToken;
        $user->remember_token = $token;
        $user->save();

        return response()->json([
            'user' => [
                'username' => $user->username,
                'email' => $user->email,
                'nama_lengkap' => $user->nama_lengkap,
                'role' => $user->role,
            ],
            'token' => $token
        ], 200);
    }
}
