-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2023 a las 10:08:36
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdpeliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

CREATE TABLE `actores` (
  `CODACT` varchar(2) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `SALARIO` int(11) NOT NULL,
  `FECHNACI` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`CODACT`, `DNI`, `NOMBRE`, `SALARIO`, `FECHNACI`) VALUES
('1', '73519049A', 'JAVIER', 3000, '1995-02-01'),
('2', '65945210G', 'ANTONIO', 3500, '1979-05-14'),
('3', '65164590T', 'MARÍA', 2400, '1992-11-26'),
('4', '72791345V', 'ANDREA', 2900, '2000-07-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

CREATE TABLE `directores` (
  `CODDIR` varchar(2) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `SALARIO` int(11) NOT NULL,
  `FECHNACI` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`CODDIR`, `DNI`, `NOMBRE`, `SALARIO`, `FECHNACI`) VALUES
('1', '65945407G', 'FRANCISCO', 5000, '1980-07-07'),
('2', '69420911R', 'JUANA', 4500, '1980-08-24'),
('3', '62086825P', 'CECILIA', 4000, '1980-06-27'),
('4', '68310365U', 'IGNACIO', 7000, '1980-07-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `ID` varchar(2) NOT NULL,
  `TITULO` varchar(50) NOT NULL,
  `FECHESTRENO` date NOT NULL,
  `DURACION` time NOT NULL,
  `CODDIR` varchar(2) NOT NULL,
  `CODPROD` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`ID`, `TITULO`, `FECHESTRENO`, `DURACION`, `CODDIR`, `CODPROD`) VALUES
('1', 'CIUDAD DE DIOS', '2002-02-08', '02:10:24', '1', '1'),
('2', ' LA MIRADA DE ULISES ', '1995-07-15', '02:40:54', '2', '2'),
('3', ' BUSCANDO A NEMO ', '2003-04-10', '01:40:24', '3', '3'),
('4', 'SIN PERDON', '1992-02-14', '02:30:24', '4', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas_actores`
--

CREATE TABLE `peliculas_actores` (
  `ID_PELI` varchar(2) NOT NULL,
  `CODACT` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas_actores`
--

INSERT INTO `peliculas_actores` (`ID_PELI`, `CODACT`) VALUES
('1', '1'),
('2', '2'),
('3', '3'),
('4', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoras`
--

CREATE TABLE `productoras` (
  `CODPROD` varchar(2) NOT NULL,
  `PAIS` varchar(50) DEFAULT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `NUMEPMPLEADOS` int(11) NOT NULL,
  `FECHFUNDACION` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productoras`
--

INSERT INTO `productoras` (`CODPROD`, `PAIS`, `NOMBRE`, `NUMEPMPLEADOS`, `FECHFUNDACION`) VALUES
('1', 'ESTADOS UNIDOS', 'WARNER BROS', 10000, '1960-02-14'),
('2', 'SUECIA', 'WALT DISNEY', 5500, '1978-12-21'),
('3', 'ESPAÑA', 'ATRESMEDIA', 9000, '1986-11-23'),
('4', 'CHINA', 'NBC UNIVERSAL', 30000, '1967-09-12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`CODACT`),
  ADD UNIQUE KEY `DNI` (`DNI`,`NOMBRE`);

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY (`CODDIR`),
  ADD UNIQUE KEY `DNI` (`DNI`,`NOMBRE`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `TITULO` (`TITULO`),
  ADD KEY `CODPROD` (`CODPROD`),
  ADD KEY `CODDIR` (`CODDIR`);

--
-- Indices de la tabla `peliculas_actores`
--
ALTER TABLE `peliculas_actores`
  ADD PRIMARY KEY (`ID_PELI`,`CODACT`),
  ADD KEY `ID_PELI` (`ID_PELI`,`CODACT`),
  ADD KEY `CODACT` (`CODACT`);

--
-- Indices de la tabla `productoras`
--
ALTER TABLE `productoras`
  ADD PRIMARY KEY (`CODPROD`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`CODPROD`) REFERENCES `productoras` (`CODPROD`),
  ADD CONSTRAINT `peliculas_ibfk_2` FOREIGN KEY (`CODDIR`) REFERENCES `directores` (`CODDIR`);

--
-- Filtros para la tabla `peliculas_actores`
--
ALTER TABLE `peliculas_actores`
  ADD CONSTRAINT `peliculas_actores_ibfk_1` FOREIGN KEY (`ID_PELI`) REFERENCES `peliculas` (`ID`),
  ADD CONSTRAINT `peliculas_actores_ibfk_2` FOREIGN KEY (`CODACT`) REFERENCES `actores` (`CODACT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
