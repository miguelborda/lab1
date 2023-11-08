<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;    
    protected $fillable=['ci','nombre','apellido','fecha_nacimiento','edad','direccion','sexo',
    'hc','num_asegurado','email','creatoruser_id','updateduser_id','created_at','updated_at',
    'num_celular','descripcion','estado'];

}
