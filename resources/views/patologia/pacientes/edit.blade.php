@extends('layouts.app')

@section('title', 'Editar Paciente')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Actualizar datos de Paciente {{$paciente->id}}</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('patologia.paciente.update', $paciente->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <strong>{!! Form::label('ci_paciente', 'ci de paciente') !!}</strong>
                {!! Form::text('ci_paciente', $paciente->ci_paciente, ['class' => 'form-control', 'placeholder' => 'Ingrese CI de Paciente']) !!}
                <small class="text-danger">{{ $errors->first('ci_paciente') }}</small>
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('nombre_paciente', 'nombre de paciente') !!}</strong>
                {!! Form::text('nombre_paciente', $paciente->nombre_paciente, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de Paciente']) !!}
                @error('nombre_paciente')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('apellido_paciente', 'apellido de paciente') !!}</strong>
                {!! Form::text('apellido_paciente', $paciente->apellido_paciente, ['class' => 'form-control', 'placeholder' => 'Ingrese apellido de Paciente']) !!}
                @error('apellido_paciente')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</div>
@endsection

@push('script')
    <script src="js/datatable.js"></script>
    <script>
        $('#myTable').DataTable();
    </script>
@endpush
