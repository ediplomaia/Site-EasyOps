<?php
//Chamando as funções do PHPMAILER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//carregando o autoloader do composer 
require '/xampp\htdocs/Site-EasyOps/vendor/autoload.php';
//criando uma instancia e passando true permitindo excessoes
$mail = new PHPMailer(true);

        $nome = $_POST['name'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];
try {
        //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'd7f097109e6089';                     //SMTP username
    $mail->Password   = '1265f67edfdff2';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 2525;    

    //informações de envio
    $mail->setFrom('atendimento@easyops.com', 'Rei delas');
    $mail->addAddress('luanschlusen@gmail.com', 'Joe User');     //Add a recipient
    $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('no-replay@easyops.com', 'Information');

        

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $mensagem;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Mensagem enviada';
} catch (Exception $e) {
    //echo "Mensagem não enviada. Mailer Error: {$mail->ErrorInfo}";
    echo "Mensagem não enviada.";
}

// //Variáveis
// $nome = $_POST['name'];
// $email = $_POST['email'];
// $mensagem = $_POST['mensagem'];

// //Checando se os campos foram preenchidos
// if (isset($_POST['name']) && !empty($_POST['name']) );
// if (isset($_POST['email']) && !empty($_POST['email']) );
// if (isset($_POST['mensagem']) && !empty($_POST['mensagem']) );

// //Campo do email 
// $to = "luanschlusen@hotmail.com";
// $subject = "Contato - Easyops";
// $body = 'Nome: '.$nome. '\n'.
//         'Email: '.$email. '\n'.
//         'Mensagem: '.$mensagem;

// $header = "From:alan@easyops.com.br "."\r\n".
//             "Reply-To:".$email."\e\n".
//             "X-Mailer:PHP/".phpversion();
// if(mail($to,$subject,$body,$header)){
//             echo("Email enviado com sucesso!");
// }
// else{
//             echo("Email não pode ser enviado");
//     }
 
?>