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
        $fechaActual=new DateTime();
        $fechaActualFormato = $fechaActual->format('Y-m-d H:i:s');
        if($usuario){
            $_SESSION['obj']=base64_encode(serialize($usuario));
            setcookie('ultCone', $fechaActualFormato, time() + 300, '/');
            $this->model->comprobarLogs();
            $this->model->enviarLogs('El usuario '.$username.' ha iniciado sesión con fecha '.$fechaActualFormato.' satisfactorio');
            
            header("Location: ./pages/homepages.php");
        }
        else{
            echo mensajeError('El usuario o la contraseña no son válidas.');
            $this->model->enviarLogs('El usuario '.$username.' ha intentado iniciar sesión con fecha '.$fechaActualFormato.' no satisfactorio');
        }
    }
    public function mostrarFormulario() {
        include $_SERVER['DOCUMENT_ROOT']. '/VideoClub/view/loginView.php';
    }
}