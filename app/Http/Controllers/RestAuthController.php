<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class RestAuthController extends Controller
{
    public function login(Request $request): JsonResponse
        {
            try{
                Log::debug('RestAuthController.login  Datos recibidos:', $request->all());
                // Validar las credenciales
                $credentials = $request->validate([
                    'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
                    'password' => ['required', 'min:12', 'regex:/[A-Z]/', 'regex:/[a-z]/', 'regex:/[0-9]/', 'regex:/[\W_]/'],
                ]);

                $user = User::where('email', $credentials['email'])->first();

                if (!$user || !Hash::check($credentials['password'], $user->password)) {
                    return response()->json(['message' => 'Credenciales inválidas'], 401);
                }

                $token = $user->createToken('Auth-Token')->plainTextToken;

                return response()->json([
                    'message' => 'Login OK',
                    'email' => $user->email,
                    'token_type' => 'Bearer',
                    'token' => $token],200);

            } catch (ValidationException $e) {
                Log::error('Error en RestAuthController.login:', ['error' => $e->getMessage()]);
                return response()->json([
                    'message' => 'Error de validación de datos',
                    'errors' => $e->errors(),
                ], 422);
            } catch (\Exception $e) {
                Log::error('Error en RestAuthController.login:', ['error' => $e->getMessage()]);
                return response()->json([
                    'message' => 'Error interno del servidor',
                    'errors' => $e->getMessage()
                ], 500);
            }  
        }
    
    public function logout(Request $request): JsonResponse
    { 
        try{
            Log::debug('RestAuthController.logout  Datos recibidos:', $request->all());
            $request->user()->tokens()->delete();
            return response()->json(['message' => 'Logout OK'],200);

        } catch (\Exception $e) {
            Log::error('Error en RestAuthController.logout:', ['error' => $e->getMessage()]);
            return response()->json([
                'message' => 'Error interno del servidor',
                'errors' => $e->getMessage()
            ], 500);
        }   
    }
}