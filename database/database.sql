-- MySQL dump 10.13  Distrib 5.7.11, for Win64 (x86_64)
--
-- Host: localhost    Database: gallery
-- ------------------------------------------------------
-- Server version	5.7.11

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) DEFAULT NULL,
  `author` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,'NikRad','Nunc euismod arcu eget tincidunt interdum. Vivamus in ligula magna. Nam vitae scelerisque urna. Vivamus tristique tincidunt risus nec pharetra. Maecenas suscipit eget tellus et ultricies.','2016-08-03 15:07:16'),(2,3,'NikRad','Proin eget leo in ipsum tristique ultricies. Sed felis augue, gravida eu lacus gravida, tempus euismod felis.','2016-08-03 15:07:31'),(3,5,'NikRad','Proin lobortis massa pretium, dictum tortor et, tincidunt nulla. Nulla facilisi. In pretium, magna ut rutrum gravida, tortor elit gravida arcu, non malesuada nulla dui sit amet sem. Aliquam tempus dignissim orci, ac suscipit elit vestibulum a.','2016-08-03 15:07:43');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_text` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `filename` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (1,'Audi','Audi','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis sapien augue. Ut ac pharetra tellus. Donec mollis malesuada erat, at dictum felis semper sit amet. Integer pharetra ante quis mi ultricies aliquam. Integer vel venenatis arcu. Duis interdum nulla nec porta vestibulum. Sed commodo blandit est nec interdum. Donec aliquet metus id enim sodales auctor. Sed lobortis ultrices ante, vel pretium tellus semper nec. Fusce sit amet semper risus, sed hendrerit enim. Morbi eget consectetur odio. Fusce bibendum cursus eros pulvinar volutpat. Praesent et nisi sit amet tortor tincidunt vestibulum vel in libero. Cras rhoncus nibh felis, non aliquet quam pretium vitae. Mauris ut mattis mi.','audi.jpg','image/jpeg',223812,'2016-08-03 15:05:07'),(2,'BMW','BMW','Etiam a mi libero. Curabitur ultricies sit amet nulla vulputate efficitur. Quisque at rutrum dui. Donec scelerisque mattis orci, et pellentesque ex fermentum eu. Mauris ultrices risus vitae aliquet dictum. Aenean laoreet, sem id maximus efficitur, velit sem molestie sapien, sit amet efficitur ipsum massa ut mauris. Nulla non vulputate lacus. Mauris pellentesque dui non ligula vestibulum condimentum. Donec porta, leo non pretium tempus, turpis erat vestibulum sem, non sagittis nisi mi in justo. Vivamus at scelerisque urna. Aenean pretium arcu ut lorem egestas finibus. Aenean tincidunt orci at placerat varius. Suspendisse et risus augue. Cras rutrum ipsum at sapien volutpat convallis. Morbi efficitur diam eget purus ultrices eleifend.','bmw.jpg','image/jpeg',131378,'2016-08-03 15:05:32'),(3,'Ferrari','Ferrari','Quisque rutrum eu lacus sed dictum. Quisque id venenatis orci, sed feugiat est. Nullam aliquam elementum ultrices. Nulla eget feugiat tortor. Phasellus a hendrerit risus, ut scelerisque tortor. Nunc porttitor purus a dignissim mollis. Nam tincidunt quis magna ac pretium. Etiam vitae auctor nisl. Integer quis mattis dolor. Ut maximus lectus et sem iaculis sollicitudin. Fusce eget odio eget nulla pulvinar dictum id ut mi. Nunc imperdiet eros sed lacus condimentum viverra. Quisque hendrerit eu felis quis fermentum. Pellentesque eu consectetur purus.','ferrari.jpeg','image/jpeg',199403,'2016-08-03 15:05:56'),(4,'Honda','Honda','Nam volutpat elit justo, vitae faucibus leo viverra sed. Vivamus nec dolor sed lacus rhoncus pretium. Cras vulputate quis mi sed pharetra. Donec nec sapien at mi vestibulum convallis venenatis nec ipsum. Aliquam felis lectus, scelerisque nec lacus feugiat, ultricies eleifend purus. Suspendisse quis neque ut turpis iaculis rutrum semper a tortor. Donec et sagittis elit. Praesent blandit ut nulla ut aliquet.','honda.jpeg','image/jpeg',171915,'2016-08-03 15:06:16'),(5,'Jaguar','Jaguar','Nunc euismod arcu eget tincidunt interdum. Vivamus in ligula magna. Nam vitae scelerisque urna. Vivamus tristique tincidunt risus nec pharetra. Maecenas suscipit eget tellus et ultricies. Proin eget leo in ipsum tristique ultricies. Sed felis augue, gravida eu lacus gravida, tempus euismod felis. Proin lobortis massa pretium, dictum tortor et, tincidunt nulla. Nulla facilisi. In pretium, magna ut rutrum gravida, tortor elit gravida arcu, non malesuada nulla dui sit amet sem. Aliquam tempus dignissim orci, ac suscipit elit vestibulum a.','jaguar.jpeg','image/jpeg',135274,'2016-08-03 15:06:38');
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Nikola','Radovic','NikRad','Radovic','admin.jpg');
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

-- Dump completed on 2016-08-03 15:30:14
