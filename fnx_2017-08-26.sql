# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.34)
# Database: fnx
# Generation Time: 2017-08-26 11:28:00 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Category`;

CREATE TABLE `Category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Category` WRITE;
/*!40000 ALTER TABLE `Category` DISABLE KEYS */;

INSERT INTO `Category` (`id`, `name`)
VALUES
	(1,'Health'),
	(2,'Science'),
	(3,'Archaeology'),
	(4,'Miscelenous'),
	(5,'Daily life');

/*!40000 ALTER TABLE `Category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Author
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Author`;

CREATE TABLE `Author` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Author` WRITE;
/*!40000 ALTER TABLE `Author` DISABLE KEYS */;

INSERT INTO `Author` (`id`, `firstName`, `lastName`, `about`)
VALUES
	(1,'Gordon','Ramsay',NULL),
	(2,'Roger','Penrose',NULL),
	(3,'Henry','Walton Jones III',NULL),
	(4,'Johann','Voynich',NULL),
	(5,'Martha','Stewart',NULL);

/*!40000 ALTER TABLE `Author` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Article
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Article`;

CREATE TABLE `Article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `shortDescription` varchar(255) DEFAULT NULL,
  `content` text,
  `price` double DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `authors` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Article` WRITE;
/*!40000 ALTER TABLE `Article` DISABLE KEYS */;

INSERT INTO `Article` (`id`, `title`, `shortDescription`, `content`, `price`, `category_id`, `authors`)
VALUES
	(1,'Healthy dish you can preapare quickly','Nulla vestibulum nec, dignissim in, cursus molestie. Donec est. Integer neque quis porta nisl. Nam pulvinar, quam molestie ultricies vitae.','Lorem ipsum primis in erat consectetuer viverra semper orci, viverra lacinia. Vestibulum aliquam lacinia, risus nunc, placerat ornare dapibus. Aenean et netus et velit. Duis hendrerit magna sapien, tempus ac, dictum sed, vestibulum vehicula. Etiam leo at risus commodo ante. Curabitur elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi sem dolor eu wisi. Suspendisse at lorem non orci. Proin gravida sit amet nunc volutpat a, pellentesque sed, sodales pede. Duis vulputate nunc. Praesent tortor. Donec vitae felis. Mauris leo. Donec molestie a, tellus. Suspendisse at magna. Etiam vestibulum tristique vitae, lectus. Nam suscipit, risus velit, a dolor lacus, congue quis, dictum id, eleifend purus scelerisque odio sit amet felis odio vitae fringilla fringilla eget, nulla. Nunc justo ac posuere cubilia Curae, Sed vehicula wisi, aliquam arcu. Sed feugiat sapien, congue odio non arcu. Nam risus et ultrices iaculis. Curabitur arcu elit, dictum ut, diam.',0,NULL,'\"1\"'),
	(2,'Germanium-based CPU cores','Cum sociis natoque penatibus et ultrices urna, pellentesque tincidunt, velit in dui. Lorem ipsum aliquet elit. Mauris luctus et magnis.','Curae, Mauris vel risus. Nulla facilisi. Nullam et lacus a mauris. Nunc ultricies tortor id tortor quis massa ac ipsum. Proin cursus, mi quis viverra elit. Nunc consectetuer adipiscing ornare. Nam molestie. Quisque pharetra, urna ut urna mauris, consectetuer nisl. Fusce mollis, orci a augue. Nam scelerisque pede ac nisl. Morbi fermentum leo facilisis dui ligula, quis eleifend eget, nunc. Nunc velit non sem. Nam lorem eu eros. Pellentesque laoreet metus vitae tellus consectetuer adipiscing quam sagittis eget, bibendum ac, ultricies vehicula, dui gravida vitae, lectus. Curabitur commodo. Curabitur condimentum magna sapien, nec tellus. Quisque nulla. Aenean massa molestie justo euismod scelerisque vel, ipsum. Nunc accumsan at, egestas risus libero, posuere cubilia Curae, In accumsan augue nec turpis quis euismod nibh, dignissim dolor eu elementum quis, ornare at, bibendum porttitor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Curabitur eu dui quis justo. Vestibulum enim.',1.5,2,'[\"2\",\"3\"]'),
	(3,'A Pyramid? Found one more!','Morbi vitae dui odio nonummy eget, dignissim porttitor, arcu nunc ut erat. Duis ut aliquet ipsum sit amet, ante. Morbi.','Aenean feugiat nec, nibh. Donec dolor nibh, dignissim tempor, pede urna mi, nec sapien mauris lacus a blandit malesuada. Suspendisse vel leo. In euismod. Integer lacinia id, sapien. Maecenas sapien quis consectetuer dignissim, lorem fermentum mi, viverra ligula. Phasellus ac lectus. Sed adipiscing risus at tortor. Integer neque ut venenatis augue quis pellentesque consectetuer, augue at consequat tortor, pretium vitae, tortor. Proin dui at sapien. Maecenas imperdiet convallis. Fusce blandit justo, posuere cubilia Curae, Vivamus semper quis, tellus. Aliquam nulla. Aliquam ultricies lobortis sed, ullamcorper varius nunc, tempus nunc. Ut sodales, dictum sed, aliquet elit, varius risus metus gravida non, nunc. Sed aliquet quis, ornare quam. Vestibulum ullamcorper augue, sagittis urna. Donec odio sit amet, sodales nulla. Phasellus urna fringilla vel, ornare bibendum sapien vitae lectus vulputate faucibus. Sed sagittis nibh ultricies leo. In urna. Proin imperdiet dignissim volutpat at, pretium pellentesque. Praesent gravida iaculis odio, sagittis lacus et augue.',5.75,3,'\"3\"'),
	(4,'The prosecution just couldn\'t handle the truth','Vestibulum convallis nisl, sollicitudin sed, fermentum facilisis. Maecenas fermentum quis, velit. Duis lobortis, varius sit amet, felis. Pellentesque porta tincidunt.','Mauris vestibulum ligula. Ut sagittis, nunc semper feugiat. Cum sociis natoque penatibus et eros orci luctus et lectus. Curabitur placerat, nisl ac odio eget velit wisi, ullamcorper mauris. Etiam ac ligula. Lorem ipsum aliquet feugiat nec, scelerisque arcu. Sed mauris sit amet, vulputate luctus. Sed fringilla sollicitudin, odio vitae velit sit amet, massa. Nunc gravida. Suspendisse est. Lorem ipsum dolor ut magna. Quisque vestibulum. Nulla consequat sed, ullamcorper ac, laoreet a, ligula. Aenean non felis. Pellentesque at ipsum. Aliquam consequat eu, luctus bibendum. Nulla eleifend purus consectetuer massa. Proin sed porta turpis velit, scelerisque odio eget augue commodo volutpat quam nibh faucibus in, dapibus sit amet, iaculis ante, tincidunt quis, ultricies porta. Vivamus pede. Vestibulum aliquam enim. Nunc leo. Phasellus ipsum dolor placerat vehicula elit ac turpis egestas. Mauris rutrum, enim sed massa in accumsan congue. Donec vitae libero at purus. Sed nonummy id, elit. Curabitur fringilla ante sodales eu.',0,4,'\"4\"'),
	(5,'A walk to the park','Lorem ipsum dolor sapien accumsan congue. Donec ullamcorper, lorem hendrerit wisi. Vestibulum turpis egestas. Aenean posuere elementum odio fermentum suscipit.','Nullam aliquet. Vestibulum cursus vitae, sollicitudin mauris sed viverra elit viverra quis, faucibus orci quis nibh. Curabitur ultrices urna, pellentesque leo. Aenean congue porta, metus sed est. Quisque ut mauris sed eros malesuada vitae, dapibus vel, orci. Sed mauris turpis, molestie turpis sagittis libero. Morbi pede. In quis nibh vel lectus. Nullam rutrum et, faucibus orci vitae dui eget sem tincidunt in, tristique eget, aliquam purus. Integer eget tempus ornare arcu quis nibh. Phasellus lorem tempus nunc. Etiam dictum ut, pulvinar interdum. Quisque cursus, mi libero, id rutrum nulla, auctor scelerisque, ante nec quam. Sed porttitor, quam risus, pellentesque at, metus. Vestibulum ante in nonummy id, semper quis, aliquam arcu. In molestie lorem velit eleifend quam nunc, vitae fringilla mi, eu felis augue id leo vitae est sit amet felis mollis pulvinar. Nulla euismod, quam at arcu. Etiam nibh eu urna. Aenean bibendum vitae, vulputate adipiscing. Mauris eget lectus felis.',0,5,'\"5\"');

/*!40000 ALTER TABLE `Article` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table User
# ------------------------------------------------------------

DROP TABLE IF EXISTS `User`;

CREATE TABLE `User` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `wallet` double DEFAULT NULL,
  `articles` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;

INSERT INTO `User` (`id`, `username`, `password`, `wallet`, `articles`)
VALUES
	(1,'admin','21232f297a57a5a743894a0e4a801fc3',10,''),
	(2,'test','21232f297a57a5a743894a0e4a801fc3',2,'');

/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
