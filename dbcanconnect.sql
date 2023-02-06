-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 02:36 PM
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
-- Database: `dbcanconnect`
--


create database dbcanconnect;


-- --------------------------------------------------------

--
-- Table structure for table `client_users`
--

CREATE TABLE `client_users` (
  `user_id` int(10) NOT NULL,
  `user_uid` varchar(40) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_addr` varchar(200) NOT NULL,
  `user_pwd` varchar(256) NOT NULL,
  `user_email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_users`
--

INSERT INTO `client_users` (`user_id`, `user_uid`, `user_name`, `user_addr`, `user_pwd`, `user_email`) VALUES
(1, 'zx', 'zx zx', ' street', '$2y$10$g9lbbccgzQXV4Qdv/5tdaeVmkduf6z02qo9rqnkCl35E1LSoCMf0K', 'zx@gmail.com'),
(2, 'qw', 'qw qw', 'street', '$2y$10$WFHXCct2PIJUMWAm7BrZW.eDhKQF7B3HsT1AxC2p3gvWkuJa5ClP2', 'qw@gmail.com'),
(4, 'df', 'df as', 'Streetd', '$2y$10$vN9ATbLw6pNtfTgQEQbfheFxvBqfzloh1EmhhMfGLSdjtf.ejgD.2', 'df@gmail.com'),
(6, 'gb', 'gb gb', 'street ', '$2y$10$FOwsWZx3XbngevJYOyZ8peVyMXCBgkMSTzkNTqYAt6pNcaekruJSi', 'gb@gmail.com'),
(7, 'Alex', 'Alex', '123 street Montreal Qc Canada', '$2y$10$SdEeZgI7abBdnkCz9oEi/uGtx.2OP.DoOOeLd2YTqPABA.8e9rR6G', 'Alex@gmail.com'),
(8, 'Tom', 'Tom Tom', '123 Street Montreal QC Canada', '$2y$10$WAM36Q2nuzn4Q3FT.igBgOI3UUu2K9uNdeq1RGt5emqf6gPdkvqWW', 'Tom@gmail.com'),
(9, 'Jerry', 'Jerry Jerry', '123 street Montreal QC Canada', '$2y$10$Ymv8/wUNuC3Mz4mnDvoMaOYegNEtIDCUJpU9.UPhtQCkq0zJ4Em8C', 'Jerry@gmail.com'),
(10, 'Bugs', 'Bugs Bugs', '123 street Montreal QC Canada', '$2y$10$5blbS3dsG0HbSLm/FpH2N.ACO3Tz0kdcpADP1P6kptzPpcQ5R9YMy', 'Bugs@gmail.com'),
(11, 'Daffy', 'Daffy Daffy', '123 street Montreal QC Canada', '$2y$10$UldGd0z8oCyUKz27k0/hs.CQoIVjpVNZGwcuWF10vnIh2CjgYcYDu', 'Daffy1@gmail.com'),
(12, 'bob', 'bobby smith', 'street', '$2y$10$Gv/wNcdjqw503MI6gNnUgul3osWD7kQ2dSBpW637hotzVHhEU6H7e', 'bob@gmail.com'),
(13, 'dorota', 'dorota ko', 'street', '$2y$10$5SBB/iwPQgdg04KxAkoFcOe/CAWZ0vzcii2I/P4XZVmmwfswZrdqy', 'dorota@gmail.com'),
(14, 'joe', 'joe', 'street 123', '$2y$10$0xFyE9zsbS1WK74EniDvMOczUciBSIX6FJnXunO7YT5OsL5VpnI1m', 'joe@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `consultant_users`
--

CREATE TABLE `consultant_users` (
  `user_id` int(10) NOT NULL,
  `user_uid` varchar(40) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_licenseNum` varchar(8) NOT NULL,
  `user_address` varchar(200) NOT NULL,
  `user_phone` varchar(11) NOT NULL,
  `user_primProvince` varchar(5) NOT NULL,
  `user_fee` int(20) NOT NULL,
  `user_pwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultant_users`
--

INSERT INTO `consultant_users` (`user_id`, `user_uid`, `user_email`, `user_name`, `user_licenseNum`, `user_address`, `user_phone`, `user_primProvince`, `user_fee`, `user_pwd`) VALUES
(1, 'ss', 'ss@gmail.com', 'ss ss', 'S123123', 'street', '1231231234', 'ON', 20, '$2y$10$B5yboPpceYLqcnPbmqggX.Z4ed91lw4L4OEMKwX6QsX.qSAzWUS0S'),
(2, 'dd', 'dd@gmail.com', 'dd dd', 'D123123', 'streetD', '1231231235', 'AB', 101, '$2y$10$EjHN/VDaqHcd6uVoFzZg/.HfBVuUv6Gi3onakqiSlYMYZwUBJx6JW'),
(3, 'kk', 'ww@gmail.com', 'ww ww', 'W123123', 'street w', '1231231234', 'BC', 200, '$2y$10$YJGqxG.SmzEKBG4IVgKHX..sBYl5u10Cs1Mk4eUfFp/XtwYrr1lve'),
(4, 'Sara', 'Sara@gmail.com', 'Sara Sara', 'S111222', '123 Street Montreal QC Canada', '1231231234', 'BC', 440, '$2y$10$waqmYnhGeRy1D2/EEHHAMe6KJnNgMYTKjb5FzM1TYKArrS/Q1L9ya'),
(5, 'Kai', 'Kai@gmail.com', 'Kai Kai', 'K222333', '123 Street Montreal QC Canada ', '1231231234', 'QC', 330, '$2y$10$uXJG/8NTbgqysn.li3wPNe.AiUHL.3iNAq0htj7doStegHIC4fGZe'),
(6, 'Fred', 'Fred@gmail.com', 'Fred Fred', 'F222333', '123 street Montreal QC Canada', '1231231234', 'BC', 200, '$2y$10$EAAIs16x2lYW4gHo/OVs2uIySidvTN5KBKXTdqA5HgqEj7b55nNu2'),
(7, 'Mandy', 'Mandy@gmail.com', 'Mandy Mandy', 'M222333', '123 Street Montreal QC Canada', '1231231234', 'AB', 400, '$2y$10$Z41yL95OjMTjtvnlDll90uke6r4Zy9DDqKBCBzGPH.Ck2rnhYgZ4C'),
(8, 'Jason', 'Jason@gmail.com', 'Jason Jason', 'J222333', '123 street Montreal QC Canada', '1231231234', 'QC', 250, '$2y$10$sPwlLvNp7poEnQq4nm9h6uUsD8D9yybaEHJYqIVv9oY3JtVLdtNSq');

-- --------------------------------------------------------

--
-- Table structure for table `contract_tb`
--

CREATE TABLE `contract_tb` (
  `contract_id` int(10) NOT NULL,
  `contract_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `client_id` int(10) NOT NULL,
  `consultant_id` int(10) NOT NULL,
  `fee` int(20) NOT NULL,
  `client_resp` enum('pending','accept','reject') NOT NULL,
  `is_contract_closed` enum('yes','no') NOT NULL,
  `is_contract_payed` enum('yes','no') NOT NULL,
  `contract_text` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contract_tb`
--

INSERT INTO `contract_tb` (`contract_id`, `contract_date`, `client_id`, `consultant_id`, `fee`, `client_resp`, `is_contract_closed`, `is_contract_payed`, `contract_text`) VALUES
(5, '2022-11-26 00:20:40', 1, 1, 20, 'accept', 'no', 'yes', '    			This is a contract: I (ss ss)(S123123) will assist my client(zx zx) to get a candian visa. My fee is  20 $. We will comunicate by phone(1231231234). 2022/11/26 			'),
(6, '2022-11-26 00:28:33', 1, 1, 20, 'accept', 'yes', 'yes', '    			This is a contract: I (ss ss)(S123123) will assist my client(zx zx) to get a candian visa. My fee is  20 $. We will comunicate by phone(1231231234). 2022/11/26 			'),
(7, '2022-11-26 00:30:52', 1, 1, 20, 'reject', 'yes', 'no', '    			This is a contract: I (ss ss)(S123123) will assist my client(zx zx) to get a candian visa. My fee is  20 $. We will comunicate by phone(1231231234). 2022/11/26 			'),
(8, '2022-11-26 19:50:42', 1, 1, 20, 'accept', 'yes', 'yes', '        			This is a contract: I (ss ss)(S123123) will assist my client(zx zx) to get a candian visa. My fee is  20 $. We will comunicate by phone(1231231234). 2022/11/26     			'),
(9, '2022-12-05 16:31:33', 7, 4, 440, 'accept', 'yes', 'yes', '        			This is a contract: I (Sara Sara)(S111222) will assist my client(Alex) to get a candian visa. My fee is  440 $. We will comunicate by phone(1231231234). 2022/12/05     			'),
(10, '2022-12-06 01:21:24', 12, 8, 250, 'accept', 'yes', 'yes', '        			This is a contract: I (Jason Jason)(J222333) will assist my client(bobby) to get a candian visa. My fee is  250 $. We will comunicate by phone(1231231234). 2022/12/06     			'),
(11, '2022-12-06 01:29:57', 12, 8, 250, 'accept', 'yes', 'yes', '        			This is a contract: I (Jason Jason)(J222333) will assist my client(bobby) to get a canadian visa. My fee is  250 $. We will communicate by phone(1231231234). 2022/12/06     			'),
(12, '2022-12-07 00:29:53', 13, 8, 250, 'accept', 'yes', 'yes', '        			This is a contract: I (Jason Jason)(J222333) will assist my client(dorota ko) to get a canadian visa. My fee is  250 $. We will communicate by phone(1231231234). 2022/12/07     			'),
(13, '2022-12-07 13:18:33', 14, 8, 250, 'accept', 'yes', 'yes', '        			This is a contract: I (Jason Jason)(J222333) will assist my client(joe) to get a canadian visa. My fee is  250 $. We will communicate by phone(1231231234). 2022/12/07     			');

-- --------------------------------------------------------

--
-- Table structure for table `request_tb`
--

CREATE TABLE `request_tb` (
  `request_id` int(10) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `client_id` int(10) NOT NULL,
  `consultant_id` int(10) NOT NULL,
  `request_text` longtext NOT NULL,
  `consultant_resp` enum('pending','accept','decline') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_tb`
--

INSERT INTO `request_tb` (`request_id`, `request_date`, `client_id`, `consultant_id`, `request_text`, `consultant_resp`) VALUES
(1, '2022-11-25 22:37:28', 1, 1, '    			Hello, I (zx) am make a request to you(ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', ''),
(2, '2022-11-19 17:03:54', 1, 2, '    			Hello, I (zx) am make a request to you(dd). Will you accept my request and make a contract to help me get a candaian work visa?  			', 'accept'),
(3, '2022-11-25 22:35:13', 4, 1, '    			Hello, I (df as) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', ''),
(4, '2022-11-25 22:39:34', 1, 1, '    			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', ''),
(5, '2022-11-25 22:44:41', 1, 1, '    			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', ''),
(6, '2022-11-25 22:46:38', 1, 1, '    			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', ''),
(7, '2022-11-25 22:48:38', 1, 1, '    			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', ''),
(8, '2022-11-25 22:49:10', 1, 1, '    			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', ''),
(9, '2022-11-25 22:55:14', 1, 1, '    			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', ''),
(10, '2022-11-25 22:57:47', 1, 1, '    			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', ''),
(11, '2022-11-25 22:59:27', 1, 1, '    			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', ''),
(12, '2022-11-25 23:09:02', 1, 1, '    			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', ''),
(13, '2022-11-25 23:09:07', 1, 1, '    			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', ''),
(14, '2022-11-25 23:30:27', 1, 1, '    			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', 'accept'),
(15, '2022-11-25 23:11:23', 1, 1, '    			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', ''),
(16, '2022-11-25 23:15:49', 1, 1, '    			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', ''),
(17, '2022-11-25 23:36:02', 1, 1, '    			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', 'accept'),
(18, '2022-11-25 23:35:50', 1, 1, '    			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', ''),
(19, '2022-11-25 23:36:59', 1, 1, '    			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', 'accept'),
(20, '2022-11-25 23:37:18', 1, 1, '    			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', 'accept'),
(21, '2022-11-26 00:23:47', 1, 1, '    			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', 'accept'),
(22, '2022-11-26 00:30:04', 1, 1, '    			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?  			', 'accept'),
(23, '2022-11-26 19:44:25', 1, 1, '        			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?      			', ''),
(24, '2022-11-26 19:44:23', 1, 1, '        			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?      			', ''),
(25, '2022-11-26 19:49:19', 1, 1, '        			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?      			', 'accept'),
(26, '2022-12-04 15:57:46', 1, 1, '        			Hello, I (zx zx) am make a request to you(ss ss). Will you accept my request and make a contract to help me get a candaian work visa?      			', ''),
(27, '2022-12-05 16:31:15', 7, 4, '        			Hello, I (Alex) am make a request to you(Sara Sara). Will you accept my request and make a contract to help me get a candaian work visa?      			', 'accept'),
(28, '2022-12-06 01:18:50', 12, 8, '        			Hello, I (bobby) am make a request to you(Jason Jason). Will you accept my request and make a contract to help me get a candaian work visa?      			', 'accept'),
(29, '2022-12-06 01:29:37', 12, 8, '        			Hello, I (bobby) am making a request to you(Jason Jason). Will you accept my request and make a contract to help me get a canadian work visa?      			', 'accept'),
(30, '2022-12-07 00:29:35', 13, 8, '        			Hello, I (dorota ko) am making a request to you(Jason Jason). Will you accept my request and make a contract to help me get a canadian work visa?      			', 'accept'),
(31, '2022-12-07 13:18:11', 14, 8, '        			Hello, I (joe) am making a request to you(Jason Jason). Will you accept my request and make a contract to help me get a canadian work visa?      			', 'accept');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_users`
--
ALTER TABLE `client_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_uid` (`user_uid`);

--
-- Indexes for table `consultant_users`
--
ALTER TABLE `consultant_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `contract_tb`
--
ALTER TABLE `contract_tb`
  ADD PRIMARY KEY (`contract_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `consultant_id` (`consultant_id`);

--
-- Indexes for table `request_tb`
--
ALTER TABLE `request_tb`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `consultant_id` (`consultant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_users`
--
ALTER TABLE `client_users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `consultant_users`
--
ALTER TABLE `consultant_users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contract_tb`
--
ALTER TABLE `contract_tb`
  MODIFY `contract_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `request_tb`
--
ALTER TABLE `request_tb`
  MODIFY `request_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contract_tb`
--
ALTER TABLE `contract_tb`
  ADD CONSTRAINT `contract_tb_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client_users` (`user_id`),
  ADD CONSTRAINT `contract_tb_ibfk_2` FOREIGN KEY (`consultant_id`) REFERENCES `consultant_users` (`user_id`);

--
-- Constraints for table `request_tb`
--
ALTER TABLE `request_tb`
  ADD CONSTRAINT `request_tb_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client_users` (`user_id`),
  ADD CONSTRAINT `request_tb_ibfk_2` FOREIGN KEY (`consultant_id`) REFERENCES `consultant_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
