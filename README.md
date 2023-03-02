CREATE DATABASE chatunet

//Tablas


CREATE TABLE persona(
	id int AUTO_INCREMENT PRIMARY KEY,
      username varchar(100),
      password varchar(255),
      contactos varchar(100),
	  estado int
);

CREATE TABLE personas_sala(
	id int AUTO_INCREMENT PRIMARY KEY,
	id_usuario int,
      id_sala int
);

CREATE TABLE sala(
	id int AUTO_INCREMENT PRIMARY KEY,
	id_tipo int,
      fecha date
);

CREATE TABLE tipo_sala(
	id int AUTO_INCREMENT PRIMARY KEY,
	nombre varchar(100)
);

CREATE TABLE mensajes(
	id int AUTO_INCREMENT PRIMARY KEY,
	id_usuario int,
      id_sala int,
	mensaje varchar(10000),
      fecha date
);

