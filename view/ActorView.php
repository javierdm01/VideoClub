<?php
/**
 * Clase ActorView
 */
class ActorView {

    /**
     * Muestra la fotografia de los actores
     *
     * @param array $actores datos de la Pelicula
     */
    public function mostrarActores($actores) {
        echo '<td class="w-25">';
        if(count($actores)!=0){
            for($i=0;$i<count($actores);$i++){
                echo '<img class="w-25 mx-auto" alt="'.$actores[$i]["nombre"].'" src="../assets/img/' . $actores[$i]['fotografia'] . '">';
            }
            
        }else{
            echo '<p>No hay actores</p>';
        }
        echo '</td>';
    }
}