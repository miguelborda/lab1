<?php $__env->startSection('title', 'Crear Distrito'); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="css/datatable.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Crear Distrito</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        <?php echo Form::open(['route'=>'patologia.distritos.store']); ?>

            <div class="form-group">
                <strong><?php echo Form::label('codigo_distrito', 'Código de Distrito'); ?></strong>
                <?php echo Form::text('codigo_distrito', isset($distrito) ? $distrito->codigo_area : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Código de Distrito']); ?>

                <small class="text-danger"><?php echo e($errors->first('codigo_distrito')); ?></small>
            </div>
            <br>
            <div class="form-group">
                <strong><?php echo Form::label('nombre_distrito', 'Nombre de Distrito'); ?></strong>
                <?php echo Form::text('nombre_distrito', isset($distrito) ? $distrito->nombre_distrito : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre de Distrito']); ?>

                <?php $__errorArgs = ['nombre_distrito'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\usuariosHB\resources\views/patologia/distritos/create.blade.php ENDPATH**/ ?>