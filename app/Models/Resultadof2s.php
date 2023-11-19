<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultadof2s extends Model
{
    use HasFactory;
    protected $fillable=['id','num_examen','detallef1s_id','diagnostico_id','codigo_diagnostico',
    'ci_id','fecha_resultado','descripcion','estado','creatoruser_id','updateduser_id',
    'created_at','updated_at'];

    protected $table = 'resultadof2s'; // Nombre real de tu tabla
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
