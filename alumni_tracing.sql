-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2018 at 05:11 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_tracing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`, `fname`, `mname`, `lname`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Admin', 'Admin', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `alumni_id` int(11) NOT NULL,
  `admin_id` int(2) NOT NULL,
  `alumni_id_number` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `mname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `address_present` varchar(150) NOT NULL,
  `address_permanent` varchar(150) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(200) NOT NULL,
  `civil_status` varchar(15) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `youtube_link` varchar(100) DEFAULT NULL,
  `blog_link` varchar(100) DEFAULT NULL,
  `facebook_url` varchar(100) NOT NULL,
  `twitter_url` varchar(100) NOT NULL,
  `course` varchar(150) NOT NULL,
  `date_graduated` date NOT NULL,
  `employment_status` varchar(15) DEFAULT NULL,
  `employment_workfield` varchar(50) DEFAULT NULL,
  `unemployed_reason` text,
  `past_mname` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`alumni_id`, `admin_id`, `alumni_id_number`, `password`, `fname`, `mname`, `lname`, `address_present`, `address_permanent`, `gender`, `date_of_birth`, `place_of_birth`, `civil_status`, `mobile_number`, `youtube_link`, `blog_link`, `facebook_url`, `twitter_url`, `course`, `date_graduated`, `employment_status`, `employment_workfield`, `unemployed_reason`, `past_mname`) VALUES
(5, 1, '2012-1530-MN', '9a83c3b4e782f24ead0566a8976291ba', 'Vince Christian', 'P', 'Acain', 'Kaloocan City', 'Kaloocan City', 'Female', '1996-05-03', 'Demaala Maternity and Laying', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-01', NULL, NULL, NULL, NULL),
(6, 1, '2012-0266-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Jomard', 'D', 'Benemile', 'N/A', 'N/A', 'Male', '1996-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(15, 1, '2012-0431-MN', 'c30676df7830d5fe4023527dc7d9a71f', 'Dale Francis', 'Y', 'Clementir', 'Iloilo City', 'Iloilo City', 'Male', '1995-07-24', 'IDH-IDC School of Medicine', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(16, 1, '2012-0011-MN', '194295d58bb7fc22b91e717729c462f6', 'Christian', 'B', 'Erlano', 'Iloilo City', 'Iloilo City', 'Male', '1993-06-08', 'WVSU Hospital Jaro Iloilo', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(17, 1, '2012-1162-MN', '1f12cc2ae07f2a3bf1b68fa007df9550', 'Artneil', 'D', 'Fernandez', 'Iloilo City', 'Iloilo City', 'Male', '1993-02-09', 'Arevalo Iloilo', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(18, 1, '2012-0279-MN', 'a7bdb797e2b975d4d9784281606dc126', 'John Francis', 'C', 'Golingay', 'Sara Iloilo', 'Sara Iloilo', 'Male', '1995-09-10', 'Sara District Hospital', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(19, 1, '2012-1565-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Lily Ann', 'M', 'Hablan', 'N/A', 'N/A', 'Female', '1996-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(20, 1, '2012-0387-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Jamela', 'L', 'Hundana', 'N/A', 'N/A', 'Female', '1995-01-01', 'N/A', 'Single', '0000', '', '', 'Jam Hundana', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(21, 1, '2012-0577-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Josette Anne', 'T', 'Landrero', 'N/A', 'N/A', 'Female', '1995-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(22, 1, '2012-0819-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Claudine Mae', 'L', 'Leysa', 'N/A', 'N/A', 'Female', '1995-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(23, 1, '2012-0063-MN', 'b23b14467d5d2726c475332e3192894c', 'Ma. Glorie', 'D', 'Magallanes', 'Leganes Iloilo', 'Leganes Iloilo', 'Female', '1995-10-20', 'Camangay Leganes Iloilo', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(24, 1, '2012-1453', '670b14728ad9902aecba32e22fa4f6bd', 'Robie', 'S', 'Mendez', 'N/A', 'N/A', 'Male', '1995-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(25, 1, '2012-1237-MN', '670b14728ad9902aecba32e22fa4f6bd', 'NiÃ±o', 'S', 'Miravalles', 'N/A', 'N/A', 'Male', '1995-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(26, 1, '2012-1260-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Abejoy', 'V', 'Perez', 'N/A', 'N/A', 'Female', '1995-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(27, 1, '2012-1025-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Norlyn Jean', 'D', 'Pretal', 'N/A', 'N/A', 'Female', '1995-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(28, 1, '2012-0626-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Franz Aldrin', 'P', 'Riconalla', 'N/A', 'N/A', 'Male', '1995-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(29, 1, '2012-0591-MN', 'd768d6cc32122b13783347266ff96a77', 'Realiza', 'D', 'Soratos', 'Quezon City Manila', 'Quezon City Manila', 'Female', '1995-04-04', 'Quezon City General Hospital', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(30, 1, '2012-1002-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Mary Grace', 'E', 'Tupas', 'N/A', 'N/A', 'Female', '1995-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(31, 1, '2012-1329-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Lyrie Ann', 'A', 'Villano', 'N/A', 'N/A', 'Male', '1995-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(32, 1, '2012-0681-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Anthony Jhan', 'B', 'Asuelo', 'N/A', 'N/A', 'Male', '1995-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(33, 1, '2012-0462-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Nina Ricci Marie', 'R', 'Benite', 'N/A', 'N/A', 'Female', '1995-01-01', 'N/A', 'Single', '0000', '', 'https://www.linkedin.com/in/nrmbenite/', '', '', 'Bachelor of Science in Information Technology', '2016-04-02', NULL, NULL, NULL, NULL),
(34, 1, '2012-0246-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Giselle', 'M', 'Cuenca', 'N/A', 'N/A', 'Female', '1995-01-01', 'N/A', 'Single', '0000', '', 'https://www.linkedin.com/in/gisellecuenca/', '', '', 'Bachelor of Science in Information Technology', '2016-04-02', NULL, NULL, NULL, NULL),
(35, 1, '2012-0334-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Sharemhel', 'N/A', 'Decir', 'N/A', 'Sharemhel', 'Female', '1995-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-02', NULL, NULL, NULL, NULL),
(36, 1, '2012-0676-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Red Hexon', 'V', 'Hermogenes', 'N/A', 'N/A', 'Male', '1995-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-02', NULL, NULL, NULL, NULL),
(37, 1, '2012-0773-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Demi Renhz', 'V', 'Jalando-on', 'N/A', 'N/A', 'Female', '1995-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-02', NULL, NULL, NULL, NULL),
(38, 1, '2012-0321-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Michael Jari', 'H', 'Marquez', 'N/A', 'N/A', 'Male', '1995-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-02', NULL, NULL, NULL, NULL),
(39, 1, '2012-0497-MN', '670b14728ad9902aecba32e22fa4f6bd', 'John Rhenn', 'B', 'Noderama', 'N/A', 'N/A', 'Male', '1995-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-02', NULL, NULL, NULL, NULL),
(40, 1, '2012-1087-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Julie Ann', 'C', 'Palawar', 'N/A', 'N/A', 'Female', '1995-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-02', NULL, NULL, NULL, NULL),
(41, 1, '2012-0213-MN', 'cb6b49c5b74c7ac2f14ba6be21842a93', 'Jaimie', 'A', 'Te', 'Jaro Iloilo', 'Jaro Iloilo', 'Female', '1995-08-14', 'Iloilo Mission', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-02', NULL, NULL, NULL, NULL),
(42, 1, '2012-0956-MN', 'bc4c2dba13a59d109150d24330b19d3d', 'Gretchen', 'C', 'Villamor', 'Leon Iloilo', 'Leon Iloilo', 'Female', '1996-03-04', 'Leon Iloilo', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-02', NULL, NULL, NULL, NULL),
(43, 1, '2011-0531-MN', '971268cf64a8008af1861c440b15cc29', 'Jim Ryan', 'C', 'Zulueta', 'Sta. Barbara', 'Sta. Barbara', 'Male', '1994-10-26', 'Sta. Barbara', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-02', NULL, NULL, NULL, NULL),
(44, 1, '2013-1461-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Kevin', 'N/A', 'Alarcon', 'N/A', 'N/A', 'Male', '1994-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(45, 1, '2013-1801-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Francis Ismael', 'M', 'Algert', 'N/A', 'N/A', 'Male', '1994-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(46, 1, '2013-0784-MN', '670b14728ad9902aecba32e22fa4f6bd', 'April Grace', 'B', 'Almerante', 'N/A', 'N/A', 'Female', '1995-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-02', NULL, NULL, NULL, NULL),
(47, 1, '2013-0130-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Alyssa Kaye', 'D', 'Alolor', 'N/A', 'N/A', 'Female', '1994-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2017-04-02', NULL, NULL, NULL, NULL),
(48, 1, '2013-1807-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Ariela Hynna', 'A', 'Amuenda', 'N/A', 'N/A', 'Female', '1991-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2017-04-02', NULL, NULL, NULL, NULL),
(49, 1, '2013-1502-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Renellie', 'D', 'Bajilidad', 'N/A', 'N/A', 'Female', '1994-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2017-04-01', NULL, NULL, NULL, NULL),
(50, 1, '2013-1609-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Juan Paolo', 'D', 'Balasote', 'N/A', 'N/A', 'Male', '1994-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2017-04-02', NULL, NULL, NULL, NULL),
(51, 1, '2013-0694-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Shena Mae', 'B', 'Balibol', 'N/A', 'N/A', 'Female', '1994-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2017-04-02', NULL, NULL, NULL, NULL),
(52, 1, '2013-0155-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Alexa Mae', 'M', 'Borda', 'N/A', 'N/A', 'Female', '1994-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2017-04-02', NULL, NULL, NULL, NULL),
(53, 1, '2013-1517-Mn', '670b14728ad9902aecba32e22fa4f6bd', 'Rino Mark', 'C', 'Catalan', 'N/A', 'N/A', 'Male', '1994-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Information System', '2017-04-02', NULL, NULL, NULL, NULL),
(54, 1, '2013-0211-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Genir John', 'A', 'Crisostomo', 'N/A', 'N/A', 'Male', '1996-01-01', 'N/A', 'Single', '00000', '', '', '', '', 'Bachelor of Science in Information System', '2017-04-02', NULL, NULL, NULL, NULL),
(55, 1, '2013-0107-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Norfariqsha Bte', 'B', 'Ahamad Abdullah', 'N/A', 'N/A', 'Female', '1996-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Computer Science', '2017-04-02', NULL, NULL, NULL, NULL),
(56, 1, '2013-1513-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Pearl Anne Therese', 'P', 'Billiones', 'N/A', 'N/A', 'Female', '1996-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Computer Science', '2017-04-02', NULL, NULL, NULL, NULL),
(57, 1, '2013-1243-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Jazzmine Mae', 'S', 'Mabilog', 'N/A', 'N/A', 'Female', '1996-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Computer Science', '2017-04-02', NULL, NULL, NULL, NULL),
(58, 1, '2013-0227-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Shaunn Marte', 'A', 'Magno', 'N/A', 'N/A', 'Male', '1996-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Computer Science', '2017-04-02', NULL, NULL, NULL, NULL),
(59, 1, '2013-1099-MN', '670b14728ad9902aecba32e22fa4f6bd', 'Shara', 'T', 'Malaga', 'N/A', 'N/A', 'Female', '1996-01-01', 'N/A', 'Single', '0000', '', '', '', '', 'Bachelor of Science in Computer Science', '2017-04-02', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alumni_email_add`
--

CREATE TABLE `alumni_email_add` (
  `email_id` int(11) NOT NULL,
  `alumni_id` int(11) NOT NULL,
  `email_add` varchar(50) NOT NULL,
  `email_add_status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni_email_add`
--

INSERT INTO `alumni_email_add` (`email_id`, `alumni_id`, `email_add`, `email_add_status`) VALUES
(6, 5, 'vince.christian.alcain@gmail.com', 'active'),
(7, 6, 'jomardbenemile@gmail.com', 'active'),
(8, 15, 'daleclementir21@gmail.com', 'active'),
(9, 16, 'christian.erlano10@gmail.com', 'active'),
(10, 17, 'artneilfernandez@gmail.com', 'active'),
(11, 18, 'golingayfransio@gmail.com', 'active'),
(12, 19, 'hablanlilyann@gmail.com', 'active'),
(13, 20, 'jamelahundana@gmail.com', 'active'),
(14, 21, 'josetteanne28@gmail.com', 'active'),
(15, 22, 'claudinemaeleysa@gmail.com', 'active'),
(16, 23, 'kyungji17@gmail.com', 'active'),
(17, 24, 'robiemendez2@gmail.com', 'active'),
(18, 25, 'myungisdead@gmail.com', 'active'),
(19, 26, 'abejoyperez@gmail.com', 'active'),
(20, 27, 'norlynjeandp@gmail.com', 'active'),
(21, 28, 'franzaldrinriconalla@gmail.com', 'active'),
(22, 29, 'realiza.soratos@yahoo.com', 'active'),
(23, 30, 'meyrtupas@gmail.com', 'active'),
(24, 31, 'paulettealejandro@gmail.com', 'active'),
(25, 32, 'N/A', 'active'),
(26, 34, 'vince.calingo@gmail.com', 'active'),
(27, 35, 'sharemheldecir@gmail.com', 'active'),
(28, 37, 'renhzimed@yahoo.com', 'active'),
(29, 38, 'jarimarquez1@gmail.com', 'active'),
(30, 39, 'johnrhenn614@gmail.com', 'active'),
(31, 40, 'annepalawar@gmail.com', 'active'),
(32, 41, 'j_te@wvsu.edu.ph', 'active'),
(33, 42, 'gretchcabo@gmail.com', 'active'),
(34, 43, 'jimryanzulueta@gmail.com', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `alumni_guardians`
--

CREATE TABLE `alumni_guardians` (
  `ag_id` int(11) NOT NULL,
  `alumni_id` int(11) NOT NULL,
  `ag_fname` varchar(30) NOT NULL,
  `ag_mname` varchar(25) NOT NULL,
  `ag_lname` varchar(25) DEFAULT NULL,
  `ag_bday` date DEFAULT NULL,
  `ag_gender` varchar(6) NOT NULL,
  `ag_relationship` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni_guardians`
--

INSERT INTO `alumni_guardians` (`ag_id`, `alumni_id`, `ag_fname`, `ag_mname`, `ag_lname`, `ag_bday`, `ag_gender`, `ag_relationship`) VALUES
(4, 5, 'Haydee', 'P', 'Acain', '2001-01-01', 'Female', 'Mother'),
(5, 5, 'Federico', 'N', 'Acain', '2001-01-01', 'Male', 'Father'),
(6, 6, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Female', 'Mother'),
(7, 6, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Male', 'Father'),
(8, 15, 'Magdalena', 'Y', 'Clementir', '2001-01-01', 'Female', 'Mother'),
(9, 15, 'Manuel', 'E', 'Clementir', '2001-01-01', 'Male', 'Father'),
(10, 16, 'Fatima', 'B', 'Erlano', '2001-01-01', 'Female', 'Mother'),
(11, 16, 'Roger', 'T', 'Erlano', '2001-01-01', 'Male', 'Father'),
(12, 17, 'Dalyn', 'D', 'Fernandez', '2001-01-01', 'Female', 'Mother'),
(13, 18, 'Annabell', 'C', 'Golingay', '2001-01-01', 'Female', 'Mother'),
(14, 18, 'Ariel', 'A', 'Golingay', '2001-01-01', 'Male', 'Father'),
(15, 19, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Female', 'Mother'),
(16, 19, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Male', 'Father'),
(17, 20, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Female', 'Mother'),
(18, 20, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Male', 'Father'),
(19, 21, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Female', 'Mother'),
(20, 21, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Male', 'Father'),
(21, 22, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Female', 'Mother'),
(22, 22, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Male', 'Father'),
(23, 23, 'Gloria', 'D', 'Magallanes', '2001-01-01', 'Female', 'Mother'),
(24, 23, 'Richard', 'G', 'Magallanes', '2001-01-01', 'Male', 'Father'),
(25, 24, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Female', 'Mother'),
(26, 24, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Male', 'Father'),
(27, 25, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Female', 'Mother'),
(28, 25, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Male', 'Father'),
(29, 26, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Female', 'Mother'),
(30, 26, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Male', 'Father'),
(31, 27, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Female', 'Mother'),
(32, 27, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Male', 'Father'),
(33, 28, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Female', 'Mother'),
(34, 28, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Male', 'Father'),
(35, 29, 'Daisy', 'D', 'Soratos', '2001-01-01', 'Female', 'Mother'),
(36, 29, 'Allan', 'S', 'Soratos', '2001-01-01', 'Male', 'Father'),
(37, 30, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Female', 'Mother'),
(38, 30, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Male', 'Father'),
(39, 31, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Female', 'Mother'),
(40, 31, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Male', 'Father'),
(41, 32, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Female', 'Mother'),
(42, 32, 'N/A', 'N/A', 'N/A', '2001-01-01', 'Male', 'Father'),
(43, 41, 'Myralee', 'A', 'Te', '2001-01-01', 'Female', 'Mother'),
(44, 41, 'Jaimie', 'B', 'Te', '2001-01-01', 'Male', 'Father'),
(45, 42, 'Juditha', 'C', 'Cabo', '2001-01-01', 'Female', 'Mother'),
(46, 42, 'Greg', 'O', 'Villamor', '2001-01-01', 'Male', 'Father');

-- --------------------------------------------------------

--
-- Table structure for table `alumni_skills`
--

CREATE TABLE `alumni_skills` (
  `as_id` int(11) NOT NULL,
  `alumni_id` int(11) NOT NULL,
  `datetime_last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni_skills`
--

INSERT INTO `alumni_skills` (`as_id`, `alumni_id`, `datetime_last_updated`) VALUES
(5, 5, '2018-11-26 20:22:55'),
(6, 6, '2018-11-26 20:27:43'),
(7, 15, '2018-11-26 20:47:42'),
(8, 16, '2018-11-26 20:50:54'),
(9, 17, '2018-11-26 20:56:46'),
(10, 18, '2018-11-26 21:01:20'),
(11, 19, '2018-11-26 21:05:36'),
(12, 20, '2018-11-26 21:12:40'),
(13, 21, '2018-11-26 21:15:51'),
(14, 22, '2018-11-26 21:18:13'),
(15, 23, '2018-11-26 21:22:05'),
(16, 24, '2018-11-26 21:24:02'),
(17, 25, '2018-11-26 21:25:57'),
(18, 26, '2018-11-26 21:28:30'),
(19, 27, '2018-11-26 21:30:39'),
(20, 28, '2018-11-26 21:32:37'),
(21, 29, '2018-11-26 21:34:54'),
(22, 30, '2018-11-26 21:37:10'),
(23, 31, '2018-11-26 21:40:06'),
(24, 32, '2018-11-26 21:42:03'),
(25, 33, '2018-11-26 21:44:54'),
(26, 34, '2018-11-26 21:47:36'),
(27, 35, '2018-11-26 21:50:32'),
(28, 36, '2018-11-26 21:52:06'),
(29, 37, '2018-11-26 21:53:37'),
(30, 38, '2018-11-26 21:55:16'),
(31, 39, '2018-11-26 21:57:01'),
(32, 40, '2018-11-26 21:58:30'),
(33, 41, '2018-11-26 22:01:30'),
(34, 42, '2018-11-26 22:03:49'),
(35, 43, '2018-11-26 22:05:54'),
(36, 44, '2018-11-26 23:23:35'),
(37, 45, '2018-11-26 23:30:05'),
(38, 46, '2018-11-26 23:31:28'),
(39, 47, '2018-11-26 23:32:33'),
(40, 48, '2018-11-26 23:33:42'),
(41, 49, '2018-11-26 23:34:57'),
(42, 50, '2018-11-26 23:35:51'),
(43, 51, '2018-11-26 23:36:55'),
(44, 52, '2018-11-26 23:37:47'),
(45, 53, '2018-11-26 23:38:49'),
(46, 54, '2018-11-26 23:39:55'),
(47, 55, '2018-11-26 23:42:51'),
(48, 56, '2018-11-26 23:44:06'),
(49, 57, '2018-11-26 23:44:58'),
(50, 58, '2018-11-26 23:45:45'),
(51, 59, '2018-11-26 23:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `alumni_sq_answers`
--

CREATE TABLE `alumni_sq_answers` (
  `answer_id` int(11) NOT NULL,
  `alumni_id` int(11) NOT NULL,
  `sq_id` int(2) NOT NULL,
  `alumni_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni_sq_answers`
--

INSERT INTO `alumni_sq_answers` (`answer_id`, `alumni_id`, `sq_id`, `alumni_answer`) VALUES
(9, 5, 1, 'a'),
(10, 5, 2, 'a'),
(11, 5, 3, 'a'),
(12, 5, 4, 'a'),
(13, 5, 5, 'a'),
(14, 6, 1, 'aa'),
(15, 6, 2, 'a'),
(16, 6, 3, 'a'),
(17, 6, 4, 'a'),
(18, 6, 5, 'a'),
(19, 15, 1, 'a'),
(20, 15, 2, 'a'),
(21, 15, 3, 'a'),
(22, 15, 4, 'a'),
(23, 15, 5, 'a'),
(24, 16, 1, 'a'),
(25, 16, 2, 'a'),
(26, 16, 3, 'a'),
(27, 16, 4, 'a'),
(28, 16, 5, 'a'),
(29, 17, 1, 'a'),
(30, 17, 2, 'a'),
(31, 17, 3, 'a'),
(32, 17, 4, 'a'),
(33, 17, 5, 'a'),
(34, 19, 1, 'a'),
(35, 19, 2, 'a'),
(36, 19, 3, 'a'),
(37, 19, 4, 'a'),
(38, 19, 5, 'a'),
(39, 20, 1, 'a'),
(40, 20, 2, 'a'),
(41, 20, 3, 'a'),
(42, 20, 4, 'a'),
(43, 20, 5, 'a'),
(44, 21, 1, 'a'),
(45, 21, 2, 'a'),
(46, 21, 3, 'a'),
(47, 21, 4, 'a'),
(48, 21, 5, 'a'),
(49, 22, 1, 'a'),
(50, 22, 2, 'a'),
(51, 22, 3, 'a'),
(52, 22, 4, 'a'),
(53, 22, 5, 'a'),
(54, 23, 1, 'a'),
(55, 23, 2, 'a'),
(56, 23, 3, 'a'),
(57, 23, 4, 'a'),
(58, 23, 5, 'a'),
(59, 25, 1, 'a'),
(60, 25, 2, 'a'),
(61, 25, 3, 'a'),
(62, 25, 4, 'a'),
(63, 25, 5, 'a'),
(64, 26, 1, 'a'),
(65, 26, 2, 'a'),
(66, 26, 3, 'a'),
(67, 26, 4, 'a'),
(68, 26, 5, 'a'),
(69, 27, 1, 'a'),
(70, 27, 2, 'a'),
(71, 27, 3, 'a'),
(72, 27, 4, 'a'),
(73, 27, 5, 'a'),
(74, 28, 1, 'a'),
(75, 28, 2, 'a'),
(76, 28, 3, 'a'),
(77, 28, 4, 'a'),
(78, 28, 5, 'a'),
(79, 29, 1, 'a'),
(80, 29, 2, 'a'),
(81, 29, 3, 'a'),
(82, 29, 4, 'a'),
(83, 29, 5, 'a'),
(84, 30, 1, 'a'),
(85, 30, 2, 'a'),
(86, 30, 3, 'a'),
(87, 30, 4, 'a'),
(88, 30, 5, 'a'),
(89, 31, 1, 'a'),
(90, 31, 2, 'a'),
(91, 31, 3, 'a'),
(92, 31, 4, 'a'),
(93, 31, 5, 'a'),
(94, 33, 2, 'a'),
(95, 33, 3, 'a'),
(96, 33, 4, 'a'),
(97, 33, 5, 'a'),
(98, 34, 1, 'a'),
(99, 34, 2, 'a'),
(100, 34, 3, 'a'),
(101, 34, 4, 'a'),
(102, 34, 5, 'a'),
(103, 35, 1, 'a'),
(104, 35, 2, 'a'),
(105, 35, 3, 'a'),
(106, 35, 4, 'a'),
(107, 35, 5, 'a'),
(108, 37, 1, 'a'),
(109, 37, 2, 'a'),
(110, 37, 3, 'a'),
(111, 37, 4, 'a'),
(112, 37, 5, 'a'),
(113, 38, 1, 'a'),
(114, 38, 2, 'a'),
(115, 38, 3, 'a'),
(116, 38, 4, 'a'),
(117, 38, 5, 'a'),
(118, 39, 1, 'a'),
(119, 39, 2, 'a'),
(120, 39, 3, 'a'),
(121, 39, 4, 'a'),
(122, 39, 5, 'a'),
(123, 40, 1, 'a'),
(124, 40, 2, 'a'),
(125, 40, 3, 'a'),
(126, 40, 4, 'a'),
(127, 40, 5, 'a'),
(128, 41, 1, 'a'),
(129, 41, 2, 'a'),
(130, 41, 3, 'a'),
(131, 41, 4, 'a'),
(132, 41, 5, 'a'),
(133, 42, 1, 'a'),
(134, 42, 2, 'a'),
(135, 42, 3, 'a'),
(136, 42, 4, 'a'),
(137, 42, 5, 'a'),
(138, 44, 1, 'a'),
(139, 44, 2, 'a'),
(140, 44, 3, 'a'),
(141, 44, 4, 'a'),
(142, 44, 5, 'a'),
(143, 45, 1, 'a'),
(144, 45, 2, 'a'),
(145, 45, 3, 'a'),
(146, 45, 4, 'a'),
(147, 45, 5, 'a'),
(148, 46, 1, 'a'),
(149, 46, 2, 'a'),
(150, 46, 3, 'a'),
(151, 46, 4, 'a'),
(152, 46, 5, 'a'),
(153, 47, 1, 'a'),
(154, 47, 2, 'a'),
(155, 47, 3, 'a'),
(156, 47, 4, 'a'),
(157, 47, 5, 'a'),
(158, 48, 1, 'a'),
(159, 48, 2, 'a'),
(160, 48, 3, 'aa'),
(161, 48, 4, 'a'),
(162, 48, 5, 'a'),
(163, 55, 1, 'a'),
(164, 55, 2, 'a'),
(165, 55, 3, 'aa'),
(166, 55, 4, 'a'),
(167, 55, 5, 'a'),
(168, 56, 1, 'a'),
(169, 56, 2, 'a'),
(170, 56, 3, 'a'),
(171, 56, 4, 'a'),
(172, 56, 5, 'a'),
(173, 57, 1, 'a'),
(174, 57, 2, 'a'),
(175, 57, 3, 'a'),
(176, 57, 4, 'a'),
(177, 57, 5, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(2) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(4, 'Programming'),
(5, 'Microsoft Packages');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `certificate_id` int(5) NOT NULL,
  `alumni_id` int(5) NOT NULL,
  `skill_id` int(5) NOT NULL,
  `img_url` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(5) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `company_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `company_address`) VALUES
(2, 'IQOR', 'IC');

-- --------------------------------------------------------

--
-- Table structure for table `company_contacts`
--

CREATE TABLE `company_contacts` (
  `cc_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `contact_info` varchar(50) NOT NULL,
  `contact_type` varchar(30) NOT NULL,
  `contact_status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_contacts`
--

INSERT INTO `company_contacts` (`cc_id`, `company_id`, `contact_info`, `contact_type`, `contact_status`) VALUES
(4, 2, 'Nelia', 'contact person', 'active'),
(5, 2, '111111111111', 'telephone number', 'active'),
(6, 2, '1111111111', 'mobile number', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `experienced_fields`
--

CREATE TABLE `experienced_fields` (
  `ef_id` int(5) NOT NULL,
  `we_id` int(5) NOT NULL,
  `skill_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experienced_fields`
--

INSERT INTO `experienced_fields` (`ef_id`, `we_id`, `skill_id`) VALUES
(5, 3, 11),
(6, 3, 16),
(7, 4, 16),
(8, 4, 17),
(9, 4, 15),
(10, 4, 18),
(11, 5, 12),
(12, 5, 13),
(13, 5, 11),
(14, 5, 14),
(15, 6, 12),
(16, 6, 14),
(17, 7, 18),
(18, 7, 16),
(19, 7, 15),
(20, 8, 18),
(21, 8, 16),
(22, 8, 15),
(23, 9, 15),
(24, 9, 16),
(25, 10, 15),
(26, 10, 17),
(27, 10, 16),
(28, 11, 17),
(29, 11, 15),
(30, 12, 12),
(31, 12, 11),
(32, 12, 14),
(33, 12, 13),
(34, 13, 12),
(35, 13, 14),
(36, 13, 13),
(37, 13, 11),
(38, 14, 14),
(39, 14, 16),
(40, 14, 15),
(41, 15, 15),
(42, 16, 15),
(43, 17, 11),
(44, 17, 16),
(45, 17, 15),
(46, 18, 18),
(47, 18, 15),
(48, 19, 14),
(49, 19, 13),
(50, 19, 12),
(51, 19, 11),
(52, 20, 18),
(53, 20, 17),
(54, 20, 16),
(55, 20, 15),
(56, 21, 11),
(57, 21, 13),
(58, 21, 12),
(59, 22, 15),
(60, 23, 16),
(61, 23, 15),
(62, 24, 15),
(63, 25, 15),
(64, 26, 17),
(65, 26, 18),
(66, 26, 16),
(67, 26, 15),
(68, 27, 18),
(69, 27, 14),
(70, 27, 16),
(71, 28, 13),
(72, 28, 11),
(73, 28, 17),
(74, 28, 15),
(75, 29, 17),
(76, 29, 14),
(77, 29, 12),
(78, 30, 15),
(79, 30, 12),
(80, 31, 11),
(81, 31, 13),
(82, 31, 16),
(83, 32, 12),
(84, 33, 11),
(85, 33, 16),
(86, 33, 12),
(87, 33, 17),
(88, 33, 15),
(89, 33, 18),
(90, 34, 13),
(91, 34, 17),
(92, 34, 14);

-- --------------------------------------------------------

--
-- Table structure for table `more_educ_bgs`
--

CREATE TABLE `more_educ_bgs` (
  `eb_id` int(11) NOT NULL,
  `alumni_id` int(11) NOT NULL,
  `eb_course` varchar(200) NOT NULL,
  `eb_school` text NOT NULL,
  `eb_date_graduated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `position_id` int(5) NOT NULL,
  `company_id` int(5) NOT NULL,
  `position_name` varchar(100) NOT NULL,
  `position_status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`position_id`, `company_id`, `position_name`, `position_status`) VALUES
(3, 2, 'manager', 'active'),
(4, 2, 'HR', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `position_qualifications`
--

CREATE TABLE `position_qualifications` (
  `pq_id` int(11) NOT NULL,
  `position_id` int(5) NOT NULL,
  `skill_id` int(5) NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position_qualifications`
--

INSERT INTO `position_qualifications` (`pq_id`, `position_id`, `skill_id`, `rating`) VALUES
(5, 3, 14, 5),
(6, 3, 13, 1),
(7, 3, 18, 10),
(8, 4, 16, 8);

-- --------------------------------------------------------

--
-- Table structure for table `previous_addresses`
--

CREATE TABLE `previous_addresses` (
  `pa_id` int(11) NOT NULL,
  `alumni_id` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `security_questions`
--

CREATE TABLE `security_questions` (
  `sq_id` int(2) NOT NULL,
  `security_question` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security_questions`
--

INSERT INTO `security_questions` (`sq_id`, `security_question`) VALUES
(1, 'What\'s your father\'s Middle Name?'),
(2, 'What\'s your mother\'s Maiden Name?'),
(3, 'What was your favorite place to visit as a child?'),
(4, 'In what city were you born?'),
(5, 'What highschool did you graduated?');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(5) NOT NULL,
  `category_id` int(2) NOT NULL,
  `skill_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `category_id`, `skill_name`) VALUES
(11, 4, 'C++'),
(12, 4, 'C#'),
(13, 4, 'Java'),
(14, 4, 'javascript'),
(15, 5, 'Word'),
(16, 5, 'Excel'),
(17, 5, 'Access'),
(18, 5, 'PowerPoint');

-- --------------------------------------------------------

--
-- Table structure for table `skills_rating`
--

CREATE TABLE `skills_rating` (
  `sr_id` int(11) NOT NULL,
  `as_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `verification_codes`
--

CREATE TABLE `verification_codes` (
  `vc_id` int(11) NOT NULL,
  `alumni_id` int(11) NOT NULL,
  `verification_code` varchar(5) NOT NULL,
  `datetime_generated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vc_status` varchar(20) NOT NULL DEFAULT 'active',
  `datetime_used` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `work_experiences`
--

CREATE TABLE `work_experiences` (
  `we_id` int(5) NOT NULL,
  `alumni_id` int(5) NOT NULL,
  `company_name` varchar(200) DEFAULT NULL,
  `position_level` varchar(15) DEFAULT NULL,
  `position_name` varchar(150) NOT NULL,
  `we_date_start` date NOT NULL,
  `we_date_end` date DEFAULT NULL,
  `is_it_related` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_experiences`
--

INSERT INTO `work_experiences` (`we_id`, `alumni_id`, `company_name`, `position_level`, `position_name`, `we_date_start`, `we_date_end`, `is_it_related`) VALUES
(3, 5, 'Reed Elsevier', 'Lower', 'Content Operations Specialist', '2014-10-30', NULL, 1),
(4, 6, 'Hinduja Global Solutions', 'Lower', 'Call Center Agent', '2016-04-27', NULL, 1),
(5, 15, 'Paramount', 'Lower', 'CCTV Operator Technician', '2016-09-26', NULL, 1),
(6, 16, 'Puregold Incorporated', 'Lower', 'Technical Support Staff', '2016-05-01', NULL, 1),
(7, 17, 'Startek Iloilo', 'Lower', 'Engagement Specialist', '2016-05-10', NULL, 1),
(8, 19, 'IXL Solutions Philippines', 'Lower', 'Customer Service Representative', '2012-10-23', NULL, 1),
(9, 20, 'Callbox', 'Lower', 'SEO Strategist Home-Based', '2017-09-27', NULL, 1),
(10, 21, 'MOLO', 'Lower', 'HR Assistant', '2016-05-17', NULL, 1),
(11, 22, 'IXL Solutions', 'Lower', 'Customer Service Representative', '2016-05-05', NULL, 1),
(12, 23, 'Toyota Iloilo', 'Lower', 'System Operator', '2016-07-04', NULL, 1),
(13, 25, 'Lifebank Foundation', 'Lower', 'MIS Assistant', '2016-07-04', NULL, 1),
(14, 26, 'Marine Environment', 'Lower', 'Admin Assistant (Contractual)', '2016-05-01', NULL, 1),
(15, 27, 'NBI Bacolod', 'Lower', 'Data Encoder (Volunteer)', '2016-06-03', NULL, 1),
(16, 28, 'Lifebank Foundation', 'Lower', 'Assistant (Contractual)', '2016-07-04', NULL, 0),
(17, 29, 'Strategic Advance Marketing', 'Middle', 'Counter Sales Manager', '2011-04-15', NULL, 1),
(18, 30, 'MOD Philippines', 'Lower', 'Proctor', '2016-06-01', NULL, 0),
(19, 33, 'Solutions Resource', 'Middle', 'Software Development Engineer Trainee', '2016-09-01', '2017-03-01', 1),
(20, 34, 'Reed Elsevier', 'Lower', 'Content Operations Specialist', '2016-06-01', NULL, 1),
(21, 35, 'Capitol Iloilo', 'Lower', 'IT Personel', '2016-07-01', NULL, 1),
(22, 38, 'Reed Elsevier', 'Lower', 'Content Editor', '2018-01-01', NULL, 1),
(23, 39, 'KIA Motors', 'Lower', 'Sales Consultant', '2016-11-01', NULL, 0),
(24, 40, 'LULA Films', 'Lower', 'Post Production Editor', '2016-04-18', NULL, 1),
(25, 41, 'Reed Elsevier', 'Lower', 'Content Editor', '2015-04-01', NULL, 1),
(26, 42, 'SCTS', 'Lower', 'ICT Teacher', '2016-06-01', NULL, 1),
(27, 44, 'IT BPM', 'Middle', 'Systems Consultant', '2018-06-06', NULL, 1),
(28, 45, 'Google', 'Lower', 'Graphic Artist', '2017-12-01', NULL, 1),
(29, 46, 'Facebook', 'Middle', 'Operations Manager', '2018-10-15', NULL, 1),
(30, 47, 'WVSU Don Benito', 'Middle', 'HR Maneger', '2018-02-01', NULL, 1),
(31, 48, 'ISAT', 'Lower', 'Senior System Analyst', '2018-12-31', NULL, 1),
(32, 55, 'Showtime', 'Lower', 'Dancer', '2017-12-08', NULL, 1),
(33, 56, 'GTBI', 'Lower', 'Robot Specialist', '2017-02-09', NULL, 1),
(34, 57, NULL, NULL, 'Graphic Artist (Free Lance)', '2017-02-09', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`alumni_id`),
  ADD UNIQUE KEY `alumni_id_number` (`alumni_id_number`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `alumni_email_add`
--
ALTER TABLE `alumni_email_add`
  ADD PRIMARY KEY (`email_id`),
  ADD KEY `alumni_id` (`alumni_id`);

--
-- Indexes for table `alumni_guardians`
--
ALTER TABLE `alumni_guardians`
  ADD PRIMARY KEY (`ag_id`),
  ADD KEY `alumni_id` (`alumni_id`);

--
-- Indexes for table `alumni_skills`
--
ALTER TABLE `alumni_skills`
  ADD PRIMARY KEY (`as_id`),
  ADD KEY `alumni_id` (`alumni_id`);

--
-- Indexes for table `alumni_sq_answers`
--
ALTER TABLE `alumni_sq_answers`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `alumni_id` (`alumni_id`),
  ADD KEY `sq_id` (`sq_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`certificate_id`),
  ADD KEY `alumni_id` (`alumni_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `company_contacts`
--
ALTER TABLE `company_contacts`
  ADD PRIMARY KEY (`cc_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `experienced_fields`
--
ALTER TABLE `experienced_fields`
  ADD PRIMARY KEY (`ef_id`),
  ADD KEY `we_id` (`we_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indexes for table `more_educ_bgs`
--
ALTER TABLE `more_educ_bgs`
  ADD PRIMARY KEY (`eb_id`),
  ADD KEY `alumni_id` (`alumni_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`position_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `position_qualifications`
--
ALTER TABLE `position_qualifications`
  ADD PRIMARY KEY (`pq_id`),
  ADD KEY `skill_id` (`skill_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `previous_addresses`
--
ALTER TABLE `previous_addresses`
  ADD PRIMARY KEY (`pa_id`),
  ADD KEY `alumni_id` (`alumni_id`);

--
-- Indexes for table `security_questions`
--
ALTER TABLE `security_questions`
  ADD PRIMARY KEY (`sq_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `skills_rating`
--
ALTER TABLE `skills_rating`
  ADD PRIMARY KEY (`sr_id`),
  ADD KEY `skill_id` (`skill_id`),
  ADD KEY `as_id` (`as_id`);

--
-- Indexes for table `verification_codes`
--
ALTER TABLE `verification_codes`
  ADD PRIMARY KEY (`vc_id`);

--
-- Indexes for table `work_experiences`
--
ALTER TABLE `work_experiences`
  ADD PRIMARY KEY (`we_id`),
  ADD KEY `alumni_id` (`alumni_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `alumni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `alumni_email_add`
--
ALTER TABLE `alumni_email_add`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `alumni_guardians`
--
ALTER TABLE `alumni_guardians`
  MODIFY `ag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `alumni_skills`
--
ALTER TABLE `alumni_skills`
  MODIFY `as_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `alumni_sq_answers`
--
ALTER TABLE `alumni_sq_answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `certificate_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_contacts`
--
ALTER TABLE `company_contacts`
  MODIFY `cc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `experienced_fields`
--
ALTER TABLE `experienced_fields`
  MODIFY `ef_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `more_educ_bgs`
--
ALTER TABLE `more_educ_bgs`
  MODIFY `eb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `position_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `position_qualifications`
--
ALTER TABLE `position_qualifications`
  MODIFY `pq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `previous_addresses`
--
ALTER TABLE `previous_addresses`
  MODIFY `pa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `security_questions`
--
ALTER TABLE `security_questions`
  MODIFY `sq_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `skills_rating`
--
ALTER TABLE `skills_rating`
  MODIFY `sr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verification_codes`
--
ALTER TABLE `verification_codes`
  MODIFY `vc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_experiences`
--
ALTER TABLE `work_experiences`
  MODIFY `we_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`),
  ADD CONSTRAINT `alumni_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`);

--
-- Constraints for table `alumni_email_add`
--
ALTER TABLE `alumni_email_add`
  ADD CONSTRAINT `alumni_email_add_ibfk_1` FOREIGN KEY (`alumni_id`) REFERENCES `alumni` (`alumni_id`);

--
-- Constraints for table `alumni_guardians`
--
ALTER TABLE `alumni_guardians`
  ADD CONSTRAINT `alumni_guardians_ibfk_1` FOREIGN KEY (`alumni_id`) REFERENCES `alumni` (`alumni_id`);

--
-- Constraints for table `alumni_skills`
--
ALTER TABLE `alumni_skills`
  ADD CONSTRAINT `alumni_skills_ibfk_1` FOREIGN KEY (`alumni_id`) REFERENCES `alumni` (`alumni_id`);

--
-- Constraints for table `alumni_sq_answers`
--
ALTER TABLE `alumni_sq_answers`
  ADD CONSTRAINT `alumni_sq_answers_ibfk_1` FOREIGN KEY (`alumni_id`) REFERENCES `alumni` (`alumni_id`),
  ADD CONSTRAINT `alumni_sq_answers_ibfk_2` FOREIGN KEY (`sq_id`) REFERENCES `security_questions` (`sq_id`);

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_ibfk_1` FOREIGN KEY (`alumni_id`) REFERENCES `alumni` (`alumni_id`),
  ADD CONSTRAINT `certificates_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`skill_id`);

--
-- Constraints for table `company_contacts`
--
ALTER TABLE `company_contacts`
  ADD CONSTRAINT `company_contacts_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`);

--
-- Constraints for table `experienced_fields`
--
ALTER TABLE `experienced_fields`
  ADD CONSTRAINT `experienced_fields_ibfk_1` FOREIGN KEY (`we_id`) REFERENCES `work_experiences` (`we_id`),
  ADD CONSTRAINT `experienced_fields_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`skill_id`),
  ADD CONSTRAINT `experienced_fields_ibfk_3` FOREIGN KEY (`we_id`) REFERENCES `work_experiences` (`we_id`),
  ADD CONSTRAINT `experienced_fields_ibfk_4` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`skill_id`);

--
-- Constraints for table `more_educ_bgs`
--
ALTER TABLE `more_educ_bgs`
  ADD CONSTRAINT `more_educ_bgs_ibfk_1` FOREIGN KEY (`alumni_id`) REFERENCES `alumni` (`alumni_id`);

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`);

--
-- Constraints for table `position_qualifications`
--
ALTER TABLE `position_qualifications`
  ADD CONSTRAINT `position_qualifications_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`skill_id`),
  ADD CONSTRAINT `position_qualifications_ibfk_3` FOREIGN KEY (`position_id`) REFERENCES `positions` (`position_id`);

--
-- Constraints for table `previous_addresses`
--
ALTER TABLE `previous_addresses`
  ADD CONSTRAINT `previous_addresses_ibfk_1` FOREIGN KEY (`alumni_id`) REFERENCES `alumni` (`alumni_id`),
  ADD CONSTRAINT `previous_addresses_ibfk_2` FOREIGN KEY (`alumni_id`) REFERENCES `alumni` (`alumni_id`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `skills_rating`
--
ALTER TABLE `skills_rating`
  ADD CONSTRAINT `skills_rating_ibfk_1` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`skill_id`),
  ADD CONSTRAINT `skills_rating_ibfk_3` FOREIGN KEY (`as_id`) REFERENCES `alumni_skills` (`as_id`);

--
-- Constraints for table `work_experiences`
--
ALTER TABLE `work_experiences`
  ADD CONSTRAINT `work_experiences_ibfk_1` FOREIGN KEY (`alumni_id`) REFERENCES `alumni` (`alumni_id`),
  ADD CONSTRAINT `work_experiences_ibfk_2` FOREIGN KEY (`alumni_id`) REFERENCES `alumni` (`alumni_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
