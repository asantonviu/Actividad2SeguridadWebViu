<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class InfoUserController extends Controller
{
    public function index()
    {
        Log::debug('InfoUserController.index'); 
        // Verificar si el usuario autenticado tiene el rol admin
        $users = null;
        if(Auth::user()->rol == 'admin') {
            Log::debug('InfoUserController.index...logged user is Admin'); 
            // Si es admin, obtenemos todos los usuarios
            $users = User::all();
        } else {
            Log::debug('InfoUserController.index...logged user is not Admin'); 
        }

        // Retornar la vista con los usuarios (si es admin)
        return view('infouser', compact('users'));
    }
}
