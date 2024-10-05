-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2024 at 08:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdbriseyda`
--

-- --------------------------------------------------------

--
-- Table structure for table `distrito`
--

CREATE TABLE `distrito` (
  `idDistrito` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distrito`
--

INSERT INTO `distrito` (`idDistrito`, `nombre`) VALUES
(1, 'Distrito 1'),
(2, 'Distrito 2'),
(3, 'Distrito 3'),
(4, 'Distrito 4'),
(5, 'Distrito 5'),
(6, 'Distrito 6'),
(7, 'Distrito 7'),
(8, 'Distrito 8'),
(9, 'Distrito 9'),
(10, 'Distrito 10');

-- --------------------------------------------------------

--
-- Table structure for table `impuesto`
--

CREATE TABLE `impuesto` (
  `idImpuesto` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL,
  `idPropiedad` int(11) NOT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `estado` enum('Pagado','Pendiente') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `impuesto`
--

INSERT INTO `impuesto` (`idImpuesto`, `tipo`, `descripcion`, `valor`, `idPropiedad`, `fecha_vencimiento`, `estado`) VALUES
(31, 1, 'Impuesto a la propiedad de zona alta', 1500.00, 101, '2024-12-31', 'Pendiente'),
(32, 2, 'Impuesto a la propiedad de zona media', 800.00, 102, '2024-12-31', 'Pagado'),
(33, 3, 'Impuesto a la propiedad de zona baja', 500.00, 103, '2024-11-30', 'Pendiente'),
(34, 1, 'Impuesto adicional a propiedad alta', 1600.00, 104, '2024-12-01', 'Pendiente'),
(35, 2, 'Impuesto adicional a propiedad media', 850.00, 105, '2024-12-15', 'Pagado'),
(36, 3, 'Impuesto a propiedad rural baja', 450.00, 106, '2024-11-20', 'Pendiente'),
(37, 1, 'Impuesto elevado por cambios urbanos', 1550.00, 107, '2024-10-31', 'Pagado'),
(38, 2, 'Impuesto medio por mejoras zonales', 900.00, 108, '2024-12-25', 'Pendiente'),
(39, 3, 'Impuesto bajo por terrenos adicionales', 475.00, 109, '2024-11-15', 'Pagado'),
(40, 1, 'Impuesto por ampliación de terrenos altos', 1700.00, 110, '2024-12-10', 'Pendiente');

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `ci` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `paterno` varchar(100) DEFAULT NULL,
  `materno` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `distrito_id` int(11) DEFAULT NULL,
  `zona_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`ci`, `nombre`, `paterno`, `materno`, `direccion`, `distrito_id`, `zona_id`) VALUES
(1, 'Juan', 'Perez', 'Lopez', 'Calle 1', NULL, NULL),
(2, 'Maria', 'Gonzalez', 'Ramirez', 'Calle 2', NULL, NULL),
(3, 'Pedro', 'Garcia', 'Hernandez', 'Calle 3', NULL, NULL),
(4, 'Ana', 'Martinez', 'Diaz', 'Calle 4', NULL, NULL),
(5, 'Luis', 'Rodriguez', 'Sanchez', 'Calle 5', NULL, NULL),
(6, 'Carla', 'Fernandez', 'Torres', 'Calle 6', NULL, NULL),
(7, 'Jorge', 'Vargas', 'Castro', 'Calle 7', NULL, NULL),
(8, 'Lucia', 'Mendoza', 'Rojas', 'Calle 8', NULL, NULL),
(9, 'Carlos', 'Guzman', 'Morales', 'Calle 9', NULL, NULL),
(10, 'Sofia', 'Flores', 'Gutierrez', 'Calle 10', NULL, NULL),
(11, '1', '1', '1', '1', 3, 5),
(12, '2', '2', '2', '2', 2, 3),
(13, '2', '2', '2', '2', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `propiedad`
--

CREATE TABLE `propiedad` (
  `idPropiedad` int(11) NOT NULL,
  `codCtastral` int(20) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `ci` int(11) DEFAULT NULL,
  `latitud` double DEFAULT NULL,
  `longitud` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `propiedad`
--

INSERT INTO `propiedad` (`idPropiedad`, `codCtastral`, `direccion`, `ci`, `latitud`, `longitud`) VALUES
(101, 1001, 'Propiedad 1 cambios', 1, NULL, NULL),
(102, 1002, 'Propiedad 2 cambio', 2, NULL, NULL),
(103, 1003, 'Propiedad 3', 3, NULL, NULL),
(104, 1004, 'Propiedad 4', 4, NULL, NULL),
(105, 1005, 'Propiedad 5', 5, NULL, NULL),
(106, 1006, 'Propiedad 6', 6, NULL, NULL),
(107, 1007, 'Propiedad 7', 7, NULL, NULL),
(108, 1008, 'Propiedad 8', 8, NULL, NULL),
(109, 1009, 'Propiedad 9', 9, NULL, NULL),
(110, 1010, 'Propiedad 10', 10, NULL, NULL),
(120, NULL, 'Calle Real 456', 1, NULL, NULL),
(121, NULL, 'Av. Central 789', 2, NULL, NULL),
(122, NULL, 'Calle Tercera 321', 3, NULL, NULL),
(123, NULL, 'Calle Cuarta 456', 1, NULL, NULL),
(124, NULL, 'Av. Secundaria 123', 2, NULL, NULL),
(125, NULL, 'Av. Principal 654', 3, NULL, NULL),
(126, NULL, 'Calle Sexta 987', 4, NULL, NULL),
(127, 4512, 'Calle Septima 321', 5, NULL, NULL),
(130, 2465, 'calle 2', 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'funcionario'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `ci` int(11) NOT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `ci`, `contrasena`, `rol`) VALUES
(1, 1, '1', 1),
(2, 3, '1234', 2);

-- --------------------------------------------------------

--
-- Table structure for table `zona`
--

CREATE TABLE `zona` (
  `idZona` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `idDistrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zona`
--

INSERT INTO `zona` (`idZona`, `nombre`, `idDistrito`) VALUES
(1, 'Centro', 1),
(2, 'San Pedro', 1),
(3, 'Miraflores', 2),
(4, 'Sopocachi', 2),
(5, 'Villa Fátima', 3),
(6, 'Villa El Carmen', 3),
(7, 'Obrajes', 4),
(8, 'Calacoto', 4),
(9, 'Achumani', 5),
(10, 'Cota Cota', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`idDistrito`);

--
-- Indexes for table `impuesto`
--
ALTER TABLE `impuesto`
  ADD PRIMARY KEY (`idImpuesto`),
  ADD KEY `idPropiedad` (`idPropiedad`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ci`),
  ADD KEY `distrito_id` (`distrito_id`),
  ADD KEY `zona_id` (`zona_id`);

--
-- Indexes for table `propiedad`
--
ALTER TABLE `propiedad`
  ADD PRIMARY KEY (`idPropiedad`),
  ADD KEY `ci` (`ci`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci` (`ci`);

--
-- Indexes for table `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`idZona`),
  ADD KEY `idDistrito` (`idDistrito`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distrito`
--
ALTER TABLE `distrito`
  MODIFY `idDistrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `impuesto`
--
ALTER TABLE `impuesto`
  MODIFY `idImpuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
  MODIFY `ci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `propiedad`
--
ALTER TABLE `propiedad`
  MODIFY `idPropiedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zona`
--
ALTER TABLE `zona`
  MODIFY `idZona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `impuesto`
--
ALTER TABLE `impuesto`
  ADD CONSTRAINT `impuesto_ibfk_1` FOREIGN KEY (`idPropiedad`) REFERENCES `propiedad` (`idPropiedad`) ON DELETE CASCADE;

--
-- Constraints for table `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `distrito_id` FOREIGN KEY (`distrito_id`) REFERENCES `distrito` (`idDistrito`),
  ADD CONSTRAINT `zona_id` FOREIGN KEY (`zona_id`) REFERENCES `zona` (`idZona`);

--
-- Constraints for table `propiedad`
--
ALTER TABLE `propiedad`
  ADD CONSTRAINT `propiedad_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`) ON DELETE CASCADE;

--
-- Constraints for table `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `zona_ibfk_1` FOREIGN KEY (`idDistrito`) REFERENCES `distrito` (`idDistrito`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
