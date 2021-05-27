<?php
session_start();
include "conexion.inc.php";
include "cabecera.inc.php";
$sql="select * from flujo where proceso='P1' and roles='".$_SESSION["rol"]."'";

$resultado=mysqli_query($conn, $sql);
?>

<div class="container">
	<h1 class="display-6">Iniciar un nuevo Flujo</h1>
	<form action="controlflujo.php" method="GET">
		<select name="flujo_selecionado" class="form-select" aria-label="Default select example">
			<?php
	while ($fila=mysqli_fetch_array($resultado))
	echo "<option value=".$fila['Flujo'].">".$fila['Flujo']." - ".$fila['formulario']."</option>";
	?>
	</select>
	<input type="submit" name="Enviar" value="Enviar"/>
	<form>
</div>