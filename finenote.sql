-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2018 a las 19:54:48
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `finenote`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumn_team`
--

CREATE TABLE `alumn_team` (
  `id` int(11) NOT NULL,
  `alumn_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumn_team`
--

INSERT INTO `alumn_team` (`id`, `alumn_id`, `team_id`) VALUES
(7, 13, 15),
(8, 17, 15),
(9, 23, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assistance`
--

CREATE TABLE `assistance` (
  `id` int(11) NOT NULL,
  `kind_id` int(11) DEFAULT NULL,
  `date_at` date NOT NULL,
  `alumn_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `assistance`
--

INSERT INTO `assistance` (`id`, `kind_id`, `date_at`, `alumn_id`, `team_id`) VALUES
(4, 1, '2018-12-04', 13, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `behavior`
--

CREATE TABLE `behavior` (
  `id` int(11) NOT NULL,
  `kind_id` int(11) DEFAULT NULL,
  `date_at` date NOT NULL,
  `alumn_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `behavior`
--

INSERT INTO `behavior` (`id`, `kind_id`, `date_at`, `alumn_id`, `team_id`) VALUES
(1, 1, '2018-12-04', 17, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `block`
--

CREATE TABLE `block` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `block`
--

INSERT INTO `block` (`id`, `name`, `team_id`) VALUES
(1, '3', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calification`
--

CREATE TABLE `calification` (
  `id` int(11) NOT NULL,
  `val` double DEFAULT NULL,
  `alumn_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calification`
--

INSERT INTO `calification` (`id`, `val`, `alumn_id`, `block_id`) VALUES
(1, 1, 23, 1),
(2, 5, 13, 1),
(3, 0, 17, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cycle`
--

CREATE TABLE `cycle` (
  `id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `is_active` int(3) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cycle`
--

INSERT INTO `cycle` (`id`, `year`, `is_active`, `created_at`) VALUES
(8, 2018, 1, '2018-11-25 12:49:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periods`
--

CREATE TABLE `periods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_at` date NOT NULL,
  `finish_at` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_clycle` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `identification` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `turo_id` int(11) DEFAULT NULL,
  `kind` int(11) NOT NULL DEFAULT '1',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `person`
--

INSERT INTO `person` (`id`, `name`, `lastname`, `email`, `address`, `phone`, `identification`, `image`, `turo_id`, `kind`, `is_active`, `created_at`) VALUES
(1, 'aluno 1', 'apellido', 'email', 'direcion', 'cell', '123', 'imagen', NULL, 1, 1, '2018-11-25 01:01:01'),
(2, 'prueva de guardado 3', 'apellido', 'edernaba1986@ymail.com', 'direcion', '123', '123', NULL, 1, 1, 1, '2018-11-25 22:45:46'),
(6, 'Georgea', 'apellido', '3105325552', 'direcion', '123', '123', NULL, 1, 1, 1, '2018-11-26 21:00:04'),
(7, 'George', 'apellido', '3105325552', 'direcion', '123', '123', NULL, NULL, 2, 1, '2018-11-26 21:01:21'),
(8, 'acudiente1', 'APELLIDO', 'EMAI', 'direcion', '123', '1', NULL, 0, 4, 1, '2018-11-26 21:20:18'),
(11, 'George ', 'apellido', '3105325552', 'direcion', '123', '234', NULL, NULL, 2, 1, '2018-11-27 06:28:25'),
(12, 'grupo nuevo', 'apellido', '3105325552', 'direcion', '123', 'identification', NULL, 8, 4, 1, '2018-12-01 15:10:39'),
(13, 'nuevo sql26', 'apellido', '3105325552', 'direcion', '123', '121', NULL, 8, 3, 1, '2018-12-01 15:44:13'),
(14, 'grupo nuevo', 'apellido', '3105325552', 'direcion', '123', 'identification', NULL, 8, 3, 1, '2018-12-01 15:54:07'),
(15, 'alumno', 'id', '3105325552', 'direcion', '123', '1', NULL, 8, 3, 1, '2018-12-01 16:09:31'),
(16, 'George', 'get', '3105325552', 'direcion', '123', '234', NULL, 12, 3, 1, '2018-12-01 16:21:48'),
(17, 'George qurry', 'get', '3105325552', 'direcion', '123', '234', NULL, 1, 3, 1, '2018-12-01 16:23:04'),
(18, 'George132123133333', 'apellido', '3105325552', 'direcion', '123', '121', NULL, 1, 3, 1, '2018-12-01 16:34:54'),
(19, '1111111', 'apellido', '3105325552', 'direcion', '123', '1', NULL, 1, 3, 1, '2018-12-01 16:36:22'),
(20, 'George por', 'apellido', '3105325552', 'direcion', '123', '234', NULL, 1, 3, 1, '2018-12-01 16:41:18'),
(21, 'George', 'apellido', '3105325552', 'direcion', '123', '1', NULL, 1, 3, 1, '2018-12-01 16:42:33'),
(22, 'George', 'apellido', '3105325552', 'direcion', '123', 'identification', NULL, 1, 3, 1, '2018-12-01 21:51:49'),
(23, 'grupo nuevo', 'apellido', '3105325552', 'direcion', '123', '121', NULL, 1, 3, 1, '2018-12-01 21:52:36'),
(24, 'George', 'apellido', '3105325552', 'direcion', '123', '234', NULL, 1, 3, 1, '2018-12-01 21:57:26'),
(25, 'George', 'apellido', '3105325552', 'direcion', '123', '121', NULL, 1, 3, 1, '2018-12-01 21:57:43'),
(26, 'George', 'apellido', '3105325552', 'direcion', '123', '1', NULL, 1, 3, 1, '2018-12-01 22:16:20'),
(27, 'con tutor', 'apellido', '3105325552', 'direcion', '123', '1', NULL, 12, 3, 1, '2018-12-02 04:45:54'),
(28, 'CON USER', 'apellido', '3105325552', 'direcion', '123', '1', NULL, NULL, 2, 1, '2018-12-02 05:03:59'),
(29, 'CON USER 2', 'apellido', '3105325552', 'direcion', '123', '1', NULL, NULL, 2, 1, '2018-12-02 05:06:21'),
(30, 'George', 'apellido', '3105325552', 'direcion', '123', '1', NULL, NULL, 2, 1, '2018-12-02 05:06:41'),
(31, 'George', 'apellido', '3105325552', 'direcion', '123', '1', NULL, NULL, 2, 1, '2018-12-02 05:08:17'),
(32, 'don', 'ape', 'ema', 'dir', '12', '159', NULL, 12, 3, 1, '2018-12-02 23:45:20'),
(33, 'dony', 'apellido', '3105325552', 'direcion', '123', '9324', NULL, NULL, 2, 1, '2018-12-03 00:30:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `user_id`, `created_at`) VALUES
(3, 'matematicas', 1, '2018-12-02 05:01:45'),
(4, 'INGLES', 1, '2018-12-02 05:01:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_favorite` tinyint(1) NOT NULL,
  `step` tinyint(2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cycle_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `team`
--

INSERT INTO `team` (`id`, `name`, `is_favorite`, `step`, `user_id`, `cycle_id`, `created_at`) VALUES
(14, 'grupo nuevo', 0, 8, 1, 0, '2018-12-02 04:19:00'),
(15, '11 02', 0, 11, 1, 0, '2018-12-03 00:31:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_subjects`
--

CREATE TABLE `team_subjects` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `team_subjects`
--

INSERT INTO `team_subjects` (`id`, `team_id`, `subject_id`, `teacher_id`) VALUES
(6, 15, 3, 33),
(7, 14, 4, 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `id_person` int(11) DEFAULT '0',
  `kind` int(11) DEFAULT '1',
  `user_id` varchar(50) DEFAULT NULL,
  `onpass` int(2) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `image`, `status`, `id_person`, `kind`, `user_id`, `onpass`, `created_at`) VALUES
(1, 'Administrator', 'admin', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, 1, 0, 1, NULL, 1, '2018-11-12 17:45:18'),
(2, 'George', '1', '1036bb1671f0f13dc29eba5e40fa4b7f28f0e7db', NULL, 1, 26, 3, NULL, 0, '2018-12-01 22:16:20'),
(3, 'con tutor', '1', '0cb51520f725516f308e1cc39044785559f78762', NULL, 1, 27, 3, NULL, 0, '2018-12-02 04:45:54'),
(4, 'CON USER', '1', '67a74306b06d0c01624fe0d0249a570f4d093747', NULL, 1, 0, 2, NULL, 0, '2018-12-02 05:03:59'),
(5, 'CON USER 2', '1', '27acdc7ba97f574c427780f00078c69e54e044cb', NULL, 1, 0, 2, NULL, 0, '2018-12-02 05:06:21'),
(6, 'George', '1', '433b69eb3d0fe3dedc8095c7c7150e121ecbad21', NULL, 1, 0, 2, NULL, 0, '2018-12-02 05:06:41'),
(7, 'George', '1', '27acdc7ba97f574c427780f00078c69e54e044cb', NULL, 1, 31, 2, NULL, 0, '2018-12-02 05:08:18'),
(8, 'don', 'don', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, 1, 32, 3, NULL, 1, '2018-12-02 23:45:20'),
(9, 'dony', '9324', 'b0761e2e5aa1306ffb7bac16f5050e27791a482f', NULL, 1, 33, 2, NULL, 1, '2018-12-03 00:30:28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumn_team`
--
ALTER TABLE `alumn_team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumn_id` (`alumn_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indices de la tabla `assistance`
--
ALTER TABLE `assistance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumn_id` (`alumn_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indices de la tabla `behavior`
--
ALTER TABLE `behavior`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumn_id` (`alumn_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indices de la tabla `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indices de la tabla `calification`
--
ALTER TABLE `calification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumn_id` (`alumn_id`),
  ADD KEY `block_id` (`block_id`);

--
-- Indices de la tabla `cycle`
--
ALTER TABLE `cycle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `team_subjects`
--
ALTER TABLE `team_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumn_team`
--
ALTER TABLE `alumn_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `assistance`
--
ALTER TABLE `assistance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `behavior`
--
ALTER TABLE `behavior`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `block`
--
ALTER TABLE `block`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `calification`
--
ALTER TABLE `calification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cycle`
--
ALTER TABLE `cycle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `periods`
--
ALTER TABLE `periods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `team_subjects`
--
ALTER TABLE `team_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumn_team`
--
ALTER TABLE `alumn_team`
  ADD CONSTRAINT `alumn_team_ibfk_1` FOREIGN KEY (`alumn_id`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `alumn_team_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);

--
-- Filtros para la tabla `assistance`
--
ALTER TABLE `assistance`
  ADD CONSTRAINT `assistance_ibfk_1` FOREIGN KEY (`alumn_id`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `assistance_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);

--
-- Filtros para la tabla `behavior`
--
ALTER TABLE `behavior`
  ADD CONSTRAINT `behavior_ibfk_1` FOREIGN KEY (`alumn_id`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `behavior_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);

--
-- Filtros para la tabla `block`
--
ALTER TABLE `block`
  ADD CONSTRAINT `block_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);

--
-- Filtros para la tabla `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
