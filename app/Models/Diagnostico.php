<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{    
    use HasFactory;
    protected $fillable=['id','codigo_diagnostico','descripcion_diagnostico',
    'creatoruser_id','updateduser_id','created_at','updated_at'];

    public function resultado_d()
    {
        return $this->belongsTo(Detallef1s::class, 'codigo_diagnostico', 'codigo_diagnostico');
    }   
}
