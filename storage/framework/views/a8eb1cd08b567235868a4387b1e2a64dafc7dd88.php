

<?php $__env->startSection('title', 'Personas'); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="css/datatable.css" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?> 
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
		              	<?php $__currentLoopData = $personas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $persona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                <tr>
		                  <td class="min-width">
		                    <p><?php echo e($persona->id); ?></p>
		                  </td>
		                  <td class="min-width">
		                    <p><?php echo e($persona->ci); ?></p>
		                  </td>
		                  <td class="min-width">
		                    <p><?php echo e($persona->extension); ?></p>
		                  </td>
						  <td class="min-width">
		                    <p><?php echo e($persona->nombres); ?></p>							
		                  </td>
						  <td class="min-width">
		                    <p><?php echo e($persona->apellidos); ?></p>
		                  </td>
		                  <td class="min-width">
		                		
							<p><?php echo e(floor(abs(strtotime($hoy)-strtotime($persona->fecha_nacimiento))/(365*60*60*24))); ?></p>							
		                  </td>
		                  <td>
		                  	<?php if($persona->trial412 === 'F'): ?>
		                        <a href="" class="text-danger"><i class="lni lni-thumbs-down"></i></a>
                            <?php else: ?>
		                        <a href="" class="text-blue"><i class="lni lni-thumbs-up"></i></a>
                            <?php endif; ?>
                            <button type="button" class="btn btn-primary btn-sm">Editar</button>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\usuariosHB\resources\views/sistemas/personas/index.blade.php ENDPATH**/ ?>