-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2021 at 01:42 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$t7mLMeRG4LU2hMHndYe.DO65/U7Jq7l4qSLWtw9vO/WPByMPx05XS', '09786924674', '2021-10-15 05:01:48', '2021-10-15 07:01:18'),
(2, 'shweyamin', 'shwe@gmail.com', '$2y$10$t7mLMeRG4LU2hMHndYe.DO65/U7Jq7l4qSLWtw9vO/WPByMPx05XS', '091212121212', '2021-10-17 13:47:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fruits', '2021-10-05 15:11:33', '2021-09-21 15:17:15'),
(2, 'Electric ', '2021-09-21 15:17:26', '2021-09-21 15:17:26'),
(3, 'Bikes', '2021-09-21 16:51:12', '2021-09-21 16:51:12'),
(5, 'perfume', '2021-10-03 16:22:40', '2021-10-03 16:22:40'),
(6, 'CARS', '2021-10-05 14:45:53', '2021-10-05 14:45:53'),
(7, 'Address', '2021-10-05 14:46:16', '2021-10-05 14:46:16'),
(8, 'Salad', '2021-10-09 14:07:30', '2021-10-05 14:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `con` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `phone`, `state`, `con`, `created_at`) VALUES
(1, 'hanwinaung', 'hanwinaungsdg@gmail.com', '09970777378', ' It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can m', 1, '2021-10-24 13:13:50'),
(2, 'one', 'one@gmail.com', '0923233233', ' It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can m', 1, '2021-10-24 13:35:21'),
(3, 'susu', 'su@gmail.com', '1222222222222', 'This is the first item&#39;s accordion body. It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showi', 1, '2021-10-24 14:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 1,
  `email` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `items` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `state`, `email`, `items`, `created_at`) VALUES
(1, 1, 'one@gmail.com', '[{\"id\":\"10\",\"cat_id\":\"6\",\"name\":\"Toyota\",\"price\":\"9000\",\"image\":\"php2bc8-c5c5d29bbf2a73df0cac72ffc3e58989.jpg\",\"description\":\"GitHub is where over 65 million developers shape the future of software, together. Contribute to the open source community, manage your Git repositories, review code like a pro, track bugs and\",\"created_at\":\"2021-10-05 21:49:11\",\"updated_at\":\"2021-10-05 21:49:11\",\"deleted_at\":\"2021-10-05 21:49:11\",\"qty\":\"1\"},{\"id\":\"12\",\"cat_id\":\"7\",\"name\":\"prok-Salad\",\"price\":\"6000\",\"image\":\"phpf30b-72b572e618bde07d761d781bd20ec57d.jpg\",\"description\":\"PDOStatement object. If the last SQL statement executed by the associated PDOStatement was a SELECT statement, some databases may return the number of rows returned by that statement.\",\"created_at\":\"2021-10-05 21:58:47\",\"updated_at\":\"2021-10-05 21:58:47\",\"deleted_at\":\"2021-10-05 21:58:47\",\"qty\":\"1\"}]', '2021-10-27 15:30:22'),
(2, 1, 'hanwinaungsdg@gmail.com', '[{\"id\":\"10\",\"cat_id\":\"6\",\"name\":\"Toyota\",\"price\":\"9000\",\"image\":\"php2bc8-c5c5d29bbf2a73df0cac72ffc3e58989.jpg\",\"description\":\"GitHub is where over 65 million developers shape the future of software, together. Contribute to the open source community, manage your Git repositories, review code like a pro, track bugs and\",\"created_at\":\"2021-10-05 21:49:11\",\"updated_at\":\"2021-10-05 21:49:11\",\"deleted_at\":\"2021-10-05 21:49:11\",\"qty\":\"2\"},{\"id\":\"12\",\"cat_id\":\"7\",\"name\":\"prok-Salad\",\"price\":\"6000\",\"image\":\"phpf30b-72b572e618bde07d761d781bd20ec57d.jpg\",\"description\":\"PDOStatement object. If the last SQL statement executed by the associated PDOStatement was a SELECT statement, some databases may return the number of rows returned by that statement.\",\"created_at\":\"2021-10-05 21:58:47\",\"updated_at\":\"2021-10-05 21:58:47\",\"deleted_at\":\"2021-10-05 21:58:47\",\"qty\":\"2\"},{\"id\":\"6\",\"cat_id\":\"2\",\"name\":\"Cars\",\"price\":\"2000\",\"image\":\"php44ca-00b5cfa83f231510720e18cd54a6eff4.jpg\",\"description\":\"shipping the first stable release of our new major version. It\\u2019s been a wild ride made possible by our maintainers and the amazing community that uses and contributes to Bootstrap. Thanks to all who have helped us get here!\",\"created_at\":\"2021-10-02 00:06:15\",\"updated_at\":\"2021-10-02 00:06:15\",\"deleted_at\":\"2021-10-02 00:06:15\",\"qty\":\"2\"}]', '2021-10-28 13:38:43'),
(4, 2, 'one@gmail.com', '[{\"id\":\"15\",\"cat_id\":\"1\",\"name\":\"Durain\",\"price\":\"2000\",\"image\":\"php53d-58be79d69033d638fd9822370a3a8617.jpg\",\"description\":\"Carousels don\\u2019t automatically normalize slide dimensions. As such, you may need to use additional utilities or custom styles to appropriately size content. \",\"created_at\":\"2021-10-13 20:06:47\",\"updated_at\":\"2021-10-13 20:06:47\",\"deleted_at\":\"2021-10-13 20:06:47\",\"qty\":\"3\"},{\"id\":\"14\",\"cat_id\":\"1\",\"name\":\"Banana\",\"price\":\"2000\",\"image\":\"phpb576-5c604f5ff485e37dc64382cb7f203045.jpg\",\"description\":\"Carousels don\\u2019t automatically normalize slide dimensions. As such, you may need to use additional utilities or custom styles to appropriately size content. \",\"created_at\":\"2021-10-13 20:06:27\",\"updated_at\":\"2021-10-13 20:06:27\",\"deleted_at\":\"2021-10-13 20:06:27\",\"qty\":\"2\"},{\"id\":\"13\",\"cat_id\":\"1\",\"name\":\"Acocado\",\"price\":\"2000\",\"image\":\"php5f75-7f84260ab060e6789131cb1ec336a565.jpg\",\"description\":\"Carousels don\\u2019t automatically normalize slide dimensions. As such, you may need to use additional utilities or custom styles to appropriately size content. \",\"created_at\":\"2021-10-13 20:06:05\",\"updated_at\":\"2021-10-13 20:06:05\",\"deleted_at\":\"2021-10-13 20:06:05\",\"qty\":\"2\"}]', '2021-10-29 13:23:08'),
(5, 2, 'mgmg123@gmail.com', '[{\"id\":\"15\",\"cat_id\":\"1\",\"name\":\"Durain\",\"price\":\"2000\",\"image\":\"php53d-58be79d69033d638fd9822370a3a8617.jpg\",\"description\":\"Carousels don\\u2019t automatically normalize slide dimensions. As such, you may need to use additional utilities or custom styles to appropriately size content. \",\"created_at\":\"2021-10-13 20:06:47\",\"updated_at\":\"2021-10-13 20:06:47\",\"deleted_at\":\"2021-10-13 20:06:47\",\"qty\":\"1\"},{\"id\":\"16\",\"cat_id\":\"1\",\"name\":\"Cherry\",\"price\":\"2000\",\"image\":\"php4758-0ad0e92fb6182ddcf433523021e1a469.jpg\",\"description\":\"Carousels don\\u2019t automatically normalize slide dimensions. As such, you may need to use additional utilities or custom styles to appropriately size content. \",\"created_at\":\"2021-10-13 20:07:04\",\"updated_at\":\"2021-10-13 20:07:04\",\"deleted_at\":\"2021-10-13 20:07:04\",\"qty\":\"1\"}]', '2021-10-29 13:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `price`, `image`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 3, 'Bridge', '10000', 'php59bc-36c4d541ddc00754f03603c118a01ca6.jpg', 'Websites use trackers to collect info about your browsing. Websites may use this info to improve sites and show you content like personalized ads. Some trackers collect and send your info to sites you haven&#39;t visited.    ', '2021-10-01 00:16:34', '2021-09-30 17:46:34', '2021-09-30 17:46:34'),
(3, 3, 'Flash', '2400', 'php877e-aa745c3508b12318a1fba826fdb438d5.jpg', 'See the Remarks section for more details. $ fetch_style in PDO::query can be overridden with $ fetch_style in PDO::fetc    ', '2021-10-01 22:54:27', '2021-10-01 16:24:27', '2021-10-01 16:24:27'),
(4, 2, 'electric-TV', '90000', 'phpf92-932b56a672635ae8de8804f02a3ec582.jpg', 'See the Remarks section for more details. $ fetch_style in PDO::query can be overridden with $ fetch_style in PDO::fetc', '2021-10-01 22:57:12', '2021-10-01 16:27:12', '2021-10-01 16:27:12'),
(5, 1, 'Pine-apple', '1000', 'php5da2-72e94523032091433f844b8d2fe8b517.jpg', '  Be sure to have your pages set up with the latest design and development standards. That means using an HTML5 doctype and including a viewport meta tag for proper responsive behaviors. Put it all toget                      ', '2021-10-02 00:03:55', '2021-10-01 17:33:55', '2021-10-01 17:33:55'),
(6, 2, 'Cars', '2000', 'php44ca-00b5cfa83f231510720e18cd54a6eff4.jpg', 'shipping the first stable release of our new major version. It’s been a wild ride made possible by our maintainers and the amazing community that uses and contributes to Bootstrap. Thanks to all who have helped us get here!', '2021-10-02 00:06:15', '2021-10-01 17:36:15', '2021-10-01 17:36:15'),
(7, 5, 'Ball', '3000', 'php225d-6bd3d478c3410d37aa39ee1582d9b1b0.jpg', 'Steps to use English to Myanmar (Burmese) Google Translate. Here are the 5 simple steps to translate ', '2021-10-03 22:55:25', '2021-10-03 16:25:25', '2021-10-03 16:25:25'),
(8, 1, 'Apples', '2000', 'php81d2-4b76c5e3c171cc1eb3e373ed065f26c7.jpg', '            the associated PDOStatement was a SELECT statement, some databases may return the number of rows returned by that statement. However, this behaviour is not guaranteed for all databases and should ...           ', '2021-10-05 20:38:33', '2021-10-05 14:08:33', '2021-10-05 14:08:33'),
(10, 6, 'Toyota', '9000', 'php2bc8-c5c5d29bbf2a73df0cac72ffc3e58989.jpg', 'GitHub is where over 65 million developers shape the future of software, together. Contribute to the open source community, manage your Git repositories, review code like a pro, track bugs and', '2021-10-05 21:49:11', '2021-10-05 15:19:11', '2021-10-05 15:19:11'),
(11, 7, 'Beautiful', '7000', 'php89f5-190ebdb2d410885549fb575569d06a27.jpg', 'PDOStatement object. If the last SQL statement executed by the associated PDOStatement was a SELECT statement, some databases may return the number of rows returned by that statement.', '2021-10-05 21:57:14', '2021-10-05 15:27:14', '2021-10-05 15:27:14'),
(12, 7, 'prok-Salad', '6000', 'phpf30b-72b572e618bde07d761d781bd20ec57d.jpg', 'PDOStatement object. If the last SQL statement executed by the associated PDOStatement was a SELECT statement, some databases may return the number of rows returned by that statement.', '2021-10-05 21:58:47', '2021-10-05 15:28:47', '2021-10-05 15:28:47'),
(13, 1, 'Acocado', '2000', 'php5f75-7f84260ab060e6789131cb1ec336a565.jpg', 'Carousels don’t automatically normalize slide dimensions. As such, you may need to use additional utilities or custom styles to appropriately size content. ', '2021-10-13 20:06:05', '2021-10-13 13:36:05', '2021-10-13 13:36:05'),
(14, 1, 'Banana', '2000', 'phpb576-5c604f5ff485e37dc64382cb7f203045.jpg', 'Carousels don’t automatically normalize slide dimensions. As such, you may need to use additional utilities or custom styles to appropriately size content. ', '2021-10-13 20:06:27', '2021-10-13 13:36:27', '2021-10-13 13:36:27'),
(15, 1, 'Durain', '2000', 'php53d-58be79d69033d638fd9822370a3a8617.jpg', 'Carousels don’t automatically normalize slide dimensions. As such, you may need to use additional utilities or custom styles to appropriately size content. ', '2021-10-13 20:06:47', '2021-10-13 13:36:47', '2021-10-13 13:36:47'),
(16, 1, 'Cherry', '2000', 'php4758-0ad0e92fb6182ddcf433523021e1a469.jpg', 'Carousels don’t automatically normalize slide dimensions. As such, you may need to use additional utilities or custom styles to appropriately size content. ', '2021-10-13 20:07:04', '2021-10-13 13:37:04', '2021-10-13 13:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `created_at`) VALUES
(1, 'hanwinaungsdg@gmail.com', 'hanwinaung', '$2y$10$oI3XRGlMJvSX8xVBYlKjWuoQ8nARdmc52vvjNqToyxG1lXMPLLf/a', '2021-10-14 15:01:17'),
(2, 'one@gmail.com', 'onee', '$2y$10$4ju08ZFXi/4SxAZGrlwi1eVPw/AgDqUoTGSLnwydBsfBSRwRPcjU6', '2021-10-14 15:02:25'),
(3, 'mgmg123@gmail.com', 'mgmg', '$2y$10$.0aLQjaKV3skCCrw7XZT1OUXTsTwaTqDnW0Szl5p5VCwyADPmDDy2', '2021-10-28 15:14:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
