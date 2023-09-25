<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;    
    protected $fillable=['ci_paciente','nombre_paciente','apellido_paciente','fecha_nacimiento','sexo'];

}
