@extends('layouts.app')

@section('title', 'Informesf2s')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush
@section('content') 
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
      <div class="col-md-6">
        <div class="titlemb-30">
          <h2>Informes URBANO</h2>
        </div>
      </div>      
    </div>    
  </div>
@if (session('mensaje'))
<div class="row">
	<div class="alert alert-success">		
		<strong>{{session('mensaje')}}</strong>		
	</div>
	
	<div class="col-md-3">
        	{!! Form::button('Crear Nuevo Resultado', ['class' => 'btn btn-primary', 'onclick' => 'window.location.href="'.route("patologia.resultadof2s.create").'"']) !!}
	</div>	
</div>
@endif  
<div class="tables-wrapper">
    <div class="row">
      	<div class="col-lg-12">
        	<div class="card-style mb-30">
				<div class="table-wrapper table-responsive">
		            <table class="table table-striped" id="myTable">
					<thead>
		                <tr>		                  
		                  <th><h6>Nº Sol.</h6></th>
						  <th><h6>Nº EXAMEN</h6></th>
						  <th><h6>CI</h6></th>
						  <th><h6>NOMBRE</h6></th>
						  <th><h6>APELLIDO</h6></th>
						  <th><h6>FECHA RESULTADO</h6></th>
						  <th><h6>INFORMES</h6></th>
						  				  
		                </tr>
		                <!-- end table row-->
		              </thead>
		              <tbody>				  	

		              	@foreach($infors as $infor)
		                <tr>		                  
		                  <td class="min-width">
		                    <p>{{$infor->num_solicitud_id}}</p>
		                  </td>		            
						  <td class="min-width">
		                    <p>{{$infor->num_examen}}</p>
		                  </td>		            
						  <td class="min-width">
		                    <p>{{$infor->ci}}</p>
		                  </td>		            
						  <td class="min-width">
		                    <p>{{$infor->paciente->nombre}}</p>
		                  </td>		            
						  <td class="min-width">
		                    <p>{{$infor->paciente->apellido}}</p>
		                  </td>		            
						  <td class="min-width">
		                    <p>{{ $infor->fecha_resultado ? $infor->fecha_resultado : 'Aún No Llenado' }}</p>
		                  </td>
						  <td width="15px">				  
						  <a href="{{ route('patologia.resultadof2s.pdf', ['id' => $infor->id]) }}" class="btn btn-success btn-lg" target="_blank">Imprimir</a> 
                          </td>							
		                </tr>
		                @endforeach
		                <!-- end table row -->
		              </tbody>
		            </table>
		        </div>
            <!-- end table -->
          	</div>
        </div>
        <!-- end card -->
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