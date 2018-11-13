<?php 
    require_once '../setup.php';
    require_once "../includes/header.php";
?>
<!-- Body -->
<div class="container">
    <div class="row justify-content-center mt-5">
            <div class="col-4">
                <h1>Registro</h1>
                <form action="" method="POST">
                    <!-- NOMBRE -->
                    <div class="form-group">
                        <label for="username">Nombre</label>
                        <input type="text" class="form-control <?=(isset($errores["username"]))?"is-invalid":"";?>"id="username" name="username" aria-describedby="nameHelp" placeholder="Introduce tu nombre">
                        <small id="emailHelp" class="form-text text-muted">Debe tener como mínimo 8 caracteres con números y letras minúsculas.</small>
                        <!-- MENSAJE DE ERROR -->
                        <?php if(isset($errores["username"])): ?>
                            <div class="invalid-feedback">
                                <ul>
                                    <?php foreach($errores["username"] as $message): ?>
                                        <li><?=$message?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?> 
                    </div>
                    <!-- EMAIL -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control <?=(isset($errores["email"]))?"is-invalid":"";?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Introduce tu email">
                        <small id="emailHelp" class="form-text text-muted">No compartiremos tu email con nadie.</small>
                        <?php if(isset($errores["email"])): ?>
                            <div class="invalid-feedback">
                                <ul>
                                    <?php foreach($errores["email"] as $message): ?>
                                        <li><?=$message?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- CONTRASEÑA -->
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control <?=(isset($errores["password"]))?"is-invalid":"";?>" id="password" name="password" placeholder="Introduce tu contraseña">
                        <small id="passwordHelp" class="form-text text-muted">Debe tener 6 caracteres como mínimo</small>
                        <?php if(isset($errores["password"])): ?>
                            <div class="invalid-feedback">
                                <ul>
                                    <?php foreach($errores["password"] as $message): ?>
                                        <li><?=$message?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- CONFIRMACION DE LA CONTRASEÑA -->
                    <div class="form-group">
                        <label for="password_confirmation">Confirmar Contraseña</label>
                        <input type="password" class="form-control <?=(isset($errores["password_confirmation"]))?"is-invalid":"";?>" id="password_confirmation" name="password_confirmation" placeholder="Vuelva a introducir la contraseña">
                        <?php if(isset($errores["password_confirmation"])): ?>
                            <div class="invalid-feedback">
                                <ul>
                                    <?php foreach($errores["password_confirmation"] as $message): ?>
                                        <li><?=$message?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- BOTON DE ENVIAR -->
                    <button type="submit" class="btn btn-primary" name="registro">Registrar</button>
                </form>
            </div>           
    </div>
</div>
<!-- End Body -->
<?php require_once "../includes/footer.php"?>
