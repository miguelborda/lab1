@extends('layouts.app')

@section('title', 'Crear Paciente')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Ingresar Datos de Nuevo Paciente</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'patologia.pacientes.store']) !!}
        <!--<span class="text-danger">Los campos con * son de llenado obligatorio</span>-->
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <strong>{!! Form::label('ci', 'CI') !!}<span class="text-danger">*</span></strong>
                    {!! Form::text('ci', isset($paciente) ? $paciente->ci : '', ['class' => 'form-control', 'placeholder' => 'Ingrese CI de Paciente']) !!}
                    <small class="text-danger">{{ $errors->first('ci') }}</small>
                </div>
            <br>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <strong>{!! Form::label('nombre', 'Nombres') !!}<span class="text-danger">*</span></strong>
                    {!! Form::text('nombre', isset($paciente) ? $paciente->nombre : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre de Paciente']) !!}
                    @error('nombre')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            <br>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <strong>{!! Form::label('apellido', 'Apellidos') !!}<span class="text-danger">*</span></strong>
                    {!! Form::text('apellido', isset($paciente) ? $paciente->apellido : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Apellido de Paciente']) !!}
                    @error('apellido')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            <br>
            </div>           
            <div class="col-md-2">
                <div class="form-group">
                    <strong>{!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento') !!}</strong>
                    {!! Form::date('fecha_nacimiento', isset($paciente) ? $paciente->fecha_nacimiento : '', ['max' => now()->toDateString(), 'min' => '1900-01-01', 'id' => 'fecha_nacimiento']) !!}
                    @error('fecha_nacimiento')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>            
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <strong>{!! Form::label('edad', 'Edad') !!}</strong>
                    {!! Form::text('edad', isset($paciente) ? $paciente->edad : '', ['class' => 'form-control', 'id' => 'edad', 'enabled' => 'disabled']) !!}
                </div>
            </div>            
            </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <strong>{!! Form::label('direccion', 'Dirección') !!}</strong>
                    {!! Form::text('direccion', isset($paciente) ? $paciente->direccion : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Direccion de Paciente']) !!}
                    @error('direccion')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">                
                    <strong>{!! Form::label('sexo', 'Sexo') !!}</strong>
                    {!! Form::select('sexo', ['Hombre' => 'Hombre', 'Mujer' => 'Mujer'], isset($paciente->sexo) ? $paciente->sexo : null, ['class' => 'form-control']) !!}
                    @error('sexo')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <strong>{!! Form::label('hc', 'HC') !!}</strong>
                    {!! Form::text('hc', isset($paciente) ? $paciente->hc : '', ['class' => 'form-control', 'placeholder' => 'Ingrese HC']) !!}
                    @error('hc')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <strong>{!! Form::label('email', 'Correo Electrónico') !!}</strong>
                    {!! Form::text('email', isset($paciente) ? $paciente->email : '', ['class' => 'form-control', 'placeholder' => 'Ingrese direccion de Correo Electrónico']) !!}
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>        
            <div class="col-md-2">
                <div class="form-group">
                    <strong>{!! Form::label('num_asegurado', 'Nº Asegurado') !!}</strong>
                    {!! Form::text('num_asegurado', isset($paciente) ? $paciente->num_asegurado : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nº de Asegurado']) !!}
                    @error('num_asegurado')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>        
            <div class="col-md-2">
                <div class="form-group">
                    <strong>{!! Form::label('num_celular', 'Nº de Celular') !!}</strong>
                    {!! Form::text('num_celular', isset($paciente) ? $paciente->num_celular : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nº de Celular']) !!}
                    @error('num_celular')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
            <br>
            {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
            {!! Form::button('Volver', ['class' => 'btn btn-secondary', 'onclick' => 'window.history.go(-1);']) !!}

        {!! Form::close() !!}
    </div>
</div>
@endsection

@push('script')
    <script src="js/datatable.js"></script>
    <script>
        $('#myTable').DataTable();
    </script>  
    <script>
    var fechaNacimiento = document.getElementById('fecha_nacimiento');
    var edadCampo = document.getElementById('edad');

    fechaNacimiento.addEventListener('input', function() {
        if (fechaNacimiento.value) {
            // Calcula la edad a partir de la fecha de nacimiento y la fecha actual
            var fechaNacimientoValue = new Date(fechaNacimiento.value);
            var hoy = new Date();
            var edad = hoy.getFullYear() - fechaNacimientoValue.getFullYear();

            if (hoy < new Date(hoy.getFullYear(), fechaNacimientoValue.getMonth(), fechaNacimientoValue.getDate())) {
                edad--;
            }

            // Llena el campo "edad" y desactívalo
            edadCampo.value = edad;
            edadCampo.setAttribute('disabled', 'disabled');
        } else {
            // Si no se selecciona una fecha de nacimiento, borra el valor y habilita el campo "edad"
            edadCampo.value = '';
            edadCampo.removeAttribute('disabled');
        }
    });

    edadCampo.addEventListener('input', function() {
        if (edadCampo.value) {
            // Desactiva el campo "fecha_nacimiento"
            fechaNacimiento.setAttribute('disabled', 'disabled');
        } else {
            // Habilita el campo "fecha_nacimiento"
            fechaNacimiento.removeAttribute('disabled');
        }
    });
</script>



@endpush
