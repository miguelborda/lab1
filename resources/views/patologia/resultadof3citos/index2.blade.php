@extends('layouts.app')

@section('title', 'Informesf3citos')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush
@section('content') 
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
      <div class="col-md-6">
        <div class="titlemb-30">
          <h2>Informes CITOLOGIA</h2>
        </div>
      </div>      
    </div>    
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
						  <th><h6>NOMBRE</h6></th>
						  <th><h6>APELLIDO</h6></th>
						  <th><h6>Reportes</h6></th>
						  <th><h6>Fecha Resultado</h6></th>
						  				  
		                </tr>
		                <!-- end table row-->
		              </thead>
		              <tbody>				  	

		              	@foreach($infors as $infor)
		                <tr>		                  
		                  <td class="min-width">
		                    <p>{{$infor->id}}</p>
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
		                    <p>{{$infor->apellido}}</p>
		                  </td>
						  <td width="15px">				  
						  <a href="{{ route('patologia.resultadof3citos.pdf', ['id' => $infor->id]) }}" class="btn btn-success btn-lg" target="_blank">Imprimir</a> 
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