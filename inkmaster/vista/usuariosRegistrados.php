<?php
include ("../conectar/conexion.php");
include ("../controlador/CategoriaControlador.php");
include("editarSesionUsuario.php");
?>


<?php 
$c = new conexion();
$cone =$c -> conectando();
$sql = "select max(idCliente) from cliente";
$rs1 = mysqli_query(mysql:$cone,query:$sql);
$arreglo=mysqli_fetch_row(result:$rs1);

if($arreglo[0]>0){
  $suma = 0;
  $numero = $arreglo[0];
  $suma = 1 + $arreglo[0];
}else{
  $suma = 0;
  $numero = $arreglo[0];
  $suma = 1 + $arreglo[0];

  $obj->idCliente = $suma;
}

$obj->idCliente = $suma;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link rel="stylesheet" href="../Configcss/css/bootstrap.min.css">
    <link rel="stylesheet" href="usuariosRegistrados1.css">
    <script src="https://kit.fontawesome.com/7e532953a9.js" crossorigin="anonymous"></script>
    <script src="function.js"></script>
    <script tipe="text/javascript">
      function confirmar(){
        return confirm("¿Estas seguro que quieres eliminar este registro?")
      }
    </script>
</head>

<body style="background-color: black;">

<!-- Button trigger modal -->


  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingrese los datos registrados</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form    method="post">
            <div class="mb-3">
                    <label for="exampleInputText2" class="form-label">ID</label>
                    <input type="text"  value="<?php echo $obj->idCliente ?>"readonly name="idCliente" class="form-control" id="exampleInputText2">
                  </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Ingrese su correo</label>
                  <input type="email" name="correoCliente" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">Nunca compartiremos su información</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" name="contrasenaCliente" class="form-control" id="exampleInputPassword1">
                  </div>
                <div class="mb-3">
                  <label for="exampleInputText1" class="form-label">Nombre</label>
                  <input type="text" name="nombreCliente" class="form-control" id="exampleInputText1">
                </div>
                <div class="mb-3">
                  <label for="exampleInputText1" class="form-label">Apellido</label>
                  <input type="text" name="apellidoCliente" class="form-control" id="exampleInputText1">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Telefono</label>
                  <input type="number" name="telefonoCliente" class="form-control" id="exampleInputTelfono1">
                </div>
                  <button type="submit" class="btn btn-primary" name="guarda" value="guarda">Ingresar</button>
            </form>
        </div>
        </div>
      </div>
    </div>
  </div>

</div>
<main>
<div class="container bg-light p-3 my-5 rounded">
  
      <form class="d-flex"  method="post">
        
        <input class="form-control me-2" type="search" name ="idCliente" id="idCliente" placeholder="Ingresa el codigo del cliente" aria-label="Search">
        <button class="btn btn-success me-1" type="submit" name="buscar" id="buscar">Buscar</button>
        <button class="btn btn-secondary me-1" type="submit">Limpiar</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Agregar
    </button>
      </form>
  </nav>
    
  </nav>
  <div class="table-responsive">
    <table class="table table-bordered table-hover border-dark">
      <thead class="bg-danger">
        <tr>
          <th scope="col">Codigo</th>
          <th scope="col">Correo</th>
          <th scope="col">Contraseña</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Telefono</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <?php
      if($res==0){
        echo "No hay registros";
      } else{
            do{
    
    ?>
    
      <tbody>
        <tr>
          <td><?php echo $res[0]?></td>
          <td><?php echo $res[1]?></td>
          <td><?php echo $res[2]?></td>
          <td><?php echo $res[3]?></td>
          <td><?php echo $res[4]?></td>
          <td><?php echo $res[5]?></td>
          <td>
            <form action="" method="post">
            <input type="hidden"  name="idCliente" value="<?php echo $res[0]; ?>">
            <button type="submit" src="iniciosesion.php" name="elimina" value="elimina" onclick="return confirmar()"  class="btn btn-danger mb-1"><i class="fa-regular fa-trash-can"></i></button>
            <!-- Botón Editar -->
            <button type="button" class="btn btn-warning editarM mb-1"><i class="fa-solid fa-file-pen"></i></button>

                      <!-- Modal de edición -->
                      
                  </td>
              </tr>
            </form>
          </td>
        </tr>
      </tbody>
      <?php

            }while($res = mysqli_fetch_array($ejecuta));
      }
      
      ?>
    </table>
  </div>
  <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center mt-2">
                      <?php 
                      if($pagina!=1){
                      ?>
                      <li class="page-item ">
                          <a class="page-link" href="?pagina=<?php echo 1; ?>"><</a>
                      </li>
                      <li class="page-item">
                          <a class="page-link" href="?pagina=<?php echo $pagina-1; ?>"><<</a>
                      </li>
                      <?php
                      }
                      for($i=1; $i<=$totalPaginas; $i++){
                          if($i==$pagina){
                              echo'<li class="page-item active" aria-current="page"><a class="page-link" href="?pagina='.$i.'">'.$i.'</a></li>';    
                          }
                          else{
                              echo'<li class="page-item "><a class="page-link" href="?pagina='.$i.'">'.$i.'</a></li>'; 
                          }
                      }
                      if($pagina !=$totalPaginas){
                      ?>
                      
                      <li class="page-item">
                          <a class="page-link" href="?pagina=<?php echo $pagina+1; ?>">>></a>
                      </li>
                      <li class="page-item">
                          <a class="page-link" href="?pagina=<?php echo $totalPaginas; ?>">></a>
                      </li>
                      <?php
                      }
                      ?>
                  </ul>
              </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<script>
  $(document).ready(function(){
    $('.editarM').on('click', function(){
        $('#editar').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
          return $(this).text();
        }).get();
        console.log(data);
        $('#idCliente').val(data[0]);
        $('#correoCliente').val(data[1]);
        $('#contrasenaCliente').val(data[2]);
        $('#nombreCliente').val(data[3]);
        $('#apellidoCliente').val(data[4]);
        $('#telefonoCliente').val(data[5]);
    });
});
</script>


