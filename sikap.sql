-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2017 at 04:43 PM
-- Server version: 10.0.29-MariaDB-0ubuntu0.16.10.1
-- PHP Version: 7.0.15-0ubuntu0.16.10.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikap`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `no_hp`) VALUES
('19670308', 'Dadang Hamdani, M.Kom.', '08178965412'),
('19700206', 'Eko Aribowo, S.T, M.Kom', '08125361478'),
('19731014', 'Arif Bramantoro, S.T.', '08531269874'),
('19760819', 'Nur Rochmah, S.T., M.Kom', '08165478962'),
('19800105', 'Abdul Aziz, M.Kom', '08123654789'),
('19801115', 'Fiftin Noviyanto, S.T., M.Cs', '08178213654');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `id_kerja_praktek` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `id_seminar` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`id_kerja_praktek`, `nim`, `id_seminar`) VALUES
(1, '7115002', NULL),
(1, '7115008', NULL),
(2, '8115003', 2),
(2, '8115015', 2),
(2, '8115021', NULL),
(3, '9115003', NULL),
(4, '7115018', NULL),
(4, '9115004', NULL),
(5, '7115004', NULL),
(5, '8115051', NULL),
(5, '9115002', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kerja_praktek`
--

CREATE TABLE `kerja_praktek` (
  `id` int(11) NOT NULL,
  `id_perusahaan` int(10) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` enum('Terdaftar','Diajukan','Terkirim','Diterima','Kerja Praktek','Laporan','Selesai') NOT NULL DEFAULT 'Terdaftar',
  `nip_dosen` varchar(20) DEFAULT NULL,
  `no_surat` varchar(20) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `tanggal_diubah` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kerja_praktek`
--

INSERT INTO `kerja_praktek` (`id`, `id_perusahaan`, `tanggal_mulai`, `tanggal_selesai`, `status`, `nip_dosen`, `no_surat`, `tanggal_surat`, `tanggal_diubah`) VALUES
(1, 1, '2017-06-06', '2017-08-06', 'Kerja Praktek', '19670308', '01/TE/KP/III/2017', '2017-05-08', '2017-05-09'),
(2, 2, '2017-06-09', '2017-09-09', 'Laporan', '19670308', '02/TJ/KP/III/2017', '2017-05-08', '2017-05-09'),
(3, 3, '2017-06-06', '2017-08-06', 'Terkirim', NULL, NULL, NULL, '2017-05-09'),
(4, 4, '2017-06-09', '2017-08-09', 'Terdaftar', NULL, NULL, NULL, '2017-05-09'),
(5, 5, '2017-06-09', '2017-08-09', 'Diajukan', NULL, NULL, NULL, '2017-05-08');

--
-- Triggers `kerja_praktek`
--
DELIMITER $$
CREATE TRIGGER `before_kp_insert` BEFORE INSERT ON `kerja_praktek` FOR EACH ROW BEGIN
SET NEW.tanggal_diubah = CURDATE();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_kp_update` BEFORE UPDATE ON `kerja_praktek` FOR EACH ROW BEGIN
IF NEW.status <> OLD.status THEN
SET NEW.tanggal_diubah = CURDATE();
END IF;
IF NOT NEW.no_surat <=> OLD.no_surat THEN
SET NEW.tanggal_surat = CURDATE();
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('P','L') DEFAULT NULL,
  `asal` varchar(20) DEFAULT NULL,
  `jurusan` varchar(20) NOT NULL,
  `angkatan` varchar(5) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `asal`, `jurusan`, `angkatan`, `no_hp`) VALUES
('7115002', 'Andi Suryawan', '1997-07-03', 'L', 'Yogyakarta', 'Teknik Elektro', '2015', '08191736482'),
('7115004', 'Edi Susiono', '1996-01-02', 'L', 'Madiun', 'Elins', '2015', '08164937198'),
('7115008', 'Indriadi Iswanto', '1996-05-29', 'L', 'Surabaya', 'Teknik Elektro', '2015', '08514523698'),
('7115018', 'M Pramono', '1997-08-13', 'L', 'Pati', 'Komsi', '2015', '0877952355'),
('8115002', 'Aida Afni', '1996-04-16', 'P', 'Yogyakarta', 'Metins', '2015', '08562928937'),
('8115003', 'Al Khairi', '1996-06-02', 'L', 'Palembang', 'Teknologi Jaringan', '2015', '08124356978'),
('8115005', 'Candra Aminoto', '2017-12-11', 'L', 'Pontianak', 'Teknik Elektro', '2015', '08165479832'),
('8115015', 'Herman Syah', '1997-04-25', 'L', 'Ngawi', 'Teknologi Jaringan', '2015', '08578965412'),
('8115021', 'Defrizal', '1997-09-17', 'L', 'Yogyakarta', 'Teknologi Jaringan', '2015', '0877456321'),
('8115051', 'Ahmad Sunardi', '1997-02-25', 'L', 'Surabaya', 'Elins', '2015', '08156852679'),
('9115001', 'Adi Sastra', '1996-01-01', 'L', 'Jakarta', 'Teknik Elektro', '2015', '08157997868'),
('9115002', 'Anggara Dewi', '1996-08-14', 'P', 'Sragen', 'Elins', '2015', '08137918264'),
('9115003', 'Anggun Maulia', '1997-09-29', 'P', 'Banten', 'Metins', '2015', '08191732864'),
('9115004', 'Annisya Mardhotilla', '1996-10-08', 'P', 'Lampung', 'Komsi', '2015', '08139821746'),
('9115010', 'Agus Surahmad', '1996-02-06', 'L', 'Solo', 'Metins', '2015', '08178541236'),
('9115014', 'Erwin Sugianto', '1997-03-18', 'L', 'Magelang', 'Komsi', '2015', '08512365478'),
('9115027', 'M Ayub Candra', '1997-08-20', 'L', 'Cirebon', 'Metins', '2015', '08597863215'),
('9115032', 'Misbakhul Munir', '1996-10-11', 'L', 'Yogyakarta', 'Teknik Elektro', '2015', '0815631254'),
('9115055', 'Agustina', '1996-03-11', 'P', 'Bandung', 'Teknologi Jaringan', '2015', '08164261209'),
('9115056', 'Ajariah Yusni Novita', '1997-05-01', 'P', 'Malang', 'Komsi', '2015', '08163425378'),
('9115057', 'Atria Ria Winda Sari', '1997-11-26', 'P', 'Medan', 'Teknologi Jaringan', '2015', '08179846513'),
('9115073', 'Iqbal Muchaimin', '1997-06-26', 'L', 'Yogyakarta', 'Elins', '2015', '08574351269'),
('9115074', 'Jefri Yanto', '1996-07-26', 'L', 'Jakarta', 'Metins', '2015', '08577852147');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama`, `alamat`, `kontak`) VALUES
(1, 'PLN Jogja', 'Jl. Gedongkuning No.3, Banguntapan, Bantul, Daerah Istimewa Yogyakarta 55198', '(0274) 387365'),
(2, 'PT. Indonesia Comnet', 'Jl. Gandul Raya Sawangan Sawangan Depok Jawa Barat, Sawangan Lama, Sawangan, Kota Depok, Jawa Barat ', '(021) 7532489'),
(3, 'PT. Pindad', 'Jl. Batu Ceper No.28, RT.1/RW.2, Kb. Klp., Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta', '(021) 3806929'),
(4, 'Gameloft Indonesia', 'Jl. H.O.S. Cokroaminoto No.73, Pakuncen, Wirobrajan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55253', '(0274) 4469477'),
(5, 'PT. Nissin Biscuit I', 'Jl. Argopuro No.38, Lempongsari, Gajahmungkur, Kota Semarang, Jawa Tengah 50231', '(024) 8447849');

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `id` int(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`id`, `judul`, `tanggal`) VALUES
(2, 'INSTALASI JARINGAN CLEAR CHANNEL DI PT INDONESIA COMNETS  PLUS  REGION AL JAWA TENGAH DAN DIY', '2017-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `surat_tugas`
--

CREATE TABLE `surat_tugas` (
  `nim` varchar(20) CHARACTER SET latin1 NOT NULL,
  `no_surat` varchar(20) CHARACTER SET latin1 NOT NULL,
  `tanggal_surat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_tugas`
--

INSERT INTO `surat_tugas` (`nim`, `no_surat`, `tanggal_surat`) VALUES
('8115003', '01/TJ/ST/III/2017', '2017-05-09'),
('8115015', '02/TJ/ST/III/2017', '2017-05-09'),
('8115021', '03/TJ/ST/III/2017', '2017-05-09'),
('7115002', '01/TE/ST/III/2017', '2017-05-09'),
('7115008', '02/TE/ST/III/2017', '2017-05-09');

--
-- Triggers `surat_tugas`
--
DELIMITER $$
CREATE TRIGGER `before_surat_insert` BEFORE INSERT ON `surat_tugas` FOR EACH ROW BEGIN
SET NEW.tanggal_surat = CURDATE();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_admin` varchar(30) DEFAULT NULL,
  `user_dosen` varchar(30) DEFAULT NULL,
  `user_mahasiswa` varchar(30) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','dosen','mahasiswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_admin`, `user_dosen`, `user_mahasiswa`, `password`, `role`) VALUES
('admin', NULL, NULL, '$2y$10$zx4YtrAPMqMqN6H.gb5v7uiwntP8BMqi8C.gOuRRbtGPSTqDNxufi', 'admin'),
(NULL, NULL, '9115001', '$2y$10$Ebu7IGXNXmFbtAf/1u8F/OBdTxCZi2T4zomulUdYrcZ4n0G3c6ECK', 'mahasiswa'),
(NULL, NULL, '9115055', '$2y$10$YrFPvyrOBe6GHIIgHKrUQuYbHdMBMlVoKbc8MeE9Y2pWHT5Rvavla', 'mahasiswa'),
(NULL, NULL, '8115051', '$2y$10$rU028qF3gVEARhMkZ/eTKO9zNVnyLX7F6Up.D1NG6ZvtvXWFJARtW', 'mahasiswa'),
(NULL, NULL, '8115002', '$2y$10$72bRA72pzUFfH3pF0IhSxeLb3jqFsaWvTBrWHFcJWAc6/daQ4Uqqy', 'mahasiswa'),
(NULL, NULL, '9115056', '$2y$10$PWC9UiYJYkiRi6wJpfWTPeyvXf1.JyM5i1jp1576JbxEg0BAM1wly', 'mahasiswa'),
(NULL, NULL, '8115003', '$2y$10$5caIVjyFIR4hsaqz90O5iu5KYNZ3pI8YeEt4J3f3/4/n51Wq/JglW', 'mahasiswa'),
(NULL, NULL, '7115002', '$2y$10$tdBSgBC87MrdF5y65Z5.rOzYMwQf7EBkc2ERtGe2og7PUaBjiePAW', 'mahasiswa'),
(NULL, NULL, '9115002', '$2y$10$ElvlrcCJUkn853.RO5RSsukhxQ3LQyIHCohZrYT7uatjWWp/Dkc5S', 'mahasiswa'),
(NULL, NULL, '9115003', '$2y$10$5ULcJ1zy///OCYqVWWR.oOVdtW5LPDHaDvRB2w3.PtFJcDCg.XXDK', 'mahasiswa'),
(NULL, NULL, '9115004', '$2y$10$IYhOFOOkGsnXJOyoLtMAoudnP9ZCWk7JQB.G6Bfz0RWniiulbYiG2', 'mahasiswa'),
(NULL, NULL, '9115057', '$2y$10$/qCg/NIYU8bYhdmDQYrVO.7doIR7wKDWI4vfF6z5nJQP5mun.ohmS', 'mahasiswa'),
(NULL, NULL, '8115005', '$2y$10$ye0Rq6IFzxGWsMDod77BwOSgkhu/H3k3BTwrmKzQgBg1LuuLiGtri', 'mahasiswa'),
(NULL, NULL, '7115004', '$2y$10$cyHrHm5S2VWqyS0t37QJEujgVR36JB9i/2ggxiIkloJEux/yCNKZ.', 'mahasiswa'),
(NULL, NULL, '9115010', '$2y$10$3K.bE8KbtcYqffTuiVyAx.VDSmfOkXT76wp9r4mGqSUtmy1Y7jZCu', 'mahasiswa'),
(NULL, NULL, '9115014', '$2y$10$T9HczIsF83ghgsrXkSWXve9tHZqPBBPQoHkA406Yd3mLCaAMGHIW6', 'mahasiswa'),
(NULL, NULL, '8115015', '$2y$10$9i9X6VGrKRjNBH6HShhT/.O5t82i5rJp.qtZK50uIzCA8Vc169RmC', 'mahasiswa'),
(NULL, NULL, '7115008', '$2y$10$520tA6iig0o9pCLTOj.RAOIP5ipq73GQmvBOPdWh0oox2FvCmLoSC', 'mahasiswa'),
(NULL, NULL, '9115073', '$2y$10$jkluN.MKPEI85JX8.knHMuqj83I1KdIm30WMB/lqimDGqiJ9aE7G6', 'mahasiswa'),
(NULL, NULL, '9115074', '$2y$10$QMuFSoKDk5ihN9IGDa4YkedB7ceiLI.mWBPrSnRSnY9J78etCeCdK', 'mahasiswa'),
(NULL, NULL, '9115027', '$2y$10$JC5N6M5g3/Z.eQVPkC.euOSGMjw.GUA3/pI9LFYpetEiGuw2aicHW', 'mahasiswa'),
(NULL, NULL, '7115018', '$2y$10$R8NDaGSBpICKo55rE8I9COg3A4PSOPO3MRQBIOFvDbCuaqt.1s1rW', 'mahasiswa'),
(NULL, NULL, '8115021', '$2y$10$IePXf5ejAMxwLB8vgjj/WO7Ng1qKZVD3A.Yw6/xIE7JWmYG/lzH6G', 'mahasiswa'),
(NULL, NULL, '9115032', '$2y$10$iuHMmqmHU68yW8SfRFBuQO9V8qLWPG5wAZ7mLvq86afMeXXROYYUC', 'mahasiswa'),
(NULL, '19670308', NULL, '$2y$10$1saGclcI9WKPDSrnZ3h4rOtkyhZ93w2b08dqOfvBk3bgn.3FnJ07K', 'dosen'),
(NULL, '19800105', NULL, '$2y$10$e9OjCCxeqGYP.8E0LHcwJull7rGZlBppYBO0QLyq7vbbbWi6srCfu', 'dosen'),
(NULL, '19731014', NULL, '$2y$10$Z/9FkYiaZ5NhjiCgoE6/5.G10dKhjheOKMoQvmPc1gl0Z2ZDU3v8e', 'dosen'),
(NULL, '19700206', NULL, '$2y$10$LNm3sxLhCHpetwM9Ujw8j.B06WR/vBpL2F/eOEivlrDQMplyT2P3G', 'dosen'),
(NULL, '19801115', NULL, '$2y$10$.tdrWEqAodiw/rnwRniyHeD4A0VGAYpcswQFQ05R4wq.ZpsvLtGn2', 'dosen'),
(NULL, '19760819', NULL, '$2y$10$/Va4GLNuw28A2ggHK069.O4C3OGDVCzo5L3otwcsIs7oJMh1er7i2', 'dosen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD KEY `nim` (`nim`),
  ADD KEY `id_kerja_praktek` (`id_kerja_praktek`),
  ADD KEY `id_seminar` (`id_seminar`);

--
-- Indexes for table `kerja_praktek`
--
ALTER TABLE `kerja_praktek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_perusahaan` (`id_perusahaan`),
  ADD KEY `nip_dosen` (`nip_dosen`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD KEY `user_admin` (`user_admin`),
  ADD KEY `user_dosen` (`user_dosen`),
  ADD KEY `user_mahasiswa` (`user_mahasiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kerja_praktek`
--
ALTER TABLE `kerja_praktek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD CONSTRAINT `kelompok_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kelompok_ibfk_2` FOREIGN KEY (`id_kerja_praktek`) REFERENCES `kerja_praktek` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelompok_ibfk_3` FOREIGN KEY (`id_seminar`) REFERENCES `seminar` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `kerja_praktek`
--
ALTER TABLE `kerja_praktek`
  ADD CONSTRAINT `kerja_praktek_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kerja_praktek_ibfk_2` FOREIGN KEY (`nip_dosen`) REFERENCES `dosen` (`nip`) ON UPDATE CASCADE;

--
-- Constraints for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD CONSTRAINT `surat_tugas_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_dosen`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`user_mahasiswa`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
