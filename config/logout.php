<?php
include_once('conn.php');
session_start();

session_destroy();
$conn->close();
header('location: ../pages/login.php');
?>