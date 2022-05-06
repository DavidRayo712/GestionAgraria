-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2022 a las 20:48:29
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getimpuestos` (IN `consultfrom` DATE, IN `consultto` DATE)   BEGIN
(
    SELECT 
    1 as type,
    abo.id as ID,
    abo.date as date,
    pro.name as proveedor,
    abo.precio as precio,
    iv.value as percent,
    abo.precio * iv.value / 100 as iva
    FROM
    proveedores pro INNER JOIN
    abonos abo on pro.id = abo.proveedor INNER JOIN
    iva iv on abo.iva = iv.id
    WHERE
    abo.date BETWEEN consultfrom and consultto
)
UNION
(
    SELECT 
    2 as type,
    com.id as ID,
    com.date as date,
    pro.name as proveedor,
    com.precio as precio,
    iv.value as percent,
    com.precio * iv.value / 100 as iva
    FROM
    combustibles com  INNER JOIN
    proveedores pro on com.proveedor = pro.id INNER JOIN 
    iva iv on com.iva = iv.id
    WHERE
    com.date BETWEEN consultfrom and consultto
)
UNION
(
    SELECT 
    3 as type,
    elect.id as ID,
    elect.date as date,
    pro.name as proveedor,
    elect.precio as precio,
    iv.value as percent,
    elect.precio * iv.value / 100 as iva
    FROM
    electricidad elect  INNER JOIN
    proveedores pro on elect.proveedor = pro.id INNER JOIN 
    iva iv on elect.iva = iv.id
    WHERE
    elect.date BETWEEN consultfrom and consultto
)
UNION
(
    SELECT 
	 4 as type,
    fit.id as ID,
    fit.date as date,
    pro.name as proveedor,
    fit.precio as precio,
    iv.value as percent,
    fit.precio * iv.value / 100 as iva
    FROM
    proveedores pro INNER JOIN
    fitosanitarios fit on pro.id = fit.proveedor INNER JOIN
    iva iv on fit.iva = iv.id
    WHERE
    fit.date BETWEEN consultfrom and consultto
)
UNION
(
    SELECT 
	5 as type,
    man.id as ID,
    man.date as date,
    pro.name as proveedor,
    man.precio as precio,
    iv.value as percent,
    man.precio * iv.value / 100 as iva
    FROM
    proveedores pro INNER JOIN
    mantenimiento man on pro.id = man.proveedor INNER JOIN
    iva iv on man.iva = iv.id
    WHERE
    man.date BETWEEN consultfrom and consultto
)
ORDER BY date;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonos`
--

CREATE TABLE `abonos` (
  `id` int(11) NOT NULL,
  `proveedor` int(11) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `cantidad` float NOT NULL,
  `precio` double NOT NULL,
  `date` date NOT NULL,
  `iva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `abonos`
--

INSERT INTO `abonos` (`id`, `proveedor`, `producto`, `cantidad`, `precio`, `date`, `iva`) VALUES
(25, 1, '47', 1, 0.02, '2022-05-06', 1),
(28, 2, 'test', 1, 0.01, '2022-05-05', 2),
(29, 2, 'test', 1, 0.01, '2022-05-05', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combustibles`
--

CREATE TABLE `combustibles` (
  `id` int(12) NOT NULL,
  `proveedor` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `precio` double NOT NULL,
  `date` date NOT NULL,
  `iva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `combustibles`
--

INSERT INTO `combustibles` (`id`, `proveedor`, `producto`, `cantidad`, `precio`, `date`, `iva`) VALUES
(5, 2, 1, 1, 0.03, '2022-05-05', 1),
(7, 1, 2, 1, 0.01, '2022-05-05', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador`
--

CREATE TABLE `contador` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `electricidad`
--

CREATE TABLE `electricidad` (
  `id` int(11) NOT NULL,
  `proveedor` int(11) NOT NULL,
  `contador` int(11) NOT NULL,
  `precio` double NOT NULL,
  `date` date NOT NULL,
  `iva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `electricidad`
--

INSERT INTO `electricidad` (`id`, `proveedor`, `contador`, `precio`, `date`, `iva`) VALUES
(1, 1, 1, 10.4, '2022-05-05', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fitosanitarios`
--

CREATE TABLE `fitosanitarios` (
  `id` int(11) NOT NULL,
  `proveedor` int(11) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `cantidad` float NOT NULL,
  `precio` double NOT NULL,
  `date` date NOT NULL,
  `iva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fitosanitarios`
--

INSERT INTO `fitosanitarios` (`id`, `proveedor`, `producto`, `cantidad`, `precio`, `date`, `iva`) VALUES
(12, 3, 'Monsanto', 500, 9801, '2022-04-04', 1),
(13, 4, 'Roundup', 200, 3425, '2022-04-05', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE `iva` (
  `id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `iva`
--

INSERT INTO `iva` (`id`, `value`, `name`) VALUES
(1, 10, 'basico'),
(2, 21, 'otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `proveedor` int(11) NOT NULL,
  `concepto` varchar(200) NOT NULL,
  `precio` double NOT NULL,
  `iva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`id`, `date`, `proveedor`, `concepto`, `precio`, `iva`) VALUES
(1, '2022-05-05', 1, '474747', 10.4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `name`) VALUES
(1, 'producto 1'),
(2, 'producto 2\r\n');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `name`, `lastname`, `type`, `password`) VALUES
(1, 'jmanriquedaboin@gmail.com', 'Jose', 'Manrrique', 1, '123456');

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
-- Indices de la tabla `contador`
--
ALTER TABLE `contador`
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
-- Indices de la tabla `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailunique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abonos`
--
ALTER TABLE `abonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `combustibles`
--
ALTER TABLE `combustibles`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `contador`
--
ALTER TABLE `contador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `electricidad`
--
ALTER TABLE `electricidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fitosanitarios`
--
ALTER TABLE `fitosanitarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `iva`
--
ALTER TABLE `iva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
