<?php $__env->startSection('title', 'Crear Paciente'); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="css/datatable.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Crear Paciente</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        <?php echo Form::open(['route'=>'patologia.paciente.store']); ?>

            <div class="form-group">
                <strong><?php echo Form::label('ci_paciente', 'CI de Paciente'); ?></strong>
                <?php echo Form::text('ci_paciente', isset($paciente) ? $paciente->ci_paciente : '', ['class' => 'form-control', 'placeholder' => 'Ingrese CI de Paciente']); ?>

                <small class="text-danger"><?php echo e($errors->first('ci_paciente')); ?></small>
            </div>
            <br>
            <div class="form-group">
                <strong><?php echo Form::label('nombre_paciente', 'Nombre de Paciente'); ?></strong>
                <?php echo Form::text('nombre_paciente', isset($paciente) ? $paciente->nombre_paciente : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre de Paciente']); ?>

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
                <strong><?php echo Form::label('apellido_paciente', 'Apellido de Paciente'); ?></strong>
                <?php echo Form::text('apellido_paciente', isset($paciente) ? $paciente->apellido_paciente : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Apellido de Paciente']); ?>

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
            <div class="form-group">                
                <strong><?php echo Form::label('fecha_nacimiento', 'Fecha de Nacimiento '); ?></strong>
                <?php echo Form::date('fecha_nacimiento', isset($paciente) ? $paciente->fecha_nacimiento : '', ['max' => now()->toDateString(), 'min' => '1900-01-01']); ?>

                <?php $__errorArgs = ['fecha_nacimiento'];
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
            <div class="form-group">                
                <strong><?php echo Form::label('sexo', 'Sexo'); ?></strong>
                <?php echo Form::select('sexo', ['Hombre' => 'Hombre', 'Mujer' => 'Mujer'], isset($paciente->sexo) ? $paciente->sexo : null, ['class' => 'form-control']); ?>

                <?php $__errorArgs = ['sexo'];
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\usuariosHB\resources\views/patologia/pacientes/create.blade.php ENDPATH**/ ?>