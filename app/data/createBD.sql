-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2018 a las 19:54:01
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `mastermindslim`
--
CREATE DATABASE IF NOT EXISTS `mastermindslim` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `mastermindslim`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugada`
--

CREATE TABLE `jugada` (
  `id_jugada` int(11) NOT NULL,
  `nombre_partida` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `codigo_jugada` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `resultado_jugada` varchar(6) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida`
--

CREATE TABLE `partida` (
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `codigo` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jugada`
--
ALTER TABLE `jugada`
  ADD PRIMARY KEY (`id_jugada`,`nombre_partida`);

--
-- Indices de la tabla `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`nombre`);
COMMIT;
