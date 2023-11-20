@extends('layouts.app')

@section('title', 'Editar Resultado')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Actualizar Formulario1 de Solicitudes:  {{$formulario3citos->num_solicitud}}</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('patologia.formulario3cito.update', $formulario3citos->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas modificar este registro?');">
            @csrf
            @method('PUT')

            <div class="form-group">
                <strong>{!! Form::label('secretaria_regional', 'Secretaria Regional') !!}</strong>
                {!! Form::text('secretaria_regional', $formulario3citos->secretaria_regional, ['class' => 'form-control', 'placeholder' => 'Ingrese la Secretaria Regional']) !!}
                <small class="text-danger">{{ $errors->first('secretaria_regional') }}</small>
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('municipio', 'Municipio') !!}</strong>
                {!! Form::text('municipio', $formulario3citos->municipio, ['class' => 'form-control', 'placeholder' => 'Ingrese el Municipio']) !!}
                <small class="text-danger">{{ $errors->first('municipio') }}</small>
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('distrito', 'Distrito') !!}</strong>
                {!! Form::text('distrito', $formulario3citos->distrito, ['class' => 'form-control', 'placeholder' => 'Ingrese el Distrito']) !!}
                <small class="text-danger">{{ $errors->first('distrito') }}</small>
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('area', 'Area') !!}</strong>
                {!! Form::text('area', $formulario3citos->area, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre de Area']) !!}
                <small class="text-danger">{{ $errors->first('area') }}</small>
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('establecimiento', 'Establecimiento') !!}</strong>
                {!! Form::text('establecimiento', $formulario3citos->establecimiento, ['class' => 'form-control', 'placeholder' => 'Ingrese el Establecimiento']) !!}
                <small class="text-danger">{{ $errors->first('establecimiento') }}</small>
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('sector', 'Sector') !!}</strong>
                {!! Form::text('sector', $formulario3citos->sector, ['class' => 'form-control', 'placeholder' => 'Ingrese el Sector']) !!}
                <small class="text-danger">{{ $errors->first('sector') }}</small>
            </div>
            <br>
            <button type="submit" id="confirm-button" class="btn btn-primary">Guardar Cambios</button>                      
            
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
