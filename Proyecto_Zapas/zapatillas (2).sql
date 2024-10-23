-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2024 a las 00:24:05
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
-- Base de datos: `zapatillas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(20) NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol`) VALUES
(16, 'Camila', 'cacal@gmail.com', '$2y$10$rdIhQU0StAMM9WZoMaGxfOTbe2askhx4tgsuskh9BrsGlvy4uJQkm', 'admin'),
(19, 'C436546576tamila', 'cactal@gmail.com', '$2y$10$pavQdc9rvktw9klXdVV5xelqCJ2LEA.7lmJKFiZCl48ei76ry5Ltu', 'usuario'),
(20, 'camilasoledad', 'beron123@gmail.com', '$2y$10$QrXhsVw..QaH7ctrQP/9eO3ulXkMlzqiAdfqsNKI4WoIpmMYgsSsS', 'usuario'),
(21, 'yani', 'yani@gmail.com', '$2y$10$BfSCvaeydrDsy6Nk/XcCzueub/PK1bAFbnOrI7oFUMlTeaPs7R3Oq', 'admin'),
(22, 'mili', 'mili@gmail', '$2y$10$jP7djyzeVjfAp.ILBELlWurNnWZZqtX1cHdWkmCyT5grp2X8IUmVS', 'usuario'),
(23, '', '', '$2y$10$DOXUce0WwAlfFxdI3mR2WOQp.nXpiMZq99Peu7XEB/5CF66wdBERm', 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zapas_producto`
--

CREATE TABLE `zapas_producto` (
  `Marca` varchar(50) NOT NULL,
  `Talle` int(2) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Precio` int(6) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `ID` int(11) NOT NULL,
  `Foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zapas_producto`
--

INSERT INTO `zapas_producto` (`Marca`, `Talle`, `Descripcion`, `Precio`, `Nombre`, `ID`, `Foto`) VALUES
('DC', 36, 'buenisimas zapatillas chucu dc', 90000, 'Chucu', 5, 'productosImg/zapatillaszapa_blanca.jpg'),
('Adidas', 42, 'superrrr', 100000, 'adidas 90 chuc', 6, 'productosImg/zapatillaszapa_celeste.jpg'),
('chock', 45, 'super chock', 100000, 'chock star', 7, 'productosImg/zapatillaszapa_negra.jpg'),
('DC', 46, 'dc super super', 140000, 'dc shoe original', 8, 'productosImg/zapatillaszapa_rosa.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `zapas_producto`
--
ALTER TABLE `zapas_producto`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `zapas_producto`
--
ALTER TABLE `zapas_producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
