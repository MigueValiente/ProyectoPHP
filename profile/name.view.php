<form action="" method="POST">
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control <?=($errores['name'])?"is-invalid":""?>" id="name" name="name" aria-describedby="nameHelp" placeholder="Introduce tu nombre" value="<?=($user['name']??'')?>">
        <small id="nameHelp" class="form-text text-muted">Debe tener como mínimo 2 caracteres .</small>
        <?=validationDiv('name','invalid-feedback')?>
    </div>

    <div class="form-group">
        <label for="surname">Apellido</label>
        <input type="text" class="form-control <?=($errores['surname'])?"is-invalid":""?>" id="surname" name="surname" aria-describedby="surnameHelp" placeholder="Introduce tu apellido" value="<?=($user['surname']??'')?>">
        <small id="surnameHelp" class="form-text text-muted">Debe tener como mínimo 2 caracteres .</small>
        <?=validationDiv('surname','invalid-feedback')?>
    </div>
    <button type="submit" name="update_surname" class="btn btn-primary">Actualizar Nombre</button>
</form>