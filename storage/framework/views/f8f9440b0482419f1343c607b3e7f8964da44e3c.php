

<?php $__env->startSection('title', 'Crear Medico'); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="css/datatable.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Ingresar Datos de Nuevo Medico</h2>
            </div>
        </div>
    </div>    
</div>
<div class="card">
    <div class="card-body">
        <?php echo Form::open(['route'=>'patologia.medicos.store']); ?>

        <!--<span class="text-danger">Los campos con * son de llenado obligatorio</span>-->
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <strong><?php echo Form::label('ci', 'CI'); ?><span class="text-danger">*</span></strong>
                    <?php echo Form::text('ci', isset($medico) ? $medico->ci : '', ['class' => 'form-control', 'placeholder' => 'Ingrese CI de Medico']); ?>

                    <small class="text-danger"><?php echo e($errors->first('ci')); ?></small>
                </div>
            <br>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <strong><?php echo Form::label('nombre', 'Nombres'); ?><span class="text-danger">*</span></strong>
                    <?php echo Form::text('nombre', isset($medico) ? $medico->nombre : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre de Medico']); ?>

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
                    <?php echo Form::text('apellido', isset($medico) ? $medico->apellido : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Apellido de Medico']); ?>

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
            <div class="col-md-3">
                <div class="form-group">
                    <strong><?php echo Form::label('fecha_nacimiento', 'Fecha de Nacimiento'); ?><span class="text-danger">*</span></strong>
                    <?php echo Form::date('fecha_nacimiento', isset($medico) ? $medico->fecha_nacimiento : '', ['max' => now()->toDateString(), 'min' => '1900-01-01', 'id' => 'fecha_nacimiento']); ?>

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
                    <?php echo Form::text('edad', isset($medico) ? $medico->edad : '', ['class' => 'form-control', 'id' => 'edad', 'readonly' => 'readonly']); ?>

                </div>
            </div>            
            </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <strong><?php echo Form::label('direccion', 'Dirección'); ?></strong>
                    <?php echo Form::text('direccion', isset($medico) ? $medico->direccion : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Direccion de Medico']); ?>

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
                    <?php echo Form::select('sexo', ['Hombre' => 'Hombre', 'Mujer' => 'Mujer'], isset($medico->sexo) ? $medico->sexo : null, ['class' => 'form-control']); ?>

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
            <div class="col-md-3">
                <div class="form-group">
                    <strong><?php echo Form::label('especialidad', 'Especialidad'); ?></strong>
                    <?php echo Form::text('especialidad', isset($medico) ? $medico->especialidad : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Especialidad']); ?>

                    <?php $__errorArgs = ['especialidad'];
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
                    <strong><?php echo Form::label('matricula_profesional', 'Nº Matricula Profesional'); ?></strong>
                    <?php echo Form::text('matricula_profesional', isset($medico) ? $medico->matricula_profesional : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nº de Matricula Profesional']); ?>

                    <?php $__errorArgs = ['matricula_profesional'];
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
            <div class="col-md-3">
                <div class="form-group">
                    <strong><?php echo Form::label('email', 'Correo Electrónico'); ?></strong>
                    <?php echo Form::text('email', isset($medico) ? $medico->email : '', ['class' => 'form-control', 'placeholder' => 'Ingrese direccion de Correo Electrónico']); ?>

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
                    <strong><?php echo Form::label('num_celular', 'Nº de Celular'); ?></strong>
                    <?php echo Form::text('num_celular', isset($medico) ? $medico->num_celular : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Nº de Celular']); ?>

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
            <?php echo Form::submit('Guardar',['class'=>'btn btn-primary']); ?>

            <?php echo Form::button('Volver', ['class' => 'btn btn-secondary', 'onclick' => 'window.history.go(-1);']); ?>


        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="js/datatable.js"></script>
    <script>
        $('#myTable').DataTable();
    </script>  
<script>
    var fechaNacimiento = document.getElementById('fecha_nacimiento');
    var edadCampo = document.getElementById('edad');

    fechaNacimiento.addEventListener('input', function() {
        if (fechaNacimiento.value) {
            // Calcula la edad a partir de la fecha de nacimiento y la fecha actual
            var fechaNacimientoValue = new Date(fechaNacimiento.value);
            var hoy = new Date();
            var edad = hoy.getFullYear() - fechaNacimientoValue.getFullYear();

            if (hoy < new Date(hoy.getFullYear(), fechaNacimientoValue.getMonth(), fechaNacimientoValue.getDate())) {
                edad--;
            }

            // Llena el campo "edad" y desactívalo
            edadCampo.value = edad;
            edadCampo.setAttribute('disabled', 'disabled');
        } else {
            // Si no se selecciona una fecha de nacimiento, borra el valor y habilita el campo "edad"
            edadCampo.value = '';
            edadCampo.removeAttribute('disabled');
        }
    });

    edadCampo.addEventListener('input', function() {
        if (edadCampo.value) {
            // Desactiva el campo "fecha_nacimiento"
            fechaNacimiento.setAttribute('disabled', 'disabled');
        } else {
            // Habilita el campo "fecha_nacimiento"
            fechaNacimiento.removeAttribute('disabled');
        }
    });
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\usuariosHB\resources\views/patologia/medicos/create.blade.php ENDPATH**/ ?>