<?php
require_once '../setup.php';
require_once "../database/conexion.php";

//Si la sesion esta iniciada reenvia al usuario a la pagina principal
if(isset($_SESSION["userdata"])){
    header("Location: ".APP_URL);
}

if(isset($_POST["login"])){
    //FORMULARIO HA SIDO ENVIADO
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);


    if(empty($username)){
        $errors["username"]["empty"] = "Debes introducir un nombre de usuario";
        $username = null;
    }

    if(empty($password)){
        $errors["password"]["empty"] = "Debes introducir la contraseña";
        $password = null;
    }

    if(empty($errors)){
        //RECIBIDOS LOS DATOS
        //HAREMOS UNA CONSULTA A LA BASE DE DATOS
        $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $login = mysqli_query($db, $sql);

        if($login && mysqli_num_rows($login) == 1){
            
            $usuario = mysqli_fetch_assoc($login);
            
            if(password_verify($password,$usuario["password"])){
                //CREO UNA SESION DE USUARIO
                $_SESSION["userdata"] = $usuario;
                header("Location:".APP_URL);
            }else{
                $errors["login"]["password"] = "La contraseña no es correcta";
            }
        }else{
            $errors["login"]["username"] = "El usuario no es correcto";
        }
    }
}

require_once "login.view.php";
?>

