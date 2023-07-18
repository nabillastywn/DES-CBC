-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 11:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cyber`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataldr`
--

CREATE TABLE `dataldr` (
  `idSensor` int(11) NOT NULL,
  `tglData` date NOT NULL,
  `intensitas` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dataldr`
--

INSERT INTO `dataldr` (`idSensor`, `tglData`, `intensitas`) VALUES
(31, '2023-06-30', 'S3VNaUJoVHR4YXc9'),
(32, '2023-06-30', 'a3g1aU1SZ1ZLTmc9'),
(33, '2023-06-30', 'a3g1aU1SZ1ZLTmc9'),
(34, '2023-06-30', 'b1pJR2ZsTXZQdEU9'),
(35, '2023-06-30', 'b1pJR2ZsTXZQdEU9'),
(36, '2023-06-30', 'NlFXTTAvTWlaNlU9'),
(37, '2023-06-30', 'dHY4eWFkZFZENVU9'),
(38, '2023-06-30', 'bjdMZEEyTGovUlE9'),
(39, '2023-06-30', 'S2RSYktDQjh1RmM9'),
(40, '2023-06-30', 'TC9DODB4RmIxdmc9'),
(41, '2023-06-30', 'V0RnbU1lUjY5QWs9'),
(42, '2023-06-30', 'V0RnbU1lUjY5QWs9'),
(43, '2023-06-30', 'eDI0cjFmVkUyUFU9'),
(44, '2023-06-30', 'VkxaVkVhcWlGV2c9'),
(45, '2023-06-30', 'dkk5dkdoRUN4eEU9'),
(46, '2023-06-30', 'QWVWUG95V1BJSE09'),
(47, '2023-06-30', 'OCt3a2tTcVdLWWc9'),
(48, '2023-06-30', 'b1pJR2ZsTXZQdEU9'),
(49, '2023-06-30', 'TC9DODB4RmIxdmc9'),
(50, '2023-06-30', 'czg1c1dtV2IrWG89');

-- --------------------------------------------------------

--
-- Table structure for table `datasensor`
--

CREATE TABLE `datasensor` (
  `idSensor` int(11) NOT NULL,
  `tglData` date NOT NULL,
  `suhu` varchar(255) NOT NULL,
  `kelembapan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `datasensor`
--

INSERT INTO `datasensor` (`idSensor`, `tglData`, `suhu`, `kelembapan`) VALUES
(135, '2023-06-30', 'LzRzYlIvMTlhZms3SGlGa3VFdnh4QT09', 'UnhCSFpIVmd5dmlvM25qbkJQSVdrdz09'),
(136, '2023-06-30', 'WkdUU3V2eWNXYXZsYTRBMksyemVoQT09', 'Vk9nUjhrNHdhWUhHN2hKSWlJZU5hZz09'),
(137, '2023-06-30', 'LzRzYlIvMTlhZms3SGlGa3VFdnh4QT09', 'aDJyMzJhM2ZHZjh3dWllWkFlblE2Zz09'),
(138, '2023-06-30', 'LzRzYlIvMTlhZms3SGlGa3VFdnh4QT09', 'RjM4MnlUY1YrdFhGMVVGMUVQcEhvdz09'),
(139, '2023-06-30', 'LzRzYlIvMTlhZms3SGlGa3VFdnh4QT09', 'R2dsUS90dVlhaUs1NjQ3SDZSVUZiZz09'),
(140, '2023-06-30', 'LzRzYlIvMTlhZms3SGlGa3VFdnh4QT09', 'R2dsUS90dVlhaUs1NjQ3SDZSVUZiZz09'),
(141, '2023-06-30', 'LzRzYlIvMTlhZms3SGlGa3VFdnh4QT09', 'R2dsUS90dVlhaUs1NjQ3SDZSVUZiZz09'),
(142, '2023-06-30', 'LzRzYlIvMTlhZms3SGlGa3VFdnh4QT09', 'Vk9nUjhrNHdhWUhHN2hKSWlJZU5hZz09'),
(143, '2023-06-30', 'LzRzYlIvMTlhZms3SGlGa3VFdnh4QT09', 'd2hKcTJlNGxzenR4M0xDWWw4cTYrUT09'),
(144, '2023-06-30', 'SHVjSEdSMkJaNkE4aU41MXVxQ3ZZdz09', 'd2hKcTJlNGxzenR4M0xDWWw4cTYrUT09'),
(145, '2023-06-30', 'WkdUU3V2eWNXYXZsYTRBMksyemVoQT09', 'TEo4WDNRSHIwV24vNHJOSFdyUnFtUT09'),
(146, '2023-06-30', 'bm9jMENSdTkzaXdDWTNjcERTNFZpUT09', 'VitCMlkzNXQ0MEN4TVMzbFI5WmFEQT09'),
(147, '2023-06-30', 'U1grWDUrb1dUTzNZbjFZSllTZzI2UT09', 'L0pTZXV1elZ2TnNoZWtIOVNBa0l3Zz09'),
(148, '2023-06-30', 'NE40ZmR0eWtmcmhHa1lVNW82VXlkUT09', 'RWwxSkprR2pDRzljK0VnT3RpblNWUT09'),
(149, '2023-06-30', 'Y0dSaTVjeFhVR1R2MW0wSXJzYXJ5UT09', 'dVFEdXJzb0VVdUc1UDVpSHpwQTN0Zz09'),
(150, '2023-06-30', 'Z2VHVmJwek1ESDVPMXNWbXdhRkkxZz09', 'eUVLdFp2UFdrcXpXTVFmQU81d0c0QT09'),
(151, '2023-06-30', 'WTg4OTRhN0NxZmI3ZE1JQ3VYRHdkZz09', 'VXBEM3lGeFEvY2FKRktzaDlJOHl4Zz09'),
(152, '2023-06-30', 'WTg4OTRhN0NxZmI3ZE1JQ3VYRHdkZz09', 'enFjaThoekgzSHFiTkppNXNkWHYrQT09'),
(153, '2023-06-30', 'TzBOOEovbloralBVUFo5ankxcmQ5Zz09', 'TVYyQVRxa0Z3VTJ5SWRtbkh4RkxpZz09'),
(154, '2023-06-30', 'WTg4OTRhN0NxZmI3ZE1JQ3VYRHdkZz09', 'aHBlMTFEN0o5S3p1OG54NXI1TTRqUT09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataldr`
--
ALTER TABLE `dataldr`
  ADD PRIMARY KEY (`idSensor`);

--
-- Indexes for table `datasensor`
--
ALTER TABLE `datasensor`
  ADD PRIMARY KEY (`idSensor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataldr`
--
ALTER TABLE `dataldr`
  MODIFY `idSensor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `datasensor`
--
ALTER TABLE `datasensor`
  MODIFY `idSensor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
