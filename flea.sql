-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230319.4d612b0175
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 07:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flea`
--

-- --------------------------------------------------------

--
-- Table structure for table `pass_booking`
--

CREATE TABLE `pass_booking` (
  `p_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `purchase_date` date NOT NULL,
  `event_date` date NOT NULL,
  `no_of_passes` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stall_booking`
--

CREATE TABLE `stall_booking` (
  `s_id` int(11) NOT NULL,
  `owner_name` varchar(200) NOT NULL,
  `email_id` varchar(250) NOT NULL,
  `brand_name` varchar(200) NOT NULL,
  `city` varchar(250) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `product_category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_concert`
--

CREATE TABLE `tbl_concert` (
  `c_id` int(11) NOT NULL,
  `c_date` date NOT NULL,
  `c_venue` varchar(250) NOT NULL,
  `venue_capacity` int(10) NOT NULL,
  `c_artist` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_concert`
--

INSERT INTO `tbl_concert` (`c_id`, `c_date`, `c_venue`, `venue_capacity`, `c_artist`) VALUES
(1, '2023-03-23', 'Jolly party plot, Surat', 1000, 'Anuj Singh'),
(2, '2023-03-31', 'Jolly party plot, Surat', 1500, 'raftar'),
(3, '2023-03-18', 'Jolly party plot, Surat', 1000, 'hashvi'),
(7, '2023-03-17', 'Jolly party plot, Surat', 2000, 'king'),
(9, '2023-04-08', 'Jolly party plot, Surat', 410, 'king'),
(10, '2023-04-09', 'Jolly party plot, Surat', 1000, 'raftar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_necessity`
--

CREATE TABLE `tbl_necessity` (
  `n_id` int(11) NOT NULL,
  `s_id` int(10) NOT NULL,
  `no_chair` int(11) NOT NULL,
  `no_table` int(11) NOT NULL,
  `plug_point` int(11) NOT NULL,
  `other` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `pay_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `email_id` varchar(250) NOT NULL,
  `no_of_passes` int(10) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `c_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `u_id` int(10) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`u_id`, `username`, `password`) VALUES
(1, 'harshvi', 'harshvi'),
(2, 'praj', 'praj'),
(6, 'user', 'ee11cbb19052e40b07aac0ca060c23ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pass_booking`
--
ALTER TABLE `pass_booking`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `stall_booking`
--
ALTER TABLE `stall_booking`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_concert`
--
ALTER TABLE `tbl_concert`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_necessity`
--
ALTER TABLE `tbl_necessity`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pass_booking`
--
ALTER TABLE `pass_booking`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stall_booking`
--
ALTER TABLE `stall_booking`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_concert`
--
ALTER TABLE `tbl_concert`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_necessity`
--
ALTER TABLE `tbl_necessity`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
