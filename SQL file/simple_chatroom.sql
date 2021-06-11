-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2021 at 05:24 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple_chatroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `time_sent` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `message`, `time_sent`) VALUES
(15, 2, 'hi how are you?', '2021-06-11 13:39:14'),
(16, 1, 'Hey @wookielover76, am good', '2021-06-11 14:21:45'),
(17, 2, 'Did you watch the latest Superman and Lois yet ???', '2021-06-11 14:27:45'),
(18, 3, 'Hey guys, I watched it, I can\'t believe the ending...', '2021-06-11 14:30:43'),
(19, 1, 'I won;t say a thing... I dont wanna spoil for others yet', '2021-06-11 14:33:22'),
(20, 3, 'Should I SPOIL???', '2021-06-11 14:55:56'),
(21, 3, 'Morgan Edge ..... is.....', '2021-06-11 14:56:21'),
(22, 1, 'Get OUT !!!!hahaha', '2021-06-11 14:56:36'),
(23, 2, 'guys am back.. what you talking bout', '2021-06-11 14:58:03'),
(24, 1, 'The latest Superman and Lois episode.. Morgan Edge', '2021-06-11 14:59:57'),
(25, 2, '─────────▀▀▀▀▀▀──────────▀▀▀▀▀▀▀\r\n──────▀▀▀▀▀▀▀▀▀▀▀▀▀───▀▀▀▀▀▀▀▀▀▀▀▀▀\r\n────▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀──────────▀▀▀\r\n───▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀──────────────▀▀\r\n──▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀──────────────▀▀\r\n─▀▀▀▀▀▀▀▀▀▀▀▀───▀▀▀▀▀▀▀───────────────▀▀\r\n─▀▀▀▀▀▀▀▀▀▀▀─────▀▀▀▀▀', '2021-06-11 15:01:12'),
(30, 1, 'Are you challenging us to an ASCII battle', '2021-06-11 15:09:19'),
(31, 2, 'come back!!', '2021-06-11 15:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(42) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `color` varchar(25) NOT NULL,
  `last_active` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pass`, `active`, `color`, `last_active`) VALUES
(1, 'ianwright27', 'thewian27@gmail.com', '9b088b184f6d01cd281b55515ed49053', 0, '8f4af8', '2021-06-11 15:09:49'),
(2, 'wookielover76', 'wookielover76@gmail.com', 'a2cb16db8a26bea92fa59dd5841ed2b1', 1, '78fd35', '2021-06-11 15:21:20'),
(3, 'TheThinker106', 'thethinker106@gmail.com', '4a2fe572451ef27600ac9d5d121b0998', 0, '14284f', '2021-06-11 14:56:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
