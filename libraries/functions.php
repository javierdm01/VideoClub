<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/VideoClub/libraries/conexionPDO.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/VideoClub/libraries/models/Actor.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/VideoClub/libraries/models/Pelicula.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/VideoClub/libraries/models/Usuario.php';

function extraerTablas($sql) {
     try {
        $BD = conexionPDO();
        $cursorSql = $BD->prepare($sql);
        if ($cursorSql->execute()) {
            $tabla = $cursorSql->fetchAll();
            return $tabla;
        } else {
            echo "Error en la consulta: " . $BD->error;
        }
    } catch (Exception $exc) {
        mensajeError("Error general ");
    }
    $BD=null;
}


function obtenerPeliculas(){
    $tabla = extraerTablas('SELECT * FROM peliculas ');
    $peliculas=[];
    try {
        if($tabla>0 ){
            for ($i=0;$i<count($tabla);$i++){
                array_push($peliculas,new Pelicula($tabla[$i][0], $tabla[$i][1], $tabla[$i][2], $tabla[$i][3], $tabla[$i][4], $tabla[$i][5]));
                
            }
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
    return $peliculas;
}

function comprobarLogin($post) {
    if (isset($post["pass"]) && isset($post["usr"])) {
        if ($post["pass"] != '' && $post["usr"] != '') {
            $contrasena = hash('sha256', $post['pass']);
            $tabla = extraerTablas('SELECT * FROM usuarios WHERE username="' . $post['usr'] . '"');
            try {
                if (count($tabla) == 1 && $tabla[0][2] == $contrasena) {
                    $usu=new Usuario($tabla[0][0], $tabla[0][1], $tabla[0][2], $tabla[0][3]);
                    $_SESSION['id']=base64_encode(serialize($usu));
                    header('Location: ./pages/homepages.php');
                } else {
                    echo mensajeError("La contraseña o el usuario no es correcto");
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        } else {
            mensajeError('El formulario no esta completo.');
        }
    }
}
function verColumnas($nombreTabla){
    $tabla= extraerTablas("SHOW COLUMNS FROM ".$nombreTabla."");
    for ($i=0;$i< count($tabla);$i++){
        if ($tabla[$i][0]!='password') {
            echo '<th>'.$tabla[$i][0].'</th>';
        }
    }
    echo '<th>Editar</th>';
    echo '<th>Eliminar</th>';
}

function verPeliculas(&$mod,$peliculas){
    
    for ($i = 0; $i < count($peliculas); $i++) {
        if ($mod == $i) {
            echo '<tr><form method="POST" action="' . $_SERVER["PHP_SELF"] . '">';
            echo '<input type="hidden" id="datos" name="datos" value="">';
            echo '<input type="hidden" name="id" value="' . $peliculas[$i]->getId() . '">';
            echo '
                <td class="w-25 ">
                    <img class="w-50 mx-auto img-fluid" src="../assets/img/' . $peliculas[$i]->getCartel() . '">
                    <input value='.$peliculas[$i]->getCartel() .' type="text" name="cartel" class="form-control" id="cartel">
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
