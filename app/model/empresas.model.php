<?php
require_once 'app/model/deploy.model.php';
class empresasModel extends Model{
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=viajesLupa;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAllEmpresas() {
        $query = $this->db->prepare('SELECT * FROM empresa'); // Asegúrate de que la tabla se llame 'empresas'
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}