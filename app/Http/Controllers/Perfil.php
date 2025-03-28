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
        $user = Auth::user(); // Obtiene el usuario autenticado

        if (!$user) {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'Telefono' => 'required|number|max:10',
            'current-password' => 'nullable|min:6',
            'new-password' => 'nullable|min:6|confirmed',
            'current_password' => 'required_with:new_password|min:6',

        ]);

        if ($request->filled('current_password') && $request->filled('new_password')) {
            if (!Hash::check($request->input('current_password'), $user->password)) {
                return redirect()->back()->with('error', 'La contraseña actual es incorrecta');
            }            
            $user->password = Hash::make($request->input('new_password'));
        }

        User::where('id', $user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'Telefono' => $request->Telefono,
            'password' => $user->password,
        ]);

        return redirect()->route('perfil.editar')->with('success', 'Perfil actualizado correctamente.');
    }

    public function destroy(Request $request)
{
    $user = Auth::user();

    Auth::logout(); 

    $user->forceDelete(); 

    return redirect()->route('login')->with('success', 'Tu cuenta ha sido eliminada correctamente.');
}

}

