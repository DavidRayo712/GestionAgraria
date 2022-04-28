-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2022 a las 20:44:47
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `abono`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonos`
--

CREATE TABLE `abonos` (
  `id` int(11) NOT NULL,
  `proveedor` varchar(50) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `cantidad` float NOT NULL,
  `precio` double NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `abonos`
--

INSERT INTO `abonos` (`id`, `proveedor`, `producto`, `cantidad`, `precio`, `date`) VALUES
(22, '1', 'Nitrofoska', 2500, 2430.75, '2022-04-01'),
(23, '2', 'Nitrofoska', 3000, 3100.15, '2022-04-02'),
(24, '2', 'Abono 15-15-15', 9600, 12500.45, '2022-04-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combustibles`
--

CREATE TABLE `combustibles` (
  `id` int(12) NOT NULL,
  `proveedor` varchar(100) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `cantidad` float NOT NULL,
  `precio` double NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `combustibles`
--

INSERT INTO `combustibles` (`id`, `proveedor`, `producto`, `cantidad`, `precio`, `date`) VALUES
(2, '1', 'Diesel A', 50, 77, '2022-04-06'),
(3, '1', 'Diesel B', 1400, 1860, '2022-04-04'),
(4, '1', 'Diesel A', 120, 248.67, '2022-04-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `electricidad`
--

CREATE TABLE `electricidad` (
  `id` int(11) NOT NULL,
  `proveedor` varchar(100) NOT NULL,
  `lugar` varchar(100) NOT NULL,
  `precio` double NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fitosanitarios`
--

CREATE TABLE `fitosanitarios` (
  `id` int(11) NOT NULL,
  `proveedor` varchar(50) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `cantidad` float NOT NULL,
  `precio` float(12,0) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fitosanitarios`
--

INSERT INTO `fitosanitarios` (`id`, `proveedor`, `producto`, `cantidad`, `precio`, `date`) VALUES
(12, '3', 'Monsanto', 500, 9801, '2022-04-04'),
(13, '4', 'Roundup', 200, 3425, '2022-04-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `name`) VALUES
(1, 'Proveedor 1'),
(2, 'Proveedor 2'),
(3, 'Proveedor 3'),
(4, 'Proveedor 4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abonos`
--
ALTER TABLE `abonos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `combustibles`
--
ALTER TABLE `combustibles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `electricidad`
--
ALTER TABLE `electricidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fitosanitarios`
--
ALTER TABLE `fitosanitarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abonos`
--
ALTER TABLE `abonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `combustibles`
--
ALTER TABLE `combustibles`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `electricidad`
--
ALTER TABLE `electricidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fitosanitarios`
--
ALTER TABLE `fitosanitarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
