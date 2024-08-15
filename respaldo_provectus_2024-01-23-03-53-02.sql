-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: provectus
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
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citas` (
  `idRif` varchar(15) NOT NULL,
  `fechacita` date NOT NULL,
  `codesp` int(10) NOT NULL,
  `codespta` varchar(15) NOT NULL,
  `observ` varchar(255) NOT NULL,
  `diagnos` varchar(255) NOT NULL,
  `codtrat` int(10) NOT NULL,
  `ncita` int(1) NOT NULL,
  `costo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` VALUES ('28310477','2024-02-20',1,'10430249','Lorep Ipsum','Lorem Ipsum',3,1,250.69);
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `citaspend`
--

DROP TABLE IF EXISTS `citaspend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citaspend` (
  `idcita` int(15) NOT NULL AUTO_INCREMENT,
  `idRif` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `codespdad` int(10) NOT NULL,
  PRIMARY KEY (`idcita`)
) ENGINE=InnoDB AUTO_INCREMENT=1013 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citaspend`
--

LOCK TABLES `citaspend` WRITE;
/*!40000 ALTER TABLE `citaspend` DISABLE KEYS */;
/*!40000 ALTER TABLE `citaspend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emergencia`
--

DROP TABLE IF EXISTS `emergencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emergencia` (
  `IDemer` int(255) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`IDemer`)
) ENGINE=InnoDB AUTO_INCREMENT=12350 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emergencia`
--

LOCK TABLES `emergencia` WRITE;
/*!40000 ALTER TABLE `emergencia` DISABLE KEYS */;
INSERT INTO `emergencia` VALUES (11,'LOREM IPSUM 11'),(14,'LOREM IPSUM 14'),(16,'LOREM IPSUM 16'),(17,'LOREM IPSUM 17'),(18,'LOREM IPSUM 18'),(19,'LOREM IPSUM 19'),(20,'LOREM IPSUM 20'),(22,'LOREM IPSUM 22'),(23,'LOREM IPSUM 23'),(24,'LOREM IPSUM 24'),(25,'LOREM IPSUM 25'),(26,'LOREM IPSUM 26'),(27,'LOREM IPSUM 27'),(28,'LOREM IPSUM 28'),(29,'LOREM IPSUM 29'),(30,'LOREM IPSUM 30');
/*!40000 ALTER TABLE `emergencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `idEsp` varchar(15) NOT NULL,
  `emailEsp` varchar(255) NOT NULL,
  `claveEsp` varchar(70) NOT NULL,
  `espA1` varchar(70) NOT NULL,
  `espA2` varchar(70) DEFAULT NULL,
  `espN1` varchar(70) NOT NULL,
  `espN2` varchar(70) DEFAULT NULL,
  `codesp` int(10) NOT NULL,
  `Finic` date NOT NULL,
  `Ffin` date NOT NULL,
  `DAct` varchar(255) NOT NULL,
  `TitRef` varchar(255) NOT NULL,
  `sexoEsp` varchar(2) NOT NULL,
  `telefonoEsp` varchar(255) NOT NULL,
  PRIMARY KEY (`idEsp`),
  KEY `codesp` (`codesp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES ('10430249','nmassimo6@flickr.com','uC9\".YfvT','Mannock','Massimo','Joceline','Nedi',1,'2003-11-22','2035-02-02','Jueves y Domingo','153883297','F','6216639819'),('10434752','bcorfield4@purevolume.com','dW0_GT8<r%D7','Tallet','Corfield','Carena',NULL,1,'2000-04-16','2026-08-30','Martes y Jueves','284000800','F','7573948913'),('10714551','fgrevel9@ucoz.ru','yX4|>C91j(4}7','Peeter','Grevel','Geoffry','Florian',2,'2000-12-29','2031-09-27','Miércoles y Viernes','161994188','M','5537380662'),('10851606','kschruurs4@dell.com','hZ4|u`?W2#@*OG','Annetts',NULL,'Jere','Kilian',2,'2000-01-14','2031-04-28','Miércoles y Viernes','403584571','M','2287196619'),('11565051','fmccook7@sourceforge.net','uF7\"lAs++B','Burgon','McCook','Joshia','Flynn',2,'2001-06-13','2033-01-03','Lunes','862735094','M','2893237962'),('12487212','mlarchiere7@bandcamp.com','oV1>*_!G!F','Conisbee','Larchiere','Juliet','Marabel',2,'2001-02-13','2030-02-17','Domingo','637359405','F','3184569874'),('13107322','tstuehmeyer6@dailymail.co.uk','kP9>SREuvU(zSQs','Domnin','Stuehmeyer','Jamesy',NULL,1,'2003-10-27','2028-06-08','Lunes y Viernes','288380225','M','7706080909'),('13325333','ktrayes8@imageshack.us','yZ3/e2W5#iE?','Alsford','Trayes','Karna',NULL,2,'2003-02-04','2029-12-20','Miércoles','973745864','F','6479449289'),('13619285','tcomer9@columbia.edu','yK7%ipMMm@+r','Primarolo','Comer','Kirsti','Tamera',1,'2004-01-17','2035-04-07','Miércoles, Viernes y Domingo','620640745','F','2365934613'),('13967452','wmckechnie2@flavors.me','tX4}>a|Zmp0*','Nell',NULL,'Lorilyn','Wendye',1,'2003-10-07','2032-08-13','Miércoles','860003347','F','6112433565'),('14226099','sstrachan0@bravesites.com','pE2/bXz*CHUi1','Stoffler','Strachan','Kaylyn','Stoddard',1,'2005-10-02','2029-03-16','Jueves y Domingo','575532686','F','7676130344'),('14618434','jcarmel3@ocn.ne.jp','tQ0!#v/%C%B$.HS','Dochon',NULL,'Jourdan','Janeczka',1,'2005-10-29','2026-09-12','Domingo','268762629','F','8097749509'),('15060414','dspellard0@yahoo.com','nZ8>v}mL4!@KO5','Breydin','Spellard','Smitty','Dalis',2,'2002-07-18','2026-05-22','Lunes, Miércoles y Viernes','309477701','M','8364048332'),('15180833','ljosh1@163.com','qB5(Y/{?}','Hazard','Josh','Ailsun',NULL,1,'2000-02-01','2026-01-03','Lunes','390485824','F','6848643799'),('16280703','shallsworth6@nhs.uk','lQ3<o7ih!lJHQZym','Castaner','Hallsworth','Mandy','Sadie',3,'2004-03-29','2033-09-12','Domingo','373964555','F','7008039497'),('17088310','ftoby3@cpanel.net','nS9)S4}}','Wenzel','Toby','Abbey','Florentia',3,'2001-01-21','2032-10-15','Miércoles, Viernes y Domingo','612155452','F','8718254190'),('17252008','nrowesby6@ebay.com','bM9#ZG+i4P(','Baynom','Rowesby','Jesselyn','Naomi',2,'2004-02-20','2031-04-26','Miércoles, Viernes y Domingo','462298072','F','3273248424'),('17514024','jwhelband4@java.com','qR9>ley8X','Babon','Whelband','Kristoffer',NULL,1,'2001-02-18','2027-10-04','Miércoles y Jueves','409067951','M','6289474815'),('19100887','efern2@hhs.gov','eZ8!/MUC$BG','Perfect',NULL,'Ami',NULL,3,'2000-01-02','2029-01-20','Martes, Viernes y Sábado','497069549','F','4942237310'),('1973576','idensham7@parallels.com','iI9#kRU','Gaine of England','Densham','Bartholomeus','Irwin',1,'2000-07-15','2035-08-28','Viernes, Sábado y Domingo','570811939','M','4188872539'),('21448507','vbickle7@bbc.co.uk','iH4!r7/9vzAs	','Elphey','Bickle','Kristen','Vevay',3,'2003-08-04','2029-08-21','Martes, Miércoles y Jueves','684609143','F','3138333732'),('22887648','jcreboe2@netlog.com','sF0*ym4M$1I','Sivier',NULL,'Norrie','Janel',2,'2001-07-09','2029-08-05','Martes, Miércoles y Jueves','877017690','F','5283326144'),('23831621','ecasarini9@artisteer.com','jS2)#x}E<VO=','Van Dale','Casarini','Christian','Elonore',2,'2004-09-04','2028-02-06','Martes y Jueves','563099490','F','6904227337'),('23901745','tdas3@technorati.com','jC5&Y`tyUGC','Draycott',NULL,'Stacy','Troy',1,'2003-04-12','2027-12-31','Martes, Jueves y Viernes','826010166','M','2697118258'),('24130500','jdurtnal7@java.com','yQ0)s\"kn}%8}16O','Pallis','Durtnal','Zondra','Jacqueline',1,'2000-04-30','2027-09-04','Martes, Miércoles y Jueves','337368408','F','7191008308'),('24256025','mhamfleet9@usda.gov','lS3#!#a(i$nw)tZ','Eard','Hamfleet','Reube',NULL,1,'2005-01-18','2034-04-02','Domingo','158204557','M','6064870548'),('25551673','ddunstan8@rediff.com','wY4=tK!IG&`','Alltimes',NULL,'Fabiano','Dante',1,'2002-08-21','2027-04-22','Lunes, Miércoles y Viernes','534980142','M','6226815225'),('25774386','eelman0@ucla.edu','rI9(O0MA.{*','Szymanowski','Elman','Leanor',NULL,2,'2005-12-11','2030-04-14','Martes, Miércoles y Jueves','806675460','F','9974318607'),('25783187','rwaterson2@google.ca','fW1@j)m+!qM,','Leyland','Waterson','Patrizio','Reynard',2,'2000-02-03','2028-10-16','Martes, Jueves y Viernes','206941390','M','3417097473'),('26100652','zhumbell5@ucsd.edu','gK5)#/fkah>H','Peepall','Humbell','Valdemar','Zack',3,'2005-01-18','2028-06-18','Martes, Miércoles y Jueves','775326453','M','6564814005'),('26263501','jpaull1@mayoclinic.com','nU1/VS,A~1TjviE','Edmett',NULL,'Veronike','Justinn',3,'2001-04-15','2033-11-29','Martes y Jueves','581170094','F','5503307647'),('2661562','lhedden8@digg.com','dZ6*Hw6>vw2','Ferrea','Hedden','Amalie',NULL,1,'2002-09-10','2033-10-12','Miércoles','333993204','F','5812226161'),('2686149','gvanichkin5@ed.gov','tC2I0AJyVlPv','Peaker','Vanichkin','Lanette','Gilbertine',3,'2003-02-27','2033-05-27','Sábado y Domingo','495143761','F','9403980856'),('26984410','cgulvin7@google.com','rQ4>Flmknql5p}$h','Yanyshev',NULL,'Stern','Cobby',3,'2004-02-04','2034-04-26','Domingo','875426872','M','3154536690'),('27320685','mskett5@oakley.com','nP3@oC2uS2IIlp~U','Culleton',NULL,'Willy','Myrna',1,'2002-02-21','2034-02-01','Lunes, Jueves y Viernes','438404064','F','8724946675'),('28152655','atomkinson1@hud.gov','wI2$>*hM','Hellyer',NULL,'Harp','Addison',1,'2003-09-04','2034-10-15','Sábado y Domingo','127202426','M','9395458941'),('28245684','lbleaden8@scribd.com','mW2*QrU<diz.@w','Stathers','Bleaden','Artur','Lothario',2,'2003-05-19','2029-10-17','Martes, Jueves y Viernes','315938932','M','9385647540'),('28412125','arizzone1@biblegateway.com','qU5%a=BDOJ?=l6x','Swanne','Rizzone','Malvina','Agnella',2,'2005-11-29','2026-03-12','Sábado y Domingo','320399324','F','6171166462'),('28595637','akenson6@oakley.com','hI3!QG}$jg#','Phetteplace','Kenson','Norry','Ashby',3,'2001-11-25','2030-05-23','Martes, Miércoles y Jueves','511656678','M','5305866092'),('30170474','tmeriel6@mail.ru','uH6_s5Ns2IK5FyF/','Justun','Meriel','Dorian','Tull',2,'2002-09-01','2031-11-24','Lunes, Miércoles y Viernes','227231768','M','5613559494'),('30217225','lradloff9@phpbb.com','sI1@d(kR','Feirn','Radloff','Lynna',NULL,3,'2003-08-04','2026-08-06','Lunes y Viernes','747362364','F','7541871698'),('30414379','mradden3@uiuc.edu','eX0\"VmMz{6+Jg?S','Marc','Radden','Deeanne',NULL,2,'2001-05-03','2033-11-28','Lunes, Jueves y Viernes','796587294','F','4318515287'),('30454686','khugenin4@howstuffworks.com','cJ8@.{q>J!`*u%)','Chelam','Hugenin','Lorne','Kathie',3,'2003-02-14','2027-09-28','Jueves y Domingo','952900276','F','3432102890'),('31010658','gclears0@altervista.org','iI9@N<A<L@P*SVr','Alleyne',NULL,'Rudyard',NULL,3,'2004-07-17','2027-03-24','Miércoles','887181176','M','7289455009'),('31198169','bwelham3@addtoany.com','cO0*umz.5*{@5','Bruyet',NULL,'Dave','Burnard',3,'2003-08-24','2027-06-27','Martes, Miércoles, Jueves y Sábado','203559669','M','4452693451'),('31332409','gbuessen5@admin.ch','uU3>3!d9.O2qw','Crummie','Buessen','Richmond',NULL,2,'2004-04-29','2034-01-22','Viernes','466436479','M','8152759844'),('31648853','mtait2@shutterfly.com','cM8}f={DK!0#,','Newton','Tait','Darb','Miguel',3,'2004-06-02','2033-04-09','Miércoles y Sábado','403290869','M','6019896551'),('31762348','ksweett0@nymag.com','jP1\"!pk*','Macallam',NULL,'Ianthe','Kirstyn',3,'2003-09-22','2033-03-21','Lunes, Jueves y Viernes','866631536','F','1072211123'),('3885945','ckinver0@globo.com','xO7??>xfnypuBK}i','Merioth','Kinver','Adrian','Courtnay',1,'2002-03-23','2032-04-04','Lunes, Miércoles y Viernes','564323037','M','1352186729'),('4849643','clucien4@independent.co.uk','kS9*{hRx','Atthowe',NULL,'Callean',NULL,3,'2005-09-01','2027-08-23','Lunes, Martes y Miércoles','729160129','M','2882425396'),('4896256','cfonte5@storify.com','qA0!E\"4G1fvk&8B','Stilwell','Fonte','Klemens','Cly',1,'2002-04-18','2029-11-21','Martes y Domingo','674695571','M','2565853641'),('4900424','tgatley3@archive.org','oG8.bhQk','Corrado',NULL,'Gran','Trev',2,'2005-08-31','2035-03-18','Martes y Miércoles','824301541','M','2988412737'),('5990743','bbonome2@sourceforge.net','aE1$33UnQf`#','Docket','Bonome','Allyn','Brook',1,'2003-10-16','2035-04-10','Miércoles y Viernes','608818901','M','9765865997'),('6402057','strebble8@live.com','hL3<LIJ_J75iZt','Inett','Trebble','Ann','Stormie',3,'2000-01-17','2033-07-02','Jueves y Domingo','241566955','F','5124183745'),('6825087','bfake9@ehow.com','tO5!{$qK(','Drepp','Fake','Michal','Barnabas',3,'2004-06-18','2035-10-01','Martes, Miércoles, Jueves y Sábado','911018356','M','1349224302'),('7620161','rpatershall5@jalbum.net','bT8||=Jc','Minnock','Patershall','Melisandra',NULL,2,'2002-12-13','2026-11-21','Jueves y Domingo','351730287','F','2633298209'),('7647534','mturn8@123-reg.co.uk','uS6%VgQ~O','Waud','Turn','Marcel','Martie',3,'2001-05-14','2032-05-22','Lunes, Miércoles y Viernes','338631748','M','2836387507'),('8426635','mblabber1@blogspot.com','fM0`|4(u','Dorracott','Blabber','Corrie','Merell',2,'2002-06-17','2030-04-10','Miércoles y Viernes','548747863','M','5327517000'),('9576719','esummerlee4@cam.ac.uk','lN9.HaT_','Wigginton','Summerlee','Midge','Esmaria',2,'2002-06-23','2026-06-05','Miércoles, Viernes y Domingo','490559978','F','5223666907'),('9744420','gkamena1@unicef.org','mB1&NT$9}+7,~','Kesterton','Kamena','Laurie','Gaspar',3,'2004-11-13','2027-09-17','Jueves y Domingo','783749309','M','6059409731');
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidad`
--

DROP TABLE IF EXISTS `especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidad` (
  `codesp` int(10) NOT NULL,
  `descesp` varchar(30) NOT NULL,
  KEY `codEsp` (`codesp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidad`
--

LOCK TABLES `especialidad` WRITE;
/*!40000 ALTER TABLE `especialidad` DISABLE KEYS */;
INSERT INTO `especialidad` VALUES (1,'Enfermeria'),(2,'Doctor'),(3,'Admin');
/*!40000 ALTER TABLE `especialidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `codestado` int(5) NOT NULL,
  `descestado` varchar(30) NOT NULL,
  KEY `codestado` (`codestado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'REGISTRO PARCIAL'),(2,'REGISTRO COMPLETO');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente` (
  `idRif` varchar(15) NOT NULL,
  `emailPaciente` varchar(255) NOT NULL,
  `clave` varchar(70) NOT NULL,
  `apepac1` varchar(70) NOT NULL,
  `apepac2` varchar(70) DEFAULT NULL,
  `nombpac1` varchar(70) NOT NULL,
  `nombpac2` varchar(70) DEFAULT NULL,
  `fechaNacPaciente` date DEFAULT NULL,
  `telefonoPaciente` varchar(255) NOT NULL,
  `sexo` varchar(2) DEFAULT NULL,
  `codestado` int(5) NOT NULL,
  PRIMARY KEY (`idRif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES ('10332588','bkneathf@zimbio.com','qB3|*QB','Mungan','Kneath','Godfry','Burnard','1990-09-07','6455229466','M',1),('10563550','relcum8@myspace.com','iF8/CJUpHyb','Eddowis','Elcum','Dewitt','Ramsey','2005-03-09','6046307581','F',1),('11376243','dfryatt2@godaddy.com','uC1|>tRK.&r=\"','Ionn','Fryatt','Braden','Dewey','1992-01-05','6718653295','F',1),('11440282','bleytono@mail.ru','xX8}k<5MF(rg8v_E','Whitnall','Leyton','Massimo','Benito','2000-07-19','6101989681','F',1),('11498391','phyndleya@360.cn','fP7+312FBcY#JM','Langcaster','Hyndley','Gare','Panchito','1999-11-30','8874181769','M',1),('11807746','nmatchettk@businessinsider.com','fM4+o(Bm*KMt=9','OCurrane','Matchett','Billy','Nathanial','2002-11-14','1759507826','F',1),('13078623','astpierren@drupal.org','mO3\"<+e%+cw%UoN','Perrot','St Pierre','Kristoffer','Abner','2004-02-19','9461790720','F',1),('1386644','phanselmann1@imgur.com','yF8#=uUza()TL','Lorne','Hanselmann','Jonathan','Patrice','1991-07-21','3492371068','M',1),('14929433','qguinan6@imdb.com','lE3{n!o4vP=Eu(8','Crotch','Guinan','Bink','Quintin','1998-09-21','1506715645','M',1),('15100494','ddreher8@dyndns.org','iO9!<t#c','Baigrie','Dreher','Hercules','Dame','1998-05-07','6607091110','M',1),('15122533','njoronb@privacy.gov.au','eP4=g@KI(&r~y(vf','Bollans','Joron','Ingra','Nolan','1988-01-15','8012817354','M',1),('15445396','epochet4@howstuffworks.com','hJ3?en,9tI','Winfindale','Pochet','Harv','Emory','1982-12-20','1251782287','F',1),('16234502','bcampione0@nydailynews.com','jE0$|VJ<yaSD4f','Angerstein','Campione','Cooper','Boyd','1983-10-02','8323568208','M',1),('1717728','mcawker2@meetup.com','pE7\"$5An1<o,S0','Jendrach','Cawker','Douglas','Minor','1980-09-23','2485060665','M',1),('17869466','lgrubef@craigslist.org','iF0PRW0,*h@%','Wychard','Grube','Care','Lionello','1994-12-11','1333555824','F',1),('18269903','sborrowmana@ning.com','cZ9@pK@Wd*y','Truran','Borrowman','Inglebert','Shanan','1997-08-20','5783464001','F',1),('18510384','pcarlanb@soup.io','qC7&}.UR_aS3Jy','Klaas','Carlan','Newton','Patrizio','2003-10-25','1988317053','F',1),('18644243','kmcgroarty7@webs.com','vY0*&Qke','Sissel','McGroarty','Emelen','Keven','1981-10-11','6633377988','M',1),('18733223','skennady1@arizona.edu','sS1*Q{8D','Lumpkin','Kennady','Tod','Sim','1987-01-28','8317575613','F',1),('18928958','aheyballg@admin.ch','qY2%*?TR','Swales','Heyball','Wilhelm','Anatollo','1998-07-10','1685932387','M',1),('19389045','bgaunt7@soup.io','cX0~&GB#SaD','Pochet','Gaunt','Adriano','Boris','1985-08-14','5774225386','F',1),('19501938','araulstoned@e-recht24.de','xB0(hC~8)@','Gwatkin','Raulstone','Leicester','Alexandre','2005-01-17','4825036192','M',1),('19951793','scapounj@facebook.com','fC5_Mp~OeU','Duffell','Capoun','Marcel','Sasha','1981-11-04','9317206679','M',1),('2077655','shopkins9@baidu.com','fD5}FZ%<Xe<p@e','Maudett','Hopkins','Abram','Saxon','2001-04-19','6499623871','F',1),('21307619','rbeaneye@cbslocal.com','rQ0<t?Ht/','Kryszka','Beaney','Ingrim','Riordan','2002-12-24','5777528714','M',1),('21451770','hjoynerm@devhub.com','aQ7)|Tk}','Redhills','Joyner','Kendal','Hercule','1991-10-14','5552262019','F',1),('22177539','pferrinio@ucsd.edu','sH8_2KX*','Artis','Ferrini','Javier','Patrizio','2004-10-31','7424850202','M',1),('22207642','kchapelle5@opensource.org','aL8=mQ,J+k','Shills','Chapelle','Forbes','Kevin','2001-12-08','7635537253','M',1),('22434117','etring4@cocolog-nifty.com','dV4@<O)xB*Wsf#','Hellis','Tring','Buddie','Ellswerth','1990-12-23','4174788123','M',1),('22549993','acargenn@google.com.br','uL3(c4S$TBCXCd','Murton','Cargen','Amerigo','Ax','1994-07-12','4944474977','M',1),('22594662','erendell3@hao123.com','fI7!6>n>nBAM*n(/','Hunnybun','Rendell','Nolly','Erasmus','1996-12-15','7654549545','F',1),('23447526','hshutleh@webmd.com','fM0$4Hc','Furmedge','Shutle','Rutger','Halsey','1993-10-18','1986013004','M',1),('25365558','gshorey3@furl.net','aL7*1/6aG31OAJ','Tee','Shorey','Boycey','Gearard','1981-11-20','4026540395','M',1),('27116746','splak5@theatlantic.com','xD8@)|?jjK{wc(p','Loxton','Plak','Antonio','Stavro','2001-05-29','8882716747','F',1),('28310477','mendozaluisandre030@gmail.com','Password*123','Mendoza','Colmenares','Luis','André','2004-04-28','4162088065','M',2),('28376846','fapthorpec@sbwire.com','jQ2(s+5#|g','Carswell','Apthorpe','Giulio','Farrell','1983-09-29','8106240648','F',1),('28663967','cartinstallc@dailymotion.com','uC1)ir2VR','Heisman','Artinstall','Angus','Carlyle','1999-03-23','6732816408','M',1),('28906303','kfortiee@youtu.be','gG9!xI$*34{<>','Coonihan','Fortie','Rickie','Kenton','1999-12-06','4332620059','F',1),('28932100','lchithami@cnn.com','cM4*,koG','Lockhart','Chitham','Raleigh','Lance','1995-04-17','1086246882','M',1),('29467512','eantognettid@storify.com','tZ8=!C|7ERTEv=','Gillimgham','Antognetti','Lawry','Earvin','1985-02-14','2676711492','F',1),('30172464','tphelpsm@newyorker.com','zI4{jPf.a>aN','Brind','Phelps','Delainey','Thorny','2000-05-13','8619734327','M',1),('30524374','rridsdoleg@marriott.com','jC1}L3%*','Turvey','Ridsdole','Theobald','Reynard','2002-04-24','3799442710','F',1),('3816721','cnibloe0@google.it','bP6#&atn/obh7Q_','Lourenco','Nibloe','Toddie','Cyril','1993-10-20','7509895686','F',1),('3978636','dbelleeh@sakura.ne.jp','kQ6*~<HzBT*>5','Almey','Bellee','Neale','Dorey','1984-06-01','7988067246','F',1),('4544099','sleathleyl@yahoo.com','gF8$,VX>wXfS6','Daunter','Leathley','Silas','Shurwood','2004-10-16','1151286055','M',1),('5277749','wmencol@huffingtonpost.com','qR2h+uB','Grishechkin','Menco','Andre','Winfred','1989-03-01','7265916055','F',1),('5607361','ywadwelli@blogger.com','rM6~4|QI','MacLeod','Wadwell','Jakie','Yvon','1995-01-01','6416748109','F',1),('5950266','rperonj@goo.ne.jp','uT5_%f?8yRJ','Rudman','Peron','Lester','Russ','2003-09-30','8745415638','F',1),('7067853','ljaksic9@economist.com','uC0_Zp}NfXD_r<S','Huerta','Jaksic','Hershel','Lannie','2005-09-20','3459574614','M',1),('8555359','dmcelvinek@forbes.com','yA6<#qRv6Oab','Tadd','McElvine','Tobiah','Dov','1994-06-07','1805676942','M',1),('9772421','tfearne6@uol.com.br','qW6@Lng*t_W}75','Benford','Fearne','Orson','Trace','1986-10-19','1042110165','F',1);
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfilpac`
--

DROP TABLE IF EXISTS `perfilpac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfilpac` (
  `idRif` varchar(15) NOT NULL,
  `tipoSangre` varchar(3) NOT NULL,
  `factorSangre` varchar(5) NOT NULL,
  `factorAlergico` varchar(255) DEFAULT NULL,
  `factorCongenito` varchar(255) DEFAULT NULL,
  `factorMotriz` varchar(255) DEFAULT NULL,
  `estatura` float NOT NULL,
  `peso` float NOT NULL,
  PRIMARY KEY (`idRif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfilpac`
--

LOCK TABLES `perfilpac` WRITE;
/*!40000 ALTER TABLE `perfilpac` DISABLE KEYS */;
INSERT INTO `perfilpac` VALUES ('28310477','O','RH+','Mariscos','Leve Anomalía Intestinal','',1.72,53.2);
/*!40000 ALTER TABLE `perfilpac` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tratamiento`
--

DROP TABLE IF EXISTS `tratamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tratamiento` (
  `codtrat` int(20) NOT NULL,
  `desctrat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tratamiento`
--

LOCK TABLES `tratamiento` WRITE;
/*!40000 ALTER TABLE `tratamiento` DISABLE KEYS */;
INSERT INTO `tratamiento` VALUES (1,'Revisión General'),(2,'Terapia'),(3,'Psicoterapia'),(4,'Prescripción de Medicamentos'),(5,'Laboratorio'),(6,'Rayos X'),(7,'Odontología'),(8,'Opioides'),(9,'Electrocardiograma');
/*!40000 ALTER TABLE `tratamiento` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-22 22:53:03
