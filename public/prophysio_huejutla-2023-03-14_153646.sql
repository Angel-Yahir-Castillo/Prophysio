-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: prophysio_huejutla
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blog_xtag`
--

DROP TABLE IF EXISTS `blog_xtag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_xtag` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` bigint(20) unsigned NOT NULL,
  `tag_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_xtag_blog_id_foreign` (`blog_id`),
  KEY `blog_xtag_tag_id_foreign` (`tag_id`),
  CONSTRAINT `blog_xtag_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`),
  CONSTRAINT `blog_xtag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_xtag`
--

LOCK TABLES `blog_xtag` WRITE;
/*!40000 ALTER TABLE `blog_xtag` DISABLE KEYS */;
INSERT INTO `blog_xtag` VALUES (1,1,2,'2023-02-23 14:33:51',NULL),(2,2,1,'2023-02-23 14:34:05',NULL),(3,5,2,'2023-02-23 14:34:24',NULL),(4,5,1,'2023-02-23 14:34:24',NULL);
/*!40000 ALTER TABLE `blog_xtag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `contenido` text NOT NULL,
  `imagen` text NOT NULL,
  `alt` varchar(255) NOT NULL DEFAULT '',
  `estado` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,'¿Es necesario tener una lesion para ir a Prophysio?','<p> La respuesta es: ¡NO! Aquí también te ayudamos a prevenir una lesión para que tu nivel físico sea el mejor. <br>\r\n                            ¡Ven a una valoración!<br>\r\n                            ¡Cuida de tu cuerpo!<br>\r\n                            ¡Agenda tu cita!<br>\r\n                            Tu salud es nuestra prioridad </p>','blog_images/lesion_prophysio.png','Imagen de un señor pensando',1,'2023-02-23 05:24:08',NULL),(2,'¿Que es la bursitis?','<p>Sabias que…!!\r\n                            La bursitis es la inflamación de las almohadillas llenas de líquido (bolsas sinoviales) que funcionan como amortiguadores en las articulaciones, suele ocurrir en las articulaciones que hacen movimientos frecuentes y repetitivos.</p>\r\n                    ','blog_images/bursitis.png','Imagen de una persona con dolor de rodilla',1,'2023-02-23 05:24:51',NULL),(3,'¿Como prevenir el dolor lumbar?','                        <p> !!!!Les compartimos acciones sencillas que ayudan a prevenir el dolor en la zona lumbar. </p>\r\n                            \r\n                                <li type=\"disc\"> Apoya la espalda al sentarte.</li>\r\n                                <li type=\"disc\"> Mantén posturas adecuadas al estar sentado o acostado.</li>\r\n                                <li type=\"disc\"> No cargues objetos pesados.</li>\r\n                                <li type=\"disc\"> Realizar ejercicio físico.</li>\r\n                                <li type=\"disc\"> Realiza pausas activas entre tus actividades.</li>','blog_images/dolor_lumbar.png','Imagen de una persona con dolor de espalda',1,'2023-02-23 05:53:47',NULL),(4,'Factores que generan dolor de rodillas','<p>\r\n                        Hola amigos! El día de hoy les compartimos algunos de los factores que pueden incrementar el riesgo de padecer dolor de rodillas: <br>\r\n                            <ul>\r\n                                <li>- Sobrepeso</li>\r\n                                <li>- Falta de flexibilidad y fuerza muscular</li>\r\n                                <li>- Actividades deportivas de alto impacto</li>\r\n                                <li>- Lesiones previas</li>\r\n                            </ul>\r\n                            No dejes que el dolor pare tu ritmo de vida, acude con nosotros!<br>\r\n                            Tu salud es nuestra prioridad\r\n                        </p>\r\n','blog_images/rodillas.png','Imagen de una persona con dolor de rodillas',0,'2023-02-23 05:53:45',NULL),(5,'Sedentarismo','                        <p>\n                            ¿Qué es el sedentarismo? Y ¿Cómo afecta el sedentarismo en mi salud?<br>\n                            <li>El sedentarismo es las carencia de actividad física fuerte como el deporte, lo que por lo general pone al organismo humano en situación vulnerable ante enfermedades especialmente cardiacas y sociales.</li>\n                            <li>El sedentarismo dificulta el desarrollo óseo normal de la columna vertebral, conlleva a una perdida de la fuerza y de resistencia muscular y hace que la espalda sea más vulnerable al exceso de carga.</li>\n                            ¡DECIDE MOVERTE!<br>\n                        </p>','blog_images/sedentarismo.png','Imagen de una persona sentada en un sofa',1,'2023-02-23 05:53:44',NULL);
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(255) NOT NULL,
  `respuesta` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chats`
--

LOCK TABLES `chats` WRITE;
/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
INSERT INTO `chats` VALUES (1,'¿Como agendo una cita?','Para agendar una cita, primero debes elegir el tipo de terapia y el terapeuta, posteriormente elige el dia y hora que este disponible.','2023-02-20 00:40:28',NULL);
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `terapeuta_id` bigint(20) unsigned NOT NULL,
  `paciente_id` bigint(20) unsigned NOT NULL,
  `tipo_terapia_id` bigint(20) unsigned NOT NULL,
  `estado_cita_id` bigint(20) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `folio` varchar(255) NOT NULL,
  `no_cita` int(11) NOT NULL,
  `observaciones` text NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `citas_folio_unique` (`folio`),
  KEY `citas_terapeuta_id_foreign` (`terapeuta_id`),
  KEY `citas_paciente_id_foreign` (`paciente_id`),
  KEY `citas_tipo_terapia_id_foreign` (`tipo_terapia_id`),
  KEY `citas_estado_cita_id_foreign` (`estado_cita_id`),
  CONSTRAINT `citas_estado_cita_id_foreign` FOREIGN KEY (`estado_cita_id`) REFERENCES `estados_citas` (`id`),
  CONSTRAINT `citas_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`),
  CONSTRAINT `citas_terapeuta_id_foreign` FOREIGN KEY (`terapeuta_id`) REFERENCES `terapeutas` (`id`),
  CONSTRAINT `citas_tipo_terapia_id_foreign` FOREIGN KEY (`tipo_terapia_id`) REFERENCES `tipo_terapia` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coments`
--

DROP TABLE IF EXISTS `coments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `blog_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `contenido` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `coments_blog_id_foreign` (`blog_id`),
  KEY `coments_user_id_foreign` (`user_id`),
  CONSTRAINT `coments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`),
  CONSTRAINT `coments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coments`
--

LOCK TABLES `coments` WRITE;
/*!40000 ALTER TABLE `coments` DISABLE KEYS */;
/*!40000 ALTER TABLE `coments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidades`
--

LOCK TABLES `especialidades` WRITE;
/*!40000 ALTER TABLE `especialidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `especialidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados_citas`
--

DROP TABLE IF EXISTS `estados_citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados_citas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados_citas`
--

LOCK TABLES `estados_citas` WRITE;
/*!40000 ALTER TABLE `estados_citas` DISABLE KEYS */;
/*!40000 ALTER TABLE `estados_citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial_respaldos`
--

DROP TABLE IF EXISTS `historial_respaldos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historial_respaldos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre_respaldo` varchar(255) NOT NULL,
  `tipo_respaldo` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `historial_respaldos_user_id_foreign` (`user_id`),
  CONSTRAINT `historial_respaldos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial_respaldos`
--

LOCK TABLES `historial_respaldos` WRITE;
/*!40000 ALTER TABLE `historial_respaldos` DISABLE KEYS */;
INSERT INTO `historial_respaldos` VALUES (1,'2023-03-13 05:00:10','2023-03-13 05:00:10','prophysio_huejutla-2023-03-12_230009.sql','completo',12),(8,'2023-03-13 22:24:05','2023-03-13 22:24:05','prophysio_huejutla-tags-2023-03-13_162404.sql','tabla',13),(9,'2023-03-14 06:40:53','2023-03-14 06:40:53','prophysio_huejutla-especialidades-2023-03-14_004053.sql','tabla',13),(10,'2023-03-14 21:35:23','2023-03-14 21:35:23','prophysio_huejutla-blogs-2023-03-14_153523.sql','tabla',13),(11,'2023-03-14 21:36:11','2023-03-14 21:36:11','prophysio_huejutla-users-2023-03-14_153611.sql','tabla',13);
/*!40000 ALTER TABLE `historial_respaldos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informacion_empresa`
--

DROP TABLE IF EXISTS `informacion_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `informacion_empresa` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `mision` text NOT NULL,
  `vision` text NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informacion_empresa`
--

LOCK TABLES `informacion_empresa` WRITE;
/*!40000 ALTER TABLE `informacion_empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `informacion_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (13,'2014_10_12_000000_create_users_table',1),(14,'2014_10_12_100000_create_password_resets_table',1),(15,'2019_08_19_000000_create_failed_jobs_table',1),(16,'2019_12_14_000001_create_personal_access_tokens_table',1),(19,'2023_02_20_002110_create_preguntasfrecuentes_table',2),(20,'2023_02_20_003757_create_chats_table',2),(21,'2023_02_20_153713_create_blogs_table',3),(22,'2023_02_20_153907_create_tags_table',3),(23,'2023_02_20_160942_create_blog_xtag_table',4),(24,'2023_02_23_153239_add_contrasena_to_users_table',5),(25,'2023_02_23_154055_cambiar_propiedades_to_blogs_table',6),(26,'2023_02_23_162927_add_alt_to_blogs_table',7),(31,'2023_03_04_210256_create_coments_table',8),(32,'2023_03_11_215446_add_tipousuario_to_users_table',8),(33,'2023_03_11_235739_create_tipo_terapia_table',9),(34,'2023_03_11_235820_create_especialidades_table',9),(35,'2023_03_11_235844_create_terapeutas_table',9),(36,'2023_03_11_235932_create_terapeutas_x_especialidades_table',9),(37,'2023_03_11_235955_create_pacientes_table',9),(38,'2023_03_12_000023_create_servicios_table',9),(39,'2023_03_12_000059_create_estados_citas_table',9),(40,'2023_03_12_000410_create_informacion_empresa_table',9),(41,'2023_03_12_004327_create_citas_table',9),(42,'2023_03_12_224321_create_historial_respaldos_table',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `a_paterno` varchar(255) NOT NULL,
  `a_materno` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `peso` decimal(3,3) NOT NULL,
  `sexo` varchar(6) NOT NULL,
  `foto` text NOT NULL,
  `cp` varchar(5) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `colonia` varchar(255) NOT NULL,
  `calle` varchar(255) NOT NULL,
  `no_casa` varchar(255) NOT NULL,
  `cantidad_visitas` int(11) NOT NULL,
  `alergias_enfermedades` text NOT NULL,
  `situacion_por_la_cual_necesita_terapia` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pacientes_user_id_foreign` (`user_id`),
  CONSTRAINT `pacientes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
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
-- Table structure for table `preguntasfrecuentes`
--

DROP TABLE IF EXISTS `preguntasfrecuentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntasfrecuentes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(255) NOT NULL,
  `respuesta` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntasfrecuentes`
--

LOCK TABLES `preguntasfrecuentes` WRITE;
/*!40000 ALTER TABLE `preguntasfrecuentes` DISABLE KEYS */;
INSERT INTO `preguntasfrecuentes` VALUES (1,'¿Como agendo una cita?','Para agendar una cita, primero debes elegir el tipo de terapia y el terapeuta, posteriormente elige el dia y hora que este disponible.','2023-02-20 17:23:42',NULL),(2,'¿Donde estan ubicados?','Estamos en la Colonia Tahuizan, calle Coahuila #1, 43000 Huejutla de Reyes Hidalgo',NULL,NULL);
/*!40000 ALTER TABLE `preguntasfrecuentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` text NOT NULL,
  `alt` text NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'¿SABIAS QUE?...','2023-02-20 16:27:30',NULL),(2,'CUIDA TU SALUD','2023-02-20 16:27:43',NULL);
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terapeutas`
--

DROP TABLE IF EXISTS `terapeutas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `terapeutas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `a_paterno` varchar(255) NOT NULL,
  `a_materno` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(6) NOT NULL,
  `foto` text NOT NULL,
  `cp` varchar(5) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `colonia` varchar(255) NOT NULL,
  `calle` varchar(255) NOT NULL,
  `no_casa` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `estudio` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `terapeutas_user_id_foreign` (`user_id`),
  CONSTRAINT `terapeutas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terapeutas`
--

LOCK TABLES `terapeutas` WRITE;
/*!40000 ALTER TABLE `terapeutas` DISABLE KEYS */;
/*!40000 ALTER TABLE `terapeutas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terapeutas_x_especialidades`
--

DROP TABLE IF EXISTS `terapeutas_x_especialidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `terapeutas_x_especialidades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `terapeuta_id` bigint(20) unsigned NOT NULL,
  `espacialidad_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `terapeutas_x_especialidades_terapeuta_id_foreign` (`terapeuta_id`),
  KEY `terapeutas_x_especialidades_espacialidad_id_foreign` (`espacialidad_id`),
  CONSTRAINT `terapeutas_x_especialidades_espacialidad_id_foreign` FOREIGN KEY (`espacialidad_id`) REFERENCES `especialidades` (`id`),
  CONSTRAINT `terapeutas_x_especialidades_terapeuta_id_foreign` FOREIGN KEY (`terapeuta_id`) REFERENCES `terapeutas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terapeutas_x_especialidades`
--

LOCK TABLES `terapeutas_x_especialidades` WRITE;
/*!40000 ALTER TABLE `terapeutas_x_especialidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `terapeutas_x_especialidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_terapia`
--

DROP TABLE IF EXISTS `tipo_terapia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_terapia` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `costo` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_terapia`
--

LOCK TABLES `tipo_terapia` WRITE;
/*!40000 ALTER TABLE `tipo_terapia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_terapia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `es_admin` int(11) NOT NULL DEFAULT 0,
  `es_paciente` int(11) NOT NULL DEFAULT 0,
  `es_terapeuta` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (12,'Angel','yahirgamerpvz@gmail.com','7712716053',NULL,'$2y$10$4d4Bur57MTUPmcIzxosRB.e7A4wH7bCADJ3L5v2B/OEaeGuH1GmW.','yahir123W$','4sYp3qKVkUtBh4kdLcQtgvq3N12uk7QjJXRrQD4X9QaIreduX36DHgezsFYL','2023-03-05 03:42:36','2023-03-05 03:42:36',0,0,0,1),(13,'Yahir','20200706@uthh.edu.mx','7712716058',NULL,'$2y$10$hBOuOd9rfWusXo2HJLjnjOBFH2uT1rNLaeuNbbrCwvVBg4ukoTwMG','yahir123Q#',NULL,'2023-03-13 11:06:46','2023-03-13 11:06:46',1,0,0,1),(14,'Guillermo','20200724@uthh.edu.mx','7777777777',NULL,'$2y$10$UM23eqCsxxMDzMBL529tvevd0G6xxD5VX5naS9Roj7SGU7pxrdtGS','Guille123$',NULL,'2023-03-14 13:05:49','2023-03-14 13:05:49',0,0,0,1),(16,'Angelito','angelyahir10castillo@gmail.com','1234567898',NULL,'$2y$10$EKHj5wcOxtk2d7LhRKgGhOGa/BLt1o0z.VvU/GiAod..mfWuHtdM.','yahirQ123$',NULL,'2023-03-14 23:49:39','2023-03-14 23:49:39',0,0,0,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-14 15:36:47
