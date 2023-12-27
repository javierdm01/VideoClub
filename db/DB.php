<?php

class DB {

    private $pdo;

    public function __construct() {
        include $_SERVER['DOCUMENT_ROOT']. '/VideoClub/config/config.php';
        try {
            // Crea una instancia de PDO para conectarse a la base de datos
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            throw new Exception('Error en la conexión a la base de datos');
        }
    }

    // Obtiene una instancia de PDO
    public function getPDO() {
        return $this->pdo;
    }
    public function closePDO() {
        $this->pdo = null;
    }
    

}
