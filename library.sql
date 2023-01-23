-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: library
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors` (
  `id` varchar(256) NOT NULL,
  `name` varchar(16) NOT NULL,
  `surname` varchar(16) NOT NULL,
  `bio` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES ('125272470063cc10309fe052.53232111','Robert','Greene','Author of the 48 Law','2023-01-21 16:17:52',NULL,0,NULL),('168233097463cece1e521d85.34920208','William','Shakespear','My greatest author','2023-01-23 18:12:46',NULL,0,NULL),('170423636363cec8462580c9.84592678','James','Allen','Author of rules of l','2023-01-23 17:47:50',NULL,0,NULL),('192389517663c8315390a8c7.71245432','Lesly','Eke','\r\nWords\r\nBytes\r\nList','2023-01-18 17:50:11','2023-01-18 06:23:49',1,'2023-01-22 05:24:19'),('207526790863cecd1222fd93.33440225','Richard','Templar','British Author','2023-01-23 18:08:18',NULL,0,NULL),('209470578463cd75161731f0.27827580','Lily','Titus','A small Girl','2023-01-22 17:40:38',NULL,1,'2023-01-22 05:40:45'),('2184780263cec71847a4e2.73488392','Brian','Tracy','Best selling author','2023-01-23 17:42:48',NULL,0,NULL),('28603431863c831b7195d86.02302127','Lily','Titus','\r\nParagraphs\r\nWords\r','2023-01-18 17:51:51',NULL,1,'2023-01-22 05:24:35'),('47613632063cec67faf31c9.59053738','Tony','Robbins','Author of awaken the','2023-01-23 17:40:15',NULL,0,NULL),('47995305063cec7010707e2.75385231','Donald','Trump','Business man and pol','2023-01-23 17:42:25',NULL,0,NULL),('64221023063cec6cc64f2d2.79003053','Robert','Kiyosaki','Author of Finance Bo','2023-01-23 17:41:32','2023-01-23 05:41:59',0,NULL),('93746592863cb28fd445513.56061879','Jordan','Peterson','Turpis montes aliqua','2023-01-20 23:51:25','2023-01-21 00:07:38',0,NULL);
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_category`
--

DROP TABLE IF EXISTS `book_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_category` (
  `id` varchar(256) NOT NULL,
  `book` varchar(256) NOT NULL,
  `category` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_category`
--

LOCK TABLES `book_category` WRITE;
/*!40000 ALTER TABLE `book_category` DISABLE KEYS */;
INSERT INTO `book_category` VALUES ('115400580063cecd5fc359c4.10553045','1575548263cecd5fc35814.91429887','148050830863cec6214dd843.84865179'),('124487371063cc1139a35ea8.14726277','103152436763cc1139a35dc2.59568954','108532485263c82137e873c9.54781955'),('125846900663cec9a779d808.73580576','79234218463cec9a779d591.89877200','148050830863cec6214dd843.84865179'),('130810995263cbfd987548a5.87282846','187102285563cbfd987547d0.42433728','155286585463cb153c20de86.06076155'),('139464793763cece8b3fb692.29361028','75384423663cece8b3fb451.89045844','64455433763c81f6950e381.58362358'),('14437365963cec38f8035a7.63041610','26208853663cec38f803425.84106250','12819988663cb111dbef0d2.25750118'),('156891087363cec5ff071622.92420054','5666703563cec5ff071471.65853478','108532485263c82137e873c9.54781955'),('189680569263cec81f786633.18582656','211875591163cec81f786538.89984852','148050830863cec6214dd843.84865179'),('19001496463cece063e62a0.51072754','78791095563cece063e6135.70792191','148050830863cec6214dd843.84865179'),('192089515363cc117ec8d2a2.72961596','3485592463cc117ec8d166.80418106','108532485263c82137e873c9.54781955'),('23722948863cecc78aeaf80.52236196','27953234463cecc78aeadd8.14733188','148050830863cec6214dd843.84865179'),('36510378963cd7629e66643.83210239','147383679463cd7629e66535.30180398','117903684663cb10a318be62.60075152'),('72836780463cec597cfbd15.08396587','51649456263cec597cfbc10.31687872','108532485263c82137e873c9.54781955'),('79641400863cecbbd389b48.49843411','73841180463cecbbd389a17.58884839','134115937463cec63b715185.03102661'),('98146690763cecb1479bea1.16690604','103354835563cecb1479bda5.38215391','134115937463cec63b715185.03102661');
/*!40000 ALTER TABLE `book_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `year_of_publication` year(4) NOT NULL,
  `image` tinytext NOT NULL,
  `page` int(11) NOT NULL,
  `is_deleted` double NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES ('103152436763cc1139a35dc2.59568954','The 48 Laws Of Power',2012,'https://www-konga-com-res.cloudinary.com/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/catalog/product/X/J/165865_1627129153.jpg',200,0,NULL,'2023-01-21 16:22:17',NULL),('103354835563cecb1479bda5.38215391','How to get rich',2004,'https://kbimages1-a.akamaihd.net/4f9632bc-a45d-46d7-9ce4-06848a6368e6/1200/1200/False/trump-how-to-get-rich.jpg',272,0,NULL,'2023-01-23 17:59:48',NULL),('147383679463cd7629e66535.30180398','Lily&#039;s Dairy',2023,'no_image_yet',300,1,'2023-01-22 05:58:11','2023-01-22 17:45:13',NULL),('1575548263cecd5fc35814.91429887','Rules Of Life',2002,'https://miro.medium.com/max/1200/1*JdNhnHevYPs07LYhm4vGVw.jpeg',300,0,NULL,'2023-01-23 18:09:35',NULL),('187102285563cbfd987547d0.42433728','Rule Of Law',1982,'some_url_new',204,1,'2023-01-23 04:23:15','2023-01-21 14:58:32',NULL),('211875591163cec81f786538.89984852','Awaken The Giant Within',1991,'https://bookly.ng/wp-content/uploads/2020/10/awaken-the-giant-within-3.jpg',548,0,NULL,'2023-01-23 17:47:11',NULL),('26208853663cec38f803425.84106250','33 Strategies Of War',2012,'https://www-konga-com-res.cloudinary.com/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/catalog/product/T/h/The-33-Strategies-of-War-by-Robert-Green--8044598.jpg',200,0,NULL,'2023-01-23 17:27:43',NULL),('27953234463cecc78aeadd8.14733188','Goals',2008,'https://kbimages1-a.akamaihd.net/7225e0c0-a205-480b-b04c-e3a3e94ae790/353/569/90/False/goals-15.jpg',203,0,NULL,'2023-01-23 18:05:44',NULL),('3485592463cc117ec8d166.80418106','Laws Of Human Nature',2018,'https://booksumclub.org/wp-content/uploads/2020/06/12.png',302,0,NULL,'2023-01-21 16:23:26',NULL),('51649456263cec597cfbc10.31687872','12 Rules For Life',2018,'https://rhbooks.com.ng/wp-content/uploads/2018/11/Untitled-design-2022-09-14T103336.667.png',120,0,NULL,'2023-01-23 17:36:23',NULL),('5666703563cec5ff071471.65853478','Beyond Order',2021,'https://retala.com.ng/wp-content/uploads/2022/08/202-Jordan-B.-Peterson.jpg',200,0,NULL,'2023-01-23 17:38:07',NULL),('73841180463cecbbd389a17.58884839','Rich Dad Poor Dad',1997,'https://upload.wikimedia.org/wikipedia/en/b/b9/Rich_Dad_Poor_Dad.jpg',300,0,NULL,'2023-01-23 18:02:37',NULL),('75384423663cece8b3fb451.89045844','Julius Caeser',0000,'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1631505382l/13006._SX318_.jpg',300,0,NULL,'2023-01-23 18:14:35',NULL),('78791095563cece063e6135.70792191','Phycology Of Selling',2000,'https://images.librarywala.com/book/medium/the-psychology-of-selling-original-imadbfhzga9xf8gw.jpeg',500,0,NULL,'2023-01-23 18:12:22',NULL),('79234218463cec9a779d591.89877200','As a man thinket',1903,'https://m.media-amazon.com/images/I/51tiopcLhuS._SX460_BO1,204,203,200_.jpg',33,0,NULL,'2023-01-23 17:53:43',NULL);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books_author`
--

DROP TABLE IF EXISTS `books_author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books_author` (
  `id` varchar(256) NOT NULL,
  `book` varchar(256) NOT NULL,
  `author` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books_author`
--

LOCK TABLES `books_author` WRITE;
/*!40000 ALTER TABLE `books_author` DISABLE KEYS */;
INSERT INTO `books_author` VALUES ('111682432263cece063e6260.23042886','78791095563cece063e6135.70792191','2184780263cec71847a4e2.73488392'),('126352447463cec81f786619.85836171','211875591163cec81f786538.89984852','47613632063cec67faf31c9.59053738'),('132207715163cecd5fc35994.31486099','1575548263cecd5fc35814.91429887','207526790863cecd1222fd93.33440225'),('139796426863cc1139a35e86.87265023','103152436763cc1139a35dc2.59568954','125272470063cc10309fe052.53232111'),('162328953163cec9a779d7b9.65138259','79234218463cec9a779d591.89877200','170423636363cec8462580c9.84592678'),('163320302763cecbbd389b12.96441244','73841180463cecbbd389a17.58884839','64221023063cec6cc64f2d2.79003053'),('168973185363cece8b3fb652.34533786','75384423663cece8b3fb451.89045844','168233097463cece1e521d85.34920208'),('181707092663cc117ec8d285.91595883','3485592463cc117ec8d166.80418106','125272470063cc10309fe052.53232111'),('181741135863cecc78aeaf47.26993438','27953234463cecc78aeadd8.14733188','2184780263cec71847a4e2.73488392'),('196903628663cd7629e66616.45573969','147383679463cd7629e66535.30180398','125272470063cc10309fe052.53232111'),('32211536263cbfd98754877.55860619','187102285563cbfd987547d0.42433728','93746592863cb28fd445513.56061879'),('33766806463cec597cfbce8.63564286','51649456263cec597cfbc10.31687872','93746592863cb28fd445513.56061879'),('4309543363cecb1479be81.43054081','103354835563cecb1479bda5.38215391','47995305063cec7010707e2.75385231'),('80848821963cec38f803567.60922800','26208853663cec38f803425.84106250','125272470063cc10309fe052.53232111'),('9117382763cec5ff0715e3.46406344','5666703563cec5ff071471.65853478','93746592863cb28fd445513.56061879');
/*!40000 ALTER TABLE `books_author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES ('105291691663cb1228670617.11045004','Sports','2023-01-20 22:14:00',NULL,0,NULL),('108532485263c82137e873c9.54781955','Strategy','2023-01-18 16:41:27',NULL,0,NULL),('115457874663cb13786372c2.74869693','Goofy','2023-01-20 22:19:36',NULL,1,'2023-01-22 05:08:33'),('116007124663cb15553db194.26407532','Machines','2023-01-20 22:27:33',NULL,0,NULL),('117903684663cb10a318be62.60075152','Poetry','2023-01-20 22:07:31',NULL,0,NULL),('121731121763cb1295bb44e0.69059573','Games','2023-01-20 22:15:49',NULL,1,'2023-01-22 05:05:21'),('124758365063cb13883badd5.44845258','Goofy','2023-01-20 22:19:52',NULL,1,'2023-01-22 05:08:25'),('12819988663cb111dbef0d2.25750118','Warfare','2023-01-20 22:09:33',NULL,0,NULL),('134115937463cec63b715185.03102661','Finance','2023-01-23 17:39:07',NULL,0,NULL),('145888507763cb1262aae088.21373567','Commerce','2023-01-20 22:14:58','2023-01-21 11:05:05',1,'2023-01-22 05:37:36'),('146547649663cb151810ff07.43601906','Mao','2023-01-20 22:26:32',NULL,1,'2023-01-22 05:09:34'),('148050830863cec6214dd843.84865179','Self Improvement','2023-01-23 17:38:41',NULL,0,NULL),('155286585463cb153c20de86.06076155','Government','2023-01-20 22:27:08',NULL,0,NULL),('1728863c825e73879f9.13670183','Science','2023-01-18 17:01:27',NULL,0,NULL),('182994480963cb12707ef128.71173427','Games','2023-01-20 22:15:12',NULL,1,'2023-01-22 05:08:41'),('188232416763cec632692802.43797625','Business','2023-01-23 17:38:58',NULL,0,NULL),('192385496863cb1394dc4957.96467307','Loop','2023-01-20 22:20:04',NULL,1,'2023-01-22 05:08:48'),('206334893163cec72535aa19.13609389','Sales','2023-01-23 17:43:01',NULL,0,NULL),('208145993963cb129e2fc004.93213082','Title','2023-01-20 22:15:58',NULL,1,'2023-01-22 05:09:17'),('44222793363cb13048a2cd0.79596045','Spells','2023-01-20 22:17:40','2023-01-21 11:04:46',1,'2023-01-22 05:09:03'),('64455433763c81f6950e381.58362358','Literature','2023-01-18 16:33:45',NULL,0,NULL),('78209932063c825ef399708.87006350','Technology','2023-01-18 17:01:35',NULL,0,NULL),('7921781363cb12e096c780.65811220','Title','2023-01-20 22:17:04',NULL,1,'2023-01-22 05:09:24');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `user` varchar(256) NOT NULL,
  `book` varchar(256) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `approved_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES ('107431079063cd5c26d1ddd6.43752682','I really love this book','46114253463cc0efbcbe798.28471440','103152436763cc1139a35dc2.59568954','2023-01-22 15:54:14',NULL,'2023-01-22 06:30:06',1,1,'2023-01-22 06:21:09'),('120096697963cd95efe6a754.64053169','some new comment','46114253463cc0efbcbe798.28471440','103152436763cc1139a35dc2.59568954','2023-01-22 20:00:47',NULL,'2023-01-22 08:06:20',0,1,'2023-01-22 10:26:52');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes` (
  `id` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `user` varchar(256) NOT NULL,
  `book` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES ('10316371263cd948e292886.25928447','Lorem ipsum dolor sit amet consectetur adipiscing elit luctus montes, tristique egestas nec maecenas faucibus habitant a tempor hendrerit, lacus pellentesque pulvinar integer gravida orci id parturient. Enim molestie luctus proin interdum mus mi lacinia class, platea vehicula aenean cursus augue dictumst lectus est mattis, pellentesque malesuada maecenas venenatis phasellus massa rutrum. Risus sollicitudin semper volutpat iaculis curae posuere non netus lobortis interdum eros','46114253463cc0efbcbe798.28471440','103152436763cc1139a35dc2.59568954','2023-01-22 19:54:54',NULL,NULL,0),('122433209263cd8b2dc19be9.17359781','Lorem ipsum dolor sit amet consectetur adipiscing, elit donec morbi nunc taciti aliquam, enim hac molestie pellentesque integer. Curabitur viverra per sagittis massa nisl odio vehicula cum ac, semper dictumst nascetur accumsan penatibus eleifend fames nunc praesent, fusce vivamus mollis iaculis auctor hac lacus himenaeos. Diam ut malesuada feugiat etiam magnis platea sollicitudin,','46114253463cc0efbcbe798.28471440','103152436763cc1139a35dc2.59568954','2023-01-22 19:14:53',NULL,'2023-01-22 07:46:05',1),('187998320763cd8b9666e561.73890614','Lorem ipsum dolor sit amet consectetur adipiscing, elit donec morbi nunc taciti aliquam, enim hac molestie pellentesque integer. Curabitur viverra per sagittis massa nisl odio vehicula cum ac, semper dictumst nascetur accumsan penatibus eleifend fames nunc praesent, fusce vivamus mollis iaculis auctor hac lacus himenaeos. Diam ut malesuada feugiat etiam magnis platea sollicitudin,','46114253463cc0efbcbe798.28471440','103152436763cc1139a35dc2.59568954','2023-01-22 19:16:38',NULL,NULL,0),('205344682463cd93972f1bc0.39760899','Lorem ipsum dolor sit amet consectetur adipiscing elit proin scelerisque, netus feugiat nibh ligula mi nostra luctus nulla aliquam, suscipit primis magna consequat nisl erat donec libero. Nascetur rutrum ultricies orci vitae iaculis lectus bibendum curabitur pharetra etiam posuere justo, litora nibh platea senectus euismod dapibus taciti malesuada tortor ac natoque, ultrices vehicula risus phasellus est tempus donec hac luctus lacus gravida.','46114253463cc0efbcbe798.28471440','103152436763cc1139a35dc2.59568954','2023-01-22 19:50:47',NULL,NULL,0),('38040267063cd8a38dd8327.92757363','Lorem ipsum dolor sit amet consectetur adipiscing, elit donec morbi nunc taciti aliquam, enim hac molestie pellentesque integer. Curabitur viverra per sagittis massa nisl odio vehicula cum ac, semper dictumst nascetur accumsan penatibus eleifend fames nunc praesent, fusce vivamus mollis iaculis auctor hac lacus himenaeos. Diam ut malesuada feugiat etiam magnis platea sollicitudin,','46114253463cc0efbcbe798.28471440','103152436763cc1139a35dc2.59568954','2023-01-22 19:10:48',NULL,'2023-01-22 07:50:20',1),('39119161563ce81240f3208.74170605','A new note','156286157363ce80c0e2e809.80382970','103152436763cc1139a35dc2.59568954','2023-01-23 12:44:20',NULL,NULL,0),('47287507863cd8b4d69fcb6.76320658','Lorem ipsum dolor sit amet consectetur adipiscing, elit donec morbi nunc taciti aliquam, enim hac molestie pellentesque integer. Curabitur viverra per sagittis massa nisl odio vehicula cum ac, semper dictumst nascetur accumsan penatibus eleifend fames nunc praesent, fusce vivamus mollis iaculis auctor hac lacus himenaeos. Diam ut malesuada feugiat etiam magnis platea sollicitudin,','46114253463cc0efbcbe798.28471440','103152436763cc1139a35dc2.59568954','2023-01-22 19:15:25',NULL,'2023-01-22 07:46:42',1),('71473144463cd8aed7a1346.31804740','Lorem ipsum dolor sit amet consectetur adipiscing, elit donec morbi nunc taciti aliquam, enim hac molestie pellentesque integer. Curabitur viverra per sagittis massa nisl odio vehicula cum ac, semper dictumst nascetur accumsan penatibus eleifend fames nunc praesent, fusce vivamus mollis iaculis auctor hac lacus himenaeos. Diam ut malesuada feugiat etiam magnis platea sollicitudin,','46114253463cc0efbcbe798.28471440','103152436763cc1139a35dc2.59568954','2023-01-22 19:13:49',NULL,'2023-01-22 07:46:15',1),('99023201163cd938a19b828.32399164','Lorem ipsum dolor sit amet consectetur adipiscing elit proin scelerisque, netus feugiat nibh ligula mi nostra luctus nulla aliquam, suscipit primis magna consequat nisl erat donec libero. Nascetur rutrum ultricies orci vitae iaculis lectus bibendum curabitur pharetra etiam posuere justo, litora nibh platea senectus euismod dapibus taciti malesuada tortor ac natoque, ultrices vehicula risus phasellus est tempus donec hac luctus lacus gravida.','46114253463cc0efbcbe798.28471440','103152436763cc1139a35dc2.59568954','2023-01-22 19:50:34',NULL,'2023-01-22 08:00:01',1);
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` varchar(256) NOT NULL,
  `name` varchar(18) NOT NULL,
  `surname` varchar(18) NOT NULL,
  `type` varchar(5) NOT NULL DEFAULT 'USER',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('141454542163ce7f9aeba271.85165941','Admin','Admin','ADMIN',1,'2023-01-23 12:37:46','2023-01-23 12:37:46',0,NULL,'admin','$2y$10$53aWTUbwhokmiRybtOBhKefPwDxa4x3X3/J3jXeHYl5V5r6PjxNN2'),('156286157363ce80c0e2e809.80382970','simon','peters','USER',0,'2023-01-23 12:42:40','2023-01-23 12:42:40',0,NULL,'simon','$2y$10$bVsKKLWmJAjkA1ymYiT.G.YOaRmLXXJ.rRtc7xFo77.URXAmQnHwy'),('181177995063cd79b3b1fb51.27401479','Marie','Curry','USER',0,'2023-01-22 18:00:19','2023-01-22 18:00:19',0,NULL,'marcur','$2y$10$0ufIV2kWFdH9K2wQgAyjrukSguMWwGpCMvfhNjIZZxuSMbrse1aiO'),('193092352763ce8059ee5360.45125534','John','Doe','USER',0,'2023-01-23 12:40:57','2023-01-23 12:40:57',0,NULL,'johndoe','$2y$10$JOrIBcs/TISKwH3c2mKiyucMJK0usss3heOT9dChyZo55C3Qg9c5S'),('46114253463cc0efbcbe798.28471440','Samson','Kinanee','ADMIN',1,'2023-01-21 16:12:43','2023-01-21 16:12:43',0,NULL,'kalashinkov','$2y$10$THN0tO3hPBKtRdA8MxyrtuWzbxQWY8hYRa8GF9AepNUSmBTOTozbS');
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

-- Dump completed on 2023-01-23 19:17:40
