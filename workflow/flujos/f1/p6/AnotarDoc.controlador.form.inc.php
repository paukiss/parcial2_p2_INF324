
<?php

$sql = "select * from documento where nroTramite='$tramite'";
$res = mysqli_query($conn, $sql);
$fila = mysqli_fetch_array($res);

$ci = $fila["ci"];
$cn = $fila["certNaci"];
$cl = $fila["certLegalizado"];
$idAlumno = $fila["idAlumno"];

$user = $_SESSION["IdUser"];

$sql = "INSERT INTO academico.documento (`idAlumno`, `ci`, `certNac`, `legalizada`)";
$sql.= "VALUES ('$idAlumno','$ci','$cn','$cl')";

$res = mysqli_query($conn, $sql);
?>