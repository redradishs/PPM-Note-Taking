-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql313.ezyro.com
-- Generation Time: Jun 26, 2024 at 01:38 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezyro_36256704_ppm`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `feedback` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `feedback`) VALUES
(1, 'Hello this is a try\r\n'),
(2, 'This is a feedback'),
(3, 'Isa pa nga hshahhshsha');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `content` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `username`, `content`, `timestamp`) VALUES
(38, 'Admin', 'Admin section has been added', '2024-03-28 16:11:45'),
(2, 'Red ', 'Eyyyyyy up naaaa ahkkkkk', '2024-03-28 06:22:09'),
(8, 'Admin', 'The limit to 20 characters has been fixed. ', '2024-03-28 06:49:20'),
(9, 'Admin', 'test test', '2024-03-27 17:39:00'),
(94, 'J', 'nakalimutan kong kalimutan ka', '2024-04-03 12:53:00'),
(95, 'Red', 'aking sintaaaaaaaaaaa ikaw na ang tahanan at mundo ', '2024-04-04 04:19:48'),
(12, 'Joy', 'Salamat sa ULAN! ????????????', '2024-03-28 06:56:07'),
(93, 'anon', 'i need you to know how loved you are before you go', '2024-04-03 11:43:51'),
(14, 'russel', 'HELLO MHIE...ANG BUHAY AY WEATHER WEATHER LANG', '2024-03-28 07:29:46'),
(83, 'red', 'panget para namang tinutukan sa leeg at pinilit', '2024-03-31 16:43:46'),
(136, 'mykie', 'lost my glasses :(', '2024-04-07 14:34:27'),
(137, 'red', 'strive for authenticity ', '2024-04-08 04:29:58'),
(138, 'red', '“We will meet people, our legacy is the love that stays with them” 2 deep', '2024-04-08 04:33:10'),
(92, 'Lee', 'Lalalala lalala Elmo\'s World ', '2024-04-02 01:52:16'),
(79, 'justme', 'tulog tulog din', '2024-03-31 16:35:49'),
(80, 'red', 'there will come a time it will not be because of the virus, nor the marks it left but how the people around me made me feel.', '2024-03-31 16:38:48'),
(81, 'JUSTME', 'eto na nga magpo-post na', '2024-03-31 16:41:21'),
(31, 'mikey', 'o nagvisit ako ha', '2024-03-28 12:01:00'),
(86, 'Paul', 'Kelan?', '2024-04-01 14:19:29'),
(85, 'nanaja', 'namiss ko si red', '2024-04-01 03:35:46'),
(36, 'Admin', 'Maintenance Done', '2024-03-28 15:18:26'),
(98, 'Mikey', 'HOA4 ubos na ubos nako', '2024-04-04 11:25:49'),
(99, 'red', 'dami pa ring uncivilized monkey sa pinas ahhhhhhh', '2024-04-04 12:25:41'),
(78, 'Red', 'why do we find our worth in others ba?', '2024-03-31 06:59:04'),
(45, 'red', 'just trust me you’ll be fine', '2024-03-28 17:39:08'),
(55, 'red', 'apaka init', '2024-03-29 04:57:00'),
(56, 'red', 'another version of me i was in', '2024-03-29 04:58:23'),
(97, 'LEE', 'NGAYO\'Y NARIRITO, ISANG KATULAD MO. NA SA\'KIN AY NAGMAMAHAL, NANG BUONG TAPAT AT AKING MASILAYAN. PAG-IBIG NA WAGAS.', '2024-04-04 10:27:48'),
(96, 'gelo', 'mas pinili kong mag umpisa ulit ng panibago kaysa ayusin ka ', '2024-04-04 05:47:34'),
(58, 'disturbia ', 'Sa lahat ng sakit sa katawan, gamot dyan lalake. Magboyfriend ka, tanggal lahat yan. ', '2024-03-29 06:24:45'),
(134, 'red', 'to be loved is to be known', '2024-04-07 04:26:40'),
(135, 'red', 'u really know how to push my buttons, and right words to say.', '2024-04-07 10:57:16'),
(61, 'anon', 'The day finally came when you don’t matter anymore. You rarely cross my mind. Not having you on my recent chat list used to be a painstaking idea but days go on without you, without having to miss you', '2024-03-29 07:17:04'),
(67, 'Red', 'I will pray for you all the time', '2024-03-30 08:10:00'),
(68, 'soymeil', 'hindi ka nonchalant, wala ka lang talagang communication skills', '2024-03-31 01:55:57'),
(103, 'red', 'aun back burner pala, gegegeg nvm ', '2024-04-05 14:45:17'),
(128, 'Paul', 'tas “You’re still the one” tirada next week tigilan nyo ko.', '2024-04-06 11:41:07'),
(115, 'Nicole', 'samg ehem ehem', '2024-04-06 11:03:06'),
(102, 'red', 'inulitulit ko pag gm mo may bebu ka na pala? cidkfkfkfk', '2024-04-05 09:47:40'),
(77, 'Red', 'Swimming and samg when', '2024-03-31 05:08:51'),
(100, 'Jaj', 'natatakot ako :/', '2024-04-04 14:22:12'),
(101, 'kook', 'Sabi nga nila wala kang mabibigay kung ubos ka rin. hay buhay', '2024-04-04 15:11:18'),
(76, 'red', 'so init', '2024-03-31 05:07:08'),
(110, 'Red', 'testing', '2024-04-06 09:58:06'),
(122, 'Red', '“The man who can’t be moved” ang theme song for this week', '2024-04-06 11:09:43'),
(113, 'admin', 'Ajax check', '2024-04-06 10:21:33'),
(114, 'Admin', 'Ajax has been successfully integrated', '2024-04-06 10:22:14'),
(123, 'red', 'eme hahshshshshshshs', '2024-04-06 11:10:06'),
(129, 'paul', 'kaya ko to, putangina kaya ko to.', '2024-04-06 11:42:01'),
(131, 'red', 'jeo the man that you are ahhhh', '2024-04-07 03:18:15'),
(133, 'red', '\"in a world of boys he\'s a gentleman\"', '2024-04-07 03:19:18'),
(139, 'maykel', 'fill the gap', '2024-04-08 09:47:18'),
(140, 'red', 'thank you for showing me how much happier i could be than what i was', '2024-04-08 14:41:03'),
(141, 'nicole', 's ss sa sa sa samg ', '2024-04-09 02:01:57'),
(142, 'red', 'YESSSSSSS IMMA START WATCHING PARASYSTE', '2024-04-09 03:03:52'),
(143, 'sushi', 'okayed lang', '2024-04-09 13:55:30'),
(147, 'red', 'patience is indeed a virtue ', '2024-04-10 14:42:57'),
(148, 'red', 'even whem im 70, i’ll never forget how my heart loved you at 16', '2024-04-11 11:16:44'),
(150, 'anon', 'i remember your kindness that day when i longer mattered ', '2024-04-11 15:14:16'),
(145, 'anon', '“Mula sa pinakamababaw mong ligaya hanggang sa pinakamalalim mong mga sugat, handa akong mahalin ka sa bawat araw na lilipas, tanggapin at yakapin, unawain at ibigin, hanggang sa \'di mabilang na bukas', '2024-04-10 05:31:07'),
(152, 'red', 'i will continue to love you more and more with every struggles we face than i loved you when all was perfect ', '2024-04-12 16:07:36'),
(156, 'red', 'ang ulam po natin now ay 10 pages ng reviewer', '2024-04-14 11:19:56'),
(154, ' cookie', 'from “sakalin mo \'ko” to “nasasakal na ako”', '2024-04-13 14:48:27'),
(155, 'cookie', 'from \"bilisan mo pa\" to \"bilis mo naman sumuko\"', '2024-04-13 14:50:08'),
(164, 'red', '“all whores, we only sell different parts of our body”', '2024-04-21 11:33:50'),
(163, 'red', 'you will always be my pahinga, after a tiring day. ', '2024-04-20 13:49:45'),
(162, 'Red', 'even in my worst lies, you saw the truth in me.', '2024-04-18 23:44:11'),
(165, 'red', 'the comfort twilight brings ????', '2024-04-25 01:14:55'),
(166, 'm', 'Sana high school na lang ulit', '2024-05-06 10:49:42'),
(168, 'red', 'headache heat with sleep deprivation ', '2024-05-09 11:57:54'),
(170, 'red', 'ts all night ', '2024-05-12 14:36:39'),
(171, 'red', 'he sent me Downtown Lights, I hadn’t heard it in a while', '2024-05-14 01:01:46'),
(172, 'Red', 'sa sobrang busy di ko mabigyang pandin yung petty side ko, sige pinapatawad na kita', '2024-05-18 11:08:27'),
(173, 'toby', 'tahimik', '2024-05-19 15:35:06'),
(174, '', 'never really interested in knowing someone’s favorite color, but green never looked so good until i met you', '2024-06-12 12:58:58'),
(175, '', 'i miss hearing you sing passenger seat ', '2024-06-15 12:17:59'),
(176, '', 'we’ll pay the price i guess', '2024-06-22 04:39:54'),
(177, '', 'anywhere w u', '2024-06-22 17:06:30'),
(178, '', 'you’re not bad for clarifying your boundaries ', '2024-06-23 15:27:24'),
(179, '', 'weak hero class supremacy!!', '2024-06-23 20:17:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
