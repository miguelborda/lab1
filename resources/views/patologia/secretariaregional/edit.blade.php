
@extends('layouts.app')

@section('title', 'Editar Secretaria ')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush
@section('content') 
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">                
                <h2>Editar Secretaría {{$secretariaregional->id}}</h2>                
            </div>
        </div>      
    </div>
    <!-- end row -->
</div>
@if(session('mensaje'))
    <div class="alert alert-success">
        <strong>{{session('mensaje')}}</strong>
    </div>
@endif
    
</div>
<div class="card">
    <div class="card-body">

    
        {!! Form::model(['route' => ['patologia.secretariaregional.update',$secretariaregional->id],
                         'method' => 'POST']) !!}
                         
            <div class="form-group">
                <strong>{!! Form::label('codigo_regional', 'Codigo') !!}  </strong>                
                {!! Form::text('codigo_regional', null, ['class' => 'form-control', 'placeholder' => $secretariaregional->codigo_regional]) !!}
                
                <small class="text-danger">{{ $errors->first('codigo_regional') }}</small>                
                
            </div>
            <br>
            <div class="form-group">
                <strong>{!! Form::label('nom_secretaria_regional', 'Nombre Secretaria Regional') !!}</strong>                
                {!! Form::text('nom_secretaria_regional', null, ['class' => 'form-control', 'placeholder' => $secretariaregional->nom_secretaria_regional]) !!}
                @error('nom_secretaria_regional')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>            
            <br>
                {{ method_field('PUT') }} <!-- Add this hidden field -->
            {!! Form::submit('Actualizar Datos',['class'=>'btn btn-primary']) !!}
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
