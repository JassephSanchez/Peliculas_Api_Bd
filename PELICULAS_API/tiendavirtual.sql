-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2024 a las 02:12:55
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
-- Base de datos: `tiendavirtual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(255) NOT NULL,
  `title` varchar(600) NOT NULL,
  `price` varchar(600) NOT NULL,
  `thumbnail` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `title`, `price`, `thumbnail`) VALUES
(401, '47 Ronin La Leyenda Del Samurai Keanu Reeves Pelicula Bluray', '99', 'http://http2.mlstatic.com/D_691793-MLU70398283414_072023-I.jpg'),
(402, 'Hellboy 2 El Ejercito Dorado Guillermo Del Toro Blu-ray', '99', 'http://http2.mlstatic.com/D_721238-MLU70366556711_072023-I.jpg'),
(404, 'Atrapado Sin Salida Jack Nicholson Pelicula En Blu-ray', '150.12', 'http://http2.mlstatic.com/D_984263-MLU73783505386_012024-I.jpg'),
(405, 'Cazafantasmas Pelicula Version Extendida 3d + Blu-ray + Dvd', '139.32', 'http://http2.mlstatic.com/D_693501-MLU70370602045_072023-I.jpg'),
(406, 'Mision Imposible Tom Cruise Pelicula Blu-ray', '179', 'http://http2.mlstatic.com/D_883911-MLU71187709602_082023-I.jpg'),
(407, 'Star Wars Episodio Ii: El Ataque De Los Clones Dvd Película', '149', 'http://http2.mlstatic.com/D_600169-MLU70720245191_072023-I.jpg'),
(408, 'Rampage Devastacion Dwayne Johnson The Rock Pelicula Blu-ray', '109', 'http://http2.mlstatic.com/D_998536-MLU70423979059_072023-I.jpg'),
(410, 'Wolverine Inmortal 3d Pelicula Combo Bluray 3d + Bluray', '139.32', 'http://http2.mlstatic.com/D_855375-MLU70336291945_072023-I.jpg'),
(411, 'La Caída Del Halcón Negro Blu Ray Película Nuevo', '109', 'http://http2.mlstatic.com/D_695322-MLU70366556561_072023-I.jpg'),
(412, 'Baby El Aprendiz Del Crimen Blu Ray Soundtrack Pelicula ', '199', 'http://http2.mlstatic.com/D_607243-MLU70396042426_072023-I.jpg'),
(413, 'Sicario Tierra De Nadie Blu Ray Película Nuevo', '132.05', 'http://http2.mlstatic.com/D_605901-MLU71187470990_082023-I.jpg'),
(414, 'Duro De Matar 4.0 Bruce Willis Pelicula Bluray', '149', 'http://http2.mlstatic.com/D_763200-MLU70312574390_072023-I.jpg'),
(415, 'Piratas Del Caribe La Venganza De Salazar Blu-ray 3d', '149', 'http://http2.mlstatic.com/D_777806-MLU71227541194_082023-I.jpg'),
(416, 'Joker Guason Dc Comics Joaquin Phoenix Pelicula Bluray + Dvd', '260.1', 'http://http2.mlstatic.com/D_635300-MLU70366556321_072023-I.jpg'),
(417, 'Figura De Acción  Bowser The Movie De Jakks Pacific', '675', 'http://http2.mlstatic.com/D_689186-MLU72648835897_112023-I.jpg'),
(418, 'Blade Cazador De Vampiros 1 Y 2 Duo Peliculas Bluray', '149', 'http://http2.mlstatic.com/D_879623-MLU70353034616_072023-I.jpg'),
(419, 'El Juez Blu Ray Sylvester Stallone Película Nuevo', '152', 'http://http2.mlstatic.com/D_616294-MLU70377828855_072023-I.jpg'),
(420, 'Armados Y Peligrosos 2 Guns Mark Wahlberg Pelicula Blu-ray', '99', 'http://http2.mlstatic.com/D_978188-MLU70339176981_072023-I.jpg'),
(421, 'Sangre Sudor Y Gloria | Blu Ray Ed Harris Película Nuevo', '169', 'http://http2.mlstatic.com/D_913795-MLU70532277615_072023-I.jpg'),
(422, 'Los Siete Magníficos Dvd Steve Mcqueen Película Nuevo', '107', 'http://http2.mlstatic.com/D_913873-MLU70398283302_072023-I.jpg'),
(423, 'Django Sin Cadenas Jamie Foxx Pelicula Bluray', '209', 'http://http2.mlstatic.com/D_658584-MLU70398282946_072023-I.jpg'),
(424, 'Man Of Steel Hombre De Acero Pelicula Bluray + Dvd +dc Book', '179', 'http://http2.mlstatic.com/D_611066-MLU73438916622_122023-I.jpg'),
(426, 'Terremoto La Falla De San Andres Roca Pelicula 3d + Blu-ray', '170.1', 'http://http2.mlstatic.com/D_890271-MLU70618293974_072023-I.jpg'),
(427, 'Star Trek Sin Límites Blu Ray Película Nuevo', '149', 'http://http2.mlstatic.com/D_695078-MLU70377746995_072023-I.jpg'),
(428, 'Titanes Del Pacifico Insurreccion Pacific Rim Blu-ray + Dvd', '149', 'http://http2.mlstatic.com/D_797422-MLU70358033255_072023-I.jpg'),
(429, 'Desconocido Blu Ray + Dvd | Liam Neeson Película Nuevo', '179', 'http://http2.mlstatic.com/D_904818-MLU70354769866_072023-I.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=430;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
