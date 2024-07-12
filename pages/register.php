<?php
include_once('../config/conn.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>ProjetinWP</title>
</head>
<body id="container-register">
    <div id="register">
        <h1><img src="../assets/img/wordpress-logo.svg" alt="wordpress-logo"></h1>
        <form class="form-register" method="post">
            <div class="user-input-name div-input">
                <p>Nome</p>
                <input class="style-input" type="text" name="name" id="">
            </div>
            <div class="user-input-name div-input">
                <p>Data de nascimento</p>
                <input class="style-input" type="date" name="data-nasc" id="">
            </div>
            <div class="user-input-name div-input">
                <p>Endereço de e-mail</p>
                <input class="style-input" type="email" name="email" id="">
            </div>
            <div class="user-input-name div-input">
                <p>Senha</p>
                <input class="style-input" type="password" name="pass" id="">
            </div>
            <div class="user-input-name div-input">
                <p>Confirmar Senha</p>
                <input class="style-input" type="password" name="pass2" id="">
            </div>
            <div class="user-input-btn">
                <input type="submit" value="Registrar">
            </div>
        </form>
        <div class="footer-info">
            <p class="ir-para"><a href="#">⭠ Ir para ProjetinWP</a></p>
        </div>
    </div>
</body>
</html>