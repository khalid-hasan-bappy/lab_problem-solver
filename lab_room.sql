-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2018 at 05:28 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab_room`
--

-- --------------------------------------------------------

--
-- Table structure for table `lab_problem`
--

CREATE TABLE `lab_problem` (
  `no` int(10) NOT NULL,
  `user_id` int(15) NOT NULL,
  `id` varchar(25) NOT NULL,
  `room` varchar(12) NOT NULL,
  `pc` int(15) NOT NULL,
  `hints` varchar(12) NOT NULL,
  `message` text NOT NULL,
  `result` varchar(15) NOT NULL DEFAULT 'unsolved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_problem`
--

INSERT INTO `lab_problem` (`no`, `user_id`, `id`, `room`, `pc`, `hints`, `message`, `result`) VALUES
(3, 26, '1212', '304(AB)', 3, 'Monitor', 'tyt', 'unsolved'),
(4, 26, '1212', '304(AB)', 9, 'Keyboard', 'rre', 'solved'),
(6, 28, '1212', '404(AB)', 26, 'Monitor', 'rrytrtytrt', 'unsolved'),
(7, 28, '1212', '605(AB)', 19, 'Keyboard', 'jkljlj', 'solved'),
(10, 79, '1192', '405(AB)', 20, 'SELECT YOUR ', 'performance is not good\r\n', 'unsolved'),
(11, 28, '1212', '605(AB)', 23, 'Cable', 'not working perfectly', 'unsolved'),
(12, 28, '1212', '304(AB)', 12, 'Monitor', 'display has broken', 'working'),
(13, 79, '1192', '405(AB)', 1, 'Cable', 'hohohaatee', 'solved'),
(14, 79, '1192', '304(AB)', 13, 'Keyboard', 'hihihi', 'unsolved'),
(15, 28, '1212', '405(AB)', 18, 'Cable', 'cable is not working properly\r\n', 'working'),
(16, 84, '879', '605(AB)', 11, 'Cpu', 'cpu has broken', 'unsolved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(25) NOT NULL,
  `userType` enum('admin','student','304','404','405','605') NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `userType`) VALUES
(28, 'SelimReza', 'selim@gmail.com', '121212', 'student'),
(29, 'admin420', 'admin@gmail.com', 'admin12', 'admin'),
(79, 'boiragi', 'boiragi@gmail.com', '119212', 'student'),
(80, 'fahad404', 'fahad@gmail.com', '404404', '404'),
(81, 'titas304', 'titas@gmail.com', '304304', '304'),
(82, 'pias405', 'pias@gmail.com', '405405', '405'),
(83, 'Sam605', 'Sam@gmail.com', '605605', '605'),
(84, 'alam', 'alam@gmail.com', 'alam12', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lab_problem`
--
ALTER TABLE `lab_problem`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lab_problem`
--
ALTER TABLE `lab_problem`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
