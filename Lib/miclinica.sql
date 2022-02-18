-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2022 a las 23:08:21
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `miclinica`
--

-- --------------------------------------------------------

--
-- Create table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellidos` varchar(90) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Insert `admin`
--

-- Las contraseñas encriptadas son '12345678'


INSERT INTO `admin` (`id`, `correo`, `nombre`, `apellidos`, `password`) VALUES
(1, 'fernando@gmail.com', 'Fernando', 'Ruiz Fleetani', '$2y$04$YwP1ZcC2A4UYaGCSXwuToOkkR3cfQovXC.GEjGOW3qJLfGBPB7/gG');

INSERT INTO `admin` (`id`, `correo`, `nombre`, `apellidos`, `password`) VALUES
(2, 'antonio@gmail.com', 'Antonio', 'Almohano Soto', '$2y$04$YwP1ZcC2A4UYaGCSXwuToOkkR3cfQovXC.GEjGOW3qJLfGBPB7/gG');

-- --------------------------------------------------------

--
-- Create table `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Insert `citas`
--

INSERT INTO `citas` (`id`, `paciente_id`, `doctor_id`, `fecha`, `hora`) VALUES
(3, 4, 1, '2022-01-25', '17:15:00'),
(4, 2, 1, '2022-02-15', '12:15:00'),
(5, 4, 2, '2022-02-17', '12:27:00');

-- --------------------------------------------------------

--
-- Create table `doctores`
--

CREATE TABLE `doctores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(64) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(64) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(9) COLLATE utf8_bin NOT NULL,
  `especialidad` varchar(255) COLLATE utf8_bin NOT NULL,
  `alta` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Insert `doctores`
--

INSERT INTO `doctores` (`id`, `nombre`, `apellidos`, `telefono`, `especialidad`, `alta`) VALUES
(1, 'Juan', 'Guarnizo', '958475123', 'alergología', 1),
(2, 'Raúl', 'Sanchéz', '958642100', 'pediatría', 1),
(3, 'Juan Alberto', 'García', '958471717', 'dermatología', 1),
(4, 'Papi', 'Gavi', '679721458', 'perreología', 1);

-- --------------------------------------------------------

--
-- Create table `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(64) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(64) COLLATE utf8_bin NOT NULL,
  `correo` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `alta` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Insert `pacientes`
-- 

-- Las contraseñas encriptadas son '12345678'

INSERT INTO `pacientes` (`id`, `nombre`, `apellidos`, `correo`, `password`, `alta`) VALUES
(2, 'Paula', 'Huertas Romano', 'paula@gmail.com', '$2y$04$YwP1ZcC2A4UYaGCSXwuToOkkR3cfQovXC.GEjGOW3qJLfGBPB7/gG', 0),
(4, 'Nuria', 'Jiménez Garrido', 'nuria@gmail.com', '$2y$04$YwP1ZcC2A4UYaGCSXwuToOkkR3cfQovXC.GEjGOW3qJLfGBPB7/gG', 1),
(5, 'Maria Isabel', 'Rodriguez', 'xenxo2002@hotmail.com', '$2y$04$YwP1ZcC2A4UYaGCSXwuToOkkR3cfQovXC.GEjGOW3qJLfGBPB7/gG', 1);

--
-- ALTER TABLE
--

--
-- KEYS `admin`
--

ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UQ_Admin_Correo` (`correo`);

--
-- KEYS `citas`
--

ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cita_paciente` (`paciente_id`),
  ADD KEY `fk_cita_doctor` (`doctor_id`);

--
-- KEYS `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id`);

--
-- KEYS `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_correo` (`correo`);


--
-- AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- FILTROS
--

ALTER TABLE `citas`
  ADD CONSTRAINT `fk_cita_doctor` FOREIGN KEY (`doctor_id`) REFERENCES `doctores` (`id`),
  ADD CONSTRAINT `fk_cita_paciente` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
