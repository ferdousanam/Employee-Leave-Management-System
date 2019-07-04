-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2017 at 03:37 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'anam');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `employment_status` varchar(50) NOT NULL,
  `sub_unit` varchar(50) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `cell_phone` varchar(20) NOT NULL,
  `home_phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `emergency_contact_name` varchar(50) NOT NULL,
  `emergency_contact_number` varchar(20) NOT NULL,
  `current_address` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `username`, `password`, `job_title`, `employment_status`, `sub_unit`, `supervisor_id`, `cell_phone`, `home_phone`, `email`, `emergency_contact_name`, `emergency_contact_number`, `current_address`, `permanent_address`, `dob`, `blood_group`, `gender`, `image`) VALUES
(1, 'Kayes', 'Khan', 'kayes', '1', 'Software Engineer', 'Junior', 'Software Dept.', 3, '+8801760981360', '+880254875655', 'kayes@gmail.com', 'Nobel Mahmud', '+8801738238012', 'House: 21, Road: 12, Adabor', 'House: 21, Road: 12, Adabor', '1995-08-01', 'AB+', 1, ''),
(2, 'Kamrul Hasan', 'Shuvo', 'shuvo', '2', '', '', '', 1, '', '', '', '', '', '', '', '0000-00-00', '', 1, ''),
(3, 'Ferdous', 'Anam', 'anam', '3', '', '', '', 1, '+8801738238012', '', 'ferdous.anam@gmail.com', '', '', 'PC Culture Housing,\r\nAdabar, Dhaka-1207', '', '1995-12-29', '', 0, ''),
(4, 'Ashraful', 'Islam', 'ashraful', '4', 'Senior Software Engineer', 'Senior', 'Software Dept.', 3, '', '', '', '', '', '', '', '0000-00-00', '', 1, ''),
(5, 'Afridi Sajid', 'Chowdhury', 'afridi', '5', 'Graphics Designer', 'Junior', 'Graphics Dept.', 3, '', '', '', '', '', '', '', '0000-00-00', '', 1, ''),
(6, 'Kazal', 'Ghosh', 'kazal', '6', '', '', '', 1, '01765588664488', '', 'kazal@gmail.com', '', '', 'Dhanmondi', '', '0000-00-00', 'A+', 1, ''),
(7, 'Ananna', 'Zoha', 'ananna', 'ananna', '', '', '', 1, '', '', '', '', '', '', '', '0000-00-00', '', 2, ''),
(9, 'Tushar', 'Imran', 'tushar', '9', '', '', '', 4, '+88017894459954566', '', 'tushar@gmail.com', '', '', 'Mohammadpur', '', '1991-01-01', 'A+', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supervisors`
--

CREATE TABLE `tbl_supervisors` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supervisors`
--

INSERT INTO `tbl_supervisors` (`id`, `employee_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `username`, `password`) VALUES
(1, 'admin', 'anam'),
(2, 'admin', 'anam');

-- --------------------------------------------------------

--
-- Table structure for table `tlb_leave_applications`
--

CREATE TABLE `tlb_leave_applications` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `app_subject` varchar(255) NOT NULL,
  `app_body` text NOT NULL,
  `app_approval` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tlb_leave_applications`
--

INSERT INTO `tlb_leave_applications` (`id`, `employee_id`, `app_subject`, `app_body`, `app_approval`) VALUES
(1, 1, 'Want Leave', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', 1),
(2, 3, 'leave', 'sdsfsdfkj', 0),
(3, 3, 'Hello', 'hdshflksdhfigsdf', 0),
(4, 3, 'I want Leave for 5 Days', 'Please Approve my Request', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_supervisors`
--
ALTER TABLE `tbl_supervisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tlb_leave_applications`
--
ALTER TABLE `tlb_leave_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tlb_leave_applications_ibfk_1` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_supervisors`
--
ALTER TABLE `tbl_supervisors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tlb_leave_applications`
--
ALTER TABLE `tlb_leave_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tlb_leave_applications`
--
ALTER TABLE `tlb_leave_applications`
  ADD CONSTRAINT `tlb_leave_applications_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
