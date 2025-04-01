<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;    

class Perfil extends Controller
{
    public function edit()
    {
        return view('perfil');
    }

    public function update(Request $request)
{
    $user = User::find(Auth::id());

    if (!$user) {
        return redirect()->back()->with('error', 'Usuario no encontrado.');
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'Telefono' => 'required|digits_between:7,10|numeric',
        'current_password' => 'nullable|min:6', 
        'new_password' => 'nullable|min:6', 
    ]);


    if ($request->filled('current_password') && $request->filled('new_password')) {
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->with('error', 'La contraseña actual es incorrecta.');
        }

        $user->password = Hash::make($request->input('new_password'));
    }


    $user->name = $request->name;
    $user->email = $request->email;
    $user->Telefono = $request->Telefono;

    $user->save(); 

    return redirect()->route('perfil.editar')->with('success', 'Perfil actualizado correctamente.');
}

public function destroy(User $user)
{
    if (Auth::id() !== $user->id) {
        return redirect()->route('perfil.editar')->with('error', 'No puedes eliminar este usuario.');
    }

    Auth::logout(); 
    $user->forceDelete(); 

    return redirect()->route('login')->with('delete', 'Tu cuenta ha sido eliminada correctamente.');
}

}

