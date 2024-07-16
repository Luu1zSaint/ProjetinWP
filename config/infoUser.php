<?php
function infoSelect($email){
    include('conn.php');
    $sqlSelect = "SELECT ID, nome, dataNasc, email, cargo FROM $table WHERE email = '$email';";
    $result = $conn->Query($sqlSelect);
    $result = $result->fetch_assoc();
    return $result;
}






?>