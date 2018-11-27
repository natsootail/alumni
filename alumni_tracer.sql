-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2018 at 01:16 PM
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
-- Database: `alumni_tracer`
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
  `civil_status` varchar(15) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
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

INSERT INTO `alumni` (`alumni_id`, `admin_id`, `alumni_id_number`, `password`, `fname`, `mname`, `lname`, `address_present`, `address_permanent`, `gender`, `date_of_birth`, `civil_status`, `email_address`, `mobile_number`, `facebook_url`, `twitter_url`, `course`, `date_graduated`, `employment_status`, `employment_workfield`, `unemployed_reason`, `past_mname`) VALUES
(2, 1, '2012-0599-MN', '3c738c1c4b0227abc19b8560680f0f53', 'Remus Nicolas', 'C.', 'Alfajardo', 'Leon, Iloilo', 'Leon, Iloilo', 'Male', '1996-08-02', 'Single', 'remawesome156@gmail.com', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', NULL, NULL, NULL, NULL),
(33, 1, '2015-0001-MN', '827ccb0eea8a706c4c34a16891f84e7b', 'f', 'g', 'd', 'f', 'f', 'Female', '1996-04-06', 'Single', 'g@gmail.com', '11111111111', '', '', 'Bachelor of Science in Information System', '2016-04-04', 'Unemployed', NULL, NULL, NULL),
(36, 1, '2012-1530-MN', '6dd098c4660a46cea20253600888feab', 'Vince Christian', 'P.', 'Acain', 'Lapuz, Iloilo City', 'Lapuz, Iloilo City', 'Male', '1996-05-31', 'Single', 'vince.christian.alcain@gmail.com', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', 'Employed', NULL, NULL, NULL),
(37, 1, '2012-0712-MN', '591e301a2bd014f700b8cd9cfaa80b8f', 'Anne Francine', 'E.', 'Almiranes', 'San Miguel', 'San Miguel', 'Female', '1995-07-14', 'Single', 'afalmiranes14@gmail.com', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', NULL, NULL, NULL, NULL),
(38, 1, '2012-0340-MN', '6ab0c7d522885d4b5d7a9a49708bdefe', 'Edralin Joy', 'A.', 'Apurado', 'Lapaz, Iloilo City', 'Lapaz, Iloilo City', 'Female', '1995-02-07', 'Single', 'edralinjoyapurado@gmail.com', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', NULL, NULL, NULL, NULL),
(39, 1, '2012-0837-MN', 'a5cab9c36544ba1652ebaf860d2ed187', 'Loverenz', 'L.', 'Ardalez', 'lapuz, Iloilo City', 'lapuz, Iloilo City', 'Female', '1995-12-30', 'Single', 'lalab.lacsi@gmail.com', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', NULL, NULL, NULL, NULL),
(40, 1, '2012-0766-MN', 'e3e8b4a227bbef7d84573b2635f799b4', 'Liezel Grace', 'P.', 'Balano', 'Molo, Iloilo City', 'Molo, Iloilo City', 'Female', '1995-12-11', 'Single', 'liezelgracebalano@gmail.com', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', NULL, NULL, NULL, NULL),
(41, 1, '2012-0266-MN', '655cc01ef10df5267b9e3baf7850bb24', 'Jomard', 'D.', 'Benemile', 'Tanza', 'Tanza', 'Male', '1995-06-12', 'Single', 'jomardbenemile@gmail.com', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', NULL, NULL, NULL, NULL),
(42, 1, '2012-1298-MN', '2f5040fb9bc65bdef9df47250fdccfbe', 'Renemae', 'A.', 'Cabacas', 'Sara, Iloilo', 'Sara, Iloilo', 'Female', '1996-03-16', 'Single', 'camerer@yahoo.com', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', NULL, NULL, NULL, NULL),
(43, 1, '2012-0675-MN', 'a5cab9c36544ba1652ebaf860d2ed187', 'Helton', 'V.', 'Castante', 'Cabatuan, Iloilo', 'Cabatuan, Iloilo', 'Male', '1995-12-30', 'Single', 'heltoncastante@gmail.com', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', NULL, NULL, NULL, NULL),
(44, 1, '2015-0002-MN', '827ccb0eea8a706c4c34a16891f84e7b', 'vr', 'r', 'd', 'b', 'r', 'Male', '1996-04-13', 'Single', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', 'Unemployed', NULL, NULL, NULL),
(45, 1, '2015-0005-MN', '827ccb0eea8a706c4c34a16891f84e7b', 'Nelia', 'A.', 'Nueva', 'Lapaz, Iloilo City', 'Lapaz, Iloilo City', 'Female', '1996-11-01', 'Single', '', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', 'Unemployed', NULL, NULL, NULL),
(46, 1, '2012-0819-MN', '531f03c756d874592e7b239f8f662da5', 'Claudine Mae', 'L.', 'Leysa', 'Lambunao, Iloilo', 'Lambunao, Iloilo', 'Female', '1995-06-26', 'Single', 'claudinemaeleysa@gmail.com', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', NULL, NULL, NULL, NULL),
(47, 1, '2012-0377-MN', 'fcf525635d4eb8aa90f38c47257d74d1', 'Kenn Bryan', 'D.', 'Lipura', 'Capiz', 'Capiz', 'Male', '1995-03-06', 'Single', 'kennbryan6@gmail.com', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', NULL, NULL, NULL, NULL),
(48, 1, '2012-0063-MN', 'b23b14467d5d2726c475332e3192894c', 'Ma. Glorie', 'D.', 'Magallanes', 'Leganes, Iloilo', 'Leganes, Iloilo', 'Female', '1995-10-30', 'Single', 'kyungji17@gmail.com', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', NULL, NULL, NULL, NULL),
(49, 1, '2012-1453-MN', '5097fb357c7720c1cccd6af479f66d60', 'Robie', 'S.', 'Mendez', 'Sta. Barbara, Iloilo', 'Sta. Barbara, Iloilo', 'Male', '1995-01-16', 'Single', 'robiemendez2@gmail.com', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', NULL, NULL, NULL, NULL),
(50, 1, '2012-1237-MN', 'b23b14467d5d2726c475332e3192894c', 'NiÃ±o', 'S.', 'Miravalles', 'Manduriao, Iloilo', 'Manduriao, Iloilo', 'Male', '1995-10-30', 'Single', 'myungisdead@gmail.com', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', NULL, NULL, NULL, NULL),
(51, 1, '2012-0451-MN', '02083b825be60fb1d52405ed933b3999', 'Rajane', 'O.', 'Mohan', 'Rizal Pala-Pala Zone 1', 'Rizal Pala-Pala Zone 1', 'Female', '1995-03-19', 'Single', 'rojanemohan3@gmail.com', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', NULL, NULL, NULL, NULL),
(52, 1, '2012-1290-MN', '378a96202c444ea2e334762e507c28dd', 'Matrose', 'G.', 'Naragdao', 'Molo, Iloilo', 'Molo, Iloilo', 'Female', '1995-03-01', 'Single', 'mattycatilo@gmail.com', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', NULL, NULL, NULL, NULL),
(53, 1, '2012-1303-MN', '646336192abf5383cc42d9b4a564cf8b', 'Shielamie', 'P.', 'Ombrero', 'Jaro, Iloilo City', 'Jaro, Iloilo City', 'Female', '1995-11-29', 'Single', 'oshielamie@yahoo.com', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', NULL, NULL, NULL, NULL),
(54, 1, '2012-0730-MN', '1f9c058e6d50273961754c3d8a9881a4', 'Dafee', 'C.', 'OredeÃ±a', 'Alimodian, Iloilo', 'Alimodian, Iloilo', 'Male', '1996-02-24', 'Single', 'onedead@gmail.com', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', NULL, NULL, NULL, NULL),
(55, 1, '2012-1485-MN', '93b941f70be54d7bcb2d3cbb376f28e4', 'Rydston', 'F.', 'Padernal', 'Jaro, Iloilo City', 'Jaro, Iloilo City', 'Male', '1996-02-02', 'Single', 'stonryd@gmail.com', '', '', '', 'Bachelor of Science in Information System', '2016-04-04', NULL, NULL, NULL, NULL),
(56, 1, '2012-1614-MN', '4daefab4a7307f5ab87f746f98e9e7f0', 'Gerarld', 'R.', 'But', 'Patnongon', 'Patnongon', 'Male', '1996-11-29', 'Single', 'karlynx@yahoo.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(57, 1, '2012-0706-MN', '445e0e08a09f0e69a4250fbcbe42ca6f', 'Lydie', 'M.', 'Cabanilla', 'San Miguel', 'San Miguel', 'Female', '1995-04-18', 'Single', 'lydiecabanilla@gmail.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(58, 1, '2012-0351-MN', '168c7718ff33057d2f41efef32321d28', 'Janine Mae', 'A.', 'Calaguing', 'Leon', 'Leon', 'Female', '1995-08-16', 'Single', 'janinecalaguing@gmail.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(59, 1, '2012-1622-MN', '958a0eb2164b5ab14493ef11523c1e80', 'Jane', 'C.', 'Calimpay', 'Guimaras', 'Guimaras', 'Female', '1996-07-04', 'Single', 'janecalimpay@yahoo.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(60, 1, '2012-0582-MN', '9657e0a588a786c39848a6d170f340bc', 'Kris Vincent', 'V.', 'Calingo', 'N/A', 'N/A', 'Male', '1995-08-30', 'Single', 'vince.calingo@gmail.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(61, 1, '2012-1635-MN', '0fcf2e9d5b746e37aba5666b34c54ff6', 'Enelyn', 'H.', 'Casidsid', 'Aklan', 'Aklan', 'Female', '1994-07-16', 'Single', 'enelyncasidsid@yahoo.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(62, 1, '2012-1254-MN', 'bab866f2f755c72267fae8a8f8b6e809', 'Felipe Jr.', 'D.', 'Casipe', 'Iloilo', 'Iloilo', 'Male', '1996-04-28', 'Single', '', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(63, 1, '2012-0139-MN', '20d121f636eae4eb09fd8ad0e4482735', 'Edgemmar', 'R.', 'Caspe', 'Lapuz, Iloilo City', 'Lapuz, Iloilo City', 'Male', '1995-10-08', 'Single', 'edgemmarrey@yahoo.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(64, 1, '2012-1637-MN', 'be80d4fca8ca07948ad749b69cb51a5e', 'Jonesa', 'M.', 'Catamora', 'Antique', 'Antique', 'Female', '1997-11-13', 'Single', 'catamorjonesa@gmail.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(65, 1, '2012-1509-MN', 'b80bb3b8642717de3b02ec5e7e27edde', 'Dax Gabriel', 'V.', 'Celis', 'Jaro, Iloilo City', 'Jaro, Iloilo City', 'Male', '1995-09-16', 'Single', 'dg-celis@wvsu.edu.ph', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(66, 1, '2012-0296-MN', 'f214632f5a6b88e583da62a0d7c88738', 'Giselle', 'M.', 'Cuenca', 'Oton, Iloilo', 'Oton, Iloilo', 'Female', '1994-05-19', 'Single', 'https://www.linkedin.com/in/gisellecuenca/', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(67, 1, '2012-0641-MN', '0c820bbec862aa774aecf7b0fb655b65', 'Amy Jane', 'P.', 'De Juan', 'New Lucena', 'New Lucena', 'Female', '1996-04-10', 'Single', 'aj_de juan@wvsu.edu.ph', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(68, 1, '2012-0531-MN', '3a253106069781405261fd064d74d0d6', 'Sheldon', 'N.', 'De La Cruz', 'Jaro, Iloilo City', 'Jaro, Iloilo City', 'Male', '1995-04-08', 'Single', 'sheldondelacruz@rocketmai.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(69, 1, '2012-0334-MN', 'fe730116a09bf5fdeb85e87228a4ffb5', 'Sharemhel', '', 'Decir', 'Arevalo, Iloilo', 'Arevalo, Iloilo', 'Male', '1995-02-28', 'Single', 'sharemheldecir@gmail.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(70, 1, '2012-0252-MN', 'ef6efba279efda36c35fe975b950158b', 'Joan Mae', 'P.', 'Delloson', 'Dumangas, Iloilo', 'Dumangas, Iloilo', 'Female', '1995-11-20', 'Single', 'joanmaedelloson02@gmail.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(71, 1, '2012-1642-MN', '693023f43fa7ac58999371e09ffbb769', 'Raphy', 'F.', 'Depison', 'Himamaylan', 'Himamaylan', 'Male', '1989-04-03', 'Single', 'raphydepison25@yahoo.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(72, 1, '2012-1655-MN', 'fdb0d23d7dddfbf5ea54e3f6b30e5593', 'Remy Beth', 'R.', 'Diaz', 'Negros Occidental', 'Negros Occidental', 'Female', '1994-02-10', 'Single', 'remyraferdiaz00gmail.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(73, 1, '2012-0759-MN', 'f4a537d29428749d5fffcbd1af387e92', 'Arjay', 'P.', 'Doregnil', 'Dumangas, Iloilo', 'Dumangas, Iloilo', 'Male', '1995-10-09', 'Single', 'ad_doregnil@wvsu.edu.ph', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(74, 1, '2012-0033-MN', '35593eaf5cc7cae864047288f3bc9429', 'Edgie Myrl', 'D.', 'Encargues', 'Lapaz, Iloilo City', 'Lapaz, Iloilo City', 'Male', '1995-09-09', 'Single', 'em_encargues@wvsu.educ.ph', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(75, 1, '2012-1644-MN', '3b04c32c833b3c7473c5e881704a82ba', 'Vergilio', 'S.', 'Esmao', 'Negros Occidental', 'Negros Occidental', 'Male', '1991-01-05', 'Single', 'esmaov@yahoo.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(76, 1, '2012-0669-MN', '70ddfe0db13786d19539013d903fc128', 'Karl', 'P.', 'Fabronero', 'Lapaz, Iloilo City', 'Lapaz, Iloilo City', 'Male', '1992-03-02', 'Single', 'k_fabronero@wvsu.edu.ph', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(77, 1, '2012-0413-MN', '70d395e202fc1c42333116f4bbeda958', 'Arjay Vai', 'P.', 'Fajarillo', 'Oton, Iloilo', 'Oton, Iloilo', 'Male', '1995-06-21', 'Single', 'rje.fajarillo@yahoo.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(78, 1, '2012-0647-MN', 'caa5689177d882c4b9dc48b486fcc152', 'Reymar', 'C.', 'Galido', 'Guimaras', 'Guimaras', 'Male', '1992-03-13', 'Single', '', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(79, 1, '2012-1023-MN', 'f46624fbf82636e033165d12bef216e0', 'Donnes', 'B.', 'Gersabalino', 'Negros', 'Negros', 'Male', '1991-06-13', 'Single', 'doneyers@yahoo.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(80, 1, '2012-1620-MN', '98de18f9744564598bb079b6683d833d', 'Edilyn', 'S.', 'Gervacio', 'Aklan', 'Aklan', 'Female', '1996-04-11', 'Single', 'edlyngervacio08@gmail.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(81, 1, '2012-0719-MN', 'de0d706418f292b0ab9ae938d46f1d86', 'Kevin Noel', 'L.', 'Go', 'Molo, Iloilo', 'Molo, Iloilo', 'Male', '1994-11-20', 'Single', 'gokesakto20kevingo@yahoo.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(82, 1, '2012-0251-MN', '9159b197ccbd4a974b0bb26ad45fedc0', 'Maureen Joy', 'V.', 'Gonzales', 'Capiz', 'Capiz', 'Female', '1995-11-01', 'Single', 'meaniemau18@gmail.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(83, 1, '2012-0894-MN', 'e7945502e8a65288eb5b5a0b116ec5c9', 'Miguel Luis', 'C.', 'Hechanova', 'Jaro, Iloilo City', 'Jaro, Iloilo City', 'Male', '1995-05-12', 'Single', 'miguihechanova23@gmail.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(84, 1, '2012-0676-MN', 'bc1f9873cf44d70567f5b06711241d0a', 'Red Hexon', 'V.', 'Hermogenes', 'Balasan', 'Balasan', 'Male', '1995-09-14', 'Single', '', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(85, 1, '2012-1654-MN', '11e64a1396fd5e60d01dd2e71b446693', 'Juimy', 'I.', 'Impreso', 'Aklan', 'Aklan', 'Male', '1991-04-12', 'Single', 'juimy_impreso@yahoo.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(86, 1, '2012-1658-MN', '8f7c109565a231489c0367844bc641a2', 'Ronel', 'A.', 'Infante', 'Negros Occidental', 'Negros Occidental', 'Male', '1991-04-03', 'Single', 'ronel_infante@yahoo.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(87, 1, '2012-0703-MN', '1096b40ef4b114d34b45978faaac3aeb', 'Demi Renhz', 'V.', 'Jalando-on', 'Arevalo, Iloilo', 'Arevalo, Iloilo', 'Male', '1996-05-23', 'Single', 'renhzimed@yahoo.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(88, 1, '2012-1256-MN', 'b23b14467d5d2726c475332e3192894c', 'Michelle Dawn', 'A.', 'Jarder', 'Alimodian', 'Alimodian', 'Female', '1995-10-30', 'Single', 'cassiejrader@gmail.com', '', '', '', 'Bachelor of Science in Information Technology', '2016-04-04', NULL, NULL, NULL, NULL),
(90, 1, '2015-0636-MN', '827ccb0eea8a706c4c34a16891f84e7b', 'Cresia Golie', 'M.', 'Galicia', 'Dumangas, Iloilo', 'Dumangas, Iloilo', 'Female', '1996-08-29', 'Single', '', '', '', '', 'Bachelor of Science in Information System', '2015-04-04', NULL, NULL, NULL, NULL),
(97, 1, '2012-0002-MN', '827ccb0eea8a706c4c34a16891f84e7b', 'Patricia', '', 'Horario', 'Roxas', 'Roxas', 'Female', '1995-12-24', 'Single', '', '', '', '', 'Bachelor of Science in Information System', '2015-04-04', NULL, NULL, NULL, NULL),
(98, 1, '2015-0003-MN', '827ccb0eea8a706c4c34a16891f84e7b', 'Imma', '', 'Marcelo', 'Roxas', 'Roxas', 'Female', '1996-12-03', 'Single', '', '', '', '', 'Bachelor of Science in Information System', '2015-04-04', NULL, NULL, NULL, NULL),
(99, 1, '2015-0004-MN', '827ccb0eea8a706c4c34a16891f84e7b', 'Jeian', '', 'Sumagpao', 'Sta. Barbara, Iloilo', 'Sta. Barbara, Iloilo', 'Female', '1997-10-13', 'Single', '', '', '', '', 'Bachelor of Science in Information System', '2015-04-04', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alumni_skills`
--

CREATE TABLE `alumni_skills` (
  `as_id` int(11) NOT NULL,
  `alumni_id` int(11) NOT NULL,
  `company_id` int(5) DEFAULT NULL,
  `datetime_last_updated` datetime NOT NULL,
  `emp_stat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(2) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(5) NOT NULL,
  `company_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(5) NOT NULL,
  `category_id` int(2) NOT NULL,
  `skill_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `alumni_skills`
--
ALTER TABLE `alumni_skills`
  ADD PRIMARY KEY (`as_id`),
  ADD KEY `alumni_id` (`alumni_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `previous_addresses`
--
ALTER TABLE `previous_addresses`
  ADD PRIMARY KEY (`pa_id`),
  ADD KEY `alumni_id` (`alumni_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `alumni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `alumni_skills`
--
ALTER TABLE `alumni_skills`
  MODIFY `as_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `previous_addresses`
--
ALTER TABLE `previous_addresses`
  MODIFY `pa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills_rating`
--
ALTER TABLE `skills_rating`
  MODIFY `sr_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `alumni_skills`
--
ALTER TABLE `alumni_skills`
  ADD CONSTRAINT `alumni_skills_ibfk_1` FOREIGN KEY (`alumni_id`) REFERENCES `alumni` (`alumni_id`),
  ADD CONSTRAINT `alumni_skills_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
