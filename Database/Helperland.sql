-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 09:24 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Helperland`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `Address_id` int(11) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Street_Address` varchar(255) NOT NULL,
  `HouseNumber` int(10) NOT NULL,
  `Postal_Code` int(6) NOT NULL,
  `Telephone_Number` int(10) NOT NULL,
  `City` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `Admin_id` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `Creation_Date` datetime NOT NULL,
  `Updation_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_refund`
--

CREATE TABLE `admin_refund` (
  `Refund_id` int(11) NOT NULL,
  `Admin_id` int(11) NOT NULL,
  `Paid_id` int(11) NOT NULL,
  `Refunded_amount` float NOT NULL,
  `Total_Refund_Amount` float NOT NULL,
  `Refund_Comment` varchar(255) NOT NULL,
  `CallCenter_Comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `Customer_id` int(11) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Mobile_Number` int(10) NOT NULL,
  `Birthdate` date DEFAULT NULL,
  `Language` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Creation_Date` datetime DEFAULT NULL,
  `Update_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `customer_service_booking`
--

CREATE TABLE `customer_service_booking` (
  `Service_id` int(11) NOT NULL,
  `Service_Date` date NOT NULL,
  `Service_Start_Time` time NOT NULL,
  `Service_End_Time` time NOT NULL,
  `Service_Provider` int(11) NOT NULL,
  `Service_Amount` float NOT NULL,
  `Service_Status` varchar(100) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Address` int(11) NOT NULL,
  `Pets_at_Home` varchar(255) NOT NULL,
  `Service_Inside_Cabinets` time DEFAULT NULL,
  `Service_Inside_Fridge` time DEFAULT NULL,
  `Service_Inside_Oven` time DEFAULT NULL,
  `Service_Laundry_wash_dry` time DEFAULT NULL,
  `Service_Interior_windows` time DEFAULT NULL,
  `Service_Need_Time` time NOT NULL,
  `Comments` varchar(255) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `Admin_id` int(11) DEFAULT NULL,
  `Admin_reschedule_comment` varchar(255) DEFAULT NULL,
  `CallCenter_EMP_Notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favourite_sp`
--

CREATE TABLE `favourite_sp` (
  `Favourite_id` int(11) NOT NULL,
  `ServiceProvider_id` int(11) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Favourite` varchar(100) DEFAULT NULL,
  `Unfavourite` varchar(100) DEFAULT NULL,
  `Block_SP` varchar(255) DEFAULT NULL,
  `Block_Customer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `Notification_id` int(11) NOT NULL,
  `Customer_id` int(11) DEFAULT NULL,
  `Service_Provider_id` int(11) DEFAULT NULL,
  `Admin_id` int(11) DEFAULT NULL,
  `Notification_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating_serviceprovider`
--

CREATE TABLE `rating_serviceprovider` (
  `Rating_id` int(11) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Booking_id` int(11) NOT NULL,
  `Service_provider_id` int(11) NOT NULL,
  `On_time_arrival` float NOT NULL,
  `Friendly` float NOT NULL,
  `Quality_Of_service` float NOT NULL,
  `Feedback_ServiceProvider` varchar(255) DEFAULT NULL,
  `Average_Rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider_details`
--

CREATE TABLE `serviceprovider_details` (
  `ServiceProvider_id` int(11) NOT NULL,
  `First_Name` varchar(150) NOT NULL,
  `Last_Name` varchar(150) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Mobile_Number` int(10) NOT NULL,
  `Birthdate` date DEFAULT NULL,
  `Nationality` varchar(30) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `Address_Title` varchar(255) DEFAULT NULL,
  `Address_Houseno` varchar(30) DEFAULT NULL,
  `PostalCode` varchar(10) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `TaxNumber` int(11) DEFAULT NULL,
  `Password` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `Creation_Date` datetime NOT NULL,
  `Updation_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`Address_id`),
  ADD KEY `Customer_id` (`Customer_id`);

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `admin_refund`
--
ALTER TABLE `admin_refund`
  ADD PRIMARY KEY (`Refund_id`),
  ADD KEY `Paid_id` (`Paid_id`),
  ADD KEY `Admin_id` (`Admin_id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `customer_service_booking`
--
ALTER TABLE `customer_service_booking`
  ADD PRIMARY KEY (`Service_id`),
  ADD KEY `Service_Provider` (`Service_Provider`),
  ADD KEY `Customer_id` (`Customer_id`),
  ADD KEY `Address` (`Address`),
  ADD KEY `Admin_id` (`Admin_id`);

--
-- Indexes for table `favourite_sp`
--
ALTER TABLE `favourite_sp`
  ADD PRIMARY KEY (`Favourite_id`),
  ADD KEY `Customer_id` (`Customer_id`),
  ADD KEY `ServiceProvider_id` (`ServiceProvider_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`Notification_id`),
  ADD KEY `Admin_id` (`Admin_id`),
  ADD KEY `Customer_id` (`Customer_id`),
  ADD KEY `Service_Provider_id` (`Service_Provider_id`);

--
-- Indexes for table `rating_serviceprovider`
--
ALTER TABLE `rating_serviceprovider`
  ADD PRIMARY KEY (`Rating_id`),
  ADD KEY `Service_provider_id` (`Service_provider_id`),
  ADD KEY `Booking_id` (`Booking_id`),
  ADD KEY `Customer_id` (`Customer_id`);

--
-- Indexes for table `serviceprovider_details`
--
ALTER TABLE `serviceprovider_details`
  ADD PRIMARY KEY (`ServiceProvider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `Address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_refund`
--
ALTER TABLE `admin_refund`
  MODIFY `Refund_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `Customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `favourite_sp`
--
ALTER TABLE `favourite_sp`
  MODIFY `Favourite_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `Notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating_serviceprovider`
--
ALTER TABLE `rating_serviceprovider`
  MODIFY `Rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `serviceprovider_details`
--
ALTER TABLE `serviceprovider_details`
  MODIFY `ServiceProvider_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `customer_details` (`Customer_id`),
  ADD CONSTRAINT `address_ibfk_2` FOREIGN KEY (`Customer_id`) REFERENCES `customer_details` (`Customer_id`);

--
-- Constraints for table `admin_refund`
--
ALTER TABLE `admin_refund`
  ADD CONSTRAINT `admin_refund_ibfk_1` FOREIGN KEY (`Paid_id`) REFERENCES `customer_service_booking` (`Service_id`),
  ADD CONSTRAINT `admin_refund_ibfk_2` FOREIGN KEY (`Admin_id`) REFERENCES `admin_details` (`Admin_id`);

--
-- Constraints for table `customer_service_booking`
--
ALTER TABLE `customer_service_booking`
  ADD CONSTRAINT `customer_service_booking_ibfk_1` FOREIGN KEY (`Service_Provider`) REFERENCES `serviceprovider_details` (`ServiceProvider_id`),
  ADD CONSTRAINT `customer_service_booking_ibfk_2` FOREIGN KEY (`Customer_id`) REFERENCES `customer_details` (`Customer_id`),
  ADD CONSTRAINT `customer_service_booking_ibfk_3` FOREIGN KEY (`Address`) REFERENCES `address` (`Address_id`),
  ADD CONSTRAINT `customer_service_booking_ibfk_4` FOREIGN KEY (`Admin_id`) REFERENCES `admin_details` (`Admin_id`);

--
-- Constraints for table `favourite_sp`
--
ALTER TABLE `favourite_sp`
  ADD CONSTRAINT `favourite_sp_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `customer_details` (`Customer_id`),
  ADD CONSTRAINT `favourite_sp_ibfk_2` FOREIGN KEY (`ServiceProvider_id`) REFERENCES `serviceprovider_details` (`ServiceProvider_id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`Admin_id`) REFERENCES `admin_details` (`Admin_id`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`Customer_id`) REFERENCES `customer_details` (`Customer_id`),
  ADD CONSTRAINT `notifications_ibfk_3` FOREIGN KEY (`Service_Provider_id`) REFERENCES `serviceprovider_details` (`ServiceProvider_id`);

--
-- Constraints for table `rating_serviceprovider`
--
ALTER TABLE `rating_serviceprovider`
  ADD CONSTRAINT `rating_serviceprovider_ibfk_1` FOREIGN KEY (`Service_provider_id`) REFERENCES `serviceprovider_details` (`ServiceProvider_id`),
  ADD CONSTRAINT `rating_serviceprovider_ibfk_2` FOREIGN KEY (`Booking_id`) REFERENCES `serviceprovider_details` (`ServiceProvider_id`),
  ADD CONSTRAINT `rating_serviceprovider_ibfk_3` FOREIGN KEY (`Booking_id`) REFERENCES `customer_service_booking` (`Service_id`),
  ADD CONSTRAINT `rating_serviceprovider_ibfk_4` FOREIGN KEY (`Customer_id`) REFERENCES `customer_details` (`Customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
