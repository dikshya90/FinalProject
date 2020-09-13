-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2020 at 09:45 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `painting_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `painting_id`, `description`, `price`, `size`, `weight`, `quantity`, `user_email`, `session_id`, `created_at`, `updated_at`) VALUES
(12, 'Majestic View', 6, 'Drench your wall with this water colour Stree scene from Ason, kathmandu, Neapl during monsoon.', 345, '70x90', 300, 1, 'lia@gmail.com', '8LUPS0VgXGK0yEXJ0kzF7bdEGtqkFSImFcZWZp0Z', NULL, NULL),
(30, 'Beautiful white Texture Painting', 34, 'The painting gives aesthetic vibes. This work is a unique original work of art - Painting by Olivier (Brazil), Acrylic on Canvas. The work has a rectangular shape, Its dimensions are 50x70 cm. The artist\'s signature is present on the artwork. This artwork is part of the gallery Últimas obras. Framing options are available for this artwork, please contact us for details.', 440, '50X70', 100, 1, 'dikshya@gmail.com', '3pVGT3pqX3uTVHJN5fPZthZ849kzjxN4RKqRiTQq', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'acrylic', 'Acrylic Painting', '2020-04-11 21:31:23', '2020-08-12 10:31:12'),
(2, 'abstract', 'Abstract Painting', '2020-04-11 21:31:35', '2020-08-12 10:31:35'),
(3, 'oil-painting', 'Oil Painting', '2020-04-12 01:23:05', '2020-04-12 01:23:05'),
(4, 'water-color', 'Water Color Painting', '2020-04-12 01:26:13', '2020-08-12 10:31:48'),
(5, 'texture-painting', 'Texture Painting', '2020-08-12 10:32:24', '2020-08-12 10:32:24'),
(6, 'modern-painting', 'Modern Painting', '2020-08-12 10:44:00', '2020-08-12 10:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 'US', 'United States', '2020-08-17 06:29:04', '2020-08-17 06:29:04'),
(2, 'US', 'United States', '2020-08-17 06:29:04', '2020-08-17 06:29:04'),
(3, 'CA', 'Canada', '2020-08-17 06:29:04', '2020-08-17 06:29:04'),
(4, 'AF', 'Afghanistan', '2020-08-17 06:29:05', '2020-08-17 06:29:05'),
(5, 'AL', 'Albania', '2020-08-17 06:29:05', '2020-08-17 06:29:05'),
(6, 'DZ', 'Algeria', '2020-08-17 06:29:05', '2020-08-17 06:29:05'),
(7, 'AS', 'American Samoa', '2020-08-17 06:29:05', '2020-08-17 06:29:05'),
(8, 'AD', 'Andorra', '2020-08-17 06:29:06', '2020-08-17 06:29:06'),
(9, 'AO', 'Angola', '2020-08-17 06:29:06', '2020-08-17 06:29:06'),
(10, 'AI', 'Anguilla', '2020-08-17 06:29:07', '2020-08-17 06:29:07'),
(11, 'AQ', 'Antarctica', '2020-08-17 06:29:07', '2020-08-17 06:29:07'),
(12, 'AG', 'Antigua and/or Barbuda', '2020-08-17 06:29:07', '2020-08-17 06:29:07'),
(13, 'AR', 'Argentina', '2020-08-17 06:29:07', '2020-08-17 06:29:07'),
(14, 'AM', 'Armenia', '2020-08-17 06:29:08', '2020-08-17 06:29:08'),
(15, 'AW', 'Aruba', '2020-08-17 06:29:08', '2020-08-17 06:29:08'),
(16, 'AU', 'Australia', '2020-08-17 06:29:08', '2020-08-17 06:29:08'),
(17, 'AT', 'Austria', '2020-08-17 06:29:08', '2020-08-17 06:29:08'),
(18, 'AZ', 'Azerbaijan', '2020-08-17 06:29:08', '2020-08-17 06:29:08'),
(19, 'BS', 'Bahamas', '2020-08-17 06:29:08', '2020-08-17 06:29:08'),
(20, 'BH', 'Bahrain', '2020-08-17 06:29:08', '2020-08-17 06:29:08'),
(21, 'BD', 'Bangladesh', '2020-08-17 06:29:09', '2020-08-17 06:29:09'),
(22, 'BB', 'Barbados', '2020-08-17 06:29:09', '2020-08-17 06:29:09'),
(23, 'BY', 'Belarus', '2020-08-17 06:29:09', '2020-08-17 06:29:09'),
(24, 'BE', 'Belgium', '2020-08-17 06:29:09', '2020-08-17 06:29:09'),
(25, 'BZ', 'Belize', '2020-08-17 06:29:09', '2020-08-17 06:29:09'),
(26, 'BJ', 'Benin', '2020-08-17 06:29:09', '2020-08-17 06:29:09'),
(27, 'BM', 'Bermuda', '2020-08-17 06:29:09', '2020-08-17 06:29:09'),
(28, 'BT', 'Bhutan', '2020-08-17 06:29:10', '2020-08-17 06:29:10'),
(29, 'BO', 'Bolivia', '2020-08-17 06:29:10', '2020-08-17 06:29:10'),
(30, 'BA', 'Bosnia and Herzegovina', '2020-08-17 06:29:10', '2020-08-17 06:29:10'),
(31, 'BW', 'Botswana', '2020-08-17 06:29:10', '2020-08-17 06:29:10'),
(32, 'BV', 'Bouvet Island', '2020-08-17 06:29:10', '2020-08-17 06:29:10'),
(33, 'BR', 'Brazil', '2020-08-17 06:29:10', '2020-08-17 06:29:10'),
(34, 'IO', 'British lndian Ocean Territory', '2020-08-17 06:29:10', '2020-08-17 06:29:10'),
(35, 'BN', 'Brunei Darussalam', '2020-08-17 06:29:10', '2020-08-17 06:29:10'),
(36, 'BG', 'Bulgaria', '2020-08-17 06:29:11', '2020-08-17 06:29:11'),
(37, 'BF', 'Burkina Faso', '2020-08-17 06:29:11', '2020-08-17 06:29:11'),
(38, 'BI', 'Burundi', '2020-08-17 06:29:11', '2020-08-17 06:29:11'),
(39, 'KH', 'Cambodia', '2020-08-17 06:29:11', '2020-08-17 06:29:11'),
(40, 'CM', 'Cameroon', '2020-08-17 06:29:11', '2020-08-17 06:29:11'),
(41, 'CV', 'Cape Verde', '2020-08-17 06:29:11', '2020-08-17 06:29:11'),
(42, 'KY', 'Cayman Islands', '2020-08-17 06:29:12', '2020-08-17 06:29:12'),
(43, 'CF', 'Central African Republic', '2020-08-17 06:29:12', '2020-08-17 06:29:12'),
(44, 'TD', 'Chad', '2020-08-17 06:29:12', '2020-08-17 06:29:12'),
(45, 'CL', 'Chile', '2020-08-17 06:29:12', '2020-08-17 06:29:12'),
(46, 'CN', 'China', '2020-08-17 06:29:13', '2020-08-17 06:29:13'),
(47, 'CX', 'Christmas Island', '2020-08-17 06:29:13', '2020-08-17 06:29:13'),
(48, 'CC', 'Cocos [Keeling] Islands', '2020-08-17 06:29:13', '2020-08-17 06:29:13'),
(49, 'CO', 'Colombia', '2020-08-17 06:29:13', '2020-08-17 06:29:13'),
(50, 'KM', 'Comoros', '2020-08-17 06:29:13', '2020-08-17 06:29:13'),
(51, 'CG', 'Congo', '2020-08-17 06:29:13', '2020-08-17 06:29:13'),
(52, 'CK', 'Cook Islands', '2020-08-17 06:29:14', '2020-08-17 06:29:14'),
(53, 'CR', 'Costa Rica', '2020-08-17 06:29:14', '2020-08-17 06:29:14'),
(54, 'HR', 'Croatia [Hrvatska]', '2020-08-17 06:29:14', '2020-08-17 06:29:14'),
(55, 'CU', 'Cuba', '2020-08-17 06:29:14', '2020-08-17 06:29:14'),
(56, 'CY', 'Cyprus', '2020-08-17 06:29:14', '2020-08-17 06:29:14'),
(57, 'CZ', 'Czech Republic', '2020-08-17 06:29:14', '2020-08-17 06:29:14'),
(58, 'CD', 'Democratic Republic of Congo', '2020-08-17 06:29:14', '2020-08-17 06:29:14'),
(59, 'DK', 'Denmark', '2020-08-17 06:29:14', '2020-08-17 06:29:14'),
(60, 'DJ', 'Djibouti', '2020-08-17 06:29:14', '2020-08-17 06:29:14'),
(61, 'DM', 'Dominica', '2020-08-17 06:29:15', '2020-08-17 06:29:15'),
(62, 'DO', 'Dominican Republic', '2020-08-17 06:29:15', '2020-08-17 06:29:15'),
(63, 'TP', 'East Timor', '2020-08-17 06:29:15', '2020-08-17 06:29:15'),
(64, 'EC', 'Ecudaor', '2020-08-17 06:29:15', '2020-08-17 06:29:15'),
(65, 'EG', 'Egypt', '2020-08-17 06:29:15', '2020-08-17 06:29:15'),
(66, 'SV', 'El Salvador', '2020-08-17 06:29:15', '2020-08-17 06:29:15'),
(67, 'GQ', 'Equatorial Guinea', '2020-08-17 06:29:15', '2020-08-17 06:29:15'),
(68, 'ER', 'Eritrea', '2020-08-17 06:29:15', '2020-08-17 06:29:15'),
(69, 'EE', 'Estonia', '2020-08-17 06:29:15', '2020-08-17 06:29:15'),
(70, 'ET', 'Ethiopia', '2020-08-17 06:29:16', '2020-08-17 06:29:16'),
(71, 'FK', 'Falkland Islands [Malvinas]', '2020-08-17 06:29:16', '2020-08-17 06:29:16'),
(72, 'FO', 'Faroe Islands', '2020-08-17 06:29:16', '2020-08-17 06:29:16'),
(73, 'FJ', 'Fiji', '2020-08-17 06:29:16', '2020-08-17 06:29:16'),
(74, 'FI', 'Finland', '2020-08-17 06:29:16', '2020-08-17 06:29:16'),
(75, 'FR', 'France', '2020-08-17 06:29:17', '2020-08-17 06:29:17'),
(76, 'FX', 'France, Metropolitan', '2020-08-17 06:29:17', '2020-08-17 06:29:17'),
(77, 'GF', 'French Guiana', '2020-08-17 06:29:17', '2020-08-17 06:29:17'),
(78, 'PF', 'French Polynesia', '2020-08-17 06:29:17', '2020-08-17 06:29:17'),
(79, 'TF', 'French Southern Territories', '2020-08-17 06:29:17', '2020-08-17 06:29:17'),
(80, 'GA', 'Gabon', '2020-08-17 06:29:17', '2020-08-17 06:29:17'),
(81, 'GM', 'Gambia', '2020-08-17 06:29:17', '2020-08-17 06:29:17'),
(82, 'GE', 'Georgia', '2020-08-17 06:29:18', '2020-08-17 06:29:18'),
(83, 'DE', 'Germany', '2020-08-17 06:29:18', '2020-08-17 06:29:18'),
(84, 'GH', 'Ghana', '2020-08-17 06:29:18', '2020-08-17 06:29:18'),
(85, 'GI', 'Gibraltar', '2020-08-17 06:29:18', '2020-08-17 06:29:18'),
(86, 'GR', 'Greece', '2020-08-17 06:29:18', '2020-08-17 06:29:18'),
(87, 'GL', 'Greenland', '2020-08-17 06:29:18', '2020-08-17 06:29:18'),
(88, 'GD', 'Grenada', '2020-08-17 06:29:18', '2020-08-17 06:29:18'),
(89, 'GP', 'Guadeloupe', '2020-08-17 06:29:18', '2020-08-17 06:29:18'),
(90, 'GU', 'Guam', '2020-08-17 06:29:18', '2020-08-17 06:29:18'),
(91, 'GT', 'Guatemala', '2020-08-17 06:29:19', '2020-08-17 06:29:19'),
(92, 'GN', 'Guinea', '2020-08-17 06:29:19', '2020-08-17 06:29:19'),
(93, 'GW', 'Guinea-Bissau', '2020-08-17 06:29:19', '2020-08-17 06:29:19'),
(94, 'GY', 'Guyana', '2020-08-17 06:29:19', '2020-08-17 06:29:19'),
(95, 'HT', 'Haiti', '2020-08-17 06:29:19', '2020-08-17 06:29:19'),
(96, 'HM', 'Heard and Mc Donald Islands', '2020-08-17 06:29:19', '2020-08-17 06:29:19'),
(97, 'HN', 'Honduras', '2020-08-17 06:29:19', '2020-08-17 06:29:19'),
(98, 'HK', 'Hong Kong', '2020-08-17 06:29:19', '2020-08-17 06:29:19'),
(99, 'HU', 'Hungary', '2020-08-17 06:29:20', '2020-08-17 06:29:20'),
(100, 'IS', 'Iceland', '2020-08-17 06:29:20', '2020-08-17 06:29:20'),
(101, 'IN', 'India', '2020-08-17 06:29:20', '2020-08-17 06:29:20'),
(102, 'ID', 'Indonesia', '2020-08-17 06:29:21', '2020-08-17 06:29:21'),
(103, 'IR', 'Iran [Islamic Republic of]', '2020-08-17 06:29:21', '2020-08-17 06:29:21'),
(104, 'IQ', 'Iraq', '2020-08-17 06:29:21', '2020-08-17 06:29:21'),
(105, 'IE', 'Ireland', '2020-08-17 06:29:21', '2020-08-17 06:29:21'),
(106, 'IL', 'Israel', '2020-08-17 06:29:21', '2020-08-17 06:29:21'),
(107, 'IT', 'Italy', '2020-08-17 06:29:21', '2020-08-17 06:29:21'),
(108, 'CI', 'Ivory Coast', '2020-08-17 06:29:21', '2020-08-17 06:29:21'),
(109, 'JM', 'Jamaica', '2020-08-17 06:29:22', '2020-08-17 06:29:22'),
(110, 'JP', 'Japan', '2020-08-17 06:29:22', '2020-08-17 06:29:22'),
(111, 'JO', 'Jordan', '2020-08-17 06:29:22', '2020-08-17 06:29:22'),
(112, 'KZ', 'Kazakhstan', '2020-08-17 06:29:22', '2020-08-17 06:29:22'),
(113, 'KE', 'Kenya', '2020-08-17 06:29:22', '2020-08-17 06:29:22'),
(114, 'KI', 'Kiribati', '2020-08-17 06:29:22', '2020-08-17 06:29:22'),
(115, 'KP', 'Korea, Democratic People\'s Republic of', '2020-08-17 06:29:22', '2020-08-17 06:29:22'),
(116, 'KR', 'Korea, Republic of', '2020-08-17 06:29:23', '2020-08-17 06:29:23'),
(117, 'KW', 'Kuwait', '2020-08-17 06:29:23', '2020-08-17 06:29:23'),
(118, 'KG', 'Kyrgyzstan', '2020-08-17 06:29:23', '2020-08-17 06:29:23'),
(119, 'LA', 'Lao People\'s Democratic Republic', '2020-08-17 06:29:23', '2020-08-17 06:29:23'),
(120, 'LV', 'Latvia', '2020-08-17 06:29:23', '2020-08-17 06:29:23'),
(121, 'LB', 'Lebanon', '2020-08-17 06:29:23', '2020-08-17 06:29:23'),
(122, 'LS', 'Lesotho', '2020-08-17 06:29:23', '2020-08-17 06:29:23'),
(123, 'LR', 'Liberia', '2020-08-17 06:29:23', '2020-08-17 06:29:23'),
(124, 'LY', 'Libyan Arab Jamahiriya', '2020-08-17 06:29:23', '2020-08-17 06:29:23'),
(125, 'LI', 'Liechtenstein', '2020-08-17 06:29:24', '2020-08-17 06:29:24'),
(126, 'LT', 'Lithuania', '2020-08-17 06:29:24', '2020-08-17 06:29:24'),
(127, 'LU', 'Luxembourg', '2020-08-17 06:29:24', '2020-08-17 06:29:24'),
(128, 'MO', 'Macau', '2020-08-17 06:29:24', '2020-08-17 06:29:24'),
(129, 'MK', 'Macedonia', '2020-08-17 06:29:24', '2020-08-17 06:29:24'),
(130, 'MG', 'Madagascar', '2020-08-17 06:29:24', '2020-08-17 06:29:24'),
(131, 'MW', 'Malawi', '2020-08-17 06:29:24', '2020-08-17 06:29:24'),
(132, 'MY', 'Malaysia', '2020-08-17 06:29:25', '2020-08-17 06:29:25'),
(133, 'MV', 'Maldives', '2020-08-17 06:29:25', '2020-08-17 06:29:25'),
(134, 'ML', 'Mali', '2020-08-17 06:29:25', '2020-08-17 06:29:25'),
(135, 'MT', 'Malta', '2020-08-17 06:29:25', '2020-08-17 06:29:25'),
(136, 'MH', 'Marshall Islands', '2020-08-17 06:29:25', '2020-08-17 06:29:25'),
(137, 'MQ', 'Martinique', '2020-08-17 06:29:25', '2020-08-17 06:29:25'),
(138, 'MR', 'Mauritania', '2020-08-17 06:29:25', '2020-08-17 06:29:25'),
(139, 'MU', 'Mauritius', '2020-08-17 06:29:25', '2020-08-17 06:29:25'),
(140, 'TY', 'Mayotte', '2020-08-17 06:29:25', '2020-08-17 06:29:25'),
(141, 'MX', 'Mexico', '2020-08-17 06:29:25', '2020-08-17 06:29:25'),
(142, 'FM', 'Micronesia, Federated States of', '2020-08-17 06:29:26', '2020-08-17 06:29:26'),
(143, 'MD', 'Moldova, Republic of', '2020-08-17 06:29:26', '2020-08-17 06:29:26'),
(144, 'MC', 'Monaco', '2020-08-17 06:29:26', '2020-08-17 06:29:26'),
(145, 'MN', 'Mongolia', '2020-08-17 06:29:26', '2020-08-17 06:29:26'),
(146, 'MS', 'Montserrat', '2020-08-17 06:29:26', '2020-08-17 06:29:26'),
(147, 'MA', 'Morocco', '2020-08-17 06:29:26', '2020-08-17 06:29:26'),
(148, 'MZ', 'Mozambique', '2020-08-17 06:29:26', '2020-08-17 06:29:26'),
(149, 'MM', 'Myanmar', '2020-08-17 06:29:26', '2020-08-17 06:29:26'),
(150, 'NA', 'Namibia', '2020-08-17 06:29:26', '2020-08-17 06:29:26'),
(151, 'NR', 'Nauru', '2020-08-17 06:29:27', '2020-08-17 06:29:27'),
(152, 'NP', 'Nepal', '2020-08-17 06:29:27', '2020-08-17 06:29:27'),
(153, 'NL', 'Netherlands', '2020-08-17 06:29:27', '2020-08-17 06:29:27'),
(154, 'AN', 'Netherlands Antilles', '2020-08-17 06:29:27', '2020-08-17 06:29:27'),
(155, 'NC', 'New Caledonia', '2020-08-17 06:29:27', '2020-08-17 06:29:27'),
(156, 'NZ', 'New Zealand', '2020-08-17 06:29:27', '2020-08-17 06:29:27'),
(157, 'NI', 'Nicaragua', '2020-08-17 06:29:27', '2020-08-17 06:29:27'),
(158, 'NE', 'Niger', '2020-08-17 06:29:27', '2020-08-17 06:29:27'),
(159, 'NG', 'Nigeria', '2020-08-17 06:29:27', '2020-08-17 06:29:27'),
(160, 'NU', 'Niue', '2020-08-17 06:29:27', '2020-08-17 06:29:27'),
(161, 'NF', 'Norfork Island', '2020-08-17 06:29:27', '2020-08-17 06:29:27'),
(162, 'MP', 'Northern Mariana Islands', '2020-08-17 06:29:28', '2020-08-17 06:29:28'),
(163, 'NO', 'Norway', '2020-08-17 06:29:28', '2020-08-17 06:29:28'),
(164, 'OM', 'Oman', '2020-08-17 06:29:28', '2020-08-17 06:29:28'),
(165, 'PK', 'Pakistan', '2020-08-17 06:29:28', '2020-08-17 06:29:28'),
(166, 'PW', 'Palau', '2020-08-17 06:29:28', '2020-08-17 06:29:28'),
(167, 'PA', 'Panama', '2020-08-17 06:29:28', '2020-08-17 06:29:28'),
(168, 'PG', 'Papua New Guinea', '2020-08-17 06:29:29', '2020-08-17 06:29:29'),
(169, 'PY', 'Paraguay', '2020-08-17 06:29:29', '2020-08-17 06:29:29'),
(170, 'PE', 'Peru', '2020-08-17 06:29:29', '2020-08-17 06:29:29'),
(171, 'PH', 'Philippines', '2020-08-17 06:29:29', '2020-08-17 06:29:29'),
(172, 'PN', 'Pitcairn', '2020-08-17 06:29:29', '2020-08-17 06:29:29'),
(173, 'PL', 'Poland', '2020-08-17 06:29:29', '2020-08-17 06:29:29'),
(174, 'PT', 'Portugal', '2020-08-17 06:29:29', '2020-08-17 06:29:29'),
(175, 'PR', 'Puerto Rico', '2020-08-17 06:29:29', '2020-08-17 06:29:29'),
(176, 'QA', 'Qatar', '2020-08-17 06:29:29', '2020-08-17 06:29:29'),
(177, 'SS', 'Republic of South Sudan', '2020-08-17 06:29:30', '2020-08-17 06:29:30'),
(178, 'RE', 'Reunion', '2020-08-17 06:29:30', '2020-08-17 06:29:30'),
(179, 'RO', 'Romania', '2020-08-17 06:29:30', '2020-08-17 06:29:30'),
(180, 'RU', 'Russian Federation', '2020-08-17 06:29:30', '2020-08-17 06:29:30'),
(181, 'RW', 'Rwanda', '2020-08-17 06:29:30', '2020-08-17 06:29:30'),
(182, 'KN', 'Saint Kitts and Nevis', '2020-08-17 06:29:30', '2020-08-17 06:29:30'),
(183, 'LC', 'Saint Lucia', '2020-08-17 06:29:31', '2020-08-17 06:29:31'),
(184, 'VC', 'Saint Vincent and the Grenadines', '2020-08-17 06:29:31', '2020-08-17 06:29:31'),
(185, 'WS', 'Samoa', '2020-08-17 06:29:31', '2020-08-17 06:29:31'),
(186, 'SM', 'San Marino', '2020-08-17 06:29:31', '2020-08-17 06:29:31'),
(187, 'ST', 'Sao Tome and Principe', '2020-08-17 06:29:31', '2020-08-17 06:29:31'),
(188, 'SA', 'Saudi Arabia', '2020-08-17 06:29:31', '2020-08-17 06:29:31'),
(189, 'SN', 'Senegal', '2020-08-17 06:29:31', '2020-08-17 06:29:31'),
(190, 'RS', 'Serbia', '2020-08-17 06:29:31', '2020-08-17 06:29:31'),
(191, 'SC', 'Seychelles', '2020-08-17 06:29:31', '2020-08-17 06:29:31'),
(192, 'SL', 'Sierra Leone', '2020-08-17 06:29:32', '2020-08-17 06:29:32'),
(193, 'SG', 'Singapore', '2020-08-17 06:29:32', '2020-08-17 06:29:32'),
(194, 'SK', 'Slovakia', '2020-08-17 06:29:32', '2020-08-17 06:29:32'),
(195, 'SI', 'Slovenia', '2020-08-17 06:29:32', '2020-08-17 06:29:32'),
(196, 'SB', 'Solomon Islands', '2020-08-17 06:29:32', '2020-08-17 06:29:32'),
(197, 'SO', 'Somalia', '2020-08-17 06:29:32', '2020-08-17 06:29:32'),
(198, 'ZA', 'South Africa', '2020-08-17 06:29:32', '2020-08-17 06:29:32'),
(199, 'GS', 'South Georgia South Sandwich Islands', '2020-08-17 06:29:32', '2020-08-17 06:29:32'),
(200, 'ES', 'Spain', '2020-08-17 06:29:32', '2020-08-17 06:29:32'),
(201, 'LK', 'Sri Lanka', '2020-08-17 06:29:33', '2020-08-17 06:29:33'),
(202, 'SH', 'St. Helena', '2020-08-17 06:29:33', '2020-08-17 06:29:33'),
(203, 'PM', 'St. Pierre and Miquelon', '2020-08-17 06:29:33', '2020-08-17 06:29:33'),
(204, 'SD', 'Sudan', '2020-08-17 06:29:33', '2020-08-17 06:29:33'),
(205, 'SR', 'Suricountry_name', '2020-08-17 06:29:33', '2020-08-17 06:29:33'),
(206, 'SJ', 'Svalbarn and Jan Mayen Islands', '2020-08-17 06:29:33', '2020-08-17 06:29:33'),
(207, 'SZ', 'Swaziland', '2020-08-17 06:29:33', '2020-08-17 06:29:33'),
(208, 'SE', 'Sweden', '2020-08-17 06:29:33', '2020-08-17 06:29:33'),
(209, 'CH', 'Switzerland', '2020-08-17 06:29:33', '2020-08-17 06:29:33'),
(210, 'SY', 'Syrian Arab Republic', '2020-08-17 06:29:33', '2020-08-17 06:29:33'),
(211, 'TW', 'Taiwan', '2020-08-17 06:29:33', '2020-08-17 06:29:33'),
(212, 'TJ', 'Tajikistan', '2020-08-17 06:29:33', '2020-08-17 06:29:33'),
(213, 'TZ', 'Tanzania, United Republic of', '2020-08-17 06:29:33', '2020-08-17 06:29:33'),
(214, 'TH', 'Thailand', '2020-08-17 06:29:34', '2020-08-17 06:29:34'),
(215, 'TR', 'Turkey', '2020-08-17 06:29:34', '2020-08-17 06:29:34'),
(216, 'UG', 'Uganda', '2020-08-17 06:29:34', '2020-08-17 06:29:34'),
(217, 'UA', 'Ukraine', '2020-08-17 06:29:34', '2020-08-17 06:29:34'),
(218, 'AE', 'United Arab Emirates', '2020-08-17 06:29:34', '2020-08-17 06:29:34'),
(219, 'GB', 'United Kingdom', '2020-08-17 06:29:34', '2020-08-17 06:29:34'),
(220, 'UY', 'Uruguay', '2020-08-17 06:29:35', '2020-08-17 06:29:35'),
(221, 'UZ', 'Uzbekistan', '2020-08-17 06:29:35', '2020-08-17 06:29:35'),
(222, 'VA', 'Vatican City State', '2020-08-17 06:29:35', '2020-08-17 06:29:35'),
(223, 'VE', 'Venezuela', '2020-08-17 06:29:35', '2020-08-17 06:29:35'),
(224, 'VN', 'Vietnam', '2020-08-17 06:29:35', '2020-08-17 06:29:35'),
(225, 'VG', 'Virgin Islands [British]', '2020-08-17 06:29:35', '2020-08-17 06:29:35'),
(226, 'YE', 'Yemen', '2020-08-17 06:29:36', '2020-08-17 06:29:36'),
(227, 'YU', 'Yugoslavia', '2020-08-17 06:29:36', '2020-08-17 06:29:36'),
(228, 'ZR', 'Zaire', '2020-08-17 06:29:36', '2020-08-17 06:29:36'),
(229, 'ZM', 'Zambia', '2020-08-17 06:29:36', '2020-08-17 06:29:36'),
(230, 'ZW', 'Zimbabwe', '2020-08-17 06:29:36', '2020-08-17 06:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `postcode` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `country`, `street`, `city`, `status`, `postcode`, `created_at`, `updated_at`) VALUES
(1, 'New', 9815157519, 'dikshya@gmail.com', NULL, '$2y$10$XIALhC27Au1wkEfhTx9bmuLPPb2MGpjrAXA7GYJ4KHc122UiEMZ6S', 'United States', 'pokhara', 'pokhra', 1, 17000, '2020-08-04 10:48:42', '2020-08-20 23:05:51'),
(9, 'Will Smith', 989348931, 'willsmith@gmail.com', NULL, '$2y$10$pwtsaI310.iBihZnQehmTuH2Qy/nFsDTBftvK5vz2zL/xk0t5z1ve', '', '', '', 1, NULL, '2020-08-05 06:03:25', '2020-08-05 06:03:25'),
(12, 'dikshya', 9815157519, 'new@gmail.com', NULL, '$2y$10$h9qDYpTHJTdis/FJMCoB6esML.FrNbaIWz5e219sv0HK.TH9b9/KS', 'Nepal', 'Pokhara', 'Port Blair', 1, 744104, '2020-08-06 01:13:59', '2020-08-10 02:55:22'),
(13, 'Lia', 9843489317, 'lia@gmail.com', NULL, '$2y$10$iKdzXMbkA7w3qtifBJWC8.y5C/vKABcwIO7UjsEkkgU41Ps1qMUPu', NULL, NULL, NULL, 0, NULL, '2020-08-07 04:02:53', '2020-08-07 04:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'dikshya', 'dikshya@gmail.com', 'About Painting', 'What About Shipping?', '2020-08-12 03:41:31', '2020-08-12 03:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `exhibitions`
--

CREATE TABLE `exhibitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conducted_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ongoing',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exhibitions`
--

INSERT INTO `exhibitions` (`id`, `title`, `conducted_by`, `location`, `type`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Respect Arts', 'Siddhartha Art Gallery', 'Lazimpat, Kathmandu', 'future', '2020-06-11', '2020-08-20', '2020-08-11 10:33:06', '2020-08-11 10:35:42'),
(2, 'Peace Through Art', 'Everest Art Gallery', 'Patan, Nepal', 'ongoing', '2020-08-02', '2020-08-29', '2020-08-11 10:36:19', '2020-08-11 10:36:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_11_000000_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2020_03_10_091239_create_permission_components_table', 1),
(5, '2020_03_17_085556_create_permissions_table', 1),
(6, '2020_03_23_143004_create_categories_table', 1),
(7, '2020_04_11_085324_create_paintings_table', 1),
(8, '2020_04_13_103234_create_offers_table', 2),
(9, '2020_04_13_103440_create_offer_components_table', 2),
(10, '2020_04_16_120802_create_enquiries_table', 3),
(11, '2020_07_29_072014_create_cart_table', 4),
(12, '2020_08_04_162300_create_customers_table', 5),
(13, '2020_08_05_093719_create_cart_table', 6),
(16, '2020_08_05_163609_create_cart_table', 7),
(17, '2020_08_06_131600_create_countries_table', 8),
(18, '2020_08_06_152036_create_shipping_address_table', 9),
(19, '2020_08_07_055122_create_countries_table', 10),
(20, '2020_08_07_060340_create_countries_table', 11),
(21, '2020_08_07_092905_create_shipping_address_table', 12),
(22, '2020_08_07_122557_create_shipping_addresses_table', 13),
(23, '2020_08_09_120532_create_orders_table', 14),
(24, '2020_08_09_125845_create_order_paintings_table', 14),
(25, '2020_08_11_115325_create_exhibitions_table', 15),
(26, '2020_08_11_160937_create_exhibitions_table', 16),
(27, '2020_08_11_172520_create_offers_table', 17),
(28, '2020_08_17_113040_create_artists_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_com_id` int(10) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title`, `description`, `offer_com_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Grab the Opportunity!', 'Visit our Gallery and Get 30% Off on every painting of your choice!', 1, '2020-08-02', '2020-08-29', '2020-08-11 12:19:39', '2020-08-11 12:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `offer_components`
--

CREATE TABLE `offer_components` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offerComponents` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer_components`
--

INSERT INTO `offer_components` (`id`, `offerComponents`, `created_at`, `updated_at`) VALUES
(1, 'Festive Offer', '2020-04-13 05:32:33', '2020-04-13 05:55:19'),
(2, 'Seasonal Offer', '2020-04-14 02:49:48', '2020-04-14 02:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` int(11) NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `customer_email`, `name`, `country`, `street`, `city`, `phone`, `postcode`, `order_status`, `payment_method`, `total_amount`, `created_at`, `updated_at`) VALUES
(10, 1, 'dikshya@gmail.com', 'New', 'United States', 'pokhara', 'pokhra', '9815157519', 17000, 'Shipped', 'COD', '345', '2020-08-09 21:10:54', '2020-08-12 02:35:57'),
(13, 12, 'new@gmail.com', 'dikshya', 'Nepal', 'Pokhara', 'Port Blair', '9815157519', 744104, 'Pending', 'Paypal', '345', '2020-08-10 02:55:27', '2020-08-12 02:35:34'),
(14, 1, 'dikshya@gmail.com', 'dikshya', 'Nepal', 'Pokhara', 'Port Blair', '9815157519', 744104, 'New', 'COD', '2100', '2020-08-20 00:53:21', '2020-08-20 00:53:21'),
(15, 1, 'dikshya@gmail.com', 'dikshya', 'Nepal', 'Pokhara', 'Port Blair', '9815157519', 744104, 'New', 'Paypal', '570', '2020-08-20 00:58:04', '2020-08-20 00:58:04'),
(16, 1, 'dikshya@gmail.com', 'dikshya', 'Nepal', 'Pokhara', 'Port Blair', '9815157519', 744104, 'New', 'Paypal', '390', '2020-08-20 01:24:56', '2020-08-20 01:24:56'),
(17, 1, 'dikshya@gmail.com', 'New', 'United States', 'pokhara', 'pokhra', '9815157519', 17000, 'New', 'Paypal', '440', '2020-08-20 01:27:53', '2020-08-20 01:27:53'),
(18, 1, 'dikshya@gmail.com', 'ghale', 'Nepal', 'Hill', 'Kathmandu', '98934893', 44600, 'New', 'COD', '440', '2020-08-20 04:00:16', '2020-08-20 04:00:16'),
(19, 1, 'dikshya@gmail.com', 'ghale', 'Nepal', 'Chakrapath', 'Kathmandu', '98934893', 44600, 'New', 'Paypal', '990', '2020-08-20 04:01:17', '2020-08-20 04:01:17'),
(20, 1, 'dikshya@gmail.com', 'New', 'United States', 'pokhara', 'pokhra', '9815157519', 17000, 'New', 'COD', '570', '2020-08-20 23:09:41', '2020-08-20 23:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `order_paintings`
--

CREATE TABLE `order_paintings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `painting_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` bigint(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_paintings`
--

INSERT INTO `order_paintings` (`id`, `order_id`, `customer_id`, `painting_id`, `name`, `size`, `weight`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(9, 10, 1, 11, 'Beautiful oil painting', '70x90', 300, 345, 1, '2020-08-09 21:10:54', '2020-08-09 21:10:54'),
(12, 13, 12, 6, 'Majestic View', '70x90', 300, 345, 1, '2020-08-10 02:55:27', '2020-08-10 02:55:27'),
(13, 14, 1, 24, 'Colourful Acrylic', '300X290', 400, 570, 1, '2020-08-20 00:53:22', '2020-08-20 00:53:22'),
(14, 14, 1, 36, 'Light Blue Watercolor Painting', '25X25', 90, 570, 1, '2020-08-20 00:53:22', '2020-08-20 00:53:22'),
(15, 14, 1, 17, 'Light Orange Abstract Painting', '300X290', 300, 390, 1, '2020-08-20 00:53:22', '2020-08-20 00:53:22'),
(16, 14, 1, 33, 'Small Red Petals Texture Painting', '25X25', 100, 570, 1, '2020-08-20 00:53:22', '2020-08-20 00:53:22'),
(17, 15, 1, 36, 'Light Blue Watercolor Painting', '25X25', 90, 570, 1, '2020-08-20 00:58:04', '2020-08-20 00:58:04'),
(18, 16, 1, 17, 'Light Orange Abstract Painting', '300X290', 300, 390, 1, '2020-08-20 01:24:57', '2020-08-20 01:24:57'),
(19, 17, 1, 34, 'Beautiful white Texture Painting', '50X70', 100, 440, 1, '2020-08-20 01:27:53', '2020-08-20 01:27:53'),
(20, 18, 1, 26, 'Historical faces', '40X40', 100, 440, 1, '2020-08-20 04:00:17', '2020-08-20 04:00:17'),
(21, 19, 1, 31, 'Flowers in Vase', '60X65', 65, 990, 1, '2020-08-20 04:01:17', '2020-08-20 04:01:17'),
(22, 20, 1, 36, 'Light Blue Watercolor Painting', '25X25', 90, 570, 1, '2020-08-20 23:09:41', '2020-08-20 23:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `paintings`
--

CREATE TABLE `paintings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` bigint(20) NOT NULL,
  `year` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paintings`
--

INSERT INTO `paintings` (`id`, `name`, `category_id`, `description`, `price`, `size`, `weight`, `year`, `image`, `featured`, `status`, `created_at`, `updated_at`) VALUES
(15, 'Colorful Abstract Painting', 2, 'Water resistance painting, painted with high quality paints. The flexibility remains same and colors won\'t fade away with time.', 440, '250X240', 400, '2019-01-08', '45010.jpg', 0, 1, '2020-08-12 11:11:16', '2020-08-12 19:55:20'),
(16, 'Blue Abstract', 2, 'Water resistance painting, painted with high quality paints. The flexibility remains same and colors won\'t fade away with time. Decorate your wall with this beautiful masterpiece.', 500, '300X300', 500, '2018-02-14', '70702.jpg', 0, 1, '2020-08-12 11:13:01', '2020-08-12 19:56:04'),
(17, 'Light Orange Abstract Painting', 2, 'Water resistance painting, painted with high quality paints. The flexibility remains same and colors won\'t fade away with time. Decorate your wall with this beautiful masterpiece.', 390, '300X290', 300, '2017-07-13', '30761.jpg', 1, 1, '2020-08-12 11:14:55', '2020-08-12 19:57:52'),
(18, 'Abstract Galaxy', 2, 'The flexibility remains same and colors won\'t fade away with time. Decorate your wall with this beautiful masterpiece. Water resistance painting, painted with high quality paints.', 570, '200X230', 310, '2017-08-17', '49015.jpg', 0, 1, '2020-08-12 11:16:34', '2020-08-12 19:58:10'),
(20, 'Multi-Color Abstract', 2, 'The flexibility remains same and colors won\'t fade away with time. Decorate your wall with this beautiful masterpiece. Water resistance painting, painted with high quality paints.', 390, '240X240', 500, '2020-02-11', '34096.jpg', 0, 1, '2020-08-12 20:00:46', '2020-08-12 20:00:46'),
(21, 'Soothing Nature', 1, 'Painting is a powerful vision of Love’s vibration, Compassion’s strength, and Hope’s vitality. Woosh away your worries! Feel the exhilarating and mighty presence of Warmth of Love lifting you ever higher toward actualizing your deepest dreams.\r\nThe large one piece, modern look and visual depth of this beautiful piece, Convergence in predominantly Gray hues, take the soul on a journey beyond the temporal, soaring to unrestricted heights. Situate - Inconceivable - as the focal point of your living room, bedroom, or office reception area. Allow your mind to fly freely with Love, Compassion, and Hope', 900, '300X300', 490, '2018-06-18', '8959.jpg', 0, 1, '2020-08-12 20:17:26', '2020-08-12 20:17:26'),
(22, 'Bustling Town', 1, 'The painting portrays the bustling life of town.Painting is a powerful vision of Love’s vibration, Compassion’s strength, and Hope’s vitality. Woosh away your worries! Feel the exhilarating and mighty presence of Warmth of Love lifting you ever higher toward actualizing your deepest dreams.\r\nThe large one piece, modern look and visual depth of this beautiful piece, Convergence in predominantly Gray hues, take the soul on a journey beyond the temporal, soaring to unrestricted heights. Situate - Inconceivable - as the focal point of your living room, bedroom, or office reception area. Allow your mind to fly freely with Love, Compassion, and Hope', 1100, '600X650', 50, '2020-08-10', '7691.jpg', 0, 1, '2020-08-12 20:19:20', '2020-08-12 20:19:20'),
(23, 'Light Acrylic', 1, 'Painting is a powerful vision of Love’s vibration, Compassion’s strength, and Hope’s vitality. Woosh away your worries! Feel the exhilarating and mighty presence of Warmth of Love lifting you ever higher toward actualizing your deepest dreams. Gives the feeling of warmness.', 700, '300X290', 400, '2020-08-18', '82124.jpg', 0, 1, '2020-08-12 20:20:54', '2020-08-12 20:20:54'),
(24, 'Colourful Acrylic', 1, 'The painting makes you feel the colors  and its beauty.Painting is a powerful vision of Love’s vibration, Compassion’s strength, and Hope’s vitality. Woosh away your worries! Feel the exhilarating and mighty presence of Warmth of Love lifting you ever higher toward actualizing your deepest dreams.', 570, '300X290', 400, '2013-12-12', '66074.jpg', 1, 1, '2020-08-12 20:22:36', '2020-08-12 20:22:36'),
(25, 'Freedom', 6, 'Inspires you to choose your happiness by yourself. Painting is a powerful vision of Love’s vibration, Compassion’s strength, and Hope’s vitality. Woosh away your worries! Feel the exhilarating and mighty presence of Warmth of Love lifting you ever higher toward actualizing your deepest dreams.', 570, '25X25', 100, '2014-01-13', '37428.jpg', 0, 1, '2020-08-12 20:30:05', '2020-08-12 20:30:05'),
(26, 'Historical faces', 6, 'The Painting was painted by famous painter, Will Smith. Gives the ancient historical vibes. If your\'re a history lover, you definitely should check this one out.', 440, '40X40', 100, '2015-02-03', '7298.jpg', 1, 1, '2020-08-12 20:32:34', '2020-08-12 20:32:34'),
(27, 'Horse', 6, 'Painting includes two beautiful and lovely horse. Decorate your wall with this masterpiece.', 600, '25X25', 44, '2016-05-06', '23995.jpg', 0, 1, '2020-08-12 20:36:02', '2020-08-12 20:36:02'),
(28, 'Ancient Man with Wine', 3, 'This work is a unique original work of art - Painting by Valentina Baicuianu (Romania), Oil on Cardboard. The work has a rectangular shape The artist\'s signature is present on the artwork. This artwork is part of the gallery Latest Artworks. Framing options are available for this artwork, please contact us for details.', 1010, '50X50', 100, '2004-04-04', '61070.jpg', 0, 1, '2020-08-12 20:38:07', '2020-08-12 20:38:07'),
(29, 'Fruits All Over', 3, 'This work is a unique original work of art - Painting by Valentina Baicuianu (Romania), Oil on Cardboard. The work has a rectangular shape, Its dimensions are 30X30cm. The artist\'s signature is present on the artwork. This artwork is part of the gallery Latest Artworks. Framing options are available for this artwork, please contact us for details.', 1100, '40X40', 80, '2017-06-24', '40687.jpg', 0, 1, '2020-08-12 20:40:24', '2020-08-12 20:40:24'),
(30, 'Canvas Oil Painting', 3, 'This is unique painting, painted using oil in canvas. The painting give ancient vibes. Gladioli have a unique long and pointed shape.\r\nThis work is a unique original work of art - Painting by Ilgvars Zalans (Latvia), Oil on Canvas. The work has a rectangular shape, Its dimensions are 90x60 cm. The artist\'s signature is present on the artwork. This artwork is part of the gallery FLOWERS. Framing options are available for this artwork, please contact us for details.', 1100, '90X64', 44, '2015-12-22', '90362.jpg', 0, 1, '2020-08-12 20:42:56', '2020-08-12 20:42:56'),
(31, 'Flowers in Vase', 3, 'The painting is visually pleasing and aesthetic. The vibrant colors used in this painting makes your soul sooth. Decorate your wall with this beautiful masterpiece by Daniel Kang.', 990, '60X65', 65, '2011-11-11', '6930.jpg', 1, 1, '2020-08-12 20:48:08', '2020-08-12 20:48:08'),
(32, 'White Cherry Blooms', 5, 'The painting is beautiful texture painting. This work is a unique original work of art - Painting by Olivier (Brazil), Acrylic on Canvas. The work has a rectangular shape, Its dimensions are 50x70 cm. The artist\'s signature is present on the artwork. This artwork is part of the gallery Últimas obras. Framing options are available for this artwork, please contact us for details.', 790, '25X25', 40, '2019-03-31', '77892.jpg', 0, 1, '2020-08-12 20:54:06', '2020-08-12 20:54:06'),
(33, 'Small Red Petals Texture Painting', 5, 'The painting is aesthetic. This work is a unique original work of art - Painting by Olivier (Brazil), Acrylic on Canvas. The work has a rectangular shape, Its dimensions are 50x70 cm. The artist\'s signature is present on the artwork. This artwork is part of the gallery Últimas obras. Framing options are available for this artwork, please contact us for details.', 570, '25X25', 100, '2013-03-31', '11834.jpg', 0, 1, '2020-08-12 20:55:45', '2020-08-12 20:55:45'),
(34, 'Beautiful white Texture Painting', 5, 'The painting gives aesthetic vibes. This work is a unique original work of art - Painting by Olivier (Brazil), Acrylic on Canvas. The work has a rectangular shape, Its dimensions are 50x70 cm. The artist\'s signature is present on the artwork. This artwork is part of the gallery Últimas obras. Framing options are available for this artwork, please contact us for details.', 440, '50X70', 100, '2009-08-09', '24432.jpg', 0, 1, '2020-08-12 20:57:39', '2020-08-12 20:57:39'),
(35, 'Pastel pink floral', 4, 'This is some sweet light pink and a yellow flower I found. You may find prints, cards, notebooks and face masks in my shop on fineartamerica.\r\n\r\nThis work is a unique original work of art - Painting by Janel Bragg (United States), Watercolor on Paper. The work has a rectangular shape, Its dimensions are 33x25.4 cm. The artist\'s signature is present on the artwork. This artwork is part of the gallery paintings and drawings from 2020. Framing options are available for this artwork, please contact us for details.', 570, '40X40', 44, '2012-03-12', '39067.jpg', 0, 1, '2020-08-12 21:00:23', '2020-08-12 21:00:23'),
(36, 'Light Blue Watercolor Painting', 4, 'The painting is pastel blue and some very less orange color. The colors makes perfect combination.\r\n\r\nThis work is a unique original work of art - Painting by Janel Bragg (United States), Watercolor on Paper. The work has a rectangular shape, Its dimensions are 33x25.4 cm. The artist\'s signature is present on the artwork. This artwork is part of the gallery paintings and drawings from 2020. Framing options are available for this artwork, please contact us for details.', 570, '25X25', 90, '2017-04-19', '11215.jpg', 1, 1, '2020-08-12 21:02:01', '2020-08-12 21:02:01'),
(37, 'Lgiht Yellow floral', 4, 'This is some sweet yellow flower I found. You will love the peaceful colors used to paint this painting.\r\n\r\nThis work is a unique original work of art - Painting by Janel Bragg (United States), Watercolor on Paper. The work has a rectangular shape, Its dimensions are 33x25.4 cm. The artist\'s signature is present on the artwork. This artwork is part of the gallery paintings and drawings from 2020. Framing options are available for this artwork, please contact us for details.', 990, '25X25', 100, '2019-09-12', '58546.jpg', 0, 1, '2020-08-12 21:04:03', '2020-08-12 21:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dikshya@gmail.com', '$2y$10$gZDpXrFuBftUiV7XzMQO7.0gbC4kKjSO1AEl7LItJK8uZbS4RXZVK', '2020-07-29 05:31:25'),
('dikshya@gmail.com', '$2y$10$gZDpXrFuBftUiV7XzMQO7.0gbC4kKjSO1AEl7LItJK8uZbS4RXZVK', '2020-07-29 05:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_com_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission`, `per_com_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'permission-view', 1, NULL, '2020-08-17 06:28:53', '2020-08-17 06:28:53'),
(2, 'permission-add', 1, NULL, '2020-08-17 06:28:53', '2020-08-17 06:28:53'),
(3, 'permission-edit', 1, NULL, '2020-08-17 06:28:54', '2020-08-17 06:28:54'),
(4, 'permission-delete', 1, NULL, '2020-08-17 06:28:54', '2020-08-17 06:28:54'),
(5, 'permission-access', 1, NULL, '2020-08-17 06:28:54', '2020-08-17 06:28:54'),
(6, 'role-view', 2, NULL, '2020-08-17 06:28:54', '2020-08-17 06:28:54'),
(7, 'role-add', 2, NULL, '2020-08-17 06:28:55', '2020-08-17 06:28:55'),
(8, 'role-edit', 2, NULL, '2020-08-17 06:28:55', '2020-08-17 06:28:55'),
(9, 'role-delete', 2, NULL, '2020-08-17 06:28:55', '2020-08-17 06:28:55'),
(10, 'role-access', 2, NULL, '2020-08-17 06:28:55', '2020-08-17 06:28:55'),
(11, 'category-access', 3, NULL, '2020-08-17 06:28:55', '2020-08-17 06:28:55'),
(12, 'category-view', 3, NULL, '2020-08-17 06:28:55', '2020-08-17 06:28:55'),
(13, 'category-add', 3, NULL, '2020-08-17 06:28:55', '2020-08-17 06:28:55'),
(14, 'category-edit', 3, NULL, '2020-08-17 06:28:55', '2020-08-17 06:28:55'),
(15, 'category-delete', 3, NULL, '2020-08-17 06:28:55', '2020-08-17 06:28:55'),
(16, 'user-access', 4, NULL, '2020-08-17 06:28:56', '2020-08-17 06:28:56'),
(17, 'user-view', 4, NULL, '2020-08-17 06:28:56', '2020-08-17 06:28:56'),
(18, 'user-add', 4, NULL, '2020-08-17 06:28:56', '2020-08-17 06:28:56'),
(19, 'user-edit', 4, NULL, '2020-08-17 06:28:56', '2020-08-17 06:28:56'),
(20, 'user-delete', 4, NULL, '2020-08-17 06:28:56', '2020-08-17 06:28:56'),
(21, 'painting-access', 5, NULL, '2020-08-17 06:28:57', '2020-08-17 06:28:57'),
(22, 'painting-view', 5, NULL, '2020-08-17 06:28:57', '2020-08-17 06:28:57'),
(23, 'painting-add', 5, NULL, '2020-08-17 06:28:57', '2020-08-17 06:28:57'),
(24, 'painting-edit', 5, NULL, '2020-08-17 06:28:57', '2020-08-17 06:28:57'),
(25, 'painting-delete', 5, NULL, '2020-08-17 06:28:57', '2020-08-17 06:28:57'),
(26, 'exhibition-access', 6, NULL, '2020-08-17 06:28:57', '2020-08-17 06:28:57'),
(27, 'exhibition-view', 6, NULL, '2020-08-17 06:28:57', '2020-08-17 06:28:57'),
(28, 'exhibition-add', 6, NULL, '2020-08-17 06:28:57', '2020-08-17 06:28:57'),
(29, 'exhibition-edit', 6, NULL, '2020-08-17 06:28:58', '2020-08-17 06:28:58'),
(30, 'exhibition-delete', 6, NULL, '2020-08-17 06:28:58', '2020-08-17 06:28:58'),
(31, 'offer-access', 7, NULL, '2020-08-17 06:28:58', '2020-08-17 06:28:58'),
(32, 'offer-view', 7, NULL, '2020-08-17 06:28:58', '2020-08-17 06:28:58'),
(33, 'offer-add', 7, NULL, '2020-08-17 06:28:58', '2020-08-17 06:28:58'),
(34, 'offer-edit', 7, NULL, '2020-08-17 06:28:58', '2020-08-17 06:28:58'),
(35, 'offer-delete', 7, NULL, '2020-08-17 06:28:58', '2020-08-17 06:28:58'),
(36, 'enquiry-access', 8, NULL, '2020-08-17 06:28:58', '2020-08-17 06:28:58'),
(37, 'enquiry-view', 8, NULL, '2020-08-17 06:28:58', '2020-08-17 06:28:58'),
(38, 'enquiry-add', 8, NULL, '2020-08-17 06:28:58', '2020-08-17 06:28:58'),
(39, 'enquiry-edit', 8, NULL, '2020-08-17 06:28:59', '2020-08-17 06:28:59'),
(40, 'enquiry-delete', 8, NULL, '2020-08-17 06:28:59', '2020-08-17 06:28:59'),
(41, 'order-access', 9, NULL, '2020-08-17 06:28:59', '2020-08-17 06:28:59'),
(42, 'order-view', 9, NULL, '2020-08-17 06:28:59', '2020-08-17 06:28:59'),
(43, 'order-add', 9, NULL, '2020-08-17 06:28:59', '2020-08-17 06:28:59'),
(44, 'order-edit', 9, NULL, '2020-08-17 06:28:59', '2020-08-17 06:28:59'),
(45, 'order-delete', 9, NULL, '2020-08-17 06:28:59', '2020-08-17 06:28:59'),
(46, 'artist-access', 10, NULL, '2020-08-17 06:28:59', '2020-08-17 06:28:59'),
(47, 'artist-view', 10, NULL, '2020-08-17 06:29:00', '2020-08-17 06:29:00'),
(48, 'artist-delete', 10, NULL, '2020-08-17 06:29:00', '2020-08-17 06:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `permission_components`
--

CREATE TABLE `permission_components` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_component` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_components`
--

INSERT INTO `permission_components` (`id`, `permission_component`, `created_at`, `updated_at`) VALUES
(1, 'Permission Management', NULL, NULL),
(2, 'Role Management', NULL, NULL),
(3, 'Category Management', NULL, NULL),
(4, 'User Management', NULL, NULL),
(5, 'Painting Management', NULL, NULL),
(6, 'Exhibition Management', NULL, NULL),
(7, 'Offer Management', NULL, NULL),
(8, 'Enquiry Management', NULL, NULL),
(9, 'Order Management', NULL, NULL),
(10, 'Artist Management', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2020-08-17 06:29:03', '2020-08-17 06:29:03'),
(2, 'Artist', '2020-08-17 06:29:03', '2020-08-17 06:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permissions_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permissions_id`) VALUES
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(2, 12),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(2, 12),
(3, 11),
(3, 12),
(3, 21),
(3, 22),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 21),
(4, 22),
(4, 23),
(4, 24),
(4, 25),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(2, 11),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 31),
(2, 32),
(2, 36),
(2, 37);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`id`, `name`, `customer_id`, `customer_email`, `phone`, `city`, `street`, `country`, `postcode`, `created_at`, `updated_at`) VALUES
(4, 'New', 1, 'dikshya@gmail.com', 9815157519, 'pokhra', 'pokhara', 'United States', '17000', '2020-08-08 21:20:26', '2020-08-20 23:05:52'),
(5, 'dikshya', 12, 'new@gmail.com', 9815157519, 'Port Blair', 'Pokhara', 'Nepal', '744104', '2020-08-09 06:17:05', '2020-08-10 02:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `address`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 9842401234, 'Kathmandu, Nepal', 'admin@gmail.com', NULL, '$2y$10$YrfqRTbV95loNceCGcTeverESFkE3NTOy.4.g5VkbP6yD3gV8Pb.a', 1, 'y0oCF4KRQIqJvx2QvV3JwnCEJSRAuOvqw9cVP3PZaH6Z4lgkVGigfVo6eJ5H', '2020-08-17 06:28:43', '2020-08-17 06:28:43'),
(3, 'Artist', 98934893, 'Chakrapath', 'artist@gmail.com', NULL, '$2y$10$pYJtGqwRjDiSqxFYvtLrf.qvWWMF4qqo4sMRhuyGK6OFRrEihUTUe', 2, NULL, '2020-08-19 20:41:47', '2020-08-20 02:51:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `artists_email_unique` (`email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enquiries_email_unique` (`email`);

--
-- Indexes for table `exhibitions`
--
ALTER TABLE `exhibitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_components`
--
ALTER TABLE `offer_components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_paintings`
--
ALTER TABLE `order_paintings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paintings`
--
ALTER TABLE `paintings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_permission_unique` (`permission`);

--
-- Indexes for table `permission_components`
--
ALTER TABLE `permission_components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exhibitions`
--
ALTER TABLE `exhibitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offer_components`
--
ALTER TABLE `offer_components`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_paintings`
--
ALTER TABLE `order_paintings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `paintings`
--
ALTER TABLE `paintings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `permission_components`
--
ALTER TABLE `permission_components`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
