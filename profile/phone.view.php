<form action="" method="POST" novalidate>
    <div class="form-group">
        <label for="telefono">Telefono</label>
        <input type="text" class="form-control <?=($errores['telefono'])?"is-invalid":""?>" id="telefono" name="telefono" aria-describedby="telefonoHelp" placeholder="Introduce un telefono"  value="<?=($user['telefono']??'')?>">
        <small id="telefonoHelp" class="form-text text-muted">Tu telefono solo lo puedes proporcionar tu.</small>
        <?=validationDiv('telefono', 'invalid-feedback')?>
    </div>
    <button type="submit" name="update_phone" class="btn btn-primary">Actualizar Telefono</button>