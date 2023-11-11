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
                <h2>Editar Diagnóstico con Código: "{{$diagnostico->codigo_diagnostico}}"</h2>
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
                <strong>{!! Form::label('descripcion_diagnostico', 'descripcion de diagnostico') !!}</strong>
                {!! Form::text('descripcion_diagnostico', $diagnostico->descripcion_diagnostico, ['class' => 'form-control', 'placeholder' => 'Ingrese descripcion']) !!}
                @error('descripcion_diagnostico')
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
