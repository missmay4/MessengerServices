-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2019 a las 21:49:26
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `messengerservice`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attachments`
--

CREATE TABLE `attachments` (
  `ID` int(11) NOT NULL,
  `attachmentPath` varchar(20) DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `IDMessage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `attachments`
--

INSERT INTO `attachments` (`ID`, `attachmentPath`, `updateTime`, `IDMessage`) VALUES
(1, 'mydog.jpg', '2019-11-30 21:11:19', 3),
(2, 'mycat.jpg', '2019-11-30 21:11:52', 4),
(3, 'test.txt', '2019-11-30 21:11:21', 8),
(4, 'test.txt', '2019-11-30 21:11:21', 9),
(5, 'test.txt', '2019-11-30 21:11:21', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `ID` int(11) NOT NULL,
  `sender` int(11) DEFAULT NULL,
  `receiver` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `sendingTime` datetime DEFAULT NULL,
  `seen` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`ID`, `sender`, `receiver`, `title`, `body`, `sendingTime`, `seen`) VALUES
(1, 2, 1, 'Hello!', 'Hi Mayte, \nI\'m trying this new message app that the company release today.\n\nI hope it would be useful for all.\n\nSee you!', '2019-11-30 21:11:13', 1),
(2, 1, 2, 'RE : Hello!', 'Hello Gero!\n\nI find this app so much useful, I think I would use it forever!\n\nSee you at the office', '2019-11-30 21:11:23', 1),
(3, 1, 2, 'Trying to attach files', 'Hi!\n\nI saw that we can include files attached to the mails, so I\'m trying to see if is working. I attached a photo of my dog.\n\nI hope you can answer me if you can download the file.\n\nThanks!', '2019-11-30 21:11:19', 1),
(4, 2, 1, 'RE : Trying to attach files', 'Hello Mayte, \n\nI can download the photo of your dog, and I like it! Seems very friendly. \n\nI attached a photo of my cat, I hope you like it!\n\nSee you!', '2019-11-30 21:11:52', 1),
(5, 3, 1, 'Testing multiple messages', 'Hello, \n\nIm trying to send the same message to two different users', '2019-11-30 21:11:53', 0),
(6, 3, 2, 'Testing multiple messages', 'Hello, \n\nIm trying to send the same message to two different users', '2019-11-30 21:11:53', 1),
(7, 1, 1, 'Message to myself', 'Hello there!', '2019-11-30 21:11:27', 0),
(8, 2, 1, 'Attach file to multiple users', 'Sendind a file to multiple users', '2019-11-30 21:11:21', 1),
(9, 2, 2, 'Attach file to multiple users', 'Sendind a file to multiple users', '2019-11-30 21:11:21', 0),
(10, 2, 3, 'Attach file to multiple users', 'Sendind a file to multiple users', '2019-11-30 21:11:21', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastVisit` datetime DEFAULT NULL,
  `userPhoto` text DEFAULT 'def_userphoto.png',
  `email` varchar(30) NOT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `hobbies` varchar(250) DEFAULT NULL,
  `recovery` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `lastVisit`, `userPhoto`, `email`, `age`, `address`, `hobbies`, `recovery`) VALUES
(1, 'Mayte', '$2y$10$lJym5Zbk0M4St9wWcsSdC.vYaPeOHzHGrJg2QFmKv/apNw98Kthfy', '2019-11-30 09:11:52', '1.png', 'mcalmunoz@gmail.com', 28, 'Madrid', 'Listen to music', NULL),
(2, 'Gero', '$2y$10$j.I3aQy7dlA3IvRireGiRuWP.znScWWNrpovY8/M/RplIETumyD4q', '2019-11-30 09:11:53', '2.png', 'geroal.xander@gmail.com', 21, 'Madrid', 'Programming', NULL),
(3, 'Test', '$2y$10$Tj3wPrQxGkq1N.v5iyTNj.xb2TFILuDrG6zwTNTAjY7DNugX0xHqy', '2019-11-30 09:11:46', 'def_userphoto.png', 'test@test.com', NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Messages` (`IDMessage`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_userID` (`sender`),
  ADD KEY `FK_userID2` (`receiver`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `attachments`
--
ALTER TABLE `attachments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `FK_Messages` FOREIGN KEY (`IDMessage`) REFERENCES `messages` (`ID`);

--
-- Filtros para la tabla `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `FK_userID` FOREIGN KEY (`sender`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `FK_userID2` FOREIGN KEY (`receiver`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
