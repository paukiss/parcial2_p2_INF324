<?php
    $obs = $_GET["observacion"];
    $sql = "INSERT INTO `informe`(`idTramite`, `observacion`)";
    $sql.= "VALUES ('$tramite','$obs')";
    $res = mysqli_query($conn, $sql);
?>