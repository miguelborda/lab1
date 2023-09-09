@extends('layouts.app')

@section('title', 'Personas')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush
@section('content') 
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
      <div class="col-md-6">
        <div class="titlemb-30">
          <h2>Personas</h2>
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
		                  <th><h6>EXTENSION</h6></th>
		                  <th><h6>NOMBRES</h6></th>
		                  <th><h6>APELLIDOS</h6></th>
						  <th><h6>EDAD</h6></th>
						  <th><h6>accion</h6></th>
		                </tr>
		                <!-- end table row-->
		              </thead>
		              <tbody>
		              	@foreach($personas as $persona)
		                <tr>
		                  <td class="min-width">
		                    <p>{{$persona->id}}</p>
		                  </td>
		                  <td class="min-width">
		                    <p>{{$persona->ci}}</p>
		                  </td>
		                  <td class="min-width">
		                    <p>{{$persona->extension}}</p>
		                  </td>
						  <td class="min-width">
		                    <p>{{$persona->nombres}}</p>							
		                  </td>
						  <td class="min-width">
		                    <p>{{$persona->apellidos}}</p>
		                  </td>
		                  <td class="min-width">
		                		
							<p>{{ floor(abs(strtotime($hoy)-strtotime($persona->fecha_nacimiento))/(365*60*60*24)) }}</p>							
		                  </td>
		                  <td>
		                  	@if($persona->trial412 === 'F')
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