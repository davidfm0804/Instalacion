<?php
   function eliminarDirectorio($ruta) {
    if (!is_dir($ruta)) {
        return false; // No es un directorio, no se puede eliminar
    }

    $archivos = array_diff(scandir($ruta), array('.', '..')); // Obtener archivos sin '.' y '..'

    foreach ($archivos as $archivo) {
        $rutaCompleta = $ruta . DIRECTORY_SEPARATOR . $archivo;
        if (is_dir($rutaCompleta)) {
            eliminarDirectorio($rutaCompleta); // Llamada recursiva para subdirectorios
        } else {
            unlink($rutaCompleta); // Eliminar archivo
        }
    }

    return rmdir($ruta); // Una vez vacío, eliminar el directorio
}

// Llamar a la función para eliminar el directorio
$directorio = 'instalacion_Admin'; 

if (eliminarDirectorio($directorio)) {
    echo "Directorio eliminado correctamente.";
} else {
    echo "No se pudo eliminar el directorio.";
}

?>