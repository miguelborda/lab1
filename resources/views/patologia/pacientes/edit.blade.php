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
        <form method="POST" action="{{ route('patologia.paciente.update', $paciente->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas modificar este registro?');">
            @csrf
            @method('PUT')

            <div class="form-group">
                <strong>{!! Form::label('ci', 'ci de paciente') !!}</strong>
                {!! Form::text('ci', $paciente->ci, ['class' => 'form-control', 'placeholder' => 'Ingrese CI de Paciente']) !!}
                <small class="text-danger">{{ $errors->first('ci') }}</small>
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('nombre', 'nombre de paciente') !!}</strong>
                {!! Form::text('nombre', $paciente->nombre, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de Paciente']) !!}
                @error('nombre')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('apellido', 'apellido de paciente') !!}</strong>
                {!! Form::text('apellido', $paciente->apellido, ['class' => 'form-control', 'placeholder' => 'Ingrese apellido de Paciente']) !!}
                @error('apellido')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <br>
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
@endpush
