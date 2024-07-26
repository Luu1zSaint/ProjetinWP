<?php
include_once('../config/conn.php');
include_once('../config/infoUser.php');
include_once('../config/verifica.php');
include_once('../config/email.php');

$recup = (isset($_GET['recup']))? $_GET['recup']: '0';
if(isset($_GET['alterar'])){
    $token = explode('-', $_GET['alterar']);
    var_dump($token);

}else{
    //n altera porra nenhuma!
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
            $token = $item['ID'].'-'.$email.'-'.$data;
            $sendEmail = sendEmail($email, $token);
            
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
        <?= ($recup)?'<p class="p-email">Informe o e-mail para solicitar um link para alterar sua senha.</p>': '';?>
            <div class="user-input-name div-input">
                <p class="<?= ($recup == 1)? 'recupHidden': ''?>">Endereço de e-mail</p>
                <input class="style-input style-input-mobile" type="email" name="email" id="">
            </div>
            <div class="user-input-pass div-input <?= ($recup == 1)? 'recupHidden': ''?>">
                <p>Senha</p>
                <input class="style-input style-input-mobile" type="password" name="pass" id="">
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