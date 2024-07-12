<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'lr_clientes';

$conn = new mysqli($host, $user, $pass, $db);
if($conn->connect_errno){
    echo "Erro de conexão! Error: ".mysqli_connect_error(); 
}

?>