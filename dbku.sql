/*
SQLyog Enterprise v12.5.1 (64 bit)
MySQL - 10.1.30-MariaDB : Database - dbpelatihanweb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `mhs` */

DROP TABLE IF EXISTS `mhs`;

CREATE TABLE `mhs` (
  `nim` varchar(10) NOT NULL,
  `namamahasiswa` varchar(100) DEFAULT NULL,
  `tempatlahir` varbinary(100) DEFAULT NULL,
  `tanggallahir` date DEFAULT NULL,
  `jeniskelamin` char(1) DEFAULT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mhs` */

insert  into `mhs`(`nim`,`namamahasiswa`,`tempatlahir`,`tanggallahir`,`jeniskelamin`) values 
('123456','Mahasiswa A','Padang','1990-10-10','L'),
('123457','Mahasiswa B','SOLOK','1990-10-11','L'),
('123458','Mahasiswa C','KAB.SOLOK','1990-10-12','P'),
('123459','Mahasiswa D','PADANG','1990-10-13','L');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
