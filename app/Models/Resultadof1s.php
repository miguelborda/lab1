<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultadof1s extends Model
{
    use HasFactory;
    protected $fillable=['num_examen','fecha_resultado','descripcion','codigo_diagnostico',    
    'userid_creator','userid_lastupdated','created_at','updated_at'];
}
