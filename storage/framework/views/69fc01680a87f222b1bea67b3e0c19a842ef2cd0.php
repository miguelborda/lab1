

<?php $__env->startSection('title', 'Editar Area'); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="css/datatable.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Actualizar Formulario1 de Solicitudes:  <?php echo e($formulario1s->num_solicitud); ?></h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo e(route('patologia.formulario1.update', $formulario1s->id)); ?>" onsubmit="return confirm('¿Estás seguro de que deseas modificar este registro?');">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <strong><?php echo Form::label('secretaria_regional', 'Secretaria Regional'); ?></strong>
                <?php echo Form::text('secretaria_regional', $formulario1s->secretaria_regional, ['class' => 'form-control', 'placeholder' => 'Ingrese la Secretaria Regional']); ?>

                <small class="text-danger"><?php echo e($errors->first('secretaria_regional')); ?></small>
            </div>
            <br>
            <div class="form-group">
                <strong><?php echo Form::label('municipio', 'Municipio'); ?></strong>
                <?php echo Form::text('municipio', $formulario1s->municipio, ['class' => 'form-control', 'placeholder' => 'Ingrese el Municipio']); ?>

                <small class="text-danger"><?php echo e($errors->first('municipio')); ?></small>
            </div>
            <br>
            <div class="form-group">
                <strong><?php echo Form::label('distrito', 'Distrito'); ?></strong>
                <?php echo Form::text('distrito', $formulario1s->distrito, ['class' => 'form-control', 'placeholder' => 'Ingrese el Distrito']); ?>

                <small class="text-danger"><?php echo e($errors->first('distrito')); ?></small>
            </div>
            <br>
            <div class="form-group">
                <strong><?php echo Form::label('area', 'Area'); ?></strong>
                <?php echo Form::text('area', $formulario1s->area, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre de Area']); ?>

                <small class="text-danger"><?php echo e($errors->first('area')); ?></small>
            </div>
            <br>
            <div class="form-group">
                <strong><?php echo Form::label('establecimiento', 'Establecimiento'); ?></strong>
                <?php echo Form::text('establecimiento', $formulario1s->establecimiento, ['class' => 'form-control', 'placeholder' => 'Ingrese el Establecimiento']); ?>

                <small class="text-danger"><?php echo e($errors->first('establecimiento')); ?></small>
            </div>
            <br>
            <div class="form-group">
                <strong><?php echo Form::label('sector', 'Sector'); ?></strong>
                <?php echo Form::text('sector', $formulario1s->sector, ['class' => 'form-control', 'placeholder' => 'Ingrese el Sector']); ?>

                <small class="text-danger"><?php echo e($errors->first('sector')); ?></small>
            </div>
            <br>
            <button type="submit" id="confirm-button" class="btn btn-primary">Guardar Cambios</button>                      
            
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    
    <script src="js/datatable.js"></script>
    <script>
        $('#myTable').DataTable();
    </script>
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\usuariosHB\resources\views/patologia/formulario1/edit.blade.php ENDPATH**/ ?>