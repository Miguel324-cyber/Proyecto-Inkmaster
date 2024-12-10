<?php
include('../modelo/tatuadoresModelo.php');
$obj = new empleado();
if($_POST){
}

if(isset($_POST['guarda'])){
    $obj->idEmpleado = $_POST['idEmpleado'];
    $obj->nombreEmpleado = $_POST['nombreEmpleado'];
    $obj->correoEmpleado = $_POST['correoEmpleado'];
    $obj->contrasenaEmpleado = $_POST['contrasenaEmpleado'];
    $obj->telefonoEmpleado = $_POST['telefonoEmpleado'];
    $obj->idCargo = $_POST['idCargo'];
    $obj->agregar();
}

if(isset($_POST['modifica'])){
    $obj->idEmpleado = $_POST['idEmpleado'];
    $obj->nombreEmpleado = $_POST['nombreEmpleado'];
    $obj->correoEmpleado = $_POST['correoEmpleado'];
    $obj->contrasenaEmpleado = $_POST['contrasenaEmpleado'];
    $obj->telefonoEmpleado = $_POST['telefonoEmpleado'];
    $obj->idCargo = $_POST['idCargo'];
    $obj->modificar();
}

if(isset($_POST['elimina'])){
    $obj->idEmpleado = $_POST['idEmpleado'];
    $obj->eliminar();
}

$cone = new Conexion();
$c=$cone->conectando();
$sql1="select count(*) as totalRegistro from empleado";
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
    
$obj->idEmpleado = $_POST['idEmpleado'];

$sql2="select * from empleado where idEmpleado LIKE '%$obj->idEmpleado%' limit $desde,$maximoRegistros ";
$ejecuta=mysqli_query($c,$sql2);
$res = mysqli_fetch_array($ejecuta);

}else{
         $sql2="select * from empleado limit $desde,$maximoRegistros ";
        $ejecuta=mysqli_query($c,$sql2);
        $res = mysqli_fetch_array($ejecuta);
}


if(isset($_POST['listar'])){
    
    
    

}



?>
