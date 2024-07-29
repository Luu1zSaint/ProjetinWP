<?php
$session = false;
$flagErrorAtt = false;
$flagErrorCampos = false;
$flagSuccessUpdate = false;
if(isset($_SESSION['ID'])){
    $session = true; 
    include_once('config/conn.php');
    include_once('config/verifica.php');
    include_once('config/infoUser.php');
    include_once('config/email.php');
}else{
    include_once('../config/conn.php');
    include_once('../config/verifica.php');
    include_once('../config/infoUser.php');
    include_once('../config/email.php');
    $_SESSION['cargo'] = 'user';
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_SESSION['ID']) && empty($_GET)){
    if(!empty($_POST['nome']) && 
    !empty($_POST['dataNasc']) && 
    !empty($_POST['email']) && 
    !empty($_POST['pass']) &&
    !empty($_POST['pass2'])){
        $resultVerifica = verifica($_POST);
        if($resultVerifica){
            $resultInsert = insertUser($_POST);
            if($resultInsert){
                session_start();
                $infoUser = infoSelect($_POST['email']);
                header('location: ../index.php');
            }
        }else{
            $flagErrorAtt = true;
        }
    }else{
        $flagErrorCampos = true;
    }
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['ID']) && !isset($_GET['ID'])){ //att perfil
    $resulInfo = allInfo($_SESSION['ID']);
    $resultUpdate = updateUser($_POST, $resulInfo);
    if($resultUpdate){
        $flagSuccessUpdate = true;
    }
    allInfo($_SESSION['ID']);
    header('Refresh: 0');
}
if(isset($_GET['ID'])){
    if(($_SESSION['cargo'] == 'adm' || $_SESSION['ID'] == $_GET['ID'])){
        $id = $_GET['ID'];
        $sqlSelect = "SELECT *  FROM $table WHERE ID = '$id';";
        $result = $conn->Query($sqlSelect);
        $result = $result->fetch_assoc();
        $item = [];
        foreach((array)$result as $key => $value){
            $item[$key] = $value;
        }
    }else{
        header('location: index.php');
    }
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($item)){ //att perfil pelo adm
    $resultUpdate = updateUser($_POST, $item);
    if($resultUpdate){
        $flagSuccessUpdate = true;
    }
    header('Refresh: 0');
    
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
<body id="<?= ($session)? "": "body-cadastro"; ?>">
    <header>
        <h1 class="title-padrao">Editar Perfil</h1>
    </header>
    <main id="<?= ($session)? "main-config": "main-cadastro"; ?>">
        <h1><?= (!$session)? "<img src='../assets/img/wordpress-logo.svg' alt='wordpress-logo'>": ""; ?></h1>
    
        <form class="<?= ($session)? "form-config": "form-config-cad";?>" method="post">
            <div class="nome">
                <h4>Informações Pessoais</h4>
                <div class="p-nome d-flex">
                    <div class="div-title"><label class="title" for="nome">Nome</label> 
                </div>
                    <input class="input-area" type="text" name="nome"  value="<?php
                        if(isset($_GET['ID'])){
                            echo $item['nome'];
                        }elseif($session){
                            echo $_SESSION['nome'];
                        }else{
                            '';
                        }
                    ?>">
                </div>
                <div class="sobrenome d-flex">
                    <div class="div-title">
                        <label class="title" for="data-nasc">Data de Nascimento</label>
                    </div>
                    <input class="input-area" type="date" name="dataNasc" max="<?= date("Y-m-d");?>" value="<?php
                        if(isset($_GET['ID'])){
                            echo $item['dataNasc'];
                        }elseif($session){
                            echo $_SESSION['dataNasc'];
                        }else{
                            '';
                        }
                    ?>">
                </div>
            </div>
            <div class="info-contato">
                <h4>Informações de contato</h4>
                <div class="email d-flex">
                    <div class="div-title">
                        <label class="title" for="amail">E-mail</label>
                    </div>
                    <input class="input-area" type="email" name="email"  value="<?php
                        if(isset($_GET['ID'])){
                            echo $item['email'];
                        }elseif($session){
                            echo $_SESSION['email'];
                        }else{
                            '';
                        }
                    ?>">
                </div>
            </div>
            <div class="cargo">
                <h4>Cargo</h4>
                <div class="d-flex">
                    <div class="div-title">
                        <label class="title" for="cargo">Cargo do usuário</label>
                    </div>
                    <div class="input-area" name="cargo" id="">
                        <?php if($_SESSION['cargo'] == "adm"){
                            echo '<label class="title" for="cargo">Usuário</label>';
                        }else{
                            echo '<label class="title" for="cargo">Adimininistradro</label>';
                        } ?>
                    </div>
                </div>
            </div>
            <div class="info-contato">
                <h4>Informações de login</h4>
                <div class="email d-flex">
                    <div class="div-title">
                        <label class="title" for="pass">Senha</label>
                    </div>
                    <input class="input-area" type="password" name="pass" >
                </div>
                <div class="email d-flex">
                    <div class="div-title">
                        <label class="title" for="pass2">Confirmar senha</label>
                    </div>
                    <input class="input-area" type="password" name="pass2">
                </div>
            </div>
            <?php if($flagErrorAtt): ?>
                <p>Ops algo deu Errado!</p>
            <?php endif; ?>
            <?php if($flagErrorCampos): ?>
                <p>Preencha todos os campos!</p>
            <?php endif; ?>
            <?php if($flagSuccessUpdate): ?>
                <p>Perfil atualizado com sucesso!</p>
            <?php endif; ?>
            <input type="submit" value="<?= ($session)? 'Atualizar perfil': 'Cadastrar-se';?>">
        </form>
        <?php if(!$session): ?>
            <div class="voltar">
            <p><a href="../">⟵ Voltar</a></p>
            </div>
        <?php endif;?>
    </main>
</body>
</html>