<?php
function sendEmail($email, $token){
    $dataEnvio = date('d/m/Y');
    $assunto = "Nova senha!";
    $msg = "Link para alterar a sua senha:
        http://localhost/luizin/ProjetinWP/pages/login.php?recup=1&alterar=$token
        Obs: token valido somente por um dia!
        Data de envio: $dataEnvio";
    mail($email, $assunto, $msg, "From: luizroberto44630@gmail.com");
}
?>