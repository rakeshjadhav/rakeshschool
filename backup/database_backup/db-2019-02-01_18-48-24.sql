#
# TABLE STRUCTURE FOR: admin
#

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verification_code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `admin` (`id`, `username`, `role`, `email`, `password`, `verification_code`, `is_active`, `created_at`, `updated_at`) VALUES (1, 'Admin', 'admin', 'myschool@admin.com', '9f47720e1d35f2e21e277b146757e064', '', 'yes', '2018-08-12 14:29:35', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: attendence_type
#

DROP TABLE IF EXISTS `attendence_type`;

CREATE TABLE `attendence_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key_value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `attendence_type` (`id`, `type`, `key_value`, `is_active`, `created_at`, `updated_at`) VALUES (1, 'Present', '<b class=\"text text-success\">P</b>', 'yes', '2016-06-24 05:11:37', '0000-00-00 00:00:00');
INSERT INTO `attendence_type` (`id`, `type`, `key_value`, `is_active`, `created_at`, `updated_at`) VALUES (2, 'Late with excuse', '<b class=\"text text-warning\">E</b>', 'yes', '2016-10-11 22:35:44', '0000-00-00 00:00:00');
INSERT INTO `attendence_type` (`id`, `type`, `key_value`, `is_active`, `created_at`, `updated_at`) VALUES (3, 'Late', '<b class=\"text text-warning\">L</b>', 'yes', '2016-06-24 05:12:28', '0000-00-00 00:00:00');
INSERT INTO `attendence_type` (`id`, `type`, `key_value`, `is_active`, `created_at`, `updated_at`) VALUES (4, 'Absent', '<b class=\"text text-danger\">A</b>', 'yes', '2016-10-11 22:35:40', '0000-00-00 00:00:00');
INSERT INTO `attendence_type` (`id`, `type`, `key_value`, `is_active`, `created_at`, `updated_at`) VALUES (5, 'Holiday', 'H', 'yes', '2016-10-11 22:35:01', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: book_issues
#

DROP TABLE IF EXISTS `book_issues`;

CREATE TABLE `book_issues` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `is_returned` int(11) DEFAULT '0',
  `member_id` int(11) DEFAULT NULL,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `book_issues` (`id`, `book_id`, `return_date`, `issue_date`, `is_returned`, `member_id`, `is_active`, `created_at`) VALUES (3, 2, '2018-10-28', '2018-10-28', 0, 3, 'no', '2018-10-28 23:31:12');
INSERT INTO `book_issues` (`id`, `book_id`, `return_date`, `issue_date`, `is_returned`, `member_id`, `is_active`, `created_at`) VALUES (4, 2, '2018-10-28', '2018-10-28', 1, 1, 'no', '2018-10-28 23:38:11');
INSERT INTO `book_issues` (`id`, `book_id`, `return_date`, `issue_date`, `is_returned`, `member_id`, `is_active`, `created_at`) VALUES (5, 2, '2018-10-28', '2018-10-28', 1, 1, 'no', '2018-10-28 23:38:00');
INSERT INTO `book_issues` (`id`, `book_id`, `return_date`, `issue_date`, `is_returned`, `member_id`, `is_active`, `created_at`) VALUES (6, 1, '2018-11-05', '2018-11-04', 0, 1, 'no', '2018-11-05 00:06:33');


#
# TABLE STRUCTURE FOR: books
#

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `books` (`id`, `book_title`, `book_no`, `isbn_no`, `subject`, `rack_no`, `publish`, `author`, `qty`, `perunitcost`, `postdate`, `description`, `available`, `is_active`, `created_at`, `updated_at`) VALUES (1, 'ty', '101', '123', 'ddd', '123', 'sd', 'cdf', 10, '333.00', '2018-10-28', 'ddddddd', 'yes', 'no', '2018-10-21 22:04:24', '0000-00-00 00:00:00');
INSERT INTO `books` (`id`, `book_title`, `book_no`, `isbn_no`, `subject`, `rack_no`, `publish`, `author`, `qty`, `perunitcost`, `postdate`, `description`, `available`, `is_active`, `created_at`, `updated_at`) VALUES (2, 'logistic and chain management', 'demo', '102', 'BCA  V Sem', '1', '', 'Roy manrchand', 10, '250.00', '2018-12-13', '', 'yes', 'no', '2018-12-11 14:03:49', '0000-00-00 00:00:00');
INSERT INTO `books` (`id`, `book_title`, `book_no`, `isbn_no`, `subject`, `rack_no`, `publish`, `author`, `qty`, `perunitcost`, `postdate`, `description`, `available`, `is_active`, `created_at`, `updated_at`) VALUES (3, 'Bining Accounting Book', '101', '123', 'mum', '12', 'Mum', 'mum', 15, '45.00', '2018-11-21', 'swcf', 'yes', 'no', '2018-12-11 14:03:37', '0000-00-00 00:00:00');
INSERT INTO `books` (`id`, `book_title`, `book_no`, `isbn_no`, `subject`, `rack_no`, `publish`, `author`, `qty`, `perunitcost`, `postdate`, `description`, `available`, `is_active`, `created_at`, `updated_at`) VALUES (4, 'English Grammer Book', '101', '123', 'BCA  V Sem', '1', 'Rakesh Jadhav', 'Roy manrchand', 100, '250.00', '1970-03-12', 'Roy manrchand', 'yes', 'no', '2018-11-13 12:57:58', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: categories
#

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `categories` (`id`, `category`, `is_active`, `created_at`, `updated_at`) VALUES (2, 'OBC', 'no', '2018-09-22 12:20:52', '0000-00-00 00:00:00');
INSERT INTO `categories` (`id`, `category`, `is_active`, `created_at`, `updated_at`) VALUES (3, 'Open', 'no', '2018-09-22 12:20:58', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: certificates
#

DROP TABLE IF EXISTS `certificates`;

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `enable_image_height` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `certificates` (`id`, `certificate_name`, `certificate_text`, `left_header`, `center_header`, `right_header`, `left_footer`, `right_footer`, `center_footer`, `background_image`, `created_at`, `updated_at`, `created_for`, `status`, `header_height`, `content_height`, `footer_height`, `content_width`, `enable_student_image`, `enable_image_height`) VALUES (1, 'Sample Transfer Certificate', 'This is certify that <b>[name]</b> has born on [dob]  <br> and have following details [present_address] [guardian] [created_at] [admission_no] [roll_no] [class] [section] [gender] [admission_date] [category] [cast] [father_name] [mother_name] [religion] [email] [phone] .<br>We wish best of luck for future endeavors.', 'Reff. No.......................', '', 'Date: ___/____/_______', '.................................<br>Authority Sign', '.................................<br>Principal Sign', '.................................<br>Class Teacher Sign', 'sampletc12.png', '2018-09-06 01:17:33', '0000-00-00 00:00:00', 2, 1, 360, 400, 480, 810, 1, 230);


#
# TABLE STRUCTURE FOR: chapter
#

DROP TABLE IF EXISTS `chapter`;

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `chapter_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdesc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `chapter` (`id`, `class_id`, `division_id`, `subject_id`, `chapter_name`, `cdesc`, `is_active`, `created_at`, `updated_at`) VALUES (1, 1, 1, 2, 'Chapter1', 'Chapter1', 'yes', '2019-01-04 16:40:12', '0000-00-00 00:00:00');
INSERT INTO `chapter` (`id`, `class_id`, `division_id`, `subject_id`, `chapter_name`, `cdesc`, `is_active`, `created_at`, `updated_at`) VALUES (2, 1, 1, 8, 'maths Chapter 1', 'maths Chapter 1', 'yes', '2019-01-04 16:51:00', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: class_division
#

DROP TABLE IF EXISTS `class_division`;

CREATE TABLE `class_division` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`),
  KEY `section_id` (`division_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

INSERT INTO `class_division` (`id`, `class_id`, `division_id`, `is_active`, `created_at`, `updated_at`) VALUES (1, 1, 1, 'no', '2018-09-18 19:23:52', '0000-00-00 00:00:00');
INSERT INTO `class_division` (`id`, `class_id`, `division_id`, `is_active`, `created_at`, `updated_at`) VALUES (2, 2, 1, 'no', '2018-09-18 19:23:57', '0000-00-00 00:00:00');
INSERT INTO `class_division` (`id`, `class_id`, `division_id`, `is_active`, `created_at`, `updated_at`) VALUES (3, 2, 2, 'no', '2018-09-18 19:23:57', '0000-00-00 00:00:00');
INSERT INTO `class_division` (`id`, `class_id`, `division_id`, `is_active`, `created_at`, `updated_at`) VALUES (4, 3, 1, 'no', '2018-09-18 19:24:05', '0000-00-00 00:00:00');
INSERT INTO `class_division` (`id`, `class_id`, `division_id`, `is_active`, `created_at`, `updated_at`) VALUES (5, 3, 2, 'no', '2018-09-18 19:24:05', '0000-00-00 00:00:00');
INSERT INTO `class_division` (`id`, `class_id`, `division_id`, `is_active`, `created_at`, `updated_at`) VALUES (6, 3, 3, 'no', '2018-09-18 19:24:05', '0000-00-00 00:00:00');
INSERT INTO `class_division` (`id`, `class_id`, `division_id`, `is_active`, `created_at`, `updated_at`) VALUES (7, 4, 1, 'no', '2018-09-18 19:24:13', '0000-00-00 00:00:00');
INSERT INTO `class_division` (`id`, `class_id`, `division_id`, `is_active`, `created_at`, `updated_at`) VALUES (8, 4, 2, 'no', '2018-09-18 19:24:13', '0000-00-00 00:00:00');
INSERT INTO `class_division` (`id`, `class_id`, `division_id`, `is_active`, `created_at`, `updated_at`) VALUES (9, 4, 3, 'no', '2018-09-18 19:24:13', '0000-00-00 00:00:00');
INSERT INTO `class_division` (`id`, `class_id`, `division_id`, `is_active`, `created_at`, `updated_at`) VALUES (10, 4, 4, 'no', '2018-09-18 19:24:13', '0000-00-00 00:00:00');
INSERT INTO `class_division` (`id`, `class_id`, `division_id`, `is_active`, `created_at`, `updated_at`) VALUES (11, 5, 1, 'no', '2018-12-17 16:27:49', '0000-00-00 00:00:00');
INSERT INTO `class_division` (`id`, `class_id`, `division_id`, `is_active`, `created_at`, `updated_at`) VALUES (12, 5, 6, 'no', '2018-12-17 16:27:49', '0000-00-00 00:00:00');
INSERT INTO `class_division` (`id`, `class_id`, `division_id`, `is_active`, `created_at`, `updated_at`) VALUES (13, 5, 3, 'no', '2018-12-17 16:28:01', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: class_teacher
#

DROP TABLE IF EXISTS `class_teacher`;

CREATE TABLE `class_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `class_teacher` (`id`, `class_id`, `staff_id`, `division_id`) VALUES (1, 1, 13, 1);
INSERT INTO `class_teacher` (`id`, `class_id`, `staff_id`, `division_id`) VALUES (2, 2, 13, 1);


#
# TABLE STRUCTURE FOR: classes
#

DROP TABLE IF EXISTS `classes`;

CREATE TABLE `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `classes` (`id`, `class`, `is_active`, `created_at`, `updated_at`) VALUES (1, 'Class 1', 'no', '2018-09-18 19:23:52', '0000-00-00 00:00:00');
INSERT INTO `classes` (`id`, `class`, `is_active`, `created_at`, `updated_at`) VALUES (2, 'Class 2', 'no', '2018-09-18 19:23:57', '0000-00-00 00:00:00');
INSERT INTO `classes` (`id`, `class`, `is_active`, `created_at`, `updated_at`) VALUES (3, 'Class 3', 'no', '2018-09-18 19:24:05', '0000-00-00 00:00:00');
INSERT INTO `classes` (`id`, `class`, `is_active`, `created_at`, `updated_at`) VALUES (4, 'Class 4', 'no', '2018-09-18 19:24:13', '0000-00-00 00:00:00');
INSERT INTO `classes` (`id`, `class`, `is_active`, `created_at`, `updated_at`) VALUES (5, 'V', 'no', '2018-12-17 16:27:49', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: contents
#

DROP TABLE IF EXISTS `contents`;

CREATE TABLE `contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_public` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'No',
  `class_id` int(11) DEFAULT NULL,
  `file` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `contents` (`id`, `title`, `type`, `is_public`, `class_id`, `file`, `note`, `is_active`, `created_at`, `updated_at`, `date`) VALUES (1, 'ddd', 'Assignments', 'No', 1, 'uploads/school_content/material/1.pdf', 'ffff', 'no', '2018-10-10 21:57:48', '0000-00-00 00:00:00', '2018-10-10');
INSERT INTO `contents` (`id`, `title`, `type`, `is_public`, `class_id`, `file`, `note`, `is_active`, `created_at`, `updated_at`, `date`) VALUES (2, 'update', 'Study Material', 'Yes', 0, 'uploads/school_content/material/2.pdf', 'df', 'no', '2018-10-10 22:12:10', '0000-00-00 00:00:00', '2018-01-08');
INSERT INTO `contents` (`id`, `title`, `type`, `is_public`, `class_id`, `file`, `note`, `is_active`, `created_at`, `updated_at`, `date`) VALUES (3, 'assi', 'Syllabus', 'No', 2, 'uploads/school_content/material/3.docx', '', 'no', '2018-10-16 23:43:03', '0000-00-00 00:00:00', '2018-10-23');
INSERT INTO `contents` (`id`, `title`, `type`, `is_public`, `class_id`, `file`, `note`, `is_active`, `created_at`, `updated_at`, `date`) VALUES (4, 'sd', 'Other Download', 'No', 4, 'uploads/school_content/material/4.docx', '', 'no', '2018-10-16 23:44:20', '0000-00-00 00:00:00', '0000-00-00');


#
# TABLE STRUCTURE FOR: department
#

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(200) NOT NULL,
  `is_active` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `department` (`id`, `department_name`, `is_active`) VALUES (3, 'Academic', 'yes');
INSERT INTO `department` (`id`, `department_name`, `is_active`) VALUES (4, 'Library', 'yes');
INSERT INTO `department` (`id`, `department_name`, `is_active`) VALUES (5, 'Sports', 'yes');
INSERT INTO `department` (`id`, `department_name`, `is_active`) VALUES (6, 'Science', 'yes');
INSERT INTO `department` (`id`, `department_name`, `is_active`) VALUES (7, 'Commerce', 'yes');
INSERT INTO `department` (`id`, `department_name`, `is_active`) VALUES (8, 'Arts', 'yes');
INSERT INTO `department` (`id`, `department_name`, `is_active`) VALUES (9, 'Exam', 'yes');
INSERT INTO `department` (`id`, `department_name`, `is_active`) VALUES (10, 'Admin', 'yes');
INSERT INTO `department` (`id`, `department_name`, `is_active`) VALUES (11, 'Finance', 'yes');


#
# TABLE STRUCTURE FOR: division
#

DROP TABLE IF EXISTS `division`;

CREATE TABLE `division` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `division` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `division` (`id`, `division`, `is_active`, `created_at`, `updated_at`) VALUES (1, 'A', 'no', '2018-09-18 19:23:35', '0000-00-00 00:00:00');
INSERT INTO `division` (`id`, `division`, `is_active`, `created_at`, `updated_at`) VALUES (3, 'C', 'no', '2018-09-18 19:23:41', '0000-00-00 00:00:00');
INSERT INTO `division` (`id`, `division`, `is_active`, `created_at`, `updated_at`) VALUES (4, 'D', 'no', '2018-09-18 19:23:44', '0000-00-00 00:00:00');
INSERT INTO `division` (`id`, `division`, `is_active`, `created_at`, `updated_at`) VALUES (6, 'B', 'no', '2018-10-23 00:42:17', '0000-00-00 00:00:00');
INSERT INTO `division` (`id`, `division`, `is_active`, `created_at`, `updated_at`) VALUES (7, 'E', 'no', '2018-12-17 16:27:17', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: employee
#

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `other_document_file` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO `employee` (`id`, `employee_id`, `department`, `designation`, `name`, `surname`, `father_name`, `mother_name`, `contact_no`, `email`, `dob`, `local_address`, `note`, `image`, `password`, `gender`, `user_id`, `is_active`, `verification_code`, `qualification`, `work_exp`, `emergency_contact_no`, `marital_status`, `date_of_joining`, `date_of_leaving`, `permanent_address`, `account_title`, `bank_account_no`, `bank_name`, `ifsc_code`, `bank_branch`, `payscale`, `basic_salary`, `epf_no`, `shift`, `location`, `resume`, `joining_letter`, `resignation_letter`, `other_document_name`, `other_document_file`) VALUES (0, '', '', '', 'Super Admin', '', '', '', '', 'sa@gmail.com', '0000-00-00', '', '', '', '$2y$10$4i6RGHyOrFSYEndB5Quzc.dbwpvEWWaxBPcRg/.cgCO4k3eJhGfcu', '', 0, 1, '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `employee` (`id`, `employee_id`, `department`, `designation`, `name`, `surname`, `father_name`, `mother_name`, `contact_no`, `email`, `dob`, `local_address`, `note`, `image`, `password`, `gender`, `user_id`, `is_active`, `verification_code`, `qualification`, `work_exp`, `emergency_contact_no`, `marital_status`, `date_of_joining`, `date_of_leaving`, `permanent_address`, `account_title`, `bank_account_no`, `bank_name`, `ifsc_code`, `bank_branch`, `payscale`, `basic_salary`, `epf_no`, `shift`, `location`, `resume`, `joining_letter`, `resignation_letter`, `other_document_name`, `other_document_file`) VALUES (11, '101', 'IT Department', 'Sr. PHP Developer ', 'Rakesh', 'Jadhav', 'Ramesh', 'Reshama', '7744963663', 'sadmin@gmail.com', '1994-06-20', 'cotton Green mumbai\r\nborivali west rta', 'demo', 'uploads/employee_images/11.jpg', '$2y$10$4i6RGHyOrFSYEndB5Quzc.dbwpvEWWaxBPcRg/.cgCO4k3eJhGfcu', '1', 0, 1, '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `employee` (`id`, `employee_id`, `department`, `designation`, `name`, `surname`, `father_name`, `mother_name`, `contact_no`, `email`, `dob`, `local_address`, `note`, `image`, `password`, `gender`, `user_id`, `is_active`, `verification_code`, `qualification`, `work_exp`, `emergency_contact_no`, `marital_status`, `date_of_joining`, `date_of_leaving`, `permanent_address`, `account_title`, `bank_account_no`, `bank_name`, `ifsc_code`, `bank_branch`, `payscale`, `basic_salary`, `epf_no`, `shift`, `location`, `resume`, `joining_letter`, `resignation_letter`, `other_document_name`, `other_document_file`) VALUES (12, '1', '2', '1', 'demo', 'demo', 'demo', 'demo', '9224258371', 'demo1@gmail.com', '2018-12-03', 'Plot no R 929', 'qw', '', '$2y$10$4i6RGHyOrFSYEndB5Quzc.dbwpvEWWaxBPcRg/.cgCO4k3eJhGfcu', 'Male', 0, 1, '', 'qw', 'qw', '1234567890', 'Single', '2018-12-03', '0000-00-00', '', 'sss', '222222', 'bank of india', '3333', 'sdfff', '', '', '', '', '', 'uploads/staff_images/resume12.png', 'uploads/staff_images/joining_letter12.pdf', '', 'uploads/staff_images/Other Doucment', 'otherdocument12.pdf');
INSERT INTO `employee` (`id`, `employee_id`, `department`, `designation`, `name`, `surname`, `father_name`, `mother_name`, `contact_no`, `email`, `dob`, `local_address`, `note`, `image`, `password`, `gender`, `user_id`, `is_active`, `verification_code`, `qualification`, `work_exp`, `emergency_contact_no`, `marital_status`, `date_of_joining`, `date_of_leaving`, `permanent_address`, `account_title`, `bank_account_no`, `bank_name`, `ifsc_code`, `bank_branch`, `payscale`, `basic_salary`, `epf_no`, `shift`, `location`, `resume`, `joining_letter`, `resignation_letter`, `other_document_name`, `other_document_file`) VALUES (13, '100', '2', '1', 'Rakesh', 'Jadhav', 'Ramesh', 'Reshama', '9224258371', 'ass@gmail.com', '2018-12-11', 'ss', 'ss', 'uploads/staff_images/13.jpg', '$2y$10$EKjmfFivYOJrhP9BIDy.XO2FVqWa4zBd/jymKTKo7JOHmIC17YxD.', 'Male', 0, 1, '', 'sss', 'ss', '1234567890', 'Married', '2018-12-11', '0000-00-00', 'sss', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `employee` (`id`, `employee_id`, `department`, `designation`, `name`, `surname`, `father_name`, `mother_name`, `contact_no`, `email`, `dob`, `local_address`, `note`, `image`, `password`, `gender`, `user_id`, `is_active`, `verification_code`, `qualification`, `work_exp`, `emergency_contact_no`, `marital_status`, `date_of_joining`, `date_of_leaving`, `permanent_address`, `account_title`, `bank_account_no`, `bank_name`, `ifsc_code`, `bank_branch`, `payscale`, `basic_salary`, `epf_no`, `shift`, `location`, `resume`, `joining_letter`, `resignation_letter`, `other_document_name`, `other_document_file`) VALUES (14, '233', '2', '5', 'Tushar', 'jadhav', 'df', 'ff', '23456', 'admin@techvill.net', '2018-12-17', 'dsDCsD', 'regawvrear', 'uploads/staff_images/14.jpg', '$2y$10$4i6RGHyOrFSYEndB5Quzc.dbwpvEWWaxBPcRg/.cgCO4k3eJhGfcu', 'Male', 0, 1, '', 'fvsf', 'regvrevr', '123456', 'Married', '2018-12-17', '0000-00-00', 'sdfvsrs', 'fsdzfgvert', 'gggrefr', 'fsrewrfw', '4524frrw3', 'dsfvsf', '', '30000', '123', 'day', 'dfDfvde', 'uploads/staff_images/resume14.pdf', 'uploads/staff_images/joining_letter14.doc', '', 'Other Document', 'otherdocument14.pdf');


#
# TABLE STRUCTURE FOR: employee_leave_details
#

DROP TABLE IF EXISTS `employee_leave_details`;

CREATE TABLE `employee_leave_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `alloted_leave` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `employee_leave_details` (`id`, `staff_id`, `leave_type_id`, `alloted_leave`) VALUES (1, 14, 4, '10');
INSERT INTO `employee_leave_details` (`id`, `staff_id`, `leave_type_id`, `alloted_leave`) VALUES (2, 14, 5, '10');
INSERT INTO `employee_leave_details` (`id`, `staff_id`, `leave_type_id`, `alloted_leave`) VALUES (3, 14, 6, '10');


#
# TABLE STRUCTURE FOR: employee_leave_request
#

DROP TABLE IF EXISTS `employee_leave_request`;

CREATE TABLE `employee_leave_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `employee_leave_request` (`id`, `staff_id`, `leave_type_id`, `leave_from`, `leave_to`, `leave_days`, `employee_remark`, `admin_remark`, `status`, `applied_by`, `document_file`, `date`) VALUES (1, 0, 4, '2018-11-05', '2018-11-05', 1, 'sss', '', 'pending', 'Super Admin', '', '2018-11-05');
INSERT INTO `employee_leave_request` (`id`, `staff_id`, `leave_type_id`, `leave_from`, `leave_to`, `leave_days`, `employee_remark`, `admin_remark`, `status`, `applied_by`, `document_file`, `date`) VALUES (2, 0, 4, '2018-12-18', '2018-12-31', 14, 'vsdvsd', '', 'pending', 'Super Admin', 'Invoice1 (3).pdf', '2018-12-18');
INSERT INTO `employee_leave_request` (`id`, `staff_id`, `leave_type_id`, `leave_from`, `leave_to`, `leave_days`, `employee_remark`, `admin_remark`, `status`, `applied_by`, `document_file`, `date`) VALUES (3, 13, 4, '2018-12-19', '1970-01-01', 17885, 'zfesvrewa', 'rewrer', 'pending', 'Super Admin', '', '2018-12-19');
INSERT INTO `employee_leave_request` (`id`, `staff_id`, `leave_type_id`, `leave_from`, `leave_to`, `leave_days`, `employee_remark`, `admin_remark`, `status`, `applied_by`, `document_file`, `date`) VALUES (4, 14, 6, '2018-12-01', '2018-12-31', 31, 'CFDESD', 'fdszfvfsd', 'approve', 'Super Admin', '', '2018-12-19');


#
# TABLE STRUCTURE FOR: exam_results
#

DROP TABLE IF EXISTS `exam_results`;

CREATE TABLE `exam_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attendence` varchar(10) NOT NULL,
  `exam_schedule_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `get_marks` float(10,2) DEFAULT NULL,
  `note` text,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `exam_schedule_id` (`exam_schedule_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: exam_schedules
#

DROP TABLE IF EXISTS `exam_schedules`;

CREATE TABLE `exam_schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `teacher_subject_id` (`teacher_subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `exam_schedules` (`id`, `session_id`, `exam_id`, `teacher_subject_id`, `date_of_exam`, `start_to`, `end_from`, `room_no`, `full_marks`, `passing_marks`, `note`, `is_active`, `created_at`, `updated_at`) VALUES (1, 11, 2, 1, '2018-12-20', ' 10', '11', '1', 100, 35, NULL, 'no', '2018-12-20 14:48:29', '0000-00-00 00:00:00');
INSERT INTO `exam_schedules` (`id`, `session_id`, `exam_id`, `teacher_subject_id`, `date_of_exam`, `start_to`, `end_from`, `room_no`, `full_marks`, `passing_marks`, `note`, `is_active`, `created_at`, `updated_at`) VALUES (2, 11, 2, 7, '2018-12-21', ' 11', '12', '1', 100, 35, NULL, 'no', '2018-12-20 14:48:29', '0000-00-00 00:00:00');
INSERT INTO `exam_schedules` (`id`, `session_id`, `exam_id`, `teacher_subject_id`, `date_of_exam`, `start_to`, `end_from`, `room_no`, `full_marks`, `passing_marks`, `note`, `is_active`, `created_at`, `updated_at`) VALUES (3, 11, 2, 8, '2018-12-23', ' 12', '1', '1', 100, 35, NULL, 'no', '2018-12-20 14:48:29', '0000-00-00 00:00:00');
INSERT INTO `exam_schedules` (`id`, `session_id`, `exam_id`, `teacher_subject_id`, `date_of_exam`, `start_to`, `end_from`, `room_no`, `full_marks`, `passing_marks`, `note`, `is_active`, `created_at`, `updated_at`) VALUES (4, 11, 2, 2, '2018-12-20', ' 1', '2', '2', 100, 34, NULL, 'no', '2018-12-20 14:59:44', '0000-00-00 00:00:00');
INSERT INTO `exam_schedules` (`id`, `session_id`, `exam_id`, `teacher_subject_id`, `date_of_exam`, `start_to`, `end_from`, `room_no`, `full_marks`, `passing_marks`, `note`, `is_active`, `created_at`, `updated_at`) VALUES (5, 11, 2, 11, '2018-12-21', ' 1', '4', '6', 566, 666, NULL, 'no', '2018-12-20 14:59:44', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: exams
#

DROP TABLE IF EXISTS `exams`;

CREATE TABLE `exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sesion_id` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `exams` (`id`, `name`, `sesion_id`, `note`, `is_active`, `created_at`, `updated_at`) VALUES (2, 'demo134', 0, 'deee', 'no', '2018-12-20 14:07:15', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: expenses
#

DROP TABLE IF EXISTS `expenses`;

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exp_head_id` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `documents` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'yes',
  `is_deleted` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: fee_groups
#

DROP TABLE IF EXISTS `fee_groups`;

CREATE TABLE `fee_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `description` text,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_system` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `fee_groups` (`id`, `name`, `description`, `is_active`, `created_at`, `is_system`) VALUES (2, 'qqww123', 'dddd123', 'no', '2018-11-20 15:29:55', 0);


#
# TABLE STRUCTURE FOR: fee_groups_feetype
#

DROP TABLE IF EXISTS `fee_groups_feetype`;

CREATE TABLE `fee_groups_feetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fee_session_group_id` int(11) DEFAULT NULL,
  `fee_groups_id` int(11) DEFAULT NULL,
  `feetype_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fee_session_group_id` (`fee_session_group_id`),
  KEY `fee_groups_id` (`fee_groups_id`),
  KEY `feetype_id` (`feetype_id`),
  KEY `session_id` (`session_id`),
  CONSTRAINT `fee_groups_feetype_ibfk_1` FOREIGN KEY (`fee_session_group_id`) REFERENCES `fee_session_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fee_groups_feetype_ibfk_2` FOREIGN KEY (`fee_groups_id`) REFERENCES `fee_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fee_groups_feetype_ibfk_3` FOREIGN KEY (`feetype_id`) REFERENCES `feetype` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fee_groups_feetype_ibfk_4` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `fee_groups_feetype` (`id`, `fee_session_group_id`, `fee_groups_id`, `feetype_id`, `session_id`, `due_date`, `amount`, `is_active`, `created_at`) VALUES (3, 3, 2, 1, 11, '2018-11-20', '12000.00', 'no', '2018-11-20 16:49:09');


#
# TABLE STRUCTURE FOR: fee_session_groups
#

DROP TABLE IF EXISTS `fee_session_groups`;

CREATE TABLE `fee_session_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fee_groups_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fee_groups_id` (`fee_groups_id`),
  KEY `session_id` (`session_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `fee_session_groups` (`id`, `fee_groups_id`, `session_id`, `is_active`, `created_at`) VALUES (3, 2, 11, 'no', '2018-11-20 16:49:02');


#
# TABLE STRUCTURE FOR: feecategory
#

DROP TABLE IF EXISTS `feecategory`;

CREATE TABLE `feecategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: feemasters
#

DROP TABLE IF EXISTS `feemasters`;

CREATE TABLE `feemasters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) DEFAULT NULL,
  `feetype_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: fees_discounts
#

DROP TABLE IF EXISTS `fees_discounts`;

CREATE TABLE `fees_discounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `description` text,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `session_id` (`session_id`),
  CONSTRAINT `fees_discounts_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: feetype
#

DROP TABLE IF EXISTS `feetype`;

CREATE TABLE `feetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feecategory_id` int(11) DEFAULT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `is_system` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `feetype` (`id`, `feecategory_id`, `type`, `code`, `is_active`, `created_at`, `updated_at`, `description`, `is_system`) VALUES (1, NULL, 'Enrollment ( Fees are subject to change )', '001', 'no', '2018-11-20 15:08:14', '0000-00-00 00:00:00', 'All Students, except high school students enrolling for less than 11.5 units through the Concurrent Enrollment or Middle College High School Program and College Consortium Programs. These fees are waived for recipients of the California College Promise Grant.', 0);
INSERT INTO `feetype` (`id`, `feecategory_id`, `type`, `code`, `is_active`, `created_at`, `updated_at`, `description`, `is_system`) VALUES (2, NULL, 'Enrollment - Bachelor of Science in Respiratory Ca', '002', 'no', '2018-11-20 07:43:45', '0000-00-00 00:00:00', 'All Students that are new graduates and have completed the CoARC accredited Respiratory Care program equivalent to an A.S. in Respiratory Care and are California licensure eligible or Respiratory Care Practitioners who have completed a CoARC accredited Respiratory Care program equivalent to an A.S. in Respiratory Care and are California licensure eligible and accepted into the Bachelor of Science Respiratory Care program at Skyline College will pay $130 per unit for upper division coursework. Students eligible for the California College Promise Grant (FAFSA or Dream Act Application) will only waive $46 per unit and total cost to the student is $84 per unit.', 0);
INSERT INTO `feetype` (`id`, `feecategory_id`, `type`, `code`, `is_active`, `created_at`, `updated_at`, `description`, `is_system`) VALUES (3, NULL, 'Audit', '003', 'no', '2018-11-20 07:44:01', '0000-00-00 00:00:00', '', 0);
INSERT INTO `feetype` (`id`, `feecategory_id`, `type`, `code`, `is_active`, `created_at`, `updated_at`, `description`, `is_system`) VALUES (5, NULL, 'International Student Application Fee', '005', 'no', '2018-11-20 07:44:28', '0000-00-00 00:00:00', '', 0);
INSERT INTO `feetype` (`id`, `feecategory_id`, `type`, `code`, `is_active`, `created_at`, `updated_at`, `description`, `is_system`) VALUES (8, NULL, 'dd', 'dd', 'no', '2018-11-20 14:59:20', '0000-00-00 00:00:00', 'ddd', 0);


#
# TABLE STRUCTURE FOR: grades
#

DROP TABLE IF EXISTS `grades`;

CREATE TABLE `grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `point` float(10,1) DEFAULT NULL,
  `mark_from` float(10,2) DEFAULT NULL,
  `mark_upto` float(10,2) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `grades` (`id`, `name`, `point`, `mark_from`, `mark_upto`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (5, 'A++', NULL, '90.00', '100.00', 'Excelentsssss', 'no', '2018-12-20 09:24:55', '0000-00-00 00:00:00');
INSERT INTO `grades` (`id`, `name`, `point`, `mark_from`, `mark_upto`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (7, 'A+', NULL, '75.00', '90.00', 'A+', 'no', '2018-12-20 09:25:17', '0000-00-00 00:00:00');
INSERT INTO `grades` (`id`, `name`, `point`, `mark_from`, `mark_upto`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (8, 'A', NULL, '60.00', '75.00', 'A', 'no', '2018-12-20 09:25:36', '0000-00-00 00:00:00');
INSERT INTO `grades` (`id`, `name`, `point`, `mark_from`, `mark_upto`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (9, 'B', NULL, '40.00', '60.00', 'B', 'no', '2018-12-20 09:25:54', '0000-00-00 00:00:00');
INSERT INTO `grades` (`id`, `name`, `point`, `mark_from`, `mark_upto`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (10, 'C', NULL, '0.00', '40.00', 'C', 'no', '2018-12-20 09:26:22', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: homework
#

DROP TABLE IF EXISTS `homework`;

CREATE TABLE `homework` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `evaluated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `homework` (`id`, `class_id`, `section_id`, `homework_date`, `submit_date`, `staff_id`, `subject_id`, `description`, `create_date`, `document`, `created_by`, `evaluated_by`) VALUES (1, 1, 1, '2018-12-11', '2018-12-12', 0, 2, 'demo', '2018-12-11', 'one.csv', 0, 0);
INSERT INTO `homework` (`id`, `class_id`, `section_id`, `homework_date`, `submit_date`, `staff_id`, `subject_id`, `description`, `create_date`, `document`, `created_by`, `evaluated_by`) VALUES (2, 2, 1, '2018-12-10', '2018-12-11', 0, 2, 'ty', '2018-12-11', '', 0, 0);
INSERT INTO `homework` (`id`, `class_id`, `section_id`, `homework_date`, `submit_date`, `staff_id`, `subject_id`, `description`, `create_date`, `document`, `created_by`, `evaluated_by`) VALUES (3, 2, 1, '2018-12-17', '2018-12-18', 0, 3, 'demo', '2018-12-18', 'Curriculum Vitae(bsc.it).docx', 0, 0);
INSERT INTO `homework` (`id`, `class_id`, `section_id`, `homework_date`, `submit_date`, `staff_id`, `subject_id`, `description`, `create_date`, `document`, `created_by`, `evaluated_by`) VALUES (4, 1, 1, '2018-12-19', '2018-12-19', 0, 2, 'sssssss', '2018-12-19', 'Curriculum Vitae(bsc.it).docx', 0, 0);


#
# TABLE STRUCTURE FOR: homework_evaluation
#

DROP TABLE IF EXISTS `homework_evaluation`;

CREATE TABLE `homework_evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `homework_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: hostel
#

DROP TABLE IF EXISTS `hostel`;

CREATE TABLE `hostel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hostel_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `intake` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: hostel_rooms
#

DROP TABLE IF EXISTS `hostel_rooms`;

CREATE TABLE `hostel_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hostel_id` int(11) DEFAULT NULL,
  `room_type_id` int(11) DEFAULT NULL,
  `room_no` varchar(200) DEFAULT NULL,
  `no_of_bed` int(11) DEFAULT NULL,
  `cost_per_bed` float(10,2) DEFAULT '0.00',
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: languages
#

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (1, 'Azerbaijan', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (2, 'Albanian', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (3, 'Amharic', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (4, 'English', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (5, 'Arabic', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (7, 'Afrikaans', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (8, 'Basque', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (11, 'Bengali', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (13, 'Bosnian', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (14, 'Welsh', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (15, 'Hungarian', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (16, 'Vietnamese', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (17, 'Haitian (Creole)', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (18, 'Galician', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (19, 'Dutch', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (21, 'Greek', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (22, 'Georgian', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (23, 'Gujarati', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (24, 'Danish', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (25, 'Hebrew', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (26, 'Yiddish', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (27, 'Indonesian', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (28, 'Irish', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (29, 'Italian', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (30, 'Icelandic', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (31, 'Spanish', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (33, 'Kannada', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (34, 'Catalan', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (36, 'Chinese', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (37, 'Korean', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (38, 'Xhosa', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (39, 'Latin', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (40, 'Latvian', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (41, 'Lithuanian', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (43, 'Malagasy', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (44, 'Malay', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (45, 'Malayalam', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (46, 'Maltese', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (47, 'Macedonian', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (48, 'Maori', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (49, 'Marathi', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (51, 'Mongolian', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (52, 'German', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (53, 'Nepali', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (54, 'Norwegian', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (55, 'Punjabi', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (57, 'Persian', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (59, 'Portuguese', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (60, 'Romanian', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (61, 'Russian', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (62, 'Cebuano', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (64, 'Sinhala', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (65, 'Slovakian', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (66, 'Slovenian', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (67, 'Swahili', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (68, 'Sundanese', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (70, 'Thai', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (71, 'Tagalog', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (72, 'Tamil', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (74, 'Telugu', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (75, 'Turkish', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (77, 'Uzbek', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (79, 'Urdu', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (80, 'Finnish', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (81, 'French', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (82, 'Hindi', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (84, 'Czech', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (85, 'Swedish', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (86, 'Scottish', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (87, 'Estonian', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (88, 'Esperanto', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (89, 'Javanese', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');
INSERT INTO `languages` (`id`, `language`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (90, 'Japanese', 'no', 'no', '2017-04-06 16:08:33', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: leave_types
#

DROP TABLE IF EXISTS `leave_types`;

CREATE TABLE `leave_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(200) NOT NULL,
  `is_active` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `leave_types` (`id`, `type`, `is_active`) VALUES (4, 'Medical Leaves', 'yes');
INSERT INTO `leave_types` (`id`, `type`, `is_active`) VALUES (5, 'Casual Leave', 'yes');
INSERT INTO `leave_types` (`id`, `type`, `is_active`) VALUES (6, 'Maternity Leave', 'yes');


#
# TABLE STRUCTURE FOR: libarary_members
#

DROP TABLE IF EXISTS `libarary_members`;

CREATE TABLE `libarary_members` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `library_card_no` varchar(50) DEFAULT NULL,
  `member_type` varchar(50) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `libarary_members` (`id`, `library_card_no`, `member_type`, `member_id`, `is_active`, `created_at`) VALUES (1, '', 'student', 4, 'no', '2018-10-27 23:41:54');
INSERT INTO `libarary_members` (`id`, `library_card_no`, `member_type`, `member_id`, `is_active`, `created_at`) VALUES (2, NULL, 'student', NULL, 'no', '2018-10-27 23:46:18');
INSERT INTO `libarary_members` (`id`, `library_card_no`, `member_type`, `member_id`, `is_active`, `created_at`) VALUES (3, '', 'student', 7, 'no', '2018-10-27 23:55:06');
INSERT INTO `libarary_members` (`id`, `library_card_no`, `member_type`, `member_id`, `is_active`, `created_at`) VALUES (4, NULL, 'teacher', NULL, 'no', '2018-11-02 00:03:29');
INSERT INTO `libarary_members` (`id`, `library_card_no`, `member_type`, `member_id`, `is_active`, `created_at`) VALUES (5, '', 'teacher', 3, 'no', '2018-11-02 00:12:10');


#
# TABLE STRUCTURE FOR: librarians
#

DROP TABLE IF EXISTS `librarians`;

CREATE TABLE `librarians` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `librarians` (`id`, `name`, `email`, `password`, `address`, `dob`, `designation`, `sex`, `phone`, `image`, `is_active`, `created_at`) VALUES (1, 'ddd', 'rakeshjadhav933@gmail.com', NULL, 'Maharashtra Mumbai\r\nBldg no 41,Room no 2071, Gandhi nagar , M.H.B. colany , Bandra east near sai baba temple,', '2018-10-21', NULL, 'Male', '+917744963663', 'uploads/librarian_images/1.png', 'no', '2018-10-21 21:53:49');


#
# TABLE STRUCTURE FOR: messages
#

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `message` text,
  `send_mail` varchar(10) DEFAULT '0',
  `send_sms` varchar(10) DEFAULT '0',
  `is_group` varchar(10) DEFAULT '0',
  `is_individual` varchar(10) DEFAULT '0',
  `is_class` int(10) NOT NULL DEFAULT '0',
  `group_list` text,
  `user_list` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: notification_roles
#

DROP TABLE IF EXISTS `notification_roles`;

CREATE TABLE `notification_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `send_notification_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `send_notification_id` (`send_notification_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `notification_roles_ibfk_1` FOREIGN KEY (`send_notification_id`) REFERENCES `send_notification` (`id`) ON DELETE CASCADE,
  CONSTRAINT `notification_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `notification_roles` (`id`, `send_notification_id`, `role_id`, `is_active`, `created_at`) VALUES (4, 3, 1, 0, '2019-01-29 11:05:09');
INSERT INTO `notification_roles` (`id`, `send_notification_id`, `role_id`, `is_active`, `created_at`) VALUES (5, 3, 2, 0, '2019-01-29 11:05:09');
INSERT INTO `notification_roles` (`id`, `send_notification_id`, `role_id`, `is_active`, `created_at`) VALUES (6, 3, 3, 0, '2019-01-29 11:05:09');
INSERT INTO `notification_roles` (`id`, `send_notification_id`, `role_id`, `is_active`, `created_at`) VALUES (7, 3, 4, 0, '2019-01-29 11:05:09');
INSERT INTO `notification_roles` (`id`, `send_notification_id`, `role_id`, `is_active`, `created_at`) VALUES (8, 3, 6, 0, '2019-01-29 11:05:09');
INSERT INTO `notification_roles` (`id`, `send_notification_id`, `role_id`, `is_active`, `created_at`) VALUES (9, 3, 7, 0, '2019-01-29 11:05:09');
INSERT INTO `notification_roles` (`id`, `send_notification_id`, `role_id`, `is_active`, `created_at`) VALUES (10, 3, 9, 0, '2019-01-29 11:05:09');


#
# TABLE STRUCTURE FOR: notification_setting
#

DROP TABLE IF EXISTS `notification_setting`;

CREATE TABLE `notification_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL,
  `is_mail` varchar(10) DEFAULT '0',
  `is_sms` varchar(10) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `notification_setting` (`id`, `type`, `is_mail`, `is_sms`, `created_at`) VALUES (1, 'student_admission', '1', '0', '2018-05-22 18:30:07');
INSERT INTO `notification_setting` (`id`, `type`, `is_mail`, `is_sms`, `created_at`) VALUES (2, 'exam_result', '1', '0', '2018-05-22 18:30:07');
INSERT INTO `notification_setting` (`id`, `type`, `is_mail`, `is_sms`, `created_at`) VALUES (3, 'fee_submission', '1', '0', '2018-05-22 18:30:07');
INSERT INTO `notification_setting` (`id`, `type`, `is_mail`, `is_sms`, `created_at`) VALUES (4, 'absent_attendence', '1', '0', '2018-07-11 23:13:02');
INSERT INTO `notification_setting` (`id`, `type`, `is_mail`, `is_sms`, `created_at`) VALUES (5, 'login_credential', '1', '0', '2018-05-22 18:34:19');


#
# TABLE STRUCTURE FOR: payment_settings
#

DROP TABLE IF EXISTS `payment_settings`;

CREATE TABLE `payment_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: permission_category
#

DROP TABLE IF EXISTS `permission_category`;

CREATE TABLE `permission_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perm_group_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `short_code` varchar(100) DEFAULT NULL,
  `enable_view` int(11) DEFAULT '0',
  `enable_add` int(11) DEFAULT '0',
  `enable_edit` int(11) DEFAULT '0',
  `enable_delete` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (1, 1, 'General Setting', 'general_setting', 1, 0, 1, 0, '2018-12-01 17:04:40');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (2, 2, 'Designation', 'designation', 1, 1, 1, 1, '2018-12-01 17:29:12');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (3, 2, 'Department', 'department', 1, 1, 1, 1, '2018-12-01 18:09:55');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (4, 3, 'Division', 'division', 1, 1, 1, 1, '2018-12-04 09:25:06');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (5, 3, 'Class', 'classes', 1, 1, 1, 1, '2018-12-06 05:14:53');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (6, 3, 'Teacher', 'teacher', 1, 1, 1, 1, '2018-12-04 09:25:06');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (7, 3, 'Subject', 'subject', 1, 1, 1, 1, '2018-12-04 09:25:06');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (8, 3, 'Assign Subject', 'assign_subject', 1, 1, 1, 1, '2018-12-04 09:25:06');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (9, 3, 'Class Timetable', 'class_timetable', 1, 1, 1, 1, '2018-12-04 09:25:06');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (10, 3, 'Assign Teacher', 'assign_teacher', 1, 1, 1, 1, '2018-12-04 09:25:06');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (11, 1, 'Session Setting', 'session_setting', 1, 1, 1, 1, '2018-12-01 17:04:40');


#
# TABLE STRUCTURE FOR: permission_group
#

DROP TABLE IF EXISTS `permission_group`;

CREATE TABLE `permission_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `short_code` varchar(100) NOT NULL,
  `is_active` int(11) DEFAULT '0',
  `system` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (1, 'System Settings', 'system_settings', 1, 1, '2018-12-20 06:25:24');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (2, 'Management', 'management', 1, 1, '2018-12-01 17:29:59');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (3, 'Academic', 'academic', 1, 1, '2018-12-04 09:24:27');


#
# TABLE STRUCTURE FOR: read_notification
#

DROP TABLE IF EXISTS `read_notification`;

CREATE TABLE `read_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `parent_id` int(10) NOT NULL,
  `notification_id` int(11) DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `read_notification` (`id`, `student_id`, `parent_id`, `notification_id`, `is_active`, `created_at`, `updated_at`) VALUES (1, 1, 0, 1, 'no', '2018-11-05 23:46:48', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: roles
#

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0',
  `is_system` int(1) NOT NULL DEFAULT '0',
  `is_superadmin` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`, `created_at`, `updated_at`) VALUES (1, 'Admin', NULL, 0, 1, 0, '2018-06-30 15:39:11', '0000-00-00 00:00:00');
INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`, `created_at`, `updated_at`) VALUES (2, 'Teacher', NULL, 0, 1, 0, '2018-06-30 15:39:14', '0000-00-00 00:00:00');
INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`, `created_at`, `updated_at`) VALUES (3, 'Accountant', NULL, 0, 1, 0, '2018-06-30 15:39:17', '0000-00-00 00:00:00');
INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`, `created_at`, `updated_at`) VALUES (4, 'Librarian', NULL, 0, 1, 0, '2018-06-30 15:39:21', '0000-00-00 00:00:00');
INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`, `created_at`, `updated_at`) VALUES (6, 'Receptionist', NULL, 0, 1, 0, '2018-07-02 05:39:03', '0000-00-00 00:00:00');
INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`, `created_at`, `updated_at`) VALUES (7, 'Super Admin', NULL, 0, 1, 1, '2018-07-11 14:11:29', '0000-00-00 00:00:00');
INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`, `created_at`, `updated_at`) VALUES (9, 'test123', NULL, 0, 0, 0, '2018-12-01 11:38:23', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: roles_permissions
#

DROP TABLE IF EXISTS `roles_permissions`;

CREATE TABLE `roles_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `perm_cat_id` int(11) DEFAULT NULL,
  `can_view` int(11) DEFAULT NULL,
  `can_add` int(11) DEFAULT NULL,
  `can_edit` int(11) DEFAULT NULL,
  `can_delete` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1, 1, 1, 1, 0, 0, 0, '2018-12-01 17:10:02');


#
# TABLE STRUCTURE FOR: room_types
#

DROP TABLE IF EXISTS `room_types`;

CREATE TABLE `room_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_type` varchar(200) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: sch_settings
#

DROP TABLE IF EXISTS `sch_settings`;

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
  `class_teacher` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lang_id` (`lang_id`),
  KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `sch_settings` (`id`, `name`, `email`, `phone`, `address`, `lang_id`, `dise_code`, `date_format`, `currency`, `currency_symbol`, `is_rtl`, `timezone`, `session_id`, `start_month`, `image`, `theme`, `is_active`, `created_at`, `updated_at`, `class_teacher`) VALUES (1, 'Online School Management', 'xyz@gmail.com', '7744963663', 'The animator, Mumbai, Maharashtra', 4, '123456', 'm/d/Y', 'IN', 'Rs', 'disabled', 'Asia/Kolkata', 13, '4', 'uploads/school_content/logo/1.png', 'default.jpg', 'no', '2019-02-01 23:02:07', '0000-00-00 00:00:00', 'no');


#
# TABLE STRUCTURE FOR: school_houses
#

DROP TABLE IF EXISTS `school_houses`;

CREATE TABLE `school_houses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `house_name` varchar(200) NOT NULL,
  `description` varchar(400) NOT NULL,
  `is_active` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: send_notification
#

DROP TABLE IF EXISTS `send_notification`;

CREATE TABLE `send_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `visible_staff` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `send_notification` (`id`, `title`, `publish_date`, `date`, `message`, `visible_student`, `visible_teacher`, `visible_parent`, `created_by`, `created_id`, `is_active`, `created_at`, `updated_at`, `visible_staff`) VALUES (3, 'Rakesh ramesh jadhav', '2019-01-29', '2019-01-01', 'sssffff', 'Yes', 'no', 'Yes', 'Super Admin', 0, 'no', '2019-01-30 23:44:45', '0000-00-00 00:00:00', 'No');


#
# TABLE STRUCTURE FOR: sessions
#

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (7, '2016-17', 'no', '2017-04-20 17:42:19', '0000-00-00 00:00:00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (11, '2017-18', 'no', '2017-04-20 17:41:37', '0000-00-00 00:00:00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (13, '2018-19', 'no', '2016-08-25 06:26:44', '0000-00-00 00:00:00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (14, '2019-20', 'no', '2016-08-25 06:26:55', '0000-00-00 00:00:00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (15, '2020-21', 'no', '2016-10-01 16:28:08', '0000-00-00 00:00:00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (16, '2021-22', 'no', '2016-10-01 16:28:20', '0000-00-00 00:00:00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (18, '2022-23', 'no', '2016-10-01 16:29:02', '0000-00-00 00:00:00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (19, '2023-24', 'no', '2016-10-01 16:29:10', '0000-00-00 00:00:00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (20, '2024-25', 'no', '2016-10-01 16:29:18', '0000-00-00 00:00:00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (21, '2025-26', 'no', '2016-10-01 16:30:10', '0000-00-00 00:00:00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (22, '2026-27', 'no', '2016-10-01 16:30:18', '0000-00-00 00:00:00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (23, '2027-28', 'no', '2016-10-01 16:30:24', '0000-00-00 00:00:00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (26, '2015-16', 'no', '2018-12-18 17:42:36', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: staff
#

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `verification_code` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `staff` (`id`, `employee_id`, `department`, `designation`, `qualification`, `work_exp`, `name`, `surname`, `father_name`, `mother_name`, `contact_no`, `emergency_contact_no`, `email`, `dob`, `marital_status`, `date_of_joining`, `date_of_leaving`, `local_address`, `permanent_address`, `note`, `image`, `password`, `gender`, `account_title`, `bank_account_no`, `bank_name`, `ifsc_code`, `bank_branch`, `payscale`, `basic_salary`, `epf_no`, `contract_type`, `shift`, `location`, `facebook`, `twitter`, `linkedin`, `instagram`, `resume`, `joining_letter`, `resignation_letter`, `other_document_name`, `other_document_file`, `user_id`, `is_active`, `verification_code`) VALUES (1, '1', '', '', '', '', 'Super Admin', '', '', '', '', '', 'myschool@gmail.com', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '', '', '', '$2y$10$asVJLPEzmMpRgFrJ5TcYkexY/ZL26U/5URwwOJ0.ZpDRVfcto4wNi', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '');


#
# TABLE STRUCTURE FOR: staff_designation
#

DROP TABLE IF EXISTS `staff_designation`;

CREATE TABLE `staff_designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(200) NOT NULL,
  `is_active` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (6, 'Faculty', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (7, 'Accountant', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (8, 'Librarian', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (9, 'Admin', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (10, 'Receptionist', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (11, 'Principal', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (12, 'Director', 'yes');


#
# TABLE STRUCTURE FOR: staff_payroll
#

DROP TABLE IF EXISTS `staff_payroll`;

CREATE TABLE `staff_payroll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `basic_salary` int(11) NOT NULL,
  `pay_scale` varchar(200) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `is_active` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: staff_payslip
#

DROP TABLE IF EXISTS `staff_payslip`;

CREATE TABLE `staff_payslip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `remark` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: staff_roles
#

DROP TABLE IF EXISTS `staff_roles`;

CREATE TABLE `staff_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

INSERT INTO `staff_roles` (`id`, `role_id`, `staff_id`, `is_active`, `created_at`, `updated_at`) VALUES (0, 7, 0, 0, '2018-11-17 14:39:26', '0000-00-00 00:00:00');
INSERT INTO `staff_roles` (`id`, `role_id`, `staff_id`, `is_active`, `created_at`, `updated_at`) VALUES (23, 1, 12, 0, '2018-12-03 17:55:27', '0000-00-00 00:00:00');
INSERT INTO `staff_roles` (`id`, `role_id`, `staff_id`, `is_active`, `created_at`, `updated_at`) VALUES (24, 2, 13, 0, '2018-12-04 15:09:58', '0000-00-00 00:00:00');
INSERT INTO `staff_roles` (`id`, `role_id`, `staff_id`, `is_active`, `created_at`, `updated_at`) VALUES (25, 2, 14, 0, '2018-12-17 16:41:44', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: student_attendences
#

DROP TABLE IF EXISTS `student_attendences`;

CREATE TABLE `student_attendences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_session_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `attendence_type_id` int(11) DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `student_session_id` (`student_session_id`),
  KEY `attendence_type_id` (`attendence_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: student_doc
#

DROP TABLE IF EXISTS `student_doc`;

CREATE TABLE `student_doc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `doc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO `student_doc` (`id`, `student_id`, `title`, `doc`) VALUES (2, 1, 'Reshancard', 'society reci 04-Aug-2018 10-03-37.pdf');
INSERT INTO `student_doc` (`id`, `student_id`, `title`, `doc`) VALUES (3, 1, 'light bill', 'wsu-css-cheat-sheet.pdf');
INSERT INTO `student_doc` (`id`, `student_id`, `title`, `doc`) VALUES (4, 2, 'Reshancard', 'society reci 04-Aug-2018 10-03-37.pdf');
INSERT INTO `student_doc` (`id`, `student_id`, `title`, `doc`) VALUES (5, 2, 'light bill', '2017114642.jpg');
INSERT INTO `student_doc` (`id`, `student_id`, `title`, `doc`) VALUES (7, 3, 'ads', 'Class Timetable.pdf');
INSERT INTO `student_doc` (`id`, `student_id`, `title`, `doc`) VALUES (8, 3, 'demo', 'Arunodaya Affidavit.pdf');
INSERT INTO `student_doc` (`id`, `student_id`, `title`, `doc`) VALUES (9, 4, 'Admission form', 'Arunoday University Admissiom Form.pdf');
INSERT INTO `student_doc` (`id`, `student_id`, `title`, `doc`) VALUES (12, 4, 'Admission form', 'Curriculum_Vitae(bsc.it).docx');
INSERT INTO `student_doc` (`id`, `student_id`, `title`, `doc`) VALUES (13, 7, 'Admission form', 'Book2.csv');
INSERT INTO `student_doc` (`id`, `student_id`, `title`, `doc`) VALUES (14, 8, 'Admission form', 'C-fikhPUAAAvLro.jpg');


#
# TABLE STRUCTURE FOR: student_fees
#

DROP TABLE IF EXISTS `student_fees`;

CREATE TABLE `student_fees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: student_fees_deposite
#

DROP TABLE IF EXISTS `student_fees_deposite`;

CREATE TABLE `student_fees_deposite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_fees_master_id` int(11) DEFAULT NULL,
  `fee_groups_feetype_id` int(11) DEFAULT NULL,
  `amount_detail` text,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `student_fees_master_id` (`student_fees_master_id`),
  KEY `fee_groups_feetype_id` (`fee_groups_feetype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: student_fees_discounts
#

DROP TABLE IF EXISTS `student_fees_discounts`;

CREATE TABLE `student_fees_discounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_session_id` int(11) DEFAULT NULL,
  `fees_discount_id` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'assigned',
  `payment_id` varchar(50) DEFAULT NULL,
  `description` text,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `student_session_id` (`student_session_id`),
  KEY `fees_discount_id` (`fees_discount_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: student_fees_master
#

DROP TABLE IF EXISTS `student_fees_master`;

CREATE TABLE `student_fees_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_session_id` int(11) DEFAULT NULL,
  `fee_session_group_id` int(11) DEFAULT NULL,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_system` int(1) NOT NULL DEFAULT '0',
  `amount` float(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `student_session_id` (`student_session_id`),
  KEY `fee_session_group_id` (`fee_session_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `student_fees_master` (`id`, `student_session_id`, `fee_session_group_id`, `is_active`, `created_at`, `is_system`, `amount`) VALUES (5, 7, 3, 'yes', '2018-11-27 00:43:47', 0, '0.00');
INSERT INTO `student_fees_master` (`id`, `student_session_id`, `fee_session_group_id`, `is_active`, `created_at`, `is_system`, `amount`) VALUES (6, 2, 3, 'yes', '2018-11-27 00:43:51', 0, '0.00');
INSERT INTO `student_fees_master` (`id`, `student_session_id`, `fee_session_group_id`, `is_active`, `created_at`, `is_system`, `amount`) VALUES (7, 6, 3, 'yes', '2018-11-27 00:43:55', 0, '0.00');


#
# TABLE STRUCTURE FOR: student_session
#

DROP TABLE IF EXISTS `student_session`;

CREATE TABLE `student_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `division_id`, `route_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `created_at`, `updated_at`) VALUES (1, 11, 3, 4, 4, 0, 0, '0.00', '0.00', 'no', '2018-09-29 00:16:33', '0000-00-00 00:00:00');
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `division_id`, `route_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `created_at`, `updated_at`) VALUES (2, 11, 4, 1, 1, 0, 0, '0.00', '0.00', 'no', '2018-09-22 16:13:34', '0000-00-00 00:00:00');
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `division_id`, `route_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `created_at`, `updated_at`) VALUES (3, 11, 7, 1, 1, 0, NULL, '0.00', '0.00', 'no', '2018-09-24 15:06:23', '0000-00-00 00:00:00');
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `division_id`, `route_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `created_at`, `updated_at`) VALUES (4, 7, 4, 1, 1, 0, NULL, '0.00', '0.00', 'no', '2018-10-29 23:47:59', '0000-00-00 00:00:00');
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `division_id`, `route_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `created_at`, `updated_at`) VALUES (5, 7, 7, 1, 1, 0, NULL, '0.00', '0.00', 'no', '2018-10-29 23:47:59', '0000-00-00 00:00:00');
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `division_id`, `route_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `created_at`, `updated_at`) VALUES (6, 11, 8, 1, 1, 0, 0, '0.00', '0.00', 'no', '2018-11-05 22:51:23', '0000-00-00 00:00:00');
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `division_id`, `route_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `created_at`, `updated_at`) VALUES (7, 11, 9, 1, 1, 0, 0, '0.00', '0.00', 'no', '2018-11-22 15:57:46', '0000-00-00 00:00:00');
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `division_id`, `route_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `created_at`, `updated_at`) VALUES (8, 11, 10, 2, 1, 0, 0, '0.00', '0.00', 'no', '2018-12-12 04:32:33', '0000-00-00 00:00:00');
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `division_id`, `route_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `created_at`, `updated_at`) VALUES (9, 11, 11, 3, 3, 0, 0, '0.00', '0.00', 'no', '2018-12-12 04:39:32', '0000-00-00 00:00:00');
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `division_id`, `route_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `created_at`, `updated_at`) VALUES (10, 11, 12, 2, 1, 0, 0, '0.00', '0.00', 'no', '2018-12-12 04:43:22', '0000-00-00 00:00:00');
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `division_id`, `route_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `created_at`, `updated_at`) VALUES (11, 11, 13, 4, 3, 0, 0, '0.00', '0.00', 'no', '2018-12-12 04:45:07', '0000-00-00 00:00:00');
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `division_id`, `route_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `created_at`, `updated_at`) VALUES (12, 11, 14, 1, 1, 0, 0, '0.00', '0.00', 'no', '2018-12-12 04:46:26', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: student_transport_fees
#

DROP TABLE IF EXISTS `student_transport_fees`;

CREATE TABLE `student_transport_fees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_session_id` int(11) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `amount_discount` float(10,2) NOT NULL,
  `amount_fine` float(10,2) NOT NULL DEFAULT '0.00',
  `description` text COLLATE utf8_unicode_ci,
  `date` date DEFAULT '0000-00-00',
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `payment_mode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: students
#

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `created_at`, `updated_at`, `disable_at`, `note`) VALUES (3, 0, '001', '1', '2018-09-22', 'Rakesh', 'Jadhav', 'Yes', 'uploads/student_images/3.png', '1234567890', 'rakeshjadhav933@gmail.com', NULL, NULL, NULL, 'Hindu', 'Open', '2018-09-11', 'Male', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', '    ', '3', 0, 0, '', 0, '1234567890877', '1234567890877', 'ICIC47125896354', 'ICICI', 'ICICI745896', 'mother', 'Ramesh Tukaram Jadhav', '7744963663', 'Self Employee', 'Reshama Ramesh Jadhav', '7744963663', 'housewife', 'Reshama Ramesh Jadhav', 'Mother', '7744963663', 'housewife', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', 'admin@admin.com', '', 0, 0, 'yes', 'Lal bahadur shatri', '2018-11-22 17:33:19', '0000-00-00 00:00:00', '0000-00-00', '');
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `created_at`, `updated_at`, `disable_at`, `note`) VALUES (4, 0, '002', '2', '2018-09-22', 'Rahul', 'Jadhav', 'No', 'uploads/student_images/4.png', '1234567890', 'rakeshjadhav933@gmail.com', NULL, NULL, NULL, 'Hindu', 'Open', '2018-09-04', 'Male', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', ' ', '3', 0, 0, '', 0, '1234567890877', '1234567890877', 'ICIC47125896354', 'ICICI', 'ICICI745896', 'mother', 'Ramesh Tukaram Jadhav', '7744963663', 'Self Employee', 'Reshama Ramesh Jadhav', '7744963663', 'housewife', 'Reshama Ramesh Jadhav', 'Mother', '7744963663', 'housewife', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', 'admin@admin.com', '', 0, 0, 'yes', '', '2018-11-22 17:33:16', '0000-00-00 00:00:00', '0000-00-00', '');
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `created_at`, `updated_at`, `disable_at`, `note`) VALUES (5, 0, '12', '133', '2018-12-06', 'dsff', 'ffdf', 'No', NULL, '3323333332', 'rakesh@gmail.com', 'maha', 'mum', '400155', '', '', '2018-12-06', NULL, '', '', NULL, 0, 0, '', 0, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 0, 0, 'yes', NULL, '2018-11-22 17:33:13', '0000-00-00 00:00:00', '0000-00-00', '');
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `created_at`, `updated_at`, `disable_at`, `note`) VALUES (6, 0, '12', '133', '2018-12-06', 'dsff', 'ffdf', 'No', NULL, '3323333332', 'rakesh@gmail.com', 'maha', 'mum', '400155', '', '', '2018-12-06', NULL, '', '', NULL, 0, 0, '', 0, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 0, 0, 'yes', NULL, '2018-11-22 17:33:11', '0000-00-00 00:00:00', '0000-00-00', '');
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `created_at`, `updated_at`, `disable_at`, `note`) VALUES (7, 0, '12', '133', '2018-12-06', 'dsff', 'ffdf', 'No', NULL, '3323333332', 'rakesh@gmail.com', 'maha', 'mum', '400155', '', '', '2018-12-06', NULL, '', '', NULL, 0, 0, '', 0, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 0, 0, 'yes', NULL, '2018-11-22 17:33:08', '0000-00-00 00:00:00', '0000-00-00', '');
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `created_at`, `updated_at`, `disable_at`, `note`) VALUES (8, 0, '007', '10', '2018-11-05', 'Rakesh', 'Jadhav', 'No', 'uploads/student_images/8.png', '7744963663', 'rakeshjadhav933@gmail.com', NULL, NULL, NULL, 'Hindu', 'Maratha', '1994-06-20', 'Male', 'Maharashtra Mumbai\r\nBldg no 41,Room no 2071, Gandhi nagar , M.H.B. colany , Bandra east near sai baba temple,', ' ', '3', 0, 0, '', 0, '', '', '', '', '', 'father', 'Ramesh Tukaram Jadhav', '+917744963663', 'Self Employee', 'Reshama Ramesh Jadhav', '+917744963663', 'housewife', 'Ramesh Tukaram Jadhav', 'Father', '+917744963663', 'Self Employee', 'Maharashtra Mumbai\r\nBldg no 41,Room no 2071, Gandhi nagar , M.H.B. colany , Bandra east near sai baba temple,', 'rakeshjadhav933@gmail.com', '', 0, 0, 'yes', '', '2018-11-22 17:32:52', '0000-00-00 00:00:00', '0000-00-00', '');
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `created_at`, `updated_at`, `disable_at`, `note`) VALUES (9, 0, '111', '111', '2018-11-22', 'demo', 'demo', 'No', 'uploads/student_images/9.png', '1234567890', 'as@gmail.com', NULL, NULL, NULL, 'demo', 'demo', '2018-11-22', 'Male', '', ' ', '3', 0, 0, '', 0, '', '', '', '', '', 'father', 'demo', '1234567890', 'farmer', 'demo', '1234567890', 'housewife', 'demo', 'Father', '1234567890', 'farmer', '', '', '', 0, 0, 'yes', '', '2018-11-22 16:08:22', '0000-00-00 00:00:00', '0000-00-00', '');
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `created_at`, `updated_at`, `disable_at`, `note`) VALUES (10, 0, '678', '122', '2018-12-11', 'Ganesh', 'Shinde', 'No', 'uploads/student_images/no_image.png', '7744696366', 'admin@gmail.com', NULL, NULL, NULL, 'Hindu', 'Open', '2018-12-11', 'Male', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', ' ', '3', 0, 0, 'A-', 0, '', '', '', '', '', 'father', 'Ramesh Tukaram Jadhav', '7744963663', 'Self Employee', 'Reshama Ramesh Jadhav', '7744963663', 'housewife', 'Ramesh Tukaram Jadhav', 'Father', '7744963663', 'Self Employee', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', '', '', 0, 0, 'yes', '', '2018-12-12 04:32:33', '0000-00-00 00:00:00', '0000-00-00', '');
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `created_at`, `updated_at`, `disable_at`, `note`) VALUES (11, 0, '4343354', '555', '2018-12-12', 'ewe', 'rewrr', 'No', 'uploads/student_images/no_image.png', '09819142331', 'admin@gmail.com', NULL, NULL, NULL, 'Hindu', 'Open', '2018-12-11', 'Male', 'Maharashtra Mumbai\r\nBldg no 41,Room no 2071, Gandhi nagar , M.H.B. colany , Bandra east near sai baba temple,', ' ', '2', 0, 0, 'O+', 0, 'sdsadsad', 'sdsadsad', 'dsadsda', 'dsdsdsd', 'sdsdsad', 'father', 'Ramesh Tukaram Jadhav', '+917744963663', 'Self Employee', 'Reshama Ramesh Jadhav', '+917744963663', 'housewife', 'Ramesh Tukaram Jadhav', 'Father', '+917744963663', 'Self Employee', 'Maharashtra Mumbai\r\nBldg no 41,Room no 2071, Gandhi nagar , M.H.B. colany , Bandra east near sai baba temple,', '', '', 0, 0, 'yes', 'sadsaddsdsad', '2018-12-12 04:39:32', '0000-00-00 00:00:00', '0000-00-00', '');
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `created_at`, `updated_at`, `disable_at`, `note`) VALUES (12, 0, '434335456', '555', '2018-12-12', 'rrr', 'ddd', 'No', 'uploads/student_images/no_image.png', '09819142331', 'admin@gmail.com', NULL, NULL, NULL, '', 'Open', '2018-12-11', 'Male', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', ' ', '2', 0, 0, 'B-', 0, 'sdsadsad', 'sdsadsad', 'dsadsda', 'dsdsdsd', 'sdsdsad', 'father', 'Ramesh Tukaram Jadhav', '7744963663', 'Self Employee', 'Reshama Ramesh Jadhav', '7744963663', 'housewife', 'rrr ddd', 'Father', '7744963663', 'Self Employee', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', '', '', 0, 0, 'yes', '', '2018-12-12 04:43:22', '0000-00-00 00:00:00', '0000-00-00', '');
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `created_at`, `updated_at`, `disable_at`, `note`) VALUES (13, 0, '434335456333', '555', '2018-12-12', 'rrr', 'ddd', 'No', 'uploads/student_images/no_image.png', '09819142331', '', NULL, NULL, NULL, '', 'Open', '2018-12-11', 'Male', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', ' ', '2', 0, 0, 'AB+', 0, 'sdsadsad', 'sdsadsad', 'dsadsda', 'dsdsdsd', 'sdsdsad', 'father', 'Ramesh Tukaram Jadhav', '7744963663', 'Self Employee', 'Reshama Ramesh Jadhav', '7744963663', 'housewife', 'Ramesh Tukaram Jadhav', 'Father', '7744963663', 'Self Employee', 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', '', '', 0, 0, 'yes', '', '2018-12-12 04:45:07', '0000-00-00 00:00:00', '0000-00-00', '');
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `created_at`, `updated_at`, `disable_at`, `note`) VALUES (14, 0, '565656', '555', '2018-12-12', 'er', 'rrrr', 'No', 'uploads/student_images/no_image.png', '09819142331', 'admin@gmail.com', NULL, NULL, NULL, 'Hindu', 'Open', '2018-12-11', 'Male', '', ' ', '2', 0, 0, 'O+', 0, 'sdsadsad', 'sdsadsad', 'dsadsda', 'dsdsdsd', 'sdsdsad', 'father', 'demo', '1234567890', 'farmer', 'demo', '1234567890', 'housewife', 'demo', 'Father', '1234567890', 'farmer', '', '', '', 0, 0, 'yes', '', '2018-12-12 04:46:26', '0000-00-00 00:00:00', '0000-00-00', '');


#
# TABLE STRUCTURE FOR: subjects
#

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `subjects` (`id`, `name`, `code`, `type`, `is_active`, `created_at`, `updated_at`) VALUES (2, 'Hindi', '123', 'Theory', 'no', '2018-09-18 19:25:48', '0000-00-00 00:00:00');
INSERT INTO `subjects` (`id`, `name`, `code`, `type`, `is_active`, `created_at`, `updated_at`) VALUES (3, 'Marathi', 'MAR123', 'Theory', 'no', '2018-09-18 19:25:58', '0000-00-00 00:00:00');
INSERT INTO `subjects` (`id`, `name`, `code`, `type`, `is_active`, `created_at`, `updated_at`) VALUES (4, 'Mathematics', '1234', 'Practical', 'no', '2018-09-18 19:26:11', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: teacher_subjects
#

DROP TABLE IF EXISTS `teacher_subjects`;

CREATE TABLE `teacher_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) DEFAULT NULL,
  `class_division_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `class_section_id` (`class_division_id`),
  KEY `session_id` (`session_id`),
  KEY `subject_id` (`subject_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `teacher_subjects` (`id`, `session_id`, `class_division_id`, `subject_id`, `teacher_id`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (1, 11, 1, 2, 13, NULL, 'no', '2018-12-11 13:07:24', '0000-00-00 00:00:00');
INSERT INTO `teacher_subjects` (`id`, `session_id`, `class_division_id`, `subject_id`, `teacher_id`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (2, 11, 2, 2, 13, NULL, 'no', '2018-12-11 13:08:17', '0000-00-00 00:00:00');
INSERT INTO `teacher_subjects` (`id`, `session_id`, `class_division_id`, `subject_id`, `teacher_id`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (3, 11, 3, 3, 3, NULL, 'no', '2018-09-20 10:28:59', '0000-00-00 00:00:00');
INSERT INTO `teacher_subjects` (`id`, `session_id`, `class_division_id`, `subject_id`, `teacher_id`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (4, 11, 7, 2, 2, NULL, 'no', '2018-09-20 10:29:28', '0000-00-00 00:00:00');
INSERT INTO `teacher_subjects` (`id`, `session_id`, `class_division_id`, `subject_id`, `teacher_id`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (5, 11, 7, 3, 3, NULL, 'no', '2018-09-20 10:29:28', '0000-00-00 00:00:00');
INSERT INTO `teacher_subjects` (`id`, `session_id`, `class_division_id`, `subject_id`, `teacher_id`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (6, 11, 7, 4, 2, NULL, 'no', '2018-09-20 10:29:28', '0000-00-00 00:00:00');
INSERT INTO `teacher_subjects` (`id`, `session_id`, `class_division_id`, `subject_id`, `teacher_id`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (7, 11, 1, 3, 13, NULL, 'no', '2018-12-11 13:07:24', '0000-00-00 00:00:00');
INSERT INTO `teacher_subjects` (`id`, `session_id`, `class_division_id`, `subject_id`, `teacher_id`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (8, 11, 1, 4, 13, NULL, 'no', '2018-12-11 13:07:24', '0000-00-00 00:00:00');
INSERT INTO `teacher_subjects` (`id`, `session_id`, `class_division_id`, `subject_id`, `teacher_id`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (9, 11, 10, 2, 2, NULL, 'no', '2018-10-18 00:31:54', '0000-00-00 00:00:00');
INSERT INTO `teacher_subjects` (`id`, `session_id`, `class_division_id`, `subject_id`, `teacher_id`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (10, 11, 9, 3, 3, NULL, 'no', '2018-10-18 00:32:48', '0000-00-00 00:00:00');
INSERT INTO `teacher_subjects` (`id`, `session_id`, `class_division_id`, `subject_id`, `teacher_id`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (11, 11, 2, 3, 13, NULL, 'no', '2018-12-11 13:08:17', '0000-00-00 00:00:00');
INSERT INTO `teacher_subjects` (`id`, `session_id`, `class_division_id`, `subject_id`, `teacher_id`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (12, 11, 4, 2, 13, NULL, 'no', '2018-12-11 13:08:28', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: teachers
#

DROP TABLE IF EXISTS `teachers`;

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `teachers` (`id`, `name`, `email`, `password`, `address`, `dob`, `designation`, `sex`, `phone`, `image`, `is_active`, `created_at`, `updated_at`) VALUES (2, 'Rahul Ramesh Jadhav', 'rahuljadhav@gmail.com', NULL, 'Maharashtra Mumbai\r\nBldg no 41,Room no 2071, Gandhi nagar , M.H.B. colany , Bandra east near sai baba temple,', '1970-01-01', NULL, 'Male', '8149139782', 'uploads/teacher_images/2.png', 'no', '2018-09-18 17:19:04', '0000-00-00 00:00:00');
INSERT INTO `teachers` (`id`, `name`, `email`, `password`, `address`, `dob`, `designation`, `sex`, `phone`, `image`, `is_active`, `created_at`, `updated_at`) VALUES (3, 'Ganesh Mores', 'ganesh@tech.coms', NULL, '386, A, Drupadi Building, Flat No.6, 1st Floor, V.P.Road, Near Congress House', '1970-01-01', NULL, 'Female', '7744963663', 'uploads/teacher_images/3.png', 'no', '2018-09-18 17:18:13', '0000-00-00 00:00:00');
INSERT INTO `teachers` (`id`, `name`, `email`, `password`, `address`, `dob`, `designation`, `sex`, `phone`, `image`, `is_active`, `created_at`, `updated_at`) VALUES (4, 'Ms. Smurti Mogare', 'admin@admin.com', NULL, 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', '2018-10-18', NULL, 'Female', '+917744963663', 'uploads/teacher_images/4.png', 'no', '2018-10-18 23:44:46', '0000-00-00 00:00:00');
INSERT INTO `teachers` (`id`, `name`, `email`, `password`, `address`, `dob`, `designation`, `sex`, `phone`, `image`, `is_active`, `created_at`, `updated_at`) VALUES (5, 'Rakesh Jadhav', 'rakesh@admin.com', NULL, 'The animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015\r\nThe animator, Room NO.40, 3RD Floor, Modern Building NO.1,, Jakaria Bunder Road, Cotton Green (west), Mumbai, Maharashtra 400015', '2018-10-30', NULL, 'Male', '+917744963663', 'uploads/teacher_images/5.png', 'no', '2018-10-30 23:32:47', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: timetables
#

DROP TABLE IF EXISTS `timetables`;

CREATE TABLE `timetables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_subject_id` int(20) DEFAULT NULL,
  `day_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_time` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_time` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_no` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (1, 1, 'Monday', '10:00 AM', '11:00 PM', '1', 'no', '2018-09-20 14:30:23', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (2, 1, 'Tuesday', '11:00 AM', '11:00 PM', '2', 'no', '2018-09-20 14:30:23', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (3, 1, 'Wednesday', '11:00 PM', '11:00 PM', '3', 'no', '2018-09-20 14:30:23', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (4, 1, 'Thursday', '11:00 PM', '11:00 PM', '4', 'no', '2018-09-20 14:30:23', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (5, 1, 'Friday', '11:00 PM', '11:00 PM', '5', 'no', '2018-09-20 14:30:23', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (6, 1, 'Saturday', '03:00 AM', '11:00 PM', '6', 'no', '2018-09-20 14:30:23', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (7, 1, 'Sunday', '05:00 AM', '11:00 PM', '7', 'no', '2018-09-20 14:30:23', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (8, 7, 'Monday', '10:00 AM', '11:00 PM', '1', 'no', '2018-09-20 15:28:21', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (9, 7, 'Tuesday', '11:00 AM', '11:00 PM', '2', 'no', '2018-09-20 15:28:21', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (10, 7, 'Wednesday', '11:00 PM', '11:00 PM', '3', 'no', '2018-09-20 15:28:21', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (11, 7, 'Thursday', '11:00 PM', '11:00 PM', '4', 'no', '2018-09-20 15:28:22', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (12, 7, 'Friday', '02:00 AM', '11:00 PM', '5', 'no', '2018-09-20 15:28:22', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (13, 7, 'Saturday', '03:00 AM', '11:00 PM', '6', 'no', '2018-09-20 15:28:22', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (14, 7, 'Sunday', '05:00 AM', '11:00 PM', '7', 'no', '2018-09-20 15:28:22', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (15, 4, 'Monday', '10:00 AM', '11:00 PM', '1', 'no', '2018-10-17 00:01:16', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (16, 4, 'Tuesday', '11:00 AM', '11:00 PM', '2', 'no', '2018-10-17 00:01:17', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (17, 4, 'Wednesday', '11:00 PM', '11:00 PM', '3', 'no', '2018-10-17 00:01:17', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (18, 4, 'Thursday', '11:00 PM', '11:00 PM', '4', 'no', '2018-10-17 00:01:17', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (19, 4, 'Friday', '02:00 AM', '11:00 PM', '5', 'no', '2018-10-17 00:01:17', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (20, 4, 'Saturday', '03:00 AM', '11:00 PM', '6', 'no', '2018-10-17 00:01:17', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (21, 4, 'Sunday', '05:00 AM', '11:00 PM', '7', 'no', '2018-10-17 00:01:17', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (22, 8, 'Monday', '10:00 AM', '11:00 PM', '1', 'no', '2018-10-25 23:08:47', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (23, 8, 'Tuesday', '11:00 AM', '11:00 PM', '2', 'no', '2018-10-25 23:08:47', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (24, 8, 'Wednesday', '', '', '', 'no', '2018-10-25 23:08:47', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (25, 8, 'Thursday', '', '', '', 'no', '2018-10-25 23:08:47', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (26, 8, 'Friday', '', '', '', 'no', '2018-10-25 23:08:47', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (27, 8, 'Saturday', '', '', '', 'no', '2018-10-25 23:08:47', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (28, 8, 'Sunday', '', '', '', 'no', '2018-10-25 23:08:47', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (29, 2, 'Monday', '09:30', '10:30', '1', 'no', '2018-12-04 10:00:38', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (30, 2, 'Tuesday', '10:30', '11:30', '2', 'no', '2018-12-04 10:00:38', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (31, 2, 'Wednesday', '11:30', '12:30', '3', 'no', '2018-12-04 10:00:38', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (32, 2, 'Thursday', '12:30', '01:30', '4', 'no', '2018-12-04 10:00:38', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (33, 2, 'Friday', '02:30', '03:00', '5', 'no', '2018-12-04 10:00:38', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (34, 2, 'Saturday', '', '', '', 'no', '2018-12-04 10:00:38', '0000-00-00 00:00:00');
INSERT INTO `timetables` (`id`, `teacher_subject_id`, `day_name`, `start_time`, `end_time`, `room_no`, `is_active`, `created_at`, `updated_at`) VALUES (35, 2, 'Sunday', '', '', '', 'no', '2018-12-04 10:00:38', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: transport_route
#

DROP TABLE IF EXISTS `transport_route`;

CREATE TABLE `transport_route` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_of_vehicle` int(11) DEFAULT NULL,
  `fare` float(10,2) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: userlog
#

DROP TABLE IF EXISTS `userlog`;

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  `user_agent` varchar(500) DEFAULT NULL,
  `login_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=257 DEFAULT CHARSET=utf8;

INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (1, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-15 20:03:24');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (2, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-16 23:32:48');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (3, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-17 22:32:54');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (4, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-20 18:00:36');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (5, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-21 11:32:04');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (6, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-21 11:33:01');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (7, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-21 16:04:45');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (8, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-21 16:25:56');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (9, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-21 16:43:15');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (10, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-21 23:29:45');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (11, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-23 19:53:13');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (12, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-24 10:40:13');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (13, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-24 15:54:34');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (14, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-25 11:11:49');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (15, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-26 15:59:30');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (16, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-26 22:48:30');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (17, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-27 12:59:49');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (18, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-30 00:05:20');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (19, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-30 12:32:56');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (20, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-30 23:04:41');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (21, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-31 10:34:15');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (22, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-07-31 17:55:54');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (23, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-01 17:01:40');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (24, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-01 23:26:17');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (25, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-02 10:24:22');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (26, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-02 23:42:23');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (27, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-04 23:05:27');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (28, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-05 19:49:38');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (29, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-05 23:51:37');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (30, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-07 23:17:27');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (31, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-08 23:09:41');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (32, 'myschool@admin.com', 'admin', '::1', 'Chrome 67.0.3396.99, Windows 10', '2018-08-09 10:23:07');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (33, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-11 22:58:18');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (34, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-12 19:45:09');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (35, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-12 19:49:58');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (36, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-12 20:00:02');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (37, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-13 23:54:30');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (38, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-15 10:43:40');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (39, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-15 22:58:42');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (40, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-15 23:16:29');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (41, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-15 23:16:55');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (42, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-16 23:04:29');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (43, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-19 00:08:33');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (44, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-20 23:36:56');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (45, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-21 22:42:27');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (46, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-23 23:56:04');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (47, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-25 13:19:04');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (48, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-28 11:05:51');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (49, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-29 16:17:52');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (50, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-30 11:16:46');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (51, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-08-31 18:57:50');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (52, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-04 15:02:16');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (53, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-04 15:46:42');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (54, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-05 10:26:05');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (55, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-05 10:26:56');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (56, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-06 10:30:32');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (57, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-06 18:08:39');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (58, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-06 22:54:54');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (59, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-08 16:05:15');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (60, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-09 07:43:45');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (61, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-09 07:59:18');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (62, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-09 08:19:50');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (63, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-10 22:42:39');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (64, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-11 16:43:50');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (65, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-12 10:47:48');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (66, 'myschool@admin.com', 'admin', '::1', 'Chrome 68.0.3440.106, Windows 10', '2018-09-18 10:50:43');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (67, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-19 11:05:46');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (68, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-19 18:40:53');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (69, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-20 10:23:42');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (70, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-20 23:45:23');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (71, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-20 23:56:30');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (72, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-21 11:08:50');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (73, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-22 11:32:42');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (74, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-24 10:49:28');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (75, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-24 12:49:34');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (76, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-24 18:38:32');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (77, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-24 22:45:30');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (78, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-25 23:31:22');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (79, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-26 23:21:47');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (80, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-27 23:01:05');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (81, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-09-28 22:37:16');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (82, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-01 23:22:49');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (83, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-04 23:17:17');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (84, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-07 00:47:12');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (85, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-10 21:42:44');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (86, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-16 23:21:06');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (87, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-17 00:22:01');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (88, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-17 23:14:33');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (89, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-17 23:49:56');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (90, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-18 00:37:28');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (91, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-18 23:42:20');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (92, 'myschool@admin.com', 'admin', '::1', 'Chrome 69.0.3497.100, Windows 10', '2018-10-19 23:24:33');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (93, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-20 23:39:49');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (94, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-21 21:45:32');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (95, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-21 22:23:24');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (96, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-21 22:33:57');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (97, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-22 00:50:35');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (98, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-22 00:57:21');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (99, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-22 01:11:01');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (100, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-22 22:36:53');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (101, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-22 22:36:53');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (102, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-22 22:44:22');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (103, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-23 00:04:43');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (104, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-23 00:14:58');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (105, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-23 00:27:39');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (106, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-23 00:31:17');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (107, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-23 00:39:36');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (108, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-23 22:50:36');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (109, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-23 22:55:57');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (110, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Android', '2018-10-24 00:21:29');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (111, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-24 23:36:37');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (112, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-24 23:45:50');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (113, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-24 23:53:05');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (114, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-25 23:04:59');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (115, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-25 23:06:20');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (116, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-25 23:07:30');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (117, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-25 23:11:19');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (118, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-25 23:34:41');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (119, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-26 23:29:10');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (120, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-27 23:20:06');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (121, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-28 00:51:45');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (122, 'librarian1', 'librarian', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-28 23:29:05');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (123, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-28 23:52:00');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (124, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-29 00:35:22');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (125, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-29 00:39:13');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (126, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-29 23:19:13');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (127, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-30 23:18:55');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (128, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-30 23:31:39');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (129, 'teacher5', 'teacher', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-30 23:33:49');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (130, 'teacher5', 'teacher', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-30 23:41:50');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (131, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-31 00:28:24');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (132, 'teacher5', 'teacher', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-10-31 23:25:43');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (133, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-11-01 23:37:26');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (134, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-11-02 23:51:45');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (135, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-11-04 23:29:13');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (136, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-11-05 00:04:37');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (137, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.67, Windows 10', '2018-11-05 00:06:03');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (138, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-05 00:28:59');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (139, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-05 22:46:29');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (140, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-05 22:49:15');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (141, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-05 22:58:38');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (142, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-05 23:17:16');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (143, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-05 23:27:00');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (144, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-05 23:54:02');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (145, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-06 00:09:26');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (146, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Android', '2018-11-06 00:51:20');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (147, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-06 01:01:23');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (148, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-07 00:01:52');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (149, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-07 23:36:41');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (150, 'std8', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-08 20:26:12');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (151, 'rakesh', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-09 00:01:55');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (152, 'rakesh', 'student', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-10 00:00:42');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (153, 'parent8', 'parent', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-10 00:14:53');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (154, 'parent8', 'parent', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-10 23:29:41');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (155, 'parent8', 'parent', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-11 21:03:16');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (156, 'parent8', 'parent', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-12 23:08:46');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (157, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.77, Windows 10', '2018-11-12 23:44:07');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (158, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.77, Windows 7', '2018-11-13 11:12:04');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (159, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.77, Windows 7', '2018-11-13 01:37:43');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (160, 'myschool@admin.com', 'admin', '::1', 'Chrome 70.0.3538.77, Windows 7', '2018-11-13 02:10:04');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (161, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.102, Windows 7', '2018-11-19 18:48:17');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (162, NULL, 'admin', '::1', 'Chrome 70.0.3538.102, Windows 7', '2018-11-19 18:48:17');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (163, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-11-20 11:24:29');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (164, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-11-20 11:24:29');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (165, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-11-20 14:48:28');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (166, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-11-20 14:48:28');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (167, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:57:34');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (168, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 10:57:35');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (169, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 13:06:06');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (170, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 13:06:06');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (171, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:01:07');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (172, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:01:07');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (173, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:06:35');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (174, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:06:35');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (175, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:08:35');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (176, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:08:35');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (177, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:09:49');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (178, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:09:49');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (179, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:11:01');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (180, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:11:01');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (181, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:11:50');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (182, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:11:50');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (183, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:15:19');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (184, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:15:19');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (185, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:16:34');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (186, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:16:34');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (187, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:17:01');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (188, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:17:01');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (189, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:21:12');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (190, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:21:12');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (191, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:31:01');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (192, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:31:01');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (193, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:33:36');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (194, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:33:36');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (195, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:35:01');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (196, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-01 16:35:01');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (197, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Android', '2018-12-03 12:24:53');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (198, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Android', '2018-12-03 12:24:54');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (199, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-03 12:29:28');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (200, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-03 12:29:29');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (201, 'demo1@gmail.com', 'Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-03 18:55:08');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (202, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-03 18:55:09');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (203, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-03 18:56:20');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (204, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-03 18:56:20');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (205, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-04 09:36:59');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (206, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-04 09:36:59');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (207, 'sadmin@gmail.com', '', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-04 10:13:37');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (208, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-04 10:13:37');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (209, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-04 10:14:21');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (210, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-04 10:14:21');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (211, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-04 14:29:01');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (212, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-04 14:29:01');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (213, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-06 04:07:11');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (214, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-06 04:07:12');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (215, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-06 05:05:58');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (216, NULL, 'admin', '::1', 'Chrome 70.0.3538.110, Windows 7', '2018-12-06 05:05:58');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (217, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-08 19:27:01');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (218, NULL, 'admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-08 19:27:01');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (219, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-11 13:02:17');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (220, NULL, 'admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-11 13:02:17');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (221, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-11 15:22:50');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (222, NULL, 'admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-11 15:22:50');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (223, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-12 01:30:58');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (224, NULL, 'admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-12 01:30:59');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (225, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-12 03:51:52');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (226, NULL, 'admin', '::1', 'Chrome 71.0.3578.80, Windows 7', '2018-12-12 03:51:52');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (227, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2018-12-15 15:34:38');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (228, NULL, 'admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2018-12-15 15:34:43');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (229, 'admin@techvill.net', 'Teacher', '::1', 'Chrome 71.0.3578.98, Windows 7', '2018-12-17 17:16:44');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (230, NULL, 'admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2018-12-17 17:16:44');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (231, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2018-12-19 10:34:00');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (232, NULL, 'admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2018-12-19 10:34:00');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (233, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2018-12-20 06:22:11');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (234, NULL, 'admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2018-12-20 06:22:11');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (235, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2018-12-20 14:01:54');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (236, NULL, 'admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2018-12-20 14:01:54');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (237, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2018-12-24 16:44:02');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (238, NULL, 'admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2018-12-24 16:44:02');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (239, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2019-01-01 17:43:45');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (240, NULL, 'admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2019-01-01 17:43:47');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (241, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2019-01-23 16:13:47');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (242, NULL, 'admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2019-01-23 16:13:49');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (243, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2019-01-28 10:15:18');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (244, NULL, 'admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2019-01-28 10:15:18');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (245, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2019-01-29 10:27:01');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (246, NULL, 'admin', '::1', 'Chrome 71.0.3578.98, Windows 7', '2019-01-29 10:27:01');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (247, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.98, Windows 10', '2019-01-30 23:43:55');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (248, NULL, 'admin', '::1', 'Chrome 71.0.3578.98, Windows 10', '2019-01-30 23:43:55');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (249, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.98, Windows 10', '2019-01-31 23:19:03');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (250, NULL, 'admin', '::1', 'Chrome 71.0.3578.98, Windows 10', '2019-01-31 23:19:03');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (251, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.98, Windows 10', '2019-02-01 22:54:25');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (252, NULL, 'admin', '::1', 'Chrome 71.0.3578.98, Windows 10', '2019-02-01 22:54:25');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (253, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.98, Windows 10', '2019-02-01 22:56:52');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (254, NULL, 'admin', '::1', 'Chrome 71.0.3578.98, Windows 10', '2019-02-01 22:56:52');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (255, 'sa@gmail.com', 'Super Admin', '::1', 'Chrome 71.0.3578.98, Windows 10', '2019-02-01 23:01:54');
INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (256, NULL, 'admin', '::1', 'Chrome 71.0.3578.98, Windows 10', '2019-02-01 23:01:54');


#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `childs` text COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `verification_code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `is_active`, `created_at`, `updated_at`) VALUES (1, 1, 'teacher1', 'y9ary4', '', 'teacher', '', 'yes', '2018-06-29 19:12:47', '0000-00-00 00:00:00');
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `is_active`, `created_at`, `updated_at`) VALUES (2, 1, 'std1', 'jhol91', '', 'student', '', 'yes', '2018-07-03 05:57:21', '0000-00-00 00:00:00');
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `is_active`, `created_at`, `updated_at`) VALUES (5, 1, 'librarian1', '123456', '', 'librarian', '', 'yes', '2018-10-23 17:22:16', '0000-00-00 00:00:00');
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `is_active`, `created_at`, `updated_at`) VALUES (6, 5, 'teacher5', 'hn5sii', '', 'teacher', '', 'yes', '2018-10-30 23:32:47', '0000-00-00 00:00:00');
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `is_active`, `created_at`, `updated_at`) VALUES (7, 8, 'rakesh', 'rakesh', '', 'student', '', 'yes', '2018-11-09 00:01:02', '0000-00-00 00:00:00');
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `is_active`, `created_at`, `updated_at`) VALUES (8, 8, 'parent8', '6envso', '8', 'parent', '', 'yes', '2018-11-05 22:51:23', '0000-00-00 00:00:00');
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `is_active`, `created_at`, `updated_at`) VALUES (9, 9, 'std9', 'o7tqhj', '', 'student', '', 'yes', '2018-11-22 15:57:46', '0000-00-00 00:00:00');
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `is_active`, `created_at`, `updated_at`) VALUES (10, 9, 'parent9', 'l0dium', '9', 'parent', '', 'yes', '2018-11-22 15:57:46', '0000-00-00 00:00:00');
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `is_active`, `created_at`, `updated_at`) VALUES (11, 10, '10', 'lcszur', '', 'student', '', 'yes', '2018-12-12 04:32:33', '0000-00-00 00:00:00');
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `is_active`, `created_at`, `updated_at`) VALUES (12, 11, '11', 'pbca8v', '', 'student', '', 'yes', '2018-12-12 04:39:32', '0000-00-00 00:00:00');
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `is_active`, `created_at`, `updated_at`) VALUES (13, 12, 'std12', 'x4g6a4', '', 'student', '', 'yes', '2018-12-12 04:43:22', '0000-00-00 00:00:00');
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `is_active`, `created_at`, `updated_at`) VALUES (14, 13, 'std13', '0deb6a', '', 'student', '', 'yes', '2018-12-12 04:45:07', '0000-00-00 00:00:00');
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `is_active`, `created_at`, `updated_at`) VALUES (15, 14, 'std14', 'bmykgw', '', 'student', '', 'yes', '2018-12-12 04:46:26', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: vehicle_routes
#

DROP TABLE IF EXISTS `vehicle_routes`;

CREATE TABLE `vehicle_routes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `route_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: vehicles
#

DROP TABLE IF EXISTS `vehicles`;

CREATE TABLE `vehicles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vehicle_no` varchar(20) DEFAULT NULL,
  `vehicle_model` varchar(100) NOT NULL DEFAULT 'None',
  `manufacture_year` varchar(4) DEFAULT NULL,
  `driver_name` varchar(50) DEFAULT NULL,
  `driver_licence` varchar(50) NOT NULL DEFAULT 'None',
  `driver_contact` varchar(20) DEFAULT NULL,
  `note` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

