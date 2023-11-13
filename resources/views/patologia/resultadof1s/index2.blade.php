@extends('layouts.app')

@section('title', 'Informesf1s')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush
@section('content') 
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
      <div class="col-md-6">
        <div class="titlemb-30">
          <h2>Informesf1s</h2>
        </div>
      </div>
      <!--<div class="col-md-6" style="text-align: right;">
        <div class="titlemb-30">
		{{-- <button type="button" class="btn btn-primary btn-lg">Nuevo</button> --}}
          <a href="{{ route('patologia.resultadof1s.create') }}" class="btn btn-primary btn-lg">Nuevo</a>
		{{-- <button type="button" class="btn btn-success btn-lg" target="_blank">Imprimir Lista</button> --}}
		<a href="{{ route('patologia.resultadof1s.pdf') }}" class="btn btn-success btn-lg" target="_blank">Imprimir Lista</a> 
        </div>
      </div>-->
    </div>
    <!-- end row -->
  </div>
@if (session('mensaje'))
	<div class="alert alert-success">
		<strong>{{session('mensaje')}}</strong>
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
		                  <th><h6>ID</h6></th>
						  <th><h6>Nº EXAMEN</h6></th>
						  <th><h6>CI</h6></th> 
						  <th><h6>NOMBRE PACIENTE</h6></th>
						  <th><h6>APELLIDO PACIENTE</h6></th>
						  <th><h6>FECHA RESULTADO</h6></th> 						  
		                  <th><h6>IMPRIMIR</h6></th>						  
		                </tr>
		                <!-- end table row-->
		              </thead>
		              <tbody>				  	

		              	@foreach($detallef1s as $detallef1)
		                <tr>		                  
		                  <td class="min-width">
		                    <p>{{$detallef1->id}}</p>
		                  </td>		            
						  <td class="min-width">
		                    <p>{{$detallef1->num_examen}}</p>
		                  </td>		            
						  <td class="min-width">
		                    <p>{{$detallef1->paciente->ci}}</p>
		                  </td>
		                  <td class="min-width">
		                    <p>{{$detallef1->paciente->nombre}}</p>
		                  </td>		            
						  <td class="min-width">
		                    <p>{{$detallef1->paciente->apellido}}</p>
		                  </td>		            						  
						  	            
						  <td class="min-width">
		                    <p>{{$detallef1->fecha_resultado}}</p>
		                  </td>
						  <td width="15px">				  
						  <a href="{{ route('patologia.resultadof1s.pdf', $detallef1->id) }}" class="btn btn-success btn-lg" target="_blank">Imprimir</a> 
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