<?php

class PeliculaController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $model;
    private $view;

    public function __construct() {
        $this->model = new Pelicula();
        $this->view = new PeliculasView();
    }

    // Muestra la lista de tareas
    public function verPeliculas(&$mod) {
        // Recupera la lista de tareas del modelo
        $peliculas = $this->model->getPeliculas();
        // Muestra la vista de la lista de tareas
        $this->view->mostrarPeliculas($mod,$peliculas);
    }
    public function editarPeliculas($post){
        // Recupera la lista de tareas del modelo
        $this->model->modificarPelicula($post);
    }
}