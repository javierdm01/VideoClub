<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/VideoClub/libraries/functions.php';
    session_start();
    //Descodificar datos usuario
    $usu = (unserialize(base64_decode($_SESSION['obj'])));
    //Comprobar si la cookie está activa
    comprobarCookie($_COOKIE);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" >
    
</head>
<!--INICIO DEL BODY -->
<body>
    <!--INICIO DE LA CABECERA -->
    <?php include $_SERVER['DOCUMENT_ROOT'].'/VideoClub/templates/headerStyle.php'; ?>
    <!--FIN DE LA CABECERA -->
    <!--INICIO DEL CONTENEDOR -->
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-12 ms-sm-auto px-md-4">
                <div class="col-xl-5 col-sm-12 mb-5 mx-auto">
                    <div class="bg-white rounded shadow-sm py-5 px-4">
                        <img src="../assets/img/brad_pitt.jpg" alt="Foto de perfil" width="100" class="img-fluid rounded-circle mb-3 mx-auto d-block  img-thumbnail shadow-sm">
                        <h2 class="mb-3 mx-auto col-lg-14 text-center">Bienvenido a nuestro VideoClub <?php echo $usu['username']?></h2>
                        <p class="small text-uppercase text-muted text-center">Última conexión <span><?php echo isset($_COOKIE["ultCone"]) ? $_COOKIE["ultCone"] : "error no existe la cookie ultCone"; ?></span></p>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!--FIN DEL CONTENEDOR -->
    <!-- SCRIPTS BOOSTRAP -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<!--FIN DEL BODY -->
</html>

