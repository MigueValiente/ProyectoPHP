<?php
    require_once '../setup.php';
    require_once '../database/conexion.php';

    if ( empty($_SESSION) ){
        header("Location: ".BASE_URL.'login');
        die();
    }

    if( isset($_POST['new_job']) ){
        $jobname = trim($_POST['jobname']) ?? null;
        $description = trim($_POST['jobdesc']) ?? null;
        $payment = intval($_POST['jobpayment'])  ?? null;

        // Array de errores
        $errors = [];

        // Validaciones
        // username:
        if ( empty($jobname) ){
            $errors['jobname']['empty'] = "Debes introducir un nombre para el trabajo.";
            $username = null;
        }

        if ( strlen($jobname) < 10 ) {
            $errors['jobname']['length'] = "El nombre de la lista debe tener al menos 10 caracteres.";
            $username = null;
        }

        if ( $payment <= 0){
            $errors['payment']['zero'] = "Debes introducir una cantidad mayor que 0.";
            $username = null;
        }
    
        if( empty($errors) ){
            // Insertar usuario en la base de datos
            $user_id = $_SESSION['usuario']['id'];
            $sql = "INSERT INTO jobs VALUES(NULL, $user_id, '$jobname', '$description',,'$payment' NOW(), NOW())";

            $guardar = mysqli_query($db, $sql);

            if( $guardar ){
                $id = mysqli_insert_id($db);
                // Redirigir a la página de Mis trabajos
                header("Location: ".BASE_URL.'job/?id='.$id);
                die();
            }

            echo "Error";
            die();   
        }
    }
    require_once 'crear_trabajo.view.php';