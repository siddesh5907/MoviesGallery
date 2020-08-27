-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2020 at 04:46 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviesgallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `duration` time NOT NULL,
  `genre` enum('all','horror','comedy','scifi','adventure','animation') NOT NULL,
  `language` enum('all','hindi','english','french') NOT NULL,
  `likes` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `image`, `director`, `date`, `duration`, `genre`, `language`, `likes`) VALUES
(1, 'Annabelle', 'images/anabel.jpg', 'Goerge', '2008-04-11', '02:50:01', 'horror', 'english', 22),
(3, 'Annabelle 2', 'images/anna2.jpg', 'Goerge', '2020-04-11', '02:40:01', 'horror', 'english', 222),
(4, 'harry porter', 'images/harry-porter.jpg', 'Peter', '2004-07-01', '02:40:01', 'scifi', 'english', 88),
(5, 'hangover', 'images/hangover.jpg', 'Harry', '2005-06-18', '03:40:01', 'comedy', 'french', 11),
(6, 'kedarnath', 'images/Kedar660.jpg', 'Ram', '2005-06-18', '01:40:01', 'comedy', 'hindi', 53),
(7, 'lights out', 'images/lightout.jpg', 'Hammer', '2016-06-18', '01:10:01', 'horror', 'english', 50),
(8, 'batman', 'images/batman.jpeg', 'robert', '2002-07-04', '03:10:01', 'scifi', 'english', 269),
(9, 'Aeronauts', 'images/adv.jpeg', 'Jim Parson', '2006-06-18', '01:26:08', 'adventure', 'french', 169),
(10, 'Aallahdin', 'images/allahdin.jpeg', 'Arthur James', '2019-06-18', '01:56:08', 'adventure', 'english', 96),
(11, 'Amstrong', 'images/amstrong.jpeg', 'Adom Warley', '0000-00-00', '01:59:01', 'scifi', 'english', 111),
(12, 'Cat Woman', 'images/catwomen.jpeg', 'Kim Michel', '2009-04-11', '02:06:01', 'adventure', 'english', 70),
(13, 'Conjuring', 'images/conguring.jpeg', 'Nick Michel', '2012-04-11', '02:08:01', 'scifi', 'english', 122),
(14, 'Dark Knight Rises', 'images/darkKnight.jpeg', 'Shane', '2008-04-11', '03:08:01', 'scifi', 'english', 314),
(15, 'Drive', 'images/drive.jpeg', 'Kane', '2019-04-11', '02:48:01', 'comedy', 'hindi', 31),
(16, 'Evil Dead', 'images/evil.jpeg', 'james twinski', '2020-04-11', '03:08:01', 'horror', 'english', 60),
(17, 'Kahani', 'images/kahani.jpeg', 'Ranbeer Nair', '2015-11-01', '03:10:01', 'comedy', 'hindi', 45),
(18, 'Incredibles', 'images/incredibles.jpeg', 'Stephan Salvetor', '2014-04-11', '02:00:01', 'animation', 'english', 164),
(19, 'Inside Out', 'images/insideout.jpeg', 'Claws Michalson', '2020-03-11', '02:30:01', 'animation', 'english', 89),
(21, 'Oblivion', 'images/oblivion.jpeg', 'cord ', '2020-01-11', '01:40:01', 'adventure', 'french', 100),
(22, 'Tiger Zinda Hai', 'images/tiger.jpeg', 'Ramesh Nair', '2018-01-11', '02:40:01', 'adventure', 'hindi', 55);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
