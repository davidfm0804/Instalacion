<?php
require_once '../controladores/Cusuario.php'; 

if(!empty($_POST['nombre']) && !empty($_POST['contra']) && !empty($_POST['correo'])){
    $nombre=$_POST['nombre'];
    $contra=$_POST['contra'];
    $correo=$_POST['correo'];
    
    $objusuario = new Cusuario();
    $resultado = $objusuario->cInsertarNuevoUsuario($nombre,$contra,$correo);
    if ($resultado == "Consulta Correcta") {
        if (file_exists('../../borrar.php')) {
            header('Location: ../../borrar.php');
            exit();
        } else {
            echo 'Archivo borrar.php no encontrado';
        }
    } else {
        echo 'Error: ' . $resultado;
    }
} else {
    echo 'Campo no introducido';
}
?>