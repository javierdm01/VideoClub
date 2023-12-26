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
    $mail->Subject = $_POST['asunto'];
    $mail->Body = $_POST['body'];

    $mail->send();
    header('Location: ../pages/enviarMail.php?trr');
} catch (Exception $exc) {
    header('Location: ../pages/enviarMail.php?err');
}

