-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 Mar 2019, 18:50:01
-- Sunucu sürümü: 10.1.37-MariaDB
-- PHP Sürümü: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `turkcealtyazi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adminler`
--

CREATE TABLE `adminler` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `parola` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `adminler`
--

INSERT INTO `adminler` (`id`, `username`, `parola`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `altyorum`
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
-- Tablo döküm verisi `altyorum`
--

INSERT INTO `altyorum` (`id`, `ustyorumid`, `username`, `yorum`, `tarih`, `ididizi`) VALUES
(1, 5, 'JON_SINOW', 'deneme', '2019-03-24 12:29:19', 10),
(2, 25, 'JON_SINOW', 'deneme 2', '2019-03-24 12:31:03', 10);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anket`
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
-- Tablo döküm verisi `anket`
--

INSERT INTO `anket` (`id`, `soru`, `cevapbir`, `cevapiki`, `cevapuc`, `cevapdort`, `cevapbes`, `cevapalti`, `cevapyedi`, `cevapsekiz`, `sonucbir`, `sonuciki`, `sonucuc`, `sonucdort`, `sonucbes`, `sonucalti`, `sonucyedi`, `sonucsekiz`, `toplamsonuc`) VALUES
(1, 'En beyendiğiniz dizi hangisi ?', 'Breaking Bad', 'Game of Thrones', 'La Casa De Papel', 'Sherlock', 'True Detective', 'Black Mirror', 'Narcos', 'Şahsiyet', 4, 9, 2, 1, 1, 1, 3, 2, 23);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `izlemeliste`
--

CREATE TABLE `izlemeliste` (
  `id` int(10) UNSIGNED NOT NULL,
  `diziadi` varchar(50) NOT NULL,
  `userid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `izlemeliste`
--

INSERT INTO `izlemeliste` (`id`, `diziadi`, `userid`) VALUES
(1, 'Game of Thrones', 1),
(2, 'Dark', 1),
(3, 'Breaking Bad', 1),
(4, 'Inception', 1),
(5, 'Fight Club', 1),
(6, 'House', 1),
(7, 'Matrix', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oykullananlar`
--

CREATE TABLE `oykullananlar` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipadresi` varchar(15) NOT NULL,
  `tarih` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `oykullananlar`
--

INSERT INTO `oykullananlar` (`id`, `ipadresi`, `tarih`) VALUES
(1, '::1', 1552162233),
(2, '::1', 1552162235),
(3, '::1', 1552162238),
(4, '::1', 1552162240),
(5, '::1', 1552162243),
(6, '::1', 1552162245),
(7, '::1', 1552162248),
(8, '::1', 1552162250),
(9, '::1', 1552162252),
(10, '::1', 1552162254),
(11, '::1', 1552162256),
(12, '::1', 1552162259),
(13, '::1', 1552162264),
(14, '::1', 1552162266),
(15, '::1', 1552162269),
(16, '::1', 1552171417),
(17, '::1', 1552392530),
(18, '::1', 1552480859),
(19, '::1', 1552571392),
(20, '::1', 1552590076),
(21, '::1', 1552651579),
(22, '::1', 1552755122),
(23, '::1', 1553293915),
(24, '::1', 1553439268);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
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
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `username`, `sifre`, `eposta`, `tarih`, `songiris`, `uyeresim`) VALUES
(1, 'JON_SINOW', '006cb570acdab0e0bfc8e3dcb7bb4edf', 'jon@jon.com', '2019-03-24 15:25:19', '24.03.2019 15:25', 'members/avatar/default.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ybegeni`
--

CREATE TABLE `ybegeni` (
  `id` int(10) UNSIGNED NOT NULL,
  `yid` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) NOT NULL,
  `begeni` tinyint(4) NOT NULL,
  `ididizi` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ybegeni`
--

INSERT INTO `ybegeni` (`id`, `yid`, `username`, `begeni`, `ididizi`) VALUES
(1, 1, 'JON_SINOW', 1, 10),
(2, 25, 'JON_SINOW', 1, 10);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yildizoy`
--

CREATE TABLE `yildizoy` (
  `id` int(10) UNSIGNED NOT NULL,
  `isim` varchar(25) NOT NULL,
  `oy` int(10) UNSIGNED NOT NULL,
  `toplam` int(10) UNSIGNED NOT NULL,
  `poster` varchar(100) NOT NULL,
  `yol` varchar(50) NOT NULL,
  `tur` varchar(10) NOT NULL,
  `yorumposter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yildizoy`
--

INSERT INTO `yildizoy` (`id`, `isim`, `oy`, `toplam`, `poster`, `yol`, `tur`, `yorumposter`) VALUES
(1, 'Death Note', 0, 0, 'film/filmPoster/death.jpg', 'film/death.php', 'anime', 'film/filmPoster/deathyorum.jpg'),
(2, 'Black Miror', 0, 0, 'film/filmPoster/black.jpg', 'film/blackmi.php', 'dizi', 'film/filmPoster/blackyorum.jpg'),
(3, 'Dark', 0, 0, 'film/filmPoster/dark.png', 'film/dark.php', 'dizi', 'film/filmPoster/darkyorum.jpg'),
(4, 'Matrix', 0, 0, 'film/filmPoster/matrix.jpg', 'film/matrix.php', 'film', 'film/filmPoster/matrixyorum.jpg'),
(5, 'Sherlock', 0, 0, 'film/filmPoster/sherlock.jpg', 'film/sherlock.php', 'dizi', 'film/filmPoster/sherlockyorum.jpg'),
(6, 'House', 0, 0, 'film/filmPoster/house.jpg', 'film/house.php', 'dizi', 'film/filmPoster/houseyorum.jpg'),
(7, 'Fight Club', 0, 0, 'film/filmPoster/fight.jpg', 'film/fight.php', 'film', 'film/filmPoster/fightyorum.jpg'),
(8, 'Inception', 0, 0, 'film/filmPoster/inception.jpg', 'film/incep.php', 'film', 'film/filmPoster/inceptionyorum.jpg'),
(9, 'Breaking Bad', 0, 0, 'film/filmPoster/break.jpg', 'film/break.php', 'dizi', 'film/filmPoster/breakyorum.jpg'),
(10, 'Game of Thrones', 10, 1, 'film/filmPoster/game.jpeg', 'film/gameof.php', 'dizi', 'film/filmPoster/gameyorum.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yildizoyatanlar`
--

CREATE TABLE `yildizoyatanlar` (
  `id` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `puan` int(10) UNSIGNED NOT NULL,
  `diziname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yildizoyatanlar`
--

INSERT INTO `yildizoyatanlar` (`id`, `username`, `puan`, `diziname`) VALUES
(1, 'JON_SINOW', 10, 'Game of Thrones');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) NOT NULL,
  `yorum` varchar(450) NOT NULL,
  `diziadi` varchar(50) NOT NULL,
  `begeni` int(10) UNSIGNED NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kacinci` int(10) UNSIGNED NOT NULL,
  `dizibolum` varchar(3) NOT NULL,
  `dizisezon` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `username`, `yorum`, `diziadi`, `begeni`, `tarih`, `kacinci`, `dizibolum`, `dizisezon`) VALUES
(1, 'JON_SINOW', 'Winterfell evimiz NED STARK BABAMIZ !!!!!!!!!', 'Game of Thrones', 1, '2019-03-24 12:25:57', 0, '9', ' 1'),
(2, 'JON_SINOW', 'deneme 1', 'Game of Thrones', 0, '2019-03-24 12:28:54', 1, '0', ' 0'),
(3, 'JON_SINOW', 'deneme 2', 'Game of Thrones', 0, '2019-03-24 12:28:58', 2, '0', ' 0'),
(4, 'JON_SINOW', 'deneme 3', 'Game of Thrones', 0, '2019-03-24 12:29:01', 3, '0', ' 0'),
(5, 'JON_SINOW', 'deneme 4', 'Game of Thrones', 0, '2019-03-24 12:29:04', 4, '0', ' 0'),
(6, 'JON_SINOW', 'deneme 5', 'Game of Thrones', 0, '2019-03-24 12:29:10', 5, '0', ' 0'),
(7, 'JON_SINOW', 'deneme 6', 'Game of Thrones', 0, '2019-03-24 12:29:28', 6, '0', ' 0'),
(8, 'JON_SINOW', 'deneme 7', 'Game of Thrones', 0, '2019-03-24 12:29:31', 7, '0', ' 0'),
(9, 'JON_SINOW', 'deneme 8', 'Game of Thrones', 0, '2019-03-24 12:29:34', 8, '0', ' 0'),
(10, 'JON_SINOW', 'deneme 9', 'Game of Thrones', 0, '2019-03-24 12:29:36', 9, '0', ' 0'),
(11, 'JON_SINOW', 'deneme 10', 'Game of Thrones', 0, '2019-03-24 12:29:40', 10, '0', ' 0'),
(12, 'JON_SINOW', 'deneme 11', 'Game of Thrones', 0, '2019-03-24 12:29:43', 11, '0', ' 0'),
(13, 'JON_SINOW', 'deneme 12', 'Game of Thrones', 0, '2019-03-24 12:29:45', 12, '0', ' 0'),
(14, 'JON_SINOW', 'deneme 13', 'Game of Thrones', 0, '2019-03-24 12:29:48', 13, '0', ' 0'),
(15, 'JON_SINOW', 'deneme 14', 'Game of Thrones', 0, '2019-03-24 12:29:51', 14, '0', ' 0'),
(16, 'JON_SINOW', 'deneme 15', 'Game of Thrones', 0, '2019-03-24 12:29:53', 15, '0', ' 0'),
(17, 'JON_SINOW', 'deneme 16', 'Game of Thrones', 0, '2019-03-24 12:30:03', 16, '0', ' 0'),
(18, 'JON_SINOW', 'deneme 17', 'Game of Thrones', 0, '2019-03-24 12:30:06', 17, '0', ' 0'),
(19, 'JON_SINOW', 'deneme 18', 'Game of Thrones', 0, '2019-03-24 12:30:08', 18, '0', ' 0'),
(20, 'JON_SINOW', 'deneme 19', 'Game of Thrones', 0, '2019-03-24 12:30:11', 19, '0', ' 0'),
(21, 'JON_SINOW', 'deneme 20', 'Game of Thrones', 0, '2019-03-24 12:30:18', 20, '0', ' 0'),
(22, 'JON_SINOW', 'deneme 21', 'Game of Thrones', 0, '2019-03-24 12:30:22', 21, '0', ' 0'),
(23, 'JON_SINOW', 'deneme 22', 'Game of Thrones', 0, '2019-03-24 12:30:24', 22, '0', ' 0'),
(24, 'JON_SINOW', 'deneme 23', 'Game of Thrones', 0, '2019-03-24 12:30:26', 23, '0', ' 0'),
(25, 'JON_SINOW', 'deneme 24', 'Game of Thrones', 1, '2019-03-24 12:30:29', 24, '0', ' 0'),
(26, 'JON_SINOW', 'deneme 25', 'Game of Thrones', 0, '2019-03-24 12:30:31', 25, '0', ' 0'),
(27, 'JON_SINOW', 'deneme 26', 'Game of Thrones', 0, '2019-03-24 12:30:34', 26, '0', ' 0'),
(28, 'JON_SINOW', 'deneme 27', 'Game of Thrones', 0, '2019-03-24 12:30:36', 27, '0', ' 0'),
(29, 'JON_SINOW', 'deneme 28', 'Game of Thrones', 0, '2019-03-24 12:30:39', 28, '0', ' 0'),
(30, 'JON_SINOW', 'deneme 29', 'Game of Thrones', 0, '2019-03-24 12:30:41', 29, '0', ' 0'),
(31, 'JON_SINOW', 'deneme 30', 'Game of Thrones', 0, '2019-03-24 12:30:44', 30, '0', ' 0');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adminler`
--
ALTER TABLE `adminler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `altyorum`
--
ALTER TABLE `altyorum`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ustyorumid` (`ustyorumid`);

--
-- Tablo için indeksler `anket`
--
ALTER TABLE `anket`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `izlemeliste`
--
ALTER TABLE `izlemeliste`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `oykullananlar`
--
ALTER TABLE `oykullananlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ybegeni`
--
ALTER TABLE `ybegeni`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yildizoy`
--
ALTER TABLE `yildizoy`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yildizoyatanlar`
--
ALTER TABLE `yildizoyatanlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adminler`
--
ALTER TABLE `adminler`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `altyorum`
--
ALTER TABLE `altyorum`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `anket`
--
ALTER TABLE `anket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `izlemeliste`
--
ALTER TABLE `izlemeliste`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `oykullananlar`
--
ALTER TABLE `oykullananlar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ybegeni`
--
ALTER TABLE `ybegeni`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `yildizoy`
--
ALTER TABLE `yildizoy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `yildizoyatanlar`
--
ALTER TABLE `yildizoyatanlar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
