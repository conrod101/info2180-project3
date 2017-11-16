DROP DATABASE IF EXISTS cheapomail;
CREATE DATABASE cheapomail;
USE cheapomail;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
	`id` int(11) PRIMARY KEY NOT NULL auto_increment,
	`firstname` varchar(20) NOT NULL,
	`lastname` varchar(20) NOT NULL,
	`username` varchar(16) NOT NULL,
	`password` varchar(32) NOT NULL,
	UNIQUE (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

/*LOCK TABLES `users` WRITE; */
INSERT INTO `users` VALUES (1,'Conrod', 'Smith', 'admin', 'password123');
/*UNLOCK TABLES;  */


DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
	`id` int(11) PRIMARY KEY NOT NULL auto_increment,
	`recipient_ids` text NOT NULL,
	`user_id` int(11) NOT NULL,
	`subject` varchar(128) NOT NULL,
	`body` mediumtext NOT NULL,
	`date_sent` datetime NOT NULL
);

DROP TABLE IF EXISTS `messages_read`;
CREATE TABLE `messages_read` (
	`id` int(11) PRIMARY KEY NOT NULL auto_increment,
	`message_id` text NOT NULL,
	`reader_id` int(11) NOT NULL,
	`date_read` datetime NOT NULL
);
