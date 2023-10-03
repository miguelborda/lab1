@extends('layouts.app')

@section('title', 'Editar Municipio')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Actualizar Municipio {{$municipio->id}}</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('patologia.municipios.update', $municipio->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas modificar este registro?');">
            @csrf
            @method('PUT')

            <div class="form-group">
                <strong>{!! Form::label('codigo_municipio', 'codigo de municipio') !!}</strong>
                {!! Form::text('codigo_municipio', $municipio->codigo_municipio, ['class' => 'form-control', 'placeholder' => 'Ingrese el código Municipio']) !!}
                <small class="text-danger">{{ $errors->first('codigo_municipio') }}</small>
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('nombre_municipio', 'nombre de municipio') !!}</strong>
                {!! Form::text('nombre_municipio', $municipio->nombre_municipio, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de Municipio']) !!}
                @error('nombre_municipio')
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
