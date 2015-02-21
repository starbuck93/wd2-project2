-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2015 at 01:44 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `amazon`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `isbn` varchar(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(20) NOT NULL,
  `category` varchar(200) NOT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `imgtitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`isbn`, `title`, `author`, `category`, `summary`, `imgtitle`) VALUES
('0441013597', 'Dune', 'Frank Herbert', 'Fiction', 'A vast empire hangs on the precious and unique commodity know as the "spice" which is only found on the remote planet of Dune.', 'img.png'),
('0441104029', 'Children of Dune', 'Frank Herbert', 'Fiction', 'The twin son and daughter of Paul Atreides come of age as they realize their power and their father''s true nature.', 'img.png'),
('0451458737', 'The Peshawar Lancers', 'S.M. Sterling', 'Fiction', 'The British Empire still lives on in an alternate reality where the northern hemisphere was obliterated by a comet and the center of the world becomes the former crown colony of India.', 'img.png'),
('0464832557', 'The Hunger Games', 'Suzanne Collins', 'Fiction', 'Two heroes battle their way through the brutal and nationally televised hunger games in order to win their freedom and stay alive.', 'img.png'),
('0465067107', 'The Design of Everyday Things', 'Donald A. Norman', 'Engineering', 'This book could forever change how you experience and interact with your physical surroundings.', 'img.png'),
('0618574948', 'The Fellowship of the Ring', 'J.R.R. Tolkien', 'Fiction', 'In ancient times the Rings of Power were crafted by the Elvensmiths and Sauron who forged the One Ring and filled it with his own power so that he could rule all others.', 'img.png'),
('0618574956', 'The Two Towers', 'J.R.R. Tolkien', 'Fiction', 'With Gandalf dead the journey of the One Ring is in peril as the Fellowship splits up with Frodo and Sam getting closer to Mordor while Aragorn slowly realizes his own destiny.', 'img.png'),
('0618574972', 'The Return of the King', 'J.R.R. Tolkien', 'Fiction', 'The amazing story reaches its climax as Frodo and Sam go deeper into Mordor while Aragorn and Gandalf defend the last bastion of mankind from the dark forces of Sauron.', 'img.png'),
('0687650194', 'Prayers for a Privileged People', 'Walter Brueggemann', 'Christian Living', 'A beautiful collection of poetic and prophetic prayers to be prayed and pondered and savored and be challenged by.', 'img.png'),
('1414334907', 'Left Behind', 'Tim LaHaye', ' Fiction', 'A laughable book with a popularized and poorly informed reading of Revelation - oops...I mean it''s a riveting book about the "end times"!', 'img.png'),
('1453606122', 'Autobiography of Benjamin Franklin', ' Benjamin Franklin', 'Autobiography', 'The life and times of one of the most important early American patriots.', 'img.png'),
('1470184788', 'Dark Night of the Soul', 'St. John of the Cros', 'Christian Living', 'Faith and doubt collide in this classic work by one of Christianity''s most celebrated mystics.', 'img.png'),
('1595550789', 'The Total Money Makeover', ' Dave Ramsey', 'Personal Finance', 'This award-winning author teaches you everything you need to know about handling your money wisely and living a debt-free life.', 'img.png'),
('1613821743', 'The Art of War', 'Sun Tzu', 'Military Strategy', 'The Art of War is the Swiss army knife of military theory--pop out a different tool for any situation.', 'img.png');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `user_id` varchar(11) NOT NULL,
  `book_id` varchar(20) NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`user_id`, `book_id`, `rate`, `comment`) VALUES
('1', '0464832557', 2, 'It''s okay I guess.'),
('2', '0464832557', 5, 'This book is pretty cool and stuff');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `wishlist` text,
  `cart` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `wishlist`, `cart`) VALUES
(1, 'test', 'test', 'test', NULL, NULL),
(2, 'Adam Starbuck', 'adam@adam.com', 'ae2b1fca515949e5d54fb22b8ed95575', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
 ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
 ADD PRIMARY KEY (`user_id`,`book_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
