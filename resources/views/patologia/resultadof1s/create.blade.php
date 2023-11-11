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
                <h2>Crear Resultado de Formulario1s</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--<script>
$(document).ready(function() {
    $("#agregarLinea").click(function() {
        var lineaClonada = $(".custom-bg2").last().clone();
        lineaClonada.find('input').val('');
        $(".custom-bg2").last().after(lineaClonada);
    });
});
</script>-->
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
/* Estilo para campos deshabilitados con una clase personalizada */
input.custom-disabled:disabled {
    background-color: #e0f2f1; /* Cambia este valor al color deseado */
    /* Otros estilos adicionales según tus necesidades */
}
.col-md-1-5 {
    flex: 0 0 10%;
    max-width: 10%;
}
.col-md-2-5 {
    flex: 0 0 15%;
    max-width: 15%;
}
</style>
<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'patologia.resultadof1s.store']) !!}        
        <div class="row custom-bg">
            <div class="col-md-1-5">
                <div class="form-group">
                    <strong>{!! Form::label('num_examen', 'Nº Examen') !!}</strong>
                    {!! Form::text('num_examen', isset($formulario1) ? $resultadof1s->num_examen : '', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <small class="text-danger">{{ $errors->first('num_solicitud') }}</small>
                </div>
            </div>
            <div class="col-md-2-5">
                <div class="form-group">
                    <strong>{!! Form::label('fecha_resultado', 'Fecha Resultado') !!}</strong>
                    {!! Form::date('fecha_resultado', isset($formulario1) ? $resultadof1s->fecha_resultado : '', ['max' => now()->toDateString(), 'min' => '1900-01-01']) !!}               
                    @error('fecha_resultado')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-2-5"> 
                <div class="form-group">
                    <strong>{!! Form::label('ci', 'CI') !!}</strong>
                    {!! Form::text('ci', null, ['class' => 'form-control','disabled' => 'disabled']) !!}                
                </div>
            </div>
            <div class="col-md-3"> 
                <div class="form-group">
                    <strong>{!! Form::label('nombre', 'Nombre(s) Paciente') !!}</strong>
                    {!! Form::text('nombre', null, ['class' => 'form-control','disabled' => 'disabled']) !!}                
                </div>
            </div>
            <div class="col-md-3"> 
                <div class="form-group">
                    <strong>{!! Form::label('apellido', 'Apellidos Paciente') !!}</strong>
                    {!! Form::text('apellido', null, ['class' => 'form-control','disabled' => 'disabled']) !!}                
                </div>
            </div>
            <div class="col-md-1"> 
                <div class="form-group">
                    <strong>{!! Form::label('edad', 'Edad') !!}</strong>
                    {!! Form::text('edad', null, ['class' => 'form-control','disabled' => 'disabled']) !!}                
                </div>
            </div>            
            <div><br></div>
        </div>
    <div><br><strong>DIAGNOSTICOS:</strong><br></div>        
    <div class="row custom-bg2" id="dynamicFields">
        <div class="col-md-1-5"> 
            <div class="form-group">
                <strong>{!! Form::label('codigo_diagnostico[]', 'Código') !!}</strong>
                {!! Form::text('codigo_diagnostico[]', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                <small class="text-danger">{{ $errors->first('codigo_diagnostico') }}</small>
            </div>
        </div>
        <div class="col-md-10"> 
            <div class="form-group">
                <strong>{!! Form::label('descripcion_diagnostico[]', 'Descripción de Diagnostico') !!}</strong>
                {!! Form::text('descripcion_diagnostico[]', null, ['class' => 'form-control','disabled' => 'disabled']) !!}                
            </div>
        </div>
        <div><br></div>        
    </div><button id="agregarLinea" type="button" class="btn btn-primary">Agregar Línea</button><br>        
            <br>
            {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
            {!! Form::button('Cancelar', ['class' => 'btn btn-secondary', 'onclick' => 'window.history.go(-1);']) !!}
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
