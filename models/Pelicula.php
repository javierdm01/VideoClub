<?php
include_once $_SERVER['DOCUMENT_ROOT'].'./db/DB.php';
class Pelicula {
    private $id;
    private $titulo;
    private $genero;
    private $pais;
    private $anyo;
    private $cartel;
    
    
    //Conexion Atributtes
    private $bd;
    private $pdo; 

    public function __construct($id, $titulo, $genero, $pais, $anyo, $cartel) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->pais = $pais;
        $this->anyo = $anyo;
        $this->cartel = $cartel;
        $this->bd=new BD();
        $this->pdo= $this->$bd->getPDO();
        $this->closePDO= $this->$bd->closePDO();
    }
    
     public function setId($id) {
        $this->id = $id;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function setPais($pais) {
        $this->pais = $pais;
    }

    public function setAnyo($anyo) {
        $this->anyo = $anyo;
    }

    public function setCartel($cartel) {
        $this->cartel = $cartel;
    }
    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function getPais() {
        return $this->pais;
    }

    public function getAnyo() {
        return $this->anyo;
    }

    public function getCartel() {
        return $this->cartel;
    }
    public function getPeliculas(){
        $stmt= $this->pdo->prepare('SELECT * FROM actores');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    public function modificarPelicula(){
        $sql = "UPDATE peliculas SET 
                titulo = :titulo, 
                genero = :genero, 
                pais = :pais, 
                anyo = :anyo, 
                cartel = :cartel 
                WHERE id = :id";
        $stmt= $this->pdo->prepare($sql);
        
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':genero', $this->genero);
        $stmt->bindParam(':pais', $this->pais);
        $stmt->bindParam(':anyo', $this->anyo);
        $stmt->bindParam(':cartel', $this->cartel);
        
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        $stmt->closePDO();
    }
    public function insertarPelicula(){
         $sql = "INSERT INTO peliculas (id,titulo, genero, pais, anyo, cartel) 
                VALUES (:id, :titulo, :genero, :pais, :anyo, :cartel)";
         
        $stmt= $this->pdo->prepare($sql);
        
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':genero', $this->genero);
        $stmt->bindParam(':pais', $this->pais);
        $stmt->bindParam(':anyo', $this->anyo);
        $stmt->bindParam(':cartel', $this->cartel);
        
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        $stmt->closePDO();
    }
    public function eliminarPelicula(){
        $sql = "DELETE FROM actuan WHERE idPelicula = :id";
        
        $stmt= $this->pdo->prepare($sql);
        
        $stmt->bindParam(':id', $this->id);
        
        $stmt->execute();
        
        $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $stmt->closePDO();
        
        $sql2 = "DELETE FROM peliculas WHERE id = :id";
         
        $stmt2= $this->pdo->prepare($sql2);
        
        $stmt2->bindParam(':id', $this->id);
        
        $stmt2->execute();
        
        $stmt2->fetchAll(PDO::FETCH_ASSOC);
        
        $stmt2->closePDO();
    }
}