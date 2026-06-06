-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: personal_branding
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_01_01_000001_create_portfolios_table',1),(6,'2024_01_01_000002_create_skills_table',1),(7,'2024_01_01_000003_create_services_table',1),(8,'2024_01_01_000004_create_testimonials_table',2),(9,'2026_06_06_085349_remove_unused_columns_from_testimonials_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolios`
--

DROP TABLE IF EXISTS `portfolios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `github_url` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolios`
--

LOCK TABLES `portfolios` WRITE;
/*!40000 ALTER TABLE `portfolios` DISABLE KEYS */;
INSERT INTO `portfolios` VALUES (1,'E-Commerce Platform','Web App','Platform e-commerce lengkap dengan fitur manajemen produk, keranjang belanja, pembayaran online, dan dashboard admin.',NULL,'https://example.com','https://github.com',1,1,'2026-04-25 20:01:26','2026-06-05 18:36:28'),(2,'Personal Branding Website','Website','Website personal branding dengan desain modern, portfolio showcase, dan integrasi WhatsApp untuk kontak langsung.',NULL,'https://example.com','https://github.com',1,2,'2026-04-25 20:01:26','2026-04-25 20:01:26'),(3,'UMKM Catalog App','Web App','Aplikasi katalog produk UMKM dengan fitur WhatsApp order otomatis, manajemen stok, dan laporan penjualan.',NULL,'https://example.com','https://github.com',1,3,'2026-04-25 20:01:26','2026-04-25 20:01:26'),(4,'Dashboard Analytics','Dashboard','Dashboard analitik real-time dengan visualisasi data interaktif, laporan otomatis, dan notifikasi cerdas.',NULL,'https://example.com','https://github.com',0,4,'2026-04-25 20:01:26','2026-04-25 20:01:26'),(5,'Restaurant POS System','Web App','Sistem Point of Sale untuk restoran dengan manajemen menu, order online, laporan harian, dan integrasi printer.',NULL,'https://example.com','https://github.com',0,5,'2026-04-25 20:01:26','2026-04-25 20:01:26'),(6,'Booking & Reservation System','Web App','Sistem reservasi online untuk hotel dan villa dengan kalender booking, konfirmasi otomatis, dan manajemen kamar.',NULL,'https://example.com','https://github.com',0,6,'2026-04-25 20:01:26','2026-04-25 20:01:26');
/*!40000 ALTER TABLE `portfolios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'bi-gear',
  `price` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Web Development','Membangun website modern, responsif, dan berkinerja tinggi menggunakan teknologi terkini seperti Laravel & Bootstrap.','bi-laptop','Mulai Rp 500.000',1,1,'2026-04-25 20:01:26','2026-04-25 20:01:26'),(2,'UI/UX Design','Merancang antarmuka pengguna yang intuitif dan menarik, berfokus pada pengalaman pengguna yang optimal.','bi-vector-pen','Mulai Rp 300.000',1,2,'2026-04-25 20:01:26','2026-04-25 20:01:26'),(3,'API Integration','Mengintegrasikan berbagai layanan dan API pihak ketiga untuk memperluas fungsionalitas aplikasi Anda.','bi-cloud-arrow-up','Mulai Rp 400.000',1,3,'2026-04-25 20:01:26','2026-04-25 20:01:26'),(4,'Konsultasi IT','Memberikan saran dan solusi teknis terbaik untuk membantu bisnis Anda berkembang di era digital.','bi-chat-dots','Gratis Konsultasi',1,4,'2026-04-25 20:01:26','2026-04-25 20:01:26');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skills` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'Technical',
  `level` int(11) NOT NULL DEFAULT 80,
  `icon` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` VALUES (1,'Laravel / PHP','Backend',10,'bi-code-slash',1,'2026-04-25 20:01:26','2026-04-25 20:01:26'),(2,'JavaScript','Frontend',5,'bi-filetype-js',2,'2026-04-25 20:01:26','2026-04-25 20:01:26'),(3,'MySQL','Database',15,'bi-database',3,'2026-04-25 20:01:26','2026-04-25 20:01:26'),(4,'Bootstrap / CSS','Frontend',12,'bi-palette',4,'2026-04-25 20:01:26','2026-04-25 20:01:26'),(5,'C Programming','Backend',50,'bi-c-circle',5,'2026-04-25 20:01:26','2026-04-25 20:01:26'),(6,'Git & Version Control','Tools',20,'bi-git',6,'2026-04-25 20:01:26','2026-04-25 20:01:26');
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'Budi Santoso',NULL,'Feno adalah developer yang luar biasa. Hasil kerjanya sangat memuaskan dan selesai tepat waktu!',1,0,'2026-05-28 03:54:51','2026-05-28 03:54:51'),(2,'Rina Melati',NULL,'Sangat mudah bekerja sama dengan Feno. Komunikasinya lancar dan teknisnya sangat mumpuni.',1,0,'2026-05-28 03:54:51','2026-05-28 03:54:51'),(3,'Andi Wijaya',NULL,'Website yang dibangun Feno memiliki performa yang sangat cepat dan desain yang modern. Sangat direkomendasikan!',1,0,'2026-05-28 03:54:51','2026-05-28 03:54:51');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
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
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2026-06-06 17:38:38
