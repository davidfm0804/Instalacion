<?php
class Musuario {
    private $conexion;

    public function __construct() {
        require_once '../config/configdb.php';
        $this->conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
        $this->conexion->set_charset("utf8");

        if ($this->conexion->connect_error) {
            die("Conexión fallida: " . $this->conexion->connect_error);
        }
        // Activar modo de excepciones
        $this->conexion->report_mode = MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT;
    }

public function mInsertarNuevoUsuario($nombre, $contra, $correo) {
    $SQL = "INSERT INTO usuarios (nombre, contrasena, correo) values('$nombre','$contra','$correo')";
    $this->conexion->query($SQL);
}
public function mCrearUsuario($nombre, $contra) {
    $query = "CREATE USER '$nombre'@'localhost' IDENTIFIED BY '$contra';";
    $query .= "GRANT SELECT, INSERT, UPDATE, DELETE ON `appdelibros`.* TO '$nombre'@'localhost';";
    $this->conexion->multi_query($query);
}
}
?>