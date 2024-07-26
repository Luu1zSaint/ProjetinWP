<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($email, $token){
    include('vendor/autoload.php');
    $dataEnvio = date('d/m/Y');
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    //Server settings
    try{
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '92943999ca4da7';                     //SMTP username
        $mail->Password   = '48abfda73fe986';                               //SMTP password
        $mail->Port       = '2525';                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->SMTPSecure = 'tls';
        $mail->charSet = 'utf8';
        //Recipients
        $mail->setFrom('luizroberto44630@gmail.com', 'Luiz');
        $mail->addAddress("$email");     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Atualização de Perfil';
        $mail->Body    = "<a href='http://localhost/luizin/ProjetinWP/pages/login.php?recup=1&alterar=$token'>alterar Senha</a>
                            <br>
                            <br>
                            <p>Obs: token valido somente por um dia!</p>
                            <br>
                            <br>
                            <p>Data de envio: $dataEnvio</p>";
        $mail->send();
        return true;
    } catch (Exception $e) {
        return  $mail->ErrorInfo;
    }
}
?>