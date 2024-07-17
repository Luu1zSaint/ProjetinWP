<?php
include('conn.php');
function verifica($arr){
    function verificaPass($pass, $pass2){
        if($pass === $pass2){
            return true;
        }
        return false;
    }
    $veriPass2 = verificaPass($arr['pass'], $arr['pass2']);
    $veriEmail = filter_var($arr['email'], FILTER_VALIDATE_EMAIL);

    if($veriEmail && $veriPass2){
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