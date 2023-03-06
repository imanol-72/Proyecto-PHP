-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2023 a las 18:07:56
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

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
  `FECHNACI` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`CODACT`, `DNI`, `NOMBRE`, `FECHNACI`) VALUES
('1', '73519049A', 'BRAD PITT', '1995-02-01'),
('2', '65945210G', 'JHONNY DEPP', '1979-05-14'),
('3', '65164590T', 'BRUCE WILLIS ', '1992-11-26'),
('4', '72791345V', 'LEONARDO DI CAPRIO', '2000-07-29'),
('5', '73481904C', 'SCARLETT JOHANSSON', '1984-02-16'),
('6', '43523049E', 'ALEXANDER GOULD', '1976-05-03');

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
('1', '65945407G', 'CATE SHORTLAND', 5000, '1980-07-07'),
('2', '69420911R', 'GORE VERBINSKI', 4500, '1980-08-24'),
('3', '62086825P', 'ANDREW STANTON', 4000, '1980-06-27'),
('4', '68310365U', 'ANTOINE FUQUA', 7000, '1980-07-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `ID` varchar(2) NOT NULL,
  `TITULO` varchar(50) NOT NULL,
  `FECHESTRENO` date NOT NULL,
  `DURACION` time NOT NULL,
  `GENERO` varchar(50) NOT NULL,
  `RANGOEDAD` varchar(50) NOT NULL,
  `CODDIR` varchar(2) NOT NULL,
  `CODPROD` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`ID`, `TITULO`, `FECHESTRENO`, `DURACION`, `GENERO`, `RANGOEDAD`, `CODDIR`, `CODPROD`) VALUES
('1', 'BLACK WIDOW', '2021-02-08', '02:13:24', 'ACCIÓN', '', '1', '1'),
('2', 'PIRATAS DEL CARIBE', '2003-07-15', '02:40:54', 'BÉLICO', '', '2', '2'),
('3', ' BUSCANDO A NEMO ', '2003-04-10', '01:40:24', 'INFANTIL', '', '3', '3'),
('4', 'LAGRIMAS DEL SOL', '2003-08-14', '02:22:24', 'DRAMA', '', '4', '4');

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
