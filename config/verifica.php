<?php
include('conn.php');
function verifica($arr){
    $veriEmail = filter_var($arr['email'], FILTER_VALIDATE_EMAIL);
    if($veriEmail && $arr['pass'] === $arr['pass2']){
        return true;
    }
    return false;
}
function checkLogin($email, $pass){
    include('conn.php');
    $pass = md5($pass);
    $sqlSelect = "SELECT email, pass FROM $table WHERE email = '$email' AND pass = '$pass';";
    $resultQuery = $conn->Query($sqlSelect);
    if($resultQuery->num_rows == 1){
        return true;
    }
    return false;
}

?>