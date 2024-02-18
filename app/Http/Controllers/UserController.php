<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
{
    $user = Auth::user();
    $user->name = $request->name;
    $user->email = $request->email;
    // Asegúrate de validar y sanitizar los inputs correctamente
    $user->save();

    return response()->json(['message' => 'Perfil actualizado con éxito']);
}
}
