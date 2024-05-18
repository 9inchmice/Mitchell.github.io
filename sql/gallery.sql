-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2024 at 07:23 PM
-- Server version: 8.0.30
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `artworks`
--

CREATE TABLE `artworks` (
  `id` int NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `artworks`
--

INSERT INTO `artworks` (`id`, `image`, `title`, `price`, `description`) VALUES
(1, 'https://cs6.livemaster.ru/storage/e5/32/c2538700442274c4f220782d95sj.jpg', 'Волчий взгляд', '10 000 ₽', 'Эта картина пленяет зрителя силой и грацией волка, изображённого с использованием сложных текстильных элементов и красок, передающих его дикую природу и хитрый взгляд.\r\n'),
(2, 'https://cs6.livemaster.ru/storage/9c/2c/ffc7c0e1e48410d54a42cfa80b6d.jpg', 'Олень в рассветных лугах', '10 000 ₽', 'В этой работе олень изображён в мягких оттенках рассветного света, в окружении пасторальных пейзажей, создавая образ спокойства и гармонии с природой.'),
(3, 'https://cs6.livemaster.ru/storage/f7/cf/c963fb6e907e0dd7778a3db304bu.jpg', 'Зайц на поляне', '12 000 ₽', 'Картина олицетворяет игривую и лёгкую натуру зайцев, преображённых в текстильные фрагменты на фоне яркой зелени поляны.'),
(4, 'https://cs6.livemaster.ru/storage/5e/14/7d4fbe6105234d707b9de54badry.jpg', 'Лиса в осеннем лесу', '5 000 ₽', 'Этот образ лисы захватывает красоту осеннего леса, её утонченность и изящество, переданные через текстильные композиции и тёплые оттенки красок.\r\n'),
(5, 'https://cs6.livemaster.ru/storage/34/11/4fae7b7e19c4ab9b34b39debe1b8.jpg', 'Призрачная сова', '6 000 ₽', 'С этой работой можно окунуться в таинственный мир ночного леса, где сова изображена с использованием светлых текстильных материалов и мягких переходов цветов, создавая образ призрачной и загадочной птицы.');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `comment`, `created_at`) VALUES
(1, '123', '13213213', '2024-05-10 10:32:03'),
(2, '123', '13213213', '2024-05-10 10:32:15'),
(3, '123', '13213213', '2024-05-10 10:32:17'),
(4, '123', '13213213', '2024-05-10 10:33:21'),
(5, '2', '2', '2024-05-11 14:22:49'),
(6, '2', '2', '2024-05-11 14:22:53'),
(7, '2', '2', '2024-05-11 14:23:09'),
(8, '123', '1321', '2024-05-11 14:23:11'),
(9, '123', '1321', '2024-05-11 14:23:18'),
(10, 'ннн', 'ннн', '2024-05-11 14:23:21'),
(11, 'ннн', 'ннн', '2024-05-11 14:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `custom_orders`
--

CREATE TABLE `custom_orders` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `style` varchar(255) DEFAULT NULL,
  `deadline` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `custom_orders`
--

INSERT INTO `custom_orders` (`id`, `name`, `email`, `details`, `style`, `deadline`, `timestamp`) VALUES
(1, '', '', '', '', '', '2023-11-30 09:50:51'),
(2, '', '', '', '', '', '2023-11-30 09:51:42'),
(3, 'w', 'w@mail.ru', 'ww', 'www', 'ww', '2023-11-30 09:51:49'),
(4, '', '', '', '', '', '2023-11-30 09:51:51'),
(5, 'w', 'ww@mail.ru', 'w', '', '', '2024-02-18 12:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `rating` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `comment`, `rating`, `created_at`) VALUES
(1, '121', '321321', 1, '2024-05-11 13:28:14'),
(2, '121', '321321', 1, '2024-05-11 13:31:01'),
(3, '121', '321321', 1, '2024-05-11 13:32:12'),
(4, '121', '321321', 1, '2024-05-11 13:32:29'),
(5, '121', '321321', 1, '2024-05-11 13:32:47'),
(6, '121', '321321', 1, '2024-05-11 13:33:32'),
(7, '121', '321321', 1, '2024-05-11 13:33:36'),
(8, '121', '321321', 1, '2024-05-11 13:33:39'),
(9, '121', '321321', 1, '2024-05-11 13:33:52'),
(10, '121', '321321', 1, '2024-05-11 13:34:35'),
(11, '121', '321321', 1, '2024-05-11 13:35:16'),
(12, '121', '321321', 1, '2024-05-11 13:35:46'),
(13, '121', '321321', 1, '2024-05-11 13:37:34'),
(14, '121', '321321', 1, '2024-05-11 13:38:08'),
(15, '121', '321321', 1, '2024-05-11 13:38:34'),
(16, '121', '321321', 1, '2024-05-11 13:38:56'),
(17, '121', '321321', 1, '2024-05-11 13:39:01'),
(18, '121', '321321', 1, '2024-05-11 13:39:51'),
(19, '121', '321321', 1, '2024-05-11 13:40:07'),
(20, '121', '321321', 1, '2024-05-11 13:40:24'),
(21, '121', '321321', 1, '2024-05-11 13:40:28'),
(22, '121', '321321', 1, '2024-05-11 13:40:32'),
(23, '121', '321321', 1, '2024-05-11 13:40:37'),
(24, '121', '321321', 1, '2024-05-11 13:40:45'),
(25, '121', '321321', 1, '2024-05-11 13:40:48'),
(26, '121', '321321', 1, '2024-05-11 13:40:59'),
(27, '1', '1', 1, '2024-05-11 13:41:05'),
(28, '1', '1', 1, '2024-05-11 13:41:07'),
(29, '1', '1', 1, '2024-05-11 13:42:43'),
(30, '1', '1', 1, '2024-05-11 13:43:00'),
(31, '1', '1', 1, '2024-05-11 13:43:07'),
(32, '1', '1', 1, '2024-05-11 13:43:10'),
(33, '1', '1', 1, '2024-05-11 13:43:20'),
(34, '1', '1', 1, '2024-05-11 13:43:25'),
(35, '1', '1', 1, '2024-05-11 13:43:28'),
(36, '1', '1', 1, '2024-05-11 13:43:34'),
(37, '1', '1', 1, '2024-05-11 13:43:51'),
(38, '1', '1', 1, '2024-05-11 13:44:00'),
(39, '1', '1', 1, '2024-05-11 13:44:20'),
(40, '1', '1', 1, '2024-05-11 13:44:23'),
(41, '1', '1', 1, '2024-05-11 13:45:04'),
(42, '1', '1', 1, '2024-05-11 13:45:10'),
(43, '1', '1', 1, '2024-05-11 13:46:06'),
(44, '1', '1', 1, '2024-05-11 13:46:10'),
(45, '1', '1', 1, '2024-05-11 13:46:20'),
(46, '1', '1', 1, '2024-05-11 13:46:24'),
(47, '1', '1', 1, '2024-05-11 13:46:27'),
(48, '1', '1', 1, '2024-05-11 13:46:32'),
(49, '1', '1', 1, '2024-05-11 13:46:36'),
(50, '1', '1', 1, '2024-05-11 13:46:39'),
(51, '1', '1', 1, '2024-05-11 13:46:42'),
(52, '1', '1', 1, '2024-05-11 13:46:46'),
(53, '1', '1', 1, '2024-05-11 13:46:53'),
(54, '1', '1', 1, '2024-05-11 13:46:55'),
(55, '1', '1', 1, '2024-05-11 13:47:00'),
(56, '1', '1', 1, '2024-05-11 13:47:02'),
(57, '1', '1', 1, '2024-05-11 13:47:08'),
(58, '1', '1', 1, '2024-05-11 13:47:11'),
(59, '1', '1', 1, '2024-05-11 13:47:17'),
(60, '1', '1', 1, '2024-05-11 13:47:26'),
(61, '1', '1', 1, '2024-05-11 13:47:29'),
(62, '1', '1', 1, '2024-05-11 13:47:35'),
(63, '1', '1', 1, '2024-05-11 13:47:40'),
(64, '1', '1', 1, '2024-05-11 13:47:45'),
(65, '1', '1', 1, '2024-05-11 13:47:49'),
(66, '1', '1', 1, '2024-05-11 13:47:55'),
(67, '1', '1', 1, '2024-05-11 13:47:59'),
(68, '1', '1', 1, '2024-05-11 13:48:09'),
(69, '1', '1', 1, '2024-05-11 13:48:22'),
(70, '1', '1', 1, '2024-05-11 13:48:42'),
(71, '1', '1', 1, '2024-05-11 13:48:46'),
(72, '1', '1', 1, '2024-05-11 13:48:53'),
(73, '1', '1', 1, '2024-05-11 13:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_subscribed` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `date_subscribed`) VALUES
(1, 'wasd@mail.ru', '2024-03-28 11:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'wasd', 'wasd', 'admin'),
(2, 'wasd1', '$2y$10$nNezdwLj3zkCA7d1zREBde21lBsS8lGik8cudl3nWs6r03MnLrQvS', 'user'),
(4, 'privet', '$2y$10$r4/MpUh9a.QDxwH3ESJTvO42/lZBTXBeJPZDZx272EBwkbdZuTX9a', 'user'),
(5, 'wasd2', '$2y$10$S9BJpJei/8LhFNa04wSideQ2hQAcVAF0Vo2cvs0QHjM/Wm612fV8m', 'user'),
(7, 'wasd3', '$2y$10$.46GnIN.ciTDyYbO88pYfuA5PuFFunvw/4bsdBaM1maEb9fPkIf1S', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artworks`
--
ALTER TABLE `artworks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_orders`
--
ALTER TABLE `custom_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artworks`
--
ALTER TABLE `artworks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `custom_orders`
--
ALTER TABLE `custom_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
