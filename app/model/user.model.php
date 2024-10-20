<?php
class userModel extends Model{
    private $db;

     function __construct(){
        $this->db =  new PDO ('mysql:host=localhost;dbname=viajesLupa;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /* $nuevoNombre = "webadmin"; // Cambia esto por el nombre de usuario que desees
        $nuevaContrasena = password_hash("admin", PASSWORD_DEFAULT); // Hashea la contraseña

        $stmt =$this->db->prepare("UPDATE usuarios SET contraseña = ? WHERE nombre = ?");
        $stmt->execute([$nuevaContrasena, $nuevoNombre]);

        echo "Contraseña actualizada."; */
        }     

    function getUserByNombre($nombre){
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE nombre = ?');
        $query->execute([$nombre]);

        $usuario = $query->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }

}