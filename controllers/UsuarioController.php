<?php

class UsuarioController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $model;
    private $view;

    public function __construct() {
        $this->model = new Usuario();
        $this->view = new UsuarioView();
    }

    // Muestra la lista de tareas
    public function listar() {
        // Recupera la lista de tareas del modelo
        $usuarios = $this->model->getUsuarios();
        // Muestra la vista de la lista de tareas
        $this->view->mostrarUsuarios($usuarios);
    }
}