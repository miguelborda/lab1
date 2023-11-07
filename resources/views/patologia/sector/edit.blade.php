@extends('layouts.app')

@section('title', 'Editar Sector')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Editar Sector con ID: {{$sector->id}}</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('patologia.sector.update', $sector->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas modificar este registro?');">
            @csrf
            @method('PUT')

            <!--<div class="form-group">
                <strong>{!! Form::label('codigo_sector', 'codigo de sector') !!}</strong>
                {!! Form::text('codigo_sector', $sector->codigo_sector, ['class' => 'form-control', 'placeholder' => 'Ingrese el código Sector']) !!}
                <small class="text-danger">{{ $errors->first('codigo_sector') }}</small>
            </div>
            <br>-->
            <div class="form-group">
                <strong>{!! Form::label('nombre_sector', 'nombre de sector') !!}</strong>
                {!! Form::text('nombre_sector', $sector->nombre_sector, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de Sector']) !!}
                @error('nombre_sector')
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
