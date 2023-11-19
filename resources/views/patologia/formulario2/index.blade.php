@extends('layouts.app')

@section('title', 'Formulario2s')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush
@section('content') 
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
      <div class="col-md-6">
        <div class="titlemb-30">
          <h2>Formulario2s</h2>
        </div>
      </div>
      <div class="col-md-6" style="text-align: right;">
        <div class="titlemb-30">
		{{-- <button type="button" class="btn btn-primary btn-lg">Nuevo</button> --}}
          <a href="{{ route('patologia.formulario2.create') }}" class="btn btn-primary btn-lg">Nuevo</a>
		{{-- <button type="button" class="btn btn-success btn-lg" target="_blank">Imprimir Lista</button> --}}
		<a href="{{ route('patologia.formulario2.pdf') }}" class="btn btn-success btn-lg" target="_blank">Imprimir Lista</a> 
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
		            <table class="table table-striped" id="myTable">
		              <thead>
		                <tr>		                  
		                  <th><h6>Nº SOL.</h6></th>
						  <th><h6>FECHA DE SOL.</h6></th>						  
						  <th><h6>DISTRITO</h6></th>
						  <th><h6>SECTOR.</h6></th> 
						  <th><h6>AREA</h6></th>
		                  <th><h6>EDITAR</h6></th>
						  <th><h6>ELIMINAR</h6></th>
		                </tr>
		                <!-- end table row-->
		              </thead>
		              <tbody>
		              	@foreach($formulario2s as $formulario2)
		                <tr>		                  
		                  <td class="min-width">
		                    <p>{{$formulario2->num_solicitud}}</p>
		                  </td>		            
						  <td class="min-width">
		                    <p>{{$formulario2->fecha_solicitud}}</p>
		                  </td>		            						  
						  <td class="min-width">
		                    <p>{{$formulario2->distrito->nombre_distrito}}</p>
		                  </td>		            
						  <td class="min-width">
		                    <p>{{$formulario2->sector->nombre_sector}}</p>
		                  </td>		            
						  <td class="min-width">
		                    <p>{{$formulario2->area->nombre_area}}</p>
		                  </td>		                  
						  <td width="15px">
                            <a href="{{ route('patologia.formulario2.edit', $formulario2->id) }}" class="btn btn-warning btn-sm">Editar</a>
                          </td>
						  <td width="15px">
						  	<form action="{{ route('patologia.formulario2.destroy', $formulario2->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este registro?');">
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