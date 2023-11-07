<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretariaregional extends Model
{
    use HasFactory;
    protected $fillable=['codigo_regional','nom_secretaria_regional','creatoruser_id',
    'updateduser_id','created_at','updated_at'];
}
