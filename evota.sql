
CREATE DATABASE;

USE `evota`;

/*Table structure for table `tblcandidates` */

DROP TABLE IF EXISTS `tblcandidates`;

CREATE TABLE `tblcandidates` (
  `candidate_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `post_id` varchar(100) DEFAULT NULL,
  `motto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`candidate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `tblposts`;

CREATE TABLE `tblposts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(100) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tblusers`;

CREATE TABLE `tblusers` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `photo` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `program` varchar(100) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


insert  into `tblusers`(`user_id`,`name`,`password`,`role`,`deleted`,`photo`,`gender`,`username`,`program`,`level`) values 
(1,'Admin','21232f297a57a5a743894a0e4a801fc3','admin',0,NULL,NULL,'admin',NULL,NULL),
(3,'Beatrice','9077c3585038a90e34afe97a02bf4355','user',0,NULL,NULL,'beatrice',NULL,NULL);


DROP TABLE IF EXISTS `tblvotes`;

CREATE TABLE `tblvotes` (
  `vote_date` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

