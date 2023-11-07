<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;
    protected $fillable=['nombre_distrito','creatoruser_id',
    'updateduser_id','created_at','updated_at'];
}
