-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Kas 2018, 18:52:39
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `site_url` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_title` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_desc` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_keyw` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_tema` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `reklam1` text COLLATE utf8_turkish_ci NOT NULL,
  `reklam2` text COLLATE utf8_turkish_ci NOT NULL,
  `duyuru` text COLLATE utf8_turkish_ci NOT NULL,
  `tema_css` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `first_login` int(11) NOT NULL,
  `site_durum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`site_url`, `site_title`, `site_desc`, `site_keyw`, `site_tema`, `reklam1`, `reklam2`, `duyuru`, `tema_css`, `first_login`, `site_durum`) VALUES
('http://localhost/hblog/FTP%20Upload', 'univernot.com', 'Copyright © 2018 Tüm Hakları Saklıdır. | univernot.com', 'üniversite ders notları, ders notları,', 'default', '<img src=\"https://i.hizliresim.com/dvjdWD.jpg\" class=\"img-responsive\" /></a>', '<img src=\"https://i.hizliresim.com/8anvE7.jpg\" class=\"img-responsive\" />', '', 'turuncu', 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `icerikler`
--

CREATE TABLE `icerikler` (
  `icerik_id` int(11) NOT NULL,
  `icerik_title` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `icerik_link` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `icerik_desc` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `icerik_keyw` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `icerik_kresim` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `icerik_yazar` int(11) NOT NULL,
  `icerik_kategori` int(11) NOT NULL,
  `icerik_onay` int(11) NOT NULL,
  `icerik_hit` int(11) NOT NULL,
  `icerik_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `kategori_id` int(11) NOT NULL,
  `kategori_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_link` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_desc` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_onay` int(11) NOT NULL DEFAULT '1',
  `kategori_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=COMPACT;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kategori_id`, `kategori_baslik`, `kategori_link`, `kategori_desc`, `kategori_onay`, `kategori_tarih`) VALUES
(1, 'ABDULLAH GÜL ÜNİVERSİTESİ', 'abdullah-gul-universitesi', 'ABDULLAH GÜL ÜNİVERSİTESİ DERS NOTLARI', 1, '2018-11-16 20:58:36');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

CREATE TABLE `sayfalar` (
  `sayfa_id` int(11) NOT NULL,
  `sayfa_baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_link` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sayfa_simge` int(11) NOT NULL,
  `menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=COMPACT;

--
-- Tablo döküm verisi `sayfalar`
--

INSERT INTO `sayfalar` (`sayfa_id`, `sayfa_baslik`, `sayfa_link`, `sayfa_icerik`, `sayfa_tarih`, `sayfa_simge`, `menu`) VALUES
(1, 'Hakkımızda', 'hakkimizda', '<p>Hakkımızda sayfası....</p>', '2018-11-16 20:58:36', 1, 1),
(2, 'İletişim', 'iletisim', '<p>E-Posta Ders Notu : dersnotu@univernot.com</p>\r\n\r\n<p>E-Posta Reklam: reklam@univernot.com</p>', '2018-11-16 20:58:36', 2, 1),
(3, 'Üniversite Ders Notları', 'universite-ders-notlari', '<p>Üniversiteler:</p>\r\n\r\n<p>ABDULLAH GÜL ÜNİVERSİTESİ</p>\r\n\r\n<p>ACIBADEM MEHMET ALİ AYDINLAR ÜNİVERSİTESİ</p>\r\n\r\n<p>ADANA BİLİM VE TEKNOLOJİ ÜNİVERSİTESİ</p>\r\n\r\n<p>ADIYAMAN ÜNİVERSİTESİ</p>\r\n\r\n<p>AFYON KOCATEPE ÜNİVERSİTESİ</p>\r\n\r\n<p>AFYONKARAHİSAR SAĞLIK BİLİMLERİ ÜNİVERSİTESİ</p>\r\n\r\n<p>AĞRI İBRAHİM ÇEÇEN ÜNİVERSİTESİ</p>\r\n\r\n<p>AKDENİZ ÜNİVERSİTES</p>\r\n\r\n<p>AKSARAY ÜNİVERSİTESİ</p>\r\n\r\n<p>ALANYA ALAADDİN KEYKUBAT ÜNİVERSİTESİ</p>\r\n\r\n<p>ALANYA HAMDULLAH EMİN PAŞA ÜNİVERSİTESİ</p>\r\n\r\n<p>ALTINBAŞ ÜNİVERSİTESİ</p>\r\n\r\n<p>AMASYA ÜNİVERSİTESİ</p>\r\n\r\n<p>ANADOLU ÜNİVERSİTESİ</p>\r\n\r\n<p>ANKA TEKNOLOJİ ÜNİVERSİTESİ</p>\r\n\r\n<p>ANKARA HACI BAYRAM VELİ ÜNİVERSİTESİ</p>\r\n\r\n<p>ANKARA MEDİPOL ÜNİVERSİTESİ</p>\r\n\r\n<p>ANKARA MÜZİK VE GÜZEL SANATLAR ÜNİVERSİTESİ</p>\r\n\r\n<p>ANKARA SOSYAL BİLİMLER ÜNİVERSİTESİ</p>\r\n\r\n<p>ANKARA ÜNİVERSİTESİ</p>\r\n\r\n<p>ANKARA YILDIRIM BEYAZIT ÜNİVERSİTESİ</p>\r\n\r\n<p>ANTALYA AKEV ÜNİVERSİTESİ</p>\r\n\r\n<p>ANTALYA BİLİM ÜNİVERSİTESİ</p>\r\n\r\n<p>ARDAHAN ÜNİVERSİTESİ</p>\r\n\r\n<p>ARTVİN ÇORUH ÜNİVERSİTESİ</p>\r\n\r\n<p>ATAŞEHİR ADIGÜZEL MESLEK YÜKSEKOKULU</p>\r\n\r\n<p>ATATÜRK ÜNİVERSİTESİ</p>\r\n\r\n<p>ATILIM ÜNİVERSİTESİ</p>\r\n\r\n<p>AVRASYA ÜNİVERSİTESİ</p>\r\n\r\n<p>AVRUPA MESLEK YÜKSEKOKULU</p>\r\n\r\n<p>AYDIN ADNAN MENDERES</p>\r\n\r\n<p>BAHÇEŞEHİR ÜNİVERSİTESİ</p>\r\n\r\n<p>BALIKESİR ÜNİVERSİTESİ</p>\r\n\r\n<p>BANDIRMA ONYEDİ EYLÜL</p>\r\n\r\n<p>BARTIN ÜNİVERSİTESİ</p>\r\n\r\n<p>BAŞKENT ÜNİVERSİTESİ</p>\r\n\r\n<p>BAŞKENT ÜNİVERSİTESİ</p>\r\n\r\n<p>BAYBURT ÜNİVERSİTESİ</p>\r\n\r\n<p>BEYKENT ÜNİVERSİTESİ</p>\r\n\r\n<p>BEYKOZ ÜNİVERSİTESİ</p>\r\n\r\n<p>BEZM-İ ÂLEM VAKIF ÜNİVERSİTESİ</p>\r\n\r\n<p>BİLECİK ŞEYH EDEBALİ ÜNİVERSİTESİ</p>\r\n\r\n<p>BİNGÖL ÜNİVERSİTESİ</p>\r\n\r\n<p>BİRUNİ ÜNİVERSİTESİ</p>\r\n\r\n<p>BİTLİS EREN ÜNİVERSİTESİ</p>\r\n\r\n<p>BOĞAZİÇİ ÜNİVERSİTESİ</p>\r\n\r\n<p>BOLU ABANT İZZET BAYSAL ÜNİVERSİTESİ</p>\r\n\r\n<p>BURDUR MEHMET AKİF ERSOY ÜNİVERSİTESİ</p>\r\n\r\n<p>BURSA TEKNİK ÜNİVERSİTESİ</p>\r\n\r\n<p>BURSA ULUDAĞ ÜNİVERSİTESİ</p>\r\n\r\n<p>ÇAĞ ÜNİVERSİTESİ</p>\r\n\r\n<p>ÇANAKKALE ONSEKİZ MART ÜNİVERSİTESİ</p>\r\n\r\n<p>ÇANKAYA ÜNİVERSİTESİ</p>\r\n\r\n<p>ÇANKIRI KARATEKİN ÜNİVERSİTESİ</p>\r\n\r\n<p>ÇUKUROVA ÜNİVERSİTESİ</p>\r\n\r\n<p>DİCLE ÜNİVERSİTESİ</p>\r\n\r\n<p>DOĞUŞ ÜNİVERSİTESİ</p>\r\n\r\n<p>DOKUZ EYLÜL ÜNİVERSİTESİ</p>\r\n\r\n<p>DÜZCE ÜNİVERSİTESİ</p>\r\n\r\n<p>EGE ÜNİVERSİTESİ</p>\r\n\r\n<p>ERCİYES ÜNİVERSİTESİ</p>\r\n\r\n<p>ERZİNCAN BİNALİ YILDIRIM ÜNİVERSİTESİ</p>\r\n\r\n<p>ERZURUM TEKNİK ÜNİVERSİTESİ</p>\r\n\r\n<p>ESKİŞEHİR OSMANGAZİ ÜNİVERSİTESİ</p>\r\n\r\n<p>ESKİŞEHİR TEKNİK ÜNİVERSİTESİ</p>\r\n\r\n<p>FARUK SARAÇ TASARIM MESLEK YÜKSEKOKULU</p>\r\n\r\n<p>FATİH SULTAN MEHMET VAKIF ÜNİVERSİTESİ</p>\r\n\r\n<p>FENERBAHÇE ÜNİVERSİTESİ</p>\r\n\r\n<p>FIRAT ÜNİVERSİTESİ</p>\r\n\r\n<p>GALATASARAY ÜNİVERSİTESİ</p>\r\n\r\n<p>GAZİ ÜNİVERSİTESİ</p>\r\n\r\n<p>GAZİANTEP BİLİM VE TEKNOLOJİ ÜNİVERSİTESİ</p>\r\n\r\n<p>GAZİANTEP ÜNİVERSİTESİ</p>\r\n\r\n<p>GEBZE TEKNİK ÜNİVERSİTESİ</p>\r\n\r\n<p>GİRESUN ÜNİVERSİTESİ</p>\r\n\r\n<p>GÜMÜŞHANE ÜNİVERSİTESİ</p>\r\n\r\n<p>HACETTEPE ÜNİVERSİTESİ</p>\r\n\r\n<p>HAKKARİ ÜNİVERSİTESİ</p>\r\n\r\n<p>HALİÇ ÜNİVERSİTESİ</p>\r\n\r\n<p>HARRAN ÜNİVERSİTESİ</p>\r\n\r\n<p>HASAN KALYONCU ÜNİVERSİTESİ</p>\r\n\r\n<p>HATAY MUSTAFA KEMAL ÜNİVERSİTESİ</p>\r\n\r\n<p>HİTİT ÜNİVERSİTESİ</p>\r\n\r\n<p>IĞDIR ÜNİVERSİTESİ</p>\r\n\r\n<p>ISPARTA UYGULAMALI BİLİMLER ÜNİVERSİTESİ</p>\r\n\r\n<p>IŞIK ÜNİVERSİTESİ</p>\r\n\r\n<p>İBN HALDUN ÜNİVERSİTESİ</p>\r\n\r\n<p>İHSAN DOĞRAMACI BİLKENT ÜNİVERSİTESİ</p>\r\n\r\n<p>İNÖNÜ ÜNİVERSİTESİ</p>\r\n\r\n<p>İSKENDERUN TEKNİK ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL AREL ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL ATLAS ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL AYDIN ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL AYVANSARAY ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL BİLGİ ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL BİLİM ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL ESENYURT ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL GEDİK ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL GELİŞİM ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL KENT ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL KÜLTÜR ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL MEDENİYET ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL MEDİPOL ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL OKAN ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL RUMELİ ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL SABAHATTİN ZAİM ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL ŞEHİR ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL ŞİŞLİ MESLEK</p>\r\n\r\n<p>İSTANBUL TEKNİK ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL TİCARET ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL YENİ YÜZYIL ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTANBUL 29 MAYIS ÜNİVERSİTESİ</p>\r\n\r\n<p>İSTİNYE ÜNİVERSİTESİ</p>\r\n\r\n<p>İZMİR BAKIRÇAY ÜNİVERSİTESİ</p>\r\n\r\n<p>İZMİR DEMOKRASİ ÜNİVERSİTESİ</p>\r\n\r\n<p>İZMİR EKONOMİ ÜNİVERSİTESİ</p>\r\n\r\n<p>İZMİR KATİP ÇELEBİ ÜNİVERSİTESİ</p>\r\n\r\n<p>İZMİR KAVRAM MESLEK</p>\r\n\r\n<p>İZMİR TINAZTEPE ÜNİVERSİTESİ</p>\r\n\r\n<p>İZMİR YÜKSEK TEKNOLOJİ ENSTİTÜSÜ</p>\r\n\r\n<p>KADİR HAS ÜNİVERSİTESİ</p>\r\n\r\n<p>KAFKAS ÜNİVERSİTESİ</p>\r\n\r\n<p>KAHRAMANMARAŞ İSTİKLAL ÜNİVERSİTESİ</p>\r\n\r\n<p>KAHRAMANMARAŞ SÜTÇÜ İMAM ÜNİVERSİTESİ</p>\r\n\r\n<p>KAPADOKYA ÜNİVERSİTESİ</p>\r\n\r\n<p>KARABÜK ÜNİVERSİTESİ</p>\r\n\r\n<p>KARADENİZ TEKNİK ÜNİVERSİTESİ</p>\r\n\r\n<p>KARAMANOĞLU MEHMETBEY ÜNİVERSİTESİ</p>\r\n\r\n<p>KASTAMONU ÜNİVERSİTESİ</p>\r\n\r\n<p>KAYSERİ ÜNİVERSİTESİ</p>\r\n\r\n<p>KIRIKKALE ÜNİVERSİTESİ</p>\r\n\r\n<p>KIRKLARELİ ÜNİVERSİTESİ</p>\r\n\r\n<p>KIRŞEHİR AHİ EVRAN ÜNİVERSİTESİ</p>\r\n\r\n<p>KİLİS 7 ARALIK ÜNİVERSİTESİ</p>\r\n\r\n<p>KOCAELİ ÜNİVERSİTESİ</p>\r\n\r\n<p>KOÇ ÜNİVERSİTESİ</p>\r\n\r\n<p>KONYA GIDA VE TARIM ÜNİVERSİTESİ</p>\r\n\r\n<p>KONYA TEKNİK ÜNİVERSİTESİ</p>\r\n\r\n<p>KTO KARATAY ÜNİVERSİTESİ</p>\r\n\r\n<p>KÜTAHYA DUMLUPINAR ÜNİVERSİTESİ</p>\r\n\r\n<p>KÜTAHYA SAĞLIK BİLİMLERİ ÜNİVERSİTESİ</p>\r\n\r\n<p>LOKMAN HEKİM ÜNİVERSİTESİ</p>\r\n\r\n<p>MALATYA TURGUT ÖZAL ÜNİVERSİTESİ</p>\r\n\r\n<p>MALTEPE ÜNİVERSİTESİ</p>\r\n\r\n<p>MANİSA CELÂL BAYAR ÜNİVERSİTESİ</p>\r\n\r\n<p>MARDİN ARTUKLU ÜNİVERSİTESİ</p>\r\n\r\n<p>MARMARA ÜNİVERSİTESİ</p>\r\n\r\n<p>MEF ÜNİVERSİTESİ</p>\r\n\r\n<p>MERSİN ÜNİVERSİTESİ</p>\r\n\r\n<p>MİMAR SİNAN GÜZEL SANATLAR ÜNİVERSİTESİ</p>\r\n\r\n<p>MUĞLA SITKI KOÇMAN ÜNİVERSİTESİ</p>\r\n\r\n<p>MUNZUR ÜNİVERSİTESİ</p>\r\n\r\n<p>MUŞ ALPARSLAN ÜNİVERSİTESİ</p>\r\n\r\n<p>NECMETTİN ERBAKAN ÜNİVERSİTESİ</p>\r\n\r\n<p>NEVŞEHİR HACI BEKTAŞ VELİ ÜNİVERSİTESİ</p>\r\n\r\n<p>NİĞDE ÖMER HALİSDEMİR</p>\r\n\r\n<p>NİŞANTAŞI ÜNİVERSİTESİ</p>\r\n\r\n<p>NUH NACİ YAZGAN ÜNİVERSİTESİ</p>\r\n\r\n<p>ONDOKUZ MAYIS ÜNİVERSİTESİ</p>\r\n\r\n<p>ORDU ÜNİVERSİTESİ</p>\r\n\r\n<p>ORTA DOĞU TEKNİK ÜNİVERSİTESİ</p>\r\n\r\n<p>OSMANİYE KORKUT ATA ÜNİVERSİTESİ</p>\r\n\r\n<p>OSTİM TEKNİK ÜNİVERSİTESİ</p>\r\n\r\n<p>ÖZYEĞİN ÜNİVERSİTESİ</p>\r\n\r\n<p>PAMUKKALE ÜNİVERSİTESİ</p>\r\n\r\n<p>PİRİ REİS ÜNİVERSİTESİ</p>\r\n\r\n<p>RECEP TAYYİP ERDOĞAN</p>\r\n\r\n<p>SABANCI ÜNİVERSİTESİ</p>\r\n\r\n<p>SAĞLIK BİLİMLERİ ÜNİVERSİTESİ</p>\r\n\r\n<p>SAKARYA UYGULAMALI BİLİMLER ÜNİVERSİTESİ</p>\r\n\r\n<p>SAKARYA ÜNİVERSİTES</p>\r\n\r\n<p>SAMSUN ÜNİVERSİTESİ</p>\r\n\r\n<p>SANKO ÜNİVERSİTESİ</p>\r\n\r\n<p>SELÇUK ÜNİVERSİTESİ</p>\r\n\r\n<p>SEMERKAND BİLİM VE MEDENİYET ÜNİVERSİTESİ</p>\r\n\r\n<p>SİİRT ÜNİVERSİTESİ</p>\r\n\r\n<p>SİNOP ÜNİVERSİTESİ</p>\r\n\r\n<p>SİVAS BİLİM VE TEKNOLOJİ ÜNİVERSİTESİ</p>\r\n\r\n<p>SİVAS CUMHURİYET ÜNİVERSİTESİ</p>\r\n\r\n<p>SÜLEYMAN DEMİREL ÜNİVERSİTESİ</p>\r\n\r\n<p>ŞIRNAK ÜNİVERSİTESİ</p>\r\n\r\n<p>TARSUS ÜNİVERSİTESİ</p>\r\n\r\n<p>TED ÜNİVERSİTESİ</p>\r\n\r\n<p>TEKİRDAĞ NAMIK KEMAL</p>\r\n\r\n<p>TOBB EKONOMİ VE TEKNOLOJİ ÜNİVERSİTESİ</p>\r\n\r\n<p>TOKAT GAZİOSMANPAŞA</p>\r\n\r\n<p>TOROS ÜNİVERSİTESİ</p>\r\n\r\n<p>TRABZON ÜNİVERSİTESİ</p>\r\n\r\n<p>TRAKYA ÜNİVERSİTESİ</p>\r\n\r\n<p>TÜRK HAVA KURUMU ÜNİVERSİTESİ</p>\r\n\r\n<p>TÜRK-ALMAN ÜNİVERSİTESİ</p>\r\n\r\n<p>TÜRKİYE ULUSLARARASI İSLAM, BİLİM VE TEKNOLOJİ ÜNİVERSİTESİ</p>\r\n\r\n<p>TÜRK-JAPON BİLİM VE TEKNOLOJİ ÜNİVERSİTESİ</p>\r\n\r\n<p>UFUK ÜNİVERSİTESİ</p>\r\n\r\n<p>UŞAK ÜNİVERSİTESİ</p>\r\n\r\n<p>ÜSKÜDAR ÜNİVERSİTESİ</p>\r\n\r\n<p>VAN YÜZÜNCÜ YIL ÜNİVERSİTESİ</p>\r\n\r\n<p>YALOVA ÜNİVERSİTES</p>\r\n\r\n<p>YAŞAR ÜNİVERSİTESİ</p>\r\n\r\n<p>YEDİTEPE ÜNİVERSİTESİ</p>\r\n\r\n<p>YILDIZ TEKNİK ÜNİVERSİTESİ</p>\r\n\r\n<p>YOZGAT BOZOK ÜNİVERSİTESİ</p>\r\n\r\n<p>YÜKSEK İHTİSAS ÜNİVERSİTESİ</p>\r\n\r\n<p>ZONGULDAK BÜLENT ECEVİT ÜNİVERSİTESİ</p>\r\n\r\n<p> </p>', '2018-11-16 20:58:36', 3, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `simgeler`
--

CREATE TABLE `simgeler` (
  `simge_id` int(11) NOT NULL,
  `simge` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `simge_baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `simgeler`
--

INSERT INTO `simgeler` (`simge_id`, `simge`, `simge_baslik`) VALUES
(1, '<i class=\"fa fa-info-circle\" aria-hidden=\"true\"></i>', 'Info'),
(2, '<i class=\"fa fa-envelope\" aria-hidden=\"true\"></i>', 'Mesaj Kutusu'),
(3, '<i class=\"fa fa-hashtag\" aria-hidden=\"true\"></i>', 'Hashtag'),
(4, '<i class=\"fa fa-picture-o\" aria-hidden=\"true\"></i>', 'Resim'),
(5, '<i class=\"fa fa-tag\" aria-hidden=\"true\"></i>', 'Etiket'),
(6, '<i class=\"fa fa-film\" aria-hidden=\"true\"></i>', 'Film'),
(7, '<i class=\"fa fa-globe\" aria-hidden=\"true\"></i>', 'Dünya'),
(8, '<i class=\"fa fa-star\" aria-hidden=\"true\"></i>', 'Yıldız'),
(9, '<i class=\"fa fa-music\" aria-hidden=\"true\"></i>', 'Müzik'),
(10, '<i class=\"fa fa-download\" aria-hidden=\"true\"></i>', 'İndir'),
(11, '<i class=\"fa fa-diamond\" aria-hidden=\"true\"></i>', 'Elmas'),
(12, '<i class=\"fa fa-shopping-basket\" aria-hidden=\"true\"></i>', 'Sepet'),
(13, '<i class=\"fa fa-puzzle-piece\" aria-hidden=\"true\"></i>', 'Puzzle'),
(14, '<i class=\"fa fa-gamepad\" aria-hidden=\"true\"></i>', 'GamePad'),
(15, '<i class=\"fa fa-code\" aria-hidden=\"true\"></i>', 'Kod');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `uye_id` int(11) NOT NULL,
  `kadi` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `uye_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `onayDurum` int(11) NOT NULL,
  `uyeRutbe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=COMPACT;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`uye_id`, `kadi`, `sifre`, `eposta`, `uye_tarih`, `onayDurum`, `uyeRutbe`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@univernot.com', '2018-11-17 08:55:12', 1, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `icerikler`
--
ALTER TABLE `icerikler`
  ADD PRIMARY KEY (`icerik_id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `sayfalar`
--
ALTER TABLE `sayfalar`
  ADD PRIMARY KEY (`sayfa_id`);

--
-- Tablo için indeksler `simgeler`
--
ALTER TABLE `simgeler`
  ADD PRIMARY KEY (`simge_id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`uye_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `icerikler`
--
ALTER TABLE `icerikler`
  MODIFY `icerik_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `sayfalar`
--
ALTER TABLE `sayfalar`
  MODIFY `sayfa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `simgeler`
--
ALTER TABLE `simgeler`
  MODIFY `simge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `uye_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
