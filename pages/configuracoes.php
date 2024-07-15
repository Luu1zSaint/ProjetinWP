<?php
$session = false; 
if(isset($_SESSION['ID'])){
    $session = true; 
    include_once('config/conn.php');
}else{
    include_once('../config/conn.php');
    $_SESSION['cargo'] = 'user';
}
if($_SERVER['REQUEST_METHOD'] == "post"){
    echo 'ppka';
}else{
    echo 'piroca';
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
                    <input class="input-area" type="date" name="data-nasc" id="" value="<?= ($session)? $_SESSION['dataNasc']: '';?>">
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
            <input type="submit" value="<?= ($session)? 'Atualizar perfil': 'Cadastrar-se';?>">
        </form>
    </main>
</body>
</html>