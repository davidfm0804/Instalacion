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
    try {
    $SQL = "INSERT INTO usuarios (nombre, contrasena, correo, tipo) values('$nombre','$contra','$correo','ad')";
    $this->conexion->query($SQL);
    }catch (mysqli_sql_exception $e) {
        //echo "Error MySQL: " . $e->getCode() . " - " . $e->getMessage(); Te da el codigo de error
        if ($e->getCode() === 1062) { 
            return "Csu"; 
        } elseif ($e->getCode() === 4025) { 
            return "Tipo invalido"; 
        } else {
            return false;
        }
    }
    return true;
    }
} 
?>