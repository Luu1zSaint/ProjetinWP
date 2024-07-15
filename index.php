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
                    <a href="?pag=sobre"><i class='bx bxl-wordpress'></i></a>
                    <ul class="menu-interno">
                        <li><a href="?pag=sobre">Sobre o WordPress</a></li>
                    </ul>
                </li>
                <li class="header-item">
                    <a href="?pag=painel"><i class='bx bx-home'></i>ProjetinWP</a>
                    <ul class="menu-interno">
                        <li><a href="?pag=painel">Visitar site</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class='bx bx-message-square-dots'></i>0</a>
                </li>
                <li class="header-item">
                    <a href="?pag=usuarios">
                        <i class='bx bx-message-square-add'></i>Novo</a>
                    <ul class="menu-interno">
                        <li><a href="?pag=usuarios">Usuário</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="header-menu-dir">
                <a class="menu-dir" href="?pag=configuracao">
                    <span>Olá, User</span>
                    <img src="assets/img/user-avatar.png" alt="user-avatar">
                    <div class="sub-menu-dir">
                        <div class="sub-menu-container">
                            <img src="assets/img/user-avatar.png" alt="user-avatar">
                            <div class="sub-menu-link">
                                <a href="?pag=configuracao">User<br>Editar perfil</a>
                                <a href="logout.php">Sair</a>
                            </div>
                        </div>
                    </div>
                </a>   
        </div>
    </header> 
    <nav id="nav-home-lat" class="">
        <ul id="recolher-menu" class="nav-menu ">
            <li id="menu-externo" class="nav-menu-item classRel">
                <a class="menu-item" href="?pag=painel">
                    <i class='bx bx-message-square-add'></i>
                    <span class="spanMsg" >Painel</span>
                </a>
                <ul class="nav-menu-interno classAbs">
                    <li><a href="?pag=painel">Início</a></li>
                    <li><a href="?pag=sobre">Sobre o WordPress</a></li>
                </ul>
            </li>
            <li id="menu-externo" class="nav-menu-item classRel">
                <a class="menu-item" href="?pag=usuarios">
                    <i class='bx bx-message-square-add'></i>
                    <span class="spanMsg" >Usuário</span>
                </a>
                <ul class="nav-menu-interno classAbs">
                    <li><a href="?pag=usuarios">Todos os Usuários</a></li>
                    <li><a href="?pag=perfil">Perfil</a></li>
                </ul>
            </li>
            <li id="menu-externo" class="nav-menu-item classRel">
                <a class="menu-item" href="?pag=configuracao">
                    <i class='bx bx-message-square-add'></i>
                    <span class="spanMsg" >Configurações</span>
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
            switch ($_GET['pag']) {
                case 'painel':
                    include_once("pages/painel.php");
                    break;
                case 'sobre':
                    include_once("pages/sobre.php");
                    break;
                case 'perfil':
                    include_once("pages/perfil.php");
                    break;
                case 'usuarios':
                    include_once("pages/usuarios.php");
                    break;
                case 'configuracao':
                    include_once("pages/configuracoes.php");
                    break; 
                    default:
                include_once("pages/painel.php");
                    break;
            }?>
        </main>
        <footer id="footer">
            <p><em>Obrigado por criar com <a href="?pag=painel">WordPress.</a></em></p>
            <p><em>Versão V.0.0</em></p>
        </footer>
    </div>
    <script src="js/scrips.js"></script>
</body>
</html>