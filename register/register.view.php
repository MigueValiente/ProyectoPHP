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
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control <?=(isset($errores["name"]))?"is-invalid":"";?>"id="name" name="name" aria-describedby="nameHelp" placeholder="Introduce tu nombre">
                        <small id="nameHelp" class="form-text text-muted">Debe tener como mínimo 3 caracteres </small>
                        <!-- MENSAJE DE ERROR -->
                        <?php if(isset($errores["name"])): ?>
                            <div class="invalid-feedback">
                                <ul>
                                    <?php foreach($errores["name"] as $message): ?>
                                        <li><?=$message?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?> 
                    </div>

                    <!-- APELLIDO -->
                    <div class="form-group">
                        <label for="surname">Apellido</label>
                        <input type="text" class="form-control <?=(isset($errores["surname"]))?"is-invalid":"";?>"id="surname" name="surname" aria-describedby="nameHelp" placeholder="Introduce tu nombre">
                        <small id="emailHelp" class="form-text text-muted">Debe tener como mínimo 3 caracteres </small>
                        <!-- MENSAJE DE ERROR -->
                        <?php if(isset($errores["surname"])): ?>
                            <div class="invalid-feedback">
                                <ul>
                                    <?php foreach($errores["surname"] as $message): ?>
                                        <li><?=$message?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?> 
                    </div>

                    <!-- NOMBRE DE USUARIO -->
                    <div class="form-group">
                        <label for="username">Usuario</label>
                        <input type="text" class="form-control <?=(isset($errores["username"]))?"is-invalid":"";?>"id="username" name="username" aria-describedby="nameHelp" placeholder="Introduce tu nombre">
                        <small id="userHelp" class="form-text text-muted">Debe tener como mínimo 8 caracteres con números y letras minúsculas. Con este usuario accederas a la página.</small>
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
                        <small id="emailHelp" class="form-text text-muted">Tu email no lo sabrán el resto de usuarios.</small>
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

                    <!-- TELEFONO -->
                    <div class="form-group">
                        <label for="phone">Telefono</label>
                        <input type="text" class="form-control <?=(isset($errores["phone"]))?"is-invalid":"";?>" id="phone" name="phone" aria-describedby="phoneHelp" placeholder="Introduce tu telefono">
                        <small id="phoneHelp" class="form-text text-muted">Debe tener 9 digitos.</small>
                        <?php if(isset($errores["phone"])): ?>
                            <div class="invalid-feedback">
                                <ul>
                                    <?php foreach($errores["phone"] as $message): ?>
                                        <li><?=$message?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- PROVINCIA -->
                    <div class="form-group">
                        <label for="provincia">Provincia</label>
                        <select class="form-control <?=(isset($errores["provincia"]))?"is-invalid":"";?>" id="provincia" name="provincia" aria-describedby="provinciaHelp">
                            <option value="">- selecciona -</option>
                            <option value="15">A coruña</option>
                            <option value="1">Álava</option>
                            <option value="2">Albacete</option>
                            <option value="3">Alicante</option>
                            <option value="4">Almería</option>
                            <option value="33">Asturias</option>
                            <option value="5">Ávila</option>
                            <option value="6">Badajoz</option>
                            <option value="7">Baleares</option>
                            <option value="8">Barcelona</option>
                            <option value="9">Burgos</option>
                            <option value="10">Cáceres</option>
                            <option value="11">Cádiz</option>
                            <option value="39">Cantabria</option>
                            <option value="12">Castellón</option>
                            <option value="51">Ceuta</option>
                            <option value="13">Ciudad Real</option>
                            <option value="14">Córdoba</option>
                            <option value="16">Cuenca</option>
                            <option value="99">Extranjero</option>
                            <option value="17">Girona</option>
                            <option value="18">Granada</option>
                            <option value="19">Guadalajara</option>
                            <option value="20">Guipúzcoa</option>
                            <option value="21">Huelva</option>
                            <option value="22">Huesca</option>
                            <option value="23">Jaén</option>
                            <option value="26">La rioja</option>
                            <option value="35">Las palmas</option>
                            <option value="24">León</option>
                            <option value="25">Lleida</option>
                            <option value="27">Lugo</option>
                            <option value="28">Madrid</option>
                            <option value="29">Málaga</option>
                            <option value="52">Melilla</option>
                            <option value="30">Murcia</option>
                            <option value="31">Navarra</option>
                            <option value="32">Ourense</option>
                            <option value="34">Palencia</option>
                            <option value="36">Pontevedra</option>
                            <option value="37">Salamanca</option>
                            <option value="38">Santa cruz de tenerife</option>
                            <option value="40">Segovia</option>
                            <option value="41">Sevilla</option>
                            <option value="42">Soria</option>
                            <option value="43">Tarragona</option>
                            <option value="44">Teruel</option>
                            <option value="45">Toledo</option>
                            <option value="46">Valencia</option>
                            <option value="47">Valladolid</option>
                            <option value="48">Vizcaya</option>
                            <option value="49">Zamora</option>
                            <option value="50">Zaragoza</option>
                        </select>
                        <?php if(isset($errores["provincia"])): ?>
                            <div class="invalid-feedback">
                                <ul>
                                    <?php foreach($errores["provincia"] as $message): ?>
                                        <li><?=$message?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- TIPO DE CUENTA -->
                    <div class="form-group">
                        <label for="cuenta">Tipo de Cuenta</label>
                        <select class="form-control <?=(isset($errores["cuenta"]))?"is-invalid":"";?>" id="cuenta" name="cuenta" aria-describedby="cuentaHelp">
                            <option value="">- selecciona -</option>
                            <option value="E">Empleado</option>
                            <option value="C">Cliente</option>
                        </select>
                        <small id="cuentaHelp" class="form-text text-muted">Empleado = Buscas trabajo/Cliente = Proporcionas trabajo)</small>
                        <?php if(isset($errores["cuenta"])): ?>
                            <div class="invalid-feedback">
                                <ul>
                                    <?php foreach($errores["cuenta"] as $message): ?>
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
