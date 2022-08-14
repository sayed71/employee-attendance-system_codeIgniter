/*
SQLyog Community v12.4.0 (64 bit)
MySQL - 10.1.13-MariaDB : Database - attendance
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`attendance` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `attendance`;

/*Table structure for table `admin_information` */

DROP TABLE IF EXISTS `admin_information`;

CREATE TABLE `admin_information` (
  `UserID` int(20) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(30) DEFAULT NULL,
  `UserPassword` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `NewIndex1` (`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin_information` */

insert  into `admin_information`(`UserID`,`UserName`,`UserPassword`) values 
(1,'Admin','123');

/*Table structure for table `attendance` */

DROP TABLE IF EXISTS `attendance`;

CREATE TABLE `attendance` (
  `AttendanceID` int(15) NOT NULL AUTO_INCREMENT,
  `UserID` varchar(15) NOT NULL,
  `AttendanceDate` datetime NOT NULL,
  `Remarks` varchar(100) DEFAULT NULL,
  `LoginPerDay` int(20) NOT NULL,
  PRIMARY KEY (`AttendanceID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `attendance` */

insert  into `attendance`(`AttendanceID`,`UserID`,`AttendanceDate`,`Remarks`,`LoginPerDay`) values 
(1,'1','2014-11-12 08:50:43','',1),
(3,'1','2014-11-12 18:56:12','',2),
(4,'6','2014-11-13 10:35:24','',1);

/*Table structure for table `dept_information` */

DROP TABLE IF EXISTS `dept_information`;

CREATE TABLE `dept_information` (
  `UserID` int(20) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(30) DEFAULT NULL,
  `UserPassword` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `NewIndex1` (`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `dept_information` */

insert  into `dept_information`(`UserID`,`UserName`,`UserPassword`) values 
(1,'Administrator','SP Wave'),
(2,'Technical Officer','SP Wave'),
(3,'Web Developer','SP Wave');

/*Table structure for table `holiday_info` */

DROP TABLE IF EXISTS `holiday_info`;

CREATE TABLE `holiday_info` (
  `UserID` int(20) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(30) DEFAULT NULL,
  `UserPassword` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `NewIndex1` (`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `holiday_info` */

insert  into `holiday_info`(`UserID`,`UserName`,`UserPassword`) values 
(1,'Friday','Every friday holiday'),
(2,'Public Holiday','');

/*Table structure for table `user_information` */

DROP TABLE IF EXISTS `user_information`;

CREATE TABLE `user_information` (
  `UserID` int(15) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(30) DEFAULT NULL,
  `UserPassword` varchar(20) NOT NULL,
  `EmailAddress` varchar(25) DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `JoinDate` varchar(50) DEFAULT NULL,
  `Gender` varchar(15) DEFAULT NULL,
  `ContactNumber` varchar(11) NOT NULL,
  `SelectUserType` varchar(15) NOT NULL,
  `ImageName` varchar(50) DEFAULT NULL,
  `DepartmentType` varchar(15) NOT NULL,
  `DesignationType` varchar(25) DEFAULT NULL,
  `SalaryAmount` int(30) DEFAULT NULL,
  `MAC_Address` varchar(40) NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `NewIndex1` (`MAC_Address`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `user_information` */

insert  into `user_information`(`UserID`,`UserName`,`UserPassword`,`EmailAddress`,`Address`,`JoinDate`,`Gender`,`ContactNumber`,`SelectUserType`,`ImageName`,`DepartmentType`,`DesignationType`,`SalaryAmount`,`MAC_Address`) values 
(1,'Sayed Hossain','12345','sayed@gmail.com','Feni,Parashuram','10 November 2014','male','01843493021','4','2944','select-one','Web Developer',20000,'16B-ASD-12345-QW'),
(3,'Mashiur Rhaman','12345','mashiur@gmail.com','Feni,Bondua','10 November 2014','male','01843493021','4','2178','select-one','Web Developer',20000,'16B-ASD-12345-QQ'),
(4,'Abdul Hannan Sazid','12345','sazid@gmail.com','Feni,Fazilpur','10 November 2014','male','01843493021','4','2178','select-one','Software Engineer',20000,'16B-ASD-12345-QR'),
(5,'Kuddus Bulbul','12345','bulbul@gmail.com','Faridpur','10 November 2014','male','01843493021','4','18384','select-one','Web Designer',20000,'16B-ASD-12345-QT'),
(6,'Shapon Schisty','12345','shapon@gmail.com','Dhaka','10 November 2014','male','01843493021','4','9161','select-one','Web Developer',20000,'16B-ASD-12345-QY');

/*Table structure for table `user_type` */

DROP TABLE IF EXISTS `user_type`;

CREATE TABLE `user_type` (
  `UserTypeID` int(10) NOT NULL AUTO_INCREMENT,
  `UserTypeName` varchar(30) DEFAULT NULL,
  `StartTime` varchar(20) DEFAULT NULL,
  `EndTime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`UserTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `user_type` */

insert  into `user_type`(`UserTypeID`,`UserTypeName`,`StartTime`,`EndTime`) values 
(4,'Policy 1','09:00 am','06:00 pm'),
(5,'Policy 2','10:00 am','07:00 pm');

/*Table structure for table `year_planner` */

DROP TABLE IF EXISTS `year_planner`;

CREATE TABLE `year_planner` (
  `UserID` int(15) NOT NULL AUTO_INCREMENT,
  `EmailAddress` varchar(25) DEFAULT NULL,
  `Address` int(45) DEFAULT NULL,
  `JoinDate` varchar(50) DEFAULT NULL,
  `SelectUserType` varchar(15) NOT NULL,
  `DepartmentType` varchar(15) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `year_planner` */

insert  into `year_planner`(`UserID`,`EmailAddress`,`Address`,`JoinDate`,`SelectUserType`,`DepartmentType`) values 
(2,'',4,'11-11-2014','1','01'),
(3,'',2,'01-11-2014','2','04'),
(4,NULL,2,'07-11-2014','2','03');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
