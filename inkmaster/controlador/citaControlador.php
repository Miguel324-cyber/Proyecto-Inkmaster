<?php
include('../modelo/citaModelo.php');
$obj = new cita();
if($_POST){
}

if(isset($_POST['guarda'])){
    $obj->idCita = $_POST['idCita'];
    $obj->fechaCita = $_POST['fechaCita'];
    $obj->horaCita = $_POST['horaCita'];
    $obj->precioCita = $_POST['precioCita'];
    $obj->idCliente = $_POST['idCliente'];
    $obj->idEmpleado = $_POST['idEmpleado'];
    $obj->agregar();
}

if(isset($_POST['modifica'])){
    $obj->idCita = $_POST['idCita'];
    $obj->fechaCita = $_POST['fechaCita'];
    $obj->horaCita = $_POST['horaCita'];
    $obj->precioCita = $_POST['precioCita'];
    $obj->idCliente = $_POST['idCliente'];
    $obj->idEmpleado = $_POST['idEmpleado'];
    $obj->modificar();
}

if(isset($_POST['elimina'])){
    $obj->idCita = $_POST['idCita'];
    $obj->eliminar();
}

$cone = new Conexion();
$c=$cone->conectando();
$sql1="select count(*) as totalRegistro from cita";
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
    
$obj->idCita = $_POST['idCita'];

$sql2="select * from cita where idCita LIKE '%$obj->idCita%' limit $desde,$maximoRegistros ";
$ejecuta=mysqli_query($c,$sql2);
$res = mysqli_fetch_array($ejecuta);

}else{
         $sql2="select * from cita limit $desde,$maximoRegistros ";
        $ejecuta=mysqli_query($c,$sql2);
        $res = mysqli_fetch_array($ejecuta);
}


if(isset($_POST['listar'])){
    
    
    

}



?>
