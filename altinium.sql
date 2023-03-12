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

INSERT INTO `artikujt` ( `titulli`, `cmimi`, `data`, `id_dyqani`, `pershkrimi`, `foto`, `priceoff`, `olderprice`) VALUES
('MADDEN GIRL FINLEE BOOTIE', '70.00', '2022-05-03', 1, 'Finlee bootie from Madden Girl.', 'images/card1.jpg', 50, 95),
('CROPPED DENIM JACKET', '20.00', '2022-05-11', 1, 'Lapel collar jacket with long sleeves and cuffs.', 'images/card2.jpg', 30, 91),
('LINEN BLEND BLAZER', '50.00', '2022-04-10', 1, 'Straight fit blazer.', 'images/card3.jpg', 40, 90),
('HEELED SLINGBACKS', '45.00', '2022-05-11', 1, 'Mid-height heel slingbacks.', 'images/card4.jpg', 20, 86),
('PLEATED SUIT PANTS', '35.00', '2022-03-08', 1, 'Oversized fit wide pants.', 'images/card5.jpg', 15, 95),
('FAUX FUR HOODED JACKET', '45.00', '2022-03-11', 1, 'Hooded jacket with long sleeves.', 'images/card6.jpg', 25, 121),
('LACE UP LEATHER SANDALS', '35.00', '2022-02-11', 1, ' Mid-heel leather sandals.', 'images/card7.jpg', 25, 84),
('MID RISE - SUPER SKINNY', '30.00', '2022-02-10', 1, ' Jeans in very stretchy fabric with mid rise.', 'images/card8.jpg', 30, 87),
('BIRDSEYE SUIT JACKET', '40.00', '2022-06-11', 1, ' Straight fit blazer.', 'images/card9.jpg', 50, 124),
( 'STRIPED JACQUARD TIE', '60.00', '2023-05-10', 1, 'Tie Made Of Silk Fabric.', 'images/card10.jpg', 25, 110);

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

-- --------------------------------------------------------

--
-- Table structure for table `perdoruesit`
--

CREATE TABLE `perdoruesit` (
  `id` int(11) NOT NULL,
  `emri` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roli` set('0','1') DEFAULT '1',
  `id_dyqani` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perdoruesit`
--

INSERT INTO `perdoruesit` ( `emri`, `email`, `password`, `roli`, `id_dyqani`) VALUES
( 'Altin', 'asdfsdf@sdf.com', 'altini', '1', 1),
('Altin', 'asdfsdf@sdf.com', 'asdf', '1', 1),
('Morinaa', 'isthisworking@ubt-uni.net', 'asdf', '1', 1),
( 'Altin', 'asdfff@hotmail.com', 'asdd', '1', 1),
('Altin', 'asdfff@hotmail.com', 'Altin', '1', 1),
('Altin', 'test@hotmail.com', 'altini', '1', 1),
('Altin', 'ilirianthaqi@live.com', 'altin', '1', 1),
('Anita', 'anitahoti84@gmail.com', 'anita', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perdoruesit`
--
ALTER TABLE `perdoruesit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perdoruesit`
--
ALTER TABLE `perdoruesit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
