@extends('layouts.app')

@section('title', 'Editar Servicio')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Editar Servicio con ID: {{$servicio->id}}</h2>
            </div>
        </div>
    </div>    
</div>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('patologia.servicios.update', $servicio->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas modificar este registro?');">
            @csrf
            @method('PUT')            
            <div class="form-group">
                <strong>{!! Form::label('nombre_servicio', 'Nombre de Servicio') !!}</strong>
                {!! Form::text('nombre_servicio', $servicio->nombre_servicio, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de Servicio']) !!}
                @error('nombre_servicio')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <br>
            <button type="submit" id="confirm-button" class="btn btn-primary">Guardar Cambios</button>                      
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
