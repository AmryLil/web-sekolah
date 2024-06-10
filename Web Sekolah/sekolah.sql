-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 12:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `gmail` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `gmail`, `password`) VALUES
(1, 'Admin 1', 'admin1@gmail.com', 'password1'),
(2, 'Admin 2', 'admin2@gmail.com', 'password2'),
(3, 'Admin 3', 'admin3@gmail.com', 'password3');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `wa` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama`, `password`, `wa`, `email`, `jabatan`, `foto`, `username`) VALUES
(1, 'Budi Santoso, S.Pd.', 'password123', '081234567890', 'budi@email.com', 'Kepala Sekolah', 'WhatsApp Image 2023-04-25 at 00.37.42.jpg', 'budisantoso'),
(2, 'Ani Wijayanti, M.Pd.', 'secret456', '087654321098', 'ani.w@email.com', 'Wakil Kepala Sekolah', NULL, 'aniwijayanti'),
(4, 'Siti Rahayu, S.Pd.', 'sitera789', '089876543210', 'siti_r@yahoo.com', 'Bendahara', NULL, 'sitirahayu'),
(5, 'Agus Setiawan, M.Pd.', 'agus1234', '081398765432', 'agus.setiawan@email.com', 'Guru Biologi', NULL, 'agussetiawan'),
(6, 'Susi Susanti, S.Sn.', 'musik567', '087612345678', 'dini.susanti@email.com', 'Guru Seni Musik', '03b5bd5f-df8a-40a3-b76d-748148eec382.jpg', 'dinisusanti'),
(7, 'Rina Wulandari, S.Pd.', 'sejarah789', '082187654321', 'rina.wulan@email.com', 'Guru Sejarah', NULL, 'rinawulandari'),
(8, 'Johan Wijaya, M.Pd.', 'english123', '081234567890', 'johan.wijaya@email.com', 'Guru Bahasa Inggris', NULL, 'johanwijaya'),
(9, 'Ika Hartini, S.Sn.', 'art456', '085678901234', 'ika.hartini@email.com', 'Guru Seni Rupa', NULL, 'ikahartini'),
(11, 'Sazuke Ahmad', 'sazuke123', '082392932122', 'sazuke12@gmail.com', 'Guru Biologi', '_313a3dc9-e6c8-4db3-a387-c50ee0bd4763.jpg', ''),
(13, 'Ronaldo', 'naldo123', '081398765434', 'naldo123@gmail.com', 'Guru Pinalti', 'jeruk1.avif', '');

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `whatsapp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `jurusan` varchar(100) NOT NULL DEFAULT 'IPA',
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`id`, `nama`, `kelas`, `whatsapp`, `email`, `password`, `jurusan`, `foto`) VALUES
(1, 'Alex Telles', 'Kelas A', '081234567894', 'alex@example.com', 'password1', 'IPA', 'WhatsApp Image 2023-04-25 at 00.37.42.jpg'),
(2, 'Sarah', 'Kelas B', '081234567895', 'sarah@example.com', 'password2', 'IPA', NULL),
(3, 'Michael', 'Kelas C', '081234567896', 'michael@example.com', 'password3', 'IPA', NULL),
(4, 'Jessica', 'Kelas A', '081234567897', 'jessica@example.com', 'password4', 'IPA', NULL),
(5, 'Daniel', 'Kelas B', '081234567898', 'daniel@example.com', 'password5', 'IPA', NULL),
(6, 'Emily', 'Kelas C', '081234567899', 'emily@example.com', 'password6', 'IPA', NULL),
(7, 'Matthew', 'Kelas A', '081234567810', 'matthew@example.com', 'password7', 'IPA', NULL),
(8, 'Olivia', 'Kelas B', '081234567811', 'olivia@example.com', 'password8', 'IPA', NULL),
(9, 'William', 'Kelas C', '081234567812', 'william@example.com', 'password9', 'IPA', NULL),
(11, 'Abdul Jamal', 'Kelas A', '081398765434', 'emyu07@gmail.com', 'jamal123', 'IPS', 'no-profile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_materi`
--

CREATE TABLE `tugas_materi` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `mata_pelajaran` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `path_file` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tugas_materi`
--

INSERT INTO `tugas_materi` (`id`, `jurusan`, `kelas`, `mata_pelajaran`, `judul`, `path_file`, `deskripsi`) VALUES
(24, 'IPS', 'Kelas A', 'Sejarah', 'Masa Lalu Bersamamu', 'upload/Doc1.pdf', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem impedit placeat recusandae voluptate minus eos amet facilis possimus quaerat quidem velit'),
(25, 'IPA', 'Kelas A', 'Fisika', 'Gaya ', 'ERD dealer mobil .pdf', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem impedit placeat recusandae voluptate minus eos amet facilis possimus quaerat quidem velit'),
(26, 'IPA', 'Kelas A', 'Matematika', 'Al jabar', 'TJK RISWANDA.pdf', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem impedit placeat recusandae voluptate minus eos amet facilis possimus quaerat quidem velit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas_materi`
--
ALTER TABLE `tugas_materi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tugas_materi`
--
ALTER TABLE `tugas_materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
