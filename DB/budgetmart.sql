-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 07, 2019 at 01:04 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budgetmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(30) DEFAULT NULL,
  `PASS` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `PASS`) VALUES
('admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(30) NOT NULL AUTO_INCREMENT,
  `p_id` int(30) DEFAULT NULL,
  `buyer_id` int(30) DEFAULT NULL,
  `quantity` int(30) DEFAULT NULL,
  `keep_date` date DEFAULT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `p_id`, `buyer_id`, `quantity`, `keep_date`) VALUES
(51, 6, 34, 6, '2018-12-07'),
(49, 7, 34, 24, '2018-12-07'),
(50, 8, 34, 16, '2018-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) DEFAULT NULL,
  `cat_icon` varchar(30) DEFAULT NULL,
  `cat_pic` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_icon`, `cat_pic`) VALUES
(1, 'Fashion', 'fashion.png', 'fashion.jpg'),
(2, 'Electronics', 'electronics.png', 'electronics.jpg'),
(3, 'Collectibles& Art', 'art.png', 'art.jpg'),
(4, 'Home& Garden', 'home.png', 'home.jpg'),
(5, 'Sports', 'sports.png', 'sports.jpg'),
(6, 'Motors', 'motor.png', 'motor.jpg'),
(7, 'test', NULL, NULL),
(8, 'test1', NULL, NULL),
(9, 'hello', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(30) NOT NULL,
  `buyer_id` int(30) DEFAULT NULL,
  `shop_id` varchar(30) DEFAULT NULL,
  `p_id` int(30) DEFAULT NULL,
  `quantity` int(30) DEFAULT NULL,
  `notified` int(30) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `buyer_id`, `shop_id`, `p_id`, `quantity`, `notified`, `purchase_date`) VALUES
(13, 24, 'Shop_24', 13, 1, 0, '2018-12-21'),
(13, 24, 'Shop_24', 16, 1, 0, '2018-12-21'),
(12, 24, 'Shop_24', 14, 1, 0, '2018-12-20'),
(15, 24, 'Shop_24', 19, 2, 0, '2018-12-21'),
(10, 24, 'Shop_24', 8, 1, 0, '2018-12-09'),
(10, 24, 'Shop_24', 6, 1, 0, '2018-12-09'),
(11, 24, 'Shop_24', 6, 2, 0, '2018-12-13'),
(11, 24, 'Shop_24', 8, 2, 0, '2018-12-13'),
(12, 24, 'Shop_24', 21, 1, 0, '2018-12-20'),
(8, 34, 'Shop_24', 7, 1, 0, '2018-12-07'),
(13, 24, 'Shop_24', 9, 1, 0, '2018-12-21'),
(14, 24, 'Shop_24', 25, 4, 0, '2018-12-21'),
(14, 24, 'Shop_24', 9, 1, 0, '2018-12-21'),
(14, 24, 'Shop_24', 20, 2, 0, '2018-12-21'),
(15, 24, 'Shop_24', 15, 1, 0, '2018-12-21'),
(16, 24, 'Shop_24', 16, 1, 0, '2018-12-21'),
(16, 24, 'Shop_24', 9, 5, 0, '2018-12-21'),
(17, 24, 'Shop_24', 23, 1, 0, '2018-12-21'),
(17, 24, 'Shop_24', 9, 1, 0, '2018-12-21'),
(18, 24, 'Shop_24', 9, 6, 0, '2018-12-21'),
(18, 24, 'Shop_24', 11, 1, 0, '2018-12-21'),
(19, 24, 'Shop_24', 9, 5, 0, '2018-12-23'),
(19, 24, 'Shop_24', 25, 3, 0, '2018-12-23'),
(19, 24, 'Shop_24', 15, 1, 0, '2018-12-23');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(30) NOT NULL AUTO_INCREMENT,
  `shop_id` varchar(30) DEFAULT NULL,
  `p_title` varchar(30) DEFAULT NULL,
  `p_details` varchar(300) DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `quantity` varchar(30) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `sub_cat` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `shop_id`, `p_title`, `p_details`, `pic`, `quantity`, `price`, `p_date`, `category`, `sub_cat`) VALUES
(7, 'Shop_24', 'Antique Art Piece', 'The coolest art ever.', '21bb01e4ec9a73e908429f0f10b18f8a.jpg', '4', 15000, '2018-12-02', 'Collectibles& Art', 'Antiques'),
(6, 'Shop_24', 'Lion Art', 'Its so much coool and antiuqye piece.... which is done by a greAT artist', '2a1c07765df7cbb8d4e2d47f719f0a11.jpg', '3', 30000, '2018-12-02', 'Collectibles& Art', 'Art'),
(8, 'Shop_24', 'Iphone Xs', 'The Best Mobile ever.', '02d79d596b4eb3676ec9ccce044048f5.png', '40', 1000, '2018-12-02', 'Electronics', 'Cell Phones'),
(9, 'Shop_24', 'Gentle Park', 'Shirt is from Thailand', 'eeebb0f976b053ece679d6151047aa0c.jpg', '1', 5, '2018-12-20', 'Fashion', 'Men'),
(10, 'Shop_24', 'Diamond Ring 32Kr', 'Best Ring from America', '5059d2c14df01545ad4310f08cb11827.jpg', '12', 700, '2018-12-20', 'Fashion', 'Men'),
(11, 'Shop_24', 'Gaming Laptop', 'Best one Ever.Play all latest HD games in here', 'ad82d63930bb876c1524b16fa82ba4a1.jpg', '8', 625, '2018-12-20', 'Electronics', 'Computer& Accessories'),
(12, 'Shop_24', 'Ladies Dress', 'all imported from India.', '7e899bb73969541b22498957d1933fa7.jpg', '49', 45, '2018-12-20', 'Fashion', 'Women'),
(15, 'Shop_24', 'Mountain Shoes', 'Best for Hills and tracking', '2490f826eb00d8886f9513e71debaef9.jpg', '31', 17, '2018-12-20', 'Fashion', 'Shoes'),
(16, 'Shop_24', 'Mechanical Watch', 'Unique watch designs from Germany', 'a1af9664de988ea0b0d6141119b8b0b3.jpg', '16', 200, '2018-12-20', 'Fashion', 'Accesories'),
(18, 'Shop_24', 'Designer Bag', 'Imported from France', 'dd6051105c5deb87ecfbb5485df78549.jpg', '44', 40, '2018-12-20', 'Fashion', 'Accesories'),
(19, 'Shop_24', 'Black Watch', 'Best for gift for Wedding', '146f596be37ef353eeecf79a8111f525.jpg', '18', 30, '2018-12-20', 'Fashion', 'Accesories'),
(21, 'Shop_24', 'Designer Dress', 'Imported from France', '2b070d298e69edd739a0b37d9425596f.jpg', '29', 45, '2018-12-20', 'Fashion', 'Women'),
(22, 'Shop_24', 'Pink Bag', 'Best for gift for Wedding', '72729620034fe3a5080f5c21ab782529.jpg', '20', 16, '2018-12-20', 'Fashion', 'Women'),
(23, 'Shop_24', 'Watch from Amsterdam', 'Best strong non scratch able', '3f2c40d0aec27dd2bd53e701d77300f0.jpg', '28', 17, '2018-12-20', 'Fashion', 'Accesories'),
(25, 'Shop_24', 'Sports Shoe', 'Best for Hills and tracking', '319d531d28c0ba375ce73fd0405deb48.jpg', '73', 15, '2018-12-20', 'Fashion', 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE IF NOT EXISTS `sub_category` (
  `sub_cat` varchar(30) DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  KEY `cat_id` (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_cat`, `cat_id`) VALUES
('Men', 1),
('Women', 1),
('Kids', 1),
('Jewelery', 1),
('Accesories', 1),
('Health& Beauty', 1),
('Shoes', 1),
('Cell Phones', 2),
('Cameras& Photo', 2),
('Computer& Accessories', 2),
('Multimedia', 2),
('Other Accessories', 2),
('Antiques', 3),
('Collectibles', 3),
('Art', 3),
('Entertainment', 3),
('Household', 4),
('Tools', 4),
('Kitchen', 4),
('Garden', 4),
('Dinning', 4),
('Fitness', 5),
('Football', 5),
('Baseball', 5),
('Tenis', 5),
('Cricket', 5),
('Motorcycles', 6),
('Cars& Trucks', 6),
('Parts& Accessories', 6),
('Other Vehicles', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(30) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `PASS` varchar(20) DEFAULT NULL,
  `f_name` varchar(30) DEFAULT NULL,
  `l_name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` int(150) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `shop_id` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `PASS`, `f_name`, `l_name`, `email`, `gender`, `address`, `phone`, `birth_date`, `picture`, `reg_date`, `shop_id`) VALUES
(24, 'test_again', '123', 'Ishraque', 'new', 'Asd@gmail.com', 'Male', 'CDA Avenue, 2no Gate,SA Poribohon', 234567, '2018-08-25', '13f21accd6f561cf83ddfe8b33800942.jpg', '2018-10-28', 'Shop_24'),
(34, 'as12', '123', 'ANtar', 'Nandi', 'Asd@gmail.com', 'Male', 'Shundarban Courier Service, GEC', 1234567, '2018-11-01', '794295a16ed26ae0f30f7a15879b7675.jpg', '2018-11-03', 'Shop_29');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
