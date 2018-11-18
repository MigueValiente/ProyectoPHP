<?php
require_once "../register/index.php";
function printDataFormater($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function comprobarErrores($nombreError){
    $resultado = "";
    if(isset($errores[$nombreError])){
        $resultado.="<div class='invalid-feedback'><br>";
        $resultado.= "<ul><br>";
        foreach($errores[$nombreError] as $message){
            $resultado.="<li><?=$message?></li><br>";
        }
        $resultado.="</ul><br>";
        $resultado.="</div><br>";        
    }                     
    return $resultado;
}

?>