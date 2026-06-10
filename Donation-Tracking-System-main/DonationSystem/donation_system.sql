-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2026 at 05:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donation_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`admin_id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', 'Ayyan@123', '2026-05-25 05:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaries`
--

CREATE TABLE `beneficiaries` (
  `beneficiary_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `support_type` varchar(100) DEFAULT NULL,
  `amount_received` decimal(12,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiaries`
--

INSERT INTO `beneficiaries` (`beneficiary_id`, `full_name`, `phone`, `address`, `support_type`, `amount_received`, `created_at`) VALUES
(1, 'Ali Raza', '03110000001', 'Multan, Pakistan', 'Medical', 30000.00, '2026-05-25 07:52:55'),
(2, 'Fatima Noor', '03110000002', 'Peshawar, Pakistan', 'Education', 50000.00, '2026-05-25 07:52:55'),
(3, 'Noman Ali', '03110000003', 'Sukkur, Pakistan', 'Food', 20000.00, '2026-05-25 07:52:55'),
(4, 'Hina Ahmed', '03110000004', 'Hyderabad, Pakistan', 'Medical', 45000.00, '2026-05-25 07:52:55'),
(5, 'Saad Tariq', '03110000005', 'Quetta, Pakistan', 'Education', 60000.00, '2026-05-25 07:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `campaign_id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `campaign_name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `goal_amount` decimal(12,2) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('Active','Completed','Pending') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`campaign_id`, `organization_id`, `campaign_name`, `description`, `goal_amount`, `start_date`, `end_date`, `status`, `created_at`) VALUES
(1, 1, 'Flood Relief 2026', 'Flood support campaign', 5000000.00, '2026-01-01', '2026-06-30', 'Active', '2026-05-25 07:52:54'),
(2, 2, 'Education Support', 'Scholarship campaign', 2000000.00, '2026-02-01', '2026-12-31', 'Active', '2026-05-25 07:52:54'),
(3, 3, 'Medical Aid', 'Medical support campaign', 3000000.00, '2026-03-01', '2026-09-01', 'Active', '2026-05-25 07:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `donation_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `amount` decimal(12,2) NOT NULL,
  `donation_date` date NOT NULL,
  `payment_method` enum('Cash','Bank Transfer','JazzCash','EasyPaisa','Debit Card') DEFAULT 'Cash',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`donation_id`, `donor_id`, `campaign_id`, `amount`, `donation_date`, `payment_method`, `notes`, `created_at`) VALUES
(1, 1, 1, 50000.00, '2026-05-01', 'Bank Transfer', 'Flood donation', '2026-05-25 07:52:54'),
(2, 2, 2, 25000.00, '2026-05-02', 'JazzCash', 'Education donation', '2026-05-25 07:52:54'),
(3, 3, 1, 100000.00, '2026-05-03', 'Cash', 'Flood support', '2026-05-25 07:52:54'),
(4, 4, 3, 35000.00, '2026-05-04', 'EasyPaisa', 'Medical support', '2026-05-25 07:52:54'),
(5, 5, 2, 200000.00, '2026-05-05', 'Bank Transfer', 'Corporate education support', '2026-05-25 07:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `donation_history`
--

CREATE TABLE `donation_history` (
  `history_id` int(11) NOT NULL,
  `donation_id` int(11) NOT NULL,
  `old_amount` decimal(12,2) DEFAULT NULL,
  `new_amount` decimal(12,2) DEFAULT NULL,
  `change_reason` text DEFAULT NULL,
  `changed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation_history`
--

INSERT INTO `donation_history` (`history_id`, `donation_id`, `old_amount`, `new_amount`, `change_reason`, `changed_at`) VALUES
(1, 1, 40000.00, 50000.00, 'Donor increased support', '2026-05-25 07:52:55'),
(2, 3, 80000.00, 100000.00, 'Donation amount corrected', '2026-05-25 07:52:55'),
(3, 5, 150000.00, 200000.00, 'Corporate support increased', '2026-05-25 07:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `donation_types`
--

CREATE TABLE `donation_types` (
  `donation_type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation_types`
--

INSERT INTO `donation_types` (`donation_type_id`, `type_name`, `description`, `created_at`) VALUES
(1, 'Cash Donation', 'Direct cash support', '2026-05-25 07:52:55'),
(2, 'Food Donation', 'Donation of food items', '2026-05-25 07:52:55'),
(3, 'Clothes Donation', 'Clothing support', '2026-05-25 07:52:55'),
(4, 'Medical Supplies', 'Medicine and medical equipment', '2026-05-25 07:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `donor_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `donor_type` enum('Individual','Company','Organization') DEFAULT 'Individual',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`donor_id`, `full_name`, `email`, `phone`, `address`, `donor_type`, `created_at`) VALUES
(1, 'Ahmed Khan', 'ahmed1@gmail.com', '03001230001', 'Lahore, Pakistan', 'Individual', '2026-05-25 07:52:54'),
(2, 'Sara Ali', 'sara2@gmail.com', '03001230002', 'Karachi, Pakistan', 'Individual', '2026-05-25 07:52:54'),
(3, 'Bilal Ahmed', 'bilal3@gmail.com', '03001230003', 'Islamabad, Pakistan', 'Individual', '2026-05-25 07:52:54'),
(4, 'Ayesha Noor', 'ayesha4@gmail.com', '03001230004', 'Faisalabad, Pakistan', 'Individual', '2026-05-25 07:52:54'),
(5, 'Tech Solutions Pvt Ltd', 'tech5@gmail.com', '03001230005', 'Islamabad, Pakistan', 'Company', '2026-05-25 07:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `donor_profiles`
--

CREATE TABLE `donor_profiles` (
  `profile_id` int(11) NOT NULL,
  `donor_id` int(11) DEFAULT NULL,
  `preferences` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `preferred_contact` enum('Email','Phone','SMS','WhatsApp') DEFAULT 'Email'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor_profiles`
--

INSERT INTO `donor_profiles` (`profile_id`, `donor_id`, `preferences`, `notes`, `preferred_contact`) VALUES
(1, 1, 'Monthly updates via email', 'Interested in medical campaigns', 'Email'),
(2, 2, 'SMS donation alerts', 'Supports education projects', 'SMS'),
(3, 5, 'Quarterly reports', 'Corporate CSR partnership', 'Email');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(150) NOT NULL,
  `event_date` date NOT NULL,
  `location` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_date`, `location`, `description`, `created_at`) VALUES
(1, 'Charity Dinner', '2026-08-15', 'Lahore', 'Annual fundraising dinner', '2026-05-25 07:52:55'),
(2, 'Donation Drive', '2026-09-10', 'Karachi', 'Public donation drive', '2026-05-25 07:52:55'),
(3, 'Volunteer Meetup', '2026-07-20', 'Islamabad', 'Volunteer networking session', '2026-05-25 07:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

CREATE TABLE `funds` (
  `fund_id` int(11) NOT NULL,
  `fund_name` varchar(150) NOT NULL,
  `total_amount` decimal(12,2) DEFAULT 0.00,
  `remaining_amount` decimal(12,2) DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `funds`
--

INSERT INTO `funds` (`fund_id`, `fund_name`, `total_amount`, `remaining_amount`, `description`, `created_at`) VALUES
(1, 'Medical Relief Fund', 1000000.00, 750000.00, 'Medical emergency support', '2026-05-25 07:52:54'),
(2, 'Education Fund', 2000000.00, 1500000.00, 'Student scholarship support', '2026-05-25 07:52:54'),
(3, 'Disaster Recovery Fund', 5000000.00, 3200000.00, 'Disaster recovery operations', '2026-05-25 07:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `grant_applications`
--

CREATE TABLE `grant_applications` (
  `grant_id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `grant_name` varchar(150) NOT NULL,
  `requested_amount` decimal(12,2) NOT NULL,
  `application_status` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `application_date` date DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grant_applications`
--

INSERT INTO `grant_applications` (`grant_id`, `organization_id`, `grant_name`, `requested_amount`, `application_status`, `application_date`, `notes`, `created_at`) VALUES
(1, 1, 'Education Expansion Grant', 3000000.00, 'Pending', '2026-04-10', 'Expanding school facilities', '2026-05-25 07:52:55'),
(2, 2, 'Medical Support Grant', 1500000.00, 'Approved', '2026-05-15', 'Rural healthcare project', '2026-05-25 07:52:55'),
(3, 3, 'Food Distribution Grant', 1000000.00, 'Rejected', '2026-06-01', 'Community food support', '2026-05-25 07:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `organization_id` int(11) NOT NULL,
  `organization_name` varchar(150) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`organization_id`, `organization_name`, `email`, `phone`, `address`, `created_at`) VALUES
(1, 'Helping Hands Foundation', 'helpinghands@gmail.com', '02111111111', 'Karachi, Pakistan', '2026-05-25 07:52:54'),
(2, 'Care Pakistan', 'care@gmail.com', '02111111112', 'Lahore, Pakistan', '2026-05-25 07:52:54'),
(3, 'Noor Welfare Society', 'noor@gmail.com', '02111111113', 'Islamabad, Pakistan', '2026-05-25 07:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `donation_id` int(11) NOT NULL,
  `payment_method` enum('Cash','Bank Transfer','JazzCash','EasyPaisa','Debit Card') DEFAULT 'Cash',
  `payment_status` enum('Paid','Pending','Failed') DEFAULT 'Paid',
  `transaction_id` varchar(100) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `donation_id`, `payment_method`, `payment_status`, `transaction_id`, `payment_date`, `created_at`) VALUES
(1, 1, 'Bank Transfer', 'Paid', 'TXN10001', '2026-05-01', '2026-05-25 07:52:54'),
(2, 2, 'JazzCash', 'Paid', 'TXN10002', '2026-05-02', '2026-05-25 07:52:54'),
(3, 3, 'Cash', 'Paid', 'TXN10003', '2026-05-03', '2026-05-25 07:52:54'),
(4, 4, 'EasyPaisa', 'Paid', 'TXN10004', '2026-05-04', '2026-05-25 07:52:54'),
(5, 5, 'Bank Transfer', 'Paid', 'TXN10005', '2026-05-05', '2026-05-25 07:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `pledges`
--

CREATE TABLE `pledges` (
  `pledge_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `pledged_amount` decimal(12,2) NOT NULL,
  `pledge_date` date NOT NULL,
  `due_date` date DEFAULT NULL,
  `status` enum('Pending','Fulfilled','Cancelled') DEFAULT 'Pending',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pledges`
--

INSERT INTO `pledges` (`pledge_id`, `donor_id`, `pledged_amount`, `pledge_date`, `due_date`, `status`, `notes`, `created_at`) VALUES
(1, 1, 100000.00, '2026-05-15', '2026-06-15', 'Pending', 'Monthly support pledge', '2026-05-25 07:52:54'),
(2, 2, 75000.00, '2026-05-20', '2026-07-01', 'Fulfilled', 'Education pledge', '2026-05-25 07:52:54'),
(3, 5, 500000.00, '2026-06-01', '2026-08-01', 'Pending', 'Corporate support pledge', '2026-05-25 07:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `budget` decimal(12,2) DEFAULT 0.00,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('Active','Completed','Pending') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_name`, `description`, `budget`, `start_date`, `end_date`, `status`, `created_at`) VALUES
(1, 'Women Empowerment', 'Skill development for women', 800000.00, '2026-03-01', '2026-12-31', 'Active', '2026-05-25 07:52:55'),
(2, 'Medical Camp', 'Free medical support', 1200000.00, '2026-04-01', '2026-10-31', 'Active', '2026-05-25 07:52:55'),
(3, 'School Rebuilding', 'School reconstruction project', 4000000.00, '2026-01-15', '2027-03-15', 'Pending', '2026-05-25 07:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `receipt_id` int(11) NOT NULL,
  `donation_id` int(11) NOT NULL,
  `receipt_number` varchar(100) NOT NULL,
  `issued_date` date NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`receipt_id`, `donation_id`, `receipt_number`, `issued_date`, `notes`, `created_at`) VALUES
(1, 1, 'RCPT-1001', '2026-05-01', 'Official flood donation receipt', '2026-05-25 07:52:54'),
(2, 2, 'RCPT-1002', '2026-05-02', 'Education donation receipt', '2026-05-25 07:52:54'),
(3, 3, 'RCPT-1003', '2026-05-03', 'Flood support receipt', '2026-05-25 07:52:54'),
(4, 4, 'RCPT-1004', '2026-05-04', 'Medical support receipt', '2026-05-25 07:52:54'),
(5, 5, 'RCPT-1005', '2026-05-05', 'Corporate donation receipt', '2026-05-25 07:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `sponsor_id` int(11) NOT NULL,
  `sponsor_name` varchar(150) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `sponsored_amount` decimal(12,2) DEFAULT 0.00,
  `sponsor_type` enum('Individual','Company','Organization') DEFAULT 'Company',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`sponsor_id`, `sponsor_name`, `email`, `phone`, `sponsored_amount`, `sponsor_type`, `notes`, `created_at`) VALUES
(1, 'ABC Corporation', 'abc@gmail.com', '04210000001', 500000.00, 'Company', 'Main sponsor', '2026-05-25 07:52:55'),
(2, 'Meezan Bank', 'meezan@gmail.com', '04210000002', 1000000.00, 'Company', 'Banking sponsor', '2026-05-25 07:52:55'),
(3, 'National Foods', 'foods@gmail.com', '04210000003', 300000.00, 'Company', 'Food sponsor', '2026-05-25 07:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `tax_records`
--

CREATE TABLE `tax_records` (
  `tax_record_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `tax_year` year(4) NOT NULL,
  `total_donated` decimal(12,2) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tax_records`
--

INSERT INTO `tax_records` (`tax_record_id`, `donor_id`, `tax_year`, `total_donated`, `notes`, `created_at`) VALUES
(1, 1, '2026', 50000.00, 'Tax deductible donation', '2026-05-25 07:52:55'),
(2, 2, '2026', 25000.00, 'Education donation tax record', '2026-05-25 07:52:55'),
(3, 5, '2026', 200000.00, 'Corporate donation tax record', '2026-05-25 07:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `thank_you_notes`
--

CREATE TABLE `thank_you_notes` (
  `note_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sent_date` date NOT NULL,
  `delivery_method` enum('Email','SMS','Letter','Phone Call') DEFAULT 'Email',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thank_you_notes`
--

INSERT INTO `thank_you_notes` (`note_id`, `donor_id`, `message`, `sent_date`, `delivery_method`, `created_at`) VALUES
(1, 1, 'Thank you for supporting flood victims.', '2026-05-02', 'Email', '2026-05-25 07:52:55'),
(2, 2, 'Thank you for supporting education.', '2026-05-03', 'SMS', '2026-05-25 07:52:55'),
(3, 5, 'We appreciate your generous corporate support.', '2026-05-06', 'Email', '2026-05-25 07:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `volunteer_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `skills` varchar(150) DEFAULT NULL,
  `joined_date` date DEFAULT NULL,
  `availability` enum('Weekdays','Weekends','Anytime') DEFAULT 'Anytime',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`volunteer_id`, `full_name`, `email`, `phone`, `skills`, `joined_date`, `availability`, `created_at`) VALUES
(1, 'Hassan Ahmed', 'hassan@gmail.com', '03210000001', 'Management', '2026-01-01', 'Weekends', '2026-05-25 07:52:55'),
(2, 'Sana Fatima', 'sana@gmail.com', '03210000002', 'Teaching', '2026-01-05', 'Weekdays', '2026-05-25 07:52:55'),
(3, 'Hamza Tariq', 'hamza@gmail.com', '03210000003', 'Photography', '2026-01-10', 'Anytime', '2026-05-25 07:52:55'),
(4, 'Adeel Khan', 'adeel@gmail.com', '03210000004', 'Driving, Logistics', '2026-01-15', 'Weekends', '2026-05-25 07:52:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD PRIMARY KEY (`beneficiary_id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`campaign_id`),
  ADD KEY `organization_id` (`organization_id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `donor_id` (`donor_id`),
  ADD KEY `campaign_id` (`campaign_id`);

--
-- Indexes for table `donation_history`
--
ALTER TABLE `donation_history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `donation_id` (`donation_id`);

--
-- Indexes for table `donation_types`
--
ALTER TABLE `donation_types`
  ADD PRIMARY KEY (`donation_type_id`),
  ADD UNIQUE KEY `type_name` (`type_name`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`donor_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `donor_profiles`
--
ALTER TABLE `donor_profiles`
  ADD PRIMARY KEY (`profile_id`),
  ADD UNIQUE KEY `donor_id` (`donor_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`fund_id`);

--
-- Indexes for table `grant_applications`
--
ALTER TABLE `grant_applications`
  ADD PRIMARY KEY (`grant_id`),
  ADD KEY `organization_id` (`organization_id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`organization_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `donation_id` (`donation_id`);

--
-- Indexes for table `pledges`
--
ALTER TABLE `pledges`
  ADD PRIMARY KEY (`pledge_id`),
  ADD KEY `donor_id` (`donor_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`receipt_id`),
  ADD UNIQUE KEY `receipt_number` (`receipt_number`),
  ADD KEY `donation_id` (`donation_id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `tax_records`
--
ALTER TABLE `tax_records`
  ADD PRIMARY KEY (`tax_record_id`),
  ADD KEY `donor_id` (`donor_id`);

--
-- Indexes for table `thank_you_notes`
--
ALTER TABLE `thank_you_notes`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `donor_id` (`donor_id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`volunteer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  MODIFY `beneficiary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `campaign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donation_history`
--
ALTER TABLE `donation_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donation_types`
--
ALTER TABLE `donation_types`
  MODIFY `donation_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donor_profiles`
--
ALTER TABLE `donor_profiles`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `funds`
--
ALTER TABLE `funds`
  MODIFY `fund_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grant_applications`
--
ALTER TABLE `grant_applications`
  MODIFY `grant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `organization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pledges`
--
ALTER TABLE `pledges`
  MODIFY `pledge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tax_records`
--
ALTER TABLE `tax_records`
  MODIFY `tax_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thank_you_notes`
--
ALTER TABLE `thank_you_notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `volunteer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD CONSTRAINT `campaigns_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`) ON DELETE SET NULL;

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`donor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donations_ibfk_2` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`campaign_id`) ON DELETE SET NULL;

--
-- Constraints for table `donation_history`
--
ALTER TABLE `donation_history`
  ADD CONSTRAINT `donation_history_ibfk_1` FOREIGN KEY (`donation_id`) REFERENCES `donations` (`donation_id`) ON DELETE CASCADE;

--
-- Constraints for table `donor_profiles`
--
ALTER TABLE `donor_profiles`
  ADD CONSTRAINT `donor_profiles_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`donor_id`) ON DELETE CASCADE;

--
-- Constraints for table `grant_applications`
--
ALTER TABLE `grant_applications`
  ADD CONSTRAINT `grant_applications_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`) ON DELETE SET NULL;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`donation_id`) REFERENCES `donations` (`donation_id`) ON DELETE CASCADE;

--
-- Constraints for table `pledges`
--
ALTER TABLE `pledges`
  ADD CONSTRAINT `pledges_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`donor_id`) ON DELETE CASCADE;

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_ibfk_1` FOREIGN KEY (`donation_id`) REFERENCES `donations` (`donation_id`) ON DELETE CASCADE;

--
-- Constraints for table `tax_records`
--
ALTER TABLE `tax_records`
  ADD CONSTRAINT `tax_records_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`donor_id`) ON DELETE CASCADE;

--
-- Constraints for table `thank_you_notes`
--
ALTER TABLE `thank_you_notes`
  ADD CONSTRAINT `thank_you_notes_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`donor_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
