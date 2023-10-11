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

<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'patologia.formulario1.store']) !!}
            <div class="form-group">
                <strong>{!! Form::label('num_solicitud', 'Numero de Solicitud') !!}</strong>
                {!! Form::text('num_solicitud', isset($formulario1) ? $formulario->num_solicitud : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Numero de Formulario']) !!}
                <small class="text-danger">{{ $errors->first('num_solicitud') }}</small>
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('fecha_solicitud', 'Fecha de Solicitud') !!}</strong>
                {!! Form::date('fecha_solicitud', isset($formulario1) ? $formulario1->fecha_solicitud : '', ['max' => now()->toDateString(), 'min' => '1900-01-01']) !!}               
                @error('fecha_solicitud')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div><br>
            <div class="form-group">
                <strong>{!! Form::label('paciente', 'Nombre del Paciente') !!}</strong>
                {!! Form::text('paciente', isset($formulario1) ? $formulario1->paciente : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre del Paciente']) !!}
                <small class="text-danger">{{ $errors->first('paciente') }}</small>
            </div>
            <div class="form-group">
                <strong>{!! Form::label('edad_paciente', 'Edad de Paciente') !!}</strong>
                {!! Form::text('edad_paciente', isset($formulario1) ? $formulario1->edad_paciente : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Edad del Paciente']) !!}
                <small class="text-danger">{{ $errors->first('edad_paciente') }}</small>
            </div>
            <div class="form-group">
                <strong>{!! Form::label('municipio', 'Municipio') !!}</strong>
                {!! Form::select('municipio', $municipios, isset($formulario1) ? $formulario1->municipio : null, ['class' => 'form-control', 'placeholder' => 'Selecciona un municipio']) !!}
                <small class="text-danger">{{ $errors->first('municipio') }}</small>
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
