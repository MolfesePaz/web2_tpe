<?php
    require_once "config.php";

class Model {
    protected $db;

    public function __construct() {
        //conexion al servidor sin especificar base db
        $this->db = new PDO("mysql:host=".MYSQL_HOST ,MYSQL_USER, MYSQL_PASS);
        //crear la db si no existe
        $this->db->exec("CREATE DATABASE IF NOT EXISTS `" . MYSQL_DB . "` CHARACTER SET utf8 COLLATE utf8_general_ci");
        //nos conectamos a la db
        $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);

        $this->deploy();
    }
}