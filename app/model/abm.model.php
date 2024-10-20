<?php
require_once 'app/model/deploy.model.php';
class viajesAbmModel extends Model{
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=viajesLupa;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Obtener todos los viajes futuros (disponibles)
    public function getAllViajes() {
        $query = $this->db->prepare('SELECT * FROM viajes');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // Insertar un nuevo viaje
    public function insertViaje($origen, $destino, $FechaDeSalida, $FechaDeLlegada, $id_empresa) {
        $query = $this->db->prepare('INSERT INTO viajes (origen, destino, FechaDeSalida, FechaDeLlegada, id_empresa) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$origen, $destino, $FechaDeSalida, $FechaDeLlegada, $id_empresa]);
        $id=$this->db->lastInsertId();
        return $id;
    }

    // Actualizar un viaje existente
    public function updateViaje($id, $origen, $destino, $FechaDeSalida, $FechaDeLlegada, $id_empresa) {
        $query = $this->db->prepare('UPDATE viajes SET origen = ?, destino = ?, FechaDeSalida = ?, FechaDeLlegada = ? WHERE id_viaje = ?');
        $query->execute([$origen, $destino, $FechaDeSalida, $FechaDeLlegada, $id]);
        return;
    }

    // Eliminar un viaje
    public function deleteViaje($id) {
        $query = $this->db->prepare('DELETE FROM viajes WHERE id_viaje = ?');
        $query->execute([$id]);
    }

    // Obtener un viaje específico por ID (para edición)
    public function getViajeById($id) {
        $query = $this->db->prepare('SELECT * FROM viajes WHERE id_viaje = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
