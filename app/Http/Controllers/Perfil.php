<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class Perfil extends Controller
{
    // Mostrar el formulario de edición del perfil
    public function edit()
    {
        return view('perfil');
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::id());


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'Telefono' => 'required|string|max:20',
            'current-password' => 'nullable|min:6',
            'new-password' => 'nullable|min:6|confirmed',
        ]);


        if ($request->filled('current-password') && $request->filled('new-password')) {
            if (!Hash::check($request->input('current-password'), $user->password)) {
                return redirect()->back()->withErrors(['current-password' => 'La contraseña actual es incorrecta']);
            }
            $user->password = Hash::make($request->input('new-password'));
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'Telefono' => $request->Telefono,
        ]);

        return redirect()->route('perfil.editar')->with('success', 'Perfil actualizado correctamente.');
    }

}
