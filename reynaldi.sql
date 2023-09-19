-- MySQL dump 10.13  Distrib 8.0.34, for Linux (x86_64)
--
-- Host: localhost    Database: eko_reynaldi
-- ------------------------------------------------------
-- Server version	8.0.34-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `jenis`
--

DROP TABLE IF EXISTS `jenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis`
--

LOCK TABLES `jenis` WRITE;
/*!40000 ALTER TABLE `jenis` DISABLE KEYS */;
INSERT INTO `jenis` VALUES (1,'Surat Keputusan','2023-09-18 05:03:11','2023-09-18 05:03:11'),(3,'Surat Kuasa','2023-09-18 05:03:11','2023-09-18 05:03:11'),(4,'Surat Pengantar','2023-09-18 05:03:11','2023-09-18 05:03:11'),(5,'Surat Perintah','2023-09-18 05:03:11','2023-09-18 05:03:11'),(6,'Surat Undangan','2023-09-18 05:03:11','2023-09-18 05:03:11'),(7,'Surat Edaran','2023-09-18 05:03:11','2023-09-18 05:03:11'),(8,'Surat Perjalanan Dinas','2023-09-18 05:06:24','2023-09-18 05:07:25');
/*!40000 ALTER TABLE `jenis` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2019_12_14_000001_create_personal_access_tokens_table',1),(3,'2023_07_10_065644_create_permission_tables',1),(4,'2023_08_07_114554_create_jenis_table',1),(5,'2023_08_07_114608_create_surat_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
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
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web','2023-09-18 05:03:11','2023-09-18 05:03:11'),(2,'pimpinan','web','2023-09-18 05:03:11','2023-09-18 05:03:11');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surat`
--

DROP TABLE IF EXISTS `surat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `surat` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jenis_id` bigint unsigned NOT NULL,
  `tipe` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_surat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_surat` date NOT NULL,
  `hal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dari_ke` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `surat_jenis_id_foreign` (`jenis_id`),
  CONSTRAINT `surat_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat`
--

LOCK TABLES `surat` WRITE;
/*!40000 ALTER TABLE `surat` DISABLE KEYS */;
INSERT INTO `surat` VALUES (1,8,'Surat Keluar','564','2023-09-06','Perjalanan dinas ke suatu tempat','Sana','storage/gambar_surat/1695013787.jpeg','2023-09-18 05:09:47','2023-09-18 05:09:47'),(2,5,'Surat Keluar','26','2023-05-16','commodi','Bekasi',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(3,1,'Surat Keluar','35','2023-05-27','aut','Serang',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(4,1,'Surat Masuk','84','2023-09-18','commodi','Medan',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(5,8,'Surat Masuk','56','2022-12-26','cum','Singkawang',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(6,1,'Surat Keluar','21','2023-04-09','molestias','Pariaman',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(7,7,'Surat Masuk','79','2022-11-26','aut','Tangerang',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(8,1,'Surat Keluar','11','2023-03-28','officiis','Pagar Alam',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(9,7,'Surat Masuk','94','2023-08-09','cumque','Pematangsiantar',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(10,8,'Surat Keluar','33','2023-06-25','laborum','Palopo',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(11,7,'Surat Masuk','6','2023-05-28','rem','Pekalongan',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(12,1,'Surat Keluar','68','2023-04-16','unde','Kupang',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(13,8,'Surat Keluar','33','2022-10-15','sapiente','Metro',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(14,4,'Surat Keluar','19','2023-07-05','odio','Metro',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(15,4,'Surat Masuk','69','2023-05-09','architecto','Pontianak',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(16,7,'Surat Masuk','75','2022-11-11','nisi','Padangsidempuan',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(17,8,'Surat Keluar','20','2022-11-03','iste','Pontianak',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(18,8,'Surat Keluar','55','2023-07-09','officia','Tomohon',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(19,3,'Surat Masuk','20','2022-10-06','dolore','Palembang',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(20,8,'Surat Keluar','12','2023-09-10','consectetur','Mojokerto',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(21,8,'Surat Masuk','77','2022-10-05','id','Kendari',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(22,7,'Surat Keluar','88','2023-04-03','non','Pariaman',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(23,6,'Surat Masuk','8','2023-04-14','nesciunt','Surabaya',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(24,8,'Surat Keluar','4','2023-08-17','aut','Sorong',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(25,6,'Surat Keluar','79','2023-02-03','architecto','Administrasi Jakarta Utara',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(26,8,'Surat Masuk','45','2022-10-14','quod','Binjai',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(27,4,'Surat Masuk','68','2023-03-13','vitae','Bogor',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(28,6,'Surat Keluar','29','2023-03-15','nostrum','Banda Aceh',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(29,6,'Surat Keluar','87','2022-11-21','assumenda','Tual',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(30,4,'Surat Keluar','87','2023-09-02','aliquam','Lubuklinggau',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(31,5,'Surat Masuk','41','2022-11-07','tenetur','Kediri',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(32,1,'Surat Masuk','7','2023-07-28','aut','Bima',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(33,4,'Surat Keluar','28','2022-12-31','sit','Probolinggo',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(34,3,'Surat Masuk','75','2023-03-11','maiores','Tomohon',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(35,7,'Surat Keluar','97','2023-01-31','molestiae','Medan',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(36,7,'Surat Keluar','30','2022-10-06','adipisci','Surabaya',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(37,4,'Surat Keluar','91','2023-06-14','velit','Mataram',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(38,5,'Surat Masuk','21','2023-07-26','ullam','Lhokseumawe',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(39,8,'Surat Masuk','62','2023-05-09','corrupti','Administrasi Jakarta Barat',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(40,6,'Surat Masuk','31','2023-05-05','quidem','Solok',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(41,6,'Surat Keluar','71','2022-12-13','omnis','Surabaya',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(42,4,'Surat Masuk','68','2023-01-31','tempore','Malang',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(43,7,'Surat Keluar','7','2023-04-24','id','Cimahi',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(44,4,'Surat Keluar','18','2023-02-04','enim','Lhokseumawe',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(45,4,'Surat Keluar','77','2023-05-12','necessitatibus','Tomohon',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(46,1,'Surat Masuk','28','2023-04-28','veniam','Pekanbaru',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(47,5,'Surat Masuk','64','2023-01-09','ut','Bau-Bau',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(48,8,'Surat Masuk','37','2023-02-02','quis','Surabaya',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(49,1,'Surat Masuk','20','2022-09-20','maxime','Sawahlunto',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(50,8,'Surat Keluar','83','2023-06-29','error','Banda Aceh',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(51,4,'Surat Keluar','61','2023-02-06','perferendis','Semarang',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(52,7,'Surat Keluar','79','2022-11-18','sint','Cirebon',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(53,5,'Surat Masuk','67','2023-08-13','commodi','Banjarmasin',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(54,3,'Surat Keluar','98','2023-07-22','ut','Solok',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(55,3,'Surat Masuk','33','2023-08-23','qui','Administrasi Jakarta Selatan',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(56,8,'Surat Keluar','49','2023-02-13','dolorem','Bukittinggi',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(57,8,'Surat Keluar','25','2023-03-09','asperiores','Bengkulu',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(58,6,'Surat Keluar','67','2023-08-26','tempore','Probolinggo',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(59,8,'Surat Keluar','83','2023-01-15','saepe','Tangerang Selatan',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(60,1,'Surat Keluar','95','2022-12-28','maxime','Cirebon',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(61,3,'Surat Masuk','24','2023-09-03','ipsum','Palangka Raya',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(62,1,'Surat Masuk','26','2023-01-27','rerum','Sungai Penuh',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(63,4,'Surat Keluar','39','2023-08-21','exercitationem','Malang',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(64,4,'Surat Keluar','88','2023-06-09','dolores','Kotamobagu',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(65,8,'Surat Keluar','62','2023-01-31','doloribus','Tangerang',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(66,6,'Surat Masuk','92','2023-08-30','veritatis','Ambon',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(67,1,'Surat Keluar','35','2023-04-21','sed','Tidore Kepulauan',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(68,6,'Surat Masuk','92','2023-05-11','natus','Payakumbuh',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(69,8,'Surat Keluar','35','2023-02-26','modi','Kupang',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(70,3,'Surat Masuk','67','2023-07-22','eaque','Tasikmalaya',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(71,7,'Surat Masuk','43','2023-01-22','fugit','Pontianak',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(72,8,'Surat Keluar','17','2023-01-11','reiciendis','Surabaya',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(73,7,'Surat Masuk','32','2023-07-12','dolores','Padangsidempuan',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(74,8,'Surat Keluar','34','2023-06-28','quo','Tegal',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(75,5,'Surat Keluar','55','2023-02-26','provident','Bandar Lampung',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(76,7,'Surat Masuk','3','2023-01-04','iste','Tidore Kepulauan',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(77,1,'Surat Keluar','81','2023-01-07','dolores','Kediri',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(78,3,'Surat Keluar','67','2023-06-23','quae','Bau-Bau',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(79,8,'Surat Keluar','44','2022-10-21','magni','Bogor',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(80,4,'Surat Masuk','96','2022-12-18','et','Bogor',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(81,5,'Surat Keluar','99','2023-05-04','aut','Sabang',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(82,6,'Surat Keluar','61','2023-05-26','tempora','Tasikmalaya',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(83,8,'Surat Keluar','92','2023-04-11','architecto','Prabumulih',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(84,6,'Surat Masuk','93','2023-03-19','omnis','Binjai',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(85,1,'Surat Masuk','15','2023-01-08','dolore','Mojokerto',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(86,5,'Surat Keluar','6','2023-03-01','et','Administrasi Jakarta Barat',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(87,6,'Surat Masuk','69','2023-01-17','esse','Banjarbaru',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(88,3,'Surat Masuk','29','2023-02-27','quia','Prabumulih',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(89,3,'Surat Keluar','86','2022-11-26','rerum','Yogyakarta',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(90,8,'Surat Keluar','15','2023-07-14','odio','Bukittinggi',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(91,5,'Surat Keluar','50','2022-09-22','sed','Sabang',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(92,5,'Surat Keluar','32','2023-05-13','libero','Tebing Tinggi',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(93,5,'Surat Keluar','24','2022-10-20','ut','Payakumbuh',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(94,1,'Surat Keluar','87','2023-01-02','totam','Subulussalam',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(95,7,'Surat Keluar','46','2022-12-31','tempore','Salatiga',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(96,1,'Surat Keluar','29','2023-06-27','dolores','Tual',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(97,1,'Surat Masuk','40','2023-06-03','consectetur','Pontianak',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(98,7,'Surat Keluar','78','2023-03-04','consequatur','Mataram',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(99,7,'Surat Masuk','15','2023-07-14','quis','Padangpanjang',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(100,8,'Surat Masuk','67','2023-08-31','aut','Pariaman',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55'),(101,7,'Surat Masuk','6','2023-02-27','totam','Pematangsiantar',NULL,'2023-09-18 05:10:55','2023-09-18 05:10:55');
/*!40000 ALTER TABLE `surat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@mail.com',NULL,'$2y$10$enAZKEENvE7TLufm8SKNsuW/Mizxq30Nmb841KaLXZyNUQloYdllO',NULL,'2023-09-18 05:03:11','2023-09-18 05:03:11'),(2,'Pimpinan','pimpinan@mail.com',NULL,'$2y$10$79DH3eKXeRSFWtWo.NmdYeuom6Q6ReMabSvZq9H/C4oAd32/TTES.',NULL,'2023-09-18 05:03:11','2023-09-18 05:03:11');
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

-- Dump completed on 2023-09-19 21:48:19
