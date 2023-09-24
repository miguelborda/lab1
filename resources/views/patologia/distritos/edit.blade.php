@extends('layouts.app')

@section('title', 'Editar Distrito')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Actualizar Distrito {{$distrito->id}}</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('patologia.distritos.update', $distrito->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <strong>{!! Form::label('codigo_distrito', 'codigo de distrito') !!}</strong>
                {!! Form::text('codigo_distrito', $distrito->codigo_distrito, ['class' => 'form-control', 'placeholder' => 'Ingrese el código de Distrito']) !!}
                <small class="text-danger">{{ $errors->first('codigo_distrito') }}</small>
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('nombre_distrito', 'nombre de distrito') !!}</strong>
                {!! Form::text('nombre_distrito', $distrito->nombre_distrito, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de Distrito']) !!}
                @error('nombre_distrito')
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
