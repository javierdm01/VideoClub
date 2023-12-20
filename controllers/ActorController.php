<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/view/ActorView.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/models/Actor.php';
class ActorController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $model;
    private $view;

    public function __construct() {
        $this->model = new Actor();
        $this->view = new ActorView();
    }

    // Muestra la lista de tareas
    public function verActores($id) {
        $actores = $this->model->getActores($id);
        $this->view->mostrarActores($actores);
    }
}