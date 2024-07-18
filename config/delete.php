<?php
include_once('conn.php');
$id = $_GET['user'];
$sqlDelete = "DELETE FROM $table WHERE ID = '$id';";
$result = $conn->Query($sqlDelete);
header('location: ../index.php');
?>