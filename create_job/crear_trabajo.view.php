<?php
    require_once '../setup.php';
    require_once '../includes/header.php';
    require_once '../functions/helpers.php';
?>
<div class="container">
    <div class="offset-3 col-6 pt-4 pb-4">
        <h1>Crear Nueva Oferta de Trabajo</h1>
        <form action="" method="POST" novalidate>
            <div class="form-group">
                <label for="jobname">Nombre del trabajo</label>
                <input type="text" class="form-control <?=($errors['jobname'])?"is-invalid":""?>" id="jobname" name="jobname" aria-describedby="jobnameHelp" placeholder="Introduce un nombre para lel trabajo" value="<?=($jobname??'')?>">
                <small id="usernameHelp" class="form-text text-muted">Debe tener como mínimo 10 caracteres con números y letras minúsculas.</small>
                <?=validationDiv('jobname','invalid-feedback')?>
            </div>
            <div class="form-group">
                <label for="jobdesc">Descripción</label>
                <textarea class="form-control" id="jobdesc" name="jobdesc" rows="3"><?=($jobdesc??'')?></textarea>
            </div>
            <div class="form-group">
                <label for="jobpayment">Descripción</label>
                <input type="text" class="form-control <?=($errors['jobpayment'])?"is-invalid":""?>" id="jobpayment" name="jobpayment" aria-describedby="jobpaymentHelp" placeholder="Introduce una cantidad para la remuneracion del trabajo" value="<?=($payment??'')?>">
                <?=validationDiv('payment','invalid-feedback')?>
            </div>
            <button type="submit" name="new_job" class="btn btn-primary">Nuevo Trabajo</button>
        </form>
    </div>
</div>
<?php require_once '../includes/footer.php'; ?>