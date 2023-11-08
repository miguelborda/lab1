<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario1 extends Model
{
    use HasFactory;
    protected $fillable=['num_solicitud','fecha_solicitud','secretaria_regional_id','municipio_id',
    'distrito_id','area_id','fecha_solicitud','establecimiento_id','sector_id',
    'creatoruser_id','updateduser_id','created_at','updated_at','estado','descripcion'];   

    protected $table = 'formulario1s';

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id', 'id');
    }
    public function distrito()
    {
        return $this->belongsTo(Distrito::class, 'distrito_id', 'id');
    }
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }    
    public function secretariaregional()
    {
        return $this->belongsTo(Secretariaregional::class, 'secretaria_regional_id', 'id');
    }
}

