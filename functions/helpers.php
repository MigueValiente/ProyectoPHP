<?php
require_once "../register/index.php";
function printDataFormater($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function comprobarErrores($arrayErrores){
    print('<div class="invalid-feedback">');
        print('<ul>');
            foreach($arrayErrores as $message){
                print('<li>'.$message.'</li>');
            }
        print('</ul>');
    print('</div>');         
}

function guardarLogin(){
    
}


?>