<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretariaregional extends Model
{
    use HasFactory;
    protected $fillable=['codigo_regional','nom_secretaria_regional','userid_creator','username_creator','updated_at'];
}
