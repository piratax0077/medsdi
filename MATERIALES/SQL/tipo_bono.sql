-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-09-2022 a las 03:17:41
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
-- Volcado de datos para la tabla `tipo_bono`
--

INSERT INTO `tipo_bono` (`id`, `nombre`, `detalle`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Consulta', 'Bonos de Consultas Medicas', 1, NULL, NULL),
(2, 'Examen', 'Bono de Examen', 1, NULL, NULL),
(3, 'Cirugía', 'Bonos de Cirugía', 1, NULL, NULL),
(4, 'Parto', 'Bonos Parto Normal', 1, NULL, NULL),
(5, 'Cesarea', 'Bonos de Cesarea', 1, NULL, NULL),
(6, 'Laboratorio', 'Bonos de Laboratorio', 1, NULL, NULL),
(7, 'Radiologia', 'Bonos de Radiologia', 1, NULL, NULL),
(8, 'Fonaudiología', 'Bonos de Fonaudiología', 1, NULL, NULL),
(9, 'Kinesiología', 'Bonos de Kinesiología', 1, NULL, NULL),
(10, 'Nutrición', 'Bonos de Nutrición', 1, NULL, NULL),
(11, 'Procedimiento', 'Bonos de Procedimiento', 1, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
