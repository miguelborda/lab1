<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable=['codigo_area','nombre_area','userid_creator','username_creator','userid_lastupdated','username_lastupdated','updated_at'];

}
