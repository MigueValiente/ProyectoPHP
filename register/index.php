<?php
    require_once '../setup.php';
    require_once "../database/conexion.php";

    //Si la sesion esta iniciada reenvia al usuario a la pagina principal
    if(isset($_SESSION["userdata"])){
        header("Location: ".APP_URL);
    }

    if(isset($_POST["registro"])){
        $name = $_POST["name"] ?? null;
        $surname = $_POST["surname"] ?? null;
        $username = $_POST["username"] ?? null;
        $email = $_POST["email"] ?? null;
        $phone = $_POST["phone"] ?? null;
        $provincia = $_POST["provincia"] ?? null;
        $cuenta = $_POST["cuenta"] ?? null;
        $password = $_POST["password"] ?? null;
        $password_confirmation = $_POST["password_confirmation"] ?? null;

        $errores = [];
        
        //Nombre de usuario
        if(is_null($username) || $username == ""){
            $errores["username"]["vacio"] = "El campo nombre es obligatorio";
        }
        
        if(!preg_match('/^[a-z0-9]{8,}$/',$username)){
            $errores["username"]["regex"] = "El nombre no cumple con los siguientes requisitos:<br>
                                <ul>
                                    <li>Debetener mínimo 8 caracteres.</li>
                                    <li>Solo se admiten números y letras minúsculas</li>
                                <ul>";
        }

        //EMAIL
        if(empty($email)){
            $errores["email"]["vacio"] = "El campo email es obligatorio";
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errores["email"]["regex"] = "El email no es valido";
        }

        //CONTRASEÑAS
        if(empty($password)){
            $errores["password"]["vacio"] = "El campo contraseña es obligatorio";
        }

        if(strlen($password) < 6){
            $errores["password"]["regex"] = "La contraseña no cumple con los siguientes requisitos:<br>
                                    <ul>
                                        <li>Debetener mínimo 6 caracteres.</li>
                                        <li>Solo se admiten caracteres alfanumericos</li>
                                    <ul>";
        }

        if(empty($password_confirmation)){
            $errores["password_confirmation"]["vacio"] = "El campo contraseña es obligatorio";
        }

        if($password != $password_confirmation){
            $errores["password_confirmation"]["comparacion"] = "Las contraseñas no coinciden";
        }

        if( empty($errores)){
            $password_segura = password_hash($password, PASSWORD_BCRYPT);
            // echo "Guardar en la BD";
             $query = "INSERT INTO users VALUES(null,'$username','$email','$password_segura',NOW(),NOW())";

            $result = mysqli_query($db, $query);

            if($result){
                header("Location: ".APP_URL);
                //Aqui se mandaria el email de confirmacion
            }else{
                die("La cagamos guardando el usuario");
            }   
        }
    }

    require_once "register.view.php";
?>