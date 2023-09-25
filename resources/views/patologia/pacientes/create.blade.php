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
                <h2>Crear Paciente</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'patologia.paciente.store']) !!}
            <div class="form-group">
                <strong>{!! Form::label('ci_paciente', 'CI de Paciente') !!}</strong>
                {!! Form::text('ci_paciente', isset($paciente) ? $paciente->ci_paciente : '', ['class' => 'form-control', 'placeholder' => 'Ingrese CI de Paciente']) !!}
                <small class="text-danger">{{ $errors->first('ci_paciente') }}</small>
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('nombre_paciente', 'Nombre de Paciente') !!}</strong>
                {!! Form::text('nombre_paciente', isset($paciente) ? $paciente->nombre_paciente : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre de Paciente']) !!}
                @error('nombre_paciente')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('apellido_paciente', 'Apellido de Paciente') !!}</strong>
                {!! Form::text('apellido_paciente', isset($paciente) ? $paciente->apellido_paciente : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Apellido de Paciente']) !!}
                @error('apellido_paciente')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <br>
            <div class="form-group">                
                <strong>{!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento ') !!}</strong>
                {!! Form::date('fecha_nacimiento', isset($paciente) ? $paciente->fecha_nacimiento : '', ['max' => now()->toDateString(), 'min' => '1900-01-01']) !!}
                @error('fecha_nacimiento')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">                
                <strong>{!! Form::label('sexo', 'Sexo') !!}</strong>
                {!! Form::select('sexo', ['Hombre' => 'Hombre', 'Mujer' => 'Mujer'], isset($paciente->sexo) ? $paciente->sexo : null, ['class' => 'form-control']) !!}
                @error('sexo')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
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
