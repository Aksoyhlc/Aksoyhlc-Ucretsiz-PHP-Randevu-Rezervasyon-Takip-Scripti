-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Ara 2021, 00:44:24
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `randevu_takip`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `site_link` varchar(530) DEFAULT NULL,
  `site_baslik` varchar(530) DEFAULT NULL,
  `site_aciklama` text DEFAULT NULL,
  `site_logo` varchar(530) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `site_link`, `site_baslik`, `site_aciklama`, `site_logo`) VALUES
(1, 'http://localhost:8080/randevu_takip', 'aaaaa', '', '4902settings.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `kul_id` int(11) NOT NULL,
  `kul_isim` varchar(120) NOT NULL,
  `kul_mail` varchar(100) NOT NULL,
  `kul_sifre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kul_id`, `kul_isim`, `kul_mail`, `kul_sifre`) VALUES
(1, 'Ökkeş Aksoy', 'aksoyhlc@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteri`
--

CREATE TABLE `musteri` (
  `musteri_id` int(11) NOT NULL,
  `musteri_isim` varchar(530) DEFAULT NULL,
  `musteri_mail` varchar(250) DEFAULT NULL,
  `musteri_telefon` varchar(25) DEFAULT NULL,
  `musteri_adres` varchar(530) DEFAULT NULL,
  `musteri_tc` varchar(20) DEFAULT NULL,
  `musteri_detay` text DEFAULT NULL,
  `eklenme_tarihi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `musteri`
--

INSERT INTO `musteri` (`musteri_id`, `musteri_isim`, `musteri_mail`, `musteri_telefon`, `musteri_adres`, `musteri_tc`, `musteri_detay`, `eklenme_tarihi`) VALUES
(4, 'Ökkeş Aksoy', 'aksoyhlc@gmail.com', 'Vitae dolor culpa e', 'Dignissimos doloremq', 'Ipsa deserunt labor', 'asdasdasd asd asd asd', '2021-01-31 17:46:16'),
(5, 'Ali Veli', 'vykegehyka@mailinator.com', 'Dolore non repellend', 'Est at dolorum ipsam', 'Voluptas et neque ip', 'Possimus ad omnis v', '2021-02-02 22:48:18'),
(6, 'Ahmet Mehmet', 'a@gmail.com', '11111', 'Türkiye', '21321321321', NULL, '2021-12-30 01:32:50'),
(7, 'Ali Veli', 'b@gmail.com', '22222', 'Almanya', '6546574987', NULL, '2021-12-30 01:32:50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevu`
--

CREATE TABLE `randevu` (
  `id` int(11) NOT NULL,
  `baslik` varchar(530) NOT NULL,
  `tarih` datetime DEFAULT NULL,
  `musteri` int(11) NOT NULL,
  `adres` text NOT NULL,
  `detay` text NOT NULL,
  `eklenme_tarihi` datetime NOT NULL DEFAULT current_timestamp(),
  `durum` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `randevu`
--

INSERT INTO `randevu` (`id`, `baslik`, `tarih`, `musteri`, `adres`, `detay`, `eklenme_tarihi`, `durum`) VALUES
(2, 'Test-1', '2021-02-03 00:00:00', 4, 'asdasd sad as dasd ', 'dasd asasd \r\nerere\r\nqwqweqwe \r\nwq3eqwe\r\n', '2021-02-02 21:04:14', 0),
(4, 'Test-2 DENEME', '2021-02-03 00:00:00', 5, 'asdasd sad as dasd ', 'dasd asasd \r\nerere\r\nqwqweqwe \r\nwq3eqwe\r\n', '2021-02-02 21:04:14', 1),
(5, 'Test-3', '2021-02-03 00:00:00', 4, 'asdasd sad as dasd ', 'dasd asasd \r\nerere\r\nqwqweqwe \r\nwq3eqwe\r\n', '2021-02-02 21:04:14', 2),
(6, 'AAA', '2021-10-30 10:00:00', 4, 'Praesentium aliquip ', 'Quae illo magna eu gr', '2021-10-29 02:28:01', 3);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`kul_id`);

--
-- Tablo için indeksler `musteri`
--
ALTER TABLE `musteri`
  ADD PRIMARY KEY (`musteri_id`);

--
-- Tablo için indeksler `randevu`
--
ALTER TABLE `randevu`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `kul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `musteri`
--
ALTER TABLE `musteri`
  MODIFY `musteri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- Tablo için AUTO_INCREMENT değeri `randevu`
--
ALTER TABLE `randevu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
