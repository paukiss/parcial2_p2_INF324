<?php
	session_start();
	include "cabecera.inc.php";
	$ok = 0;
	if (isset($_GET['error']))
	{
		$error = $_GET["error"];
		if ($error == "si")
			$ok = 1;
	}
	$textError = "<h4> Error en el usuario o contraseña </h4>";
	
	if ($_SESSION["IdUser"])
	{
		header("Location: bandeja.php");
		exit();
	}
?>

<form method="POST" action="controlusuario.php">	
	<div class="wrapper fadeInDown">	
		<h3>
			<?php	if ($ok == 1)	echo $textError; ?>
		</h3>
		<div id="formContent">
			<input type="text" id="login" class="fadeIn second" name="usuario" placeholder="Usuario">
			<input type="password" id="password" class="fadeIn third" name="contrasenia" placeholder="Constrasenia">
			<input type="submit" class="fadeIn fourth" value="Ingresar">
			<div id="formFooter">
				<h2>Sistema</h2>
			</div>
		</div>
	</div>
</form>

<?php 
	include "pie.inc.php";
?>