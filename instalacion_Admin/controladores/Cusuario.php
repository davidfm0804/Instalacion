<?php
class Cusuario {
    private $objusuario;

    public function __construct() {
        require_once '../modelos/Musuario.php';
        $this->objusuario = new Musuario();
    }
    public function cInsertarNuevoUsuario($nombre,$contra,$correo) {
        return $this->objusuario->mInsertarNuevoUsuario($nombre,$contra,$correo);
    }
    public function cCrearUsuario($nombre,$contra) {
        return $this->objusuario->mCrearUsuario($nombre,$contra);
    }
}
?>