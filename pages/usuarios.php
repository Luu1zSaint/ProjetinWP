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
        <h1 class="title-padrao">Usuários</h1>
    </header>
    <main class="main-usuarios">
        <div class="form-usuarios-top">
            <form class="form-usuarios" action="#">
                <div class="container-form-esq">
                    <select name="data" id="">
                        <option value="all-dates">Todas as datas</option>
                    </select>
                    <select name="categoria" id="">
                        <option value="all-categorias">Todas as categorias</option>
                    </select>
                    <input type="submit" value="Filtrar">
                </div>
                <div class="container-form-dir">
                    <input type="search" name="procurar" id="">
                    <input type="submit" value="Pesquisar usuarios">
                </div>
            </form>
        </div>
        <div>
            <table class="table-usuarios">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="check-usuarios-table" id=""></th>
                        <th><a href="#">Nome de usuário</a></th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Função</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" name="check-usuarios-table-td" id=""></td>
                        <td>
                            <a href="#">Usuário</a>         
                        </td>
                        <td><a href="#">Nome</a></td>
                        <td><a href="#">usuario@gmail.com</a></td>
                        <td>Adimininistrado</td>
                    </tr>
                </tbody>
                <tfoot class="tfoot-usuarios">
                    <tr>
                        <th><input type="checkbox" name="check-usuarios-table" id=""></th>
                        <th><a href="#">Nome de usuário</a></th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Função</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="form-usuarios-bottom">
            <form class="form-usuarios" action="#">
                <div class="container-form-esq">
                    <select name="data" id="">
                        <option value="all-dates">Todas as datas</option>
                    </select>
                    <select name="categoria" id="">
                        <option value="all-categorias">Todas as categorias</option>
                    </select>
                    <input type="submit" value="Filtrar">
                </div>
            </form>
        </div>
    </main>
</body>
</html>