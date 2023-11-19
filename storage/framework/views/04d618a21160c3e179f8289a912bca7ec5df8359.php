

<?php $__env->startSection('title', 'Crear Detalle Paciente F2s'); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="css/datatable.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Crear Detalle Paciente</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        <?php echo Form::open(['route'=>'patologia.detallef2s.store']); ?>

            <div class="form-group">
                <strong><?php echo Form::label('num_examen', 'Numero de Examen'); ?></strong>
                <?php echo Form::text('num_examen', isset($detallef2s) ? $detallef2s->num_examen : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nº de Examen']); ?>

                <small class="text-danger"><?php echo e($errors->first('num_examen')); ?></small>
            </div>
            
            <div class="form-group">
                <strong><?php echo Form::label('nombre', 'Nombre'); ?></strong>
                <?php echo Form::text('nombre', isset($detallef2s) ? $detallef2s->nombre : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre']); ?>

                <small class="text-danger"><?php echo e($errors->first('nombre')); ?></small>
            </div>
            
            <div class="form-group">
                <strong><?php echo Form::label('edad', 'Edad'); ?></strong>
                <?php echo Form::text('edad', isset($detallef2s) ? $detallef2s->edad : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Edad']); ?>

                <small class="text-danger"><?php echo e($errors->first('edad')); ?></small>
            </div>
            <br>
            <?php echo Form::submit('Guardar',['class'=>'btn btn-primary']); ?>

        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="js/datatable.js"></script>
    <script>
        $('#myTable').DataTable();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\usuariosHB\resources\views/patologia/detallef2s/create.blade.php ENDPATH**/ ?>