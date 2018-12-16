<?php

require_once '../setup.php';
require_once '../database/conexion.php';
require_once '../database/helpers.php';

// Comprobar que la sesión está creada
if ( empty($_SESSION) ){
    header("Location: ".BASE_URL.'login');
    die();
}
$user_id = $_SESSION['usuario']['id'];


$sql_jobs = "SELECT * FROM jobs WHERE cliente_id = $user_id";
$sql_provincias = "SELECT provincias.provincia from provincias JOIN jobs ON provincias.id_provincia = jobs.provincia";
$result_jobs = mysqli_query($db, $sql_jobs);
$result_provincia = mysqli_query($db,$sql_provincias);

require_once 'my_jobs.view.php';