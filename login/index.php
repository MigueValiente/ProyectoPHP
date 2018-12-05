<?php
require_once '../setup.php';
require_once "../database/conexion.php";
require_once '../database/helpers.php';

//Si la sesion esta iniciada reenvia al usuario a la pagina principal
if(!empty($_SESSION)){
    header("Location: ".APP_URL);
}

if(isset($_POST["login"])){
    //FORMULARIO HA SIDO ENVIADO
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);


    if(empty($username)){
        $errores["username"]["vacio"] = "Debes introducir un nombre de usuario.<br>";
        $username = null;
    }

    if(empty($password)){
        $errores["password"]["vacio"] = "Debes introducir la contraseña.<br>";
        $password = null;
    }

    if(empty($errores)){
        //RECIBIDOS LOS DATOS
        //HAREMOS UNA CONSULTA A LA BASE DE DATOS
        $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $login = mysqli_query($db, $sql);

        if( $login && mysqli_num_rows($login)==1 ){
            $usuario = mysqli_fetch_assoc($login);
            $result = null;
            
            if(password_verify($password,$usuario["password"])){
                // Guardar login
                guardarLogin($db, $username, 'OK');

                // Utilizar una sesión para guardar los datos del usuario logueado
                $_SESSION['usuario'] = $usuario;
                header("Location: ".APP_URL);
            }else{
                // Guardar login si la contraseña no es correcta
                guardarLogin($db, $username, 'FAULT');

                // Si algo falla enviar una sesión con el fallo
                $errores['login']['password'] = "La contraseña no es correcta.<br>";
            }
        }else{
            guardarLogin($db, $username, 'FAULT');
            $errores['login']['data'] = "Los datos no son correctos.<br>";
        }
    }
}

require_once "login.view.php";
?>


<!-- CREATE TABLE logins (
	`id` int PRIMARY KEY AUTO_INCREMENT,
  	`username` varchar(255) NOT NULL,
  	`ip` varchar(255) NOT NULL,
  	`agent` varchar(255) NOT NULL,
  	`status` ENUM(`OK`,`FAULT`) NOT NULL,
  	`created_at` TIMESTAMP NOT NULL
); -->

