<?php
include_once('../config/conn.php');
include_once('../config/infoUser.php');
include_once('../config/verifica.php');
include_once('../config/email.php');
$recup = (isset($_GET['recup']))? $_GET['recup']: '0';
$alterar = (isset($_GET['alterar']))? true: false;

if(isset($_GET['alterar'])){
    $alterar = $_GET['alterar'];
    $data = date('dmy');
    $token = base64_decode($_GET['alterar']);
    $token = explode('/', $token);
    $tokenID = $token[0];
    $tokenEmail= $token[1];
    $tokenData = $token[2]; 
    $tokenValido = $data == $tokenData;
    if($tokenValido){
        $sql = "SELECT ID FROM $table WHERE ID = '$tokenID';";
        $resultQuery = $conn->Query($sql);
        if($resultQuery->num_rows == 1){
            if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['pass'] === $_POST['pass2']){
                $newPass = md5($_POST['pass']);
                $sql = "UPDATE $table SET pass = '$newPass' WHERE ID = '$tokenID';";
                $resultQuery = $conn->Query($sql);
                if($resultQuery){
                    header('location: login.php');
                }
            }
        }
    }
}else{
    //n altera
}
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){
    if(!empty($_POST['email']) && !empty($_POST['pass'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $resultCheck = checkLogin($email, $pass);
        if($resultCheck){
            $infoUser = infoSelect($email);
            header('location: ../index.php');
        }else{
            //erro user
        }
    }else{
        //campo vazio
    }
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recup'])){
    if(!empty($_POST['email'])){
        $email = $_POST['email'];
        $sql = "SELECT ID FROM $table WHERE email = '$email';";
        $resultQuery = $conn->Query($sql);
        if($resultQuery->num_rows == 1){
            $resultQuery = $resultQuery->fetch_assoc();
            foreach ($resultQuery as $key => $value) {
                $item[$key] = $value;
            }
            $data = date('dmy');
            $token = base64_encode($item['ID'].'/'.$email.'/'.$data);
            $sendEmail = sendEmail($email, $token);
            header('location: login.php');
        }else{
            //não encontrou
        }
    }else{
        //campo vazio
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
    <div id="<?= ($recup == 1)? 'recup': 'login'?>">
        <h1><img src="../assets/img/wordpress-logo.svg" alt="wordpress-logo"></h1> 
        <form class="form-login" method="post">
        <?php if($alterar){
                echo '<p class="p-email">Nova senha</p>';
            }elseif($recup){
                echo '<p class="p-email">Informe o e-mail para solicitar um link para alterar sua senha.</p>';
            }else{
                echo '';
            }?>
            <?php if(!$alterar):?>
                <div class="user-input-name div-input">
                    <p class="<?= ($recup == 1)? 'recupHidden': ''?>">Endereço de e-mail</p>
                    <input class="style-input style-input-mobile" type="email" name="email" id="">
                </div>
            <?php endif; ?>
            <div class="user-input-pass div-input <?php if($alterar){echo'';}elseif($recup == 1){echo 'recupHidden';}else{echo '';}?>">
                <p>Senha</p>
                <input class="style-input style-input-mobile" type="password" name="pass" id="">
            <?php if($alterar):?>
                <p>Confirmar senha</p>
                <input class="style-input style-input-mobile" type="password" name="pass2">
            <?php endif; ?>
            </div>
            <div class="user-input-btn-check recupInput div-input">
                <div class="<?= ($recup == 1)? 'recupHidden': ''?>">
                    <input type="checkbox" name="lembrarme" id="">
                    <label for="lembrarme">Lembrar-me</label>
                </div>
                <input type="submit" name="<?= ($recup == 1)? 'recup': 'login'?>" value="<?= ($recup == 1)? 'Enviar': 'Acessar'?>">
            </div>
        </form>
        <div class="footer-info">
            <p class="perdeu-senha">
                <a class="<?= ($recup == 1)? 'recupHidden': ''?>" href="?recup=1">Perdeu a senha?</a>
            </p>
            <p class="ir-para">
                <a href="<?= ($recup == 1)? '../': 'configuracoes.php'?>"><?= ($recup == 1)? '⟵ Voltar': 'Cadastrar-se ⟶'?></a>
            </p>
        </div>
    </div>
</body>
<script src="../js/scripts.js"></script>
</html>