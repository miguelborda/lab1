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
.cabecera h6 {
    font-size: 12px; /* Puedes ajustar el valor según tus necesidades */
}
.contenido td {
    font-size: 12px; /* Puedes ajustar el valor según tus necesidades */
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
  <h2 class="text-center">LISTADO DE PACIENTES</h2><br>
    <table class="table table-striped">
        <thead class="cabecera">
          <tr>                
              <th><h6>CI</h6></th>						  		          
						  <th><h6>APELLIDOS</h6></th>
              <th><h6>NOMBRES</h6></th>
						  <th><h6>EDAD</h6></th>		                       
          </tr><br>          
        </thead>
        <tbody class="contenido">
        @foreach($pacientes as $key => $paciente)
          <tr class="{{ $key % 2 == 0 ? 'even' : 'odd' }}">
              <td class="min-width">
                <p>{{$paciente->ci}}</p>
              </td>		            						  
              <td class="min-width">
                <p>{{$paciente->apellido}}</p>
              </td>		              
              <td class="min-width">
                <p>{{$paciente->nombre}}</p>
              </td>		            						      
						  <!--<td><p>{{ floor(abs(strtotime($hoy)-strtotime($paciente->fecha_nacimiento))/(365*60*60*24)) }}</p></td> -->
              <td class="min-width">
                <p>{{$paciente->edad}}</p>
              </td>		                  
              <!--<td class="min-width">
                <p>{{$paciente->direccion}}</p>
              </td>		              
              <td class="min-width">
                <p>{{$paciente->num_celular}}</p>
              </td>		              -->
          </tr>
          @endforeach
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
