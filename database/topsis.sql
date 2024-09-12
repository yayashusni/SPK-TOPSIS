-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2024 at 12:27 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` varchar(5) NOT NULL,
  `nm_alternatif` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nm_alternatif`) VALUES
('AL001', 'Cakra buana'),
('AL002', 'Ciherang'),
('AL003', 'Inpari 30'),
('AL004', 'Inpari 32'),
('AL005', 'Inpari 36'),
('AL006', 'Inpari 42'),
('AL007', 'IR 64'),
('AL008', 'Mapan');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(5) NOT NULL,
  `nama_kriteria` varchar(45) NOT NULL,
  `bobot` double NOT NULL,
  `poin1` double NOT NULL,
  `poin2` double NOT NULL,
  `poin3` double NOT NULL,
  `poin4` double NOT NULL,
  `poin5` double NOT NULL,
  `sifat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `poin1`, `poin2`, `poin3`, `poin4`, `poin5`, `sifat`) VALUES
('KR001', 'Umur tanam', 5, 1, 2, 3, 4, 5, 'Cost'),
('KR002', 'Tinggi tanaman', 5, 1, 2, 3, 4, 5, 'Cost'),
('KR003', 'Bentuk gabah', 4, 1, 2, 3, 4, 5, 'Benefit'),
('KR004', 'Jumlah anakan', 5, 1, 2, 3, 4, 5, 'Benefit'),
('KR005', 'Tekstur nasi', 4, 1, 2, 3, 4, 5, 'Benefit'),
('KR006', 'Berat / 1000 butir', 5, 1, 2, 3, 4, 5, 'Benefit'),
('KR007', 'Tahan penyakit', 5, 1, 2, 3, 4, 5, 'Benefit'),
('KR008', 'Rata-rata hasil', 5, 1, 2, 3, 4, 5, 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_matrik`
--

CREATE TABLE `nilai_matrik` (
  `id_matrik` int(7) NOT NULL,
  `id_alternatif` varchar(7) NOT NULL,
  `id_kriteria` varchar(7) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_matrik`
--

INSERT INTO `nilai_matrik` (`id_matrik`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(547, 'AL001', 'KR001', 2),
(548, 'AL001', 'KR002', 4),
(549, 'AL001', 'KR003', 5),
(550, 'AL001', 'KR004', 3),
(551, 'AL001', 'KR005', 2),
(552, 'AL001', 'KR006', 3),
(553, 'AL001', 'KR007', 5),
(554, 'AL001', 'KR008', 3),
(555, 'AL002', 'KR001', 3),
(556, 'AL002', 'KR002', 4),
(557, 'AL002', 'KR003', 5),
(558, 'AL002', 'KR004', 3),
(559, 'AL002', 'KR005', 2),
(560, 'AL002', 'KR006', 3),
(561, 'AL002', 'KR007', 2),
(562, 'AL002', 'KR008', 2),
(563, 'AL003', 'KR001', 2),
(564, 'AL003', 'KR002', 3),
(565, 'AL003', 'KR003', 5),
(566, 'AL003', 'KR004', 3),
(567, 'AL003', 'KR005', 2),
(568, 'AL003', 'KR006', 3),
(569, 'AL003', 'KR007', 2),
(570, 'AL003', 'KR008', 3),
(571, 'AL004', 'KR001', 3),
(572, 'AL004', 'KR002', 3),
(573, 'AL004', 'KR003', 4),
(574, 'AL004', 'KR004', 3),
(575, 'AL004', 'KR005', 2),
(576, 'AL004', 'KR006', 3),
(577, 'AL004', 'KR007', 5),
(578, 'AL004', 'KR008', 2),
(579, 'AL005', 'KR001', 3),
(580, 'AL005', 'KR002', 3),
(581, 'AL005', 'KR003', 4),
(582, 'AL005', 'KR004', 3),
(583, 'AL005', 'KR005', 2),
(584, 'AL005', 'KR006', 3),
(585, 'AL005', 'KR007', 4),
(586, 'AL005', 'KR008', 3),
(587, 'AL006', 'KR001', 3),
(588, 'AL006', 'KR002', 3),
(589, 'AL006', 'KR003', 4),
(590, 'AL006', 'KR004', 3),
(591, 'AL006', 'KR005', 2),
(592, 'AL006', 'KR006', 3),
(593, 'AL006', 'KR007', 4),
(594, 'AL006', 'KR008', 4),
(595, 'AL007', 'KR001', 3),
(596, 'AL007', 'KR002', 5),
(597, 'AL007', 'KR003', 5),
(598, 'AL007', 'KR004', 5),
(599, 'AL007', 'KR005', 2),
(600, 'AL007', 'KR006', 3),
(601, 'AL007', 'KR007', 2),
(602, 'AL007', 'KR008', 1),
(603, 'AL008', 'KR001', 3),
(604, 'AL008', 'KR002', 4),
(605, 'AL008', 'KR003', 4),
(606, 'AL008', 'KR004', 1),
(607, 'AL008', 'KR005', 1),
(608, 'AL008', 'KR006', 5),
(609, 'AL008', 'KR007', 1),
(610, 'AL008', 'KR008', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_preferensi`
--

CREATE TABLE `nilai_preferensi` (
  `nm_alternatif` varchar(35) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` varchar(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nm_lengkap` varchar(30) DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `level` varchar(1) NOT NULL,
  `posisi_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `username`, `password`, `nm_lengkap`, `jk`, `level`, `posisi_jabatan`) VALUES
('US001', 'Admin', '$2y$10$y.RTFBY3n3RzzvntHOj9b.qhZ4w9AdBy5IB2gcctw4SyvPY1aGyoi', 'Ir. Andang Hidayat, S.P.', 'L', '1', 'Administrator'),
('US002', 'Asep', '$2y$10$XUkLkuSB3a7MkOo6N3yUbencJQf.V/5OK/7VNzB1KY51FzqLiARzy', 'Asep Ridwam, S.P.', 'L', '2', 'Programer'),
('US003', 'Yayas', '$2y$10$QGCD0Mt2ecAHz002V/2ji.5XyHT2V2Mf1ClGK8ONvD4cxhwgd0f.i', 'Yayas Husni', 'L', '2', 'Penyuluh'),
('US004', 'Ridwan', '$2y$10$2mlWivEaZciHpCO3g4xC2.a54b3/GI0nOf/7cqmI61oIUeb8A66oG', 'Ridwan', 'L', '2', 'Penyuluh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_matrik`
--
ALTER TABLE `nilai_matrik`
  ADD PRIMARY KEY (`id_matrik`),
  ADD KEY `id_alternatif` (`id_alternatif`,`id_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai_matrik`
--
ALTER TABLE `nilai_matrik`
  MODIFY `id_matrik` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=619;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai_matrik`
--
ALTER TABLE `nilai_matrik`
  ADD CONSTRAINT `nilai_matrik_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_matrik_ibfk_2` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
