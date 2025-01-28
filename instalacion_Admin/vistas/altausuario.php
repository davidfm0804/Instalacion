<?php
require_once '../controladores/Cusuario.php'; 

if(!empty($_POST['nombre']) && !empty($_POST['contra']) && !empty($_POST['correo'])){
    $nombre=$_POST['nombre'];
    $contra=$_POST['contra'];
    $correo=$_POST['correo'];
    
    $objusuario = new Cusuario();
    $resultado = $objusuario->cInsertarNuevoUsuario($nombre,$contra,$correo);
    echo 'Usuario Creado Correctamente';

    $resultado2=$objusuario->cCrearUsuario($nombre,$contra);
    if (file_exists('instalacion.php')) {
        unlink('instalacion.php');
    } else {
        die('Archivo instalacion.php no encontrado');
    }
}else{
    echo 'Campo no introducido';
}
?>