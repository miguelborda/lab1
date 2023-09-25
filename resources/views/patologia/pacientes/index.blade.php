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
		{{-- <button type="button" class="btn btn-primary btn-lg">Nuevo</button> --}}
          <a href="{{ route('patologia.paciente.create') }}" class="btn btn-primary btn-lg">Nuevo</a>        </div>
        </div>
      </div>
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
		            <table class="table hover" id="myTable">
		              <thead>
		                <tr>		                  
		                  <th><h6>CI</h6></th>						  
		                  <th><h6>NOMBRES</h6></th>
						  <th><h6>APELLIDOS</h6></th>
						  <th><h6>EDAD</h6></th>
		                  <th><h6>EDITAR</h6></th>
						  <th><h6>ELIMINAR</h6></th>
		                </tr>
		                <!-- end table row-->
		              </thead>
		              <tbody>
		              	@foreach($pacientes as $paciente)
		                <tr>		                  
		                  <td class="min-width">
		                    <p>{{$paciente->ci_paciente}}</p>
		                  </td>		            						  
		                  <td class="min-width">
		                    <p>{{$paciente->nombre_paciente}}</p>
		                  </td>		            
						  <td class="min-width">
		                    <p>{{$paciente->apellido_paciente}}</p>
		                  </td>		                  
						  <td><p>{{ floor(abs(strtotime($hoy)-strtotime($paciente->fecha_nacimiento))/(365*60*60*24)) }}</p></td> 
						  <td width="15px">
                            <a href="{{ route('patologia.paciente.edit', $paciente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                          </td>
						  <td width="15px">
                            <form action="{{ route('patologia.paciente.destroy',$paciente->id)}}" method="POST">
								@method('delete')
								@csrf
								<input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
							</form>
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