@extends('layouts.app')

@section('title', 'Secretaria Regional')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush
@section('content') 
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Secretaria Regional</h2>
            </div>
        </div>      
    </div>
    <!-- end row -->
</div>
<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'patologia.secretariaregional.store']) !!}
            <div class="form-group">
                {!! Form::label('codigo_regional', 'codigo_regional') !!}
                {!! Form::textarea('codigo_regional', null, ['class' => 'form-group', 'placeholder' => 'Codigo']) !!}
                <small class="text-danger">{{ $errors->first('codigo_regional') }}</small>                
                
            </div>
            <div class="form-group">
                {!! Form::label('nom_secretaria_regional', 'nom_secretaria_regional') !!}
                {!! Form::textarea('nom_secretaria_regional', null, ['class' => 'form-group', 'placeholder' => 'Nombre secretaria']) !!}
                @error('nom_secretaria_regional')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>            
            <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">            
            </div>
            {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}

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