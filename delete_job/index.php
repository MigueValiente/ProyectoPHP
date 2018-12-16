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

// Comprobar que el usuario es propietario del trabajo
// La url será de la forma:
//      http://localhost/ProyectoPHP/delete_job/?id=x
if( !userOwnsJob($db, $user_id, $job_id) ){
    header("Location: ".APP_URL."my_jobs");
    die();
}

// En caso afirmativo borrar la lista
$sql = "DELETE FROM jobs WHERE id = $job_id AND cliente_id = $user_id LIMIT 1";
$result = mysqli_query($db, $sql);

if( $result ) {
    header("Location: ".APP_URL."my_jobs");
    die();
}else{
    echo "Error borrando el trabajo";
    die();
}