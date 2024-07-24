<?php
include_once('config/conn.php');
$sqlSelect = "SELECT ID, nome, dataNasc, email, cargo FROM $table;";
$result = $conn->Query($sqlSelect);
$result = $result->fetch_all();
$dataAtual = date('Y-m-d');
$dataAtual = explode('-', $dataAtual);
?>
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
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Data de Nasc.</th>
                        <th>E-mail</th>
                        <th class="column-btns">Editar</th>
                        <th></th>
                    </tr>
                    <p>Para editar ou excluir, clique no nome do usuário!</p>
                </thead>
                <tbody>
                <?php foreach($result as $arr): ?>
                    <tr class="tbody-content">
                        <td><?= $arr[0];?></td>
                        <td>
                            <a href="configuracoes?ID=<?=$arr[0];?>">
                                <?= $arr[1];?>
                                <span>(<?= $arr[4];?>)</span>
                            </a>
                        </td>
                        <td>
                            <?php 
                                echo date('d/m/Y', strtotime($arr[2]));
                                $dataNasc = explode('-', $arr[2]);
                                if($dataNasc[1] == $dataAtual[1] && $dataNasc[2] == $dataAtual[2] ){
                                    $anus = 
                                    echo
                                }
                            ?>
                        </td>
                        <td><?= $arr[3];?></td>
                        <td class="column-btns">
                            <a class="btn-edit edit" href="configuracoes?ID=<?=$arr[0];?>"><span>Editar</span></a>
                            <a class="btn-edit" href="config/delete.php?ID=<?=$arr[0];?>"><span>Excluir</span></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot class="tfoot-usuarios">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Data de Nasc.</th>
                        <th>E-mail</th>
                        <th class="column-btns">Editar</th>
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
                    <input type="submit" value="Filtrar">
                </div>
            </form>
        </div>
    </main>
</body>
</html>