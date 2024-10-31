-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: management-services-final
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `direccion` text NOT NULL,
  `departamento` int(11) NOT NULL,
  `municipio` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `usuario` int(11) DEFAULT NULL,
  `tipo_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`cliente_id`),
  UNIQUE KEY `telefono` (`telefono`),
  UNIQUE KEY `correo` (`correo`),
  KEY `fk_clientes_tipo_cliente` (`tipo_cliente`),
  KEY `fk_usuarios_cliente` (`usuario`),
  CONSTRAINT `fk_clientes_tipo_cliente` FOREIGN KEY (`tipo_cliente`) REFERENCES `tipo_cliente` (`tipo_cliente_id`),
  CONSTRAINT `fk_usuarios_cliente` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (6,'Juan','Pérez','Calle 123',6,2,301234578,'juan.perez@example.com',NULL,1),(7,'Ana','Gómez','Carrera 456',6,4,302345678,'ana.gomez@example.com',NULL,2),(8,'Carlos','López','Avenida 789',6,5,334567890,'carlos.lopez@example.com',NULL,3),(9,'María','Fernández','Transversal 321',6,7,45678901,'maria.fernandez@example.com',NULL,1),(10,'Sofía','Martínez','Diagonal 654',6,8,305689012,'sofia.martinez@example.com',NULL,2),(21,'Luis','Ramírez','Calle 111',6,2,26123456,'luis.ramirez@example.com',NULL,1),(22,'Isabel','Martínez','Calle 222',6,4,72346567,'isabel.martinez@example.com',NULL,2),(28,'Angel ','Molina','Cantón San Isidro, loma la hermita, Distrito de Santa María Ostuma. Dpto. La Paz',8,1,60289361,'adfa@gmail.com',NULL,1),(31,'Angel ','Molina','Cantón San Isidro, loma la hermita, Distrito de Santa María Ostuma. Dpto. La Paz',2,19,60289360,'adffa@gmail.com',NULL,1),(38,'Angel ','Molina','Cantón San Isidro, loma la hermita, Distrito de Santa María Ostuma. Dpto. La Paz',2,17,602893603,'adffa3aa@gmail.com',NULL,1),(44,'fasd','Panamenio','Cantón San Isidro, loma la hermita, Distrito de Santa María Ostuma. Dpto. La Paz',9,13,602893605,'adfssfa@gmail.com',NULL,1);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuotas`
--

DROP TABLE IF EXISTS `cuotas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuotas` (
  `cuota_id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_cuota` int(11) NOT NULL,
  `monto_cuota` float(8,2) NOT NULL,
  `capital_pagado` float(8,2) NOT NULL,
  `fecha_vencimiento` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `servicio` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `estatus_cuota` enum('cancelada','pendiente','parcialmente_pagada') DEFAULT NULL,
  `interes` float(8,2) DEFAULT NULL,
  `amortizacion` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`cuota_id`),
  UNIQUE KEY `numero_cuota` (`numero_cuota`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuotas`
--

LOCK TABLES `cuotas` WRITE;
/*!40000 ALTER TABLE `cuotas` DISABLE KEYS */;
INSERT INTO `cuotas` VALUES (1,1,50.00,50.00,'2024-10-29 03:15:56',1,6,'cancelada',0.00,50.00),(33,2,53.00,53.00,'2024-10-30 19:37:25',2,7,'cancelada',2.65,50.35),(34,3,53.00,53.00,'2024-10-30 21:23:09',2,7,'cancelada',2.65,50.35),(35,4,53.00,0.00,'2025-01-30 06:00:00',2,7,'pendiente',0.05,0.00);
/*!40000 ALTER TABLE `cuotas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departamentos` (
  `departamento_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_departamento` varchar(200) NOT NULL,
  PRIMARY KEY (`departamento_id`),
  UNIQUE KEY `nombre_departamento` (`nombre_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (1,'Ahuachapán'),(10,'Cabañas'),(5,'Chalatenango'),(7,'Cuscatlán'),(4,'La Libertad'),(8,'La Paz'),(14,'La Unión'),(13,'Morazán'),(12,'San Miguel'),(6,'San Salvador'),(9,'San Vicente'),(3,'Santa Ana'),(2,'Sonsonate'),(11,'Usulután');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalles_servicio`
--

DROP TABLE IF EXISTS `detalles_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalles_servicio` (
  `detalle_servicio_id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` int(11) NOT NULL,
  `servicio` int(11) NOT NULL,
  `estatus` enum('pagado','parcialmente_pagado','pendiente') DEFAULT NULL,
  `numero_cuotas` int(11) DEFAULT NULL,
  `tasa_interes` float(8,2) DEFAULT NULL,
  `plazo` int(11) DEFAULT NULL,
  `monto_total` decimal(8,2) DEFAULT NULL,
  `tipo_pago` int(11) DEFAULT NULL,
  PRIMARY KEY (`detalle_servicio_id`),
  KEY `fk_detalles_servicio_tipopago` (`tipo_pago`),
  CONSTRAINT `fk_detalles_servicio_tipopago` FOREIGN KEY (`tipo_pago`) REFERENCES `tipo_pago` (`tipo_pago_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles_servicio`
--

LOCK TABLES `detalles_servicio` WRITE;
/*!40000 ALTER TABLE `detalles_servicio` DISABLE KEYS */;
INSERT INTO `detalles_servicio` VALUES (1,6,1,'pendiente',2,0.05,2,50.00,1),(4,7,2,'pendiente',5,0.05,3,157.50,2);
/*!40000 ALTER TABLE `detalles_servicio` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER generar_cuotas_trigger
AFTER INSERT ON detalles_servicio
FOR EACH ROW
BEGIN
	SET @precio_servicio = (SELECT precio FROM servicios WHERE servicio_id = NEW.servicio);
	SET @monto_cuota = ((@precio_servicio * @tasa_interes) + @precio_servicio) / New.plazo;
	CALL generar_cuotas (NEW.servicio, NEW.cliente, NEW.tasa_interes, @monto_cuota, NEW.plazo);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `historico_pagos`
--

DROP TABLE IF EXISTS `historico_pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historico_pagos` (
  `historico_pagos_id` int(11) NOT NULL AUTO_INCREMENT,
  `pago_id` int(11) NOT NULL,
  `saldo_anterior` decimal(8,2) NOT NULL,
  `nuevo_saldo` decimal(8,2) NOT NULL,
  PRIMARY KEY (`historico_pagos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historico_pagos`
--

LOCK TABLES `historico_pagos` WRITE;
/*!40000 ALTER TABLE `historico_pagos` DISABLE KEYS */;
INSERT INTO `historico_pagos` VALUES (2,21,0.00,-53.00),(3,22,-53.00,-106.00);
/*!40000 ALTER TABLE `historico_pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipios`
--

DROP TABLE IF EXISTS `municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `municipios` (
  `municipio_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_municipio` varchar(200) NOT NULL,
  PRIMARY KEY (`municipio_id`),
  UNIQUE KEY `nombre_municipio` (`nombre_municipio`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipios`
--

LOCK TABLES `municipios` WRITE;
/*!40000 ALTER TABLE `municipios` DISABLE KEYS */;
INSERT INTO `municipios` VALUES (1,'Aguilares'),(2,'Apopa'),(3,'Ayutuxtepeque'),(4,'Ciudad Delgado'),(5,'Cuscatancingo'),(6,'El Paisnal'),(7,'Guazapa'),(8,'Ilopango'),(9,'Mejicanos'),(10,'Nejapa'),(11,'Panchimalco'),(12,'Rosario de Mora'),(13,'San Marcos'),(14,'San Martín'),(15,'San Salvador'),(16,'Santiago Texacuangos'),(17,'Santo Tomás'),(18,'Soyapango'),(19,'Tonacatepeque');
/*!40000 ALTER TABLE `municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagos` (
  `pago_id` int(11) NOT NULL AUTO_INCREMENT,
  `cuota_id` int(11) NOT NULL,
  `monto_pagado` float(10,2) DEFAULT NULL,
  `fecha_pago` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cliente` int(11) NOT NULL,
  `tipo_pago` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pago_id`),
  UNIQUE KEY `cuota_id` (`cuota_id`),
  KEY `tipo_pago` (`tipo_pago`),
  KEY `cliente` (`cliente`),
  CONSTRAINT `fk_pagos_cuotas` FOREIGN KEY (`cuota_id`) REFERENCES `cuotas` (`cuota_id`),
  CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`tipo_pago`) REFERENCES `tipo_pago` (`tipo_pago_id`),
  CONSTRAINT `pagos_ibfk_3` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` VALUES (1,1,50.00,'2024-10-27 16:04:39',6,1,'Pago realizado'),(21,33,53.00,'2024-10-30 06:00:00',7,2,'Pago realizado'),(22,34,53.00,'2024-10-17 06:00:00',7,2,'Pago realizado');
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER actualizar_cuota_historico 
AFTER INSERT ON pagos
FOR EACH ROW
BEGIN
    SET @servicio_id = (
        SELECT servicio_id 
        FROM servicios
        INNER JOIN cuotas ON servicio_id = servicio
        WHERE cuota_id = NEW.cuota_id
        LIMIT 1 
    );

    CALL pago_cuotas_cambio_estado(NEW.cuota_id, NEW.monto_pagado);
    CALL historico_pagos(NEW.pago_id, NEW.cliente, @servicio_id);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(100) NOT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'ADMIN');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servicios` (
  `servicio_id` int(11) NOT NULL AUTO_INCREMENT,
  `precio` float(8,2) NOT NULL,
  `nombre_servicio` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `estatus_servicio` enum('activo','inactivo','agotado') NOT NULL,
  `tipo_servicio` int(11) NOT NULL,
  PRIMARY KEY (`servicio_id`),
  UNIQUE KEY `nombre_servicio` (`nombre_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` VALUES (1,100.00,'Limpieza General','Servicio de limpieza profunda de casas y oficinas.','activo',1),(2,150.00,'Jardinería','Mantenimiento y diseño de jardines.','activo',2),(3,200.00,'Plomería','Reparación y mantenimiento de tuberías.','agotado',3),(4,250.00,'Electricidad','Instalación y reparación de sistemas eléctricos.','activo',3),(5,80.00,'Pintura','Pintura de interiores y exteriores.','inactivo',4),(6,120.00,'Mudanza','Servicio de mudanza de pertenencias.','activo',5),(7,175.00,'Asesoría Legal','Asesoría en asuntos legales.','activo',6);
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_cliente`
--

DROP TABLE IF EXISTS `tipo_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_cliente` (
  `tipo_cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_cliente` varchar(200) NOT NULL,
  PRIMARY KEY (`tipo_cliente_id`),
  UNIQUE KEY `nombre_tipo_cliente` (`nombre_tipo_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_cliente`
--

LOCK TABLES `tipo_cliente` WRITE;
/*!40000 ALTER TABLE `tipo_cliente` DISABLE KEYS */;
INSERT INTO `tipo_cliente` VALUES (3,'Corporativo'),(5,'Frecuente'),(4,'Nuevo'),(6,'Ocasional'),(1,'Regular'),(2,'VIP');
/*!40000 ALTER TABLE `tipo_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_pago`
--

DROP TABLE IF EXISTS `tipo_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_pago` (
  `tipo_pago_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_pago` varchar(200) NOT NULL,
  PRIMARY KEY (`tipo_pago_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_pago`
--

LOCK TABLES `tipo_pago` WRITE;
/*!40000 ALTER TABLE `tipo_pago` DISABLE KEYS */;
INSERT INTO `tipo_pago` VALUES (1,'Contado'),(2,'Crédito');
/*!40000 ALTER TABLE `tipo_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_servicio`
--

DROP TABLE IF EXISTS `tipo_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_servicio` (
  `tipo_servicio_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_servicio` varchar(100) NOT NULL,
  PRIMARY KEY (`tipo_servicio_id`),
  UNIQUE KEY `nombre_tipo_servicio` (`nombre_tipo_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_servicio`
--

LOCK TABLES `tipo_servicio` WRITE;
/*!40000 ALTER TABLE `tipo_servicio` DISABLE KEYS */;
INSERT INTO `tipo_servicio` VALUES (4,'Decoración'),(5,'Exterior'),(1,'Limpieza'),(3,'Mantenimiento'),(2,'Reparación');
/*!40000 ALTER TABLE `tipo_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(200) NOT NULL,
  `contrasenia` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `rol` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'usuario','$2y$10$cTgV46WbXoqNe5uCwdF0nu56/XcHHHL0Uq8LDrL8Im3VsiuE4ARtO','juan.perez@example.com','Juan Pérez',1,'M');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'management-services-final'
--

--
-- Dumping routines for database 'management-services-final'
--
/*!50003 DROP PROCEDURE IF EXISTS `generar_cuotas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `generar_cuotas`(servicio int, cliente int, tasa_interes float, monto_cuota decimal, plazo integer)
BEGIN
	DECLARE i INT DEFAULT 1;
    DECLARE fecha_vencimiento DATE;
    
    WHILE i<=plazo DO 
		SET fecha_vencimiento = DATE_ADD(CURRENT_DATE(), INTERVAL i MONTH);
        SET @next_value = (SELECT COALESCE(MAX(numero_cuota), 0) + 1 FROM cuotas);
        
        INSERT INTO cuotas (numero_cuota, monto_cuota, capital_pagado, fecha_vencimiento, servicio, cliente, estatus_cuota, interes, amortizacion)
        VALUES (@next_value, monto_cuota, 0.00, fecha_vencimiento, servicio, cliente, 'pendiente', tasa_interes, 0.00);
        
        SET i = i + 1;
	END WHILE;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `historico_pagos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `historico_pagos`(pago_id INT, cliente_id INT, servicio_id INT)
BEGIN
    DECLARE monto_anterior DECIMAL DEFAULT 0;  -- Inicializa en 0
    DECLARE monto_actual DECIMAL DEFAULT 0;
    DECLARE monto_total DECIMAL DEFAULT 0;

    SET monto_total = (SELECT monto_total FROM detalles_servicio WHERE cliente = cliente_id AND servicio = servicio_id);

    SET monto_actual = monto_total - (SELECT COALESCE(SUM(a.monto_pagado), 0) 
                                        FROM pagos AS a
                                        INNER JOIN cuotas AS b ON a.cuota_id = b.cuota_id
                                        INNER JOIN servicios AS c ON b.servicio = c.servicio_id
                                        WHERE a.cliente = cliente_id AND c.servicio_id = servicio_id);

    SET monto_anterior = monto_actual + COALESCE(
        (SELECT monto_pagado 
         FROM pagos AS a
         INNER JOIN cuotas AS b ON a.cuota_id = b.cuota_id
         INNER JOIN servicios AS c ON b.servicio = c.servicio_id
         WHERE a.cliente = cliente_id AND c.servicio_id = servicio_id
         ORDER BY a.fecha_pago DESC
         LIMIT 1),
        0);

    -- Asegúrate de que monto_anterior no sea NULL
    IF monto_anterior IS NULL THEN
        SET monto_anterior = 0;  -- Asigna un valor predeterminado si es NULL
    END IF;

    INSERT INTO historico_pagos (pago_id, saldo_anterior, nuevo_saldo) VALUES (pago_id, monto_anterior, monto_actual);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `pago_cuotas_cambio_estado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pago_cuotas_cambio_estado`(IN IN_cuota_id INT, IN monto_pagado DECIMAL(10, 2))
BEGIN
    DECLARE interes_calculado DECIMAL(10, 2);
    DECLARE amortizacion_calculada DECIMAL(10, 2);
    
    SET interes_calculado = monto_pagado * (SELECT interes FROM cuotas WHERE cuota_id = IN_cuota_id);
    SET amortizacion_calculada = monto_pagado - interes_calculado;

    UPDATE cuotas 
    SET capital_pagado = monto_pagado, 
        estatus_cuota = 'cancelada', 
        interes = interes_calculado,
        amortizacion = amortizacion_calculada
    WHERE cuota_id = IN_cuota_id;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-30 19:01:50
