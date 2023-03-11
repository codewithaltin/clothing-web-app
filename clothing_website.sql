-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 12:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `altinium`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikujt`
--

CREATE TABLE `artikujt` (
  `id` int(11) NOT NULL,
  `titulli` varchar(255) NOT NULL,
  `cmimi` decimal(15,2) NOT NULL,
  `data` date NOT NULL,
  `id_dyqani` int(11) NOT NULL,
  `pershkrimi` text DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `priceoff` float DEFAULT NULL,
  `olderprice` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikujt`
--

INSERT INTO `artikujt` (`id`, `titulli`, `cmimi`, `data`, `id_dyqani`, `pershkrimi`, `foto`, `priceoff`, `olderprice`) VALUES
(1, 'MADDEN GIRL FINLEE BOOTIE', '70.00', '2022-05-03', 1, 'Finlee bootie from Madden Girl.', 'images/card1.jpg', 50, 95),
(2, 'CROPPED DENIM JACKET', '20.00', '2022-05-11', 1, 'Lapel collar jacket with long sleeves and cuffs.', 'images/card2.jpg', 30, 91),
(3, 'LINEN BLEND BLAZER', '50.00', '2022-04-10', 1, 'Straight fit blazer.', 'images/card3.jpg', 40, 90),
(4, 'HEELED SLINGBACKS', '45.00', '2022-05-11', 1, 'Mid-height heel slingbacks.', 'images/card4.jpg', 20, 86),
(5, 'PLEATED SUIT PANTS', '35.00', '2022-03-08', 1, 'Oversized fit wide pants.', 'images/card5.jpg', 15, 95),
(6, 'FAUX FUR HOODED JACKET', '45.00', '2022-03-11', 1, 'Hooded jacket with long sleeves.', 'images/card6.jpg', 25, 121),
(7, 'LACE UP LEATHER SANDALS', '35.00', '2022-02-11', 1, ' Mid-heel leather sandals.', 'images/card7.jpg', 25, 84),
(8, 'MID RISE - SUPER SKINNY', '30.00', '2022-02-10', 1, ' Jeans in very stretchy fabric with mid rise.', 'images/card8.jpg', 30, 87),
(9, 'BIRDSEYE SUIT JACKET', '40.00', '2022-06-11', 1, ' Straight fit blazer.', 'images/card9.jpg', 50, 124),
(10, 'STRIPED JACQUARD TIE', '60.00', '2023-05-10', 1, 'Tie Made Of Silk Fabric.', 'images/card10.jpg', 25, 110);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikujt`
--
ALTER TABLE `artikujt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikujt`
--
ALTER TABLE `artikujt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;
