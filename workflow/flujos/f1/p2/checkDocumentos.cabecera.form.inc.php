<?php
    if (isset($_GET["error"]))
    {
        $message = "Faltan documentos";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>