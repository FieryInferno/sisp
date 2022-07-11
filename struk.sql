-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2022 at 09:53 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `struk`
--

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `nama_pimpinan` varchar(100) DEFAULT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longtitude` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `kode`, `nama`, `kota`, `telepon`, `alamat`, `nama_pimpinan`, `latitude`, `longtitude`) VALUES
(1, '001', 'JAKARTA', 'JAKARTA', '021837844', 'JALAN BANDUNG', 'Muh. Muis Suhaeri', '-7.2927491', '112.7367578'),
(2, '002', 'BANDUNG', 'BANDUNG', '021478748', 'JALAN BANDUNG', 'ERNAWATI', '-7.161911', '113.491629'),
(3, '003', 'BOGOR', 'BOGOR', '021748714', 'JALAN BOGOR', 'ADMINISTRATOR', '-7.0323094', '112.7448576');

-- --------------------------------------------------------

--
-- Table structure for table `penawaran`
--

CREATE TABLE `penawaran` (
  `id` int(11) NOT NULL,
  `BRNAME` varchar(200) DEFAULT NULL,
  `RENAME` varchar(50) DEFAULT NULL,
  `POREFN` varchar(200) DEFAULT NULL,
  `POTRCO` varchar(50) DEFAULT NULL,
  `PORECO` varchar(200) DEFAULT NULL,
  `PODESC` varchar(20) DEFAULT NULL,
  `PODTPO` datetime DEFAULT NULL,
  `NOMINAL` int(100) DEFAULT NULL,
  `POSTAT` varchar(50) DEFAULT NULL,
  `lokasi_id` int(1) DEFAULT NULL,
  `PODTVL` varchar(200) DEFAULT NULL,
  `POTIME` varchar(100) DEFAULT NULL,
  `POUSER` varchar(100) DEFAULT NULL,
  `OPDESC` varchar(100) DEFAULT NULL,
  `created_by` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penawaran`
--

INSERT INTO `penawaran` (`id`, `BRNAME`, `RENAME`, `POREFN`, `POTRCO`, `PORECO`, `PODESC`, `PODTPO`, `NOMINAL`, `POSTAT`, `lokasi_id`, `PODTVL`, `POTIME`, `POUSER`, `OPDESC`, `created_by`, `created_at`) VALUES
(17, 'JAKARTA', 'EKO PAMBUDI', '0034535', '110', '03479534', 'PERBAIKAN', '2021-09-08 14:02:03', 72000, '1', 1, '20220608', '102404', 'ADM011', 'MUHAMMAD ILHAM KUSUMA', 2, '2021-09-08 07:02:03'),
(18, 'SOLO', 'CV. ABADI NUGRAHA', '3893548', '230', '29493592', 'PENAMBAHAN KABEL JAR', '2021-09-23 10:41:23', 579000, '1', 1, '20220608', '093212', 'ADM350', 'IIN INAYAH', 2, '2021-09-23 03:41:23'),
(19, NULL, NULL, '123123', '123123', '123123', 'berita', '2022-07-03 10:06:59', 1200, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-03 03:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `prm_master_area`
--

CREATE TABLE `prm_master_area` (
  `id_area` int(11) NOT NULL,
  `nama_area` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prm_master_area`
--

INSERT INTO `prm_master_area` (`id_area`, `nama_area`) VALUES
(1, 'JAKARTA');

-- --------------------------------------------------------

--
-- Table structure for table `prm_master_karyawan`
--

CREATE TABLE `prm_master_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(10) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prm_master_karyawan`
--

INSERT INTO `prm_master_karyawan` (`id_karyawan`, `nik`, `nama_lengkap`) VALUES
(1, '12345', 'ADMINISTRATOR'),
(2, '12314', 'MUIS'),
(3, '1241242', 'ERNAWATI');

-- --------------------------------------------------------

--
-- Table structure for table `prm_user`
--

CREATE TABLE `prm_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nik` int(11) DEFAULT NULL,
  `kode_kantor` varchar(5) DEFAULT NULL,
  `id_divisi` int(11) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `user_id_induk` int(11) DEFAULT NULL,
  `id_group_menu` int(11) DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `flg_block` int(11) DEFAULT 0,
  `tgl_expired` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prm_user`
--

INSERT INTO `prm_user` (`user_id`, `user_name`, `password`, `nik`, `kode_kantor`, `id_divisi`, `id_jabatan`, `user_id_induk`, `id_group_menu`, `id_area`, `email`, `flg_block`, `tgl_expired`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 12345, '1', 1, 1, 1, 1, 1, 'ao@bprxx.com', 0, '2020-12-31'),
(6, 'muis', '202cb962ac59075b964b07152d234b70', 12314, '1', 3, 2, 1, NULL, NULL, NULL, 0, '2021-09-30'),
(7, 'erna', '202cb962ac59075b964b07152d234b70', 1241242, '1', 3, 2, 6, NULL, NULL, NULL, 0, '2021-09-30');

-- --------------------------------------------------------

--
-- Stand-in structure for view `rekap`
-- (See below for the actual view)
--
CREATE TABLE `rekap` (
`BRNAME` varchar(200)
,`RENAME` varchar(50)
,`POREFN` varchar(200)
,`POTRCO` varchar(50)
,`PORECO` varchar(200)
,`PODESC` varchar(20)
,`PODTPO` varchar(100)
,`NOMINAL` int(100)
,`POSTAT` varchar(50)
,`nama_lokasi` varchar(50)
,`alamat_lokasi` varchar(200)
,`nama_pimpinan` varchar(100)
,`PODTVL1` varchar(200)
,`PODTVL2` varchar(200)
,`PODTVL3` varchar(200)
,`POTIME` varchar(100)
,`nama_user` varchar(50)
,`created_at` timestamp
,`jenis` varchar(9)
,`POUSER` varchar(100)
,`OPDESC` varchar(100)
,`id_lokasi` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `uang_muka`
--

CREATE TABLE `uang_muka` (
  `id` int(11) NOT NULL,
  `BRNAME` varchar(200) DEFAULT NULL,
  `RENAME` varchar(50) DEFAULT NULL,
  `POREFN` varchar(200) DEFAULT NULL,
  `POTRCO` varchar(50) DEFAULT NULL,
  `PORECO` varchar(200) DEFAULT NULL,
  `PODESC` varchar(20) DEFAULT NULL,
  `PODTPO` varchar(100) DEFAULT NULL,
  `NOMINAL` int(100) DEFAULT NULL,
  `POSTAT` varchar(50) DEFAULT NULL,
  `lokasi_id` int(1) DEFAULT NULL,
  `PODTVL1` varchar(200) DEFAULT NULL,
  `PODTVL2` varchar(200) DEFAULT NULL,
  `PODTVL3` varchar(200) DEFAULT NULL,
  `POTIME` varchar(100) DEFAULT NULL,
  `POUSER` varchar(100) DEFAULT NULL,
  `OPDESC` varchar(100) DEFAULT NULL,
  `created_by` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uang_muka`
--

INSERT INTO `uang_muka` (`id`, `BRNAME`, `RENAME`, `POREFN`, `POTRCO`, `PORECO`, `PODESC`, `PODTPO`, `NOMINAL`, `POSTAT`, `lokasi_id`, `PODTVL1`, `PODTVL2`, `PODTVL3`, `POTIME`, `POUSER`, `OPDESC`, `created_by`, `created_at`) VALUES
(10, 'MALANG', 'MUHAMMAD FATTAH', '24837242', '2300', '035394538', 'PASANG BARU', '2021-09-08 14:01:41', 27000, '3', 1, '20220606', '20220606', '20220606', '110411', 'ADM001', 'IIM IBRAHIM', 2, '2021-09-08 07:01:41'),
(11, 'BANDUNG', 'PT. ABADI CIPTA', '2398432', '2300', '394839348', 'TAMBAH ROUTER', '2021-09-08 14:09:05', 349000, '8', 1, '20220606', '20220606', '20220606', '104943', 'ADM324', 'AGUNG SETIABUDI', 2, '2021-09-08 07:09:05'),
(12, 'BANDUNG', 'FIRMAN', '3842356', '2300', '5948587334', 'TAMBAH ROUTER', '2021-09-08 14:12:34', 84500, '5', 1, '20220606', '20220606', '20220606', '092323', 'ADM324', 'AGUNG SETIABUDI', 2, '2021-09-08 07:12:34'),
(13, 'BANDUNG', 'SAMLAWI', '34589476', '2300', '468543434', 'TAMBAH ROUTER', '2021-09-23 13:16:35', 84500, '8', 1, '20220606', '20220606', '20220606', '091215', 'ADM324', 'AGUNG SETIABUDI', 2, '2021-09-23 06:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nip` varchar(150) DEFAULT NULL,
  `level` enum('admin','user') DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `email`, `no_hp`, `alamat`, `nip`, `level`, `updated_at`, `created_at`) VALUES
(1, 'eka', '$2y$10$CBqY4Ptyv23d72osk4mfJO0E5fYezG6pRKSysXht0GeI7BS4lQvqa', 'EKA PRASETYO', 'eka@gmail.com', '08738478234', 'jl. raya pandeglang banten', '284278342', 'admin', '2022-07-03 08:22:24', NULL),
(2, 'admin', '$2y$10$CBqY4Ptyv23d72osk4mfJO0E5fYezG6pRKSysXht0GeI7BS4lQvqa', 'admin', 'admin@gmail.com', '085723853284', 'Subang', '10104019', 'admin', '2022-07-03 07:06:36', NULL),
(4, 'bagassetia', '$2y$10$WVPJaLibUfAeVKfcrCE1YeV/cBn3y2PgTjhlAzjmo4Xam7RG67sbC', 'M. Bagas Setia Permana', 'bagassetia271@gmail.com', '085723853284', 'subang', '10104019', 'user', '2022-07-03 01:32:38', '2022-07-03 01:24:08'),
(5, 'devi', '$2y$10$CBqY4Ptyv23d72osk4mfJO0E5fYezG6pRKSysXht0GeI7BS4lQvqa', 'Devi Ratna Daniati', 'fieryinferno33@gmail.com', '085723853284', 'subang', '10104911', 'user', '2022-07-11 07:52:49', '2022-07-03 01:25:19'),
(8, 'user', '$2y$10$/42MdbWFK.Pr7bgYsylizeLbdzyDEubv7cZcmHff7gsiqIgm4JomS', 'user', 'user@gmail.com', '08777', 'Bandung', '123456', 'user', '2022-07-03 19:35:10', '2022-07-03 19:35:10');

-- --------------------------------------------------------

--
-- Structure for view `rekap`
--
DROP TABLE IF EXISTS `rekap`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rekap`  AS SELECT `penawaran`.`BRNAME` AS `BRNAME`, `penawaran`.`RENAME` AS `RENAME`, `penawaran`.`POREFN` AS `POREFN`, `penawaran`.`POTRCO` AS `POTRCO`, `penawaran`.`PORECO` AS `PORECO`, `penawaran`.`PODESC` AS `PODESC`, `penawaran`.`PODTPO` AS `PODTPO`, `penawaran`.`NOMINAL` AS `NOMINAL`, `penawaran`.`POSTAT` AS `POSTAT`, `lokasi`.`nama` AS `nama_lokasi`, `lokasi`.`alamat` AS `alamat_lokasi`, `lokasi`.`nama_pimpinan` AS `nama_pimpinan`, `penawaran`.`PODTVL` AS `PODTVL1`, '' AS `PODTVL2`, '' AS `PODTVL3`, `penawaran`.`POTIME` AS `POTIME`, `users`.`nama_lengkap` AS `nama_user`, `penawaran`.`created_at` AS `created_at`, 'penawaran' AS `jenis`, `penawaran`.`POUSER` AS `POUSER`, `penawaran`.`OPDESC` AS `OPDESC`, `lokasi`.`id` AS `id_lokasi` FROM ((`penawaran` left join `lokasi` on(`penawaran`.`lokasi_id` = `lokasi`.`id`)) left join `users` on(`penawaran`.`created_by` = `users`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penawaran`
--
ALTER TABLE `penawaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prm_master_area`
--
ALTER TABLE `prm_master_area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `prm_master_karyawan`
--
ALTER TABLE `prm_master_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `prm_user`
--
ALTER TABLE `prm_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `uang_muka`
--
ALTER TABLE `uang_muka`
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
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penawaran`
--
ALTER TABLE `penawaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `prm_master_area`
--
ALTER TABLE `prm_master_area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prm_master_karyawan`
--
ALTER TABLE `prm_master_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prm_user`
--
ALTER TABLE `prm_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `uang_muka`
--
ALTER TABLE `uang_muka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
