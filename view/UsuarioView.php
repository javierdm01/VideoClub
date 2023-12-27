<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/db/DB.php';
/**
 * Clase UsuarioView
 */
class UsuarioView {
    
    private $bd;
    private $pdo; 
    /**
     * Constructor de la clase Usuario
     */
    public function __construct() {
        $this->bd= new DB();
        $this->pdo = $this->bd->getPDO();
    }
}
