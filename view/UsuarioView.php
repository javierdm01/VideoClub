<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/db/DB.php';

class UsuarioView {
    
    private $bd;
    private $pdo; 
    
    public function __construct() {
        $this->bd= new DB();
        $this->pdo = $this->bd->getPDO();
    }
    // Muestra la lista de tareas
    public function mostrarUsuarios($tareas) {
        
    }
}
