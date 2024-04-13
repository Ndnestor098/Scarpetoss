-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-04-2024 a las 09:48:00
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `scarpetoss`
--
CREATE DATABASE IF NOT EXISTS `scarpetoss` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci;
USE `scarpetoss`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `category_ID` int NOT NULL,
  `category_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`category_ID`, `category_name`) VALUES
(1, 'Deportivas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_ID` int NOT NULL,
  `producto_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `producto_descripcion` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `producto_price` decimal(10,0) NOT NULL,
  `producto_imageP` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `producto_imageR` varchar(400) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `producto_stock` int NOT NULL,
  `producto_proveedor` varchar(50) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `category_ID` int NOT NULL,
  `size_ID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_ID`, `producto_name`, `producto_descripcion`, `producto_price`, `producto_imageP`, `producto_imageR`, `producto_stock`, `producto_proveedor`, `category_ID`, `size_ID`) VALUES
(2, 'Adidas Running Alphabounce Beyond', 'La última versión presenta una amortiguación suave y mullida que se siente instantáneamente cómoda. La marca alemana ha rediseñado la entresuela, eliminando la placa Speedboard e introduciendo el CloudTec Phase.', 19, '/image/imgProduct/adidas-running-alphabounce-beyond-P.webp', '[/image/imgProduct/adidas-running-alphabounce-beyond-A.webp]', 98, 'Best Choise', 1, 1),
(3, 'Converse Chuck Taylor All Star Leather Hi', 'Las Converse Chuck Taylor son conocidas por su comodidad y versatilidad. Ofrecen una amortiguación equilibrada y una parte superior suave que se adapta bien al pie.', 22, '/image/imgProduct/champion_93_eighteen-P.webp', '/image/imgProduct/champion_93_eighteen-A.webp,', 50, 'Converse', 1, 1),
(4, 'New Balance Fuelcore Nergize', 'Las Fuelcore Nergize de New Balance ofrecen una combinación de amortiguación y respuesta. Son ideales para corredores que buscan comodidad en sus entrenamientos diarios', 20, '/image/imgProduct/new_balance_fuelcore_nergize-P.webp', '/image/imgProduct/new_balance_fuelcore_nergize-A.webp,', 32, 'New Balance', 1, 1),
(5, 'Adidas Pharrell Williams Tenis Humano', 'Las Pharrell Williams brindan una amortiguación suave y una excelente absorción de impactos. Son ideales para corredores principiantes o intermedios que buscan una zapatilla cómoda para entrenamientos regulares.', 119, '/image/imgProduct/adidas_originals_pharrell_williams_tennis_human_race-P.webp', '/image/imgProduct/adidas_originals_pharrell_williams_tennis_human_race-A.webp,', 10, 'Adidas', 1, 1),
(6, 'Campeón 93 Dieciocho', 'Las Campeón 93 Dieciocho brindan una amortiguación suave y una excelente absorción de impactos. Son ideales para corredores principiantes o intermedios que buscan una zapatilla cómoda para entrenamientos regulares.', 18, '/image/imgProduct/champion_93_eighteen-P.webp', '/image/imgProduct/champion_93_eighteen-A.webp,', 80, 'Champion', 1, 1),
(7, 'Campeón Rally Pro', 'Las Campeón Rally Pro son conocidas por su durabilidad. La última versión presenta una amortiguación suave y mullida que se siente instantáneamente cómoda.', 25, '/image/imgProduct/champion_rally_pro-P.webp', '/image/imgProduct/champion_rally_pro-A.webp,', 80, 'Champion', 1, 1),
(8, 'Columbia Bahama Vent Relajado Pfg', ' Las cápsulas huecas se encuentran dentro de la espuma Helion, en diferentes ángulos diagonales y horizontales.', 37, '/image/imgProduct/columbia_bahama_vent_relaxed_pfg-P.webp', '/image/imgProduct/columbia_bahama_vent_relaxed_pfg-A.webp', 24, 'Columbia', 1, 1),
(9, 'Zapatos Agoura 52635/BBK Black', 'Son ideales para corredores que buscan comodidad en sus entrenamientos diarios.', 60, '/image/imgProduct/zapatos-skechers-agoura-P.webp', 'zapatos-skechers-agoura-A.webp,', 17, 'Columbia', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `size`
--

CREATE TABLE `size` (
  `size_ID` int NOT NULL,
  `size_4` tinyint(1) NOT NULL,
  `size_5` tinyint(1) NOT NULL,
  `size_6` tinyint(1) NOT NULL,
  `size_7` tinyint(1) NOT NULL,
  `size_8` tinyint(1) NOT NULL,
  `size_9` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `size`
--

INSERT INTO `size` (`size_ID`, `size_4`, `size_5`, `size_6`, `size_7`, `size_8`, `size_9`) VALUES
(1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `users_ID` int NOT NULL,
  `users_name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `users_email` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `users_key` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `users_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`users_ID`, `users_name`, `users_email`, `users_key`, `users_admin`) VALUES
(1, 'Nestor', 'trabajo.nestor.098@gmail.com', 'Cronos098', 1),
(2, 'Nestor Salom', 'nd10salom@gmail.com', 'Cronos098', 0),
(3, 'Ronald Gerdel', 'ronaldgerdel.it@gmail.com', 'Regh0727', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_ID`),
  ADD KEY `category_ID` (`category_ID`),
  ADD KEY `size_ID` (`size_ID`);

--
-- Indices de la tabla `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_ID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `category_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `size`
--
ALTER TABLE `size`
  MODIFY `size_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `users_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`size_ID`) REFERENCES `size` (`size_ID`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`category_ID`) REFERENCES `category` (`category_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
