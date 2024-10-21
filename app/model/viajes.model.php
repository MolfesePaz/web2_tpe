<?php
require_once 'app/model/deploy.model.php';
class viajesModel extends Model{
    
   /*  protected $db;

    function __construct(){
        $this->db = $this->connect();
        }
    
    private function connect(){
        return $db = new PDO ('mysql:host=localhost;dbname=viajeslupa;charset=utf8', 'root', '');
    }      */

    function getViajes(){
        $query = $this->db->prepare('SELECT * FROM viajes');
        $query->execute();
        return $viajes = $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getViajeId($id) {
        try {
            $query = $this->db->prepare('SELECT * FROM viajes WHERE id_viaje = ?');
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_OBJ); // Devuelve el viaje o null si no se encuentra
        } catch (PDOException $e) {
            return null ; // Retorna null en caso de error
        }
    }

    public function getByName($destino) {
        try {
            $query = $this->db->prepare('SELECT * FROM viajes WHERE destino = ?');
            $query->execute([$destino]);
            return $query->fetch(PDO::FETCH_OBJ); // Devuelve el viaje o null si no se encuentra
        } catch (PDOException $e) {
            return null; // Retorna null si ocurre un error
        }
    }
}
?>