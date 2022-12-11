-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 05:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onenationoneidentity`
--
CREATE DATABASE IF NOT EXISTS `onenationoneidentity` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `onenationoneidentity`;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `p_nid` varchar(50) NOT NULL,
  `d_nid` varchar(50) NOT NULL,
  `appointment` varchar(10) DEFAULT 'N/A',
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`p_nid`, `d_nid`, `appointment`, `date`) VALUES
('221000007', '221000005', 'yes', '2022-05-23 10:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `commentpost`
--

CREATE TABLE `commentpost` (
  `comment_id` int(11) NOT NULL,
  `p_nid` varchar(50) DEFAULT NULL,
  `d_nid` varchar(50) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commentpost`
--

INSERT INTO `commentpost` (`comment_id`, `p_nid`, `d_nid`, `post_id`, `content`, `date`, `time`) VALUES
(102, '221000005', NULL, 77, 'hello Gloria L. Elliott', '2022-05-22', '21:23:18'),
(103, '221000005', NULL, 77, '\'', '2022-05-22', '21:23:23'),
(104, '221000005', NULL, 77, '\"', '2022-05-22', '21:23:27'),
(105, '221000003', '221000003', 78, '\"\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\"\"lckjdb vlzjdkjk\"/\' lkf\\\' \\\" \\\' \\\\\\\\\\\\\\\\\\\\\\\"', '2022-05-22', '21:29:09'),
(106, '221000002', NULL, 80, 'It\'s Work', '2022-05-22', '21:36:04'),
(110, '221000001', '221000001', 77, 'j', '2022-05-23', '07:53:36'),
(112, '221000003', '221000003', 86, 'How can i help you', '2022-05-23', '11:45:33'),
(113, '221000002', NULL, 87, 'next day 11am', '2022-05-23', '12:07:40'),
(114, '221000003', '221000003', 87, 'wkajerf\r\n', '2022-05-23', '12:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `detectdisease`
--

CREATE TABLE `detectdisease` (
  `prescription_id` int(11) NOT NULL,
  `disease_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detectdisease`
--

INSERT INTO `detectdisease` (`prescription_id`, `disease_name`) VALUES
(36, 'dangu fever');

-- --------------------------------------------------------

--
-- Table structure for table `dmdc`
--

CREATE TABLE `dmdc` (
  `dmdc_id` varchar(50) NOT NULL,
  `specialist` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dmdc`
--

INSERT INTO `dmdc` (`dmdc_id`, `specialist`) VALUES
(' 200005', 'Endocrinologists'),
(' 200010', 'Otolaryngologists'),
(' 200013', 'Oncologists'),
('200001', 'Nuclear medicine'),
('200002', 'Cardiologists'),
('200003', 'General surgeons'),
('200004', 'Cardiologists'),
('200006', 'Gastroenterologists'),
('200007', 'Nephrologists'),
('200008', 'Urologists'),
('200009', 'Pulmonologists'),
('200011', 'Meurologists'),
('200012', 'Psychiatrists'),
('200014', 'Radiologists'),
('200015', 'Rheumatologists'),
('200016', 'Nuclear medicine');

-- --------------------------------------------------------

--
-- Table structure for table `docregistry`
--

CREATE TABLE `docregistry` (
  `hospital_id` varchar(20) NOT NULL,
  `dmdc_id` varchar(50) NOT NULL,
  `d_nid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `docregistry`
--

INSERT INTO `docregistry` (`hospital_id`, `dmdc_id`, `d_nid`) VALUES
('10002', '200002', '221000003');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `d_nid` varchar(50) NOT NULL,
  `dmdc_id` varchar(50) NOT NULL,
  `visiting_fee` int(11) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_nid`, `dmdc_id`, `visiting_fee`, `PASSWORD`) VALUES
('221000001', '200001', 0, '12345678'),
('221000003', '200002', 0, '221000003'),
('221000005', '200003', 0, '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `doctorchamber`
--

CREATE TABLE `doctorchamber` (
  `d_nid` varchar(50) NOT NULL,
  `location_` varchar(50) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `day` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorchamber`
--

INSERT INTO `doctorchamber` (`d_nid`, `location_`, `start_time`, `end_time`, `day`) VALUES
('221000003', 'Dhaka, Mirpur 1', '10:00:00', '12:30:00', 'Monday'),
('221000003', 'Dhaka, Mirpur 1', '10:00:00', '12:30:00', 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `doctordegree`
--

CREATE TABLE `doctordegree` (
  `dmdc_id` varchar(50) NOT NULL,
  `degree_name` varchar(255) NOT NULL,
  `institute_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctordegree`
--

INSERT INTO `doctordegree` (`dmdc_id`, `degree_name`, `institute_name`) VALUES
(' 200005', 'M.B.B.S', 'Rajshahi Medical College'),
(' 200005', 'M.B.B.S', 'Satkhira Medical College['),
(' 200005', 'MD', 'Sylhet Medical University['),
(' 200005', 'MDS', 'Sheikh Hasina Medical University Khulna'),
(' 200010', 'M.B.B.S', 'Popular Medical College['),
(' 200010', 'MD', 'Chittagong Medical University['),
(' 200013', 'M.B.B.S', 'Khwaja Yunus Ali Medical College['),
('200001', 'M.B.B.S', 'Dhaka Medical College '),
('200001', 'MD', 'Bangabandhu Sheikh Mujib Medical University (BSMMU)'),
('200001', 'Phd in Medicin ', 'Bangabandhu Sheikh Mujib Medical University (BSMMU)'),
('200002', 'M.B.B.S', 'Chittagong Medical College '),
('200002', 'MS', 'Cumilla Medical College'),
('200003', 'FCPS', 'Sylhet Medical University'),
('200003', 'M.B.B.S', 'Abdul Malek Ukil Medical College'),
('200003', 'MS', 'Sheikh Hasina Medical College'),
('200004', 'MBBS', 'Pabna Medical College'),
('200004', 'MD', 'Chattogram Medical College'),
('200004', 'MPhil', 'Chittagong Medical University'),
('200004', 'MS', ' Kushtia Medical College['),
('200006', 'M.B.B.S', 'Shaheed Ziaur Rahman Medical College'),
('200007', 'M.B.B.S', 'M Abdur Rahim Medical College'),
('200008', 'M.B.B.S', 'Chattogram Medical College['),
('200008', 'MPhil', 'Bangabandhu Sheikh Mujib Medical University Dhaka'),
('200009', 'M.B.B.S', 'Dhaka Medical College '),
('200009', 'MDS', 'Chittagong Medical University['),
('200011', 'FCPS', 'Chittagong Medical University'),
('200011', 'M.B.B.S', 'Army Medical College Cumilla'),
('200011', 'MD', 'Sylhet Medical University'),
('200012', 'M.B.B.S', 'Enam Medical College and Hospital'),
('200012', 'MDS', 'Rajshahi Medical University'),
('200014', 'FCPS', 'Sheikh Hasina Medical University Khulna'),
('200014', 'M.B.B.S', 'North Bengal Medical College'),
('200015', 'FCPS', 'Sylhet Medical University'),
('200015', 'M.B.B.S', 'Jashore Medical College'),
('200015', 'MD', '\r\nSheikh Hasina Medical University Khulna'),
('200015', 'MDS', 'Sylhet Medical University'),
('200015', 'MPhil', 'Sylhet Medical University'),
('200016', 'M.B.B.S', 'Rajshahi Medical College');

-- --------------------------------------------------------

--
-- Table structure for table `doctorgivetest`
--

CREATE TABLE `doctorgivetest` (
  `prescription_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `giving` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorgivetest`
--

INSERT INTO `doctorgivetest` (`prescription_id`, `test_id`, `giving`) VALUES
(36, 40, '2022-05-22'),
(36, 41, '2022-05-22'),
(37, 55, '2022-05-22'),
(37, 56, '2022-05-22'),
(41, 1, '2022-05-22'),
(41, 5, '2022-05-22'),
(42, 1, '2022-05-22'),
(44, 1, '2022-05-23'),
(44, 55, '2022-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `doctorworking`
--

CREATE TABLE `doctorworking` (
  `hospital_id` varchar(20) NOT NULL,
  `d_nid` varchar(50) NOT NULL,
  `salary` int(11) DEFAULT NULL,
  `joined_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorworking`
--

INSERT INTO `doctorworking` (`hospital_id`, `d_nid`, `salary`, `joined_date`) VALUES
('10001', '221000003', NULL, '2022-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `doctorworkinghours`
--

CREATE TABLE `doctorworkinghours` (
  `hospital_id` varchar(20) NOT NULL,
  `d_nid` varchar(50) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `day_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `prescription_id` int(11) NOT NULL,
  `drug_name` varchar(100) NOT NULL,
  `power` varchar(10) NOT NULL,
  `drug_type` varchar(20) NOT NULL,
  `description` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`prescription_id`, `drug_name`, `power`, `drug_type`, `description`) VALUES
(36, 'napa', '100mg', 'Tablet', '1+1+1'),
(39, 'napa', '100mg', 'Tablet', '1+1+1'),
(43, 'wrkjet', '100mg', 'Tablet', '1+1+1');

-- --------------------------------------------------------

--
-- Table structure for table `educationqualification`
--

CREATE TABLE `educationqualification` (
  `p_nid` varchar(50) NOT NULL,
  `reg_number` varchar(50) NOT NULL DEFAULT 'N/A',
  `roll` varchar(50) NOT NULL DEFAULT 'N/A',
  `institute_name` varchar(100) NOT NULL DEFAULT 'N/A',
  `start_year` varchar(10) NOT NULL DEFAULT 'N/A',
  `end_year` varchar(10) NOT NULL DEFAULT 'N/A',
  `board_name` varchar(50) NOT NULL DEFAULT 'N/A',
  `up_toclass` varchar(50) NOT NULL DEFAULT 'N/A',
  `certificate_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `gender_id` int(11) NOT NULL,
  `gender_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_id`, `gender_name`) VALUES
(1, 'male'),
(2, 'female'),
(3, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospital_id` varchar(20) NOT NULL,
  `hospital_name` varchar(150) NOT NULL,
  `numberof_ward` int(11) DEFAULT NULL,
  `wardfee_perday` int(11) DEFAULT NULL,
  `numberof_cabin` int(11) DEFAULT NULL,
  `cabinfee_perday` int(11) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `docreg` char(1) DEFAULT '0',
  `docregtext` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospital_id`, `hospital_name`, `numberof_ward`, `wardfee_perday`, `numberof_cabin`, `cabinfee_perday`, `password`, `docreg`, `docregtext`) VALUES
('10001', 'Abc Hospital And Diagnostic Centre', 100, 50, 20, 1000, '1245', '1', 'Vacancy open 2   '),
('10002', 'Arif Prescription Point ', 200, 50, 50, 2000, '12345', '1', '.etky5'),
('10003', 'Redowan Diagnostic Centre', 1000, 100, 30, 1500, '12346', '0', NULL),
('10004', 'Java Medical centre ', 500, 20, 100, 1000, '123456', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hospitalbrance`
--

CREATE TABLE `hospitalbrance` (
  `hospital_id` varchar(20) NOT NULL,
  `brance_name` varchar(150) NOT NULL,
  `street` varchar(50) NOT NULL DEFAULT 'N/A',
  `city` varchar(50) NOT NULL DEFAULT 'N/A',
  `zip_code` varchar(10) NOT NULL DEFAULT 'N/A',
  `road_no` varchar(10) NOT NULL DEFAULT 'N/A',
  `block` varchar(10) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_content` varchar(10000) DEFAULT NULL,
  `p_nid` varchar(50) DEFAULT NULL,
  `d_nid` varchar(50) DEFAULT NULL,
  `sender` varchar(50) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `message_content`, `p_nid`, `d_nid`, `sender`, `datetime`) VALUES
(203, 'hya doctor', '221000002', '221000001', '221000002', '2022-05-22 21:48:36'),
(204, '\\\'', '221000002', '221000001', '221000002', '2022-05-22 21:48:41'),
(205, '\\|\"', '221000002', '221000001', '221000002', '2022-05-22 21:48:50'),
(206, '\' \'  \' \'\" \"', '221000002', '221000001', '221000002', '2022-05-22 21:49:03'),
(207, 'hghj', '221000002', '221000001', '221000002', '2022-05-22 21:49:22'),
(208, 'hi', '221000002', '221000003', '221000002', '2022-05-22 21:49:57'),
(209, 'hiw', '221000002', '221000003', '221000003', '2022-05-22 21:50:33'),
(210, 'kjfe nsgrl', '221000002', '221000001', '221000001', '2022-05-23 08:47:42'),
(211, 'kjaf', '221000002', '221000001', '221000001', '2022-05-23 08:51:14'),
(212, 'esfg', '221000002', '221000001', '221000001', '2022-05-23 08:51:23'),
(213, 'jfjef', '221000002', '221000001', '221000001', '2022-05-23 08:51:33'),
(214, 'hi', '221000007', '221000003', '221000007', '2022-05-23 10:59:23'),
(215, 'hi', '221000007', '221000001', '221000007', '2022-05-23 10:59:36'),
(216, 'jfhkjdg', '221000002', '221000003', '221000002', '2022-05-23 11:07:01'),
(217, 'hi  doctor goloria', '221000007', '221000001', '221000007', '2022-05-23 11:10:25'),
(218, 'Hi how can I help you..?', '221000007', '221000001', '221000001', '2022-05-23 11:11:03'),
(221, '', '221000007', '221000001', '221000007', '2022-05-23 11:14:22'),
(222, 'hello world', '221000002', '221000003', '221000002', '2022-05-23 12:05:37'),
(223, 'jhg', '221000002', '221000003', '221000003', '2022-05-23 12:05:42'),
(224, '........', '221000002', '221000003', '221000002', '2022-05-23 12:05:48'),
(225, 'a', '221000002', '221000003', '221000002', '2022-05-23 12:05:50'),
(226, 's', '221000002', '221000003', '221000002', '2022-05-23 12:05:51'),
(227, 'arif', '221000002', '221000003', '221000003', '2022-05-23 12:05:52'),
(228, 's', '221000002', '221000003', '221000002', '2022-05-23 12:05:54'),
(229, 'hfello dafa', '221000002', '221000003', '221000003', '2022-05-23 12:05:58'),
(230, 'hhh', '221000002', '221000003', '221000002', '2022-05-23 12:06:01'),
(231, 'hello', '221000002', '221000003', '221000003', '2022-05-23 12:34:24'),
(232, '>>', '221000002', '221000003', '221000002', '2022-05-23 12:34:27'),
(233, 'hjewrfgdh', '221000002', '221000003', '221000003', '2022-05-23 12:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_nid` varchar(50) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_nid`, `PASSWORD`) VALUES
('221000001', '12345678'),
('221000002', '221000002'),
('221000003', '221000003'),
('221000004', 'abcdefghij'),
('221000005', '123456789'),
('221000007', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `patientbelow18`
--

CREATE TABLE `patientbelow18` (
  `guardian_nid` varchar(50) DEFAULT NULL,
  `childbirth_id` varchar(50) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientbelow18`
--

INSERT INTO `patientbelow18` (`guardian_nid`, `childbirth_id`, `name`, `dob`) VALUES
('221000001', '221000001300', 'Elliott Jr', '2007-06-11'),
('221000002', '221000001301', 'Jack', '2003-04-15'),
(NULL, 'N/A', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `nid` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `finger_print` varchar(50) NOT NULL,
  `retina_print` varchar(50) NOT NULL,
  `blood` varchar(10) DEFAULT NULL,
  `yearly_income` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `isalive` varchar(10) DEFAULT NULL,
  `father_nid` varchar(50) DEFAULT NULL,
  `mother_nid` varchar(50) DEFAULT NULL,
  `husband_nid` varchar(50) DEFAULT NULL,
  `birth_id` varchar(50) DEFAULT NULL,
  `mobile_no` char(11) DEFAULT NULL,
  `occupation` varchar(20) DEFAULT NULL,
  `religion` varchar(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`nid`, `name`, `finger_print`, `retina_print`, `blood`, `yearly_income`, `dob`, `gender`, `isalive`, `father_nid`, `mother_nid`, `husband_nid`, `birth_id`, `mobile_no`, `occupation`, `religion`, `image`) VALUES
('221000001', 'Gloria L. Elliott', '1101001011000011000101000001', '00001101001011000011000101000001', 'B+', 120000, '1978-04-11', 2, 'yes', '221000002', '221000007', '221000018', '221000001200', '01758999544', 'Doctor', 'Christian', 'IMG-628a528e471e68.27553890.jpg'),
('221000002', 'Markv Hudnall', '1101001011000011000101000010', '00001101001011000011000101000010', 'AB+', 150000, '1955-09-18', 1, 'yes', '221000100', '221000020', NULL, '221000001201', '01758489501', 'farmer', 'Christian', 'IMG-628a52d596cd73.70347399.jpg'),
('221000003', 'Juan J. Medina', '1101001011000011000101000011', '00001101001011000011000101000011', 'B+', 250000, '1950-05-10', 1, 'yes', '221000018', '221000004', NULL, '221000001202', '01758689502', 'Doctor', 'Christian', 'IMG-628a537ecc0f07.66127948.png'),
('221000004', 'Melissa E. Wilson', '1101001011000011000101000100', '00001101001011000011000101000100', 'B+', 70000, '1989-01-08', 2, 'yes', '221000018', '221000017', '221000100', '221000001203', '01758489504', 'School Head Master', 'Christian', 'IMG-628a54a96e55d7.31426553.jpg'),
('221000005', 'Mishaal Fawzan Kouri', '1101001011000011000101000101', '00001101001011000011000101000101', 'AB+', 90000, '1967-03-22', 1, 'yes', '221000014', '221000017', NULL, '221000001204', '01758489505', 'Doctor', 'Islam', 'IMG-628a542dcf38f9.19321899.jpg'),
('221000006', 'Basimah Zahra Sleiman', '1101001011000011000101000110', '00001101001011000011000101000110', 'A+', 500000, '1940-05-15', 2, 'no', '221000010', '221000006', '221000018', '221000001205', '01758489506', 'School Teacher', 'Islam', NULL),
('221000007', 'Nurah Maisah Hakimi Sleiman', '1101001011000011000101000111', '00001101001011000011000101000111', 'B-', 30000, '1989-04-15', 2, 'yes', '221000003', '221000004', '221000100', '221000001206', '01758489507', 'IT', 'Islam', 'IMG-628b04e66d39e1.97016753.jpg'),
('221000008', 'Sinan Labeeb Amari', '1101001011000011000101001000', '00001101001011000011000101001000', 'O+', 150000, '1988-06-19', 1, 'yes', '221000003', '221000101', NULL, '221000001207', '01758489508', 'Football Player', 'Islam', NULL),
('221000009', 'Thabit Ata Allah Assaf', '1101001011000011000101001001', '00001101001011000011000101001001', 'B+', 31000, '1976-08-22', 1, 'yes', '221000010', '221000007', NULL, '221000001208', '01758489509', 'Doctor', 'Islam', NULL),
('221000010', 'Abdul-Salam Ayman Almasi', '1101001011000011000101001010', '00001101001011000011000101001010', 'A-', 9000, '1935-05-15', 1, 'no', '221000005', '221000019', NULL, '221000001209', '01758489510', 'Nurse', 'Islam', NULL),
('221000011', 'Wasif Abdel Najjar', '1101001011000011000101001011', '00001101001011000011000101001011', 'AB-', 20000, '1979-11-30', 1, 'yes', '221000102', '221000012', NULL, '221000001210', '01758489511', 'Army', 'Islam', NULL),
('221000012', 'Nasiha Sarkis', '1101001011000011000101001100', '00001101001011000011000101001100', 'A-', 25000, '1967-03-13', 2, 'yes', '221000011', '221000016', '221000009', '221000001211', '01758489512', 'Railway', 'Islam', NULL),
('221000013', 'Mustafa Arif Malouf', '1101001011000011000101001101', '00001101001011000011000101001101', 'B+', 80000, '1971-03-19', 1, 'yes', '221000008', '221000007', NULL, '221000001212', '01758489513', 'Advocate', 'Islam', NULL),
('221000014', 'Bashir Abdul-Nasser Gaber', '1101001011000011000101001110', '00001101001011000011000101001110', 'A+', 67000, '1950-05-15', 1, 'no', '221000100', '221000004', NULL, '221000001213', '01758489514', 'Hacker', 'Islam', NULL),
('221000015', 'Fida Jumanah Ghanem', '1101001011000011000101001111', '00001101001011000011000101001111', 'AB+', 0, '1999-01-25', 2, 'yes', '221000018', '221000012', '221000013', '221000001214', '01758489515', 'Homemaker', 'Islam', NULL),
('221000016', 'Wafiya Rafif Daher', '1101001011000011000101010000', '00001101001011000011000101010000', 'B+', 11000, '1978-01-01', 2, 'yes', '221000005', '221000007', '221000011', '221000001215', '01758489516', 'Influencer', 'Islam', 'IMG-628851226ed589.18756936.jpg'),
('221000017', 'Marwah Wisam Boutros', '1101001011000011000101010001', '00001101001011000011000101010001', 'B-', 21000, '1985-08-19', 2, 'yes', '221000018', '221000012', '221000011', '221000001216', '01758489517', 'Doctor', 'Islam', 'IMG-6288b5f9908843.29719657.webp'),
('221000018', 'Jawdah Afif Asker', '1101001011000011000101010010', '00001101001011000011000101010010', 'A+', 60000, '1993-12-12', 1, 'yes', '221000008', '221000001', NULL, ' 22100000121', '01758489518', 'Driver', 'Islam', NULL),
('221000019', 'Faiza Numa Shalhoub', '1101001011000011000101010011', '00001101001011000011000101010011', 'AB-', 70000, '1981-06-27', 2, 'yes', '221000014', '221000017', '221000013', '221000001218', '01758489519', 'Doctor', 'Islam', NULL),
('221000020', 'Samarah Basinah Touma', '1101001011000011000101010100', '00001101001011000011000101010100', 'B+', 12000, '1981-07-18', 2, 'yes', '221000011', '221000019', '221000010', '221000001219', '01758489520', 'Doctor', 'Islam', 'IMG-6288d23658d117.69999177.jpg'),
('221000100', 'Jonathan K. Rasmussen', '1101001011000011000110100100', '00001101001011000011000110100100', 'B-', 10000, '1960-09-28', 1, 'yes', '221000018', '221000101', NULL, '221000001220', '01758489601', 'Homemaker', 'Christian', 'IMG-6288a4ef765d55.86964020.png'),
('221000101', 'Patti R. Walston', '1101001011000011000110100101', '00001101001011000011000110100101', 'A-', 200000, '1999-09-29', 2, 'yes', '221000005', '221000006', '221000018', '221000001221', '01758489602', 'business', 'Christian', NULL),
('221000102', 'Rasmussen Jonathan', '1101001011000011000110100110', '00001101001011000011000110100110', 'AB+', 2050000, '1950-09-20', 1, 'no', '221000014', '221000101', NULL, '221000001222', '01758489603', 'Doctor', 'Christian', NULL),
('221000103', 'Robert B. Fussell', '1101001011000011000110100111', '00001101001011000011000110100111', 'O+', 350000, '1980-09-29', 1, 'yes', '221000018', '221000012', NULL, '221000001223', '01758489604', 'Business', 'Christian', NULL),
('221000104', 'Dhakir Ahmad Sayegh', '1101001011000011000110101000', '00001101001011000011000110101000', 'B-', 25800000, '1918-10-17', 1, 'no', '221000003', '221000004', NULL, '221000001224', '01758489605', 'Doctor', 'Islam', NULL),
('221000105', 'Wasim Rayhan Abadi', '1101001011000011000110101001', '00001101001011000011000110101001', 'O-', 250000, '2001-09-28', 1, 'yes', '221000112', '221000017', NULL, '221000001225', '01758489606', 'Business', 'Islam', 'IMG-6289c60e81b203.01730511.jpg'),
('221000106', 'Talal Abdul-Rahman Boutros', '1101001011000011000110101010', '00001101001011000011000110101010', 'A+', 25450000, '1960-09-28', 1, 'yes', '221000011', '221000116', NULL, '221000001226', '01758489607', 'Business', 'Islam', NULL),
('221000107', 'Shakir Raghid Mansour', '1101001011000011000110101011', '00001101001011000011000110101011', 'A+', 25005500, '1960-09-28', 1, 'yes', '221000013', '221000019', NULL, '221000001227', '01758489608', 'Doctor', 'Islam', NULL),
('221000108', 'Rafi Budail Salib', '1101001011000011000110101100', '00001101001011000011000110101100', 'A+', 25050000, '1960-09-28', 1, 'yes', '221000102', '221000016', NULL, '221000001228', '01758489609', 'Business', 'Islam', NULL),
('221000109', 'Arij Suha Handal', '1101001011000011000110101101', '00001101001011000011000110101101', 'A+', 254000, '1950-06-10', 2, 'no', '221000011', '221000113', '221000009', '221000001229', '01758489610', 'Doctor', 'Islam', NULL),
('221000110', 'Rahaf Cantara Arian', '1101001011000011000110101110', '00001101001011000011000110101110', 'A+', 1000000, '1987-09-28', 2, 'yes', '221000002', '221000015', '221000107', '221000001230', '01758489611', 'Nurse', 'Islam', 'IMG-6288b2e07abbc9.82673129.jpg'),
('221000111', 'Safaa Nimat Toma', '1101001011000011000110101111', '00001101001011000011000110101111', 'B+', 0, '1988-07-01', 2, 'yes', '221000120', '221000019', '221000018', '221000001231', '01758489612', 'Homemaker', 'Islam', NULL),
('221000112', 'Sakeena Kulthum Mansour', '1101001011000011000110110000', '00001101001011000011000110110000', 'B-', 0, '1990-10-28', 1, 'yes', '221000014', '221000117', NULL, '221000001232', '01758489613', 'Homemaker', 'Islam', NULL),
('221000113', 'Kulthum Mansour', '1101001011000011000110110001', '00001101001011000011000110110001', 'AB+', 0, '1960-01-28', 2, 'no', '221000013', '221000111', '221000002', '221000001233', '01758489614', 'Homemaker', 'Islam', NULL),
('221000114', 'Hayah Gharam Kassab', '1101001011000011000110110010', '00001101001011000011000110110010', 'B+', 250000, '1972-09-28', 2, 'no', '221000011', '221000006', '221000119', '221000001234', '01758489615', 'Nurse', 'Islam', NULL),
('221000115', 'Wafaa Atifa Naifeh', '1101001011000011000110110011', '00001101001011000011000110110011', 'O-', 2500000, '1973-10-28', 2, 'yes', '221000005', '221000015', '221000118', '221000001235', '01758489616', 'Doctor', 'Islam', NULL),
('221000116', 'Wisaal Huma Antoun', '1101001011000011000110110100', '00001101001011000011000110110100', 'O+', 2800000, '1960-09-28', 2, 'yes', '221000118', '221000007', '221000104', '221000001236', '01758489617', 'Doctor', 'Islam', NULL),
('221000117', 'Khairiya Kawkab Baz', '1101001011000011000110110101', '00001101001011000011000110110101', 'AB+', 0, '1982-09-28', 2, 'yes', '221000018', '221000109', '221000108', '221000001237', '01758489618', 'Homemaker', 'Islam', NULL),
('221000118', 'Hamas Aza Awad', '1101001011000011000110110110', '00001101001011000011000110110110', 'A+', 250000, '1960-09-28', 1, 'yes', '221000112', '221000101', NULL, '221000001239', '01758489619', 'business', 'Islam', NULL),
('221000119', 'Fawwaz Hamdan Amari', '1101001011000011000110110111', '00001101001011000011000110110111', 'B+', 10000000, '1960-09-28', 1, 'yes', '221000107', '221000114', NULL, '221000001240', '01758489620', 'Doctor', 'Islam', NULL),
('221000120', 'Raghib Fudail Qureshi', '1101001011000011000110111000', '00001101001011000011000110111000', 'B+', 2500000, '1960-09-28', 1, 'yes', '221000100', '221000020', NULL, '221000001241', '01758489621', 'Doctor', 'Islam', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `content` varchar(650) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `p_nid` varchar(50) DEFAULT NULL,
  `d_nid` varchar(50) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `content`, `date`, `p_nid`, `d_nid`, `time`, `category`) VALUES
(77, 'hello , 1st  Post lkjkj', '2022-05-22', '221000001', NULL, '20:59:36', 'Blog'),
(78, 'Hya , I am here ..!\' \" \\\\\\\\\\\\\" \\\' \\\" \\\\\\\\\\\\\\\\\' ////?', '2022-05-22', '221000005', NULL, '21:22:30', 'Blog'),
(79, '\"\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\'\"\"lckjdb vlzjdkjk\"/\'  lkf\\\' \\\"', '2022-05-22', '221000005', NULL, '21:25:43', 'Diabetes'),
(80, '\\\' \\\" \\\' hello', '2022-05-22', '221000003', '221000003', '21:28:33', 'Blog'),
(82, 'hjrfs', '2022-05-23', '221000001', '221000001', '07:57:01', 'Fever'),
(86, 'need help for pimple ', '2022-05-23', '221000002', NULL, '11:45:12', 'Blog'),
(87, 'when i will get my vaccine ?', '2022-05-23', '221000003', '221000003', '12:03:06', 'Covid19'),
(88, 'abc.....', '2022-05-23', '221000002', NULL, '13:02:53', 'Fever');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `d_nid` varchar(50) NOT NULL,
  `p_nid` varchar(50) NOT NULL,
  `prescription_date` date NOT NULL,
  `childbirth_id` varchar(50) DEFAULT NULL,
  `doctor_ref` varchar(50) DEFAULT NULL,
  `prescription_id` int(11) NOT NULL,
  `remarks` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`d_nid`, `p_nid`, `prescription_date`, `childbirth_id`, `doctor_ref`, `prescription_id`, `remarks`) VALUES
('221000003', '221000002', '2022-05-22', 'N/A', '221000005', 36, '\' \" \\\' \\\"'),
('221000003', '221000002', '2022-05-22', '221000001301', NULL, 37, ''),
('221000003', '221000002', '2022-05-22', '221000001301', '221000005', 38, 'jkafsdg .,gmdnlfk\' kjfj \"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"'),
('221000001', '221000002', '2022-05-22', 'N/A', NULL, 39, ''),
('221000001', '221000002', '2022-05-22', 'N/A', '221000003', 41, 'you uhf kjfhk krwhtwot owhtowit oihtiow ht  lsefkdg'),
('221000001', '221000002', '2022-05-22', '221000001301', '221000003', 42, 'rdghj thjklk gdthfygjukhjlk'),
('221000003', '221000002', '0000-00-00', 'N/A', NULL, 43, NULL),
('221000003', '221000002', '0000-00-00', 'N/A', NULL, 44, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviewfordoctor`
--

CREATE TABLE `reviewfordoctor` (
  `d_nid` varchar(50) NOT NULL,
  `p_nid` varchar(50) NOT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `review` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviewfordoctor`
--

INSERT INTO `reviewfordoctor` (`d_nid`, `p_nid`, `rating`, `review`) VALUES
('221000003', '221000002', '2.9', 'Not Bad\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `test_name`) VALUES
(1, 'Acetaminophen Level'),
(2, 'Acid-Fast Bacillus (AFB) Tests'),
(3, 'ADHD Screening'),
(4, 'Adrenocorticotropic Hormone (ACTH)'),
(5, 'Albumin Blood Test'),
(6, 'Alcohol Use Screening Tests'),
(7, 'Aldosterone Test'),
(8, 'Alkaline Phosphatase'),
(9, 'Allergy Blood Test'),
(10, 'Allergy Skin Test'),
(11, 'Alpha Fetoprotein (AFP) Tumor Marker Test'),
(12, 'Alpha-1 Antitrypsin Test'),
(13, 'Alpha-Fetoprotein (AFP) Test'),
(14, 'ALT Blood Test'),
(15, 'Ammonia Levels'),
(16, 'Amniocentesis (amniotic fluid test)'),
(18, 'Amylase Test'),
(19, 'ANA (Antinuclear Antibody) Test'),
(20, 'Anion Gap Blood Test'),
(21, 'Anoscopy'),
(22, 'Anti-Müllerian Hormone Test'),
(23, 'Antibiotic Sensitivity Test'),
(24, 'Antibody Serology Tests'),
(25, 'Antineutrophil Cytoplasmic Antibodies (ANCA) Test'),
(26, 'Appendicitis Tests'),
(27, 'AST Test'),
(28, 'At-Home Medical Tests'),
(29, 'Autism Spectrum Disorder (ASD) Screening'),
(30, 'Autonomic Testing'),
(31, 'Bacteria Culture Test'),
(32, 'Bacterial Vaginosis Test'),
(33, 'Balance Tests'),
(34, 'Barium Swallow'),
(35, 'Basic Metabolic Panel (BMP)'),
(36, 'BCR ABL Genetic Test'),
(37, 'Beta 2 Microglobulin (B2M) Tumor Marker Test'),
(38, 'Bilirubin Blood Test'),
(39, 'Bilirubin in Urine'),
(40, 'Blood Alcohol Level'),
(41, 'Blood Differential'),
(42, 'Blood Glucose Test'),
(43, 'Blood in Urine'),
(44, 'Blood Oxygen Leve'),
(45, 'Blood Smear'),
(46, 'Bone Density Scan'),
(48, 'Bone Marrow Tests'),
(49, 'BRAF Genetic Test'),
(50, 'BRCA Genetic Test'),
(51, 'Breast Biopsy'),
(52, 'Bronchoscopy and Bronchoalveolar Lavage (BAL)'),
(53, 'BUN (Blood Urea Nitrogen)'),
(54, 'Burn Evaluation'),
(55, 'MRI Test'),
(56, 'X-ray');

-- --------------------------------------------------------

--
-- Table structure for table `testreport`
--

CREATE TABLE `testreport` (
  `serial` int(11) NOT NULL,
  `prescription_id` int(11) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `hospital_id` varchar(20) DEFAULT NULL,
  `result` varchar(400) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `reportdate` date DEFAULT NULL,
  `findvalue` varchar(50) DEFAULT NULL,
  `normalvalue` varchar(50) DEFAULT NULL,
  `whendidtest` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testreport`
--

INSERT INTO `testreport` (`serial`, `prescription_id`, `test_id`, `hospital_id`, `result`, `image`, `reportdate`, `findvalue`, `normalvalue`, `whendidtest`) VALUES
(19, 36, 40, '10001', 'Positive', NULL, '2022-05-22', '10%', '0%', ''),
(20, 36, 40, '10001', 'Negative', NULL, '2022-05-22', '0%', '0%', ''),
(21, 36, 41, '10001', 'Normal', 'IMG-628a5dc186a6a2.01918774.png', '2022-05-22', '', '', ''),
(22, 37, 55, '10001', 'normal', 'IMG-628a62de1b07b2.85387925.jpg', '2022-05-22', '', '', ''),
(23, 37, 56, '10001', 'Broken ', 'IMG-628a6320a06d93.33293143.jpg', '2022-05-22', '', '', ''),
(25, 41, 1, '10002', 'Positive', NULL, '2022-05-22', '4', '<5', ''),
(26, 36, 40, '10002', 'Negative', NULL, '2022-05-22', '40%', '0%', ''),
(27, 41, 5, '10002', 'normal', NULL, '2022-05-22', '45', '5<', ''),
(29, 41, 5, '10001', 'Negative', NULL, '2022-05-23', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`p_nid`,`d_nid`),
  ADD KEY `fk_appointmentdnid` (`d_nid`);

--
-- Indexes for table `commentpost`
--
ALTER TABLE `commentpost`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk_commentpostpat` (`p_nid`),
  ADD KEY `fk_commentpostdr` (`d_nid`),
  ADD KEY `fk_commentpostpost` (`post_id`);

--
-- Indexes for table `detectdisease`
--
ALTER TABLE `detectdisease`
  ADD PRIMARY KEY (`prescription_id`,`disease_name`);

--
-- Indexes for table `dmdc`
--
ALTER TABLE `dmdc`
  ADD PRIMARY KEY (`dmdc_id`);

--
-- Indexes for table `docregistry`
--
ALTER TABLE `docregistry`
  ADD PRIMARY KEY (`hospital_id`,`dmdc_id`,`d_nid`),
  ADD KEY `fk_docregistrydoc` (`d_nid`),
  ADD KEY `fk_docregistrydmdc` (`dmdc_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`d_nid`),
  ADD KEY `fk_doctordmdcid` (`dmdc_id`);

--
-- Indexes for table `doctorchamber`
--
ALTER TABLE `doctorchamber`
  ADD PRIMARY KEY (`d_nid`,`location_`,`start_time`,`end_time`,`day`);

--
-- Indexes for table `doctordegree`
--
ALTER TABLE `doctordegree`
  ADD PRIMARY KEY (`dmdc_id`,`degree_name`,`institute_name`);

--
-- Indexes for table `doctorgivetest`
--
ALTER TABLE `doctorgivetest`
  ADD PRIMARY KEY (`prescription_id`,`test_id`,`giving`),
  ADD KEY `fk_doctorgivetestid` (`test_id`);

--
-- Indexes for table `doctorworking`
--
ALTER TABLE `doctorworking`
  ADD PRIMARY KEY (`hospital_id`,`d_nid`),
  ADD KEY `fk_doctorworkingdr` (`d_nid`);

--
-- Indexes for table `doctorworkinghours`
--
ALTER TABLE `doctorworkinghours`
  ADD PRIMARY KEY (`hospital_id`,`d_nid`,`start_time`,`end_time`,`day_name`);

--
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`prescription_id`,`drug_name`,`power`,`drug_type`,`description`);

--
-- Indexes for table `educationqualification`
--
ALTER TABLE `educationqualification`
  ADD PRIMARY KEY (`p_nid`,`reg_number`,`roll`,`institute_name`,`start_year`,`end_year`,`board_name`,`up_toclass`,`certificate_name`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `hospitalbrance`
--
ALTER TABLE `hospitalbrance`
  ADD PRIMARY KEY (`hospital_id`,`brance_name`,`street`,`city`,`zip_code`,`road_no`,`block`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `fk_messagepnid` (`p_nid`),
  ADD KEY `fk_messagednid` (`d_nid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_nid`);

--
-- Indexes for table `patientbelow18`
--
ALTER TABLE `patientbelow18`
  ADD PRIMARY KEY (`childbirth_id`),
  ADD KEY `fk_patientbelow18guardian` (`guardian_nid`) USING BTREE;

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`nid`),
  ADD UNIQUE KEY `finger_print` (`finger_print`),
  ADD UNIQUE KEY `retina_print` (`retina_print`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`),
  ADD UNIQUE KEY `birth_id` (`birth_id`),
  ADD KEY `fk_fathernid` (`father_nid`),
  ADD KEY `fk_mothernid` (`mother_nid`),
  ADD KEY `fk_hasbandnid` (`husband_nid`),
  ADD KEY `fk_gender` (`gender`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `fk_patientpost` (`p_nid`),
  ADD KEY `fk_doctorpost` (`d_nid`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescription_id`),
  ADD KEY `fk_prescriptionpatient` (`p_nid`),
  ADD KEY `fk_prescriptionchild` (`childbirth_id`),
  ADD KEY `fk_prescriptiondoctor` (`d_nid`),
  ADD KEY `fk_docref` (`doctor_ref`);

--
-- Indexes for table `reviewfordoctor`
--
ALTER TABLE `reviewfordoctor`
  ADD PRIMARY KEY (`p_nid`,`d_nid`),
  ADD KEY `fk_dnid` (`d_nid`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `testreport`
--
ALTER TABLE `testreport`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `fk_testreport` (`prescription_id`),
  ADD KEY `fk_testreporttest` (`test_id`),
  ADD KEY `fk_testreporthos` (`hospital_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentpost`
--
ALTER TABLE `commentpost`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `testreport`
--
ALTER TABLE `testreport`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_appointmentdnid` FOREIGN KEY (`d_nid`) REFERENCES `doctor` (`d_nid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_appointmentpnid` FOREIGN KEY (`p_nid`) REFERENCES `patient` (`p_nid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commentpost`
--
ALTER TABLE `commentpost`
  ADD CONSTRAINT `fk_commentpostdr` FOREIGN KEY (`d_nid`) REFERENCES `doctor` (`d_nid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_commentpostpat` FOREIGN KEY (`p_nid`) REFERENCES `patient` (`p_nid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_commentpostpost` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detectdisease`
--
ALTER TABLE `detectdisease`
  ADD CONSTRAINT `fk_detectdisease` FOREIGN KEY (`prescription_id`) REFERENCES `prescription` (`prescription_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `docregistry`
--
ALTER TABLE `docregistry`
  ADD CONSTRAINT `fk_docregistrydmdc` FOREIGN KEY (`dmdc_id`) REFERENCES `dmdc` (`dmdc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_docregistrydoc` FOREIGN KEY (`d_nid`) REFERENCES `doctor` (`d_nid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_docregistryhos` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `fk_doctordmdcid` FOREIGN KEY (`dmdc_id`) REFERENCES `dmdc` (`dmdc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_doctornid` FOREIGN KEY (`d_nid`) REFERENCES `person` (`nid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctorchamber`
--
ALTER TABLE `doctorchamber`
  ADD CONSTRAINT `fk_doctorchamber` FOREIGN KEY (`d_nid`) REFERENCES `doctor` (`d_nid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctordegree`
--
ALTER TABLE `doctordegree`
  ADD CONSTRAINT `fk_dmdcid` FOREIGN KEY (`dmdc_id`) REFERENCES `dmdc` (`dmdc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctorgivetest`
--
ALTER TABLE `doctorgivetest`
  ADD CONSTRAINT `fk_doctorgivetest` FOREIGN KEY (`prescription_id`) REFERENCES `prescription` (`prescription_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_doctorgivetestid` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctorworking`
--
ALTER TABLE `doctorworking`
  ADD CONSTRAINT `fk_doctorworkingdr` FOREIGN KEY (`d_nid`) REFERENCES `doctor` (`d_nid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_doctorworkinghos` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctorworkinghours`
--
ALTER TABLE `doctorworkinghours`
  ADD CONSTRAINT `fk_doctorworkinghours` FOREIGN KEY (`hospital_id`,`d_nid`) REFERENCES `doctorworking` (`hospital_id`, `d_nid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drug`
--
ALTER TABLE `drug`
  ADD CONSTRAINT `fk_drug` FOREIGN KEY (`prescription_id`) REFERENCES `prescription` (`prescription_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `educationqualification`
--
ALTER TABLE `educationqualification`
  ADD CONSTRAINT `fk_nid` FOREIGN KEY (`p_nid`) REFERENCES `person` (`nid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hospitalbrance`
--
ALTER TABLE `hospitalbrance`
  ADD CONSTRAINT `fk_brance` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_messagednid` FOREIGN KEY (`d_nid`) REFERENCES `doctor` (`d_nid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_messagepnid` FOREIGN KEY (`p_nid`) REFERENCES `patient` (`p_nid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `fk_paitent` FOREIGN KEY (`p_nid`) REFERENCES `person` (`nid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patientbelow18`
--
ALTER TABLE `patientbelow18`
  ADD CONSTRAINT `fk_patientbelow18father` FOREIGN KEY (`guardian_nid`) REFERENCES `patient` (`p_nid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `fk_fathernid` FOREIGN KEY (`father_nid`) REFERENCES `person` (`nid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_gender` FOREIGN KEY (`gender`) REFERENCES `gender` (`gender_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hasbandnid` FOREIGN KEY (`husband_nid`) REFERENCES `person` (`nid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mothernid` FOREIGN KEY (`mother_nid`) REFERENCES `person` (`nid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_doctorpost` FOREIGN KEY (`d_nid`) REFERENCES `doctor` (`d_nid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_patientpost` FOREIGN KEY (`p_nid`) REFERENCES `patient` (`p_nid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `fk_docref` FOREIGN KEY (`doctor_ref`) REFERENCES `doctor` (`d_nid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prescriptionchild` FOREIGN KEY (`childbirth_id`) REFERENCES `patientbelow18` (`childbirth_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prescriptiondoctor` FOREIGN KEY (`d_nid`) REFERENCES `doctor` (`d_nid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prescriptionpatient` FOREIGN KEY (`p_nid`) REFERENCES `patient` (`p_nid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviewfordoctor`
--
ALTER TABLE `reviewfordoctor`
  ADD CONSTRAINT `fk_dnid` FOREIGN KEY (`d_nid`) REFERENCES `doctor` (`d_nid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pnid` FOREIGN KEY (`p_nid`) REFERENCES `patient` (`p_nid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testreport`
--
ALTER TABLE `testreport`
  ADD CONSTRAINT `fk_testreport` FOREIGN KEY (`prescription_id`) REFERENCES `prescription` (`prescription_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_testreporthos` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_testreporttest` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
