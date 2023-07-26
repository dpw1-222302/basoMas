-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 09:14 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basomas`
--

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `resto_id` int(11) NOT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `video` varchar(500) NOT NULL,
  `nama_resto` varchar(255) DEFAULT NULL,
  `harga` float DEFAULT NULL,
  `lokasi` varchar(500) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `jam_buka` char(5) DEFAULT NULL,
  `jam_tutup` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`resto_id`, `foto`, `video`, `nama_resto`, `harga`, `lokasi`, `no_telp`, `jam_buka`, `jam_tutup`) VALUES
(1, '1.png', '', 'Bakso & Soto ', 25000, 'Jl. Pramuka No.23, Sodagaran, Purwokerto Kulon, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53141', '+62 856-4784-6450', '11:00', '21:00'),
(2, '6.png', 'youtube.com/watch?v=OrlkAu0drkQ', 'Bakso Kebondalem Purwokerto', 18000, 'Jl. Perintis Kemerdekaan, Karangbawang, Purwokerto Lor, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53141', '+62 888-9991-9636', '11:00', '21:00'),
(3, '1.png', 'youtube.com/watch?v=OrlkAu0drkQ', 'Bakso Banjarnegara', 20000, 'H6GV+893, Kebondalem, Purwokerto Lor, Purwokerto Timur, Banyumas Regency, Central Java 53114', '+62 852-0123-4763', '10:00', '17:30'),
(4, '6.png', 'youtube.com/watch?v=OrlkAu0drkQ', 'Warung Bakso Cuanki & Siomay Wahyuningsari', 18000, 'Jl. Pramuka, Samudra, Purwokerto Kulon, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53147', '+62 857-4798-1234', '10:00', '19:00');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `resto_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `foto_review` varchar(500) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `caption` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_id`, `resto_id`, `created_at`, `foto_review`, `rating`, `caption`) VALUES
(1, 2, 1, '2023-07-20 09:44:48', '\"C:\\Users\\MSI\\OneDrive\\Dokumen\\Baso Mas\\Bakso\\5.png\"', 9.6, 'Rasa baksonya lumayan, dagingnya banyak, tempatnya luas tapi selalu ramai pengunjung, parkiran terbatas, harga relatif tinggi.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `nama_lengkap`, `email`, `password`) VALUES
(1, 1, 'Azelia Puspa Diah Narendri', '21104007@ittelkom-pwt.ac,id', '21104007'),
(2, 2, 'Asty Yuliani', '21104023@ittelkom-pwt.ac.id', '21104023'),
(3, 2, 'Asty', '21104023@ittelkom-pwt.ac.id', '21104023'),
(4, 2, 'Lintang Suryaningrum', '21104013@ittelkom-pwt.ac.id', '21104013');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`resto_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `resto_id` (`resto_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `resto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`resto_id`) REFERENCES `restaurant` (`resto_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
