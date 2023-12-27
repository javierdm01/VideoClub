<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/VideoClub/db/DB.php';

/**
 * Clase Actuan esta clase representa la relación entre Pelicula y Actores
 */
class Actuan{
    
    /**
     * @var number identificador de Pelicula
     */
    private $idPelicula;
    
    /**
     * @var number identificador de Actor
     */
    private $idActor;
    
    //Conexion Atributtes
    private $db;
    private $pdo; 


    /**
     * Constructor de la clase Actuan
     */
    public function __construct() {
        $this->db=new DB();
        $this->pdo= $this->db->getPDO();
    }
    /**
     * Destructor de la clase Actuan
     */
    public function __destruct() {
        $this->pdo = null;
    }
    /**
     * Getters and setters
     */
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

    /**
     * Devuelve un array con todas los valores de la tabla Actuan
     *
     * @return array
     */
    public function getActuaciones(){
        try {
            $stmt= $this->pdo->prepare('SELECT * FROM actuan');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        } catch (Exception $exc) {
            mensajeError('Se ha producido un error al obtener la tabla Actuan');
        }
    }
    
    /**
     * Hace una insercción en la tabla Actuan 
     * 
     *@param array $post Datos para la insercción.
     */
    public function insertarActuacion($post){
        try {
            for ($i = 0; $i < count($post['actores']); $i++) {
                $sql = "INSERT INTO actuan (idPelicula, idActor) 
                    VALUES (:idPelicula, :idActor)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':idPelicula', $post['id']);
                $stmt->bindParam(':idActor', $post['actores'][$i]);
                $stmt->execute();
            }
        } catch (Exception $exc) {
            mensajeError('Se ha producido un error al insertar los actores en la pelicula');
        }
         
        
    }
    
    /**
     * Actualiza en la tabla Actuan 
     *
     * @param number $id identificador de la Pelicula
     */
    public function eliminarActuacion($id) {
        try {
            $sql = "DELETE FROM actuan WHERE idPelicula = :id";

            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

        } catch (Exception) {
            mensajeError('Se ha producido un error al eliminar las peliculas');
        }
    }
}
