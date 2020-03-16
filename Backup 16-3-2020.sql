-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2020 at 01:49 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `Activity_ID` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Activity_Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BLANK',
  `Activity_Description` varchar(800) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BLANK',
  `Activity_Fee` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`Activity_ID`, `Activity_Name`, `Activity_Description`, `Activity_Fee`, `created_at`, `updated_at`) VALUES
('5db5409f20fb0', 'GATE 2020', 'Gate IS VERY IMPORTANT h', 3000, '2019-10-26 20:03:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `Auth_ID` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dept_ID` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `Auth_Name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Anonymous',
  `Auth_Department` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `Designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `Branch` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `Class` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`ID`, `Branch`, `Class`, `created_at`, `updated_at`) VALUES
(1, 'Computer Science And Engineering', 'SYCSEI', NULL, NULL),
(2, 'Computer Science And Engineering', 'TYCSEI', NULL, NULL),
(3, 'Computer Science And Engineering', 'TYCSEII', NULL, NULL),
(4, 'Computer Science And Engineering', 'BECSEI', NULL, NULL),
(5, 'Computer Science And Engineering', 'BECSEII', NULL, NULL),
(6, 'Mechanical Engineering', 'SYMECH', NULL, NULL),
(7, 'Mechanical Engineering', 'TYMECH', NULL, NULL),
(8, 'Mechanical Engineering', 'BEMECH', NULL, NULL),
(9, 'Civil Engineering', 'SYCIVIL', NULL, NULL),
(10, 'Civil Engineering', 'TYCIVIL', NULL, NULL),
(11, 'Civil Engineering', 'BECIVIL', NULL, NULL),
(12, 'Information Technology', 'SYIT', NULL, NULL),
(13, 'Information Technology', 'TYIT', NULL, NULL),
(14, 'Information Technology', 'BEIT', NULL, NULL),
(15, 'Electronics And Telecommunications', 'SYETC', NULL, NULL),
(16, 'Electronics And Telecommunications', 'TYETC', NULL, NULL),
(17, 'Electronics And Telecommunications', 'BEETC', NULL, NULL),
(19, 'Computer Science And Engineering', 'SYCSEII', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `counselling`
--

CREATE TABLE `counselling` (
  `V_ID` int(10) UNSIGNED NOT NULL,
  `Title` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `Link` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `Video_Description` varchar(1400) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BLANK'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counselling`
--

INSERT INTO `counselling` (`V_ID`, `Title`, `Link`, `Video_Description`) VALUES
(4, 'Prashant', 'https://www.youtube.com/embed/tgbNymZ7vqY', 'Hello'),
(10, 'Hello', 'http://bit.ly/2IIQNc4', 'My name is Prashant Manoj Phulari Studying in BECSE-II.'),
(18, 'Another Video', 'http://bit.ly/2IIQNc4', '                New Video added By Prashant');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dept_ID` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dept_Name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drives`
--

CREATE TABLE `drives` (
  `Drive_ID` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Company_Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'MGM',
  `Criteria` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'MGM',
  `Placed_People` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `Venue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'MGMs College of Engineering Nanded',
  `Drive_Description` varchar(1400) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BLANK',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `Email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'root',
  `user_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`Email`, `password`, `user_type`, `created_at`, `updated_at`) VALUES
('s13_ghan_prachi@mgmcen.ac.in', '$2y$10$OjRDZaH0e9mtt3pnbfQUQ.ku5zdNLVohVr5C.TzDMmEgVDPMHVUHi', 'student', NULL, NULL),
('s13_shinde_purushotam@mgmcen.ac.in', '$2y$10$AMv28crTK2Y9Z/taL26ad.3NzeIl9ROkCPzwvUiIjvv66ZTz1pirS', 'student', NULL, NULL),
('s14_bulbule_rakshanda@mgmcen.ac.in', '$2y$10$yIp08eIBcyEoEHHt/t7houGsm5HOkmubN1GJPYBBFfSzJfUWgrBte', 'student', NULL, NULL),
('s14_chincholkar_omkar@mgmcen.ac.in', '$2y$10$VR0nW3EiNTwBeeL6gYGU4OTyNaSFhi1sdXfCE98muWeGMOMGrW1EG', 'student', NULL, NULL),
('s14_mangnale_rohini@mgmcen.ac.in', '$2y$10$V9IxlJfbQvP7ub/D7HkCgOmqku6N2Y/BwIYSI0qflAbTUOSsSa.3a', 'student', NULL, NULL),
('s14_narwade_nikita@mgmcen.ac.in', '$2y$10$DEmRFyxalS/5X/lyWAxHouqkHW8NE4evF.NgFZu.V9/H84aE9ExfC', 'student', NULL, NULL),
('s15_bobde_neha@mgmcen.ac.in', '$2y$10$6MrHgd9dLH7bHwJQu78fBeplbiS2mjUrT06wLN3iAC5F4YNzBzCKG', 'student', NULL, NULL),
('s15_chaware_vishal@mgmcen.ac.in', '$2y$10$2pb2.Kgcq.Dk2O6crTFML.YaKVNgsh78KL49D/bGoO1iAZfi1fTsK', 'student', NULL, NULL),
('s15_gavhane_prajakta@mgmcen.ac.in', '$2y$10$KXVqTQiB/CrT0Cx4Q240cuf4weKZ/MsMtjZ5PNPweo6Lc263dR38i', 'student', NULL, NULL),
('s15_khandare_sushil@mgmcen.ac.in', '$2y$10$Wq9exXr9Tly74yCoagHcx.uR693Q14SCmVutiuda3d16K30yvMGMq', 'student', NULL, NULL),
('s15_lakshatwar_ravikumar@mgmcen.ac.in', '$2y$10$d.u3nZwwPijtoolfnmeRzOXhhDTuf9NYWJxim7rPJvpYlGN2yEfjm', 'student', NULL, NULL),
('s15_pawar_pratiksha@mgmcen.ac.in', '$2y$10$.XTCKzFHK9BLnVpFFi9FQuIu5YKhBHyrxNVotEqNsJb.A8GadxANe', 'student', NULL, NULL),
('s15_rathod_megha@mgmcen.ac.in', '$2y$10$mWHi4.tIYHUy9dU7EXZJa.0mMWiVRMWqxT.ZFyVqBzhL.WoSa.QKi', 'student', NULL, NULL),
('s15_shete_rakshanda@mgmcen.ac.in', '$2y$10$YEydGqy2Thkj98CzIsUykOIGSS/p3GtqnclX9waMnffSJ0gwweLGS', 'student', NULL, NULL),
('s15_shinde_sneha@mgmcen.ac.in', '$2y$10$LKPFtJjYU3ACqp8HqrtXM.sNzivq1b/mqeYPmnnrxuiO.ucG0QiYe', 'student', NULL, NULL),
('s16_abdul_rahman@mgmcen.ac.in', '$2y$10$oIH9UFOzXdnm8o/DcupPyu4HoF3ozljT/d9/SvRbBdDIYBQhUvKaK', 'student', NULL, NULL),
('s16_bagate_abhishek@mgmcen.ac.in', '$2y$10$aVzBOPV4drdqjvTnsZivOuGKegEGRZAvcZx4SgHSQ.kZ1ZEX03qIa', 'student', NULL, NULL),
('s16_bhadke_shweta@mgmcen.ac.in', '$2y$10$1qiM8xVcH2o5763TM/qOoexNVaPtClXCgoU8K9wIr93HVB0zQIYl6', 'student', NULL, NULL),
('s16_bhanushali_pooja@mgmcen.ac.in', '$2y$10$6F6G1iUNVfthooMuR97lyuonDnQykoyRYlKkc4Cq6k6QzAr/BGl5m', 'student', NULL, NULL),
('s16_bhartiya_shubham@mgmcen.ac.in', '$2y$10$qD.ITvYYVZCHSZDGLVIRzuY17aSw4RC6YDKW9MadVRMCL7SyJrqW.', 'student', NULL, NULL),
('s16_chavan_kavita@mgmcen.ac.in', '$2y$10$AchKLmfHOkwoTDKH6PGAn./mZYsrC5nXJgJ2y1DxK1ohwlgYCXIfC', 'student', NULL, NULL),
('s16_chavan_nikita@mgmcen.ac.in', '$2y$10$ESRevpFFS0NgR1PFN85NTuEGhbx6WE6Fc6SFukcw6Qh6mL6TtZmS6', 'student', NULL, NULL),
('s16_chincholkar_nikita@mgmcen.ac.in', '$2y$10$raEbSFue3u3dmOazankD8.PG1aKr4K9fQ1n.xK.bRiCd8mAiiHISu', 'student', NULL, NULL),
('s16_chourange_anuj@mgmcen.ac.in', '$2y$10$lN8Zi38WC5NHCGX2nsJUwOjn2Tmz815xKfCeQm4RvTuCLD2BA65KW', 'student', NULL, NULL),
('s16_darbastewar_sakshi@mgmcen.ac.in', '$2y$10$Hha4aqa3D3yPSnvRqkWt.O3JNdnfNUoI6875qHaQibVifq2Lm4s.S', 'student', NULL, NULL),
('s16_deshpande_omkar@mgmcen.ac.in', '$2y$10$hHmhNYhw0u7v1OecNiES4.FFG0j9hgK/hLAl5u/8shJhoiq593Ll2', 'student', NULL, NULL),
('s16_dharasurkar_saee@mgmcen.ac.in', '$2y$10$JwNK5xg4aJkKyVfuxGukQekw/iThh263.bj8W7hzPXq/o5fgb9fpe', 'student', NULL, NULL),
('s16_dhembre_shivam@mgmcen.ac.in', '$2y$10$xLYUZLPLJXIG549Y2UHeXei1IRK0j/d.6L/XikjRbbJzz1reN07ay', 'student', NULL, NULL),
('s16_gattani_shamali@mgmcen.ac.in', '$2y$10$0Bbdg0HESysS5urhYQXdAeEzmpSZ0cJ0Y79uJ36Ezdb3DS1sOsWMq', 'student', NULL, NULL),
('s16_gurhale_rushikesh@mgmcen.ac.in', '$2y$10$WcdMw013jW9/7tjT6SPNlOTY42BzSD8uoS9vokyEs5ua9P3G4de3m', 'student', NULL, NULL),
('s16_hirwe_shabaree@mgmcen.ac.in', '$2y$10$RmyroRtb5BMVyZ4T773CQuoUF6VuuV56wD1hEVDtM/n845iaEvD/2', 'student', NULL, NULL),
('s16_jadhav_aditi@mgmcen.ac.in', '$2y$10$ICS7u6qwi8GqdttAE2TI3.DesCBu7BD94ggw8jsV7PRzvEE.x.73.', 'student', NULL, NULL),
('s16_joshi_gargi@mgmcen.ac.in', '$2y$10$1GNTjKDNBzpX9z8D4aolX.MjQd5/bL6GpccZqjkMxa2xtfMuklUeq', 'student', NULL, NULL),
('s16_julur_shweta@mgmcen.ac.in', '$2y$10$3zlmnhnLgD/MQu4OXyOvO.Jh1tZ0wfXPCxUNo6eCmmKGmQ1wMUNIW', 'student', NULL, NULL),
('s16_kalaskar_priyanka@mgmcen.ac.in', '$2y$10$bKtQqRiG48uto8VGarCELuNb2JEu2XlKrVAQFCAfSKaE1cmG1Dsb6', 'student', NULL, NULL),
('s16_kaminwar_minal@mgmcen.ac.in', '$2y$10$e/7XEtRf3YPfHezdLth3U.hnlekgPFgaeG11iITonoVHssk5C8fEa', 'student', NULL, NULL),
('s16_kapratwar_sampada@mgmcen.ac.in', '$2y$10$Q9wPOUbjUSNUTOn3yvBTiegZNIyUtCuGeNp2kiA7OMoy5aLRJOKVi', 'student', NULL, NULL),
('s16_kharat_srikant@mgmcen.ac.in', '$2y$10$4SttLa5xmotEOUugVMs6LuoBGBL8T7PWw/q2QDW.MEFHU/ZVnJIpO', 'student', NULL, NULL),
('s16_kulkarni_sadichcha@mgmcen.ac.in', '$2y$10$A6vc3XzM1xjHme8ZutS1QOm8itVdfW/H.OXd2Di0vfQkKXgfkZVcq', 'student', NULL, NULL),
('s16_kulkarni_samiksha@mgmcen.ac.in', '$2y$10$.oW54MLI9O70CNkOhUncVOESIa5WYkn4Bn0uQGbDnfsOiUWk3SPMO', 'student', NULL, NULL),
('s16_mahajan_snehal@mgmcen.ac.in', '$2y$10$d8JZsvcYnXT1bX62qRT0auTMts.l6dm6/UEqP9Ddt19isaU0VgEY.', 'student', NULL, NULL),
('s16_mange_ashok@mgmcen.ac.in', '$2y$10$5pYDiFoh/vtzHsFP3o31ee2VnS4ICCOM3cXbEmMTuogbEaUljR1F2', 'student', NULL, NULL),
('s16_mukhedkar_samiksha@mgmcen.ac.in', '$2y$10$ZquhUVtfVhyINxZ.gLbAeO7ojPk9veGDNSsAXIsynPhYI.SO6c28e', 'student', NULL, NULL),
('s16_mundada_shraddha@mgmcen.ac.in', '$2y$10$4VMbmWRtTKcmqwPR/qmyC.3nGIBRpS3kDKqURVMw.5G33pEhq4VF2', 'student', NULL, NULL),
('s16_namoshe_pragati@mgmcen.ac.in', '$2y$10$1XWxeGe0BGLNOS9QzeCJL.7tdPA/49yR9rLQMBurRGzXVngC1lRoG', 'student', NULL, NULL),
('s16_patil_sharda@mgmcen.ac.in', '$2y$10$JL/u84xCZpmYZGp2BSxFseJlxKougChVe9uWcZplsEFnd3i6ck/i6', 'student', NULL, NULL),
('s16_patil_waghraj@mgmcen.ac.in', '$2y$10$Sdk/XR.3J20MER518ACUIebLQq5kWW3m3euxHWX62D5jmtxfRZ/Ue', 'student', NULL, NULL),
('s16_pattewar_atul@mgmcen.ac.in', '$2y$10$freUAEOv0xNAZPNszwCh3e7mtLYJ.Vt7CAuzsZSt4vN5dq0rNHoN.', 'student', NULL, NULL),
('s16_pawar_pooja@mgmcen.ac.in', '$2y$10$Dn1oHQoAOuxvb3axKk2w8OdDMPFFYhydo1oMlu3keYePMH3lj0pn2', 'student', NULL, NULL),
('s16_phulari_prashant@mgmcen.ac.in', '$2y$10$7sLTaRHlKgeM0AVl3iEih.PlLOCttok9mr6micQe94MwUtrrHDPRW', 'student', NULL, NULL),
('s16_pophale_mayuresh@mgmcen.ac.in', '$2y$10$vF79Yly9EOwsTejCtYgwDuhG7EFUt0D5XgJgTsqfkC6oS60OxbJWu', 'student', NULL, NULL),
('s16_populwar_priyanka@mgmcen.ac.in', '$2y$10$CfiPb3aH/RXfXfjEQ/inv.wipAm.SUO.5ZDvB9I96qQERI1WwcZ3G', 'student', NULL, NULL),
('s16_rai_shubham@mgmcen.ac.in', '$2y$10$lTDfBAEXqKGWkUcP65PInOd2jdXu95/uT/uHRGiCK8HOaSMre9vyK', 'student', NULL, NULL),
('s16_rathod_shubham@mgmcen.ac.in', '$2y$10$x3WBFSsmF2DSotfZC9ePaO3rdhp0mmLvUaItQA1bJ0keNn4d5cj02', 'student', NULL, NULL),
('s16_sabbanwar_dipak@mgmcen.ac.in', '$2y$10$bFyH1FDaLfXpRHe5ncdNzux1KjbjlDl2CQIneBAbdRAKgt.vyrseq', 'student', NULL, NULL),
('s16_sandukwar_rushikesh@mgmcen.ac.in', '$2y$10$cBoFypyMNN1miWrOCebhO.LEDBBtKg7sl12YyRuTmt6yx2wuZAcri', 'student', NULL, NULL),
('s16_sayyad_fahad@mgmcen.ac.in', '$2y$10$0fcu9f9Q/4pCGlHYxBrnHegu8rzu1lAwKfwUR81hADR6tr8J5FmQ2', 'student', NULL, NULL),
('s16_shinde_ganesh@mgmcen.ac.in', '$2y$10$X4dStrRMymMpgRvVoC.rr.VNPk8EMugo2lfUX0x3odQ6090wNN8Ai', 'student', NULL, NULL),
('s16_shinde_kartiki@mgmcen.ac.in', '$2y$10$BfONz6SYlKQameIfG7L9o.2lgZGUE.1kisDDGZUUTYXhJoh3j48oe', 'student', NULL, NULL),
('s16_siddiqui_sufyan@mgmcen.ac.in', '$2y$10$DlwObu5BYohDNE8Z2o0FUOM0DdDsogdf.QuuYc06AFDSzRC8mxT2i', 'student', NULL, NULL),
('s16_sumit_kumar@mgmcen.ac.in', '$2y$10$7FWia.Mll.JWkDCFr.mWq.MGV91ev/Cc4UVagidxSnTpuK/BWcdHi', 'student', NULL, NULL),
('s16_suryawanshi_mahesh@mgmcen.ac.in', '$2y$10$WiNCNkojgE04DBRXKreAY.Fqf3VqNuQBxBTzlDVzsFCz/vwB0a.56', 'student', NULL, NULL),
('s16_suryawanshi_santosh@mgmcen.ac.in', '$2y$10$jXohjLqa2AT4/Ec7VCxISeX3wMPtXe/kb.Vt0tKmGCnC2xr7fqg3K', 'student', NULL, NULL),
('s16_tehra_anuja@mgmcen.ac.in', '$2y$10$4Q2adfrKvPNGSBTwLn6KcuPV0sadvQ6ppynUhRokZXJAmu3KBPjTK', 'student', NULL, NULL),
('s16_thorat_rajeet@mgmcen.ac.in', '$2y$10$jMS6mY8i0pint/U9H8oyb.M5IpAnRGHoTbcLXXAt4pXcU6z725vxW', 'student', NULL, NULL),
('s16_vaidya_shivani@mgmcen.ac.in', '$2y$10$a9SQQABZXKsw8L0NwRku0.iocHPx1XnCwCI69zkLy5w9GZbndWCS.', 'student', NULL, NULL),
('s16_walbe_pratiksha@mgmcen.ac.in', '$2y$10$TEPdz8sS7jfTHg5IRIYWKu8Zv15NYt6u98KyH61mkzg3NI7SGTYTa', 'student', NULL, NULL),
('sd16_hallale_jyoti@mgmcen.ac.in', '$2y$10$qdhsYEAzjqdHbdQTGT/Uf.TYD4wC3UMWjx.sHf4hDucNVXqlxktlS', 'student', NULL, NULL),
('sd16_nehad_fatema@mgmcen.ac.in', '$2y$10$GzonE0493ZDF2avLGNJ37unRz2svKru4sXOIpb3FOit4mZsHtFpv2', 'student', NULL, NULL),
('sd17_awale_shubham@mgmcen.ac.in', '$2y$10$8SQ/h/IgaiGmnaOLuybPvuB4Cgea1u9BEEvZM0BCnzKsmw8CM0Tta', 'student', NULL, NULL),
('sd17_bhange_rupali@mgmcen.ac.in', '$2y$10$HmVWFupekb/Dd4HWkPSuL.kUl2pXnf2jb28ofBbPtq9gdKIU5pau2', 'student', NULL, NULL),
('sd17_chavan_ashwini@mgmcen.ac.in', '$2y$10$hcUd3yb1qusNFY11hsvPQeAv3sUZG03/Q025epwVUQkhXX7EbOfsK', 'student', NULL, NULL),
('sd17_choudhary_trupti@mgmcen.ac.in', '$2y$10$K9nicbSzPkKtnSnQV76ZE.f4zW39wuIP6eGI2vgCTFMr8U1ztX4q6', 'student', NULL, NULL),
('sd17_damkondwar_pratiksha@mgmcen.ac.in', '$2y$10$ENYLZvhObWtagW427419cuX0WOXhuI4QlgCzAPxGemg0pdN7CTIoG', 'student', NULL, NULL),
('sd17_deshmukh_shraddha@mgmcen.ac.in', '$2y$10$AjTLvElRC7TF9hu1BR/vXuaSAEo7Fk7OPsM8sxULLZ0sdlA79cK3q', 'student', NULL, NULL),
('sd17_dongare_pramodita@mgmcen.ac.in', '$2y$10$55WqJzKR2VMzp7Y/rfik/O60yRQSrCV0DMp7fJGWdnjU1PHcbD1K2', 'student', NULL, NULL),
('sd17_godbole_supriya@mgmcen.ac.in', '$2y$10$1sNxCjLxFES91N3HD8nNoukryrYwpW/0xxiIQs.8tLaFDTPHy.S72', 'student', NULL, NULL),
('sd17_javeedkhan_raheen@mgmcen.ac.in', '$2y$10$W6zkSW2iyJML43m.qPzxEeJNnjP6h9oXPEFV6hxPC4Ee6pRnLkf.q', 'student', NULL, NULL),
('sd17_javeriyabano_hussain@mgmcen.ac.in', '$2y$10$1HkOkt7Elw8yOnM476pIQeOoA.DryEDM6LjD5wjeyY2ruXR1hVAtS', 'student', NULL, NULL),
('sd17_kamble_sonam@mgmcen.ac.in', '$2y$10$g7.zCTgSSMy10JEjZ18qRet0U9nbOvlt9dx1bKwjjbtKYnmxHgdrC', 'student', NULL, NULL),
('sd17_kandharkar_rachana@mgmcen.ac.in', '$2y$10$hXF6Wls1wokfJQQgXWlEXu1AAxMd8P.PVMn93WFJn7Dlb/guWbY5S', 'student', NULL, NULL),
('sd17_kattajiwar_soujanya@mgmcen.ac.in', '$2y$10$RhOIguhBaf5mI.7ZyLZPaeKXzkuW.QFDo8jLrJXSvjqpc0vKWoqcK', 'student', NULL, NULL),
('sd17_khandare_pallavi@mgmcen.ac.in', '$2y$10$U5JsRqwC.RyGbaMRE/sV/OPB94hxMAWcZ9r3mFxfQZC1QM1SB8UJ6', 'student', NULL, NULL),
('sd17_khodke_geeta@mgmcen.ac.in', '$2y$10$8knkST6Zf0i0AIBOuTM6eOlGXVzhPjSmU/Wrpz2Z4CMAbkcCwksZm', 'student', NULL, NULL),
('sd17_kulkarni_vaishnavi@mgmcen.ac.in', '$2y$10$BShQKFTa6LwnpXZYedKum.3dMLhlqSJPV74zrCh4fkvJkSRyDJeZy', 'student', NULL, NULL),
('sd17_nilawar_shradha@mgmcen.ac.in', '$2y$10$DrSGwtqfm1h7axgsS4BOPOKcbFDYkCHrV4qK1IlpwUsFa94UyWrmC', 'student', NULL, NULL),
('sd17_palkratwar_surabhi@mgmcen.ac.in', '$2y$10$BF7Low4l.PZOxM1HDFmrt.YlLJ2c8tHVCysPiRPC4Cgtbh9ziFiX.', 'student', NULL, NULL),
('sd17_parikh_falguni@mgmcen.ac.in', '$2y$10$l3qpWXSdut5JObJ0tnqE7Om620rsFWIz9U8mWkWKzKDLakGVJWzhK', 'student', NULL, NULL),
('sd17_patil_pratima@mgmcen.ac.in', '$2y$10$IS4ZPZJXMPlvEnMeD60gw.nsdJQJ0gXc098YwZNFfORY/0o0RolWm', 'student', NULL, NULL),
('sd17_sandhu_parminderpalkaur@mgmcen.ac.in', '$2y$10$6YSKXiGg6DCiFk6nxwvOIuz7QTzbhoIOKFa2adkWLTDkWrllqZVwi', 'student', NULL, NULL),
('sd17_shaikh_furkhan@mgmcen.ac.in', '$2y$10$Pzy5ga16OJDW5wnUlR9NxOWHO7ijyfc5OzHIe2y.pkzplGIsc0zYi', 'student', NULL, NULL),
('sd17_shirse_mangaltai@mgmcen.ac.in', '$2y$10$Z.oJE08aZ0sOVq.xIXpaqO/3vvE2AJtP3zo7c1AusmgklZJUCXEDy', 'student', NULL, NULL),
('sd17_sontakke_pooja@mgmcen.ac.in', '$2y$10$r.xEWr2ujkipzlFnEBUNPOmC1nz.j4BTN40xrg0WOBNfjgZLcEBw.', 'student', NULL, NULL),
('sd17_suryawanshi_sachin@mgmcen.ac.in', '$2y$10$APnrHRXM2gIMEzaJYr6X2ORerFu3qBuovxZzvhLE4yF9mhvl0FGHe', 'student', NULL, NULL),
('sd17_tekale_sangita@mgmcen.ac.in', '$2y$10$Nd8vk2rl7s7LYSVRhM0pROQ3aIxHys.ce3LR.bwgmoJJkvVMzAmtO', 'student', NULL, NULL),
('sd17_tekale_savita@mgmcen.ac.in', '$2y$10$tXXwvhRsqapzH.SlN5SNAeroKY/wdsj.Z4uOyycLYrbwBKR5Hhc52', 'student', NULL, NULL),
('sd17_trimale_priyanka@mgmcen.ac.in', '$2y$10$qkpWYSYvRUu3O/5Q5rFLQeWRIf3VTIVcw8MMjBgio8pwnW5dOqisW', 'student', NULL, NULL),
('sd17_waghmare_rupali@mgmcen.ac.in', '$2y$10$kiKeYAPPSOU8IuHfycQI2O1RIQMWSvLNwkwqWs.d5fXb.4viQbKQm', 'student', NULL, NULL),
('sd17_wandre_ankita@mgmcen.ac.in', '$2y$10$qKy/c2ijrTrNlkb1yNA.Reo4ans12C76iA7W/Lyph/PyhTJiKt1fu', 'student', NULL, NULL),
('st17_bagdiya_ruchita@mgmcen.ac.in', '$2y$10$3gc7Zwbet/UrFHE4syElMeqpy9mRywfifZq8pGe6/6Ao2mJ96iEC2', 'student', NULL, NULL),
('st17_chapule_akshata@mgmcen.ac.in', '$2y$10$xFO0E.AySedqXWaa.e2vCuIrFkZ.IpO3L0menLkxpQPsUVsBb9y5C', 'student', NULL, NULL),
('tpo@mgmcen.ac.in', '$2y$10$75pORwHpVavCqRhJiZW0muBBjOpdRIDg5u1Ay9atMjuxgP5FHFXfW', 'tpo', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_27_090031_create_main_d_b_s_table', 1),
(2, '2019_09_15_083607_create_users_table', 1),
(3, '2019_09_15_083650_create_password_resets_table', 1),
(4, '2019_10_20_072835_create_payments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `Notice_ID` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Auth_ID` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `Notice_Subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BLANK',
  `Notice_Content` varchar(800) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BLANK',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sd17_shaikh_furkhan@mgmcen.ac.in', NULL, NULL),
('s16_abdul_rahman@mgmcen.ac.in', NULL, NULL),
('sd17_javeedkhan_raheen@mgmcen.ac.in', NULL, NULL),
('sd17_awale_shubham@mgmcen.ac.in', NULL, NULL),
('st17_bagdiya_ruchita@mgmcen.ac.in', NULL, NULL),
('sd17_bhange_rupali@mgmcen.ac.in', NULL, NULL),
('s16_bhartiya_shubham@mgmcen.ac.in', NULL, NULL),
('s15_bobde_neha@mgmcen.ac.in', NULL, NULL),
('s14_bulbule_rakshanda@mgmcen.ac.in', NULL, NULL),
('st17_chapule_akshata@mgmcen.ac.in', NULL, NULL),
('sd17_chavan_ashwini@mgmcen.ac.in', NULL, NULL),
('s16_chavan_kavita@mgmcen.ac.in', NULL, NULL),
('s16_chavan_nikita@mgmcen.ac.in', NULL, NULL),
('tpo@mgmcen.ac.in', NULL, NULL),
('s15_chavre_vishal@mgmcen.ac.in', NULL, NULL),
('s15_chaware_vishal@mgmcen.ac.in', NULL, NULL),
('s15_chaware_vishal@mgmcen.ac.in', NULL, NULL),
('s16_chincholkar_nikita@mgmcen.ac.in', NULL, NULL),
('s14_chincholkar_omkar@mgmcen.ac.in', NULL, NULL),
('sd17_choudhary_trupti@mgmcen.ac.in', NULL, NULL),
('sd17_damkondwar_pratiksha@mgmcen.ac.in', NULL, NULL),
('s16_darbastewar_sakshi@mgmcen.ac.in', NULL, NULL),
('sd17_deshmukh_shraddha@mgmcen.ac.in', NULL, NULL),
('s16_dharasurkar_saee@mgmcen.ac.in', NULL, NULL),
('s16_dhembre_shivam@mgmcen.ac.in', NULL, NULL),
('sd17_dongare_pramodita@mgmcen.ac.in', NULL, NULL),
('sd17_godbole_supriya@mgmcen.ac.in', NULL, NULL),
('s16_gurhale_rushikesh@mgmcen.ac.in', NULL, NULL),
('sd16_hallale_jyoti@mgmcen.ac.in', NULL, NULL),
('s16_hirwe_shabaree@mgmcen.ac.in', NULL, NULL),
('s16_jadhav_aditi@mgmcen.ac.in', NULL, NULL),
('s16_kalaskar_priyanka@mgmcen.ac.in', NULL, NULL),
('sd17_kamble_sonam@mgmcen.ac.in', NULL, NULL),
('sd17_kandharkar_rachana@mgmcen.ac.in', NULL, NULL),
('sd17_kattajiwar_soujanya@mgmcen.ac.in', NULL, NULL),
('sd17_khandare_pallavi@mgmcen.ac.in', NULL, NULL),
('s15_khandare_sushil@mgmcen.ac.in', NULL, NULL),
('s16_kharat_srikant@mgmcen.ac.in', NULL, NULL),
('sd17_khodke_geeta@mgmcen.ac.in', NULL, NULL),
('sd17_kulkarni_vaishnavi@mgmcen.ac.in', NULL, NULL),
('s15_lakshatwar_ravikumar@mgmcen.ac.in', NULL, NULL),
('s16_mange_ashok@mgmcen.ac.in', NULL, NULL),
('s14_mangnale_rohini@mgmcen.ac.in', NULL, NULL),
('s16_mukhedkar_samiksha@mgmcen.ac.in', NULL, NULL),
('s16_namoshe_pragati@mgmcen.ac.in', NULL, NULL),
('sd17_nilawar_shradha@mgmcen.ac.in', NULL, NULL),
('sd17_palkratwar_surabhi@mgmcen.ac.in', NULL, NULL),
('sd17_parikh_falguni@mgmcen.ac.in', NULL, NULL),
('sd17_patil_pratima@mgmcen.ac.in', NULL, NULL),
('s16_patil_sharda@mgmcen.ac.in', NULL, NULL),
('s16_patil_waghraj@mgmcen.ac.in', NULL, NULL),
('s16_pattewar_atul@mgmcen.ac.in', NULL, NULL),
('s16_pawar_pooja@mgmcen.ac.in', NULL, NULL),
('s16_phulari_prashant@mgmcen.ac.in', 'NULL', NULL),
('s16_pophale_mayuresh@mgmcen.ac.in', NULL, NULL),
('s16_populwar_priyanka@mgmcen.ac.in', NULL, NULL),
('s15_rathod_megha@mgmcen.ac.in', NULL, NULL),
('s16_rathod_shubham@mgmcen.ac.in', NULL, NULL),
('s16_sabbanwar_dipak@mgmcen.ac.in', NULL, NULL),
('sd17_sandhu_parminderpalkaur@mgmcen.ac.in', NULL, NULL),
('s16_sandukwar_rushikesh@mgmcen.ac.in', NULL, NULL),
('s16_sayyad_fahad@mgmcen.ac.in', NULL, NULL),
('s15_shete_rakshanda@mgmcen.ac.in', NULL, NULL),
('sd17_shirse_mangaltai@mgmcen.ac.in', NULL, NULL),
('s16_siddiqui_sufyan@mgmcen.ac.in', NULL, NULL),
('sd17_sontakke_pooja@mgmcen.ac.in', NULL, NULL),
('s16_sumit_kumar@mgmcen.ac.in', NULL, NULL),
('s16_suryawanshi_mahesh@mgmcen.ac.in', NULL, NULL),
('sd17_suryawanshi_sachin@mgmcen.ac.in', NULL, NULL),
('s16_suryawanshi_santosh@mgmcen.ac.in', NULL, NULL),
('s16_tehra_anuja@mgmcen.ac.in', NULL, NULL),
('sd17_tekale_sangita@mgmcen.ac.in', NULL, NULL),
('sd17_tekale_savita@mgmcen.ac.in', NULL, NULL),
('s16_thorat_rajeet@mgmcen.ac.in', NULL, NULL),
('sd17_trimale_priyanka@mgmcen.ac.in', NULL, NULL),
('sd17_waghmare_rupali@mgmcen.ac.in', NULL, NULL),
('sd17_wandre_ankita@mgmcen.ac.in', NULL, NULL),
('s15_gavhane_prajakta@mgmcen.ac.in', NULL, NULL),
('s16_shinde_ganesh@mgmcen.ac.in', NULL, NULL),
('sd17_javeriyabano_hussain@mgmcen.ac.in', NULL, NULL),
('sd17_javeriyabano_hussain@mgmcen.ac.in', NULL, NULL),
('sd16_nehad_fatema@mgmcen.ac.in', NULL, NULL),
('s15_pawar_pratiksha@mgmcen.ac.in', NULL, NULL),
('s13_shinde_purushotam@mgmcen.ac.in', NULL, NULL),
('s13_ghan_prachi@mgmcen.ac.in', NULL, NULL),
('s15_shinde_sneha@mgmcen.ac.in', NULL, NULL),
('s16_bagate_abhishek@mgmcen.ac.in', NULL, NULL),
('s16_bhadke_shweta@mgmcen.ac.in', NULL, NULL),
('s16_bhanushali_pooja@mgmcen.ac.in', NULL, NULL),
('s16_chourange_anuj@mgmcen.ac.in', NULL, NULL),
('s16_deshpande_omkar@mgmcen.ac.in', NULL, NULL),
('s16_gattani_shamali@mgmcen.ac.in', NULL, NULL),
('s16_joshi_gargi@mgmcen.ac.in', NULL, NULL),
('s16_julur_shweta@mgmcen.ac.in', NULL, NULL),
('s16_kaminwar_minal@mgmcen.ac.in', NULL, NULL),
('s16_kulkarni_samiksha@mgmcen.ac.in', NULL, NULL),
('s16_mahajan_snehal@mgmcen.ac.in', NULL, NULL),
('s16_mundada_shraddha@mgmcen.ac.in', NULL, NULL),
('s16_vaidya_shivani@mgmcen.ac.in', NULL, NULL),
('s16_walbe_pratiksha@mgmcen.ac.in', NULL, NULL),
('s16_rai_shubham@mgmcen.ac.in', NULL, NULL),
('s14_narwade_nikita@mgmcen.ac.in', NULL, NULL),
('s16_shinde_kartiki@mgmcen.ac.in', NULL, NULL),
('s16_kulkarni_sadichcha@mgmcen.ac.in', NULL, NULL),
('s16_kapratwar_sampada@mgmcen.ac.in', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CASERP_ID` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Activity_ID` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Transaction_ID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `CASERP_ID`, `Activity_ID`, `order_id`, `Transaction_ID`, `status`, `Amount`, `created_at`, `updated_at`) VALUES
(1, 's1032170390', '5db32914301b4', '5db329acbf694', '20191025111212800110168747600960777', 'complete', 1000, '2019-10-24 17:58:20', '2019-10-25 05:58:36'),
(2, 's1032170390', '5db5409f20fb0', '5db5418648ba7', '20191027111212800110168657100968034', 'complete', 3000, '2019-10-26 20:04:38', '2019-10-26 20:07:46'),
(3, 's1032170390', '5db9b9d3144de', '5db9ba5e02faa', '20191030111212800110168378800982170', 'complete', 3000, '2019-10-29 17:29:18', '2019-10-30 05:30:06'),
(4, 's1032170390', '5db9b9d3144de', '5db9bb0e0609b', '20191030111212800110168940700957015', 'complete', 3000, '2019-10-29 17:32:14', '2019-10-30 05:32:40'),
(5, 's1032170465', '5db9b9d3144de', '5dbacc553fae1', '20191031111212800110168548300959975', 'complete', 3000, '2019-10-31 06:28:13', '2019-10-31 06:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `placement_details`
--

CREATE TABLE `placement_details` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `Email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `Placement_Status` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Placed',
  `Company_Name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `Package` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `placement_details`
--

INSERT INTO `placement_details` (`ID`, `Email`, `Placement_Status`, `Company_Name`, `Package`, `created_at`, `updated_at`) VALUES
(1, 'sd17_shaikh_furkhan@mgmcen.ac.in', 'Placed', 'TCS', '3.3 LPA', NULL, NULL),
(2, 's16_abdul_rahman@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(3, 'sd17_javeedkhan_raheen@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(4, 'sd17_awale_shubham@mgmcen.ac.in', 'Placed', 'Sankey Solutions', '3.00 LPA', NULL, NULL),
(5, 'st17_bagdiya_ruchita@mgmcen.ac.in', 'Entrepreneur', 'SRTMUN', '5 LPA', NULL, NULL),
(6, 'sd17_bhange_rupali@mgmcen.ac.in', 'Placed', 'Sankey Solutions', '3.00 LPA', NULL, NULL),
(7, 's16_bhartiya_shubham@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(8, 's15_bobde_neha@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(9, 's14_bulbule_rakshanda@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(10, 'st17_chapule_akshata@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(11, 'sd17_chavan_ashwini@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(12, 's16_chavan_kavita@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(13, 's16_chavan_nikita@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(17, 's15_chaware_vishal@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(18, 's16_chincholkar_nikita@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(19, 's14_chincholkar_omkar@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(20, 'sd17_choudhary_trupti@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(21, 'sd17_damkondwar_pratiksha@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(22, 's16_darbastewar_sakshi@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(23, 'sd17_deshmukh_shraddha@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(24, 's16_dharasurkar_saee@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(25, 's16_dhembre_shivam@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(26, 'sd17_dongare_pramodita@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(27, 'sd17_godbole_supriya@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(28, 's16_gurhale_rushikesh@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(29, 'sd16_hallale_jyoti@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(30, 's16_hirwe_shabaree@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(31, 's16_jadhav_aditi@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(32, 's16_kalaskar_priyanka@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(33, 'sd17_kamble_sonam@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(34, 'sd17_kandharkar_rachana@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(35, 'sd17_kattajiwar_soujanya@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(36, 'sd17_khandare_pallavi@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(37, 's15_khandare_sushil@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(38, 's16_kharat_srikant@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(39, 'sd17_khodke_geeta@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(40, 'sd17_kulkarni_vaishnavi@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(41, 's15_lakshatwar_ravikumar@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(42, 's16_mange_ashok@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(43, 's14_mangnale_rohini@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(44, 's16_mukhedkar_samiksha@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(45, 's16_namoshe_pragati@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(46, 'sd17_nilawar_shradha@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(47, 'sd17_palkratwar_surabhi@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(48, 'sd17_parikh_falguni@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(49, 'sd17_patil_pratima@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(50, 's16_patil_sharda@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(51, 's16_patil_waghraj@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(52, 's16_pattewar_atul@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(53, 's16_pawar_pooja@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(54, 's16_phulari_prashant@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(55, 's16_pophale_mayuresh@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(56, 's16_populwar_priyanka@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(57, 's15_rathod_megha@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(58, 's16_rathod_shubham@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(59, 's16_sabbanwar_dipak@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(60, 'sd17_sandhu_parminderpalkaur@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(61, 's16_sandukwar_rushikesh@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(62, 's16_sayyad_fahad@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(63, 's15_shete_rakshanda@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(64, 'sd17_shirse_mangaltai@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(65, 's16_siddiqui_sufyan@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(66, 'sd17_sontakke_pooja@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(67, 's16_sumit_kumar@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(68, 's16_suryawanshi_mahesh@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(69, 'sd17_suryawanshi_sachin@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(70, 's16_suryawanshi_santosh@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(71, 's16_tehra_anuja@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(72, 'sd17_tekale_sangita@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(73, 'sd17_tekale_savita@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(74, 's16_thorat_rajeet@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(75, 'sd17_trimale_priyanka@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(76, 'sd17_waghmare_rupali@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(77, 'sd17_wandre_ankita@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(78, 's15_gavhane_prajakta@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(79, 's16_shinde_ganesh@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(81, 'sd17_javeriyabano_hussain@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(82, 'sd16_nehad_fatema@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(83, 's15_pawar_pratiksha@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(84, 's13_shinde_purushotam@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(85, 's13_ghan_prachi@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(86, 's15_shinde_sneha@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(87, 's16_bagate_abhishek@mgmcen.ac.in', 'Placed', 'Infosys', '3.6 LPA', NULL, NULL),
(88, 's16_bhadke_shweta@mgmcen.ac.in', 'Placed', 'Sankey Solutions', '3.00 LPA', NULL, NULL),
(89, 's16_bhanushali_pooja@mgmcen.ac.in', 'Placed', 'TCS', '3.3 LPA', NULL, NULL),
(90, 's16_chourange_anuj@mgmcen.ac.in', 'Placed', 'Sankey Solutions', '3.00 LPA', NULL, NULL),
(91, 's16_deshpande_omkar@mgmcen.ac.in', 'Placed', 'Infosys', '8.00 LPA', NULL, NULL),
(92, 's16_gattani_shamali@mgmcen.ac.in', 'Placed', 'TCS', '3.3 LPA', NULL, NULL),
(93, 's16_joshi_gargi@mgmcen.ac.in', 'Placed', 'TCS', '3.3 LPA', NULL, NULL),
(94, 's16_julur_shweta@mgmcen.ac.in', 'Placed', 'Sankey Solutions', '3.00 LPA', NULL, NULL),
(95, 's16_kaminwar_minal@mgmcen.ac.in', 'Placed', 'Sankey Solutions', '3.00 LPA', NULL, NULL),
(96, 's16_kulkarni_samiksha@mgmcen.ac.in', 'Placed', 'Sankey Solutions', '3.00 LPA', NULL, NULL),
(97, 's16_mahajan_snehal@mgmcen.ac.in', 'Placed', 'TCS', '3.3 LPA', NULL, NULL),
(98, 's16_mundada_shraddha@mgmcen.ac.in', 'Placed', 'TCS', '3.3 LPA', NULL, NULL),
(99, 's16_vaidya_shivani@mgmcen.ac.in', 'Placed', 'Infosys', '8.00 LPA', NULL, NULL),
(100, 's16_walbe_pratiksha@mgmcen.ac.in', 'Placed', 'Kratin', '0', NULL, NULL),
(101, 's16_rai_shubham@mgmcen.ac.in', 'Placed', 'TCS', '3.3 LPA', NULL, NULL),
(102, 's14_narwade_nikita@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(103, 's16_shinde_kartiki@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(104, 's16_kulkarni_sadichcha@mgmcen.ac.in', 'Not Placed', 'Null', '0', NULL, NULL),
(105, 's16_kapratwar_sampada@mgmcen.ac.in', 'Placed', 'Null', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_academics`
--

CREATE TABLE `student_academics` (
  `Email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `CASERP_ID` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SSC` decimal(6,3) NOT NULL DEFAULT '0.000',
  `HSC` decimal(6,3) NOT NULL DEFAULT '0.000',
  `Poly` decimal(6,3) NOT NULL DEFAULT '0.000',
  `FE_CGPA` decimal(4,2) NOT NULL DEFAULT '0.00',
  `SE_CGPA` decimal(4,2) NOT NULL DEFAULT '0.00',
  `TE_CGPA` decimal(4,2) NOT NULL DEFAULT '0.00',
  `FE_PERCENT` decimal(6,3) NOT NULL DEFAULT '0.000',
  `SE_PERCENT` decimal(6,3) NOT NULL DEFAULT '0.000',
  `TE_PERCENT` decimal(6,3) NOT NULL DEFAULT '0.000',
  `Overall_Gap` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_academics`
--

INSERT INTO `student_academics` (`Email`, `CASERP_ID`, `SSC`, `HSC`, `Poly`, `FE_CGPA`, `SE_CGPA`, `TE_CGPA`, `FE_PERCENT`, `SE_PERCENT`, `TE_PERCENT`, `Overall_Gap`, `created_at`, `updated_at`) VALUES
('s13_ghan_prachi@mgmcen.ac.in', 's1032130112', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s13_shinde_purushotam@mgmcen.ac.in', 's1032130353', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s14_bulbule_rakshanda@mgmcen.ac.in', 's1032140028', '88.000', '88.000', '0.000', '8.80', '8.80', '8.80', '88.000', '88.000', '88.000', 0, NULL, NULL),
('s14_mangnale_rohini@mgmcen.ac.in', 's1032140165', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s14_narwade_nikita@mgmcen.ac.in', 's1032140192', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s14_chincholkar_omkar@mgmcen.ac.in', 's1032140317', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s15_bobde_neha@mgmcen.ac.in', 's1032150050', '88.000', '99.000', '0.000', '8.90', '9.90', '9.90', '99.000', '99.000', '99.000', 0, NULL, NULL),
('s15_lakshatwar_ravikumar@mgmcen.ac.in', 's1032150096', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s15_rathod_megha@mgmcen.ac.in', 's1032150132', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s15_shete_rakshanda@mgmcen.ac.in', 's1032150168', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s15_gavhane_prajakta@mgmcen.ac.in', 's1032150193', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s15_pawar_pratiksha@mgmcen.ac.in', 's1032150196', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s15_khandare_sushil@mgmcen.ac.in', 's1032150207', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s15_shinde_sneha@mgmcen.ac.in', 's1032150227', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s15_chaware_vishal@mgmcen.ac.in', 's1032150279', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_bagate_abhishek@mgmcen.ac.in', 's1032160020', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_shinde_ganesh@mgmcen.ac.in', 's1032160037', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_rai_shubham@mgmcen.ac.in', 's1032160046', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_sumit_kumar@mgmcen.ac.in', 's1032160049', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_rathod_shubham@mgmcen.ac.in', 's1032160052', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_namoshe_pragati@mgmcen.ac.in', 's1032160057', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_abdul_rahman@mgmcen.ac.in', 's1032160061', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_mundada_shraddha@mgmcen.ac.in', 's1032160064', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_populwar_priyanka@mgmcen.ac.in', 's1032160067', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_kalaskar_priyanka@mgmcen.ac.in', 's1032160075', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_mahajan_snehal@mgmcen.ac.in', 's1032160080', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_thorat_rajeet@mgmcen.ac.in', 's1032160084', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_chavan_kavita@mgmcen.ac.in', 's1032160110', '70.000', '88.000', '0.000', '7.00', '7.00', '7.00', '88.000', '88.000', '88.000', 0, NULL, NULL),
('s16_deshpande_omkar@mgmcen.ac.in', 's1032160116', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_gurhale_rushikesh@mgmcen.ac.in', 's1032160122', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_sabbanwar_dipak@mgmcen.ac.in', 's1032160123', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_pophale_mayuresh@mgmcen.ac.in', 's1032160128', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_shinde_kartiki@mgmcen.ac.in', 's1032160129', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_kapratwar_sampada@mgmcen.ac.in', 's1032160139', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_dharasurkar_saee@mgmcen.ac.in', 'S1032160143', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_gattani_shamali@mgmcen.ac.in', 's1032160149', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_mange_ashok@mgmcen.ac.in', 's1032160151', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_kaminwar_minal@mgmcen.ac.in', 's1032160153', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_pattewar_atul@mgmcen.ac.in', 's1032160155', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_chourange_anuj@mgmcen.ac.in', 's1032160160', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_julur_shweta@mgmcen.ac.in', 's1032160164', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_walbe_pratiksha@mgmcen.ac.in', 's1032160168', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_pawar_pooja@mgmcen.ac.in', 's1032160170', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_chavan_nikita@mgmcen.ac.in', 's1032160172', '70.000', '88.000', '0.000', '8.90', '8.90', '8.90', '88.000', '88.000', '88.000', 0, NULL, NULL),
('s16_siddiqui_sufyan@mgmcen.ac.in', 's1032160191', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_mukhedkar_samiksha@mgmcen.ac.in', 's1032160192', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_sandukwar_rushikesh@mgmcen.ac.in', 's1032160193', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_suryawanshi_mahesh@mgmcen.ac.in', 's1032160196', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_bhanushali_pooja@mgmcen.ac.in', 's1032160200', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_darbastewar_sakshi@mgmcen.ac.in', 's1032160209', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_sayyad_fahad@mgmcen.ac.in', 's1032160210', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_kharat_srikant@mgmcen.ac.in', 's1032160218', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_jadhav_aditi@mgmcen.ac.in', 's1032160219', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_tehra_anuja@mgmcen.ac.in', 's1032160220', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_kulkarni_sadichcha@mgmcen.ac.in', 's1032160228', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_patil_sharda@mgmcen.ac.in', 's1032160229', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_suryawanshi_santosh@mgmcen.ac.in', 's1032160231', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_patil_waghraj@mgmcen.ac.in', 's1032160240', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_hirwe_shabaree@mgmcen.ac.in', 's1032160244', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_phulari_prashant@mgmcen.ac.in', 's1032160247', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_kulkarni_samiksha@mgmcen.ac.in', 's1032160253', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_chincholkar_nikita@mgmcen.ac.in', 'S1032160257', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_bhadke_shweta@mgmcen.ac.in', 's1032160282', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_bhartiya_shubham@mgmcen.ac.in', 's1032160285', '88.000', '88.000', '0.000', '9.90', '9.90', '8.90', '99.000', '99.000', '99.000', 0, NULL, NULL),
('s16_dhembre_shivam@mgmcen.ac.in', 's1032160289', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_joshi_gargi@mgmcen.ac.in', 's1032160296', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('s16_vaidya_shivani@mgmcen.ac.in', 's1032160310', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd16_hallale_jyoti@mgmcen.ac.in', 's1032160363', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd16_nehad_fatema@mgmcen.ac.in', 's1032160523', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('st17_chapule_akshata@mgmcen.ac.in', 's1032170001', '88.000', '60.000', '0.000', '7.80', '7.80', '7.80', '70.000', '70.000', '70.000', 0, NULL, NULL),
('st17_bagdiya_ruchita@mgmcen.ac.in', 's1032170002', '88.000', '70.000', '0.000', '8.80', '8.90', '8.90', '88.000', '88.000', '88.000', 0, NULL, NULL),
('sd17_shirse_mangaltai@mgmcen.ac.in', 's1032170372', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_suryawanshi_sachin@mgmcen.ac.in', 's1032170375', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_kulkarni_vaishnavi@mgmcen.ac.in', 's1032170387', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_awale_shubham@mgmcen.ac.in', 's1032170388', '88.000', '0.000', '88.000', '0.00', '8.90', '8.90', '0.000', '88.000', '88.000', 0, NULL, NULL),
('sd17_shaikh_furkhan@mgmcen.ac.in', 's1032170390', '88.000', '0.000', '88.000', '0.00', '8.80', '9.90', '0.000', '9.900', '88.000', 0, NULL, NULL),
('sd17_patil_pratima@mgmcen.ac.in', 's1032170399', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_choudhary_trupti@mgmcen.ac.in', 'S1032170400', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_kattajiwar_soujanya@mgmcen.ac.in', 's1032170405', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_waghmare_rupali@mgmcen.ac.in', 's1032170406', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_wandre_ankita@mgmcen.ac.in', 's1032170407', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_damkondwar_pratiksha@mgmcen.ac.in', 's1032170408', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_parikh_falguni@mgmcen.ac.in', 's1032170413', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_javeedkhan_raheen@mgmcen.ac.in', 's1032170414', '88.000', '0.000', '83.000', '0.00', '8.80', '8.80', '0.000', '88.000', '88.000', 0, NULL, NULL),
('sd17_kamble_sonam@mgmcen.ac.in', 's1032170422', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_bhange_rupali@mgmcen.ac.in', 's1032170429', '88.000', '0.000', '88.000', '0.00', '8.80', '9.90', '0.000', '88.000', '88.000', 0, NULL, NULL),
('sd17_khandare_pallavi@mgmcen.ac.in', 's1032170430', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_godbole_supriya@mgmcen.ac.in', 's1032170431', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_sontakke_pooja@mgmcen.ac.in', 's1032170433', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_javeriyabano_hussain@mgmcen.ac.in', 's1032170439', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_sandhu_parminderpalkaur@mgmcen.ac.in', 's1032170445', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_kandharkar_rachana@mgmcen.ac.in', 's1032170465', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_chavan_ashwini@mgmcen.ac.in', 's1032170469', '88.000', '0.000', '88.000', '0.00', '8.80', '8.80', '0.000', '88.000', '88.000', 0, NULL, NULL),
('sd17_khodke_geeta@mgmcen.ac.in', 's1032170477', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_deshmukh_shraddha@mgmcen.ac.in', 's1032170479', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_dongare_pramodita@mgmcen.ac.in', 's1032170480', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_nilawar_shradha@mgmcen.ac.in', 's1032170482', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_tekale_savita@mgmcen.ac.in', 's1032170486', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_palkratwar_surabhi@mgmcen.ac.in', 's1032170487', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_tekale_sangita@mgmcen.ac.in', 's1032170488', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL),
('sd17_trimale_priyanka@mgmcen.ac.in', 's1032170496', '0.000', '0.000', '0.000', '0.00', '0.00', '0.00', '0.000', '0.000', '0.000', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_profile`
--

CREATE TABLE `student_profile` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `Email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `First_Name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Anonymous',
  `MIDdle_Name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Anonymous',
  `Last_Name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Anonymous',
  `Class` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `Branch` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Null',
  `Passout_Year` int(11) NOT NULL DEFAULT '2020',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_profile`
--

INSERT INTO `student_profile` (`ID`, `Email`, `First_Name`, `MIDdle_Name`, `Last_Name`, `Class`, `Branch`, `Passout_Year`, `created_at`, `updated_at`) VALUES
(1, 'sd17_shaikh_furkhan@mgmcen.ac.in', 'Furkhan', 'Mujibodden', 'Shaikh', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(2, 's16_abdul_rahman@mgmcen.ac.in', 'Abdul', 'Waheed', 'Rahman', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(3, 'sd17_javeedkhan_raheen@mgmcen.ac.in', 'Raheen', 'Gulam Javeed', 'Khan', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(4, 'sd17_awale_shubham@mgmcen.ac.in', 'Shubham', 'Suryakant', 'Awale', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(5, 'st17_bagdiya_ruchita@mgmcen.ac.in', 'Ruchita', 'Vijaykumar', 'Bagdiya', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(6, 'sd17_bhange_rupali@mgmcen.ac.in', 'Rupali', 'Anand', 'Bhange', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(7, 's16_bhartiya_shubham@mgmcen.ac.in', 'Shubham', 'Mahesh', 'Bhartiya', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(8, 's15_bobde_neha@mgmcen.ac.in', 'Neha', 'Balaji', 'Bobde', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(9, 's14_bulbule_rakshanda@mgmcen.ac.in', 'Rakshanda', 'Ravindra', 'Bulbule', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(10, 'st17_chapule_akshata@mgmcen.ac.in', 'Akshata', 'Rajeshwar', 'Chapule', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(11, 'sd17_chavan_ashwini@mgmcen.ac.in', 'Ashwini', 'Devdas', 'Chavan', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(12, 's16_chavan_kavita@mgmcen.ac.in', 'Kavita', 'Ramesh', 'Chavan', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(13, 's16_chavan_nikita@mgmcen.ac.in', 'Nikita', 'Ganesh', 'Chavan', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(17, 's15_chaware_vishal@mgmcen.ac.in', 'Vishal', 'Janardan', 'Chaware', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(18, 's16_chincholkar_nikita@mgmcen.ac.in', 'Chincholkar', 'Laxmikant', 'Nikita', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(19, 's14_chincholkar_omkar@mgmcen.ac.in', 'Omkar', 'Nandkumar', 'Chincholkar', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(20, 'sd17_choudhary_trupti@mgmcen.ac.in', 'Choudhary', 'Vilasrao', 'Trupti', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(21, 'sd17_damkondwar_pratiksha@mgmcen.ac.in', 'Damkondwar', 'Pramod', 'Pratiksha', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(22, 's16_darbastewar_sakshi@mgmcen.ac.in', 'Sakshi', 'Shyamsundar', 'Darbastewar', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(23, 'sd17_deshmukh_shraddha@mgmcen.ac.in', 'Shraddha', 'Sharadrao', 'Deshmukh', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(24, 's16_dharasurkar_saee@mgmcen.ac.in', 'Saee', 'Ramrao', 'Dharasurkar', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(25, 's16_dhembre_shivam@mgmcen.ac.in', 'Shivam', 'Bhagwan', 'Dhembre', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(26, 'sd17_dongare_pramodita@mgmcen.ac.in', 'Promodita', 'Anil', 'Dongare', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(27, 'sd17_godbole_supriya@mgmcen.ac.in', 'Supriya', 'Limbaji', 'Godbole', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(28, 's16_gurhale_rushikesh@mgmcen.ac.in', 'Rushikesh', 'Narsing', 'Gurhale', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(29, 'sd16_hallale_jyoti@mgmcen.ac.in', 'Jyoti', 'Rajkumaar', 'Hallale', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(30, 's16_hirwe_shabaree@mgmcen.ac.in', 'Hirwe', 'Hanumant', 'Shabree', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(31, 's16_jadhav_aditi@mgmcen.ac.in', 'Aditi', 'Vitthalrao', 'Jadhav', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(32, 's16_kalaskar_priyanka@mgmcen.ac.in', 'Kalaskar', 'Ramakantrao', 'Priyanka', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(33, 'sd17_kamble_sonam@mgmcen.ac.in', 'Sonam', 'Mahadev', 'Kamble', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(34, 'sd17_kandharkar_rachana@mgmcen.ac.in', 'Rachna', 'Shivhar', 'Kandharkar', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(35, 'sd17_kattajiwar_soujanya@mgmcen.ac.in', 'Soujanya', 'Bhagwan', 'Kattajiwar', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(36, 'sd17_khandare_pallavi@mgmcen.ac.in', 'Pallavi', 'Uttam', 'Khandare', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(37, 's15_khandare_sushil@mgmcen.ac.in', 'Sushil', 'Shivaji', 'Khandare', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(38, 's16_kharat_srikant@mgmcen.ac.in', 'Srikant', 'Digambar', 'Kharat', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(39, 'sd17_khodke_geeta@mgmcen.ac.in', 'Geeta', 'Bapurao', 'Khodke', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(40, 'sd17_kulkarni_vaishnavi@mgmcen.ac.in', 'Vaishnavi', 'Sunil', 'Kulkarni', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(41, 's15_lakshatwar_ravikumar@mgmcen.ac.in', 'Ravikumar', 'Balajirao', 'Lakshatwar', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(42, 's16_mange_ashok@mgmcen.ac.in', 'Ashok', 'Jagdish', 'Mange', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(43, 's14_mangnale_rohini@mgmcen.ac.in', 'Rohini', 'Ramrao', 'Mangnale', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(44, 's16_mukhedkar_samiksha@mgmcen.ac.in', 'Samiksha', 'Sanjayrao', 'Mukhedkar', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(45, 's16_namoshe_pragati@mgmcen.ac.in', 'Pragati', 'Sangappa', 'Namoshe', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(46, 'sd17_nilawar_shradha@mgmcen.ac.in', 'Shradha', 'Shriharee', 'Nilawar', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(47, 'sd17_palkratwar_surabhi@mgmcen.ac.in', 'Surbhi', 'Anonymous', 'Palkratwar', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(48, 'sd17_parikh_falguni@mgmcen.ac.in', 'Falguni', 'Anonymous', 'Parikh', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(49, 'sd17_patil_pratima@mgmcen.ac.in', 'Pratima', 'Anonymous', 'Patil', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(50, 's16_patil_sharda@mgmcen.ac.in', 'Sharda', 'Anonymous', 'Patil', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(51, 's16_patil_waghraj@mgmcen.ac.in', 'Waghraj', 'Anonymous', 'Patil', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(52, 's16_pattewar_atul@mgmcen.ac.in', 'Atul', 'Anonymous', 'Pattewar', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(53, 's16_pawar_pooja@mgmcen.ac.in', 'Pawar', 'Anonymous', 'Pooja', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(54, 's16_phulari_prashant@mgmcen.ac.in', 'Prashant', 'Anonymous', 'Phulari', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(55, 's16_pophale_mayuresh@mgmcen.ac.in', 'Mayuresh', 'Anonymous', 'Pophale', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(56, 's16_populwar_priyanka@mgmcen.ac.in', 'Priyanka', 'Anonymous', 'Populwar', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(57, 's15_rathod_megha@mgmcen.ac.in', 'Megha', 'Anonymous', 'Rathod', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(58, 's16_rathod_shubham@mgmcen.ac.in', 'Shubham', 'Anonymous', 'Rathod', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(59, 's16_sabbanwar_dipak@mgmcen.ac.in', 'Diapak', 'Anonymous', 'Sabbanwar', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(60, 'sd17_sandhu_parminderpalkaur@mgmcen.ac.in', 'Paraminderpalkaur', 'Anonymous', 'Sandhu', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(61, 's16_sandukwar_rushikesh@mgmcen.ac.in', 'Rushikesh', 'Anonymous', 'Sandukwar', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(62, 's16_sayyad_fahad@mgmcen.ac.in', 'Fahad', 'Anonymous', 'Sayyad', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(63, 's15_shete_rakshanda@mgmcen.ac.in', 'Rakshanda', 'Anonymous', 'Shete', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(64, 'sd17_shirse_mangaltai@mgmcen.ac.in', 'Mangaltai', 'Anonymous', 'Shirse', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(65, 's16_siddiqui_sufyan@mgmcen.ac.in', 'Siddiqui', 'Anonymous', 'Sufyan', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(66, 'sd17_sontakke_pooja@mgmcen.ac.in', 'Pooja', 'Anonymous', 'Sontakke', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(67, 's16_sumit_kumar@mgmcen.ac.in', 'Sumit', 'Anonymous', 'Kumar', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(68, 's16_suryawanshi_mahesh@mgmcen.ac.in', 'Mahesh', 'Anonymous', 'Suryawanshi', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(69, 'sd17_suryawanshi_sachin@mgmcen.ac.in', 'Sachin', 'Anonymous', 'Suryawanshi', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(70, 's16_suryawanshi_santosh@mgmcen.ac.in', 'Santosh', 'Anonymous', 'Suryawanshi', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(71, 's16_tehra_anuja@mgmcen.ac.in', 'Anuja', 'Anonymous', 'Tehra', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(72, 'sd17_tekale_sangita@mgmcen.ac.in', 'Sangita', 'Anonymous', 'Tekale', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(73, 'sd17_tekale_savita@mgmcen.ac.in', 'Savita', 'Anonymous', 'Tekale', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(74, 's16_thorat_rajeet@mgmcen.ac.in', 'Rajjeet', 'Anonymous', 'Thorat', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(75, 'sd17_trimale_priyanka@mgmcen.ac.in', 'Priyanka', 'Anonymous', 'Trimale', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(76, 'sd17_waghmare_rupali@mgmcen.ac.in', 'Rupali', 'Anonymous', 'Waghmare', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(77, 'sd17_wandre_ankita@mgmcen.ac.in', 'Ankita', 'Anonymous', 'Wandre', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(78, 's15_gavhane_prajakta@mgmcen.ac.in', 'Prajakta', 'Anonymous', 'Gavhane', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(79, 's16_shinde_ganesh@mgmcen.ac.in', 'Ganesh', 'Anonymous', 'Shinde', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(81, 'sd17_javeriyabano_hussain@mgmcen.ac.in', 'Javeriya Bano', 'Anonymous', 'Hussain', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(82, 'sd16_nehad_fatema@mgmcen.ac.in', 'Fatema', 'Anonymous', 'Nehad', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(83, 's15_pawar_pratiksha@mgmcen.ac.in', 'Pratiksha', 'Anonymous', 'Pawar', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(84, 's13_shinde_purushotam@mgmcen.ac.in', 'Purushotam', 'Anonymous', 'Shinde', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(85, 's13_ghan_prachi@mgmcen.ac.in', 'Prachi', 'Anonymous', 'Ghan', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(86, 's15_shinde_sneha@mgmcen.ac.in', 'Sneha', 'Anonymous', 'Shind', 'BECSEII', 'Computer Science And Engineering', 2020, NULL, NULL),
(87, 's16_bagate_abhishek@mgmcen.ac.in', 'Abhishek', 'Anonymous', 'Bagate', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(88, 's16_bhadke_shweta@mgmcen.ac.in', 'Shweta', 'Anonymous', 'Bhadke', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(89, 's16_bhanushali_pooja@mgmcen.ac.in', 'Pooja', 'Anonymous', 'Bhanushali', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(90, 's16_chourange_anuj@mgmcen.ac.in', 'Anuja', 'Anonymous', 'Chourange', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(91, 's16_deshpande_omkar@mgmcen.ac.in', 'Omkar', 'Anonymous', 'Deshpande', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(92, 's16_gattani_shamali@mgmcen.ac.in', 'Shamali', 'Anonymous', 'Gattani', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(93, 's16_joshi_gargi@mgmcen.ac.in', 'Gargi', 'Anonymous', 'Joshi', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(94, 's16_julur_shweta@mgmcen.ac.in', 'Shweta', 'Anonymous', 'Julur', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(95, 's16_kaminwar_minal@mgmcen.ac.in', 'Minal', 'Anonymous', 'Kaminwar', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(96, 's16_kulkarni_samiksha@mgmcen.ac.in', 'Samiksha', 'Anonymous', 'Kulkarni', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(97, 's16_mahajan_snehal@mgmcen.ac.in', 'Snehal', 'Anonymous', 'Mahajan', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(98, 's16_mundada_shraddha@mgmcen.ac.in', 'Shraddha', 'Anonymous', 'Mundada', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(99, 's16_vaidya_shivani@mgmcen.ac.in', 'Shivani', 'Anonymous', 'Vaidya', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(100, 's16_walbe_pratiksha@mgmcen.ac.in', 'Pratiksha', 'Anonymous', 'Walbe', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(101, 's16_rai_shubham@mgmcen.ac.in', 'Shubham', 'Anonymous', 'Rai', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(102, 's14_narwade_nikita@mgmcen.ac.in', 'Nikita', 'Anonymous', 'Narwade', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(103, 's16_shinde_kartiki@mgmcen.ac.in', 'Kartiki', 'Anonymous', 'Shinde', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(104, 's16_kulkarni_sadichcha@mgmcen.ac.in', 'Sadichcha', 'Anonymous', 'Kulkarni', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL),
(105, 's16_kapratwar_sampada@mgmcen.ac.in', 'Sampada', 'Anonymous', 'Kapratwar', 'BECSEI', 'Computer Science And Engineering', 2020, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'students',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Furkhan Shaikh', 'sd17_shaikh_furkhan@mgmcen.ac.in', NULL, '$2y$10$Pzy5ga16OJDW5wnUlR9NxOWHO7ijyfc5OzHIe2y.pkzplGIsc0zYi', 'students', NULL, NULL, NULL),
(2, 'Abdul Rahman', 's16_abdul_rahman@mgmcen.ac.in', NULL, '$2y$10$oIH9UFOzXdnm8o/DcupPyu4HoF3ozljT/d9/SvRbBdDIYBQhUvKaK', 'students', NULL, NULL, NULL),
(3, 'Raheen Khan', 'sd17_javeedkhan_raheen@mgmcen.ac.in', NULL, '$2y$10$W6zkSW2iyJML43m.qPzxEeJNnjP6h9oXPEFV6hxPC4Ee6pRnLkf.q', 'students', NULL, NULL, NULL),
(4, 'Shubham Awale', 'sd17_awale_shubham@mgmcen.ac.in', NULL, '$2y$10$8SQ/h/IgaiGmnaOLuybPvuB4Cgea1u9BEEvZM0BCnzKsmw8CM0Tta', 'students', NULL, NULL, NULL),
(5, 'Ruchita Bagdiya', 'st17_bagdiya_ruchita@mgmcen.ac.in', NULL, '$2y$10$3gc7Zwbet/UrFHE4syElMeqpy9mRywfifZq8pGe6/6Ao2mJ96iEC2', 'students', NULL, NULL, NULL),
(6, 'Rupali Bhange', 'sd17_bhange_rupali@mgmcen.ac.in', NULL, '$2y$10$HmVWFupekb/Dd4HWkPSuL.kUl2pXnf2jb28ofBbPtq9gdKIU5pau2', 'students', NULL, NULL, NULL),
(7, 'Shubham Bhartiya', 's16_bhartiya_shubham@mgmcen.ac.in', NULL, '$2y$10$qD.ITvYYVZCHSZDGLVIRzuY17aSw4RC6YDKW9MadVRMCL7SyJrqW.', 'students', NULL, NULL, NULL),
(8, 'Neha Bobde', 's15_bobde_neha@mgmcen.ac.in', NULL, '$2y$10$6MrHgd9dLH7bHwJQu78fBeplbiS2mjUrT06wLN3iAC5F4YNzBzCKG', 'students', NULL, NULL, NULL),
(9, 'Rakshanda Bulbule', 's14_bulbule_rakshanda@mgmcen.ac.in', NULL, '$2y$10$yIp08eIBcyEoEHHt/t7houGsm5HOkmubN1GJPYBBFfSzJfUWgrBte', 'students', NULL, NULL, NULL),
(10, 'Akshata Chapule', 'st17_chapule_akshata@mgmcen.ac.in', NULL, '$2y$10$xFO0E.AySedqXWaa.e2vCuIrFkZ.IpO3L0menLkxpQPsUVsBb9y5C', 'students', NULL, NULL, NULL),
(11, 'Ashwini Chavan', 'sd17_chavan_ashwini@mgmcen.ac.in', NULL, '$2y$10$hcUd3yb1qusNFY11hsvPQeAv3sUZG03/Q025epwVUQkhXX7EbOfsK', 'students', NULL, NULL, NULL),
(12, 'Kavita Chavan', 's16_chavan_kavita@mgmcen.ac.in', NULL, '$2y$10$AchKLmfHOkwoTDKH6PGAn./mZYsrC5nXJgJ2y1DxK1ohwlgYCXIfC', 'students', NULL, NULL, NULL),
(13, 'Nikita Chavan', 's16_chavan_nikita@mgmcen.ac.in', NULL, '$2y$10$ESRevpFFS0NgR1PFN85NTuEGhbx6WE6Fc6SFukcw6Qh6mL6TtZmS6', 'students', NULL, NULL, NULL),
(14, 'Shivprasad Titare', 'tpo@mgmcen.ac.in', NULL, '$2y$10$75pORwHpVavCqRhJiZW0muBBjOpdRIDg5u1Ay9atMjuxgP5FHFXfW', 'tpo', NULL, NULL, NULL),
(17, 'Vishal Chaware', 's15_chaware_vishal@mgmcen.ac.in', NULL, '$2y$10$2pb2.Kgcq.Dk2O6crTFML.YaKVNgsh78KL49D/bGoO1iAZfi1fTsK', 'students', NULL, NULL, NULL),
(18, 'Chincholkar Nikita', 's16_chincholkar_nikita@mgmcen.ac.in', NULL, '$2y$10$raEbSFue3u3dmOazankD8.PG1aKr4K9fQ1n.xK.bRiCd8mAiiHISu', 'students', NULL, NULL, NULL),
(19, 'Omkar Chincholkar', 's14_chincholkar_omkar@mgmcen.ac.in', NULL, '$2y$10$VR0nW3EiNTwBeeL6gYGU4OTyNaSFhi1sdXfCE98muWeGMOMGrW1EG', 'students', NULL, NULL, NULL),
(20, 'Choudhary Trupti', 'sd17_choudhary_trupti@mgmcen.ac.in', NULL, '$2y$10$K9nicbSzPkKtnSnQV76ZE.f4zW39wuIP6eGI2vgCTFMr8U1ztX4q6', 'students', NULL, NULL, NULL),
(21, 'Damkondwar Pratiksha', 'sd17_damkondwar_pratiksha@mgmcen.ac.in', NULL, '$2y$10$ENYLZvhObWtagW427419cuX0WOXhuI4QlgCzAPxGemg0pdN7CTIoG', 'students', NULL, NULL, NULL),
(22, 'Sakshi Darbastewar', 's16_darbastewar_sakshi@mgmcen.ac.in', NULL, '$2y$10$Hha4aqa3D3yPSnvRqkWt.O3JNdnfNUoI6875qHaQibVifq2Lm4s.S', 'students', NULL, NULL, NULL),
(23, 'Shraddha Deshmukh', 'sd17_deshmukh_shraddha@mgmcen.ac.in', NULL, '$2y$10$AjTLvElRC7TF9hu1BR/vXuaSAEo7Fk7OPsM8sxULLZ0sdlA79cK3q', 'students', NULL, NULL, NULL),
(24, 'Saee Dharasurkar', 's16_dharasurkar_saee@mgmcen.ac.in', NULL, '$2y$10$JwNK5xg4aJkKyVfuxGukQekw/iThh263.bj8W7hzPXq/o5fgb9fpe', 'students', NULL, NULL, NULL),
(25, 'Shivam Dhembre', 's16_dhembre_shivam@mgmcen.ac.in', NULL, '$2y$10$xLYUZLPLJXIG549Y2UHeXei1IRK0j/d.6L/XikjRbbJzz1reN07ay', 'students', NULL, NULL, NULL),
(26, 'Promodita Dongare', 'sd17_dongare_pramodita@mgmcen.ac.in', NULL, '$2y$10$55WqJzKR2VMzp7Y/rfik/O60yRQSrCV0DMp7fJGWdnjU1PHcbD1K2', 'students', NULL, NULL, NULL),
(27, 'Supriya Godbole', 'sd17_godbole_supriya@mgmcen.ac.in', NULL, '$2y$10$1sNxCjLxFES91N3HD8nNoukryrYwpW/0xxiIQs.8tLaFDTPHy.S72', 'students', NULL, NULL, NULL),
(28, 'Rushikesh Gurhale', 's16_gurhale_rushikesh@mgmcen.ac.in', NULL, '$2y$10$WcdMw013jW9/7tjT6SPNlOTY42BzSD8uoS9vokyEs5ua9P3G4de3m', 'students', NULL, NULL, NULL),
(29, 'Jyoti Hallale', 'sd16_hallale_jyoti@mgmcen.ac.in', NULL, '$2y$10$qdhsYEAzjqdHbdQTGT/Uf.TYD4wC3UMWjx.sHf4hDucNVXqlxktlS', 'students', NULL, NULL, NULL),
(30, 'Hirwe Shabree', 's16_hirwe_shabaree@mgmcen.ac.in', NULL, '$2y$10$RmyroRtb5BMVyZ4T773CQuoUF6VuuV56wD1hEVDtM/n845iaEvD/2', 'students', NULL, NULL, NULL),
(31, 'Aditi Jadhav', 's16_jadhav_aditi@mgmcen.ac.in', NULL, '$2y$10$ICS7u6qwi8GqdttAE2TI3.DesCBu7BD94ggw8jsV7PRzvEE.x.73.', 'students', NULL, NULL, NULL),
(32, 'Kalaskar Priyanka', 's16_kalaskar_priyanka@mgmcen.ac.in', NULL, '$2y$10$bKtQqRiG48uto8VGarCELuNb2JEu2XlKrVAQFCAfSKaE1cmG1Dsb6', 'students', NULL, NULL, NULL),
(33, 'Sonam Kamble', 'sd17_kamble_sonam@mgmcen.ac.in', NULL, '$2y$10$g7.zCTgSSMy10JEjZ18qRet0U9nbOvlt9dx1bKwjjbtKYnmxHgdrC', 'students', NULL, NULL, NULL),
(34, 'Rachna Kandharkar', 'sd17_kandharkar_rachana@mgmcen.ac.in', NULL, '$2y$10$hXF6Wls1wokfJQQgXWlEXu1AAxMd8P.PVMn93WFJn7Dlb/guWbY5S', 'students', NULL, NULL, NULL),
(35, 'Soujanya Kattajiwar', 'sd17_kattajiwar_soujanya@mgmcen.ac.in', NULL, '$2y$10$RhOIguhBaf5mI.7ZyLZPaeKXzkuW.QFDo8jLrJXSvjqpc0vKWoqcK', 'students', NULL, NULL, NULL),
(36, 'Pallavi Khandare', 'sd17_khandare_pallavi@mgmcen.ac.in', NULL, '$2y$10$U5JsRqwC.RyGbaMRE/sV/OPB94hxMAWcZ9r3mFxfQZC1QM1SB8UJ6', 'students', NULL, NULL, NULL),
(37, 'Sushil Khandare', 's15_khandare_sushil@mgmcen.ac.in', NULL, '$2y$10$Wq9exXr9Tly74yCoagHcx.uR693Q14SCmVutiuda3d16K30yvMGMq', 'students', NULL, NULL, NULL),
(38, 'Srikant Kharat', 's16_kharat_srikant@mgmcen.ac.in', NULL, '$2y$10$4SttLa5xmotEOUugVMs6LuoBGBL8T7PWw/q2QDW.MEFHU/ZVnJIpO', 'students', NULL, NULL, NULL),
(39, 'Geeta Khodke', 'sd17_khodke_geeta@mgmcen.ac.in', NULL, '$2y$10$8knkST6Zf0i0AIBOuTM6eOlGXVzhPjSmU/Wrpz2Z4CMAbkcCwksZm', 'students', NULL, NULL, NULL),
(40, 'Vaishnavi Kulkarni', 'sd17_kulkarni_vaishnavi@mgmcen.ac.in', NULL, '$2y$10$BShQKFTa6LwnpXZYedKum.3dMLhlqSJPV74zrCh4fkvJkSRyDJeZy', 'students', NULL, NULL, NULL),
(41, 'Ravikumar Lakshatwar', 's15_lakshatwar_ravikumar@mgmcen.ac.in', NULL, '$2y$10$d.u3nZwwPijtoolfnmeRzOXhhDTuf9NYWJxim7rPJvpYlGN2yEfjm', 'students', NULL, NULL, NULL),
(42, 'Ashok Mange', 's16_mange_ashok@mgmcen.ac.in', NULL, '$2y$10$5pYDiFoh/vtzHsFP3o31ee2VnS4ICCOM3cXbEmMTuogbEaUljR1F2', 'students', NULL, NULL, NULL),
(43, 'Rohini Mangnale', 's14_mangnale_rohini@mgmcen.ac.in', NULL, '$2y$10$V9IxlJfbQvP7ub/D7HkCgOmqku6N2Y/BwIYSI0qflAbTUOSsSa.3a', 'students', NULL, NULL, NULL),
(44, 'Samiksha Mukhedkar', 's16_mukhedkar_samiksha@mgmcen.ac.in', NULL, '$2y$10$ZquhUVtfVhyINxZ.gLbAeO7ojPk9veGDNSsAXIsynPhYI.SO6c28e', 'students', NULL, NULL, NULL),
(45, 'Pragati Namoshe', 's16_namoshe_pragati@mgmcen.ac.in', NULL, '$2y$10$1XWxeGe0BGLNOS9QzeCJL.7tdPA/49yR9rLQMBurRGzXVngC1lRoG', 'students', NULL, NULL, NULL),
(46, 'Shradha Nilawar', 'sd17_nilawar_shradha@mgmcen.ac.in', NULL, '$2y$10$DrSGwtqfm1h7axgsS4BOPOKcbFDYkCHrV4qK1IlpwUsFa94UyWrmC', 'students', NULL, NULL, NULL),
(47, 'Surbhi Palkratwar', 'sd17_palkratwar_surabhi@mgmcen.ac.in', NULL, '$2y$10$BF7Low4l.PZOxM1HDFmrt.YlLJ2c8tHVCysPiRPC4Cgtbh9ziFiX.', 'students', NULL, NULL, NULL),
(48, 'Falguni Parikh', 'sd17_parikh_falguni@mgmcen.ac.in', NULL, '$2y$10$l3qpWXSdut5JObJ0tnqE7Om620rsFWIz9U8mWkWKzKDLakGVJWzhK', 'students', NULL, NULL, NULL),
(49, 'Pratima Patil', 'sd17_patil_pratima@mgmcen.ac.in', NULL, '$2y$10$IS4ZPZJXMPlvEnMeD60gw.nsdJQJ0gXc098YwZNFfORY/0o0RolWm', 'students', NULL, NULL, NULL),
(50, 'Sharda Patil', 's16_patil_sharda@mgmcen.ac.in', NULL, '$2y$10$JL/u84xCZpmYZGp2BSxFseJlxKougChVe9uWcZplsEFnd3i6ck/i6', 'students', NULL, NULL, NULL),
(51, 'Waghraj Patil', 's16_patil_waghraj@mgmcen.ac.in', NULL, '$2y$10$Sdk/XR.3J20MER518ACUIebLQq5kWW3m3euxHWX62D5jmtxfRZ/Ue', 'students', NULL, NULL, NULL),
(52, 'Atul Pattewar', 's16_pattewar_atul@mgmcen.ac.in', NULL, '$2y$10$freUAEOv0xNAZPNszwCh3e7mtLYJ.Vt7CAuzsZSt4vN5dq0rNHoN.', 'students', NULL, NULL, NULL),
(53, 'Pawar Pooja', 's16_pawar_pooja@mgmcen.ac.in', NULL, '$2y$10$Dn1oHQoAOuxvb3axKk2w8OdDMPFFYhydo1oMlu3keYePMH3lj0pn2', 'students', NULL, NULL, NULL),
(54, 'Prashant Phulari', 's16_phulari_prashant@mgmcen.ac.in', NULL, '$2y$10$7sLTaRHlKgeM0AVl3iEih.PlLOCttok9mr6micQe94MwUtrrHDPRW', 'students', NULL, NULL, NULL),
(55, 'Mayuresh Pophale', 's16_pophale_mayuresh@mgmcen.ac.in', NULL, '$2y$10$vF79Yly9EOwsTejCtYgwDuhG7EFUt0D5XgJgTsqfkC6oS60OxbJWu', 'students', NULL, NULL, NULL),
(56, 'Priyanka Populwar', 's16_populwar_priyanka@mgmcen.ac.in', NULL, '$2y$10$CfiPb3aH/RXfXfjEQ/inv.wipAm.SUO.5ZDvB9I96qQERI1WwcZ3G', 'students', NULL, NULL, NULL),
(57, 'Megha Rathod', 's15_rathod_megha@mgmcen.ac.in', NULL, '$2y$10$mWHi4.tIYHUy9dU7EXZJa.0mMWiVRMWqxT.ZFyVqBzhL.WoSa.QKi', 'students', NULL, NULL, NULL),
(58, 'Shubham Rathod', 's16_rathod_shubham@mgmcen.ac.in', NULL, '$2y$10$x3WBFSsmF2DSotfZC9ePaO3rdhp0mmLvUaItQA1bJ0keNn4d5cj02', 'students', NULL, NULL, NULL),
(59, 'Diapak Sabbanwar', 's16_sabbanwar_dipak@mgmcen.ac.in', NULL, '$2y$10$bFyH1FDaLfXpRHe5ncdNzux1KjbjlDl2CQIneBAbdRAKgt.vyrseq', 'students', NULL, NULL, NULL),
(60, 'Paraminderpalkaur Sandhu', 'sd17_sandhu_parminderpalkaur@mgmcen.ac.in', NULL, '$2y$10$6YSKXiGg6DCiFk6nxwvOIuz7QTzbhoIOKFa2adkWLTDkWrllqZVwi', 'students', NULL, NULL, NULL),
(61, 'Rushikesh Sandukwar', 's16_sandukwar_rushikesh@mgmcen.ac.in', NULL, '$2y$10$cBoFypyMNN1miWrOCebhO.LEDBBtKg7sl12YyRuTmt6yx2wuZAcri', 'students', NULL, NULL, NULL),
(62, 'Fahad Sayyad', 's16_sayyad_fahad@mgmcen.ac.in', NULL, '$2y$10$0fcu9f9Q/4pCGlHYxBrnHegu8rzu1lAwKfwUR81hADR6tr8J5FmQ2', 'students', NULL, NULL, NULL),
(63, 'Rakshanda Shete', 's15_shete_rakshanda@mgmcen.ac.in', NULL, '$2y$10$YEydGqy2Thkj98CzIsUykOIGSS/p3GtqnclX9waMnffSJ0gwweLGS', 'students', NULL, NULL, NULL),
(64, 'Mangaltai Shirse', 'sd17_shirse_mangaltai@mgmcen.ac.in', NULL, '$2y$10$Z.oJE08aZ0sOVq.xIXpaqO/3vvE2AJtP3zo7c1AusmgklZJUCXEDy', 'students', NULL, NULL, NULL),
(65, 'Siddiqui Sufyan', 's16_siddiqui_sufyan@mgmcen.ac.in', NULL, '$2y$10$DlwObu5BYohDNE8Z2o0FUOM0DdDsogdf.QuuYc06AFDSzRC8mxT2i', 'students', NULL, NULL, NULL),
(66, 'Pooja Sontakke', 'sd17_sontakke_pooja@mgmcen.ac.in', NULL, '$2y$10$r.xEWr2ujkipzlFnEBUNPOmC1nz.j4BTN40xrg0WOBNfjgZLcEBw.', 'students', NULL, NULL, NULL),
(67, 'Sumit Kumar', 's16_sumit_kumar@mgmcen.ac.in', NULL, '$2y$10$7FWia.Mll.JWkDCFr.mWq.MGV91ev/Cc4UVagidxSnTpuK/BWcdHi', 'students', NULL, NULL, NULL),
(68, 'Mahesh Suryawanshi', 's16_suryawanshi_mahesh@mgmcen.ac.in', NULL, '$2y$10$WiNCNkojgE04DBRXKreAY.Fqf3VqNuQBxBTzlDVzsFCz/vwB0a.56', 'students', NULL, NULL, NULL),
(69, 'Sachin Suryawanshi', 'sd17_suryawanshi_sachin@mgmcen.ac.in', NULL, '$2y$10$APnrHRXM2gIMEzaJYr6X2ORerFu3qBuovxZzvhLE4yF9mhvl0FGHe', 'students', NULL, NULL, NULL),
(70, 'Santosh Suryawanshi', 's16_suryawanshi_santosh@mgmcen.ac.in', NULL, '$2y$10$jXohjLqa2AT4/Ec7VCxISeX3wMPtXe/kb.Vt0tKmGCnC2xr7fqg3K', 'students', NULL, NULL, NULL),
(71, 'Anuja Tehra', 's16_tehra_anuja@mgmcen.ac.in', NULL, '$2y$10$4Q2adfrKvPNGSBTwLn6KcuPV0sadvQ6ppynUhRokZXJAmu3KBPjTK', 'students', NULL, NULL, NULL),
(72, 'Sangita Tekale', 'sd17_tekale_sangita@mgmcen.ac.in', NULL, '$2y$10$Nd8vk2rl7s7LYSVRhM0pROQ3aIxHys.ce3LR.bwgmoJJkvVMzAmtO', 'students', NULL, NULL, NULL),
(73, 'Savita Tekale', 'sd17_tekale_savita@mgmcen.ac.in', NULL, '$2y$10$tXXwvhRsqapzH.SlN5SNAeroKY/wdsj.Z4uOyycLYrbwBKR5Hhc52', 'students', NULL, NULL, NULL),
(74, 'Rajjeet Thorat', 's16_thorat_rajeet@mgmcen.ac.in', NULL, '$2y$10$jMS6mY8i0pint/U9H8oyb.M5IpAnRGHoTbcLXXAt4pXcU6z725vxW', 'students', NULL, NULL, NULL),
(75, 'Priyanka Trimale', 'sd17_trimale_priyanka@mgmcen.ac.in', NULL, '$2y$10$qkpWYSYvRUu3O/5Q5rFLQeWRIf3VTIVcw8MMjBgio8pwnW5dOqisW', 'students', NULL, NULL, NULL),
(76, 'Rupali Waghmare', 'sd17_waghmare_rupali@mgmcen.ac.in', NULL, '$2y$10$kiKeYAPPSOU8IuHfycQI2O1RIQMWSvLNwkwqWs.d5fXb.4viQbKQm', 'students', NULL, NULL, NULL),
(77, 'Ankita Wandre', 'sd17_wandre_ankita@mgmcen.ac.in', NULL, '$2y$10$qKy/c2ijrTrNlkb1yNA.Reo4ans12C76iA7W/Lyph/PyhTJiKt1fu', 'students', NULL, NULL, NULL),
(78, 'Prajakta Gavhane', 's15_gavhane_prajakta@mgmcen.ac.in', NULL, '$2y$10$KXVqTQiB/CrT0Cx4Q240cuf4weKZ/MsMtjZ5PNPweo6Lc263dR38i', 'students', NULL, NULL, NULL),
(79, 'Ganesh Shinde', 's16_shinde_ganesh@mgmcen.ac.in', NULL, '$2y$10$X4dStrRMymMpgRvVoC.rr.VNPk8EMugo2lfUX0x3odQ6090wNN8Ai', 'students', NULL, NULL, NULL),
(81, 'Javeriya Bano Hussain', 'sd17_javeriyabano_hussain@mgmcen.ac.in', NULL, '$2y$10$1HkOkt7Elw8yOnM476pIQeOoA.DryEDM6LjD5wjeyY2ruXR1hVAtS', 'students', NULL, NULL, NULL),
(82, 'Fatema Nehad', 'sd16_nehad_fatema@mgmcen.ac.in', NULL, '$2y$10$GzonE0493ZDF2avLGNJ37unRz2svKru4sXOIpb3FOit4mZsHtFpv2', 'students', NULL, NULL, NULL),
(83, 'Pratiksha Pawar', 's15_pawar_pratiksha@mgmcen.ac.in', NULL, '$2y$10$.XTCKzFHK9BLnVpFFi9FQuIu5YKhBHyrxNVotEqNsJb.A8GadxANe', 'students', NULL, NULL, NULL),
(84, 'Purushotam Shinde', 's13_shinde_purushotam@mgmcen.ac.in', NULL, '$2y$10$AMv28crTK2Y9Z/taL26ad.3NzeIl9ROkCPzwvUiIjvv66ZTz1pirS', 'students', NULL, NULL, NULL),
(85, 'Prachi Ghan', 's13_ghan_prachi@mgmcen.ac.in', NULL, '$2y$10$OjRDZaH0e9mtt3pnbfQUQ.ku5zdNLVohVr5C.TzDMmEgVDPMHVUHi', 'students', NULL, NULL, NULL),
(86, 'Sneha Shind', 's15_shinde_sneha@mgmcen.ac.in', NULL, '$2y$10$LKPFtJjYU3ACqp8HqrtXM.sNzivq1b/mqeYPmnnrxuiO.ucG0QiYe', 'students', NULL, NULL, NULL),
(87, 'Abhishek Bagate', 's16_bagate_abhishek@mgmcen.ac.in', NULL, '$2y$10$aVzBOPV4drdqjvTnsZivOuGKegEGRZAvcZx4SgHSQ.kZ1ZEX03qIa', 'students', NULL, NULL, NULL),
(88, 'Shweta Bhadke', 's16_bhadke_shweta@mgmcen.ac.in', NULL, '$2y$10$1qiM8xVcH2o5763TM/qOoexNVaPtClXCgoU8K9wIr93HVB0zQIYl6', 'students', NULL, NULL, NULL),
(89, 'Pooja Bhanushali', 's16_bhanushali_pooja@mgmcen.ac.in', NULL, '$2y$10$6F6G1iUNVfthooMuR97lyuonDnQykoyRYlKkc4Cq6k6QzAr/BGl5m', 'students', NULL, NULL, NULL),
(90, 'Anuja Chourange', 's16_chourange_anuj@mgmcen.ac.in', NULL, '$2y$10$lN8Zi38WC5NHCGX2nsJUwOjn2Tmz815xKfCeQm4RvTuCLD2BA65KW', 'students', NULL, NULL, NULL),
(91, 'Omkar Deshpande', 's16_deshpande_omkar@mgmcen.ac.in', NULL, '$2y$10$hHmhNYhw0u7v1OecNiES4.FFG0j9hgK/hLAl5u/8shJhoiq593Ll2', 'students', NULL, NULL, NULL),
(92, 'Shamali Gattani', 's16_gattani_shamali@mgmcen.ac.in', NULL, '$2y$10$0Bbdg0HESysS5urhYQXdAeEzmpSZ0cJ0Y79uJ36Ezdb3DS1sOsWMq', 'students', NULL, NULL, NULL),
(93, 'Gargi Joshi', 's16_joshi_gargi@mgmcen.ac.in', NULL, '$2y$10$1GNTjKDNBzpX9z8D4aolX.MjQd5/bL6GpccZqjkMxa2xtfMuklUeq', 'students', NULL, NULL, NULL),
(94, 'Shweta Julur', 's16_julur_shweta@mgmcen.ac.in', NULL, '$2y$10$3zlmnhnLgD/MQu4OXyOvO.Jh1tZ0wfXPCxUNo6eCmmKGmQ1wMUNIW', 'students', NULL, NULL, NULL),
(95, 'Minal Kaminwar', 's16_kaminwar_minal@mgmcen.ac.in', NULL, '$2y$10$e/7XEtRf3YPfHezdLth3U.hnlekgPFgaeG11iITonoVHssk5C8fEa', 'students', NULL, NULL, NULL),
(96, 'Samiksha Kulkarni', 's16_kulkarni_samiksha@mgmcen.ac.in', NULL, '$2y$10$.oW54MLI9O70CNkOhUncVOESIa5WYkn4Bn0uQGbDnfsOiUWk3SPMO', 'students', NULL, NULL, NULL),
(97, 'Snehal Mahajan', 's16_mahajan_snehal@mgmcen.ac.in', NULL, '$2y$10$d8JZsvcYnXT1bX62qRT0auTMts.l6dm6/UEqP9Ddt19isaU0VgEY.', 'students', NULL, NULL, NULL),
(98, 'Shraddha Mundada', 's16_mundada_shraddha@mgmcen.ac.in', NULL, '$2y$10$4VMbmWRtTKcmqwPR/qmyC.3nGIBRpS3kDKqURVMw.5G33pEhq4VF2', 'students', NULL, NULL, NULL),
(99, 'Shivani Vaidya', 's16_vaidya_shivani@mgmcen.ac.in', NULL, '$2y$10$a9SQQABZXKsw8L0NwRku0.iocHPx1XnCwCI69zkLy5w9GZbndWCS.', 'students', NULL, NULL, NULL),
(100, 'Pratiksha Walbe', 's16_walbe_pratiksha@mgmcen.ac.in', NULL, '$2y$10$TEPdz8sS7jfTHg5IRIYWKu8Zv15NYt6u98KyH61mkzg3NI7SGTYTa', 'students', NULL, NULL, NULL),
(101, 'Shubham Rai', 's16_rai_shubham@mgmcen.ac.in', NULL, '$2y$10$lTDfBAEXqKGWkUcP65PInOd2jdXu95/uT/uHRGiCK8HOaSMre9vyK', 'students', NULL, NULL, NULL),
(102, 'Nikita Narwade', 's14_narwade_nikita@mgmcen.ac.in', NULL, '$2y$10$DEmRFyxalS/5X/lyWAxHouqkHW8NE4evF.NgFZu.V9/H84aE9ExfC', 'students', NULL, NULL, NULL),
(103, 'Kartiki Shinde', 's16_shinde_kartiki@mgmcen.ac.in', NULL, '$2y$10$BfONz6SYlKQameIfG7L9o.2lgZGUE.1kisDDGZUUTYXhJoh3j48oe', 'students', NULL, NULL, NULL),
(104, 'Sadichcha Kulkarni', 's16_kulkarni_sadichcha@mgmcen.ac.in', NULL, '$2y$10$A6vc3XzM1xjHme8ZutS1QOm8itVdfW/H.OXd2Di0vfQkKXgfkZVcq', 'students', NULL, NULL, NULL),
(105, 'Sampada Kapratwar', 's16_kapratwar_sampada@mgmcen.ac.in', NULL, '$2y$10$Q9wPOUbjUSNUTOn3yvBTiegZNIyUtCuGeNp2kiA7OMoy5aLRJOKVi', 'students', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`Activity_ID`);

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`Auth_ID`),
  ADD KEY `authority_dept_id_foreign` (`Dept_ID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `counselling`
--
ALTER TABLE `counselling`
  ADD PRIMARY KEY (`V_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dept_ID`);

--
-- Indexes for table `drives`
--
ALTER TABLE `drives`
  ADD PRIMARY KEY (`Drive_ID`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`Notice_ID`),
  ADD KEY `notices_auth_id_foreign` (`Auth_ID`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placement_details`
--
ALTER TABLE `placement_details`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `placement_details_email_foreign` (`Email`);

--
-- Indexes for table `student_academics`
--
ALTER TABLE `student_academics`
  ADD PRIMARY KEY (`CASERP_ID`),
  ADD KEY `student_academics_email_foreign` (`Email`);

--
-- Indexes for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `student_profile_email_foreign` (`Email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `counselling`
--
ALTER TABLE `counselling`
  MODIFY `V_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `placement_details`
--
ALTER TABLE `placement_details`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `student_profile`
--
ALTER TABLE `student_profile`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authority`
--
ALTER TABLE `authority`
  ADD CONSTRAINT `authority_dept_id_foreign` FOREIGN KEY (`Dept_ID`) REFERENCES `department` (`Dept_ID`);

--
-- Constraints for table `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `notices_auth_id_foreign` FOREIGN KEY (`Auth_ID`) REFERENCES `authority` (`Auth_ID`);

--
-- Constraints for table `placement_details`
--
ALTER TABLE `placement_details`
  ADD CONSTRAINT `placement_details_email_foreign` FOREIGN KEY (`Email`) REFERENCES `login_details` (`Email`);

--
-- Constraints for table `student_academics`
--
ALTER TABLE `student_academics`
  ADD CONSTRAINT `student_academics_email_foreign` FOREIGN KEY (`Email`) REFERENCES `login_details` (`Email`);

--
-- Constraints for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD CONSTRAINT `student_profile_email_foreign` FOREIGN KEY (`Email`) REFERENCES `login_details` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
