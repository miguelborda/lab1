@extends('layouts.app')

@section('title', 'Crear Establecimiento')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Crear Establecimiento</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'patologia.establecimientos.store']) !!}
            <div class="form-group">
                <strong>{!! Form::label('codigo_establecimiento', 'Código de Establecimiento') !!}</strong>
                {!! Form::text('codigo_establecimiento', isset($establecimiento) ? $establecimiento->codigo_establecimiento : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Código de Establecimiento']) !!}
                <small class="text-danger">{{ $errors->first('codigo_establecimiento') }}</small>
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('nombre_establecimiento', 'Nombre de Establecimiento') !!}</strong>
                {!! Form::text('nombre_establecimiento', isset($establecimiento) ? $establecimiento->nombre_establecimiento : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre de Establecimiento']) !!}
                @error('nombre_establecimiento')
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
