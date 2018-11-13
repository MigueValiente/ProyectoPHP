<?php
//Recibe un servidor, el usuario,contraseña
$db = mysqli_connect("localhost", "root", "", "myprojectdb");

// if(mysqli_connect_errno()){
//     die("La hemos cagado conectando a la BD");
// }else{
//     die("Todo ok");
// }

mysqli_query($db, "SET NAMES 'utf8'");
?>