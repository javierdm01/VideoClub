<?php
/*
    Importamos las dependencias de PHPMailer
 * 
 * Para haccer funcionar esto usamos composer
 * -  composer require phpmailer/phpmailer
 * introducimos la carpeta 'vendor' generada en libraries
 * 
 * Los arcivos de composer a veces se suelen borrar, para arreglar esto simplemente sobreescribir
 * vendor soluciona el problema
 * 
*/
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/templates/mensajeCheck.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'].'/VideoClub/libraries/vendor/autoload.php';
//Load Composer's autoloader


$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username ='videoclub112@gmail.com'; // Cambia esto
    $mail->Password = 'cmub mqrn bphw zgsx'; //  // 'conce200#'
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->Timeout = 5;

    $mail->setFrom('videoclub112@gmail.com');
    $mail->addAddress($_POST['email']); // Cambia esto al destinatario real

    $mail->isHTML(false);
    $mail->Subject = 'Re: '.$_POST['asunto'];
    $mail->Body = "Hemos recibido su incidencia, en breve contestaremos a sus dudas proveninentes a la incidencia: \r\n\r\n\r\n".$_POST['body'];

    $mail->send();
} catch (Exception $exc) {
    header('Location: ../pages/enviarMail.php?err');
}
$mail2 = new PHPMailer(true);
try {
    $mail2->isSMTP();
    $mail2->Host = 'smtp.gmail.com';
    $mail2->SMTPAuth = true;
    $mail2->Username ='videoclub112@gmail.com'; // Cambia esto
    $mail2->Password = 'cmub mqrn bphw zgsx'; //  // 'conce200#'
    $mail2->SMTPSecure = 'ssl';
    $mail2->Port = 465;
    $mail2->Timeout = 5;

    $mail2->setFrom($_POST['email']);
    $mail2->addAddress('videoclub112@gmail.com'); // Cambia esto al destinatario real

    $mail2->isHTML(false);
    $mail2->Subject = "Incidencia de: ".$_POST['email']." : ".$_POST['asunto'];
    $mail2->Body = $_POST['body'];

    $mail2->send();
    header('Location: ../pages/enviarMail.php?trr');
} catch (Exception $exc) {
    header('Location: ../pages/enviarMail.php?err');
}

