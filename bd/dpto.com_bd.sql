CREATE DATABASE  IF NOT EXISTS `dpto_punto_com` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dpto_punto_com`;
-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: dpto_punto_com
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `domicilio`
--

DROP TABLE IF EXISTS `domicilio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `domicilio` (
  `id_dom` int NOT NULL,
  `calle` varchar(60) DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `torre` int DEFAULT NULL,
  `depto` varchar(10) DEFAULT NULL,
  `localidad` int DEFAULT NULL,
  PRIMARY KEY (`id_dom`),
  KEY `fk_localidad_idx` (`localidad`),
  CONSTRAINT `fk_localidad` FOREIGN KEY (`localidad`) REFERENCES `localidad` (`id_localidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `localidad`
--

DROP TABLE IF EXISTS `localidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `localidad` (
  `id_localidad` int NOT NULL,
  `nombre_loc` varchar(30) DEFAULT NULL,
  `provincia` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_localidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `publicacion`
--

DROP TABLE IF EXISTS `publicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `publicacion` (
  `id_publicacion` int NOT NULL,
  `fecha_public` date DEFAULT NULL,
  `activo` tinyint DEFAULT NULL,
  `destacado` tinyint DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  `tipo_propiedad` int DEFAULT NULL,
  `tipo_operacion` int DEFAULT NULL,
  `tipo_vendedor` int DEFAULT NULL,
  `domicilio` int DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  PRIMARY KEY (`id_publicacion`),
  KEY `fk_pub_prop_idx` (`tipo_propiedad`),
  KEY `fk_pub_oper_idx` (`tipo_operacion`),
  KEY `fk_pub_vend_idx` (`tipo_vendedor`),
  KEY `fk_pub_usuario_idx` (`id_usuario`),
  KEY `fk_pub_dom_idx` (`domicilio`),
  CONSTRAINT `fk_pub_dom` FOREIGN KEY (`domicilio`) REFERENCES `domicilio` (`id_dom`),
  CONSTRAINT `fk_pub_oper` FOREIGN KEY (`tipo_operacion`) REFERENCES `tipo_operacion` (`id_tipo_oper`),
  CONSTRAINT `fk_pub_prop` FOREIGN KEY (`tipo_propiedad`) REFERENCES `tipo_propiedad` (`id_tipo_prop`),
  CONSTRAINT `fk_pub_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `fk_pub_vend` FOREIGN KEY (`tipo_vendedor`) REFERENCES `tipo_vendedor` (`id_tipo_vend`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipo_operacion`
--

DROP TABLE IF EXISTS `tipo_operacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_operacion` (
  `id_tipo_oper` int NOT NULL,
  `tipo_op` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_oper`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipo_propiedad`
--

DROP TABLE IF EXISTS `tipo_propiedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_propiedad` (
  `id_tipo_prop` int NOT NULL,
  `tipo_prop` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_prop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipo_vendedor`
--

DROP TABLE IF EXISTS `tipo_vendedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_vendedor` (
  `id_tipo_vend` int NOT NULL,
  `tipo_vend` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_vend`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `num_doc` int DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contraseña` char(50) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-26 22:45:11
