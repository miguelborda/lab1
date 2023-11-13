<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallef1s extends Model
{
    use HasFactory;
    protected $fillable=['num_solicitud_id','num_examen','paciente_id','ci','descripcion',
    'creatoruser_id','updateduser_id','created_at','updated_at','fecha_resultado'];

    protected $table = 'detallef1s'; // Nombre real de tu tabla
    protected $primaryKey = 'id'; // Clave primaria de tu tabla

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'ci', 'ci');
    }   

    public function resultadof1()
    {
        //return $this->hasOne(Resultadof1s::class, 'num_examen', 'num_examen');
        return $this->belongsTo(Resultadof1s::class, 'num_examen', 'num_examen');
    }
}
