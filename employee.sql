-- MySQL dump 10.16  Distrib 10.1.13-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: employee
-- ------------------------------------------------------
-- Server version	10.1.13-MariaDB

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
-- Table structure for table `dept_table`
--

DROP TABLE IF EXISTS `dept_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dept_table` (
  `dept_id` tinyint(2) NOT NULL,
  `dept_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`dept_id`),
  UNIQUE KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dept_table`
--

LOCK TABLES `dept_table` WRITE;
/*!40000 ALTER TABLE `dept_table` DISABLE KEYS */;
INSERT INTO `dept_table` VALUES (1,'外交部'),(2,'監査部'),(3,'広報部'),(4,'技術部'),(5,'人事部'),(6,'総務部'),(7,'企画部'),(8,'資材部'),(9,'取締役会'),(10,'秘書室'),(11,'総合事務センター'),(12,'神秘部'),(13,'営業部'),(14,'生活安全部'),(15,'調査部'),(16,'警備部'),(17,'計画部'),(18,'法務部'),(19,'購買部'),(20,'開発部'),(21,'営業本部'),(22,'営業推進部'),(23,'製造部'),(24,'輸出部'),(25,'宣伝部'),(27,'お客様サービス部'),(28,'社長室'),(29,'マーケティング推進部'),(30,'迫真空手部');
/*!40000 ALTER TABLE `dept_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_table`
--

DROP TABLE IF EXISTS `emp_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_table` (
  `emp_id` int(5) NOT NULL AUTO_INCREMENT,
  `emp_pass` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `emp_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `address` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `authority` tinyint(1) NOT NULL,
  `dept_id` tinyint(2) NOT NULL,
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `emp_id` (`emp_id`),
  KEY `dept_id` (`dept_id`),
  CONSTRAINT `emp_table_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `dept_table` (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_table`
--

LOCK TABLES `emp_table` WRITE;
/*!40000 ALTER TABLE `emp_table` DISABLE KEYS */;
INSERT INTO `emp_table` VALUES (3,'abf8fb07f05f40dfccc9bda81bbab23b','小室有紗',1,'大分県日田市有田町1-11-12','1970-05-08',0,4),(6,'2c4a905326971da5b4a3355a17c42be9','福島碧',1,'京都府京都市中京区元本能寺町2-17-1元本能寺町グランド305','1970-06-13',0,3),(7,'8a50aa0e5ba34e571f49438121d99c43','深谷浩',0,'大阪府茨木市十日市町2-3-14','1982-08-15',1,6),(8,'aafbf76c05f5775f99daa1aa680f0616','伊藤道世',1,'長野県諏訪部郡原村室内2-9-10室内ガーデン403','1992-02-18',1,8),(9,'289ec0436329949bd2fc03811cc12391','氏家惟吹',0,'岡山県小田郡矢掛町小林3-20-12','1969-12-11',0,2),(10,'1ae145c021bcb3f9c839169ea40b2e53','川口朗',0,'神奈川県横須賀市若松町4-11','1971-02-26',0,3),(12,'8b6088436eba257b66f8b8447c8ff50b','下田力男',0,'熊本県	菊池市	稗方	4-13-7	シティ稗方418','1826-11-11',0,6),(13,'de8ca96070974c2f3bd7098a856cc8c0','土谷汐里',1,'佐賀県	多久市	北多久町多久原	3-6','1600-01-08',1,9),(14,'0c3e505a778218d40db415a2abe1e82c','滝田英世',0,'高知県長岡郡本山町立野3-1-14','1203-08-06',1,10),(15,'520b662382f7e0540827bc42bd61c480','竹中保',0,'滋賀県野洲市栄2-13栄スイート416','1999-07-29',1,13),(16,'a5859d20890564a21d9e7d6f00fcf9f4','松岡利男',0,'香川県仲多度郡まんのう町中通4-6-11','1998-08-05',1,2),(17,'890a5ae7144576d38a61fe2ffc5dc9af','野鳥先輩',1,'山形県長井市館町北2-8-17館町北マンション201','1997-06-11',0,13),(18,'a4ab4f479aed6c94bdbd3c9debcf97ec','野牛先輩',1,'香川県高松市栗林町1-17','1860-08-25',0,11),(19,'1be40caa0b5aef1c06e77f277ad13164','野草先輩',1,'鹿児島県奄美市名瀬浦上町3-5ステーション名瀬浦上町210','1111-11-11',0,11),(20,'ac555c5818403d3b6b843e654b3cadd1','野菜先輩',1,'大阪府貝塚市浦田3-14','0800-01-23',0,3),(22,'276f8db0b86edaa7fc805516c852c889','野球先輩',1,'三重県伊賀市一之宮4-20-8','2019-08-01',0,2),(23,'5cd24f694a2757ca715e0a5b255a0d3a','野心先輩',1,'島根県出雲市地合町3-3-3地合町ゴールデン401','2015-02-03',0,5),(24,'1b00019d878efcbf32e46bb461527aac','野宿先輩',1,'屋上','2000-02-03',1,6),(25,'23f88ac14feead92f4fdf8e640507d3c','野良先輩',1,'住所不定1145141919810','3000-02-01',0,14),(26,'b31a6cdb2112ff9986ec915a01a87679','野盗先輩',1,'住所不定無能114514','0114-05-14',0,16),(27,'b31a6cdb2112ff9986ec915a01a87679','野党先輩',1,'日本','1145-01-04',0,12),(28,'ed92c276c1e7f3d02ed633606983fe52','野苺先輩',1,'住所不定形で名状しがたきドリームランド','1145-08-10',0,15),(30,'27130a85e452110fc0d005b8f7c9bedb','右フック犬',1,'住所不定','1111-11-11',0,1),(31,'04c6206a139e5d5349098549e22048ea','野犬先輩',1,'住所不定野良犬です。','0200-02-06',0,1),(32,'99d771930f22dcb25e6b238717fc1f32','野戦先輩',1,'最前線','1185-06-09',0,30),(33,'c89d09a0330d110b41620b7fe7f10707','魔王パム',1,'魔法の国','1192-11-08',0,2);
/*!40000 ALTER TABLE `emp_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_09_02_094101_create_uploader_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `right_table`
--

DROP TABLE IF EXISTS `right_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `right_table` (
  `right_id` tinyint(1) NOT NULL,
  `right_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `right_table`
--

LOCK TABLES `right_table` WRITE;
/*!40000 ALTER TABLE `right_table` DISABLE KEYS */;
INSERT INTO `right_table` VALUES (0,'authority'),(1,'guest');
/*!40000 ALTER TABLE `right_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sex_table`
--

DROP TABLE IF EXISTS `sex_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sex_table` (
  `sex_id` tinyint(4) unsigned NOT NULL COMMENT '番号',
  `sex_name` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sex_id`),
  UNIQUE KEY `sex_id` (`sex_id`),
  UNIQUE KEY `sex_name` (`sex_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='性別に関するテーブル';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sex_table`
--

LOCK TABLES `sex_table` WRITE;
/*!40000 ALTER TABLE `sex_table` DISABLE KEYS */;
INSERT INTO `sex_table` VALUES (1,'女'),(0,'男');
/*!40000 ALTER TABLE `sex_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uploaders`
--

DROP TABLE IF EXISTS `uploaders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uploaders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名前',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploaders`
--

LOCK TABLES `uploaders` WRITE;
/*!40000 ALTER TABLE `uploaders` DISABLE KEYS */;
INSERT INTO `uploaders` VALUES (14,'username','2019-08-09 15:00:00','2019-08-09 15:00:00'),(15,'注意','2019-09-10 07:52:06','2019-09-10 07:52:06'),(16,'馬','2019-09-10 07:52:35','2019-09-10 07:52:35'),(17,'UMA','2019-09-10 07:52:55','2019-09-10 07:52:55'),(18,'エルマス＝サン','2019-09-10 08:22:13','2019-09-10 08:22:13'),(19,'容疑者','2019-09-10 08:23:11','2019-09-10 08:23:11'),(20,'容疑者2','2019-09-10 08:23:26','2019-09-10 08:23:26'),(21,'わかばちゃんと学ぶ','2019-09-10 08:24:15','2019-09-10 08:24:15'),(22,'横浜駅','2019-09-10 08:24:51','2019-09-10 08:24:51'),(23,'グンマー','2019-09-10 08:25:19','2019-09-10 08:25:19'),(24,'GoogleMap','2019-09-10 08:26:09','2019-09-10 08:26:09'),(25,'カバ','2019-09-10 08:26:30','2019-09-10 08:26:30'),(26,'右フック犬','2019-09-10 08:27:01','2019-09-10 08:27:01'),(27,'右フック犬','2019-09-10 08:27:18','2019-09-10 08:27:18'),(28,'天竺砂狐','2019-09-10 08:27:41','2019-09-10 08:27:41'),(29,'邪悪な儀式','2019-09-10 08:28:02','2019-09-10 08:28:02'),(30,'鳥獣戯画','2019-09-10 08:28:33','2019-09-10 08:28:33'),(31,'白いタヌキ','2019-09-10 08:28:58','2019-09-10 08:28:58'),(32,'結果ｎ','2019-09-10 08:29:15','2019-09-10 08:29:15');
/*!40000 ALTER TABLE `uploaders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'r5s0ZdCOam','EU6Bg3xVOm@gmail.com','$2y$10$EU5t67IlfBFmMkKr/W0cA.fzi9UUrImSLLGooyo/lN93JmBVKFn02',NULL,NULL,NULL),(2,'7KVj5KiR7c','RLpdJNbDAh@gmail.com','$2y$10$61NP4kfEv0XqtsKj/sIOJuc22gWNpRyhZj.ATUJnkOMcBzSqMS/su',NULL,NULL,NULL),(3,'LhoMkxoEMN','Ht1bylXfP2@gmail.com','$2y$10$kPq2t2arQgc2QeszuEBBlehyBeJmYGBN1vxLBWOg8VCbTMpMVbq1S',NULL,NULL,NULL),(4,'S86OLTI4c9','HUJ06yvVhO@gmail.com','$2y$10$7Kn3ykdmhoUwxF5IjoIeHeeJ7r1mKK6S1.UlMbxPHEnT3GEB7fXAa',NULL,NULL,NULL),(5,'TqEg5TAKcc','rspG7Uyo6N@gmail.com','$2y$10$hCobqUUQdloG/zc5.XRDDukgPYrgjRgo72.6KQq.nqV00M2s/wqSW',NULL,NULL,NULL),(6,'UyYoFjofz3','Fo53Y8KXvL@gmail.com','$2y$10$IqAsgicI9JNW86B1OVBLu.PROu58kXfD7fCwB1NiM4zSphS6ToXnu',NULL,NULL,NULL),(7,'BNbJTHmsba','qT1vDtcZBv@gmail.com','$2y$10$E5J32DSuLmrHxFqheSXU7O1UjyIzYaFKnUtP/NYrdoa...D06ewbC',NULL,NULL,NULL),(8,'A1vrvGvn1f','6Ak5PrBUhN@gmail.com','$2y$10$Pe1NDAzKR8CXZGmVxD5/o.pg3.yyFw3DlkpG3TX24ByoRRcBmj73a',NULL,NULL,NULL),(9,'NwpEEoluMT','Bw3mJ7peMS@gmail.com','$2y$10$Eefv3seiBc2VHXu1kCqNXuGEH422BN6U49bibY/8x6gtYas8rA/Re',NULL,NULL,NULL),(10,'GlRRnT591r','fr43yMhAH3@gmail.com','$2y$10$bhDKSOiGYHEiPQDTlJNrdO/GTMwUn9o2XaC65X1MuK5Nnb8CVdIeC',NULL,NULL,NULL),(11,'s8KLI4vW1J','WkO9SjWJxA@gmail.com','$2y$10$YhM7dJKPlmKHtt0R8tRWNuNdD35SMpjscswb4C/KeYvVHRkLeHqHe',NULL,NULL,NULL),(12,'0UPpVjmZ7B','8buJVRJKue@gmail.com','$2y$10$5dUMXswEgtmcXDqQv.Yy/.50RER4mF8nzXpsowkdtnDdde6JDRRFu',NULL,NULL,NULL),(13,'gCfUAOGAiT','ydCwYmm70P@gmail.com','$2y$10$xLdXCz6zki/5kqbSmhrcxeyWpt4R7T/ipcMfFc6n9EX9R3/Uu1/0u',NULL,NULL,NULL),(14,'GPrODbJGCd','rhorGWknvP@gmail.com','$2y$10$pd4D90RbvAsihOtLfDhRPOLKA8tjMmfHZ8BCDudKbzo3iDtDwsP66',NULL,NULL,NULL),(15,'WpLeIAeT4i','Rep3s0lEA0@gmail.com','$2y$10$NzdxBOtgsG1DcShKgGbrZ.BrbPwl2cf51KV/8Vjdhn74dFldClWlW',NULL,NULL,NULL),(16,'rgPu6rfwCK','LyRFVtACY0@gmail.com','$2y$10$djGAycz5229k0MW6FxUmeeSrah/hLvh1rH3BaELTKYn1I7K.Itm/S',NULL,NULL,NULL),(17,'Oc91Ev2ybq','gAbQFt97A8@gmail.com','$2y$10$D50rcrwPfMtpucVs7xnvLeHHVh4zYjMN3tRqyUnYqsiLqo6BW9rnu',NULL,NULL,NULL),(18,'LEXheBOYtt','CY73tKHj1n@gmail.com','$2y$10$tH/0dijcis3KqmXklI0A3eopWm8a2tDi8F9Dh5XyVxDFidZcPRW8W',NULL,NULL,NULL),(19,'野鳥先輩','peacock@gmail.com','$2y$10$PtSPhPt846nWY6qtK5gEvePtCq80T9KeKYYYkN6UO50k.N3xT2AK.','yq4EyLlPUuT8KbEX5hsHJZR3Zi8uKo49oZFBBET8x5m78Rc3URqTpDRQ2qCV','2019-08-15 09:10:42','2019-08-15 09:10:42');
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

-- Dump completed on 2019-09-10 17:33:20
