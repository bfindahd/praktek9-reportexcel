-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 04:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_formpeserta`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataayah`
--

CREATE TABLE `dataayah` (
  `namaayah` text NOT NULL,
  `tlayah` int(40) NOT NULL,
  `pendayah` text NOT NULL,
  `pekerjaanayah` varchar(40) NOT NULL,
  `salaryayah` text NOT NULL,
  `berkebayah` text NOT NULL,
  `idpendaftaran` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dataayah`
--

INSERT INTO `dataayah` (`namaayah`, `tlayah`, `pendayah`, `pekerjaanayah`, `salaryayah`, `berkebayah`, `idpendaftaran`) VALUES
('Putra Raloni', 1987, 'S2', 'Wiraswasta', '5.0000.000 - 20.000.000', 'Tidak', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dataibu`
--

CREATE TABLE `dataibu` (
  `namaibu` text NOT NULL,
  `tlibu` int(40) NOT NULL,
  `pendibu` text NOT NULL,
  `pekerjaanibu` varchar(40) NOT NULL,
  `salaryibu` text NOT NULL,
  `berkebibu` text NOT NULL,
  `idpendaftaran` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dataibu`
--

INSERT INTO `dataibu` (`namaibu`, `tlibu`, `pendibu`, `pekerjaanibu`, `salaryibu`, `berkebibu`, `idpendaftaran`) VALUES
('narini', 1980, 'D4/S1', 'Wiraswasta', '5.0000.000 - 20.000.000', 'Tidak', 1),
('Ratu Syaline', 1988, 'D4/S1', 'PNS', '< 500.000', 'Tidak', 2);

-- --------------------------------------------------------

--
-- Table structure for table `datapribadi`
--

CREATE TABLE `datapribadi` (
  `namaleng` text NOT NULL,
  `jkelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `nisn` int(40) NOT NULL,
  `nik` int(40) NOT NULL,
  `tempatlahir` text NOT NULL,
  `tglahir` int(20) NOT NULL,
  `agama` text NOT NULL,
  `kebkhusus` text NOT NULL,
  `alamat` text NOT NULL,
  `rt` int(10) NOT NULL,
  `rw` int(10) NOT NULL,
  `namadusun` text NOT NULL,
  `namakel` text NOT NULL,
  `kec` text NOT NULL,
  `kodepos` int(20) NOT NULL,
  `tmpttinggal` text DEFAULT NULL,
  `transport` text NOT NULL,
  `nohp` int(20) NOT NULL,
  `notelp` int(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `kpspkh` enum('Ya','Tidak') NOT NULL,
  `nokpspkh` int(40) NOT NULL,
  `kwn` enum('Indonesia (WNI)','Asing (WNA)') NOT NULL,
  `namanegara` text NOT NULL,
  `idpendaftaran` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `datapribadi`
--

INSERT INTO `datapribadi` (`namaleng`, `jkelamin`, `nisn`, `nik`, `tempatlahir`, `tglahir`, `agama`, `kebkhusus`, `alamat`, `rt`, `rw`, `namadusun`, `namakel`, `kec`, `kodepos`, `tmpttinggal`, `transport`, `nohp`, `notelp`, `email`, `kpspkh`, `nokpspkh`, `kwn`, `namanegara`, `idpendaftaran`) VALUES
('Anya', 'Perempuan', 647388364, 2147483647, 'Swiss', 18, 'Lainnya', 'Autis (Q)', 'Perumahan Tambah Jaya', 100, 200, 'Chuak', 'Jmet', 'Jmet', 60290, 'Panti Asuhan', 'Jalan Kaki', 2147483647, 0, '21082010160@student.upnjatim.ac.id', 'Ya', 2147483647, 'Indonesia (WNI)', '', 1),
('Rayline Putri', 'Perempuan', 2003219382, 2147483647, 'Surabaya', 4, 'Islam', 'Tidak', 'Jalan Baru Raya 01', 12, 23, 'Barura', 'Rubaya', 'Baruraya', 62183, 'Bersama Orang Tua', 'Kendaraan Pribadi', 2147483647, 0, 'rylneput@gmail.com', 'Tidak', 0, 'Indonesia (WNI)', 'Indonesia', 2),
('Bfindah Damaira', 'Perempuan', 2147483647, 2147483647, 'Swiss', 7, 'Islam', 'Tidak', 'Perumahan Pondok Dadapan Permai A-25', 10, 20, 'Kerena', 'Kerenbang', 'Kerenbro', 61253, 'Bersama Orang Tua', 'Kendaraan Pribadi', 2147483647, 0, 'beprlov@gmail.com', 'Tidak', 0, 'Indonesia (WNI)', 'Indonesia', 3);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin1'),
('admin1', 'satudua'),
('mumu', 'duadua'),
('satuw', 'bro');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `idpendaftaran` int(10) NOT NULL,
  `jenis_pendaftaran` enum('Siswa Baru','Pindahan') NOT NULL,
  `tglmasuksekolah` int(15) NOT NULL,
  `nis` int(20) NOT NULL,
  `nopesujian` int(40) NOT NULL,
  `appaud` enum('Ya','Tidak') NOT NULL,
  `aptk` enum('Ya','Tidak') NOT NULL,
  `noskhun` int(40) NOT NULL,
  `noijazah` int(40) NOT NULL,
  `hobi` text NOT NULL,
  `citacita` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`idpendaftaran`, `jenis_pendaftaran`, `tglmasuksekolah`, `nis`, `nopesujian`, `appaud`, `aptk`, `noskhun`, `noijazah`, `hobi`, `citacita`) VALUES
(123456712, 'Pindahan', 11, 2147483647, 2147483647, 'Tidak', 'Ya', 0, 0, 'Lainnya', 'Politikus'),
(1209826371, 'Siswa Baru', 11, 2147483647, 1203947281, 'Tidak', 'Ya', 0, 0, 'Kesenian', 'Seni/Lukis/Artis/Sejenis'),
(1216162516, 'Siswa Baru', 11, 2147483647, 1231234212, 'Ya', 'Ya', 0, 0, 'Menulis', 'Wiraswasta'),
(2147483647, 'Siswa Baru', 11, 2147483647, 123, 'Ya', 'Ya', 0, 0, 'Traveling', 'PNS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`) VALUES
(1, 'admin', 'admin', 'admin'),
(12, 'momo', 'momogi', 'momomogigi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataayah`
--
ALTER TABLE `dataayah`
  ADD PRIMARY KEY (`idpendaftaran`) USING BTREE;

--
-- Indexes for table `dataibu`
--
ALTER TABLE `dataibu`
  ADD PRIMARY KEY (`idpendaftaran`);

--
-- Indexes for table `datapribadi`
--
ALTER TABLE `datapribadi`
  ADD PRIMARY KEY (`idpendaftaran`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`idpendaftaran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataayah`
--
ALTER TABLE `dataayah`
  MODIFY `idpendaftaran` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dataibu`
--
ALTER TABLE `dataibu`
  MODIFY `idpendaftaran` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `datapribadi`
--
ALTER TABLE `datapribadi`
  MODIFY `idpendaftaran` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `idpendaftaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
