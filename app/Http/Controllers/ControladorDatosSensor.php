<?php

namespace App\Http\Controllers;

use App\Models\Datos;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ControladorDatosSensor extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'temperatura' => 'required|numeric',
            'humedad' => 'required|numeric',
            'ph' => 'required|numeric',
        ]);

        $data['hora'] = Carbon::now()->format('H:i:s');
        $data['Id_cultivo'] = 1;
        Datos::create($data);

        return response()->json(['status' => 'ok']);
    }
}
