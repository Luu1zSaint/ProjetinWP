<?php
$host = 'localhost';
$user = 'root';
$passdb = '';
$db = 'lr_clientes';
$table = 'lr_users';
$conn = new mysqli($host, $user, $passdb, $db);
if($conn->connect_errno){
    echo "Erro de conexão! Error: ".mysqli_connect_error(); 
}
?>