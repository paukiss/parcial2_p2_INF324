<h1 style="font-size: 20px;">VERIFIQUE LOS DOCUMENTOS DEL ESTUDIANTE</h1>

<div class="row">
    <div class="col-sm">
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $ci ?>" alt="ci" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Carnet de Identidad</h5>
                <p class="card-text">El carnet de Identidad debe ser el ultimo otorgado por el SEGIP</p>
                <a href="<?php echo $ci ?>" class="btn btn-primary stretched-link">Abrir Imagen</a>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $cn ?>" alt="ci2" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Certificado de Nacimiento</h5>
                <p class="card-text">Se debe verificar que el certificado de nacimiento debe tener la Certificación requerida por el OEP, SERECI o SEGIP</p>
                <a href="<?php echo $cn ?>" class="btn btn-primary stretched-link">Abrir Imagen</a>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $cl ?>" alt="ci2" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Certificado Legalizado</h5>
                <p class="card-text">Debe verificar que tenga el sello legalizado</p>
                <a href="<?php echo $cl ?>" class="btn btn-primary stretched-link">Abrir Imagen</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="d-flex justify-content-center">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="estado" value="aceptar" checked>
            <label class="form-check-label" for="fef">
                Aceptar
            </label>
        </div>
    </div>
    <div class="d-flex justify-content-center">    
        <div class="form-check">
            <input class="form-check-input" type="radio" name="estado" value="rechazar">
            <label class="form-check-label" for="rrr">
                Rechazar
            </label>
        </div>
       
    </div>
    
</div>
    
