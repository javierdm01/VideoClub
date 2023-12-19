<?php

class PeliculaView {

    // Muestra la lista de tareas
    public function mostrarPeliculas(&$mod,$peliculas) {
        for ($i = 0; $i < count($peliculas); $i++) {
            if ($mod === $i) {
                echo '<tr><form method="POST" action="' . $_SERVER["PHP_SELF"] . '">';
                echo '<input type="hidden" id="datos" name="datos" value="">';
                echo '<input type="hidden" name="id" value="' . $peliculas[$i]['id'] . '">';
                echo '
                <td class="w-25 ">
                    <img class="w-50 mx-auto img-fluid" src="../assets/img/' . $peliculas[$i]['cartel'] . '">
                    <input value=' . $peliculas[$i]['cartel'] . ' type="text" name="cartel" class="form-control" id="cartel">
                </td>
                <td class="">
                    <input value="' . $peliculas[$i]['titulo'] . '" type="text" name="titulo"  class="form-control my-3" id="titulo" placeholder="Ejemplo: Titanic" required>
                    <input value="' . $peliculas[$i]['genero'] . '" type="text" name="genero"  class="form-control my-3" id="genero" placeholder="Ejemplo: Terror" required>
                    <input value="' . $peliculas[$i]['pais'] . '" type="text" name="pais"  class="form-control my-3" id="pais" placeholder="Ejemplo: España" required>
                    <input value="' . $peliculas[$i]['anyo'] . '" type="number" name="anyo"  class="form-control my-3" id="anyo" placeholder="Ejemplo: 2023" required>
                   </td>';
                echo '<td><button class="btn btn-primary border" type="submit">Modificar Tabla</button></td>';
                echo '</form></tr>';
            } else {
                echo '<tr>
                    
                    <td class="w-25"><img class="w-50 mx-auto img-fluid" src="../assets/img/' . $peliculas[$i]['cartel'] . '"></td>
                    <td class= w-50"><h2 class="fs-3">' . $peliculas[$i]['titulo'] . '</h2>'
                . '<p>' . $peliculas[$i]['genero'] . '</p>'
                . '<p>' . $peliculas[$i]['pais'] . '</p>'
                . '<p>' . $peliculas[$i]['anyo'] . '</p></td>';
                echo '<td><form method="POST" action="' . $_SERVER["PHP_SELF"] . '">
                        <input type="hidden" name="mod" value="' . $i . '">
                        <button class="btn btn-primary border" type="submit"><i class="fa-solid fa-pencil"></i></button>
                    </form></td>';
                echo '<td><form method="POST" action="' . $_SERVER["PHP_SELF"] . '">
                        <input type="hidden" name="clear" value="' . $peliculas[$i]['id'] . '">
                        <button class="btn btn-danger border" type="submit"><i class="fa-solid fa-trash"></i></button>
                    </form></td>';
                echo '</tr>';
            }
        }
    }
    
    public function insertarPeliculas(){
        echo '<div class="modal fade" id="agregarCoche" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Coche</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Agregar Nuevo coche-->
                        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                            <div class="form-group">
                                <label for="vin">VIN</label>
                                <input  value="<?= $formError ? $_POST["vin"] : "" ?>" type="text" name="vin" class="form-control" id="vin" placeholder="Ejemplo: JH4DC4400SS012345" required>
                            </div>
                            <div class="form-group">
                                <label for="matricula">Matricula</label>
                                <input value="<?= $formError ? $_POST["matricula"] : "" ?>" type="text" name="matricula"  class="form-control" id="matricula" placeholder="Ejemplo: 4321-DCB" required>
                            </div>
                            <div class="form-group">
                                <label for="marca">Marca</label>
                                <input value="<?= $formError ? $_POST["marca"] : "" ?>" type="text" name="marca"  class="form-control" id="marca" placeholder="Ejemplo: Toyota" required>
                            </div>
                            <div class="form-group">
                                <label for="modelo">Modelo</label>
                                <input value="<?= $formError ? $_POST["modelo"] : "" ?>" type="text" name="modelo"  class="form-control" id="modelo" placeholder="Ejemplo: Camry" required>
                            </div>
                            <div class="form-group">
                                <label for="ano">Año</label>
                                <input value="<?= $formError ? $_POST["año"] : "" ?>" type="number" name="ano"  class="form-control" id="ano" placeholder="Ejemplo: 2023" required>
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input value="<?= $formError ? $_POST["precio"] : "" ?>" type="number" name="precio"  class="form-control" id="precio" placeholder="Ejemplo: 25000" required>
                            </div>
                            <div class="form-group">
                                <label for="km">KM</label>
                                <input value="<?= $formError ? $_POST["km"] : "" ?>" type="number" name="km"  class="form-control" id="km" placeholder="Ejemplo: 150000" required>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-primary" value="Guardar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>';
    }
}
