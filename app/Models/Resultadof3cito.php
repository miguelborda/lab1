<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultadof3cito extends Model
{
    use HasFactory;
    protected $fillable=['id','num_examen','detallef3citos_id','servicio_id','medico_id',
    'diagnostico_clinico','datos_relevantes','descripcion','conclusion','nota','fecha_resultado',
    'estado','creatoruser_id','updateduser_id','created_at','updated_at','ci_id'];

    protected $table = 'resultadof3citos';    

    public function detallef3cito(){
       return $this->belongsTo(Detallef3cito::class, 'num_examen', 'id');
    }    
    public function servicios(){
       return $this->belongsTo(Servicio::class, 'servicio_id', 'id');
    }
    public function medicos(){
       return $this->belongsTo(Medico::class, 'medico_id', 'id');
    }
}
