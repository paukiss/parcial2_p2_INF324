<?php
$sql="select * from academico.alumno inner join academico.documento where academico.alumno.id = academico.documento.idAlumno";
$resCab=mysqli_query($conn, $sql);
?>
