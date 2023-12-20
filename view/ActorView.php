<?php

class ActorView {

    // Muestra la lista de tareas
    public function mostrarActores($actores) {
        echo '<td class= w-50">';
        for($i=0;$i<count($actores);$i++){
            echo '<img class="w-50 mx-auto" src="../assets/img/' . $actores[$i]['fotografia'] . '">';
        }
        echo '</td>';
    }
}