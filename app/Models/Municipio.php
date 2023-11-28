<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $fillable=['id','nombre_municipio','created_at','updated_at',
    'creatoruser_id','updateduser_id',];

    protected $table = 'municipios';

}
