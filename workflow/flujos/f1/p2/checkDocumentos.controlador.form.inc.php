<?php
    print_r($_GET);
    if (isset($_GET["ci"]) and isset($_GET["cn"]) and isset($_GET["fl"]))
    {
        echo "ok";
    }
    else
    {
        if (isset($_GET["Anterior"]))
            header("Location: bandeja.php");
        else 
            header("Location: motor.php?flujo=$flujo&proceso=$proceso&tramite=$tramite&error=si");
        exit();
    }
?>