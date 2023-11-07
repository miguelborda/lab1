<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{    
    use HasFactory;
    protected $fillable=['codigo_diagnostico','descripcion_diagnostico',
    'creatoruser_id','updateduser_id','created_at','updated_at'];
}
