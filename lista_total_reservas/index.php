<?php
require_once 'consulta.php';
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/imports/general.css">
    <link rel="stylesheet" href="css/imports/headerFooter.css">
    <link rel="stylesheet" href="css/estilo/listaReservas.css">
    <title>Reserva de Libros</title>
</head>
<body>
<header>
    <div class="logo">
        <a href="../admin/admin.html">
            <img src="../../resources/logo.png" alt="Logo">
        </a>
    </div>
    <nav>
        <a href="../../pages/admin/gestionStock.html">Gestión Stock</a>
        <a href="../../pages/admin/listaReservas.html">Gestión Reservas</a>
        <a href="../../pages/admin/gestionLibros.html">Gestión Libros</a>
    </nav>
    <div class="icono-usuario">
        <a href="../../../index.html">
            <img src="../../resources/login.png" alt="login">
        </a>
    </div>
</header>
<main class="contenido-principal">
    <section class="seccion-reservas">
        <h1>Total de reservas</h1>
        <div class="acciones">
            <button class="btn-anadir">+</button>
            <button class="btn-filtrar">Filtrar</button>
            <button class="btn-ordenar">Ordenar</button>
            <button class="btn-pedido">Realizar pedido</button>
        </div>
        <table class="tabla-reservas">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Curso</th>
                    <th>Clase</th>
                    <th>Fecha Reserva</th>
                    <th>Libros</th>
                    <th>Doc</th>
                    <th>Fecha reserva</th>
                    <th>Notificar</th>
                    <th>Gestionar</th>
                    <th>Pedido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($alumnos as $documento => $datos) {
                        echo "<tr>";
                            echo "<td>" . $datos['nombreAlumno'] . "</td>";
                            echo "<td>" . $datos['correo'] . "</td>";
                            echo "<td>" . $datos['idCurso'] . "</td>";
                            echo "<td>" . $datos['letraClase'] . "</td>";
                            echo "<td>" . $datos['fecha_reserva'] . "</td>";
                            echo "<td>
                                    <select name='libros'>";
                            foreach ($datos['libros'] as $libro) {
                                echo "<option>" . $libro . "</option>";
                            }
                            echo "</select>
                                </td>";
                            echo "<td>" . $documento . "</td>";
                            echo "<td>" . $datos['fecha_reserva'] . "</td>";
                            echo "<td>
                                    <button type='button'>Notificar</button>
                                </td>";
                            echo "<td>
                                <form method='POST' action='../reservaIndividual/reservaIndividual.php'>
                                    <input type='hidden' name='idReserva' value='" . $datos['idReserva'] . "'>
                                    <input type='hidden' name='nombre' value='" . $datos['nombreAlumno'] . "'>
                                    <input type='hidden' name='curso' value='" . $datos['idCurso'] . "'>
                                    <input type='hidden' name='clase' value='" . $datos['letraClase'] . "'>";
                                    foreach ($datos['libros'] as $libro) {
                                        echo "<input type='hidden' name='libros[]' value='" . $libro . "'>";
                                    }
                            echo "<button type='submit'>Gestionar</button>
                                </form>
                            </td>";
                            echo "<td>
                                    <button type='button'>Pedido</button>
                                </td>";
                        echo "</tr>";
                    }?>
            </tbody>
        </table>
    </section>
</main>
<footer>
    <div class="colaboradores">
        <b>Colaboradores</b>
        <p><a href="https://atabalfundacion.wordpress.com/">Fundacion Atabal</a></p>
        <p><a href="https://www.aytobadajoz.es/es/ayto/portada">Ayto. Badajoz</a></p>
        <p><a href="https://www.aexpainba-fmm.org/comienzo.asp">AEXPAINBA</a></p>
        <p><a href="http://www.fidesbancaetica.com/">FIDES</a></p>
    </div>
    <div class="cita">
        <p>"El examen de conciencia es siempre el mejor medio para cuidar bien el alma."</p>
        <p>"San Ignacio de Loyola"</p>
    </div>
    <div class="contacto">
        <b id="contactar">Contactar</b>
        <p><i class="fas fa-map-marker-alt"></i> C/ Corte de Peleas, 79 06009 Badajoz</p>
        <p><i class="fas fa-phone"></i> +34 924 25 17 61</p>
    </div>
</footer>
</body>
</html>
