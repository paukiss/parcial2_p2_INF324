<?php
session_start();
include "conexion.inc.php";
$flujo=$_GET["flujo"];
$proceso=$_GET["proceso"];
$formulario=$_GET["formulario"];
$tramite=$_GET["tramite"];
include "flujos/".strtolower($flujo)."/".strtolower($proceso).'/'.$formulario.".controlador.form.inc.php";

if (isset($_GET["Siguiente"]))
{
	$sql="select * from flujo where Flujo='$flujo' and proceso='$proceso'";
	$resultado=mysqli_query($conn, $sql);
	$fila=mysqli_fetch_array($resultado);
	$rolA = $fila["roles"];
	$procesosiguiente=$fila["procesosiguiente"];
	if (is_null($procesosiguiente))
	{
		$procesosiguiente = $procesoCondicional;
	}
	$dateTime = date("Y-m-d H:i:s");
	$today = new DateTime($dateTime); 

	$sql2 = "update seguimiento set fechafin='$dateTime' where codFlujo='$flujo' and codProceso='$proceso' and nroTramite='$tramite'";

	$resultado2=mysqli_query($conn, $sql2);

	if (isset($procesosiguiente) and $procesosiguiente != "Fin")
	{
		$sql="select * from flujo where Flujo='$flujo' and proceso='$procesosiguiente'";
		$resultado=mysqli_query($conn, $sql);
		$fila=mysqli_fetch_array($resultado);
		$rol = $fila["roles"];
		if ($rol != $rolA)
		{
			if ($rolA == 'U')
			{
				$sql4 = "select * from usuario where rol='K'";
				$res4 = mysqli_query($conn, $sql4);
				$fila4 = mysqli_fetch_array($res4);
				$usuario = $fila4["id"];
			}
			else 
			{
				$sql4 = "select * from seguimiento where nroTramite='$tramite' and codFlujo='F1' and codProceso='P1'";
				$res4 = mysqli_query($conn, $sql4);
				$fila4 = mysqli_fetch_array($res4);
				$usuario = $fila4['usuario'];
			}
		}
		else 
			$usuario = $_SESSION["IdUser"];
		$sql3 = "INSERT INTO `seguimiento`(`nroTramite`, `codFlujo`, `codProceso`, `usuario`, `fechaini`)";
		$sql3.= "VALUES ('$tramite','$flujo','$procesosiguiente','".$usuario."','$dateTime')";
		$resultado = mysqli_query($conn, $sql3);
	}
	
	$sql5="select * from flujo where Flujo='$flujo' and proceso='$procesosiguiente'";
	$resultado5=mysqli_query($conn, $sql5);
	$fila=mysqli_fetch_array($resultado5);
	// print_r($fila);
	
	if ($fila["procesosiguiente"] == null or $fila["procesosiguiente"] == "Fin")
		header("Location: bandeja.php");
	else 
		header("Location: motor.php?flujo=$flujo&proceso=$procesosiguiente&tramite=$tramite");
}
else
{
	header("Location: bandeja.php");
}

?>
