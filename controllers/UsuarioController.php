<?php
include_once $_SERVER['DOCUMENT_ROOT'].'./templates/mensajeError.php';
class UsuarioController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $model;
    private $view;

    public function __construct() {
        $this->model = new Usuario();
        $this->view = new UsuarioView();
    }

    // Muestra la lista de tareas
    public function iniciarSesion($username,$password){
        $usuario= $this->model->comprobarLogin($username, $password);
        if($usuario){
            header("Location: ./pages/homepages.php");
        }
        else{
            echo mensajeError('El usuario o la contraseña no son válidas.');
        }
    }
}