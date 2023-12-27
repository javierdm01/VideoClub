<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/view/ActorView.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/models/Actor.php';
/**
 * Clase ActorController
 */
class ActorController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $model;
    private $view;

    /**
     * Constructor de la clase ActorController
     */
    public function __construct() {
        $this->model = new Actor();
        $this->view = new ActorView();
    }

     /**
     * Controlar para obtener e imprimir actores
     * 
     * @param number $id identificador del actor
     */
    public function verActores($id) {
        $actores = $this->model->getActores($id);
        $this->view->mostrarActores($actores);
    }
    /**
     * Controlar para obtener todos los actores
     * 
     */
    public function obtenerActores(){
        return $this->model->extraerActores();
    }
}