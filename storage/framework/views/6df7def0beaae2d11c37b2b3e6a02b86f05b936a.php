

<?php $__env->startSection('title', 'Inicio'); ?>

<?php $__env->startSection('content'); ?> 
  <h1 class="text-5xl text-center pt-24">BIENVENIDO AL SISTEMA <?php echo e(Auth::user()->persona->nombres); ?></h1>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\usuariosHB\resources\views/home.blade.php ENDPATH**/ ?>