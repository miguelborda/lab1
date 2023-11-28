<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;    
    protected $fillable=['id','ci','nombre','apellido','fecha_nacimiento','edad','direccion',
    'especialidad','matricula_profesional','email','num_celular','descripcion','estado',
    'sexo','creatoruser_id','updateduser_id','created_at','updated_at'];

    protected $table = 'medicos'; 
    protected $primaryKey = 'id'; 
}
    

