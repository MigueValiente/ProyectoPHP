<?php

function guardarLogin($db, $username, $status){
    // Guardar login

    // 192.168.64.1:8080/superlists

    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip=$_SERVER['REMOTE_ADDR'];
    }

    $browser = $_SERVER['HTTP_USER_AGENT'];

    $sql = "INSERT INTO logins VALUES(NULL, '$username', '$ip', '$browser', '$status', NOW())";

    $guardar_login = mysqli_query($db, $sql);
}

/**
 * Detect if a user owns a job.
 * 
 * @param $db Database connection.
 * @param $user_id User id.
 * @param $job_id Job id.
 */
function userOwnsJob($db, $user_id, $job_id) {
    $sql = "SELECT * FROM jobs WHERE id = $job_id AND user_id = $user_id LIMIT 1";
    $result = mysqli_query($db, $sql);
    if( mysqli_num_rows($result) == 0 ){
        return false;
    }
    return true;
}

?>