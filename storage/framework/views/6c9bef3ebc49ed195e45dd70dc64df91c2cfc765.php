

<?php $__env->startSection('title', 'Editar Paciente'); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="css/datatable.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-12">
            <div class="titlemb-30">
                <h3>Editar datos de Paciente: <?php echo e($paciente->nombre); ?>, <?php echo e($paciente->apellido); ?></h3>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo e(route('patologia.pacientes.update', $paciente->id)); ?>" onsubmit="return confirm('¿Estás seguro de que deseas modificar este registro?');">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <strong><?php echo Form::label('ci', 'CI'); ?><span class="text-danger">*</span></strong>
                    <?php echo Form::text('ci', isset($paciente) ? $paciente->ci : '', ['class' => 'form-control', 'placeholder' => 'Ingrese CI de Paciente']); ?>

                    <small class="text-danger"><?php echo e($errors->first('ci')); ?></small>
                </div>
            <br>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <strong><?php echo Form::label('nombre', 'Nombres'); ?><span class="text-danger">*</span></strong>
                    <?php echo Form::text('nombre', isset($paciente) ? $paciente->nombre : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre de Paciente']); ?>

                    <?php $__errorArgs = ['nombre'];
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
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <strong><?php echo Form::label('apellido', 'Apellidos'); ?><span class="text-danger">*</span></strong>
                    <?php echo Form::text('apellido', isset($paciente) ? $paciente->apellido : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Apellido de Paciente']); ?>

                    <?php $__errorArgs = ['apellido'];
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
            </div>           
            <div class="col-md-2">
                <div class="form-group">
                    <strong><?php echo Form::label('fecha_nacimiento', 'Fecha de Nacimiento'); ?></strong>
                    <?php echo Form::date('fecha_nacimiento', isset($paciente) ? $paciente->fecha_nacimiento : '', ['max' => now()->toDateString(), 'min' => '1900-01-01', 'id' => 'fecha_nacimiento']); ?>

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
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <strong><?php echo Form::label('edad', 'Edad'); ?></strong>
                    <?php echo Form::text('edad', isset($paciente) ? $paciente->edad : '', ['class' => 'form-control', 'id' => 'edad', 'enabled' => 'disabled']); ?>

                </div>
            </div>            
            </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <strong><?php echo Form::label('direccion', 'Dirección'); ?></strong>
                    <?php echo Form::text('direccion', isset($paciente) ? $paciente->direccion : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Direccion de Paciente']); ?>

                    <?php $__errorArgs = ['direccion'];
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
            </div>
            <div class="col-md-2">
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
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <strong><?php echo Form::label('hc', 'HC'); ?></strong>
                    <?php echo Form::text('hc', isset($paciente) ? $paciente->hc : '', ['class' => 'form-control', 'placeholder' => 'Ingrese HC']); ?>

                    <?php $__errorArgs = ['hc'];
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
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <strong><?php echo Form::label('email', 'Correo Electrónico'); ?></strong>
                    <?php echo Form::text('email', isset($paciente) ? $paciente->email : '', ['class' => 'form-control', 'placeholder' => 'Ingrese direccion de Correo Electrónico']); ?>

                    <?php $__errorArgs = ['email'];
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
            </div>        
            <div class="col-md-2">
                <div class="form-group">
                    <strong><?php echo Form::label('num_asegurado', 'Nº Asegurado'); ?></strong>
                    <?php echo Form::text('num_asegurado', isset($paciente) ? $paciente->num_asegurado : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nº de Asegurado']); ?>

                    <?php $__errorArgs = ['num_asegurado'];
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
            </div>        
            <div class="col-md-2">
                <div class="form-group">
                    <strong><?php echo Form::label('num_celular', 'Nº de Celular'); ?></strong>
                    <?php echo Form::text('num_celular', isset($paciente) ? $paciente->num_celular : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nº de Celular']); ?>

                    <?php $__errorArgs = ['num_celular'];
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
            </div>
        </div>
            <br>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <?php echo Form::button('Volver', ['class' => 'btn btn-secondary', 'onclick' => 'window.history.go(-1);']); ?>


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