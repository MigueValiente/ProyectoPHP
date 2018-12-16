<?php
// var_dump($_SERVER);
// die();
$url = $_SERVER['REQUEST_SCHEME']."://";
$serverName = $_SERVER['SERVER_NAME']."/";
$urlParts = explode("/",$_SERVER['REQUEST_URI']);
$request = $urlParts[1]."/";

/** URL principal de la aplicacion */
// define('APP_URL', $url.$serverName.$request);
define('APP_URL', $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/".'ProyectoPHP/');

/**Directorio principal de la aplicacion en el servidor */
define('APP_PATH', __DIR__);

/** Nombre de la aplicacion */
define('APP_NAME', "WorKing");

//Iniciar la sesion
session_start();