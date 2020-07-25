-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2020 at 02:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `symphony`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `category_id`, `name`, `author`, `isbn`, `price`, `image`, `created_at`, `updated_at`) VALUES
(11, 1, 'The Wee Free Men', 'Terry Prathett', '33343244', '20.50', '/uploads/books/children-1-5f18fd56a5555.jpeg', '2020-07-23 00:00:00', '2020-07-23 00:00:00'),
(12, 1, 'The Lorax', 'Dr. Seuss', '37463', '30', '/uploads/books/children-2-5f18fd9dda19f.jpeg', '2020-07-23 00:00:00', '2020-07-23 00:00:00'),
(13, 1, 'The Girl Who Drank the Moon', 'Kelly Barnhill', '48e87394', '23', '/uploads/books/children-3-5f18fdc313fcf.jpeg', '2020-07-23 00:00:00', '2020-07-23 00:00:00'),
(14, 1, 'Are You My Mother', 'P.D Eastman', '6545642', '14', '/uploads/books/children-4-5f18fde39c85d.jpeg', '2020-07-23 00:00:00', '2020-07-23 00:00:00'),
(15, 1, 'Worlds of Wonder', 'Unknown', '3844', '8', '/uploads/books/children-5-5f18fe0104485.jpeg', '2020-07-23 00:00:00', '2020-07-23 00:00:00'),
(16, 1, 'The Cat in the HAT', 'Dr. Seuss', '2342342', '23', '/uploads/books/children-6-5f18fe1f636d0.jpeg', '2020-07-23 00:00:00', '2020-07-23 00:00:00'),
(17, 1, 'The Doe in the Forrest', 'Laurrel Towen', '97472', '33', '/uploads/books/children-8-5f18fe49e7eab.jpeg', '2020-07-23 00:00:00', '2020-07-23 00:00:00'),
(18, 1, 'Don\'t pat the bunny', 'Unknown', '465465', '44', '/uploads/books/children-9-5f18fe6a3bf17.jpeg', '2020-07-23 00:00:00', '2020-07-23 00:00:00'),
(19, 2, 'The Girl in Red', 'Christina Henry', '934743', '44', '/uploads/books/fiction-1-5f18fe9a8bb03.jpeg', '2020-07-23 00:00:00', '2020-07-23 00:00:00'),
(20, 2, 'City On the Edge', 'Mark Goldman', '84764764', '55', '/uploads/books/fiction-2-5f18feb7bbcae.jpeg', '2020-07-23 00:00:00', '2020-07-23 00:00:00'),
(21, 2, 'Muscle', 'Alan Trotter', '8437436', '34', '/uploads/books/fiction-3-5f18fecfd6c11.jpeg', '2020-07-23 00:00:00', '2020-07-23 00:00:00'),
(22, 2, 'The Water Cure ', 'Sophie Machintosh', '345435', '45', '/uploads/books/fiction-5-5f18fefa42288.jpeg', '2020-07-23 00:00:00', '2020-07-23 00:00:00'),
(23, 2, 'The Arsonist', 'Chloe Hooper', '74647', '55', '/uploads/books/fiction-6-5f18ff177b7cc.jpeg', '2020-07-23 00:00:00', '2020-07-23 00:00:00'),
(24, 2, 'The Possible Word ', 'Jodie Picoult', '34378', '44', '/uploads/books/fiction-7-5f18ff42883ee.jpeg', '2020-07-23 00:00:00', '2020-07-23 00:00:00'),
(25, 2, 'The Martian', 'Andy Weir', '234324', '32', '/uploads/books/05before-and-after-slide-T6H2-superJumbo-5f1b8b85f304f.jpeg', '2020-07-25 01:31:50', '2020-07-25 01:31:50'),
(26, 1, 'Horton Hears a Who', 'Dr. Seuss', '2342', '22', '/uploads/books/300-5f1b910823d02.jpeg', '2020-07-25 01:55:20', '2020-07-25 01:55:20'),
(27, 2, 'Conviction', 'Kellp Loy', '23424', '34', '/uploads/books/20-Conviction-Kelly-Loy-Gilbert-Book-Cover-Ideas-5f1b921b45879.jpeg', '2020-07-25 01:59:55', '2020-07-25 01:59:55'),
(29, 2, 'Watching You', 'Lynda Renham', '342234', '20', '/uploads/books/Watching-You-pb-eb-5f1b929e435c1.jpeg', '2020-07-25 02:02:06', '2020-07-25 02:02:06'),
(30, 2, 'The Great Gatsby', 'F Scott', '234234', '34', '/uploads/books/p08g1mbd-5f1b93d5ede5b.jpeg', '2020-07-25 02:07:17', '2020-07-25 02:07:17'),
(31, 1, 'Dummy Book', 'John Doe', '848475', '33', '/uploads/books/photo-5f1be9cb90f2b.jpeg', '2020-07-25 08:14:03', '2020-07-25 08:14:03'),
(32, 2, 'Horror Story', 'Jane Doe', '849475', '13', '/uploads/books/photo-5f1bf25ae7bd0.jpeg', '2020-07-25 08:50:34', '2020-07-25 08:50:34'),
(33, 2, 'Torn', 'Paul Clarke', '23432', '34', '/uploads/books/sad-romance-kindle-book-cover-flyer-template-539b5fdf2dd2f6602c25ce81fbb5d877-screen-5f1c1967a8758.jpeg', '2020-07-25 11:37:11', '2020-07-25 11:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Children', '2020-07-22 00:00:00', '2020-07-22 00:00:00'),
(2, 'Fiction', '2020-07-22 00:00:00', '2020-07-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `name`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'COUPON2', 15, '2020-07-24 08:58:08', '2020-07-24 08:58:10'),
(2, '15DISCOUNT', 15, '2020-07-24 08:58:12', '2020-07-24 08:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20200722052815', '2020-07-22 07:28:21', 45),
('DoctrineMigrations\\Version20200722082829', '2020-07-22 10:28:39', 142),
('DoctrineMigrations\\Version20200724025835', '2020-07-24 04:59:31', 469);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double NOT NULL,
  `net` double NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `coupon_id`, `email`, `name`, `total`, `net`, `created_at`, `updated_at`) VALUES
(1, NULL, 'perera.nilaksha@gmail.com', 'Nilaksha Perera', 248, 228.7, '2020-07-24 15:36:42', '2020-07-24 15:36:42'),
(2, NULL, 'dilshan@gmail.com.com', 'Dilshan Subhashana', 645, 593.28, '2020-07-24 16:13:45', '2020-07-24 16:13:45'),
(3, 1, 'admin@gmail.com', 'Admin', 110, 93.5, '2020-07-24 16:20:19', '2020-07-24 16:20:19'),
(4, NULL, 'nilaksha@enfection.com', 'Nilaksha', 0, 0, '2020-07-24 16:22:22', '2020-07-24 16:22:22'),
(5, NULL, 'owner@g.com', 'Nilaksha', 73.5, 73.5, '2020-07-24 16:44:50', '2020-07-24 16:44:50'),
(6, 1, 'nilaksha@enfection.com', 'sdfgfd', 20.5, 17.43, '2020-07-24 16:55:49', '2020-07-24 16:55:49'),
(7, NULL, 'nilaksha@enfection.com', 'Nilaksha', 53, 53, '2020-07-24 16:56:26', '2020-07-24 16:56:26'),
(8, NULL, 'nilaksha@enfection.com', 'Nilaksha', 30, 30, '2020-07-24 17:13:46', '2020-07-24 17:13:46'),
(9, 1, 'nilaksha@enfection.com', 'sdfds', 30, 25.5, '2020-07-24 17:16:05', '2020-07-24 17:16:05'),
(10, 1, 'nilaksha@enfection.com', 'Nilaksha', 43.5, 36.98, '2020-07-25 00:38:34', '2020-07-25 00:38:34'),
(11, 1, 'nilaksha@enfection.com', 'The Martian', 104, 88.4, '2020-07-25 01:32:46', '2020-07-25 01:32:46'),
(12, 1, 'coupon@gmail.com', 'coupon transaction', 53.5, 45.48, '2020-07-25 01:58:56', '2020-07-25 01:58:56'),
(13, 2, 'AnotherDiscount@gmail.com', 'Discount 2', 66, 56.1, '2020-07-25 02:03:19', '2020-07-25 02:03:19'),
(14, 1, 'test@tt.com', 'Tester', 20.5, 17.43, '2020-07-25 11:18:25', '2020-07-25 11:18:25'),
(15, NULL, 'single@purchase.com', 'Single item ', 30, 30, '2020-07-25 11:21:56', '2020-07-25 11:21:56'),
(16, 1, 'sherly@gmail.com', 'Sherly', 60, 51, '2020-07-25 11:28:21', '2020-07-25 11:28:21'),
(17, 1, 'fscott@gmail.com', 'F Scott', 204, 173.4, '2020-07-25 11:38:11', '2020-07-25 11:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `book_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 13, 4, '2020-07-24 15:36:42', '2020-07-24 15:36:42'),
(2, 1, 15, 4, '2020-07-24 15:36:42', '2020-07-24 15:36:42'),
(3, 1, 16, 3, '2020-07-24 15:36:42', '2020-07-24 15:36:42'),
(4, 1, 20, 1, '2020-07-24 15:36:42', '2020-07-24 15:36:42'),
(5, 2, 11, 10, '2020-07-24 16:13:45', '2020-07-24 16:13:45'),
(6, 2, 24, 10, '2020-07-24 16:13:45', '2020-07-24 16:13:45'),
(7, 3, 16, 3, '2020-07-24 16:20:19', '2020-07-24 16:20:19'),
(8, 3, 11, 2, '2020-07-24 16:20:19', '2020-07-24 16:20:19'),
(9, 5, 11, 1, '2020-07-24 16:44:50', '2020-07-24 16:44:50'),
(10, 5, 12, 1, '2020-07-24 16:44:50', '2020-07-24 16:44:50'),
(11, 5, 13, 1, '2020-07-24 16:44:50', '2020-07-24 16:44:50'),
(12, 6, 11, 1, '2020-07-24 16:55:49', '2020-07-24 16:55:49'),
(13, 7, 12, 1, '2020-07-24 16:56:26', '2020-07-24 16:56:26'),
(14, 7, 13, 1, '2020-07-24 16:56:26', '2020-07-24 16:56:26'),
(15, 8, 12, 1, '2020-07-24 17:13:46', '2020-07-24 17:13:46'),
(16, 9, 12, 1, '2020-07-24 17:16:05', '2020-07-24 17:16:05'),
(17, 10, 13, 1, '2020-07-25 00:38:34', '2020-07-25 00:38:34'),
(18, 10, 11, 1, '2020-07-25 00:38:34', '2020-07-25 00:38:34'),
(19, 11, 12, 2, '2020-07-25 01:32:46', '2020-07-25 01:32:46'),
(20, 11, 24, 1, '2020-07-25 01:32:46', '2020-07-25 01:32:46'),
(21, 12, 17, 1, '2020-07-25 01:58:56', '2020-07-25 01:58:56'),
(22, 12, 11, 1, '2020-07-25 01:58:56', '2020-07-25 01:58:56'),
(23, 13, 26, 1, '2020-07-25 02:03:19', '2020-07-25 02:03:19'),
(24, 13, 14, 1, '2020-07-25 02:03:19', '2020-07-25 02:03:19'),
(25, 13, 12, 1, '2020-07-25 02:03:19', '2020-07-25 02:03:19'),
(26, 14, 11, 1, '2020-07-25 11:18:25', '2020-07-25 11:18:25'),
(27, 15, 12, 1, '2020-07-25 11:21:56', '2020-07-25 11:21:56'),
(28, 16, 12, 2, '2020-07-25 11:28:21', '2020-07-25 11:28:21'),
(29, 17, 30, 6, '2020-07-25 11:38:11', '2020-07-25 11:38:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CBE5A33112469DE2` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `FK_CBE5A33112469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
