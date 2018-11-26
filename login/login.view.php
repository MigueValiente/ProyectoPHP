<?php
    require_once '../setup.php';
    require_once '../includes/header.php'; 
    
?>
<div class="container">
    <div class="offset-3 col-6 pt-4 pb-4">
        <form action="" method="POST" novalidate>
        <div class="form-group">
                <label for="username">Nombre de usuario</label>
                <input type="text" class="form-control <?=($errores['username'])?"is-invalid":""?>" id="username" name="username" aria-describedby="usernameHelp" placeholder="Introduce un nombre de usuario" value="<?=($username??'')?>">
                <small id="usernameHelp" class="form-text text-muted">Debe tener como mínimo 8 caracteres con números y letras minúsculas.</small>
                <?= validationDiv("username","invalid-feedback") ?>
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control <?=($errores['password'])?"is-invalid":""?>" id="password" name="password" aria-describedby="passwordHelp" placeholder="Contraseña">
                <small id="passwordHelp" class="form-text text-muted">Debe tener 6 caracteres como mínimo</small>
                <?= validationDiv("password","invalid-feedback") ?>
            </div>
            <?= validationDiv("username","alert") ?>
            <button type="submit" name="login" class="btn btn-primary">Entrar</button>
        </form>
    </div>
</div>
<?php require_once '../includes/footer.php'; ?>