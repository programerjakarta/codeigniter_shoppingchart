CREATE DATABASE  IF NOT EXISTS `latihan` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `latihan`;
-- MySQL dump 10.13  Distrib 5.6.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: latihan
-- ------------------------------------------------------
-- Server version	5.6.24-0ubuntu2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `depkeu_product`
--

DROP TABLE IF EXISTS `depkeu_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `depkeu_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `depkeu_product`
--

LOCK TABLES `depkeu_product` WRITE;
/*!40000 ALTER TABLE `depkeu_product` DISABLE KEYS */;
INSERT INTO `depkeu_product` VALUES (1,'Samsung Galaxy S6 Edge','Samsung-Galaxy-S6-Edge','Preorder Samsung Galaxy S6 edge-SM G925F White Smartphone + Wireless Charging + Prepaid Indosat hadir dengan layar berteknologi SUPER AMOLED berukuran 5.1 inch dengan resolusi Full HD 1440 x 2560 pixel dan Corning Gorilla Glass 4 yang akan membawa pengalaman multimedia Anda ke level lebih tinggi. Galaxy S6 edge dipersenjatai Exynos 7420, prosesor Quad-core 1.5 GHz Cortex-A53 & Quad-core 2.1 GHz , memori RAM 3 GB, dan OS Android v5.0.2 (Lollipop). ',11000000,'http://srv-live-02.lazada.co.id/p/samsung-galaxy-s6-edge-32gb-putih-1820-337979-1-gallery.jpg'),(2,'Acer Liquid Z500','Acer-Liquid-Z500','Acer Liquid Z500 merupakan smartphone yang menjadi pilihan yang baik sebagai smartphone murah dengan spesifikasi tinggi. Acer Liquid Z500 berjalan pada Android 4.4.2 (Kit Kat) yang menawarkan peningkatan kinerja pada handset dengan spesifikasi yang lebih rendah.',1606000,'http://srv-live-03.lazada.co.id/p/acer-liquid-z500-dual-sim-16-gb-silver-2731-199688-1-zoom.jpg'),(3,'Xiaomi Redmi Note','Xiaomi-Redmi-Note','Xiaomi Redmi Note 4G Lte Single Sim, Barang dijamin 100% Brandnew dan 100% Original, Xiaomi Redmi Note Merupakan Smartphone Android 4.4 Kitkat yang hadir dengan layar sentuh IPS berukuran 5.5 inci dengan resolusi 1.280 x 720 pixel. Xiaomi Redmi Note ditenagai dengan prosesor Quad-core, Ram 1GB. Xiaomi Redmi Note dilengkapi dengan kamera 13MP dan kamera depan 5MP. Xiaomi Redmi Note dilengkapi juga dengan memori internal 8GB plus slot microSD, 4G, Wifi, Bluetooth, GPS, dan Baterai 3100Mah.',1849000,'http://srv-live-01.lazada.co.id/p/xiaomi-redmi-note-4g-lte-dual-sim-8-gb-putih-2640-6516711-1-zoom.jpg'),(4,'Microsoft Lumia 540','Microsoft-Lumia-540','Microsoft kembali mempersembahkan, smartphone dengan spesifikasi yang mengagumkan. Kali ini, Microsoft kembali membekali smartphone terbaru mereka Microsoft Lumia 540 dengan fitur dual Micro SIM yang mampu menyajikan 2 kartu SIM yang berbeda dalam 1 smartphone. Dengan model yang ramping nan minimalis, Microsoft Lumia 540 didesain dengan konsep yang simpel nan elegan sehingga sangat cocok digunakan oleh berbagai kalangan. Dilengkapi dengan varian warna yang menarik, pilih smartphone Microsoft Lumia 540 Anda sesuai dengan selera Anda, mulai dari biru, oranye, hitam, hingga putih.',1799000,'http://srv-live-02.lazada.co.id/p/microsoft-lumia-540-dual-sim-8-gb-putih-pre-order-hadiah-gratis-1245-8275811-1-zoom.jpg');
/*!40000 ALTER TABLE `depkeu_product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-15  9:13:44
