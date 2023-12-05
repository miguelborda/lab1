<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallef3cito extends Model
{
    use HasFactory;
    protected $fillable=['id','num_solicitud_id','num_examen','paciente_id','ci','num_asegurado',
    'fecha_resultado','descripcion','estado','created_at','updated_at',    
    'creatoruser_id','updateduser_id'];

    protected $table = 'detallef3citos'; // Nombre real de tu tabla
    protected $primaryKey = 'id'; // Clave primaria de tu tabla

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'ci', 'ci');
    }   

    public function resultadof3()
    {
        
        return $this->belongsTo(Resultadof3cito::class, 'num_examen', 'num_examen');
    }
}
