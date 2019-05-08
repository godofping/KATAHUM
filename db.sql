/*
SQLyog Ultimate v8.53 
MySQL - 5.7.21 : Database - okdosic_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`okdosic_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `okdosic_db`;

/*Table structure for table `admin_table` */

DROP TABLE IF EXISTS `admin_table`;

CREATE TABLE `admin_table` (
  `adminid` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `firstname` varchar(60) DEFAULT NULL,
  `middleinitial` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `admin_table` */

insert  into `admin_table`(`adminid`,`username`,`password`,`firstname`,`middleinitial`,`lastname`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','AJ','M','Apud');

/*Table structure for table `announced_artwork_category_table` */

DROP TABLE IF EXISTS `announced_artwork_category_table`;

CREATE TABLE `announced_artwork_category_table` (
  `announcedartworkcategoryid` int(6) NOT NULL AUTO_INCREMENT,
  `artworkcategoryid` int(6) DEFAULT NULL,
  `teacherid` int(6) DEFAULT NULL,
  `dateannounced` date DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`announcedartworkcategoryid`),
  KEY `FK_announced_artwork_category_table` (`artworkcategoryid`),
  KEY `FK_announced_artwork_category_table1` (`teacherid`),
  CONSTRAINT `FK_announced_artwork_category_table` FOREIGN KEY (`artworkcategoryid`) REFERENCES `artwork_category_table` (`artworkcategoryid`) ON DELETE SET NULL,
  CONSTRAINT `FK_announced_artwork_category_table1` FOREIGN KEY (`teacherid`) REFERENCES `teacher_table` (`teacherid`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `announced_artwork_category_table` */

insert  into `announced_artwork_category_table`(`announcedartworkcategoryid`,`artworkcategoryid`,`teacherid`,`dateannounced`,`description`) values (1,5,7,'2018-01-31','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ex justo, mattis sit amet ex eget, pellentesque maximus velit. Pellentesque eget est placerat, volutpat diam quis, fringilla tortor. Pellentesque hendrerit quam eget turpis ullamcorper, sit amet maximus dui euismod. Quisque sed dictum turpis. Quisque molestie vestibulum fermentum. Nullam odio sem, gravida accumsan lacus sed, sollicitudin vehicula magna. In eu euismod elit. Duis nisi odio, iaculis a risus ac, sodales interdum magna. Curabitur iaculis accumsan aliquet. Vivamus sit amet dictum ante, ac facilisis augue.'),(9,3,7,'2018-01-31','Curabitur sollicitudin fringilla ex, ut vestibulum ipsum. Nulla facilisi. In nec nisi velit. Nulla enim lorem, consequat id mauris eu, pretium congue urna. Nunc nec neque lacinia, pellentesque risus ac, malesuada ipsum. Pellentesque gravida, sem quis ultrices lobortis, dui orci viverra odio, eget ultrices libero neque tristique tortor. Quisque mattis mi vitae massa posuere, at ornare ligula volutpat. '),(12,4,7,'2018-01-31','Nam vulputate massa et elit condimentum efficitur. Suspendisse lacinia, ipsum ac iaculis placerat, orci tortor sagittis magna, eget elementum magna nisi id ipsum. Mauris id purus ac ipsum vulputate tincidunt sed sit amet enim. Integer varius felis quis facilisis pharetra. Morbi consequat malesuada ipsum, ut luctus dolor bibendum at. Vestibulum eleifend scelerisque velit eget rhoncus.'),(13,4,8,'2018-02-19','gfvdhgjkhfgjkhngbbgk');

/*Table structure for table `artwork_category_table` */

DROP TABLE IF EXISTS `artwork_category_table`;

CREATE TABLE `artwork_category_table` (
  `artworkcategoryid` int(6) NOT NULL AUTO_INCREMENT,
  `artworkcategoryname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`artworkcategoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `artwork_category_table` */

insert  into `artwork_category_table`(`artworkcategoryid`,`artworkcategoryname`) values (2,'Handicraft'),(3,'Painting'),(4,'Drawing'),(5,'Portrait'),(6,'Building Plan'),(7,'Technical Sharing'),(8,'Canvas');

/*Table structure for table `artwork_table` */

DROP TABLE IF EXISTS `artwork_table`;

CREATE TABLE `artwork_table` (
  `artworkid` int(6) NOT NULL AUTO_INCREMENT,
  `announcedartworkcategoryid` int(6) DEFAULT NULL,
  `studentid` int(6) DEFAULT NULL,
  `dateposted` date DEFAULT NULL,
  `imagelocation` text,
  `message` text,
  PRIMARY KEY (`artworkid`),
  KEY `FK_artwork_table` (`studentid`),
  KEY `FK_artwork_table1` (`announcedartworkcategoryid`),
  CONSTRAINT `FK_artwork_table` FOREIGN KEY (`studentid`) REFERENCES `student_table` (`studentid`) ON DELETE SET NULL,
  CONSTRAINT `FK_artwork_table1` FOREIGN KEY (`announcedartworkcategoryid`) REFERENCES `announced_artwork_category_table` (`announcedartworkcategoryid`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `artwork_table` */

insert  into `artwork_table`(`artworkid`,`announcedartworkcategoryid`,`studentid`,`dateposted`,`imagelocation`,`message`) values (4,13,5,'2018-02-19','uploaded_images/28053343_210957779481957_42097707_n.jpg','segrthyuo'),(6,NULL,5,'2018-02-19','uploaded_images/28053343_210957779481957_42097707_n.jpg','segrthyuo');

/*Table structure for table `award_table` */

DROP TABLE IF EXISTS `award_table`;

CREATE TABLE `award_table` (
  `awardid` int(6) NOT NULL AUTO_INCREMENT,
  `awardtitle` varchar(200) DEFAULT NULL,
  `awarddescription` text,
  `dateposted` date DEFAULT NULL,
  `adminid` int(6) DEFAULT NULL,
  PRIMARY KEY (`awardid`),
  KEY `FK_award_table` (`adminid`),
  CONSTRAINT `FK_award_table` FOREIGN KEY (`adminid`) REFERENCES `admin_table` (`adminid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `award_table` */

insert  into `award_table`(`awardid`,`awardtitle`,`awarddescription`,`dateposted`,`adminid`) values (5,'Awarding night','Best of the night','2018-02-22',1);

/*Table structure for table `candidate_table` */

DROP TABLE IF EXISTS `candidate_table`;

CREATE TABLE `candidate_table` (
  `candidateid` int(6) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) DEFAULT NULL,
  `middleinitial` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `profilepicturelocation` varchar(200) DEFAULT NULL,
  `positionid` int(6) DEFAULT NULL,
  `partyid` int(6) DEFAULT NULL,
  PRIMARY KEY (`candidateid`),
  KEY `FK_candidate_table` (`partyid`),
  KEY `FK_candidate_table1` (`positionid`),
  CONSTRAINT `FK_candidate_table` FOREIGN KEY (`partyid`) REFERENCES `party_table` (`partyid`) ON DELETE SET NULL,
  CONSTRAINT `FK_candidate_table1` FOREIGN KEY (`positionid`) REFERENCES `position_table` (`positionid`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*Data for the table `candidate_table` */

insert  into `candidate_table`(`candidateid`,`firstname`,`middleinitial`,`lastname`,`profilepicturelocation`,`positionid`,`partyid`) values (1,'Verda','M','Pagsisihan','uploaded_images/download (1).jpg',1,2),(17,'Criston','P','Ramos','uploaded_images/download.jpg',2,2),(18,'Milagros',' A','Yulo','uploaded_images/Kane-Brown-1.jpg',3,2),(19,'Dolorita','A','Laurel','uploaded_images/images.jpg',1,1),(20,'Terri','Z','Chapman','uploaded_images/4.jpg',4,2),(21,'Kim','H','May','uploaded_images/18.jpg',5,2),(22,'Edwin','U','Lawrence','uploaded_images/56.jpg',6,2),(23,'Charles','Y','Mason','uploaded_images/91.jpg',7,1),(24,'Rhonda','F','Lewis','uploaded_images/47.jpg',8,2),(25,'Dwight','G','Boyd','uploaded_images/22.jpg',2,1),(26,'Terry','D','Wheeler','uploaded_images/87.jpg',3,1),(27,'Frank','J','Welch','uploaded_images/78.jpg',4,1),(28,'Lloyd','E','Richards','uploaded_images/36.jpg',5,1),(29,'Enrique','L','Peters','uploaded_images/9.jpg',6,1),(30,'Tomothy','C','Pilotos','uploaded_images/8.jpg',7,1),(31,'Michele','M','Simpson','uploaded_images/50.jpg',8,1);

/*Table structure for table `election_table` */

DROP TABLE IF EXISTS `election_table`;

CREATE TABLE `election_table` (
  `electiondateandtimestart` datetime DEFAULT NULL,
  `electiondateandtimeend` datetime DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `election_table` */

insert  into `election_table`(`electiondateandtimestart`,`electiondateandtimeend`,`status`) values ('2018-02-20 07:30:00','2018-02-22 19:30:00','');

/*Table structure for table `event_table` */

DROP TABLE IF EXISTS `event_table`;

CREATE TABLE `event_table` (
  `eventid` int(6) NOT NULL AUTO_INCREMENT,
  `eventtitle` varchar(200) DEFAULT NULL,
  `eventdescription` text,
  `dateposted` date DEFAULT NULL,
  `adminid` int(6) DEFAULT NULL,
  PRIMARY KEY (`eventid`),
  KEY `FK_events_table` (`adminid`),
  CONSTRAINT `FK_events_table` FOREIGN KEY (`adminid`) REFERENCES `admin_table` (`adminid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `event_table` */

insert  into `event_table`(`eventid`,`eventtitle`,`eventdescription`,`dateposted`,`adminid`) values (4,'Katahum Day','Our Katahum day is on Feb,25,2018','2018-02-22',1);

/*Table structure for table `list_of_contribution_and_fine_table` */

DROP TABLE IF EXISTS `list_of_contribution_and_fine_table`;

CREATE TABLE `list_of_contribution_and_fine_table` (
  `contributionandfineid` int(6) NOT NULL AUTO_INCREMENT,
  `nameofcontributionorfine` varchar(200) DEFAULT NULL,
  `amount` int(6) DEFAULT NULL,
  `type` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`contributionandfineid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `list_of_contribution_and_fine_table` */

insert  into `list_of_contribution_and_fine_table`(`contributionandfineid`,`nameofcontributionorfine`,`amount`,`type`) values (1,'T-Shirt Fee',250,'Contribution'),(2,'Attendance In First Assembly',50,'Fine'),(4,'Attendance Out First Assembly',50,'Fine'),(5,'Club Membership Fee',500,'Contribution');

/*Table structure for table `news_table` */

DROP TABLE IF EXISTS `news_table`;

CREATE TABLE `news_table` (
  `newsid` int(6) NOT NULL AUTO_INCREMENT,
  `newstitle` varchar(200) DEFAULT NULL,
  `newsdescription` text,
  `dateposted` date DEFAULT NULL,
  `adminid` int(6) DEFAULT NULL,
  PRIMARY KEY (`newsid`),
  KEY `FK_news_table` (`adminid`),
  CONSTRAINT `FK_news_table` FOREIGN KEY (`adminid`) REFERENCES `admin_table` (`adminid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `news_table` */

insert  into `news_table`(`newsid`,`newstitle`,`newsdescription`,`dateposted`,`adminid`) values (9,'Meeting','All Katahum members will having a meeting on  February 23, 2018 at exactly 4pm','2018-02-22',1);

/*Table structure for table `party_table` */

DROP TABLE IF EXISTS `party_table`;

CREATE TABLE `party_table` (
  `partyid` int(6) NOT NULL AUTO_INCREMENT,
  `partyname` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`partyid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `party_table` */

insert  into `party_table`(`partyid`,`partyname`) values (1,'Smart '),(2,'Liberal Party');

/*Table structure for table `position_table` */

DROP TABLE IF EXISTS `position_table`;

CREATE TABLE `position_table` (
  `positionid` int(6) NOT NULL AUTO_INCREMENT,
  `positionname` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`positionid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `position_table` */

insert  into `position_table`(`positionid`,`positionname`) values (1,'President'),(2,'Vice President'),(3,'Secretary'),(4,'Treasurer'),(5,'P.I.O'),(6,'Sergeant At Arms'),(7,'Third Year Representative'),(8,'Fourth Year Representative');

/*Table structure for table `service_offered_conversation_table` */

DROP TABLE IF EXISTS `service_offered_conversation_table`;

CREATE TABLE `service_offered_conversation_table` (
  `serviceofferedconversationid` int(6) NOT NULL AUTO_INCREMENT,
  `viewerid` int(6) DEFAULT NULL,
  `message` text,
  `serviceofferedid` int(6) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `studentid` int(6) DEFAULT NULL,
  `fromwho` varchar(60) DEFAULT NULL,
  `isread` int(1) DEFAULT '0',
  PRIMARY KEY (`serviceofferedconversationid`),
  KEY `FK_service_offered_conversation_table3` (`viewerid`),
  KEY `FK_service_offered_conversation_table4` (`serviceofferedid`),
  CONSTRAINT `FK_service_offered_conversation_table` FOREIGN KEY (`viewerid`) REFERENCES `viewer_table` (`viewerid`),
  CONSTRAINT `FK_service_offered_conversation_table3` FOREIGN KEY (`viewerid`) REFERENCES `viewer_table` (`viewerid`),
  CONSTRAINT `FK_service_offered_conversation_table4` FOREIGN KEY (`serviceofferedid`) REFERENCES `serviceoffered_table` (`serviceofferedid`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

/*Data for the table `service_offered_conversation_table` */

insert  into `service_offered_conversation_table`(`serviceofferedconversationid`,`viewerid`,`message`,`serviceofferedid`,`datetime`,`studentid`,`fromwho`,`isread`) values (12,3,'first message',6,'2018-02-14 11:36:42',5,'viewer',0),(13,3,'second meeage',6,'2018-02-14 11:36:53',5,'viewer',0),(14,3,'rex',6,'2018-02-14 11:39:25',5,'student',1),(15,3,'rex',6,'2018-02-14 11:39:40',5,'student',1),(16,3,'help me',6,'2018-02-14 11:41:01',5,'student',0),(17,3,'is this it?',6,'2018-02-14 11:43:51',5,'student',0),(20,3,'test',6,'2018-02-14 11:51:24',5,'viewer',0),(21,3,'hello the',6,'2018-02-14 11:51:47',5,'viewer',0),(22,3,'test kay ddddd',5,'2018-02-14 11:55:03',5,'viewer',1),(23,3,'aa',5,'2018-02-14 12:02:43',5,'student',0),(24,3,'agay',5,'2018-02-14 12:03:30',5,'viewer',0),(25,4,'pwdi kubang bilhin ang iyong pait.',7,'2018-02-19 13:58:27',5,'viewer',0),(26,4,'sure ',7,'2018-02-19 13:59:32',5,'student',0),(27,4,'hey can i buy you canvas',9,'2018-02-22 16:00:59',16,'viewer',0),(28,4,'yes',9,'2018-02-22 16:02:18',16,'student',0);

/*Table structure for table `serviceoffered_table` */

DROP TABLE IF EXISTS `serviceoffered_table`;

CREATE TABLE `serviceoffered_table` (
  `serviceofferedid` int(6) NOT NULL AUTO_INCREMENT,
  `serviceofferedtitle` varchar(100) DEFAULT NULL,
  `servicedescription` text,
  `studentid` int(6) DEFAULT NULL,
  `dateposted` date DEFAULT NULL,
  `imagelocation` text,
  PRIMARY KEY (`serviceofferedid`),
  KEY `FK_serviceoffered_table` (`studentid`),
  CONSTRAINT `FK_serviceoffered_table` FOREIGN KEY (`studentid`) REFERENCES `student_table` (`studentid`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `serviceoffered_table` */

insert  into `serviceoffered_table`(`serviceofferedid`,`serviceofferedtitle`,`servicedescription`,`studentid`,`dateposted`,`imagelocation`) values (5,'dddddddddddd','asdasd',5,'2018-02-13','uploaded_images/47 (1).jpg'),(6,'xdasdasdasdasd','dasdasddddddddddddddd',5,'2018-02-13','uploaded_images/47 (1).jpg'),(7,'painting','kind is very  kind',5,'2018-02-19','uploaded_images/28053343_210957779481957_42097707_n.jpg'),(8,'Paiting','dfffggghhjjkjk',16,'2018-02-19','uploaded_images/010818-marian_push.jpg'),(9,'canvas','once to come',16,'2018-02-22','uploaded_images/000img_20150814_085917.jpg');

/*Table structure for table `statement_of_account_table` */

DROP TABLE IF EXISTS `statement_of_account_table`;

CREATE TABLE `statement_of_account_table` (
  `statementofaccountid` int(6) NOT NULL AUTO_INCREMENT,
  `contributionandfineid` int(6) DEFAULT NULL,
  `datepaid` date DEFAULT NULL,
  `studentid` int(6) DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL,
  `adminid` int(6) DEFAULT NULL,
  PRIMARY KEY (`statementofaccountid`),
  KEY `FK_statement_of_account_table` (`adminid`),
  KEY `FK_statement_of_account_table3` (`contributionandfineid`),
  CONSTRAINT `FK_statement_of_account_table` FOREIGN KEY (`adminid`) REFERENCES `admin_table` (`adminid`),
  CONSTRAINT `FK_statement_of_account_table3` FOREIGN KEY (`contributionandfineid`) REFERENCES `list_of_contribution_and_fine_table` (`contributionandfineid`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;

/*Data for the table `statement_of_account_table` */

insert  into `statement_of_account_table`(`statementofaccountid`,`contributionandfineid`,`datepaid`,`studentid`,`status`,`adminid`) values (23,1,'2018-01-30',4,'paid',1),(32,2,'2018-01-30',4,'paid',1),(33,1,'2018-02-19',5,'paid',1),(34,2,'2018-02-19',5,'paid',1),(35,5,NULL,5,'unpaid',1),(36,2,'2018-01-30',7,'paid',1),(37,4,'2018-02-12',7,'paid',1),(38,1,'2018-02-19',7,'paid',1),(40,4,'2018-02-19',5,'paid',1),(41,NULL,NULL,4,'unpaid',NULL),(42,NULL,NULL,4,'unpaid',NULL),(43,NULL,NULL,4,'unpaid',NULL),(44,NULL,NULL,5,'unpaid',NULL),(45,NULL,NULL,6,'unpaid',NULL),(46,NULL,NULL,7,'unpaid',NULL),(47,NULL,NULL,4,'unpaid',NULL),(48,NULL,NULL,5,'unpaid',NULL),(49,NULL,NULL,6,'unpaid',NULL),(50,NULL,NULL,7,'unpaid',NULL),(51,1,NULL,8,'unpaid',NULL),(52,5,NULL,8,'unpaid',NULL),(53,NULL,NULL,8,'unpaid',NULL),(54,NULL,NULL,8,'unpaid',NULL),(55,NULL,NULL,8,'unpaid',NULL),(56,NULL,NULL,8,'unpaid',NULL),(57,1,NULL,6,'unpaid',1),(58,NULL,NULL,5,'unpaid',1),(59,NULL,NULL,5,'unpaid',1),(60,NULL,NULL,7,'unpaid',1),(61,1,NULL,9,'unpaid',NULL),(62,5,NULL,9,'unpaid',NULL),(63,NULL,NULL,9,'unpaid',NULL),(64,NULL,NULL,9,'unpaid',NULL),(65,NULL,NULL,9,'unpaid',NULL),(66,NULL,NULL,9,'unpaid',NULL),(67,1,NULL,9,'unpaid',NULL),(68,5,NULL,9,'unpaid',NULL),(69,NULL,NULL,9,'unpaid',NULL),(70,NULL,NULL,9,'unpaid',NULL),(71,NULL,NULL,9,'unpaid',NULL),(72,NULL,NULL,9,'unpaid',NULL),(73,1,NULL,9,'unpaid',NULL),(74,5,NULL,9,'unpaid',NULL),(75,NULL,NULL,9,'unpaid',NULL),(76,NULL,NULL,9,'unpaid',NULL),(77,NULL,NULL,9,'unpaid',NULL),(78,NULL,NULL,9,'unpaid',NULL),(79,1,NULL,9,'unpaid',NULL),(80,5,NULL,9,'unpaid',NULL),(81,NULL,NULL,9,'unpaid',NULL),(82,NULL,NULL,9,'unpaid',NULL),(83,NULL,NULL,9,'unpaid',NULL),(84,NULL,NULL,9,'unpaid',NULL),(85,1,NULL,9,'unpaid',NULL),(86,5,NULL,9,'unpaid',NULL),(87,NULL,NULL,9,'unpaid',NULL),(88,NULL,NULL,9,'unpaid',NULL),(89,NULL,NULL,9,'unpaid',NULL),(90,NULL,NULL,9,'unpaid',NULL),(91,NULL,NULL,4,'unpaid',NULL),(92,NULL,NULL,5,'unpaid',NULL),(93,NULL,NULL,6,'unpaid',NULL),(94,NULL,NULL,7,'unpaid',NULL),(95,NULL,NULL,8,'unpaid',NULL),(96,NULL,NULL,9,'unpaid',NULL),(97,NULL,NULL,10,'unpaid',NULL),(98,NULL,NULL,11,'unpaid',NULL),(99,NULL,NULL,12,'unpaid',NULL),(100,NULL,NULL,13,'unpaid',NULL),(101,1,NULL,14,'unpaid',NULL),(102,5,NULL,14,'unpaid',NULL),(103,NULL,NULL,14,'unpaid',NULL),(104,1,NULL,15,'unpaid',NULL),(105,5,NULL,15,'unpaid',NULL),(106,NULL,NULL,15,'unpaid',NULL),(108,5,NULL,16,'unpaid',NULL),(109,4,'2018-02-19',16,'paid',1),(110,2,NULL,16,'unpaid',1),(111,1,NULL,16,'unpaid',1),(112,1,NULL,17,'unpaid',NULL),(113,5,NULL,17,'unpaid',NULL);

/*Table structure for table `student_table` */

DROP TABLE IF EXISTS `student_table`;

CREATE TABLE `student_table` (
  `studentid` int(6) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) DEFAULT NULL,
  `middleinitial` varchar(4) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `emailaddress` varchar(60) DEFAULT NULL,
  `studentidnumber` varchar(60) DEFAULT NULL,
  `gender` varchar(60) DEFAULT NULL,
  `birthday` varchar(60) DEFAULT NULL,
  `specializedfieldofart` varchar(300) DEFAULT NULL,
  `profilepicturelocation` varchar(200) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `contactnumber` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`studentid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `student_table` */

insert  into `student_table`(`studentid`,`firstname`,`middleinitial`,`lastname`,`address`,`emailaddress`,`studentidnumber`,`gender`,`birthday`,`specializedfieldofart`,`profilepicturelocation`,`username`,`password`,`contactnumber`) values (4,'Michael','H','Bidding','431 Rizal Avenue Extension 1400','michaelh@yahoo.com','54242','Male','1997-09-10','CAD Drafting and Design Technology','uploaded_images/download.jpg','michael','0acf4539a14b3aa27deeb4cbdf6e989f','09365455854'),(5,'Rico','D.','Alba','1801 Centerpoint Building Julia Vargas Corner Garnet StreetOrtigas Center 1600','albay@yahoo.com','54217','Male','1997-09-02','Architectural Drafting and Design','uploaded_images/Tulips.jpg','rico','be89e250d8388c5e7ded2f1630e5daa4','09366337691'),(6,'Kyle','A','Escalante','7805 St. Paul Corner Mayapis Street, San Antonio Village','kaylyn@yahoo.com','54758','Male','1997-02-05','Mechanical Drafting and Design','uploaded_images/images (1).jpg','kyle','4b75751e170e00f56886726c3f46eecd','09162145655'),(7,'Becky','F','Henderson','6454 W Sherman Dr','becky.henderson22@example.com','58754','Male','1997-07-16','CAD Drafting and Design Technology','images/profile.png','becky','2a63cc4aef5193e84c0b1c7d8d2abef5','09457874741'),(14,'Sarita','F.','Olarte','Roxas Avenue, Mahayahay','roxas@yahoo.com','21252','Male','1997-02-05','AUTOCAD','uploaded_images/sd.jpg','sarita','fb4e529ea6b9320c8bd32577f78a7fdf','+639759337485'),(16,'key','A','Abad','surallah','key23@gmail.com','115-679','Female','1995-03-02','Drowong','uploaded_images/Lisa-black-pink-40579158-453-500.jpg','key','3c6e0b8a9c15224a8228b9a98ca1531d','09856543226');

/*Table structure for table `teacher_table` */

DROP TABLE IF EXISTS `teacher_table`;

CREATE TABLE `teacher_table` (
  `teacherid` int(6) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) DEFAULT NULL,
  `middleinitial` varchar(4) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `emailaddress` varchar(60) DEFAULT NULL,
  `gender` varchar(60) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `contactnumber` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`teacherid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `teacher_table` */

insert  into `teacher_table`(`teacherid`,`firstname`,`middleinitial`,`lastname`,`emailaddress`,`gender`,`birthday`,`username`,`password`,`contactnumber`) values (7,'Kirk1','P','Steward','Steward@yahoo.com','Male','1990-05-15','teacher','8d788385431273d11e8b43bb78f3aa41','09457879655'),(8,'laga','A','ompong','ompong33@mail.com','Female','1995-08-03','laga','4163d3968d973a18507a569824a0fc51','0987765543333');

/*Table structure for table `updates_table` */

DROP TABLE IF EXISTS `updates_table`;

CREATE TABLE `updates_table` (
  `updatesid` int(6) NOT NULL AUTO_INCREMENT,
  `updatestitle` varchar(200) DEFAULT NULL,
  `updatesdescription` text,
  `dateposted` date DEFAULT NULL,
  `adminid` int(6) DEFAULT NULL,
  PRIMARY KEY (`updatesid`),
  KEY `FK_updates_table` (`adminid`),
  CONSTRAINT `FK_updates_table` FOREIGN KEY (`adminid`) REFERENCES `admin_table` (`adminid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `updates_table` */

/*Table structure for table `viewer_table` */

DROP TABLE IF EXISTS `viewer_table`;

CREATE TABLE `viewer_table` (
  `viewerid` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `firstname` varchar(60) DEFAULT NULL,
  `middleinitial` varchar(4) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `contactnumber` varchar(60) DEFAULT NULL,
  `emailaddress` varchar(60) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `gender` varchar(60) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  PRIMARY KEY (`viewerid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `viewer_table` */

insert  into `viewer_table`(`viewerid`,`username`,`password`,`firstname`,`middleinitial`,`lastname`,`contactnumber`,`emailaddress`,`address`,`gender`,`birthday`) values (2,'nelson','4b2a1529867b8d697685b1722ccd0149','Nelson','U','Miranda','09164475214','lala@yahoo.com','3/F L G I Building Ortigas Avenue Greenhills 1500','Male','1998-01-06'),(3,'viewer','4b2a1529867b8d697685b1722ccd0149','Sharlene1','H','Ferguson1','09754363955','asdasd@yahoo.com','asdasd3a56sd5a6sd1','Male','1997-12-13'),(4,'toy','10016b6ed5a5b09be08133fa2d282636','toy','A','toy','09878765544','toy22@gmail.com','isulan','Male','1991-12-03');

/*Table structure for table `vote_table` */

DROP TABLE IF EXISTS `vote_table`;

CREATE TABLE `vote_table` (
  `votesid` int(6) NOT NULL AUTO_INCREMENT,
  `studentid` int(6) DEFAULT NULL,
  `candidateid` int(6) DEFAULT NULL,
  PRIMARY KEY (`votesid`),
  KEY `FK_vote_table` (`candidateid`),
  KEY `FK_vote_table1` (`studentid`),
  CONSTRAINT `FK_vote_table` FOREIGN KEY (`candidateid`) REFERENCES `candidate_table` (`candidateid`) ON DELETE SET NULL,
  CONSTRAINT `FK_vote_table1` FOREIGN KEY (`studentid`) REFERENCES `student_table` (`studentid`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

/*Data for the table `vote_table` */

insert  into `vote_table`(`votesid`,`studentid`,`candidateid`) values (23,5,19),(24,4,1),(25,4,25),(26,4,18),(27,4,27),(28,4,28),(29,4,31),(30,6,19),(31,6,17),(32,6,26),(33,6,20),(34,6,28),(35,6,22),(36,6,23),(37,6,24),(38,7,19);

/*Table structure for table `announced_artwork_category_view` */

DROP TABLE IF EXISTS `announced_artwork_category_view`;

/*!50001 DROP VIEW IF EXISTS `announced_artwork_category_view` */;
/*!50001 DROP TABLE IF EXISTS `announced_artwork_category_view` */;

/*!50001 CREATE TABLE  `announced_artwork_category_view`(
 `announcedartworkcategoryid` int(6) ,
 `artworkcategoryid` int(6) ,
 `teacherid` int(6) ,
 `dateannounced` date ,
 `description` text ,
 `fullname` varchar(126) ,
 `artworkcategoryname` varchar(100) 
)*/;

/*Table structure for table `artwork_view` */

DROP TABLE IF EXISTS `artwork_view`;

/*!50001 DROP VIEW IF EXISTS `artwork_view` */;
/*!50001 DROP TABLE IF EXISTS `artwork_view` */;

/*!50001 CREATE TABLE  `artwork_view`(
 `artworkid` int(6) ,
 `announcedartworkcategoryid` int(6) ,
 `studentid` int(6) ,
 `dateposted` date ,
 `imagelocation` text ,
 `message` text ,
 `firstname` varchar(60) ,
 `middleinitial` varchar(4) ,
 `lastname` varchar(60) ,
 `dateannounced` date ,
 `description` text ,
 `artworkcategoryname` varchar(100) 
)*/;

/*Table structure for table `award_view` */

DROP TABLE IF EXISTS `award_view`;

/*!50001 DROP VIEW IF EXISTS `award_view` */;
/*!50001 DROP TABLE IF EXISTS `award_view` */;

/*!50001 CREATE TABLE  `award_view`(
 `awardid` int(6) ,
 `awardtitle` varchar(200) ,
 `awarddescription` text ,
 `dateposted` date ,
 `adminid` int(6) ,
 `firstname` varchar(60) ,
 `middleinitial` varchar(60) ,
 `lastname` varchar(60) 
)*/;

/*Table structure for table `candidate_view` */

DROP TABLE IF EXISTS `candidate_view`;

/*!50001 DROP VIEW IF EXISTS `candidate_view` */;
/*!50001 DROP TABLE IF EXISTS `candidate_view` */;

/*!50001 CREATE TABLE  `candidate_view`(
 `candidateid` int(6) ,
 `firstname` varchar(60) ,
 `middleinitial` varchar(60) ,
 `lastname` varchar(60) ,
 `profilepicturelocation` varchar(200) ,
 `positionid` int(6) ,
 `partyid` int(6) ,
 `positionname` varchar(60) ,
 `partyname` varchar(60) 
)*/;

/*Table structure for table `event_view` */

DROP TABLE IF EXISTS `event_view`;

/*!50001 DROP VIEW IF EXISTS `event_view` */;
/*!50001 DROP TABLE IF EXISTS `event_view` */;

/*!50001 CREATE TABLE  `event_view`(
 `eventid` int(6) ,
 `eventtitle` varchar(200) ,
 `eventdescription` text ,
 `dateposted` date ,
 `adminid` int(6) ,
 `lastname` varchar(60) ,
 `middleinitial` varchar(60) ,
 `firstname` varchar(60) 
)*/;

/*Table structure for table `news_view` */

DROP TABLE IF EXISTS `news_view`;

/*!50001 DROP VIEW IF EXISTS `news_view` */;
/*!50001 DROP TABLE IF EXISTS `news_view` */;

/*!50001 CREATE TABLE  `news_view`(
 `newsid` int(6) ,
 `newstitle` varchar(200) ,
 `newsdescription` text ,
 `dateposted` date ,
 `adminid` int(6) ,
 `firstname` varchar(60) ,
 `middleinitial` varchar(60) ,
 `lastname` varchar(60) 
)*/;

/*Table structure for table `service_offered_conversation_view` */

DROP TABLE IF EXISTS `service_offered_conversation_view`;

/*!50001 DROP VIEW IF EXISTS `service_offered_conversation_view` */;
/*!50001 DROP TABLE IF EXISTS `service_offered_conversation_view` */;

/*!50001 CREATE TABLE  `service_offered_conversation_view`(
 `serviceofferedconversationid` int(6) ,
 `viewerid` int(6) ,
 `message` text ,
 `serviceofferedid` int(6) ,
 `datetime` datetime ,
 `studentid` int(6) ,
 `fromwho` varchar(60) ,
 `isread` int(1) ,
 `vfirstname` varchar(60) ,
 `vmiddleinitial` varchar(4) ,
 `vlastname` varchar(60) ,
 `vcontactnumber` varchar(60) ,
 `vemailaddress` varchar(60) ,
 `serviceofferedtitle` varchar(100) ,
 `servicedescription` text ,
 `dateposted` date ,
 `sfirstname` varchar(60) ,
 `smiddleinitial` varchar(4) ,
 `slastname` varchar(60) ,
 `semailaddress` varchar(60) ,
 `scontactnumber` varchar(60) 
)*/;

/*Table structure for table `serviceoffered_view` */

DROP TABLE IF EXISTS `serviceoffered_view`;

/*!50001 DROP VIEW IF EXISTS `serviceoffered_view` */;
/*!50001 DROP TABLE IF EXISTS `serviceoffered_view` */;

/*!50001 CREATE TABLE  `serviceoffered_view`(
 `serviceofferedid` int(6) ,
 `serviceofferedtitle` varchar(100) ,
 `servicedescription` text ,
 `studentid` int(6) ,
 `dateposted` date ,
 `imagelocation` text ,
 `firstname` varchar(60) ,
 `middleinitial` varchar(4) ,
 `lastname` varchar(60) ,
 `address` varchar(200) ,
 `emailaddress` varchar(60) ,
 `studentidnumber` varchar(60) ,
 `gender` varchar(60) ,
 `birthday` varchar(60) ,
 `specializedfieldofart` varchar(300) ,
 `profilepicturelocation` varchar(200) ,
 `username` varchar(60) ,
 `contactnumber` varchar(60) 
)*/;

/*Table structure for table `statement_of_account_view` */

DROP TABLE IF EXISTS `statement_of_account_view`;

/*!50001 DROP VIEW IF EXISTS `statement_of_account_view` */;
/*!50001 DROP TABLE IF EXISTS `statement_of_account_view` */;

/*!50001 CREATE TABLE  `statement_of_account_view`(
 `statementofaccountid` int(6) ,
 `contributionandfineid` int(6) ,
 `datepaid` date ,
 `studentid` int(6) ,
 `status` varchar(60) ,
 `firstname` varchar(60) ,
 `middleinitial` varchar(4) ,
 `lastname` varchar(60) ,
 `studentidnumber` varchar(60) ,
 `nameofcontributionorfine` varchar(200) ,
 `amount` int(6) ,
 `type` varchar(60) 
)*/;

/*Table structure for table `vote_view` */

DROP TABLE IF EXISTS `vote_view`;

/*!50001 DROP VIEW IF EXISTS `vote_view` */;
/*!50001 DROP TABLE IF EXISTS `vote_view` */;

/*!50001 CREATE TABLE  `vote_view`(
 `votesid` int(6) ,
 `studentid` int(6) ,
 `candidateid` int(6) ,
 `sfirstname` varchar(60) ,
 `smiddleinitial` varchar(4) ,
 `slastname` varchar(60) ,
 `firstname` varchar(60) ,
 `middleinitial` varchar(60) ,
 `lastname` varchar(60) ,
 `profilepicturelocation` varchar(200) ,
 `positionid` int(6) ,
 `partyid` int(6) ,
 `partyname` varchar(60) 
)*/;

/*View structure for view announced_artwork_category_view */

/*!50001 DROP TABLE IF EXISTS `announced_artwork_category_view` */;
/*!50001 DROP VIEW IF EXISTS `announced_artwork_category_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `announced_artwork_category_view` AS select `announced_artwork_category_table`.`announcedartworkcategoryid` AS `announcedartworkcategoryid`,`announced_artwork_category_table`.`artworkcategoryid` AS `artworkcategoryid`,`announced_artwork_category_table`.`teacherid` AS `teacherid`,`announced_artwork_category_table`.`dateannounced` AS `dateannounced`,`announced_artwork_category_table`.`description` AS `description`,concat(`teacher_table`.`firstname`,' ',`teacher_table`.`middleinitial`,' ',`teacher_table`.`lastname`) AS `fullname`,`artwork_category_table`.`artworkcategoryname` AS `artworkcategoryname` from ((`announced_artwork_category_table` join `teacher_table` on((`announced_artwork_category_table`.`teacherid` = `teacher_table`.`teacherid`))) join `artwork_category_table` on((`announced_artwork_category_table`.`artworkcategoryid` = `artwork_category_table`.`artworkcategoryid`))) */;

/*View structure for view artwork_view */

/*!50001 DROP TABLE IF EXISTS `artwork_view` */;
/*!50001 DROP VIEW IF EXISTS `artwork_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `artwork_view` AS select `artwork_table`.`artworkid` AS `artworkid`,`artwork_table`.`announcedartworkcategoryid` AS `announcedartworkcategoryid`,`artwork_table`.`studentid` AS `studentid`,`artwork_table`.`dateposted` AS `dateposted`,`artwork_table`.`imagelocation` AS `imagelocation`,`artwork_table`.`message` AS `message`,`student_table`.`firstname` AS `firstname`,`student_table`.`middleinitial` AS `middleinitial`,`student_table`.`lastname` AS `lastname`,`announced_artwork_category_table`.`dateannounced` AS `dateannounced`,`announced_artwork_category_table`.`description` AS `description`,`artwork_category_table`.`artworkcategoryname` AS `artworkcategoryname` from (((`artwork_table` join `student_table` on((`artwork_table`.`studentid` = `student_table`.`studentid`))) join `announced_artwork_category_table` on((`artwork_table`.`announcedartworkcategoryid` = `announced_artwork_category_table`.`announcedartworkcategoryid`))) join `artwork_category_table` on((`announced_artwork_category_table`.`artworkcategoryid` = `artwork_category_table`.`artworkcategoryid`))) */;

/*View structure for view award_view */

/*!50001 DROP TABLE IF EXISTS `award_view` */;
/*!50001 DROP VIEW IF EXISTS `award_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `award_view` AS select `award_table`.`awardid` AS `awardid`,`award_table`.`awardtitle` AS `awardtitle`,`award_table`.`awarddescription` AS `awarddescription`,`award_table`.`dateposted` AS `dateposted`,`award_table`.`adminid` AS `adminid`,`admin_table`.`firstname` AS `firstname`,`admin_table`.`middleinitial` AS `middleinitial`,`admin_table`.`lastname` AS `lastname` from (`award_table` join `admin_table` on((`award_table`.`adminid` = `admin_table`.`adminid`))) */;

/*View structure for view candidate_view */

/*!50001 DROP TABLE IF EXISTS `candidate_view` */;
/*!50001 DROP VIEW IF EXISTS `candidate_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `candidate_view` AS select `candidate_table`.`candidateid` AS `candidateid`,`candidate_table`.`firstname` AS `firstname`,`candidate_table`.`middleinitial` AS `middleinitial`,`candidate_table`.`lastname` AS `lastname`,`candidate_table`.`profilepicturelocation` AS `profilepicturelocation`,`candidate_table`.`positionid` AS `positionid`,`candidate_table`.`partyid` AS `partyid`,`position_table`.`positionname` AS `positionname`,`party_table`.`partyname` AS `partyname` from ((`candidate_table` join `position_table` on((`candidate_table`.`positionid` = `position_table`.`positionid`))) join `party_table` on((`candidate_table`.`partyid` = `party_table`.`partyid`))) */;

/*View structure for view event_view */

/*!50001 DROP TABLE IF EXISTS `event_view` */;
/*!50001 DROP VIEW IF EXISTS `event_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `event_view` AS select `event_table`.`eventid` AS `eventid`,`event_table`.`eventtitle` AS `eventtitle`,`event_table`.`eventdescription` AS `eventdescription`,`event_table`.`dateposted` AS `dateposted`,`event_table`.`adminid` AS `adminid`,`admin_table`.`lastname` AS `lastname`,`admin_table`.`middleinitial` AS `middleinitial`,`admin_table`.`firstname` AS `firstname` from (`event_table` join `admin_table` on((`event_table`.`adminid` = `admin_table`.`adminid`))) */;

/*View structure for view news_view */

/*!50001 DROP TABLE IF EXISTS `news_view` */;
/*!50001 DROP VIEW IF EXISTS `news_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `news_view` AS select `news_table`.`newsid` AS `newsid`,`news_table`.`newstitle` AS `newstitle`,`news_table`.`newsdescription` AS `newsdescription`,`news_table`.`dateposted` AS `dateposted`,`news_table`.`adminid` AS `adminid`,`admin_table`.`firstname` AS `firstname`,`admin_table`.`middleinitial` AS `middleinitial`,`admin_table`.`lastname` AS `lastname` from (`news_table` join `admin_table` on((`news_table`.`adminid` = `admin_table`.`adminid`))) */;

/*View structure for view service_offered_conversation_view */

/*!50001 DROP TABLE IF EXISTS `service_offered_conversation_view` */;
/*!50001 DROP VIEW IF EXISTS `service_offered_conversation_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `service_offered_conversation_view` AS select `service_offered_conversation_table`.`serviceofferedconversationid` AS `serviceofferedconversationid`,`service_offered_conversation_table`.`viewerid` AS `viewerid`,`service_offered_conversation_table`.`message` AS `message`,`service_offered_conversation_table`.`serviceofferedid` AS `serviceofferedid`,`service_offered_conversation_table`.`datetime` AS `datetime`,`service_offered_conversation_table`.`studentid` AS `studentid`,`service_offered_conversation_table`.`fromwho` AS `fromwho`,`service_offered_conversation_table`.`isread` AS `isread`,`viewer_table`.`firstname` AS `vfirstname`,`viewer_table`.`middleinitial` AS `vmiddleinitial`,`viewer_table`.`lastname` AS `vlastname`,`viewer_table`.`contactnumber` AS `vcontactnumber`,`viewer_table`.`emailaddress` AS `vemailaddress`,`serviceoffered_table`.`serviceofferedtitle` AS `serviceofferedtitle`,`serviceoffered_table`.`servicedescription` AS `servicedescription`,`serviceoffered_table`.`dateposted` AS `dateposted`,`student_table`.`firstname` AS `sfirstname`,`student_table`.`middleinitial` AS `smiddleinitial`,`student_table`.`lastname` AS `slastname`,`student_table`.`emailaddress` AS `semailaddress`,`student_table`.`contactnumber` AS `scontactnumber` from (((`service_offered_conversation_table` join `serviceoffered_table` on((`service_offered_conversation_table`.`serviceofferedid` = `serviceoffered_table`.`serviceofferedid`))) join `viewer_table` on((`service_offered_conversation_table`.`viewerid` = `viewer_table`.`viewerid`))) join `student_table` on((`service_offered_conversation_table`.`studentid` = `student_table`.`studentid`))) */;

/*View structure for view serviceoffered_view */

/*!50001 DROP TABLE IF EXISTS `serviceoffered_view` */;
/*!50001 DROP VIEW IF EXISTS `serviceoffered_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `serviceoffered_view` AS select `serviceoffered_table`.`serviceofferedid` AS `serviceofferedid`,`serviceoffered_table`.`serviceofferedtitle` AS `serviceofferedtitle`,`serviceoffered_table`.`servicedescription` AS `servicedescription`,`serviceoffered_table`.`studentid` AS `studentid`,`serviceoffered_table`.`dateposted` AS `dateposted`,`serviceoffered_table`.`imagelocation` AS `imagelocation`,`student_table`.`firstname` AS `firstname`,`student_table`.`middleinitial` AS `middleinitial`,`student_table`.`lastname` AS `lastname`,`student_table`.`address` AS `address`,`student_table`.`emailaddress` AS `emailaddress`,`student_table`.`studentidnumber` AS `studentidnumber`,`student_table`.`gender` AS `gender`,`student_table`.`birthday` AS `birthday`,`student_table`.`specializedfieldofart` AS `specializedfieldofart`,`student_table`.`profilepicturelocation` AS `profilepicturelocation`,`student_table`.`username` AS `username`,`student_table`.`contactnumber` AS `contactnumber` from (`serviceoffered_table` join `student_table` on((`serviceoffered_table`.`studentid` = `student_table`.`studentid`))) */;

/*View structure for view statement_of_account_view */

/*!50001 DROP TABLE IF EXISTS `statement_of_account_view` */;
/*!50001 DROP VIEW IF EXISTS `statement_of_account_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `statement_of_account_view` AS select `statement_of_account_table`.`statementofaccountid` AS `statementofaccountid`,`statement_of_account_table`.`contributionandfineid` AS `contributionandfineid`,`statement_of_account_table`.`datepaid` AS `datepaid`,`statement_of_account_table`.`studentid` AS `studentid`,`statement_of_account_table`.`status` AS `status`,`student_table`.`firstname` AS `firstname`,`student_table`.`middleinitial` AS `middleinitial`,`student_table`.`lastname` AS `lastname`,`student_table`.`studentidnumber` AS `studentidnumber`,`list_of_contribution_and_fine_table`.`nameofcontributionorfine` AS `nameofcontributionorfine`,`list_of_contribution_and_fine_table`.`amount` AS `amount`,`list_of_contribution_and_fine_table`.`type` AS `type` from ((`statement_of_account_table` join `student_table` on((`statement_of_account_table`.`studentid` = `student_table`.`studentid`))) join `list_of_contribution_and_fine_table` on((`statement_of_account_table`.`contributionandfineid` = `list_of_contribution_and_fine_table`.`contributionandfineid`))) */;

/*View structure for view vote_view */

/*!50001 DROP TABLE IF EXISTS `vote_view` */;
/*!50001 DROP VIEW IF EXISTS `vote_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vote_view` AS select `vote_table`.`votesid` AS `votesid`,`vote_table`.`studentid` AS `studentid`,`vote_table`.`candidateid` AS `candidateid`,`student_table`.`firstname` AS `sfirstname`,`student_table`.`middleinitial` AS `smiddleinitial`,`student_table`.`lastname` AS `slastname`,`candidate_table`.`firstname` AS `firstname`,`candidate_table`.`middleinitial` AS `middleinitial`,`candidate_table`.`lastname` AS `lastname`,`candidate_table`.`profilepicturelocation` AS `profilepicturelocation`,`candidate_table`.`positionid` AS `positionid`,`candidate_table`.`partyid` AS `partyid`,`party_table`.`partyname` AS `partyname` from (((`vote_table` join `candidate_table` on((`vote_table`.`candidateid` = `candidate_table`.`candidateid`))) join `party_table` on((`candidate_table`.`partyid` = `party_table`.`partyid`))) join `student_table` on((`student_table`.`studentid` = `vote_table`.`studentid`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
