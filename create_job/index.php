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
        $payment = $_POST['jobpayment'] ?? null;

        // Array de errores
        $errors = [];

        // Validaciones
        // Jobname:
        if (empty($jobname) ){
            $errores['jobname']['empty'] = "Debes introducir un nombre para el trabajo.<br>";
            $username = null;
        }

        if (strlen($jobname) < 10 ) {
            $errores['jobname']['length'] = "El nombre de la lista debe tener al menos 10 caracteres.<br>";
            $username = null;
        }

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
    
        if(empty($errores) ){
            // Insertar usuario en la base de datos
            $user_id = intval($_SESSION['usuario']['id']);
            $sql = "INSERT INTO jobs VALUES(NULL, $user_id,'$jobname','$description','$payment',NOW(), NOW())";

            $guardar = mysqli_query($db, $sql);

            if( $guardar ){
                // $id = mysqli_insert_id($db);
                // Redirigir a la página de Mis trabajos
                // header("Location: ".APP_URL.'job/?id='.$id);
                header("Location: ".APP_URL);
                
            }else{
                echo "Error";
                // var_dump($user_id);
                // echo "<br>";
                // var_dump($jobname);
                // echo "<br>";
                // var_dump($description);
                // echo "<br>";
                // var_dump($payment);
                // echo "<br>";
                // var_dump($guardar);
                die();  
            }

               
        }
    }
    require_once 'crear_trabajo.view.php';