-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2017 at 10:45 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2689058_sgviddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Acabado`
--

CREATE TABLE `H1Acabado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Acabado`
--



-- --------------------------------------------------------

--
-- Table structure for table `AcabadoModelo`
--

CREATE TABLE `H1AcabadoModelo` (
  `idModelo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `idAcabado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `AcabadoModelo`
--


-- --------------------------------------------------------

--
-- Table structure for table `Almacen`
--

CREATE TABLE `H1Almacen` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `domicilio` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Almacen`
--

-- --------------------------------------------------------

--
-- Table structure for table `Asesora`
--

CREATE TABLE `H1Asesora` (
  `idCliente` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `idAgente` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Categoria`
--

CREATE TABLE `H1Categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Categoria`
--


-- --------------------------------------------------------

--
-- Table structure for table `CategoriaModelo`
--

CREATE TABLE `H1CategoriaModelo` (
  `idModelo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `idCat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `CategoriaModelo`
--



-- --------------------------------------------------------

--
-- Table structure for table `Cliente`
--

CREATE TABLE `H1Cliente` (
  `correo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notify` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Cliente`
--

-- --------------------------------------------------------

--
-- Table structure for table `Compra`
--

CREATE TABLE `H1Compra` (
  `id` int(11) NOT NULL,
  `idCliente` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` float DEFAULT NULL,
  `iva` float DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Compra`
--


-- --------------------------------------------------------

--
-- Table structure for table `CompraMueble`
--

CREATE TABLE `H1CompraMueble` (
  `idCompra` int(11) NOT NULL,
  `idOperacion` int(11) NOT NULL,
  `precio` float DEFAULT NULL,
  `descuento` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `CompraMueble`
--


-- --------------------------------------------------------

--
-- Table structure for table `Envio`
--

CREATE TABLE `H1Envio` (
  `idCompra` int(11) NOT NULL,
  `idAlmacen` int(11) NOT NULL,
  `fechaEnt` date DEFAULT NULL,
  `cp` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dir` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantMuebles` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Envio`
--


-- --------------------------------------------------------

--
-- Table structure for table `Estado`
--

CREATE TABLE `H1Estado` (
  `estado` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `GestionAlmacen`
--

CREATE TABLE `H1GestionAlmacen` (
  `idEncargado` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `idAlmacen` int(11) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Lote`
--

CREATE TABLE `H1Lote` (
  `lote` int(11) NOT NULL,
  `idModelo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechaFab` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Lote`
--


-- --------------------------------------------------------

--
-- Table structure for table `Material`
--

CREATE TABLE `H1Material` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Material`


-- --------------------------------------------------------

--
-- Table structure for table `MaterialModelo`
--

CREATE TABLE `H1MaterialModelo` (
  `idModelo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `idMaterial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `MaterialModelo`
--


-- --------------------------------------------------------

--
-- Table structure for table `Modelo`
--

CREATE TABLE `H1Modelo` (
  `modelo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dimenAlto` float DEFAULT NULL,
  `dimenAncho` float DEFAULT NULL,
  `dimenProfun` float DEFAULT NULL,
  `descrip` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `descuento` float DEFAULT NULL,
  `idEstado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Modelo`
--


-- --------------------------------------------------------

--
-- Table structure for table `Rotacion`
--

CREATE TABLE `H1Rotacion` (
  `operacion` int(11) NOT NULL,
  `idLote` int(11) DEFAULT NULL,
  `idAlmacen` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `motivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entrada` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Rotacion`
--

-- --------------------------------------------------------

--
-- Table structure for table `Supervisa`
--

CREATE TABLE `H1Supervisa` (
  `gerente` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `encargado` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `fechaGestion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `UsuarioEmpresa`
--

CREATE TABLE `H1UsuarioEmpresa` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

