<?php

function enviarMail() {

    //HAGO ESTO PARA QUE SE CARGUEN LAS DEPENDENCIAS DE PHP MAILER SOLO CUANDO HAYA QUE ENVIAR UN MAIL
    //DE CASO CONTRARIO SE CARGARÍAN CADA VEZ QUE SE USA UNA FUNCIÓN
    // Ruta al archivo PHP que deseas incluir
    $rutaPHPMailer = $_SERVER['DOCUMENT_ROOT'] . '/VideoClub/config/configEmail.php';
    // Verificar si el archivo existe antes de incluirlo
    if (file_exists($rutaPHPMailer)) {
        // Incluir el archivo
        include $rutaPHPMailer;
    } else {
        // Manejar el caso en que el archivo no existe
        echo 'El archivo no existe.';
    }
}
function comprobarCookie($cookie) {
    if (!$cookie['ultCone']) {
        unset($_SESSION['obj']);
        header('Location: ../index.php');
    }else{
        $fechaActual=new DateTime();
        $fechaActualFormato = $fechaActual->format('Y-m-d H:i:s');
        setcookie('ultCone', $fechaActualFormato, time() + 300, '/');
    }
}
function comprobarInicio(){
    if(isset($_COOKIE['ultCone'])){
        header('Location: ./pages/homePages.php');
    }
}
function cerrarSesion(&$sesion) {
    $sesion = array();
    session_start();
    setcookie("ultCone", '', time() - 3600, "/");
    setcookie(session_name(), '', time() - 3600, "/");
    unset($_SESSION['obj']);
    header('Location: ../index.php');
}