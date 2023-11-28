<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;    
    protected $fillable=['id','ci','nombre','apellido','fecha_nacimiento','edad','direccion',
    'hc','num_asegurado','email','creatoruser_id','updateduser_id','created_at','updated_at',
    'sexo','num_celular','descripcion','estado'];

    protected $table = 'pacientes';
    protected $primaryKey = 'id';

    public function detallef1s_p()
    {
        return $this->belongsTo(Detallef1s::class, 'ci', 'ci');
    }   
}
 