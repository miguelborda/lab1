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
    background-color: black;
    color: white;
}

</style>


</head>

<body>
    <img src="images/HBhospitalamigo.jpg" alt="" width="100px" height="100px">
    <img src="images/Labpatologia.jpg" alt="" width="100px" height="100px" style="right">
    <h1 class="text-center">LISTADO DE AREAS</h1><br>
    <table class="table" >
        <thead class="cabecera">
        <tr>
            <th style="text-align: center;font-size: 20px"><h6>CODIGO</h6></th>
            <th><h6>NOMBRE DE AREA</h6></th>
            
        </tr><br>
        <!-- end table row-->
        </thead>
        <tbody>
        @foreach($areas as $area)
        <tr>
            <td class="min-width" style="text-align: center;font-size: 20px">
            <p>{{$area->codigo_area}}</p>
            </td>
            <td class="min-width">
            <p>{{$area->nombre_area}}</p>
            </td>		                  				  
            
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
