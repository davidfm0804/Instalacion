CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    contrasena VARCHAR(50) NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    tipo CHAR(2) NOT NULL CHECK (tipo IN ('ad', 'us'))
);

CREATE TABLE IF NOT EXISTS Tutores (
    idTutor TINYINT UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE, 
    CONSTRAINT pk_tutores PRIMARY KEY (idTutor)
);

CREATE TABLE IF NOT EXISTS Cursos (
    idCurso CHAR(6) NOT NULL, 
    nombre VARCHAR(50) NOT NULL,
    CONSTRAINT pk_idCurso PRIMARY KEY (idCurso)
);

CREATE TABLE IF NOT EXISTS Clases (
    idCurso CHAR(6) NOT NULL,
    letraClase CHAR(1) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    CONSTRAINT pk_clases PRIMARY KEY (idCurso, letraClase),
    CONSTRAINT fk_idCurso FOREIGN KEY (idCurso) REFERENCES Cursos(idCurso) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS Editoriales (
    idEditorial SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL UNIQUE,
    correo VARCHAR(50) NOT NULL UNIQUE,
    telefono CHAR(9) NOT NULL
);

CREATE TABLE IF NOT EXISTS Libros (
    idLibro TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    idEditorial SMALLINT UNSIGNED NOT NULL,
    CONSTRAINT fk_idEditorial FOREIGN KEY (idEditorial) REFERENCES Editoriales(idEditorial) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS Libros_Cursos (
    idLibro TINYINT UNSIGNED NOT NULL,
    idCurso CHAR(6) NOT NULL,
    CONSTRAINT pk_libros_cursos PRIMARY KEY (idLibro, idCurso),
    CONSTRAINT fk_libro FOREIGN KEY (idLibro) REFERENCES Libros(idLibro) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_curso FOREIGN KEY (idCurso) REFERENCES Cursos(idCurso) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS Reservas (
    idReserva INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    dni CHAR(9) NOT NULL,
    nombreTutor VARCHAR(100) NOT NULL,
    correo VARCHAR(50) NOT NULL, 
    nombreAlumno VARCHAR(100) NOT NULL,
    documento VARCHAR(255) NOT NULL,
    apta BOOLEAN NOT NULL,
    fecha_reserva DATE NOT NULL,
    coste_total DECIMAL(10, 2) NOT NULL, 
    fecha_registro DATE NOT NULL,
    idCurso CHAR(6) NOT NULL,
    letraClase CHAR(1) NOT NULL,
    CONSTRAINT fk_reserva_curso FOREIGN KEY (idCurso, letraClase) REFERENCES Clases(idCurso, letraClase) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS Reservas_Libros (
    idLibro TINYINT UNSIGNED NOT NULL,
    idReserva INT UNSIGNED NOT NULL,
    entregado BOOLEAN NOT NULL,
    PRIMARY KEY (idLibro, idReserva),
    FOREIGN KEY (idLibro) REFERENCES Libros(idLibro) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (idReserva) REFERENCES Reservas(idReserva) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS Asignaturas (
    idAsignatura TINYINT UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    CONSTRAINT pk_asignaturas PRIMARY KEY (idAsignatura)
);

CREATE TABLE IF NOT EXISTS clases_asignaturas (
    idCurso CHAR(6) NOT NULL,
    letraClase CHAR(1) NOT NULL,
    idAsignatura TINYINT UNSIGNED NOT NULL,
    CONSTRAINT pk_clases_asignaturas PRIMARY KEY (idCurso, letraClase, idAsignatura),
    CONSTRAINT fk_asignaturas_clases FOREIGN KEY (idCurso, letraClase) REFERENCES Clases(idCurso, letraClase) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_asignaturas_asignaturas FOREIGN KEY (idAsignatura) REFERENCES Asignaturas(idAsignatura) ON DELETE CASCADE ON UPDATE CASCADE
);
