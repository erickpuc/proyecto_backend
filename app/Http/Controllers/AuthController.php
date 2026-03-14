<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // REGISTRO

    public function register(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:120',-
            'correo' => 'required|email|unique:usuarios,correo',
            'telefono' => 'nullable|string|max:20',
            'password' => 'required|min:6',
            'rol_id' => 'required|exists:roles,id'
        ]);

        $usuario = Usuario::create([

            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'password' => Hash::make($request->password),
            'rol_id' => $request->rol_id,
            'activo' => true

        ]);

        $token = $usuario->createToken('token')->plainTextToken;

        return response()->json([
            'mensaje' => 'Usuario registrado',
            'usuario' => $usuario,
            'token' => $token
        ], 201);
    }


    // ==========================
    // LOGIN
    // ==========================

    public function login(Request $request)
    {

        $request->validate([
            'correo' => 'required|email',
            'password' => 'required'
        ]);

        $usuario = Usuario::where('correo', $request->correo)->first();

        if (!$usuario) {

            return response()->json([
                'mensaje' => 'Usuario no encontrado'
            ], 404);
        }

        if (!Hash::check($request->password, $usuario->password)) {

            return response()->json([
                'mensaje' => 'Contraseña incorrecta'
            ], 401);
        }

        if (!$usuario->activo) {

            return response()->json([
                'mensaje' => 'Usuario desactivado'
            ], 403);
        }

        $token = $usuario->createToken('token')->plainTextToken;

        return response()->json([
            'mensaje' => 'Login exitoso',
            'usuario' => $usuario,
            'token' => $token
        ]);
    }


    // ==========================
    // AUTOLOGIN
    // ==========================

    public function autologin(Request $request)
    {

        return response()->json([
            'usuario' => $request->user()
        ]);
    }


    // ==========================
    // LOGOUT
    // ==========================

    public function logout(Request $request)
    {

        $request->user()->tokens()->delete();

        return response()->json([
            'mensaje' => 'Sesión cerrada'
        ]);
    }

}