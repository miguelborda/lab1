<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallef1s extends Model
{
    use HasFactory;
    protected $fillable=['num_examen','vez','nombre','direccion','edad','fecha_nacimiento','hc',
    'num_asegurado','num_informef1','descripcion','userid_creator','username_creator',
    'userid_lastupdated','username_lastupdated','updated_at'];
}
