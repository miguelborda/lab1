@extends('layouts.app')

@section('title', 'Crear Detalle Paciente F1s')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Crear Detalle Paciente</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'patologia.detallef1s.store']) !!}
            <div class="form-group">
                <strong>{!! Form::label('num_examen', 'Numero de Examen') !!}</strong>
                {!! Form::text('num_examen', isset($detallef1s) ? $detallef1s->num_examen : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nº de Examen']) !!}
                <small class="text-danger">{{ $errors->first('num_examen') }}</small>
            </div>
            
            <div class="form-group">
                <strong>{!! Form::label('nombre', 'Nombre') !!}</strong>
                {!! Form::text('nombre', isset($detallef1s) ? $detallef1s->nombre : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre']) !!}
                <small class="text-danger">{{ $errors->first('nombre') }}</small>
            </div>
            
            <div class="form-group">
                <strong>{!! Form::label('edad', 'Edad') !!}</strong>
                {!! Form::text('edad', isset($detallef1s) ? $detallef1s->edad : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Edad']) !!}
                <small class="text-danger">{{ $errors->first('edad') }}</small>
            </div>
            <br>
            {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
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
