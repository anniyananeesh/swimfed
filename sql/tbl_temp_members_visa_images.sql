-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 26, 2017 at 05:18 AM
-- Server version: 5.5.42
-- PHP Version: 5.5.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `swimfed_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_members_visa_images`
--

CREATE TABLE `tbl_temp_members_visa_images` (
  `id` int(11) NOT NULL,
  `member_fk` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_temp_members_visa_images`
--

INSERT INTO `tbl_temp_members_visa_images` (`id`, `member_fk`, `image_url`) VALUES
(1, 1, '7d0bb221751fdb5c668a9ab7bd1ece21.jpg'),
(2, 1, '6e85e1e4866ef8d35632001be792214c.png'),
(3, 3, '1afe651f08486e1f66c391a595f35363.pdf'),
(4, 3, 'b2612a58b0fc9607b13cd611913ee514.pdf'),
(5, 4, '980becd31aa12af2da9532a4e2cfb127.pdf'),
(6, 5, '9425324416b5ee0f3ca98709629e2c49.pdf'),
(7, 7, '269670e64f93c6d6628fe4123830fc93.pdf'),
(8, 10, 'eb0cb0939fec48e56381d89d2067db65.pdf'),
(9, 11, 'fbd0ed155922b6fe88524eda02992a5c.pdf'),
(10, 12, 'dfe76c603cb5ffb8d40ed5c7cb5469f8.pdf'),
(11, 13, '120d3dd9b260af442591546d3026b337.pdf'),
(12, 14, '6ff666ef56b1e84ebbe7c3817060808d.pdf'),
(13, 15, 'a716e92d63dd2ad941e0903cd823119d.pdf'),
(14, 16, '6ae905c16b3fc4b2e5a97515a5463af2.pdf'),
(15, 17, 'fe879034388a3e6f1a7bfbe743fd5af5.pdf'),
(16, 18, '9c51af852936bb947283fa131e3ad50a.pdf'),
(17, 19, 'fef1724a7d3cb29db2915b44b4c1397c.pdf'),
(18, 20, '754ca632967f912c9e8717913ede3f13.pdf'),
(19, 22, 'f617a64782620701b9284f0c4f677583.pdf'),
(20, 23, '2dcae3b6cf9943750a7eaaafc7d4d4c8.pdf'),
(21, 24, '125c3ee400e5f08e476b1f862661b441.pdf'),
(22, 25, '7a7f24e21cccacc409c34dbd909333d5.pdf'),
(23, 25, '14e1177f1dda1cb55dba59383826c207.pdf'),
(24, 26, '5bbf17dfdc6d662d1e98c915ae7dfe78.pdf'),
(25, 27, 'b10212523dde903ee0eb0686d396d620.pdf'),
(26, 28, '49f7621ce9419d1d5d6bb237041e3979.pdf'),
(27, 29, 'be3462c88754c16984d059da8ec1dc98.pdf'),
(28, 30, '4072d7a7000b42643cbec3e6b00aac93.pdf'),
(29, 31, '506ae0e03d0267772a861899a13d9020.pdf'),
(30, 32, '4a93294b098a5a653de084e84a35d6f3.pdf'),
(31, 33, 'a0fb7a95f6166a45e76b2129799d361a.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_temp_members_visa_images`
--
ALTER TABLE `tbl_temp_members_visa_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_temp_members_visa_images`
--
ALTER TABLE `tbl_temp_members_visa_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
