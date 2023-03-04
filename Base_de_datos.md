	servidor : localhost
	usuario: root
	contraseña: ''
	base de datos: chatunet
	puerto: 3306

	<--- crear base de datos --->

	CREATE DATABASE chatunet2;

	<--- crear tablas de la base de datos --->

	CREATE TABLE estados (
        	id INT PRIMARY KEY AUTO_INCREMENT,
   		codigo INT NOT NULL,
   		nombre VARCHAR(50) NOT NULL
	);

	CREATE TABLE mensajes (
        	id INT PRIMARY KEY AUTO_INCREMENT,
   		id_usuario INT NOT NULL,
		id_sala INT NOT NULL,
   		mensaje VARCHAR(10000),
		fecha date
	);

	CREATE TABLE persona (
        	id INT PRIMARY KEY AUTO_INCREMENT,
   		username VARCHAR(100),
		password VARCHAR(255),
   		contactos VARCHAR(100),
		estado INT
	);

	CREATE TABLE sala (
        	id INT PRIMARY KEY AUTO_INCREMENT,
		id_tipo INT,
		fecha date
	);

	<--- valores por defecto de los usuarios --->

	INSERT INTO estados (id, codigo, nombre) 
	VALUES 
	('1', '0', 'Disponible'), 
	('2', '1', 'Ocupado'),  
	('3', '2', 'Ausente'),  
	('4', '3', 'No conectado');  
	
