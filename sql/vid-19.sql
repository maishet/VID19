-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2021 a las 23:10:34
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vid-19`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `paciente` varchar(200) DEFAULT NULL,
  `number` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sintomas` varchar(500) NOT NULL,
  `saturacion` varchar(10) NOT NULL,
  `doctor` varchar(500) DEFAULT NULL,
  `fecha` text DEFAULT NULL,
  `hora` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `paciente`, `number`, `email`, `sintomas`, `saturacion`, `doctor`, `fecha`, `hora`) VALUES
(9, 'maria guevara', '7767676', 'GreenMachiine2020@gmail.com', 'https://meet.google.com/agg-fuuq-grg', '95', 'Doctor(a) rosa margarita', '07-27-2021', '6 : 25 PM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `meet` varchar(500) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`id`, `title`, `meet`, `url`, `type`) VALUES
(8, 'maria guevara', 'receta medica para los malestares', 'files/recetapdf.pdf', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('paciente','doctor','admin') NOT NULL,
  `photo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `photo`) VALUES
(1, 'moises ventura', 'cristhofer.ventura@unmsm.edu.pe', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', 'https://cdn.icon-icons.com/icons2/1999/PNG/512/avatar_man_people_person_profile_user_icon_123385.png'),
(11, 'maria guevara', 'GreenMachiine2020@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'paciente', 'https://cdn.icon-icons.com/icons2/1999/PNG/512/avatar_people_person_profile_user_woman_icon_123359.png'),
(13, 'angel fernandez', 'fcmacx0806@gmelk.com', '827ccb0eea8a706c4c34a16891f84e7b', 'paciente', 'https://cdn.icon-icons.com/icons2/1999/PNG/512/avatar_man_people_person_profile_user_icon_123385.png'),
(14, 'Dani uwu', 'mamuteo322@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'paciente', 'https://cdn.icon-icons.com/icons2/1999/PNG/512/avatar_people_person_profile_user_woman_icon_123359.png'),
(15, 'maicol gonzales', 'www@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'paciente', 'https://cdn.icon-icons.com/icons2/1999/PNG/512/avatar_man_people_person_profile_user_icon_123385.png'),
(17, 'ana maria', 'anaavellana@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'paciente', 'https://cdn.icon-icons.com/icons2/1999/PNG/512/avatar_people_person_profile_user_woman_icon_123359.png'),
(18, 'pepe marcelo', 'maishet.ventura@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'doctor', 'https://cdn.icon-icons.com/icons2/1999/PNG/512/avatar_man_people_person_profile_user_icon_123385.png'),
(19, 'juana larco', 'juanalarco@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'doctor', 'https://cdn.icon-icons.com/icons2/1999/PNG/512/avatar_people_person_profile_user_woman_icon_123359.png'),
(22, 'rosa margarita', 'rosa@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'doctor', 'https://cdn.icon-icons.com/icons2/1999/PNG/512/avatar_people_person_profile_user_woman_icon_123359.png'),
(23, 'juan carrasco', 'juanca@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'doctor', 'https://cdn.icon-icons.com/icons2/1999/PNG/512/avatar_man_people_person_profile_user_icon_123385.png'),
(24, 'abigail arce', 'abi23@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'paciente', 'https://cdn.icon-icons.com/icons2/1999/PNG/512/avatar_people_person_profile_user_woman_icon_123359.png'),
(25, 'paolo coronado', 'paolo@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'paciente', 'https://cdn.icon-icons.com/icons2/1999/PNG/512/avatar_man_people_person_profile_user_icon_123385.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
