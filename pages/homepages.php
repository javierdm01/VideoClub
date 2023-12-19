<?php
    session_start();
    $usu = (unserialize(base64_decode($_SESSION['obj'])));
    print_r($usu);
    
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<!--INICIO DEL BODY -->
<body>
    <!--INICIO DE LA CABECERA -->
    <header>
        <h1>VideoClub</h1>
    </header>
    <!--FIN DE LA CABECERA -->
    <!--INICIO DEL CONTENEDOR -->
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-sm-3 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item my-1">
                            <a class="nav-link active" href="#">
                                <i class="fa-solid fa-user rounded-circle mx-2 border px-1 pt-1"></i>Inicio
                            </a>
                        </li>
                        <li class="nav-item m-1">
                            <a class="nav-link" href="./mostrarPeliculas.php">
                                <i class="fa-solid fa-shop mx-2"></i>Mostrar Películas
                            </a>
                        </li>
                        <li class="nav-item m-1">
                            <a class="nav-link" href="./mostrarUsuarios.php">
                                <i class="fa-solid fa-car mx-2"></i>Ver Usuarios
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-8 ms-sm-auto px-md-4">
                <div class="col-xl-5 col-sm-7 mb-5 mx-auto">
                    <div class="bg-white rounded shadow-sm py-5 px-4">
                        <img src="../assets/img/trabajador.jpg" alt="Foto de perfil" width="100" class="img-fluid rounded-circle mb-3 mx-auto d-block  img-thumbnail shadow-sm">
                        <h2 class="mb-3 mx-auto col-lg-14 text-center">Bienvenido <span class="display-4"></span></h2>
                        
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

