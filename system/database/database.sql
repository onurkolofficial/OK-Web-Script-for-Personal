-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Ara 2021, 19:55:53
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `onurkolweb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `announcements`
--

CREATE TABLE `announcements` (
  `id` varchar(55) NOT NULL,
  `release_date` varchar(25) NOT NULL,
  `announcement_name` varchar(80) NOT NULL,
  `announcement_message_short` varchar(100) NOT NULL,
  `announcement_message` varchar(400) NOT NULL,
  `announcement_read_count` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `announcements`
--

INSERT INTO `announcements` (`id`, `release_date`, `announcement_name`, `announcement_message_short`, `announcement_message`, `announcement_read_count`) VALUES
('test_ann_1', 'NO_DATE', 'Test_Announcement_1', 'Announcement_1_SHORT', 'Announcement_1_LONG_MESSAGE', ''),
('test_ann_2', 'NO_DATE', 'Test_Announcement_2', 'Announcement_2_SHORT', 'Announcement_2_LONG_MESSAGE', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `applications`
--

CREATE TABLE `applications` (
  `id` varchar(55) NOT NULL,
  `category_id` varchar(55) NOT NULL,
  `app_name` varchar(100) NOT NULL,
  `app_version` varchar(20) NOT NULL,
  `app_author` varchar(60) NOT NULL,
  `app_image_url` varchar(450) NOT NULL,
  `app_download_url` varchar(450) NOT NULL,
  `app_source_url` varchar(450) NOT NULL,
  `app_release_date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `applications`
--

INSERT INTO `applications` (`id`, `category_id`, `app_name`, `app_version`, `app_author`, `app_image_url`, `app_download_url`, `app_source_url`, `app_release_date`) VALUES
('test_app_id', 'test_category', 'Test Application', '', 'Onur Kol', '', '', '', 'NO_DATE');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `app_categories`
--

CREATE TABLE `app_categories` (
  `id` varchar(55) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_index` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `app_categories`
--

INSERT INTO `app_categories` (`id`, `category_name`, `category_index`) VALUES
('test_category', 'Test App Category', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mails`
--

CREATE TABLE `mails` (
  `id` varchar(55) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(85) NOT NULL,
  `message` varchar(400) NOT NULL,
  `isRead` int(1) NOT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `mails`
--

INSERT INTO `mails` (`id`, `name`, `email`, `subject`, `message`, `isRead`, `date`) VALUES
('test_contact_mail', 'Test Contact Mail 1', 'testmail@mail.com', 'Test Subject', 'TEST Message', 1, 'NO_DATE');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `page_id` int(100) NOT NULL,
  `page_index` int(100) NOT NULL,
  `page_name` varchar(85) NOT NULL,
  `page_url` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`page_id`, `page_index`, `page_name`, `page_url`) VALUES
(1, 1, '$LANG_HOME$', '/'),
(2, 2, '$LANG_APPS$', '/apps'),
(3, 3, '$LANG_ANNOUNCEMENTS$', '/announcements'),
(4, 4, '$LANG_CONTACT$', '/contact'),
(5, 5, '$LANG_ABOUT$', '/about'),
(6, 6, '$LANG_PRIVACY$', '/privacy');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` varchar(55) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `country` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `register_date` varchar(25) NOT NULL,
  `isAdmin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `announcements`
--
ALTER TABLE `announcements`
  ADD UNIQUE KEY `id` (`id`);

--
-- Tablo için indeksler `applications`
--
ALTER TABLE `applications`
  ADD UNIQUE KEY `id` (`id`);

--
-- Tablo için indeksler `app_categories`
--
ALTER TABLE `app_categories`
  ADD UNIQUE KEY `id` (`id`);

--
-- Tablo için indeksler `mails`
--
ALTER TABLE `mails`
  ADD UNIQUE KEY `id` (`id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
