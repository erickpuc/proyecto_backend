<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Doctor;
use App\Models\Clinica;
use App\Models\Farmacia;
use App\Models\Especialidad;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function register(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:120',
            'correo' => 'required|email|unique:usuarios,correo',
            'telefono' => 'nullable|string|max:20',
            'password' => 'required|min:6',
            'rol_id' => 'required|exists:roles,id',

            // extras
            'nombre_clinica' => 'nullable|string|max:150',
            'direccion' => 'nullable|string',
            'especialidad_id' => 'nullable',
            'especialidad_nombre' => 'nullable|string|max:150',
            'cedula_profesional' => 'nullable|string|max:30',
        ]);

        DB::beginTransaction();

        try {

            //  Crear usuario
            $usuario = Usuario::create([
                'nombre' => $request->nombre,
                'correo' => $request->correo,
                'telefono' => $request->telefono,
                'password' => Hash::make($request->password),
                'rol_id' => $request->rol_id,
                'activo' => true
            ]);

            //  ROLES

//  2 = DOCTOR
if ($request->rol_id == 3) {

    // MANEJO DE ESPECIALIDAD (AQUÍ VA)
    $especialidad_id = $request->especialidad_id;

    //  si no viene ID pero sí nombre → crear
    if (!$especialidad_id && $request->especialidad_nombre) {
        $especialidad = Especialidad::firstOrCreate([
            'nombre' => $request->especialidad_nombre
        ]);

        $especialidad_id = $especialidad->id;
    }

    Doctor::create([
        'usuario_id' => $usuario->id,
        'clinica_id' => $request->clinica_id ?? 1, // opcional
        'especialidad_id' => $especialidad_id, //  AQUÍ USAS LA VARIABLE
        'cedula_profesional' => $request->cedula_profesional,
        'telefono' => $request->telefono,
        'anios_exp' => $request->anios_exp 
    ]);
}

            //  3 = CLINICA / FARMACIA
            if ($request->rol_id == 4) {

                $clinica = Clinica::create([
                    'usuario_id' => $usuario->id,
                    'nombre' => $request->nombre_clinica,
                    'direccion' => $request->direccion,
                    'ciudad' => $request->ciudad,
                    'estado' => $request->estado,
                    'telefono' => $request->telefono
                ]);

                Farmacia::create([
                    'usuario_id' => $usuario->id,
                    'clinica_id' => $clinica->id,
                    'nombre' => $request->nombre_clinica,
                    'direccion' => $request->direccion,
                    'telefono' => $request->telefono
                ]);
            }

            DB::commit();

            $token = $usuario->createToken('token')->plainTextToken;

            return response()->json([
                'mensaje' => 'Usuario registrado correctamente',
                'usuario' => $usuario,
                'token' => $token
            ], 201);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'mensaje' => 'Error al registrar',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    // LOGIN
    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'password' => 'required'
        ]);

        $usuario = Usuario::where('correo', $request->correo)->first();

        // Usuario no existe
        if (!$usuario) {
            return response()->json([
                'mensaje' => 'Usuario no encontrado'
            ], 404);
        }

        // Password incorrecto
        if (!Hash::check($request->password, $usuario->password)) {
            return response()->json([
                'mensaje' => 'Contraseña incorrecta'
            ], 401);
        }

        // Usuario inactivo
        if (!$usuario->activo) {
            return response()->json([
                'mensaje' => 'Usuario desactivado'
            ], 403);
        }

        // Eliminar tokens anteriores (opcional pero PRO)
        $usuario->tokens()->delete();

        // Crear nuevo token
        $token = $usuario->createToken('token')->plainTextToken;

        return response()->json([
            'mensaje' => 'Login exitoso',
            'usuario' => $usuario,
            'token' => $token
        ]);
    }


    // AUTOLOGIN (Sanctum)
    public function autologin(Request $request)
    {
        return response()->json([
            'usuario' => $request->user()
        ]);
    }


    // LOGOUT (solo sesión actual)
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'mensaje' => 'Sesión cerrada correctamente'
        ]);
    }


    // LOGOUT ALL (opcional PRO)
    public function logoutAll(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'mensaje' => 'Todas las sesiones cerradas'
        ]);
    }
}