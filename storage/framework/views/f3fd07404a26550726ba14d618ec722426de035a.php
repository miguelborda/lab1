<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
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

h3.text-center:first-child {
    margin-bottom: 0;
}

h3.text-center:last-child {
    margin-top: 0;
}


</style>


</head>

<body>
  <div style="text-align: center;">
      <img src="images/HBhospitalamigo.jpg" alt="" width="100px" height="100px" style="float: left;">      
      <br><br>
  </div>
    <h3 class="text-center" style="margin-bottom: 0;">SERVICIO DE DIAGNOSTICO MEDICO DE</h3>
    <h3 class="text-center" style="margin-top: 0;">ANATOMIA PATOLOGICA - CITOLOGIA</h3>
    <br>
    <table class="table table-striped">
        <thead class="cabecera"><th style="text-align: center"><h6>hola</h6></th></thead><br>
    
        <!--
        <thead class="cabecera">
          <tr>
              <th style="text-align: center"><h6>CODIGO</h6></th>
              <th><h6>NOMBRE DE AREA</h6></th>              
          </tr><br>
       
        <tbody>
        <?php $__currentLoopData = $detallef1s; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detallef1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
              <td class="min-width" style="text-align: center; ">
                  <p><?php echo e($detallef1->id); ?></p>
              </td>
              <td class="min-width">
                  <p><?php echo e($detallef1->num_examen); ?></p>
              </td>
          
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>-->
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
<?php /**PATH C:\xampp\htdocs\usuariosHB\resources\views/patologia/resultadof1s/pdf.blade.php ENDPATH**/ ?>