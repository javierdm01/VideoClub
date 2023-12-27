<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/VideoClub/db/DB.php';

/**
 * Clase Actor
 */
class Actor {

    /**
     * @var number identificador de Actor
     */
    private $id;
    /**
     * @var varchar nombre Actor
     */
    private $nombre;
    /**
     * @var varchar apellido Actor
     */
    private $apellido;
    /**
     * @var varchar fotografia del Actor
     */
    private $fotografia;
    //Conexion Atributtes
    private $bd;
    private $pdo;

    /**
     * Constructor de la clase Actor
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

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getFotografia() {
        return $this->fotografia;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido): void {
        $this->apellido = $apellido;
    }

    public function setFotografia($fotografia): void {
        $this->fotografia = $fotografia;
    }
    /**
     * Obtener Actores todos los actores
     *
     * 
     * @return array
     */
    public function extraerActores() {
        try {
            $stmt = $this->pdo->prepare('SELECT *
                                FROM actores');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception ) {
            mensajeError('Se ha producido un error al extraer la tabla Actores');
        }
        }
        
    /**
     * Obtener Actores segun la variable ID
     *
     * @param array $id identificador de la Pelicula
     * 
     * @return array
     */
    public function getActores($id) {
        
        try {
            $stmt = $this->pdo->prepare('SELECT actores.nombre, actores.apellidos, actores.fotografia
                                FROM actores
                                JOIN actuan a ON a.idActor = actores.id
                                JOIN peliculas p ON p.id = a.idPelicula
                                WHERE p.id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception ) {
            mensajeError('Se ha producido un error al obtener Actores');
        }
    }
}
