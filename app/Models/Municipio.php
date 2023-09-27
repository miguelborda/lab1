<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $fillable=['codigo_municipio','nombre_municipio','userid_creator',
    'username_creator','updated_at'];
}
