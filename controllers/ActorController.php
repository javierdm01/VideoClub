<?php

class ActorController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $model;
    private $view;

    public function __construct() {
        $this->model = new Actor();
        $this->view = new ActorView();
    }

    // Muestra la lista de tareas
    public function listar() {
        // Recupera la lista de tareas del modelo
        $actores = $this->model->getActores();
        // Muestra la vista de la lista de tareas
        $this->view->mostrarActores($actores);
    }
}