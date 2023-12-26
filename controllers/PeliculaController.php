<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/view/PeliculaView.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/controllers/ActorController.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/templates/mensajeError.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/templates/mensajeCheck.php';
class PeliculaController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $model;
    private $view;
    private $controller;

    public function __construct() {
        $this->model = new Pelicula();
        $this->view = new PeliculaView();
        $this->controller= new ActorController();
    }

    // Muestra la lista de tareas
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
    public function editarPeliculas($post){
        // Recupera la lista de tareas del modelo
        $this->model->modificarPelicula($post);
    }
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
        }else{
            echo mensajeError('El titulo está repetido, intentelo de nuevo');
        }
    }
    public function mostrarInsertarPeliculas() {
        $actores= $this->controller->obtenerActores();
        $pelicula=$this->model->getPeliculas();
        $this->view->insertarPeliculas($actores,$pelicula);
    }
    public function mostrarModal() {
        $this->view->modalModificar();
    }
    public function eliminarPeliculas($id){
        $this->model->eliminarPelicula($id);
    }
}