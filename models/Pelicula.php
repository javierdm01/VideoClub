<?php

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

    public function __construct() {
        include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/db/DB.php';
        
        $this->bd=new DB();
        $this->pdo= $this->bd->getPDO();
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
        $stmt= $this->pdo->prepare('SELECT * FROM peliculas');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    public function modificarPelicula($post){
        $sql = "UPDATE peliculas SET 
                titulo = :titulo, 
                genero = :genero, 
                pais = :pais, 
                anyo = :anyo, 
                cartel = :cartel 
                WHERE id = :id";
        $stmt= $this->pdo->prepare($sql);
        
        $stmt->bindParam(':id', $post['id']);
        $stmt->bindParam(':titulo', $post['titulo']);
        $stmt->bindParam(':genero', $post['genero']);
        $stmt->bindParam(':pais', $post['pais']);
        $stmt->bindParam(':anyo', $post['anyo']);
        $stmt->bindParam(':cartel', $post['cartel']);
        
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
    }
    public function insertarPelicula($post){
         $sql = "INSERT INTO peliculas (id,titulo, genero, pais, anyo, cartel) 
                VALUES (:id, :titulo, :genero, :pais, :anyo, :cartel)";
         
        $stmt= $this->pdo->prepare($sql);
        
        $stmt->bindParam(':id', $post['id']);
        $stmt->bindParam(':titulo', $post['titulo']);
        $stmt->bindParam(':genero', $post['genero']);
        $stmt->bindParam(':pais', $post['pais']);
        $stmt->bindParam(':anyo', $post['anyo']);
        $stmt->bindParam(':cartel', $post['cartel']);
        
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