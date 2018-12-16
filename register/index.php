<?php
    require_once '../setup.php';
    require_once "../database/conexion.php";

    //Si la sesion esta iniciada reenvia al usuario a la pagina principal
    if(isset($_SESSION["usuario"])){
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
        
        //NAME
        if(empty($name)){
            $errores["name"]["vacio"] = "El campo nombre es obligatorio.<br>";
            $name = null;
        }

        if(strlen($name) < 3){
            $errores['name']['length'] = "El nombre debe tener al menos 3 caracteres.<br>";
            $name = null;
        }

        if(!preg_match('/^[a-zA-Z][a-z]{2,}$/',$name)){
            $errores["name"]["regex"] = "El nombre no cumple con los siguientes requisitos:<br>
                                <ul>
                                    <li>Debetener mínimo 3 caracteres.</li>
                                    <li>Solo se admiten letras.</li>
                                <ul>";
            $name = null;
        }else{
            $name = ucwords($name," ");
        }

        //SURNAME
        //var_dump($surname);
        if(empty($surname)){
            $errores["surname"]["vacio"] = "El campo apellido es obligatorio.<br>";
            $surname = null;
        }

        if(strlen($surname) < 3){
            $errores['surname']['length'] = "El nombre debe tener al menos 3 caracteres.<br>";
            $surname = null;
        }

        if(!preg_match('/^[a-zA-Z][a-z]{2,}$/',$surname)){
            $errores["name"]["regex"] = "El nombre no cumple con los siguientes requisitos:<br>
                                <ul>
                                    <li>Debetener mínimo 3 caracteres.</li>
                                    <li>Solo se admiten letras .</li>
                                <ul>";
            $surname = null;
        }else{
            $surname = ucwords($surname," ");
        }

        //USERNAME
        if(empty($username)){
            $errores["username"]["vacio"] = "El campo usuario es obligatorio.<br>";
            $username = null;
        }

        if(strlen($username) < 8){
            $errores['username']['length'] = "El nombre de usuario debe tener al menos 8 caracteres.<br>";
            $username = null;
        }
        
        if(!preg_match('/^[a-z0-9]{8,}$/',$username)){
            $errores["username"]["regex"] = "El nombre no cumple con los siguientes requisitos:<br>
                                <ul>
                                    <li>Debetener mínimo 8 caracteres.</li>
                                    <li>Solo se admiten números y letras minúsculas</li>
                                <ul>";
            $username = null;
        }

        //EMAIL
        if(empty($email)){
            $errores["email"]["vacio"] = "El campo email es obligatorio.<br>";
            $email = null;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errores["email"]["regex"] = "El email no es valido.<br>";
            $email = null;
        }

        //TELEFONO

        if(empty($phone)){
            $errores["phone"]["vacio"] = "El campo telefono es obligatorio.<br>";
            $phone = null;
        }

        if(strlen($phone) < 9){
            $errores['phone']['length'] = "El telefono debe tener al menos 9 digitos.<br>";
            $phone = null;
        }

        if(!preg_match('/^[6|7|9][a-z0-9]{8}$/',$phone)){
            $errores["phone"]["regex"] = "El numero de movil no cumple con los siguientes requisitos:<br>
                                <ul>
                                    <li>Debetener mínimo 9 digitos.</li>
                                    <li>Debe empezar por 6, 7 o 9.</li>
                                <ul>";
            $phone = null;
        }

        // if(empty($errores["phone"])){
        //     $phone = intval($phone);
        // }

        //PROVINCIA
        if(empty($provincia)){
            $errores["provincia"]["vacio"] = "Debe seleccionar una provincia.<br>";
            $provincia = null;
        }else{
            $provincia = intval($provincia);
        }
        
        //CUENTA
        if(empty($cuenta)){
            $errores["cuenta"]["vacio"] = "Debe seleccionar un tipo de cuenta.<br>";
            $cuenta = null;
        }


        //CONTRASEÑAS
        if(empty($password)){
            $errores["password"]["vacio"] = "El campo contraseña es obligatorio.<br>";
        }

        if(strlen($password) < 6){
            $errores["password"]["regex"] = "La contraseña no cumple con los siguientes requisitos:<br>
                                    <ul>
                                        <li>Debetener mínimo 6 caracteres.</li>
                                        <li>Solo se admiten caracteres alfanumericos</li>
                                    <ul>";
        }

        if(empty($password_confirmation)){
            $errores["password_confirmation"]["vacio"] = "El campo contraseña es obligatorio.<br>";
        }

        if($password != $password_confirmation){
            $errores["password_confirmation"]["comparacion"] = "Las contraseñas no coinciden.<br>";
        }

        if( empty($errores)){
            $password_segura = password_hash($password, PASSWORD_BCRYPT);
            // echo "Guardar en la BD";
             $query = "INSERT INTO users VALUES(null,'$name','$surname','$username','$email','$phone','$provincia','$cuenta',NOW(),NOW(),'$password_segura')";

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