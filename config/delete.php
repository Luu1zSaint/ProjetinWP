<?php
include_once('conn.php');
$id = $_GET['ID'];
$sqlDelete = "DELETE FROM $table WHERE ID = '$id';";
$result = $conn->Query($sqlDelete);
header('location: ../index.php');
?>