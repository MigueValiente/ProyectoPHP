<?php
require_once '../setup.php';
require_once '../database/conexion.php';
require_once '../database/helpers.php';

 // Comprobar que hay sesión
if ( empty($_SESSION) ){
    header("Location: ".APP_URL.'login');
    die();
}
$user_id = $_SESSION['usuario']['id'];

// Comprobamos que recibimos el id por GET
if ( !isset($_GET['id']) ){
    header("Location: ".APP_URL.'login');
    die();
}
$job_id = $_GET['id'];


if( !userOwnsJob($db, $user_id, $job_id) ){
    header("Location: ".APP_URL."my_jobs");
    die();
}

// Extraer la información del trabajo
$sql_job = "SELECT * FROM jobs WHERE id = $job_id LIMIT 1";
$result_job = mysqli_query($db, $sql_job);
$job = mysqli_fetch_assoc($result_job);

if( isset($_POST['edit_job']) ){
    $jobname = trim($_POST['jobname']) ?? null;
    $description = trim($_POST['jobdesc']) ?? null;
    $payment = trim($_POST['jobpayment']);

    // Array de errores
    $errores = [];

    // Validaciones
    // jobname:
    if ( empty($jobname) ){
        $errores['jobname']['empty'] = "Debes introducir un nombre para el trabajo.";
        $username = null;
    }

    if ( strlen($jobname) < 10 ) {
        $errores['jobname']['length'] = "El nombre del trabajo debe tener al menos 10 caracteres.";
        $username = null;
    }

    //payment

    if(empty($payment)){
        $errores['jobpayment']['vacio'] = "El campo remuneracion no puede estar vacio.<br>";
        $payment = null;
    }

    if(is_numeric($payment)){
        $payment = intval($payment);
    }else{
        $errores['jobpayment']['formato'] = "Solo se admiten digitos del 0 al 9.<br>";
        $payment = null;
    }
    if ($payment <= 0){
        $errores['jobpayment']['zero'] = "Debes introducir una cantidad mayor que 0.<br>";
        $payment = null;
    }
    
    if( empty($errores) ){
        // Insertar usuario en la base de datos
        // $sql = "INSERT INTO jobs(user_id, name, description) VALUES( $user_id, '$jobname', '$description')";
        $sql = "UPDATE jobs SET name = '$jobname', description = '$description', payment = '$payment' WHERE id = $job_id";
        $actualizar = mysqli_query($db, $sql);

        if( $actualizar ){
            $id = mysqli_insert_id($db);
            // Redirigir a la página de Mis trabajos
            header("Location: ".APP_URL.'job/?id='.$job_id);
            die();
        }

        echo "Error: ".mysqli_error($db);
        die();   
    }
}

require_once 'edit_job.view.php';