<?php
include_once('../config/conn.php');
include_once('../config/infoUser.php');
include_once('../config/verifica.php');
session_start();
$flagErrorCampos = false;
$flagErrorUser = false;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!empty($_POST['email']) && !empty($_POST['pass'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $resultCheck = checkLogin($email, $pass);
        if($resultCheck){
            $infoUser = infoSelect($email);
            header('location: ../index.php');
        }else{
            $flagErrorUser = true;
        }
    }else{
        $flagErrorCampos = true;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>ProjetinWP</title>
</head>
<body id="container-login">
    <div id="login">
        <h1><img src="../assets/img/wordpress-logo.svg" alt="wordpress-logo"></h1>
        <?php if($flagErrorCampos):?>
            <p>Preencha todos os campos!</p>
        <?php endif; ?>
        <?php if($flagErrorUser):?>
            <p>Email ou senha incorretos!</p>
        <?php endif; ?>
        <form class="form-login" method="post">
            <div class="user-input-name div-input">
                <p>Endereço de e-mail</p>
                <input class="style-input style-input-mobile" type="email" name="email" id="">
            </div>
            <div class="user-input-pass div-input">
                <p>Senha</p>
                <input class="style-input style-input-mobile" type="password" name="pass" id="">
            </div>
            <div class="user-input-btn-check div-input">
                <div>
                    <input type="checkbox" name="lembrarme" id="">
                    <label for="lembrarme">Lembrar-me</label>
                </div>
                <input type="submit" value="Acessar">
            </div>
        </form>
        <div class="footer-info">
            <p class="perdeu-senha"><a href="#">Perdeu a senha?</a></p>
            <p class="ir-para"><a href="configuracoes.php">Cadastrar-se</a></p>
        </div>
    </div>
</body>
<script src="../js/scripts.js"></script>
</html>