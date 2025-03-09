<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class InfoUserController extends Controller
{
    //Metodo llamado via web
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

    //Metodo llamado via API
    public function indexJSON()
    {
        Log::debug('InfoUserController.indexJSON'); 
        // Si se llega aqui, el usuario esta autenticado y tiene rol admin
        $users = User::all();
        // Retornar la vista con la info de todos los usuarios
        return response()->json($users,200); 
    }

    //Metodo llamado via API
    public function infoUserJSON()
    {
        Log::debug('InfoUserController.infoUserJSON'); 
        // Si se llega aqui, el usuario esta autenticado y tiene rol adecuado
        $user = Auth::user();
        // Retornar la vista con la info del usuario autenticado
        return response()->json($user,200); 
    }    
    
}
