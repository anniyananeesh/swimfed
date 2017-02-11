-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 26, 2017 at 05:17 AM
-- Server version: 5.5.42
-- PHP Version: 5.5.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `swimfed_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_members`
--

CREATE TABLE `tbl_temp_members` (
  `id` int(11) NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `city` varchar(255) NOT NULL,
  `emirate` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `club_fk` int(11) NOT NULL,
  `discipline` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `current_status` varchar(255) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `dob` varchar(30) NOT NULL,
  `passport_no` varchar(30) NOT NULL,
  `passport_expiry` varchar(30) DEFAULT NULL,
  `id_card1` varchar(255) DEFAULT NULL,
  `image_club_certificate` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') NOT NULL DEFAULT 'N',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_temp_members`
--

INSERT INTO `tbl_temp_members` (`id`, `image1`, `code`, `first_name`, `last_name`, `father_name`, `gender`, `city`, `emirate`, `country`, `contact_no`, `club_fk`, `discipline`, `note`, `current_status`, `type`, `dob`, `passport_no`, `passport_expiry`, `id_card1`, `image_club_certificate`, `is_active`, `created_on`, `updated_on`) VALUES
(16, '0585038e7ddb383be57feec53d3ffaab.jpg', 'MEM20015', 'ALI', 'GHAILANI', 'JUMAA', 'male', 'abudhabi', 'Abu Dhabi', 'AE', '0505479110', 6, 'Swimming', 'NO', '', 'Athlete', '25/05/2001', 'C95R45998', '11/06/2021', NULL, '21355f55f72396aad0ff8502b843cf6c.pdf', 'Y', '2017-01-24 10:20:57', '2017-01-24 02:55:18'),
(17, 'f213237382bc4c9560a954289eb99bef.jpg', 'MEM20016', 'IBRAHIM', 'ALMARZOOQI', 'KHALEEL', 'male', 'abudhabi', 'Abu Dhabi', 'AE', '0505479110', 6, 'Swimming', 'NO', '', 'Athlete', '28/03/2001', 'YJ4K13285', '29/01/2018', NULL, NULL, 'N', '2017-01-24 10:24:14', '2017-01-24 10:24:14'),
(18, 'aacaedd8b94aa3bc0f73028f9ae90456.jpg', 'MEM20017', 'MOHAMED', 'ALWAHED', 'FAHAD', 'male', 'abudhabi', 'Abu Dhabi', 'AE', '0505479110', 6, 'Swimming', 'NO', '', 'Athlete', '18/12/2001', 'PJ7071868', '16/05/2017', NULL, '3bfefa6b5fbdba38bd6de99fb3c5a258.pdf', 'N', '2017-01-24 10:46:09', '2017-01-24 10:46:09'),
(19, '97cdcb950ad6ff07d497213d2f35ae7a.jpg', 'MEM20018', 'ZAYED', 'ALWAHEDI', 'SALEH', 'male', 'abudhabi', 'Abu Dhabi', 'AE', '0505479110', 6, 'Swimming', 'NO', '', 'Athlete', '25/04/2000', 'K00L85949', '26/05/2020', NULL, 'aa9de3df9c16a7b8a6588be2cafa8230.pdf', 'N', '2017-01-24 11:05:42', '2017-01-24 11:05:42'),
(20, 'af82a2607cc2a4b5b07edc45fc004eef.jpg', 'MEM20019', 'YOUSSEF', 'HASSAN', 'MOHAMED', 'male', 'abudhabi', 'Abu Dhabi', 'EG', '0505479110', 6, 'Swimming', 'NO', '', 'Athlete', '02/12/2006', 'A14895872', '31/03/2015', NULL, 'f52bf0b9aa0e9270df96f75ef76b897c.pdf', 'N', '2017-01-24 11:30:22', '2017-01-24 11:30:22'),
(21, NULL, 'MEM20020', 'MABROUK', 'HAIDARA', 'KHALID', 'male', 'abudhabi', 'Abu Dhabi', 'AE', '0505479110', 6, 'Swimming', 'NO', '', 'Athlete', '17/05/2006', 'CZH37963', '13/05/2018', NULL, NULL, 'N', '2017-01-24 11:35:17', '2017-01-24 11:35:17'),
(22, '7e3016800ac5ac4de84c07d876a0cd46.jpg', 'MEM20021', 'SEIFALLA', 'IBRAHIM', 'khaled', 'male', 'abudhabi', 'Abu Dhabi', 'EG', '0505479110', 6, 'Swimming', 'NO', '', 'Athlete', '05/01/1998', 'A1618220', '08/08/2022', NULL, '7ddde11b6c2862a6ccd062558fe9bf75.pdf', 'N', '2017-01-24 11:41:02', '2017-01-24 11:41:02'),
(23, 'd5b5c2c63ee5edb43f0409c1378e37f8.jpg', 'MEM20022', 'ADHAM', 'IBRAHIM', 'KHALID', 'male', 'abudhabi', 'Abu Dhabi', 'EG', '0505479110', 6, 'Swimming', 'NO', '', 'Athlete', '07/12/1999', 'A15841751', '24/07/2022', 'IMG-dc559f322da2d29.png', 'f9b50a9d2874ae373f26cf265d076da1.pdf', 'Y', '2017-01-24 11:43:29', '2017-01-24 11:43:29'),
(24, '8a3051ed3c5e8f40cb9ee247308c2f7b.jpg', 'MEM20023', 'ABDULLA', 'JAMAL', 'KHALED', 'male', 'abudhabi', 'Abu Dhabi', 'BH', '0505479110', 6, 'Swimming', 'NO', '', 'Athlete', '06/10/2003', '2430283', '26/08/2019', NULL, 'b27ea4ad54da5fdaae65d26419e2e1f7.pdf', 'N', '2017-01-24 11:54:26', '2017-01-24 11:54:26'),
(25, '5b9b42385b916011da13e3be21992718.jpg', 'MEM20024', 'HAMDAN', 'BINHAIDARA', 'MOHAMED', 'male', 'abudhabi', 'Abu Dhabi', 'AE', '0505479110', 6, 'Swimming', 'NO', '', 'Athlete', '11/08/2002', 'RZZ269653', '20/01/2019', NULL, NULL, 'N', '2017-01-24 05:26:26', '2017-01-24 05:26:26'),
(26, '4f3b85914e0c88750518865478ff77b9.jpg', 'MEM20025', 'MOHAMED', 'ALRASHDI', 'RASHED', 'male', 'abudhabi', 'Abu Dhabi', 'AE', '0505479110', 6, 'Swimming', 'NO', '', 'Athlete', '01/01/2002', 'ZZ4006449', '13/05/2019', NULL, '0a277509dbc7986ac659f8ea8c30c6bc.pdf', 'N', '2017-01-24 05:32:42', '2017-01-24 05:32:42'),
(27, 'dce19240472b3372e7d09bb40515b36f.jpg', 'MEM20026', 'SALEM', 'BINHAIDARA', 'ABDULLA', 'male', 'abudhabi', 'Abu Dhabi', 'AE', '0505479110', 6, 'Swimming', 'NO', '', 'Athlete', '09/08/2002', 'FRL837246', '20/05/2019', NULL, '4471a069d12daa46deb31edfc5176fd0.pdf', 'N', '2017-01-24 05:44:01', '2017-01-24 05:44:01'),
(28, 'ec4eecf27a87d5751765fa24185fb294.jpg', 'MEM20027', 'HAMAD', 'BINHAIDARA', 'MOHAMED', 'male', 'abudhabi', 'Abu Dhabi', 'AE', '0505479110', 6, 'Swimming', 'NO', '', 'Athlete', '21/08/2003', 'LLJY97615', '15/05/2019', NULL, '12818cd5b86bab5c5407a6e4a73dfa09.pdf', 'N', '2017-01-24 05:47:37', '2017-01-24 05:47:37'),
(29, 'dea82733d7d97404bb63c0d0bbbad5f3.jpg', 'MEM20028', 'AHMED', 'ALRASHDI', 'RASHED', 'male', 'abudhabi', 'Abu Dhabi', 'AE', '0505479110', 6, 'Swimming', 'NO', '', 'Athlete', '25/06/2003', 'L18H42305', '13/05/2019', NULL, '880c0066de5441fb1ede93bf2756fdf9.pdf', 'N', '2017-01-24 05:50:29', '2017-01-24 05:50:29'),
(30, '37004293594b3e93caaf8283a32dbb6f.jpg', 'MEM20029', 'AHMED', 'ALMARZOOQI', 'KHALEEL', 'male', 'abudhabi', 'Abu Dhabi', 'AE', '0505479110', 6, 'Swimming', 'NO', '', 'Athlete', '31/07/2003', 'PFC127812', '15/02/2019', NULL, '444e2bd680a9c4d04f32d2c3173edcff.pdf', 'N', '2017-01-24 05:56:14', '2017-01-24 05:56:14'),
(31, 'cc85f587fb9bf1381ad17ac38a7157ae.jpg', 'MEM20030', 'YOUSSEF', 'SUHIL', 'MOHAMED OSAMA', 'male', 'abudhabi', 'Abu Dhabi', 'SY', '0505479110', 6, 'Swimming', 'NO', '', 'Athlete', '31/01/2002', '004694182', '08/06/2015', NULL, 'ad099829b0b11a894524bbe9552eb32e.pdf', 'N', '2017-01-24 06:03:37', '2017-01-24 06:03:37'),
(32, 'bb021785c768fe09f2e02c757ffa45fe.jpg', 'MEM20031', 'SAEED', 'BINHAIDARA', 'KHALID', 'male', 'abudhabi', 'Abu Dhabi', 'AE', '0505479110', 6, 'Swimming', 'NO', '', 'Athlete', '18/05/2005', 'CRYH39499', '23/07/2021', NULL, 'd7b541ef69f1fca58f78fe1157bd105b.pdf', 'N', '2017-01-24 06:14:05', '2017-01-24 06:14:05'),
(33, 'a92f5de47d0fd6f8478516ae9606094f.JPG', 'MEM20032', 'ZAYED', 'BINHAIDARA', 'ABDULLA', 'male', 'abudhabi', 'Abu Dhabi', 'AE', '0505479110', 6, 'Swimming', 'NO', '', 'Athlete', '17/04/2005', 'R36886610', '141/07/2020', NULL, '53bdf7bcdf8b541a747f9f8049db5cf2.pdf', 'N', '2017-01-24 06:15:57', '2017-01-24 06:15:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_temp_members`
--
ALTER TABLE `tbl_temp_members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_temp_members`
--
ALTER TABLE `tbl_temp_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
