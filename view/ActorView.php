<?php

class ActorView {

    // Muestra la lista de tareas
    public function mostrarActores($actores) {
        echo '<td class="w-25">';
        if(count($actores)!=0){
            for($i=0;$i<count($actores);$i++){
                echo '<img class="w-25 mx-auto" src="../assets/img/' . $actores[$i]['fotografia'] . '">';
            }
            
        }else{
            echo '<p>No hay actores</p>';
        }
        echo '</td>';
    }
}