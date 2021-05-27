<h1>Se subieron tus documentos con exito</h1>

<div class="row">
    <div class="col-sm">
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $ci ?>" alt="ci" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Carnet de Identidad</h5>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $cn ?>" alt="ci2" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Certificado de Nacimiento</h5>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $cl ?>" alt="ci2" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Certificado Legalizado</h5>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1"><h5>Observaciones:</h5></label>
        <textarea class="form-control" id="" rows="3" name="observacion" readonly><?php echo $observacion; ?></textarea>
    </div>
</div>
    
