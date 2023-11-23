@extends('layouts.app')

@section('title', 'Distritos')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush
@section('content') 
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
      <div class="col-md-6">
        <div class="titlemb-30">
          <h2>Distritos</h2>
        </div>
      </div>
      <div class="col-md-6" style="text-align: right;">
        <div class="titlemb-30">
		{{-- <button type="button" class="btn btn-primary btn-lg">Nuevo</button> --}}
          <a href="{{ route('patologia.distritos.create') }}" class="btn btn-primary btn-lg">Nuevo</a>        
		  {{-- <button type="button" class="btn btn-success btn-lg" target="_blank">Imprimir Lista</button> --}}
		<a href="{{ route('patologia.distritos.pdf') }}" class="btn btn-success btn-lg" target="_blank">Imprimir Lista</a> 
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
		                  <th><h6>NOMBRE DISTRITO</h6></th>
		                  <th><h6>EDITAR</h6></th>
						  <th><h6>ESTADO</h6></th>
		                </tr>		                
		              </thead>
		              <tbody>
		              	@foreach($distritos as $distrito)
		                <tr>
		                  <td class="min-width">
		                    <p>{{$distrito->id}}</p>
		                  </td>
		                  <td class="min-width">
		                    <p>{{$distrito->nombre_distrito}}</p>
		                  </td>		                  
						  <td width="15px">
                            <a href="{{ route('patologia.distritos.edit', $distrito->id) }}" class="btn btn-warning btn-sm">Editar</a>
                          </td>
						  <td width="15px">
								@if($distrito->estado)
									<form action="{{ route('patologia.distritos.destroy', $distrito->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas DESACTIVAR este registro?');">
										@method('delete')
										@csrf
										<input type="submit" value="Desactivar" class="btn btn-danger btn-sm">
									</form>
								@else
									<form action="{{ route('patologia.distritos.habilitar', $distrito->id) }}" method="GET" onsubmit="return confirm('¿Estás seguro de que deseas ACTIVAR este registro?');">
										@method('GET')
										@csrf
										<input type="submit" value="Activar" class="btn btn-success btn-sm">
									</form>
								@endif
							</td>
		                  </td>
		                </tr>
		                @endforeach		                
		              </tbody>
		            </table>
		        </div>            
          	</div>
        </div>        
    </div>      
</div>
@endsection
@push('script')
    <script src="js/datatable.js"></script>
    <script>
$('#myTable').DataTable();
</script>
@endpush