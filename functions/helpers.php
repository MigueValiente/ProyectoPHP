<?php
require_once "../register/index.php";
function printDataFormater($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

// function comprobarErrores($arrayErrores){
//     print('<div class="invalid-feedback">');
//         print('<ul>');
//             foreach($arrayErrores as $message){
//                 print('<li>'.$message.'</li>');
//             }
//         print('</ul>');
//     print('</div>');         
// }

function validationDiv($data, $type) {
    global $errores;

    $div = "";
    if( !empty($errores[$data]) ){
        
        $div .= ($type=="invalid-feedback"?
                    '<div class="invalid-feedback">':
                    '<div class="alert alert-danger" role="alert">');

        foreach ($errores[$data] as $error) {
            $div .= $error;
        }
        $div .= '</div>';
    }

    return $div;
}

function validationDiv($data, $type) {
    global $errores;
    $div = "";
    if( !empty($errores[$data]) ){
        
        $div .= ($type=="invalid-feedback"?
                    '<div class="invalid-feedback">':
                    '<div class="alert alert-danger" role="alert">');
        foreach ($errores[$data] as $error) {
            $div .= $error;
        }
        $div .= '</div>';
    }
    return $div;
}

function guardarLogin(){
    
}


?>