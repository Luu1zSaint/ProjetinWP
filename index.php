<?php
include_once('config/conn.php');
session_start();
if(!isset($_SESSION['ID'])){
    header('location: pages/login.php');
}
$rota = explode('/', $_GET['url'] ?? 'painel');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>ProjetinWP</title>
</head>
<body id="container-home">
    <header id="header">
        <div class="header-menu">
            <ul class="header-menu-esq">
                <li class="header-item">
                    <a href="painel"><i class='bx bxl-wordpress'></i></a>
                    <ul class="menu-interno">
                        <li><a href="sobre">Sobre o WordPress</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="header-menu-dir">
                <a class="menu-dir" href="configuracao">
                    <span>Olá, User</span>
                    <img src="assets/img/user-avatar.png" alt="user-avatar">
                    <div class="sub-menu-dir">
                        <div class="sub-menu-container">
                            <img src="assets/img/user-avatar.png" alt="user-avatar">
                            <div class="sub-menu-link">
                                <a href="configuracoes">User<br>Editar perfil</a>
                                <a href="config/logout.php">Sair</a>
                            </div>
                        </div>
                    </div>
                </a>   
        </div>
    </header> 
    <nav id="nav-home-lat" class="">
        <ul id="recolher-menu" class="nav-menu ">
            <li id="menu-externo" class="nav-menu-item classRel">
                <a class="menu-item" href="painel">
                    <i class='bx bx-message-square-add'></i>
                    <span class="spanMsg" >Painel</span>
                </a>
                <ul class="nav-menu-interno classAbs">
                    <li><a href="painel">Início</a></li>
                    <li><a href="sobre">Sobre o WordPress</a></li>
                </ul>
            </li>
            <li id="menu-externo" class="nav-menu-item classRel">
                <a class="menu-item" href=<?= ($_SESSION['cargo'] == 'adm')? "usuarios": "perfil"; ?>>
                    <i class='bx bx-message-square-add'></i>
                    <span class="spanMsg" >Usuário</span>
                </a>
                <ul class="nav-menu-interno classAbs">
                    <?php if($_SESSION['cargo'] == 'adm'): ?>
                    <li><a href="usuarios">Todos os Usuários</a></li>
                    <?php endif; ?>
                    <li><a href="perfil">Perfil</a></li>
                </ul>
            </li>
            <li id="menu-externo" class="nav-menu-item classRel">
                <a class="menu-item" href="configuracoes">
                    <i class='bx bx-message-square-add'></i>
                    <span class="spanMsg">Editar Perfil</span>
                </a>
            </li>
            <li id="menu-externo" class="nav-menu-item classRel">
                <a onclick="ocutarMenu()" class="menu-item" href="#">
                    <i class='bx bx-message-square-add'></i>
                    <span class="spanMsg" >Recolher menu</span>
                </a>
            </li>
        </ul>
    </nav>
    <div id="home-content">
        <main id="main">
            <?php
            if(file_exists('pages/'."$rota[0]".'.php')){
                include_once('pages/'."$rota[0]".'.php');
            }
            ?>
        </main>
        <footer id="footer">
            <p><em>Obrigado por criar com <a href="painel">WordPress.</a></em></p>
            <p><em>Versão V.0.0</em></p>
        </footer>
    </div>
    <script src="js/scrips.js"></script>
</body>
</html>