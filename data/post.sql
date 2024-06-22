-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 22, 2024 at 01:37 AM
-- Server version: 11.3.2-MariaDB-1:11.3.2+maria~ubu2204
-- PHP Version: 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serverside`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(255) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `timestamp`) VALUES
(1, 'Diogo is a instructor. Or is he?', 'Yep, surprisingly.', '2024-06-18 15:15:05'),
(2, 'Captain America', 'Is American.', '2024-06-18 15:16:08'),
(5, 'Yes sir?', 'Absolutely!', '2024-06-20 07:32:07'),
(6, 'Fourth Post', 'Is this still working?', '2024-06-21 21:55:03'),
(7, 'Things are goin well', 'Thank God.', '2024-06-21 21:55:30'),
(9, 'Several CHARS', 'In today\'s interconnected world, technology plays a pivotal role in shaping our daily lives. From the way we communicate to how we work and entertain ourselves, innovations in Ogon po Gotovnosti Zarya ao combate!', '2024-06-21 23:44:05'),
(10, 'Ultra textinct', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed arcu sem. Fusce vel felis in leo consequat eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin eget ligula eget libero euismod congue. Pellentesque tincidunt risus in enim congue, vel sollicitudin nulla elementum. Integer ac tellus ligula. Phasellus pellentesque, ex non ullamcorper iaculis, metus ex feugiat arcu, sed ultricies eros metus eget orci. Nulla fermentum nisi et velit tristique, at egestas justo pellentesque. Duis placerat, lectus sed bibendum tincidunt, justo augue venenatis felis, sit amet dictum tortor purus ut eros. Vivamus dictum, turpis at tincidunt faucibus, ipsum nisl aliquam lorem, at molestie eros libero at libero. Suspendisse ut elit nec ex euismod venenatis. In auctor urna vel ligula condimentum, quis varius augue bibendum. Quisque sagittis ut ligula nec vulputate. Fusce auctor ipsum a mi posuere, quis auctor lacus vehicula.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed arcu sem. Fusce vel felis in leo consequat eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin eget ligula eget libero euismod congue. Pellentesque tincidunt risus in enim congue, vel sollicitudin nulla elementum. Integer ac tellus ligula. Phasellus pellentesque, ex non ullamcorper iaculis, metus ex feugiat arcu, sed ultricies eros metus eget orci. Nulla fermentum nisi et velit tristique, at egestas justo pellentesque. Duis placerat, lectus sed bibendum tincidunt, justo augue venenatis felis, sit amet dictum tortor purus ut eros. Vivamus dictum, turpis at tincidunt faucibus, ipsum nisl aliquam lorem, at molestie eros libero at libero. Suspendisse ut elit nec ex euismod venenatis. In auctor urna vel ligula condimentum, quis varius augue bibendum. Quisque sagittis ut ligula nec vulputate. Fusce auctor ipsum a mi posuere, quis auctor lacus vehicula.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed arcu sem. Fusce vel felis in leo consequat eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin eget ligula eget libero euismod congue. Pellentesque tincidunt risus in enim congue, vel sollicitudin nulla elementum. Integer ac tellus ligula. Phasellus pellentesque, ex non ullamcorper iaculis, metus ex feugiat arcu, sed ultricies eros metus eget orci. Nulla fermentum nisi et velit tristique, at egestas justo pellentesque. Duis placerat, lectus sed bibendum tincidunt, justo augue venenatis felis, sit amet dictum tortor purus ut eros. Vivamus dictum, turpis at tincidunt faucibus, ipsum nisl aliquam lorem, at molestie eros libero at libero. Suspendisse ut elit nec ex euismod venenatis. In auctor urna vel ligula condimentum, quis varius augue bibendum. Quisque sagittis ut ligula nec vulputate. Fusce auctor ipsum a mi posuere, quis auctor lacus vehicula.\r\n\r\n\r\n', '2024-06-22 00:34:01'),
(11, 'Best Post in the Galaxy', 'adfadfgdsdfg', '2024-06-22 01:22:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
