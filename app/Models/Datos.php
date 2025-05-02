<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datos extends Model
{
    protected $fillable = ['Id_cultivo', 'temperatura', 'humedad', 'ph', 'hora'];
}
