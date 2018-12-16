<?php
require_once '../setup.php';
require_once '../database/conexion.php';
require_once '../database/helpers.php';

if( !isset($_GET['id']) ){
    header("Location: ".APP_URL);
}

$job_id = $_GET['id'];
$user_id = $_SESSION['usuario']['id'];

if( !userOwnsJob($db, $user_id, $job_id) ){
    header("Location: ".APP_URL."my_jobs");
    die();
}

$sql_job = "SELECT * FROM jobs WHERE id = $job_id LIMIT 1";
    $result_job = mysqli_query($db, $sql_job);
    $job = mysqli_fetch_assoc($result_job);


require_once 'job.view.php';