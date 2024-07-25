<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($arr){
    include('vendor/autoload.php');
    $nome = $arr['nome'];
    $email = $arr['email'];
    $dataEnvio = date('d/m/Y');
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    //Server settings
    try{
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '1243aad678dac6';                     //SMTP username
        $mail->Password   = 'f7f26a571908be';                               //SMTP password
        $mail->Port       = '2525';                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->SMTPSecure = 'tls';
        $mail->charSet = 'utf8';
        //Recipients
        $mail->setFrom('luizroberto44630@gmail.com', 'Luiz');
        $mail->addAddress("$email", "$nome");     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Atualização de Perfil';
        $mail->Body    = "<style type='text/css'>
                body {
                margin:0px;
                font-family:Verdane;
                font-size:12px;
                color: #666666;
                }
                a{
                color: #666666;
                text-decoration: none;
                }
                a:hover {
                color: #FF0000;
                text-decoration: none;
                }
                </style>
                <html>
                    <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
                        <tr>
                            <td>
                                <tr>
                                <td width='500'>Nome:$nome</td>
                                </tr>
                                <tr>
                                    <td width='320'>E-mail:<b>$email</b></td>
                                </tr>
                                <p>Seu perfil foi atualizado!</p>
                            </td>
                        </tr>
                        <tr>
                        <td>Este e-mail foi enviado em <b>$dataEnvio</b></td>
                        </tr>
                    </table>
                </html>";
        $mail->send();
        return true;
    } catch (Exception $e) {
        return  $mail->ErrorInfo;
    }
}
?>