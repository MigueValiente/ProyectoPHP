-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2018 a las 13:57:31
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE provincias (
  id_provincia INT PRIMARY KEY,
  provincia varchar(30) DEFAULT NULL
) ENGINE=InnoDB;

INSERT INTO `provincias` (`id_provincia`, `provincia`)
VALUES
	(2,'Albacete'),
	(3,'Alicante/Alacant'),
	(4,'Almería'),
	(1,'Araba/Álava'),
	(33,'Asturias'),
	(5,'Ávila'),
	(6,'Badajoz'),
	(7,'Balears, Illes'),
	(8,'Barcelona'),
	(48,'Bizkaia'),
	(9,'Burgos'),
	(10,'Cáceres'),
	(11,'Cádiz'),
	(39,'Cantabria'),
	(12,'Castellón/Castelló'),
	(51,'Ceuta'),
	(13,'Ciudad Real'),
	(14,'Córdoba'),
	(15,'Coruña, A'),
	(16,'Cuenca'),
	(20,'Gipuzkoa'),
	(17,'Girona'),
	(18,'Granada'),
	(19,'Guadalajara'),
	(21,'Huelva'),
	(22,'Huesca'),
	(23,'Jaén'),
	(24,'León'),
	(27,'Lugo'),
	(25,'Lleida'),
	(28,'Madrid'),
	(29,'Málaga'),
	(52,'Melilla'),
	(30,'Murcia'),
	(31,'Navarra'),
	(32,'Ourense'),
	(34,'Palencia'),
	(35,'Palmas, Las'),
	(36,'Pontevedra'),
	(26,'Rioja, La'),
	(37,'Salamanca'),
	(38,'Santa Cruz de Tenerife'),
	(40,'Segovia'),
	(41,'Sevilla'),
	(42,'Soria'),
	(43,'Tarragona'),
	(44,'Teruel'),
	(45,'Toledo'),
	(46,'Valencia/València'),
	(47,'Valladolid'),
	(49,'Zamora'),
  (50,'Zaragoza');
	
	CREATE TABLE users (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` int(9) NOT NULL,
  `provincia_id` int(6) NOT NULL,
  `count` varchar(255) NOT NULL,
  `created_at`  TIMESTAMP NOT NULL default now(),
  `updated_at`  TIMESTAMP NOT NULL default now() on update now(),
  `password` varchar(255) NOT NULL,
  CONSTRAINT fk_provincia_id_user FOREIGN KEY(provincia_id) REFERENCES provincias(id_provincia)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `jobs` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `cliente_id` int(11) NOT NULL,
  `employee_name` varchar(255) UNIQUE DEFAULT NULL,
  `provincia` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `payment` int(11) NOT NULL,
  `created_at`  TIMESTAMP NOT NULL default now(),
  `updated_at`  TIMESTAMP NOT NULL default now() on update now(),
  CONSTRAINT fk_cliente_id FOREIGN KEY(cliente_id) REFERENCES users(id),
  CONSTRAINT fk_provincia_id_job FOREIGN KEY(provincia) REFERENCES provincias(id_provincia)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE logs (
  id int AUTO_INCREMENT PRIMARY KEY,
  username varchar(255) NOT NULL,
  ip varchar(255) NOT NULL,
  agent varchar(255) NOT NULL,
  `status` enum('OK','FAULT') NOT NULL,
  created_at  TIMESTAMP NOT NULL default now()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
