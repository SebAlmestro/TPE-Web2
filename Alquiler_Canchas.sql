-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2024 a las 22:14:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `complejo_canchita`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canchas`
--

CREATE TABLE `canchas` (
  `id_cancha` int(11) NOT NULL,
  `tipo_cesped` text DEFAULT 'Sintetico',
  `techada` tinyint(1) DEFAULT 0,
  `precio` int(11) DEFAULT 0,
  `imagen` text DEFAULT 'https://media-cdn.tripadvisor.com/media/photo-s/07/8c/06/4d/el-clasico-futbol-5.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `canchas`
--

INSERT INTO `canchas` (`id_cancha`, `tipo_cesped`, `techada`, `precio`, `imagen`) VALUES
(1, 'Sintetico', 1, 22000, 'https://www.hoysejuega.com/uploads/Modules/ImagenesComplejos/1357.jpg'),
(4, 'Sintetico', 0, 22000, 'https://media-cdn.tripadvisor.com/media/photo-s/07/8c/06/4d/el-clasico-futbol-5.jpg'),
(7, 'natural', 0, 32000, 'data:image/jpeg;base64,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');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id_turno` int(11) NOT NULL,
  `id_cancha` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id_turno`, `id_cancha`, `fecha`, `hora`, `estado`) VALUES
(3, 4, '2024-10-18', '12:30:00', 'Reservada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `dni` varchar(200) NOT NULL,
  `contraseña` varchar(1350) NOT NULL,
  `rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `dni`, `contraseña`, `rol`) VALUES
(1, 'webadmin', '1', '$2y$10$4NEgpAzad7fKQd4twyYYnOL4kc2grvyaA/g/JHgZ6T9Qr.CawltJm', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canchas`
--
ALTER TABLE `canchas`
  ADD PRIMARY KEY (`id_cancha`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id_turno`),
  ADD KEY `fk_usuario_cancha` (`id_cancha`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canchas`
--
ALTER TABLE `canchas`
  MODIFY `id_cancha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `fk_usuario_cancha` FOREIGN KEY (`id_cancha`) REFERENCES `canchas` (`id_cancha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
