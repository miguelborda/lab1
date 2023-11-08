

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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#agregarLinea").click(function() {
        // Clonar la primera línea
        var primeraLinea = $(".custom-bg2:first").clone();
        primeraLinea.find('input').val('');
        
        // Agregar el botón "Eliminar" a la línea clonada
        var botonEliminar = $('<button class="eliminarLinea">Quitar Linea de Registro</button>');
        botonEliminar.click(function() {
            primeraLinea.remove();
        });
        primeraLinea.append(botonEliminar);
        
        // Insertar la línea clonada después de la primera línea
        $(".custom-bg2:first").after(primeraLinea);
    });

    // Controlador para eliminar la primera línea clonada
    $(document).on("click", ".eliminarLinea", function() {
        $(this).parent().remove();
    });
});
</script>





<style>
.custom-bg {
background-color: #DCEEEE; /* Cambia #ff0000 al color que desees */
border-radius: 10px; /* Cambia el valor para ajustar el radio del borde */
}
.custom-bg2 {
background-color: #DEE0E0; /* Cambia #ff0000 al color que desees */
border-radius: 10px; /* Cambia el valor para ajustar el radio del borde */
}
</style>
<div class="card">
    <div class="card-body">
        <?php echo Form::open(['route'=>'patologia.formulario1.store']); ?>

        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <strong><?php echo Form::label('num_solicitud', 'Numero de Solicitud'); ?></strong>
                    <?php echo Form::text('num_solicitud', isset($formulario1) ? $formulario1->num_solicitud : '', ['class' => 'form-control', 'placeholder' => 'Ingrese Numero de Formulario']); ?>

                    <small class="text-danger"><?php echo e($errors->first('num_solicitud')); ?></small>
                </div>
            </div>
            <div class="col-md-6">
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
                </div>
            </div>
        </div><br>        
    <div class="row custom-bg">
        <div class="col-md-4">            
            <div class="form-group">
                <strong><?php echo Form::label('secretaria_regional_id', 'Secretaria Regional'); ?></strong>
                <?php echo Form::select('secretaria_regional_id', $secretariaregionals, isset($formulario1) ? $formulario1->secretaria_regional : null, ['class' => 'form-control', 'placeholder' => 'Selecciona una Secretaria Regional']); ?>

                <small class="text-danger"><?php echo e($errors->first('secretaria_regional_id')); ?></small>
            </div>
        </div>
        <div class="col-md-4">            
            <div class="form-group">
                <strong><?php echo Form::label('municipio_id', 'Municipio'); ?></strong>
                <?php echo Form::select('municipio_id', $municipios, isset($formulario1) ? $formulario1->municipio_id : null, ['class' => 'form-control', 'placeholder' => 'Selecciona un Municipio']); ?>

                <small class="text-danger"><?php echo e($errors->first('municipio_id')); ?></small>
            </div>
        </div>
        <div class="col-md-4">            
            <div class="form-group">
                <strong><?php echo Form::label('distrito_id', 'Distrito'); ?></strong>
                <?php echo Form::select('distrito_id', $distritos, isset($formulario1) ? $formulario1->distrito_id : null, ['class' => 'form-control', 'placeholder' => 'Selecciona un Distrito']); ?>

                <small class="text-danger"><?php echo e($errors->first('distrito_id')); ?></small>
            </div>
        </div>
    </div>
    <div class="row custom-bg">
        <div class="col-md-4">            
            <div class="form-group">
                <strong><?php echo Form::label('area_id', 'Area'); ?></strong>
                <?php echo Form::select('area_id', $areas, isset($formulario1) ? $formulario1->area_id : null, ['class' => 'form-control', 'placeholder' => 'Selecciona una Area']); ?>

                <small class="text-danger"><?php echo e($errors->first('area_id')); ?></small>
            </div>
        </div>
        <div class="col-md-4">            
            <div class="form-group">
                <strong><?php echo Form::label('establecimiento_id', 'Establecimiento'); ?></strong>
                <?php echo Form::select('establecimiento_id', $establecimientos, isset($formulario1) ? $formulario1->establecimiento_id : null, ['class' => 'form-control', 'placeholder' => 'Selecciona un Establecimiento']); ?>

                <small class="text-danger"><?php echo e($errors->first('establecimiento_id')); ?></small>
            </div>
        </div>
        <div class="col-md-4">            
            <div class="form-group">
                <strong><?php echo Form::label('sector_id', 'Sector'); ?></strong>
                <?php echo Form::select('sector_id', $sectors, isset($formulario1) ? $formulario1->sector_id : null, ['class' => 'form-control', 'placeholder' => 'Selecciona un Sector']); ?>

                <small class="text-danger"><?php echo e($errors->first('sector_id')); ?></small>
            </div>
        </div><div><br></div>         
    </div><div><br><strong>DETALLE PACIENTES:</strong><br></div>        
    <div class="row custom-bg2" id="dynamicFields">
        <div class="col-md-2"> 
            <div class="form-group">
                <strong><?php echo Form::label('num_examen[]', 'Nº de Examen'); ?></strong>
                <?php echo Form::text('num_examen[]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nº de Examen']); ?>

                <small class="text-danger"><?php echo e($errors->first('num_examen')); ?></small>
            </div>
        </div>
        <div class="col-md-4"> 
            <div class="form-group">
                <strong><?php echo Form::label('nombre[]', 'Nombre del Paciente'); ?></strong>
                <?php echo Form::text('nombre[]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre del Paciente']); ?>

                <small class="text-danger"><?php echo e($errors->first('nombre')); ?></small>
            </div>
        </div>        
        <div class="col-md-2"> 
            <div class="form-group">
                <strong><?php echo Form::label('edad[]', 'Edad de Paciente'); ?></strong>
                <?php echo Form::text('edad[]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Edad']); ?>

                <small class="text-danger"><?php echo e($errors->first('edad')); ?></small>
            </div>
        </div>
        <div class="col-md-4"> 
            <div class="form-group">
                <strong><?php echo Form::label('direccion[]', 'Dirección de Paciente'); ?></strong>
                <?php echo Form::text('direccion[]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Dirección del Paciente']); ?>

                <small class="text-danger"><?php echo e($errors->first('direccion')); ?></small>
            </div>
        </div><div><br></div>
        
    </div><button id="agregarLinea" type="button" class="btn btn-primary">Agregar Línea</button><br>       
                
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