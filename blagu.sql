-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2018 at 02:20 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blagu`
--

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `id_img` int(11) NOT NULL,
  `img_title` varchar(50) NOT NULL,
  `img_src` varchar(200) NOT NULL,
  `img_description` varchar(500) NOT NULL,
  `img_date_upload` datetime NOT NULL,
  `dilihat` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`id_img`, `img_title`, `img_src`, `img_description`, `img_date_upload`, `dilihat`, `username`) VALUES
(36, 'Beautiful Landscape', 'userimg/YangLex/dummy_img_1.jpeg', 'My First Trip to Kuvukiland Island is very Awesome..', '2018-03-24 08:19:20', 0, 'YangLex'),
(37, 'Cape Koding', 'userimg/YangLex/dummy_img_2.jpeg', 'Koding Bray...', '2018-03-24 08:21:42', 0, 'YangLex'),
(38, 'Setitik Cahaya Untuk Kehidupan (Lampu)', 'userimg/YangLex/dummy_img_4.jpeg', 'Lampu itu ...', '2018-03-24 08:24:23', 0, 'YangLex'),
(39, 'Exspensive Laptop', 'userimg/YangLex/dummy_img_5.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-03-24 08:26:57', 0, 'YangLex'),
(40, 'Beauty Cake', 'userimg/YangLex/dummy_img_6.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-03-24 08:28:07', 0, 'YangLex'),
(41, 'Lorem Ipsum', 'userimg/JohnCena/dummy_img_7.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-03-24 08:40:54', 0, 'JohnCena'),
(42, 'Lorem Ipsum', 'userimg/JohnCena/dummy_img_8.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-03-24 08:41:32', 0, 'JohnCena'),
(43, 'Lorem Ipsum 2', 'userimg/JohnCena/dummy_img_9.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-03-24 08:42:12', 0, 'JohnCena'),
(44, 'Ngopi Boy...', 'userimg/JohnCena/dummy_img_10.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-03-24 09:47:48', 0, 'JohnCena'),
(45, 'Beauty Girl', 'userimg/JohnCena/dummy_img_11.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-03-24 09:48:21', 0, 'JohnCena'),
(46, 'Choco First', 'userimg/AntoKewer/dummy_img_12.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-03-24 09:49:52', 0, 'AntoKewer'),
(47, 'Shopping Girl', 'userimg/AntoKewer/dummy_img_13.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-03-24 09:51:00', 0, 'AntoKewer'),
(48, 'Awesome Mountain', 'userimg/AntoKewer/dummy_img_14.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-03-24 09:52:09', 0, 'AntoKewer'),
(49, 'Let\'s Drawing an Image', 'userimg/AntoKewer/dummy_img_15.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-03-24 09:53:05', 0, 'AntoKewer'),
(50, 'Lorem Ipsum 3', 'userimg/AntoKewer/dummy_img_16.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-03-24 09:53:45', 0, 'AntoKewer');

-- --------------------------------------------------------

--
-- Table structure for table `img_categories`
--

CREATE TABLE `img_categories` (
  `img_categories` int(11) NOT NULL,
  `name_img_categories` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_categories`
--

INSERT INTO `img_categories` (`img_categories`, `name_img_categories`) VALUES
(1, 'Digital Art'),
(2, 'Traditional Art'),
(3, 'Photography'),
(4, 'Artisan Crafts'),
(5, 'Literature'),
(6, 'Film'),
(7, 'Animation'),
(8, 'Motion Books'),
(9, 'Flash'),
(10, 'Design & Interface'),
(11, 'Customization'),
(12, 'Cartoons & Comics'),
(13, 'Manga & Anime'),
(14, 'Fan Art');

-- --------------------------------------------------------

--
-- Table structure for table `img_categories_img`
--

CREATE TABLE `img_categories_img` (
  `id_img` int(11) NOT NULL,
  `id_img_categories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_categories_img`
--

INSERT INTO `img_categories_img` (`id_img`, `id_img_categories`) VALUES
(36, 3),
(36, 4),
(37, 1),
(37, 3),
(38, 3),
(38, 10),
(38, 11),
(39, 1),
(39, 3),
(40, 3),
(40, 4),
(41, 3),
(42, 3),
(43, 1),
(43, 3),
(43, 10),
(44, 3),
(45, 3),
(46, 3),
(46, 10),
(47, 3),
(48, 3),
(49, 1),
(49, 3),
(50, 3),
(50, 8);

-- --------------------------------------------------------

--
-- Table structure for table `img_tags`
--

CREATE TABLE `img_tags` (
  `id_img_tags` int(11) NOT NULL,
  `img_tags_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_tags`
--

INSERT INTO `img_tags` (`id_img_tags`, `img_tags_name`) VALUES
(10, 'beauty island'),
(11, 'island'),
(12, 'beauty'),
(13, 'coding php'),
(14, 'koding'),
(15, 'coding'),
(16, 'art'),
(17, 'lampu'),
(18, 'laptop mahal'),
(19, 'laptop'),
(20, 'lorem ipsum'),
(21, 'delicious cake'),
(22, 'choco cake'),
(23, 'cake'),
(24, 'ipsum'),
(25, 'lorem'),
(26, 'kopi'),
(27, 'ngopi'),
(28, 'girl'),
(29, 'beauty girl'),
(30, 'delicious'),
(31, 'sweet'),
(32, 'chocolate'),
(33, 'choco'),
(34, 'shopping girl'),
(35, 'girl shopping'),
(36, 'shopping'),
(37, 'awesome mountain'),
(38, 'mountain'),
(39, 'draw'),
(40, 'pen'),
(41, 'face'),
(42, 'smile');

-- --------------------------------------------------------

--
-- Table structure for table `img_tags_img`
--

CREATE TABLE `img_tags_img` (
  `id_img` int(11) NOT NULL,
  `id_img_tags` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_tags_img`
--

INSERT INTO `img_tags_img` (`id_img`, `id_img_tags`) VALUES
(36, 10),
(36, 11),
(36, 12),
(37, 13),
(37, 14),
(37, 15),
(38, 16),
(38, 17),
(39, 18),
(39, 19),
(39, 20),
(40, 21),
(40, 22),
(40, 23),
(41, 24),
(41, 25),
(42, 24),
(42, 25),
(43, 24),
(43, 25),
(44, 26),
(44, 27),
(45, 28),
(45, 29),
(45, 12),
(46, 30),
(46, 31),
(46, 32),
(46, 33),
(47, 34),
(47, 35),
(47, 36),
(48, 37),
(48, 38),
(49, 39),
(49, 40),
(50, 41),
(50, 42);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_date_register` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `user_date_register`) VALUES
('AntoKewer', 'antokewer@gmail.com', '69372d7fe63a675c251c2a3bf88ea766', '2018-03-24 07:56:47'),
('jangq', 'jabbarujang@gmail.com', 'b7d712efefea70d583c16620f17d2c6f', '2018-03-24 08:13:53'),
('JohnCena', 'johncena@gmail.com', 'e8d25b4208b80008a9e15c8698640e85', '2018-03-24 08:15:53'),
('YangLex', 'yanglex@gmail.com', '3498100a93112e96fbc1b10d838ab6bd', '2018-03-24 08:16:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `img_categories`
--
ALTER TABLE `img_categories`
  ADD PRIMARY KEY (`img_categories`);

--
-- Indexes for table `img_categories_img`
--
ALTER TABLE `img_categories_img`
  ADD KEY `id_img` (`id_img`),
  ADD KEY `id_img_categories` (`id_img_categories`);

--
-- Indexes for table `img_tags`
--
ALTER TABLE `img_tags`
  ADD PRIMARY KEY (`id_img_tags`);

--
-- Indexes for table `img_tags_img`
--
ALTER TABLE `img_tags_img`
  ADD KEY `id_img` (`id_img`),
  ADD KEY `id_img_tags` (`id_img_tags`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `img`
--
ALTER TABLE `img`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `img_categories`
--
ALTER TABLE `img_categories`
  MODIFY `img_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `img_tags`
--
ALTER TABLE `img_tags`
  MODIFY `id_img_tags` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `img_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `img_categories_img`
--
ALTER TABLE `img_categories_img`
  ADD CONSTRAINT `img_categories_img_ibfk_1` FOREIGN KEY (`id_img`) REFERENCES `img` (`id_img`),
  ADD CONSTRAINT `img_categories_img_ibfk_2` FOREIGN KEY (`id_img_categories`) REFERENCES `img_categories` (`img_categories`);

--
-- Constraints for table `img_tags_img`
--
ALTER TABLE `img_tags_img`
  ADD CONSTRAINT `img_tags_img_ibfk_1` FOREIGN KEY (`id_img`) REFERENCES `img` (`id_img`),
  ADD CONSTRAINT `img_tags_img_ibfk_2` FOREIGN KEY (`id_img_tags`) REFERENCES `img_tags` (`id_img_tags`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
