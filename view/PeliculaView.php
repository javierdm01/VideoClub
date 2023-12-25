<?php

class PeliculaView {
    public function mostrarCabecera($admin) {
        echo '<thead>
                <tr>
                    <th class="col">Cartel</td>
                    <th class="col">Título</td>
                    <th class=col">Género</td>
                    <th class="col">País</td>
                    <th class="col">Año</td>
                    <th class="col">Reparto</td>';
             if($admin){
                 echo '<th class="col">Editar</td>
                    <th class="col">Eliminar</td>';
             }       
            echo    '</tr>
            </thead>
            <tbody>';
    }
    // Muestra la lista de tareas
    public function mostrarFin(){
        echo '</tbody>';
    }
    public function mostrarAcciones($id){
        echo '<td><form method="POST" action="' . $_SERVER["PHP_SELF"] . '">
                        <input type="hidden" name="mod" value="' . $id-1 . '">
                        <button class="btn btn-primary border" type="submit"><i class="fa-solid fa-pencil"></i></button>
                    </form></td>';
                echo '<td><form method="POST" action="' . $_SERVER["PHP_SELF"] . '">
                        <input type="hidden" name="clear" value="' . $id . '">
                        <button class="btn btn-danger border" type="submit"><i class="fa-solid fa-trash"></i></button>
                    </form></td>';
                echo '</tr>';
    }
    
    public function mostrarPeliculas(&$mod,$peliculas,$i) {
        
            if ($mod!=null && intval($mod) === $i) {
                echo ''
                . '<form method="POST" action="' . $_SERVER["PHP_SELF"] . '"><tr>';
                echo '<input type="hidden" id="datos" name="datos" value="">';
                echo '<input type="hidden" name="id" value="' . $peliculas[$i]['id'] . '">';

                echo '<td class="w-25">';
                echo '<img class="w-50 mx-auto img-fluid" src="../assets/img/' . $peliculas[$i]['cartel'] . '">';
                echo '<input value=' . $peliculas[$i]['cartel'] . ' type="text" name="cartel" class="form-control" id="cartel">';
                echo '</td>';

                echo '<td class="w-25">';   
                echo '<input value="' . $peliculas[$i]['titulo'] . '" type="text" name="titulo"  class="form-control my-3" id="titulo" placeholder="Ejemplo: Titanic" required>';
                echo '</td>';

                echo '<td class="w-25">';
                echo '<input value="' . $peliculas[$i]['genero'] . '" type="text" name="genero"  class="form-control my-3" id="genero" placeholder="Ejemplo: Terror" required>';
                echo '</td>';

                echo '<td class="w-25">';
                echo '<input value="' . $peliculas[$i]['pais'] . '" type="text" name="pais"  class="form-control my-3" id="pais" placeholder="Ejemplo: España" required>';
                echo '</td>';

                echo '<td colspan="2" class="w-25">';
                echo '<input value="' . $peliculas[$i]['anyo'] . '" type="number" name="anyo"  class="form-control my-3" id="anyo" placeholder="Ejemplo: 2023" required>';
                echo '</td>';
                $this->modalModificar();                
                echo '<td colspan="2"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModal">Modificar Peliculas</button>';
                echo '</td></tr>';
            } else {
                echo '<tr>
                    <td class="w-25"><img class="w-50 mx-auto img-fluid" src="../assets/img/' . $peliculas[$i]['cartel'] . '"></td>
                    <td class= w-50"><h2 class="fs-3">' . $peliculas[$i]['titulo'] . '</h2>
                    <td><p>' . $peliculas[$i]['genero'] . '</p></td>
                    <td><p>' . $peliculas[$i]['pais'] . '</p></td>
                    <td><p>' . $peliculas[$i]['anyo'] . '</p></td>
                    ';
                
                
            }
    }
    
    public function insertarPeliculas($actores){
        echo '<div class="modal" id="insertarPeliculas" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Coche</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Agregar Nueva Pelicula-->
                        <form method="POST" action="'. $_SERVER["PHP_SELF"] .'">
                            <input type="hidden" id="insertar" name="insertar" value="">
                            <input type="hidden" id="id" name="insertar" value="'. count($actores)+1 .'">
                            <div class="form-group">
                                <label for="vin">Titulo</label>
                                <input type="text" name="titulo" class="form-control" id="titulo" placeholder=" Harry Potter" required>
                            </div>
                            <div class="form-group">
                                <label for="matricula">Género</label>
                                <input type="text" name="genero"  class="form-control" id="genero" placeholder=" Crimen" required>
                            </div>
                            <div class="form-group">
                                <label for="marca">País</label>
                                <input type="text" name="pais"  class="form-control" id="pais" placeholder=" España" required>
                            </div>
                            <div class="form-group">
                                <label for="modelo">Año</label>
                                <input type="number" name="anyo"  class="form-control" id="anyo" placeholder=" 2022" required>
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="reparto">Reparto</label>
                                <div id="reparto" class="d-flex justify-content-around flex-wrap">
                                    ';
                                    for($i=0;$i<count($actores);$i++){
                                        
                                    echo '<div class="w-25 m-1"><input class="form-check-input" type="checkbox" value="'.$actores[$i]['id'].'" name="actores[]" id="'.$actores[$i]['id'].'">
                                    <label class="form-check-label" for="'.$actores[$i]['id'].'">
                                        '.$actores[$i]['nombre'].' '. substr($actores[$i]['apellidos'], 0, 2).'
                                    </label></div>';
                                    }
                                    
                                  echo '</div>
                                    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-primary" value="Guardar">
                            </div>';
                        echo '</form>
                    </div>
                </div>
            </div>
        </div>';
    }
    
    public function modalModificar(){
        echo '<div class="modal" id="miModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modificar Pelicula</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Agregar Nuevo coche-->
                            <h2>¿Estás seguro que quieres modificar esta pelicula?</h2>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-primary" value="Guardar">
                            </div>
                    </div>
                </div>
                </div>
        </div></form>';
    }
}
   
