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
                <h2>Crear Diagnóstico</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'patologia.diagnosticos.store']) !!}
            <div class="form-group">
                <strong>{!! Form::label('codigo_diagnostico', 'Código de Diagnóstico') !!}</strong>
                {!! Form::text('codigo_diagnostico', isset($diagnostico) ? $diagnostico->codigo_diagnostico : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Código de Diagnóstico']) !!}
                <small class="text-danger">{{ $errors->first('codigo_diagnostico') }}</small>
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('descripcion_diagnostico', 'Descripción de Diagnóstico') !!}</strong>
                {!! Form::text('descripcion_diagnostico', isset($diagnostico) ? $diagnostico->descripcion_diagnostico : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Descripción']) !!}
                @error('descripcion_diagnostico')
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
