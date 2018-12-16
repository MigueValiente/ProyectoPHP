<?php
    require_once '../setup.php';
    require_once '../includes/header.php'; 
    require_once '../functions/helpers.php';
?>
<div class="container">
    <div class="offset-3 col-6 pt-4 pb-4">
        <h1>Modificar Trabajo</h1>
        <form action="" method="POST" novalidate>
            <div class="form-group">
                <label for="jobname">Nombre del Trabajo</label>
                <input type="text" class="form-control <?=($errores['jobname'])?"is-invalid":""?>" id="jobname" name="jobname" aria-describedby="jobnameHelp" placeholder="Introduce un nombre para el trabajo" value="<?=($job['name']??'')?>">
                <small id="usernameHelp" class="form-text text-muted">Debe tener como mínimo 4 caracteres con números y letras minúsculas.</small>
                <?php if( !empty($errores['jobname']) ): ?> 
                <div class="invalid-feedback">
                    <?php foreach ($errores['jobname'] as $error): ?>
                        <?=$error?><br/>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="jobdesc">Descripción</label>
                <textarea class="form-control" id="jobdesc" name="jobdesc" rows="3"><?=($job['description']??'')?></textarea>
            </div>

            <div class="form-group">
                <label for="jobpayment">Remuneracion</label>
                <input type="text" class="form-control <?=($errores['jobpayment'])?"is-invalid":""?>" id="jobpayment" name="jobpayment" aria-describedby="jobpaymentHelp" placeholder="Introduce una cantidad para la remuneracion del trabajo" value="<?=($job['payment']??'')?>">
                <small id="usernameHelp" class="form-text text-muted">La cantidad debe ser mayor que 0</small>
                <?=validationDiv('jobpayment','invalid-feedback')?>
            </div>

            <button type="submit" name="edit_job" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
<?php require_once '../includes/footer.php'; ?>