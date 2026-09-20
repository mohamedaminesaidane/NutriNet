-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: projet
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
-- Table structure for table `2`
--

DROP TABLE IF EXISTS `2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `2` (
  `id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `url` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `2`
--

LOCK TABLES `2` WRITE;
/*!40000 ALTER TABLE `2` DISABLE KEYS */;
/*!40000 ALTER TABLE `2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `captcha`
--

DROP TABLE IF EXISTS `captcha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `captcha` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `img` varchar(100) NOT NULL,
  `captcha` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `captcha`
--

LOCK TABLES `captcha` WRITE;
/*!40000 ALTER TABLE `captcha` DISABLE KEYS */;
INSERT INTO `captcha` VALUES (1,'images/captcha/2b827.png','2b827'),(2,'images/captcha/2bg48.png','2bg48'),(3,'images/captcha/2cegf.png','2cegf'),(4,'images/captcha/2cg58.png','2cg58');
/*!40000 ALTER TABLE `captcha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `id_cat` int(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'protein'),(2,'creatine'),(3,'vitamine');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coach`
--

DROP TABLE IF EXISTS `coach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coach` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `sexe` varchar(200) NOT NULL,
  `specialite` varchar(2000) NOT NULL,
  `diplome` varchar(2000) NOT NULL,
  `motdepasse` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coach`
--

LOCK TABLES `coach` WRITE;
/*!40000 ALTER TABLE `coach` DISABLE KEYS */;
INSERT INTO `coach` VALUES (2,'abbes','yassine','male','kk','rver','yassine123456');
/*!40000 ALTER TABLE `coach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coaching_session`
--

DROP TABLE IF EXISTS `coaching_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coaching_session` (
  `idSC` int(250) NOT NULL AUTO_INCREMENT,
  `duree` varchar(250) NOT NULL,
  `acces` varchar(250) NOT NULL,
  `sujet` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  PRIMARY KEY (`idSC`),
  CONSTRAINT `faire` FOREIGN KEY (`idSC`) REFERENCES `coach` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coaching_session`
--

LOCK TABLES `coaching_session` WRITE;
/*!40000 ALTER TABLE `coaching_session` DISABLE KEYS */;
INSERT INTO `coaching_session` VALUES (2,'100','prive','wabna','123456789');
/*!40000 ALTER TABLE `coaching_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `IdItems` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`IdItems`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (5,'testtt','testtt',12,12),(6,'rayen','rayenbhim',1,1),(7,'testtest','testetste',12,12),(8,'testtest','testetste',12,12),(9,'rayen','rayenrayen',10,10),(10,'test','test',12,12),(11,'test','test',12,12),(12,'test','testa',2.8,45),(13,'najmeddine','ensen',1.5,1),(14,'mm','aaa',12,1);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `panier`
--

DROP TABLE IF EXISTS `panier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `panier` (
  `idPanier` int(255) NOT NULL AUTO_INCREMENT,
  `produit` varchar(255) NOT NULL,
  `prix` int(255) NOT NULL,
  `quantite` int(255) NOT NULL,
  `idItems` int(255) NOT NULL,
  `idUser` int(255) NOT NULL,
  PRIMARY KEY (`idPanier`),
  KEY `fk_pan_user` (`idUser`),
  CONSTRAINT `fk_pan_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `panier`
--

LOCK TABLES `panier` WRITE;
/*!40000 ALTER TABLE `panier` DISABLE KEYS */;
INSERT INTO `panier` VALUES (9,'test',44,55,10,21);
/*!40000 ALTER TABLE `panier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produit` (
  `idProduit` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prixVente` double NOT NULL,
  `prixAchat` double NOT NULL,
  `description` varchar(500) NOT NULL,
  `nombre` int(50) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `cat` int(50) NOT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `fk_prod_cat` (`cat`),
  CONSTRAINT `fk_prod_cat` FOREIGN KEY (`cat`) REFERENCES `categorie` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit`
--

LOCK TABLES `produit` WRITE;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` VALUES (44,'Mohamed Am',777,77,'**********************',57,'p.png',1),(45,'44 5',777,77,'************************',57,'cre1.jpeg',2),(57,'whey',200,100,'**************',40,'ppp.png',1),(58,'wheyprot',200,100,'***************',10,'p.png',1),(60,'vitamin',200,100,'******************',10,'vit2.jpeg',3),(62,'prot',800,600,'********************',40,'pro4.png',1),(63,'cre',888,777,'**************',44,'cre3.jpg',2),(64,'ccc',444,333,'****************',88,'cre2.jpeg',2),(65,'vvv',2,1,'****************',5,'vit2.jpeg',3),(66,'vvv',555,55,'****************',40,'vit1.jpeg',3);
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rating` (
  `idRating` int(100) NOT NULL AUTO_INCREMENT,
  `note` int(100) NOT NULL,
  `commentaire` varchar(1000) NOT NULL,
  `fkIdRecette` int(100) NOT NULL,
  PRIMARY KEY (`idRating`),
  KEY `fkIdRecette` (`fkIdRecette`),
  CONSTRAINT `fkIdRecette` FOREIGN KEY (`fkIdRecette`) REFERENCES `recette` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1000000004 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rating`
--

LOCK TABLES `rating` WRITE;
/*!40000 ALTER TABLE `rating` DISABLE KEYS */;
INSERT INTO `rating` VALUES (6,5,'kkkk',22),(1000000002,5,'merci',33),(1000000003,5,'merci',33);
/*!40000 ALTER TABLE `rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recette`
--

DROP TABLE IF EXISTS `recette`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recette` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) NOT NULL,
  `url` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recette`
--

LOCK TABLES `recette` WRITE;
/*!40000 ALTER TABLE `recette` DISABLE KEYS */;
INSERT INTO `recette` VALUES (22,'recette gateau','rectte3.jpg'),(23,'recette ptiit deeej','rectte4.jpg'),(24,'recette plat variÃ©','rectte5.jpg'),(33,'salade','recette6.jpg');
/*!40000 ALTER TABLE `recette` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reclam`
--

DROP TABLE IF EXISTS `reclam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reclam` (
  `ID_reclam` int(8) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `Status` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_reclam`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reclam`
--

LOCK TABLES `reclam` WRITE;
/*!40000 ALTER TABLE `reclam` DISABLE KEYS */;
INSERT INTO `reclam` VALUES (1,'najd','title','wwwwwwwwwwwwooooooooooowwwwwwww','nnagati10@gmail.com','produits','2023-12-06','Running'),(2,'amine','tknrkjg','jjkjnkjnkjnkjndrjkfn','mohamedamine.saidane@esprit.tn','seances_coaching','2023-12-06','Complete'),(3,'najd','kjhhihi','jjjjjjjjjjjjjjjjjj','nagati.najd@gmail.com','seances_coaching','2023-12-07','New'),(5,'meohamed','hami','jhkjkjhhhhhhhhh','mohamed.elhammi@esprit.tn','seances_coaching','2023-12-07','New'),(6,'yasss','yassss','gvhghgghhghgf','yassine.abbes@esprit.tn','seances_coaching','2023-12-07','New');
/*!40000 ALTER TABLE `reclam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `response`
--

DROP TABLE IF EXISTS `response`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `response` (
  `ID_Response` int(8) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Message` varchar(500) NOT NULL,
  `Date` date NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `ID_reclam` int(8) NOT NULL,
  PRIMARY KEY (`ID_Response`),
  KEY `ID_reclam` (`ID_reclam`),
  CONSTRAINT `ID_reclam` FOREIGN KEY (`ID_reclam`) REFERENCES `reclam` (`ID_reclam`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `response`
--

LOCK TABLES `response` WRITE;
/*!40000 ALTER TABLE `response` DISABLE KEYS */;
INSERT INTO `response` VALUES (3,'Test2','email@gmail.com','LOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOL','2023-12-06','Suppoter',1),(4,'style1','nnn@gmail.com','messsssssssssssaaaaaaaage','2023-12-06','sa3ida',1),(5,'style1','nnn@gmail.com','messsssssssssssaaaaaaaage','2023-12-06','sa3ida',1),(6,'style3','final@gmail.com','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','2023-12-06','sa3ida',1),(7,'style3','final@gmail.com','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','2023-12-07','sa3ida',1),(8,'style3','final@gmail.com','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','2023-12-07','sa3ida',1),(9,'style3','ssssssss@gmail.com','ssssssssssssssssss','2023-12-07','aaaaa',1),(10,'style3','ssssssss@gmail.com','ssssssssssssssssss','2023-12-07','aaaaa',1),(11,'style3','ssssssss@gmail.com','ssssssssssssssssss','2023-12-07','aaaaa',1),(12,'style3','final@gmail.com','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','2023-12-07','sa3ida',1),(13,'style3','final@gmail.com','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','2023-12-07','sa3ida',1),(14,'style3','ssssssss@gmail.com','ssssssssssssssssss','2023-12-07','aaaaa',1),(15,'style3','final@gmail.com','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','2023-12-07','sa3ida',1),(16,'style3','ssssssss@gmail.com','ssssssssssssssssss','2023-12-07','aaaaa',1),(17,'style3','ssssssss@gmail.com','ssssssssssssssssss','2023-12-07','aaaaa',1),(18,'style3','ssssssss@gmail.com','ssssssssssssssssss','2023-12-07','aaaaa',1),(19,'style3','ssssssss@gmail.com','ssssssssssssssssss','2023-12-07','aaaaa',1),(20,'style3','final@gmail.com','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','2023-12-07','sa3ida',1),(21,'style3','ssssssss@gmail.com','ssssssssssssssssss','2023-12-07','aaaaa',1),(22,'style3','ssssssss@gmail.com','ssssssssssssssssss','2023-12-07','aaaaa',1),(23,'style3','ssssssss@gmail.com','ssssssssssssssssss','2023-12-07','aaaaa',1),(24,'style3','ssssssss@gmail.com','ssssssssssssssssss','2023-12-07','aaaaa',1),(25,'style3','ssssssss@gmail.com','ssssssssssssssssss','2023-12-07','aaaaa',1),(26,'style3','ssssssss@gmail.com','ssssssssssssssssss','2023-12-07','aaaaa',1),(27,'style3','ssssssss@gmail.com','ssssssssssssssssss','2023-12-07','aaaaa',1),(28,'style3','final@gmail.com','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','2023-12-07','sa3ida',1),(29,'style3','ssssssss@gmail.com','ssssssssssssssssss','2023-12-07','aaaaa',1),(30,'style3','ssssssss@gmail.com','ssssssssssssssssss','2023-12-07','aaaaa',1),(31,'style3','ssssssss@gmail.com','ssssssssssssssssss','2023-12-07','aaaaa',1),(32,'finale','nagati.najd@esprit.tn','meeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeesssssssssssssssssssssssssaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaameeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeesssssssssssssssssssssssssaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaameeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeesssssssssssssssssssssssssaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaameeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeesssssssssssssssssssssssssaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','2023-12-07','SSSSSSSSSSSSSSSSuuuuuuuuuuuPPPPPPPPPPPPPPPPPorter',1),(33,'finale','nagati.najd@esprit.tn','meeeeeeeeeeeeeeeeeeeeeeeeeeeeeaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaameeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeesssssssssssssssssssssssssaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','2023-12-13','SSSSSSSSSSSSSSSSuuuuuuuuuuuPPPPPPPPPPPPPPPPPorter',1),(34,'hhhhhhhhh','nagati.najd@esprit.tn','jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj','2023-12-07','jjjjjjjjjjjjjjjjjjjj',1),(35,'titre','nagati.najd@esprit.tn','messsssssssage','2023-12-07','Najd',5),(36,'titre','nagati.najd@esprit.tn','messsssssssage','2023-12-07','Najd',5),(37,'titre','nagati.najd@esprit.tn','messsssssssage','2023-12-07','Najd',5),(38,'ghftfttftftf','nagati.najd@esprit.tn','fgytugfbjftgyu','2023-12-07','mounir',6),(39,'mrigel ?','nagati.najd@esprit.tn','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','2023-12-11','aaaaaaaaaaaaaa',1),(40,'qqqqqqqqqqqq','nagati.najd@esprit.tn','qqqqqqqqqqqqqqqq','2023-12-11','qqqqqqqqq',1),(41,'qqqqqqq','nagati.najd@esprit.tn','qqqqqqqqqqqqqq','2023-12-11','qqqqqqqqqqqqqqqq',1),(42,'aaaaaaaaaaaaaaaaaaaaa','nagati.najd@esprit.tn','aaaaaaaaaaaaaaaaaaa','2023-12-11','aaaaaaaaaaaaaaaaaaa',1),(43,'aaaaaaaaaaaaaaaaaaaaa','nagati.najd@esprit.tn','aaaaaaaaaaaaaaaaaaa','2023-12-11','aaaaaaaaaaaaaaaaaaa',1),(44,'aaaaaaaaaaaaaaaaaaaaa','nagati.najd@esprit.tn','aaaaaaaaaaaaaaaaaaa','2023-12-11','aaaaaaaaaaaaaaaaaaa',1),(45,'aaaaaaaaaaaaaaaaaaaaa','nagati.najd@esprit.tn','aaaaaaaaaaaaaaaaaaa','2023-12-11','aaaaaaaaaaaaaaaaaaa',1),(46,'aaaaaaaaaaaaaaaaaaaaa','nagati.najd@esprit.tn','aaaaaaaaaaaaaaaaaaa','2023-12-11','aaaaaaaaaaaaaaaaaaa',1),(47,'qqqqqqqqqqqq','nagati.najd@esprit.tn','qqqqqqqqqqqqqqqq','2023-12-11','qqqqqqqqq',1),(48,'ssssssssss','nagati.najd@esprit.tn','ssssssssssssssssss','2023-12-11','ssssssssssssssssss',1);
/*!40000 ALTER TABLE `response` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room` (
  `idS` int(250) NOT NULL AUTO_INCREMENT,
  `APP_ID` varchar(1000) NOT NULL,
  `TOKEN` varchar(1000) NOT NULL,
  `CHANNEL` varchar(1000) NOT NULL,
  `availability` varchar(100) NOT NULL,
  PRIMARY KEY (`idS`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES (1,'c57943c9cb1b400e9b4f94c6e85f5f72','007eJxTYIhV/ibje2Szq0zQCvbbn16mH9HhXMf83UDlrkm+w8esqQsVGJJNzS1NjJMtk5MMk0wMDFItk0zSLE2SzVItTNNM08yNZNaUpjYEMjJcPJzPzMgAgSA+I4MRAwMAwPQdsg==','2','no'),(2,'c57943c9cb1b400e9b4f94c6e85f5f72','007eJxTYDjuX6+fwtPXZj7VWnijLt/7VqGFNmvv7Zh74fNJ/jvPthYrMCSbmluaGCdbJicZJpkYGKRaJpmkWZokm6VamKaZppkbZa0pTW0IZGS4kJjNyMgAgSA+I4MxAwMA9Hcekw==','3','no'),(3,'c57943c9cb1b400e9b4f94c6e85f5f72','007eJxTYJBtu9KSEhyr3f1yevukrWr3qjaU/QiZcifvMKdy64MjMaIKDMmm5pYmxsmWyUmGSSYGBqmWSSZplibJZqkWpmmmaeZGN1eXpjYEMjI8WLqChZEBAkF8RgZDBgYARxQf5w==','1','no');
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `photo` blob DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (21,'ff',88,'fff','ff','ff@ff.com','ff','ÿØÿá\0Exif\0\0II*\0\0\0\0\0\0\0\0\0\0\0\0ÿì\0Ducky\0\0\0\0\0F\0\0ÿá,http://ns.adobe.com/xap/1.0/\0<?xpacket begin=\"ï»¿\" id=\"W5M0MpCehiHzreSzNTczkc9d\"?> <x:xmpmeta xmlns:x=\"adobe:ns:meta/\" x:xmptk=\"Adobe XMP Core 5.6-c148 79.164036, 2019/08/13-01:06:57        \"> <rdf:RDF xmlns:rdf=\"http://www.w3.org/1999/02/22-rdf-syntax-ns#\"> <rdf:Description rdf:about=\"\" xmlns:xmp=\"http://ns.adobe.com/xap/1.0/\" xmlns:xmpMM=\"http://ns.adobe.com/xap/1.0/mm/\" xmlns:stRef=\"http://ns.adobe.com/xap/1.0/sType/ResourceRef#\" xmp:CreatorTool=\"Adobe Photoshop 21.0 (Windows)\" xmpMM:InstanceID=\"xmp.iid:594FAE11986E11EDA8DFBE8401B0BA09\" xmpMM:DocumentID=\"xmp.did:594FAE12986E11EDA8DFBE8401B0BA09\"> <xmpMM:DerivedFrom stRef:instanceID=\"xmp.iid:594FAE0F986E11EDA8DFBE8401B0BA09\" stRef:documentID=\"xmp.did:594FAE10986E11EDA8DFBE8401B0BA09\"/> </rdf:Description> </rdf:RDF> </x:xmpmeta> <?xpacket end=\"r\"?>ÿî\0Adobe\0dÀ\0\0\0ÿÛ\0„\0\n				\n\n\n\r\r\n\nÿÀ\0\0Ü\0ë\0ÿÄ\0Å\0\0\0\0\0\0\0\0\0\0\0\0\0	\0\0\0\0\0\0\0\0\0\0\0\0\0		\0!1AQa\"q‘2#BRr‚¡±b3Á’¢S$ğ²ÂCc“£4Ñ„%Eásƒ³ÃT”5e	\0	\0\0\0!1AQaq‘\"2¡±ÁÑBRğáb‚¢#ñr²34’ÂÒSÿÚ\0\0\0?\0¬ò™¼×ùÛïi÷êÂí(ºGæ·í·ÚtÉÂWËĞïo´ê)Ò‹f˜Î«½¼}çHä³f“½E>Ç[ÎaRKx{õšóŠéì	-O±Ê¤[í:[\rÁJ-.6CJÔ÷ê«›UªÉ@	-ÂÉ14\'¯ÄêMÁV‘ÕC®]k0sÕ‡×­›c‚óİã5	ò%ö³}§ZU\\‘Xò&ö3}§J©,úiÿ\0xı§J©,úy¿y¾Ó¥T–E¼ß¼ßn•R^6Ó~ó}§J©.‰o*Šîo´éU%æ†cûMö*¤´ôòû]¾Ó§IcÓÌŞo´éª’ê!”€77ÚtÁ%ãm5>ñûN©)/±’I«}º§;¨A¶6¯S„Ä>ÑÔıºË2®í°\n%Pâ¤æ¾İ	Ò«-zk	\\õbiï:‡˜‰ä­”Š(	Ô…HBk%|OÛ¨:Ee°…¡Ç´ı§CÖ¬6 µ1IìcöGZ „-¼©6}æû¾óûÚZÒòŠşÃÉ¹‘ÄzızéØê…çÏe­ì™A©UJU(´´ş*â(\r+I$T?ÚFš¨s<4bhSl<‡ŒÛ]¸ÊÛSÖşmtîÉs¯˜æŠgÀ¦ÁİäbÍ[Ë6!5ê&ã*FX&ï/hf`>Pu’ö»U)šêì/¡lu.f‘CÜ¾+pGåÖyl‰n©éq·¸uBèCù#öĞq=‰Â^~qöí¾á<®Û¬ù)±Ço\Z~ó3\Zõé³ÓÈ­«“»?téæöM‹…ãeåÙn[$±á±Ö,YºÖBw…<\nv«ÇœH8Q\\¼İá†6½½ıypË4›+Û¯ÔG säv–âÕ[¨kŒšÿ\0{\r\\Šh£Ííí‰½Ü>àøh —ü¼¸î{„í­ï³´åü†ŞKÌeŒ™^VFviÊ%OÑˆ:´ÛÈŞ	i7:ZFkİÄà]ÖíXl—pñ8ËN^ğXÄÖ—‹u0}»ØŒ@\0{tÑ^Ç#´µÀ„å„\nÑ&²Àrş]Î°½¼àÑYÉËEqp^ü²AVèÎYÙA*(û\'®¬K `©8()0ìw{xNg‰`s7œi²|Ï\"18ˆme¸—l´¤”´+¶5¨©]Ç¯†©Å¸E#ˆa©§©L°Ò´Xîße;ÅÙüÓ“d¸íÎ9.!³ôö¢IŒ—Ò‚Hã5ë¡G¹Å+ÃXê“ÑÉ9ŒUÊ¼—¼g…kh¯ùõ¾:9nÕŒ*÷EUXíê3uñÖ£ßLÔïºİŠï?h8]ç8ä.;y‹±–e‚ÇÔ´äÏ ‰HF‹Ğ¿6²™ºÂ÷†4ÕÎ$eÉËu+L“•—é³¾ù.kÍìò<]±7˜Èó0ÄÒ]¬ş[qp¨„®ı¦”İJûu)÷Ha$=Ô!&Fçd3CnÔqÎäw·%w‹àâÅÖ*Ê+Ì—æR=ºn’C#`½iÓVä¸lcSÍJaS’\'Éú_ıLÅá‰ã×Á¿ëÕa¹Áõµ9iä…kkÜ4îöqëy»‹ÛÚr\\¤p9H|ï’gp¤•‡ÍB5f;–½ššAú”H-À§ÎeÄ»»Û‹+L¿p8@Ãà®®â±9½‚uY&&\"i‚±ëÓLËÈŞà\ZàOAKIÍ.~IÈâq6˜Éó\\ƒ18·°ÅY\'±Ú½YˆUÓ¦¥Ø-«K¶ÛH¯B—dùÖSŒ%¼¼Ó·|›ØM<v§%³)f²ÌÔPem«õk(Û;ª‡ò;wÒÇÄG|ZÆ#Ña@Yäb…QRÄš\0\0ë]gk]¡hh©4håí+ÌĞ¾Ë*Å7½µÇ–ÛM*®# #VM´¼–ßlkM~¢íy÷k/@òy~4à%”ÀñUtE(ùJ²İâÈå R¼VÇ‘Úş=}m•²W15ÍŒÑÜF$\0¥£$B:U|…†ëWã¼…â­ppè]&áéÿ\0T~Íî°ÙÙÍ!—‰_Gã}šo<#¶fs\\?§o6ÿ\0–Şğÿ\0—œ<ÖóA…®n‘ûG¯×®È\ZçÅº“­¶>8âi¥ùbKÈÇÀ*Š“õ\r@½9ŒS’+~˜{#À9ÇÌwS¹Ø|¹Î_Ìp1ß4¢(1˜úÄd ï}Ãæ	ÓÇ\\Öù¼ºÈ²8é©Â§\nĞpí\\Nƒs)#‰ GNÇ¿Kù;¹¬xF‡är6j$šK[;ÉâJÓqŞ®Ã¯JûõÎÜo[‹ZÁh9 \"›-&„cÖ±S½²íÿ\0)îGiøwÂØc9!Éºæ&ÇA©|4\Zc*D[j«•,+ĞŠësbİ&¯tÆ¬ŒV¼X Om¡¡Ã\nšuó÷#—yP<_±X|UæRÊæòÛ%+ÚÙXãÊ#¢Â«G mƒ\\õ”·»ŒÒêqÅÆ‚¼¿·dlÔü1*×Ö«Üœ>s‚ZsæÛ`¯ñƒ.a½d[WŒ½$RHêĞA÷S×v÷S‰×ĞO” ¶óÈEJ¿C¼e3|÷“w2åZ<&Î²ãöÌ\n¼¼Œïå)4])Ÿ¾5Üï×fÚÎŸ;èßş^¥B_¤bÖÕZL7xn³½ôä=µ²H§øŞ\Z<…õØÎrM\Z,UğMÇ¥kğ× -6ótâuT\08PšUh>0×¶:wˆ©Ç.9u!,ÈGwúåíá­RÓŞµ÷;÷ÖÆĞ÷ç:;ş(7Qi1uÿ\0’ş¾ÍÖw‹ğ\\^*Ş[ËûŒ¼éokn4ÒHĞ\0ªˆ€³1¯@«~,÷>g×é÷¢]ÀY\'êo±Ê=ú6Âåæî\'åœ«qŒÉñŒ%ÒŞÄĞMİùWf(à2“NÔ#ÁµÑşGwåÙ\'ßŠÎµ…Ï’”éS^ëreä¬.Îñ”“t ÷ò¥jÓ$“G¼,+¬ŸÇõ6ÒY\r:ƒJ»{†±¼MO®ƒØ»ş¼s	7eìmÿ\0æ36õÁ­¬Æ÷İwM>åbâÜ²“ü#õØ«;©=ÚYÛ£6wOıä\'^¨ã€\\ú¸ÿ\0¬5½ÏöO9…ÄZÍ’úÍ ³µçF[h‘Æ˜ôö\ry.Ä÷ºù ÿ\0½t·\";øG´)‡\0{ëÇñÌnÚ[Å¿·´¼²¹SÑJ–\n:ªE<–û+…û€Ë»ì	mÖåÚñ{ÕYÿ\0ş|F–YÎä^7E·ƒl»ÌàÓÿ\0]oä’–Ù3.o½fÛÄ]1háUbğİâÈKúä]¬¾[˜r˜hö€ëu+\\.ïeœWÃn¹ˆí5í¸ó\Z}@ã‚½;4HÈè;ÃŞUtıG*p?Õoo»™l<»<Æ6âíÇ@ZÒámç|L ë¡üf:İÑ»0Oc‚ü6±ıcÒßØ„zıaØ.{±<šİ:Üâe‚ş:P‘éfˆşZë—Ù¦|wík¸ßhW¹tnée{(}‹ætÜß-\'1°æLÛrÛ‹[«EíŒÙ:ºõ­OÄëÕÉÅsäÕ}BıJ[ZwôûÈÍ‡â‰l-óØáâiK´§Ä©¦¼¾m¹è9‘è9{VÜcÀfÓÚ1÷*Qİ¾ıA™íÏáü^}Ù.ÚN_|„Õ%¬ÔôêÅwÊ}Ä/ïk¼·´Ò÷9ÜğVï·¹&…±ƒÃ¼¬wèFÿ\0šìÆO\r•³¶»8Œäñ…¹†)¿î¦QøŠİ7	5‹ùìÖ¾[âqmK§¢õ‡oy\"•GÎØÜşbã_qN3yÈ- [«›ÆÙú´¶v\n%jDabï\nô×4Íópk<Ê¸³Bºû*\0HÁÙcî@ì^3Ø?Ôxãv¶ñXö»º§åPF6ÚÙf QŠ”ÿ\0´ÅÖ¼7‡p¶/?öGŸH(.·£›Z;Hø…e®pvµ#Ëf²‰+Z;ÇóHdãVÒò‡Ù¡—•e·îRoéJ’=ş?˜‰şEÜÕ¶Ç~!éûGûõé%ëU±$¼âé0ÖœW›óÜ®ò.:1âZéÂ±ú(h~E¤V§ ³7‰¼›roÃâ­o$Ådñ]¬›·=¶kt¼´ÆG‚ÄÜ\\Ì-¡HÑ2\\»‘ZŸZ\0Y˜økÍ$;­ÃÍ”Ò=_ÒÜ»UhlŸooVŠ¾ŸÔï…kèCÉö—ús´ÍsQÈ ¾ÍŞÚz[«ËxæÆÎÉg‘Pº‰$whÓs˜Ô\0(<IÖÖí»‹Öy4»Q9z½WÛö9ZírPS¤v¸œ\0HûIÊâî·|y‡w?ärÂ,\ZóÓ¾ûr´€{	†9‰ãÔî£ÿ\0¶ù5ïÉ÷ú°Fpeİã#ˆêŸÔâj]ÕSAĞĞQo3sÛ~a˜L ±Ãrî#qÏ#W“Z‡\nÄˆ¥¨I;uÌÚ\\İÙÆ]t?‘íZÓm,–ùgJ¡Wê×7Ê—µ²Ï„ÌEc„70Ze±‰—4öÒ±„™Z–@)Jxk_a,’ì™At„MqT· û(”Ğ*4—q\0ğhá«\"q=JQÙm·j;3ƒ°½¥µä–¯Èó­J2Ï~‚e\rZuİaJ{ë¦ü‚ssrØÛˆfÌsø!l{u`óÏì¢–ö÷/ÚKì¶œvïÊ›7HbÏ^[ÜÜHY<Õ2E1a³/ì‘Ğt\ZıÍÓm…´±†´B:=Jä;\\OŸÏlšëÒî)Òæ|Çªıh`.I¨´ã·êzøğ»ÓşiØw6™Õ«×‚Îİ ¥ìó§üÊ2ånpóæq«-(ñß7ò’Ì#¼Èíµ3}©2§^Œõök°‘ìkÙŠZ7¨q+~ëo£W…§YşVŸW|q²Âås÷&Ìrın2R“÷šÖŞ;XÇòÒO·@w:Ş8úËiDnÚÓ\'š8±£²§àªï	äC–~´.3lû ÇG•7Ã:ö†»¸ÙöÛQKõ.Cpn½Í±•Ìgf~º§ïÖvwÖp,\rzîÉ™6×Ø0ÿ\0N±?“=ßÃEµ¿À\"µë{}AŸêş?šä=¶´ÃÜ™çÇfñfáLnvËø°\0õ\ZôIkÉyáW»–÷Ã Égr·ici<Ë$ñÔ°Üì´ùzõğ×ŒÛÁ,²–Åâ$ñ¦Ö…‹<çĞ44\\†­pÃs[nIÆq¼‚Í©c²kËEjïHÒDÖŸ7É×JêÈÛK šœ*£bØîG™-¥iJÒ˜Ñ\0?GïùEŸrî—åflmøD/^ŸÛ®Ãò7ƒmxÔé\\ÎÕm®úfı:¿ä‰.äö—‹÷BÎŞöÒÙ;››–ŞÅ3[n\"ú–é[‡Ü±Çµ¶·–§²ìâ¾–ÔÇ#ZåSÏ§Ø´·- x’cß\0in<F×T#õ…lïo¬³Q©[ş9|	#ï$sşŠøŠ8S§ünO.ä·êo¬)nö´s‡ËGz2>ßR.òä<ë¶ˆx¹\'†çmj7ŞX¤¤}NHÕ!Ü\\F^e{J.Ól&¶c¹‚ßkWËy#tvFûÊJ·Ò\r5êëÍœÒÒAà¾˜vK•GË;Ä¡»>`|\\Ø°Ş¬${PÇÊ1¾ıy—äQùw‚A™\0ö`»m‚H«ô;õï_7ù.\\&)‡öS[ìœ¨?`×¤E&¶s“½ƒÈñı.![_Ğ—#{5ç¸\"zñ¹8–¾L²ÛH~¿>?³\\Ïäìµğp÷…wgn»ÁE®áXsÛNòpşêp|T¹›m³âù]¬°­ÌØÙŞ’,qHêò°V.¡ùÂëc’[Éo3€æVÎñlèÛØ	-.ÈpÀüT‡õÃäçü#Š·ÜœŸÿ\0™à®\0)*ÜÛ\rãièTÈŸaÖN×1²»Òã‡…Ü©Í^û1s\róŠ‡¾”Eìrãîÿ\0l1¢VÀ§È`ğhò6 ,„`m”|Z÷ÖşL…£#ˆê\\¤rÌ\"–u”ä]U+MËOù{ôÊjƒZÚ‚ç§í§^Š\\½¬¨\\øQæ»Åä’Šâ{yeél‰û§7•€ecŒHÿ\0ÖNïpb·iÆCê®wÈûíÉ±ŒY\'ÑûĞ$ıÏıM^ğS/ÃâàÈ¥ª§¨–i˜Â¥>Zø}\ZÊÛ¶Ï{ÜEVÎóºE·–Ä_#›«:ƒá¥I¦9ñ±çÃñéó™k\'‡ŞC#o1Kql²Ihç m¬şQuöbÃdçL\ZÃ^õê9­cmÆßçÌĞiq®>•ìt1pÎÖa-äQîm¦ä7àt ]Ÿ*ÙOÑJãøõ­¼8Ïp@É½ÑïYßˆíeÖÎ˜¨:‡ïìCÏä®9~9_pgf0b­23FÔª—¼¦:5ö~1aü:Ú¿Ê±d-ù¨=å`@Ó¸ošYáş–|h¥ıÆÈáónÛIœşD.;ä²VŠ¸ûi$ÜzSğÕéş\"5Ÿ·ÃöĞÉ8ÓKzÏîºÊ¡sŸ\r£~WVY=‹¯}»+pÌ”r¢Şç¥6â8˜R8\\îeO@ä\Zm§n.¸pğâzÖ¾şÆí[i¦‚6õ‘B{*˜Oy[\'ÛÛ»Ë˜­nsY×#Ì‘Qšuš*š_¿râº¹½Bù§\0Ö×ÒJå¿µl–R@\05¸õ®xnOÔ5ç*º¾‚+n?7rJ¢#+XI\n¨bhX´›@İMÖ’\r¼FÖš—\n9¢î¾_ùè¨i˜ÔS2sÉrïOs#Ä|—ßNkÛ¸}©O\nši¶¬¶]Nm(8ô­¯Ëo ·±-ís¥:{¤3v]•<Í÷ÃŒI4¹ò±5Åí¼W¦÷—76é,‘\Z\n’³)ú5A›,îq«xŸjµ´nÛx±ˆÏ3\Zı\" ¸W=’ÏØqŞáåù^~õ-\\VTE4Ç«İŞ¨‰QiRY·±®£s²‘öâ66¸´z•íW±M»6Y\\\Zß3Q.4©G{ËÇQ·Ã–·ŞFÚº+ô­zyˆiõk˜nÓ;rk‡Rö™dÙ®€KéÍÍø¨?s;%Ép¸aÈÅ5…jÚúñÔF‰ŠT£¾ÕZ\0¥]lXXÌÆÉ¨\Zé4¯Rà¿.m‚Ş1jcÔ÷ã ŠĞƒÌ§ğ÷\'r~=ÈñìœW2]ÜJÖâ2HtóÙRE:º©¶ísG+æ‘‚è÷mÃoÿ\0ö²hİ\'”áZĞ`”ğ^êñÜ\'\0áøkÜ¬iÇImwoó‰–úå‘Zƒ¡1²7Ğt×ÛLÒ\\=Á¤ŠŠv—ø†ábË-3JÆ;YÁÄ›;OÍøÿ\0ã<–+¼œ]e9+İÇo­£µ!d ©ÚZR÷è»„Ó9€4ëAü~[6î7o|¬kI!¤¸\0{ÕÁ	ûÅ™ş¢ç²gñW>b¤6ş–æ#àğŠ‚ˆ ëok´tVá„Pâ¹¯Ì®`uèò×·Cqi¨ÌòVšóş7Íxµõ¬ù;U~G‹†ñíÌ©º+«¨WŒ­z2M¸SÇ\\•½„°Ï«Iî¸ŒºW¢m·½Û×ÈÀç0°‚á^-ZvÛÚÁÛ^)c}}7¶Vsãn!i‘]}ÜÈ•×¬N”şÍGr±{®^à\r\r]Uü>&¾ÍÌqÑÈáì÷§+$í\\,­âîõë,–V÷.ÇŞZfzŸ¢ù/>§¤±s‹´—\ZøŠmí/&·ÁYó6óCl˜ÎF¹,|`¤1›lÄ,®\"QµB«Û¥EtMÖİÓJÕ”ôŠ,M¦À[n· Q¤4vSÛDñ}Ä;QÈn&¿ÌqvFúåšIï¼ëÈ§‘ÜÔ³5½Ê)\'øuY—wq45¯ àµo·¹•Ò?XqÎ‡Ñ•Wc0=¿ïÔøÎ/bq¸.AÆo’ŞĞM,ãÔZ ¼\'|ÌÌMmú\nêõÔÏ¹°«ñ!â½´\\„»3vÍÊÜ4’Ù\r1çZhSŞã÷7#Ãø»ò<e¼W­i4BæÖj…x$%Mz©„bXí­MÂ ÑvÛ„bÒÊ[¨0V•§\nYÛNğÙw>rÎ²k”³½³–A#¤’FdºSäp¬Ÿ¬4;í­öÏ\r\'UEAêYuõµù-Š ZCû¦Ğr¸û1ú‰¹ãs8‡€÷<«Z†4Šß/¸ùT¯A¹Ù¢?Æ¾ít-­İ\'Ç©qÿ\0’Xk(ğËÿ\0.=¾/J½ #\\ë…:Â‘ìÿ\0—¿PGÔ¨^O!Ãäs—?äØC$äÚd*ÿ\03PkĞZ5¸é“Ê-át‡åHû}ouÆx2¯ÿ\0»Í´œ—0íPMÖH·´l€!§°»kœ¾>tî<İŒı~ÅsğÍ¸‹w\\?Å1¯òÿ\0ªk¶â|eî9mÕ»æy“£–Í²-´Ö¡ ´O’ª~é™ä÷í®¬›‹‰\Z#otrn}ªÓ¿Š{—İŞ?UMtŒ\0]ÄAÁû­Üä–O€ÆÌ÷6óKçdnÉ?ŠA$(\'©©5c­İ¯jtg[…9ÉşcùM¨‡í-_›á\r(çtä£Ù.äóœ£­/½\rºGZÙ Šá‚5†4Pw\Z* NµbÙ oËS¯ÂÍo¢…°B[\Z(4´W´ÕF¬+Šxl/gµ†è©¹HdhÄ¦2Jï\nEhX‘ôëMÖlu54\Zd¹‹}Ş{gDòÇËM\néå_Èí,—3Y|·1·2V»I­J×Ù¢FŒ€C›y¸‘şcäsŸJj.5§ZñÆÉ ‹5=„“ıú3m€È*RîIâsÖIJ.8íÍŒÍmyÃ:€Z7a¸> ×RdAâ£9e’3¥Õ’ÀÃø|µEt_!Uû®•Ğaê~î§ä!›¥Ğaÿ\0Ã×N Qû®”¢N;,0Ã4‰Eœ4SME±‚H#šĞã“—/ÉîŸ³Dò>égòbdéy?İ/~Jtéy/ºX8cûºo!/»Z=?g¯Ñ¥öê_v•§½—6Y#­¤2ß÷º¬¸téĞÖ‡è9«ìl®„Ìt\Z&ÖÄâ´¯_§R0*¢år8nßìÔL‚è+OÊİ:©*>š·\nË7	áqD®2cäfÅ‹@ÄÔî®†m‡%`îR—j.:¹Ô×¶«hÿ\02¶5¶º\"?rG_î:­shCùì^	?˜üS®–ò¼wÈmï^ç!Ši\ZÓÖVthÚ\'RÔ‚®E+ªsm‘HÂÊP;:-ù5ÜÓ<Ê#v Ï¯5+ÉwCú‹ŒßñìÍ‰Š[¨|´-õ¡RÊİG‡³XÍÙLR‡°Ö…ziüúÊúÚHnbsÚáQŞmHíõ¦NËrèb°ŞÎaãÙøÆ3,ÇîÄ$pĞ\\ŸşâP¬OînİvÛÌĞÕ£¼Îğéæ=!yŞÇ»}Û%à\rKNhÇİL×&ãsÛÇX³øiMÕŒ‘·Î³[ŸU—ßN„{µËmòdK°_Aï{KoìœÖbi©yÜ½*ç~Ÿ;¦Üí^\'’\\°ş ¶Sä…2Àj{ ¬«ü_\rPÜ­|‰KFGÔ¾}ÕÏ0ˆ{ûTÖR¿Eó»¸ÒXd.0œ:öå-q¹¡yœØ\"¦6ĞïpI>-J/¼z$\Z›åh.-hQıbº¿È&tVµ\ró§@­ëı`£Ü«ºñÜİÜI$r}D£lH<cOhPŠĞi¬´M:8úzÕÃÿ\0èÖ–LX³ÍÒ(ì‡!™õ!®Fï+š›ÎÉ\\ÉpÇöXü£èQĞ\rvû|P€\ZÕãûÇåû“«<„·é4/Åp\ZwÇWÄ!rÎ¹O˜*ù‹è­‹yå€á…B/¶ƒ¥O¸hWl-¯rÂİÈ\Z0oÉñ=‡à÷Q,’¾–¿²)ıÈuÊË½LÓáo­zŸá¶3\n™êø\'Ø{Ûèiº;¹·}Å+ş¢®ªöã zãÛ†zÏó|\0Kô§·ø…[Ël^ûˆIÍ4²€ËÔ¬ÛO_†‡ş^æCBì:‚³ÿ\0ävØ;íÍÎ>ªÑ\n¹’Ù\\e¥¸’sò™u W[¶r½¬ &‹…İíb’mNh%G”X¯…¼ê_ó_Ì¬aiùØ·W¶öEújîæQYcå‹c<JFÕQô¨êw2ŠchÈÅ±»@ PxT\r,SP-EÒ“à>Á§Å6‘È%J*\r@Ób–‘È\'.ÑX«ãíQvH¬ 9!\\½»À#ØŸê¯şÍP1:¹®‘·1–Rƒ°/C%³­Y#\'øGşÍ\rú‡¡nØ\\Ü‡`Iî.£PcU?t·¯ÃRa5ª­pÆ\0¢%öøåıöof0ÖŞ|pdmÚêÚŸşÌRÆ»Ğš0’64?³ñÕ·=ã\'ÕÇÏz¼#±0MÃxÅ†c)Œ¾ÆÚyV7·êÒFªbBbêiâ…uq \"“,àpÅƒ±Møiû[ºT½À[OÃ$‰JüQÅ5Ÿq¸ÎÆÔ9Yn×jì=¨•?é±×ª$yh\\V_Î@¯¸H_Yßî†dvœıª\0híPWúâp´œ3?yŒ»å‡$©y7ñ ‰×ı­_‡ò\'ƒıÆ‚:0*¤»COÄuªïÍÿ\0K½Ùá~dóa_O¯Ã“x›Gµ£\0J¿\\t×CoºZÏ€v“Èáû,‰¬§‹*:Êûƒò-¿\"¾ÅÜ[`ï\'{;[ébhâ’xWs¢“Biô{¸êø1¹å¡À‘Š­©Ín¢0Lã¿Ã§0©6áH8ß-Íñ—X¢Qæ´˜–Z‡Ú§èÖîÏàširô¯Çÿ\0=»Û©ŸŞ‹é\'¼ßö»ÜpFïÒïsl8Wv¦Ä,†Û‡ó²=¼Œ)m“›v>À™¢¯´2şî¹ıËo’KS¨wâõµzº´–ì\\Z¸§ÄŒœÇüÁÃ…N#©¦KèG¦íW^zæ/ü«ƒb9t†íåk\\²‰p	hØ/€t¯ÇÅhuéV—ï¶Ã6®ç|üj\rË¿¨²ZR¼A,Ìp¼·›nBÁcHî£ùáo¡½ŸAë®ÖÒæ+Ü8òâ¼/xÙîö×Rf÷x8bÓé÷šßò~³á«Ïs#rÂ†g4`¯±;CŒ¶…CMó·îŠ5›%é>Gm³5¸Êu\\Øï…±QWÀƒY®Ù®Š #h DÌlÊı:bİ[Uu{mña¨©Z	\"Y7Š®uñ8èğ]¶µMYÜõ¼Voó\r\Z‰*­åÓC*½ò,¹¾vÚuØ[¶^O}&©\r@¸>5Õº,ÕÍ®ÈöéQ:ğ½öWI=WAtO·IAn·õ®’t¶\0®•®âèxÿ\0§MDëqvÃ¨?Û¦-R!wL¬‘×C1‚­2åÍâ·9T\0´®\0¨¾$Ÿ\0‰:‡—Do»$bQµ§)…æ8|İÔ~Êi/–ª³¼wãÉV(>â‡(ß?^Lá‚Ì’Pã@‹ùNWmÁùıÌ\\g•Èe ·ÈG“É+É,~RúI#AB\0Ú¢†­×UÌZÎtPóBB{—•æœ‚ip˜K,ƒ^Cgù­½Â]q±3$ñ·Ê¬~ÍAÖÍ\0ÔÕ;f5NX.õåqV©ü•ô/YíçöŞW0HK,MæY=\Z|¢ÀüÁUÿ\0oT¿ÅBî‚¤éÈéOş¤/!F1’;F»çšk˜\"B*È¶QSû+N¿F…şŸQM÷ÑÂ3ãcîåòfÖäÄ·°Çä¬‘MWP¶Êÿ\0º™:ûuÍ^D!—HÉ[„¯•ğî7Íğ³ñşU‹#‰œ†0È) ­$*hÊk¥ow$ÖÃBƒ,‘º\\*ïWé{+ÀŒ¹Î)+æxÃÍë­—ÜÁE%QûÈ+ïİz&×¿ErtIÜôŸ‚äov‰bñ÷˜;BñÎ	Èù¦Z<ÆM’ÉÊÊ…jkBò9¢¢k1[×SEnÍrÑúËšÈ·l’»KJ·³ıÙq&Ær_\r¯&ä\"ê›Ó<ë(7Uä!k‰“¦Õm©_·^wù—S#«LøŸ‡µv6»w—Bîñö+_°ûõÂUo/PŞ0vë×qşıwe«ÙZå¶Zğ=“Å\"‡–ŒŒ*Û¢[‚×Ô`Vfæ\ZøK\\0rCË¥YŠ¨\nƒ QĞ\rtl©8•äóµ­u\Z(G%Ù5Ñ€Uª’Ir|+¤’ÚÓ\'%¬¡Ñ½µÔÊ„VHZj¥‘sùã¶oëJk9Ö`•»èöŠ-gäò_Zw5?&Û†”ò_¹íÅBîfİ3jIÖ›FŸy©\\¼ÊjJ„Ò$—!-]$—e˜ÓNwF:dÉJHı4“…ÔJÃÛ§NºƒO2eŠÏ<Ğ[@TMq4P#IRŠfp›ˆH­˜š&%°|g‚\"e&ï&şp7\nøˆ|±áù½ìt:*Îy)ÒöG[+‰¶<Q´Èÿ\0ºğş\"©”9\n\"¨‡ÜY£ËâxÇ,µÿ\0&èùgØ|¬¥¸¸Œğx•~–Ğš+ñ\nÅÌÀf²£É,VùíÖ%.æYöâà*‰¬¡‡Ñ§“*s)™y×uä‘<Rc±÷!f_-£Q°ËAB$eÛ$D”¨£s’+TƒM(°`’ÚôØİ[H2 ¹r¿€‹#ß\'ñF\ZÒ¥A§ª$Q[Æå-nxî=!eôò¦¬÷˜É\n³±\'«IÑ?Ûì\\nû	kƒ•ø©¨»]s:ÑĞ{¼ù©­¬Z(É\n£Ù­¹šœŒ\r‹ö\'k\rÍÂÛÛÅİ>û–‰ûÌTu?N¬nÁî¤šeĞ€Æ5µÒ\0®jÃô×.ç)/hUN¾pDÇÍp|wï× ¹{2XÌ=-“Nš”%¹\ZF…·³Öwëí×I…y=Á«ÊÅ¬\\Éµ*IÔœê µµ]oñ—«ºE {õÈ\n3ásES;1ğÑW6ùAg`ª:’M\0úÎš‰ê”y“[¥eW‰=ò+ ¡ø°\Z{	ÀĞ•H\\Vd”–GñRşÍB«z2eÍ”“¤’ÈˆSI%îƒI:U\0I$µSÃ¦:Ü¨§ÇI%®Í$ÕYIı-İÆİŞ]å©*<HóĞAù&9#s­‡¸‘ö2©DõwÛA¡ã„ÿ\0¸\rşÍuêyh$Êö{)gy—ØpÖ°„¶6Qn£éˆª\rW8jT&>.ÑâøåÔşêğË.:Ğ\ZæCåÇ=äU:…Ş‘’}ôÔŸâjfqSNšå]qù0µ†Öæİü×aÔ¡GhÙZGB¿C{ôŠÑL\nñNœÿ\0´÷ÖX¬Í­ô7¯ˆ-(mnÑĞ3yfaå‘E“¯ËÑ¿gPdáÆ”¢›ã Lİ…æ¶¶ù Sùuò.Fİ\n=º”¹B=ä»3|CU7h<ÛrFc¥ÔVå™TTšóŠ£Dï]Ä-g\'QàuĞí5•ÁA»%‘‰24¨6®îl:PV¦’T¤\Z®1Í!MuĞ“/›vÛ¤™š,¿^„ò½z\Z¸rFxìØìÑ­i©enÎ£šæVóÏÓ®¹//—!âÏ[¤Ü**4²D·u/9ÇEö/Î?›oˆİ`Ås¦J.º[=qTàİ˜å½ÂººŸ\ZXqÌqc“ÏŞ°*.÷\næ•ÂŠíO¬h\\îqÀ\0ñ8ğõÇ>B·=šı8ñ^-‰Çg¯q#%ÉîSÕüÂ£5ºÊwÄ±ÛüÉªŞh[u~mr—“^İ»O…œ«OÜ¢´ÆÄi6xS|˜¬µÔW7í]ú‘é£`…Ø=~MÄ-M+õj¼{kYC#½Ãµ\'LNAD/°]‘æ‘ªÛñÌn9Ëë!°ÕRŞSí™U	ü@UJ½\r	¦¯¿pe¿t:bs±@>øöŸ°ÜOãpWØşK“.˜»L}ûÇ\r\"\0<óG8V$,µ\n¡ˆQN¤Z³Ş$œ\rÄ¤øCxª–ÅŒcÄ#¼[¸å.c0È<°¿570*Ûºšè­.]5A*îm*Ÿ\r_PZ>8K-G]2Iuiá§N²4’^Ó&K0øù29uUİe˜ücŠIQGÄ˜ëô\rAåEÇ]…üØb—Çz#×ø”D*ëœın¬ÓÜòKÿ\0wP~×Ò9¦DÖ]\"å3YèÖ÷¶ğŞ?´b&Úqõ£Ã¡È1ª#Ap¾olÕ£_®3+sğ	d‰‰°‰m£cå²–u#¯Aí\0\nò÷¥Ş\r4æŸ‹âY5´W\n°ÅS\\ÊïmtJ²›YåvK(¯… é2\nb¤b¦\\ã1œ¾á\\wk*İÄg™3’we¼»yö¦å£Ú\nKI\0-ò‰ª=j¬L\Z0Š÷às™—yåV–ÆÔ=ÌwwUVXZy*Ÿ.ßŸÓÈW¦Ó_ÕÒ;´9Tx•ÀÄó;Vâc˜»X¬i~i,æŒKi!ø´D+{5ç÷Z\'-àµ˜êŠªïİ.|·¾lez‘Jë£²µÓŠNr‡öÏ—Œ~Mjô½ÿ\0Z¼·ÖÔ69\\îÈ)lŒ¦ƒÛ®î\rZ!Mwv³(h¾ãğçyéû_é×[,ËÛ¡‚)Îq³sfÔ^´Ò¶¹ÒåKp´ÖÄËà® ¿1„ı¯ôë®†`æÕy5å±cÈéSş\rÃ$•–yWj¤·@\0ö’u›yx\Z(´6û-F¥Z>Û<~VÎ—\'£À¯iaÔOz¾!Ø±Â}•£8ëÑi^hÍg\\Çé\níîät˜`ô»à§<§•qÜ.#„cğ˜ä¸°¶x\'–(Y3B%Eˆ2€k *>=4ò2<ÿ\0m¹®`Be\r¹Gêó‡á/æ·Ûuwi`·>tV¾mŒpe+îfQï¦¤-o%çÑ>¸ÆAVŞQú‡›5u¼\ry»‘ËW²@ŒƒÑZ©òlY™‰|Âòrjİ:6X`Úã§*ó@2)_n»¯ÈløeÔx°ma¼·Ïh–êÓšÄ—ñ¼štRıuZ{F:@O<T›!5÷§¸#%Ï°¸øÿ\0Æ\'lîX±?Eêäo‹¼²íşS_f¥co¦\'»ÇÛDÒ;ÿ\0\\q<¤BÖ,NılŸ”F©°Æ	÷„\nwoŠ!FÚ¤øKÌ/l­ Ò™ô×àTP4mÊut#Àüu×“\\PH[®™2WoÓI$¬uë§N²	\ZI/,†fhíQ®n\0ÿ\0&]«ñ§Eúõà\"ñ+[u”AL!±lóH³Ş_y\\&Š±Æˆ¡ºĞı:5ÅVqÅ>aØ¶\"Æ¦¬°\"âŒl?Úº˜L·\'vV4ÿ\0wjíÿ\0y*ÿ\0OKŠd÷År-æø¨Xn{;Ÿ©v«u>Ï8Ç¡¿¦Õ&Ë©Ç÷\'¥\"ÊÂ™ˆˆñ¯”–ÒÓùâİõèHL¯ïøöG‡C²ÂŞÇ”Y\\CoˆÏV¬€ióc}:ƒCƒóÁZ´ÁäñğZÅFºNùb–:%ôò¬Ğ»nR¡–@¥êÇ ñÕyZuÔ+0BçŒˆOŠ²°ïöÚ5Ã˜¸ON£r*\\Âeš!_bÉ$Š>÷ 5ä©R’©nSsÆÒïad‘‰q®OSŠÈ‡»¶ªz›iÖæ~×S¬6¿Î¯>!ø«±\nZåòÎr3+± 1×G\ZBÎ)³4±ŞFc\'qa¢¼\n(³5v;&÷2ÚFdcM£Ç\\6èV8#¯³ùÓ®iAS»;V&İi½ëß¨\0NæÍ$BŒ:Wó(ªÉˆQ;ş	İàŸ`ñ¯†µâ¿,m*¹K½¸HêÑL0üvÖÖÑíŞ0c‘\nH¤t*Â„}cY“Ü—•fV±´¢÷Kõ“ÀEmÁpqÊœ±’+;»›}­y<²mH…¸ê±y ­e›q!¢º·e¶‰O˜q¬×›îûy]#‚©œ‹’r;œÕ®C~\"î9^ØP7ªWI²¹#S÷‚±×LØC3Y$ÕrºÅXòE%—m±¹LŒĞÅ`ak»å=\0ó<İIR¢´F˜±‚¤é8&mJ#ÁÙ.ù^áñ<o1ˆ‡	„i.%Æ¦RHa™]ŠI-c·ÌÍ+˜oMäíAAªu„4€kÔ§å9O,ûiÎ8^ŒÎ`®â{H9®!ŒÜ[ï$—\"Hw­7Ôê‡İG#‰k†*e¤!ík9G2ÌOœÀ4—ÙIL÷iˆ··ifKd.Š¢‚½jÀu;u¨ÒÖ²Š\ZkŠqœ[x09‹#lÖïRIÍi-¤Ğ/”ÊÂ«$rĞ4l<(Ş0ÓÌñ¡jÅö^[‡|IV‚Ñ«­¸v¦»¿.VŠî%.`Ši~è—ª=>T?ókbÒ¡¥§‚ÊpÁ\'­¯*éU¿Zé\'JşèLUˆ›R—âqi~=eØİeR°[Ô-\r¹³QE_o‰ĞâpñªI\"HâQj±B<#B¨BĞj$*jCÄÈüg#ş\"K‹–¸¯²T™£Ûô*¢ğÑ’t·6ZËÿ\0·¹º‡êYİ‡ÚjA\"°ŒóÆ|/òÜ¸oùÃKŠK\\‡Üt™aœ@Gˆ¹£ºŠŸI…¾ÍEÉdŠœá¡ºËğYj7[_úœ{8ğò²6²öá§× \n>kœ’Ú&‘‰ \nÒI\Z’IÛq\r¤ÖYg6|fFÖæìË$;°t¦?0¿@|Ôm”jÓØ“ˆèVCb¦5¨7/#òY¹+1gi2YbçïĞÜ\\|<4g\nEN…M¦¯5p®kœšâNQ˜–ão\r†\"œƒ–Ù®¤zók²¦¬Û¤{µNKf†ÁJš¢E)­JaîÌqŒÔ¶y»6´¹zÉ®øfAâğÊ::m:Ñíä+OQ^/gê2Q%?hhò»º™©W³´XƒiŒ‰©â£¯Õ®p:ŠºrE§û5D:ªg‡ÌÃ{)D#ï­Y­œÜ×³3pkÎ\nYT¬·+%õJÒĞÓCÔ€ãUÕ¤Üä5øiÀÔUY\0ÅVéñ.KÈû™‡¿íŞ:åù>Bc\ZİYÍ\Z°¹€n‚`IO—2WéĞ{ºör²+qSM9¯2Ş\"s®&aÈ¿Àÿ\0HxåLïvòrrLôÄ<¸«)ot’²ÎkãO-I¯C¬›½íï4‹?²Îe¸%cñÜ{Á¸üÒXÙØñ~/a–àÃYÂ‘§í2Æcü_1: Ë+‹“WW­Èc€L¼#7ÇyÓ?1[Y¥³¶yl°É.ÔV6)-ÃF˜÷¸ewZ\nûFŠöCmXäÇša­ØƒDÓŞ.âÚq,+a8ÛÉoË²ñ7§¹,¬í+±îGn©·u[öuwl†’æ´áÅŞå	5ñ*¬åøï±ÀZf8¶K!‹ç¶—¶ÑAå:Û°Y€‘öD¨JÆœ¸}à½Aëi™Ò©ê{]J`“sÎù§œÁ‹.[‡Y…·\"±\"<nJÛ!#³!‰¨bœM\'œR* %¨ZšÎê{hs*Á<oj¢¿Ï¹X‚ƒ÷T(fºV¶…EÄQq§]UJ­Æ’IRÄ÷2Ãg¤—\r³wî¥*ïüª+¨<ÑO^‘U1R4X¢P‘\"…DTP¨\rWTVã¡Ô‚IÇİ›\\Å„Ÿù{Ú\\[İ¸U	*ÿ\0:ª0øƒï\Zvéşİ|«Ûè¼­Ò|w ‰şÃöèœS.w‘ùWö9O2Ês^‚;¢…	ú%óiiÒ›¨$š°Ğ\\ÆË-±o4grWàHÚßtå2œâæL÷hmîcŸÜÇqn®ƒt³?LÛ«œÑÚ—¾ĞXP	‡İ§N1[ó;,»c}Ì.vošâ5¹H¢óÒgò]·\0\0äÑkà	öè`÷éĞ¬¾iÊ‚Ë0µƒ õÚF?%c¡üIlg‰ëvP>XwJ Ü\n‡’^9b»T®FioM?jİÉ‹w¼6ç#İ¨ÓpV[·—˜>õvÖN!ËÁ¸ËaB[OpõH»JÚßBÆ´}£Ëc2İY’ƒêŞ+Bkm8„ş‚Ìpntüs0¡¥Œ‰¬îĞÕ«±	4u÷Òµª0Ú~6] {*Ú4š+­Û›V‹tv¹+±R¬9ÊqMehBªù×Å¯&¶˜1&…¿Ó®ÎîBß²¹sH©F¼EÇ©[Ú}šáî¤¯B·›[SÂ\0O€Õ<Ñh \\×?t³Ç‰°¬—\nÁ\'¸¹†Ò5qà¬ó² ¨ö³­«}X•ÍnWšJQúyáw¸ÌÅß&å\ZöîÈúhâ”MäÚM\"ìhš=ÈævFùÕ¶J+5NÛ÷ò@ö\0êµ£Ñ«ÑŸjâ$•ïuB?~}gBV>(à½¸‹âHa‰Ò6rkĞn‘F±~ïËma`hN%7—_ÅT}İLçq9=æ6êy\"ãØë‡\\>0ü¢F´•¡’yÔP<»†å¤jE:ÕµÓÚUÎ.qÅW ªñ<ı•åôö×ØÜÁ4†	íá”$R:¹,„I£}zS²¹ãU\0¦|K›Yd9]‡(æ“Ï›òî–[¥š[{RÉlÌ\n²\"QZŠ~cPNâtháKEæ§éÌğnM°¾áûNñLÙÌ”! GŠŸ,/ªŸPÇïÈ)µæ+µá¼¤ãÉrâv<O“öÛ™pJŞÇ”ò9ÃEx<¨Ìö‘+Y˜¦p¹˜0+»u\Z”¦¤^æ<8d`B¨N³ÂïÌf+ˆ™£š2H‡k)” Šu\0ƒˆTr^®’ŠSiÓ¥Öò\\[Ln-œ,Œ_ÌŠôZî4İáZ\nı\ZÂ3!À©GÇä³q=íÜ‰c	òSÉ%i\'4$PôPzüH\Z€mUyØØİ@˜ù—3âüVi,-²W™<ÌuWµ·¦›İ,¦/z¥O¾šœHMa*†îıÌ·Ö‘f¬b[c:,—vÌÑIlÀ3\0wT|ÃÃæ\0èbLTü´~’ğ¬î²ù<Z†¼Š1ş}”İ<è—©*Joìdd÷VÕPhœ] º¢zKm:mj\Z†Çˆ#Ş\rAÔ³L½oæˆ‚\\6ù“äi?|?OÆºt”Ï´sB×Ü£Îµ½\"ñ#>eA\rÀ§ÇÌ@~h(O5Çqøş:®kSp·›¥¼_Ã%‘òYKÈ¥š=ı‡ş]N9«&cÄèO?‘åv7Ö¹ o)k\0¶… FÂÊ®ÅjX«oæ ÷W®Öæ€ùu€ê	>rñÿ\0\"[˜3\\µˆ}¦K‰áUVÔH@b›Æú÷0¸\\u”ÓİŠ,]…¼M,²Yˆ×É–8ãÛá©J¾\Z¤h©&ŠT\'\n)şÜ.Ôä åŒc¯2C.6ì™šh%c™!`ŒÇânMStÌ—º;U¸¡sqªx~èd{‡éñœh2–yø|Æ<¼2Ã)èÉ$R´‹$2¶E¾Æ2AğèUŠ«YÛ×–^?g-ÄÖâH‘¥¶,²İ…JN†‡¥F¹ÉÅJ“”¾ƒTô¨¯øk8wZuÿ\0Nº»‚h¶-ÈÁ°’ÃJ›†¸û¨ÜMWmg3CiU!Y#xğ=u”[B´KÁm?‡›ó«^A‚ñë]Ù,üŒv¢ã­>yCg™Ò?æ\'Ù®†ŞëÈ„¸öC­q¶tMyñd3˜¾SgŠv±—?ƒ¤_+Ûb ¶ÙHV|Ãòí_ºŠG·DÅÒ5òD]W2_I£ï$—|«Èad³¾~1u‰½µ†¤m$ğºƒAåÉ$qŸ¡è|5LÙ\0ÂŞ\Z«èRó1¯BrkŒng9y’¶V,‹Œ©³\'çµğ³KEÛ/šûRó­HƒšÚ}8|Êi°‡ÒÛx™¢_WoJ–{fO*e÷—Œ•jø°Ùí­o­!5*îl®0öíY]\'šĞ±Ü¤Š {·†éìÑT†+Hïn ³‚%‰®.AxZWŞ#)WdV5 *|}ú3q4L]N\n9Ü–Üe¼1z¤äÜ·6¾tv´?+Å3:ÆjGÌ‹Cá«pÂéPà†çTd†â¤šÔ±êIêI>Ó­D²¯]$ÉTN’r´Š{™a´µ]÷w2$è|’\Z\nü‰ø ¼U\\Š@ÀILıÀîŠbíOáR²Al­o}˜^#Ôù¢ìÜÄ–à½:šÎ}0\n‰s¸ ³\Zš×@DY\0“AÔû’J×rlŸô®/Œr{É==Õ¯¥Æäd#sy7PÕê½7yr&òµê7„ƒ«oÀ]§¥öåbUxÔ%›È!’mâÖæA½7MĞÌ>x”>\rUHÓÁ\'4f2ıfµ¹‘¡ÉcÈ[‘=¼¿É‡ê(Ãù´èiÎ®ŸñğÄ,YÌ†GÄûšÔ¯ÿ\0nšÎHŒÌ«À¬¸íÅ÷\'À‹[nH\'\\ªä|˜ÍÄĞä¹˜E<n„Ò”ıíP¸k°wv8VœP³»ÜW„Îâ9f.Êl\\£ÔZäì`UˆÇ‘³ä•RRJ>õk÷†­[I­´¦!\nVéux!Ü¦,¤„%¤ñ\0¨óm¥eAõ:®¬œ†jÓö>ú­¬­Q“ÕÛâ¬1³Ì@ó¥¶d[Ww ,RT»¶oŠ¡§Í¬èˆÅhDê„ÃßdX¡iX$H¬ï#\Z*ªõ$“à¡j@*ÑÉ¸|Éf\'$m,>Â	ÖœØµªïp\\­«b¡Åv•øk™™¤R*¥¿˜[şğûuRª:WÌg2š)J±?xÿ\0~»§Â\nfLBœc¹ÂªÒSëÕ	,Áà¯ÇxGæ{´e|Î£ã¬×ízKJ=×HÍpã]È‚ö.m†ïóø”¶´šës\Z“ûMÊ=»OÃAºÛÌb7piÇÜ³.®„Å@d·“$³‘é§+òŠ›‰ky>\nYä°ì÷êUf³“…è?\r\r$¦Ë	”ËL%Æcn¯åŒ÷ZA,ä¡*|µ>4‡Qtn€…s»†û‘¶l•´öv’+ËÌo¢	~IÙµ(wWü:,/Ô\Z„²)ŞÏ¸Én½>èí.dó¦ßÃvÿ\01£> IÑ™<TŠT^&ªTJ‘B1*6ùºB+RMj{M’u×»]µÈÚöÖßœã³vY=ìKsèÄÉ*CD<Ä|¥€en¢º=œ€K¤Š9uWà\0Öòª¶¨\Zd’ÈN;á¡’K‹¹b$=½¬«/Š´ÑHÎÀûŠ)aq ¿’ƒÎ\nºZüuˆ±¤’rÁæîøşJ,¥ŠA%Ì±‹˜c¸ŒcmQì>:phj˜Š§QÍù/193×†t„Ÿ\"İc…ıâ¨€\nŸi=tîqviƒ@VGµ™Ïp<uåÃôöÒârgÄ½¼r,q±?½<S#{6ŸŞ:=jĞx¦ŒUå¼(¤ø™0öQÆÓÜÍ-¼*d–igT22\"Õiµ(<*|ŠçŒpUÀ\'\0§ö¦~áòé¬Ä¹.7sˆºüÍm.–[«¦™èà:Ãò¡VñùÉú5q|ÃƒUøí]™F¥‡âhùo%äL36–ïl–Ù¼·xØ³òã-+ufêÌ‹ïğ®‚ë¹dikEF5¤q\n£wc]dsØÜºJæÆÛ>—\r’ÒŞâ6l¯ÔåÈîıOZhÕè.@‹Ñ’­,=êóÁ9d,OÌ°ïT)Òö\0Gí$«)_÷±°?ÅñÖ‘U28õ\"7Ìd1Ù[ñè·4’Hí­å\"ß!exTİcÌÆ‹\rÀtK‹c!]“«#ó7j¼ÌX{¨9‘O¼Ãq‘æör`0óÍmé/cÛ—¤)\"Á,\n‹æJˆê[i\"§Tã°àÓTr$vÁlÙIîùĞ(\'â\0ÑÎ*Àm	İ;¼`X¼ÂPRº¥%¶¤PTÏÿ\0YWË¯›×È¯·}5GìŠ ©l“¬r>ßÇûõ×Qe,œ¤È¦´¤Ö€¯Q¢z”ç…ãÜ³”&\ZÂYíI§­ˆ-ïd oäİªS^ÁnÇÅ8d~AJãìİò5¢f3ÑYÏu\'Êl­ä¹hV0äŒeÙz,hŠ7;(Ü«V‡vkÉ\Z{½<U—YŒN(È¶<;ˆKÄ`½¶µ’ë+Èr÷R_Oˆ÷&Ù<¥¯µŠ]ssËÉkÏ@\0Pv«\"ÌéÆˆ­Áû%Ç/¸Ş>ë?Ãl¢–ê34P¥İÓÜÁ	?‚“™İ†©—î·Q¸ŠfÜÖ¬~¯ı*¨ƒJ{R¹;QÚÜG\"·±ü‘RõÀic’şd¶¶2°\Z`<é›ä‰ÜÀ1€èZ/Kqÿ\0ÚœyUO|ã¶<g%Ä/ñ¼¦ìâpôDµÉ_Ïê›,®±#@ó—uVfTt2l û<tö°\\6@ãFõÓ@M#˜F\n©_qGã+Ş3š¶³xi=ôÑ)T˜ªƒÂV‡dÈVE¯¼uÔ‡\n´Ô!pLY™·¹’;6_–[[€²Ëà)\"L¥ö½@j<\rF™ïÓÂ©’÷&æQñì®<+Ë¤c5id™¼‚DjÊÍ´«(ù–N•¦k,eã^‚ƒË²BÅó\Z#2#½ºÖ³*³D\0÷¸·[ÚÚ8…\\³\rFS¹OƒPu4“­¸¨útÉÔŸ…Ãçß]ÀGù‰2“ï1ÿ\0ˆÚ¼H2*Ç4O²C £ÆÌŒ=ÅM³Ñ–€WÛM$”¯ˆvËŸsã?ôo¼Ì%±â[hÿ\0	õ\ndb«¸»k]U¸»†Şcƒj‹O“Â*ºIÚ¾ãÃÉ¢áÏÅ²Õ\rğâÖÖF™Ò´Ş¡A4.Ñí:”WJÍmp!\'ÄæšŠ½§ßÓ?*ÂğßÊ;“å]]«Ë8.#–îK}Èâ\rÑXƒ”cn-O”\0Nà¯@n–f9%Yè1|O…c.rvx|n>İæ¹¸·…#d·…1.ö¢kuÖKé&ªĞcX0\n´s®íò®h\'³³¹“ş\r£Ğu¢AFjşÔkµ}|u ÈšÕ]Î.QtÀñ<×	)9®—ÊÒ,w)o{tÖïÃ!Sn±4Gt;—ïCùF¬ù£Â†5V ¡ÖC¶–°á¦ÅE“=$¹ò“½Íœ¶¾vÕÛ,{¤•Ü™\0¦æUÜé|ÁÒ[ğQs5MQ/Œßñ^oäà.ïÇ™cáŒ[6àwbÈ<—Øİ%Ú€$ª>u+»Âš¿cpeˆx†¬-h¢†ìQø>˜ğ¯ZI„²Åd¤¹¸H2Ky„3¬0Ú$£`tf–\'22‘JÇ¸xS¦­>`ÓB1Yğˆ™Z=ô®B‚ªÉf›Ë2˜¨¶Çiy¦NãbS$fŞP€“@\Z§Úz“¡Åß$”=xš\n&‰2oïÑÃS—¬Æ×7=R¿VCRíåßlño»·ÇüzzÚŠsîÏløç\ZÆYrN,×v±¼‘Ûf°Y)–æ[y.Q›iÕSÎ¶›cj´å^iİ¤_*A\\0pâFc ñ§‘B¬Ü[hn¡Ï$ÃÚˆû_.NKáEweåópÙ1dÅÆ¨*KbŒ¥šQ\"‘×ä¥uctû*Ây![:0{Ù«’ÁŞã­£¾—Øw@Ñd­¨a‘Ğ°RÁV¤§Äxk“kÁ=+u®&y,áâÚø†y-D¢STáB±éPj¡Ñ*EG5:\n®Ös]crqå­=5Ìğìh-²vş²Ò)ÔH‘«ÄCüYš”¨¦™À8PÔu7Ç©JºîàH—§‘·Ü“’ÚL?‰§õ}~)´üuTÚD2¯¥Èw5\Z¸‘ïî-ÚêD‰MÜ/æÂ(YæF–vyÙœ*’YœªøíPè÷)Äl4S>{ÎcäŸ§›¾Kr<©¹\\&ÏRY½]ó¤?#z@c‚:P×@·€²ì4|‡Ü¨V¡Æ(d9^&ÊÓ˜d1’dñĞúl^yò–ÑešÑId·¼„+ÅpˆOÊÄ¤‹×¯Vİ§çy.&1Í´îõƒÁ&ÂNet¶í—1š$wxk’Xƒénn\nö6ï%êiâ¿Û«rgÒ}IşİÜÓ~{µY{-rr<U¤Öò,ö°›fY\ZEè:J·jõ¡_\'iö@n\rqÁ‰Í±<Q¯¶]Úš|{`»‰kc„’åÛe òíñ·qŠ(ó`=-¤5è§äoğ“D/kw3Á?”æğÁ2÷7ôãÛşå[Ïšà7N\\ È%°dleÛ{®`€…ıt@ûA¼5zŞöHˆUß]’©—}½çx\\ÅÏ¿ãY6ÍÙ¸âÖÖÒkÊnVWYuW„k¡Q–êª§ §N=†ÎñŒµÌœ£ÁA4P¥¼ù;9ìáiO˜	%EJÑö´Í7;ƒ+Éví¿èúçºÖ\\Ç#h³Rİ^`ñ¶ñ$ò½±™ÂHÍ$ˆ§u	¯]½I¦¹;­à¶wCÜÜêi^†ó+R+@cy =Ôhíg8Ã^ñ|Ş2KgìĞ=ÎFXÇÑÜİeŠGü#hSü¯SFnföşI]¬¹Áµ \n˜==45Z°[†\r \nôñJñ»‰ö÷‘ÚñØlQ@­ÃCt°Ã|ß+[Éu(0ÜHÄüÒ‘•zx­F¥4R<‰š^h0.¥{>Ğ…ñí>™ÑrsÏÊ1qçğŸ3ÆÅë±à¢¹‰©¾ˆÅ>GI“ù¾ú-m~u¸\0öø©“ÙÇ©¹ƒÄ\"Éo¤i­\'áwÁK¸ŞvÓ“à¬3ÖJÑÛŞÄÁ\'ù°J„Ç,2)£oŠt†œ2TÚy¤ÜÛü§ˆæøôL|¤Â\\•O6›9¢–\07ÃNÇPÕ3ÅB©¾ÌxÔ2^r<\rŞ:Ê\"·²æµ?ÎäP+ûM´kL=§\"©Fi¯	Ç²\\—*ø<%»K}([¥ŠXD`äf%FĞv‚Õ§¿E\0“‚‰ f‡™ygnœŒ±š,géå‘\Z’C8´”Çµßs!;—æÛÓIÃKšó\Zzª„dä™çâsüö)h7ñØ­ákˆHi\'–\"ãÉ…®¯ÔÜ §ÇE°µtm!ÄSQ5ëUú‘AŠ&àyE7¸ù>+ ºÎÚbP‚©‘·ŒÖµù–•ÆV\Z=À©¨VÜÏ.9Óº¤}Û±	w€Í€úŒ\\Çá*‹ˆ«üÑÈ>½5³¨å‡çv´(’Åd!·RGM1jIæöûkOñ}[µ)UYØ;o?ÇZYwÖİq8ÖõBÖ¥Z\"ÌI’âxÛp.X…¶‚M´ fr:y¼ÎR`~<OàÇ—Étò€æb¤äŞhqİÓäŒ6;³ĞIŒÉÈÛ²båİm-­R¥oËUŞ\"®»Qİ!è£åb:Í«vtššòé‰Ô­yuqèY7Vºhp\' y/ég1„Á‹ŞÈî²Ùˆ£ßÇ^*Ámtá~smH‹\Z¢¬}¬ÿ\0wV›#qB,sB®¦<:èÃi±™V|KJĞ«…=ZÚE!HÄx~ğC£4§5¼ŒŠYkÎyDOä¤âtûö÷J\"ı\"E$ˆ$|tnÃÁNñÅ+n{Ë™Júà¾ò°DüİGí£äŸÏ“šf—)“ÎÌooï%¼‚Ä—I#qBªS¡T©i\n‡¿FkÏs³*Îa„ñáñ×·0‘†âxø¬x½”Ÿ¶dE_JA£K=w|¤ª!Ú	%‰ç_MDqq©ø-£Ò:W{hòœ‚\"ù»9bš¢;;ÅFİN•E_™>\Zê$†óGÀ(ÕïvRâÊ;{ºnY¡S:²E´‘õı:0}B•Q,ïr8÷\nä0[rK/ÄfKŸ\"u´ó£nãºw2;FÀ+)éCü:Ô³¶]B=jÌŞXµ<ñîãvÛ¹9ë+ÆñWÜ[=~²ÛÚA›¸!†É;¥}%Ã+´±<«¹c‘:W¡\rQ«Ï²˜`yªm»ÍˆQÖÇg¸g\"x}]ö&ò.!°’	yJÖÓMÍ,‘««ß¶X™_Ä5’T;Ä3ø¦si‹r9+OÚ.y„Îñ»W›;…aº°šSæLË÷§‰HNæ5Üß\ZRÆA¯V8<Éßãl,¥|ÕÕ½¾<©²DHJÔ0Ğ†‚ĞIÁÚxªÃ€æ8N;Ükœ?·ùü‹E‡‚1åAe’‘wÇ-²\ZyQ\\È®¦1EŞÈÀ\rÍZ;½¸¼öá$yõsëÖsivƒár wA÷¼¶\ré‘Ä!½¼çÊ™­ÀU¿DoñF‚â?ûXÓİ®u“	f®Üÿ\0»ê\'ÔJĞ1–6ŸAÃı¿²[vGŠqì¼«“r±u†eÈ[As6Iq.ÿ\0>7–PôtİGÙ.î•éPlÎW´ÆÆQÔÒs4àÖª›,bÚÜì+Uä}ÓÊ`ùÖuøxÜñû·óÓMšÑ..™¼”™A_ÄVz¥–öêôV’‰[Ştú}\n”×nd‡Êwtö\"/a;ÛÇ0XnGî/\"ß).Q²¶i:Ÿ6X¯¢C3\"Æ´Ú\'G4\0¶·™,hhÀ\n E>eÙ•+Ëş©8õ½Ñ	‚ºÈXD¾º4ûLP6ùJŞeZûÑ£¼àLÜ’ı\\vÎâäXfmoñ™‹9—ÎÆº,‹2Ikô6¾íŒ¢ºvÛ—7SH-æ¢n\ZpB\\îoŠgùMÖC…cdÅáòy+<Eœ«VBâdQÌ|””Ç#­\0ZŸyVÙ«V‚q÷t<$îN;%Šî_QHø	=2ÛüÂTxMÂ³«WŞ§ø}º,ìÒÖ“ÁíöÓŞ«—T¥	ÎÏ–áyRqÌæ6ß7{¿K<°3¿–†(Àõ\"´öVš{IÌ¡Ú³kˆôpNèÍZi‚a³¼»ÆŞÚäñòùY)’êÖoİš6Ü	÷‚~÷¼«¤U¸ÕZ,íÌ=Æí„¹\\\"U,)‘µƒÛõƒy’[Ÿñ|¯ó~ª°èxVN!’ò;˜b¹„îŠUWCş\ZÚ¨Õ,·g“ÃI2Yµöx~ÇöïÓQ2¹]Äî¦ˆãìñVSÛ]gïeXq8_9L·7Œ*÷Y%a‰jÇü\"ƒæmxí­£îÈ ¶6âãÌó÷4pª’fÅW8êyË rø¨?lû™7Îe/¹$·9;<Ğä$TÍë\"¢Ç\"FYUP%c§å] xuíşİ`db€~ªzV(êÔî(§7êƒ¤Eà´ÊK(¬^DqÔÿ\0KA¡ı»‘<ĞUzæóáy¶s!z˜¯EÉL\'%üÇŠá€,nJ;7Ïòxzêë‡Xâ€x¼¿)6w’òN?6cØ<á3ÑF•0Û9V—kß½>½MĞ”Ñ8ò^—vÍ“Ï7gßäL·mõl%”ÿ\0v b‘H=¼ÖŸœä¹ÅÜX¬UœØî\"½ıü«åIqn§¤QÑUÈÛE©§M>$š”ª\\pF‹NíòèÖLNIW\Zª±\0@e(Wç„Šxe:Í‡W£œ·<Sı0Á^¯âÈÖRŸº]¿í®å?nªº•u³±İ 1’æ¸î4Éw™2§q ò˜\Z.å&¦›}º¢]¥Æ¡H8TÑ@9ÿ\0\0‡5\\>]Œa˜OÉ[€Ì(G»¡¨ù]O³êÕ»k‚Çjo¤(Ë•´r‚ğ¬_éãy;ò.AL¾\"ú¬VK×ß\"®É£*–²GºQ•Íz§Û®–æáB±&cZâ\Zjçp9Ö\'‘C–¾Æ^Ã–¼É^úì]ş=f\"ğJÆ0Zæ8b°È®Ÿ2±\nMzR0HÉ¼Ï•[Fè´ñLOù¥®NÂA\ZÌ‹*$«½T‘ÕM\n²²š©*|F­äª¬Ès2îĞ0ğYg¸+ñ\nQOûcéÓà’EÉqY—¹³Åİ:fÑ¢¼ÇÜô\rë-eYâ¥:-YŠxi¨#‡jD‘ˆÍK²ß¨›YÃ­–±¹L½¯“‘¸’`ñÄ%]“¬H6ãó¯ÏM¿qŒÙÄSMCNØ¯M¹³H%a9H-í2·3\\¥’Ğy’ÈÒJ-¤h‘7–Ü#U;TŠôö\rt$†’@¬sSšÚÉ,­Ô;Il¶ğ„ÆMŒ$–¨’H„ô­>†y«A9¦Q.as\rÖdÅ-aHe=ngaôÂºÕ²iÅEÊÛkûCÆå„ÉSXÍ+\\³¥c“ñ±?³â+ğÖ.é¼ğ@$8\n#ÆEìfç‘äŸ!‡â×7ËiŞnN4‰\Zª:DJ–ùKô®¥&İ+!\'Q?Â£¬’]Üœ·ä½·ã—X½­”nW>Sğ@2\'äöq,[Â‚À4’»¼zê[LdHâAÀ{T¤É?PØr]®î>&î›¬¼7Ù†A \'ˆ\\Z+ªõD²‡f§]lß3\\.ıU	¦Š®rì¥ç$¾â²´RO”“%âEïõI*¡Wî¨jaĞímü—<…pê¢w\Z€›.­®¬¦k[ëymn’›íî#xeZŠÈáXT\Zõ\ZĞ@8\"gy÷ôsò¬ŒÛ0gE’G?%µçEn¾\nİ#“áCû:¨ª,nÆ…:ón<8Ç&½ÇA•œúìzº±NÇ|cáÔ†š»jıLêDp¢E™#®ïv¬ —ú˜öx\nÿ\0µ¥DõR¬WÆÛª_e-#—8ãsËÔj×ğ`e ¨PhÌ:»V½(8Ñ¤P+\r`?ÇÃ”ŒûzÑ™ÙÜWüLIéìÓ©¤O™³pÈe­„K­Êû·Ç)XÛø‘×øtà˜ÕjaÉå£1ä#ü²ÅúKiÂ[©Tø¤’ÇEOíË1´4²É2Û:öØş5–”Æ±ÙÚcîDZ\"D°2ª…\0ğQ¤1!KU€qËLæBK‹ÿ\0ÎÃcÉlIk9;TŸbô5Õ‰¤-h³R;¬BYc»³`‘P+ @¥)¬ÓÒ­¤÷—“	‰ĞÓÄ‘¤\0L“¥İÂ\Z‰	÷†5ê:•¢Yq,¢/-ex\rk¶\'d£oÊG´SQ8¨Éw–òx£8³”†¡JÎ\0­@ê baàJ„Fï(m \"İÍ)·’i6©ª´İB)# of´ã~¬£#hjSå¥½îÈaæš	Xİé\r³ù¨ªª‹\Z5@êdéş)FÓšQ¶¦ªO€ÎXX[ß[Ş4±Åæâ6KyæE[˜Ög]Ñ#µËšíĞccœÑ@ˆç\0hœ¦åüZÖHá¾ËAc4«æGîûGd$ÀL©Ò¢š‘ã0˜<)Lü‹k`Ùi²vß–ÆFë˜åI\'¨U–,ÇØ Tê:IÁHš!µ–^ÆæŞã\"óÁmoqssr±´Ñ“SLÒ*½	£Q¾eöšÏ¸a2UIª/7ãÜ	¯ZÎ5šG1zs$òİ+\"îú*=ú7ÚÈ8U5Pï%ËòÓŞİ¶6òæÓ;R;q3\0H§I4éS­ÀĞ@%$íj®–°	?ÌØ»ÿ\0ˆŠšüue®´òût’F×w\ZN=Ç$ÀãñvÍæ[©o§šê6O·m<™…BíÚ«^•>:<~];Ä³E^\nH?Q\\·…Ì¸ˆâÖd‰$\rmi–G,ÊÏê\\É¼õ,ÒÌzût£‚[W\næÒä?Õ/z2Wr¦\"ò$µ6še0Äå ,K<kE­(ÓS¡¾hØjF\nå¥œ·.-f`z\0çîR¾UÍ{Í¦ºÊÏ.OÅu&FÍ!»kuB$bĞqP6±N”&½4FÏÂ”Ut;<Ğ¿c³]Ûä69>1am‘‡ĞÇÆjÊ9±ö²0w*·v#Í~_ÃgèGÕ	K\ZE\nv‡	W<ı3ò%Åñ¼·\r”á²ñ=Á‚\'…¡eù¢Úîû†íÑ©;K0ÛÑ¨{«L…nšqEtF•$·ÍIÌ{iİáó9	•!½Ô¼¸«šF²šõ;6®úşá\'Ç[1t«P˜‘Z­UÛÍm?±ÿ\0OI$nqöñäìî÷vÄÛßC_-Ø\Z²0=RE¯ÍĞs®ii¡ZrDæ\0s\"2ıº—g$Znv!TWÂ¤Ğ\nê(miq£E\\Ó•í…s’K=ÄŞÑ#€ù³Èæ,¥„.ê¥¢­R¦Æd¬ˆáoıÇ“qõä¢™m…HÙ0x»‰®<ã\'0HÁ÷ù6Ô-ôy‹«ß™C|öàwZçâ4õ4ÍÛr^@ÒŒ–}¤´“ÿ\0—­¿•fİäÇ(”ı½Çã£¶6·‚¤éœpÈt$\\?È]ÿ\0øì.I9¦ƒğ\'³–6¬r€åƒF*ı|\r}š­s\"­à­ØÉql¾qúO5/ÈXİaÜL`\Z±İO…Yw%~†#Üuœ®µrêÑğbqiÉÜ©[©IVó%?{jµ|>RÉQªU…Ìçªˆ÷æ¨ê¨f?êêÑ:yL~;Ó%¬×Wâ-`D©ñûó9éñòô*º¼?]I`µqÆ¬âØ‡oßÈßHGOû;sj§ìÓÑçæìê#€÷¤÷ƒ4\rh³J[YDI ô¬‚6ÿ\0¯¤CZÒ‰¡äx}IŒ+ùg’İP*2ø=°L©·ïmÚ“MêTÓD©B-ÒhEã7ŠãïwlEîZ;Y$‘}«z{‰ÏÍZ‘PÉA	GfTecVèu±jÿ\0íÔŠ*7\rİßJr—å<“5ušÉãîVâáª#òe+kÑ#Z5\'T•(¹ã­c°}Ğ1\\¿š­Ñî€÷é±Q(±ÃãÂÛğœ–C;l·6è‰T 22Ò%\nU5,zQ†°¯Lºkc44æŠÀ4â‚Y†´|¥ëØ©K&¸”Û#}ás´\Z“Ô¶™PÑ«:b¢¹ã­ıMä1~ÎàÏü+ÔêIŠ™š Tû¼ûÛ©!©Ç\'àa0_ÚË4×Ñ¼PŞDFõw”R¨ª*6·Ju¨Ö%¦âe”µÀğô#9”)_oğ—xlC›ÈÌ7·ò‰šèé\Z®ØÕ½Íâiì®³w9Û,´†Š|Q(ç)®W‘f§üÂ;uº˜£İ;‘U¶~PKP­øÒšß·%°S\ZpG·µlåÕ‘‘†ı^à3Hí³˜¥¼´ÆN\ZÎåvHÒÂ*Æ…KÜJô4?V¬: úB<Œ–z™µ5Ùêm+Ò8…h{ÍG1Å-Ä–É[GO}ÈRPâ9bn‡k›£\nCªî¥pUÌncZ\\)¨jY{“¼bxşZ)s·‘pì„Â9£Ç¢<¶¹	Øöné.v½>ä¤0*ˆŞaoöé«¥@)ÏõMœÏŒÂq¨íøµÜoKw;IêC.Öq³zÃ+x¼ä.hZ­óñÏ}Lït{Ñ•Q–\\oïO4ªxşov&ÙV%Qæ\0ßŒŒôéZëvÜØ@v%ª©=äÄ–wVvÂÁKËF’ÎëßçZ»Bÿ\0ÚšİÚšHZù§ËşOúz\"j)Ï½ã8DÉòîÈÿ\0MÁ4v|…rÖÑ%Ì«zyŠ<RB[rÆÛ$§‹\rdÉŞ«PNè°ƒ˜9t¸å¢à—¶—9ho¹>#äôŒŞeëÜµ)¹Ø VÜ7mù‘zµi×=±½æ‡\0­I8 œ¯•fyn\\ŞqÇ¨+äÛZÇ_Oil¤•‚>\n+V\'æv«7S­v´4Pd³I®%2ÓRL½¤’÷‡‡O£I$¯“ÈáËdâ8\\“5œƒÌµ’¾;£¨¡?¼”?N«MnÉ9óZ»„Öø4Õ§6»–Ï•–ltù{k0‘ÚÊßY‹†ÂeI±ŠÄşí¡ğÖD‘˜B´¾İ·2Åİï4âZ~“Ü‡!%D\"(÷)‘¾Ö4ÿ\0gCÔ˜Y7‰H&½¾¸¨¸»šE>*bı‘í\ZZÏR°ÛxÇœ$cª¨Ş\0¯Û¨Õ\02Z\\É²	‘@¦¥eÚHh4ã4œp\\l¤¸¸ÄïãÉU»BD¿†¥Ö§MÔUÛ÷O‡][šßC’Î¼:aÏ&H±§EQAïú~½mR‹o¹‡í·I%«êROFWù”ˆ5I$<ç>	a°¶•“8’êÛ¦‘GuPÁ}Æ¡€?w­<u\\ÆĞâà1)Š’O]$êCÇ­vE%Û¯øqı\0õ?nœ(9HlvzûC-~|;ÉğÛæ-u+¤Ó‘ö$ÜÑk™rùğÅÅÅù«‚HY*DJçld…\"¬äôR|:ë”±²4¹õ\roè£½ôÉ;äïäÁà®oî_Ìº²¶ÜÒtîv…^€ÖBMS‰‚YCZ(	õ¢!Àb66WWwim¸¸e¨P@,P|çæ#ß¸ë¸.&\ny\'~˜Æ§z=ë½åŒ–[£šXZàxÛÅ ˜âd£èİ]D<;*¢Ïf`ÂG7WÒ£é¥@íN–œã–c.lvZk)\n¬GÓ„\nERˆÊŒNĞGM0‰ƒ æöyéæ:ºE\0PzôıŞæ—Ø›Ü6ZKL•õ¼–Òùöâ9@u exLte4eéâ4ş[B«¬ñQëŞwÊ¹Êfïr·0ŞKq´š[xÕc]´U€êjÌ}¬N¤\ZÔÅÄ¦ùñqì–rrñÚÂ‡È”Ö³\\_>;wcZèN”Œø­Km½Ï…ó8Ñ¬sv4ìéDÑ:ç£\\·BÙ»+\\É#ÃÏ•\r½Øÿ\0ù;6­ÀìÇ%J•MŸ—>ÊSáõn®®êPÒÀÀóŞ5ŒºäwÜ‹šãvóÛ§!‚ã\rŞd1ÓÊ°9¼„Ê¶÷À„˜Lh“7QZtÖsk4¢,éª„r|åÏÀÙœÄrnÀ]Ç+İÃ™s{Éåó¼Â­ua2ø/ÎºnmäL>+ˆcû‡Ær7PñL›[ˆxÿ\0 Ûë‘.%ò«i{2N±­§z¨©Ôƒ’Lvy<nE¤\\}ä7Mù‹†#ãO\Z||4@AI+ñ4¬iÒ^¡:I,…fû Ÿ£ÿ\0³I%ÛÓ%ûÙ$jÉ—±¼±˜HYc_*3u@IÛå½øµBñ€´EmíÈæım>¬Tmq÷R(3^²ôÄ‹ãñ“Ì:¥¡¼ì‡*ÚuºÇ–æ¦sÿ\0–£û´Å£‚İIÄ¥‰aazæÒÎ›yÕwÉtnÄÑÆ¤ÑIHIvj\Z(uğ©:®Ïİ·ON÷\\g]Ù`™®ˆ¨î`oñÀ-ã;O·lŸn„1Ø‹÷.9¨”V’Í{%Ümá4!‰Y	hä«ìaàGÈC0Êjı´`ñTîç¥Iú5(ŠŒí#(\0ÈôŞÔöµ\0>ŞšÕYËm$—Û¸¬,®/¦¢¶æuZn!h+Ò§L’rI?$È‹¹#ÛÆ¾]´\0îÚ•­Iö±>:5I4[ÂÓÌ§Şs@}ßE%2„$1$1ôHÔ*I”ªÖÚæöFŠÒ	.$DidH”¹ «1Ø¢é\ZÌ\\hœTœ§·Øi2YuËJ¤Øc˜?šÕ>eÍ>EøíûÇİAïÖVåp#Ë\'{9¢FÒãRŸ{Ÿ“òì¬pñµéÍÕÀî ùPâs_åÕ\r¦\Z¼¼ä$¥ó7f;¸\"N¾E$eöO@~­t¥%°“\\Û,Í9Š½¤Àoİß#…úÀĞËNÖ´™£Xåuiák=äÑu‹.CÔÏ†OIm¶‚CæH]¨¨ƒh‰­\0ğÒsô`sPŠÉ×î§KqÇşÜ>cË‚WgÆ2WÙ(ğòMk¿Y‚ßÜG	D«2Ô°ø-*~º—kk‰êFfÓq¬1À0TêSŒonøŞ.h!Ê]#[Â¡¥Ù)½¢ÙHÉÇıä”_hök0ŞÈáÜØº¨¶{v¸iÎ#‹ò‡iô(‡wùî7/¯ãh°álFÃlEêÙ¾gaÓ 4:=•³™W?Äå›»Ş³O“¯ÔFXdÑïáÉ;öÇ$—¼>Á]Ÿ“— öúLÄ~t_P¸·aüúÔŒÑë˜aSÏ@6ÖÊÿ\0µM[Ôˆû—Üo•òm|È8Í„Œq¶¯ò<²}Óu2ÛaÑş­:}âÄÔ†!éC‘úŠ‡á²™Ş/6W‰ä_{sÒö‚{Áá¶êÙşG¨é¸Q¾:)h(ióÏnáåk/+—Ç8\råŒ–wLN3Ôqö¹V!nõr²zÌ€2|¢´ĞËh’xä2tvv½Ïâğr®2§æÜ@¼—øç`°ÛÃ2Ÿ5Ñ	‹+îö~\'€ŠH9Şş×Úvë3cuiœl¤å–åmo£ôÙ[m»OüD]:6êÚ¿0aJEÅ[· $ßÛx¢Ho¥i?âå)åÀÄïôê+æ>*Ìi¸té¢Ç–(2–êîäœyi´µÃ#|²5›y–³Ù×k5$¨¬¾æ\Z%Z\r]’‹[¨Ğfœx¬6bÓ%Éq3mio%ŒMq$îîõvX‘¹cÜ[Ü¨ßHÊ\08•··[¸É€£t³û.fë :,vô÷ ê‡š:PşÅÜÂ××dëiÿ\0ì¿ó¢ÓùéQ6/àB[‹Êäc7óÇˆ’X,ã†Kÿ\0*h,r3¬l»™uQM49¤×\0€c{J’–ÉËñê6¥¥ë\\HíŞ5ñ-  iÔ\ZÂì*áÌ‚~:ö,…õÍÂO\rÄ»Ir+Næ {@57Sã­vÒª”†¥:jÚås!†Öy—ïG¿ÄªHşí1I2¼ÓæmZÎîáVÕéæGkj\ZÑˆ?F‚\\¥E#®™5Æ\"\r€Ü‘ó5V?£ÚÑ§\n§U:Š ñ[«.?ÅîsW»·_¹ˆ¨%dED$ŠTîjı~Ía^5ÓÎ#*3hÑU1â·¢L%«Ch–6²m,ã$ì„š)b~ó7Ş\'ã¬«¶RSW\'§àŠÔ2å™UËrûıÃÒÂ}4Ùå[UIÄÛÛë×Ic—N*»ÍJ\\Ü5ÄòNOYš{‡°jâtı†@qà°ê]˜<B:êA\rÊÄpÎü£²ò~G{.XÓ]@÷òFŒ-îãBD 0‰|–s¶ƒæ¯C¡:6“R1Z0ßÜDÍykyŠ«—‘ŞÚŞÏè’+øexîZ‰Rdb¬\Z½C:ê@PQT.$ÔœVòå2SÅäO{<°»y]“ì&š`Ğ8\"¾âWŠ9Î#¬¤z’!öúOY›ÀÆk&S,Öi×­ö)…ü§´ù.ŸÍ¨»šv£ç˜íŸ|ä?5ÿ\0İ÷xêİQª£Õ‘Çø÷é*<**:ÓÛ×ÃI%ï£èût’K¸Î‘p{™.8•ÜpY\\°kì\râ™±7\'ŞaŸşÒ*x:jI_æó÷Cg¸tŸ’ÏypV!&:A,’öö4ğlØ“+‡Ğ%2Ò\0<Ô§¹Ü›	Š½Åq¾éñ|Œø6A/;ih–Y\\C±¬q\\Ù–¶ºFg…\Z*ÓIA»À.í,\"²Æåí³¸¬å½¥åÀì¥•ã±d!g(GA±_ñU‡UÒsèÓTxçÈĞÜÉM’‹kK+<(³añŠË„miçÖk—ÆıÑû)AïÖ¨Õu¦€7!ë<O¥&¨ÔTz$“†\0Šòx«Møˆ¾ÏÂ¹gíjì_õ9eÏÿ\0{xöA1¹«;¶}°‰<¹È4ü)AFşÆ®´¼náºã rIr˜ù,®å‰^H/m]­ÌÖëºJ! ;(|Å\"„©£¨ê5tÇ\Z.zš‚ËÆùN6ÚÒL¬S½Ú#Âö®¡dóFåT,ÛÈ#ğÃ†?°­ã§eüdĞàŠëGTÓ\"ú{ëW\rÜPÊ%¶™ZĞùmÑ£+­u Ò*\rUBÀªşåF«U[\rÁmWà<I÷ã¤¤î§tePE@\0|¦ª®ôõJ‰ÆŞ[Ì³ãğÍ+t*Ş>›PHjç§‰¥|t§Ó­9Åó”Áào.â!´]¨ÿ\0#Q#\\ÔQ$™©VNî3^m™µHŒlÀ!mÕG²½uÖ«Q3i”“İ–RÖÖÎ8X;È+P Ô“âu Tªµ=—ïÃöï\ri†òÒ4Ù<´©©‚dÉ™v”;·3lM¥zxÖš	k®%N˜*İİO1æ7Ùø±«Œ’åc«ï3K\Z…óß äP\ZJtİS^º\"J¤’ö’JAÁòëæ,Ä”òm/ ’jø¼À$éRtÎÉ8ÍXŸèXÿ\0-òüïøß_ı	¶}?æüÊWÃÓüßF£¯Ø«Bf—vù6ÓÍ·uvîëJÓ­+ãOf­£|[×yùÌ·zï>/Qæ¼ò¿b6SîSÙ¦âR-8N½×N˜¡6oÒÿ\0R^úÚzO_øõğòüÅİıšª|kU¿ø§­Xşÿ\0¬Ş\"òÿ\0ôÇş»úçoå^ŸÛéüÿ\0øŸ/oÜ¯ÉîÑ\r8,•0Ë~Cêî¿õ#ò/ıôQş]ù—ªõş»æó?)õ?ñ^U)·gÉJy~İE!^Uÿ\0éÿ\0ÊäŸÔ?Ôæ§ô—ê¿6ôûê<ŸÀûõ§ŸóR›ô/íPÒŠáóê<UP»?W¾ãÔîô›Ï¡óvzÏ+ö|ÿ\0+ğ÷SÇf³$Ñ^êİ·óiıÌıiHşİX(·úsòÿ\0©{ƒë|¿Ê¢n}_›·e}XÙ]İ=ú8ÿ\0¥Ş•Ÿ\'şL]cşI<ŸÑ{©ü¶´ÿ\0Ê÷|5ÎvŸ2ô}­qĞˆ¶ÿ\0Ñ^nò/Ë¿ª¿-‡óE·ÍóªŞU7uó<nÎ•ÖÇ™¡šëZb¸Cäùïò©§Q§¾É4ØúOUé|¯èo*_Ì=VÏCêëóz]ÿ\0/•ZùÛ¿ù6í	ù\nøøutşª Ş?Jm¾üŠşké?£<¶ÛıE÷¶Óÿ\0—ù¿ñ>U?åıÎš›uüµ×ü>ş	§4ÿ\0rŸş˜Ğşeêÿ\0ÿ\0Ìò>¯WòıšÑ‡î¾jzUwy<*ƒYÊ?2ŸúÏü§§•êöú†í>Íj³U;Ù¬™é«Ëæöêj¹]­|Ÿ>Q»ÓïvÏ½³ÛM3µS»Ÿ†jGÇıõ4ÿ\0/¶OEããAûİ|7RºÏ¸Õä\r^”Fø’¾ãzÏÈàÛÿ\0–õÏ§¿aÙ_íÕ{\Zj<è¦ä.ÖÊ\Zö’KÚI\"\'ó?¡óÛ¿ÈõVû}ŞgMP“ÿ\0*>t)şR¢<ƒg­~ÿ\0–»ş´şÍh(Ó¦R^ÒIxV½<}šI+qÿ\0Å©}¿sù©§¿ş–€Œ¿ÿÙ');
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

-- Dump completed on 2026-09-16 22:02:51
