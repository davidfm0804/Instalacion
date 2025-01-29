<?php
class Cusuario {
    private $objusuario;

    public function __construct() {
        require_once '../modelos/Musuario.php';
        $this->objusuario = new Musuario();
    }
    public function cInsertarNuevoUsuario($nombre,$contra,$correo) {
        $resultado = $this->objusuario->mInsertarNuevoUsuario($nombre,$contra,$correo);
        if ($resultado === true) {
            return "Consulta Correcta";
        } elseif ($resultado === "Csu") {
            return "Correo Duplicado";
        } elseif ($resultado === "Tipo invalido") {
            return "El tipo de usuario debe ser 'ad' o 'us'";
        } else {
            return "Error en el registro";
        }
    }
}
?>