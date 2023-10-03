@extends('layouts.app')

@section('title', 'Crear Diagnóstico')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Actualizar Diagnóstico {{$diagnostico->id}}</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('patologia.diagnosticos.update', $diagnostico->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas modificar este registro?');">
            @csrf
            @method('PUT')

            <div class="form-group">
                <strong>{!! Form::label('codigo_diagnostico', 'codigo de diagnostico') !!}</strong>
                {!! Form::text('codigo_diagnostico', $diagnostico->codigo_diagnostico, ['class' => 'form-control', 'placeholder' => 'Ingrese el código de diagnostico']) !!}
                <small class="text-danger">{{ $errors->first('codigo_diagnostico') }}</small>
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('descripcion_diagnostico', 'descripcion de diagnostico') !!}</strong>
                {!! Form::text('descripcion_diagnostico', $diagnostico->descripcion_diagnostico, ['class' => 'form-control', 'placeholder' => 'Ingrese descripcion']) !!}
                @error('descripcion_diagnostico')
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
