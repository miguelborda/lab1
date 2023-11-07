@extends('layouts.app')

@section('title', 'Crear Distrito')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Crear Nuevo Distrito</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'patologia.distritos.store']) !!}
           <!-- <div class="form-group">
                <strong>{!! Form::label('codigo_distrito', 'Código de Distrito') !!}</strong>
                {!! Form::text('codigo_distrito', isset($distrito) ? $distrito->codigo_area : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Código de Distrito']) !!}
                <small class="text-danger">{{ $errors->first('codigo_distrito') }}</small>
            </div>
            <br>-->
            <div class="form-group">
                <strong>{!! Form::label('nombre_distrito', 'Nombre de Distrito') !!}</strong>
                {!! Form::text('nombre_distrito', isset($distrito) ? $distrito->nombre_distrito : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre de Distrito']) !!}
                @error('nombre_distrito')
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
