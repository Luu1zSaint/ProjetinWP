<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1 class="title-padrao">Configurações de perfil</h1>
    </header>
    <main id="main-config">
        <form class="form-config" action="#">
            <div class="nome">
                <h4>Nome</h4>
                <div class="nome-de-usuario d-flex">
                    <div class="div-title">
                        <p class="title">Nome de usuário</p>
                    </div>
                    <span class="input-area-span ">Nome de usuário</span>
                    <span class="aviso-nome">Não é possível alterar nomes de usuários.</span>
                </div> 
                <div class="p-nome d-flex">
                    <div class="div-title"><label class="title" for="nome">Nome</label></div>
                    <input class="input-area" type="text" name="nome" id="">
                </div>
                <div class="sobrenome d-flex">
                    <div class="div-title">
                        <label class="title" for="sobrenome">Sobrenome</label>
                    </div>
                    <input class="input-area" type="text" name="sobrenome" id="">
                </div>
                <div class="apelido d-flex">
                    <div class="div-title">
                        <label class="title" for="apelido">Apelido</label>
                    </div>
                    <input class="input-area" type="text" name="apelido" id="">
                </div> 
            </div>
            <div class="info-contato">
                <h4>Informações de contato</h4>
                <div class="email d-flex">
                    <div class="div-title">
                        <label class="title" for="amail">E-mail</label>
                    </div>
                    <input class="input-area" type="email" name="email" id="">
                </div>
            </div>
            <div class="cargo">
                <h4>Cargo</h4>
                <div class="d-flex">
                    <div class="div-title">
                        <label class="title" for="cargo">Cargo do usuário</label>
                    </div>
                    <select class="input-area" name="cargo" id="">
                        <option value="cargo">Cargo</option>
                        <option value="adm">Adimininistradro</option>
                        <option value="user">Usuário</option>
                    </select>
                </div>
            </div>
            <div class="sobre-voce">
                <h4>Sobre você</h4>
                <div class="bio d-flex">
                    <div class="div-title">
                        <label class="title" for="bio">Informações biográficas</label>
                    </div>
                    <div>
                        <input class="input-area input-bio" type="text" name="bio" id="">
                        <p>Escreva uma minibiografia para constar no seu perfil. Essas informações poderão ser vistas por todos.</p>
                    </div>
                </div>
            </div>
            <input type="submit" value="Atualizar perfil">
        </form>
    </main>
</body>
</html>