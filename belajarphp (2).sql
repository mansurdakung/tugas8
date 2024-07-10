-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2024 at 02:34 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajarphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama_dosen` varchar(20) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `tlp` int(25) NOT NULL,
  `gelar` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama_dosen`, `alamat`, `tlp`, `gelar`, `email`) VALUES
(12, 'pak ari', 'semparu', 2147483647, 'S.Kom, M.Kom', 'maulana ashari@gmail'),
(30, 'pak ari', 'sanggeng', 987, 'S.Kom, M.Kom', 'meli@gmail.com'),
(31, 'harian', 'dakung', 2147483647, 's.kom', 'saidahmtbelae@gmail.'),
(35, 'iuy', 'MONTONG BELA', 2147483647, 'M.kom', 'hermanung12@gmail.co');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `nim` int(11) NOT NULL,
  `kdmik` varchar(50) NOT NULL,
  `nidn` varchar(30) NOT NULL,
  `uts` varchar(50) NOT NULL,
  `uas` varchar(66) NOT NULL,
  `ruangan` varchar(40) NOT NULL,
  `tahun_ajaran` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`nim`, `kdmik`, `nidn`, `uts`, `uas`, `ruangan`, `tahun_ajaran`) VALUES
(1, 'mm', 'retw', 'hgj', 'djdhjshds', 'uuwhwe', 2024),
(2, 'ujg', '23', '7687', 'jghfjhg', 'ortoritor', 2024);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(3) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `jurusan` enum('Teknik Informatika','Sistem Informasi') NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `email`, `jurusan`, `gambar`) VALUES
(26, '21', 'Agung dan', 'sarniaenun@gmail.com', 'Teknik Informatika', 'Picture2.png'),
(28, '21', 'maryam', 'hermandakung12@gmail.com', 'Sistem Informasi', 'Screenshot 2023-11-14 103940.png'),
(29, '21', 'RUSDI', 'sarniaenun@gmail.com', 'Sistem Informasi', 'pexels-pixabay-60597.jpg'),
(31, '2', 'RUSDI', 'kawirianw578@gmail.com', 'Sistem Informasi', 'Screenshot (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `kdmik` varchar(50) NOT NULL,
  `matkul` varchar(50) NOT NULL,
  `sks` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`kdmik`, `matkul`, `sks`) VALUES
('12', 'kjdk', 24),
('122', 'ffdfdf', 0),
('ree', 'rrerer', 34),
('ujgjg', 'kjdkdjk', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`) VALUES
(11, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kdmik`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `nim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
