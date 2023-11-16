@extends('layouts.app')

@section('title', 'Crear Servicio')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Crear Nuevo Servicio</h2>
            </div>
        </div>
    </div>    
</div>
<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'patologia.servicios.store']) !!}            
            <div class="form-group">
                <strong>{!! Form::label('nombre_servicio', 'Nombre de Servicio') !!}</strong>
                {!! Form::text('nombre_servicio', isset($servicio) ? $servicio->nombre_servicio : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre de Servicio']) !!}
                @error('nombre_servicio')
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
