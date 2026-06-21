-- MySQL dump 10.13  Distrib 9.6.0, for macos26.2 (arm64)
--
-- Host: 192.168.1.30    Database: Terranova
-- ------------------------------------------------------
-- Server version	5.5.5-10.11.11-MariaDB

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
-- Table structure for table `OTP`
--

DROP TABLE IF EXISTS `OTP`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `OTP` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idU` bigint(20) unsigned NOT NULL,
  `OTP` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `otp_idu_foreign` (`idU`),
  CONSTRAINT `otp_idu_foreign` FOREIGN KEY (`idU`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OTP`
--

LOCK TABLES `OTP` WRITE;
/*!40000 ALTER TABLE `OTP` DISABLE KEYS */;
/*!40000 ALTER TABLE `OTP` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `building`
--

DROP TABLE IF EXISTS `building`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `building` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `city` varchar(255) NOT NULL,
  `CAP` char(5) NOT NULL,
  `street` varchar(255) NOT NULL,
  `civicNumber` varchar(10) DEFAULT NULL,
  `idU` bigint(20) unsigned NOT NULL DEFAULT 5,
  `nEmployees` int(11) DEFAULT NULL,
  `surface` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `building_idu_foreign` (`idU`),
  CONSTRAINT `building_idu_foreign` FOREIGN KEY (`idU`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `building`
--

LOCK TABLES `building` WRITE;
/*!40000 ALTER TABLE `building` DISABLE KEYS */;
/*!40000 ALTER TABLE `building` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consumption`
--

DROP TABLE IF EXISTS `consumption`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consumption` (
  `idB` bigint(20) unsigned NOT NULL,
  `date` date NOT NULL,
  `KW` double(10,2) DEFAULT NULL,
  `mc` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`idB`,`date`),
  CONSTRAINT `consumption_idb_foreign` FOREIGN KEY (`idB`) REFERENCES `building` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumption`
--

LOCK TABLES `consumption` WRITE;
/*!40000 ALTER TABLE `consumption` DISABLE KEYS */;
/*!40000 ALTER TABLE `consumption` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contract`
--

DROP TABLE IF EXISTS `contract`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contract` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idU` bigint(20) unsigned NOT NULL,
  `idB` bigint(20) unsigned NOT NULL,
  `idT` bigint(20) unsigned NOT NULL,
  `date` date NOT NULL,
  `rinovate` tinyint(1) NOT NULL,
  `paymentType` enum('CC','Transfer') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contract_idu_foreign` (`idU`),
  KEY `contracdIDB` (`idB`),
  KEY `contracdIDT` (`idT`),
  CONSTRAINT `contract_idb_foreign` FOREIGN KEY (`idB`) REFERENCES `building` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `contract_idt_foreign` FOREIGN KEY (`idT`) REFERENCES `contractType` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `contract_idu_foreign` FOREIGN KEY (`idU`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contract`
--

LOCK TABLES `contract` WRITE;
/*!40000 ALTER TABLE `contract` DISABLE KEYS */;
/*!40000 ALTER TABLE `contract` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contractType`
--

DROP TABLE IF EXISTS `contractType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contractType` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idS` bigint(20) unsigned NOT NULL,
  `type` enum('home','business') NOT NULL,
  `KWh` double(5,1) DEFAULT NULL,
  `energyType` enum('E','G','EG') NOT NULL,
  `minimumDuration` int(11) DEFAULT NULL,
  `priceE` double(5,2) DEFAULT NULL,
  `priceG` double(5,2) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `contracttype_ids_foreign` (`idS`),
  CONSTRAINT `contracttype_ids_foreign` FOREIGN KEY (`idS`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contractType`
--

LOCK TABLES `contractType` WRITE;
/*!40000 ALTER TABLE `contractType` DISABLE KEYS */;
INSERT INTO `contractType` VALUES (1,8,'home',NULL,'G',NULL,NULL,0.01,1,0),(2,2,'home',NULL,'G',NULL,NULL,10.00,0,0),(3,3,'home',NULL,'G',NULL,NULL,10.00,0,0),(8,8,'home',5.0,'E',NULL,0.01,NULL,0,0),(24,8,'business',3.3,'EG',12,0.22,0.12,1,0),(26,8,'business',5.5,'EG',100,0.32,0.42,1,0),(27,8,'home',NULL,'G',12,NULL,0.14,0,0),(28,8,'home',18.0,'E',100,0.54,NULL,1,0),(40,8,'home',5.5,'EG',NULL,0.12,0.32,1,0),(42,12,'home',55.0,'E',55,0.32,NULL,1,0),(45,12,'home',NULL,'G',77,NULL,69.00,0,0),(46,12,'home',NULL,'G',45,NULL,69.00,0,0),(47,1,'home',17.5,'E',39,0.56,NULL,1,0),(48,1,'home',19.6,'E',69,0.54,NULL,1,0),(49,2,'home',15.3,'G',69,NULL,0.22,1,0),(50,2,'home',11.6,'G',32,NULL,0.89,1,0),(51,3,'home',11.3,'EG',54,NULL,0.87,1,0),(52,3,'home',11.3,'EG',11,NULL,0.90,1,0);
/*!40000 ALTER TABLE `contractType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `idC` bigint(20) unsigned NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `totGas` float(10,2) DEFAULT NULL,
  `totEle` float(10,2) DEFAULT NULL,
  `IVA` float(10,2) DEFAULT NULL,
  `transport` float(10,2) DEFAULT NULL,
  `meter` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contracdIDC` (`idC`),
  CONSTRAINT `invoices_idc_foreign` FOREIGN KEY (`idC`) REFERENCES `contract` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_12_14_000001_create_personal_access_tokens_table',1),(2,'2024_02_24_090645_terranova_db_v2',1),(3,'2024_03_20_205518_invoices',2),(4,'2019_05_03_000001_create_customer_columns',3),(5,'2019_05_03_000002_create_subscriptions_table',3),(6,'2019_05_03_000003_create_subscription_items_table',3),(7,'2024_03_29_141500_user_chat',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
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
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `subscription_items`
--

DROP TABLE IF EXISTS `subscription_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscription_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subscription_id` bigint(20) unsigned NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_product` varchar(255) NOT NULL,
  `stripe_price` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`),
  KEY `subscription_items_subscription_id_stripe_price_index` (`subscription_id`,`stripe_price`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_items`
--

LOCK TABLES `subscription_items` WRITE;
/*!40000 ALTER TABLE `subscription_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `type` varchar(255) NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_status` varchar(255) NOT NULL,
  `stripe_price` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suppliers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ragSoc` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `IBAN` varchar(255) NOT NULL,
  `authorized` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `supplier_name_unique` (`ragSoc`),
  UNIQUE KEY `supplier_email_unique` (`email`),
  UNIQUE KEY `supplier_iban_unique` (`IBAN`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'Enel','prova1','prova1','prova1',1),(2,'Ultragas','prova2','prova2','prova2',1),(3,'Unogas','prova3','prova3','prova3',1),(8,'AGSM','supplier@gmail.com','$2y$12$uTr7n7/DIlBxSCf3XrPSMuS4ChIXtzk1kNgH/92FRIhqSzx5dWPGe','IT97M0100511700000000006370',1),(9,'Prova','kevinalacs005@gmail.com','$2y$12$03AbPXHOd8fKRGNJG4Mt4Or3sgzgj4grgrO8H1nrO9mdz8LJZu7C2','IT97M0100511700000000006371',1),(11,'prova2','saouasoidh@gmail.com','$2y$12$SzTCRswK9zKRyms7f5dNzeuOgayYjMves0BS8Xzdxag3CC.f0Qp9.','123456789876543212345678987',0),(12,'anna','super7seven@gmail.com','$2y$12$OnoTS943GspN2kCIpkLc6ecgRcqGf7AE0sKORQvGiiT4NJN0jPIMa','IT60X0542811101000000123456',1);
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userChat`
--

DROP TABLE IF EXISTS `userChat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userChat` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idU` bigint(20) unsigned NOT NULL,
  `message` varchar(255) NOT NULL,
  `sender` enum('user','admin') NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `userchat_idu_foreign` (`idU`),
  CONSTRAINT `userchat_idu_foreign` FOREIGN KEY (`idU`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userChat`
--

LOCK TABLES `userChat` WRITE;
/*!40000 ALTER TABLE `userChat` DISABLE KEYS */;
INSERT INTO `userChat` VALUES (2,5,'Hello, this is a test message','user','2024-03-29 18:59:27'),(25,5,'Ciao, come va?','user','2024-03-29 22:35:58'),(47,5,'Ciao','user','2024-04-10 06:57:10'),(51,5,'Adesso funziona!','admin','2024-04-16 22:15:18'),(65,5,'Che ricordi','user','2024-09-23 10:45:29'),(66,5,'prova','user','2025-10-24 09:47:46'),(67,5,'2Prova','user','2026-03-01 01:15:36'),(68,5,'figo','user','2026-04-26 10:32:55');
/*!40000 ALTER TABLE `userChat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `ragSoc` varchar(255) NOT NULL,
  `PIVA` char(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `CF` char(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) DEFAULT NULL,
  `pm_type` varchar(255) DEFAULT NULL,
  `pm_last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phonenumber_unique` (`phoneNumber`),
  UNIQUE KEY `users_cf_unique` (`CF`),
  KEY `users_stripe_id_index` (`stripe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'Kevin','Scala','Kevin Scala',NULL,'private@gmail.com','+39123456789','SCLKVN05C21F861T','$2y$12$.l9j31eNwsBtjPz30geMsudJvl0fv2UyMKIuOyXFKBBfFVX4k9hEO','2024-02-24 11:41:11',NULL,NULL,NULL,NULL),(21,NULL,NULL,'Prova','12345678985','business@gmail.com','34325352343','SCLKVN75C21F861Q','$2y$12$BmbiZuVGRCPTuocrxT/ir.OajvtDjmHRwfjxOhQNQQKhTABCp1nIq','2024-03-17 12:54:15',NULL,NULL,NULL,NULL);
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

-- Dump completed on 2026-06-21 21:46:21
