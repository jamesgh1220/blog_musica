-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-01-2022 a las 12:31:18
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog_master`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Rap Americano'),
(2, 'Rap Español'),
(3, 'Rap Colombiano'),
(4, 'Freestyle');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

DROP TABLE IF EXISTS `entradas`;
CREATE TABLE IF NOT EXISTS `entradas` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(255) NOT NULL,
  `categoria_id` int(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` mediumtext,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entrada_usuario` (`usuario_id`),
  KEY `fk_entradas_categoria` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `usuario_id`, `categoria_id`, `titulo`, `descripcion`, `fecha`) VALUES
(1, 1, 1, 'Ready To Die', 'Review the album of Biggie Smalls', '2020-08-25'),
(2, 1, 2, 'Como el sol', 'Historia de la canción de KASE O.', '2020-08-25'),
(3, 1, 3, 'Rapmaninov', 'Reacción a la canción del Rapiphero', '2020-08-25'),
(4, 2, 1, 'Killuminatis', 'Review the album of 2Pac Shakur', '2020-08-25'),
(5, 2, 2, 'Doble vida', 'Reseña del album de Sho-Hai', '2020-08-25'),
(6, 2, 3, 'Petalos y espinas', 'Canción de Juanchu', '2020-08-25'),
(7, 3, 1, 'Illmatic', 'Review the album of NAS', '2020-08-25'),
(8, 3, 2, 'Siempre Fuertes', 'Historia de vida de Zatu', '2020-08-25'),
(9, 3, 3, 'Arde Roma', 'Canción escrita por Luis 7 Lunes', '2020-08-25'),
(10, 1, 2, 'Ecce Homo', 'El mejor poeta de los tiempos: Dheformer Galinier', '2020-08-25'),
(11, 1, 2, 'No es ningún trofeo noble', 'Canción de VdV', '2020-08-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `fecha`) VALUES
(1, 'John James', 'Gallego Hdez', 'jgallego.h33@gmail.com', 'gallegogh1', '2019-09-23'),
(2, 'Maria Mercedes', 'Hernandez Holguin', 'mmhh@gmail.com', 'mariah1', '2020-08-25'),
(3, 'Victor Julio', 'Gallego Gtz', 'victor@gmail.com', 'victorjuliog1', '2020-08-23'),
(6, 'James ', 'Gallego', 'john_gallego82162@elpoli.edu.co', '$2y$04$kjuwJNuwUEx9sJ2AeXMevucFHWBMFXlfhwfl0ns3qaEWF591S6OMG', '2021-01-06');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `fk_entrada_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_entradas_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
