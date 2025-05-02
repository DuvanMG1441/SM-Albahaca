<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cultivo; 
use Illuminate\Support\Facades\Auth;
use App\Models\Dato;

class Proyecto extends Controller
{
    public function index()
{
    $cultivos = Cultivo::where('Id_usuario', Auth::id())->get(); 
    return view('proyecto', compact('cultivos'));
}


    public function guardar(Request $request)
    {
        $request->validate([
            'Descripcion' => 'required|string|max:255',
        ]);
    
        Cultivo::create([
            'Id_usuario' => auth()->id(), 
            'Descripcion' => $request->Descripcion,
            'Fecha_inicio' => now(),
            'Estado' => 'Activo', 
        ]);
    
        return redirect()->route('proyecto.index')->with('success', 'Cultivo agregado correctamente.');

    }

    public function destroy($id)
{
    $cultivo = Cultivo::where('Id_cultivo', $id)->where('Id_usuario', Auth::id())->first();

    if (!$cultivo) {
        return redirect()->back()->with('error', 'Cultivo no encontrado o no tienes permisos para eliminarlo.');
    }

    $cultivo->delete();

    return redirect()->route('proyecto.index')->with('success', 'Cultivo eliminado correctamente.');
}

public function update(Request $request, $id)
{
    $cultivo = Cultivo::where('Id_cultivo', $id)->where('Id_usuario', Auth::id())->first();

    if (!$cultivo) {
        return redirect()->back()->with('error', 'No autorizado o cultivo no encontrado.');
    }

    $request->validate([
        'Descripcion' => 'required|string|max:255',
        'Estado' => 'required|in:Activo,Inactivo',
    ]);

    $cultivo->Descripcion = $request->Descripcion;
    $cultivo->Estado = $request->Estado;
    $cultivo->save();

    return redirect()->route('proyecto.index')->with('success', 'Cultivo actualizado correctamente.');
}

    public function obtenerDatos($id)
    {
        $cultivo = Cultivo::with('datos')->findOrFail($id);
    
        return response()->json([
            'descripcion' => $cultivo->Descripcion,
            'datos' => $cultivo->datos->map(function($dato) {
                return [
                    'ph' => $dato->ph,
                    'temperatura' => $dato->temperatura,
                    'humedad' => $dato->humedad,
                    'fecha' => $dato->hora,
                ];
            })
        ]);
    }

    public function DatoUltimo($id)
    {
        $cultivo = Cultivo::findOrFail($id);
    
        $ultimoDato = $cultivo->datos()->latest('created_at')->first();
    
        if (!$ultimoDato) {
            return response()->json(['message' => 'No hay datos disponibles'], 404);
        }
    
        return response()->json([
            'descripcion' => $cultivo->Descripcion,
            'dato' => [
                'ph' => $ultimoDato->ph,
                'temperatura' => $ultimoDato->temperatura,
                'humedad' => $ultimoDato->humedad,
                'fecha' => $ultimoDato->hora,
            ]
        ]);
    }
    

}

