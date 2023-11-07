@extends('layouts.app')

@section('title', 'Secretaria Regional Crear')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush
@section('content') 
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Crear Secretaria Regional</h2>
            </div>
        </div>      
    </div>
    <!-- end row -->
</div>
<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'patologia.secretariaregional.store']) !!}
            <!--<div class="form-group">
                <strong>{!! Form::label('codigo_regional', 'Codigo') !!}</strong>                
                {!! Form::text('codigo_regional', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Codigo de Secretaria Regional']) !!}
                <small class="text-danger">{{ $errors->first('codigo_regional') }}</small>                
                
            </div>
            <br>-->
            <div class="form-group">
                <strong>{!! Form::label('nom_secretaria_regional', 'Nombre Secretaria Regional') !!}</strong>                
                {!! Form::text('nom_secretaria_regional', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre de Secretaria Regional']) !!}
                @error('nom_secretaria_regional')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>            
            <br>
            {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
            {!! Form::button('Volver', ['class' => 'btn btn-secondary', 'onclick' => 'window.history.go(-1);']) !!}

        {!! Form::close() !!} 

    </div>     
      <!-- end col -->
</div>
@endsection
@push('script')
    <script src="js/datatable.js"></script>
    <script>
$('#myTable').DataTable();
</script>
@endpush