-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2016 at 10:56 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `containers`
--

CREATE TABLE `containers` (
  `idcontainers` int(11) NOT NULL,
  `width` double DEFAULT NULL,
  `length` double DEFAULT NULL,
  `height` double DEFAULT NULL,
  `weight` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `containers`
--

INSERT INTO `containers` (`idcontainers`, `width`, `length`, `height`, `weight`) VALUES
(1, 10, 20, 30, 22),
(2, 20, 20, 30, 45),
(3, 30, 30, 20, 44),
(4, 20, 30, 50, 100);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `iddrivers` int(11) NOT NULL,
  `drivername` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `iditems` int(11) NOT NULL,
  `itemname` varchar(45) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `containers_containerid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `trips_tripsid` int(11) DEFAULT NULL,
  `orilat` double DEFAULT NULL,
  `orilong` double DEFAULT NULL,
  `destlat` double DEFAULT NULL,
  `destlong` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag` varchar(45) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `containers_containerid`, `quantity`, `trips_tripsid`, `orilat`, `orilong`, `destlat`, `destlong`, `created_at`, `flag`) VALUES
(1, 1, 10, 1, -7.2066751698354, 112.72366404533, -7.2070690005965, 112.726957798, '2016-05-23 08:53:02', 'old'),
(2, 2, 20, 2, -7.2070690005965, 112.726957798, -7.2070370683854, 112.7326977253, '2016-05-23 08:53:02', 'old'),
(3, 3, 30, 3, -7.2070370683854, 112.7326977253, -7.2066751698354, 112.72366404533, '2016-05-23 08:53:02', 'old'),
(4, 3, 10, 4, -7.2023163984222, 112.73551404476, -7.2066751698354, 112.72366404533, '2016-05-23 08:55:09', 'old'),
(5, 2, 10, 5, -7.2070690005965, 112.726957798, -7.1979522629629, 112.72873878479, '2016-05-23 08:55:09', 'old');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `reportid` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag` varchar(10) DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`reportid`, `name`, `description`, `created_at`, `flag`) VALUES
(1, 'Report Hari Senin 23 Mei 2016', 'Optimasi Transportasi Pelindo III', '2016-05-23 08:53:02', 'new'),
(2, 'Report Hari Senin 23 Mei 2016', 'Optimasi Transportasi II', '2016-05-23 08:55:09', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `reports_has_orders`
--

CREATE TABLE `reports_has_orders` (
  `reports_reportsid` int(11) NOT NULL,
  `orders_ordersid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reports_has_orders`
--

INSERT INTO `reports_has_orders` (`reports_reportsid`, `orders_ordersid`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `idstop` int(11) NOT NULL,
  `lang` double DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `locationname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stops`
--

INSERT INTO `stops` (`idstop`, `lang`, `lat`, `locationname`) VALUES
(0, 112.72097110748291, -7.213945017624406, 'TPKS'),
(1, 112.72366404533386, -7.206675169835441, 'NILAM'),
(2, 112.72695779800415, -7.207069000596542, 'BERLIAN'),
(3, 112.73269772529602, -7.207037068385422, 'MIRAH'),
(4, 112.73551404476166, -7.202316398422177, 'KALIMAS'),
(5, 112.72873878479004, -7.197952262962947, 'JAMRUD');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `idtrips` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`idtrips`, `description`) VALUES
(1, 'GOODS-1 dari NILAM dikirim ke BERLIAN'),
(2, 'GOODS-2 dari BERLIAN dikirim ke MIRAH'),
(3, 'GOODS-3 dari MIRAH dikirim ke NILAM'),
(4, 'GOODS-3 dari KALIMAS dikirim ke NILAM'),
(5, 'GOODS-2 dari BERLIAN dikirim ke JAMRUD');

-- --------------------------------------------------------

--
-- Table structure for table `trips_has_stops`
--

CREATE TABLE `trips_has_stops` (
  `trips_tripsid` int(11) DEFAULT NULL,
  `stops_stopsid` int(11) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trips_has_stops`
--

INSERT INTO `trips_has_stops` (`trips_tripsid`, `stops_stopsid`, `type`) VALUES
(1, 1, 'origin'),
(1, 2, 'destination'),
(2, 2, 'origin'),
(2, 3, 'destination'),
(3, 3, 'origin'),
(3, 1, 'destination'),
(4, 4, 'origin'),
(4, 1, 'destination'),
(5, 2, 'origin'),
(5, 5, 'destination');

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE `trucks` (
  `idtrucks` int(11) NOT NULL,
  `jenis_angkutan` varchar(45) DEFAULT NULL,
  `capacity` int(11) NOT NULL,
  `cost/km` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trucks`
--

INSERT INTO `trucks` (`idtrucks`, `jenis_angkutan`, `capacity`, `cost/km`) VALUES
(1, 'Parcell', 40, 0),
(2, 'Parcell', 40, 0),
(3, 'Liquid', 40, 0),
(5, 'Liquid', 40, 0),
(6, 'Liquid', 40, 0),
(7, 'Liquid', 40, 0),
(8, 'Containers', 50, 1000),
(9, 'Containers', 50, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `trucks_has_orders`
--

CREATE TABLE `trucks_has_orders` (
  `orders_orderid` int(11) NOT NULL,
  `trucks_truckid` int(11) NOT NULL,
  `departure_time` varchar(45) NOT NULL,
  `arrival_time` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `containers`
--
ALTER TABLE `containers`
  ADD PRIMARY KEY (`idcontainers`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`iddrivers`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`iditems`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `containers_containerid` (`containers_containerid`),
  ADD KEY `trips_tripsid` (`trips_tripsid`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`reportid`);

--
-- Indexes for table `reports_has_orders`
--
ALTER TABLE `reports_has_orders`
  ADD KEY `reports_reportsid` (`reports_reportsid`),
  ADD KEY `orders_ordersid` (`orders_ordersid`);

--
-- Indexes for table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`idstop`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`idtrips`);

--
-- Indexes for table `trips_has_stops`
--
ALTER TABLE `trips_has_stops`
  ADD KEY `trips_tripsid` (`trips_tripsid`),
  ADD KEY `stops_stopsid` (`stops_stopsid`);

--
-- Indexes for table `trucks`
--
ALTER TABLE `trucks`
  ADD PRIMARY KEY (`idtrucks`);

--
-- Indexes for table `trucks_has_orders`
--
ALTER TABLE `trucks_has_orders`
  ADD KEY `orders_orderid` (`orders_orderid`),
  ADD KEY `trucks_truckid` (`trucks_truckid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `containers`
--
ALTER TABLE `containers`
  MODIFY `idcontainers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `reportid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `idtrips` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `idtrucks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`trips_tripsid`) REFERENCES `trips` (`idtrips`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`containers_containerid`) REFERENCES `containers` (`idcontainers`) ON DELETE CASCADE;

--
-- Constraints for table `reports_has_orders`
--
ALTER TABLE `reports_has_orders`
  ADD CONSTRAINT `reports_has_orders_ibfk_1` FOREIGN KEY (`reports_reportsid`) REFERENCES `reports` (`reportid`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_has_orders_ibfk_2` FOREIGN KEY (`orders_ordersid`) REFERENCES `orders` (`orderid`) ON DELETE CASCADE;

--
-- Constraints for table `trips_has_stops`
--
ALTER TABLE `trips_has_stops`
  ADD CONSTRAINT `trips_has_stops_ibfk_1` FOREIGN KEY (`trips_tripsid`) REFERENCES `trips` (`idtrips`) ON DELETE CASCADE,
  ADD CONSTRAINT `trips_has_stops_ibfk_2` FOREIGN KEY (`stops_stopsid`) REFERENCES `stops` (`idstop`) ON DELETE CASCADE;

--
-- Constraints for table `trucks_has_orders`
--
ALTER TABLE `trucks_has_orders`
  ADD CONSTRAINT `trucks_has_orders_ibfk_1` FOREIGN KEY (`orders_orderid`) REFERENCES `orders` (`orderid`) ON DELETE CASCADE,
  ADD CONSTRAINT `trucks_has_orders_ibfk_2` FOREIGN KEY (`trucks_truckid`) REFERENCES `trucks` (`idtrucks`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
