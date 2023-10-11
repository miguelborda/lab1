<?php $__env->startSection('title', 'Crear Formulario1'); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="css/datatable.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Crear Formulario1</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        <?php echo Form::open(['route'=>'patologia.formulario1.store']); ?>

            <div class="form-group">
                <strong><?php echo Form::label('num_solicitud', 'Numero de Solicitud'); ?></strong>
                <?php echo Form::text('num_solicitud', isset($formulario1) ? $formulario->num_solicitud : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Numero de Formulario']); ?>

                <small class="text-danger"><?php echo e($errors->first('num_solicitud')); ?></small>
            </div>
            <br>
            <div class="form-group">
                <strong><?php echo Form::label('fecha_solicitud', 'Fecha de Solicitud'); ?></strong>
                <?php echo Form::date('fecha_solicitud', isset($formulario1) ? $formulario1->fecha_solicitud : '', ['max' => now()->toDateString(), 'min' => '1900-01-01']); ?>               
                <?php $__errorArgs = ['fecha_solicitud'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div><br>
            <div class="form-group">
                <strong><?php echo Form::label('paciente', 'Nombre del Paciente'); ?></strong>
                <?php echo Form::text('paciente', isset($formulario1) ? $formulario1->paciente : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre del Paciente']); ?>

                <small class="text-danger"><?php echo e($errors->first('paciente')); ?></small>
            </div>
            <div class="form-group">
                <strong><?php echo Form::label('edad_paciente', 'Edad de Paciente'); ?></strong>
                <?php echo Form::text('edad_paciente', isset($formulario1) ? $formulario1->edad_paciente : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Edad del Paciente']); ?>

                <small class="text-danger"><?php echo e($errors->first('edad_paciente')); ?></small>
            </div>
            <div class="form-group">
                <strong><?php echo Form::label('municipio', 'Municipio'); ?></strong>
                <?php echo Form::select('municipio', $municipios, isset($formulario1) ? $formulario1->municipio : null, ['class' => 'form-control', 'placeholder' => 'Selecciona un municipio']); ?>

                <small class="text-danger"><?php echo e($errors->first('municipio')); ?></small>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\usuariosHB\resources\views/patologia/formulario1/create.blade.php ENDPATH**/ ?>