<?php
include('config/conn.php');
function usersTable(){
    include('config/conn.php');
    $sqlSelect = "SELECT ID, nome, dataNasc, email, cargo FROM $table;";
    $result = $conn->Query($sqlSelect);
    $result = $result->fetch_all();
    return $result;
}
$result = usersTable();
$dataAtual = date('Y-m-d');
$dataAtual = explode('-', $dataAtual);
$flagErroSearch = false;
if($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET['procurar'])){
    $search = $_GET['procurar'];
    $resultEmail = filter_var($search, FILTER_VALIDATE_EMAIL);
    if($resultEmail){
        $sql = "SELECT ID, nome, dataNasc, email, cargo FROM $table WHERE email = '$search';";
        $result = $conn->Query($sql);
        $numRows = $result->num_rows;
        if($numRows >= 1){
            $result = $result->fetch_all();
        }else{
            $flagErroSearch = true;
            $result = usersTable();
        }
        
    }else{
        $sql = "SELECT ID, nome, dataNasc, email, cargo FROM $table WHERE nome = '$search';";
        $result = $conn->Query($sql);
        $numRows = $result->num_rows;
        if($numRows >= 1){
            $result = $result->fetch_all();
        }else{
            $flagErroSearch = true;
            $result = usersTable();
        }
    }

}
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
                    <input type="search" name="procurar" id="">
                    <input type="submit" value="Filtrar">
                </div>
                <div class="container-form-dir">
                    <?= ($flagErroSearch)? 'Usuário não encontrado!': '' ;?>
                    <input type="search" name="procurar" id="">
                    <input type="submit" value="Pesquisar">
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
                        <th>Cargo</th>
                        <th class="column-btns">Editar</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($result as $arr): ?>
                    <tr class="tbody-content">
                        <td dataLabel="ID:"><?= $arr[0];?></td>
                        <td dataLabel="Nome:">
                            <a href="configuracoes?ID=<?=$arr[0];?>"><?= $arr[1];?></a>
                        </td>
                        <td dataLabel="Data de Nasc:"> 
                            <?php 
                                echo date('d/m/Y', strtotime($arr[2]));
                                $dataNasc = explode('-', $arr[2]);
                                if($dataNasc[1] == $dataAtual[1] && $dataNasc[2] == $dataAtual[2] ){
                                    $anus = $dataAtual[0] - $dataNasc[0];
                                    echo '<br>';
                                    echo "Aniversariante";
                                }
                            ?>
                        </td>
                        <td dataLabel="E-Mail:"><?= $arr[3];?></td>
                        <td dataLabel="Cargo:"><?= $arr[4];?></td>
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
                        <th>Cargo</th>
                        <th class="column-btns">Editar</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </main>
</body>
</html>