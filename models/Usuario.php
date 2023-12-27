<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/VideoClub/db/DB.php';

/**
 * Clase Usuario
 */
class Usuario {
     /**
     * @var number identificador del Usuario
     */
    private $id;
    /**
     * @var varchar username del User
     */
    private $username;
    /**
     * @var varchar contraseña del User
     */
    private $password;
    /**
     * @var number rol (0 o 1 depende si es admin o no)
     */
    private $rol;
    //Conexion Atributtes
    private $bd;
    private $pdo;
    /**
     * Constructor de la clase Pelicula
     */
    public function __construct() {
        $this->bd = new DB();
        $this->pdo = $this->bd->getPDO();
    }
    
    /**
     * Destructor de la clase Actor
     */
     public function __destruct() {
        $this->bd->closePDO();
    }
    
    /**
     * Getters and setters
     */

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
    
    /**
     * Obtener todos los usuarios
     *
     * 
     * @return array
     */
    public function getUsuarios() {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM usuarios');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception) {
            mensajeError('Se ha producido un error al obtener usuarios');
        }
    }
    /**
     * Comprobar inicio de Sesion
     *
     * @param String $username nombre de usuario
     * @param String $password contraseña codificiada
     * 
     * @return array usuario
     */
    public function comprobarLogin($username, $password) {
        try {
            $sql = "SELECT * FROM usuarios WHERE username = :username AND password = :password";

            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception) {
            mensajeError('Se ha producido un error al comprobar usuarios');
        }
    }
    /**
     * Crear tabla log si no existe
     *
     */
    public function comprobarLogs() {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS logs (mensaje varchar(255))";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        } catch (Exception) {
            mensajeError('Se ha producido un error al crearLogs');
        }
    }
    /**
     * Enviar logs de acceso
     *
     * @param String $mensaje mensaje para guardar en log
     * 
     */
    public function enviarLogs($mensaje) {
        try {
            $sql = "INSERT INTO logs (mensaje) VALUES ('$mensaje')";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        } catch (Exception) {
            mensajeError('Se ha producido un error al enviar Log');
        } 
    }
}
