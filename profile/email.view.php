<form action="" method="POST" novalidate>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control <?=($errores['email'])?"is-invalid":""?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Introduce un email"  value="<?=($user['email']??'')?>">
        <small id="emailHelp" class="form-text text-muted">Tu email solo lo sabran tus jefes y Google.</small>
        <?=validationDiv('email', 'invalid-feedback')?>
    </div>
    <button type="submit" name="update_email" class="btn btn-primary">Actualizar Email</button>
</form>