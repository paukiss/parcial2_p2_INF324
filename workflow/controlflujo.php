<?php
$flujo=$_GET["flujo_selecionado"];
session_start();
include "conexion.inc.php";
$sql="select * from iniciales where tipo='nrotramite'";
$resultado=mysqli_query($conn, $sql);
$fila=mysqli_fetch_array($resultado);
$tramite=$fila["valor"];
$tramite = $tramite+1;
$sql="update iniciales set valor=$tramite where tipo='nrotramite'";
mysqli_query($conn, $sql);
$dateTime = date("Y-m-d H:i:s");
$sql="insert into seguimiento values($tramite,'".$flujo."','P1','".$_SESSION["IdUser"]."','$dateTime',null)";
$resultado=mysqli_query($conn, $sql);
header("Location: motor.php?flujo=$flujo&proceso=P1&tramite=$tramite");
?>