-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2020 at 11:20 PM
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
-- Database: `covid-19`
--

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(2) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`) VALUES
(1, 'Gazipur'),
(2, 'Dhaka'),
(3, ' Comilla'),
(4, 'Sylhet'),
(5, 'Rangpur'),
(6, 'Tangail'),
(7, 'Khulna'),
(8, ' Cox\'s Bazar'),
(9, 'Bandarban'),
(10, 'Rangamati'),
(11, 'Khagrachari'),
(12, 'Feni'),
(13, 'Chandpur'),
(14, 'Barisal'),
(15, 'Bhola'),
(16, 'Rajshahi'),
(17, 'Netrokona'),
(18, ' Sherpur'),
(19, 'Pabna'),
(20, 'Bogura'),
(21, 'Dinajpur'),
(22, 'Lalmonirhat'),
(23, 'Kushtia'),
(24, ' Kurigram'),
(25, ' Jhalokati'),
(26, ' Patuakhali'),
(27, 'Rajbari'),
(28, ' Natore'),
(29, 'Barguna'),
(30, 'Jamalpur'),
(31, ' Mymensingh'),
(32, 'Habiganj'),
(33, ' Moulvibazar'),
(34, 'Sunamganj'),
(35, 'Gaibandha'),
(36, ' Nilphamari'),
(37, ' Panchagarh'),
(38, 'Thakurgaon'),
(39, ' Jaipurhat'),
(40, 'Naogaon'),
(41, ' Chapainawabganj'),
(42, ' Sirajganj'),
(43, 'Bagerhat'),
(44, ' Chuadanga'),
(45, 'Jessore'),
(46, 'Jhenaidah'),
(47, ' Magura'),
(48, 'Meherpur'),
(49, 'Narail'),
(50, 'Satkhira'),
(51, ' Brahmanbaria'),
(52, 'Chittagong'),
(53, ' Lakshmipur'),
(54, ' Noakhali'),
(55, ' Faridpur'),
(56, ' Gopalganj'),
(57, ' Kishoreganj'),
(58, ' Madaripur'),
(59, ' Manikganj'),
(60, 'Munshiganj'),
(61, 'Munshiganj'),
(62, 'Narsingdi'),
(63, 'Shariatpur'),
(64, ' Pirojpur');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `temp` float NOT NULL,
  `house` varchar(10) NOT NULL,
  `road` varchar(20) NOT NULL,
  `thana` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`, `name`, `age`, `sex`, `temp`, `house`, `road`, `thana`, `district`, `date`, `score`) VALUES
(1, 'Md. Shahadat Uddin', 28, 'Male', 98, '447/4', 'shimultoli rd', '24', 'Gazipur', '2020-08-12 14:15:33', 3),
(2, 'abc', 22, 'Female', 101, '18', '11', 'uttara', 'Dhaka', '2020-08-19 14:16:05', 5),
(3, 'jahan', 28, 'Male', 99, '11', '12', '24', 'Gazipur', '2019-07-20 16:21:07', 3),
(4, 'abc', 12, 'Female', 97, '18', '11', '23', 'Gazipur', '2020-07-09 16:23:13', 3),
(5, 'x', 56, 'Male', 100, '23', '23', 'uttara', 'Dhaka', '2020-09-01 16:22:30', 7),
(6, 'A', 30, 'Female', 100.8, '23', '12', 'uttara', 'Dhaka', '2020-09-01 14:16:28', 6),
(7, 'fhfh', 56, 'Male', 78, '18', '23', '24', 'Gazipur', '2020-09-07 11:26:19', 12),
(8, 'tfyhfgjh', 89, 'Male', 100, '11', '11', '23', 'Gazipur', '2019-12-24 14:20:22', 9),
(9, 'Shahadat', 29, 'Male', 98.5, 'House-447/', 'shimultoli rd', '24 NO.', 'Gazipur', '2020-09-07 13:23:55', 3),
(10, 'xyz', 30, 'Female', 101, '10', '5', '20', 'Dhaka', '2020-09-07 14:37:14', 6),
(11, 'Mr.', 18, 'Female', 101, '15', '13', 'gazipur sador', 'Gazipur', '2020-09-07 14:39:43', 5),
(12, 'Mr. x', 40, 'Female', 101, '10', '5', '20', 'Comilla', '2020-09-07 20:11:30', 12);

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `id` int(11) NOT NULL,
  `symptom` varchar(100) NOT NULL,
  `display_in` enum('step1','step2') NOT NULL DEFAULT 'step1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`id`, `symptom`, `display_in`) VALUES
(1, 'Breathing problem', 'step1'),
(2, 'Dry cough', 'step1'),
(3, 'Sore throat', 'step1'),
(4, 'Weakness', 'step1'),
(5, 'Runny nose', 'step1'),
(11, 'Abdominal pain', 'step2'),
(12, 'Vomiting', 'step2'),
(13, 'Diarrhoea', 'step2'),
(14, 'Chest pain or pressure', 'step2'),
(15, 'Muscle pain', 'step2'),
(16, 'Loss of taste or smell', 'step2'),
(17, 'Rash on skin or Discoloration of fingers or toes', 'step2'),
(18, 'Loss of speech or movement', 'step2');

-- --------------------------------------------------------

--
-- Table structure for table `thana`
--

CREATE TABLE `thana` (
  `id` int(3) NOT NULL,
  `district_id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thana`
--
ALTER TABLE `thana`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `thana`
--
ALTER TABLE `thana`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `thana`
--
ALTER TABLE `thana`
  ADD CONSTRAINT `thana_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
