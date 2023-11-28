<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretariaregional extends Model
{
    use HasFactory;
    protected $fillable=['id','nom_secretaria_regional','created_at','updated_at',
    'creatoruser_id','updateduser_id',];
}
