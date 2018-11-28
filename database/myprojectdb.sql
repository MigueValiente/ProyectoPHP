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

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `employee_name` varchar(255) UNIQUE,
  `provincia` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `payment` int(11) NOT NULL,
  `created_at`  TIMESTAMP NOT NULL default now(),
  `updated_at`  TIMESTAMP NOT NULL default now() on update now(),
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `name`, `description`, `payment`, `created_at`, `updated_at`) VALUES
(1, 9, 'Escaparatista', 'adsffasdfasd omfiwejf wefqwef', 200, '2018-11-27 12:55:33', '2018-11-27 12:55:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `agent` varchar(255) NOT NULL,
  `status` enum('OK','FAULT') NOT NULL,
  `created_at`  TIMESTAMP NOT NULL default now(),
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id`, `username`, `ip`, `agent`, `status`, `created_at`) VALUES
(1, 'pepito00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'OK', '2018-11-27 12:06:28');

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` int(9) NOT NULL,
  `provincia` int(11) NOT NULL,
  `count` varchar(255) NOT NULL,
  `created_at`  TIMESTAMP NOT NULL default now(),
  `updated_at`  TIMESTAMP NOT NULL default now() on update now(),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `email`, `telefono`, `provincia`, `count`, `date_register`, `date_update`, `password`) VALUES
(4, 'Miguel', 'Valiente', 'miguelvaliente96', 'valentino@gmail.com', 753719321, 39, 'C', '2018-11-18 18:17:41', '2018-11-18 18:17:41', '$2y$10$su2HQ2LOYiiFWTEN/WMEKOiAWt3JSFUOgaQ7iaXEC5p3Ylmje0./6'),
(5, 'Paco', 'Pacote', 'paquito96', 'pacote69@gmail.com', 681329861, 5, 'E', '2018-11-18 18:18:30', '2018-11-18 18:18:30', '$2y$10$30002FKF4Wy16MmhbTvg0eoV.xI9NEvW8941BFVCHSfr9UXF6VSNu'),
(6, 'Miguel', 'Valiente', 'miguelo96', 'valentino@gmail.com', 753719321, 6, 'C', '2018-11-26 13:52:56', '2018-11-26 13:52:56', '$2y$10$77XALq3fkrnYe4y7N61yN.wgn29UGJppEmJm2mBqQBayPnH1dPptC'),
(7, 'Paco', 'Pacote', 'paquito96', 'pacote69@gmail.com', 681329861, 37, 'E', '2018-11-26 13:58:22', '2018-11-26 13:58:22', '$2y$10$CgwMC.gu.7OwFReUxKu5E.RRcnjze7m523JxQcCvVGvrE3i0eUQn2'),
(8, 'Manue', 'Manolito', 'manolito96', 'manolo@gmail.com', 674232143, 36, 'E', '2018-11-26 13:59:43', '2018-11-26 13:59:43', '$2y$10$U53Qf8ATN/WNUc3ehLB.5u9FKFL.3NlcrdSQPs68S3zTSwdbkt9aq'),
(9, 'Pepe', 'Espejo', 'pepito00', 'pepito@gmail.com', 723413412, 46, 'C', '2018-11-27 13:02:50', '2018-11-27 13:02:50', '$2y$10$SSE21FRE82dA/ELU6IS4BO2Ovi9XI/35qoLPFqCJ1RhCXULiLKnJG');

ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;
