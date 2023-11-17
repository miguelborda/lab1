<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;    
    protected $fillable=['id','ci','nombre','apellido','fecha_nacimiento','edad','direccion','sexo',
    'especialidad','matricula_profesional','email','num_celular','descripcion','estado',
    'creatoruser_id','updateduser_id','created_at','updated_at'];

    protected $table = 'medicos'; // Nombre real de tu tabla
    protected $primaryKey = 'id'; // Clave primaria de tu tabla

    /*public function detallef1s_p()
    {
        return $this->belongsTo(Detallef1s::class, 'ci', 'ci');
    } */  
}
