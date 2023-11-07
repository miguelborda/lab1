@extends('layouts.app')

@section('title', 'Crear Municipio')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Crear Nuevo Municipio</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'patologia.municipios.store']) !!}
            <!--<div class="form-group">
                <strong>{!! Form::label('codigo_municipio', 'Código de Municipio') !!}</strong>
                {!! Form::text('codigo_municipio', isset($municipio) ? $municipio->codigo_municipio : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Código de Municipio']) !!}
                <small class="text-danger">{{ $errors->first('codigo_municipio') }}</small>
            </div>
            <br>-->
            <div class="form-group">
                <strong>{!! Form::label('nombre_municipio', 'Nombre de Municipio') !!}</strong>
                {!! Form::text('nombre_municipio', isset($municipio) ? $municipio->nombre_municipio : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre de Municipio']) !!}
                @error('nombre_municipio')
                    <span class="text-danger">{{$message}}</span>
                @enderror
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
@endpush
