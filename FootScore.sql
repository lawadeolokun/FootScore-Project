-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 18, 2024 at 10:49 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FootScore`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
                            `productName` varchar(100) NOT NULL,
                            `jerseyName` varchar(100) NOT NULL,
                            `size` varchar(100) NOT NULL,
                            `quantity` int(100) NOT NULL,
                            `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`productName`, `jerseyName`, `size`, `quantity`, `order_date`) VALUES
    ('Manchester United Away Jersey', '', 'S', 1, '2024-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `Fixtures`
--

CREATE TABLE `Fixtures` (
                            `idFixtures` int(100) NOT NULL,
                            `Match` varchar(50) NOT NULL,
                            `Date` varchar(15) NOT NULL,
                            `Time` varchar(50) NOT NULL,
                            `Location` varchar(50) NOT NULL,
                            `Image` varchar(255) DEFAULT NULL,
                            `SecondImage` varchar(255) DEFAULT NULL,
                            `Tickets_idTickets` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Fixtures`
--

INSERT INTO `Fixtures` (`idFixtures`, `Match`, `Date`, `Time`, `Location`, `Image`, `SecondImage`, `Tickets_idTickets`) VALUES
                                                                                                                            (1, 'Chelsea vs Liverpool', '01/05/2024', '15:00', 'Stamford Bridge', 'chelsea.png', 'liverpool.png', 1),
                                                                                                                            (2, 'Man United vs Newcastle', '01/05/2024', '12:00', 'Old Trafford', 'manUnited.png', 'newcastle.png', 2),
                                                                                                                            (3, 'Man City vs Brighton', '02/05/2024', '13:00', 'Etihad Stadium', 'manCity.png', 'brighton.png', 3),
                                                                                                                            (4, 'Arsenal vs Spurs', '02/05/2024', '13:00', 'Emirates Stadium', 'arsenal.png', 'spurs.png', 4),
                                                                                                                            (5, 'West Ham vs Aston Villa', '03/05/2024', '18:45', 'London Stadium', 'westHam.png', 'astonVilla.png', 5),
                                                                                                                            (6, 'Spurs vs Man United', '08/05/2024', '15:00', 'Tottenham Hotspur Stadium', 'spurs.png', 'manUnited.png', 6),
                                                                                                                            (7, 'Aston Villa vs Chelsea', '08/05/2024', '11:45', 'Villa Park', 'astonVilla.png', 'chelsea.png', 7),
                                                                                                                            (8, 'Brighton vs Man City', '09/05/2024', '12:00', 'Amex Stadium', 'brighton.png', 'manCity.png', 8),
                                                                                                                            (9, 'Newcastle vs Arsenal', '09/05/2024', '13:00', 'St James\' Park', 'newcastle.png', 'arsenal.png', 9),
(10, 'Liverpool vs West Ham', '10/05/2024', '11:00', 'Anfield', 'liverpool.png', 'westHam.png', 10),
(11, 'Arsenal vs Chelsea', '15/05/2024', '15:00', 'Emirates Stadium', 'arsenal.png', 'chelsea.png', 11),
(12, 'Man City vs Spurs', '15/05/2024', '15:00', 'Etihad Stadium', 'manCity.png', 'spurs.png', 12),
(13, 'Man United vs Liverpool', '16/05/2024', '16:30', 'Old Trafford', 'manUnited.png', 'liverpool.png', 13),
(14, 'West Ham vs Brighton', '16/05/2024', '16:30', 'London Stadium', 'westHam.png', 'brighton.png', 14),
(15, 'Aston Villa vs Newcastle', '17/05/2024', '10:30', 'Villa Park', 'astonVilla.png', 'newcastle.png', 15);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `expiry_date` varchar(7) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `jerseyName` varchar(255) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Profile`
--

CREATE TABLE `Profile` (
  `idProfile` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `D.O.B` varchar(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Age` int(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Authentication_idAuthentication` int(100) NOT NULL,
  `Sales_idSale` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Sales`
--

CREATE TABLE `Sales` (
  `idSales` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Delivery Address` varchar(50) NOT NULL,
  `Phone Number` int(10) NOT NULL,
  `Payment` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Store`
--

CREATE TABLE `Store` (
  `idStore` int(100) NOT NULL,
  `Jersey` varchar(50) NOT NULL,
  `Merchandise` varchar(50) NOT NULL,
  `Sales_idSales` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tickets`
--

CREATE TABLE `Tickets` (
  `Match` varchar(100) NOT NULL,
  `Prices` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Tickets`
--

INSERT INTO `Tickets` (`Match`, `Prices`, `Status`, `Date`) VALUES
('Arsenal vs Chelsea', '204800', 'Singles', '2024-05-15'),
('Aston Villa vs Chelsea', '204800', 'Singles', '2024-05-08'),
('Aston Villa vs Newcastle', '204800', 'Singles', '2024-05-17'),
('Brighton vs Arsenal', '204800', 'Singles', '2024-04-06'),
('Brighton vs Man City', '204800', 'Singles', '2024-05-09'),
('Chelsea vs Liverpool', '204800', 'Singles', '2024-05-01'),
('Liverpool vs West Ham', '204800', 'Singles', '2024-05-10'),
('Man City vs Brighton', '204800', 'Singles', '2024-05-02'),
('Man City vs Spurs', '204800', 'Singles', '2024-05-15'),
('Man United vs Liverpool', '204800', 'Singles', '2024-05-15'),
('Manchester United vs Newcastle', '204800', 'Singles', '2024-05-01'),
('Newcastle vs Arsenal', '204800', 'Singles', '2024-05-09'),
('Spurs vs Man United', '204800', 'Singles', '2024-05-08'),
('West Ham vs Aston Villa', '204800', 'Singles', '2024-05-03'),
('West Ham vs Brighton', '204800', 'Singles', '2024-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Fixtures`
--
ALTER TABLE `Fixtures`
  ADD PRIMARY KEY (`idFixtures`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Profile`
--
ALTER TABLE `Profile`
  ADD PRIMARY KEY (`idProfile`);

--
-- Indexes for table `Sales`
--
ALTER TABLE `Sales`
  ADD PRIMARY KEY (`idSales`);

--
-- Indexes for table `Store`
--
ALTER TABLE `Store`
  ADD PRIMARY KEY (`idStore`);

--
-- Indexes for table `Tickets`
--
ALTER TABLE `Tickets`
  ADD PRIMARY KEY (`Match`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
