<?php
session_start();
include "conexion.inc.php";

$user = $_POST['usuario'];
$pass = $_POST['contrasenia'];

$sql = "select * from usuario where usuario='$user' and password='$pass'";
$res = mysqli_query($conn, $sql);
$fila = mysqli_fetch_array($res);
if (isset($fila["id"]))
{
	$_SESSION['IdUser'] = $fila['id'];
	$_SESSION['rol'] = $fila['rol'];
	$_SESSION['user'] = $fila['usuario'];
	header('Location: bandeja.php');
}
else
{
	header("Location: index.php?error=si");
}

?>