<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario2 extends Model
{
    use HasFactory;
    protected $fillable=['id','num_solicitud','fecha_solicitud','distrito_id','area_id',
    'sector_id','descripcion','estado','secretaria_regional_id','municipio_id',
    'establecimiento_id','creatoruser_id','updateduser_id','created_at','updated_at'];   

    protected $table = 'formulario2s';

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
    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id', 'id');
    }    
}
