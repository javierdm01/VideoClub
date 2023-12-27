<?php 

    include $_SERVER['DOCUMENT_ROOT'].'/VideoClub/models/Usuario.php';
    include $_SERVER['DOCUMENT_ROOT'].'/VideoClub/controllers/UsuarioController.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/templates/mensajeError.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/libraries/functions.php';
    //Me devuelve un array con objetos
    session_start();
    if(isset($_GET['crr'])){
        cerrarSesion($_SESSION);
    }
    comprobarInicio();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST['usr']!='' && $_POST['pass']!=''){
            $usuarioController = new UsuarioController();
            $usuarioController->iniciarSesion($_POST['usr'], $_POST['pass']);
        }else{
            mensajeError('Formulario no rellenado');
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Login</title>
    </head>
    <body>
        <?php
            $usuarioController = new UsuarioController();
            $usuarioController->mostrarFormulario();
        ?>
        <!-- JavaScript y jQuery para habilitar los componentes de Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
