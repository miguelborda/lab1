

<?php $__env->startSection('title', 'Informesf1s'); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="css/datatable.css" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?> 
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
      <div class="col-md-6">
        <div class="titlemb-30">
          <h2>Informesf1s</h2>
        </div>
      </div>      
    </div>    
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
		                  <th><h6>ID</h6></th>
						  <th><h6>Nº EXAMEN</h6></th>
						  <th><h6>CI</h6></th>
						  <th><h6>NOMBRE</h6></th>
						  <th><h6>APELLIDO</h6></th>
						  <th><h6>Reportes</h6></th>
						  				  
		                </tr>
		                <!-- end table row-->
		              </thead>
		              <tbody>				  	

		              	<?php $__currentLoopData = $infors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $infor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                <tr>		                  
		                  <td class="min-width">
		                    <p><?php echo e($infor->id); ?></p>
		                  </td>		            
						  <td class="min-width">
		                    <p><?php echo e($infor->num_examen); ?></p>
		                  </td>		            
						  <td class="min-width">
		                    <p><?php echo e($infor->ci); ?></p>
		                  </td>		            
						  <td class="min-width">
		                    <p><?php echo e($infor->paciente->nombre); ?></p>
		                  </td>		            
						  <td class="min-width">
		                    <p><?php echo e($infor->paciente->apellido); ?></p>
		                  </td>		            
						  
						  <td width="15px">				  
						  <a href="<?php echo e(route('patologia.resultadof1s.pdf', ['id' => $infor->id])); ?>" class="btn btn-success btn-lg" target="_blank">Imprimir</a> 
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\usuariosHB\resources\views/patologia/resultadof1s/index2.blade.php ENDPATH**/ ?>