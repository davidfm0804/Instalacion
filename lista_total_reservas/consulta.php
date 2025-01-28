<?php
require_once 'configdb.php';

class Reserva {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function obtenerReservas() {
        $consulta = '
        SELECT 
            Reservas.nombreAlumno, Reservas.documento, Reservas.correo, Reservas.fecha_reserva, 
            Libros.nombre AS nombreLibro, Reservas.idCurso, Reservas.letraClase, Reservas.idReserva
        FROM Reservas
        LEFT JOIN 
            Reservas_Libros ON Reservas.idReserva = Reservas_Libros.idReserva
        LEFT JOIN 
            Libros ON Reservas_Libros.idLibro = Libros.idLibro
        ORDER BY 
            Reservas.nombreAlumno, Reservas.fecha_reserva;';
        
        $resultado = $this->db->conexion->query($consulta);
        $alumnos = [];

        if ($resultado && $resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $documento = $fila['documento'];
                if (!isset($alumnos[$documento])) {
                    $alumnos[$documento] = [
                        'nombreAlumno' => $fila['nombreAlumno'],
                        'correo' => $fila['correo'],
                        'fecha_reserva' => $fila['fecha_reserva'],
                        'idCurso' => $fila['idCurso'],
                        'letraClase' => $fila['letraClase'],
                        'libros' => [],
                        'idReserva' => $fila['idReserva']
                    ];
                }
                if (!empty($fila['nombreLibro'])) {
                    $alumnos[$documento]['libros'][] = $fila['nombreLibro'];
                }
            }
        }

        $this->db->cerrarConexion();
        return $alumnos;
    }
}

$reserva = new Reserva();
$alumnos = $reserva->obtenerReservas();
?>
