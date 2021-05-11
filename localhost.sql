-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.67
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- ฐานข้อมูล: `rscience_systems`
--
CREATE DATABASE `rscience_systems` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rscience_systems`;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_job`
--

CREATE TABLE IF NOT EXISTS `tb_job` (
  `job_id` int(2) NOT NULL auto_increment,
  `job_name` varchar(50) NOT NULL,
  `ref_sector_id` int(2) NOT NULL,
  PRIMARY KEY  (`job_id`),
  KEY `ref_sector_id` (`ref_sector_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- dump ตาราง `tb_job`
--

INSERT INTO `tb_job` (`job_id`, `job_name`, `ref_sector_id`) VALUES
(1, 'งานอำนวยการ1', 1),
(2, 'งานอำนวยการ2', 1),
(3, 'งานวิชาการ1', 2),
(4, 'งานวิชาการ2', 2),
(5, 'งานวิชาการ3', 2),
(6, 'งานท้องฟ้า1', 3),
(7, 'งานท้องฟ้า2', 3),
(8, 'งานอาคาร1', 4),
(9, 'งานอาคาร2', 4),
(10, 'งานประชาสัมพันธ์', 5),
(11, 'งานเครือข่าย', 5),
(12, 'งานเทคโนโลยีสารสนเทศ', 5);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_sector`
--

CREATE TABLE IF NOT EXISTS `tb_sector` (
  `sector_id` int(2) NOT NULL auto_increment,
  `sector_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`sector_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- dump ตาราง `tb_sector`
--

INSERT INTO `tb_sector` (`sector_id`, `sector_name`) VALUES
(1, 'ส่วนอำนวยการ'),
(2, 'ส่วนวิชาการ'),
(3, 'ส่วนท้องฟ้าจำลอง'),
(4, 'ส่วนอาคารสถานที่'),
(5, 'ส่วนส่งเสริมและบริการ');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_email` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `user_password` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `name` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `privilage` int(1) NOT NULL COMMENT 'สิท1admin 2user 3staff',
  `ref_job_id` int(2) NOT NULL,
  `register_date` date NOT NULL,
  `last_login` datetime default NULL,
  `now_login` datetime default NULL,
  PRIMARY KEY  (`user_id`),
  KEY `ref_job_id` (`ref_job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- dump ตาราง `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `user_email`, `user_password`, `name`, `lastname`, `privilage`, `ref_job_id`, `register_date`, `last_login`, `now_login`) VALUES
(1, 'dsfasdf@ss.co', 'c4ca4238a0b923820dcc509a6f75849b', 'sdfasdf', 'asdfasdf', 2, 5, '2021-05-04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'bugcom1986@gmail.com', 'a538d05e6038175decb56e640ee54b4b', 'ว่าที่ร.ต.จารึก', 'เนตยกุล', 1, 12, '2021-05-04', '2021-05-04 13:37:17', '2021-05-04 13:37:59');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_job`
--
ALTER TABLE `tb_job`
  ADD CONSTRAINT `tb_job_ibfk_1` FOREIGN KEY (`ref_sector_id`) REFERENCES `tb_sector` (`sector_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `tb_users_ibfk_1` FOREIGN KEY (`ref_job_id`) REFERENCES `tb_job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;
