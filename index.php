<?php 
    include 'models/Usuario.php';
    include 'controllers/UsuarioController.php';
    //Me devuelve un array con objetos
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        comprobarLogin($_POST);
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
        <div class="container mt-4">
            <h1 class="text-center">Inicio de sesión VideoClub</h1>
            <form method="POST" class="text-center mt-4 p-4 border d-flex align-items-center flex-column" style="width: 400px; margin: auto" action='<?= $_SERVER["PHP_SELF"] ?>'>
                <div class="form-group m-2" style="width: 300px">
                    <label for="usr">Usuario</label>
                    <input  type="text" class="form-control" id="usr" name="usr" placeholder="Usuario">
                    <input type="hidden" id="token" name="token"> 
                </div>
                <div class="form-group m-2" style="width: 300px">
                    <label for="pass">Contraseña</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña">
                </div>
                    <!--<input type="hidden" class="form-control" id="token" name="token" value="</*?= $_SESSION['token'] ?*/>">-->
                <button type="submit" class="mt-3 btn btn-primary">Iniciar Sesión</button>
            </form>
        </div>
        <!-- JavaScript y jQuery para habilitar los componentes de Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
