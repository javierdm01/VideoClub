<?php
/**
 * Enviar Mails
 */
function enviarMail() {
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
/**
 * Comprueba si la cookie no existe o la renueva si existe
 * @param arrays $cookie valores de la cookie
 */
function comprobarCookie($cookie) {
    if(isset($_COOKIE['ultCone']) && isset($_SESSION['obj'])){
        $fechaActual=new DateTime();
        $fechaActualFormato = $fechaActual->format('Y-m-d H:i:s');
        setcookie('ultCone', $fechaActualFormato, time() + 300, '/');
    }else{
        unset($_SESSION['obj']);
        header('Location: ../index.php');
    }
}
/**
 * Comprueba si la cookie sigue disponible
 */
function comprobarInicio(){
    if(isset($_COOKIE['ultCone'])){
        header('Location: ./pages/homePages.php');
    }
}
/**
 * Cerrar la session o eliminar la cookie
 * 
 * @param array $sesion datos de la session
 */
function cerrarSesion(&$sesion) {
    $sesion = array();
    session_start();
    setcookie("ultCone", '', time() - 3600, "/");
    setcookie(session_name(), '', time() - 3600, "/");
    unset($_SESSION['obj']);
}