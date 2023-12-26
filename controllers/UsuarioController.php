<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/templates/mensajeError.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/libraries/functions.php';
class UsuarioController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $model;
    private $view;

    public function __construct() {
        include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/view/UsuarioView.php';
        $this->model = new Usuario();
        $this->view = new UsuarioView();
    }

    // Muestra la lista de tareas
    public function iniciarSesion($username,$password){
        $usuario= $this->model->comprobarLogin($username, hash('sha512', $password));     
        if($usuario){
            $_SESSION['obj']=base64_encode(serialize($usuario));
            $fechaActual=new DateTime();
            $fechaActualFormato = $fechaActual->format('Y-m-d H:i:s');
            setcookie('ultCone', $fechaActualFormato, time() + 300, '/');
            header("Location: ./pages/homepages.php");
        }
        else{
            echo mensajeError('El usuario o la contraseña no son válidas.');
        }
    }
    
    public function mostrarFormulario() {
        include $_SERVER['DOCUMENT_ROOT']. '/VideoClub/view/loginView.php';
    }
}