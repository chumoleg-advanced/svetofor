-- MySQL dump 10.13  Distrib 5.5.50, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: svetofor54
-- ------------------------------------------------------
-- Server version	5.5.50-0ubuntu0.14.04.1

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
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'Адыгея Респ'),(2,'Башкортостан Респ'),(3,'Бурятия Респ'),(4,'Алтай Респ'),(5,'Дагестан Респ'),(6,'Ингушетия Респ'),(7,'Кабардино-Балкарская Респ'),(8,'Калмыкия Респ'),(9,'Карачаево-Черкесская Респ'),(10,'Карелия Респ'),(11,'Коми Респ'),(12,'Марий Эл Респ'),(13,'Мордовия Респ'),(14,'Саха (Якутия) Респ'),(15,'Северная Осетия - Алания Респ'),(16,'Татарстан Респ'),(17,'Тыва Респ'),(18,'Удмуртская Респ'),(19,'Хакасия Респ'),(20,'Чеченская Респ'),(21,'Чувашская Респ'),(22,'Алтайский край'),(23,'Краснодарский край'),(24,'Красноярский край'),(25,'Приморский край'),(26,'Ставропольский край'),(27,'Хабаровский край'),(28,'Амурская обл'),(29,'Архангельская обл'),(30,'Астраханская обл'),(31,'Белгородская обл'),(32,'Брянская обл'),(33,'Владимирская обл'),(34,'Волгоградская обл'),(35,'Вологодская обл'),(36,'Воронежская обл'),(37,'Ивановская обл'),(38,'Иркутская обл'),(39,'Калининградская обл'),(40,'Калужская обл'),(41,'Камчатский край'),(42,'Кемеровская обл'),(43,'Кировская обл'),(44,'Костромская обл'),(45,'Курганская обл'),(46,'Курская обл'),(47,'Ленинградская обл'),(48,'Липецкая обл'),(49,'Магаданская обл'),(50,'Московская обл'),(51,'Мурманская обл'),(52,'Нижегородская обл'),(53,'Новгородская обл'),(54,'Новосибирская обл'),(55,'Омская обл'),(56,'Оренбургская обл'),(57,'Орловская обл'),(58,'Пензенская обл'),(59,'Пермский край'),(60,'Псковская обл'),(61,'Ростовская обл'),(62,'Рязанская обл'),(63,'Самарская обл'),(64,'Саратовская обл'),(65,'Сахалинская обл'),(66,'Свердловская обл'),(67,'Смоленская обл'),(68,'Тамбовская обл'),(69,'Тверская обл'),(70,'Томская обл'),(71,'Тульская обл'),(72,'Тюменская обл'),(73,'Ульяновская обл'),(74,'Челябинская обл'),(75,'Забайкальский край'),(76,'Ярославская обл'),(77,'Москва г'),(78,'Санкт-Петербург г'),(79,'Еврейская АО'),(80,'Ненецкий АО'),(81,'Ханты-Мансийский АО'),(82,'Чукотский АО'),(83,'Ямало-Ненецкий АО'),(84,'Крым Респ'),(85,'Севастополь г');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `basket`
--

DROP TABLE IF EXISTS `basket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `basket` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_session` char(32) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `date_create` timestamp NULL DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `price` decimal(12,2) unsigned DEFAULT '0.00',
  `single_price` decimal(10,2) unsigned DEFAULT '0.00',
  `quantity` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_basket_product_id` (`product_id`),
  KEY `fk_basket_user_id` (`user_id`),
  CONSTRAINT `fk_basket_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_basket_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='Корзина';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `basket`
--

LOCK TABLES `basket` WRITE;
/*!40000 ALTER TABLE `basket` DISABLE KEYS */;
INSERT INTO `basket` VALUES (1,'a3bc17bf5505b450b58f7af54977d8a4',NULL,'2015-11-29 12:49:21',66,1350.00,1350.00,1),(9,'340b9645e43cdc36721d348493ceafa8',NULL,'2016-09-08 14:52:31',98,40.00,40.00,1),(10,'340b9645e43cdc36721d348493ceafa8',NULL,'2016-09-08 14:52:31',97,50.00,50.00,1),(11,'340b9645e43cdc36721d348493ceafa8',NULL,'2016-09-08 14:52:38',261,34.00,17.00,2),(12,'340b9645e43cdc36721d348493ceafa8',NULL,'2016-09-08 14:52:40',262,225.00,225.00,1),(13,'340b9645e43cdc36721d348493ceafa8',NULL,'2016-09-08 14:59:47',257,50.00,25.00,2),(16,'340b9645e43cdc36721d348493ceafa8',NULL,'2016-09-08 15:07:52',254,34.00,17.00,2),(17,'340b9645e43cdc36721d348493ceafa8',NULL,'2016-09-08 15:07:53',255,25.00,25.00,1),(18,'340b9645e43cdc36721d348493ceafa8',NULL,'2016-09-08 15:07:56',150,2050.00,2050.00,1);
/*!40000 ALTER TABLE `basket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `picture` varchar(500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Категории';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (3,'Автосвет',NULL,1);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date_create` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '1',
  `comment` varchar(500) DEFAULT NULL,
  `user_session` varchar(32) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fio` varchar(200) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `area` int(10) unsigned DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `price` decimal(12,2) unsigned DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `fk_order_user_id` (`user_id`),
  CONSTRAINT `fk_order_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Заказы';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,'2015-11-29 12:56:17',2,'','b5d4234e0b9118ee4cd2272d5b91037e',NULL,'chjsdsd@gfdgfdgfdg.reu','fdsfdgsdgdgs','8888888',4,'jhgfjhgfj','jhgfjghfjghfj',0.00),(2,'2016-09-08 14:18:45',1,'ТЕСТОВЫЙ','d5463bdc3faded5697811ab7003f5a62',1,'admin@svetofor.ru','adm','22222222',54,'','',160.00),(3,'2016-09-08 14:20:45',1,'','b737de1ba84d5688d9f58c76ec20745e',NULL,'test@test.ru','TEST','89911111111',54,'Новосибирск','',259.00);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producer`
--

DROP TABLE IF EXISTS `producer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category_id` int(4) unsigned DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_producer_category_id` (`category_id`),
  CONSTRAINT `fk_producer_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Производитель';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producer`
--

LOCK TABLES `producer` WRITE;
/*!40000 ALTER TABLE `producer` DISABLE KEYS */;
INSERT INTO `producer` VALUES (4,'Koito Manufacturing CO., LTD',3,1),(5,'OSRAM AG',3,1);
/*!40000 ALTER TABLE `producer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `article` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `picture` varchar(500) DEFAULT NULL,
  `category_id` int(4) unsigned DEFAULT NULL,
  `producer_id` int(10) unsigned DEFAULT NULL,
  `opt_price` decimal(10,2) unsigned DEFAULT '0.00',
  `rozn_price` decimal(10,2) unsigned DEFAULT '0.00',
  `date_create` timestamp NULL DEFAULT NULL,
  `recommended` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_product_category_id` (`category_id`),
  KEY `fk_product_producer_id` (`producer_id`),
  CONSTRAINT `fk_product_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_product_producer_id` FOREIGN KEY (`producer_id`) REFERENCES `producer` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8 COMMENT='Товары';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (5,'Osram 12v H1 100W P14.5S  автолампа','','64152',1,NULL,3,5,0.00,0.00,NULL,1),(6,'Osram 12v H1 55W P14.5S  автолампа','','64150',1,NULL,3,5,0.00,0.00,NULL,1),(7,'Osram 12v H1 55W P14.5S +30% света  автолампа','','64150SUP',1,NULL,3,5,0.00,0.00,NULL,1),(8,'Osram 12v H1 55W P14.5S +110% света автолампа','','64150NBU DUO ',1,NULL,3,5,0.00,0.00,NULL,1),(9,'Osram 12v H1 55W P14.5S +60% света автолампа','','64150SV2 DUO ',1,NULL,3,5,0.00,0.00,NULL,1),(10,'Osram 12v H1 55W P14.5S 4200K автолампа','','64150CBI DUO ',1,NULL,3,5,0.00,0.00,NULL,1),(11,'Osram 12v H1 55W P14.5S 4200K автолампа','','64150CBI ',1,NULL,3,5,0.00,0.00,NULL,1),(12,'Osram 12v H1 55W P14.5S 5000K автолампа','','62150CBH DUO ',1,NULL,3,5,0.00,0.00,NULL,1),(13,'Osram 12v H1 55W P14.5S +30% света всесезонная автолампа','','64150ALS ',1,NULL,3,5,0.00,0.00,NULL,1),(14,'Osram 12v H1 55W P14.5S тройной ресурс автолампа','','64150ULT DUO ',1,NULL,3,5,0.00,0.00,NULL,1),(15,'Osram 24v H1 70W P14.5S +100% света автолампа','','64155TSP DUO ',1,NULL,3,5,0.00,0.00,NULL,1),(16,'Osram 24v H1 70W P14.5S автолампа','',' 64155 ',1,NULL,3,5,0.00,0.00,NULL,1),(18,'Osram 12v H4 60/55W P43T +110% света 64193NBU DUO автолампа','','64193NBU DUO ',1,NULL,3,5,860.00,1050.00,NULL,1),(19,'Osram 12v H4 60/55W P43T +110% света автолампа','','64193NBU ',1,NULL,3,5,490.00,640.00,NULL,1),(20,'Osram 12v H4 60/55W P43T +60% света 2600К желтая автолампа','','64193FBR DUO ',1,NULL,3,5,750.00,980.00,NULL,1),(21,'Osram 12v H4 60/55W P43T +30% света автолампа','','64193SUP ',1,NULL,3,5,124.00,170.00,NULL,1),(22,'Osram 12v H4 60/55W P43T +60% света автолампа','','64193SV2 DUO ',1,NULL,3,5,470.00,610.00,NULL,1),(23,'Osram 12v H4 60/55W P43T +60% света автолампа','','64193SV2 ',1,NULL,3,5,200.00,275.00,NULL,1),(24,'Osram 12v H4 60/55W P43T 4200K автолампа','','64193CBI DUO ',1,NULL,3,5,500.00,675.00,NULL,1),(25,'Osram 12v H4 60/55W P43T 4200K автолампа','','64193CBI ',1,NULL,3,5,245.00,350.00,NULL,1),(26,'Osram 12v H4 100/90W P43T автолампа','','62204SBP ',1,NULL,3,5,163.00,225.00,NULL,1),(27,'Osram 12v H4 60/55W P43T4200K (new) автолампа','','64193CBL DUO ',1,NULL,3,5,540.00,715.00,NULL,2),(28,'Osram 12v H4 60/55W P43T 5000K автолампа','','62193CBH DUO ',1,NULL,3,5,635.00,840.00,NULL,1),(29,'Osram 12v H4 60/55W P43T 5000K автолампа','','62193CBH+ DUO ',1,NULL,3,5,730.00,950.00,NULL,2),(30,'Osram 12v H4 60/55W P43T автолампа','','64193 ',1,NULL,3,5,86.00,125.00,NULL,1),(31,'Osram 12v H4 60/55W P43T +30% света всесезонная автолампа','','64193ALS ',1,NULL,3,5,235.00,320.00,NULL,1),(32,'Osram 12v H4 60/55W P43T тройной ресурс автолампа','','64193ULT DUO ',1,NULL,3,5,340.00,475.00,NULL,1),(33,'Osram 12v H4 85/80W P43T всесезонная автолампа','','62206ALL ',1,NULL,3,5,235.00,330.00,NULL,1),(34,'Osram 24v H4 75/70W P43T +100% света автолампа','','64196TSP DUO ',1,NULL,3,5,505.00,700.00,NULL,1),(35,'Osram 24v H4 75/70W P43T автолампа','','64196 ',1,NULL,3,5,150.00,210.00,NULL,1),(36,'Osram 12v H7 55W PX26D +110% света автолампа','','64210NBU DUO ',1,NULL,3,5,880.00,1200.00,NULL,1),(37,'Osram 12v H7 55W PX26D +110% света автолампа','','64210NBU ',1,NULL,3,5,510.00,680.00,NULL,1),(38,'Osram 12v H7 55W PX26D тройной ресурс автолампа','','64210ULT DUO ',1,NULL,3,5,500.00,660.00,NULL,1),(39,'Osram 12v H7 55W PX26D +30% света 64210SUP автолампа','','64210SUP ',1,'/images/Product/39/cbff6fc3bab51a486cf81b4d9220c561.jpg',3,5,200.00,280.00,NULL,1),(40,'Osram 12v H7 55W PX26D +60% света автолампа','','64210SV2 DUO ',1,NULL,3,5,630.00,820.00,NULL,1),(41,'Osram 12v H7 55W PX26D 4200K автолампа','','64210CBI DUO ',1,NULL,3,5,730.00,970.00,NULL,1),(42,'Osram 12v H7 55W PX26D 4200Kавтолампа','',' 64210CBI ',1,NULL,3,5,380.00,530.00,NULL,1),(43,'Osram 12v H7 55W PX26D 4200K (new) автолампа','','64210CBL DUO ',1,NULL,3,5,770.00,1070.00,NULL,1),(44,'Osram 12v H7 55W PX26D 5000K автолампа','','62210CBH DUO ',1,NULL,3,5,785.00,1025.00,NULL,1),(45,'Osram 12v H7 55W PX26D 5000K автолампа','','62210CBH+ DUO ',1,NULL,3,5,850.00,1100.00,NULL,1),(46,'Osram 12v H7 55W PX26Dавтолампа','',' 64210 ',1,NULL,3,5,135.00,190.00,NULL,1),(47,'Osram 12v H7 55W PX26D +30% света всесезонная автолампа','','64210ALL ',1,NULL,3,5,315.00,455.00,NULL,1),(48,'Osram 12v H7 55W PX26D +60% света 2600K желтая автолампа','','62210FBR DUO ',1,NULL,3,5,920.00,1200.00,NULL,2),(49,'Osram 24v H7 70W PX26D +100% света автолампа','','64215TSP DUO ',1,NULL,3,5,800.00,1060.00,NULL,1),(50,'Osram 24v H7 70W PX26D автолампа','','64215 ',1,NULL,3,5,260.00,360.00,NULL,1),(51,'Osram 42v D1S 35W  PK32d-2 автолампа','','66140CLC ',1,NULL,3,5,2000.00,2700.00,NULL,1),(52,'Osram 42v D4S 35W  P32d-5 автолампа','','66440 ',1,NULL,3,5,2200.00,2900.00,NULL,1),(53,'Osram 85v D2R 35W  P32d-3 автолампа','','66250CLC ',1,NULL,3,5,1450.00,1850.00,NULL,2),(54,'Osram 85v D2S 35W  P32d-2  автолампа','','66240CLC',1,NULL,3,5,1280.00,1650.00,NULL,1),(55,'Osram 12v 1W W2.1X9.5D LED 6000K автолампа','','2850CW-02B ',1,NULL,3,5,680.00,930.00,NULL,1),(56,'Osram 12v 1W W2.1X9.5D LED 4000K автолампа','','2850WW-02B ',1,NULL,3,5,6800.00,930.00,NULL,2),(57,'Osram 12v 1W BA9S LED 6000K автолампа','','3850CW-02B ',1,NULL,3,5,680.00,890.00,NULL,1),(58,'Osram 12v 1W BA9S LED 4000K автолампа','','3850WW-02B ',1,NULL,3,5,680.00,890.00,NULL,1),(59,'Osram 12v H10 42W PY20D автолампа','','9145 ',1,NULL,3,5,265.00,365.00,NULL,1),(60,'Osram 12v H11 55W PGJ19-2  +110% света автолампа','','64211NBU ',1,NULL,3,5,715.00,990.00,NULL,2),(61,'Osram 12v H11 55W PGJ19-2 5000K автолампа','','64211CBH+ DUO ',1,NULL,3,5,1250.00,1610.00,NULL,2),(62,'Osram 12v H11 55W PGJ19-2 4200K автолампа','','64211CBI DUO ',1,NULL,3,5,1150.00,1500.00,NULL,1),(63,'Osram 12v H11 55W PGJ19-2 +60% света 2600К желтая автолампа','','64211FBR DUO ',1,NULL,3,5,1250.00,1600.00,NULL,2),(64,'Osram 12v H15 55/15W PGJ23T-1 автолампа','','64176 ',1,NULL,3,5,840.00,1000.00,NULL,1),(65,'Osram 12v H8 35W PGJ19-1 автолампа','','64212 ',1,NULL,3,5,430.00,590.00,NULL,1),(66,'Osram 24v 20/60W PGJ23T-1 автолампа','','64177 ',1,NULL,3,5,1020.00,1350.00,NULL,1),(68,'Osram 12v 51W P22D +110% света автолампа','','9006NBU DUO ',1,NULL,3,5,1140.00,1600.00,NULL,1),(69,'Osram 12v 51W P22D 4200K 9006CBI DUO автолампа','','9006CBI DUO ',1,NULL,3,5,8400.00,1100.00,NULL,1),(70,'Osram 12v 51W P22D 5000K 9006CBH+ DUO автолампа','','9006CBH+ DUO ',1,NULL,3,5,990.00,1350.00,NULL,1),(71,'Osram 12v 51W P22D 9006 автолампа','','9006 ',1,NULL,3,5,240.00,320.00,NULL,1),(72,'Osram 12v HB4 51W P22D +60% света 2600К желтая 9006FBR DUO автолампа','','9006FBR DUO ',1,NULL,3,5,1030.00,1400.00,NULL,2),(73,'Osram 12v 60W P20D +110% света автолампа','','9005NBU DUO ',1,NULL,3,5,1060.00,1400.00,NULL,1),(74,'Osram 12v 60W 4200K P20D автолампа','','9005CBI DUO ',1,NULL,3,5,850.00,1020.00,NULL,1),(75,'Osram 12v 60W P20D 5000K автолампа','','9005CBH+ DUO ',1,NULL,3,5,1010.00,1400.00,NULL,1),(76,'Osram 12v 60W P20D автолампа','','9005 ',1,NULL,3,5,240.00,320.00,NULL,1),(77,'Osram 12v HB3 60W P20D +60% света 2600К желтая 9005FBR DUO автолампа','','9005FBR DUO ',1,NULL,3,5,1010.00,1400.00,NULL,2),(78,'Osram 12v H3 55W Pk22S +110% света автолампа','','64151NBU ',1,NULL,3,5,315.00,440.00,NULL,1),(79,'Osram 12v H3 55W +30% света  Pk22S автолампа','','64151SUP ',1,NULL,3,5,100.00,140.00,NULL,1),(80,'Osram 12v H3 55W 4200K  Pk22S автолампа','','64151CBI ',1,NULL,3,5,185.00,260.00,NULL,1),(81,'Osram 12v H3 55W 5000K  Pk22S автолампа','','62151CBH ',1,NULL,3,5,585.00,780.00,NULL,1),(82,'Osram 12v H3 100W Pk22S автолампа','','62201 ',1,NULL,3,5,95.00,140.00,NULL,1),(83,'Osram 12v H3 55W Pk22S автолампа','','64151 ',1,NULL,3,5,75.00,110.00,NULL,1),(84,'Osram 12v H3 55W Pk22S +30% света всесезонная автолампа','','64151ALS ',1,NULL,3,5,180.00,260.00,NULL,1),(85,'Osram 12v H3 55W Pk22S +60% света 2600К желтая автолампа','','62151FBR ',1,NULL,3,5,720.00,1020.00,NULL,1),(86,'Osram 24v H3 70W Pk22S +100% света автолампа','','64156TSP DUO',1,NULL,3,5,365.00,515.00,NULL,1),(87,'Osram 24v H3 70W Pk22S автолампа','','64156 ',1,NULL,3,5,110.00,155.00,NULL,1),(88,'Osram 12v P21W BA15S автолампа','','7506 ',1,NULL,3,5,20.00,30.00,NULL,1),(89,'Osram 12v P21/5W BAY15D автолампа','','7528 ',1,NULL,3,5,26.00,40.00,NULL,1),(90,'Osram 12v PY21W BAU15S автолампа','','7507 ',1,NULL,3,5,35.00,55.00,NULL,1),(91,'Osram 12v P21/4W BAZ15D 7225 автолампа','','7225 ',1,NULL,3,5,37.00,58.00,NULL,1),(92,'Osram 12v 27/7W W2.5X16q автолампа','','3157 ',1,NULL,3,5,69.00,105.00,NULL,1),(93,'Osram 12v 27W W2.5X16q автолампа','','3156 ',1,NULL,3,5,67.00,100.00,NULL,1),(94,'Osram 12v R10W BA15S автолампа','','5008 ',1,NULL,3,5,17.00,28.00,NULL,1),(95,'Osram 12v R5W BA15S автолампа','','5007 ',1,NULL,3,5,16.00,28.00,NULL,1),(96,'Osram 12v W16W W2.1X9.5D автолампа','','921 ',1,NULL,3,5,24.00,40.00,NULL,1),(97,'Osram 24v P21/5W BAY15D автолампа','','7537 ',1,NULL,3,5,32.00,50.00,NULL,1),(98,'Osram 24v P21W BA15S автолампа','','7511 ',1,NULL,3,5,24.00,40.00,NULL,1),(99,'Osram 24v R5W BA15S автолампа','',' 5627 ',1,NULL,3,5,24.00,36.00,NULL,1),(100,'Osram 24v R10W BA15S автолампа','','5637 ',1,NULL,3,5,24.00,36.00,NULL,1),(101,'Osram 24v R5W BA15S автолампа','','5627TSP ',1,NULL,3,5,32.00,50.00,NULL,1),(102,'Osram 12v C10W SV8.5-8   автолампа','','6411',1,NULL,3,5,24.00,40.00,NULL,1),(103,'Osram 12v 10W SV8.5-8  автолампа','','6438 ',1,NULL,3,5,27.00,42.00,NULL,1),(104,'Osram 12v C10W SV8.5-8  автолампа','','6461 ',1,NULL,3,5,20.00,32.00,NULL,1),(105,'Osram 12v C5W SV8.5-8 автолампа','',' 6418 ',1,NULL,3,5,20.00,30.00,NULL,1),(106,'Osram 24v 10W SV8.5-8  автолампа','','6429 ',1,NULL,3,5,33.00,50.00,NULL,1),(107,'Osram 24v 15W SV8.5-8  автолампа','','6453 ',1,NULL,3,5,39.00,65.00,NULL,1),(108,'Osram 24v 5W SV8.5-8  автолампа','','6423 ',1,NULL,3,5,25.00,40.00,NULL,1),(109,'Osram 24v 5W SV8.5-8  автолампа','','6424 ',1,NULL,3,5,36.00,60.00,NULL,1),(110,'Osram 12v T4W BA9S автолампа','','3893 ',1,NULL,3,5,17.00,30.00,NULL,1),(111,'Osram 12v W1,2W B8.5D автолампа','','2721MF ',1,NULL,3,5,24.00,40.00,NULL,2),(112,'Osram 12v W1,2W W2X4.6D автолампа','','2721 ',1,NULL,3,5,14.00,22.00,NULL,1),(113,'Osram 12v W2,3W W2X4.6D автолампа','','2723 ',1,NULL,3,5,18.00,28.00,NULL,1),(114,'Osram 12v W1,5W BX8.4D автолампа','','2452MFX6 ',1,NULL,3,5,28.00,45.00,NULL,1),(115,'Osram 12v W3W W2.1X9.5D автолампа','','2821 ',1,NULL,3,5,18.00,28.00,NULL,1),(116,'Osram 12v W5W W2.1X9.5D автолампа','',' 2825 ',1,NULL,3,5,13.50,23.00,NULL,1),(117,'Osram 12v WY5W W2.1X9.5D автолампа','','2827 ',1,NULL,3,5,28.00,43.00,NULL,1),(118,'Osram 24v T2W BA9S автолампа','','3797 ',1,NULL,3,5,26.00,40.00,NULL,1),(119,'Osram 24v T4W BA9S автолампа','','3930 ',1,NULL,3,5,22.00,35.00,NULL,1),(120,'Osram 24v W1,2W B8.5D автолампа','','2741MF ',1,NULL,3,5,31.00,50.00,NULL,1),(121,'Osram 24v W1,2W W2X4.6D автолампа','','2741 ',1,NULL,3,5,22.00,35.00,NULL,1),(122,'Osram 24v W1,2W W2X4.6D автолампа','','2741 ',1,NULL,3,5,22.00,35.00,NULL,1),(123,'Osram 24v W3W W2.1X9.5D автолампа','','2841 ',1,NULL,3,5,24.00,37.00,NULL,1),(124,'Osram 24v W5W W2.1X9.5D автолампа','','2845 ',1,NULL,3,5,22.00,34.00,NULL,1),(125,'Koito 12v 100/90W P43T H4  автолампа','','0443E',1,'/images/Product/125/7bebeec5346eaa8337538dacc82c8f2a.jpg',3,4,164.00,230.00,NULL,1),(126,'Koito 12v 55W P14.5S 4200K H1  (1шт) автолампа','','0751W',1,'/images/Product/126/8ba30898120b75910a2a9b61bd14cad1.jpg',3,4,517.00,650.00,NULL,1),(127,'Koito 12v 55W P14.5S 4200K H1  автолампа','','P0751W',1,'/images/Product/127/3e14c7606de717390c2489efd261dba1.jpg',3,4,1107.00,1350.00,NULL,1),(128,'Koito 12v 55W P14.5S H1  автолампа','','0457',1,'/images/Product/128/e7c4ba8c7f8aede02d76dbe3708b99a8.jpg',3,4,164.00,235.00,NULL,1),(129,'Koito 12v 55W PX26D 4200K H7  (1 шт) автолампа','','0755W',1,'/images/Product/129/e6d0e43ddacaa9c31503544c5ad5e4d0.jpg',3,4,714.00,900.00,NULL,1),(130,'Koito 12v 55W PX26D 4200K H7  автолампа','','P0755W',1,'/images/Product/130/a94ff96ddf2d04756b5eb7f51175720f.jpg',3,4,1354.00,1700.00,NULL,2),(131,'Koito 12v 55W PX26D H7  автолампа','','0701',1,'/images/Product/131/9704c92b6beabd557c15dd31b480b07d.jpg',3,4,201.00,270.00,NULL,1),(132,'Koito 12v 60/55W P43T 3700К H4  автолампа','','P0746W',1,'/images/Product/132/6c3188e3339ec3f001468b44dc0f1f90.jpg',3,4,926.00,1180.00,NULL,1),(133,'Koito 12v 60/55W P43T 4200K H4  (1штука) автолампа','','0456WB',1,'/images/Product/133/41540802a7c14b5fa2e1ca40bc51a58b.jpg',3,4,295.00,420.00,NULL,1),(135,'Koito 12v 60/55W P43T 4500К H4  автолампа','','P0744W',1,'/images/Product/135/aa7071da80d4877648fcfb44dff97176.jpg',3,4,1098.00,1450.00,NULL,2),(136,'Koito 12v 60/55W P43T H4  автолампа','','0456E',1,'/images/Product/136/eb752309144d661a3183255e0f91b6af.jpg',3,4,115.00,150.00,NULL,2),(137,'Koito 24v 100/90W P43T H4  автолампа','','0499E',1,'/images/Product/137/cb65a3eb77b435fae8ad508e81d0a7a3.jpg',3,4,298.00,390.00,NULL,1),(138,'Koito 24v 75/70W +100% света P43T H4  автолампа','','P0591',1,'/images/Product/138/d77a4f0d89344d3adf17a60e4cff4787.jpg',3,4,1762.00,2050.00,NULL,1),(139,'Koito 24v 75/70W P43T H4  автолампа','','0468E',1,'/images/Product/139/cb32dc76b09b96012a5a2def65da735b.jpg',3,4,245.00,345.00,NULL,1),(140,'Koito 42v 35W P32d-5 D4S  автолампа','','3510K/T',1,'/images/Product/140/89ab34c969a4402bafd5434e4d2a3e24.jpg',3,4,2339.00,2850.00,NULL,1),(141,'Koito 85v 35W P32d-2 D2S  автолампа','','3502K/T',1,'/images/Product/141/2dac1bbc50000c6e610da173e23e06b2.jpg',3,4,2010.00,2450.00,NULL,2),(142,'Koito 85v 35W P32d-3 D2R  автолампа','','3503K/T',1,'/images/Product/142/57f68cbe3f88c34dc12854aaa515b17e.jpg',3,4,2010.00,2450.00,NULL,1),(143,'Koito 12v 19W PGJ19-3 4000KH16  автолампа','','P0749W',1,'/images/Product/143/be2fd2cd5fe0cf5f7e305dc913f01f62.jpg',3,4,1854.00,2300.00,NULL,1),(144,'Koito 12v 19W PGJ19-3 H16  автолампа','','0140',1,'/images/Product/144/d2f5026832594a54061856d95b9f822d.jpg',3,4,485.00,700.00,NULL,1),(145,'Koito 12v 27W (55W) PG13 4000K H27/1   автолампа','','P0728W',1,'/images/Product/145/c92ea7874a94ae528da7687f97d5403b.jpg',3,4,1394.00,1700.00,NULL,1),(146,'Koito 12v 27W (55W) PGJ13 4000K H27/2   автолампа','','P0729W',1,'/images/Product/146/441aebca41096f32e8b6307b16f04686.jpg',3,4,1394.00,1700.00,NULL,1),(147,'Koito 12v 35W PGJ19 4200K H8  автолампа','','P0758W',1,'/images/Product/147/ca83fb95e73ef1fe445c495b78aa1948.jpg',3,4,1805.00,2200.00,NULL,1),(148,'Koito 12v 35W PGJ19 H8  автолампа','','0120',1,'/images/Product/148/a9e2d651f2ef5bce0a611a4b07be0074.jpg',3,4,413.00,560.00,NULL,1),(149,'Koito 12v 55W PGJ19-2 4200K H11  (1шт) автолампа','','0750W',1,'/images/Product/149/b2696bb7cc89bd63dbad4d11933b2746.jpg',3,4,845.00,1050.00,NULL,1),(150,'Koito 12v 55W PGJ19-2 4200K H11  автолампа','','P0750W',1,'/images/Product/150/d008b66717c3e61a513feae72ec6db9e.jpg',3,4,1683.00,2050.00,NULL,2),(151,'Koito 12v 55W PGJ19-2 H11  автолампа','','0110',1,'/images/Product/151/5facba380d41ebd38c79a998269292a4.jpg',3,4,352.00,490.00,NULL,1),(152,'Koito 12v 55W 9006J  автолампа','','0476',1,'/images/Product/152/ef808092046bbe22a5cea2a67d306358.jpg',3,4,303.00,425.00,NULL,1),(153,'Koito 12v 55W P22D 4200К 9006  (1шт) автолампа','','0757W',1,'/images/Product/153/b901746356af5a4e7adc623258f2a379.jpg',3,4,497.00,730.00,NULL,1),(154,'Koito 12v 55W P22D 4200К 9006  автолампа','','P0757W',1,'/images/Product/154/a02d67d186cc862a1a12cd729b5eae48.jpg',3,4,1067.00,1400.00,NULL,1),(155,'Koito 12v 55W P22D 9006  автолампа','','0474',1,'/images/Product/155/ae3d9f99cfc4192dbd032acaaeb9fe6d.jpg',3,4,200.00,280.00,NULL,1),(156,'Koito 12v 60/55W(100/90W) 4000K White Beam  IH01  автолампа','','P0745W',1,'/images/Product/156/b4637391e38371599269356f678da894.jpg',3,4,1530.00,1900.00,NULL,1),(157,'Koito 12v 60W 9005J  автолампа','','0475',1,'/images/Product/157/44b2f510b5d4267844e79895cbd022ba.jpg',3,4,377.00,510.00,NULL,1),(158,'Koito 12v 60W P20D 4200К 9005  автолампа','','P0756W',1,'/images/Product/158/51a9b65c403b51dbb51a544fa650d2b1.jpg',3,4,1149.00,1500.00,NULL,1),(159,'Koito 12v 60W P20D 9005  автолампа','','0473',1,'/images/Product/159/3410f4e0302765284fd0ec37e7eeece0.jpg',3,4,198.00,280.00,NULL,1),(160,'Koito 12v 35W H3D  автолампа','','0459',1,'/images/Product/160/250441dac44973b985b84e1a2343a52e.jpg',3,4,211.00,300.00,NULL,1),(161,'Koito 12v 35W Pk22S H3а  автолампа','','0436',1,'/images/Product/161/b8475845085f96db36227e7f5c905dac.jpg',3,4,244.00,345.00,NULL,1),(162,'Koito 12v 55W 4200K H3C  автолампа','','P0753W',1,'/images/Product/162/aa2c8bce3b76fbdb3b999beac0f956d7.jpg',3,4,1062.00,1400.00,NULL,1),(163,'Koito 12v 55W H3C  автолампа','','0452',1,'/images/Product/163/94018619f29d6548934cedfc844e54a1.jpg',3,4,213.00,290.00,NULL,1),(164,'Koito 12v 55W Pk22S 4200K H3  (1шт) автолампа','','0752W',1,'/images/Product/164/923a11b358038340cfc83bd212da480e.jpg',3,4,412.00,575.00,NULL,1),(165,'Koito 12v 55W Pk22S 4200K H3  автолампа','','P0752W',1,'/images/Product/165/709f5a926723e9735b7fc9f08a931b9b.jpg',3,4,820.00,1100.00,NULL,1),(166,'Koito 12v 55W Pk22S H3  автолампа','','0454',1,'/images/Product/166/7364711f49ae86d814cacf4639b6a10d.jpg',3,4,121.00,170.00,NULL,1),(167,'Koito 12v C10W SV8.5-8 31мм плафона салона  автолампа','','2254',1,'/images/Product/167/26ebf1b94adaddb38a1dbe62e4a8f305.jpg',3,4,34.50,48.00,NULL,1),(168,'Koito 12v C10W SV8.5-8 35мм плафона салона  автолампа','','2258',1,'/images/Product/168/19f1563d153f085ee9d3b1e3f8a05c07.jpg',3,4,30.50,45.00,NULL,1),(170,'Koito 12v C5W SV7 28мм плафона салона  автолампа','','2214',1,'/images/Product/170/6cb86dbc14842a8d0b0c228378d8a55b.jpg',3,4,40.50,55.00,NULL,1),(171,'Koito 12v C5W SV8.5-8 31мм плафона салона  автолампа','','2251',1,'/images/Product/171/3c199a6fd2836a01bc5ef41f8df4babb.jpg',3,4,55.00,75.00,NULL,1),(172,'Koito 12v C5W SV8.5-8 35мм плафона салона  автолампа','','2256',1,'/images/Product/172/0d25c7de534465d07d16ea6a51a8c157.jpg',3,4,41.50,55.00,NULL,1),(173,'Koito 12v C8W SV8.5-8 31мм плафона салона  автолампа','','2252',1,'/images/Product/173/c7b6af6a76a6d994f4c29f2ab7635539.jpg',3,4,47.00,65.00,NULL,1),(174,'Koito 12v T10W G14  автолампа','','1265',1,'/images/Product/174/c26ccd96edb9de254fc2c11ca2fe48e8.jpg',3,4,47.00,65.00,NULL,1),(175,'Koito 12v T8W G14  автолампа','','1264',1,'/images/Product/175/1a990a78f48f58350e77fb8996249e6d.jpg',3,4,33.50,55.00,NULL,1),(176,'Koito 24v C10W SV8.5-8 31мм плафона салона  автолампа','','2354',1,'/images/Product/176/ab37c291e9db5c47f030addfa26220ea.jpg',3,4,51.50,75.00,NULL,1),(177,'Koito 24v C10W SV8.5-8 35мм плафона салона  автолампа','','2358',1,'/images/Product/177/eb16fffa8a5704df9a277596aca6e63d.jpg',3,4,47.00,75.00,NULL,1),(178,'Koito 24v C20W SV8.5-8 41мм плафона салона  автолампа','','2375',1,'/images/Product/178/160f8828ac91b41865ccad00f0f74568.jpg',3,4,60.00,85.00,NULL,1),(179,'Koito 24v C5W SV8.5-8 35мм плафона салона  автолампа','','2356',1,'/images/Product/179/d7f685f7611d025ff3d5d7a2023c9c9a.jpg',3,4,47.00,75.00,NULL,1),(180,'Koito 24v T6W G14  автолампа','','1363',1,'/images/Product/180/aa1932599ddf336ba34b8b0ba3307756.jpg',3,4,39.00,60.00,NULL,1),(181,'Koito 12v P21/5W BAY15D  автолампа','','4524',1,'/images/Product/181/6e8f4ea4cd1a3b6ec9c764e0d88fdcd2.jpg',3,4,30.50,45.00,NULL,1),(182,'Koito 12v P21W BA15S  автолампа','','4514',1,'/images/Product/182/9ef76ac51da8120fd16a198a7cec39e8.jpg',3,4,31.50,46.00,NULL,1),(183,'Koito 12v P27/8W BAY15D  автолампа','','4536',1,'/images/Product/183/c4c7e95154e394080f1e72d13226435c.jpg',3,4,61.50,85.00,NULL,1),(184,'Koito 12v P27W BA15S  автолампа','','4574',1,'/images/Product/184/5fdb16fc269953009b00dfcbae315afe.jpg',3,4,52.00,75.00,NULL,1),(185,'Koito 12v P27W BA15S оранжевая   автолампа','','4574A',1,'/images/Product/185/cc696798491d585e2ca178674a398b35.jpg',3,4,77.00,120.00,NULL,1),(186,'Koito 12v P35W BA15S  автолампа','','4519',1,'/images/Product/186/52a94b5cb2f7ab2f4faacc09c40ce09d.jpg',3,4,52.50,75.00,NULL,1),(187,'Koito 12v P35W BA15S желтая  автолампа','','4519Y',1,'/images/Product/187/1a0d4b186ad7f2465bf2bf9f88407b33.jpg',3,4,113.50,150.00,NULL,1),(188,'Koito 12v PY21W BAU15S оранжевая  автолампа','','4570A',1,'/images/Product/188/8b11d3f439a06d0ce1a0663edb7d4b97.jpg',3,4,53.00,80.00,NULL,1),(189,'Koito 12v W10W W2.1X9.5D T13  автолампа','','1772',1,'/images/Product/189/70d0f4bdf6e8cb5c7a14d7c7f4a5ef21.jpg',3,4,50.50,70.00,NULL,1),(190,'Koito 12v W16W W2.1X9.5D T16  автолампа','','1781',1,'/images/Product/190/068f027f056883f0e6fcc9e688a59ba3.jpg',3,4,30.00,45.00,NULL,1),(191,'Koito 12v W21/5W W3X16Q T20  автолампа','','1891',1,'/images/Product/191/4b9e79b0589966347ce3b27fa566ef8c.jpg',3,4,57.00,80.00,NULL,2),(192,'Koito 12v W21W W3X16D T20  автолампа','','1881',1,'/images/Product/192/63a46b56ddcd87c130230e672bc8601d.jpg',3,4,49.00,70.00,NULL,1),(193,'Koito 12v W21W W3X16D оранжевая T20  автолампа','','1870A',1,'/images/Product/193/17bab74bd293126ee4733cd29cb24aab.jpg',3,4,64.50,90.00,NULL,1),(194,'Koito 24v P25/10W BAY15D  автолампа','','4722',1,'/images/Product/194/e79f79cd13fa9975ca790e6790d2fa48.jpg',3,4,60.00,85.00,NULL,1),(195,'Koito 24v P25W BA15S  автолампа','','4616',1,'/images/Product/195/fe6916a61399755a9922b4ab95626004.jpg',3,4,48.00,65.00,NULL,1),(196,'Koito 24v P35W BA15S  автолампа','','4619',1,'/images/Product/196/0a241d7cc3304383c4333124d19a83d4.jpg',3,4,62.00,86.00,NULL,1),(197,'Koito 24v P35W BA15S желтая  автолампа','','4620Y',1,'/images/Product/197/50d31976c43cc3cd4958ed468a9cc037.jpg',3,4,106.00,145.00,NULL,1),(198,'Koito 24v PY21W BA15S оранжевая  автолампа','','4670A',1,'/images/Product/198/86934079daded1cabd8828ff1bdba6c9.jpg',3,4,95.00,130.00,NULL,1),(199,'Koito 24v R12W BA15S  автолампа','','3643',1,'/images/Product/199/feba7d29c7b98d89bed82021989f95cb.jpg',3,4,34.50,48.00,NULL,1),(200,'Koito 24v R5W BA15S  автолампа','','3630',1,'/images/Product/200/e7a4ae384ff8eb7e154d4a65f602efa6.jpg',3,4,54.00,75.00,NULL,1),(201,'Koito 12v W1,2W W2X4.6D T5  автолампа','','1584',1,'/images/Product/201/afb88d93f535b69598c4f7ab48cb7cc7.jpg',3,4,22.00,30.00,NULL,1),(202,'Koito 12v W1,7W W2.1X9.5D T10  автолампа','','1589',1,'/images/Product/202/448be4e4869418febf8e38415d0322a2.jpg',3,4,26.50,40.00,NULL,1),(203,'Koito 12v W3W W2X4.6D T7  автолампа','','1590',1,'/images/Product/203/8809dbe6d656eaeadb2de37cb44b6d30.jpg',3,4,38.00,50.00,NULL,1),(204,'Koito 12v W3W W2X4.6D T7(T6.5)  автолампа','','8212',1,'/images/Product/204/18411e10881f4caee8439accdff3ae45.jpg',3,4,45.00,60.00,NULL,1),(205,'Koito 12v W5W W2.1X9.5D T10  автолампа','','1583',1,'/images/Product/205/41132791c85eeff662bf08762548707b.jpg',3,4,14.50,25.00,NULL,2),(206,'Koito 12v W5W W2.1X9.5D T10 4200K  автолампа','','P8813Z',1,'/images/Product/206/30a46cb81d0be1d330bafa71b5ffab81.jpg',3,4,176.00,220.00,NULL,1),(207,'Koito 12v W5W W2.1X9.5D T10 Long Life   автолампа','','1588',1,'/images/Product/207/d58d916f3ea6931aafee38519d8ecf4e.jpg',3,4,45.00,60.00,NULL,1),(208,'Koito 12v W5W W2.1X9.5D T10 оранжевая  автолампа','','1579A',1,'/images/Product/208/a792fedc0812b6371b0d2a14d4de13b8.jpg',3,4,43.00,58.00,NULL,1),(209,'Koito 12v W8W W2.1X9.5D T10   автолампа','','1586',1,'/images/Product/209/a6a4acb0e0b181137a5baeace184c04e.jpg',3,4,25.50,36.00,NULL,1),(210,'Koito 14v 0,8W T3.4  щитка приборов в сборе  автолампа','','1592',1,'/images/Product/210/8d5d76284f921aaf49b9340fc2e942ff.jpg',3,4,50.50,65.00,NULL,1),(211,'Koito 14v 0,8W T5.1  щитка приборов в сборе  автолампа','','1567',1,'/images/Product/211/911e28cf9d20a0e79fb6d6471bd2a3c7.jpg',3,4,73.00,88.00,NULL,1),(212,'Koito 14v 1,4W T4.2  щитка приборов в сборе  автолампа','','1564',1,'/images/Product/212/c970afaae5ff0d0d4a1a1a03e1495ff4.jpg',3,4,62.00,80.00,NULL,1),(213,'Koito 14v 1,4W T4.7  щитка приборов в сборе  автолампа','','1587',1,'/images/Product/213/db9b0ad7f66b68f1b431154269189939.jpg',3,4,48.00,62.00,NULL,1),(214,'Koito 14v 1,75W T5.1  щитка приборов в сборе  автолампа','','1566',1,'/images/Product/214/cd6a3bde82c70cb3c657dcac108ab16f.jpg',3,4,46.00,60.00,NULL,1),(215,'Koito 14v 100mA T4.2  щитка приборов в сборе  автолампа','','1565',1,'/images/Product/215/575189a1248b1d9ea4efdc1809cf18e5.jpg',3,4,61.50,80.00,NULL,1),(216,'Koito 14v 100mA T4.2  щитка приборов в сборе E1571 автолампа','','E1571',1,'/images/Product/216/c1195f8a02ff5f071d3d7d5df779642b.jpg',3,4,62.00,80.00,NULL,1),(217,'Koito 14v 100mA T4.2  щитка приборов в сборе  автолампа','','E1590',1,'/images/Product/217/c4625758f47d80860447790ed5e8d242.jpg',3,4,29.00,39.00,NULL,1),(218,'Koito 14v 100mA T4.8  щитка приборов в сборе  автолампа','','E1581',1,'/images/Product/218/71adae9f7df3635edc74bd304fda4fcd.jpg',3,4,53.00,72.00,NULL,1),(219,'Koito 14v 214mA T6.7  щитка приборов в сборе  автолампа','','15500',1,'/images/Product/219/75a066f03d800619cda9788249e46ae8.jpg',3,4,39.00,60.00,NULL,1),(220,'Koito 12v W5W W2.1X9.5D T10 зеленая   автолампа','','P1583G',1,'/images/Product/220/911d7cb3455f63be3b79a50da1582337.jpg',3,4,82.00,110.00,NULL,1),(221,'Koito 12v W5W W2.1X9.5D T10 красная  автолампа','',' P1583R',1,'/images/Product/221/135f8ac235a044aba51e9e4d1178e09a.jpg',3,4,82.00,110.00,NULL,1),(222,'Koito 12v W5W W2.1X9.5D T10 синяя  автолампа','',' P1583B',1,'/images/Product/222/3cce4f6bd19f83233d4d294b01bd9933.jpg',3,4,82.00,110.00,NULL,1),(223,'Koito 14v 30mA T3  щитка приборов в сборе  автолампа','','E1540',1,'/images/Product/223/a5fea123b7dcfa5b2c7dfccc308395ab.jpg',3,4,62.00,80.00,NULL,1),(224,'Koito 14v 40mA T3  щитка приборов в сборе  автолампа','','1560',1,'/images/Product/224/f852f689bed0f8156dd49b7779ed925c.jpg',3,4,61.50,80.00,NULL,1),(225,'Koito 14v 40mA T3  щитка приборов в сборе  автолампа','','1561',1,'/images/Product/225/be56f5e01672bba3dff24406f4f4ef6d.jpg',3,4,61.50,80.00,NULL,1),(226,'Koito 14v 50mA T3  щитка приборов в сборе  автолампа','','E1542',1,'/images/Product/226/38f898e2c0a8726f745720682dfc6a8d.jpg',3,4,49.00,62.00,NULL,1),(227,'Koito 14v 50mA T3  щитка приборов в сборе  автолампа','','E1544',1,'/images/Product/227/7d7cd682721e4fad8e3dc10474355ba3.jpg',3,4,62.00,80.00,NULL,1),(228,'Koito 14v 50mA T4.2  щитка приборов в сборе  автолампа','','E1531',1,'/images/Product/228/c21c7b11aa579cc163544e61f65d0bf7.jpg',3,4,53.00,72.00,NULL,1),(229,'Koito 14v 60mA T3  щитка приборов в сборе  автолампа','','1562',1,'/images/Product/229/d1a42b3e0dcd29546e974f2ac917bb97.jpg',3,4,62.50,80.00,NULL,1),(230,'Koito 14v 60mA T3  щитка приборов в сборе  автолампа','','E1545',1,'/images/Product/230/131f592c9ca577e701ccd518f9461cc3.jpg',3,4,49.00,62.00,NULL,1),(231,'Koito 14v 60mA T3  щитка приборов в сборе  автолампа','','E1546',1,'/images/Product/231/8b3a58d9954bc86865e3c07f6bddee3e.jpg',3,4,62.00,80.00,NULL,1),(232,'Koito 14v 60mA T3  щитка приборов в сборе  автолампа','','E1548',1,'/images/Product/232/1928c08b68d2a712fa435f2f3052c23f.jpg',3,4,49.00,62.00,NULL,1),(233,'Koito 14v 60mA T4.2  щитка приборов в сборе  автолампа','','1563',1,'/images/Product/233/5bda1771efa9240a722830e739a284e3.jpg',3,4,48.00,60.00,NULL,1),(234,'Koito 14v 80mA T4.2  щитка приборов в сборе  автолампа','','E1533',1,'/images/Product/234/0fa2fa158f55ad047149871b31736bb4.jpg',3,4,53.00,75.00,NULL,1),(235,'Koito 14v 80mA T4.2  щитка приборов в сборе  автолампа','','E1535',1,'/images/Product/235/1e581bbef6e3151a993610055d66f64d.jpg',3,4,53.00,75.00,NULL,1),(236,'Koito 14v 80mA T4.2  щитка приборов в сборе  автолампа','','E1536',1,'/images/Product/236/842c14e7753dfe1dc1129476659f839f.jpg',3,4,49.00,62.00,NULL,1),(237,'Koito 14v 80mA T4.2  щитка приборов в сборе  автолампа','','E1537',1,'/images/Product/237/d73724253ea651194b458cb010a013c7.jpg',3,4,56.00,75.00,NULL,1),(238,'Koito 14v 80mA T4.2  щитка приборов в сборе  автолампа','','E1570',1,'/images/Product/238/f2c578c813a5b48b200d64689a5eead5.jpg',3,4,62.00,80.00,NULL,1),(239,'Koito 14v 80mA T4.8  щитка приборов в сборе автолампа','','E1580',1,'/images/Product/239/ff535cc5d2cad730279d5fe938a144d2.jpg',3,4,56.00,75.00,NULL,1),(240,'Koito 24v 1,4W T4.7 щитка приборов в сборе  автолампа','','1684',1,'/images/Product/240/4a57a5343208bbad266ba511980ac267.jpg',3,4,54.00,70.00,NULL,1),(241,'Koito 24v 1,4W T4.7 щитка приборов в сборе  автолампа','','1685G',1,'/images/Product/241/3e98d2fea792ea50332120a722280e75.jpg',3,4,87.50,110.00,NULL,1),(242,'Koito 24v W1,2W W2X4.6D T5  автолампа','','1682',1,'/images/Product/242/93bd0cc4e3463f8f7250bab37c60d920.jpg',3,4,41.50,55.00,NULL,1),(243,'Koito 24v W1,8W W2X4.6D T5  автолампа','','1688',1,'/images/Product/243/8ed4c8e00969a3586c7bb347761b106b.jpg',3,4,44.50,60.00,NULL,1),(244,'Koito 24v W3W W2.1X9.5D T10  автолампа','','1681',1,'/images/Product/244/20880659bfa216e900537f11c863ec51.jpg',3,4,21.50,35.00,NULL,1),(245,'Koito 24v W3W W2X4.6D T7  автолампа','','1687',1,'/images/Product/245/68473db86c53dcf40a6163b04a1fe191.jpg',3,4,39.00,50.00,NULL,1),(246,'Koito 24v W5W W2.1X9.5D T10  автолампа','','1683',1,'/images/Product/246/9ae6667b60cf8d4a4fbd1fe14a04bb81.jpg',3,4,22.50,35.00,NULL,1),(247,'Koito 28v 30mA T4.2  щитка приборов в сборе  автолампа','','E1660',1,'/images/Product/247/92a5e5e82156d3024f343ce17ea64e7a.jpg',3,4,49.00,62.00,NULL,1),(248,'Koito 28v 40mA T3  щитка приборов в сборе  автолампа','','E1543',1,'/images/Product/248/438b85eb078dbf2fae2dbe1b898346f3.jpg',3,4,49.00,62.00,NULL,1),(249,'Koito 28v 50mA T4.2  щитка приборов в сборе автолампа','',' E1661',1,'/images/Product/249/a204b8997414eee7f6f25e7fc28bfe32.jpg',3,4,53.00,70.00,NULL,1),(250,'Koito 28v 65mA T4.8  щитка приборов в сборе  автолампа','','E1663',1,'/images/Product/250/8b98879f056d92240fcb110b5bf31d1a.jpg',3,4,50.00,65.00,NULL,1),(251,'Koito T10 зеленый светофильтр автолампы ','','P7150G',1,'/images/Product/251/a953173d3b450a4473519f4eeb8c0d65.jpg',3,4,11.80,17.00,NULL,1),(252,'Koito T10 красный светофильтр автолампы ','','P7150R',1,'/images/Product/252/bc6e15b66cbaf56228a594030c05f5ac.jpg',3,4,12.20,17.00,NULL,1),(253,'Koito T10 оранжевый светофильтр автолампы ','','P7150Y',1,'/images/Product/253/822e47abf7ec0432c74d6e977856c05d.jpg',3,4,17.00,12.20,NULL,1),(254,'Koito T10 синий светофильтр автолампы ','','P7150B',1,'/images/Product/254/d759ba8bf0abb43b7c57d0fa71cb69cd.jpg',3,4,12.20,17.00,NULL,1),(255,'Koito T3 синий светофильтр автолампы','',' P7350B',1,'/images/Product/255/1afe7d4936f9231ab83ff4ba4c44a480.jpg',3,4,17.60,25.00,NULL,1),(256,'Koito T3 зеленый светофильтр автолампы ','','P7350G',1,'/images/Product/256/3248a458e020f854debb9f3ba7287d12.jpg',3,4,17.60,25.00,NULL,1),(257,'Koito T3 красный светофильтр автолампы ','','P7350R',1,'/images/Product/257/9cd40020bb5ff6a4c19f5087b5b00a08.jpg',3,4,17.60,25.00,NULL,1),(258,'Koito T3 оранжевый светофильтр автолампы ','','P7350Y',1,'/images/Product/258/447e48673604b27bb9d3dece75e571da.jpg',3,4,17.60,25.00,NULL,1),(259,'Koito T5 зеленый светофильтр автолампы ','','P7550G',1,'/images/Product/259/f3bbca88a37d0126f56e6b398032ea19.jpg',3,4,12.20,17.00,NULL,1),(260,'Koito T5 красный светофильтр автолампы ','','P7550R',1,'/images/Product/260/9874db560a44269e1bd98c94902475a7.jpg',3,4,12.20,17.00,NULL,1),(261,'Koito T5 синий светофильтр автолампы ','','P7550B',1,'/images/Product/261/0d2bad40522965b27f1341d44affd3cb.jpg',3,4,12.20,17.00,NULL,1),(262,'Koito разъем лампы Н3С ','','С0452',1,'/images/Product/262/04e06e0053055531f2bc6fb6045f8fb0.jpg',3,4,160.00,225.00,NULL,1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rel_order_product`
--

DROP TABLE IF EXISTS `rel_order_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rel_order_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `price` decimal(12,2) unsigned DEFAULT '0.00',
  `quantity` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_rel_order_product_order_id` (`order_id`),
  KEY `fk_rel_order_product_product_id` (`product_id`),
  CONSTRAINT `fk_rel_order_product_order_id` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_rel_order_product_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Связь заказов и товаров';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel_order_product`
--

LOCK TABLES `rel_order_product` WRITE;
/*!40000 ALTER TABLE `rel_order_product` DISABLE KEYS */;
INSERT INTO `rel_order_product` VALUES (1,2,261,17.00,1),(2,2,260,17.00,4),(3,2,258,25.00,3),(4,3,262,225.00,1),(5,3,261,17.00,1),(6,3,260,17.00,1);
/*!40000 ALTER TABLE `rel_order_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rel_producer_sub_category`
--

DROP TABLE IF EXISTS `rel_producer_sub_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rel_producer_sub_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `producer_id` int(10) unsigned DEFAULT NULL,
  `sub_category_id` int(6) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rel_producer_sub_category_producer_id` (`producer_id`),
  KEY `fk_rel_producer_sub_category_sub_category_id` (`sub_category_id`),
  CONSTRAINT `fk_rel_producer_sub_category_producer_id` FOREIGN KEY (`producer_id`) REFERENCES `producer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_rel_producer_sub_category_sub_category_id` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Связь производителей и категорий';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel_producer_sub_category`
--

LOCK TABLES `rel_producer_sub_category` WRITE;
/*!40000 ALTER TABLE `rel_producer_sub_category` DISABLE KEYS */;
INSERT INTO `rel_producer_sub_category` VALUES (1,5,1);
/*!40000 ALTER TABLE `rel_producer_sub_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rel_product_subcategory`
--

DROP TABLE IF EXISTS `rel_product_subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rel_product_subcategory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned DEFAULT NULL,
  `sub_category_id` int(6) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rel_product_subcategory_sub_category_id` (`sub_category_id`),
  KEY `fk_rel_product_subcategory_product_id` (`product_id`),
  CONSTRAINT `fk_rel_product_subcategory_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_rel_product_subcategory_sub_category_id` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=479 DEFAULT CHARSET=utf8 COMMENT='Связь товаров и подкатегорий';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel_product_subcategory`
--

LOCK TABLES `rel_product_subcategory` WRITE;
/*!40000 ALTER TABLE `rel_product_subcategory` DISABLE KEYS */;
INSERT INTO `rel_product_subcategory` VALUES (2,5,1),(6,6,1),(7,7,1),(8,8,1),(9,9,1),(10,10,1),(11,11,1),(12,12,1),(13,13,1),(14,14,1),(15,15,1),(16,16,1),(20,18,1),(21,19,1),(22,20,1),(23,21,1),(24,22,1),(25,23,1),(26,24,1),(27,25,1),(28,26,1),(29,27,1),(30,28,1),(31,29,1),(33,31,1),(34,32,1),(35,33,1),(36,34,1),(37,36,1),(38,37,1),(39,38,1),(41,40,1),(42,41,1),(43,42,1),(44,43,1),(45,44,1),(46,45,1),(47,46,1),(48,47,1),(49,48,1),(50,49,1),(51,50,1),(52,51,1),(53,52,1),(54,53,1),(55,54,1),(56,55,1),(57,56,1),(58,57,1),(59,58,1),(60,59,1),(61,60,1),(62,61,1),(63,62,1),(64,63,1),(65,64,1),(66,65,1),(67,66,1),(72,68,1),(73,69,1),(74,70,1),(75,71,1),(76,72,1),(77,73,1),(78,74,1),(79,75,1),(80,76,1),(81,77,1),(82,78,1),(83,79,1),(84,80,1),(85,81,1),(86,82,1),(87,83,1),(88,84,1),(89,85,1),(90,86,1),(91,88,1),(92,89,1),(93,90,1),(94,91,1),(95,92,1),(96,93,1),(97,94,1),(98,95,1),(99,96,1),(100,97,1),(101,98,1),(102,99,1),(103,100,1),(104,101,1),(105,102,1),(106,103,1),(107,104,1),(108,105,1),(109,106,1),(110,107,1),(111,108,1),(112,109,1),(113,110,1),(114,111,1),(115,112,1),(116,113,1),(117,114,1),(118,115,1),(119,116,1),(120,117,1),(121,118,1),(122,119,1),(123,120,1),(124,121,1),(125,122,1),(126,123,1),(127,124,1),(174,30,1),(182,137,2),(184,125,2),(186,139,2),(188,166,2),(190,163,2),(192,161,2),(194,160,2),(196,159,2),(198,157,2),(200,155,2),(202,152,2),(204,128,2),(206,39,1),(208,167,2),(210,165,2),(212,164,2),(214,162,2),(216,158,2),(220,156,2),(222,154,2),(224,153,2),(226,151,2),(234,149,2),(236,148,2),(238,147,2),(241,146,2),(243,145,2),(245,144,2),(247,142,2),(253,140,2),(257,133,2),(259,132,2),(261,131,2),(265,129,2),(267,127,2),(269,126,2),(270,143,2),(274,168,2),(278,170,2),(280,171,2),(282,172,2),(284,173,2),(287,174,2),(289,175,2),(291,176,2),(293,177,2),(295,178,2),(297,179,2),(299,180,2),(301,181,2),(303,182,2),(305,183,2),(307,184,2),(309,185,2),(311,186,2),(313,187,2),(316,188,2),(318,189,2),(320,190,2),(324,192,2),(326,193,2),(328,194,2),(330,195,2),(332,196,2),(334,197,2),(336,198,2),(338,199,2),(340,200,2),(342,201,2),(344,202,2),(346,203,2),(348,204,2),(352,206,2),(354,207,2),(356,208,2),(358,209,2),(360,210,2),(362,211,2),(364,212,2),(366,213,2),(368,214,2),(370,215,2),(372,216,2),(374,217,2),(376,218,2),(378,219,2),(380,220,2),(382,221,2),(384,222,2),(386,223,2),(390,225,2),(392,226,2),(394,227,2),(396,228,2),(398,229,2),(400,224,2),(404,230,2),(406,231,2),(408,232,2),(410,233,2),(412,234,2),(414,235,2),(416,236,2),(418,237,2),(420,238,2),(422,239,2),(424,240,2),(426,241,2),(428,242,2),(430,243,2),(432,244,2),(434,245,2),(436,246,2),(438,247,2),(440,248,2),(442,249,2),(444,250,2),(447,251,2),(449,252,2),(451,253,2),(453,254,2),(455,255,2),(457,256,2),(459,257,2),(461,258,2),(463,259,2),(465,260,2),(467,261,2),(469,262,2),(470,205,2),(471,191,2),(472,150,2),(473,141,2),(475,138,2),(476,130,2),(477,136,2),(478,135,2);
/*!40000 ALTER TABLE `rel_product_subcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `text` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Общие страницы';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'Оффлайн заказ','<p>\r\n	Оффлайн заказ</p>\r\n'),(2,'Каталоги','<p>\r\n	Каталоги</p>\r\n'),(3,'Доставка','<p>\r\n	Доставка пока недоступна</p>\r\n'),(4,'О компании','<p>\r\n	Напишите сюда что-нибудь</p>\r\n'),(5,'Наш офис','Наш офис'),(6,'Телефоны','Телефоны');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_category` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `category_id` int(4) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sub_category_category_id` (`category_id`),
  CONSTRAINT `fk_sub_category_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='Подкатегории';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_category`
--

LOCK TABLES `sub_category` WRITE;
/*!40000 ALTER TABLE `sub_category` DISABLE KEYS */;
INSERT INTO `sub_category` VALUES (1,'Osram',1,3),(2,'Koito',1,3),(3,'Eagleye',1,3),(4,'Narva',1,3),(5,'Philips',1,3),(6,'Polarg',1,3),(7,'Led',1,3),(8,'Car Freshner',1,3),(9,'Contex',1,3),(10,'Держатели, разъемы автоламп',1,3),(11,'Предохранители MTA',1,3);
/*!40000 ALTER TABLE `sub_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_migration`
--

DROP TABLE IF EXISTS `tbl_migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_migration`
--

LOCK TABLES `tbl_migration` WRITE;
/*!40000 ALTER TABLE `tbl_migration` DISABLE KEYS */;
INSERT INTO `tbl_migration` VALUES ('m000000_000000_base',1448372499),('m140619_083804_create_database',1448372501),('m140621_120159_add_user_admin',1448372501),('m140622_082005_insertCategories',1448372501),('m140623_131515_addAreas',1448372501),('m140629_082509_add_settings',1448372501);
/*!40000 ALTER TABLE `tbl_migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `fio` varchar(200) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `area` int(10) unsigned DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '2',
  `role` int(2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index_email` (`email`),
  KEY `index_role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Пользователи';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin@svetofor.ru','202cb962ac59075b964b07152d234b70','adm','22222222',54,'','',1,1),(2,'leva2108@mail.ru','a7a3ca78e824b4467effc49b78c62784','Бурулева','89087039868',74,'Миасс','',2,2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-08 17:09:08
