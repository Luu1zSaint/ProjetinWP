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
        return true;
    }
    return false;
}
function updateUser($arrP, $arrS){
    include('conn.php');
    $id = $arrS['ID'];
    if(empty($arrP['nome'])){
        $arrP['nome'] = $arrS['nome'];
    }
    if(empty($arrP['dataNasc'])){
        $arrP['dataNasc'] = $arrS['dataNasc'];
    }
    if(empty($arrP['email'])){
        $arrP['email'] = $arrS['email'];
    }
    if(empty($arrP['cargo'])){
        $arrP['cargo'] = $arrS['cargo'];
    }
    if(empty($arrP['pass'])){
        $arrP['pass'] = $arrS['pass'];
    }else{
        $arrP['pass'] = md5($arrP['pass']);
    }
    $nome = $arrP['nome'];
    $data = $arrP['dataNasc'];
    $email = $arrP['email'];
    $cargo = $arrP['cargo'];
    $pass = $arrP['pass'];
    $sqlInsert = "UPDATE $table SET nome='$nome', dataNasc='$data', email='$email', cargo='$cargo', pass='$pass' WHERE ID = '$id';";
    $resulInsert = $conn->Query($sqlInsert);
    if($resulInsert){
        return true;
    }
    return false;
}
function allInfo($id){
    include('conn.php');
    $sqlSelect = "SELECT * FROM $table WHERE ID = '$id';";
    $result = $conn->Query($sqlSelect);
    $result = $result->fetch_assoc();
    foreach((array)$result as $key => $value){
        $_SESSION[$key] = $value;
    }
    return $_SESSION;
}
function infoSelect($email){
    include('conn.php');
    $sqlSelect = "SELECT ID, nome, dataNasc, email, cargo FROM $table WHERE email = '$email';";
    $result = $conn->Query($sqlSelect);
    $result = $result->fetch_assoc();
    foreach($result as $key => $value){
        $_SESSION[$key] = $value;
    }
     return $_SESSION;
}
?>