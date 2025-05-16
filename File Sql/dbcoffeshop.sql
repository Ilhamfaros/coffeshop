-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 04:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcoffeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(3, 'faros', 'faros', '48196244b45b34f930956a47b22e1230', '081387123180', 'ilham270601@gmail.com', 'jl.Kubis IV.a no 117'),
(5, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '081387123180', 'admin@gmail.com', 'Jl.Kubis IV A No 117 Pondok Cabe Ciputat TangSel');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(7, 'Coffee'),
(8, 'Non Coffee'),
(9, 'Appetizer'),
(10, 'Main Course');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price_p` int(11) NOT NULL,
  `product_price_d` int(11) NOT NULL,
  `product_description` blob DEFAULT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` blob DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price_p`, `product_price_d`, `product_description`, `product_image`, `product_status`, `date_created`) VALUES
(12, 7, 'Espresso', 20000, 0, 0x3c703e4b6f7069204974656d20706169742062616e676574206265676f6f6f206d616e61206173656d206c676920617377206261742064616868683c2f703e0d0a, 'produk1685210811.jpg', 0x31, '2023-05-04 06:37:05'),
(13, 7, 'abang/none', 18000, 20000, 0x3c703e67756c61206172656e3c2f703e0d0a, 'produk1685213947.jpg', 0x31, '2023-05-27 18:59:07'),
(15, 7, 'americano', 20000, 22000, 0x3c703e4b6f7069206974656d20706169742074616d6261682065733c2f703e0d0a, 'produk1685218484.jpg', 0x31, '2023-05-27 19:37:42'),
(16, 8, 'Chocholate', 23000, 25000, '', 'produk1685226445.jpg', 0x31, '2023-05-27 22:27:25'),
(17, 8, 'Blueberry Milk', 0, 23000, '', 'produk1685226483.png', 0x31, '2023-05-27 22:28:03'),
(18, 7, 'cappucino', 22000, 23000, '', 'produk1685226533.jpg', 0x31, '2023-05-27 22:28:53'),
(19, 7, 'Caramel Macchiato', 0, 25000, '', 'produk1685226565.jpg', 0x31, '2023-05-27 22:29:25'),
(20, 7, 'Latte', 22000, 23000, '', 'produk1685226614.jpg', 0x31, '2023-05-27 22:30:14'),
(21, 8, 'Lychee Tea', 22000, 25000, '', 'produk1685226663.jpg', 0x31, '2023-05-27 22:31:03'),
(22, 8, 'Lemon Tea', 18000, 20000, '', 'produk1685226703.jpg', 0x31, '2023-05-27 22:31:43'),
(23, 8, 'Matcha', 23000, 25000, '', 'produk1685226744.jpg', 0x31, '2023-05-27 22:32:24'),
(24, 8, 'Melon Breeze', 18000, 20000, '', 'produk1685226780.jpg', 0x31, '2023-05-27 22:33:00'),
(25, 7, 'Moccacino', 22000, 23000, '', 'produk1685226986.jpg', 0x31, '2023-05-27 22:36:26'),
(26, 8, 'Oreo Milk', 0, 23000, '', 'produk1685227047.jpg', 0x31, '2023-05-27 22:37:27'),
(27, 8, 'Peach Tea', 22000, 25000, '', 'produk1685227104.jpg', 0x31, '2023-05-27 22:38:24'),
(28, 7, 'Regal Coofe', 0, 23000, '', 'produk1685227144.jpg', 0x31, '2023-05-27 22:39:04'),
(29, 8, 'Regal Milk', 0, 23000, '', 'produk1685227173.jpeg', 0x31, '2023-05-27 22:39:33'),
(30, 8, 'Sparkling Lemonade', 0, 20000, '', 'produk1685227205.jpg', 0x31, '2023-05-27 22:40:05'),
(31, 8, 'Strawberry Milk', 0, 23000, '', 'produk1685227242.jpeg', 0x31, '2023-05-27 22:40:42'),
(32, 8, 'Vanilla', 18000, 20000, '', 'produk1685227273.jpg', 0x31, '2023-05-27 22:41:13'),
(33, 9, 'Baso Tahu', 18000, 0, '', 'produk1685227369.jpg', 0x31, '2023-05-27 22:42:49'),
(34, 9, 'Cireng Rujak', 20000, 0, '', 'produk1685227405.jpg', 0x31, '2023-05-27 22:43:25'),
(35, 9, 'Dimsum Mentai (3pcs)', 18000, 0, '', 'produk1685227460.jpg', 0x31, '2023-05-27 22:44:20'),
(36, 9, 'Gyoza', 20000, 0, '', 'produk1685227487.jpg', 0x31, '2023-05-27 22:44:47'),
(37, 9, 'Kentang Sosis', 23000, 0, '', 'produk1685227521.jpg', 0x31, '2023-05-27 22:45:21'),
(38, 9, 'Kentang', 20000, 0, '', 'produk1685227580.jpg', 0x31, '2023-05-27 22:46:20'),
(39, 8, 'Klepon', 18000, 20000, '', 'produk1685227700.png', 0x31, '2023-05-27 22:48:20'),
(40, 9, 'Nachos', 25000, 0, '', 'produk1685227729.jpg', 0x31, '2023-05-27 22:48:49'),
(41, 9, 'Onion Ring', 18000, 0, '', 'produk1685227763.jpg', 0x31, '2023-05-27 22:49:23'),
(42, 9, 'Roti Bakar', 18000, 0, 0x3c703e312c20322c20332c20342c20352c20362c20372c20382c20392c2031302c2031312c2031322c2031332c2031342c2031352c2031362c2031372c2031382c2031392c2032302c2032312c2032322c2032332c2032342c2032352c2032362c2032372c2032382c2032392c2033302c2033312c2033322c2033332c2033342c2033352c2033362c2033372c2033382c2033392c2034302c2034312c2034322c2034332c2034342c2034352c2034362c2034372c2034382c2034392c2035302c2035312c2035322c2035332c2035342c2035352c2035362c2035372c2035382c2035392c2036302c2036312c2036322c2036332c2036342c2036352c2036362c2036372c2036382c2036392c2037302c2037312c2037322c2037332c2037342c2037352c2037362c2037372c2037382c2037392c2038302c2038312c2038322c2038332c2038342c2038352c2038362c2038372c2038382c2038392c2039302c2039312c2039322c2039332c2039342c2039352c2039362c2039372c2039382c2039392c203130302c203130312c203130322c203130332c203130342c203130352c203130362c203130372c203130382c203130392c203131302c203131312c203131322c203131332c203131342c203131352c203131362c203131372c203131382c203131392c203132302c203132312c203132322c203132332c203132342c203132352c203132362c203132372c203132382c203132392c203133302c203133312c203133322c203133332c203133342c203133352c203133362c203133372c203133382c203133392c203134302c203134312c203134322c203134332c203134342c203134352c203134362c203134372c203134382c203134392c203135302c203135312c203135322c203135332c203135342c203135352c203135362c203135372c203135382c203135392c203136302c203136312c203136322c203136332c203136342c203136352c203136362c203136372c203136382c203136392c203137302c203137312c203137322c203137332c203137342c203137352c203137362c203137372c203137382c203137392c203138302c203138312c203138322c203138332c203138342c203138352c203138362c203138372c203138382c203138392c203139302c203139312c203139322c203139332c203139342c203139352c203139362c203139372c203139382c203139392c203230302e3c2f703e0d0a, 'produk1685227797.jpg', 0x31, '2023-05-27 22:49:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
