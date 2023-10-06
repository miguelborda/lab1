

<?php $__env->startSection('title', 'Establecimientos'); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="css/datatable.css" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?> 
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
      <div class="col-md-6">
        <div class="titlemb-30">
          <h2>Establecimientos</h2>
        </div>
      </div>
      <div class="col-md-6" style="text-align: right;">
        <div class="titlemb-30">
			
          	<a href="<?php echo e(route('patologia.establecimientos.create')); ?>" class="btn btn-primary btn-lg">Nuevo</a>        
		  	
			<a href="<?php echo e(route('patologia.establecimientos.pdf')); ?>" class="btn btn-success btn-lg" target="_blank">Imprimir Lista</a> 
		</div>
        </div>
      </div>
    </div>
    <!-- end row -->
  </div>
<?php if(session('mensaje')): ?>
	<div class="alert alert-success">
		<strong><?php echo e(session('mensaje')); ?></strong>
	</div>
<?php endif; ?>  
<div class="tables-wrapper">
    <div class="row">
      	<div class="col-lg-12">
        	<div class="card-style mb-30">
				<div class="table-wrapper table-responsive">
		            <table class="table table-striped" id="myTable">
		              <thead>
		                <tr>
		                  <th><h6>CODIGO</h6></th>
		                  <th><h6>NOMBRE ESTABLECIMIENTO</h6></th>
		                  <th><h6>EDITAR</h6></th>
						  <th><h6>ELIMINAR</h6></th>
		                </tr>
		                <!-- end table row-->
		              </thead>
		              <tbody>
		              	<?php $__currentLoopData = $establecimientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $establecimiento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                <tr>
		                  <td class="min-width">
		                    <p><?php echo e($establecimiento->codigo_establecimiento); ?></p>
		                  </td>
		                  <td class="min-width">
		                    <p><?php echo e($establecimiento->nombre_establecimiento); ?></p>
		                  </td>		                  
						  <td width="15px">
                            <a href="<?php echo e(route('patologia.establecimientos.edit', $establecimiento->id)); ?>" class="btn btn-warning btn-sm">Editar</a>
                          </td>
						  <td width="15px">
							<form action="<?php echo e(route('patologia.establecimientos.destroy', $establecimiento->id)); ?>" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este registro?');">
								<?php echo method_field('delete'); ?>
								<?php echo csrf_field(); ?>
								<input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
							</form>
		                  </td>
		                </tr>
		                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="js/datatable.js"></script>
    <script>
$('#myTable').DataTable();
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\usuariosHB\resources\views/patologia/establecimientos/index.blade.php ENDPATH**/ ?>