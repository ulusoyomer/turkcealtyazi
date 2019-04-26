-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2019 at 05:49 PM
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
  `ididizi` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `altyorum`
--

INSERT INTO `altyorum` (`id`, `ustyorumid`, `username`, `yorum`, `tarih`, `ididizi`) VALUES
(1, 1, 'kral_54', 'Haklısın Reisss', '2019-04-25 22:11:24', 24),
(2, 1, 'chrome', 'Çok Namuslu Adamdı Yazık Oldu !!!!!!', '2019-04-26 08:39:44', 24),
(3, 6, 'kral_54', 'Sen Ne anlarsın ?', '2019-04-26 11:13:25', 23),
(4, 9, 'moz', 'Katılıyorum...', '2019-04-26 11:22:45', 23),
(5, 2, 'JON_SINOW', 'Aynen Öyle', '2019-04-26 15:22:54', 24);

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
(1, 'En beğendiğiniz dizi hangisi ?', 'Breaking Bad', 'Game of Thrones', 'La Casa De Papel', 'Sherlock', 'True Detective', 'Black Mirror', 'Narcos', 'Şahsiyet', 1, 1, 1, 1, 1, 1, 1, 1, 8),
(2, 'En Sevdiğiniz Aktör/Aktris hangisi ?', 'Brad Pit', 'Christian Bale', 'Leonardo DiCaprio', 'Keanu Reeves', 'Natalie Portman', 'Aamir Khan', 'Lena Headey', 'Wagner Moura', 1, 1, 1, 1, 1, 1, 1, 1, 8),
(3, 'Anime, Çizgi Film Midir ?', 'Evet', 'Hayır', '', '', '', '', '', '', 1, 1, 0, 0, 0, 0, 0, 0, 2);

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
(1, 'Game of Thrones', 10),
(8, 'Narcos', 10),
(9, 'Death Note', 2),
(11, 'Narcos', 1),
(12, 'Death Note', 1),
(13, 'Shingeki no Kyojin', 1),
(14, 'Game of Thrones', 1),
(15, 'Braking Bad', 1),
(17, 'Reservoir Dogs', 1);

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
(15, '::1', 1556262641, 2);

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
(1, 'Game of Thrones', 'MÜSLÜM_BABA', 'sub/MÜSLÜM_BABAGameofThrones1X1-0.srt', 'Keyifli Seyirler Dilerim', 1, 1, 'Türkçe', '2019-04-26 08:41:04', 1),
(2, 'Shingeki no Kyojin', 'moz', 'sub/mozShingekinoKyojin2X1-0.srt', '2. ileri alınız Biraz Kayma Var', 2, 1, 'Türkçe', '2019-04-26 09:01:32', 1),
(3, 'Game of Thrones', 'MÜSLÜM_BABA', 'sub/MÜSLÜM_BABAGameofThrones2X2-1.srt', '', 2, 2, 'İspanyolca', '2019-04-26 09:15:58', 1),
(4, 'Game of Thrones', 'MÜSLÜM_BABA', 'sub/MÜSLÜM_BABAGameofThrones6X1-2.srt', '', 6, 1, 'Türkçe', '2019-04-26 14:04:27', 1),
(5, 'Game of Thrones', 'MÜSLÜM_BABA', 'sub/MÜSLÜM_BABAGameofThrones3X2-3.srt', '', 3, 2, 'Türkçe', '2019-04-26 14:06:06', 1),
(6, 'Game of Thrones', 'superman', 'sub/supermanGameofThrones4X1-0.srt', '', 4, 1, 'Fransızca', '2019-04-26 14:07:53', 1),
(7, 'Game of Thrones', 'superman', 'sub/supermanGameofThrones2X1-1.srt', '', 2, 1, 'Azerice', '2019-04-26 14:08:37', 1),
(8, 'Game of Thrones', 'superman', 'sub/supermanGameofThrones1X7-2.srt', '', 1, 7, 'Almanca', '2019-04-26 14:09:27', 1),
(9, 'Game of Thrones', 'kral_54', 'sub/kral_54GameofThrones7X9-0.srt', '', 7, 9, 'Almanca', '2019-04-26 14:10:37', 1),
(10, 'Narcos', 'kral_54', 'sub/kral_54Narcos1X1-0.srt', '', 1, 1, 'İtalyanca', '2019-04-26 14:11:09', 1),
(11, 'Death Note', 'MÜSLÜM_BABA', 'sub/MÜSLÜM_BABADeathNote1X12-0.srt', '', 1, 12, 'İtalyanca', '2019-04-26 14:13:52', 1),
(12, 'Death Note', 'JON_SINOW', 'sub/JON_SINOWDeathNote2X1-0.srt', 'Japonca', 2, 1, 'UNK', '2019-04-26 14:15:04', 1),
(13, 'Shingeki no Kyojin', 'JON_SINOW', 'sub/JON_SINOWShingekinoKyojin2X2-0.srt', '', 2, 2, 'Azerice', '2019-04-26 14:16:05', 1),
(14, 'Narcos', 'JON_SINOW', 'sub/JON_SINOWNarcos1X1-0.srt', '', 1, 1, 'İngilizce', '2019-04-26 14:16:29', 1),
(15, 'Game of Thrones', 'JON_SINOW', 'sub/JON_SINOWGameofThrones4X4-0.srt', '', 4, 4, 'Türkçe', '2019-04-26 14:16:46', 1);

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
(1, 'JON_SINOW', '006cb570acdab0e0bfc8e3dcb7bb4edf', 'jon@jon.com', '2019-04-26 00:07:00', '26.04.2019 17:14', 'members/avatar/JON_SINOW.jpg'),
(2, 'moz', '89364cb625249b3d478bace02699e05d', 'moz@moz.com', '2019-04-26 00:07:21', '26.04.2019 14:16', 'members/avatar/moz.jpg'),
(3, 'exp', 'b0ab0254bd58eb87eaee3172ba49fefb', 'exp@exp.com', '2019-04-26 00:07:43', '26.04.2019 00:20', 'members/avatar/exp.png'),
(4, 'Heisenberg', 'd5e2a2c9141206704cdace7df654ca7e', 'hei@hei.com', '2019-04-26 00:08:25', '26.04.2019 00:21', 'members/avatar/Heisenberg.jpg'),
(5, 'superman', 'dc308a0713062375862df6c556c43bc0', 'spr@spr.com', '2019-04-26 00:10:26', '26.04.2019 17:07', 'members/avatar/superman.jpg'),
(6, 'chrome', '599e41d8cd8cf1ea79e494df54ede29a', 'chr@chr.com', '2019-04-26 00:10:58', '26.04.2019 11:37', 'members/avatar/chrome.png'),
(7, 'MÜSLÜM_BABA', 'ee33e909372d935d190f4fcb2a92d542', 'ms@ms.com', '2019-04-26 00:11:45', '26.04.2019 17:13', 'members/avatar/MÜSLÜM_BABA.jpg'),
(8, 'kral_54', 'd78406cbaeb5be8c2ef9dfca493dc55e', 'kra@kra.com', '2019-04-26 00:13:44', '26.04.2019 17:10', 'members/avatar/kral_54.png'),
(9, 'YARGILAYICI', '883452d07c625e5dbbcdaaa47f0aa92d', 'yar@yar.com', '2019-04-26 00:15:19', '26.04.2019 00:29', 'members/avatar/YARGILAYICI.jpg'),
(10, 'spedyy_mustafa', '1e59132c5c434e25e01a39e0e1bbe9f3', 'spd@spd.com', '2019-04-26 00:15:50', '26.04.2019 14:14', 'members/avatar/spedyy_mustafa.png');

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
(1, 1, 'kral_54', 1, 24),
(2, 1, 'spedyy_mustafa', 1, 24),
(3, 3, 'moz', 1, 24),
(4, 1, 'moz', 1, 24),
(5, 1, 'MÜSLÜM_BABA', 1, 24),
(6, 1, 'chrome', 1, 24),
(7, 3, 'chrome', 1, 24),
(8, 3, 'JON_SINOW', 1, 24),
(9, 4, 'JON_SINOW', 1, 23),
(10, 4, 'kral_54', 1, 23),
(11, 4, 'spedyy_mustafa', 1, 23),
(12, 7, 'kral_54', 1, 23),
(13, 9, 'moz', 1, 23);

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
(1, 'Fight Club', 0, 0, 'film/filmPoster/fight.jpg', 'film/fight.php', 'Film', 'film/filmPoster/fightyorum.jpg'),
(2, 'Old Boy', 0, 0, 'film/filmPoster/oldboy.jpg', 'film/old.php', 'Film', 'film/filmPoster/oldboyyorum.jpg'),
(3, 'Steins Gate', 0, 0, 'film/filmPoster/steins.jpg', 'film/steins.php', 'Anime', 'film/filmPoster/steinsyorum.jpg'),
(4, 'House', 0, 0, 'film/filmPoster/house.jpg', 'film/house.php', 'Dizi', 'film/filmPoster/houseyorum.jpg'),
(5, 'Kiseijuu: Sei no Kakuritsu', 0, 0, 'film/filmPoster/keije.jpg', 'film/keije.php', 'Anime', 'film/filmPoster/keijeyorum.jpg'),
(6, 'Şahsiyet', 0, 0, 'film/filmPoster/sahsiyet.jpg', 'film/sahsiyet.php', 'Dizi', 'film/filmPoster/sahsiyetyorum.png'),
(7, '3 Idiots', 0, 0, 'film/filmPoster/idiots.jpg', 'film/idiots.php', 'Film', 'film/filmPoster/idiotsyorum.jpg'),
(8, 'Seven', 0, 0, 'film/filmPoster/seven.jpg', 'film/seven.php', 'Film', 'film/filmPoster/sevenyorum.jpg'),
(9, 'Fullmetal Alchemist: Brotherhood', 0, 0, 'film/filmPoster/metalalc.jpg', 'film/metalalc.php', 'Anime', 'film/filmPoster/metalalcyorum.jpeg'),
(10, 'Another', 0, 0, 'film/filmPoster/another.jpg', 'film/another.php', 'Anime', 'film/filmPoster/anotheryorum.jpg'),
(11, 'Black Miror', 0, 0, 'film/filmPoster/black.jpg', 'film/black.php', 'Dizi', 'film/filmPoster/blackyorum.jpg'),
(12, 'Sherlock', 0, 0, 'film/filmPoster/sherlock.jpg', 'film/sherlock.php', 'Dizi', 'film/filmPoster/sherlockyorum.jpg'),
(13, 'The Dark Knight', 0, 0, 'film/filmPoster/darkknight.jpg', 'film/darkknight.php', 'Film', 'film/filmPoster/darkknightyorum.jpg'),
(14, 'Matrix', 0, 0, 'film/filmPoster/matrix.jpg', 'film/matrix.php', 'Film', 'film/filmPoster/matrixyorum.jpg'),
(15, 'Boku Dake ga Inai Machi', 0, 0, 'film/filmPoster/bokudake.jpg', 'film/bokudake.php', 'Anime', 'film/filmPoster/bokudakeyorum.jpg'),
(16, 'One Punch Man', 0, 0, 'film/filmPoster/onepunch.jpg', 'film/onepunch.php', 'Anime', 'film/filmPoster/onepunchyorum.jpg'),
(17, 'Dark', 0, 0, 'film/filmPoster/dark.png', 'film/dark.php', 'Dizi', 'film/filmPoster/darkyorum.jpg'),
(18, 'Braking Bad', 0, 0, 'film/filmPoster/break.jpg', 'film/break.php', 'Dizi', 'film/filmPoster/breakyorum.jpg'),
(19, 'Inception', 0, 0, 'film/filmPoster/inception.jpg', 'film/inception.php', 'Film', 'film/filmPoster/inceptionyorum.jpg'),
(20, 'Reservoir Dogs', 0, 0, 'film/filmPoster/reservoir.jpg', 'film/reservoir.php', 'Film', 'film/filmPoster/reservoiryorum.jpg'),
(21, 'Shingeki no Kyojin', 9, 1, 'film/filmPoster/attackon.jpg', 'film/attackon.php', 'Anime', 'film/filmPoster/attackonyorum.gif'),
(22, 'Death Note', 9, 1, 'film/filmPoster/death.jpg', 'film/death.php', 'Anime', 'film/filmPoster/deathyorum.jpg'),
(23, 'Narcos', 8, 1, 'film/filmPoster/narcos.jpg', 'film/narcos.php', 'Dizi', 'film/filmPoster/narcosyorum.jpg'),
(24, 'Game of Thrones', 19, 2, 'film/filmPoster/game.jpeg', 'film/gameof.php', 'Dizi', 'film/filmPoster/gameyorum.jpg');

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
(1, 'MÜSLÜM_BABA', 9, 'Game of Thrones'),
(2, 'JON_SINOW', 10, 'Game of Thrones'),
(3, 'MÜSLÜM_BABA', 8, 'Narcos'),
(4, 'MÜSLÜM_BABA', 9, 'Shingeki no Kyojin'),
(5, 'MÜSLÜM_BABA', 9, 'Death Note');

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
(1, 'JON_SINOW', 'Winterfell evimiz NED STARK BABAMIZ !!!!!!!!!!', 'Game of Thrones', 5, '2019-04-25 22:10:14', '9', ' 1'),
(2, 'spedyy_mustafa', '3.Sezon Çok Güzel', 'Game of Thrones', 0, '2019-04-25 22:26:46', '10', ' 3'),
(3, 'MÜSLÜM_BABA', 'KIŞKIRTICI !!!', 'Game of Thrones', 3, '2019-04-26 08:38:23', '2', ' 8'),
(4, 'MÜSLÜM_BABA', 'Muhteşem Bir Dizi', 'Narcos', 3, '2019-04-26 11:12:08', '0', ' 0'),
(5, 'JON_SINOW', 'Muazzam', 'Narcos', 0, '2019-04-26 11:12:29', '0', ' 0'),
(6, 'superman', 'Ben çok beğenmedim..', 'Narcos', 0, '2019-04-26 11:12:56', '0', ' 0'),
(7, 'spedyy_mustafa', 'Harika', 'Narcos', 1, '2019-04-26 11:15:03', '0', ' 0'),
(8, 'kral_54', 'Süperrrrrrrr', 'Narcos', 0, '2019-04-26 11:15:37', '0', ' 0'),
(9, 'moz', '3.sezon Çöp', 'Narcos', 1, '2019-04-26 11:16:34', '0', ' 0'),
(10, 'JON_SINOW', 'Harika', 'Death Note', 0, '2019-04-26 15:17:34', '0', ' 0'),
(11, 'JON_SINOW', 'Muazzam', 'Death Note', 0, '2019-04-26 15:17:40', '0', ' 0');

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
-- AUTO_INCREMENT for table `izlemeliste`
--
ALTER TABLE `izlemeliste`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `oykullananlar`
--
ALTER TABLE `oykullananlar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subs`
--
ALTER TABLE `subs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ybegeni`
--
ALTER TABLE `ybegeni`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `yildizoy`
--
ALTER TABLE `yildizoy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `yildizoyatanlar`
--
ALTER TABLE `yildizoyatanlar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
