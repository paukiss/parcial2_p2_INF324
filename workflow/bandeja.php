<?php
session_start();
include "conexion.inc.php";
include "cabecera.inc.php";
$sql="select * from seguimiento where fechafin is null and usuario=".$_SESSION["IdUser"];
$resultado=mysqli_query($conn, $sql);

if (isset($_POST["salir"]))
{
	$_SESSION["IdUser"] = null;
	header("Location: index.php");
	exit();
}

while ($fila=mysqli_fetch_array($resultado))
{
	$empiezoTime = $fila["fechaini"];
	$dateTime = date("Y-m-d H:i:s");

	$a = new DateTime($empiezoTime);
	$b = new DateTime($dateTime);
	$sec = (abs($b->getTimestamp() - ($a)->getTimestamp()));

	$diff = intval(259200 - $sec);
	
	if ($diff < 0)
	{
		$sql3 = "UPDATE `seguimiento` SET `fechafin`='$dateTime'";
		$sql3 .= " WHERE `nroTramite`='".$fila['nroTramite']."' and `codFlujo`='".$fila['codFlujo']."' and `codProceso`='".$fila['codProceso']."' and `usuario`='".$fila['usuario']."'";
		$res3 = mysqli_query($conn, $sql3);
	}
}
$resultado=mysqli_query($conn, $sql);

?>

<div class="d-flex justify-content-around">
  <div class="p-2">
	  <h1 class="text-slim text-default">Bandeja de Entrada</h1>
  </div>
  
	<div class="p-2">
		<form method="POST">
			<input type="submit" value="Salir" name="salir" style="background-color: red; padding: 10px 10px; margin-top: 50px;">
		</form>
	</div>
</div>



<div class="container">
	
	<h3> Bienvenido: <?php echo $_SESSION["user"] ?></h3>

	<table class="table">
	<thead>
		<tr>	
			<th scope="col">Nro Tramite</th>
			<th scope="col">Flujo</th>
			<th scope="col">Proceso</th>
			<th scope="col"> Proceso T </th>	
			<th scope="col">Tiempo Restante</th>
			<th scope="col">Accion</th>
			
		</tr>
	</thead>
		<?php
	while ($fila=mysqli_fetch_array($resultado))
	{
		echo "<tr>";
		echo "<th scope='row'>".$fila["nroTramite"]."</th>";
		echo "<td>".$fila["codFlujo"]."</td>";
		echo "<td>".$fila["codProceso"]."</td>";
		
		$sql2 = "select * from flujo where Flujo ='".$fila['codFlujo']."' and proceso = '".$fila['codProceso']."'";

		$res2 = mysqli_query($conn, $sql2);
		$fila2 = mysqli_fetch_array($res2);

		echo "<td>".$fila2["formulario"]."</td>";

		$empiezoTime = $fila["fechaini"];
		$dateTime = date("Y-m-d H:i:s");

		$a = new DateTime($empiezoTime);
		$b = new DateTime($dateTime);
		$sec = (abs($b->getTimestamp() - ($a)->getTimestamp()));

		$diff = intval(259200 - $sec);
		
		if ($diff < 0)
		{
			echo "<td>Nada</td>";
		}
		else 
		{
			$dia = intdiv($diff, 86400);
			$hora = intdiv(($diff % 86400), 3600);
			$minuto = intdiv((($diff % 86400) % 3600), 60);
			$segundo = ((($diff % 86400) % 3600) % 60);
			$mostrar = $dia." dias, ".$hora."h:".$minuto."m:".$segundo."s";
			echo "<td>".$mostrar."</td>";
		}
		
		echo "<td><a href='motor.php?flujo=".$fila["codFlujo"]."&proceso=".$fila["codProceso"]."&tramite=".$fila["nroTramite"]."'>Ver</a></td>";
		echo "</tr>";
	}
	?>
	</table>
</div>

<div class="d-flex justify-content-center">
  <div class="p-2">
	  <a href="nuevoflujo.php">Nuevo</a>
  </div>
  
  
</div>


<?php
	include("pie.inc.php");
?>