-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-05-2019 a las 16:28:47
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `HomeSwitchHome`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_administrador` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_administrador`, `nombre`, `apellido`, `email`, `contraseña`, `eliminado`) VALUES
(1, 'CARLOS', 'PEREZ', 'PEREZ@GMAIL.COM', '1234', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET latin1 NOT NULL,
  `apellido` varchar(100) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `credito` int(11) NOT NULL,
  `tarjeta` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `vencimiento` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `premium` tinyint(1) NOT NULL DEFAULT '0',
  `contrasena` varchar(200) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `email`, `credito`, `tarjeta`, `vencimiento`, `eliminado`, `premium`, `contrasena`) VALUES
(5, 'JOSE', 'GOMEZ', 'GOMEZ@GMAIL.COM', 0, '', '', 0, 0, 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotsales`
--

CREATE TABLE `hotsales` (
  `idhotsale` int(11) NOT NULL,
  `precio` double NOT NULL,
  `idcliente` int(11) NOT NULL,
  `inactivo` tinyint(1) NOT NULL DEFAULT '0',
  `idpropiedad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades`
--

CREATE TABLE `propiedades` (
  `id_propiedad` int(11) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `foto` varchar(100) NOT NULL,
  `capacidad` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `propiedades`
--

INSERT INTO `propiedades` (`id_propiedad`, `provincia`, `localidad`, `calle`, `numero`, `descripcion`, `nombre`, `eliminado`, `foto`, `capacidad`) VALUES
(1, 'BUENOS AIRES', 'CHASCOMUS', 'LALALA', 131, 'ASDASDAS', '', 0, '', 0),
(2, 'SALTA', 'SALTITA', 'PERGAMINO', 3, 'QWEQWEQW', '', 0, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pujas`
--

CREATE TABLE `pujas` (
  `idpuja` int(11) NOT NULL,
  `importepuja` double NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idsubasta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `idreservas` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `pagado` double NOT NULL,
  `idpropiedad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subasta`
--

CREATE TABLE `subasta` (
  `idsubasta` int(11) NOT NULL,
  `preciobase` decimal(10,0) NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `pujaganadora` int(11) DEFAULT NULL,
  `idpropiedad` int(11) NOT NULL,
  `inactivo` tinyint(1) NOT NULL DEFAULT '0',
  `semana` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subasta`
--

INSERT INTO `subasta` (`idsubasta`, `preciobase`, `fechainicio`, `fechafin`, `pujaganadora`, `idpropiedad`, `inactivo`, `semana`) VALUES
(1, '40000', '2040-00-00', '2019-12-30', NULL, 1, 0, 1),
(2, '40000', '2040-00-00', '2020-01-20', NULL, 1, 0, 4),
(3, '40000', '2040-00-00', '2020-01-20', NULL, 1, 0, 4),
(4, '40000', '2019-12-30', '2019-12-31', NULL, 1, 0, 1),
(5, '10000', '2019-12-02', '2019-12-05', NULL, 1, 0, 49);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `hotsales`
--
ALTER TABLE `hotsales`
  ADD PRIMARY KEY (`idhotsale`),
  ADD KEY `idpropiedad` (`idpropiedad`),
  ADD KEY `idcliente` (`idcliente`);

--
-- Indices de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD PRIMARY KEY (`id_propiedad`);

--
-- Indices de la tabla `pujas`
--
ALTER TABLE `pujas`
  ADD PRIMARY KEY (`idpuja`),
  ADD KEY `idcliente` (`idcliente`),
  ADD KEY `idsubasta` (`idsubasta`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`idreservas`),
  ADD KEY `idcliente` (`idcliente`),
  ADD KEY `idpropiedad` (`idpropiedad`);

--
-- Indices de la tabla `subasta`
--
ALTER TABLE `subasta`
  ADD PRIMARY KEY (`idsubasta`),
  ADD KEY `idpropiedad` (`idpropiedad`),
  ADD KEY `pujaganadora` (`pujaganadora`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `hotsales`
--
ALTER TABLE `hotsales`
  MODIFY `idhotsale` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  MODIFY `id_propiedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pujas`
--
ALTER TABLE `pujas`
  MODIFY `idpuja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `idreservas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subasta`
--
ALTER TABLE `subasta`
  MODIFY `idsubasta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hotsales`
--
ALTER TABLE `hotsales`
  ADD CONSTRAINT `hotsales_ibfk_1` FOREIGN KEY (`idpropiedad`) REFERENCES `propiedades` (`id_propiedad`),
  ADD CONSTRAINT `hotsales_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Filtros para la tabla `pujas`
--
ALTER TABLE `pujas`
  ADD CONSTRAINT `pujas_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `pujas_ibfk_3` FOREIGN KEY (`idsubasta`) REFERENCES `subasta` (`idsubasta`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`idpropiedad`) REFERENCES `propiedades` (`id_propiedad`);

--
-- Filtros para la tabla `subasta`
--
ALTER TABLE `subasta`
  ADD CONSTRAINT `subasta_ibfk_1` FOREIGN KEY (`idpropiedad`) REFERENCES `propiedades` (`id_propiedad`),
  ADD CONSTRAINT `subasta_ibfk_2` FOREIGN KEY (`pujaganadora`) REFERENCES `pujas` (`idpuja`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
