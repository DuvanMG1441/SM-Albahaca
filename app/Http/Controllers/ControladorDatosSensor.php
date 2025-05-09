<?php

namespace App\Http\Controllers;

use App\Models\Datos;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Cultivo; 
use Illuminate\Support\Facades\Auth;

class ControladorDatosSensor extends Controller
{
    public function store(Request $request)
    {
        //$user = Auth::user();

        $data = $request->validate([
            'temperatura' => 'required|numeric',
            'humedad' => 'required|numeric',
            'ph' => 'required|numeric',
        ]);

        // Buscar cultivo activo
        $cultivoActivo = Cultivo::where('Estado', 'Activo')->orderByDesc('Id_cultivo')->first();

        if (!$cultivoActivo) {
            return response()->json(['error' => 'No hay cultivos activos'], 404);
        }

        $data['hora'] = Carbon::now()->format('H:i:s');
        $data['Id_cultivo'] = $cultivoActivo->Id_cultivo;

        Datos::create($data);

        return response()->json(['status' => 'ok']);
    }
}
