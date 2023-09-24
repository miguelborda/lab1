@extends('layouts.app')

@section('title', 'Crear Sector')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Crear Sector</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'patologia.sector.store']) !!}
            <div class="form-group">
                <strong>{!! Form::label('codigo_sector', 'Código de Sector') !!}</strong>
                {!! Form::text('codigo_sector', isset($sector) ? $sector->codigo_sector : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Código de Sector']) !!}
                <small class="text-danger">{{ $errors->first('codigo_sector') }}</small>
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('nombre_sector', 'Nombre de Sector') !!}</strong>
                {!! Form::text('nombre_sector', isset($sector) ? $sector->nombre_sector : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre de Sector']) !!}
                @error('nombre_sector')
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
