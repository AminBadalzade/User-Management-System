-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2025 at 05:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_uid` tinytext NOT NULL,
  `users_pwd` longtext NOT NULL,
  `users_email` tinytext NOT NULL,
  `users_key` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_uid`, `users_pwd`, `users_email`, `users_key`) VALUES
(9, 'aminBadal111', '$2y$10$Ou7ACT3tWtqx7WpfxpW/Fe.Vt52o1xSXtP3rDlYRoX4pIN69IxSjW', 'aminBadal111@gmail.com', 'C0xkjNIRU1Bg3gJKPU4gwlBIUW1ZY0ZSQVZnQXdlVEE2N0Fta2c9PQ=='),
(10, 'raul1234', '$2y$10$O3ntYNXo.Z5UC2mVoQa.B.wYvfcEJiO8qZI8w5vPuMdkP/vPqPHca', 'raul14@gmail.com', 'KDKjkc02Pw2LLw5myCkbeW9yWXArVEg0ak52RjJBMHNBb3JGQlE9PQ=='),
(11, 'AminTeacher', '$2y$10$KCSKri/5ifU0bFEHxnybLOI4r0HVcDl3/bdDqTsBKaT38hLdTM8B.', 'AminTeacher@gmail.com', 'm16beM8HCin0932yTlivqC9GVHFtZEpLQ21lbnYyS3F6UXJMNnc9PQ=='),
(12, 'Danieelll', '$2y$10$KtJA.Xzk0AeZvFxfUxzFLOAdwTO7CaJy1Z8TFsE4sp5Q2LP74NVjC', 'eboloper11@gmail.com', 'KsLU+kOHDI/SokzkwuOO1Dh0MUlOamlRZXVsNzIyNjV3V01KU1E9PQ=='),
(13, '123qwe', '$2y$10$.zltc3oNABmGCIScSEbo.O9y/zMwRRSmtTad6Xdf5cGbyaHNpRKeS', '123qwe@gmail.com', 'HteJYJONM7bVVKfMnZyb2W4vbk1lMEFxZFZiSzB3Uks5ci9Wa2c9PQ==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
