-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 11-10-2023 a las 14:00:56
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` float(7,2) NOT NULL,
  `imagen` varchar(30) NOT NULL,
  `activa` tinyint(1) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destacados`
--

CREATE TABLE `destacados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` float(7,2) NOT NULL,
  `imagen` varchar(30) NOT NULL,
  `activa` tinyint(1) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` float(7,2) NOT NULL,
  `imagen` varchar(30) NOT NULL,
  `activa` tinyint(1) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(8) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` int(9) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `contraseña` varchar(32) NOT NULL,
  `dni` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `destacados`
--
ALTER TABLE `destacados`
  ADD PRIMARY KEY (`id`);

  --
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `destacados`
--
ALTER TABLE `destacados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- insertar en la tabla `novedades
--
INSERT INTO novedades (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera1", "mola mucho", 10, "../img/imagen1.png", 1, now());
INSERT INTO novedades (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera2", "mola muchisimo", 10, "../img/imagen2.png", 1, now());
INSERT INTO novedades (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera3", "mola aun mas", 10, "../img/imagen3.png", 1, now());
INSERT INTO novedades (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera4", "la mejor", 10, "../img/imagen4.png", 1, now());
INSERT INTO novedades (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera5", "mola mucho", 15, "../img/imagen1.png", 1, now());
INSERT INTO novedades (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera6", "mola muchisimo", 15, "../img/imagen2.png", 1, now());
INSERT INTO novedades (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera7", "mola aun mas", 15, "../img/imagen3.png", 1, now());
INSERT INTO novedades (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera8", "la mejor", 15, "../img/imagen4.png", 1, now());
INSERT INTO novedades (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera9", "mola mucho", 20, "../img/imagen1.png", 1, now());
INSERT INTO novedades (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera10", "mola muchisimo", 20, "../img/imagen2.png", 1, now());
INSERT INTO novedades (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera11", "mola aun mas", 20, "../img/imagen3.png", 1, now());
INSERT INTO novedades (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera12", "la mejor", 20, "../img/imagen4.png", 1, now());

--
-- insertar en la tabla `destacados`
--
INSERT INTO destacados (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera1", "super ventas", 10, "../img/imagen1.png", 1, now());
INSERT INTO destacados (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera2", "no pasa de moda", 10, "../img/imagen2.png", 1, now());
INSERT INTO destacados (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera3", "diseño guapo", 10, "../img/imagen3.png", 1, now());
INSERT INTO destacados (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera4", "buen tejido", 10, "../img/imagen4.png", 1, now());
INSERT INTO destacados (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera5", "super ventas", 15, "../img/imagen1.png", 1, now());
INSERT INTO destacados (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera6", "no pasa de moda", 15, "../img/imagen2.png", 1, now());
INSERT INTO destacados (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera7", "diseño guapo", 15, "../img/imagen3.png", 1, now());
INSERT INTO destacados (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera8", "buen tejido", 15, "../img/imagen4.png", 1, now());
INSERT INTO destacados (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera9", "super ventas", 20, "../img/imagen1.png", 1, now());
INSERT INTO destacados (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera10", "no pasa de moda", 20, "../img/imagen2.png", 1, now());
INSERT INTO destacados (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera11", "diseño guapo", 20, "../img/imagen3.png", 1, now());
INSERT INTO destacados (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera12", "buen tejido", 20, "../img/imagen4.png", 1, now());

--
-- insertar en la tabla `ofertas`
--
INSERT INTO ofertas (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera1", "super precio!", 5, "../img/imagen1.png", 1, now());
INSERT INTO ofertas (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera2", "precio buenísimo!", 5, "../img/imagen2.png", 1, now());
INSERT INTO ofertas (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera3", "calidad-precio", 5, "../img/imagen3.png", 1, now());
INSERT INTO ofertas (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera4", "ofertón!", 5, "../img/imagen4.png", 1, now());
INSERT INTO ofertas (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera5", "super precio!", 10, "../img/imagen1.png", 1, now());
INSERT INTO ofertas (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera6", "precio buenísimo!", 10, "../img/imagen2.png", 1, now());
INSERT INTO ofertas (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera7", "calidad-precio", 10, "../img/imagen3.png", 1, now());
INSERT INTO ofertas (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera8", "ofertón!", 10, "../img/imagen4.png", 1, now());
INSERT INTO ofertas (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera9", "super precio!", 15, "../img/imagen1.png", 1, now());
INSERT INTO ofertas (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera10", "precio buenísimo!", 15, "../img/imagen2.png", 1, now());
INSERT INTO ofertas (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera11", "calidad-precio", 15, "../img/imagen3.png", 1, now());
INSERT INTO ofertas (nombre, descripcion, precio, imagen, activa, fecha) VALUES ("sudadera12", "ofertón!", 15, "../img/imagen4.png", 1, now());