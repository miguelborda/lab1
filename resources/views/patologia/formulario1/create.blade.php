@extends('layouts.app')

@section('title', 'Crear Formulario1')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Crear Formulario1</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#agregarLinea").click(function() {
        // Clonar la primera línea
        var primeraLinea = $(".custom-bg2:first").clone();
        primeraLinea.find('input').val('');
        
        // Agregar el botón "Eliminar" a la línea clonada
        var botonEliminar = $('<button class="eliminarLinea">Quitar Linea de Registro</button>');
        botonEliminar.click(function() {
            primeraLinea.remove();
        });
        primeraLinea.append(botonEliminar);
        
        // Insertar la línea clonada después de la primera línea
        $(".custom-bg2:first").after(primeraLinea);
    });

    // Controlador para eliminar la primera línea clonada
    $(document).on("click", ".eliminarLinea", function() {
        $(this).parent().remove();
    });
});
</script>





<style>
.custom-bg {
background-color: #DCEEEE; /* Cambia #ff0000 al color que desees */
border-radius: 10px; /* Cambia el valor para ajustar el radio del borde */
}
.custom-bg2 {
background-color: #DEE0E0; /* Cambia #ff0000 al color que desees */
border-radius: 10px; /* Cambia el valor para ajustar el radio del borde */
}
</style>
<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'patologia.formulario1.store']) !!}
        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <strong>{!! Form::label('num_solicitud', 'Numero de Solicitud') !!}</strong>
                    {!! Form::text('num_solicitud', isset($formulario1) ? $formulario1->num_solicitud : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Numero de Formulario']) !!}
                    <small class="text-danger">{{ $errors->first('num_solicitud') }}</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>{!! Form::label('fecha_solicitud', 'Fecha de Solicitud') !!}</strong>
                    {!! Form::date('fecha_solicitud', isset($formulario1) ? $formulario1->fecha_solicitud : '', ['max' => now()->toDateString(), 'min' => '1900-01-01']) !!}               
                    @error('fecha_solicitud')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div><br>        
    <div class="row custom-bg">
        <div class="col-md-4">            
            <div class="form-group">
                <strong>{!! Form::label('secretaria_regional_id', 'Secretaria Regional') !!}</strong>
                {!! Form::select('secretaria_regional_id', $secretariaregionals, isset($formulario1) ? $formulario1->secretaria_regional : null, ['class' => 'form-control', 'placeholder' => 'Selecciona una Secretaria Regional']) !!}
                <small class="text-danger">{{ $errors->first('secretaria_regional_id') }}</small>
            </div>
        </div>
        <div class="col-md-4">            
            <div class="form-group">
                <strong>{!! Form::label('municipio_id', 'Municipio') !!}</strong>
                {!! Form::select('municipio_id', $municipios, isset($formulario1) ? $formulario1->municipio_id : null, ['class' => 'form-control', 'placeholder' => 'Selecciona un Municipio']) !!}
                <small class="text-danger">{{ $errors->first('municipio_id') }}</small>
            </div>
        </div>
        <div class="col-md-4">            
            <div class="form-group">
                <strong>{!! Form::label('distrito_id', 'Distrito') !!}</strong>
                {!! Form::select('distrito_id', $distritos, isset($formulario1) ? $formulario1->distrito_id : null, ['class' => 'form-control', 'placeholder' => 'Selecciona un Distrito']) !!}
                <small class="text-danger">{{ $errors->first('distrito_id') }}</small>
            </div>
        </div>
    </div>
    <div class="row custom-bg">
        <div class="col-md-4">            
            <div class="form-group">
                <strong>{!! Form::label('area_id', 'Area') !!}</strong>
                {!! Form::select('area_id', $areas, isset($formulario1) ? $formulario1->area_id : null, ['class' => 'form-control', 'placeholder' => 'Selecciona una Area']) !!}
                <small class="text-danger">{{ $errors->first('area_id') }}</small>
            </div>
        </div>
        <div class="col-md-4">            
            <div class="form-group">
                <strong>{!! Form::label('establecimiento_id', 'Establecimiento') !!}</strong>
                {!! Form::select('establecimiento_id', $establecimientos, isset($formulario1) ? $formulario1->establecimiento_id : null, ['class' => 'form-control', 'placeholder' => 'Selecciona un Establecimiento']) !!}
                <small class="text-danger">{{ $errors->first('establecimiento_id') }}</small>
            </div>
        </div>
        <div class="col-md-4">            
            <div class="form-group">
                <strong>{!! Form::label('sector_id', 'Sector') !!}</strong>
                {!! Form::select('sector_id', $sectors, isset($formulario1) ? $formulario1->sector_id : null, ['class' => 'form-control', 'placeholder' => 'Selecciona un Sector']) !!}
                <small class="text-danger">{{ $errors->first('sector_id') }}</small>
            </div>
        </div><div><br></div>         
    </div><div><br><strong>DETALLE PACIENTES:</strong><br></div>        
    <div class="row custom-bg2" id="dynamicFields">
        <div class="col-md-2"> 
            <div class="form-group">
                <strong>{!! Form::label('num_examen[]', 'Nº de Examen') !!}</strong>
                {!! Form::text('num_examen[]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nº de Examen']) !!}
                <small class="text-danger">{{ $errors->first('num_examen') }}</small>
            </div>
        </div>
        <div class="col-md-4"> 
            <div class="form-group">
                <strong>{!! Form::label('nombre[]', 'Nombre del Paciente') !!}</strong>
                {!! Form::text('nombre[]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre del Paciente']) !!}
                <small class="text-danger">{{ $errors->first('nombre') }}</small>
            </div>
        </div>        
        <div class="col-md-2"> 
            <div class="form-group">
                <strong>{!! Form::label('edad[]', 'Edad de Paciente') !!}</strong>
                {!! Form::text('edad[]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Edad']) !!}
                <small class="text-danger">{{ $errors->first('edad') }}</small>
            </div>
        </div>
        <div class="col-md-4"> 
            <div class="form-group">
                <strong>{!! Form::label('direccion[]', 'Dirección de Paciente') !!}</strong>
                {!! Form::text('direccion[]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Dirección del Paciente']) !!}
                <small class="text-danger">{{ $errors->first('direccion') }}</small>
            </div>
        </div><div><br></div>
        
    </div><button id="agregarLinea" type="button" class="btn btn-primary">Agregar Línea</button><br>       
                
            <br>
            {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection

@push('script')
    <script src="js/datatable.js"></script>
    <script>
        $('#myTable').DataTable();
    </script>
@endpush
