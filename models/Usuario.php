<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/db/DB.php';

class Usuario {
    private $id;
    private $username;
    private $password;
    private $rol;

    //Conexion Atributtes
    private $bd;
    private $pdo; 
    
    public function __construct() {
        try {
            $this->bd = new DB();
            $this->pdo = $this->bd->getPDO();
        } catch (Exception $e) {
            echo("Error de conexión a la base de datos: " . $e->getMessage());
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRol() {
        return $this->rol;
    }
    public function setId($id): void {
        $this->id = $id;
    }

    public function setUsername($username): void {
        $this->username = $username;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

    public function setRol($rol): void {
        $this->rol = $rol;
    }

    public function getUsuarios(){
        $stmt= $this->pdo->prepare('SELECT * FROM usuarios');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    public function comprobarLogin($username,$password){
        $sql = "SELECT * FROM usuarios WHERE username = :username AND password = :password";
        
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}