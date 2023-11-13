

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
      <!--<div class="col-md-6" style="text-align: right;">
        <div class="titlemb-30">
		
          <a href="<?php echo e(route('patologia.resultadof1s.create')); ?>" class="btn btn-primary btn-lg">Nuevo</a>
		
		<a href="<?php echo e(route('patologia.resultadof1s.pdf')); ?>" class="btn btn-success btn-lg" target="_blank">Imprimir Lista</a> 
        </div>
      </div>-->
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
		                  <th><h6>ID</h6></th>
						  <th><h6>Nº EXAMEN</h6></th>
						  <th><h6>CI</h6></th> 
						  <th><h6>NOMBRE PACIENTE</h6></th>
						  <th><h6>APELLIDO PACIENTE</h6></th>
						  <th><h6>FECHA RESULTADO</h6></th> 						  
		                  <th><h6>IMPRIMIR</h6></th>						  
		                </tr>
		                <!-- end table row-->
		              </thead>
		              <tbody>				  	

		              	<?php $__currentLoopData = $detallef1s; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detallef1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                <tr>		                  
		                  <td class="min-width">
		                    <p><?php echo e($detallef1->id); ?></p>
		                  </td>		            
						  <td class="min-width">
		                    <p><?php echo e($detallef1->num_examen); ?></p>
		                  </td>		            
						  <td class="min-width">
		                    <p><?php echo e($detallef1->paciente->ci); ?></p>
		                  </td>
		                  <td class="min-width">
		                    <p><?php echo e($detallef1->paciente->nombre); ?></p>
		                  </td>		            
						  <td class="min-width">
		                    <p><?php echo e($detallef1->paciente->apellido); ?></p>
		                  </td>		            						  
						  	            
						  <td class="min-width">
		                    <p><?php echo e($detallef1->fecha_resultado); ?></p>
		                  </td>
						  <td width="15px">				  
						  <a href="<?php echo e(route('patologia.resultadof1s.pdf', $detallef1->id)); ?>" class="btn btn-success btn-lg" target="_blank">Imprimir</a> 
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