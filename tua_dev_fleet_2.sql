-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2025 at 09:19 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tua_dev_fleet_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_activities_log`
--

CREATE TABLE `data_activities_log` (
  `id` int NOT NULL,
  `subject` text NOT NULL,
  `url` text NOT NULL,
  `method` text NOT NULL,
  `ip` text NOT NULL,
  `agent` text NOT NULL,
  `device` text NOT NULL,
  `browser` text NOT NULL,
  `platform` text NOT NULL,
  `user_id` int NOT NULL,
  `data` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `data_activities_log`
--

INSERT INTO `data_activities_log` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `device`, `browser`, `platform`, `user_id`, `data`, `status`, `created_at`, `updated_at`) VALUES
(1, 'update user', 'http://127.0.0.1:8000/app/administrator/users/update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"name\":\"SECURITY DEPO METRO\",\"email\":\"sec.metro@dev.com\"}', 'success', '2023-02-27 08:03:59', '2023-02-27 08:03:59'),
(2, 'update user', 'http://127.0.0.1:8000/app/administrator/users/update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"name\":\"SECURITY DEPO METRO\",\"email\":\"sec.depo.metro@dev.ttat\"}', 'success', '2023-02-27 08:04:59', '2023-02-27 08:04:59'),
(3, 'insert user', 'http://127.0.0.1:8000/app/administrator/users/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"name\":\"SECURITY DEPO TASIKMALAYA\",\"email\":\"sec.depo.tasikmalaya@dev.ttat\",\"roles\":\"Security Depo\",\"position\":\"NULL\",\"branch_id\":\"19\"}', 'success', '2023-02-27 09:11:39', '2023-02-27 09:11:39'),
(4, 'insert user', 'http://127.0.0.1:8000/app/administrator/users/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"name\":\"SECURITY DEPO PARUNG\",\"email\":\"sec.depo.parung@dev.ttat\",\"roles\":\"Security Depo\",\"position\":\"NULL\",\"branch_id\":\"14\"}', 'success', '2023-02-27 15:21:25', '2023-02-27 15:21:25'),
(5, 'checking document', 'http://127.0.0.1:8000/app/pool/security/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 912, '{\"branch_id\":\"2\",\"no_ref\":\"11706405\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}', 'success', '2023-02-28 09:27:32', '2023-02-28 09:27:32'),
(6, 'insert user', 'http://127.0.0.1:8000/app/administrator/users/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"name\":\"HRD DEV\",\"email\":\"hrd@dev.ttat\",\"roles\":\"HRD\",\"position\":\"NULL\",\"branch_id\":\"39\"}', 'success', '2023-03-03 07:22:34', '2023-03-03 07:22:34'),
(7, 'update data_branch', 'http://127.0.0.1:8000/app/administrator/ttat/branch/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"name_branch\":\"POOL HGS\",\"company_branch\":\"TUA\",\"longitude\":null,\"address_branch\":\"HGS\",\"type_branch\":\"POOL\"}', 'success', '2023-03-09 08:51:52', '2023-03-09 08:51:52'),
(8, 'update data_branch', 'http://127.0.0.1:8000/app/administrator/ttat/branch/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"name_branch\":\"POOL HGS\",\"company_branch\":\"HGS\",\"longitude\":null,\"address_branch\":\"-\",\"type_branch\":\"POOL\"}', 'success', '2023-03-09 08:54:34', '2023-03-09 08:54:34'),
(9, 'insert user', 'http://127.0.0.1:8000/app/administrator/users/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"name\":\"SECURITY DEPO CIANJUR\",\"email\":\"sec.depo.cianjur@dev.ttat\",\"roles\":\"Security Depo\",\"position\":\"NULL\",\"branch_id\":\"17\"}', 'success', '2023-03-09 09:24:04', '2023-03-09 09:24:04'),
(10, 'insert user', 'http://127.0.0.1:8000/app/administrator/users/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"name\":\"SECURITY KORDINATOR\",\"email\":\"sec.kordinator@dev.ttat\",\"roles\":\"Security HO\",\"position\":\"NULL\",\"branch_id\":\"39\"}', 'success', '2023-03-09 09:33:49', '2023-03-09 09:33:49'),
(11, 'checking document', 'http://127.0.0.1:8000/app/pool/security/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 912, '{\"branch_id\":\"2\",\"no_ref\":\"11320161\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}', 'success', '2023-03-11 02:55:47', '2023-03-11 02:55:47'),
(12, 'checking document', 'http://127.0.0.1:8000/app/pool/security/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 912, '{\"branch_id\":\"2\",\"no_ref\":\"11320161\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-OUT\"}', 'success', '2023-03-13 08:46:40', '2023-03-13 08:46:40'),
(13, 'checking document', 'http://127.0.0.1:8000/app/pool/security/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 912, '{\"branch_id\":\"2\",\"no_ref\":\"51220472\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}', 'success', '2023-03-13 08:48:53', '2023-03-13 08:48:53'),
(14, 'checking document', 'http://127.0.0.1:8000/app/pool/security/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 912, '{\"branch_id\":\"2\",\"no_ref\":\"11320161\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}', 'success', '2023-03-13 09:10:05', '2023-03-13 09:10:05'),
(15, 'checking document', 'http://127.0.0.1:8000/app/pool/security/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 912, '{\"branch_id\":\"2\",\"no_ref\":\"44320161\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-OUT\"}', 'success', '2023-03-13 09:13:26', '2023-03-13 09:13:26'),
(16, 'checking document', 'http://127.0.0.1:8000/app/pool/security/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 912, '{\"branch_id\":\"2\",\"no_ref\":\"12302637\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}', 'success', '2023-03-17 07:52:16', '2023-03-17 07:52:16'),
(17, 'insert user', 'http://127.0.0.1:8000/app/administrator/users/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"name\":\"CHEKER\",\"email\":\"checker.depo.cianjur@dev.ttat\",\"roles\":\"Cheker\",\"position\":\"NULL\",\"branch_id\":\"17\"}', 'success', '2023-03-21 06:36:18', '2023-03-21 06:36:18'),
(18, 'checking document', 'http://127.0.0.1:8000/app/depo/checker/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 921, '{\"branch_id\":\"17\",\"no_ref\":\"902-0030355\",\"branch_company_id\":\"TU\"}', 'success', '2023-03-21 07:34:15', '2023-03-21 07:34:15'),
(19, 'checking document', 'http://127.0.0.1:8000/app/depo/checker/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 921, '{\"branch_id\":\"17\",\"no_ref\":\"902-0030355\",\"branch_company_id\":\"TU\"}', 'success', '2023-03-21 07:34:19', '2023-03-21 07:34:19'),
(20, 'checking document', 'http://127.0.0.1:8000/app/depo/checker/ttat/document/loading_truck', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 921, '{\"branch_id\":\"17\",\"no_ref\":\"902-0030355\",\"branch_company_id\":\"TU\"}', 'success', '2023-03-21 07:34:24', '2023-03-21 07:34:24'),
(21, 'checking document', 'http://127.0.0.1:8000/app/depo/checker/ttat/document/loading_truck', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 921, '{\"branch_id\":\"17\",\"no_ref\":\"902-0030355\",\"branch_company_id\":\"TU\"}', 'success', '2023-03-21 07:34:29', '2023-03-21 07:34:29'),
(22, 'checking document', 'http://127.0.0.1:8000/app/pool/security/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 912, '{\"branch_id\":\"2\",\"no_ref\":\"11146888\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}', 'success', '2023-03-21 07:46:43', '2023-03-21 07:46:43'),
(23, 'checking document', 'http://127.0.0.1:8000/app/pool/security/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 912, '{\"branch_id\":\"2\",\"no_ref\":\"11146884\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}', 'success', '2023-03-21 07:46:56', '2023-03-21 07:46:56'),
(24, 'checking document', 'http://127.0.0.1:8000/app/pool/security/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 912, '{\"branch_id\":\"2\",\"no_ref\":\"11146884\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}', 'success', '2023-03-21 07:46:56', '2023-03-21 07:46:56'),
(25, 'checking document', 'http://127.0.0.1:8000/app/pool/security/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 912, '{\"branch_id\":\"2\",\"no_ref\":\"31503966\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}', 'success', '2023-03-21 07:47:33', '2023-03-21 07:47:33'),
(26, 'checking document', 'http://127.0.0.1:8000/app/pool/security/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 912, '{\"branch_id\":\"2\",\"no_ref\":\"11146888\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-OUT\"}', 'success', '2023-03-23 04:13:42', '2023-03-23 04:13:42'),
(27, 'insert fleet_ekspedisi', 'http://127.0.0.1:8000/app/logistik/fleet/ekspedisi/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 911, '{\"nama_ekspedisi\":\"HGS\"}', 'success', '2023-03-23 07:25:39', '2023-03-23 07:25:39'),
(28, 'insert fleet_ekspedisi', 'http://127.0.0.1:8000/app/logistik/fleet/ekspedisi/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 911, '{\"nama_ekspedisi\":\"DLY\"}', 'success', '2023-03-23 07:25:46', '2023-03-23 07:25:46'),
(29, 'insert fleet_ekspedisi', 'http://127.0.0.1:8000/app/logistik/fleet/ekspedisi/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 911, '{\"nama_ekspedisi\":\"TUA\"}', 'success', '2023-03-23 07:25:53', '2023-03-23 07:25:53'),
(30, 'insert fleet', 'http://127.0.0.1:8000/app/logistik/fleet/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 911, '{\"no_pol\":\"X 0000 XX\",\"no_pol_lama\":\"-\",\"ekspedisi_id\":\"3\",\"sku\":\"-\",\"variant\":\"-\",\"status_fleet\":null}', 'success', '2023-03-23 07:27:28', '2023-03-23 07:27:28'),
(31, 'insert fleet', 'http://127.0.0.1:8000/app/logistik/fleet/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 911, '{\"no_pol\":\"X 0001 XX\",\"no_pol_lama\":\"-\",\"ekspedisi_id\":\"3\",\"sku\":\"-\",\"variant\":\"-\",\"status_fleet\":null}', 'success', '2023-03-23 07:27:40', '2023-03-23 07:27:40'),
(32, 'insert fleet', 'http://127.0.0.1:8000/app/logistik/fleet/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 911, '{\"no_pol\":\"X 0002 XX\",\"no_pol_lama\":\"-\",\"ekspedisi_id\":\"1\",\"sku\":\"-\",\"variant\":\"-\",\"status_fleet\":null}', 'success', '2023-03-23 07:27:50', '2023-03-23 07:27:50'),
(33, 'insert user', 'http://127.0.0.1:8000/app/administrator/users/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"name\":\"GUDANG\",\"email\":\"gudang@dev.ttat\",\"roles\":\"Gudang\",\"position\":\"NULL\",\"branch_id\":\"39\"}', 'success', '2023-03-27 04:18:29', '2023-03-27 04:18:29'),
(34, 'checking document', 'http://127.0.0.1:8000/app/pool/security/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 912, '{\"branch_id\":\"2\",\"no_ref\":\"11146888\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}', 'success', '2023-03-27 07:39:21', '2023-03-27 07:39:21'),
(35, 'checking document', 'http://127.0.0.1:8000/app/pool/security/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 912, '{\"branch_id\":\"2\",\"no_ref\":\"44320161\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-OUT\"}', 'success', '2023-03-27 09:24:56', '2023-03-27 09:24:56'),
(36, 'insert user', 'http://127.0.0.1:8000/app/administrator/users/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"name\":\"SECURITY POOL\",\"email\":\"sec.pool.dewan@dev.ttat\",\"roles\":\"Security Pool\",\"position\":\"NULL\",\"branch_id\":\"32\"}', 'success', '2023-03-28 07:35:34', '2023-03-28 07:35:34'),
(37, 'insert user', 'http://127.0.0.1:8000/app/administrator/users/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"name\":\"ADMIN POOL DEWAN\",\"email\":\"adm.pool.dewan@dev.ttat\",\"roles\":\"Admin Pool\",\"position\":\"NULL\",\"branch_id\":\"32\"}', 'success', '2023-03-28 07:36:21', '2023-03-28 07:36:21'),
(38, 'checking document', 'http://127.0.0.1:8000/app/pool/security/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 923, '{\"branch_id\":\"32\",\"no_ref\":\"12106933\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}', 'success', '2023-03-28 07:36:47', '2023-03-28 07:36:47'),
(39, 'checking document', 'http://127.0.0.1:8000/app/pool/security/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 923, '{\"branch_id\":\"32\",\"no_ref\":\"12106933\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-OUT\"}', 'success', '2023-03-28 07:37:50', '2023-03-28 07:37:50'),
(40, 'checking document', 'http://127.0.0.1:8000/app/pool/security/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 923, '{\"branch_id\":\"32\",\"no_ref\":\"12106933\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}', 'success', '2023-03-28 07:39:11', '2023-03-28 07:39:11'),
(41, 'checking document', 'http://127.0.0.1:8000/app/pool/security/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 923, '{\"branch_id\":\"32\",\"no_ref\":\"12106933\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-OUT\"}', 'success', '2023-03-28 07:44:54', '2023-03-28 07:44:54'),
(42, 'checking document', 'http://127.0.0.1:8000/app/pool/security/ttat/document/checking', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 912, '{\"branch_id\":\"2\",\"no_ref\":\"12107039\",\"branch_company_id\":\"TUA\",\"check_category\":\"GET-IN\"}', 'success', '2023-03-28 08:53:11', '2023-03-28 08:53:11'),
(43, 'update data_company_identity', 'http://127.0.0.1:8000/app/administrator/company-identity/update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"company_name\":\"TUA GROUP\",\"address\":\"Jl. Soekarno-Hatta No.608, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286\",\"phone\":\"0853700000000\",\"email\":\"waternetcore@gmail.com\",\"logo\":null}', 'success', '2023-04-03 11:58:08', '2023-04-03 11:58:08'),
(44, 'update data_company_identity', 'http://127.0.0.1:8000/app/administrator/company-identity/update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"company_name\":\"TUA GROUP\",\"address\":\"Jl. Soekarno-Hatta No.608, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286\",\"phone\":\"-\",\"email\":\"waternetcore@gmail.com\",\"logo\":null}', 'success', '2023-04-03 11:58:16', '2023-04-03 11:58:16'),
(45, 'update Config_app', 'http://127.0.0.1:8000/app/administrator/set/config-app/update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"id\":null,\"app_name\":\"SETTEMENT DMS APP\",\"code_activation\":null,\"app_description\":\"SETTEMENT DMS APP\",\"app_keyword\":\"-\",\"app_author\":\"IT TUA DEVELOPMENT\",\"app_logo\":null,\"update_at\":null}', 'success', '2023-04-03 11:58:49', '2023-04-03 11:58:49'),
(46, 'delete branch', 'http://127.0.0.1:8000/app/administrator/admin/branch/delete/36?id=delitems', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"id\":36,\"code_branch\":null,\"name_branch\":\"TA CIPERNA\",\"company_branch\":\"TA\",\"langitude\":null,\"longitude\":null,\"address_branch\":\"Jawa Barat, Indonesia\",\"type_branch\":\"DEPO\",\"created_at\":\"2022-02-27 17:40:04\",\"updated_at\":\"2023-03-21 10:57:42\"}', 'success', '2023-05-02 04:13:13', '2023-05-02 04:13:13'),
(47, 'delete branch', 'http://127.0.0.1:8000/app/administrator/admin/branch/delete/34?id=delitems', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"id\":34,\"code_branch\":null,\"name_branch\":\"TUA SADAKELING 2\",\"company_branch\":\"TUA\",\"langitude\":null,\"longitude\":null,\"address_branch\":\"Jawa Barat, Indonesia\",\"type_branch\":\"DEPO\",\"created_at\":\"2022-02-27 17:03:16\",\"updated_at\":\"2023-03-21 10:57:47\"}', 'success', '2023-05-02 04:13:30', '2023-05-02 04:13:30'),
(48, 'delete branch', 'http://127.0.0.1:8000/app/administrator/admin/branch/delete/38?id=delitems', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"id\":38,\"code_branch\":null,\"name_branch\":\"TUA KOPO\",\"company_branch\":\"TUA\",\"langitude\":null,\"longitude\":null,\"address_branch\":\"Jawa Barat, Indonesia\",\"type_branch\":\"DEPO\",\"created_at\":\"2022-03-02 13:34:30\",\"updated_at\":\"2023-03-21 10:58:03\"}', 'success', '2023-05-02 04:13:37', '2023-05-02 04:13:37'),
(49, 'delete branch', 'http://127.0.0.1:8000/app/administrator/admin/branch/delete/39?id=delitems', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"id\":39,\"code_branch\":null,\"name_branch\":\"HEAD OFFICE (HO)\",\"company_branch\":\"TUA\",\"langitude\":null,\"longitude\":null,\"address_branch\":\"Jl. Soekarno Hatta No.608, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286\",\"type_branch\":\"HO\",\"created_at\":\"2022-08-24 12:35:30\",\"updated_at\":\"2022-08-24 12:35:30\"}', 'success', '2023-05-02 04:18:39', '2023-05-02 04:18:39'),
(50, 'update data_branch', 'http://127.0.0.1:8000/app/administrator/admin/branch/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"name_branch\":\"HO (HEAD OFFICE)\",\"company_branch\":\"TUA\",\"longitude\":null,\"address_branch\":\"Jl. Soekarno Hatta No.608 E, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40256\",\"type_branch\":\"HO\"}', 'success', '2023-05-02 09:56:04', '2023-05-02 09:56:04'),
(51, 'update data_branch', 'http://127.0.0.1:8000/app/administrator/admin/branch/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"name_branch\":\"aaa\",\"company_branch\":\"TUA\",\"longitude\":null,\"address_branch\":\"asdas\",\"type_branch\":\"DEPO\"}', 'success', '2023-05-02 10:21:56', '2023-05-02 10:21:56'),
(52, 'update data_branch', 'http://127.0.0.1:8000/app/administrator/admin/branch/update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"name_branch\":\"aaa777\",\"company_branch\":\"TU\",\"longitude\":null,\"address_branch\":\"asdas\",\"type_branch\":\"DEPO\"}', 'success', '2023-05-02 10:23:39', '2023-05-02 10:23:39'),
(53, 'delete branch', 'http://127.0.0.1:8000/app/administrator/admin/branch/delete/45?id=delitems', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"id\":45,\"code_branch\":null,\"name_branch\":\"aaa777\",\"company_branch\":\"TU\",\"langitude\":null,\"longitude\":null,\"address_branch\":\"asdas\",\"type_branch\":\"DEPO\",\"created_at\":\"2023-05-02 17:21:56\",\"updated_at\":\"2023-05-02 17:23:39\"}', 'success', '2023-05-02 10:23:44', '2023-05-02 10:23:44'),
(54, 'update user', 'http://127.0.0.1:8000/app/administrator/users/update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"name\":\"BOD\",\"email\":\"bod@dev.st\"}', 'success', '2023-05-02 10:27:05', '2023-05-02 10:27:05'),
(55, 'update user', 'http://127.0.0.1:8000/app/administrator/users/update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"name\":\"SND SALES MANAGER\",\"email\":\"snd_sm@dev.st\"}', 'success', '2023-05-02 10:37:10', '2023-05-02 10:37:10'),
(56, 'update data_segmen', 'http://localhost:8089/app/administrator/admin/segmen/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"nama_segmen\":\"AHS\",\"keterangan\":\"-\"}', 'success', '2024-01-17 04:26:36', '2024-01-17 04:26:36'),
(57, 'update data_segmen', 'http://localhost:8089/app/administrator/admin/segmen/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"nama_segmen\":\"Retail\",\"keterangan\":\"-\"}', 'success', '2024-01-17 04:27:15', '2024-01-17 04:27:15'),
(58, 'update data_segmen', 'http://localhost:8089/app/administrator/admin/segmen/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"nama_segmen\":\"MT BKL\",\"keterangan\":\"-\"}', 'success', '2024-01-17 04:28:20', '2024-01-17 04:28:20'),
(59, 'update data_segmen', 'http://localhost:8089/app/administrator/admin/segmen/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"nama_segmen\":\"Logistik\",\"keterangan\":\"-\"}', 'success', '2024-01-17 04:28:31', '2024-01-17 04:28:31'),
(60, 'update data_kendaraan', 'http://localhost:8089/app/administrator/admin/kendaraan/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"no_polisi\":\"D 1148 WD\",\"no_rangka\":\"11298239\",\"no_mesin\":\"12129238\",\"nama_pemilik\":\"PT.Tirta Utama Abadi\",\"merek\":\"HINO\",\"type\":\"Engkel\",\"rasio_ideal\":\"-\",\"model\":\"Krangkeng\",\"tahun\":\"2002\",\"warna\":\"Coklat\",\"kapasitas_mesin\":\"1000\",\"kategori\":\"Secondary\",\"penempatan\":\"902\",\"id_segmen\":\"1\",\"perusahaan\":\"TUA\",\"status_kendaraan\":\"Aktif\",\"status_kepemilikan\":\"Hak Milik\",\"keterangan\":\"Tidak dipakai\"}', 'success', '2024-01-17 06:30:48', '2024-01-17 06:30:48'),
(61, 'update data_vendor', 'http://localhost:8089/app/administrator/admin/vendor/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"kode_vendor\":\"000002\",\"nama_vendor\":\"PT. Baru Sejahtera\",\"alamat\":\"Jl. Soekarno Hatta No. 417\",\"telepon\":\"0229984\",\"email\":\"coba@yahoo.com\"}', 'success', '2024-01-17 06:33:18', '2024-01-17 06:33:18'),
(62, 'update data_segmen_produk', 'http://localhost:8089/app/administrator/admin/segmen_produk/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"id_segmen\":\"1\",\"branch_id\":\"902\",\"jenis\":\"Jugs\",\"harga\":\"500\"}', 'success', '2024-01-17 06:33:54', '2024-01-17 06:33:54'),
(63, 'update data_segmen_kendaraan', 'http://localhost:8089/app/administrator/admin/segmen_kendaraan/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"nama_segmen_ken\":\"Dedicated TUA\",\"keterangan\":\"-\"}', 'success', '2024-01-17 06:35:18', '2024-01-17 06:35:18'),
(64, 'update data_ritase', 'http://localhost:8089/app/administrator/admin/ritase/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"id_segmen_rit\":\"1\",\"ritase\":\"2\",\"vol_ideal\":\"1500\"}', 'success', '2024-01-17 06:42:49', '2024-01-17 06:42:49'),
(65, 'update data_kendaraan', 'http://localhost:8089/app/administrator/admin/kendaraan/insert', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"no_polisi\":\"D 1149 DD\",\"no_rangka\":\"11298299\",\"no_mesin\":\"12129245\",\"nama_pemilik\":\"PT.Tirta Utama Abadi\",\"merek\":\"HINO\",\"type\":\"Engkel\",\"rasio_ideal\":\"-\",\"model\":\"Box\",\"tahun\":\"2002\",\"warna\":\"Coklat\",\"kapasitas_mesin\":\"1000\",\"kategori\":\"Secondary\",\"penempatan\":\"029\",\"id_segmen\":\"3\",\"perusahaan\":\"TUA\",\"status_kendaraan\":\"Tidak Aktif\",\"status_kepemilikan\":\"Hak Milik\",\"keterangan\":\"-\"}', 'success', '2024-01-17 09:27:07', '2024-01-17 09:27:07'),
(66, 'update data_kendaraan', 'http://127.0.0.1:8000/app/administrator/admin/kendaraan/update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"no_polisi\":\"D 1148 WD\",\"no_rangka\":\"11298239\",\"no_mesin\":\"12129238\",\"nama_pemilik\":\"PT.Tirta Utama Abadi\",\"merek\":\"HINO\",\"type\":\"Engkel\",\"rasio_ideal\":\"6\",\"model\":\"Krangkeng\",\"tahun\":\"2002\",\"warna\":\"Coklat\",\"kapasitas_mesin\":\"1000\",\"kategori\":\"Secondary\",\"penempatan\":null,\"id_segmen\":\"1\",\"perusahaan\":\"TUA\",\"status_kendaraan\":\"Aktif\",\"status_kepemilikan\":\"Hak Milik\",\"keterangan\":\"Tidak dipakai\"}', 'success', '2025-01-24 07:50:13', '2025-01-24 07:50:13'),
(67, 'update data_kendaraan', 'http://127.0.0.1:8000/app/administrator/admin/kendaraan/update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"no_polisi\":\"D 1149 DD\",\"no_rangka\":\"11298299\",\"no_mesin\":\"12129245\",\"nama_pemilik\":\"PT.Tirta Utama Abadi\",\"merek\":\"HINO\",\"type\":\"Engkel\",\"rasio_ideal\":\"8\",\"model\":\"Box\",\"tahun\":\"2002\",\"warna\":\"Coklat\",\"kapasitas_mesin\":\"1000\",\"kategori\":\"Secondary\",\"penempatan\":null,\"id_segmen\":\"2\",\"perusahaan\":\"TUA\",\"status_kendaraan\":\"Tidak Aktif\",\"status_kepemilikan\":\"Hak Milik\",\"keterangan\":\"-\"}', 'success', '2025-01-24 08:17:14', '2025-01-24 08:17:14'),
(68, 'update data_kendaraan', 'http://127.0.0.1:8000/app/administrator/admin/kendaraan/update', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'WebKit', 'Chrome', 'Windows', 28, '{\"no_polisi\":\"D 1149 DD\",\"no_rangka\":\"11298299\",\"no_mesin\":\"12129245\",\"nama_pemilik\":\"PT.Tirta Utama Abadi\",\"merek\":\"HINO\",\"type\":\"Engkel\",\"rasio_ideal\":\"8\",\"model\":\"Box\",\"tahun\":\"2002\",\"warna\":\"Coklat\",\"kapasitas_mesin\":\"1000\",\"kategori\":\"Secondary\",\"penempatan\":null,\"id_segmen\":\"2\",\"perusahaan\":\"TUA\",\"status_kendaraan\":\"Aktif\",\"status_kepemilikan\":\"Hak Milik\",\"keterangan\":\"-\"}', 'success', '2025-01-29 21:15:28', '2025-01-29 21:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `data_company_identity`
--

CREATE TABLE `data_company_identity` (
  `id` int NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `address` text,
  `phone` text,
  `email` text,
  `logo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `data_company_identity`
--

INSERT INTO `data_company_identity` (`id`, `company_name`, `address`, `phone`, `email`, `logo`) VALUES
(28, 'TUA GROUP', 'Jl. Soekarno-Hatta No.608, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286', '-', 'waternetcore@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_config_app`
--

CREATE TABLE `data_config_app` (
  `id` int NOT NULL,
  `app_name` varchar(100) NOT NULL,
  `code_activation` varchar(100) DEFAULT NULL,
  `app_description` varchar(100) DEFAULT NULL,
  `app_keyword` varchar(100) DEFAULT NULL,
  `app_author` varchar(100) DEFAULT NULL,
  `app_logo` varchar(100) DEFAULT NULL,
  `update_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `data_config_app`
--

INSERT INTO `data_config_app` (`id`, `app_name`, `code_activation`, `app_description`, `app_keyword`, `app_author`, `app_logo`, `update_at`) VALUES
(28, 'SETTEMENT DMS APP', NULL, 'SETTEMENT DMS APP', '-', 'IT TUA DEVELOPMENT', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dt_bbm`
--

CREATE TABLE `dt_bbm` (
  `id` bigint NOT NULL,
  `jenis_bbm` varchar(30) NOT NULL,
  `harga_perliter` int NOT NULL DEFAULT '0',
  `id_user_input` bigint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dt_bbm`
--

INSERT INTO `dt_bbm` (`id`, `jenis_bbm`, `harga_perliter`, `id_user_input`, `created_at`, `updated_at`) VALUES
(1, 'Bio Solar', 6800, NULL, '2024-01-17 08:33:42', '2024-01-17 08:33:45'),
(2, 'Pertalite', 10000, NULL, '2024-01-17 08:34:06', '2024-01-17 08:34:09'),
(3, 'Pertamax', 13350, NULL, '2024-01-17 08:34:28', '2024-01-17 08:34:31'),
(4, 'Dexlite', 15550, NULL, '2024-01-17 08:34:57', '2024-01-17 08:35:00'),
(5, 'Solar', 6500, NULL, '2024-01-17 09:29:27', '2024-01-17 09:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `dt_branch`
--

CREATE TABLE `dt_branch` (
  `id` int NOT NULL,
  `code_branch` varchar(50) DEFAULT NULL,
  `name_branch` varchar(100) NOT NULL,
  `company_branch` varchar(100) NOT NULL,
  `langitude` text,
  `longitude` text,
  `address_branch` text,
  `type_branch` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dt_branch`
--

INSERT INTO `dt_branch` (`id`, `code_branch`, `name_branch`, `company_branch`, `langitude`, `longitude`, `address_branch`, `type_branch`, `created_at`, `updated_at`) VALUES
(3, '914', 'TUA SOREANG', 'TUA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(4, '900', 'TUA SADAKELING', 'TUA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(5, '343', 'TUA PADALARANG', 'TUA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(6, '902', 'TUA METRO', 'TUA', '\n', '\n', 'Jl. Soekarno Hatta No.608, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286', 'DEPO', '2022-02-27 02:33:29', '2023-03-21 04:38:28'),
(7, '030', 'TUA MAJALAYA', 'TUA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2023-03-21 04:07:34'),
(8, '029', 'TUA LEMBANG', 'TUA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2023-03-21 04:07:34'),
(9, '904', 'TUA KATAPANG', 'TUA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(10, '344', 'TUA KASOMALANG', 'TUA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(11, '912', 'TUA CICALENGKA', 'TUA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(12, '906', 'TU SUKABUMI', 'TU', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(13, '915', 'TU SENTUL', 'TU', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(14, '901', 'TU PARUNG', 'TU', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(15, '918', 'TU JONGGOL', 'TU', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(16, '342', 'TU CITEUREUP', 'TU', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(17, '911', 'TU CIANJUR', 'TU', NULL, NULL, 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2023-03-21 04:07:34'),
(18, '337', 'TU BOGOR', 'TU', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(19, '032', 'TA TASIKMALAYA', 'TA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2023-03-21 04:07:34'),
(20, '335', 'TA PURWAKARTA', 'TA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(21, '033', 'TA PENGGUNG', 'TA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2023-03-21 04:07:34'),
(22, '031', 'TA PANGANDARAN', 'TA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2023-03-21 04:07:34'),
(23, '908', 'TA PAMANUKAN', 'TA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(24, '920', 'TA MAJALENGKA', 'TA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(25, '036', 'TA KUNINGAN', 'TA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2023-03-21 04:07:34'),
(26, '341', 'TA KANCI', 'TA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(27, '910', 'TA JATISARI', 'TA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(28, '919', 'TA JATIBARANG', 'TA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(29, '917', 'TA GARUT', 'TA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(30, '916', 'TA BANJARSARI', 'TA', '\n', '\n', 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 02:33:29', '2022-02-27 02:33:29'),
(35, '907', 'TUA LODAYA', 'TUA', NULL, NULL, 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 10:03:36', '2023-03-21 04:07:34'),
(37, '030', 'TUA MAJALAYA', 'TUA', NULL, NULL, 'Jawa Barat, Indonesia', 'DEPO', '2022-02-27 11:12:00', '2023-03-21 04:07:34'),
(40, '021', 'TU PELABUHAN RATU', 'TU', NULL, NULL, 'Jawa Barat, Indonesia', 'DEPO', '2022-08-24 10:30:01', '2023-03-21 04:07:34'),
(41, '930', 'TUA SUMEDANG', 'TUA', NULL, NULL, 'Jawa Barat, Indonesia', 'DEPO', '2022-10-13 05:59:50', '2023-03-21 04:07:34'),
(44, NULL, 'HO (HEAD OFFICE)', 'TUA', NULL, NULL, 'Jl. Soekarno Hatta No.608 E, Sekejati, Kec. Buahbatu, Kota Bandung, Jawa Barat 40256', 'HO', '2023-05-02 09:56:04', '2023-05-02 09:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `dt_file_upload`
--

CREATE TABLE `dt_file_upload` (
  `id` bigint NOT NULL,
  `kode` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `no_description_detail` bigint DEFAULT NULL,
  `description` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `filename` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dt_forklift`
--

CREATE TABLE `dt_forklift` (
  `id` bigint NOT NULL,
  `no_forklift` varchar(25) DEFAULT NULL,
  `merek` varchar(50) DEFAULT NULL,
  `daya_angkut` int DEFAULT NULL,
  `penempatan` varchar(30) DEFAULT NULL,
  `perusahaan` varchar(30) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `id_user_input` bigint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dt_forklift`
--

INSERT INTO `dt_forklift` (`id`, `no_forklift`, `merek`, `daya_angkut`, `penempatan`, `perusahaan`, `keterangan`, `id_user_input`, `created_at`, `updated_at`) VALUES
(1, '07', 'TOYOTA', 3, NULL, 'TA', NULL, NULL, '2024-03-04 09:45:28', '2024-03-04 09:45:28'),
(2, 'FORKLIFT 05', 'TOYOTA', 3, NULL, 'TA', NULL, NULL, '2024-03-04 09:47:05', '2024-03-04 09:47:05'),
(3, '11', 'toyota', 3, '902', 'TUA', NULL, NULL, '2024-03-04 09:47:38', '2024-03-04 09:47:38'),
(4, '12', 'toyota', 3, '902', 'TUA', NULL, NULL, '2024-03-04 09:48:17', '2024-03-04 09:48:17'),
(5, '4', 'TOYOTA', 3, NULL, 'TUA', NULL, NULL, '2024-03-04 09:50:11', '2024-03-04 09:50:11'),
(6, '05', 'TOYOTA', 3, NULL, 'TA', NULL, NULL, '2024-03-04 09:50:18', '2024-03-04 09:50:18'),
(7, '8', 'toyota', 3, '344', 'TUA', NULL, NULL, '2024-03-04 09:51:21', '2024-03-04 09:51:21'),
(8, '21', 'TOYOTA', 3, '914', 'TUA', NULL, NULL, '2024-03-04 09:51:56', '2024-03-04 09:51:56'),
(9, '6', 'toyota', 3, '912', 'TUA', NULL, NULL, '2024-03-04 10:04:07', '2024-03-04 10:04:07'),
(10, '1', 'hypster', 3, NULL, 'TUA', NULL, NULL, '2024-03-04 10:05:50', '2024-03-04 10:05:50'),
(11, '2', 'TOYOTA', 3, NULL, 'TUA', 'BENGKEL CICALENGKA', NULL, '2024-03-04 10:14:33', '2024-03-04 10:14:33'),
(12, '5', 'TOYOTA', 3, '920', 'TA', NULL, NULL, '2024-03-09 02:17:53', '2024-03-09 02:17:53'),
(13, '7', 'TOYOTA', 3, '919', 'TA', NULL, NULL, '2024-03-09 02:18:33', '2024-03-09 02:18:33'),
(14, '3', 'TOYOTA', 3, '910', 'TA', NULL, NULL, '2024-03-09 02:19:11', '2024-03-09 02:19:11'),
(15, '14', 'TOYOTA', 3, '032', 'TA', NULL, NULL, '2024-03-09 02:19:47', '2024-03-09 02:19:47'),
(16, '10', 'TOYOTA', 3, '335', 'TA', NULL, NULL, '2024-03-09 02:22:03', '2024-03-09 02:22:03'),
(17, '9', 'TOYOTA', 3, '917', 'TA', NULL, NULL, '2024-03-09 02:22:35', '2024-03-09 02:22:35'),
(18, '15', 'TOYOTA', 3, '033', 'TA', NULL, NULL, '2024-03-09 02:23:17', '2024-03-09 02:23:17'),
(19, '16', 'TOYOTA', 3, '341', 'TA', NULL, NULL, '2024-03-09 02:24:03', '2024-03-09 02:24:03'),
(20, '1', 'HIESTER', 3, NULL, 'TUA', 'BENGKEL CICALENGKA', NULL, '2024-03-09 07:21:18', '2024-03-09 07:21:18'),
(21, '2', 'TOYOTA', 3, NULL, 'TUA', 'PABRIK CICALENGKA', NULL, '2024-03-09 07:22:23', '2024-03-09 07:22:23'),
(22, '4', 'toyota', 3, '343', 'TUA', NULL, NULL, '2024-03-09 07:23:15', '2024-03-09 07:23:15'),
(23, '26', 'LIUGONG', 3, '912', 'TUA', 'PABRIK CICALENGKA', NULL, '2024-03-09 07:24:43', '2024-03-09 07:24:43'),
(24, '1', 'HIESTER', 3, '912', 'TUA', NULL, NULL, '2024-12-26 02:50:43', '2024-12-26 02:50:43'),
(25, '2', 'TOYOTA', 3, '912', 'TUA', 'PABRIK CICALENGKA', NULL, '2024-12-26 02:51:44', '2024-12-26 02:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `dt_keluar_masuk`
--

CREATE TABLE `dt_keluar_masuk` (
  `kode` bigint NOT NULL,
  `no_pol` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `waktu_keluar` time DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `waktu_masuk` time DEFAULT NULL,
  `id_user_input` bigint DEFAULT NULL,
  `keterangan` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `dt_keluar_masuk`
--

INSERT INTO `dt_keluar_masuk` (`kode`, `no_pol`, `tgl_keluar`, `waktu_keluar`, `tgl_masuk`, `waktu_masuk`, `id_user_input`, `keterangan`, `created_at`, `updated_at`) VALUES
(30, 'D 1148 WD', '2025-01-15', '17:06:29', '2025-01-15', '17:06:58', 28, 'selesai', '2025-01-15 10:06:29', '2025-01-15 10:06:29'),
(31, 'D 1148 WD', '2025-01-15', '17:07:41', '2025-01-15', '17:08:14', 28, 'selesai', '2025-01-15 10:07:41', '2025-01-15 10:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `dt_kendaraan`
--

CREATE TABLE `dt_kendaraan` (
  `id` bigint NOT NULL,
  `no_polisi` varchar(25) DEFAULT NULL,
  `no_rangka` varchar(50) DEFAULT NULL,
  `no_mesin` varchar(50) DEFAULT NULL,
  `nama_pemilik` varchar(50) DEFAULT NULL,
  `merek` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `rasio_ideal` varchar(30) DEFAULT NULL,
  `model` varchar(30) DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `warna` varchar(30) DEFAULT NULL,
  `kapasitas_mesin` int DEFAULT NULL,
  `kategori` varchar(30) DEFAULT NULL,
  `penempatan` varchar(50) DEFAULT NULL,
  `name_branch` varchar(30) DEFAULT NULL,
  `perusahaan` varchar(30) DEFAULT NULL,
  `id_segmen` varchar(30) DEFAULT NULL,
  `nama_segmen` varchar(30) DEFAULT NULL,
  `status_kendaraan` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_kepemilikan` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `id_user_input` bigint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dt_kendaraan`
--

INSERT INTO `dt_kendaraan` (`id`, `no_polisi`, `no_rangka`, `no_mesin`, `nama_pemilik`, `merek`, `type`, `rasio_ideal`, `model`, `tahun`, `warna`, `kapasitas_mesin`, `kategori`, `penempatan`, `name_branch`, `perusahaan`, `id_segmen`, `nama_segmen`, `status_kendaraan`, `status_kepemilikan`, `keterangan`, `id_user_input`, `created_at`, `updated_at`) VALUES
(1, 'D 1148 WD', '11298239', '12129238', 'PT.Tirta Utama Abadi', 'HINO', 'Engkel', '6', 'Krangkeng', 2002, 'Coklat', 1000, 'Secondary', '902', 'TUA METRO', 'TUA', '1', NULL, 'Aktif', 'Hak Milik', 'Tidak dipakai', NULL, '2024-01-17 06:30:48', '2024-01-17 06:30:48'),
(2, 'D 1149 DD', '11298299', '12129245', 'PT.Tirta Utama Abadi', 'HINO', 'Engkel', '8', 'Box', 2002, 'Coklat', 1000, 'Secondary', NULL, 'TUA METRO', 'TUA', '2', NULL, 'Aktif', 'Hak Milik', '-', NULL, '2024-01-17 09:27:07', '2024-01-17 09:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `dt_kendaraan_kategori`
--

CREATE TABLE `dt_kendaraan_kategori` (
  `id` bigint NOT NULL,
  `no_polisi` varchar(25) DEFAULT NULL,
  `id_segmen` varchar(30) DEFAULT NULL,
  `id_segmen_kendaraan` varchar(20) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `muatan` int DEFAULT NULL,
  `kapasitas_muatan` int DEFAULT NULL,
  `id_user_input` bigint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dt_kendaraan_kategori`
--

INSERT INTO `dt_kendaraan_kategori` (`id`, `no_polisi`, `id_segmen`, `id_segmen_kendaraan`, `kategori`, `muatan`, `kapasitas_muatan`, `id_user_input`, `created_at`, `updated_at`) VALUES
(1, 'D 1148 WD', '1', '1', 'Jugs', 720, 720, NULL, '2024-01-17 06:55:04', '2024-01-17 06:55:08'),
(2, 'D 1149 DD', '2', '2', 'Jugs', 720, 720, NULL, '2025-01-22 08:44:42', '2025-01-22 08:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `dt_kendaraan_sewa`
--

CREATE TABLE `dt_kendaraan_sewa` (
  `id` bigint NOT NULL,
  `no_polisi` varchar(25) NOT NULL,
  `merek` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `penempatan` varchar(6) DEFAULT NULL,
  `perusahaan` varchar(10) DEFAULT NULL,
  `status_kendaraan` varchar(30) DEFAULT NULL,
  `kode_vendor` varchar(10) DEFAULT NULL,
  `tgl_sewa` date DEFAULT NULL,
  `tgl_akhir_sewa` date DEFAULT NULL,
  `id_user_input` bigint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dt_kendaraan_surat`
--

CREATE TABLE `dt_kendaraan_surat` (
  `id` bigint NOT NULL,
  `no_polisi` varchar(30) DEFAULT NULL,
  `no_stnk` varchar(50) DEFAULT NULL,
  `bulan_exp_stnk` varchar(20) DEFAULT NULL,
  `tgl_pajak_stnk` date DEFAULT NULL,
  `tgl_baru_stnk` date DEFAULT NULL,
  `status_dokumen_stnk` char(1) DEFAULT '0',
  `bulan_no_kir_1` varchar(30) DEFAULT NULL,
  `bulan_no_kir_2` varchar(30) DEFAULT NULL,
  `masa_berlaku_kir` date DEFAULT NULL,
  `id_user_input` bigint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dt_ritase`
--

CREATE TABLE `dt_ritase` (
  `id` bigint NOT NULL,
  `id_segmen_rit` bigint DEFAULT NULL,
  `ritase` int DEFAULT NULL,
  `vol_ideal` int DEFAULT NULL,
  `id_user_input` bigint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dt_ritase`
--

INSERT INTO `dt_ritase` (`id`, `id_segmen_rit`, `ritase`, `vol_ideal`, `id_user_input`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1500, NULL, '2024-01-17 06:42:49', '2024-01-17 06:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `dt_segmen`
--

CREATE TABLE `dt_segmen` (
  `id` int NOT NULL,
  `nama_segmen` varchar(30) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `id_user_input` bigint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dt_segmen`
--

INSERT INTO `dt_segmen` (`id`, `nama_segmen`, `keterangan`, `id_user_input`, `created_at`, `updated_at`) VALUES
(1, 'AHS', '-', NULL, '2024-01-17 04:26:36', '2024-01-17 04:26:36'),
(2, 'Retail', '-', NULL, '2024-01-17 04:27:14', '2024-01-17 04:27:14'),
(3, 'MT BKL', '-', NULL, '2024-01-17 04:28:20', '2024-01-17 04:28:20'),
(4, 'Logistik', '-', NULL, '2024-01-17 04:28:31', '2024-01-17 04:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `dt_segmen_kendaraan`
--

CREATE TABLE `dt_segmen_kendaraan` (
  `id` bigint NOT NULL,
  `nama_segmen_kendaraan` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `id_user_input` bigint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dt_segmen_kendaraan`
--

INSERT INTO `dt_segmen_kendaraan` (`id`, `nama_segmen_kendaraan`, `keterangan`, `id_user_input`, `created_at`, `updated_at`) VALUES
(1, 'Dedicated TUA', '-', NULL, '2024-01-17 06:35:18', '2024-01-17 06:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `dt_segmen_produk`
--

CREATE TABLE `dt_segmen_produk` (
  `id` bigint NOT NULL,
  `id_segmen` varchar(30) NOT NULL,
  `code_branch` varchar(50) DEFAULT NULL,
  `jenis` varchar(30) DEFAULT NULL,
  `jasa_harga` bigint DEFAULT NULL,
  `id_user_input` bigint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dt_segmen_produk`
--

INSERT INTO `dt_segmen_produk` (`id`, `id_segmen`, `code_branch`, `jenis`, `jasa_harga`, `id_user_input`, `created_at`, `updated_at`) VALUES
(1, '1', '902', 'Jugs', 500, NULL, '2024-01-17 06:33:54', '2024-01-17 06:33:54'),
(2, '2', '912', 'Jugs', 500, NULL, '2025-01-22 08:40:59', '2025-01-22 08:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `dt_tr_bbm`
--

CREATE TABLE `dt_tr_bbm` (
  `id` bigint NOT NULL,
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
  `harga_perliter` bigint DEFAULT NULL,
  `liter_qty` double DEFAULT NULL,
  `biaya_bbm` int DEFAULT NULL,
  `kilometer` int DEFAULT NULL,
  `ratio_actual` double DEFAULT NULL,
  `ratio_ideal` double DEFAULT NULL,
  `file_attachment_bukti` varchar(100) NOT NULL,
  `file_attachment` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `keterangan_bbm` varchar(100) DEFAULT NULL,
  `expired` int NOT NULL,
  `Keterangan_expired` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Aktif',
  `no_vocer` varchar(30) DEFAULT NULL,
  `tanda_cetak` varchar(5) DEFAULT NULL,
  `id_user_input` bigint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dt_tr_bbm`
--

INSERT INTO `dt_tr_bbm` (`id`, `kode_bbm`, `tanggal_bbm`, `waktu_bbm`, `no_polisi`, `code_branch`, `perusahaan`, `week`, `salesman`, `segmen`, `tipe`, `jenis_bbm`, `harga_perliter`, `liter_qty`, `biaya_bbm`, `kilometer`, `ratio_actual`, `ratio_ideal`, `file_attachment_bukti`, `file_attachment`, `keterangan_bbm`, `expired`, `Keterangan_expired`, `no_vocer`, `tanda_cetak`, `id_user_input`, `created_at`, `updated_at`) VALUES
(5, 'BM-3001250003', '2025-01-30', '02:30:19', 'D 1149 DD', 'TUA METRO', 'TUA', '1', 'Agus', 'Retail', NULL, 'Bio Solar', 6800, 3.13, 21250, 125, 0, 8, 'uploads/bukti/1738179019_1.jpeg', NULL, 'Off Schedule', 1, 'kadaluarsa', NULL, NULL, 28, '2025-01-27 19:30:19', '2025-01-29 19:30:19'),
(6, 'BM-3001250002', '2025-01-30', '03:41:12', 'D 1149 DD', 'TUA METRO', 'TUA', '1', 'Agus', 'Retail', NULL, 'Bio Solar', 6800, 3.13, 21250, 150, 0, 8, 'uploads/bukti/1738183272_1.jpeg', 'uploads/attachments/1738183288_1.jpeg', 'Off Schedule', 1, 'Aktif', NULL, NULL, 28, '2025-01-29 20:41:12', '2025-01-29 20:41:12'),
(8, 'BM-3001250004', '2025-01-30', '03:44:56', 'D 1149 DD', 'TUA METRO', 'TUA', '1', 'Agus', 'Retail', NULL, 'Bio Solar', 6800, 3.13, 21250, 225, 0, 8, 'uploads/bukti/1738183496_1.jpeg', NULL, 'Off Schedule', 1, 'Aktif', NULL, NULL, 28, '2025-01-29 20:44:56', '2025-01-29 20:44:56'),
(10, 'BM-3001250004', '2025-01-30', '03:50:05', 'D 1148 WD', 'TUA METRO', 'TUA', '3', 'Asep', 'AHS', NULL, 'Pertalite', 10000, 8.33, 83333, 50, 0, 6, 'uploads/bukti/1738183805_1.jpeg', NULL, 'Off Schedule', 1, 'Aktif', NULL, NULL, 28, '2025-01-29 20:50:05', '2025-01-29 20:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `dt_tr_sparepart`
--

CREATE TABLE `dt_tr_sparepart` (
  `id` bigint NOT NULL,
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
  `kilometer` int DEFAULT NULL,
  `ratio_actual` decimal(10,0) DEFAULT NULL,
  `ratio_ideal` decimal(10,0) DEFAULT NULL,
  `biaya_sparepart` bigint DEFAULT NULL,
  `keterangan_sparepart` varchar(100) DEFAULT NULL,
  `id_user_input` bigint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dt_tr_stnk`
--

CREATE TABLE `dt_tr_stnk` (
  `id` bigint NOT NULL,
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
  `biaya_stnk` bigint DEFAULT NULL,
  `id_user_input` bigint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dt_tr_utilitas`
--

CREATE TABLE `dt_tr_utilitas` (
  `id` bigint NOT NULL,
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
  `kapasitas` int DEFAULT NULL,
  `ritase_real` int DEFAULT NULL,
  `ritase_ideal_perhari` int DEFAULT NULL,
  `ritase_real_perhari` int DEFAULT NULL,
  `lost_ritase` int DEFAULT NULL,
  `lost_volume` int DEFAULT NULL,
  `volume_ideal` int DEFAULT NULL,
  `volume_penjualan_real` int DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `id_user_input` bigint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dt_tr_utilitas`
--

INSERT INTO `dt_tr_utilitas` (`id`, `kode_utilitas`, `tanggal_utilitas`, `waktu_utilitas`, `no_polisi`, `code_branch`, `nama_branch`, `perusahaan`, `salesman`, `week`, `jugs_sps`, `segmen`, `kapasitas`, `ritase_real`, `ritase_ideal_perhari`, `ritase_real_perhari`, `lost_ritase`, `lost_volume`, `volume_ideal`, `volume_penjualan_real`, `keterangan`, `id_user_input`, `created_at`, `updated_at`) VALUES
(1, 'UT-1701240001', '2024-01-17', '15:06:10', 'D 1148 WD', '902', NULL, 'TUA', 'vacant', '1', 'Jugs', 'AHS', 720, 1, 2, 2, 0, 0, 1440, 1500, '-', 28, '2024-01-17 08:06:10', '2024-01-17 08:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `dt_vendor`
--

CREATE TABLE `dt_vendor` (
  `id` bigint NOT NULL,
  `kode_vendor` varchar(30) NOT NULL,
  `nama_vendor` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_user_input` bigint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dt_vendor`
--

INSERT INTO `dt_vendor` (`id`, `kode_vendor`, `nama_vendor`, `alamat`, `telepon`, `email`, `id_user_input`, `created_at`, `updated_at`) VALUES
(1, '000002', 'PT. Baru Sejahtera', 'Jl. Soekarno Hatta No. 417', '0229984', 'coba@yahoo.com', NULL, '2024-01-17 06:33:18', '2024-01-17 06:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `code_employee` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `roles` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `provider` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `provider_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status_account` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `code_employee`, `name`, `email`, `email_verified_at`, `password`, `roles`, `position`, `branch_id`, `provider`, `provider_id`, `avatar`, `status_account`, `remember_token`, `last_login`, `created_at`, `updated_at`) VALUES
(28, NULL, 'admin', 'admin@localhost.com', NULL, '$2y$10$abXw/r30LhnanHP5p2My1uCPbvPw3f1If8CZ.Z/5Hy//owscuOorC', 'Superadmin', NULL, NULL, NULL, NULL, NULL, 'Aktif', NULL, '2025-01-30 00:45:45', '2021-12-15 03:17:08', '2025-01-29 17:45:45'),
(29, NULL, 'test', 'test@localhost.com', NULL, '$2y$10$Xp9IVahvehOIhBMvG39zjOGeEKWWbDvUXZGh0ku07xoJDtMfIhz/q', 'Admin', NULL, '6', NULL, NULL, NULL, 'Aktif', NULL, NULL, '2025-01-29 20:53:58', '2025-01-29 20:53:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_activities_log`
--
ALTER TABLE `data_activities_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_company_identity`
--
ALTER TABLE `data_company_identity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_config_app`
--
ALTER TABLE `data_config_app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_bbm`
--
ALTER TABLE `dt_bbm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_branch`
--
ALTER TABLE `dt_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_file_upload`
--
ALTER TABLE `dt_file_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_forklift`
--
ALTER TABLE `dt_forklift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_keluar_masuk`
--
ALTER TABLE `dt_keluar_masuk`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `dt_kendaraan`
--
ALTER TABLE `dt_kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_kendaraan_kategori`
--
ALTER TABLE `dt_kendaraan_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_kendaraan_sewa`
--
ALTER TABLE `dt_kendaraan_sewa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_kendaraan_surat`
--
ALTER TABLE `dt_kendaraan_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_ritase`
--
ALTER TABLE `dt_ritase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_segmen`
--
ALTER TABLE `dt_segmen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_segmen_kendaraan`
--
ALTER TABLE `dt_segmen_kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_segmen_produk`
--
ALTER TABLE `dt_segmen_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_tr_bbm`
--
ALTER TABLE `dt_tr_bbm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_tr_sparepart`
--
ALTER TABLE `dt_tr_sparepart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_tr_stnk`
--
ALTER TABLE `dt_tr_stnk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_tr_utilitas`
--
ALTER TABLE `dt_tr_utilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_vendor`
--
ALTER TABLE `dt_vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_activities_log`
--
ALTER TABLE `data_activities_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `data_company_identity`
--
ALTER TABLE `data_company_identity`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `data_config_app`
--
ALTER TABLE `data_config_app`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `dt_bbm`
--
ALTER TABLE `dt_bbm`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dt_branch`
--
ALTER TABLE `dt_branch`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `dt_file_upload`
--
ALTER TABLE `dt_file_upload`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dt_forklift`
--
ALTER TABLE `dt_forklift`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `dt_keluar_masuk`
--
ALTER TABLE `dt_keluar_masuk`
  MODIFY `kode` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `dt_kendaraan`
--
ALTER TABLE `dt_kendaraan`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dt_kendaraan_kategori`
--
ALTER TABLE `dt_kendaraan_kategori`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dt_kendaraan_sewa`
--
ALTER TABLE `dt_kendaraan_sewa`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dt_kendaraan_surat`
--
ALTER TABLE `dt_kendaraan_surat`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dt_ritase`
--
ALTER TABLE `dt_ritase`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dt_segmen`
--
ALTER TABLE `dt_segmen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dt_segmen_kendaraan`
--
ALTER TABLE `dt_segmen_kendaraan`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dt_segmen_produk`
--
ALTER TABLE `dt_segmen_produk`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dt_tr_bbm`
--
ALTER TABLE `dt_tr_bbm`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dt_tr_sparepart`
--
ALTER TABLE `dt_tr_sparepart`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dt_tr_stnk`
--
ALTER TABLE `dt_tr_stnk`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dt_tr_utilitas`
--
ALTER TABLE `dt_tr_utilitas`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dt_vendor`
--
ALTER TABLE `dt_vendor`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
