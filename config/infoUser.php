<?php
function insertUser($arr){
    include('conn.php');
    $nome = $arr['nome'];
    $data = $arr['dataNasc'];
    $email = $arr['email'];
    $pass = md5($arr['pass']);

    $sqlInsert = "INSERT INTO $table(nome, dataNasc, email, pass) VALUES('$nome', '$data', '$email', '$pass');";
    $resulInsert = $conn->Query($sqlInsert);
    
    if($resulInsert){
        echo 'Foi';
    }else{
        echo 'N foi';
    }

}

function infoSelect($email){
    include('conn.php');
    $sqlSelect = "SELECT ID, nome, dataNasc, email, cargo FROM $table WHERE email = '$email';";
    $result = $conn->Query($sqlSelect);
    $result = $result->fetch_assoc();
    return $result;
}

?>