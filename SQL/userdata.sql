-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 08:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_email_verified` varchar(200) NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `email`, `username`, `password`, `is_email_verified`, `otp`) VALUES
(1, 'xvrteodtbw@diginey.com', 'nafso', 'nafso_no', 'true', 198181512),
(3, 'kzmmweq@diginey.com', 'hello', '1234', 'true', 198181512),
(4, 'xdxktfnporwyfor@diginey.com', 'krita', 'kritu', 'true', 198181512),
(5, 'torpjfqsqpviyk@diginey.com', 'facebook', '1234567', 'true', 198181512),
(6, 'ljazrvgghj@diginey.com', 'shahol', 'sha1', 'true', 198181512),
(7, 'iiyfhdcswuvktn@diginey.com', 'tonny', 'tonu', 'true', 198181512),
(8, 'weqbqwujvi@diginey.com', 'agri', 'exam', 'true', 198181512),
(9, 'szhcszbtzxs@diginey.com', 'avik', 'DAS', 'true', 695197),
(10, 'vacfvjqwlvzukbd@go-daddypromocode.com', 'nadira', 'nazneen', 'true', 709202);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
