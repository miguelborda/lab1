<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario1 extends Model
{
    use HasFactory;
    protected $fillable=['num_solicitud','fecha_solicitud','secretaria_regional','municipio',
    'distrito','area','fecha_solicitud','establecimiento','sector',
    'creatoruser_id','updateduser_id','created_at','updated_at','estado','descripcion'];
}
