-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 Mar 2019, 15:16:56
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
-- Tablo için tablo yapısı `altyorum`
--

CREATE TABLE `altyorum` (
  `id` int(10) UNSIGNED NOT NULL,
  `ustyorumid` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `yorum` varchar(300) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `altyorum`
--

INSERT INTO `altyorum` (`id`, `ustyorumid`, `username`, `yorum`, `tarih`) VALUES
(1, 1, 'deneme', 'deneme', '2019-03-19 14:12:39');

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
(1, 'En beyendiğiniz dizi hangisi ?', 'Breaking Bad', 'Game of Thrones', 'La Casa De Papel', 'Sherlock', 'True Detective', 'Black Mirror', 'Narcos', 'Şahsiyet', 4, 7, 2, 1, 1, 1, 3, 2, 21);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `izlemeliste`
--

CREATE TABLE `izlemeliste` (
  `id` int(10) UNSIGNED NOT NULL,
  `diziadi` varchar(50) NOT NULL,
  `userid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(22, '::1', 1552755122);

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
(1, 'JON_SINOW', '006cb570acdab0e0bfc8e3dcb7bb4edf', 'jon@jon.com', '2019-03-19 14:11:25', '19.03.2019 14:11', 'members/avatar/default.png'),
(2, 'deneme', '8f10d078b2799206cfe914b32cc6a5e9', 'deneme@deneme.com', '2019-03-19 17:12:12', '19.03.2019 17:12', 'members/avatar/default.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ybegeni`
--

CREATE TABLE `ybegeni` (
  `id` int(10) UNSIGNED NOT NULL,
  `yid` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) NOT NULL,
  `begeni` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ybegeni`
--

INSERT INTO `ybegeni` (`id`, `yid`, `username`, `begeni`) VALUES
(1, 1, 'deneme', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yildizoy`
--

CREATE TABLE `yildizoy` (
  `id` int(10) UNSIGNED NOT NULL,
  `isim` varchar(25) NOT NULL,
  `oy` int(10) UNSIGNED NOT NULL,
  `toplam` int(10) UNSIGNED NOT NULL,
  `poster` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yildizoy`
--

INSERT INTO `yildizoy` (`id`, `isim`, `oy`, `toplam`, `poster`) VALUES
(1, 'Game of Thrones', 10, 1, 'film/filmPoster/game.jpeg'),
(2, 'Breaking Bad', 0, 0, 'film/filmPoster/break.jpg');

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
(1, 'deneme', 10, 'Game of Thrones');

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
(1, 'deneme', 'deneme', 'Game of Thrones', 1, '2019-03-19 14:12:28', 0, '0', ' 0');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `altyorum`
--
ALTER TABLE `altyorum`
  ADD PRIMARY KEY (`id`);

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
-- Tablo için AUTO_INCREMENT değeri `altyorum`
--
ALTER TABLE `altyorum`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `anket`
--
ALTER TABLE `anket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `izlemeliste`
--
ALTER TABLE `izlemeliste`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `oykullananlar`
--
ALTER TABLE `oykullananlar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `ybegeni`
--
ALTER TABLE `ybegeni`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `yildizoy`
--
ALTER TABLE `yildizoy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `yildizoyatanlar`
--
ALTER TABLE `yildizoyatanlar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
