<?php
session_start();
include "conexion.inc.php";
include "cabecera.inc.php";
$flujo=$_GET["flujo"];
$proceso=$_GET["proceso"];
$tramite=$_GET["tramite"];
$sql="select * from flujo where Flujo='$flujo' and proceso='$proceso'";
$resultado=mysqli_query($conn, $sql);
$fila=mysqli_fetch_array($resultado);
$formulario=$fila["formulario"];

include "flujos/".strtolower($flujo)."/".strtolower($proceso).'/'.$formulario.".cabecera.form.inc.php";
?>

<div class="container" style="padding-top:50px;">
    <form method="GET" action="controlador.php">
        <?php
        include "flujos/".strtolower($flujo)."/".strtolower($proceso).'/'.$formulario.".form.inc.php";
        ?>
        <br/>
        <input type="hidden" value="<?php echo $tramite; ?>" name="tramite"/>
        <input type="hidden" value="<?php echo $flujo; ?>" name="flujo"/>
        <input type="hidden" value="<?php echo $proceso; ?>" name="proceso"/>
        <input type="hidden" value="<?php echo $formulario; ?>" name="formulario"/>
        <input type="submit" value="Volver" name="Anterior"/>
        <input type="submit" value="Siguiente" name="Siguiente"/>
    </form>
</div>
