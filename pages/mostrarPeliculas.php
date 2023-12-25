<?php
    include $_SERVER['DOCUMENT_ROOT'].'/VideoClub/models/Pelicula.php';
    include $_SERVER['DOCUMENT_ROOT'].'/VideoClub/controllers/PeliculaController.php';
    session_start();
    if(isset($_SESSION['obj'])){
        $usu = (unserialize(base64_decode($_SESSION['obj'])));
        if ($usu['rol']==1) {
            $admin=true;
        }
    }
    if(isset($_POST['mod'])){
        $mod=$_POST['mod'];
    }
    $peliculaController = new PeliculaController();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" >
    
</head>

<body>
<?php
     if(isset($_POST['datos'])){
         $peliculaController->editarPeliculas($_POST);
     }
?>

    <div class="container mt-4">
        <h1 class="text-center mb-5">Peliculas</h1>
        <!-- Caracteristicas de coches -->
        <table class="table text-center">
                <?php
                    //This function print data for table cars
                    $peliculaController->verPeliculas($mod,$admin);
                ?>

        </table>
        
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#agregarCoche">Agregar Coche</button>
        <!-- INICIO MODAL -->
                <?php
                    $peliculaController->mostrarInsertarPeliculas();
                ?>
        <!-- FIN MODAL -->
    </div>

    <!-- JavaScript y jQuery para habilitar los componentes de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
