<?php
$session = false;
$flagErrorAtt = false;
$flagErrorCampos = false;
if(isset($_SESSION['ID'])){
    $session = true; 
    include_once('config/conn.php');
    include_once('config/verifica.php');
    include_once('config/infoUser.php');
}else{
    session_start();
    include_once('../config/conn.php');
    include_once('../config/verifica.php');
    include_once('../config/infoUser.php');
    $_SESSION['cargo'] = 'user';
}
if(!empty($_POST['nome']) && 
    !empty($_POST['dataNasc']) && 
    !empty($_POST['email']) && 
    !empty($_POST['pass'])
    ){
        $resultVerifica = verifica($_POST);
        if($resultVerifica){
            foreach($_POST as $key => $value){
                $_SESSION[$key] = $value;
            }
            $resultInsert = insertUser($_SESSION);
            if($resultInsert){
                $infoUser = infoSelect($_SESSION['email']);
                header('location: ../index.php');
            }
        }
        $flagErrorAtt = true;
}else{
    $flagErrorCampos = true;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href=<?= ($session)? "css/style.css": "../css/style.css"; ?>>
    <title>ProjetinWP</title>
</head>
<body>
    <header>
        <h1 class="title-padrao"><?= ($session)? "Editar Perfil": "Cadastro"; ?></h1>
    </header>
    <main id="main-config">
        <form class="form-config" method="post">
            <div class="nome">
                <h4>Informações Pessoais</h4>
                <div class="p-nome d-flex">
                    <div class="div-title"><label class="title" for="nome">Nome</label> 
                </div>
                    <input class="input-area" type="text" name="nome" id="" placeholder="<?= ($session)? $_SESSION['nome']: '';?>">
                </div>
                <div class="sobrenome d-flex">
                    <div class="div-title">
                        <label class="title" for="data-nasc">Data de Nascimento</label>
                    </div>
                    <input class="input-area" type="date" name="dataNasc" max="<?= date("Y-m-d");?>" value="<?= ($session)? $_SESSION['dataNasc']: '';?>">
                </div>
            </div>
            <div class="info-contato">
                <h4>Informações de contato</h4>
                <div class="email d-flex">
                    <div class="div-title">
                        <label class="title" for="amail">E-mail</label>
                    </div>
                    <input class="input-area" type="email" name="email" id="" placeholder="<?= ($session)? $_SESSION['email']: '';?>">
                </div>
            </div>
            <?php if($_SESSION['cargo'] == "adm"): ?>
            <div class="cargo">
                <h4>Cargo</h4>
                <div class="d-flex">
                    <div class="div-title">
                        <label class="title" for="cargo">Cargo do usuário</label>
                    </div>
                    <select class="input-area" name="cargo" id="">
                        <option value="user">Usuário</option>
                        <option value="adm">Adimininistradro</option>
                    </select>
                </div>
            </div>
            <?php endif; ?>
            <div class="info-contato">
                <h4>Informações de login</h4>
                <div class="email d-flex">
                    <div class="div-title">
                        <label class="title" for="pass">Senha</label>
                    </div>
                    <input class="input-area" type="password" name="pass" id="">
                </div>
                <div class="email d-flex">
                    <div class="div-title">
                        <label class="title" for="pass2">Confirmar senha</label>
                    </div>
                    <input class="input-area" type="password" name="pass2" id="">
                </div>
            </div>
            <?php if($flagErrorAtt): ?>
                <p>Ops algo deu Errado!</p>
            <?php endif; ?>
            <?php if($flagErrorCampos): ?>
                <p>Preencha todos os campos!</p>
            <?php endif; ?>
            <input type="submit" value="<?= ($session)? 'Atualizar perfil': 'Cadastrar-se';?>">
        </form>
    </main>
</body>
</html>