<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>ProjetinWP</title>
</head>
<body>
    <h2 class="title-padrao">Perfil do User</h2>
    <div class="container-perfil">
        <div class="perfil-infos">
            <h4>Nome: </h4>
            <p><?= $_SESSION['nome']; ?></p>
            <hr>
            <h4>E-Mail: </h4>
            <p><?= $_SESSION['email']; ?></p>
            <hr>
            <h4>Data de Nascimento: </h4>
            <p><?php
                $data = explode('-', $_SESSION['dataNasc']);

                printf("Dia: %d, de %s, de %u",$data[2], $data[1], $data[0]);
            ?></p>
            <hr>
            <h4>Cargo: </h4>
            <p><?= $_SESSION['cargo']; ?></p>
            <hr>
        </div>
    </div>
</body>
</html>