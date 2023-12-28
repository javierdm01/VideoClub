<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/libraries/functions.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/templates/mensajeCheck.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/templates/mensajeError.php';
    session_start();
    comprobarCookie($_COOKIE);
    $usu = (unserialize(base64_decode($_SESSION['obj'])));  
    if(isset($_GET['trr'])){
        mensajeCheck('Correo enviado con éxito');
    }
    if(isset($_GET['err'])){
        mensajeError('Error al enviar el correo con éxito');
    }
    if(isset($_POST['asunto'])){
        enviarMail();
    }
    
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
    <div class="container">
            <main class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="well well-sm">
                                <!-- Formulario de Mail -->
                                <form class="form-horizontal" method="post" action="../config/configEmail.php">
                                    <fieldset>
                                        <legend class="text-center ">Contacta con Nosotros</legend>

                                        <div class="form-group ">
                                            <div class="col-md-8  mx-auto">
                                                <input id="email" name="email" type="text" placeholder="Correo Electrónico" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-8 mx-auto" >
                                                <input id="asunto" name="asunto" type="text" placeholder="Asunto" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-8 mx-auto">
                                                <textarea class="form-control" id="body" name="body" placeholder="Introduce tu mensaje aquí." required rows="7"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                                <!-- Fin Formulario Mail -->
                            </div>
                        </div>
                    </div>
                </div>
            </main>
    </div>
    <!--FIN DEL CONTENEDOR -->
    <!-- SCRIPTS BOOSTRAP -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<!--FIN DEL BODY -->
</html>

