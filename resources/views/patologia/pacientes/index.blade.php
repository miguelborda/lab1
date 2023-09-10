@extends('layouts.app')

@section('title', 'Pacientes')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush
@section('content') 
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
      <div class="col-md-6">
        <div class="titlemb-30">
          <h2>Pacientes</h2>
        </div>
      </div>
      <div class="col-md-6" style="text-align: right;">
        <div class="titlemb-30">
          <button type="button" class="btn btn-primary btn-lg">Nuevo</button>
        </div>
      </div>
    </div>
    <!-- end row -->
  </div>
<div class="tables-wrapper">
    <div class="row">
      	<div class="col-lg-12">
        	<div class="card-style mb-30">
				<div class="table-wrapper table-responsive">
		            <table class="table hover" id="myTable">
		              <thead>
		                <tr>
		                  <th><h6>ID</h6></th>
		                  <th><h6>CI</h6></th>
						  <th><h6>Nº Asegurado</h6></th>
		                  <th><h6>NOMBRES</h6></th>
						  <th><h6>APELLIDOS</h6></th>
		                  <th><h6>Accion</h6></th>
		                </tr>
		                <!-- end table row-->
		              </thead>
		              <tbody>
		              	@foreach($pacientes as $paciente)
		                <tr>
		                  <td class="min-width">
		                    <p>{{$paciente->id_paciente}}</p>
		                  </td>
		                  <td class="min-width">
		                    <p>{{$paciente->ci_paciente}}</p>
		                  </td>		            
						  <td class="min-width">
		                    <p>{{$paciente->numero_asegurado}}</p>
		                  </td>
		                  <td class="min-width">
		                    <p>{{$paciente->nombre_paciente}}</p>
		                  </td>		            
						  <td class="min-width">
		                    <p>{{$paciente->apellido_paciente}}</p>
		                  </td>		                  
						  <td>
		                  	@if($paciente->hc === 'F')
		                        <a href="" class="text-danger"><i class="lni lni-thumbs-down"></i></a>
                            @else
		                        <a href="" class="text-blue"><i class="lni lni-thumbs-up"></i></a>
                            @endif
                            <button type="button" class="btn btn-primary btn-sm">Editar</button>
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