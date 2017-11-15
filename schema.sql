CREATE DATABASE cheapomail;
USE cheapomail;

/* user tabe */

CREATE TABLE `user` (
	`id` int(11) PRIMARY KEY NOT NULL auto_increment,
	`firstname` varchar(20) NOT NULL,
	`lastname` varchar(20) NOT NULL,
	`username` varchar(16) NOT NULL,
	`password` varchar(32) NOT NULL,
	UNIQUE (`username`)
);


INSERT INTO `user` (`firstname`, `lastname`, `username`, `password`) values ();
INSERT INTO `user` (`firstname`, `lastname`, `username`, `password`) values ();
INSERT INTO `user` (`firstname`, `lastname`, `username`, `password`) values (); 
INSERT INTO `user` (`firstname`, `lastname`, `username`, `password`) values (); 




