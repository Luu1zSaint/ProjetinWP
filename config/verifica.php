<?php
include('conn.php');
function verifica($arr){
    function verificaLen($world){
        $world = strlen($world);
        if($world > 3 && $world <= 27){
            return true;
        }
        return false;
    }
    function verificaPass($pass, $pass2){
        if($pass === $pass2){
            return true;
        }
        return false;
    }
    $veriNome = verificaLen($arr['nome']);
    $veriPass = verificaLen($arr['pass']);
    $veriPass2 = verificaPass($arr['pass'], $arr['pass2']);
    $veriEmail = filter_var($arr['email'], FILTER_VALIDATE_EMAIL);

    if($veriEmail && $veriNome && $veriPass && $veriPass2){
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
        return 'buceta';
    }
    return 'crlh';
}

?>