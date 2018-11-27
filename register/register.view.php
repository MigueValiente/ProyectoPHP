<?php 
    require_once '../setup.php';
    require_once "../includes/header.php";
    require_once "../functions/helpers.php";
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
                        <input type="text" class="form-control <?=($errores["name"])?"is-invalid":"";?>"id="name" name="name" aria-describedby="nameHelp" placeholder="Introduce tu nombre" value="<?=($name??'')?>">
                        <small id="nameHelp" class="form-text text-muted">Debe tener como mínimo 3 caracteres </small>
                        <!-- MENSAJE DE ERROR -->
                        <?=validationDiv('name','invalid-feedback')?> 
                    </div>

                    <!-- APELLIDO -->
                    <div class="form-group">
                        <label for="surname">Apellido</label>
                        <input type="text" class="form-control <?=($errores["surname"])?"is-invalid":"";?>"id="surname" name="surname" aria-describedby="surnameHelp" placeholder="Introduce tu apellido" value="<?=($surname??'')?>">
                        <small id="surnameHelp" class="form-text text-muted">Debe tener como mínimo 3 caracteres </small>
                        <!-- MENSAJE DE ERROR -->
                        <?=validationDiv('surname','invalid-feedback')?> 
                    </div>

                    <!-- NOMBRE DE USUARIO -->
                    <div class="form-group">
                        <label for="username">Nombre de usuario</label>
                        <input type="text" class="form-control <?=($errores['username'])?"is-invalid":""?>" id="username" name="username" aria-describedby="usernameHelp" placeholder="Introduce un nombre de usuario" value="<?=($username??'')?>">
                        <small id="usernameHelp" class="form-text text-muted">Debe tener como mínimo 8 caracteres con números y letras minúsculas.</small>
                        <!-- MENSAJE DE ERROR -->
                        <?=validationDiv('username','invalid-feedback')?>
                    </div>

                    <!-- EMAIL -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control <?=($errores["email"])?"is-invalid":"";?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Introduce tu email" value="<?=($email??'')?>">
                        <small id="emailHelp" class="form-text text-muted">Tu email no lo sabrán el resto de usuarios.</small>
                        <?=validationDiv('email','invalid-feedback')?>
                    </div>

                    <!-- TELEFONO -->
                    <div class="form-group">
                        <label for="phone">Telefono</label>
                        <input type="text" class="form-control <?=($errores["phone"])?"is-invalid":"";?>" id="phone" name="phone" aria-describedby="phoneHelp" placeholder="Introduce tu telefono" value="<?=($phone??'')?>">
                        <small id="phoneHelp" class="form-text text-muted">Debe tener 9 digitos.</small>
                        <?=validationDiv('phone','invalid-feedback')?>
                    </div>

                    <!-- PROVINCIA -->
                    <div class="form-group">
                        <label for="provincia">Provincia</label>
                        <select class="form-control <?=($errores["provincia"])?"is-invalid":"";?>" id="provincia" name="provincia" aria-describedby="provinciaHelp">
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
                        <?=validationDiv('provincia','invalid-feedback')?>
                    </div>

                    <!-- TIPO DE CUENTA -->
                    <div class="form-group">
                        <label for="cuenta">Tipo de Cuenta</label>
                        <select class="form-control <?=($errores["cuenta"])?"is-invalid":"";?>" id="cuenta" name="cuenta" aria-describedby="cuentaHelp">
                            <option value="">- selecciona -</option>
                            <option value="E">Empleado</option>
                            <option value="C">Cliente</option>
                        </select>
                        <small id="cuentaHelp" class="form-text text-muted">Empleado = Buscas trabajo | Cliente = Proporcionas trabajo</small>
                        <?=validationDiv('cuenta','invalid-feedback')?>
                    </div>

                    <!-- CONTRASEÑA -->
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control <?=($errores["password"])?"is-invalid":"";?>" id="password" name="password" placeholder="Introduce tu contraseña">
                        <small id="passwordHelp" class="form-text text-muted">Debe tener 6 caracteres como mínimo</small>
                        <?=validationDiv('password','invalid-feedback')?>
                    </div>

                    <!-- CONFIRMACION DE LA CONTRASEÑA -->
                    <div class="form-group">
                        <label for="password_confirmation">Confirmar Contraseña</label>
                        <input type="password" class="form-control <?=($errores["password_confirmation"])?"is-invalid":"";?>" id="password_confirmation" name="password_confirmation" placeholder="Vuelva a introducir la contraseña">
                        <?=validationDiv('password_confirmation','invalid-feedback')?>
                    </div>
                    
                    <!-- BOTON DE ENVIAR -->
                    <button type="submit" class="btn btn-primary" name="registro">Registrar</button>
                </form>
            </div>           
    </div>
</div>
<!-- End Body -->
<?php require_once "../includes/footer.php"?>
