<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultadof1s extends Model
{
    use HasFactory;
    protected $fillable=['id','num_examen','fecha_resultado','descripcion','codigo_diagnostico',    
    'creatoruser_id','updateduser_id','ci_id','detallef1s_id','created_at','updated_at'];

    protected $table = 'resultadof1s'; // Nombre real de tu tabla
    //protected $primaryKey = 'id'; // Clave primaria de tu tabla

    public function detallef1s()
    {
       return $this->belongsTo(Detallef1s::class, 'num_examen', 'id');
    }
    public function diagnosticos()
    {
       return $this->belongsTo(Diagnostico::class, 'codigo_diagnostico', 'codigo_diagnostico');
    }
}
