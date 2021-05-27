<?php
$sql="update academico.alumno set nombre='".$_GET["nombre"]."' where id=".$_SESSION["IdUser"];
$resCab=mysqli_query($conn, $sql);
?>