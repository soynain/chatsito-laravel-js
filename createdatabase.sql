-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: chatlaraveldb
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `amigosconversaciones`
--

DROP TABLE IF EXISTS `amigosconversaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amigosconversaciones` (
  `idConversaciones` varchar(60) NOT NULL,
  `fkIdSolicitud` int NOT NULL,
  PRIMARY KEY (`idConversaciones`),
  KEY `fk_AmigosConversaciones_UsuariosSolicitudesAmistad1_idx` (`fkIdSolicitud`),
  CONSTRAINT `fk_AmigosConversaciones_UsuariosSolicitudesAmistad1` FOREIGN KEY (`fkIdSolicitud`) REFERENCES `usuariossolicitudesamistad` (`idSolicitud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amigosconversaciones`
--

LOCK TABLES `amigosconversaciones` WRITE;
/*!40000 ALTER TABLE `amigosconversaciones` DISABLE KEYS */;
INSERT INTO `amigosconversaciones` VALUES ('bhadv',1),('aacdh',2);
/*!40000 ALTER TABLE `amigosconversaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historialmensajesamigos`
--

DROP TABLE IF EXISTS `historialmensajesamigos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historialmensajesamigos` (
  `idMensaje` int NOT NULL AUTO_INCREMENT,
  `mensaje` text NOT NULL,
  `fechaHoraEnvio` timestamp NOT NULL,
  `fkConversacionSala` varchar(60) NOT NULL,
  `fkIdRemitente` int NOT NULL,
  `fkIdDestinatario` int NOT NULL,
  PRIMARY KEY (`idMensaje`),
  KEY `fk_HistorialMensajesAmigos_AmigosConversaciones1_idx` (`fkConversacionSala`),
  KEY `fk_HistorialMensajesAmigos_Usuarios1_idx` (`fkIdRemitente`),
  KEY `fk_HistorialMensajesAmigos_Usuarios2_idx` (`fkIdDestinatario`),
  CONSTRAINT `fk_HistorialMensajesAmigos_AmigosConversaciones1` FOREIGN KEY (`fkConversacionSala`) REFERENCES `amigosconversaciones` (`idConversaciones`),
  CONSTRAINT `fk_HistorialMensajesAmigos_Usuarios1` FOREIGN KEY (`fkIdRemitente`) REFERENCES `usuarios` (`idUsuario`),
  CONSTRAINT `fk_HistorialMensajesAmigos_Usuarios2` FOREIGN KEY (`fkIdDestinatario`) REFERENCES `usuarios` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historialmensajesamigos`
--

LOCK TABLES `historialmensajesamigos` WRITE;
/*!40000 ALTER TABLE `historialmensajesamigos` DISABLE KEYS */;
INSERT INTO `historialmensajesamigos` VALUES (1,'que onda prro','2022-06-22 16:00:06','bhadv',1,2),(2,'que onda prro','2022-06-22 16:00:06','bhadv',1,2),(3,'hola we que tal que paso','2022-06-22 16:01:06','bhadv',2,1),(4,'holaaaa ps aki we','2022-06-23 03:08:25','bhadv',1,2),(5,'dasdasd','2022-06-23 04:00:46','bhadv',1,2),(6,'weee contestame','2022-06-23 04:12:48','bhadv',1,2),(7,'oraleeee','2022-06-23 04:13:31','bhadv',1,2),(8,'no mames','2022-06-23 04:14:07','bhadv',1,2),(9,'maan','2022-06-23 04:14:19','bhadv',1,2),(10,'asdasdasd','2022-06-23 04:15:37','bhadv',1,2),(11,'asdasdasd','2022-06-23 04:15:41','bhadv',1,2),(12,'asdasdasd','2022-06-23 04:15:52','bhadv',1,2),(13,'ddd','2022-06-23 04:15:56','bhadv',1,2),(14,'remo panzon','2022-06-23 04:53:58','bhadv',1,2),(15,'asdasdasdasd','2022-06-23 04:54:34','bhadv',1,2),(16,'asdasd','2022-06-23 04:55:08','bhadv',1,2),(17,'asdasd','2022-06-23 04:55:33','bhadv',1,2),(18,'asdasda','2022-06-23 04:55:56','bhadv',1,2),(19,'asdasd','2022-06-23 04:56:08','bhadv',1,2),(20,'asdasd','2022-06-23 04:56:20','bhadv',1,2),(21,'asdasd','2022-06-23 04:58:16','bhadv',1,2),(22,'asdasd','2022-06-23 04:58:34','bhadv',1,2),(23,'asdasd','2022-06-23 04:58:48','bhadv',1,2),(24,'Pachi apurate','2022-06-23 05:07:30','bhadv',1,2),(25,'pachiiii','2022-06-23 05:08:00','bhadv',1,2),(26,'pachiiiiiiiiii','2022-06-23 05:08:29','bhadv',1,2),(27,'reeee','2022-06-23 05:09:07','bhadv',1,2),(28,'ddsad','2022-06-23 05:11:10','bhadv',1,2),(29,'que onda we','2022-06-23 05:27:53','bhadv',2,1),(30,'holaaaa','2022-06-23 05:28:00','bhadv',1,2),(31,'raios','2022-06-23 05:28:30','bhadv',1,2),(32,'jajaja que pendejo\n','2022-06-23 05:29:38','bhadv',2,1),(33,'jajaja que pendejo\n','2022-06-23 05:29:44','bhadv',2,1),(34,'que wey','2022-06-23 05:30:44','bhadv',1,2),(35,'nada idiota','2022-06-23 05:32:52','bhadv',2,1),(36,'ah sale jsjs','2022-06-23 05:33:37','bhadv',1,2),(37,'si baboso y que cuentas\n','2022-06-23 05:35:00','bhadv',2,1),(38,'pues nada aqui chambeando we','2022-06-23 05:35:14','bhadv',1,2),(39,'','2022-06-23 05:39:14','bhadv',2,1),(40,'N','2022-06-23 05:39:14','bhadv',2,1),(41,'','2022-06-23 05:39:15','bhadv',2,1),(42,'m','2022-06-23 05:39:15','bhadv',2,1),(43,'mb','2022-06-23 05:39:15','bhadv',2,1),(44,'','2022-06-23 05:39:16','bhadv',2,1),(45,'e','2022-06-23 05:39:16','bhadv',2,1),(46,'que verga contigo we','2022-06-23 05:41:30','bhadv',1,2),(47,'','2022-06-23 05:41:36','bhadv',1,2),(48,'Creo que ya se bugeo el chat jsjs','2022-06-23 05:42:26','bhadv',2,1),(49,'verga que pedo','2022-06-23 05:43:11','bhadv',2,1),(50,'ni idea we','2022-06-23 05:43:26','bhadv',1,2),(51,'sdasdasdasd','2022-06-23 05:44:38','bhadv',2,1),(52,'vvvvv','2022-06-23 05:47:45','bhadv',2,1),(53,'vvvv','2022-06-23 05:48:26','bhadv',1,2),(54,'fgh','2022-06-23 05:49:37','bhadv',2,1),(55,'rfv','2022-06-23 05:49:52','bhadv',1,2),(56,'pene','2022-06-23 06:15:29','bhadv',1,2),(57,'pito','2022-06-23 06:16:50','bhadv',1,2),(58,'ra','2022-06-23 06:24:25','bhadv',1,2),(59,'ddd','2022-06-23 06:27:21','bhadv',1,2),(60,'dddd','2022-06-23 06:27:37','bhadv',1,2),(61,'ramerrooo','2022-06-23 17:15:22','bhadv',1,2),(62,'que pedo weeee','2022-06-23 17:34:58','bhadv',2,1),(63,'pos tu weee ya no hablas','2022-06-23 17:36:39','bhadv',1,2),(64,'pues porque no quiero hablar pendejo','2022-06-24 02:51:33','bhadv',2,1),(65,'f','2022-06-24 03:28:28','bhadv',2,1),(66,'a bueno pero no te me enojes padre','2022-06-25 03:57:57','bhadv',1,2);
/*!40000 ALTER TABLE `historialmensajesamigos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0000_00_00_000000_create_websockets_statistics_entries_table',1),(2,'2019_12_14_000001_create_personal_access_tokens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(45) NOT NULL,
  `apellidoPaterno` varchar(45) NOT NULL,
  `apellidoMaterno` varchar(45) NOT NULL,
  `fechaNac` date NOT NULL,
  `estadoCivil` varchar(45) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'MARIO TEJEDA','DOMINGUEZ','CAPISTRAN','1999-06-16','CASADO'),(2,'CALIGULA','MADERO','RAMIREZ','1988-02-09','DIVORCIADO'),(3,'DORA','JIMENEZ','MADEIRO','1967-12-11','SOLTERO'),(4,'RIOS','CABRERA','MOLINA','1975-02-11','SOLTERO');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarioscredenciales`
--

DROP TABLE IF EXISTS `usuarioscredenciales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarioscredenciales` (
  `id` int NOT NULL,
  `usuario` varchar(26) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_UsuariosCredenciales_Usuarios_idx` (`id`),
  CONSTRAINT `fk_UsuariosCredenciales_Usuarios` FOREIGN KEY (`id`) REFERENCES `usuarios` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarioscredenciales`
--

LOCK TABLES `usuarioscredenciales` WRITE;
/*!40000 ALTER TABLE `usuarioscredenciales` DISABLE KEYS */;
INSERT INTO `usuarioscredenciales` VALUES (1,'elperro11','$2a$12$kBPNAbM2lAK/Zlsbni5b6O9flRm5CeQlHYK0aLDyQ2XC3Oe493Pye'),(2,'rashaj','$2a$12$kBPNAbM2lAK/Zlsbni5b6O9flRm5CeQlHYK0aLDyQ2XC3Oe493Pye'),(3,'doralove50','$2a$12$kBPNAbM2lAK/Zlsbni5b6O9flRm5CeQlHYK0aLDyQ2XC3Oe493Pye'),(4,'riosstar_8','$2a$12$kBPNAbM2lAK/Zlsbni5b6O9flRm5CeQlHYK0aLDyQ2XC3Oe493Pye');
/*!40000 ALTER TABLE `usuarioscredenciales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuariossolicitudesamistad`
--

DROP TABLE IF EXISTS `usuariossolicitudesamistad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuariossolicitudesamistad` (
  `idSolicitud` int NOT NULL AUTO_INCREMENT,
  `estatus` varchar(45) NOT NULL,
  `fkIdUsuario` int NOT NULL,
  `Usuarios_idUsuario` int NOT NULL,
  PRIMARY KEY (`idSolicitud`),
  KEY `fk_UsuariosSolicitudesAmistad_UsuariosCredenciales1_idx` (`fkIdUsuario`),
  KEY `fk_UsuariosSolicitudesAmistad_Usuarios1_idx` (`Usuarios_idUsuario`),
  CONSTRAINT `fk_UsuariosSolicitudesAmistad_Usuarios1` FOREIGN KEY (`Usuarios_idUsuario`) REFERENCES `usuarios` (`idUsuario`),
  CONSTRAINT `fk_UsuariosSolicitudesAmistad_UsuariosCredenciales1` FOREIGN KEY (`fkIdUsuario`) REFERENCES `usuarioscredenciales` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariossolicitudesamistad`
--

LOCK TABLES `usuariossolicitudesamistad` WRITE;
/*!40000 ALTER TABLE `usuariossolicitudesamistad` DISABLE KEYS */;
INSERT INTO `usuariossolicitudesamistad` VALUES (1,'ACEPTADO',1,2),(2,'ACEPTADO',1,3),(3,'ACEPTADO',4,1);
/*!40000 ALTER TABLE `usuariossolicitudesamistad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `websockets_statistics_entries`
--

DROP TABLE IF EXISTS `websockets_statistics_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `websockets_statistics_entries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int NOT NULL,
  `websocket_message_count` int NOT NULL,
  `api_message_count` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `websockets_statistics_entries`
--

LOCK TABLES `websockets_statistics_entries` WRITE;
/*!40000 ALTER TABLE `websockets_statistics_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `websockets_statistics_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'chatlaraveldb'
--

--
-- Dumping routines for database 'chatlaraveldb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-24 23:10:01
