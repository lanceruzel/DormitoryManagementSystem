-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 06:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dormitory`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(4, 'Lance Ruzel', 'Ambrocio', 'test123@gmail.com', NULL, '$2y$12$57WTRUbnKbyGgIodpWSBA.8WMiFvPZbtrHJZedpHF9w/iHyHOzT4e', '2024-02-06 09:48:58', '2024-02-07 00:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `studentID` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `studentID`, `type`, `amount`, `payment_method`, `created_at`, `updated_at`) VALUES
(3, 32, 'Monthly Rent', 500, 'GCash', '2024-02-04 07:03:43', '2024-02-04 07:04:00'),
(4, 37, 'Maintenance', 500, 'GCash', '2024-02-04 07:14:52', '2024-02-04 07:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_item`
--

CREATE TABLE `inventory_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_item`
--

INSERT INTO `inventory_item` (`id`, `name`, `description`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(7, 'Test123', 'test123', 6, '45', '2024-01-31 07:54:08', '2024-02-03 06:24:10'),
(8, 'Test2', 'fdsfdsffd', 14, '5', '2024-01-31 23:57:25', '2024-02-04 08:17:17'),
(9, 'Aircon', 'rewrew', 44, '10000', '2024-02-03 00:56:20', '2024-02-03 06:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_01_27_154526_accounts_table', 1),
(3, '2024_01_28_135412_student-table', 2),
(4, '2024_01_29_160916_room-table', 3),
(5, '2024_01_29_163627_inventory-item', 3),
(6, '2024_01_29_164036_room_inventory_item', 3),
(7, '2024_02_03_161158_bills-table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `room_rate` int(11) NOT NULL,
  `comfort_room` tinyint(1) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `room_capacity`, `room_rate`, `comfort_room`, `status`, `created_at`, `updated_at`) VALUES
(30, 'Room 15r', 3, 10000, 1, 'available', '2024-02-02 09:23:37', '2024-02-02 09:45:44'),
(31, 'Room 2', 23, 23323, 1, 'available', '2024-02-02 09:50:18', '2024-02-02 09:50:18'),
(32, 'roo m test', 2, 4433, 1, 'available', '2024-02-03 01:51:59', '2024-02-03 06:40:39'),
(33, 'Room test 3', 2, 7500, 0, 'under maintenance', '2024-02-03 04:08:05', '2024-02-03 04:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `room_inventory_item`
--

CREATE TABLE `room_inventory_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roomID` bigint(20) UNSIGNED NOT NULL,
  `inventoryItemID` bigint(20) UNSIGNED NOT NULL,
  `quantity_used` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_inventory_item`
--

INSERT INTO `room_inventory_item` (`id`, `roomID`, `inventoryItemID`, `quantity_used`, `updated_at`, `created_at`) VALUES
(29, 31, 8, 4, '2024-02-03 01:51:43', '2024-02-03 01:10:04'),
(30, 31, 9, 17, '2024-02-04 08:18:00', '2024-02-03 01:25:32'),
(31, 30, 7, 2, '2024-02-03 01:43:31', '2024-02-03 01:25:47'),
(32, 30, 9, 24, '2024-02-03 01:25:47', '2024-02-03 01:25:47'),
(34, 30, 8, 2, '2024-02-03 01:43:31', '2024-02-03 01:43:31'),
(36, 32, 9, 2, '2024-02-03 04:03:57', '2024-02-03 04:03:57'),
(37, 33, 7, 2, '2024-02-03 04:08:06', '2024-02-03 04:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `e_fullname` varchar(255) NOT NULL,
  `e_contact` varchar(255) NOT NULL,
  `e_address` varchar(255) NOT NULL,
  `e_relation` varchar(255) NOT NULL,
  `s_id` varchar(255) NOT NULL,
  `s_college` varchar(255) NOT NULL,
  `s_program` varchar(255) NOT NULL,
  `s_cor` varchar(255) DEFAULT NULL,
  `assigned_room` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `middle_name`, `last_name`, `birthdate`, `gender`, `address`, `contact`, `email`, `image`, `e_fullname`, `e_contact`, `e_address`, `e_relation`, `s_id`, `s_college`, `s_program`, `s_cor`, `assigned_room`, `created_at`, `updated_at`) VALUES
(28, 'Lance Ruzel', 'Caballes', 'Ambrocio', '2024-01-02', 'Male', 'Limay, Bataan', '09205524353', 'lanceruzel1202@gmail.codm', 'public/profile/JTKUKGpfD9DyMhJR9hMXrOod1joI2D8CmNuZcRkv.png', 'Sample Guardian 1', '09209244353', 'Limay, Bataan', 'Mother', '21-06231', 'dsadsadsa', 'dsadsadasdasd', NULL, 32, '2024-01-29 01:14:29', '2024-02-07 08:40:22'),
(32, 'Michaella', 'Bagtas', 'Quezon', '2024-01-02', 'Female', 'Lamao, Bataan', '09205525343', 'michaellaquezon02@gmail.com', 'public/profile/vYJaioj4fw3LAnXPdRXPV2RKr4XUrBvBmHEcvLIs.png', 'Sample Guardian 2', '092455253437', 'Lamao, Bataan', 'Mother', '21-062341', 'dsadasdsadbvbvcb', 'sadsadasd', 'public/cor/9jB9Vawa8rIMLSikgRodNVJbrYS3uuLSvMvpK15Q.png', 31, '2024-01-29 01:20:46', '2024-02-07 08:15:42'),
(37, 'Juan ', 'Dela ', 'Cruz', '2024-01-29', 'Male', 'Balanga, Bataan', '09090909', 'juandelacruz@gmail.com', 'public/profile/m5PUzhdRFPc3rMAIvXVmQfNbVwRs8Vpu67jNST4u.png', 'Sample Contact Emergency1', '09090909', 'Balanga, Bataan', 'Mother', '2332', 'dsadsadsasadasd', 'dsadasdasdasdasddsadada', 'public/cor/7V4ETFAbgvPg5DkSYMa4wyktknnqDkoJOImCpLQZ.png', 33, '2024-02-03 06:43:29', '2024-02-07 08:42:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_email_unique` (`email`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_studentid_foreign` (`studentID`);

--
-- Indexes for table `inventory_item`
--
ALTER TABLE `inventory_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_inventory_item`
--
ALTER TABLE `room_inventory_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_inventory_item_inventoryitemid_foreign` (`inventoryItemID`),
  ADD KEY `room_inventory_item_roomid_foreign` (`roomID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory_item`
--
ALTER TABLE `inventory_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `room_inventory_item`
--
ALTER TABLE `room_inventory_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_studentid_foreign` FOREIGN KEY (`studentID`) REFERENCES `students` (`id`);

--
-- Constraints for table `room_inventory_item`
--
ALTER TABLE `room_inventory_item`
  ADD CONSTRAINT `room_inventory_item_inventoryitemid_foreign` FOREIGN KEY (`inventoryItemID`) REFERENCES `inventory_item` (`id`),
  ADD CONSTRAINT `room_inventory_item_roomid_foreign` FOREIGN KEY (`roomID`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
