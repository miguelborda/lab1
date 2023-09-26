<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{    
    use HasFactory;
    protected $fillable=['codigo_diagnostico','descripcion_diagnostico','userid_creator','username_creator','updated_at'];
}
