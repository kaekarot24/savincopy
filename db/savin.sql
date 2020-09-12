-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2020 at 11:16 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `savin`
--

-- --------------------------------------------------------

--
-- Table structure for table `savin_affiliate`
--

CREATE TABLE `savin_affiliate` (
  `id` int(11) NOT NULL,
  `affiliate_type` enum('individual','company','news') NOT NULL DEFAULT 'individual',
  `affiliate_name` varchar(100) NOT NULL,
  `affiliate_email` varchar(255) NOT NULL,
  `affiliate_phone` varchar(50) NOT NULL,
  `affiliate_socialmedia_link` varchar(255) DEFAULT NULL,
  `affiliate_designation` varchar(255) DEFAULT NULL,
  `affiliate_company_name` varchar(255) DEFAULT NULL,
  `affiliate_website_link` varchar(255) DEFAULT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `savin_contact`
--

CREATE TABLE `savin_contact` (
  `id` int(11) NOT NULL,
  `savin_name` varchar(255) NOT NULL,
  `savin_email` varchar(255) NOT NULL,
  `savin_phone` varchar(50) NOT NULL,
  `savin_subject` text NOT NULL,
  `savin_message` text NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `savin_enquiry`
--

CREATE TABLE `savin_enquiry` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `enquiry_email` varchar(100) NOT NULL,
  `enquiry_mobile` varchar(50) NOT NULL,
  `enquiry_subject` varchar(255) NOT NULL,
  `enquiry_message` text NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `savin_affiliate`
--
ALTER TABLE `savin_affiliate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savin_contact`
--
ALTER TABLE `savin_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savin_enquiry`
--
ALTER TABLE `savin_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `savin_affiliate`
--
ALTER TABLE `savin_affiliate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `savin_contact`
--
ALTER TABLE `savin_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `savin_enquiry`
--
ALTER TABLE `savin_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
