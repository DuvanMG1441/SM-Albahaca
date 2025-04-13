<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cultivo extends Model
{
    use HasFactory;

    protected $table = 'cultivo';

    protected $primaryKey = 'Id_cultivo';

    public $timestamps = false; 

    protected $fillable = ['Id_usuario', 'Descripcion', 'Fecha_inicio', 'Fecha_Final', 'Estado'];
}
