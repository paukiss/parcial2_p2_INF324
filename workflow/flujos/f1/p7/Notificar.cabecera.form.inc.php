
<?php

$sql = "select * from documento where nroTramite='$tramite'";
$res = mysqli_query($conn, $sql);
$fila = mysqli_fetch_array($res);

$ci = $fila["ci"];
$cn = $fila["certNaci"];
$cl = $fila["certLegalizado"];

$sql = "select * from informe where idTramite='$tramite'";
$res = mysqli_query($conn, $sql);
$fila = mysqli_fetch_array($res);
$observacion = $fila["observacion"];

?>