/*Creando usuario admin de que puede crear tablas y con todos los permisos*/
CREATE USER 'ad_lb'@'localhost' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON appdelibros.* TO 'ad_lb'@'localhost' WITH GRANT OPTION;
/*Creando usuario con solo privilegios básicos*/
CREATE USER 'usuario_basico'@'localhost' IDENTIFIED BY '1234';
GRANT SELECT, INSERT, UPDATE, DELETE ON `appdelibros`.* TO 'usuario_basico'@'localhost';
