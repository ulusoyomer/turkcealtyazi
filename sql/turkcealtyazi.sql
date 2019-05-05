-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2019 at 08:54 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turkcealtyazi`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminler`
--

CREATE TABLE `adminler` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `parola` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminler`
--

INSERT INTO `adminler` (`id`, `username`, `parola`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `altyorum`
--

CREATE TABLE `altyorum` (
  `id` int(10) UNSIGNED NOT NULL,
  `ustyorumid` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `yorum` varchar(300) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ididizi` int(10) UNSIGNED NOT NULL,
  `begeni` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `altyorum`
--

INSERT INTO `altyorum` (`id`, `ustyorumid`, `username`, `yorum`, `tarih`, `ididizi`, `begeni`) VALUES
(2, 5, 'moz', 'merhaba', '2019-04-30 18:28:41', 24, 1),
(3, 2, 'hmn', 'Aynen Kardaşım !!!!!!!!!!!!', '2019-05-03 06:30:21', 25, 3),
(4, 2, 'mustafa', 'Aynen Çok Namuslu bir adamdı... Yazık oldu :((', '2019-05-03 06:34:23', 25, 0),
(5, 20, 'JON_SINOW', 'Deneme', '2019-05-04 19:58:08', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `anket`
--

CREATE TABLE `anket` (
  `id` int(10) UNSIGNED NOT NULL,
  `soru` varchar(100) NOT NULL,
  `cevapbir` varchar(50) NOT NULL,
  `cevapiki` varchar(50) NOT NULL,
  `cevapuc` varchar(50) NOT NULL,
  `cevapdort` varchar(50) NOT NULL,
  `cevapbes` varchar(50) NOT NULL,
  `cevapalti` varchar(50) NOT NULL,
  `cevapyedi` varchar(50) NOT NULL,
  `cevapsekiz` varchar(50) NOT NULL,
  `sonucbir` int(10) UNSIGNED NOT NULL,
  `sonuciki` int(10) UNSIGNED NOT NULL,
  `sonucuc` int(10) UNSIGNED NOT NULL,
  `sonucdort` int(10) UNSIGNED NOT NULL,
  `sonucbes` int(10) UNSIGNED NOT NULL,
  `sonucalti` int(10) UNSIGNED NOT NULL,
  `sonucyedi` int(10) UNSIGNED NOT NULL,
  `sonucsekiz` int(10) UNSIGNED NOT NULL,
  `toplamsonuc` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anket`
--

INSERT INTO `anket` (`id`, `soru`, `cevapbir`, `cevapiki`, `cevapuc`, `cevapdort`, `cevapbes`, `cevapalti`, `cevapyedi`, `cevapsekiz`, `sonucbir`, `sonuciki`, `sonucuc`, `sonucdort`, `sonucbes`, `sonucalti`, `sonucyedi`, `sonucsekiz`, `toplamsonuc`) VALUES
(1, 'En beğendiğiniz dizi hangisi ?', 'Breaking Bad', 'Game of Thrones', 'La Casa De Papel', 'Sherlock', 'True Detective', 'Black Mirror', 'Narcos', 'Şahsiyet', 1, 2, 1, 1, 1, 1, 1, 1, 9),
(2, 'En Sevdiğiniz Aktör/Aktris hangisi ?', 'Brad Pit', 'Christian Bale', 'Leonardo DiCaprio', 'Keanu Reeves', 'Natalie Portman', 'Aamir Khan', 'Lena Headey', 'Wagner Moura', 1, 2, 1, 1, 1, 1, 1, 1, 9),
(3, 'Anime, Çizgi Film Midir ?', 'Evet', 'Hayır', '', '', '', '', '', '', 1, 2, 0, 0, 0, 0, 0, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `aybegeni`
--

CREATE TABLE `aybegeni` (
  `id` int(10) UNSIGNED NOT NULL,
  `ayid` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `begeni` int(1) NOT NULL,
  `iddizi` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aybegeni`
--

INSERT INTO `aybegeni` (`id`, `ayid`, `username`, `begeni`, `iddizi`) VALUES
(1, 1, 'JON_SINOW', 1, 1),
(2, 2, 'moz', 1, 24),
(3, 3, 'hmn', 1, 25),
(4, 3, 'mustafa', 1, 25),
(5, 3, 'YARGILAYICI', 1, 25),
(6, 5, 'JON_SINOW', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `izlemeliste`
--

CREATE TABLE `izlemeliste` (
  `id` int(10) UNSIGNED NOT NULL,
  `diziadi` varchar(50) NOT NULL,
  `userid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `izlemeliste`
--

INSERT INTO `izlemeliste` (`id`, `diziadi`, `userid`) VALUES
(3, 'Game of Thrones', 2),
(4, 'Seven', 2),
(5, 'Şahsiyet', 2),
(6, 'Game of Thrones', 7);

-- --------------------------------------------------------

--
-- Table structure for table `oykullananlar`
--

CREATE TABLE `oykullananlar` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipadresi` varchar(15) NOT NULL,
  `tarih` int(20) UNSIGNED NOT NULL,
  `anketid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oykullananlar`
--

INSERT INTO `oykullananlar` (`id`, `ipadresi`, `tarih`, `anketid`) VALUES
(1, '::1', 1556262585, 1),
(2, '::1', 1556262590, 1),
(3, '::1', 1556262592, 1),
(4, '::1', 1556262596, 1),
(5, '::1', 1556262603, 1),
(6, '::1', 1556262606, 1),
(7, '::1', 1556262612, 1),
(8, '::1', 1556262616, 3),
(9, '::1', 1556262624, 2),
(10, '::1', 1556262628, 2),
(11, '::1', 1556262631, 2),
(12, '::1', 1556262633, 2),
(13, '::1', 1556262636, 2),
(14, '::1', 1556262639, 2),
(15, '::1', 1556262641, 2),
(16, '::1', 1556362729, 2),
(17, '::1', 1556362739, 1),
(18, '::1', 1556362743, 3);

-- --------------------------------------------------------

--
-- Table structure for table `subs`
--

CREATE TABLE `subs` (
  `id` int(10) UNSIGNED NOT NULL,
  `diziname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `diziyolu` varchar(100) NOT NULL,
  `diziyorum` varchar(500) NOT NULL,
  `sezon` tinyint(3) UNSIGNED NOT NULL,
  `bolum` tinyint(3) UNSIGNED NOT NULL,
  `dil` varchar(20) NOT NULL,
  `zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `onay` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subs`
--

INSERT INTO `subs` (`id`, `diziname`, `username`, `diziyolu`, `diziyorum`, `sezon`, `bolum`, `dil`, `zaman`, `onay`) VALUES
(1, 'House', 'JON_SINOW', 'sub/JON_SINOWHouse1X1-0.srt', '', 1, 1, 'Türkçe', '2019-04-30 15:46:42', 1),
(2, 'Seven', 'moz', 'sub/mozSeven0X0-0.srt', '', 0, 0, 'Türkçe', '2019-04-30 16:11:16', 1),
(3, 'One Punch Man', 'moz', 'sub/mozOnePunchMan2X3-0.srt', 'Çince', 2, 3, 'UNK', '2019-04-30 16:16:27', 1),
(4, 'Game of Thrones', 'superman', 'sub/supermanGameofThrones1X1-0.srt', '', 1, 1, 'Azerice', '2019-04-30 16:16:59', 1),
(5, 'Sherlock', 'MÜSLÜM_BABA', 'sub/MÜSLÜM_BABASherlock2X4-0.srt', '', 2, 4, 'Azerice', '2019-04-30 16:18:07', 1),
(6, 'Şahsiyet', 'MÜSLÜM_BABA', 'sub/MÜSLÜM_BABAŞahsiyet1X1-0.srt', '', 1, 1, 'Fransızca', '2019-04-30 16:18:26', 1),
(7, 'Old Boy', 'MÜSLÜM_BABA', 'sub/MÜSLÜM_BABAOldBoy0X0-0.srt', '', 0, 0, 'Almanca', '2019-04-30 16:18:48', 1),
(8, 'Reservoir Dogs', 'MÜSLÜM_BABA', 'sub/MÜSLÜM_BABAReservoirDogs0X0-0.srt', '', 0, 0, 'Türkçe', '2019-04-30 16:19:08', 1),
(9, 'Reservoir Dogs', 'kral_54', 'sub/kral_54ReservoirDogs0X0-0.srt', '', 0, 0, 'İspanyolca', '2019-04-30 16:20:27', 1),
(10, 'One Punch Man', 'kral_54', 'sub/kral_54OnePunchMan2X2-0.srt', '', 2, 2, 'İspanyolca', '2019-04-30 16:20:45', 1),
(11, 'Şahsiyet', 'kral_54', 'sub/kral_54Şahsiyet1X4-0.srt', '', 1, 4, 'Fransızca', '2019-04-30 16:21:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) NOT NULL,
  `sifre` varchar(32) NOT NULL,
  `eposta` varchar(50) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `songiris` varchar(16) NOT NULL,
  `uyeresim` varchar(100) NOT NULL DEFAULT 'members/avatar/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uyeler`
--

INSERT INTO `uyeler` (`id`, `username`, `sifre`, `eposta`, `tarih`, `songiris`, `uyeresim`) VALUES
(1, 'JON_SINOW', '006cb570acdab0e0bfc8e3dcb7bb4edf', 'jon@jon.com', '2019-04-26 00:07:00', '04.05.2019 23:28', 'members/avatar/JON_SINOW.jpg'),
(2, 'moz', '89364cb625249b3d478bace02699e05d', 'moz@moz.com', '2019-04-26 00:07:21', '30.04.2019 19:22', 'members/avatar/moz.jpg'),
(3, 'exp', 'b0ab0254bd58eb87eaee3172ba49fefb', 'exp@exp.com', '2019-04-26 00:07:43', '26.04.2019 00:20', 'members/avatar/exp.png'),
(4, 'Heisenberg', 'd5e2a2c9141206704cdace7df654ca7e', 'hei@hei.com', '2019-04-26 00:08:25', '26.04.2019 00:21', 'members/avatar/Heisenberg.jpg'),
(5, 'superman', 'dc308a0713062375862df6c556c43bc0', 'spr@spr.com', '2019-04-26 00:10:26', '30.04.2019 19:16', 'members/avatar/superman.jpg'),
(6, 'chrome', '599e41d8cd8cf1ea79e494df54ede29a', 'chr@chr.com', '2019-04-26 00:10:58', '26.04.2019 11:37', 'members/avatar/chrome.png'),
(7, 'MÜSLÜM_BABA', 'ee33e909372d935d190f4fcb2a92d542', 'ms@ms.com', '2019-04-26 00:11:45', '30.04.2019 19:17', 'members/avatar/MÜSLÜM_BABA.jpg'),
(8, 'kral_54', 'd78406cbaeb5be8c2ef9dfca493dc55e', 'kra@kra.com', '2019-04-26 00:13:44', '04.05.2019 23:27', 'members/avatar/kral_54.png'),
(9, 'YARGILAYICI', '883452d07c625e5dbbcdaaa47f0aa92d', 'yar@yar.com', '2019-04-26 00:15:19', '03.05.2019 09:50', 'members/avatar/YARGILAYICI.jpg'),
(10, 'spedyy_mustafa', '1e59132c5c434e25e01a39e0e1bbe9f3', 'spd@spd.com', '2019-04-26 00:15:50', '30.04.2019 19:22', 'members/avatar/spedyy_mustafa.png'),
(11, 'hmn', '40602cf3422bd7754150cb7cfcda8c88', 'hmn@hmn.com', '2019-05-03 09:30:01', '03.05.2019 09:30', 'members/avatar/hmn.jpg'),
(12, 'mustafa', 'a88ad3a75f88bbe93b64a7c55ade7a5d', 'mst@mst.com', '2019-05-03 09:33:56', '03.05.2019 09:33', 'members/avatar/default.png');

-- --------------------------------------------------------

--
-- Table structure for table `ybegeni`
--

CREATE TABLE `ybegeni` (
  `id` int(10) UNSIGNED NOT NULL,
  `yid` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) NOT NULL,
  `begeni` tinyint(4) NOT NULL,
  `ididizi` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ybegeni`
--

INSERT INTO `ybegeni` (`id`, `yid`, `username`, `begeni`, `ididizi`) VALUES
(1, 2, 'MÜSLÜM_BABA', 1, 25),
(2, 5, 'moz', 1, 24),
(3, 2, 'hmn', 1, 25),
(4, 2, 'mustafa', 1, 25),
(5, 2, 'YARGILAYICI', 1, 25),
(6, 20, 'JON_SINOW', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `yildizoy`
--

CREATE TABLE `yildizoy` (
  `id` int(10) UNSIGNED NOT NULL,
  `isim` varchar(50) NOT NULL,
  `oy` int(10) UNSIGNED NOT NULL,
  `toplam` int(10) UNSIGNED NOT NULL,
  `poster` varchar(100) NOT NULL,
  `yol` varchar(50) NOT NULL,
  `tur` varchar(10) NOT NULL,
  `yorumposter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yildizoy`
--

INSERT INTO `yildizoy` (`id`, `isim`, `oy`, `toplam`, `poster`, `yol`, `tur`, `yorumposter`) VALUES
(1, 'House', 0, 0, 'film/filmPoster/house.jpg', 'film/house.php', 'Dizi', 'film/filmPoster/houseyorum.jpg'),
(2, 'Steins Gate', 0, 0, 'film/filmPoster/steins.jpg', 'film/steins.php', 'Anime', 'film/filmPoster/steinsyorum.jpg'),
(3, 'Black Miror', 0, 0, 'film/filmPoster/black.jpg', 'film/black.php', 'Dizi', 'film/filmPoster/blackyorum.jpg'),
(4, 'Another', 0, 0, 'film/filmPoster/another.jpg', 'film/another.php', 'Anime', 'film/filmPoster/anotheryorum.jpg'),
(5, 'Lucifer', 0, 0, 'film/filmPoster/lucifer.jpg', 'film/lucifer.php', 'Dizi', 'film/filmPoster/luciferyorum.gif'),
(6, 'Boku Dake ga Inai Machi', 0, 0, 'film/filmPoster/bokudake.jpg', 'film/bokudake.php', 'Anime', 'film/filmPoster/bokudake.jpg'),
(7, 'Breaking Bad', 0, 0, 'film/filmPoster/break.jpg', 'film/break.php', 'Dizi', 'film/filmPoster/breakyorum.jpg'),
(8, 'Dark', 0, 0, 'film/filmPoster/dark.png', 'film/dark.php', 'Dizi', 'film/filmPoster/darkyorum.jpg'),
(9, 'The Dark Knight', 0, 0, 'film/filmPoster/darkknight.jpg', 'film/darkknight.php', 'Film', 'film/filmPoster/darkknightyorum.jpg'),
(10, 'Şahsiyet', 0, 0, 'film/filmPoster/sahsiyet.jpg', 'film/sahsiyet.php', 'Dizi', 'film/filmPoster/sahsiyetyorum.png'),
(11, 'Fight Club', 0, 0, 'film/filmPoster/fight.jpg', 'film/fight.php', 'Film', 'film/filmPoster/fightyorum.jpg'),
(12, '3 Idiots', 0, 0, 'film/filmPoster/idiots.jpg', 'film/idiots.php', 'Film', 'film/filmPoster/idiotsyorum.jpg'),
(13, 'Inception', 0, 0, 'film/filmPoster/inception.jpg', 'film/inception.php', 'Film', 'film/filmPoster/inceptionyorum.jpg'),
(14, 'Kiseijuu: Sei no Kakuritsu', 0, 0, 'film/filmPoster/keije.jpg', 'film/keije.php', 'Anime', 'film/filmPoster/keijeyorum.jpg'),
(15, 'Matrix', 0, 0, 'film/filmPoster/matrix.jpg', 'film/matrix.php', 'Film', 'film/filmPoster/matrixyorum.jpg'),
(16, 'Fullmetal Alchemist: Brotherhood', 0, 0, 'film/filmPoster/metalalc.jpg', 'film/metalalc.php', 'Anime', 'film/filmPoster/metalalcyorum.jpeg'),
(17, 'Narcos', 0, 0, 'film/filmPoster/narcos.jpg', 'film/narcos.php', 'Dizi', 'film/filmPoster/narcosyorum.jpg'),
(18, 'Seven', 0, 0, 'film/filmPoster/seven.jpg', 'film/seven.php', 'Film', 'film/filmPoster/sevenyorum.jpg'),
(19, 'Death Note', 0, 0, 'film/filmPoster/death.jpg', 'film/death.php', 'Anime', 'film/filmPoster/deathyorum.jpg'),
(20, 'Old Boy', 0, 0, 'film/filmPoster/oldboy.jpg', 'film/oldboy.php', 'Film', 'film/filmPoster/oldboyyorum.jpg'),
(21, 'One Punch Man', 0, 0, 'film/filmPoster/onepunch.jpg', 'film/onepunch.php', 'Anime', 'film/filmPoster/onepunchyorum.jpg'),
(22, 'Reservoir Dogs', 18, 2, 'film/filmPoster/reservoir.jpg', 'film/reservoir.php', 'Film', 'film/filmPoster/reservoiryorum.jpg'),
(23, 'Shingeki no Kyojin', 0, 0, 'film/filmPoster/attackon.jpg', 'film/attackon.php', 'Anime', 'film/filmPoster/attackonyorum.gif'),
(24, 'Sherlock', 16, 2, 'film/filmPoster/sherlock.jpg', 'film/sherlock.php', 'Dizi', 'film/filmPoster/sherlockyorum.jpg'),
(25, 'Game of Thrones', 18, 2, 'film/filmPoster/game.jpeg', 'film/gameof.php', 'Dizi', 'film/filmPoster/gameyorum.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `yildizoyatanlar`
--

CREATE TABLE `yildizoyatanlar` (
  `id` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `puan` int(10) UNSIGNED NOT NULL,
  `diziname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yildizoyatanlar`
--

INSERT INTO `yildizoyatanlar` (`id`, `username`, `puan`, `diziname`) VALUES
(1, 'JON_SINOW', 10, 'Game of Thrones'),
(2, 'JON_SINOW', 9, 'Sherlock'),
(3, 'JON_SINOW', 10, 'Reservoir Dogs'),
(4, 'kral_54', 8, 'Game of Thrones'),
(5, 'kral_54', 8, 'Reservoir Dogs'),
(6, 'kral_54', 7, 'Sherlock');

-- --------------------------------------------------------

--
-- Table structure for table `yorumlar`
--

CREATE TABLE `yorumlar` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) NOT NULL,
  `yorum` varchar(450) NOT NULL,
  `diziadi` varchar(50) NOT NULL,
  `begeni` int(10) UNSIGNED NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dizibolum` varchar(3) NOT NULL,
  `dizisezon` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `username`, `yorum`, `diziadi`, `begeni`, `tarih`, `dizibolum`, `dizisezon`) VALUES
(2, 'JON_SINOW', 'Winterfell Evimiz Ned Stark Babamız !!', 'Game of Thrones', 4, '2019-04-30 16:00:18', '0', ' 0'),
(3, 'superman', 'Deneme 1', 'Shingeki no Kyojin', 0, '2019-04-30 16:00:53', '0', ' 0'),
(4, 'superman', 'Deneme 2', 'Shingeki no Kyojin', 0, '2019-04-30 16:00:56', '0', ' 0'),
(5, 'superman', 'Deneme 3', 'Shingeki no Kyojin', 1, '2019-04-30 16:01:00', '0', ' 0'),
(6, 'superman', 'Deneme 4', 'Shingeki no Kyojin', 0, '2019-04-30 16:01:03', '0', ' 0'),
(7, 'superman', 'Deneme 5', 'Shingeki no Kyojin', 0, '2019-04-30 16:01:06', '0', ' 0'),
(8, 'superman', 'Deneme 6', 'Shingeki no Kyojin', 0, '2019-04-30 16:01:12', '0', ' 0'),
(9, 'kral_54', 'Deneme 7', 'Shingeki no Kyojin', 0, '2019-04-30 16:21:41', '0', ' 0'),
(10, 'kral_54', 'Deneme 8', 'Shingeki no Kyojin', 0, '2019-04-30 16:21:44', '0', ' 0'),
(11, 'kral_54', 'Deneme 9', 'Shingeki no Kyojin', 0, '2019-04-30 16:21:47', '0', ' 0'),
(12, 'kral_54', 'Deneme 10', 'Shingeki no Kyojin', 0, '2019-04-30 16:21:50', '0', ' 0'),
(13, 'spedyy_mustafa', 'Deneme 11', 'Shingeki no Kyojin', 0, '2019-04-30 16:22:27', '0', ' 0'),
(14, 'spedyy_mustafa', 'Deneme 12', 'Shingeki no Kyojin', 0, '2019-04-30 16:22:30', '0', ' 0'),
(15, 'spedyy_mustafa', 'Deneme 13', 'Shingeki no Kyojin', 0, '2019-04-30 16:22:33', '0', ' 0'),
(16, 'moz', 'Deneme 14', 'Shingeki no Kyojin', 0, '2019-04-30 16:23:07', '0', ' 0'),
(17, 'moz', 'Deneme 15', 'Shingeki no Kyojin', 0, '2019-04-30 16:23:09', '0', ' 0'),
(18, 'moz', 'Deneme 16', 'Shingeki no Kyojin', 0, '2019-04-30 16:23:12', '0', ' 0'),
(19, 'moz', 'Deneme 17', 'Shingeki no Kyojin', 0, '2019-04-30 16:23:16', '0', ' 0'),
(20, 'JON_SINOW', 'Deneme', 'House', 1, '2019-05-04 19:57:56', '0', ' 0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminler`
--
ALTER TABLE `adminler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `altyorum`
--
ALTER TABLE `altyorum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anket`
--
ALTER TABLE `anket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aybegeni`
--
ALTER TABLE `aybegeni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `izlemeliste`
--
ALTER TABLE `izlemeliste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oykullananlar`
--
ALTER TABLE `oykullananlar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subs`
--
ALTER TABLE `subs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ybegeni`
--
ALTER TABLE `ybegeni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yildizoy`
--
ALTER TABLE `yildizoy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yildizoyatanlar`
--
ALTER TABLE `yildizoyatanlar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminler`
--
ALTER TABLE `adminler`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `altyorum`
--
ALTER TABLE `altyorum`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `anket`
--
ALTER TABLE `anket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aybegeni`
--
ALTER TABLE `aybegeni`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `izlemeliste`
--
ALTER TABLE `izlemeliste`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `oykullananlar`
--
ALTER TABLE `oykullananlar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subs`
--
ALTER TABLE `subs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ybegeni`
--
ALTER TABLE `ybegeni`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `yildizoy`
--
ALTER TABLE `yildizoy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `yildizoyatanlar`
--
ALTER TABLE `yildizoyatanlar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
