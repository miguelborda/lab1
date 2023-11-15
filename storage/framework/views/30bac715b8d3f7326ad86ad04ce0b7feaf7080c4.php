

<?php $__env->startSection('title', 'Crear Formulario1'); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="css/datatable.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Crear Resultado de Formulario1s</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<style>
.custom-bg {
background-color: #DCEEEE; /* Cambia #ff0000 al color que desees */
border-radius: 10px; /* Cambia el valor para ajustar el radio del borde */
}
.custom-bg2 {
background-color: #DEE0E0; /* Cambia #ff0000 al color que desees */
border-radius: 10px; /* Cambia el valor para ajustar el radio del borde */
}
/* Estilo para campos deshabilitados con una clase personalizada */
input.custom-disabled:disabled {
    background-color: #e0f2f1; /* Cambia este valor al color deseado */
    /* Otros estilos adicionales según tus necesidades */
}
.col-md-1-5 {
    flex: 0 0 10%;
    max-width: 10%;
}
.col-md-2-5 {
    flex: 0 0 15%;
    max-width: 15%;
}
</style>
<div class="card">
    <div class="card-body">
        <?php echo Form::open(['route'=>'patologia.resultadof1s.store']); ?>        
        <div class="row custom-bg">
            <div class="col-md-1-5">
                <div class="form-group">
                    <strong><?php echo Form::label('num_examen', 'Nº Exam'); ?></strong>
                
                <?php echo Form::text('num_examen', '', ['class' => 'form-control examen']); ?>

                    <small class="text-danger"><?php echo e($errors->first('num_solicitud')); ?></small>
                    
                </div>
            </div>            
            <div class="col-md-2-5">
                <div class="form-group">
                    <strong><?php echo Form::label('fecha_resultado', 'Fecha Resultado'); ?></strong>
                    <?php echo Form::date('fecha_resultado', isset($formulario1) ? $resultadof1s->fecha_resultado : '', ['max' => now()->toDateString(), 'min' => '1900-01-01']); ?>               
                    <?php $__errorArgs = ['fecha_resultado'];
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
            <div class="col-md-2-5"> 
                <div class="form-group">
                    <strong><?php echo Form::label('ci', 'CI'); ?></strong>
                    <?php echo Form::text('ci', null, ['class' => 'form-control cedula','disabled' => 'disabled']); ?>                
                </div>
            </div>
            <div class="col-md-3"> 
                <div class="form-group">
                    <strong><?php echo Form::label('nombre', 'Nombre(s) Paciente'); ?></strong>
                    <?php echo Form::text('nombre', null, ['class' => 'form-control nombrepaciente','disabled' => 'disabled']); ?>                
                </div>
            </div>
            <div class="col-md-3"> 
                <div class="form-group">
                    <strong><?php echo Form::label('apellido', 'Apellidos Paciente'); ?></strong>
                    <?php echo Form::text('apellido', null, ['class' => 'form-control apellidopaciente','disabled' => 'disabled']); ?>                
                </div>
            </div>
            <div class="col-md-1"> 
                <div class="form-group">
                    <strong><?php echo Form::label('edad', 'Edad'); ?></strong>
                    <?php echo Form::text('edad', null, ['class' => 'form-control edadpaciente','disabled' => 'disabled']); ?>                
                </div>
            </div>            
            <div><br></div>
        </div>
    <div><br><strong>DIAGNOSTICOS:</strong><br></div>        
    <div class="row custom-bg2" id="dynamicFields">
        <div class="col-md-1-5"> 
            <div class="form-group">
                <strong><?php echo Form::label('codigo_diagnostico[]', 'Código'); ?></strong>
                <?php echo Form::text('codigo_diagnostico[]', null, ['class' => 'form-control', 'placeholder' => '']); ?>

                <small class="text-danger"><?php echo e($errors->first('codigo_diagnostico')); ?></small>
            </div>
        </div>
        <div class="col-md-10"> 
            <div class="form-group">
                <strong><?php echo Form::label('descripcion_diagnostico[]', 'Descripción de Diagnostico'); ?></strong>
                <?php echo Form::text('descripcion_diagnostico[]', null, ['class' => 'form-control','disabled' => 'disabled']); ?>                
            </div>
        </div>
        <div><br></div>        
    </div><button id="agregarLinea" type="button" class="btn btn-primary">Agregar Línea</button><br>        
            <br>
            <?php echo Form::submit('Guardar',['class'=>'btn btn-primary']); ?>

            <?php echo Form::button('Cancelar', ['class' => 'btn btn-secondary', 'onclick' => 'window.history.go(-1);']); ?>

            <?php if(session('mensaje')): ?>
            <div class="alert alert-success">
                <?php echo e(session('mensaje')); ?>

            </div>
            
		        <a href="<?php echo e(route('patologia.resultadof1s.pdf')); ?>" class="btn btn-success btn-lg" target="_blank">Imprimir Informe</a> 
            <?php endif; ?>

        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="js/datatable.js"></script>
    <script>
        $('#myTable').DataTable();
    </script>    
    <!--<script>
$(document).ready(function() {
    $("#agregarLinea").click(function() {
        var lineaClonada = $(".custom-bg2").last().clone();
        lineaClonada.find('input').val('');
        $(".custom-bg2").last().after(lineaClonada);
    });
});
</script>-->
<script>
$(document).ready(function() {
    
    //* PROCESO PARA SABER SI YA ESTA REGISTRADO EL SERVICIO Y LA GESTION DE ROL TURNO
    $('.examen').change(function() {
        var valorinput = $('.examen').val();
        console.log(valorinput);
            $.ajax({
                url: '<?php echo e(route('buscardatos.examen')); ?>',
                type:'GET',
                data: { dato: valorinput }, //document.getElementById("servicio").value
                success: function(data){
                   // alert(data['ci'])
                   if(data!='no_existe'){
                    $(".cedula").val(data['ci']);
                    $(".nombrepaciente").val(data['nombre']);
                    $(".apellidopaciente").val(data['apellido']);
                    $(".edadpaciente").val(data['edad']);
                   }else{
                    alert('no encontrado')
                   }
                    
                   /* if(data == 'existe'){ //resp=='error'
                        $(".controlServicio").addClass('is-invalid');//no funciona
                        $('#validacionServicio').text('Error ya se tiene registrado el rol turno para ese Mes !!!').addClass('text-danger').show();
                        $(".controlMes").addClass('is-invalid');
                        $('#validacionMes').text('Error ya se tiene registrado el rol turno para ese Mes !!!').addClass('text-danger').show();
                        exiteGestion=1;
                    }else {
                        limpiarServicioGestion();
                        exiteGestion=0;
                    }  
                    return false;*/
                }
             });
        });
    
    //nueva funcion para mostrar datos pacientes mediante numero de examen


    
    //funcion para agregar filas de seccion diagnostico
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\usuariosHB\resources\views/patologia/resultadof1s/create.blade.php ENDPATH**/ ?>