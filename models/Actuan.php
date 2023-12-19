<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/db/DB.php';
class Actuan{
    private $idPelicula;
    private $idActor;
    
    //Conexion Atributtes
    private $bd;
    private $pdo; 


    public function __construct($id, $nombre) {
        $this->id = $idPelicula;
        $this->nombre = $idActor;
        $this->bd=new BD();
        $this->pdo= $this->$bd->getPDO();
    }
    public function getIdPelicula() {
        return $this->idPelicula;
    }

    public function getIdActor() {
        return $this->idActor;
    }

    public function getBd() {
        return $this->bd;
    }

    public function getPdo() {
        return $this->pdo;
    }

    public function setIdPelicula($idPelicula): void {
        $this->idPelicula = $idPelicula;
    }

    public function setIdActor($idActor): void {
        $this->idActor = $idActor;
    }

    public function setBd($bd): void {
        $this->bd = $bd;
    }

    public function setPdo($pdo): void {
        $this->pdo = $pdo;
    }

    public function getActuaciones(){
        $stmt= $this->pdo->prepare('SELECT * FROM actuan');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    
    public function modificarActuacion(){
        $sql = "UPDATE actuan SET 
                idPelicula = :idPelicula, 
                idActor = :idActor
                WHERE idPelicula = :idPelicula and idActor= :idActor";
        
        $stmt= $this->pdo->prepare($sql);
        
        $stmt->bindParam(':idPelicula', $this->idPelicula);
        $stmt->bindParam(':idActor', $this->idActor);
        
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        $stmt->closePDO();
    }
    public function insertarActuacion(){
         $sql = "INSERT INTO actuan (idPelicula, idActor) 
                VALUES (:idPelicula, :idActor)";
         
        $stmt= $this->pdo->prepare($sql);
        
        $stmt->bindParam(':idPelicula', $this->idPelicula);
        $stmt->bindParam(':idActor', $this->idActor);
        
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        $stmt->closePDO();
    }
    public function eliminarActuacion(){
        $sql = "DELETE FROM actuan WHERE idPelicula = :idPelicula and idActor = :idActor";
         
        $stmt= $this->pdo->prepare($sql);
        
        $stmt->bindParam(':idPelicula', $this->idPelicula);
        $stmt->bindParam(':idActor', $this->idActor);
        
        $stmt->execute();
        
        $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $stmt->closePDO();
    }
}
