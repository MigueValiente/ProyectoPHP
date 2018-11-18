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
                <?php if( !empty($errores['username']) ): ?> 
                <div class="invalid-feedback">
                    <?php foreach ($errores['username'] as $error): ?>
                        <?=$error?><br/>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control <?=($errores['password'])?"is-invalid":""?>" id="password" name="password" aria-describedby="passwordHelp" placeholder="Contraseña">
                <small id="passwordHelp" class="form-text text-muted">Debe tener 6 caracteres como mínimo</small>
                <?php if( !empty($errores['password']) ): ?> 
                <div class="invalid-feedback">
                    <?php foreach ($errores['password'] as $error): ?>
                        <?=$error?><br>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php if(isset($errores["login"])): ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach($errores["login"] as $error): ?>
                        <?=$error?><br>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <button type="submit" name="login" class="btn btn-primary">Entrar</button>
        </form>
    </div>
</div>
<?php require_once '../includes/footer.php'; ?>