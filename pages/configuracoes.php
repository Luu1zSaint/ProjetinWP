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
}else{
    session_start();
    include_once('../config/conn.php');
    include_once('../config/verifica.php');
    include_once('../config/infoUser.php');
    $_SESSION['cargo'] = 'user';
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_SESSION['ID']) && empty($_GET)){
    if(!empty($_POST['nome']) && 
    !empty($_POST['dataNasc']) && 
    !empty($_POST['email']) && 
    !empty($_POST['pass'])){
        $resultVerifica = verifica($_POST);   
        if($resultVerifica){
            foreach($_POST as $key => $value){
                $_SESSION[$key] = $value;
            }
        }
        $resultInsert = insertUser($_SESSION);
        if($resultInsert){
            $infoUser = infoSelect($_SESSION['email']);
            header('location: ../index.php');
        }
        $flagErrorAtt = true;
    }else{
        $flagErrorCampos = true;
    }
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['ID'])){
    $resulInfo = allInfo($_SESSION['ID']);
    $resultUpdate = updateUser($_POST, $resulInfo);
    if($resultUpdate){
        $flagSuccessUpdate = true;;
    }
}
if(isset($_GET['user'])){
    $id = $_GET['user'];
    $sqlSelect = "SELECT *  FROM $table WHERE ID = '$id';";
    $result = $conn->Query($sqlSelect);
    $result = $result->fetch_assoc();
    foreach((array)$result as $key => $value){
        $item[$key];
    }
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($item)){
    $resultUpdate = updateUser($_POST, $item);
    if($resultUpdate){
        $flagSuccessUpdate = true;
    }
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
                    <input class="input-area" type="text" name="nome" id="" placeholder="<?php
                        if(isset($_GET['user'])){
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
                        if(isset($_GET['user'])){
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
                    <input class="input-area" type="email" name="email" id="" placeholder="<?php
                        if(isset($_GET['user'])){
                            echo $item['email'];
                        }elseif($session){
                            echo $_SESSION['email'];
                        }else{
                            '';
                        }
                    ?>">
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
                        <option value="">Selecione:</option>
                        <option value="user">Usuário</option>
                        <option value="adm">Adimininistradro</option>
                    </select>
                </div>
            </div>
            <?php endif; ?>
            <?php if(!isset($_SESSION['ID'])): ?>
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
            <?php endif; ?>
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
    </main>
</body>
</html>