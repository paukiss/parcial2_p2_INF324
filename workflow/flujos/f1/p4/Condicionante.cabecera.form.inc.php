
<?php

$sql = "select * from documento where nroTramite='$tramite'";
$res = mysqli_query($conn, $sql);
// print_r($res);
$fila = mysqli_fetch_array($res);

$ci = $fila["ci"];
$cn = $fila["certNaci"];
$cl = $fila["certLegalizado"];

?>