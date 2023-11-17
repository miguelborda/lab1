

<?php $__env->startSection('title', 'Crear Diagnóstico'); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="css/datatable.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="title-wrapper pt-30">
    <div class="row align-items-center" style="height: 60px">
        <div class="col-md-6">
            <div class="titlemb-30">
                <h2>Editar Diagnóstico con Código: "<?php echo e($diagnostico->codigo_diagnostico); ?>"</h2>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo e(route('patologia.diagnosticos.update', $diagnostico->id)); ?>" onsubmit="return confirm('¿Estás seguro de que deseas modificar este registro?');">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>            
            <div class="form-group">
                <strong><?php echo Form::label('descripcion_diagnostico', 'descripcion de diagnostico'); ?></strong>
                <?php echo Form::text('descripcion_diagnostico', $diagnostico->descripcion_diagnostico, ['class' => 'form-control', 'placeholder' => 'Ingrese descripcion']); ?>

                <?php $__errorArgs = ['descripcion_diagnostico'];
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\usuariosHB\resources\views/patologia/diagnosticos/edit.blade.php ENDPATH**/ ?>