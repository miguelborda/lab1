<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    use HasFactory;
    protected $fillable=['codigo_establecimiento','nombre_establecimiento',
    'creatoruser_id','updateduser_id','created_at','updated_at'];
}
