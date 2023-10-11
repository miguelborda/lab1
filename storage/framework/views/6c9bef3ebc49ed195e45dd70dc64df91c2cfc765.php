<?php $__env->startSection('title', 'Editar Paciente'); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="css/datatable.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Actualizar datos de Paciente <?php echo e($paciente->id); ?></h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo e(route('patologia.paciente.update', $paciente->id)); ?>" onsubmit="return confirm('¿Estás seguro de que deseas modificar este registro?');">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <strong><?php echo Form::label('ci_paciente', 'ci de paciente'); ?></strong>
                <?php echo Form::text('ci_paciente', $paciente->ci_paciente, ['class' => 'form-control', 'placeholder' => 'Ingrese CI de Paciente']); ?>

                <small class="text-danger"><?php echo e($errors->first('ci_paciente')); ?></small>
            </div>
            <br>
            <div class="form-group">
                <strong><?php echo Form::label('nombre_paciente', 'nombre de paciente'); ?></strong>
                <?php echo Form::text('nombre_paciente', $paciente->nombre_paciente, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre de Paciente']); ?>

                <?php $__errorArgs = ['nombre_paciente'];
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
            <div class="form-group">
                <strong><?php echo Form::label('apellido_paciente', 'apellido de paciente'); ?></strong>
                <?php echo Form::text('apellido_paciente', $paciente->apellido_paciente, ['class' => 'form-control', 'placeholder' => 'Ingrese apellido de Paciente']); ?>

                <?php $__errorArgs = ['apellido_paciente'];
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
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\usuariosHB\resources\views/patologia/pacientes/edit.blade.php ENDPATH**/ ?>