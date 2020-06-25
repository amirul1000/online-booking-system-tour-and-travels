-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2020 at 05:51 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `id` int(10) NOT NULL,
  `country` varchar(64) NOT NULL,
  `airport_name` varchar(64) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`id`, `country`, `airport_name`, `status`) VALUES
(1, 'australia', 'La Isabella Airport (JBQ)', 'active'),
(2, 'australia', 'La Romana Airport (LRM)', 'active'),
(3, 'australia', 'Puerto Plata Airport (POP)', 'active'),
(4, 'Afghanistan', 'Punta Cana Airport (PUJ)', 'active'),
(5, 'australia', 'Samana Airport (AZS)', 'active'),
(6, '', 'Santiago Airport (STI)', 'active'),
(7, 'Afghanistan', 'Santo Domingo Airport (SDQ)', 'active'),
(8, 'Afghanistan', 'Dhaka', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(10) NOT NULL,
  `country` varchar(64) NOT NULL,
  `city_name` varchar(64) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `country`, `city_name`, `status`) VALUES
(1, 'Australia', 'Bani (Paya)', 'active'),
(2, 'Australia', 'Barahona (City)', 'active'),
(3, 'Australia', 'Boca Chica', 'active'),
(4, 'Australia', 'Bonao', 'active'),
(5, 'Australia', 'Cabarete', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `area_code` varchar(64) NOT NULL,
  `contact_number` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `first_name`, `last_name`, `area_code`, `contact_number`, `email`, `comment`) VALUES
(1, 'AAa', 'aaa', 'aaa', 'aaa', 'aa11@aa.com', ''),
(2, 'wweweww', 'ewewewewe', 'ewewewe', 'ewewew', 'xx@xx.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'Afghanistan'),
(2, 'Åland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean Territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo, The Democratic Republic of the'),
(52, 'Cook Islands'),
(53, 'Costa Rica'),
(54, 'Côte D''Ivoire'),
(55, 'Croatia'),
(56, 'Cuba'),
(57, 'Cyprus'),
(58, 'Czech Republic'),
(59, 'Denmark'),
(60, 'Djibouti'),
(61, 'Dominica'),
(62, 'Dominican Republic'),
(63, 'Ecuador'),
(64, 'Egypt'),
(65, 'El Salvador'),
(66, 'Equatorial Guinea'),
(67, 'Eritrea'),
(68, 'Estonia'),
(69, 'Ethiopia'),
(70, 'Falkland Islands (Malvinas)'),
(71, 'Faroe Islands'),
(72, 'Fiji'),
(73, 'Finland'),
(74, 'France'),
(75, 'French Guiana'),
(76, 'French Polynesia'),
(77, 'French Southern Territories'),
(78, 'Gabon'),
(79, 'Gambia'),
(80, 'Georgia'),
(81, 'Germany'),
(82, 'Ghana'),
(83, 'Gibraltar'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guernsey'),
(91, 'Guinea'),
(92, 'Guinea-Bissau'),
(93, 'Guyana'),
(94, 'Haiti'),
(95, 'Heard Island and McDonald Islands'),
(96, 'Holy See (Vatican City State)'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran, Islamic Republic of'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Isle of Man'),
(107, 'Israel'),
(108, 'Italy'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jersey'),
(112, 'Jordan'),
(113, 'Kazakhstan'),
(114, 'Kenya'),
(115, 'Kiribati'),
(116, 'Korea, Democratic People''s Republic of'),
(117, 'Korea, Republic of'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People''s Democratic Republic'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macao'),
(130, 'Macedonia, The Former Yugoslav Republic of'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States of'),
(144, 'Moldova, Republic of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestinian Territory, Occupied'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint Barthélemy'),
(185, 'Saint Helena'),
(186, 'Saint Kitts and Nevis'),
(187, 'Saint Lucia'),
(188, 'Saint Martin'),
(189, 'Saint Pierre and Miquelon'),
(190, 'Saint Vincent and the Grenadines'),
(191, 'Samoa'),
(192, 'San Marino'),
(193, 'Sao Tome and Principe'),
(194, 'Saudi Arabia'),
(195, 'Senegal'),
(196, 'Serbia'),
(197, 'Seychelles'),
(198, 'Sierra Leone'),
(199, 'Singapore'),
(200, 'Slovakia'),
(201, 'Slovenia'),
(202, 'Solomon Islands'),
(203, 'Somalia'),
(204, 'South Africa'),
(205, 'South Georgia and the South Sandwich Islands'),
(206, 'Spain'),
(207, 'Sri Lanka'),
(208, 'Sudan'),
(209, 'Suriname'),
(210, 'Svalbard and Jan Mayen'),
(211, 'Swaziland'),
(212, 'Sweden'),
(213, 'Switzerland'),
(214, 'Syrian Arab Republic'),
(215, 'Taiwan, Province Of China'),
(216, 'Tajikistan'),
(217, 'Tanzania, United Republic of'),
(218, 'Thailand'),
(219, 'Timor-Leste'),
(220, 'Togo'),
(221, 'Tokelau'),
(222, 'Tonga'),
(223, 'Trinidad and Tobago'),
(224, 'Tunisia'),
(225, 'Turkey'),
(226, 'Turkmenistan'),
(227, 'Turks and Caicos Islands'),
(228, 'Tuvalu'),
(229, 'Uganda'),
(230, 'Ukraine'),
(231, 'United Arab Emirates'),
(232, 'United Kingdom'),
(233, 'United States'),
(234, 'United States Minor Outlying Islands'),
(235, 'Uruguay'),
(236, 'Uzbekistan'),
(237, 'Vanuatu'),
(238, 'Venezuela'),
(239, 'Viet Nam'),
(240, 'Virgin Islands, British'),
(241, 'Virgin Islands, U.S.'),
(242, 'Wallis And Futuna'),
(243, 'Western Sahara'),
(244, 'Yemen'),
(245, 'Zambia'),
(246, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL,
  `email` varchar(127) NOT NULL,
  `password` varchar(127) NOT NULL,
  `title` varchar(127) NOT NULL,
  `first_name` varchar(127) NOT NULL,
  `last_name` varchar(127) NOT NULL,
  `company` varchar(127) NOT NULL,
  `address` varchar(127) NOT NULL,
  `city` varchar(127) NOT NULL,
  `state` varchar(127) NOT NULL,
  `zip` varchar(127) NOT NULL,
  `country_id` varchar(127) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `email`, `password`, `title`, `first_name`, `last_name`, `company`, `address`, `city`, `state`, `zip`, `country_id`, `created_at`, `updated_at`, `status`) VALUES
(9, 'xx', 'xx', 'Mr.', 'Anil', 'kumar', '', '', '', '', '', '231', '2011-10-19 00:00:00', '2011-10-19 00:00:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `excursion_zone`
--

CREATE TABLE `excursion_zone` (
  `id` int(10) NOT NULL,
  `country` varchar(64) NOT NULL,
  `zone_name` varchar(64) NOT NULL,
  `excursion_name` varchar(64) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `excursion_zone`
--

INSERT INTO `excursion_zone` (`id`, `country`, `zone_name`, `excursion_name`, `status`) VALUES
(1, 'Australia', 'Punta Cana Tours', 'ATV Macao Adventure - Punta Cana / Bavaro', 'active'),
(2, '', 'Punta Cana Tours', 'Santo Domingo - Punta Cana/Bavaro', 'active'),
(3, 'Australia', 'Punta Cana Tours', 'Saona Paradise Island - Punta Cana / Bavaro', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(10) NOT NULL,
  `logo` varchar(256) NOT NULL,
  `slogan` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `paypalid` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `users_id`, `paypalid`) VALUES
(1, 9, 'amirrucst-facilator@gmail.com'),
(2, 10, 'amirrucst-facilator@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `excursion_zone` varchar(127) NOT NULL,
  `excursion_city` varchar(127) NOT NULL,
  `description` text NOT NULL,
  `file_picture` varchar(256) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `meeting_point` text NOT NULL,
  `included_in_tour` text NOT NULL,
  `what_to_bring` text NOT NULL,
  `days_the_tour_runs` varchar(127) NOT NULL,
  `additional_information` text NOT NULL,
  `video_link` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`id`, `users_id`, `excursion_zone`, `excursion_city`, `description`, `file_picture`, `cost`, `meeting_point`, `included_in_tour`, `what_to_bring`, `days_the_tour_runs`, `additional_information`, `video_link`) VALUES
(2, 9, 'Punta Cana Tours', 'ATV Macao Adventure - Punta Cana / Bavaro', 'qqqqqqqqqqqq', 'tour_images/2_1.png', '443.00', '<p>dgdgdgdgd</p>', '<p>dgdgdfg</p>', '<p>ggdgdgg</p>', '535345', '<p>5454353</p>', 'https://www.youtube.com/watch?v=swtPVeyDJII'),
(3, 10, 'Punta Cana Tours', 'ATV Macao Adventure - Punta Cana / Bavaro', '<p>4343434</p>', 'tour_images/3_001.jpg', '343434.00', '<p>34343</p>', '', '<p>4343434</p>', '34', '<p>43434</p>', 'https://www.youtube.com/watch?v=NgUYRwRb2Lo'),
(4, 10, 'Punta Cana Tours', 'ATV Macao Adventure - Punta Cana / Bavaro', '<p>aaaa</p>', '', '0.00', '<p>fsdfdsf</p>', '<p>fsdfsdf</p>', '<p>sfsdfdsf</p>', 'sdfsdfdsf', '<p>sdfsdf</p>', 'https://www.youtube.com/watch?v=swtPVeyDJII'),
(5, 10, 'Punta Cana Tours', 'ATV Macao Adventure - Punta Cana / Bavaro', '<p>fsdfsdf</p>', '', '0.00', '<p>fsdfsdf</p>', '', '<p>fsdfsdf</p>', 'fdf', '<p>sdfdfds</p>', 'https://www.youtube.com/watch?v=J11uu8L8FTY'),
(6, 9, 'Punta Cana Tours', 'ATV Macao Adventure - Punta Cana / Bavaro', '<p>fsdfsdf</p>', '', '0.00', '<p>fsdfsdf</p>', '', '<p>fsdfsdf</p>', 'fdf', '<p>sdfdfds</p>', 'https://www.youtube.com/watch?v=NgUYRwRb2Lo');

-- --------------------------------------------------------

--
-- Table structure for table `tour_booking`
--

CREATE TABLE `tour_booking` (
  `id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `title` varchar(64) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `contact_number` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `excursion_zone` varchar(64) NOT NULL,
  `excursion_city` varchar(64) NOT NULL,
  `excursion_date` date NOT NULL,
  `no_of_adults` int(10) NOT NULL,
  `no_of_children` int(10) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `special_requests` text NOT NULL,
  `txn_id` varchar(127) NOT NULL,
  `status` enum('booked','paid','cancel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_booking`
--

INSERT INTO `tour_booking` (`id`, `users_id`, `title`, `first_name`, `last_name`, `contact_number`, `email`, `password`, `excursion_zone`, `excursion_city`, `excursion_date`, `no_of_adults`, `no_of_children`, `total_price`, `special_requests`, `txn_id`, `status`) VALUES
(34, 0, 'ggdgfg', 'dfgdfgdfg', 'dgdfg', 'dfgdfgfdg', 'fdgdfgdfg', 'dfgdf', 'Punta Cana Tours', 'ATV Macao Adventure - Punta Cana / Bavaro', '2016-08-15', 6, 3, '3987.00', 'fgfdgdfg', '19H72754JF025061N', 'paid'),
(35, 0, 'erwerewr', 'rewrerewrew', 'rerewrewr', 'ewrewre', 'rerewrer', 'erewrerer', 'Punta Cana Tours', 'ATV Macao Adventure - Punta Cana / Bavaro', '2016-08-15', 1, 0, '443.00', 'rerwrewr', '', 'booked'),
(36, 0, 'fsdfdfsf', 'sdfsf', 'sdfsdfsdf', 'sdfsdfdsfsd', 'fsdfdsfdsf', 'sdfdfsdf', 'Punta Cana Tours', 'ATV Macao Adventure - Punta Cana / Bavaro', '2016-08-15', 5, 9, '6202.00', 'fsdfdfsdf', '', 'paid'),
(37, 0, 'dgdfgdf', 'gdfgdf', 'gdfgfdg', 'fdgdfgdfgdfg', 'dfgfdgfdg', 'dfgdfgfdg', 'Punta Cana Tours', 'ATV Macao Adventure - Punta Cana / Bavaro', '2016-08-15', 6, 16, '9746.00', 'dfgfdgdfg', '', 'paid'),
(38, 0, 'rrtett', 'retrtet', 'ertertert', 'tetrt', 'ttretrt', 'retr', 'Punta Cana Tours', 'ATV Macao Adventure - Punta Cana / Bavaro', '2016-08-29', 1, 0, '443.00', 'trtret', '', 'booked'),
(39, 0, 'fhfgh', 'fghfghfg', 'fghfgh', 'fghfghfghfgh', 'fghfghfg', 'fghfgh', 'Punta Cana Tours', 'ATV Macao Adventure - Punta Cana / Bavaro', '2016-08-29', 1, 0, '443.00', 'hfghfh', '', 'booked'),
(40, 10, 'khkh', 'kkhk', 'hjkhkhk', 'hjkjhkhjk', 'hjkhjk', 'hjkhjkjhk', 'Punta Cana Tours', 'ATV Macao Adventure - Punta Cana / Bavaro', '2016-08-16', 1, 0, '343434.00', 'hkjhkh', '', 'booked'),
(41, 9, 'ryryy', 'rtyrtyrt', 'yrtyrtyrty', 'rtyrtytr', 'yrtyrtyrty', 'rtyrtyrty', 'Punta Cana Tours', 'ATV Macao Adventure - Punta Cana / Bavaro', '2016-08-29', 1, 0, '443.00', 'yyry', '', 'booked');

-- --------------------------------------------------------

--
-- Table structure for table `tour_picture`
--

CREATE TABLE `tour_picture` (
  `id` int(10) NOT NULL,
  `tour_id` int(10) NOT NULL,
  `file_picture` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_picture`
--

INSERT INTO `tour_picture` (`id`, `tour_id`, `file_picture`) VALUES
(19, 3, 'tour_picture_images/3_001.jpg'),
(21, 4, 'tour_picture_images/4_001.jpg'),
(22, 5, 'tour_picture_images/5_001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tour_reviews`
--

CREATE TABLE `tour_reviews` (
  `id` int(10) NOT NULL,
  `tour_id` int(10) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `feedback` text NOT NULL,
  `service_rating` enum('Very Poor','Poor','Good','Very Good','Excellent') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_reviews`
--

INSERT INTO `tour_reviews` (`id`, `tour_id`, `name`, `email`, `feedback`, `service_rating`) VALUES
(1, 2, 'qwewqeqw', 'eewqe', 'wewqeqwe', 'Good'),
(2, 0, '', '', '', ''),
(3, 2, 'jjghj', 'ghjghjgh', 'jghjghj', 'Very Poor'),
(4, 2, '', '', '', 'Very Good');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `source` varchar(64) NOT NULL,
  `destination` varchar(64) NOT NULL,
  `transfer_type` varchar(64) NOT NULL,
  `driving_time` varchar(64) NOT NULL,
  `one_way_cost` decimal(10,2) NOT NULL,
  `round_trip_cost` decimal(10,2) NOT NULL,
  `lat` varchar(127) DEFAULT NULL,
  `lng` varchar(127) DEFAULT NULL,
  `description` text NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`id`, `users_id`, `source`, `destination`, `transfer_type`, `driving_time`, `one_way_cost`, `round_trip_cost`, `lat`, `lng`, `description`, `status`) VALUES
(2, 9, 'La Isabella Airport (JBQ)', 'ATV Macao Adventure - Punta Cana / Bavaro', 'Luxury', '100', '10.00', '20.00', '38.54816542304659', '-3.8671875', '<p>efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;efwfe erewr&nbsp;</p>', 'active'),
(3, 10, 'Puerto Plata Airport (POP)', 'Samana Airport (AZS)', 'Private', '44', '434.00', '3434.00', '39.68182601089365', '-6.031494140625', '<p>43434 43434</p>', 'active'),
(4, 10, 'Punta Cana Airport (PUJ)', 'Santiago Airport (STI)', 'Luxury', '34', '343.00', '3434.00', '38.410558250946', '-4.482421875', '<p>43434</p>', 'active'),
(5, 10, 'La Isabella Airport (JBQ)', 'La Romana Airport (LRM)', 'Luxury', '444', '343434.00', '343.00', '38.410558250946', '-4.482421875', '<p>3434343</p>', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_booking`
--

CREATE TABLE `transfer_booking` (
  `id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `title` varchar(64) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `contact_number` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `passengers` int(10) NOT NULL,
  `baby_car_seat` enum('Yes','No') NOT NULL,
  `number_of_baby_car_seats` int(10) NOT NULL,
  `from_to` varchar(256) NOT NULL,
  `pick_up_location` varchar(256) NOT NULL,
  `arrival_date` varchar(64) NOT NULL,
  `arrival_hr` varchar(64) NOT NULL,
  `arrival_min` varchar(64) NOT NULL,
  `arrival_am_pm` enum('AM','PM') NOT NULL,
  `arrival_airline_company` varchar(64) NOT NULL,
  `arrival_flight_number` varchar(64) NOT NULL,
  `departure_date` date NOT NULL,
  `departure_hr` varchar(64) NOT NULL,
  `departure_min` varchar(64) NOT NULL,
  `departure_am_pm` varchar(64) NOT NULL,
  `departure_airline_company` varchar(64) NOT NULL,
  `departure_flight_number` varchar(64) NOT NULL,
  `departure_pick_up_time` varchar(64) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `special_requests` text NOT NULL,
  `txn_id` varchar(127) NOT NULL,
  `status` enum('booked','paid','cancel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_booking`
--

INSERT INTO `transfer_booking` (`id`, `users_id`, `title`, `first_name`, `last_name`, `contact_number`, `email`, `password`, `passengers`, `baby_car_seat`, `number_of_baby_car_seats`, `from_to`, `pick_up_location`, `arrival_date`, `arrival_hr`, `arrival_min`, `arrival_am_pm`, `arrival_airline_company`, `arrival_flight_number`, `departure_date`, `departure_hr`, `departure_min`, `departure_am_pm`, `departure_airline_company`, `departure_flight_number`, `departure_pick_up_time`, `total_price`, `special_requests`, `txn_id`, `status`) VALUES
(2, 0, 'gdggdfgd', 'ggdfg', 'dgdfgdf', 'gdfgdfgdfg', 'dfgdfgdfg', 'dfgdfgfg', 5, 'Yes', 0, 'La Isabella Airport (JBQ)-La Romana Airport (LRM)', 'fgfgfdg', '2016-08-15', 'gfg', 'dgfdgf', 'AM', 'gdfg', 'gdfg', '2016-08-15', 'gfg', 'dfgdfgdfg', 'fgdfg', 'dfgdfgdfg', 'fdgdfgdfg', 'dfgfdg', '50.00', 'gdfgdfgdfg', '', 'booked'),
(3, 0, 'gfgdfg', 'gdfgfdgfd', 'gdfgdfgdf', 'gdfgfdgfd', 'gfdgdfgdfg', 'fdgdfg', 2, 'Yes', 0, 'La Isabella Airport (JBQ)-La Romana Airport (LRM)', 'gdfgdfg', '2016-08-15', 'fgfgfd', 'gfdgfdg', 'AM', 'dfgfdgdfgdf', 'gfdgdfg', '2016-08-15', 'dfgdfg', 'dfgdfgdf', 'gdfgdfg', 'dfgdfgfd', 'gdfgdfgf', 'dfgdfg', '20.00', 'dfgfgfdg', '', 'paid'),
(4, 0, 'sffsdf', 'sdfsdfsdf', 'dsfsdfsd', 'fsdfsd', 'sdfdf', 'sdfdsf', 3, 'Yes', 0, 'La Isabella Airport (JBQ)-La Romana Airport (LRM)', 'dfdsf', '', '', '', 'AM', '', '', '0000-00-00', '', '', '', '', '', '', '30.00', 'dfsdfdsf', '', 'booked'),
(5, 0, 'sffsdf', 'sdfsdfsdf', 'dsfsdfsd', 'fsdfsd', 'sdfdf', 'sdfdsf', 3, 'Yes', 0, 'La Isabella Airport (JBQ)-La Romana Airport (LRM)', 'dfdsf', '2016-08-15', 'yut', 'utyutyuu', 'AM', 'tutyuyt', 'tyutyu', '2016-08-15', '', '', '', '', '', '', '30.00', 'dfsdfdsf', '04R729588S812034M', 'paid'),
(6, 0, 'trtrt', 'tere', 'ttretretrtr', 'etrtret', 'trtrte', 'tretr', 7, 'Yes', 0, 'La Isabella Airport (JBQ)-La Romana Airport (LRM)', 'ertte', '2016-08-15', 'trterte', 'tertertetr', 'AM', 'trtre', 'tretrtretr', '2016-08-15', 'tretertret', 'tertreter', 'tretrtr', 'trtert', 'etretre', 'ttrett', '140.00', 'tertretertr', '6NA88903A6266244P', 'paid'),
(7, 0, 'sdfsdfsdf', 'sfdfdsfsdfds', 'fdsfdsfds', 'fsdfsdfdsfds', 'fdsfdf', 'sdfsdf', 2, 'Yes', 0, 'La Isabella Airport (JBQ)-La Romana Airport (LRM)', 'sdfdfdf', '2016-08-15', 'sfsdfsdf', 'dfsdfsdf', 'AM', 'sdfsdfdsf', 'sdfsdf', '2016-08-15', 'fdsfsdf', 'dfsdfdsf', 'sdfsdfs', 'fsdfds', 'fsdfsdf', 'sdfsdfs', '20.00', 'sdfdsff', '', 'paid'),
(8, 0, 'hjhgjhgj', 'ghjghjgh', 'jgjghjgh', 'jghjgh', 'ghjhg', 'jhgjgj', 7, 'Yes', 0, 'La Isabella Airport (JBQ)-La Romana Airport (LRM)', 'ghjggjhj', '2016-08-15', 'jghjgh', 'jghjgh', 'AM', 'jghjhgj', 'ghjhgjghj', '2016-08-15', 'jhgjgh', 'jhgjghjg', 'hgh', 'jhgjhg', 'jhgjgh', 'jghjgh', '70.00', 'ghjghjgj', '', 'paid'),
(9, 0, 'fgfgf', 'gfgfg', 'fgfgf', 'gff', 'fgfgf', 'gfgf', 3, 'Yes', 0, 'La Isabella Airport (JBQ)-La Romana Airport (LRM)', 'ggfg', '2016-08-29', 'ffg', 'fgf', 'AM', 'fgfg', 'fgfg', '2016-08-29', 'gfgfg', 'fgf', 'ffg', 'fgfg', 'fgfgfg', 'fgfg', '60.00', 'fgfg', '', 'booked'),
(10, 0, '453454', '545344', '3454354', '4355', '3453453453', '45345435', 1, 'Yes', 3454354, 'La Isabella Airport (JBQ)-La Romana Airport (LRM)', '3455345', '2016-08-29', '3454353', '55345', 'AM', '34534545', '34534', '2016-08-29', '4534534', '545345', '3453454', '3534534', '534534', '534534', '20.00', '34543', '', 'booked'),
(11, 0, '', '', '', '', '', '', 1, 'Yes', 0, 'La Isabella Airport (JBQ)-La Romana Airport (LRM)', '', '', '', '', 'AM', '', '', '0000-00-00', '', '', '', '', '', '', '20.00', '', '', 'booked'),
(12, 10, '', '', '', '', '', '', 1, 'Yes', 0, 'Punta Cana Airport (PUJ)-Santiago Airport (STI)', 'dfd', '2017-03-16', 'dfdfd', 'fdfdf', 'AM', 'dfdf', 'fdfdfdf', '2017-03-14', 'fdfdfdf', 'fdfdfd', 'dfdfdfd', 'fdfdf', 'dfdfdf', 'dfdfdf', '3434.00', 'dfdfdfdf', '', 'booked');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_type`
--

CREATE TABLE `transfer_type` (
  `id` int(10) NOT NULL,
  `transfer_name` varchar(64) NOT NULL,
  `file_picture` varchar(256) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_type`
--

INSERT INTO `transfer_type` (`id`, `transfer_name`, `file_picture`, `status`) VALUES
(1, 'Private', 'transfer_type_images/1_rhino.jpg', 'active'),
(2, 'Shared', 'transfer_type_images/2_rhino.jpg', 'active'),
(3, 'Luxury', 'transfer_type_images/3_close.png', 'active'),
(4, 'Bus', 'transfer_type_images/4_close.png', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(127) NOT NULL,
  `password` varchar(127) NOT NULL,
  `title` varchar(127) NOT NULL,
  `first_name` varchar(127) NOT NULL,
  `last_name` varchar(127) NOT NULL,
  `company` varchar(127) NOT NULL,
  `address` varchar(127) NOT NULL,
  `city` varchar(127) NOT NULL,
  `state` varchar(127) NOT NULL,
  `zip` varchar(127) NOT NULL,
  `country_id` varchar(127) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_type` enum('admin','agent','member') NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `title`, `first_name`, `last_name`, `company`, `address`, `city`, `state`, `zip`, `country_id`, `created_at`, `updated_at`, `user_type`, `status`) VALUES
(9, 'xx', 'xx', 'Mr.', 'Anil', 'kumar', '', '', '', '', '', '231', '2011-10-19 00:00:00', '2011-10-19 00:00:00', 'admin', 'active'),
(10, 'aa1@aa.com', '123456', '', 'AA', 'AAA', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'agent', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `excursion_zone`
--
ALTER TABLE `excursion_zone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_booking`
--
ALTER TABLE `tour_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_picture`
--
ALTER TABLE `tour_picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_reviews`
--
ALTER TABLE `tour_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_booking`
--
ALTER TABLE `transfer_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_type`
--
ALTER TABLE `transfer_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `excursion_zone`
--
ALTER TABLE `excursion_zone`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tour_booking`
--
ALTER TABLE `tour_booking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tour_picture`
--
ALTER TABLE `tour_picture`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tour_reviews`
--
ALTER TABLE `tour_reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transfer_booking`
--
ALTER TABLE `transfer_booking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `transfer_type`
--
ALTER TABLE `transfer_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
