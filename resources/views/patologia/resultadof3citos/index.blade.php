@extends('layouts.app')

@section('title', 'Resultadof3citos')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush
@section('content') 
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
      <div class="col-md-6">
        <div class="titlemb-30">
          <h2>Resultadof3citos</h2>
        </div>
      </div>
      <div class="col-md-6" style="text-align: right;">
        <div class="titlemb-30">
		{{-- <button type="button" class="btn btn-primary btn-lg">Nuevo</button> --}}
          <a href="{{ route('patologia.resultadof3citos.create') }}" class="btn btn-primary btn-lg">Nuevo</a>
		
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
		                  <th><h6>Nº EXAMEN</h6></th>
						  <th><h6>FECHA DE RESULTADO</h6></th>		                  
						  <th><h6>CODIGO DIAGNOSTICO</h6></th> 						  
		                  <th><h6>EDITAR</h6></th>
						  <th><h6>ELIMINAR</h6></th>
		                </tr>
		                <!-- end table row-->
		              </thead>
		              <tbody>
		              	@foreach($resultadof3citos as $resultadof3cito)
		                <tr>		                  
		                  <td class="min-width">
		                    <p>{{$resultadof3cito->num_examen}}</p>
		                  </td>		            
						  <td class="min-width">
		                    <p>{{$resultadof3cito->fecha_resultado}}</p>
		                  </td>		            						  
						  <td class="min-width">
		                    <p>{{$resultadof3cito->codigo_diagnostico}}</p>
		                  </td>		            						  
						  <td width="15px">
                            <a href="{{ route('patologia.resultadof3citos.edit', $resultadof3cito->id) }}" class="btn btn-warning btn-sm">Editar</a>
                          </td>
						  <td width="15px">
						  	<form action="{{ route('patologia.resultadof3citos.destroy', $resultadof3cito->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este registro?');">
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