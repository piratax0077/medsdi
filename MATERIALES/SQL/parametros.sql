-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-09-2022 a las 08:43:36
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `medichile`
--

--
-- Volcado de datos para la tabla `parametros`
--

INSERT INTO `parametros` (`id`, `valor`, `referencia`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Reservada', 'Agenda_Estado', '#FEAA32', '2022-05-02 09:50:22', '2022-05-02 09:50:22'),
(2, 'Confirmada', 'Agenda_Estado', '#94BF61', '2022-05-02 09:50:22', '2022-05-02 09:50:22'),
(3, 'Rechazada', 'Agenda_Estado', '#FF3D3D', '2022-05-02 09:50:22', '2022-05-02 09:50:22'),
(4, 'Espera', 'Agenda_Estado', '#A06CC1', '2022-05-02 09:50:22', '2022-05-02 09:50:22'),
(5, 'Realizando', 'Agenda_Estado', '#EDBB99', '2022-05-02 09:50:22', '2022-05-02 09:50:22'),
(6, 'Realizada', 'Agenda_Estado', '#17C1C1', '2022-05-02 09:50:22', '2022-05-02 09:50:22'),
(7, 'Inasistida', 'Agenda_Estado', '#F9A825', '2022-05-02 09:50:22', '2022-05-02 09:50:22'),
(8, 'Llamando', 'Agenda_Estado', '#A06CC1', '2022-09-06 04:00:00', NULL),
(9, 'Bloqueada Por Profesional', 'Agenda_Estado', '#000', '2022-09-06 04:00:00', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
