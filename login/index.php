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
        $errores["username"]["vacio"] = "Debes introducir un nombre de usuario";
        $username = null;
    }

    if(empty($password)){
        $errores["password"]["vacio"] = "Debes introducir la contraseña";
        $password = null;
    }

    if(empty($errores)){
        //RECIBIDOS LOS DATOS
        //HAREMOS UNA CONSULTA A LA BASE DE DATOS
        $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $login = mysqli_query($db, $sql);

        if($login && mysqli_num_rows($login) == 1){
            
            $usuario = mysqli_fetch_assoc($login);
            $result = null;
            
            if(password_verify($password,$usuario["password"])){
                //CREO UNA SESION DE USUARIO
                $password_segura = $usuario["password"];
                $_SESSION["userdata"] = $usuario;
                $query = "INSERT INTO logs VALUES(null,'$username','$password_segura',NOW(),'success')";
                $result = mysqli_query($db, $query);
                header("Location:".APP_URL);
            }else{
                $errores["login"]["password"] = "La contraseña no es correcta";
                $query = "INSERT INTO logs VALUES(null,'$username','$password',NOW(),'fail')";
                $result = mysqli_query($db, $query);
            }
        }else{
            $errores["login"]["username"] = "El usuario no es correcto";
        }
    }
}

require_once "login.view.php";
?>

