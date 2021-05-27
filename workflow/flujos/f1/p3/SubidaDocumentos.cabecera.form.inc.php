<?php
    
    $estado = 0;
    if (isset($_POST["ok"]))
    {   
        $msg = "";
        $user = $_SESSION["IdUser"];
        $path = "documentos/".$user;
        if (!file_exists($path))
            mkdir($path);
        $filename = $_FILES["ci"]["name"];
        $tempname = $_FILES["ci"]["tmp_name"];
        $folderCI = $path."/".$filename;        
        
        move_uploaded_file($tempname, $folderCI);
        
        $filename = $_FILES["cn"]["name"];
        $tempname = $_FILES["cn"]["tmp_name"];
        $folderCN = $path."/".$filename;
        move_uploaded_file($tempname, $folderCN);
		
        $filename = $_FILES["fl"]["name"];
        $tempname = $_FILES["fl"]["tmp_name"];
        $folderFL = $path."/".$filename;
        move_uploaded_file($tempname, $folderFL);

        $sql = "INSERT INTO documento (idAlumno, ci, certNaci, certLegalizado, nroTramite) VALUES ('$user',  '$folderCI', '$folderCN', '$folderFL', $tramite)";

        mysqli_query($conn, $sql);
        $estado = 1;
 
    }
                
?>

<div class="container" style="padding: 5%;" <?php if ($estado == 1) echo "hidden" ?>>
    <h4>Suba los documentos en imagen formato jpg o png:<br></h4>
    <form method="POST" action="" enctype="multipart/form-data" >
    <div class="mb-3">
        <label for="formFile" class="form-label">Cedula de Identidad</label>
        <input class="form-control" type="file" name="ci">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Certificado de Nacimiento</label>
        <input class="form-control" type="file" name="cn">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Fotocopia Legalizada</label>
        <input class="form-control" type="file" name="fl">
    </div>
    <input type="text" name="ok" value="ok" hidden>

    <input type="submit" value="Subir" name="upload" style="padding: 10px 50px; background-color: green;">

    </form>
</div>
 