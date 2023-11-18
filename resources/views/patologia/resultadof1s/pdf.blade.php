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
        <thead class="cabecera"><th style="text-align: left"><h6>Nº Examen: {{$infor->num_examen}}</h6></th></thead><br>
        <thead class="cabecera"><th style="text-align: left"><h6>CI: {{$infor->ci}}</h6></th></thead><br>
        <thead class="cabecera"><th style="text-align: left"><h6>Nombre: {{$paciente->nombre}}</h6></th></thead><br>
        <thead class="cabecera"><th style="text-align: left"><h6>Apellido: {{$paciente->apellido}}</h6></th></thead><br>
    </table>
        <h3 class="text-center">DIAGNOSTICOS</h3><br>
        <table class="table table-striped">
            <thead class="cabecera">
              <tr>
                  <th style="text-align: center"><h6>CODIGO</h6></th>
                  <th><h6>DESCRIPCION</h6></th>              
              </tr>            
            </thead>
            <tbody>
            @foreach($diagnosticosInfo as $key => $diagnostico)
              <tr class="{{ $key % 2 == 0 ? 'even' : 'odd' }}">
                  <td class="min-width" style="text-align: center; ">
                      <p>{{$diagnostico->codigo_diagnostico}}</p>
                  </td>
                  <td class="min-width">
                      <p>{{$diagnostico->descripcion_diagnostico}}</p>
                  </td>
              </tr>
              @endforeach              
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
