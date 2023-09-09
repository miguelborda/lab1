@extends('layouts.app')

@section('title', 'Roles')
@push('style')
    <link rel="stylesheet" href="css/datatable.css" />
@endpush
@section('content') 
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
      <div class="col-md-6">
        <div class="titlemb-30">
          <h2>Roles</h2>
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
		                  <th><h6>NOMBRE</h6></th>
		                  <th><h6>SLUG</h6></th>
		                  <th><h6>DESCRIPCION</h6></th>
		                  <th><h6>NIVEL</h6></th>
						  <th><h6>AREA</h6></th>
						  <th><h6>accion</h6></th>
		                </tr>
		                <!-- end table row-->
		              </thead>
		              <tbody>
		              	@foreach($roles as $role)
		                <tr>
		                  <td class="min-width">
		                    <p>{{$role->id}}</p>
		                  </td>
		                  <td class="min-width">
		                    <p>{{$role->name}}</p>
		                  </td>
		                  <td class="min-width">
		                    <p>{{$role->slug}}</p>
		                  </td>
						  <td class="min-width">
		                    <p>{{$role->description}}</p>							
		                  </td>
						  <td class="min-width">
		                    <p>{{$role->level}}</p>
		                  </td>
		                  <td class="min-width">
		                		
							<p>{{$role->area}}</p>							
		                  </td>
		                  <td>
		                  	@if($role->trial412 === 'F')
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