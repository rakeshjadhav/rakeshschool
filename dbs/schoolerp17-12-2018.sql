-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2018 at 02:51 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolerp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verification_code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `role`, `email`, `password`, `verification_code`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'myschool@admin.com', '9f47720e1d35f2e21e277b146757e064', '', 'yes', '2018-08-12 08:59:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `attendence_type`
--

CREATE TABLE `attendence_type` (
  `id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key_value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attendence_type`
--

INSERT INTO `attendence_type` (`id`, `type`, `key_value`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Present', '<b class=\"text text-success\">P</b>', 'yes', '2016-06-23 23:41:37', '0000-00-00 00:00:00'),
(2, 'Late with excuse', '<b class=\"text text-warning\">E</b>', 'yes', '2016-10-11 17:05:44', '0000-00-00 00:00:00'),
(3, 'Late', '<b class=\"text text-warning\">L</b>', 'yes', '2016-06-23 23:42:28', '0000-00-00 00:00:00'),
(4, 'Absent', '<b class=\"text text-danger\">A</b>', 'yes', '2016-10-11 17:05:40', '0000-00-00 00:00:00'),
(5, 'Holiday', 'H', 'yes', '2016-10-11 17:05:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `book_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isbn_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rack_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `publish` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `perunitcost` float(10,2) DEFAULT NULL,
  `postdate` date DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `available` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'yes',
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_title`, `book_no`, `isbn_no`, `subject`, `rack_no`, `publish`, `author`, `qty`, `perunitcost`, `postdate`, `description`, `available`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'ty', '101', '123', 'ddd', '123', 'sd', 'cdf', 10, 333.00, '2018-10-28', 'ddddddd', 'yes', 'no', '2018-10-21 16:34:24', '0000-00-00 00:00:00'),
(2, 'logistic and chain management', 'demo', '102', 'BCA  V Sem', '1', '', 'Roy manrchand', 10, 250.00, '2018-12-13', '', 'yes', 'no', '2018-12-11 08:33:49', '0000-00-00 00:00:00'),
(3, 'Bining Accounting Book', '101', '123', 'mum', '12', 'Mum', 'mum', 15, 45.00, '2018-11-21', 'swcf', 'yes', 'no', '2018-12-11 08:33:37', '0000-00-00 00:00:00'),
(4, 'English Grammer Book', '101', '123', 'BCA  V Sem', '1', 'Rakesh Jadhav', 'Roy manrchand', 100, 250.00, '1970-03-12', 'Roy manrchand', 'yes', 'no', '2018-11-13 07:27:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `book_issues`
--

CREATE TABLE `book_issues` (
  `id` int(11) UNSIGNED NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `is_returned` int(11) DEFAULT '0',
  `member_id` int(11) DEFAULT NULL,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_issues`
--

INSERT INTO `book_issues` (`id`, `book_id`, `return_date`, `issue_date`, `is_returned`, `member_id`, `is_active`, `created_at`) VALUES
(3, 2, '2018-10-28', '2018-10-28', 0, 3, 'no', '2018-10-28 18:01:12'),
(4, 2, '2018-10-28', '2018-10-28', 1, 1, 'no', '2018-10-28 18:08:11'),
(5, 2, '2018-10-28', '2018-10-28', 1, 1, 'no', '2018-10-28 18:08:00'),
(6, 1, '2018-11-05', '2018-11-04', 0, 1, 'no', '2018-11-04 18:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'OBC', 'no', '2018-09-22 06:50:52', '0000-00-00 00:00:00'),
(3, 'Open', 'no', '2018-09-22 06:50:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `certificate_name` varchar(100) NOT NULL,
  `certificate_text` text NOT NULL,
  `left_header` varchar(100) NOT NULL,
  `center_header` varchar(100) NOT NULL,
  `right_header` varchar(100) NOT NULL,
  `left_footer` varchar(100) NOT NULL,
  `right_footer` varchar(100) NOT NULL,
  `center_footer` varchar(100) NOT NULL,
  `background_image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_for` tinyint(1) NOT NULL COMMENT '1 = staff, 2 = students',
  `status` tinyint(1) NOT NULL,
  `header_height` int(11) NOT NULL,
  `content_height` int(11) NOT NULL,
  `footer_height` int(11) NOT NULL,
  `content_width` int(11) NOT NULL,
  `enable_student_image` tinyint(1) NOT NULL COMMENT '0=no,1=yes',
  `enable_image_height` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `certificate_name`, `certificate_text`, `left_header`, `center_header`, `right_header`, `left_footer`, `right_footer`, `center_footer`, `background_image`, `created_at`, `updated_at`, `created_for`, `status`, `header_height`, `content_height`, `footer_height`, `content_width`, `enable_student_image`, `enable_image_height`) VALUES
(1, 'Sample Transfer Certificate', 'This is certify that <b>[name]</b> has born on [dob]  <br> and have following details [present_address] [guardian] [created_at] [admission_no] [roll_no] [class] [section] [gender] [admission_date] [category] [cast] [father_name] [mother_name] [religion] [email] [phone] .<br>We wish best of luck for future endeavors.', 'Reff. No.......................', '', 'Date: ___/____/_______', '.................................<br>Authority Sign', '.................................<br>Principal Sign', '.................................<br>Class Teacher Sign', 'sampletc12.png', '2018-09-05 19:47:33', '0000-00-00 00:00:00', 2, 1, 360, 400, 480, 810, 1, 230);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Class 1', 'no', '2018-09-18 13:53:52', '0000-00-00 00:00:00'),
(2, 'Class 2', 'no', '2018-09-18 13:53:57', '0000-00-00 00:00:00'),
(3, 'Class 3', 'no', '2018-09-18 13:54:05', '0000-00-00 00:00:00'),
(4, 'Class 4', 'no', '2018-09-18 13:54:13', '0000-00-00 00:00:00'),
(5, 'V', 'no', '2018-12-17 10:57:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `class_division`
--

CREATE TABLE `class_division` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `class_division`
--

INSERT INTO `class_division` (`id`, `class_id`, `division_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'no', '2018-09-18 13:53:52', '0000-00-00 00:00:00'),
(2, 2, 1, 'no', '2018-09-18 13:53:57', '0000-00-00 00:00:00'),
(3, 2, 2, 'no', '2018-09-18 13:53:57', '0000-00-00 00:00:00'),
(4, 3, 1, 'no', '2018-09-18 13:54:05', '0000-00-00 00:00:00'),
(5, 3, 2, 'no', '2018-09-18 13:54:05', '0000-00-00 00:00:00'),
(6, 3, 3, 'no', '2018-09-18 13:54:05', '0000-00-00 00:00:00'),
(7, 4, 1, 'no', '2018-09-18 13:54:13', '0000-00-00 00:00:00'),
(8, 4, 2, 'no', '2018-09-18 13:54:13', '0000-00-00 00:00:00'),
(9, 4, 3, 'no', '2018-09-18 13:54:13', '0000-00-00 00:00:00'),
(10, 4, 4, 'no', '2018-09-18 13:54:13', '0000-00-00 00:00:00'),
(11, 5, 1, 'no', '2018-12-17 10:57:49', '0000-00-00 00:00:00'),
(12, 5, 6, 'no', '2018-12-17 10:57:49', '0000-00-00 00:00:00'),
(13, 5, 3, 'no', '2018-12-17 10:58:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `class_teacher`
--

CREATE TABLE `class_teacher` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_teacher`
--

INSERT INTO `class_teacher` (`id`, `class_id`, `staff_id`, `division_id`) VALUES
(1, 1, 13, 1),
(2, 2, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_public` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'No',
  `class_id` int(11) DEFAULT NULL,
  `file` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `type`, `is_public`, `class_id`, `file`, `note`, `is_active`, `created_at`, `updated_at`, `date`) VALUES
(1, 'ddd', 'Assignments', 'No', 1, 'uploads/school_content/material/1.pdf', 'ffff', 'no', '2018-10-10 16:27:48', '0000-00-00 00:00:00', '2018-10-10'),
(2, 'update', 'Study Material', 'Yes', 0, 'uploads/school_content/material/2.pdf', 'df', 'no', '2018-10-10 16:42:10', '0000-00-00 00:00:00', '2018-01-08'),
(3, 'assi', 'Syllabus', 'No', 2, 'uploads/school_content/material/3.docx', '', 'no', '2018-10-16 18:13:03', '0000-00-00 00:00:00', '2018-10-23'),
(4, 'sd', 'Other Download', 'No', 4, 'uploads/school_content/material/4.docx', '', 'no', '2018-10-16 18:14:20', '0000-00-00 00:00:00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(200) NOT NULL,
  `is_active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `is_active`) VALUES
(2, 'Demo1', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `division` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `division`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'A', 'no', '2018-09-18 13:53:35', '0000-00-00 00:00:00'),
(3, 'C', 'no', '2018-09-18 13:53:41', '0000-00-00 00:00:00'),
(4, 'D', 'no', '2018-09-18 13:53:44', '0000-00-00 00:00:00'),
(6, 'B', 'no', '2018-10-22 19:12:17', '0000-00-00 00:00:00'),
(7, 'E', 'no', '2018-12-17 10:57:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(200) NOT NULL,
  `department` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `mother_name` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `local_address` varchar(300) NOT NULL,
  `note` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `verification_code` varchar(100) NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `work_exp` varchar(200) NOT NULL,
  `emergency_contact_no` varchar(200) NOT NULL,
  `marital_status` varchar(100) NOT NULL,
  `date_of_joining` date NOT NULL,
  `date_of_leaving` date NOT NULL,
  `permanent_address` varchar(200) NOT NULL,
  `account_title` varchar(200) NOT NULL,
  `bank_account_no` varchar(200) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `ifsc_code` varchar(200) NOT NULL,
  `bank_branch` varchar(100) NOT NULL,
  `payscale` varchar(200) NOT NULL,
  `basic_salary` varchar(200) NOT NULL,
  `epf_no` varchar(200) NOT NULL,
  `shift` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `resume` varchar(200) NOT NULL,
  `joining_letter` varchar(200) NOT NULL,
  `resignation_letter` varchar(200) NOT NULL,
  `other_document_name` varchar(200) NOT NULL,
  `other_document_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_id`, `department`, `designation`, `name`, `surname`, `father_name`, `mother_name`, `contact_no`, `email`, `dob`, `local_address`, `note`, `image`, `password`, `gender`, `user_id`, `is_active`, `verification_code`, `qualification`, `work_exp`, `emergency_contact_no`, `marital_status`, `date_of_joining`, `date_of_leaving`, `permanent_address`, `account_title`, `bank_account_no`, `bank_name`, `ifsc_code`, `bank_branch`, `payscale`, `basic_salary`, `epf_no`, `shift`, `location`, `resume`, `joining_letter`, `resignation_letter`, `other_document_name`, `other_document_file`) VALUES
(0, '', '', '', 'Super Admin', '', '', '', '', 'sa@gmail.com', '0000-00-00', '', '', '', '$2y$10$4i6RGHyOrFSYEndB5Quzc.dbwpvEWWaxBPcRg/.cgCO4k3eJhGfcu', '', 0, 1, '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, '101', 'IT Department', 'Sr. PHP Developer ', 'Rakesh', 'Jadhav', 'Ramesh', 'Reshama', '7744963663', 'sadmin@gmail.com', '1994-06-20', 'cotton Green mumbai\r\nborivali west rta', 'demo', 'uploads/employee_images/11.jpg', '$2y$10$4i6RGHyOrFSYEndB5Quzc.dbwpvEWWaxBPcRg/.cgCO4k3eJhGfcu', '1', 0, 1, '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, '1', '2', '1', 'demo', 'demo', 'demo', 'demo', '9224258371', 'demo1@gmail.com', '2018-12-03', 'Plot no R 929', 'qw', '', '$2y$10$4i6RGHyOrFSYEndB5Quzc.dbwpvEWWaxBPcRg/.cgCO4k3eJhGfcu', 'Male', 0, 1, '', 'qw', 'qw', '1234567890', 'Single', '2018-12-03', '0000-00-00', '', 'sss', '222222', 'bank of india', '3333', 'sdfff', '', '', '', '', '', 'uploads/staff_images/resume12.png', 'uploads/staff_images/joining_letter12.pdf', '', 'uploads/staff_images/Other Doucment', 'otherdocument12.pdf'),
(13, '100', '2', '1', 'Rakesh', 'Jadhav', 'Ramesh', 'Reshama', '9224258371', 'ass@gmail.com', '2018-12-11', 'ss', 'ss', 'uploads/staff_images/13.jpg', '$2y$10$EKjmfFivYOJrhP9BIDy.XO2FVqWa4zBd/jymKTKo7JOHmIC17YxD.', 'Male', 0, 1, '', 'sss', 'ss', '1234567890', 'Married', '2018-12-11', '0000-00-00', 'sss', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, '233', '2', '5', 'Tushar', 'jadhav', 'df', 'ff', '23456', 'admin@techvill.net', '2018-12-17', 'dsDCsD', 'regawvrear', 'uploads/staff_images/14.jpg', '$2y$10$4i6RGHyOrFSYEndB5Quzc.dbwpvEWWaxBPcRg/.cgCO4k3eJhGfcu', 'Male', 0, 1, '', 'fvsf', 'regvrevr', '123456', 'Married', '2018-12-17', '0000-00-00', 'sdfvsrs', 'fsdzfgvert', 'gggrefr', 'fsrewrfw', '4524frrw3', 'dsfvsf', '', '30000', '123', 'day', 'dfDfvde', 'uploads/staff_images/resume14.pdf', 'uploads/staff_images/joining_letter14.doc', '', 'Other Document', 'otherdocument14.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave_details`
--

CREATE TABLE `employee_leave_details` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `alloted_leave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_leave_details`
--

INSERT INTO `employee_leave_details` (`id`, `staff_id`, `leave_type_id`, `alloted_leave`) VALUES
(1, 14, 4, '10'),
(2, 14, 5, '10'),
(3, 14, 6, '10');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave_request`
--

CREATE TABLE `employee_leave_request` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `leave_days` int(11) NOT NULL,
  `employee_remark` varchar(200) NOT NULL,
  `admin_remark` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `applied_by` varchar(200) NOT NULL,
  `document_file` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_leave_request`
--

INSERT INTO `employee_leave_request` (`id`, `staff_id`, `leave_type_id`, `leave_from`, `leave_to`, `leave_days`, `employee_remark`, `admin_remark`, `status`, `applied_by`, `document_file`, `date`) VALUES
(1, 0, 0, '2018-11-05', '2018-11-05', 1, 'sss', '', 'pending', 'Super Admin', '', '2018-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sesion_id` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedules`
--

CREATE TABLE `exam_schedules` (
  `id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `teacher_subject_id` int(11) DEFAULT NULL,
  `date_of_exam` date DEFAULT NULL,
  `start_to` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_from` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_marks` int(11) DEFAULT NULL,
  `passing_marks` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `exp_head_id` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `documents` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'yes',
  `is_deleted` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feecategory`
--

CREATE TABLE `feecategory` (
  `id` int(11) NOT NULL,
  `category` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feemasters`
--

CREATE TABLE `feemasters` (
  `id` int(11) NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `feetype_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_discounts`
--

CREATE TABLE `fees_discounts` (
  `id` int(11) NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `description` text,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feetype`
--

CREATE TABLE `feetype` (
  `id` int(11) NOT NULL,
  `feecategory_id` int(11) DEFAULT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `is_system` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feetype`
--

INSERT INTO `feetype` (`id`, `feecategory_id`, `type`, `code`, `is_active`, `created_at`, `updated_at`, `description`, `is_system`) VALUES
(1, NULL, 'Enrollment ( Fees are subject to change )', '001', 'no', '2018-11-20 09:38:14', '0000-00-00 00:00:00', 'All Students, except high school students enrolling for less than 11.5 units through the Concurrent Enrollment or Middle College High School Program and College Consortium Programs. These fees are waived for recipients of the California College Promise Grant.', 0),
(2, NULL, 'Enrollment - Bachelor of Science in Respiratory Ca', '002', 'no', '2018-11-20 02:13:45', '0000-00-00 00:00:00', 'All Students that are new graduates and have completed the CoARC accredited Respiratory Care program equivalent to an A.S. in Respiratory Care and are California licensure eligible or Respiratory Care Practitioners who have completed a CoARC accredited Respiratory Care program equivalent to an A.S. in Respiratory Care and are California licensure eligible and accepted into the Bachelor of Science Respiratory Care program at Skyline College will pay $130 per unit for upper division coursework. Students eligible for the California College Promise Grant (FAFSA or Dream Act Application) will only waive $46 per unit and total cost to the student is $84 per unit.', 0),
(3, NULL, 'Audit', '003', 'no', '2018-11-20 02:14:01', '0000-00-00 00:00:00', '', 0),
(5, NULL, 'International Student Application Fee', '005', 'no', '2018-11-20 02:14:28', '0000-00-00 00:00:00', '', 0),
(8, NULL, 'dd', 'dd', 'no', '2018-11-20 09:29:20', '0000-00-00 00:00:00', 'ddd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fee_groups`
--

CREATE TABLE `fee_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` text,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_system` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee_groups`
--

INSERT INTO `fee_groups` (`id`, `name`, `description`, `is_active`, `created_at`, `is_system`) VALUES
(2, 'qqww123', 'dddd123', 'no', '2018-11-20 09:59:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fee_groups_feetype`
--

CREATE TABLE `fee_groups_feetype` (
  `id` int(11) NOT NULL,
  `fee_session_group_id` int(11) DEFAULT NULL,
  `fee_groups_id` int(11) DEFAULT NULL,
  `feetype_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee_groups_feetype`
--

INSERT INTO `fee_groups_feetype` (`id`, `fee_session_group_id`, `fee_groups_id`, `feetype_id`, `session_id`, `due_date`, `amount`, `is_active`, `created_at`) VALUES
(3, 3, 2, 1, 11, '2018-11-20', '12000.00', 'no', '2018-11-20 11:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `fee_session_groups`
--

CREATE TABLE `fee_session_groups` (
  `id` int(11) NOT NULL,
  `fee_groups_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee_session_groups`
--

INSERT INTO `fee_session_groups` (`id`, `fee_groups_id`, `session_id`, `is_active`, `created_at`) VALUES
(3, 2, 11, 'no', '2018-11-20 11:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `point` float(10,1) DEFAULT NULL,
  `mark_from` float(10,2) DEFAULT NULL,
  `mark_upto` float(10,2) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `homework_date` date NOT NULL,
  `submit_date` date NOT NULL,
  `staff_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `create_date` date NOT NULL,
  `document` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL,
  `evaluated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`id`, `class_id`, `section_id`, `homework_date`, `submit_date`, `staff_id`, `subject_id`, `description`, `create_date`, `document`, `created_by`, `evaluated_by`) VALUES
(1, 1, 1, '2018-12-11', '2018-12-12', 0, 2, 'demo', '2018-12-11', 'one.csv', 0, 0),
(2, 2, 1, '2018-12-10', '2018-12-11', 0, 2, 'ty', '2018-12-11', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `homework_evaluation`
--

CREATE TABLE `homework_evaluation` (
  `id` int(11) NOT NULL,
  `homework_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `id` int(11) NOT NULL,
  `hostel_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `intake` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hostel_rooms`
--

CREATE TABLE `hostel_rooms` (
  `id` int(11) NOT NULL,
  `hostel_id` int(11) DEFAULT NULL,
  `room_type_id` int(11) DEFAULT NULL,
  `room_no` varchar(200) DEFAULT NULL,
  `no_of_bed` int(11) DEFAULT NULL,
  `cost_per_bed` float(10,2) DEFAULT '0.00',
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `language` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Azerbaijan', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(2, 'Albanian', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(3, 'Amharic', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(4, 'English', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(5, 'Arabic', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(7, 'Afrikaans', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(8, 'Basque', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(11, 'Bengali', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(13, 'Bosnian', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(14, 'Welsh', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(15, 'Hungarian', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(16, 'Vietnamese', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(17, 'Haitian (Creole)', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(18, 'Galician', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(19, 'Dutch', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(21, 'Greek', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(22, 'Georgian', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(23, 'Gujarati', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(24, 'Danish', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(25, 'Hebrew', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(26, 'Yiddish', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(27, 'Indonesian', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(28, 'Irish', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(29, 'Italian', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(30, 'Icelandic', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(31, 'Spanish', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(33, 'Kannada', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(34, 'Catalan', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(36, 'Chinese', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(37, 'Korean', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(38, 'Xhosa', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(39, 'Latin', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(40, 'Latvian', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(41, 'Lithuanian', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(43, 'Malagasy', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(44, 'Malay', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(45, 'Malayalam', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(46, 'Maltese', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(47, 'Macedonian', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(48, 'Maori', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(49, 'Marathi', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(51, 'Mongolian', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(52, 'German', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(53, 'Nepali', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(54, 'Norwegian', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(55, 'Punjabi', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(57, 'Persian', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(59, 'Portuguese', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(60, 'Romanian', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(61, 'Russian', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(62, 'Cebuano', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(64, 'Sinhala', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(65, 'Slovakian', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(66, 'Slovenian', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(67, 'Swahili', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(68, 'Sundanese', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(70, 'Thai', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(71, 'Tagalog', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(72, 'Tamil', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(74, 'Telugu', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(75, 'Turkish', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(77, 'Uzbek', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(79, 'Urdu', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(80, 'Finnish', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(81, 'French', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(82, 'Hindi', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(84, 'Czech', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(85, 'Swedish', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(86, 'Scottish', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(87, 'Estonian', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(88, 'Esperanto', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(89, 'Javanese', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00'),
(90, 'Japanese', 'no', 'no', '2017-04-06 10:38:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `is_active` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `type`, `is_active`) VALUES
(4, 'Medical Leaves', 'yes'),
(5, 'Casual Leave', 'yes'),
(6, 'Maternity Leave', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `libarary_members`
--

CREATE TABLE `libarary_members` (
  `id` int(11) UNSIGNED NOT NULL,
  `library_card_no` varchar(50) DEFAULT NULL,
  `member_type` varchar(50) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libarary_members`
--

INSERT INTO `libarary_members` (`id`, `library_card_no`, `member_type`, `member_id`, `is_active`, `created_at`) VALUES
(1, '', 'student', 4, 'no', '2018-10-27 18:11:54'),
(2, NULL, 'student', NULL, 'no', '2018-10-27 18:16:18'),
(3, '', 'student', 7, 'no', '2018-10-27 18:25:06'),
(4, NULL, 'teacher', NULL, 'no', '2018-11-01 18:33:29'),
(5, '', 'teacher', 3, 'no', '2018-11-01 18:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `librarians`
--

CREATE TABLE `librarians` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `address` text,
  `dob` date DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `librarians`
--

INSERT INTO `librarians` (`id`, `name`, `email`, `password`, `address`, `dob`, `designation`, `sex`, `phone`, `image`, `is_active`, `created_at`) VALUES
(1, 'ddd', 'rakeshjadhav933@gmail.com', NULL, 'Maharashtra Mumbai\r\nBldg no 41,Room no 2071, Gandhi nagar , M.H.B. colany , Bandra east near sai baba temple,', '2018-10-21', NULL, 'Male', '+917744963663', 'uploads/librarian_images/1.png', 'no', '2018-10-21 16:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `notification_roles`
--

CREATE TABLE `notification_roles` (
  `id` int(11) NOT NULL,
  `send_notification_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification_setting`
--

CREATE TABLE `notification_setting` (
  `id` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `is_mail` varchar(10) DEFAULT '0',
  `is_sms` varchar(10) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification_setting`
--

INSERT INTO `notification_setting` (`id`, `type`, `is_mail`, `is_sms`, `created_at`) VALUES
(1, 'student_admission', '1', '0', '2018-05-22 13:00:07'),
(2, 'exam_result', '1', '0', '2018-05-22 13:00:07'),
(3, 'fee_submission', '1', '0', '2018-05-22 13:00:07'),
(4, 'absent_attendence', '1', '0', '2018-07-11 17:43:02'),
(5, 'login_credential', '1', '0', '2018-05-22 13:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `payment_settings`
--

CREATE TABLE `payment_settings` (
  `id` int(11) NOT NULL,
  `payment_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `api_username` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `api_secret_key` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `api_publishable_key` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `api_password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `api_signature` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `api_email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal_demo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `account_no` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_category`
--

CREATE TABLE `permission_category` (
  `id` int(11) NOT NULL,
  `perm_group_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `short_code` varchar(100) DEFAULT NULL,
  `enable_view` int(11) DEFAULT '0',
  `enable_add` int(11) DEFAULT '0',
  `enable_edit` int(11) DEFAULT '0',
  `enable_delete` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission_category`
--

INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES
(1, 1, 'General Setting', 'general_setting', 1, 0, 1, 0, '2018-12-01 11:34:40'),
(2, 2, 'Designation', 'designation', 1, 1, 1, 1, '2018-12-01 11:59:12'),
(3, 2, 'Department', 'department', 1, 1, 1, 1, '2018-12-01 12:39:55'),
(4, 3, 'Division', 'division', 1, 1, 1, 1, '2018-12-04 03:55:06'),
(5, 3, 'Class', 'classes', 1, 1, 1, 1, '2018-12-05 23:44:53'),
(6, 3, 'Teacher', 'teacher', 1, 1, 1, 1, '2018-12-04 03:55:06'),
(7, 3, 'Subject', 'subject', 1, 1, 1, 1, '2018-12-04 03:55:06'),
(8, 3, 'Assign Subject', 'assign_subject', 1, 1, 1, 1, '2018-12-04 03:55:06'),
(9, 3, 'Class Timetable', 'class_timetable', 1, 1, 1, 1, '2018-12-04 03:55:06'),
(10, 3, 'Assign Teacher', 'assign_teacher', 1, 1, 1, 1, '2018-12-04 03:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `permission_group`
--

CREATE TABLE `permission_group` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `short_code` varchar(100) NOT NULL,
  `is_active` int(11) DEFAULT '0',
  `system` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission_group`
--

INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES
(1, 'System Settings', 'system_settings', 1, 1, '2018-11-30 18:30:00'),
(2, 'Management', 'management', 1, 1, '2018-12-01 11:59:59'),
(3, 'Academic', 'academic', 1, 1, '2018-12-04 03:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `read_notification`
--

CREATE TABLE `read_notification` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `parent_id` int(10) NOT NULL,
  `notification_id` int(11) DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `read_notification`
--

INSERT INTO `read_notification` (`id`, `student_id`, `parent_id`, `notification_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, 'no', '2018-11-05 18:16:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0',
  `is_system` int(1) NOT NULL DEFAULT '0',
  `is_superadmin` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 0, 1, 0, '2018-06-30 10:09:11', '0000-00-00 00:00:00'),
(2, 'Teacher', NULL, 0, 1, 0, '2018-06-30 10:09:14', '0000-00-00 00:00:00'),
(3, 'Accountant', NULL, 0, 1, 0, '2018-06-30 10:09:17', '0000-00-00 00:00:00'),
(4, 'Librarian', NULL, 0, 1, 0, '2018-06-30 10:09:21', '0000-00-00 00:00:00'),
(6, 'Receptionist', NULL, 0, 1, 0, '2018-07-02 00:09:03', '0000-00-00 00:00:00'),
(7, 'Super Admin', NULL, 0, 1, 1, '2018-07-11 08:41:29', '0000-00-00 00:00:00'),
(9, 'test123', NULL, 0, 0, 0, '2018-12-01 06:08:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `perm_cat_id` int(11) DEFAULT NULL,
  `can_view` int(11) DEFAULT NULL,
  `can_add` int(11) DEFAULT NULL,
  `can_edit` int(11) DEFAULT NULL,
  `can_delete` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES
(1, 1, 1, 1, 0, 0, 0, '2018-12-01 11:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` int(11) NOT NULL,
  `room_type` varchar(200) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `school_houses`
--

CREATE TABLE `school_houses` (
  `id` int(11) NOT NULL,
  `house_name` varchar(200) NOT NULL,
  `description` varchar(400) NOT NULL,
  `is_active` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sch_settings`
--

CREATE TABLE `sch_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `lang_id` int(11) DEFAULT NULL,
  `dise_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_format` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `currency_symbol` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_rtl` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'disabled',
  `timezone` varchar(30) COLLATE utf8_unicode_ci DEFAULT 'UTC',
  `session_id` int(11) DEFAULT NULL,
  `start_month` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theme` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `class_teacher` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sch_settings`
--

INSERT INTO `sch_settings` (`id`, `name`, `email`, `phone`, `address`, `lang_id`, `dise_code`, `date_format`, `currency`, `currency_symbol`, `is_rtl`, `timezone`, `session_id`, `start_month`, `image`, `theme`, `is_active`, `created_at`, `updated_at`, `class_teacher`) VALUES
(1, 'XYZdddd', 'xyz@gmail.com', '7744963663', 'The animator, Mumbai, Maharashtra', 4, '123456', 'm/d/Y', 'IN', 'Rs', 'disabled', 'Asia/Kolkata', 11, '4', 'uploads/school_content/logo/1.png', 'default.jpg', 'no', '2018-12-01 08:08:00', '0000-00-00 00:00:00', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `send_notification`
--

CREATE TABLE `send_notification` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `date` date DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `visible_student` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `visible_teacher` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `visible_parent` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `created_by` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `send_notification`
--

INSERT INTO `send_notification` (`id`, `title`, `publish_date`, `date`, `message`, `visible_student`, `visible_teacher`, `visible_parent`, `created_by`, `created_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'demo', '2018-10-31', '1923-03-12', '<p><b>sss</b></p>', 'Yes', 'No', 'No', 'admin', 1, 'no', '2018-10-30 17:58:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `session` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES
(7, '2016-17', 'no', '2017-04-20 12:12:19', '0000-00-00 00:00:00'),
(11, '2017-18', 'no', '2017-04-20 12:11:37', '0000-00-00 00:00:00'),
(13, '2018-19', 'no', '2016-08-25 00:56:44', '0000-00-00 00:00:00'),
(14, '2019-20', 'no', '2016-08-25 00:56:55', '0000-00-00 00:00:00'),
(15, '2020-21', 'no', '2016-10-01 10:58:08', '0000-00-00 00:00:00'),
(16, '2021-22', 'no', '2016-10-01 10:58:20', '0000-00-00 00:00:00'),
(18, '2022-23', 'no', '2016-10-01 10:59:02', '0000-00-00 00:00:00'),
(19, '2023-24', 'no', '2016-10-01 10:59:10', '0000-00-00 00:00:00'),
(20, '2024-25', 'no', '2016-10-01 10:59:18', '0000-00-00 00:00:00'),
(21, '2025-26', 'no', '2016-10-01 11:00:10', '0000-00-00 00:00:00'),
(22, '2026-27', 'no', '2016-10-01 11:00:18', '0000-00-00 00:00:00'),
(23, '2027-28', 'no', '2016-10-01 11:00:24', '0000-00-00 00:00:00'),
(24, '2028-29', 'no', '2016-10-01 11:00:30', '0000-00-00 00:00:00'),
(25, '2029-30', 'no', '2016-10-01 11:00:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(200) NOT NULL,
  `department` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `work_exp` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `mother_name` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `emergency_contact_no` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `marital_status` varchar(100) NOT NULL,
  `date_of_joining` date NOT NULL,
  `date_of_leaving` date NOT NULL,
  `local_address` varchar(300) NOT NULL,
  `permanent_address` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `account_title` varchar(200) NOT NULL,
  `bank_account_no` varchar(200) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `ifsc_code` varchar(200) NOT NULL,
  `bank_branch` varchar(100) NOT NULL,
  `payscale` varchar(200) NOT NULL,
  `basic_salary` varchar(200) NOT NULL,
  `epf_no` varchar(200) NOT NULL,
  `contract_type` varchar(100) NOT NULL,
  `shift` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `linkedin` varchar(200) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  `resume` varchar(200) NOT NULL,
  `joining_letter` varchar(200) NOT NULL,
  `resignation_letter` varchar(200) NOT NULL,
  `other_document_name` varchar(200) NOT NULL,
  `other_document_file` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `verification_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `employee_id`, `department`, `designation`, `qualification`, `work_exp`, `name`, `surname`, `father_name`, `mother_name`, `contact_no`, `emergency_contact_no`, `email`, `dob`, `marital_status`, `date_of_joining`, `date_of_leaving`, `local_address`, `permanent_address`, `note`, `image`, `password`, `gender`, `account_title`, `bank_account_no`, `bank_name`, `ifsc_code`, `bank_branch`, `payscale`, `basic_salary`, `epf_no`, `contract_type`, `shift`, `location`, `facebook`, `twitter`, `linkedin`, `instagram`, `resume`, `joining_letter`, `resignation_letter`, `other_document_name`, `other_document_file`, `user_id`, `is_active`, `verification_code`) VALUES
(0, '1', '', '', '', '', 'Super Admin', '', '', '', '', '', 'myschool@gmail.com', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '', '', '', '$2y$10$asVJLPEzmMpRgFrJ5TcYkexY/ZL26U/5URwwOJ0.ZpDRVfcto4wNi', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `staff_designation`
--

CREATE TABLE `staff_designation` (
  `id` int(11) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `is_active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_designation`
--

INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES
(1, 'developer', 'yes'),
(5, 'Accountant', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `staff_payroll`
--

CREATE TABLE `staff_payroll` (
  `id` int(11) NOT NULL,
  `basic_salary` int(11) NOT NULL,
  `pay_scale` varchar(200) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `is_active` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff_payslip`
--

CREATE TABLE `staff_payslip` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `basic` int(11) NOT NULL,
  `total_allowance` int(11) NOT NULL,
  `total_deduction` int(11) NOT NULL,
  `leave_deduction` int(11) NOT NULL,
  `tax` varchar(200) NOT NULL,
  `net_salary` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `month` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `payment_mode` varchar(200) NOT NULL,
  `payment_date` date NOT NULL,
  `remark` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff_roles`
--

CREATE TABLE `staff_roles` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_roles`
--

INSERT INTO `staff_roles` (`id`, `role_id`, `staff_id`, `is_active`, `created_at`, `updated_at`) VALUES
(0, 7, 0, 0, '2018-11-17 09:09:26', '0000-00-00 00:00:00'),
(23, 1, 12, 0, '2018-12-03 12:25:27', '0000-00-00 00:00:00'),
(24, 2, 13, 0, '2018-12-04 09:39:58', '0000-00-00 00:00:00'),
(25, 2, 14, 0, '2018-12-17 11:11:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `admission_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `roll_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admission_date` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rte` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobileno` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pincode` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `religion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cast` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_address` text COLLATE utf8_unicode_ci,
  `permanent_address` text COLLATE utf8_unicode_ci,
  `category_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `route_id` int(11) NOT NULL,
  `school_house_id` int(11) NOT NULL,
  `blood_group` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `vehroute_id` int(11) NOT NULL,
  `adhar_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `samagra_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_account_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ifsc_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_is` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_occupation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_occupation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_relation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_occupation` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `guardian_address` text COLLATE utf8_unicode_ci,
  `guardian_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `father_pic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mother_pic` int(200) NOT NULL,
  `guardian_pic` int(200) NOT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `previous_school` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `disable_at` date NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `created_at`, `updated_at`, `disable_at`, `note`) VALUES
(3, 0, '001', '1', '2018-09-22', 'Rakesh', 'Jadhav', 'Yes', 'uploads/student_images/3.png', '1234567890', 'rakeshjadhav933@gmail.com', NULL, NULL, NULL, 'Hindu', 'Open', '2018-09-11', 'Male', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', '    ', '3', 0, 0, '', 0, '1234567890877', '1234567890877', 'ICIC47125896354', 'ICICI', 'ICICI745896', 'mother', 'Ramesh Tukaram Jadhav', '7744963663', 'Self Employee', 'Reshama Ramesh Jadhav', '7744963663', 'housewife', 'Reshama Ramesh Jadhav', 'Mother', '7744963663', 'housewife', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', 'admin@admin.com', '', 0, 0, 'yes', 'Lal bahadur shatri', '2018-11-22 12:03:19', '0000-00-00 00:00:00', '0000-00-00', ''),
(4, 0, '002', '2', '2018-09-22', 'Rahul', 'Jadhav', 'No', 'uploads/student_images/4.png', '1234567890', 'rakeshjadhav933@gmail.com', NULL, NULL, NULL, 'Hindu', 'Open', '2018-09-04', 'Male', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', ' ', '3', 0, 0, '', 0, '1234567890877', '1234567890877', 'ICIC47125896354', 'ICICI', 'ICICI745896', 'mother', 'Ramesh Tukaram Jadhav', '7744963663', 'Self Employee', 'Reshama Ramesh Jadhav', '7744963663', 'housewife', 'Reshama Ramesh Jadhav', 'Mother', '7744963663', 'housewife', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', 'admin@admin.com', '', 0, 0, 'yes', '', '2018-11-22 12:03:16', '0000-00-00 00:00:00', '0000-00-00', ''),
(5, 0, '12', '133', '2018-12-06', 'dsff', 'ffdf', 'No', NULL, '3323333332', 'rakesh@gmail.com', 'maha', 'mum', '400155', '', '', '2018-12-06', NULL, '', '', NULL, 0, 0, '', 0, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 0, 0, 'yes', NULL, '2018-11-22 12:03:13', '0000-00-00 00:00:00', '0000-00-00', ''),
(6, 0, '12', '133', '2018-12-06', 'dsff', 'ffdf', 'No', NULL, '3323333332', 'rakesh@gmail.com', 'maha', 'mum', '400155', '', '', '2018-12-06', NULL, '', '', NULL, 0, 0, '', 0, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 0, 0, 'yes', NULL, '2018-11-22 12:03:11', '0000-00-00 00:00:00', '0000-00-00', ''),
(7, 0, '12', '133', '2018-12-06', 'dsff', 'ffdf', 'No', NULL, '3323333332', 'rakesh@gmail.com', 'maha', 'mum', '400155', '', '', '2018-12-06', NULL, '', '', NULL, 0, 0, '', 0, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 0, 0, 'yes', NULL, '2018-11-22 12:03:08', '0000-00-00 00:00:00', '0000-00-00', ''),
(8, 0, '007', '10', '2018-11-05', 'Rakesh', 'Jadhav', 'No', 'uploads/student_images/8.png', '7744963663', 'rakeshjadhav933@gmail.com', NULL, NULL, NULL, 'Hindu', 'Maratha', '1994-06-20', 'Male', 'Maharashtra Mumbai\r\nBldg no 41,Room no 2071, Gandhi nagar , M.H.B. colany , Bandra east near sai baba temple,', ' ', '3', 0, 0, '', 0, '', '', '', '', '', 'father', 'Ramesh Tukaram Jadhav', '+917744963663', 'Self Employee', 'Reshama Ramesh Jadhav', '+917744963663', 'housewife', 'Ramesh Tukaram Jadhav', 'Father', '+917744963663', 'Self Employee', 'Maharashtra Mumbai\r\nBldg no 41,Room no 2071, Gandhi nagar , M.H.B. colany , Bandra east near sai baba temple,', 'rakeshjadhav933@gmail.com', '', 0, 0, 'yes', '', '2018-11-22 12:02:52', '0000-00-00 00:00:00', '0000-00-00', ''),
(9, 0, '111', '111', '2018-11-22', 'demo', 'demo', 'No', 'uploads/student_images/9.png', '1234567890', 'as@gmail.com', NULL, NULL, NULL, 'demo', 'demo', '2018-11-22', 'Male', '', ' ', '3', 0, 0, '', 0, '', '', '', '', '', 'father', 'demo', '1234567890', 'farmer', 'demo', '1234567890', 'housewife', 'demo', 'Father', '1234567890', 'farmer', '', '', '', 0, 0, 'yes', '', '2018-11-22 10:38:22', '0000-00-00 00:00:00', '0000-00-00', ''),
(10, 0, '678', '122', '2018-12-11', 'Ganesh', 'Shinde', 'No', 'uploads/student_images/no_image.png', '7744696366', 'admin@gmail.com', NULL, NULL, NULL, 'Hindu', 'Open', '2018-12-11', 'Male', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', ' ', '3', 0, 0, 'A-', 0, '', '', '', '', '', 'father', 'Ramesh Tukaram Jadhav', '7744963663', 'Self Employee', 'Reshama Ramesh Jadhav', '7744963663', 'housewife', 'Ramesh Tukaram Jadhav', 'Father', '7744963663', 'Self Employee', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', '', '', 0, 0, 'yes', '', '2018-12-11 23:02:33', '0000-00-00 00:00:00', '0000-00-00', ''),
(11, 0, '4343354', '555', '2018-12-12', 'ewe', 'rewrr', 'No', 'uploads/student_images/no_image.png', '09819142331', 'admin@gmail.com', NULL, NULL, NULL, 'Hindu', 'Open', '2018-12-11', 'Male', 'Maharashtra Mumbai\r\nBldg no 41,Room no 2071, Gandhi nagar , M.H.B. colany , Bandra east near sai baba temple,', ' ', '2', 0, 0, 'O+', 0, 'sdsadsad', 'sdsadsad', 'dsadsda', 'dsdsdsd', 'sdsdsad', 'father', 'Ramesh Tukaram Jadhav', '+917744963663', 'Self Employee', 'Reshama Ramesh Jadhav', '+917744963663', 'housewife', 'Ramesh Tukaram Jadhav', 'Father', '+917744963663', 'Self Employee', 'Maharashtra Mumbai\r\nBldg no 41,Room no 2071, Gandhi nagar , M.H.B. colany , Bandra east near sai baba temple,', '', '', 0, 0, 'yes', 'sadsaddsdsad', '2018-12-11 23:09:32', '0000-00-00 00:00:00', '0000-00-00', ''),
(12, 0, '434335456', '555', '2018-12-12', 'rrr', 'ddd', 'No', 'uploads/student_images/no_image.png', '09819142331', 'admin@gmail.com', NULL, NULL, NULL, '', 'Open', '2018-12-11', 'Male', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', ' ', '2', 0, 0, 'B-', 0, 'sdsadsad', 'sdsadsad', 'dsadsda', 'dsdsdsd', 'sdsdsad', 'father', 'Ramesh Tukaram Jadhav', '7744963663', 'Self Employee', 'Reshama Ramesh Jadhav', '7744963663', 'housewife', 'rrr ddd', 'Father', '7744963663', 'Self Employee', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', '', '', 0, 0, 'yes', '', '2018-12-11 23:13:22', '0000-00-00 00:00:00', '0000-00-00', ''),
(13, 0, '434335456333', '555', '2018-12-12', 'rrr', 'ddd', 'No', 'uploads/student_images/no_image.png', '09819142331', '', NULL, NULL, NULL, '', 'Open', '2018-12-11', 'Male', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', ' ', '2', 0, 0, 'AB+', 0, 'sdsadsad', 'sdsadsad', 'dsadsda', 'dsdsdsd', 'sdsdsad', 'father', 'Ramesh Tukaram Jadhav', '7744963663', 'Self Employee', 'Reshama Ramesh Jadhav', '7744963663', 'housewife', 'Ramesh Tukaram Jadhav', 'Father', '7744963663', 'Self Employee', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', '', '', 0, 0, 'yes', '', '2018-12-11 23:15:07', '0000-00-00 00:00:00', '0000-00-00', ''),
(14, 0, '565656', '555', '2018-12-12', 'er', 'rrrr', 'No', 'uploads/student_images/no_image.png', '09819142331', 'admin@gmail.com', NULL, NULL, NULL, 'Hindu', 'Open', '2018-12-11', 'Male', '', ' ', '2', 0, 0, 'O+', 0, 'sdsadsad', 'sdsadsad', 'dsadsda', 'dsdsdsd', 'sdsdsad', 'father', 'demo', '1234567890', 'farmer', 'demo', '1234567890', 'housewife', 'demo', 'Father', '1234567890', 'farmer', '', '', '', 0, 0, 'yes', '', '2018-12-11 23:16:26', '0000-00-00 00:00:00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendences`
--

CREATE TABLE `student_attendences` (
  `id` int(11) NOT NULL,
  `student_session_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `attendence_type_id` int(11) DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_doc`
--

CREATE TABLE `student_doc` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `doc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_doc`
--

INSERT INTO `student_doc` (`id`, `student_id`, `title`, `doc`) VALUES
(2, 1, 'Reshancard', 'society reci 04-Aug-2018 10-03-37.pdf'),
(3, 1, 'light bill', 'wsu-css-cheat-sheet.pdf'),
(4, 2, 'Reshancard', 'society reci 04-Aug-2018 10-03-37.pdf'),
(5, 2, 'light bill', '2017114642.jpg'),
(7, 3, 'ads', 'Class Timetable.pdf'),
(8, 3, 'demo', 'Arunodaya Affidavit.pdf'),
(9, 4, 'Admission form', 'Arunoday University Admissiom Form.pdf'),
(12, 4, 'Admission form', 'Curriculum_Vitae(bsc.it).docx'),
(13, 7, 'Admission form', 'Book2.csv'),
(14, 8, 'Admission form', 'C-fikhPUAAAvLro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `id` int(11) NOT NULL,
  `student_session_id` int(11) DEFAULT NULL,
  `feemaster_id` int(11) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `amount_discount` float(10,2) NOT NULL,
  `amount_fine` float(10,2) NOT NULL DEFAULT '0.00',
  `description` text COLLATE utf8_unicode_ci,
  `date` date DEFAULT '0000-00-00',
  `payment_mode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_fees_deposite`
--

CREATE TABLE `student_fees_deposite` (
  `id` int(11) NOT NULL,
  `student_fees_master_id` int(11) DEFAULT NULL,
  `fee_groups_feetype_id` int(11) DEFAULT NULL,
  `amount_detail` text,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_fees_discounts`
--

CREATE TABLE `student_fees_discounts` (
  `id` int(11) NOT NULL,
  `student_session_id` int(11) DEFAULT NULL,
  `fees_discount_id` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'assigned',
  `payment_id` varchar(50) DEFAULT NULL,
  `description` text,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_fees_master`
--

CREATE TABLE `student_fees_master` (
  `id` int(11) NOT NULL,
  `student_session_id` int(11) DEFAULT NULL,
  `fee_session_group_id` int(11) DEFAULT NULL,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_system` int(1) NOT NULL DEFAULT '0',
  `amount` float(10,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_fees_master`
--

INSERT INTO `student_fees_master` (`id`, `student_session_id`, `fee_session_group_id`, `is_active`, `created_at`, `is_system`, `amount`) VALUES
(5, 7, 3, 'yes', '2018-11-26 19:13:47', 0, 0.00),
(6, 2, 3, 'yes', '2018-11-26 19:13:51', 0, 0.00),
(7, 6, 3, 'yes', '2018-11-26 19:13:55', 0, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `student_session`
--

CREATE TABLE `student_session` (
  `id` int(11) NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `route_id` int(11) NOT NULL,
  `vehroute_id` int(10) DEFAULT NULL,
  `transport_fees` float(10,2) NOT NULL DEFAULT '0.00',
  `fees_discount` float(10,2) NOT NULL DEFAULT '0.00',
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_session`
--

INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `division_id`, `route_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 11, 3, 4, 4, 0, 0, 0.00, 0.00, 'no', '2018-09-28 18:46:33', '0000-00-00 00:00:00'),
(2, 11, 4, 1, 1, 0, 0, 0.00, 0.00, 'no', '2018-09-22 10:43:34', '0000-00-00 00:00:00'),
(3, 11, 7, 1, 1, 0, NULL, 0.00, 0.00, 'no', '2018-09-24 09:36:23', '0000-00-00 00:00:00'),
(4, 7, 4, 1, 1, 0, NULL, 0.00, 0.00, 'no', '2018-10-29 18:17:59', '0000-00-00 00:00:00'),
(5, 7, 7, 1, 1, 0, NULL, 0.00, 0.00, 'no', '2018-10-29 18:17:59', '0000-00-00 00:00:00'),
(6, 11, 8, 1, 1, 0, 0, 0.00, 0.00, 'no', '2018-11-05 17:21:23', '0000-00-00 00:00:00'),
(7, 11, 9, 1, 1, 0, 0, 0.00, 0.00, 'no', '2018-11-22 10:27:46', '0000-00-00 00:00:00'),
(8, 11, 10, 2, 1, 0, 0, 0.00, 0.00, 'no', '2018-12-11 23:02:33', '0000-00-00 00:00:00'),
(9, 11, 11, 3, 3, 0, 0, 0.00, 0.00, 'no', '2018-12-11 23:09:32', '0000-00-00 00:00:00'),
(10, 11, 12, 2, 1, 0, 0, 0.00, 0.00, 'no', '2018-12-11 23:13:22', '0000-00-00 00:00:00'),
(11, 11, 13, 4, 3, 0, 0, 0.00, 0.00, 'no', '2018-12-11 23:15:07', '0000-00-00 00:00:00'),
(12, 11, 14, 1, 1, 0, 0, 0.00, 0.00, 'no', '2018-12-11 23:16:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_transport_fees`
--

CREATE TABLE `student_transport_fees` (
  `id` int(11) NOT NULL,
  `student_session_id` int(11) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `amount_discount` float(10,2) NOT NULL,
  `amount_fine` float(10,2) NOT NULL DEFAULT '0.00',
  `description` text COLLATE utf8_unicode_ci,
  `date` date DEFAULT '0000-00-00',
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `payment_mode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `code`, `type`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'Hindi', '123', 'Theory', 'no', '2018-09-18 13:55:48', '0000-00-00 00:00:00'),
(3, 'Marathi', 'MAR123', 'Theory', 'no', '2018-09-18 13:55:58', '0000-00-00 00:00:00'),
(4, 'Mathematics', '1234', 'Practical', 'no', '2018-09-18 13:56:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `dob` date DEFAULT NULL,
  `designation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `password`, `address`, `dob`, `designation`, `sex`, `phone`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'Rahul Ramesh Jadhav', 'rahuljadhav@gmail.com', NULL, 'Maharashtra Mumbai\r\nBldg no 41,Room no 2071, Gandhi nagar , M.H.B. colany , Bandra east near sai baba temple,', '1970-01-01', NULL, 'Male', '8149139782', 'uploads/teacher_images/2.png', 'no', '2018-09-18 11:49:04', '0000-00-00 00:00:00'),
(3, 'Ganesh Mores', 'ganesh@tech.coms', NULL, '386, A, Drupadi Building, Flat No.6, 1st Floor, V.P.Road, Near Congress House', '1970-01-01', NULL, 'Female', '7744963663', 'uploads/teacher_images/3.png', 'no', '2018-09-18 11:48:13', '0000-00-00 00:00:00'),
(4, 'Ms. Smurti Mogare', 'admin@admin.com', NULL, 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', '2018-10-18', NULL, 'Female', '+917744963663', 'uploads/teacher_images/4.png', 'no', '2018-10-18 18:14:46', '0000-00-00 00:00:00'),
(5, 'Rakesh Jadhav', 'rakesh@admin.com', NULL, 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', '2018-10-30', NULL, 'Male', '+917744963663', 'uploads/teacher_images/5.png', 'no', '2018-10-30 18:02:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subjects`
--

CREATE TABLE `teacher_subjects` (
  `id` int(11) NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `class_division_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher_subjects`
--

INSERT INTO `teacher_subjects` (`id`, `session_id`, `class_division_id`, `subject_id`, `teacher_id`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 2, 13, NULL, 'no', '2018-12-11 07:37:24', '0000-00-00 00:00:00'),
(2, 11, 2, 2, 13, NULL, 'no', '2018-12-11 07:38:17', '0000-00-00 00:00:00'),
(3, 11, 3, 3, 3, NULL, 'no', '2018-09-20 04:58:59', '0000-00-00 00:00:00'),
(4, 11, 7, 2, 2, NULL, 'no', '2018-09-20 04:59:28', '0000-00-00 00:00:00'),
(5, 11, 7, 3, 3, NULL, 'no', '2018-09-20 04:59:28', '0000-00-00 00:00:00'),
(6, 11, 7, 4, 2, NULL, 'no', '2018-09-20 04:59:28', '0000-00-00 00:00:00'),
(7, 11, 1, 3, 13, NULL, 'no', '2018-12-11 07:37:24', '0000-00-00 00:00:00'),
(8, 11, 1, 4, 13, NULL, 'no', '2018-12-11 07:37:24', '0000-00-00 00:00:00'),
(9, 11, 10, 2, 2, NULL, 'no', '2018-10-17 19:01:54', '0000-00-00 00:00:00'),
(10, 11, 9, 3, 3, NULL, 'no', '2018-10-17 19:02:48', '0000-00-00 00:00:00'),
(11, 11, 2, 3, 13, NULL, 'no', '2018-12-11 07:38:17', '0000-00-00 00:00:00'),
(12, 11, 4, 2, 13, NULL, 'no', '2018-12-11 07:38:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` int(11) NOT NULL,
  `teacher_subject_id` int(20) DEFAULT NULL,
  `day_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_time` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_time` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_no` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Monday', '10:00 AM', '11:00 PM', '1', 'no', '2018-09-20 09:00:23', '0000-00-00 00:00:00'),
(2, 1, 'Tuesday', '11:00 AM', '11:00 PM', '2', 'no', '2018-09-20 09:00:23', '0000-00-00 00:00:00'),
(3, 1, 'Wednesday', '11:00 PM', '11:00 PM', '3', 'no', '2018-09-20 09:00:23', '0000-00-00 00:00:00'),
(4, 1, 'Thursday', '11:00 PM', '11:00 PM', '4', 'no', '2018-09-20 09:00:23', '0000-00-00 00:00:00'),
(5, 1, 'Friday', '11:00 PM', '11:00 PM', '5', 'no', '2018-09-20 09:00:23', '0000-00-00 00:00:00'),
(6, 1, 'Saturday', '03:00 AM', '11:00 PM', '6', 'no', '2018-09-20 09:00:23', '0000-00-00 00:00:00'),
(7, 1, 'Sunday', '05:00 AM', '11:00 PM', '7', 'no', '2018-09-20 09:00:23', '0000-00-00 00:00:00'),
(8, 7, 'Monday', '10:00 AM', '11:00 PM', '1', 'no', '2018-09-20 09:58:21', '0000-00-00 00:00:00'),
(9, 7, 'Tuesday', '11:00 AM', '11:00 PM', '2', 'no', '2018-09-20 09:58:21', '0000-00-00 00:00:00'),
(10, 7, 'Wednesday', '11:00 PM', '11:00 PM', '3', 'no', '2018-09-20 09:58:21', '0000-00-00 00:00:00'),
(11, 7, 'Thursday', '11:00 PM', '11:00 PM', '4', 'no', '2018-09-20 09:58:22', '0000-00-00 00:00:00'),
(12, 7, 'Friday', '02:00 AM', '11:00 PM', '5', 'no', '2018-09-20 09:58:22', '0000-00-00 00:00:00'),
(13, 7, 'Saturday', '03:00 AM', '11:00 PM', '6', 'no', '2018-09-20 09:58:22', '0000-00-00 00:00:00'),
(14, 7, 'Sunday', '05:00 AM', '11:00 PM', '7', 'no', '2018-09-20 09:58:22', '0000-00-00 00:00:00'),
(15, 4, 'Monday', '10:00 AM', '11:00 PM', '1', 'no', '2018-10-16 18:31:16', '0000-00-00 00:00:00'),
(16, 4, 'Tuesday', '11:00 AM', '11:00 PM', '2', 'no', '2018-10-16 18:31:17', '0000-00-00 00:00:00'),
(17, 4, 'Wednesday', '11:00 PM', '11:00 PM', '3', 'no', '2018-10-16 18:31:17', '0000-00-00 00:00:00'),
(18, 4, 'Thursday', '11:00 PM', '11:00 PM', '4', 'no', '2018-10-16 18:31:17', '0000-00-00 00:00:00'),
(19, 4, 'Friday', '02:00 AM', '11:00 PM', '5', 'no', '2018-10-16 18:31:17', '0000-00-00 00:00:00'),
(20, 4, 'Saturday', '03:00 AM', '11:00 PM', '6', 'no', '2018-10-16 18:31:17', '0000-00-00 00:00:00'),
(21, 4, 'Sunday', '05:00 AM', '11:00 PM', '7', 'no', '2018-10-16 18:31:17', '0000-00-00 00:00:00'),
(22, 8, 'Monday', '10:00 AM', '11:00 PM', '1', 'no', '2018-10-25 17:38:47', '0000-00-00 00:00:00'),
(23, 8, 'Tuesday', '11:00 AM', '11:00 PM', '2', 'no', '2018-10-25 17:38:47', '0000-00-00 00:00:00'),
(24, 8, 'Wednesday', '', '', '', 'no', '2018-10-25 17:38:47', '0000-00-00 00:00:00'),
(25, 8, 'Thursday', '', '', '', 'no', '2018-10-25 17:38:47', '0000-00-00 00:00:00'),
(26, 8, 'Friday', '', '', '', 'no', '2018-10-25 17:38:47', '0000-00-00 00:00:00'),
(27, 8, 'Saturday', '', '', '', 'no', '2018-10-25 17:38:47', '0000-00-00 00:00:00'),
(28, 8, 'Sunday', '', '', '', 'no', '2018-10-25 17:38:47', '0000-00-00 00:00:00'),
(29, 2, 'Monday', '09:30', '10:30', '1', 'no', '2018-12-04 04:30:38', '0000-00-00 00:00:00'),
(30, 2, 'Tuesday', '10:30', '11:30', '2', 'no', '2018-12-04 04:30:38', '0000-00-00 00:00:00'),
(31, 2, 'Wednesday', '11:30', '12:30', '3', 'no', '2018-12-04 04:30:38', '0000-00-00 00:00:00'),
(32, 2, 'Thursday', '12:30', '01:30', '4', 'no', '2018-12-04 04:30:38', '0000-00-00 00:00:00'),
(33, 2, 'Friday', '02:30', '03:00', '5', 'no', '2018-12-04 04:30:38', '0000-00-00 00:00:00'),
(34, 2, 'Saturday', '', '', '', 'no', '2018-12-04 04:30:38', '0000-00-00 00:00:00'),
(35, 2, 'Sunday', '', '', '', 'no', '2018-12-04 04:30:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transport_route`
--

CREATE TABLE `transport_route` (
  `id` int(11) NOT NULL,
  `route_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_of_vehicle` int(11) DEFAULT NULL,
  `fare` float(10,2) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `user` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  `user_agent` varchar(500) DEFAULT NULL,
  `login_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES
(1, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-15 14:33:24'),
(2, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-16 18:02:48'),
(3, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-17 17:02:54'),
(4, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-20 12:30:36'),
(5, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-21 06:02:04'),
(6, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-21 06:03:01'),
(7, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-21 10:34:45'),
(8, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-21 10:55:56'),
(9, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-21 11:13:15'),
(10, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-21 17:59:45'),
(11, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-23 14:23:13'),
(12, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-24 05:10:13'),
(13, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-24 10:24:34'),
(14, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-25 05:41:49'),
(15, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-26 10:29:30'),
(16, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-26 17:18:30'),
(17, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-27 07:29:49'),
(18, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-29 18:35:20'),
(19, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-30 07:02:56'),
(20, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-30 17:34:41'),
(21, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-31 05:04:15'),
(22, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-31 12:25:54'),
(23, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-01 11:31:40'),
(24, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-01 17:56:17'),
(25, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-02 04:54:22'),
(26, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-02 18:12:23'),
(27, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-04 17:35:27'),
(28, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-05 14:19:38'),
(29, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-05 18:21:37'),
(30, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-07 17:47:27'),
(31, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-08 17:39:41'),
(32, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-09 04:53:07'),
(33, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-11 17:28:18'),
(34, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-12 14:15:09'),
(35, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-12 14:19:58'),
(36, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-12 14:30:02'),
(37, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-13 18:24:30'),
(38, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-15 05:13:40'),
(39, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-15 17:28:42'),
(40, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-15 17:46:29'),
(41, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-15 17:46:55'),
(42, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-16 17:34:29'),
(43, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-18 18:38:33'),
(44, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-20 18:06:56'),
(45, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-21 17:12:27'),
(46, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-23 18:26:04'),
(47, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-25 07:49:04'),
(48, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-28 05:35:51'),
(49, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-29 10:47:52'),
(50, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-30 05:46:46'),
(51, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-31 13:27:50'),
(52, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-04 09:32:16'),
(53, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-04 10:16:42'),
(54, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-05 04:56:05'),
(55, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-05 04:56:56'),
(56, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-06 05:00:32'),
(57, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-06 12:38:39'),
(58, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-06 17:24:54'),
(59, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-08 10:35:15'),
(60, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-09 02:13:45'),
(61, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-09 02:29:18'),
(62, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-09 02:49:50'),
(63, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-10 17:12:39'),
(64, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-11 11:13:50'),
(65, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-12 05:17:48'),
(66, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-18 05:20:43'),
(67, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-19 05:35:46'),
(68, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-19 13:10:53'),
(69, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-20 04:53:42'),
(70, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-20 18:15:23'),
(71, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-20 18:26:30'),
(72, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-21 05:38:50'),
(73, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-22 06:02:42'),
(74, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-24 05:19:28'),
(75, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-24 07:19:34'),
(76, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-24 13:08:32'),
(77, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-24 17:15:30'),
(78, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-25 18:01:22'),
(79, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-26 17:51:47'),
(80, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-27 17:31:05'),
(81, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-28 17:07:16'),
(82, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-01 17:52:49'),
(83, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-04 17:47:17'),
(84, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-06 19:17:12'),
(85, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-10 16:12:44'),
(86, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-16 17:51:06'),
(87, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-16 18:52:01'),
(88, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-17 17:44:33'),
(89, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-17 18:19:56'),
(90, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-17 19:07:28'),
(91, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-18 18:12:20'),
(92, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-19 17:54:33'),
(93, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-20 18:09:49'),
(94, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-21 16:15:32'),
(95, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-21 16:53:24'),
(96, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-21 17:03:57'),
(97, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-21 19:20:35'),
(98, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-21 19:27:21'),
(99, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-21 19:41:01'),
(100, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-22 17:06:53'),
(101, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-22 17:06:53'),
(102, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-22 17:14:22'),
(103, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-22 18:34:43'),
(104, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-22 18:44:58'),
(105, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-22 18:57:39'),
(106, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-22 19:01:17'),
(107, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-22 19:09:36'),
(108, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-23 17:20:36'),
(109, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-23 17:25:57'),
(110, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Android', '2018-10-23 18:51:29'),
(111, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-24 18:06:37'),
(112, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-24 18:15:50'),
(113, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-24 18:23:05'),
(114, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-25 17:34:59'),
(115, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-25 17:36:20'),
(116, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-25 17:37:30'),
(117, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-25 17:41:19'),
(118, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-25 18:04:41'),
(119, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-26 17:59:10'),
(120, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-27 17:50:06'),
(121, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-27 19:21:45'),
(122, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-28 17:59:05'),
(123, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-28 18:22:00'),
(124, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-28 19:05:22'),
(125, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-28 19:09:13'),
(126, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-29 17:49:13'),
(127, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-30 17:48:55'),
(128, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-30 18:01:39'),
(129, 'teacher5', 'teacher', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-30 18:03:49'),
(130, 'teacher5', 'teacher', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-30 18:11:50'),
(131, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-30 18:58:24'),
(132, 'teacher5', 'teacher', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-31 17:55:43'),
(133, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-11-01 18:07:26'),
(134, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-11-02 18:21:45'),
(135, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-11-04 17:59:13'),
(136, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-11-04 18:34:37'),
(137, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-11-04 18:36:03'),
(138, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-04 18:58:59'),
(139, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-05 17:16:29'),
(140, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-05 17:19:15'),
(141, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-05 17:28:38'),
(142, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-05 17:47:16'),
(143, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-05 17:57:00'),
(144, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-05 18:24:02'),
(145, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-05 18:39:26'),
(146, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Android', '2018-11-05 19:21:20'),
(147, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-05 19:31:23'),
(148, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-06 18:31:52'),
(149, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-07 18:06:41'),
(150, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-08 14:56:12'),
(151, 'rakesh', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-08 18:31:55'),
(152, 'rakesh', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-09 18:30:42'),
(153, 'parent8', 'parent', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-09 18:44:53'),
(154, 'parent8', 'parent', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-10 17:59:41'),
(155, 'parent8', 'parent', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-11 15:33:16'),
(156, 'parent8', 'parent', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-12 17:38:46'),
(157, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-12 18:14:07'),
(158, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.77, Windows 7', '2018-11-13 05:42:04'),
(159, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.77, Windows 7', '2018-11-12 20:07:43'),
(160, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.77, Windows 7', '2018-11-12 20:40:04'),
(161, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.102, Windows 7', '2018-11-19 13:18:17'),
(162, NULL, 'admin', '::1', 'Chrome 70.0.3538.102, Windows 7', '2018-11-19 13:18:17'),
(163, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-11-20 05:54:29'),
(164, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-11-20 05:54:29'),
(165, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-11-20 09:18:28'),
(166, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-11-20 09:18:28'),
(167, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 05:27:34'),
(168, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 05:27:35'),
(169, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 07:36:06'),
(170, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 07:36:06'),
(171, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:31:07'),
(172, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:31:07'),
(173, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:36:35'),
(174, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:36:35'),
(175, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:38:35'),
(176, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:38:35'),
(177, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:39:49'),
(178, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:39:49'),
(179, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:41:01'),
(180, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:41:01'),
(181, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:41:50'),
(182, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:41:50'),
(183, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:45:19'),
(184, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:45:19'),
(185, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:46:34'),
(186, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:46:34'),
(187, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:47:01'),
(188, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:47:01'),
(189, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:51:12'),
(190, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:51:12'),
(191, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 11:01:01'),
(192, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 11:01:01'),
(193, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 11:03:36'),
(194, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 11:03:36'),
(195, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 11:05:01'),
(196, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 11:05:01'),
(197, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Android', '2018-12-03 06:54:53'),
(198, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Android', '2018-12-03 06:54:54'),
(199, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-03 06:59:28'),
(200, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-03 06:59:29'),
(201, 'demo1@gmail.com', 'Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-03 13:25:08'),
(202, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-03 13:25:09'),
(203, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-03 13:26:20'),
(204, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-03 13:26:20'),
(205, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-04 04:06:59'),
(206, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-04 04:06:59'),
(207, 'sadmin@gmail.com', '', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-04 04:43:37'),
(208, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-04 04:43:37'),
(209, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-04 04:44:21'),
(210, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-04 04:44:21'),
(211, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-04 08:59:01'),
(212, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-04 08:59:01'),
(213, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-05 22:37:11'),
(214, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-05 22:37:12'),
(215, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-05 23:35:58'),
(216, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-05 23:35:58'),
(217, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-08 13:57:01'),
(218, NULL, 'admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-08 13:57:01'),
(219, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-11 07:32:17'),
(220, NULL, 'admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-11 07:32:17'),
(221, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-11 09:52:50'),
(222, NULL, 'admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-11 09:52:50'),
(223, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-11 20:00:58'),
(224, NULL, 'admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-11 20:00:59'),
(225, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-11 22:21:52'),
(226, NULL, 'admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-11 22:21:52'),
(227, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2018-12-15 10:04:38'),
(228, NULL, 'admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2018-12-15 10:04:43'),
(229, 'admin@techvill.net', 'Teacher', '::1', 'Chrome 71.0.3578.98, Windows 7', '2018-12-17 11:46:44'),
(230, NULL, 'admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2018-12-17 11:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `childs` text COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `verification_code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'teacher1', 'y9ary4', '', 'teacher', '', 'yes', '2018-06-29 13:42:47', '0000-00-00 00:00:00'),
(2, 1, 'std1', 'jhol91', '', 'student', '', 'yes', '2018-07-03 00:27:21', '0000-00-00 00:00:00'),
(5, 1, 'librarian1', '123456', '', 'librarian', '', 'yes', '2018-10-23 11:52:16', '0000-00-00 00:00:00'),
(6, 5, 'teacher5', 'hn5sii', '', 'teacher', '', 'yes', '2018-10-30 18:02:47', '0000-00-00 00:00:00'),
(7, 8, 'rakesh', 'rakesh', '', 'student', '', 'yes', '2018-11-08 18:31:02', '0000-00-00 00:00:00'),
(8, 8, 'parent8', '6envso', '8', 'parent', '', 'yes', '2018-11-05 17:21:23', '0000-00-00 00:00:00'),
(9, 9, 'std9', 'o7tqhj', '', 'student', '', 'yes', '2018-11-22 10:27:46', '0000-00-00 00:00:00'),
(10, 9, 'parent9', 'l0dium', '9', 'parent', '', 'yes', '2018-11-22 10:27:46', '0000-00-00 00:00:00'),
(11, 10, '10', 'lcszur', '', 'student', '', 'yes', '2018-12-11 23:02:33', '0000-00-00 00:00:00'),
(12, 11, '11', 'pbca8v', '', 'student', '', 'yes', '2018-12-11 23:09:32', '0000-00-00 00:00:00'),
(13, 12, 'std12', 'x4g6a4', '', 'student', '', 'yes', '2018-12-11 23:13:22', '0000-00-00 00:00:00'),
(14, 13, 'std13', '0deb6a', '', 'student', '', 'yes', '2018-12-11 23:15:07', '0000-00-00 00:00:00'),
(15, 14, 'std14', 'bmykgw', '', 'student', '', 'yes', '2018-12-11 23:16:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_no` varchar(20) DEFAULT NULL,
  `vehicle_model` varchar(100) NOT NULL DEFAULT 'None',
  `manufacture_year` varchar(4) DEFAULT NULL,
  `driver_name` varchar(50) DEFAULT NULL,
  `driver_licence` varchar(50) NOT NULL DEFAULT 'None',
  `driver_contact` varchar(20) DEFAULT NULL,
  `note` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_routes`
--

CREATE TABLE `vehicle_routes` (
  `id` int(11) UNSIGNED NOT NULL,
  `route_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendence_type`
--
ALTER TABLE `attendence_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_issues`
--
ALTER TABLE `book_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_division`
--
ALTER TABLE `class_division`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `section_id` (`division_id`);

--
-- Indexes for table `class_teacher`
--
ALTER TABLE `class_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leave_details`
--
ALTER TABLE `employee_leave_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leave_request`
--
ALTER TABLE `employee_leave_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_schedules`
--
ALTER TABLE `exam_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_subject_id` (`teacher_subject_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feecategory`
--
ALTER TABLE `feecategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feemasters`
--
ALTER TABLE `feemasters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_discounts`
--
ALTER TABLE `fees_discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `feetype`
--
ALTER TABLE `feetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_groups`
--
ALTER TABLE `fee_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_groups_feetype`
--
ALTER TABLE `fee_groups_feetype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fee_session_group_id` (`fee_session_group_id`),
  ADD KEY `fee_groups_id` (`fee_groups_id`),
  ADD KEY `feetype_id` (`feetype_id`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `fee_session_groups`
--
ALTER TABLE `fee_session_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fee_groups_id` (`fee_groups_id`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homework_evaluation`
--
ALTER TABLE `homework_evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_rooms`
--
ALTER TABLE `hostel_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Indexes for table `libarary_members`
--
ALTER TABLE `libarary_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarians`
--
ALTER TABLE `librarians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_roles`
--
ALTER TABLE `notification_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `send_notification_id` (`send_notification_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `notification_setting`
--
ALTER TABLE `notification_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_settings`
--
ALTER TABLE `payment_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_category`
--
ALTER TABLE `permission_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_group`
--
ALTER TABLE `permission_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `read_notification`
--
ALTER TABLE `read_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_houses`
--
ALTER TABLE `school_houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sch_settings`
--
ALTER TABLE `sch_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lang_id` (`lang_id`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `send_notification`
--
ALTER TABLE `send_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- Indexes for table `staff_designation`
--
ALTER TABLE `staff_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_payroll`
--
ALTER TABLE `staff_payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_payslip`
--
ALTER TABLE `staff_payslip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_roles`
--
ALTER TABLE `staff_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendences`
--
ALTER TABLE `student_attendences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_session_id` (`student_session_id`),
  ADD KEY `attendence_type_id` (`attendence_type_id`);

--
-- Indexes for table `student_doc`
--
ALTER TABLE `student_doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fees_deposite`
--
ALTER TABLE `student_fees_deposite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_fees_master_id` (`student_fees_master_id`),
  ADD KEY `fee_groups_feetype_id` (`fee_groups_feetype_id`);

--
-- Indexes for table `student_fees_discounts`
--
ALTER TABLE `student_fees_discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_session_id` (`student_session_id`),
  ADD KEY `fees_discount_id` (`fees_discount_id`);

--
-- Indexes for table `student_fees_master`
--
ALTER TABLE `student_fees_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_session_id` (`student_session_id`),
  ADD KEY `fee_session_group_id` (`fee_session_group_id`);

--
-- Indexes for table `student_session`
--
ALTER TABLE `student_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_transport_fees`
--
ALTER TABLE `student_transport_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_subjects`
--
ALTER TABLE `teacher_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_section_id` (`class_division_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_route`
--
ALTER TABLE `transport_route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_routes`
--
ALTER TABLE `vehicle_routes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendence_type`
--
ALTER TABLE `attendence_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `book_issues`
--
ALTER TABLE `book_issues`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class_division`
--
ALTER TABLE `class_division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `class_teacher`
--
ALTER TABLE `class_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee_leave_details`
--
ALTER TABLE `employee_leave_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_leave_request`
--
ALTER TABLE `employee_leave_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_schedules`
--
ALTER TABLE `exam_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feecategory`
--
ALTER TABLE `feecategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feemasters`
--
ALTER TABLE `feemasters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_discounts`
--
ALTER TABLE `fees_discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feetype`
--
ALTER TABLE `feetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fee_groups`
--
ALTER TABLE `fee_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fee_groups_feetype`
--
ALTER TABLE `fee_groups_feetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fee_session_groups`
--
ALTER TABLE `fee_session_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `homework_evaluation`
--
ALTER TABLE `homework_evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostel_rooms`
--
ALTER TABLE `hostel_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `libarary_members`
--
ALTER TABLE `libarary_members`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `librarians`
--
ALTER TABLE `librarians`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification_roles`
--
ALTER TABLE `notification_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_setting`
--
ALTER TABLE `notification_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_settings`
--
ALTER TABLE `payment_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_category`
--
ALTER TABLE `permission_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permission_group`
--
ALTER TABLE `permission_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `read_notification`
--
ALTER TABLE `read_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_houses`
--
ALTER TABLE `school_houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `send_notification`
--
ALTER TABLE `send_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_designation`
--
ALTER TABLE `staff_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff_payroll`
--
ALTER TABLE `staff_payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_payslip`
--
ALTER TABLE `staff_payslip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_roles`
--
ALTER TABLE `staff_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student_attendences`
--
ALTER TABLE `student_attendences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_doc`
--
ALTER TABLE `student_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_fees_deposite`
--
ALTER TABLE `student_fees_deposite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_fees_discounts`
--
ALTER TABLE `student_fees_discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_fees_master`
--
ALTER TABLE `student_fees_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_session`
--
ALTER TABLE `student_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_transport_fees`
--
ALTER TABLE `student_transport_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher_subjects`
--
ALTER TABLE `teacher_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `transport_route`
--
ALTER TABLE `transport_route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_routes`
--
ALTER TABLE `vehicle_routes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fees_discounts`
--
ALTER TABLE `fees_discounts`
  ADD CONSTRAINT `fees_discounts_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fee_groups_feetype`
--
ALTER TABLE `fee_groups_feetype`
  ADD CONSTRAINT `fee_groups_feetype_ibfk_1` FOREIGN KEY (`fee_session_group_id`) REFERENCES `fee_session_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fee_groups_feetype_ibfk_2` FOREIGN KEY (`fee_groups_id`) REFERENCES `fee_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fee_groups_feetype_ibfk_3` FOREIGN KEY (`feetype_id`) REFERENCES `feetype` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fee_groups_feetype_ibfk_4` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notification_roles`
--
ALTER TABLE `notification_roles`
  ADD CONSTRAINT `notification_roles_ibfk_1` FOREIGN KEY (`send_notification_id`) REFERENCES `send_notification` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notification_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
