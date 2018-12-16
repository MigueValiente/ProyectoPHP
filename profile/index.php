<?php
require_once '../setup.php';
require_once '../database/conexion.php';
require_once '../database/helpers.php';
require_once '../functions/helpers.php';

 // Comprobar que hay sesión
 if ( empty($_SESSION) ){
    header("Location: ".APP_URL.'login');
    die();
}
$user_id = $_SESSION['usuario']['id'];

// Comprobamos que recibimos el id por GET
if ( !isset($_GET['section']) ){
    header("Location: ".APP_URL.'login');
    die();
}
$section = $_GET['section'];

// Comprobamos si la sección es válida
$sections = ['name', 'email', 'password','phone','username','provincia'];
if( !in_array($section, $sections) ){
    header("Location: ".APP_URL.'login');
    die();
}

$sql_list = "SELECT * FROM users WHERE id = $user_id LIMIT 1";
$result_list = mysqli_query($db, $sql_list);
$user = mysqli_fetch_assoc($result_list);

if( isset($_POST['update_name']) ){
    $name = trim($_POST['name']) ?? null;
    $surname = trim($_POST['surname']) ?? null;

    //VALIDACION NOMBRE
    if ( empty($name) ){
        $errores['name']['empty'] = "Debes introducir un nombre.<br>";
        $name = null;
    }

    if ( strlen($name) < 8 ) {
        $errores['name']['length'] = "El nombre debe tener al menos 2 caracteres.<br>";
        $name = null;
    }

    if ( !preg_match("/^[a-zA-Z][a-z]{2,}$/",$name) ){
        $errores['name']['format'] = "El nombre solo admite letras.<br>";
        $name = null;
    }

    //VALIDACION APELLIDO
    if ( empty($surname) ){
        $errores['surname']['empty'] = "Debes introducir un apellido.<br>";
        $surname = null;
    }

    if ( strlen($surname) < 8 ) {
        $errores['surname']['length'] = "El apellido debe tener al menos 2 caracteres.<br>";
        $surname = null;
    }

    if ( !preg_match("/^[a-zA-Z][a-z]{2,}$/",$surname) ){
        $errores['surname']['format'] = "El apellido solo admite letras.<br>";
        $surname = null;
    }

    if( empty($errores) ){
        $sql = "UPDATE users SET name = '$name', surname = '$surname' updated_at = NOW() WHERE id = '$user_id' LIMIT 1";

        $guardar = mysqli_query($db, $sql);

        if( $guardar ){
            // Actualizar la información de sesión
            $_SESSION['usuario']['name'] = $name;
            $_SESSION['usuario']['surname'] = $surname;
            header("Location: ".APP_URL);
            die();
        }

        echo "Error: ". mysqli_error($db);
        die();   
    }
}
//VALIDACION USUARIO
if( isset($_POST['update_username']) ){
    $username = trim($_POST['username']) ?? null;

    if ( empty($username) ){
        $errors['username']['empty'] = "Debes introducir un nombre.<br>";
        $username = null;
    }

    if ( strlen($username) < 8 ) {
        $errors['username']['length'] = "El nombre de usuario debe tener al menos 8 caracteres.<br>";
        $username = null;
    }

    if ( !preg_match("/[0-9a-z]+$/",$username) ){
        $errors['username']['format'] = "El usuario solo admite números y letras minúsculas.<br>";
        $username = null;
    }

    if( empty($errors) ){
        // Actualizar datos
        $sql = "UPDATE users SET username = '$username', updated_at = NOW() WHERE id = '$user_id' LIMIT 1";

        $guardar = mysqli_query($db, $sql);

        if( $guardar ){
            // Actualizar la información de sesión
            $_SESSION['usuario']['username'] = $username;
            header("Location: ".APP_URL);
            die();
        }

        echo "Error: ". mysqli_error($db);
        die();   
    }
}

//VALIDACION EMAIL
if( isset($_POST['update_email']) ){
    $email = trim($_POST['email']) ?? null;

    
    if ( empty($email) ){
        $errores['email']['empty'] = "Debes introducir un email.<br>";
        $email = null;
    }

    if( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
        $errores['email']['format'] = "Debes introducir un email válido.<br>";
        $email = null;
    }

    if( empty($errores) ){
        // Actualizar datos
        $sql = "UPDATE users SET email = '$email', updated_at = NOW() WHERE id = '$user_id' LIMIT 1";

        $guardar = mysqli_query($db, $sql);

        if( $guardar ){
            // Actualizar la información de sesión
            $_SESSION['usuario']['email'] = $email;
            header("Location: ".APP_URL);
            die();
        }

        echo "Error: ". mysqli_error($db);
        die();   
    }
}

//VALIDACION TELEFONO
if(isset($_POST['update_phone']) ){
    $phone = trim($_POST['telefono']);

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

    if( empty($errores) ){
        // Actualizar datos
        $sql = "UPDATE users SET telefono = '$phone', updated_at = NOW() WHERE id = '$user_id' LIMIT 1";

        $guardar = mysqli_query($db, $sql);

        if( $guardar ){
            // Actualizar la información de sesión
            $_SESSION['usuario']['telefono'] = $phone;
            header("Location: ".APP_URL);
            die();
        }

        echo "Error: ". mysqli_error($db);
        die();   
    }
}

//VALIDACION PROVINCIA

if(isset($_POST['update_provincia'])){
    $provincia = $_POST['provincia'];

    if(empty($provincia)){
        $errores["provincia"]["vacio"] = "Debe seleccionar una provincia.<br>";
        $provincia = null;
    }else{
        $provincia = intval($provincia);
    }

    if( empty($errores) ){
        // Actualizar datos
        $sql = "UPDATE users SET provincia = '$provincia', updated_at = NOW() WHERE id = '$user_id' LIMIT 1";

        $guardar = mysqli_query($db, $sql);

        if( $guardar ){
            // Actualizar la información de sesión
            $_SESSION['usuario']['provincia'] = $provincia;
            header("Location: ".APP_URL);
            die();
        }

        echo "Error: ". mysqli_error($db);
        die();   
    }

}
//VALIDACION CONTRASEÑA
if( isset($_POST['update_password']) ){
    $current_password = trim($_POST['current_password']) ?? null;
    $password = trim($_POST['password']) ?? null;
    $passwordconf = trim($_POST['password-conf']) ?? null;

    if ( empty($current_password) ){
        $errores['current_password']['empty'] = "Debes facilitar la contraseña actual.<br>";
    }

    if ( strlen($current_password) < 6 ) {
        $errores['current_password']['length'] = "La contraseña actual es de al menos 6 caracteres.<br>";
    }

    // Compruebo la contraseña actual
    if( !password_verify($current_password, $user['password']) ){
        $errores['current_password']['fault'] = "Las contraseña actual no es correcta.<br>";
    }

    if ( empty($password) ){
        $errores['password']['empty'] = "Debes facilitar una nueva contraseña.<br>";
    }

    if ( strlen($password) < 6 ) {
        $errores['password']['length'] = "La contraseña nueva debe tener al menos 6 caracteres.<br>";
    }

    if ( empty($passwordconf) ){
        $errores['passwordconf']['empty'] = "Debes confirmar la contraseña.<br>";
    }

    if ( $password != $passwordconf ){
        $errores['passwordconf']['match'] = "Las contraseñas no coinciden.<br>";
    }

    if( empty($errores) ){
        // Cifrar la contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT);

        // Actualizar datos
        $sql = "UPDATE users SET password = '$password_segura', updated_at = NOW() WHERE id = '$user_id' LIMIT 1";

        $guardar = mysqli_query($db, $sql);

        if( $guardar ){
            $_SESSION['usuario']['password'] = $password_segura;
            header("Location: ".APP_URL);
            die();
        }

        echo "Error: ". mysqli_error($db);
        die();  
    }
}

require_once 'profile.view.php';
