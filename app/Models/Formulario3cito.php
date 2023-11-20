<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario3cito extends Model
{
    use HasFactory;
    protected $fillable=['id','num_solicitud','fecha_solicitud','establecimiento_id','municipio_id',
    'area_id','distrito_id','municipio_residencia','descripcion','estado','creatoruser_id',
    'updateduser_id','created_at','updated_at','secretaria_regional_id','sector_id'];       

    protected $table = 'formulario3citos';

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
    public function establecimiento()
    {
        return $this->belongsTo(Establecimiento::class, 'establecimiento_id', 'id');
    }
}
