<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" />
  <style>

.cabecera{
    background-color: #E0E0E0;
    color: black;
}
tr.even {
    background-color: #f2f2f2; /* Color de fondo para filas pares */
}

tr.odd {
    background-color: #ffffff; /* Color de fondo para filas impares (puedes ajustar el color) */
}
@page{
  margin: 0.5cm 1cm;  
}
</style>


</head>

<body>
  <div style="text-align: center;">
      <img src="images/HBhospitalamigo.jpg" alt="" width="100px" height="100px" style="float: left;">      
      <br><br>
  </div>
    <h1 class="text-center">LISTADO DE ESTABLECIMIENTOS</h1><br>
    <table class="table table-striped">
        <thead class="cabecera">
          <tr>
              <th style="text-align: center"><h6> ID </h6></th>
              <th><h6>NOMBRE DE ESTABLECIMIENTO</h6></th>              
          </tr><br>
          <!-- end table row-->
        </thead>
        <tbody>
        <?php $__currentLoopData = $establecimientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $establecimiento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr class="<?php echo e($key % 2 == 0 ? 'even' : 'odd'); ?>">
              <td class="min-width" style="text-align: center; ">
                <p><?php echo e($key+1); ?></p>
		          </td>
		          <td class="min-width">
		            <p><?php echo e($establecimiento->nombre_establecimiento); ?></p>
		          </td>	
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <!-- end table row -->
        </tbody>
    </table>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\usuariosHB\resources\views/patologia/establecimientos/pdf.blade.php ENDPATH**/ ?>