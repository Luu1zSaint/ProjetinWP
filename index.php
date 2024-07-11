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
                    <a href="#"><i class='bx bxl-wordpress'></i></a>
                    <ul class="menu-interno">
                        <li><a href="#">Sobre o WordPress</a></li>
                    </ul>
                </li>
                <li class="header-item">
                    <a href="#"><i class='bx bx-home'></i>ProjetinWP</a>
                    <ul class="menu-interno">
                        <li><a href="#">Visitar site</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class='bx bx-message-square-dots'></i>0</a>
                </li>
                <li class="header-item">
                    <a href="#"><i class='bx bx-message-square-add'></i>Novo</a>
                    <ul class="menu-interno">
                        <li><a href="#">Post</a></li>
                        <li><a href="#">Mídia</a></li>
                        <li><a href="#">Página</a></li>
                        <li><a href="#">Usuário</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="header-menu-dir">
                <a class="menu-dir" href="#">
                    <span>Olá, User</span>
                    <img src="assets/img/user-avatar.png" alt="user-avatar">
                    <div class="sub-menu-dir">
                        <div class="sub-menu-container">
                            <img src="assets/img/user-avatar.png" alt="user-avatar">
                            <div class="sub-menu-link">
                                <a href="#">User<br>Editar perfil</a>
                                <a href="#">Sair</a>
                            </div>
                        </div>
                    </div>
                </a>   
        </div>
    </header> 
    <nav id="nav-home-lat" class="">
        <ul id="recolher-menu" class="nav-menu ">
            <li id="menu-externo" class="nav-menu-item classRel">
                <a onclick="mostrarMenu()" class="menu-item" href="?pag=painel">
                    <i class='bx bx-message-square-add'></i>Painel</a>
                <ul id="menu-oculto" class="nav-menu-interno classAbs">
                    <li><a href="#">aaaaaaaaaaa</a></li>
                    <li><a href="#">aaaaaaaaaaa</a></li>
                </ul>
            </li>
            <li id="menu-externo" class="nav-menu-item classRel">
                <a onclick="mostrarMenu()" class="menu-item" href="?pag=post">
                    <i class='bx bx-message-square-add'></i>Post</a>
                <ul id="menu-oculto" class="nav-menu-interno classAbs">
                    <li><a href="#">aaaaaaaaaaa</a></li>
                    <li><a href="#">aaaaaaaaaaa</a></li>
                </ul>
            </li>
            <li id="menu-externo" class="nav-menu-item classRel">
                <a onclick="mostrarMenu()" class="menu-item" href="?pag=midia">
                    <i class='bx bx-message-square-add'></i>Mídia</a>
                <ul id="menu-oculto" class="nav-menu-interno classAbs">
                    <li><a href="#">aaaaaaaaaaa</a></li>
                    <li><a href="#">aaaaaaaaaaa</a></li>
                </ul>
            </li>
            <li id="menu-externo" class="nav-menu-item classRel">
                <a onclick="mostrarMenu()" class="menu-item" href="?pag=paginas">
                    <i class='bx bx-message-square-add'></i>Páginas</a>
                <ul id="menu-oculto" class="nav-menu-interno classAbs">
                    <li><a href="#">aaaaaaaaaaa</a></li>
                    <li><a href="#">aaaaaaaaaaa</a></li>
                </ul>
            </li>
            <li id="menu-externo" class="nav-menu-item classRel">
                <a onclick="mostrarMenu()" class="menu-item" href="?pag=usuarios">
                    <i class='bx bx-message-square-add'></i>Usuário</a>
                <ul id="menu-oculto" class="nav-menu-interno classAbs">
                    <li><a href="#">aaaaaaaaaaa</a></li>
                    <li><a href="#">aaaaaaaaaaa</a></li>
                </ul>
            </li>
            <li id="menu-externo" class="nav-menu-item classRel">
                <a onclick="mostrarMenu()" class="menu-item" href="?pag=configuracao">
                    <i class='bx bx-message-square-add'></i>Configurações</a>
                <ul id="menu-oculto" class="nav-menu-interno classAbs">
                    <li><a href="#">aaaaaaaaaaa</a></li>
                    <li><a href="#">aaaaaaaaaaa</a></li>
                </ul>
            </li>
            <li class="nav-menu-item">
                <a onclick="recolherMenuLat()" class="menu-item" href="#">
                    <i class='bx bx-message-square-add'></i>Recolher menu</a>
            </li>
        </ul>
    </nav>
    <div id="home-content">
        <main id="main">
            <?php
            switch ($_GET['pag']) {
                case 'painel':
                    include_once("pages/painel.html");
                    break;
                case 'post':
                    include_once("pages/post.html");
                    break;
                case 'midia':
                    include_once("pages/midia.html");
                    break;
                case 'paginas':
                    include_once("pages/paginas.html");
                    break;
                case 'usuarios':
                    include_once("pages/usuarios.html");
                    break;
                case 'configuracao':
                    include_once("pages/configuracoes.html");
                    break; 
                    default:
                include_once("pages/painel.html");
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