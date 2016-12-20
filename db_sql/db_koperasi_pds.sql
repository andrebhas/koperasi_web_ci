-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2016 at 06:36 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_koperasi_pds`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `noanggota` char(10) NOT NULL,
  `namaanggota` varchar(50) NOT NULL,
  `jk` char(2) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `hp` char(30) NOT NULL,
  `noidentitas` char(30) NOT NULL,
  `pwd` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`noanggota`, `namaanggota`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `hp`, `noidentitas`, `pwd`) VALUES
('A003', 'Dedy Teguh P', 'L', 'Padepokan dimas kanjeng', '2006-11-02', 'Padepokan dimas kanjeng ', '8766668', '7657565', '4b2770de9b8e1d12df1be94c096cfc29'),
('A002', 'Agung Sudiamintoro', 'L', 'Jember', '2006-11-02', 'Probolinggo', '9785644', '757657578', '4b2770de9b8e1d12df1be94c096cfc29'),
('A001', 'Ivana Agustin', 'P', 'Banjarmasin', '2006-11-07', 'jember', '97866795675', '767856757557', '4b2770de9b8e1d12df1be94c096cfc29'),
('A8241', 'Andre Bhaskoro', 'L', 'jember', '1992-11-17', 'cempaka 38', '082333817317', '1231231231', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_jenis` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_jenis`, `nama_barang`, `harga`) VALUES
(1, 'Beras Lele 5kg', 500000),
(2, 'Minyak Goreng Bimoli 2lt', 18000),
(3, 'Sempol', 1000),
(4, 'Mie Sedaap Kare', 1500),
(5, 'Susu Ultra Milk', 4500),
(6, 'Abon Sapi', 10000),
(7, 'Nugget', 17500),
(8, 'Fiesta Chicken Nugget', 23000),
(9, 'Marjan', 20000),
(10, 'Indomie Goreng', 2000),
(11, 'Sirup ABC', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Akses Administrator'),
(2, 'members', 'Akses General User');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_simpan`
--

CREATE TABLE `jenis_simpan` (
  `id_jenis` int(11) NOT NULL,
  `jenis_simpanan` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_simpan`
--

INSERT INTO `jenis_simpan` (`id_jenis`, `jenis_simpanan`, `jumlah`) VALUES
(1, 'Simpanan Pokok', 50000),
(2, 'Simpanan Wajib', 30000),
(3, 'Simpanan Sukarela', 30000),
(4, 'tes', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shu`
--

CREATE TABLE `shu` (
  `id_shu` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `noanggota` char(10) NOT NULL,
  `jml_shu_diterima` int(11) NOT NULL,
  `jml_shu_keseluruhan` int(11) NOT NULL,
  `laba` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shu`
--

INSERT INTO `shu` (`id_shu`, `tgl`, `noanggota`, `jml_shu_diterima`, `jml_shu_keseluruhan`, `laba`) VALUES
(2, '2016-11-16', '11', 212871, 218721878, 2121),
(3, '2016-11-06', '1211', 21988, 229819821, 21982),
(4, '2016-11-28', 'A8241 - An', 101436275, 1013500, 123455003),
(5, '2016-12-15', 'A8241 - An', 10043, 1013500, 12223),
(6, '2016-12-14', 'A003', 19490, 70000, 343434);

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id_simpanan` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `noanggota` char(10) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id_simpanan`, `tgl`, `noanggota`, `id_jenis`, `jumlah`, `user_id`) VALUES
(1, '2012-07-25', 'A001', 1, 50000, 1),
(2, '2012-07-25', 'A001', 2, 30000, 1),
(6, '2012-07-25', 'A001', 3, 60000, 1),
(7, '2012-07-26', 'A001', 3, 60000, 1),
(8, '2012-07-27', 'A001', 3, 100000, 1),
(9, '2012-07-28', 'A001', 3, 100000, 1),
(10, '2012-08-02', 'A001', 3, 80000, 1),
(11, '2012-08-02', 'A001', 3, 70000, 1),
(12, '2012-08-03', 'A001', 3, 70000, 1),
(13, '2013-03-09', 'A001', 1, 50000, 1),
(14, '2016-11-02', 'A006', 1, 50000, 1),
(15, '2016-11-03', 'A0061', 4, 20000, 1),
(16, '2016-11-09', 'A006', 1, 50000, 1),
(17, '2016-11-01', 'A006', 2, 30000, 1),
(18, '2016-12-08', 'A001', 1, 100000, 1),
(19, '2016-12-14', 'A8241', 2, 100000, 1),
(20, '2016-12-29', 'A001', 4, 150000, 1),
(21, '2016-12-13', 'A002', 4, 75000, 1),
(22, '2016-12-28', 'A002', 3, 100000, 1),
(23, '2016-12-16', 'A8241', 3, 1000000, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_simpanan`
--
CREATE TABLE `total_simpanan` (
`noanggota` char(10)
,`namaanggota` varchar(50)
,`total` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_kop`
--

CREATE TABLE `transaksi_kop` (
  `id_transaksi` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `noanggota` char(10) NOT NULL,
  `id_jenis` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_kop`
--

INSERT INTO `transaksi_kop` (`id_transaksi`, `tgl`, `noanggota`, `id_jenis`, `jumlah`, `user_id`) VALUES
(1, '2016-11-01', 'A001', '01', 50000, ''),
(10, '2016-12-29', 'A8241', '1', 1000000, '1'),
(3, '2016-11-03', 'A001', '02', 30000, ''),
(4, '2016-11-03', 'A001', '01', 50000, ''),
(5, '2016-11-02', 'A003', '04', 20000, 'admin'),
(6, '2016-11-02', 'A003', '01', 50000, 'admin'),
(7, '2016-11-02', 'A001', '11', 20000, '1'),
(9, '2016-11-29', 'A8241', '5', 13500, '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `alamat` varchar(256) NOT NULL,
  `user_img` varchar(100) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `username`, `password`, `phone`, `alamat`, `user_img`, `ip_address`, `last_login`, `salt`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `active`, `created_on`) VALUES
(1, 'Admin', 'admin@admin.com', 'admin', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '082333817317', 'Jln Cempaka No 38 Jember', 'usr_img_5e2f99c.png', '127.0.0.1', 1482062467, '', NULL, NULL, NULL, NULL, 1, 1268889823),
(2, 'andre', 'andrebhas@facebook.com', 'andre', '$2y$08$XLacwn4vTYKk7cuglS0lLu57yciEzBCJnFjbQNlVHRvGsI/XwuRKS', '082333817317', 'Jln Cempaka No 38 Jember', 'usr_img_a223c6b.png', '::1', 1475055540, NULL, NULL, NULL, NULL, NULL, 1, 1475044981);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Structure for view `total_simpanan`
--
DROP TABLE IF EXISTS `total_simpanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_simpanan`  AS  select `anggota`.`noanggota` AS `noanggota`,`anggota`.`namaanggota` AS `namaanggota`,(select sum(`simpanan`.`jumlah`) from `simpanan` where (`simpanan`.`noanggota` = `anggota`.`noanggota`)) AS `total` from `anggota` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`noanggota`),
  ADD UNIQUE KEY `noanggota` (`noanggota`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_simpan`
--
ALTER TABLE `jenis_simpan`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shu`
--
ALTER TABLE `shu`
  ADD PRIMARY KEY (`id_shu`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id_simpanan`),
  ADD KEY `noanggota` (`noanggota`);

--
-- Indexes for table `transaksi_kop`
--
ALTER TABLE `transaksi_kop`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis_simpan`
--
ALTER TABLE `jenis_simpan`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shu`
--
ALTER TABLE `shu`
  MODIFY `id_shu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id_simpanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `transaksi_kop`
--
ALTER TABLE `transaksi_kop`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
