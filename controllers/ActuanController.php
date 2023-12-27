<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/models/Actuan.php';
class ActuanController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $model;

    public function __construct() {
        $this->model = new Actuan();
    }

    // Muestra la lista de tareas
    public function eliminarActuan($id) {
        $this->model->eliminarActuacion($id);
    }
    public function insertarActuan($post){
        $this->model->insertarActuacion($post);
    }
}