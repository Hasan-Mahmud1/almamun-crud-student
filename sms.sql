-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 05:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `age` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `age`, `roll`, `date`) VALUES
(1, 'Hasan Mahmud Khan', 19, 2, '2021-11-15 12:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(60) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `password`, `date`, `role`) VALUES
(10, 'zYIfOWOKoskPEYZ6IMyES8ft2U6L0OJEvGgbFVXg5ebR', 'Hasan Mahmud Khan', 'mrj6458@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2021-11-15 13:03:44', 1),
(11, 'JibK40tT5CVUGgPygOZRWDkmAXK2gQRn', 'Khan Mahmud', 'khan@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2021-11-15 13:03:08', 0),
(12, 'OKEDDjQozVG7BUAm4bnbg54dN7OL', 'Sumon', 'sumon@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2021-11-15 13:03:31', 0),
(13, 't5OqoJ', 'Hasan Mahmud Khan', 'mrj6458fsfs@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2021-11-15 14:38:13', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
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
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
