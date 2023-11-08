<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $fillable=['codigo_municipio','nombre_municipio','creatoruser_id',
    'updateduser_id','created_at','updated_at'];

    protected $table = 'municipios';

}
