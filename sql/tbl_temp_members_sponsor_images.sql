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
-- Table structure for table `tbl_temp_members_sponsor_images`
--

CREATE TABLE `tbl_temp_members_sponsor_images` (
  `id` int(11) NOT NULL,
  `member_fk` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_temp_members_sponsor_images`
--

INSERT INTO `tbl_temp_members_sponsor_images` (`id`, `member_fk`, `image_url`) VALUES
(1, 1, 'eb7955190cf18cab3df803e98ce8bb49.jpg'),
(2, 3, 'f84fd7a385e79e2ee58e779fc5ca8def.pdf'),
(3, 4, 'b01c3d30a29d2c834d150dfc3bfb8887.pdf'),
(4, 5, '3b6363378d800e6eb01a41aaa71cf311.pdf'),
(5, 7, 'd7367590069560b6f66e1f2c4d6d65ce.pdf'),
(6, 7, 'a775ee9585e2a40739bba8dcae6d2f5c.pdf'),
(7, 7, 'e2a7c57fb52bdef4896003f0af0650b6.pdf'),
(8, 8, '92db3f41d3468273f6fce82e17c3faf3.pdf'),
(9, 9, '4a82afc4ce35f8567a10a4b86b21e00f.pdf'),
(10, 10, '1e76937c90ffc74727a0a633aa0e730e.pdf'),
(11, 11, 'e11c734fd3dd267f291eff64fc7b01b6.pdf'),
(12, 12, '5402d9d341c947715294c2d8abb5113c.pdf'),
(13, 14, 'd4506139788ef8b5393ca3d4b4b72171.pdf'),
(14, 15, '094356fe17017f47ccae302acb51472d.pdf'),
(15, 16, '2591bb7bc0e97a3b35ebb6e167b29ad1.pdf'),
(16, 17, '158ecad691f7a2601a891ed645ddac26.pdf'),
(17, 18, '0235f3d4f4b7cb02bdda6f01adc6dc06.pdf'),
(18, 19, '20926a4dc49f0b4c8326e105e3fd0913.pdf'),
(19, 20, 'e2c6de1771aa26a8fe487b646bd02283.pdf'),
(20, 22, '0bcc6ba0173268a2abb7cd35251eeaaf.pdf'),
(21, 23, 'e9c4032f90ff5cd4664eee9a6f1a9f6a.pdf'),
(22, 24, 'c0000b36216f3dd391ff6f824cef64dd.pdf'),
(23, 25, 'e8baac1a46c55c53a8a906f65f28267e.pdf'),
(24, 26, '5796fda768e27e261890674d899d490d.pdf'),
(25, 27, 'c8e43855c31d435a122bea671d66ee20.pdf'),
(26, 28, '1bcc1a071d11c07b41846bf226f17c53.pdf'),
(27, 29, '25fbb895b3af13f66cd14ab88d6145de.pdf'),
(28, 31, '7d9d479ba54e4fbbb2bf4343404111f3.pdf'),
(29, 32, 'd0e8ba3f81434c53910445491675cdd5.pdf'),
(30, 33, '10695a5ac1aee7f6b9e697a3f57a9b1a.pdf');
