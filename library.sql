-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 07:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(32) NOT NULL,
  `id_kategori` varchar(32) NOT NULL,
  `kode_buku` varchar(32) NOT NULL,
  `stok` int(11) NOT NULL,
  `dipinjam` int(11) NOT NULL,
  `detail` varchar(200) NOT NULL,
  `gambar` varchar(43) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `id_kategori`, `kode_buku`, `stok`, `dipinjam`, `detail`, `gambar`) VALUES
(1, 'doraemon', '61', 'sdrt234', 55, 81, 'Doraemon adalah robot kucing ajaib yang datang dari masa depan untuk menemani nobitaDoraemon adalah robot kucing ajaib yang datang dari masa depan untuk menemani nobita', 'pom.jpg'),
(8, 'fdfxx', '53', 'fdsfds', 58, 41, 'delapanssssx', 'udou.jpg'),
(14, 'nobite', '61', 'fdsf34', 13, 0, 'fsdfdsfasdfasdf', 'htwinaip.jpg'),
(15, 'faewfra', '61', 'fdsf34', 13, 0, 'fsdfdsfasdfasdf', 'htwinaip.jpg'),
(16, 'gdfg', '53', 'fdsfds', 58, 41, 'delapanssssx', 'udou.jpg'),
(17, 'sdfaf', '61', 'sdrt234', 56, 80, 'Dsfsdf dfdari masa depan untuk menemani nobita', 'pom.jpg'),
(18, 'fhasgtnm', '61', 'fdsf34', 13, 0, 'fsdfdsfasdfasdf', 'htwinaip.jpg'),
(19, 'mghjfd', '53', 'fdsfds', 58, 41, 'delapanssssx', 'udou.jpg'),
(20, 'yeuiyke', '61', 'sdrt234', 56, 80, 'etuuumani nobita', 'pom.jpg'),
(21, 'trur', '61', 'sdrt234', 56, 80, 'Dorauertua depan untuk menemani nobita', 'htwinaip.jpg'),
(22, 'poipyuoip', '53', 'fdsfds', 58, 41, 'dopnm,', 'udou.jpg'),
(27, 'rrrr', '58', 'rrr', 3, 0, 'gfdsgag', '64ee134aa1239.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `date`, `id_buku`, `id_users`, `qty`) VALUES
(7, '2023-08-02', 8, 12, 3),
(9, '2023-08-02', 8, 12, 3),
(10, '2023-08-02', 15, 12, 3),
(11, '2023-08-02', 8, 12, 3),
(17, '2023-08-02', 8, 12, 3),
(18, '2023-08-02', 8, 12, 3),
(20, '2023-08-29', 8, 12, 9),
(21, '2023-08-29', 14, 12, 13),
(22, '2023-08-29', 8, 2, 3),
(28, '2023-08-29', 15, 22, 1),
(31, '2023-08-29', 16, 22, 1),
(33, '2023-08-29', 20, 22, 1),
(34, '2023-08-02', 8, 12, 3),
(35, '2023-08-02', 8, 12, 3),
(36, '2023-08-29', 14, 12, 13);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id_checkout` int(11) NOT NULL,
  `noref` varchar(32) NOT NULL,
  `tgl` date NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id_checkout`, `noref`, `tgl`, `id_buku`, `id_users`, `qty`, `status`) VALUES
(1, 'rizm-7491373', '2023-08-27', 1, 12, 1, 'Dikembalikan'),
(2, 'rizm-7491373', '2023-08-27', 8, 2, 1, 'Dikembalikan'),
(23, 'rizm-9657947', '2023-08-27', 1, 12, 3, 'Dikembalikan'),
(24, 'rizm-9657947', '2023-08-27', 8, 2, 4, 'Dikembalikan'),
(35, 'rizm-9211955', '2023-08-29', 8, 22, 3, 'Dikembalikan'),
(40, 'rizm-2094808', '2023-08-29', 14, 22, 3, 'Menunggu Konfirmasi'),
(43, 'rizm-4373126', '2023-08-29', 1, 22, 1, 'Terkonfirmasi'),
(44, 'rizm-4373126', '2023-08-29', 19, 22, 1, 'Dibatalkan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(32) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `keterangan`) VALUES
(53, 'fsdfdxx', 'asdf'),
(57, 't6ytytr', 'werty34'),
(58, 'uytry', '253gnjdfg'),
(59, '436tjn ', 'zdfgsedfrt'),
(60, 'ghtrwyw', 'sdfhgw54'),
(61, 'kartun', 'wibu'),
(62, 'dfsf', 'dsfsdd'),
(63, 'fdsf', 'dfsdf'),
(65, 'motivasi', 'fdfdfdsfd'),
(66, '436tjn ', 'zdfgsedfrt'),
(67, 'motivasi', 'fdfdfdsfd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `nik`, `role`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin tercinta', '3412544363455', 1),
(12, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user tecinta', 'ds32423', 0),
(22, 'user2', '7e58d63b60197ceb55a1c487989a3720', 'user kedua', 'lkrjtjw32j', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_checkout`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
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
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
