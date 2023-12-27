<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/models/Actuan.php';
/**
 * Clase ActuanController
 */
class ActuanController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $model;

    /**
     * Constructor de la clase ActorController
     */
    public function __construct() {
        $this->model = new Actuan();
    }

    /**
     * Controlar para eliminar en la tabla actuan
     * 
     * @param number $id identificador de pelicula
     */
    public function eliminarActuan($id) {
        $this->model->eliminarActuacion($id);
    }
    /**
     * Controlar para insertar en la tabla actuan
     * 
     * @param array $post datos de la insercción
     */
    public function insertarActuan($post){
        $this->model->insertarActuacion($post);
    }
}