-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2018 a las 14:23:27
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `myprojectdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `payment` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_try` datetime NOT NULL,
  `result` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id`, `username`, `password`, `date_try`, `result`) VALUES
(1, 'paquito96', '123456', '2018-11-18 19:17:43', 'fail'),
(2, 'paquito96', '123456', '2018-11-18 19:20:33', 'fail'),
(3, 'paquito96', '123456', '2018-11-18 19:21:02', 'fail'),
(4, 'paquito96', 'qwerty', '2018-11-18 19:21:14', 'success'),
(5, 'paquito96', '$2y$10$30002FKF4Wy16MmhbTvg0eoV.xI9NEvW8941BFVCHSfr9UXF6VSNu', '2018-11-18 19:26:23', 'success'),
(6, 'miguelo96', '$2y$10$77XALq3fkrnYe4y7N61yN.wgn29UGJppEmJm2mBqQBayPnH1dPptC', '2018-11-26 13:53:04', 'success'),
(7, 'paquito96', 'manolo', '2018-11-26 13:58:30', 'fail'),
(8, 'paquito96', 'manolo', '2018-11-26 13:58:36', 'fail'),
(9, 'paquito96', 'manolo', '2018-11-26 13:58:44', 'fail'),
(10, 'manolito96', '$2y$10$U53Qf8ATN/WNUc3ehLB.5u9FKFL.3NlcrdSQPs68S3zTSwdbkt9aq', '2018-11-26 13:59:52', 'success'),
(11, 'miguelo96', '$2y$10$77XALq3fkrnYe4y7N61yN.wgn29UGJppEmJm2mBqQBayPnH1dPptC', '2018-11-26 14:13:22', 'success');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` int(9) NOT NULL,
  `provincia` int(11) NOT NULL,
  `count` varchar(255) NOT NULL,
  `date_register` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `email`, `telefono`, `provincia`, `count`, `date_register`, `date_update`, `password`) VALUES
(4, 'Miguel', 'Valiente', 'miguelvaliente96', 'valentino@gmail.com', 753719321, 39, 'C', '2018-11-18 18:17:41', '2018-11-18 18:17:41', '$2y$10$su2HQ2LOYiiFWTEN/WMEKOiAWt3JSFUOgaQ7iaXEC5p3Ylmje0./6'),
(5, 'Paco', 'Pacote', 'paquito96', 'pacote69@gmail.com', 681329861, 5, 'E', '2018-11-18 18:18:30', '2018-11-18 18:18:30', '$2y$10$30002FKF4Wy16MmhbTvg0eoV.xI9NEvW8941BFVCHSfr9UXF6VSNu'),
(6, 'Miguel', 'Valiente', 'miguelo96', 'valentino@gmail.com', 753719321, 6, 'C', '2018-11-26 13:52:56', '2018-11-26 13:52:56', '$2y$10$77XALq3fkrnYe4y7N61yN.wgn29UGJppEmJm2mBqQBayPnH1dPptC'),
(7, 'Paco', 'Pacote', 'paquito96', 'pacote69@gmail.com', 681329861, 37, 'E', '2018-11-26 13:58:22', '2018-11-26 13:58:22', '$2y$10$CgwMC.gu.7OwFReUxKu5E.RRcnjze7m523JxQcCvVGvrE3i0eUQn2'),
(8, 'Manue', 'Manolito', 'manolito96', 'manolo@gmail.com', 674232143, 36, 'E', '2018-11-26 13:59:43', '2018-11-26 13:59:43', '$2y$10$U53Qf8ATN/WNUc3ehLB.5u9FKFL.3NlcrdSQPs68S3zTSwdbkt9aq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
