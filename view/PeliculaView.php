<?php

class PeliculaView {

    // Muestra la lista de tareas
    public function mostrarPeliculas(&$mod,$peliculas) {
        for ($i = 0; $i < count($peliculas); $i++) {
            if ($mod == $i) {
                echo '<tr><form method="POST" action="' . $_SERVER["PHP_SELF"] . '">';
                echo '<input type="hidden" id="datos" name="datos" value="">';
                echo '<input type="hidden" name="id" value="' . $peliculas[$i]->getId() . '">';
                echo '
                <td class="w-25 ">
                    <img class="w-50 mx-auto img-fluid" src="../assets/img/' . $peliculas[$i]->getCartel() . '">
                    <input value=' . $peliculas[$i]->getCartel() . ' type="text" name="cartel" class="form-control" id="cartel">
                </td>
                <td class="">
                    <input value="' . $peliculas[$i]->getTitulo() . '" type="text" name="titulo"  class="form-control my-3" id="titulo" placeholder="Ejemplo: Titanic" required>
                    <input value="' . $peliculas[$i]->getGenero() . '" type="text" name="genero"  class="form-control my-3" id="genero" placeholder="Ejemplo: Terror" required>
                    <input value="' . $peliculas[$i]->getPais() . '" type="text" name="pais"  class="form-control my-3" id="pais" placeholder="Ejemplo: España" required>
                    <input value="' . $peliculas[$i]->getAnyo() . '" type="number" name="anyo"  class="form-control my-3" id="anyo" placeholder="Ejemplo: 2023" required>
                   </td>';
                echo '<td><button class="btn btn-primary border" type="submit">Modificar Tabla</button></td>';
                echo '</form></tr>';
            } else {
                echo '<tr>
                    
                    <td class="w-25"><img class="w-50 mx-auto img-fluid" src="../assets/img/' . $peliculas[$i]->getCartel() . '"></td>
                    <td class= w-50"><h2 class="fs-3">' . $peliculas[$i]->getTitulo() . '</h2>'
                . '<p>' . $peliculas[$i]->getGenero() . '</p>'
                . '<p>' . $peliculas[$i]->getPais() . '</p>'
                . '<p>' . $peliculas[$i]->getAnyo() . '</p></td>';
                echo '<td><form method="POST" action="' . $_SERVER["PHP_SELF"] . '">
                        <input type="hidden" name="mod" value="' . $i . '">
                        <button class="btn btn-primary border" type="submit"><i class="fa-solid fa-pencil"></i></button>
                    </form></td>';
                echo '<td><form method="POST" action="' . $_SERVER["PHP_SELF"] . '">
                        <input type="hidden" name="clear" value="' . $peliculas[$i]->getId() . '">
                        <button class="btn btn-danger border" type="submit"><i class="fa-solid fa-trash"></i></button>
                    </form></td>';
                echo '</tr>';
            }
        }
    }
}
