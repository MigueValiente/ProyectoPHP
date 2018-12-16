<form action="" method="POST">
    <div class="form-group">
        <label for="username">Nombre de usuario</label>
        <input type="text" class="form-control <?=($errores['username'])?"is-invalid":""?>" id="username" name="username" aria-describedby="usernameHelp" placeholder="Introduce un nombre de usuario" value="<?=($user['username']??'')?>">
        <small id="usernameHelp" class="form-text text-muted">Debe tener como mínimo 8 caracteres con números y letras minúsculas.</small>
        <?=validationDiv('username','invalid-feedback')?>
    </div>
    <button type="submit" name="update_username" class="btn btn-primary">Actualizar Nombre de Usuario</button>
</form>