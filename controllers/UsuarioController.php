<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/templates/mensajeError.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/libraries/functions.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/view/loginView.php';
/**
 * Clase UsuarioController
 */
class UsuarioController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $model;
    private $view;
    private $loginView;
    /**
     * Constructor de la clase UsuarioController
     */
    public function __construct() {
        include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/view/UsuarioView.php';
        $this->model = new Usuario();
        $this->view = new UsuarioView();
        $this->loginView=new LoginView();
    }

    /**
     * Controlador para comprobar si es correcta el formulario de inicio
     * 
     * @param string $username nombre de usuario
     * @param string $password contraseña de usuario
     */
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
            $this->model->comprobarLogs();
            $this->model->enviarLogs('El usuario '.$username.' ha intentado iniciar sesión con fecha '.$fechaActualFormato.' no satisfactorio');
        }
    }
    /**
     * Controlador para mostrar el Login
     * 
     */
    public function mostrarFormulario() {
       $this->loginView->mostrarLogin();
    }
}