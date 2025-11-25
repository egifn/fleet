/*
SQLyog Ultimate v11.33 (32 bit)
MySQL - 10.1.37-MariaDB : Database - tua_dev_fleet
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tua_dev_fleet` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tua_dev_fleet`;

/*Table structure for table `data_activities_log` */

DROP TABLE IF EXISTS `data_activities_log`;

CREATE TABLE `data_activities_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` text NOT NULL,
  `url` text NOT NULL,
  `method` text NOT NULL,
  `ip` text NOT NULL,
  `agent` text NOT NULL,
  `device` text NOT NULL,
  `browser` text NOT NULL,
  `platform` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4;

/*Data for the table `data_activities_log` */

insert  into `data_activities_log`(`id`,`subject`,`url`,`method`,`ip`,`agent`,`device`,`browser`,`platform`,`user_id`,`data`,`status`,`created_at`,`updated_at`) values (1,'update user','http://127.0.0.1:8000/app/administrator/users/update','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"name\":\"SECURITY DEPO METRO\",\"email\":\"sec.metro@dev.com\"}','success','2023-02-27 15:03:59','2023-02-27 15:03:59'),(2,'update user','http://127.0.0.1:8000/app/administrator/users/update','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"name\":\"SECURITY DEPO METRO\",\"email\":\"sec.depo.metro@dev.ttat\"}','success','2023-02-27 15:04:59','2023-02-27 15:04:59'),(3,'insert user','http://127.0.0.1:8000/app/administrator/users/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"name\":\"SECURITY DEPO TASIKMALAYA\",\"email\":\"sec.depo.tasikmalaya@dev.ttat\",\"roles\":\"Security Depo\",\"position\":\"NULL\",\"branch_id\":\"19\"}','success','2023-02-27 16:11:39','2023-02-27 16:11:39'),(4,'insert user','http://127.0.0.1:8000/app/administrator/users/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"name\":\"SECURITY DEPO PARUNG\",\"email\":\"sec.depo.parung@dev.ttat\",\"roles\":\"Security Depo\",\"position\":\"NULL\",\"branch_id\":\"14\"}','success','2023-02-27 22:21:25','2023-02-27 22:21:25'),(5,'checking document','http://127.0.0.1:8000/app/pool/security/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','WebKit','Chrome','Windows',912,'{\"branch_id\":\"2\",\"no_ref\":\"11706405\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}','success','2023-02-28 16:27:32','2023-02-28 16:27:32'),(6,'insert user','http://127.0.0.1:8000/app/administrator/users/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"name\":\"HRD DEV\",\"email\":\"hrd@dev.ttat\",\"roles\":\"HRD\",\"position\":\"NULL\",\"branch_id\":\"39\"}','success','2023-03-03 14:22:34','2023-03-03 14:22:34'),(7,'update data_branch','http://127.0.0.1:8000/app/administrator/ttat/branch/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"name_branch\":\"POOL HGS\",\"company_branch\":\"TUA\",\"longitude\":null,\"address_branch\":\"HGS\",\"type_branch\":\"POOL\"}','success','2023-03-09 15:51:52','2023-03-09 15:51:52'),(8,'update data_branch','http://127.0.0.1:8000/app/administrator/ttat/branch/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"name_branch\":\"POOL HGS\",\"company_branch\":\"HGS\",\"longitude\":null,\"address_branch\":\"-\",\"type_branch\":\"POOL\"}','success','2023-03-09 15:54:34','2023-03-09 15:54:34'),(9,'insert user','http://127.0.0.1:8000/app/administrator/users/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"name\":\"SECURITY DEPO CIANJUR\",\"email\":\"sec.depo.cianjur@dev.ttat\",\"roles\":\"Security Depo\",\"position\":\"NULL\",\"branch_id\":\"17\"}','success','2023-03-09 16:24:04','2023-03-09 16:24:04'),(10,'insert user','http://127.0.0.1:8000/app/administrator/users/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"name\":\"SECURITY KORDINATOR\",\"email\":\"sec.kordinator@dev.ttat\",\"roles\":\"Security HO\",\"position\":\"NULL\",\"branch_id\":\"39\"}','success','2023-03-09 16:33:49','2023-03-09 16:33:49'),(11,'checking document','http://127.0.0.1:8000/app/pool/security/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','WebKit','Chrome','Windows',912,'{\"branch_id\":\"2\",\"no_ref\":\"11320161\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}','success','2023-03-11 09:55:47','2023-03-11 09:55:47'),(12,'checking document','http://127.0.0.1:8000/app/pool/security/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','WebKit','Chrome','Windows',912,'{\"branch_id\":\"2\",\"no_ref\":\"11320161\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-OUT\"}','success','2023-03-13 15:46:40','2023-03-13 15:46:40'),(13,'checking document','http://127.0.0.1:8000/app/pool/security/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','WebKit','Chrome','Windows',912,'{\"branch_id\":\"2\",\"no_ref\":\"51220472\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}','success','2023-03-13 15:48:53','2023-03-13 15:48:53'),(14,'checking document','http://127.0.0.1:8000/app/pool/security/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','WebKit','Chrome','Windows',912,'{\"branch_id\":\"2\",\"no_ref\":\"11320161\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}','success','2023-03-13 16:10:05','2023-03-13 16:10:05'),(15,'checking document','http://127.0.0.1:8000/app/pool/security/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36','WebKit','Chrome','Windows',912,'{\"branch_id\":\"2\",\"no_ref\":\"44320161\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-OUT\"}','success','2023-03-13 16:13:26','2023-03-13 16:13:26'),(16,'checking document','http://127.0.0.1:8000/app/pool/security/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',912,'{\"branch_id\":\"2\",\"no_ref\":\"12302637\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}','success','2023-03-17 14:52:16','2023-03-17 14:52:16'),(17,'insert user','http://127.0.0.1:8000/app/administrator/users/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"name\":\"CHEKER\",\"email\":\"checker.depo.cianjur@dev.ttat\",\"roles\":\"Cheker\",\"position\":\"NULL\",\"branch_id\":\"17\"}','success','2023-03-21 13:36:18','2023-03-21 13:36:18'),(18,'checking document','http://127.0.0.1:8000/app/depo/checker/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',921,'{\"branch_id\":\"17\",\"no_ref\":\"902-0030355\",\"branch_company_id\":\"TU\"}','success','2023-03-21 14:34:15','2023-03-21 14:34:15'),(19,'checking document','http://127.0.0.1:8000/app/depo/checker/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',921,'{\"branch_id\":\"17\",\"no_ref\":\"902-0030355\",\"branch_company_id\":\"TU\"}','success','2023-03-21 14:34:19','2023-03-21 14:34:19'),(20,'checking document','http://127.0.0.1:8000/app/depo/checker/ttat/document/loading_truck','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',921,'{\"branch_id\":\"17\",\"no_ref\":\"902-0030355\",\"branch_company_id\":\"TU\"}','success','2023-03-21 14:34:24','2023-03-21 14:34:24'),(21,'checking document','http://127.0.0.1:8000/app/depo/checker/ttat/document/loading_truck','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',921,'{\"branch_id\":\"17\",\"no_ref\":\"902-0030355\",\"branch_company_id\":\"TU\"}','success','2023-03-21 14:34:29','2023-03-21 14:34:29'),(22,'checking document','http://127.0.0.1:8000/app/pool/security/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',912,'{\"branch_id\":\"2\",\"no_ref\":\"11146888\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}','success','2023-03-21 14:46:43','2023-03-21 14:46:43'),(23,'checking document','http://127.0.0.1:8000/app/pool/security/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',912,'{\"branch_id\":\"2\",\"no_ref\":\"11146884\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}','success','2023-03-21 14:46:56','2023-03-21 14:46:56'),(24,'checking document','http://127.0.0.1:8000/app/pool/security/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',912,'{\"branch_id\":\"2\",\"no_ref\":\"11146884\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}','success','2023-03-21 14:46:56','2023-03-21 14:46:56'),(25,'checking document','http://127.0.0.1:8000/app/pool/security/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',912,'{\"branch_id\":\"2\",\"no_ref\":\"31503966\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}','success','2023-03-21 14:47:33','2023-03-21 14:47:33'),(26,'checking document','http://127.0.0.1:8000/app/pool/security/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',912,'{\"branch_id\":\"2\",\"no_ref\":\"11146888\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-OUT\"}','success','2023-03-23 11:13:42','2023-03-23 11:13:42'),(27,'insert fleet_ekspedisi','http://127.0.0.1:8000/app/logistik/fleet/ekspedisi/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',911,'{\"nama_ekspedisi\":\"HGS\"}','success','2023-03-23 14:25:39','2023-03-23 14:25:39'),(28,'insert fleet_ekspedisi','http://127.0.0.1:8000/app/logistik/fleet/ekspedisi/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',911,'{\"nama_ekspedisi\":\"DLY\"}','success','2023-03-23 14:25:46','2023-03-23 14:25:46'),(29,'insert fleet_ekspedisi','http://127.0.0.1:8000/app/logistik/fleet/ekspedisi/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',911,'{\"nama_ekspedisi\":\"TUA\"}','success','2023-03-23 14:25:53','2023-03-23 14:25:53'),(30,'insert fleet','http://127.0.0.1:8000/app/logistik/fleet/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',911,'{\"no_pol\":\"X 0000 XX\",\"no_pol_lama\":\"-\",\"ekspedisi_id\":\"3\",\"sku\":\"-\",\"variant\":\"-\",\"status_fleet\":null}','success','2023-03-23 14:27:28','2023-03-23 14:27:28'),(31,'insert fleet','http://127.0.0.1:8000/app/logistik/fleet/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',911,'{\"no_pol\":\"X 0001 XX\",\"no_pol_lama\":\"-\",\"ekspedisi_id\":\"3\",\"sku\":\"-\",\"variant\":\"-\",\"status_fleet\":null}','success','2023-03-23 14:27:40','2023-03-23 14:27:40'),(32,'insert fleet','http://127.0.0.1:8000/app/logistik/fleet/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',911,'{\"no_pol\":\"X 0002 XX\",\"no_pol_lama\":\"-\",\"ekspedisi_id\":\"1\",\"sku\":\"-\",\"variant\":\"-\",\"status_fleet\":null}','success','2023-03-23 14:27:50','2023-03-23 14:27:50'),(33,'insert user','http://127.0.0.1:8000/app/administrator/users/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"name\":\"GUDANG\",\"email\":\"gudang@dev.ttat\",\"roles\":\"Gudang\",\"position\":\"NULL\",\"branch_id\":\"39\"}','success','2023-03-27 11:18:29','2023-03-27 11:18:29'),(34,'checking document','http://127.0.0.1:8000/app/pool/security/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',912,'{\"branch_id\":\"2\",\"no_ref\":\"11146888\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}','success','2023-03-27 14:39:21','2023-03-27 14:39:21'),(35,'checking document','http://127.0.0.1:8000/app/pool/security/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',912,'{\"branch_id\":\"2\",\"no_ref\":\"44320161\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-OUT\"}','success','2023-03-27 16:24:56','2023-03-27 16:24:56'),(36,'insert user','http://127.0.0.1:8000/app/administrator/users/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"name\":\"SECURITY POOL\",\"email\":\"sec.pool.dewan@dev.ttat\",\"roles\":\"Security Pool\",\"position\":\"NULL\",\"branch_id\":\"32\"}','success','2023-03-28 14:35:34','2023-03-28 14:35:34'),(37,'insert user','http://127.0.0.1:8000/app/administrator/users/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"name\":\"ADMIN POOL DEWAN\",\"email\":\"adm.pool.dewan@dev.ttat\",\"roles\":\"Admin Pool\",\"position\":\"NULL\",\"branch_id\":\"32\"}','success','2023-03-28 14:36:21','2023-03-28 14:36:21'),(38,'checking document','http://127.0.0.1:8000/app/pool/security/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',923,'{\"branch_id\":\"32\",\"no_ref\":\"12106933\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}','success','2023-03-28 14:36:47','2023-03-28 14:36:47'),(39,'checking document','http://127.0.0.1:8000/app/pool/security/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',923,'{\"branch_id\":\"32\",\"no_ref\":\"12106933\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-OUT\"}','success','2023-03-28 14:37:50','2023-03-28 14:37:50'),(40,'checking document','http://127.0.0.1:8000/app/pool/security/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',923,'{\"branch_id\":\"32\",\"no_ref\":\"12106933\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}','success','2023-03-28 14:39:11','2023-03-28 14:39:11'),(41,'checking document','http://127.0.0.1:8000/app/pool/security/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',923,'{\"branch_id\":\"32\",\"no_ref\":\"12106933\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-OUT\"}','success','2023-03-28 14:44:54','2023-03-28 14:44:54'),(42,'checking document','http://127.0.0.1:8000/app/pool/security/ttat/document/checking','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',912,'{\"branch_id\":\"2\",\"no_ref\":\"12107039\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}','success','2023-03-28 15:53:11','2023-03-28 15:53:11'),(43,'update data_company_identity','http://127.0.0.1:8000/app/administrator/company-identity/update','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"company_name\":\"TUA GROUP\",\"address\":\"Jl. Soekarno-Hatta No.608, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286\",\"phone\":\"0853700000000\",\"email\":\"waternetcore@gmail.com\",\"logo\":null}','success','2023-04-03 18:58:08','2023-04-03 18:58:08'),(44,'update data_company_identity','http://127.0.0.1:8000/app/administrator/company-identity/update','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"company_name\":\"TUA GROUP\",\"address\":\"Jl. Soekarno-Hatta No.608, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286\",\"phone\":\"-\",\"email\":\"waternetcore@gmail.com\",\"logo\":null}','success','2023-04-03 18:58:16','2023-04-03 18:58:16'),(45,'update Config_app','http://127.0.0.1:8000/app/administrator/set/config-app/update','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"id\":null,\"app_name\":\"SETTEMENT DMS APP\",\"code_activation\":null,\"app_description\":\"SETTEMENT DMS APP\",\"app_keyword\":\"-\",\"app_author\":\"IT TUA DEVELOPMENT\",\"app_logo\":null,\"update_at\":null}','success','2023-04-03 18:58:49','2023-04-03 18:58:49'),(46,'delete branch','http://127.0.0.1:8000/app/administrator/admin/branch/delete/36?id=delitems','GET','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"id\":36,\"code_branch\":null,\"name_branch\":\"TA CIPERNA\",\"company_branch\":\"TA\",\"langitude\":null,\"longitude\":null,\"address_branch\":\"Jawa Barat, Indonesia\",\"type_branch\":\"DEPO\",\"created_at\":\"2022-02-27 17:40:04\",\"updated_at\":\"2023-03-21 10:57:42\"}','success','2023-05-02 11:13:13','2023-05-02 11:13:13'),(47,'delete branch','http://127.0.0.1:8000/app/administrator/admin/branch/delete/34?id=delitems','GET','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"id\":34,\"code_branch\":null,\"name_branch\":\"TUA SADAKELING 2\",\"company_branch\":\"TUA\",\"langitude\":null,\"longitude\":null,\"address_branch\":\"Jawa Barat, Indonesia\",\"type_branch\":\"DEPO\",\"created_at\":\"2022-02-27 17:03:16\",\"updated_at\":\"2023-03-21 10:57:47\"}','success','2023-05-02 11:13:30','2023-05-02 11:13:30'),(48,'delete branch','http://127.0.0.1:8000/app/administrator/admin/branch/delete/38?id=delitems','GET','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"id\":38,\"code_branch\":null,\"name_branch\":\"TUA KOPO\",\"company_branch\":\"TUA\",\"langitude\":null,\"longitude\":null,\"address_branch\":\"Jawa Barat, Indonesia\",\"type_branch\":\"DEPO\",\"created_at\":\"2022-03-02 13:34:30\",\"updated_at\":\"2023-03-21 10:58:03\"}','success','2023-05-02 11:13:37','2023-05-02 11:13:37'),(49,'delete branch','http://127.0.0.1:8000/app/administrator/admin/branch/delete/39?id=delitems','GET','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"id\":39,\"code_branch\":null,\"name_branch\":\"HEAD OFFICE (HO)\",\"company_branch\":\"TUA\",\"langitude\":null,\"longitude\":null,\"address_branch\":\"Jl. Soekarno Hatta No.608, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286\",\"type_branch\":\"HO\",\"created_at\":\"2022-08-24 12:35:30\",\"updated_at\":\"2022-08-24 12:35:30\"}','success','2023-05-02 11:18:39','2023-05-02 11:18:39'),(50,'update data_branch','http://127.0.0.1:8000/app/administrator/admin/branch/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"name_branch\":\"HO (HEAD OFFICE)\",\"company_branch\":\"TUA\",\"longitude\":null,\"address_branch\":\"Jl. Soekarno Hatta No.608 E, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40256\",\"type_branch\":\"HO\"}','success','2023-05-02 16:56:04','2023-05-02 16:56:04'),(51,'update data_branch','http://127.0.0.1:8000/app/administrator/admin/branch/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"name_branch\":\"aaa\",\"company_branch\":\"TUA\",\"longitude\":null,\"address_branch\":\"asdas\",\"type_branch\":\"DEPO\"}','success','2023-05-02 17:21:56','2023-05-02 17:21:56'),(52,'update data_branch','http://127.0.0.1:8000/app/administrator/admin/branch/update','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"name_branch\":\"aaa777\",\"company_branch\":\"TU\",\"longitude\":null,\"address_branch\":\"asdas\",\"type_branch\":\"DEPO\"}','success','2023-05-02 17:23:39','2023-05-02 17:23:39'),(53,'delete branch','http://127.0.0.1:8000/app/administrator/admin/branch/delete/45?id=delitems','GET','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"id\":45,\"code_branch\":null,\"name_branch\":\"aaa777\",\"company_branch\":\"TU\",\"langitude\":null,\"longitude\":null,\"address_branch\":\"asdas\",\"type_branch\":\"DEPO\",\"created_at\":\"2023-05-02 17:21:56\",\"updated_at\":\"2023-05-02 17:23:39\"}','success','2023-05-02 17:23:44','2023-05-02 17:23:44'),(54,'update user','http://127.0.0.1:8000/app/administrator/users/update','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"name\":\"BOD\",\"email\":\"bod@dev.st\"}','success','2023-05-02 17:27:05','2023-05-02 17:27:05'),(55,'update user','http://127.0.0.1:8000/app/administrator/users/update','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"name\":\"SND SALES MANAGER\",\"email\":\"snd_sm@dev.st\"}','success','2023-05-02 17:37:10','2023-05-02 17:37:10'),(56,'update data_segmen','http://localhost:8089/app/administrator/admin/segmen/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"nama_segmen\":\"AHS\",\"keterangan\":\"-\"}','success','2024-01-17 11:26:36','2024-01-17 11:26:36'),(57,'update data_segmen','http://localhost:8089/app/administrator/admin/segmen/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"nama_segmen\":\"Retail\",\"keterangan\":\"-\"}','success','2024-01-17 11:27:15','2024-01-17 11:27:15'),(58,'update data_segmen','http://localhost:8089/app/administrator/admin/segmen/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"nama_segmen\":\"MT BKL\",\"keterangan\":\"-\"}','success','2024-01-17 11:28:20','2024-01-17 11:28:20'),(59,'update data_segmen','http://localhost:8089/app/administrator/admin/segmen/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"nama_segmen\":\"Logistik\",\"keterangan\":\"-\"}','success','2024-01-17 11:28:31','2024-01-17 11:28:31'),(60,'update data_kendaraan','http://localhost:8089/app/administrator/admin/kendaraan/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"no_polisi\":\"D 1148 WD\",\"no_rangka\":\"11298239\",\"no_mesin\":\"12129238\",\"nama_pemilik\":\"PT.Tirta Utama Abadi\",\"merek\":\"HINO\",\"type\":\"Engkel\",\"rasio_ideal\":\"-\",\"model\":\"Krangkeng\",\"tahun\":\"2002\",\"warna\":\"Coklat\",\"kapasitas_mesin\":\"1000\",\"kategori\":\"Secondary\",\"penempatan\":\"902\",\"id_segmen\":\"1\",\"perusahaan\":\"TUA\",\"status_kendaraan\":\"Aktif\",\"status_kepemilikan\":\"Hak Milik\",\"keterangan\":\"Tidak dipakai\"}','success','2024-01-17 13:30:48','2024-01-17 13:30:48'),(61,'update data_vendor','http://localhost:8089/app/administrator/admin/vendor/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"kode_vendor\":\"000002\",\"nama_vendor\":\"PT. Baru Sejahtera\",\"alamat\":\"Jl. Soekarno Hatta No. 417\",\"telepon\":\"0229984\",\"email\":\"coba@yahoo.com\"}','success','2024-01-17 13:33:18','2024-01-17 13:33:18'),(62,'update data_segmen_produk','http://localhost:8089/app/administrator/admin/segmen_produk/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"id_segmen\":\"1\",\"branch_id\":\"902\",\"jenis\":\"Jugs\",\"harga\":\"500\"}','success','2024-01-17 13:33:54','2024-01-17 13:33:54'),(63,'update data_segmen_kendaraan','http://localhost:8089/app/administrator/admin/segmen_kendaraan/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"nama_segmen_ken\":\"Dedicated TUA\",\"keterangan\":\"-\"}','success','2024-01-17 13:35:18','2024-01-17 13:35:18'),(64,'update data_ritase','http://localhost:8089/app/administrator/admin/ritase/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"id_segmen_rit\":\"1\",\"ritase\":\"2\",\"vol_ideal\":\"1500\"}','success','2024-01-17 13:42:49','2024-01-17 13:42:49'),(65,'update data_kendaraan','http://localhost:8089/app/administrator/admin/kendaraan/insert','POST','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36','WebKit','Chrome','Windows',28,'{\"no_polisi\":\"D 1149 DD\",\"no_rangka\":\"11298299\",\"no_mesin\":\"12129245\",\"nama_pemilik\":\"PT.Tirta Utama Abadi\",\"merek\":\"HINO\",\"type\":\"Engkel\",\"rasio_ideal\":\"-\",\"model\":\"Box\",\"tahun\":\"2002\",\"warna\":\"Coklat\",\"kapasitas_mesin\":\"1000\",\"kategori\":\"Secondary\",\"penempatan\":\"029\",\"id_segmen\":\"3\",\"perusahaan\":\"TUA\",\"status_kendaraan\":\"Tidak Aktif\",\"status_kepemilikan\":\"Hak Milik\",\"keterangan\":\"-\"}','success','2024-01-17 16:27:07','2024-01-17 16:27:07');

/*Table structure for table `data_company_identity` */

DROP TABLE IF EXISTS `data_company_identity`;

CREATE TABLE `data_company_identity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `address` text,
  `phone` text,
  `email` text,
  `logo` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

/*Data for the table `data_company_identity` */

insert  into `data_company_identity`(`id`,`company_name`,`address`,`phone`,`email`,`logo`) values (28,'TUA GROUP','Jl. Soekarno-Hatta No.608, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286','-','waternetcore@gmail.com',NULL);

/*Table structure for table `data_config_app` */

DROP TABLE IF EXISTS `data_config_app`;

CREATE TABLE `data_config_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_name` varchar(100) NOT NULL,
  `code_activation` varchar(100) DEFAULT NULL,
  `app_description` varchar(100) DEFAULT NULL,
  `app_keyword` varchar(100) DEFAULT NULL,
  `app_author` varchar(100) DEFAULT NULL,
  `app_logo` varchar(100) DEFAULT NULL,
  `update_at` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

/*Data for the table `data_config_app` */

insert  into `data_config_app`(`id`,`app_name`,`code_activation`,`app_description`,`app_keyword`,`app_author`,`app_logo`,`update_at`) values (28,'SETTEMENT DMS APP',NULL,'SETTEMENT DMS APP','-','IT TUA DEVELOPMENT',NULL,NULL);

/*Table structure for table `dt_bbm` */

DROP TABLE IF EXISTS `dt_bbm`;

CREATE TABLE `dt_bbm` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jenis_bbm` varchar(30) NOT NULL,
  `harga_perliter` int(11) NOT NULL DEFAULT '0',
  `id_user_input` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `dt_bbm` */

insert  into `dt_bbm`(`id`,`jenis_bbm`,`harga_perliter`,`id_user_input`,`created_at`,`updated_at`) values (1,'Bio Solar',6800,NULL,'2024-01-17 15:33:42','2024-01-17 15:33:45'),(2,'Pertalite',10000,NULL,'2024-01-17 15:34:06','2024-01-17 15:34:09'),(3,'Pertamax',13350,NULL,'2024-01-17 15:34:28','2024-01-17 15:34:31'),(4,'Dexlite',15550,NULL,'2024-01-17 15:34:57','2024-01-17 15:35:00'),(5,'Solar',6500,NULL,'2024-01-17 16:29:27','2024-01-17 16:29:30');

/*Table structure for table `dt_branch` */

DROP TABLE IF EXISTS `dt_branch`;

CREATE TABLE `dt_branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_branch` varchar(50) DEFAULT NULL,
  `name_branch` varchar(100) NOT NULL,
  `company_branch` varchar(100) NOT NULL,
  `langitude` text,
  `longitude` text,
  `address_branch` text,
  `type_branch` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

/*Data for the table `dt_branch` */

insert  into `dt_branch`(`id`,`code_branch`,`name_branch`,`company_branch`,`langitude`,`longitude`,`address_branch`,`type_branch`,`created_at`,`updated_at`) values (3,'914','TUA SOREANG','TUA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(4,'900','TUA SADAKELING','TUA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(5,'343','TUA PADALARANG','TUA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(6,'902','TUA METRO','TUA','\n','\n','Jl. Soekarno Hatta No.608, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286','DEPO','2022-02-27 09:33:29','2023-03-21 11:38:28'),(7,'030','TUA MAJALAYA','TUA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2023-03-21 11:07:34'),(8,'029','TUA LEMBANG','TUA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2023-03-21 11:07:34'),(9,'904','TUA KATAPANG','TUA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(10,'344','TUA KASOMALANG','TUA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(11,'912','TUA CICALENGKA','TUA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(12,'906','TU SUKABUMI','TU','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(13,'915','TU SENTUL','TU','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(14,'901','TU PARUNG','TU','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(15,'918','TU JONGGOL','TU','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(16,'342','TU CITEUREUP','TU','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(17,'911','TU CIANJUR','TU',NULL,NULL,'Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2023-03-21 11:07:34'),(18,'337','TU BOGOR','TU','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(19,'032','TA TASIKMALAYA','TA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2023-03-21 11:07:34'),(20,'335','TA PURWAKARTA','TA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(21,'033','TA PENGGUNG','TA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2023-03-21 11:07:34'),(22,'031','TA PANGANDARAN','TA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2023-03-21 11:07:34'),(23,'908','TA PAMANUKAN','TA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(24,'920','TA MAJALENGKA','TA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(25,'036','TA KUNINGAN','TA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2023-03-21 11:07:34'),(26,'341','TA KANCI','TA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(27,'910','TA JATISARI','TA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(28,'919','TA JATIBARANG','TA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(29,'917','TA GARUT','TA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(30,'916','TA BANJARSARI','TA','\n','\n','Jawa Barat, Indonesia','DEPO','2022-02-27 09:33:29','2022-02-27 09:33:29'),(35,'907','TUA LODAYA','TUA',NULL,NULL,'Jawa Barat, Indonesia','DEPO','2022-02-27 17:03:36','2023-03-21 11:07:34'),(37,'030','TUA MAJALAYA','TUA',NULL,NULL,'Jawa Barat, Indonesia','DEPO','2022-02-27 18:12:00','2023-03-21 11:07:34'),(40,'021','TU PELABUHAN RATU','TU',NULL,NULL,'Jawa Barat, Indonesia','DEPO','2022-08-24 17:30:01','2023-03-21 11:07:34'),(41,'930','TUA SUMEDANG','TUA',NULL,NULL,'Jawa Barat, Indonesia','DEPO','2022-10-13 12:59:50','2023-03-21 11:07:34'),(44,NULL,'HO (HEAD OFFICE)','TUA',NULL,NULL,'Jl. Soekarno Hatta No.608 E, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40256','HO','2023-05-02 16:56:04','2023-05-02 16:56:04');

/*Table structure for table `dt_kendaraan` */

DROP TABLE IF EXISTS `dt_kendaraan`;

CREATE TABLE `dt_kendaraan` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_polisi` varchar(25) DEFAULT NULL,
  `no_rangka` varchar(50) DEFAULT NULL,
  `no_mesin` varchar(50) DEFAULT NULL,
  `nama_pemilik` varchar(50) DEFAULT NULL,
  `merek` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `rasio_ideal` varchar(30) DEFAULT NULL,
  `model` varchar(30) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `warna` varchar(30) DEFAULT NULL,
  `kapasitas_mesin` int(11) DEFAULT NULL,
  `kategori` varchar(30) DEFAULT NULL,
  `penempatan` varchar(50) DEFAULT NULL,
  `name_branch` varchar(30) DEFAULT NULL,
  `perusahaan` varchar(30) DEFAULT NULL,
  `id_segmen` varchar(30) DEFAULT NULL,
  `nama_segmen` varchar(30) DEFAULT NULL,
  `status_kendaraan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_kepemilikan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `id_user_input` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `dt_kendaraan` */

insert  into `dt_kendaraan`(`id`,`no_polisi`,`no_rangka`,`no_mesin`,`nama_pemilik`,`merek`,`type`,`rasio_ideal`,`model`,`tahun`,`warna`,`kapasitas_mesin`,`kategori`,`penempatan`,`name_branch`,`perusahaan`,`id_segmen`,`nama_segmen`,`status_kendaraan`,`status_kepemilikan`,`keterangan`,`id_user_input`,`created_at`,`updated_at`) values (1,'D 1148 WD','11298239','12129238','PT.Tirta Utama Abadi','HINO','Engkel','-','Krangkeng',2002,'Coklat',1000,'Secondary','902',NULL,'TUA','1',NULL,'Aktif','Hak Milik','Tidak dipakai',NULL,'2024-01-17 13:30:48','2024-01-17 13:30:48'),(2,'D 1149 DD','11298299','12129245','PT.Tirta Utama Abadi','HINO','Engkel','-','Box',2002,'Coklat',1000,'Secondary','029',NULL,'TUA','3',NULL,'Tidak Aktif','Hak Milik','-',NULL,'2024-01-17 16:27:07','2024-01-17 16:27:07');

/*Table structure for table `dt_kendaraan_kategori` */

DROP TABLE IF EXISTS `dt_kendaraan_kategori`;

CREATE TABLE `dt_kendaraan_kategori` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_polisi` varchar(25) DEFAULT NULL,
  `id_segmen` varchar(30) DEFAULT NULL,
  `id_segmen_kendaraan` varchar(20) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `muatan` int(11) DEFAULT NULL,
  `kapasitas_muatan` int(11) DEFAULT NULL,
  `id_user_input` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `dt_kendaraan_kategori` */

insert  into `dt_kendaraan_kategori`(`id`,`no_polisi`,`id_segmen`,`id_segmen_kendaraan`,`kategori`,`muatan`,`kapasitas_muatan`,`id_user_input`,`created_at`,`updated_at`) values (1,'D 1148 WD','1','1','Jugs',720,720,NULL,'2024-01-17 13:55:04','2024-01-17 13:55:08');

/*Table structure for table `dt_kendaraan_surat` */

DROP TABLE IF EXISTS `dt_kendaraan_surat`;

CREATE TABLE `dt_kendaraan_surat` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_polisi` varchar(30) DEFAULT NULL,
  `no_stnk` varchar(50) DEFAULT NULL,
  `bulan_exp_stnk` varchar(20) DEFAULT NULL,
  `tgl_pajak_stnk` date DEFAULT NULL,
  `tgl_baru_stnk` date DEFAULT NULL,
  `status_dokumen_stnk` char(1) DEFAULT '0',
  `bulan_no_kir_1` varchar(30) DEFAULT NULL,
  `bulan_no_kir_2` varchar(30) DEFAULT NULL,
  `masa_berlaku_kir` date DEFAULT NULL,
  `id_user_input` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `dt_kendaraan_surat` */

/*Table structure for table `dt_ritase` */

DROP TABLE IF EXISTS `dt_ritase`;

CREATE TABLE `dt_ritase` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_segmen_rit` bigint(20) DEFAULT NULL,
  `ritase` int(11) DEFAULT NULL,
  `vol_ideal` int(11) DEFAULT NULL,
  `id_user_input` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `dt_ritase` */

insert  into `dt_ritase`(`id`,`id_segmen_rit`,`ritase`,`vol_ideal`,`id_user_input`,`created_at`,`updated_at`) values (1,1,2,1500,NULL,'2024-01-17 13:42:49','2024-01-17 13:42:49');

/*Table structure for table `dt_segmen` */

DROP TABLE IF EXISTS `dt_segmen`;

CREATE TABLE `dt_segmen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_segmen` varchar(30) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `id_user_input` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `dt_segmen` */

insert  into `dt_segmen`(`id`,`nama_segmen`,`keterangan`,`id_user_input`,`created_at`,`updated_at`) values (1,'AHS','-',NULL,'2024-01-17 11:26:36','2024-01-17 11:26:36'),(2,'Retail','-',NULL,'2024-01-17 11:27:14','2024-01-17 11:27:14'),(3,'MT BKL','-',NULL,'2024-01-17 11:28:20','2024-01-17 11:28:20'),(4,'Logistik','-',NULL,'2024-01-17 11:28:31','2024-01-17 11:28:31');

/*Table structure for table `dt_segmen_kendaraan` */

DROP TABLE IF EXISTS `dt_segmen_kendaraan`;

CREATE TABLE `dt_segmen_kendaraan` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama_segmen_kendaraan` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `id_user_input` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `dt_segmen_kendaraan` */

insert  into `dt_segmen_kendaraan`(`id`,`nama_segmen_kendaraan`,`keterangan`,`id_user_input`,`created_at`,`updated_at`) values (1,'Dedicated TUA','-',NULL,'2024-01-17 13:35:18','2024-01-17 13:35:18');

/*Table structure for table `dt_segmen_produk` */

DROP TABLE IF EXISTS `dt_segmen_produk`;

CREATE TABLE `dt_segmen_produk` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_segmen` varchar(30) NOT NULL,
  `code_branch` varchar(50) DEFAULT NULL,
  `jenis` varchar(30) DEFAULT NULL,
  `jasa_harga` bigint(20) DEFAULT NULL,
  `id_user_input` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `dt_segmen_produk` */

insert  into `dt_segmen_produk`(`id`,`id_segmen`,`code_branch`,`jenis`,`jasa_harga`,`id_user_input`,`created_at`,`updated_at`) values (1,'1','902','Jugs',500,NULL,'2024-01-17 13:33:54','2024-01-17 13:33:54');

/*Table structure for table `dt_tr_bbm` */

DROP TABLE IF EXISTS `dt_tr_bbm`;

CREATE TABLE `dt_tr_bbm` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode_bbm` varchar(30) DEFAULT NULL,
  `tanggal_bbm` date DEFAULT NULL,
  `waktu_bbm` time DEFAULT NULL,
  `no_polisi` varchar(30) DEFAULT NULL,
  `code_branch` varchar(30) DEFAULT NULL,
  `perusahaan` varchar(30) DEFAULT NULL,
  `week` varchar(30) DEFAULT NULL,
  `salesman` varchar(50) DEFAULT NULL,
  `segmen` varchar(30) DEFAULT NULL,
  `tipe` varchar(30) DEFAULT NULL,
  `jenis_bbm` varchar(20) DEFAULT NULL,
  `harga_perliter` bigint(20) DEFAULT NULL,
  `liter_qty` int(11) DEFAULT NULL,
  `biaya_bbm` bigint(20) DEFAULT NULL,
  `kilometer` int(11) DEFAULT NULL,
  `keterangan_bbm` varchar(100) DEFAULT NULL,
  `id_user_input` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `dt_tr_bbm` */

/*Table structure for table `dt_tr_sparepart` */

DROP TABLE IF EXISTS `dt_tr_sparepart`;

CREATE TABLE `dt_tr_sparepart` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode` varchar(30) DEFAULT NULL,
  `tanggal` time DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `no_polisi` varchar(30) DEFAULT NULL,
  `code_branch` varchar(30) DEFAULT NULL,
  `perusahaan` varchar(20) DEFAULT NULL,
  `week` varchar(20) DEFAULT NULL,
  `salesman` varchar(50) DEFAULT NULL,
  `jenis` varchar(30) DEFAULT NULL,
  `segmen` varchar(30) DEFAULT NULL,
  `tipe` varchar(30) DEFAULT NULL,
  `kilometer` int(11) DEFAULT NULL,
  `ratio_actual` decimal(10,0) DEFAULT NULL,
  `ratio_ideal` decimal(10,0) DEFAULT NULL,
  `biaya_sparepart` bigint(20) DEFAULT NULL,
  `keterangan_sparepart` varchar(100) DEFAULT NULL,
  `id_user_input` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `dt_tr_sparepart` */

/*Table structure for table `dt_tr_stnk` */

DROP TABLE IF EXISTS `dt_tr_stnk`;

CREATE TABLE `dt_tr_stnk` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode_stnk` varchar(30) DEFAULT NULL,
  `tanggal_stnk` date DEFAULT NULL,
  `waktu_stnk` time DEFAULT NULL,
  `no_polisi` varchar(30) DEFAULT NULL,
  `code_branch` varchar(30) DEFAULT NULL,
  `perusahaan` varchar(30) DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `segmen` varchar(20) DEFAULT NULL,
  `tipe` varchar(20) DEFAULT NULL,
  `no_rangka` varchar(30) DEFAULT NULL,
  `no_mesin` varchar(30) DEFAULT NULL,
  `bulan_exp_stnk` varchar(20) DEFAULT NULL,
  `tgl_pajak_stnk` date DEFAULT NULL,
  `biaya_stnk` bigint(20) DEFAULT NULL,
  `id_user_input` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `dt_tr_stnk` */

/*Table structure for table `dt_tr_utilitas` */

DROP TABLE IF EXISTS `dt_tr_utilitas`;

CREATE TABLE `dt_tr_utilitas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode_utilitas` varchar(30) DEFAULT NULL,
  `tanggal_utilitas` date DEFAULT NULL,
  `waktu_utilitas` time DEFAULT NULL,
  `no_polisi` varchar(30) DEFAULT NULL,
  `code_branch` varchar(50) DEFAULT NULL,
  `nama_branch` varchar(50) DEFAULT NULL,
  `perusahaan` varchar(30) DEFAULT NULL,
  `salesman` varchar(50) DEFAULT NULL,
  `week` varchar(30) DEFAULT NULL,
  `jugs_sps` varchar(30) DEFAULT NULL,
  `segmen` varchar(30) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `ritase_real` int(11) DEFAULT NULL,
  `ritase_ideal_perhari` int(11) DEFAULT NULL,
  `ritase_real_perhari` int(11) DEFAULT NULL,
  `lost_ritase` int(11) DEFAULT NULL,
  `lost_volume` int(11) DEFAULT NULL,
  `volume_ideal` int(11) DEFAULT NULL,
  `volume_penjualan_real` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `id_user_input` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `dt_tr_utilitas` */

insert  into `dt_tr_utilitas`(`id`,`kode_utilitas`,`tanggal_utilitas`,`waktu_utilitas`,`no_polisi`,`code_branch`,`nama_branch`,`perusahaan`,`salesman`,`week`,`jugs_sps`,`segmen`,`kapasitas`,`ritase_real`,`ritase_ideal_perhari`,`ritase_real_perhari`,`lost_ritase`,`lost_volume`,`volume_ideal`,`volume_penjualan_real`,`keterangan`,`id_user_input`,`created_at`,`updated_at`) values (1,'UT-1701240001','2024-01-17','15:06:10','D 1148 WD','902',NULL,'TUA','vacant','1','Jugs','AHS',720,1,2,2,0,0,1440,1500,'-',28,'2024-01-17 15:06:10','2024-01-17 15:06:10');

/*Table structure for table `dt_vendor` */

DROP TABLE IF EXISTS `dt_vendor`;

CREATE TABLE `dt_vendor` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode_vendor` varchar(30) NOT NULL,
  `nama_vendor` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_user_input` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `dt_vendor` */

insert  into `dt_vendor`(`id`,`kode_vendor`,`nama_vendor`,`alamat`,`telepon`,`email`,`id_user_input`,`created_at`,`updated_at`) values (1,'000002','PT. Baru Sejahtera','Jl. Soekarno Hatta No. 417','0229984','coba@yahoo.com',NULL,'2024-01-17 13:33:18','2024-01-17 13:33:18');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL,
  `code_employee` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci,
  `status_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`code_employee`,`name`,`email`,`email_verified_at`,`password`,`roles`,`position`,`branch_id`,`provider`,`provider_id`,`avatar`,`status_account`,`remember_token`,`last_login`,`created_at`,`updated_at`) values (28,NULL,'admin','admin@localhost.com',NULL,'$2y$10$Zw7bmO4gSEgA2XBAPzm43OSCEs0kJ11sEHwwyj4ZB5N3jbHRP4uU2','Superadmin',NULL,NULL,NULL,NULL,NULL,'Aktif',NULL,'2024-01-17 10:54:11','2021-12-15 10:17:08','2024-01-17 10:54:11');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
