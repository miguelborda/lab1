<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;
    protected $fillable=['id','nombre_distrito','created_at','updated_at',
    'creatoruser_id','updateduser_id'];
}
