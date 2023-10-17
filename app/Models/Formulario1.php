<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario1 extends Model
{
    use HasFactory;
    protected $fillable=['num_solicitud','fecha_solicitud','secretaria_regional','municipio',
    'distrito','area','fecha_solicitud','establecimiento','sector','paciente','edad_paciente',
    'userid_creator','username_creator','userid_lastupdated','username_lastupdated','updated_at',
    'created_at','num_examen','direccion'];
}
