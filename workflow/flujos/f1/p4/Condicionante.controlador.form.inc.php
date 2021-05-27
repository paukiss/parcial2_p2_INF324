
<?php

$sql = "select * from procesocondicion where codFlujo='$flujo' and codProceso='$proceso'";
$res = mysqli_query($conn, $sql);
$fila = mysqli_fetch_array($res);

$si = $fila["codSi"];
$no = $fila["codNo"];

print_r($_GET);

$estado = $_GET["estado"];
$observacion = $_GET["observacion"];
if ($estado == "aceptar")
{
    $procesoCondicional = $si;
}
else 
{
    $procesoCondicional = $no;
}


?>