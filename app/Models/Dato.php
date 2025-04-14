<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dato extends Model
{
    use HasFactory;
    public function cultivo()
{
    return $this->belongsTo(Cultivo::class, 'Id_cultivo', 'Id_cultivo');
}

}


