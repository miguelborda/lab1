

<?php $__env->startSection('title', 'Formulario1s'); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="css/datatable.css" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?> 
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
      <div class="col-md-6">
        <div class="titlemb-30">
          <h2>Formulario1s</h2>
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
		            <table class="table table-striped" id="myTable">
		              <thead>
		                <tr>
		                  <th><h6>ID</h6></th>
		                  <th><h6>Nº INFORME</h6></th>
						  <th><h6>SECRETARIA</h6></th>
		                  <th><h6>MUNICIPIO</h6></th>
						  <th><h6>DISTRITO</h6></th>
						  <th><h6>DIAGNOSTICO</h6></th>
		                  <th><h6>Accion</h6></th>
		                </tr>
		                <!-- end table row-->
		              </thead>
		              <tbody>
		              	<?php $__currentLoopData = $formulario1s; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formulario1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                <tr>
		                  <td class="min-width">
		                    <p><?php echo e($formulario1->id_formulario1); ?></p>
		                  </td>
		                  <td class="min-width">
		                    <p><?php echo e($formulario1->num_informe1); ?></p>
		                  </td>		            
						  <td class="min-width">
		                    <p><?php echo e($formulario1->secretaria_regional); ?></p>
		                  </td>
		                  <td class="min-width">
		                    <p><?php echo e($formulario1->municipio); ?></p>
		                  </td>		            
						  <td class="min-width">
		                    <p><?php echo e($formulario1->distrito); ?></p>
		                  </td>		                  
						  <td>
		                  	<?php if($formulario1->trial === 'F'): ?>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\usuariosHB\resources\views/patologia/formulario1/index.blade.php ENDPATH**/ ?>