@extends('layouts.app')

@section('title', 'Editar Medico')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-12">
            <div class="titlemb-30">
                <h3>Actualizar datos de Medico: {{$medico->nombre}}, {{$medico->apellido}}</h3>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('patologia.medicos.update', $medico->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas modificar este registro?');">
            @csrf
            @method('PUT')

            <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <strong>{!! Form::label('ci', 'CI') !!}<span class="text-danger">*</span></strong>
                    {!! Form::text('ci', isset($medico) ? $medico->ci : '', ['class' => 'form-control', 'placeholder' => 'Ingrese CI de Medico']) !!}
                    <small class="text-danger">{{ $errors->first('ci') }}</small>
                </div>
            <br>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <strong>{!! Form::label('nombre', 'Nombres') !!}<span class="text-danger">*</span></strong>
                    {!! Form::text('nombre', isset($medico) ? $medico->nombre : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre de Medico']) !!}
                    @error('nombre')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            <br>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <strong>{!! Form::label('apellido', 'Apellidos') !!}<span class="text-danger">*</span></strong>
                    {!! Form::text('apellido', isset($medico) ? $medico->apellido : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Apellido de Medico']) !!}
                    @error('apellido')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            <br>
            </div>           
            <div class="col-md-3">
                <div class="form-group">
                    <strong>{!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento') !!}</strong>
                    {!! Form::date('fecha_nacimiento', isset($medico) ? $medico->fecha_nacimiento : '', ['max' => now()->toDateString(), 'min' => '1900-01-01', 'id' => 'fecha_nacimiento']) !!}
                    @error('fecha_nacimiento')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>            
            </div>
            <!--<div class="col-md-1">
                <div class="form-group">
                    <strong>{!! Form::label('edad', 'Edad') !!}</strong>
                    {!! Form::text('edad', isset($medico) ? $medico->edad : '', ['class' => 'form-control', 'id' => 'edad', 'enabled' => 'disabled']) !!}
                </div>
            </div>            -->
            </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <strong>{!! Form::label('direccion', 'Dirección') !!}</strong>
                    {!! Form::text('direccion', isset($medico) ? $medico->direccion : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Direccion de Medico']) !!}
                    @error('direccion')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">                
                    <strong>{!! Form::label('sexo', 'Sexo') !!}</strong>
                    {!! Form::select('sexo', ['Hombre' => 'Hombre', 'Mujer' => 'Mujer'], isset($medico->sexo) ? $medico->sexo : null, ['class' => 'form-control']) !!}
                    @error('sexo')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <strong>{!! Form::label('especialidad', 'Especialidad') !!}</strong>
                    {!! Form::text('especialidad', isset($medico) ? $medico->especialidad : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Especialidad']) !!}
                    @error('especialidad')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <strong>{!! Form::label('matricula_profesional', 'Nº Matricula Profesional') !!}</strong>
                    {!! Form::text('matricula_profesional', isset($medico) ? $medico->matricula_profesional : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nº de Matricula Profesional']) !!}
                    @error('matricula_profesional')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>             
            <div class="col-md-3">
                <div class="form-group">
                    <strong>{!! Form::label('email', 'Correo Electrónico') !!}</strong>
                    {!! Form::text('email', isset($medico) ? $medico->email : '', ['class' => 'form-control', 'placeholder' => 'Ingrese direccion de Correo Electrónico']) !!}
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>              
            <div class="col-md-2">
                <div class="form-group">
                    <strong>{!! Form::label('num_celular', 'Nº de Celular') !!}</strong>
                    {!! Form::text('num_celular', isset($medico) ? $medico->num_celular : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nº de Celular']) !!}
                    @error('num_celular')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
        <br>            <br>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            {!! Form::button('Volver', ['class' => 'btn btn-secondary', 'onclick' => 'window.history.go(-1);']) !!}
        </form>
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
