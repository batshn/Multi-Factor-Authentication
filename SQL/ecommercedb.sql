-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Aug 11, 2020 at 01:34 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommercedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_title`, `author`, `amount`) VALUES
(1, 'To Kill a Mockingbird', 'Harper Lee', 50),
(2, 'A Clockwork Orange', 'Anthony Burgess', 40),
(3, 'Una Historia de Ayer', 'Sergio Cobo', 80);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `first_name`, `last_name`, `password`, `IsAdmin`) VALUES
('batshn@gmail.com', 'Batshn', 'Dash', '1234', 1),
('user@yahoo.com', 'David', 'Micheal', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_2fa`
--

DROP TABLE IF EXISTS `users_2fa`;
CREATE TABLE IF NOT EXISTS `users_2fa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `google_secret_code` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users_2fa`
--

INSERT INTO `users_2fa` (`id`, `name`, `username`, `email`, `password`, `google_secret_code`) VALUES
(5, 'Batsaikhan Dashdorj', '123', 'batshn@gmail.com', '$2y$10$dmxalxFn1c5hUvW2n7.NvOFq6piCrK6GZbG0iFts6VQsHYseI/g/6', '55HTKFKGTFT6EAEY');

-- --------------------------------------------------------

--
-- Table structure for table `users_2fa_sms`
--

DROP TABLE IF EXISTS `users_2fa_sms`;
CREATE TABLE IF NOT EXISTS `users_2fa_sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `pin` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users_2fa_sms`
--

INSERT INTO `users_2fa_sms` (`id`, `name`, `email`, `password`, `phone`, `pin`) VALUES
(13, 'Batsaikhan Dashdorj', 'batshn@gmail.com', '$2y$10$3iuyc2DzVBR6xAC0gd7ULeylN/74Fx23BTl6azHaVBJ4.IojoInGm', '610452441716', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_login`
--

DROP TABLE IF EXISTS `users_login`;
CREATE TABLE IF NOT EXISTS `users_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `otp` int(11) NOT NULL,
  `expired` int(11) NOT NULL,
  `otp_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users_login`
--

INSERT INTO `users_login` (`id`, `otp`, `expired`, `otp_datetime`) VALUES
(13, 704224, 1, '2020-08-11 08:14:16'),
(12, 122855, 0, '2020-08-11 08:02:34'),
(11, 315325, 0, '2020-08-11 07:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `users_mfa`
--

DROP TABLE IF EXISTS `users_mfa`;
CREATE TABLE IF NOT EXISTS `users_mfa` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `secret_code` varchar(250) NOT NULL,
  `otp` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users_mfa`
--

INSERT INTO `users_mfa` (`user_id`, `FirstName`, `email`, `password`, `status`, `secret_code`, `otp`) VALUES
(32, 'Batsaikhan', 'batshn@yahoo.com', '123', 1, '', 717692),
(33, 'Batsaikhan', 'batshn@gmail.com', '123', 1, '', 626291);

-- --------------------------------------------------------

--
-- Table structure for table `xssproducts`
--

DROP TABLE IF EXISTS `xssproducts`;
CREATE TABLE IF NOT EXISTS `xssproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
