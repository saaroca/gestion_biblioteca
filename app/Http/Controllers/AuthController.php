<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {        
        // 🔹 CORREGIDO: Usar $request->validate() en lugar de $this->validate()
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        // Crear el usuario
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Generar el token
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully',
            'token' => $token
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // 🔹 CORREGIDO: Obtener usuario autenticado correctamente
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'message' => 'User logged in successfully',
                'token' => $token
            ], 200);
        } else {
            return response()->json(['message' => 'Login error'], 401);
        }
    }

    public function user(Request $request)
    {
        $user = $request->user();

        if ($user) {
            return response()->json([
                'name' => $user->name,
                'email' => $user->email
            ], 200);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}
