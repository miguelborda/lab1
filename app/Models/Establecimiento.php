<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    use HasFactory;
    protected $fillable=['id','nombre_establecimiento','created_at','updated_at',
    'creatoruser_id','updateduser_id'];
}


