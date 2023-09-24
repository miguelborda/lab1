@extends('layouts.app')

@section('title', 'Editar Area')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Actualizar Area {{$area->id}}</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('patologia.areas.update', $area->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <strong>{!! Form::label('codigo_area', 'codigo de area') !!}</strong>
                {!! Form::text('codigo_area', $area->codigo_area, ['class' => 'form-control', 'placeholder' => 'Ingrese el código de Area']) !!}
                <small class="text-danger">{{ $errors->first('codigo_area') }}</small>
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('nombre_area', 'nombre de area') !!}</strong>
                {!! Form::text('nombre_area', $area->nombre_area, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de Area']) !!}
                @error('nombre_area')
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
