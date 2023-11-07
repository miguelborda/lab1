@extends('layouts.app')

@section('title', 'Crear Area')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Crear Nueva Area</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'patologia.areas.store']) !!}
            <!--<div class="form-group">
                <strong>{!! Form::label('codigo_area', 'Código de Area') !!}</strong>
                {!! Form::text('codigo_area', isset($area) ? $area->codigo_area : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Código de Area']) !!}
                <small class="text-danger">{{ $errors->first('codigo_area') }}</small>
            </div>
            <br>-->
            <div class="form-group">
                <strong>{!! Form::label('nombre_area', 'Nombre de Area') !!}</strong>
                {!! Form::text('nombre_area', isset($area) ? $area->nombre_area : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre de Area']) !!}
                @error('nombre_area')
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
