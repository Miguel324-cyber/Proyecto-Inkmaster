<?php
include('../modelo/categoriaModelo.php');
$obj = new cliente();
if($_POST){
}

if(isset($_POST['guarda'])){
    $obj->idCliente = $_POST['idCliente'];
    $obj->correoCliente = $_POST['correoCliente'];
    $obj->contrasenaCliente = $_POST['contrasenaCliente'];
    $obj->nombreCliente = $_POST['nombreCliente'];
    $obj->apellidoCliente = $_POST['apellidoCliente'];
    $obj->telefonoCliente = $_POST['telefonoCliente'];
    $obj->agregar();
}

if(isset($_POST['modifica'])){
    $obj->idCliente = $_POST['idCliente'];
    $obj->correoCliente = $_POST['correoCliente'];
    $obj->contrasenaCliente = $_POST['contrasenaCliente'];
    $obj->nombreCliente = $_POST['nombreCliente'];
    $obj->apellidoCliente = $_POST['apellidoCliente'];
    $obj->telefonoCliente = $_POST['telefonoCliente'];
    $obj->modificar();
}

if(isset($_POST['elimina'])){
    $obj->idCliente = $_POST['idCliente'];
    $obj->eliminar();
}

$cone = new Conexion();
$c=$cone->conectando();
$sql1="select count(*) as totalRegistro from cliente";
$ejecuta1=mysqli_query($c,$sql1);
$res1 = mysqli_fetch_array($ejecuta1);
$totalRegistros = $res1['totalRegistro'];
$maximoRegistros = 5;
if(empty($_GET['pagina'])){
    $pagina=1;
}else{
    $pagina=$_GET['pagina'];
}
$desde = ($pagina-1)*$maximoRegistros;
$totalPaginas=ceil($totalRegistros/$maximoRegistros);



if(isset($_POST['buscar'])){
    
$obj->idCliente = $_POST['idCliente'];

$sql2="select * from cliente where idCliente LIKE '%$obj->idCliente%' limit $desde,$maximoRegistros ";
$ejecuta=mysqli_query($c,$sql2);
$res = mysqli_fetch_array($ejecuta);

}else{
         $sql2="select * from cliente limit $desde,$maximoRegistros ";
        $ejecuta=mysqli_query($c,$sql2);
        $res = mysqli_fetch_array($ejecuta);
}


if(isset($_POST['listar'])){
    
    
    

}



?>
