@extends('layouts.app')

@section('title', 'Editar Detalle Paciente F1s')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush

@section('content')
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Actualizar Detalle Paciente F1s {{$detallef1s->id}}</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('patologia.detallef1s.update', $detallef1s->id) }}" onsubmit="return confirm('¿Estás seguro de que deseas modificar este registro?');">
            @csrf
            @method('PUT')

            <div class="form-group">
                <strong>{!! Form::label('nombre', 'Nombre') !!}</strong>
                {!! Form::text('nombre', $detallef1s->nombre, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre']) !!}
                <small class="text-danger">{{ $errors->first('nombre') }}</small>
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('edad', 'Edad') !!}</strong>
                {!! Form::text('edad', $detallef1s->edad, ['class' => 'form-control', 'placeholder' => 'Ingrese Edad']) !!}
                @error('edad')
                    <span class="text-danger">{{$message}}</span>
                @enderror
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
