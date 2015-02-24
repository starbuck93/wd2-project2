-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2015 at 07:28 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

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
  `imgtitle` varchar(255) NOT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`isbn`, `title`, `author`, `category`, `summary`, `imgtitle`) VALUES
('0441013597', 'Dune', 'Frank Herbert', 'Fiction', 'A vast empire hangs on the precious and unique commodity know as the "spice" which is only found on the remote planet of Dune.', 'http://ecx.images-amazon.com/images/I/41shWIN%2BssL.jpg'),
('0441104029', 'Children of Dune', 'Frank Herbert', 'Fiction', 'The twin son and daughter of Paul Atreides come of age as they realize their power and their father''s true nature.', 'http://ecx.images-amazon.com/images/I/71nUyNTnWvL._SL1500_.jpg'),
('0451458737', 'The Peshawar Lancers', 'S.M. Sterling', 'Fiction', 'The British Empire still lives on in an alternate reality where the northern hemisphere was obliterated by a comet and the center of the world becomes the former crown colony of India.', 'http://ecx.images-amazon.com/images/I/51JPCKHHTXL._SY344_BO1,204,203,200_.jpg'),
('0464832557', 'The Hunger Games', 'Suzanne Collins', 'Fiction', 'Two heroes battle their way through the brutal and nationally televised hunger games in order to win their freedom and stay alive.', 'http://ecx.images-amazon.com/images/I/41bOj-am1RL._SY344_BO1,204,203,200_.jpg'),
('0465067107', 'The Design of Everyday Things', 'Donald A. Norman', 'Engineering', 'This book could forever change how you experience and interact with your physical surroundings.', 'http://ecx.images-amazon.com/images/I/417eQ5d7FiL._SY344_BO1,204,203,200_.jpg'),
('0618574948', 'The Fellowship of the Ring', 'J.R.R. Tolkien', 'Fiction', 'In ancient times the Rings of Power were crafted by the Elvensmiths and Sauron who forged the One Ring and filled it with his own power so that he could rule all others.', 'http://ecx.images-amazon.com/images/I/51C1V6CS3ML.jpg'),
('0618574956', 'The Two Towers', 'J.R.R. Tolkien', 'Fiction', 'With Gandalf dead the journey of the One Ring is in peril as the Fellowship splits up with Frodo and Sam getting closer to Mordor while Aragorn slowly realizes his own destiny.', 'http://ecx.images-amazon.com/images/I/51HUqZm3JTL._SY344_BO1,204,203,200_.jpg'),
('0618574972', 'The Return of the King', 'J.R.R. Tolkien', 'Fiction', 'The amazing story reaches its climax as Frodo and Sam go deeper into Mordor while Aragorn and Gandalf defend the last bastion of mankind from the dark forces of Sauron.', 'http://ecx.images-amazon.com/images/I/517FFFR0P1L.jpg'),
('0687650194', 'Prayers for a Privileged People', 'Walter Brueggemann', 'Christian Living', 'A beautiful collection of poetic and prophetic prayers to be prayed and pondered and savored and be challenged by.', 'http://ecx.images-amazon.com/images/I/415KaD3SC4L._SY344_BO1,204,203,200_.jpg'),
('1414334907', 'Left Behind', 'Tim LaHaye', ' Fiction', 'A laughable book with a popularized and poorly informed reading of Revelation - oops...I mean it''s a riveting book about the "end times"!', 'http://ecx.images-amazon.com/images/I/51kKYGB8eiL._SY344_BO1,204,203,200_.jpg'),
('1453606122', 'Autobiography of Benjamin Franklin', ' Benjamin Franklin', 'Autobiography', 'The life and times of one of the most important early American patriots.', 'http://ecx.images-amazon.com/images/I/41LPkbCO1tL._SY344_BO1,204,203,200_.jpg'),
('1470184788', 'Dark Night of the Soul', 'St. John of the Cross', 'Christian Living', 'Faith and doubt collide in this classic work by one of Christianity''s most celebrated mystics.', 'http://ecx.images-amazon.com/images/I/51AGsjxiFnL._SY344_BO1,204,203,200_.jpg'),
('1595550789', 'The Total Money Makeover', ' Dave Ramsey', 'Personal Finance', 'This award-winning author teaches you everything you need to know about handling your money wisely and living a debt-free life.', 'http://ecx.images-amazon.com/images/I/517LV72u4VL.jpg'),
('1613821743', 'The Art of War', 'Sun Tzu', 'Military Strategy', 'The Art of War is the Swiss army knife of military theory--pop out a different tool for any situation.', 'http://ecx.images-amazon.com/images/I/81Gamj%2BL-cL._SL1500_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `user_id` varchar(11) NOT NULL,
  `book_id` varchar(20) NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` text,
  PRIMARY KEY (`user_id`,`book_id`)
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `wishlist` text,
  `cart` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `wishlist`, `cart`) VALUES
(1, 'test', 'test', 'test', NULL, NULL),
(2, 'Adam Starbuck', 'adam@adam.com', 'ae2b1fca515949e5d54fb22b8ed95575', NULL, NULL),
(3, 'Rajal', 'rajal@rajal.com', 'a0e044c165eea7d3b3c94eaea4f46d9f', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
