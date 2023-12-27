<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/VideoClub/db/DB.php';

class Actor {

    private $id;
    private $nombre;
    private $apellido;
    private $fotografia;
    //Conexion Atributtes
    private $bd;
    private $pdo;

    public function __construct() {
        $this->bd = new DB();
        $this->pdo = $this->bd->getPDO();
    }

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

    public function extraerActores() {
        $stmt = $this->pdo->prepare('SELECT *
                                FROM actores');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getActores($id) {
        $stmt = $this->pdo->prepare('SELECT actores.nombre, actores.apellidos, actores.fotografia
                                FROM actores
                                JOIN actuan a ON a.idActor = actores.id
                                JOIN peliculas p ON p.id = a.idPelicula
                                WHERE p.id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
