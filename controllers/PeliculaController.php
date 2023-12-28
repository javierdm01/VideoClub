<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/view/PeliculaView.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/controllers/ActorController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/controllers/ActuanController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/templates/mensajeError.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/templates/mensajeCheck.php';
/**
 * Clase PeliculaController
 */
class PeliculaController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $model;
    private $view;
    private $controller;
    private $actuanController;

    /**
     * Constructor de la clase PeliculaController
     */
    public function __construct() {
        $this->model = new Pelicula();
        $this->view = new PeliculaView();
        $this->controller= new ActorController();
        $this->actuanController=new ActuanController();
    }

    /**
     * Muestra las peliculas dependiendo de si se está editando o no
     * 
     * @param var $mod variable para modificar
     * @param boolean $admin muestra valores si es admin
     */
    public function verPeliculas(&$mod,$admin=false) {
        // Recupera la lista de tareas del modelo
        $peliculas = $this->model->getPeliculas();
        // Muestra la vista de la lista de tareas
        $this->view->mostrarCabecera($admin);
        for ($i = 0; $i < count($peliculas); $i++) {
            $this->view->mostrarPeliculas($mod,$peliculas,$i);
            if($mod!=$i || $mod==null){
                $this->controller->verActores($peliculas[$i]['id']);
                if($admin){
                    $this->view->mostrarAcciones($peliculas[$i]['id']);
                }
            }
        }
        $this->view->mostrarFin();
    }
    /**
     * Controlador para editar las peliculas
     * 
     * @param array $post datos nuevos
     */
    public function editarPeliculas($post){
        // Recupera la lista de tareas del modelo
        $this->model->modificarPelicula($post);
    }
    /**
     * Controlador para insertar peliculas
     * 
     * @param array $post datos de nueva pelicula
     */
    public function insertarPeliculas($post){
        $peliculas=$this->model->getPeliculas();
        $valido=true;
        for($i=0;$i<count($peliculas);$i++){
            if($peliculas[$i]['titulo']==$post['titulo']){
                $valido=false;
            }
        }
        if($valido){
            $this->model->insertarPelicula($post);
            if(isset($post['actores'])){
                $this->actuanController->insertarActuan($post);
            }
        }else{
            echo mensajeError('El titulo está repetido, intentelo de nuevo');
        }
    }
    /**
     * Controllador para mostrar el modal y obtener los actores mediante otro controlador
     * 
     * @param boolean $admin muestra true si es admin
     */
    public function mostrarInsertarPeliculas($admin) {
        if($admin && !isset($_POST['mod'])){
            $this->view->mostrarBtnInsertar();
            $actores= $this->controller->obtenerActores();
            $pelicula=$this->model->getPeliculas();
            $this->view->insertarPeliculas($actores,$pelicula);
        }
    }
    /**
     * Controlar para mostrar el modal modificar
     * 
     * 
     */
    public function mostrarModal() {
        $this->view->modalModificar();
    }
    /**
     * Controlador para eliminar Peliculas
     * 
     * @param number $id identificador de pelicula
     */
    public function eliminarPeliculas($id){
        $this->actuanController->eliminarActuan($id);
        $this->model->eliminarPelicula($id);
    }
}