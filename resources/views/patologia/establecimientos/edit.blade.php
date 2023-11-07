@extends('layouts.app')

@section('title', 'Editar Establecimiento')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Editar Establecimiento con ID: {{$establecimiento->id}}</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('patologia.establecimientos.update', $establecimiento->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas modificar este registro?');">
            @csrf
            @method('PUT')

            <!--<div class="form-group">
                <strong>{!! Form::label('codigo_establecimiento', 'codigo de establecimiento') !!}</strong>
                {!! Form::text('codigo_establecimiento', $establecimiento->codigo_establecimiento, ['class' => 'form-control', 'placeholder' => 'Ingrese el código Establecimiento']) !!}
                <small class="text-danger">{{ $errors->first('codigo_distrito') }}</small>
            </div>
            <br>-->
            <div class="form-group">
                <strong>{!! Form::label('nombre_establecimiento', 'nombre de establecimiento') !!}</strong>
                {!! Form::text('nombre_establecimiento', $establecimiento->nombre_establecimiento, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de Establecimiento']) !!}
                @error('nombre_establecimiento')
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
