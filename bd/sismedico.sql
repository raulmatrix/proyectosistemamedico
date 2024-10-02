-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.7.0.6850
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para sismedico
CREATE DATABASE IF NOT EXISTS `sismedico` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `sismedico`;

-- Volcando estructura para tabla sismedico.horarios
CREATE TABLE IF NOT EXISTS `horarios` (
  `idHorarios` int(11) NOT NULL AUTO_INCREMENT,
  `horaInicio` varchar(45) DEFAULT NULL,
  `horaFin` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idHorarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla sismedico.horarios: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sismedico.medico
CREATE TABLE IF NOT EXISTS `medico` (
  `idMedico` int(11) NOT NULL AUTO_INCREMENT,
  `nombreMed` varchar(45) DEFAULT NULL,
  `apellidoPat` varchar(45) DEFAULT NULL,
  `apellidoMat` varchar(45) DEFAULT NULL,
  `especialidad` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idMedico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla sismedico.medico: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sismedico.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `idReserva` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Medico_idMedico` int(11) NOT NULL,
  `Horarios_idHorarios` int(11) NOT NULL,
  PRIMARY KEY (`idReserva`,`Medico_idMedico`,`Horarios_idHorarios`),
  KEY `fk_Reserva_Usuario1_idx` (`Usuario_idUsuario`),
  KEY `fk_Reserva_Medico1_idx` (`Medico_idMedico`),
  KEY `fk_Reserva_Horarios1_idx` (`Horarios_idHorarios`),
  CONSTRAINT `fk_Reserva_Horarios1` FOREIGN KEY (`Horarios_idHorarios`) REFERENCES `mydb`.`horarios` (`idHorarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reserva_Medico1` FOREIGN KEY (`Medico_idMedico`) REFERENCES `mydb`.`medico` (`idMedico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reserva_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `mydb`.`usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla sismedico.reserva: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sismedico.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidoPat` varchar(45) DEFAULT NULL,
  `apellidoMat` varchar(45) DEFAULT NULL,
  `rol` varchar(45) DEFAULT NULL,
  `nroAsegurado` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla sismedico.usuario: ~8 rows (aproximadamente)
INSERT INTO `usuario` (`idUsuario`, `usuario`, `password`, `nombre`, `apellidoPat`, `apellidoMat`, `rol`, `nroAsegurado`, `estado`) VALUES
	(1, 'rvera', 'rvera2024', 'Raul', 'Vera', 'Portanda', 'administrador', 'RVP001', 'activo'),
	(2, 'arojas', 'arojas2024', 'Ana', 'Rojas', 'Peredo', 'paciente', 'ARP001', 'activo'),
	(3, 'elaredo', 'elaredo2024', 'Emma', 'Laredo', 'Peredo', 'paciente', 'ELP-001', 'activo'),
	(4, 'arojas', 'arojas2024', 'Andrea', 'Rojas', 'Lema', 'paciente', 'ARL-001', 'activo'),
	(5, 'eperedo', 'eperedo2024', 'Enzo', 'Peredo', 'Gonzales', 'paciente', 'EPG-001', 'activo'),
	(6, 'aruiz', 'aruis2024', 'Amelia', 'Ruiz', 'Carrasco', 'paciente', 'ARC-001', 'activo'),
	(7, 'psalazar', 'psalazar2024', 'Patricia', 'Salazar', 'Gonzales', 'paciente', 'PSG-001', 'activo'),
	(8, 'rpaz', 'rpaz2024', 'Rodrigo', 'Paz', 'Quiroga', 'paciente', 'RPQ001', 'activo');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
