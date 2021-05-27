-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 01:24 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workflow`
--

-- --------------------------------------------------------

--
-- Table structure for table `documento`
--

CREATE TABLE `documento` (
  `id` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `ci` varchar(200) NOT NULL,
  `certNaci` varchar(200) NOT NULL,
  `certLegalizado` varchar(200) NOT NULL,
  `nroTramite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documento`
--

INSERT INTO `documento` (`id`, `idAlumno`, `ci`, `certNaci`, `certLegalizado`, `nroTramite`) VALUES
(57, 1, 'documentos/1/ci.jpg', 'documentos/1/cn.jpg', 'documentos/1/fl.jpg', 38),
(59, 21, 'documentos/21/ci_1.jpg', 'documentos/21/cn_1.jpg', 'documentos/21/fl_1.jpg', 41);

-- --------------------------------------------------------

--
-- Table structure for table `flujo`
--

CREATE TABLE `flujo` (
  `Flujo` varchar(3) DEFAULT NULL,
  `proceso` varchar(3) DEFAULT NULL,
  `tipoproceso` varchar(3) DEFAULT NULL,
  `roles` varchar(2) DEFAULT NULL,
  `procesosiguiente` varchar(3) DEFAULT NULL,
  `formulario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flujo`
--

INSERT INTO `flujo` (`Flujo`, `proceso`, `tipoproceso`, `roles`, `procesosiguiente`, `formulario`) VALUES
('F1', 'P1', 'P', 'U', 'P2', 'Notas'),
('F1', 'P2', 'P', 'U', 'P3', 'checkDocumentos'),
('F1', 'P3', 'S', 'U', 'P4', 'SubidaDocumentos'),
('F1', 'P4', 'C', 'K', NULL, 'Condicionante'),
('F1', 'P5', 'P', 'K', 'P6', 'Informe'),
('F1', 'P6', 'P', 'K', 'P7', 'AnotarDoc'),
('F1', 'P7', 'P', 'U', 'Fin', 'Notificar'),
('F1', 'P8', 'P', 'U', 'Fin', 'notificarProblema'),
('F2', 'P1', 'P', 'K', 'P2', 'listar');

-- --------------------------------------------------------

--
-- Table structure for table `informe`
--

CREATE TABLE `informe` (
  `id` int(11) NOT NULL,
  `idTramite` int(11) NOT NULL,
  `observacion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informe`
--

INSERT INTO `informe` (`id`, `idTramite`, `observacion`) VALUES
(5, 26, 'todo ok'),
(6, 31, 'Mejorar calidad'),
(7, 33, 'nada'),
(8, 34, 'erare'),
(9, 39, 'Ninguna todo esta bien'),
(10, 100, ''),
(11, 41, 'mejorar calidad'),
(12, 38, ''),
(13, 43, 'fwafwaafaw'),
(14, 44, 'ninguna');

-- --------------------------------------------------------

--
-- Table structure for table `iniciales`
--

CREATE TABLE `iniciales` (
  `tipo` varchar(20) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iniciales`
--

INSERT INTO `iniciales` (`tipo`, `valor`) VALUES
('nrotramite', 45);

-- --------------------------------------------------------

--
-- Table structure for table `procesocondicion`
--

CREATE TABLE `procesocondicion` (
  `codFlujo` varchar(3) NOT NULL,
  `codProceso` varchar(3) NOT NULL,
  `codSi` varchar(3) NOT NULL,
  `codNo` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procesocondicion`
--

INSERT INTO `procesocondicion` (`codFlujo`, `codProceso`, `codSi`, `codNo`) VALUES
('F1', 'P4', 'P5', 'P8');

-- --------------------------------------------------------

--
-- Table structure for table `seguimiento`
--

CREATE TABLE `seguimiento` (
  `nroTramite` int(11) DEFAULT NULL,
  `codFlujo` varchar(3) DEFAULT NULL,
  `codProceso` varchar(3) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `fechaini` datetime DEFAULT NULL,
  `fechafin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seguimiento`
--

INSERT INTO `seguimiento` (`nroTramite`, `codFlujo`, `codProceso`, `usuario`, `fechaini`, `fechafin`) VALUES
(100, 'F1', 'P1', 1, '2018-04-01 00:00:00', '2018-04-02 00:00:00'),
(100, 'F1', 'P2', 1, '2018-04-02 00:00:00', '2021-05-26 15:55:24'),
(210, 'F1', 'P1', 10, '2019-04-01 00:00:00', NULL),
(102, 'F1', 'P1', 10, '2021-04-19 00:00:00', NULL),
(100, 'F1', 'P3', 1, '2021-05-26 15:55:24', '2021-05-26 15:59:10'),
(100, 'F1', 'P4', 20, '2021-05-26 15:59:10', '2021-05-27 11:21:39'),
(38, 'F1', 'P1', 1, '2021-04-19 00:00:00', '2021-05-27 11:11:46'),
(38, 'F1', 'P2', 1, '2021-05-27 11:11:46', '2021-05-27 11:11:56'),
(38, 'F1', 'P3', 1, '2021-05-27 11:11:56', '2021-05-27 11:12:26'),
(38, 'F1', 'P4', 20, '2021-05-27 11:12:26', '2021-05-27 16:26:45'),
(38, 'F1', 'P8', 1, '2021-05-27 11:15:43', '2021-05-27 11:17:02'),
(39, 'F1', 'P1', 1, '2021-04-19 00:00:00', '2021-05-27 11:17:07'),
(39, 'F1', 'P2', 1, '2021-05-27 11:17:07', '2021-05-27 11:17:09'),
(39, 'F1', 'P3', 1, '2021-05-27 11:17:09', '2021-05-27 11:17:18'),
(39, 'F1', 'P4', 20, '2021-05-27 11:17:18', '2021-05-27 11:17:29'),
(39, 'F1', 'P5', 20, '2021-05-27 11:17:29', '2021-05-27 11:17:36'),
(39, 'F1', 'P6', 20, '2021-05-27 11:17:36', '2021-05-27 11:17:53'),
(39, 'F1', 'P7', 1, '2021-05-27 11:17:53', '2021-05-27 11:18:15'),
(41, 'F1', 'P1', 21, '2021-04-19 00:00:00', '2021-05-27 11:19:22'),
(41, 'F1', 'P2', 21, '2021-05-27 11:19:22', '2021-05-27 11:19:26'),
(41, 'F1', 'P3', 21, '2021-05-27 11:19:26', '2021-05-27 11:21:15'),
(41, 'F1', 'P4', 20, '2021-05-27 11:21:15', '2021-05-27 11:22:28'),
(100, 'F1', 'P5', 20, '2021-05-27 11:21:39', '2021-05-27 11:21:41'),
(100, 'F1', 'P6', 20, '2021-05-27 11:21:41', '2021-05-27 11:21:42'),
(100, 'F1', 'P7', 1, '2021-05-27 11:21:42', '2021-05-27 11:40:05'),
(41, 'F1', 'P5', 20, '2021-05-27 11:22:28', '2021-05-27 11:22:35'),
(41, 'F1', 'P6', 20, '2021-05-27 11:22:35', '2021-05-27 11:22:41'),
(41, 'F1', 'P7', 21, '2021-05-27 11:22:41', '2021-05-27 11:25:48'),
(42, 'F1', 'P1', 1, '2021-04-19 00:00:00', '2021-05-27 16:24:48'),
(42, 'F1', 'P2', 1, '2021-05-27 16:22:11', '2021-05-27 16:25:10'),
(42, 'F1', 'P2', 1, '2021-05-27 16:24:48', '2021-05-27 16:25:10'),
(42, 'F1', 'P3', 1, '2021-05-27 16:25:10', '2021-05-27 16:25:30'),
(42, 'F1', 'P4', 20, '2021-05-27 16:25:30', '2021-05-27 17:00:15'),
(38, 'F1', 'P5', 20, '2021-05-27 16:26:45', '2021-05-27 16:26:57'),
(38, 'F1', 'P6', 20, '2021-05-27 16:26:57', '2021-05-27 16:27:01'),
(38, 'F1', 'P7', 1, '2021-05-27 16:27:01', '2021-05-27 19:11:18'),
(43, 'F1', 'P1', 1, '2021-04-19 00:00:00', '2021-05-27 16:35:40'),
(43, 'F1', 'P2', 1, '2021-05-27 16:35:40', '2021-05-27 16:36:16'),
(43, 'F1', 'P3', 1, '2021-05-27 16:36:16', '2021-05-27 16:37:19'),
(43, 'F1', 'P4', 20, '2021-05-27 16:37:19', '2021-05-27 16:38:00'),
(43, 'F1', 'P5', 20, '2021-05-27 16:38:00', '2021-05-27 16:38:03'),
(43, 'F1', 'P6', 20, '2021-05-27 16:38:03', '2021-05-27 16:38:18'),
(43, 'F1', 'P7', 1, '2021-05-27 16:38:18', '2021-05-27 16:38:47'),
(42, 'F1', 'P8', 1, '2021-05-27 17:00:15', '2021-05-27 19:08:32'),
(44, 'F1', 'P1', 1, '2021-04-19 00:00:00', '2021-05-27 19:08:38'),
(44, 'F1', 'P2', 1, '2021-05-27 19:08:38', '2021-05-27 19:08:40'),
(44, 'F1', 'P3', 1, '2021-05-27 19:08:40', '2021-05-27 19:08:52'),
(44, 'F1', 'P4', 20, '2021-05-27 19:08:52', '2021-05-27 19:10:44'),
(44, 'F1', 'P5', 20, '2021-05-27 19:10:44', '2021-05-27 19:10:48'),
(44, 'F1', 'P6', 20, '2021-05-27 19:10:48', '2021-05-27 19:10:55'),
(44, 'F1', 'P7', 1, '2021-05-27 19:10:55', '2021-05-27 19:11:15'),
(45, 'F2', 'P1', 20, '2021-04-19 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `rol` varchar(1) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `rol`, `usuario`, `password`) VALUES
(1, 'U', 'sergio', '123456'),
(20, 'K', 'zulema', '123456'),
(21, 'U', 'juan', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documento`
--
ALTER TABLE `documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `informe`
--
ALTER TABLE `informe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
