-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 06, 2019 at 07:04 PM
-- Server version: 8.0.15
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `byso`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `idAgenda` int(11) NOT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  `coach` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `idSocio` int(11) NOT NULL,
  `socio` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `lugar` int(11) DEFAULT NULL,
  `fechaCita` date DEFAULT NULL,
  `horaCita` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`idAgenda`, `coach`, `idSocio`, `socio`, `lugar`, `fechaCita`, `horaCita`) VALUES
(31, 'Trex', 0, 'Ricardo Urbina Urbina', 7, '2019-10-07', '11:11:00'),
(32, 'MNK', 0, 'Ricardo Urbina Urbina', 7, '2019-10-03', '09:00:00'),
(35, 'Trex', 19, 'Alexander Carrera Hernandez', 1, '2019-10-02', '07:00:00'),
(37, 'MNK', 0, 'Ricardo Urbina Urbina', 9, '2019-10-03', '09:00:00'),
(38, 'MNK', 1, 'Ricardo Urbina Urbina', 1, '2019-10-03', '09:00:00'),
(39, 'MNK', 1, 'Ricardo Urbina Urbina', 2, '2019-10-03', '09:00:00'),
(40, 'MNK', 1, 'Ricardo Urbina Urbina', 4, '2019-10-03', '09:00:00'),
(41, 'MNK', 1, 'Ricardo Urbina Urbina', 5, '2019-10-03', '09:00:00'),
(42, 'MNK', 20, 'Monica Garcia Arpero', 6, '2019-10-03', '09:00:00'),
(43, 'MNK', 20, 'Monica Garcia Arpero', 8, '2019-10-03', '09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `coachs`
--

CREATE TABLE `coachs` (
  `id` int(11) NOT NULL,
  `nickName` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `aPaterno` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `aMaterno` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaIngreso` date DEFAULT NULL,
  `activo` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `coachs`
--

INSERT INTO `coachs` (`id`, `nickName`, `nombre`, `aPaterno`, `aMaterno`, `telefono`, `email`, `fechaIngreso`, `activo`) VALUES
(1, 'Rick-O', 'Ricardo', 'Urbina', 'Najera', '6251221438', 'cmstudiomx@gmail.com', '2019-05-08', 'on'),
(2, 'MNK', 'Monica', 'Garcia', 'Arpero', '6251061266', 'keers.mx@gmail.com', '2019-04-09', 'on'),
(5, 'Mell', 'Melany', 'Urbina', 'Najera', '6251061266', 'keers.mx@gmail.com', '2019-06-05', 'on'),
(6, 'Trex', 'Ricardo', 'Trevizo', '', '6251526283', 'trevizo@byso.com', '2019-09-30', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `coach` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `dia` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `hora` time DEFAULT NULL,
  `cupo` int(11) DEFAULT NULL,
  `disponible` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `horarios`
--

INSERT INTO `horarios` (`id`, `coach`, `dia`, `hora`, `cupo`, `disponible`, `created`, `modified`) VALUES
(1, 'Mell', 'Jue', '20:00:00', 5, 5, '2019-09-26 00:00:00', '2019-09-26 21:38:20'),
(2, 'Mell', 'Vie', '08:10:00', 10, 10, '2019-09-27 00:00:00', NULL),
(3, 'Mell', 'Sab', '08:10:00', 10, 10, '2019-09-28 00:00:00', NULL),
(4, 'Mell', 'Jue', '08:00:00', 15, 10, '2019-10-03 00:00:00', '2019-10-02 20:20:28'),
(7, 'MNK', 'Jue', '09:00:00', 20, 11, '2019-10-03 00:00:00', NULL),
(8, 'Trex', 'Mie', '07:00:00', 12, 11, '2019-10-02 00:00:00', NULL),
(9, 'Trex', 'Lun', '11:11:00', 12, 11, '2019-10-07 00:00:00', '2019-10-02 17:50:40'),
(10, 'Rick-O', 'Lun', '06:00:00', 17, 17, '2019-10-06 00:00:00', '2019-10-02 20:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `paquetes`
--

CREATE TABLE `paquetes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `costo` double NOT NULL,
  `clases` int(11) NOT NULL,
  `caducaDias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `paquetes`
--

INSERT INTO `paquetes` (`id`, `nombre`, `costo`, `clases`, `caducaDias`) VALUES
(5, '1 Clase', 100, 1, 30),
(6, '5 Clases', 400, 5, 30),
(7, '8 Clases', 550, 8, 30),
(8, '10 Clases', 700, 10, 30),
(9, '15 Clases', 850, 15, 30),
(10, '25 Clases', 1000, 25, 40);

-- --------------------------------------------------------

--
-- Table structure for table `socios`
--

CREATE TABLE `socios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `aPaterno` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `aMaterno` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaIngreso` date DEFAULT NULL,
  `clases` int(11) DEFAULT '0',
  `caducidad` datetime DEFAULT CURRENT_TIMESTAMP,
  `activo` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `socios`
--

INSERT INTO `socios` (`id`, `nombre`, `aPaterno`, `aMaterno`, `telefono`, `email`, `fechaIngreso`, `clases`, `activo`) VALUES
(1, 'Ricardo', 'Urbina', 'Urbina', '6251221438', 'rickyurbina@gmail.com', '2019-08-27', 4, 'on'),
(18, 'Ricardo', 'Trevizo', '-', '6251526283', 'trevizo@byso.com', '2019-10-01', 0, 'on'),
(19, 'Alexander', 'Carrera', 'Hernandez', '6251195320', 'alexander@gmail.com', '2019-10-01', 1, 'on'),
(20, 'Monica', 'Garcia', 'Arpero', '6251061266', 'monica@hotmail.com', '2019-10-02', 8, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `created`, `modified`, `status`) VALUES
(6, 'Rick Urbina Garcia', 'rickyurbina@gmail.com', '6251221438', '2019-09-12 19:39:20', '2019-09-12 19:50:32', '1'),
(8, 'Melany Urbina', 'mell@gmail.com', '6251065030', '2019-09-12 20:30:17', '2019-09-12 20:30:17', '1');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(12) DEFAULT NULL,
  `password` varchar(12) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `photo` text,
  `rol` int(11) NOT NULL,
  `sistema` varchar(1) DEFAULT NULL,
  `intentos` int(11) DEFAULT NULL,
  `activo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `email`, `photo`, `rol`, `sistema`, `intentos`, `activo`) VALUES
(1, 'rick', '123', 'Ricardo Urbina Najera', 'rickyurbina@gmail.com', '', 0, 'A', 0, 'S');

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `socio` int(11) NOT NULL,
  `paquete` int(11) NOT NULL,
  `costo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`id`, `socio`, `paquete`, `costo`) VALUES
(1, 14, 2, 900),
(2, 14, 2, 900),
(3, 14, 2, 900),
(4, 14, 3, 1000),
(5, 14, 3, 1000),
(6, 2, 2, 900),
(7, 1, 3, 1000),
(8, 2, 2, 900),
(9, 2, 2, 900),
(10, 2, 2, 900),
(11, 2, 2, 900),
(12, 2, 2, 900),
(13, 2, 3, 1000),
(14, 6, 3, 1000),
(15, 14, 2, 900),
(16, 14, 3, 1000),
(17, 14, 2, 900),
(18, 14, 3, 1000),
(19, 14, 2, 900),
(20, 14, 2, 900),
(21, 14, 3, 1000),
(22, 2, 2, 900),
(23, 14, 2, 900),
(24, 20, 8, 700);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`idAgenda`);

--
-- Indexes for table `coachs`
--
ALTER TABLE `coachs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `idAgenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `coachs`
--
ALTER TABLE `coachs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `socios`
--
ALTER TABLE `socios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
