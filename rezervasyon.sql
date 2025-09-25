-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 05 Ara 2024, 16:49:45
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `rezervasyon`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_kullanicilar`
--

CREATE TABLE `tbl_kullanicilar` (
  `kullanici_id` int(11) NOT NULL,
  `ad` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `e_posta` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(800) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(11) DEFAULT NULL,
  `adres` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tbl_kullanicilar`
--

INSERT INTO `tbl_kullanicilar` (`kullanici_id`, `ad`, `soyad`, `e_posta`, `sifre`, `telefon`, `adres`) VALUES
(4, 'Ömer', 'Demircan', 'omer@gmail.com', '$2y$10$RxAjACJa9leEfd0npPz4fuwlzOYwd1Xi/kZsbJvye1V5YTt4PT/vS', '05554443333', 'Köyceğiz mah. Demeç Sk. No:44/6 Meram/Konya'),
(5, 'Mert', 'İyibiçer', 'mert@gmail.com', '$2y$10$ET9gRl6mQ5EEIGRcC2/zk.QfBEoed900jeRn5YOl4grJK6DQnihQa', '05555555555', 'Köyceğiz mah. Demeç Sk. No:44/6 Meram/Konya'),
(6, 'murat', 'teker', 'mrttkr@gmail.com', '$2y$10$ZpCWoD7rCgy5yGeDAvgbYuLt/Zs9qtQHdQFfhx43qkcsIeRdEz4/m', '05545545454', 'adres mah. cadde cad. sokak sk. no:2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_oda_tipi_isim_fiyat`
--

CREATE TABLE `tbl_oda_tipi_isim_fiyat` (
  `oda_tipi_id` int(11) NOT NULL,
  `otel_id` int(11) NOT NULL,
  `oda_tipi_isim` varchar(500) NOT NULL,
  `oda_tipi_fiyat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tbl_oda_tipi_isim_fiyat`
--

INSERT INTO `tbl_oda_tipi_isim_fiyat` (`oda_tipi_id`, `otel_id`, `oda_tipi_isim`, `oda_tipi_fiyat`) VALUES
(1, 3, 'Ekonomi Odası', 4750),
(2, 3, 'Deniz Manzaralı Junior Suit', 6235),
(3, 3, 'Deniz Manzaralı Standart Oda', 3850),
(4, 2, 'French Bed Oda', 3100),
(5, 2, 'Roof Suit Oda', 4000),
(6, 2, 'Twin Bed Oda', 3200),
(7, 5, 'Dubleks Aile Süiti', 5400),
(8, 5, 'Junior Suit', 5100),
(9, 5, 'Standart Oda', 3600),
(10, 4, 'King Yataklı Delüks Oda', 3120),
(11, 4, 'King Yataklı Misafir Odası', 3350),
(12, 4, 'Queen Aile Odası', 3650),
(13, 1, 'Revolving Loft Room', 6000),
(14, 1, 'Superior Oda', 5200);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_oda_tipi_resim`
--

CREATE TABLE `tbl_oda_tipi_resim` (
  `resim_id` int(11) NOT NULL,
  `otel_id` int(11) NOT NULL,
  `resim_yolu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tbl_oda_tipi_resim`
--

INSERT INTO `tbl_oda_tipi_resim` (`resim_id`, `otel_id`, `resim_yolu`) VALUES
(1, 3, 'muğla_iskelem_otel/economy_room/1.webp'),
(2, 3, 'muğla_iskelem_otel/economy_room/2.webp'),
(3, 3, 'muğla_iskelem_otel/Junior_Suite_with_Sea_View/1.webp'),
(4, 3, 'muğla_iskelem_otel/Junior_Suite_with_Sea_View/2.webp'),
(5, 3, 'muğla_iskelem_otel/Junior_Suite_with_Sea_View/3.webp'),
(6, 3, 'muğla_iskelem_otel/standart_room_with_sea_view/1.webp'),
(7, 3, 'muğla_iskelem_otel/standart_room_with_sea_view/2.webp'),
(8, 1, 'antalya_the_marmara_otel/revolving_loft_room/1.jpg'),
(9, 1, 'antalya_the_marmara_otel/revolving_loft_room/2.webp'),
(10, 1, 'antalya_the_marmara_otel/revolving_loft_room/3.webp'),
(11, 1, 'antalya_the_marmara_otel/superior_oda/1.webp'),
(12, 1, 'antalya_the_marmara_otel/superior_oda/2.webp'),
(13, 1, 'antalya_the_marmara_otel/superior_oda/3.webp'),
(14, 4, 'Istanbul_DoubleTree_by_Hilton/King_Yataklı_Delüks_Oda/1.png'),
(15, 4, 'Istanbul_DoubleTree_by_Hilton/King_Yataklı_Delüks_Oda/2.png'),
(16, 4, 'Istanbul_DoubleTree_by_Hilton/King_Yataklı_Misafir_Odası/1.png'),
(17, 4, 'Istanbul_DoubleTree_by_Hilton/King_Yataklı_Misafir_Odası/2.png'),
(18, 4, 'Istanbul_DoubleTree_by_Hilton/King_Yataklı_Misafir_Odası/3.png'),
(19, 4, 'Istanbul_DoubleTree_by_Hilton/Queen Aile Odası/1.png'),
(20, 4, 'Istanbul_DoubleTree_by_Hilton/Queen Aile Odası/2.png'),
(21, 5, 'Izmir_Royal_Teos _Hotel/dubleks_aile_süiti/1.jpg'),
(22, 5, 'Izmir_Royal_Teos _Hotel/dubleks_aile_süiti/2.jpg'),
(23, 5, 'Izmir_Royal_Teos _Hotel/dubleks_aile_süiti/3.jpeg'),
(24, 5, 'Izmir_Royal_Teos _Hotel/junior_suit/1.jpg'),
(25, 5, 'Izmir_Royal_Teos _Hotel/junior_suit/2.jpg'),
(26, 5, 'Izmir_Royal_Teos _Hotel/junior_suit/3.jpg'),
(27, 5, 'Izmir_Royal_Teos _Hotel/standart_oda/1.jpg'),
(28, 5, 'Izmir_Royal_Teos _Hotel/standart_oda/2.jpg'),
(29, 2, 'mersin_VISTA_BOUTIQUE_HOTEL/FRENCH_BED_ODA/1.png'),
(30, 2, 'mersin_VISTA_BOUTIQUE_HOTEL/FRENCH_BED_ODA/2.png'),
(31, 2, 'mersin_VISTA_BOUTIQUE_HOTEL/ROOF_SUIT_ODA/1.png'),
(32, 2, 'mersin_VISTA_BOUTIQUE_HOTEL/ROOF_SUIT_ODA/2.png'),
(33, 2, 'mersin_VISTA_BOUTIQUE_HOTEL/ROOF_SUIT_ODA/3.png'),
(34, 2, 'mersin_VISTA_BOUTIQUE_HOTEL/TWIN_BED_ODA/1.png'),
(35, 2, 'mersin_VISTA_BOUTIQUE_HOTEL/TWIN_BED_ODA/2.png'),
(36, 2, 'mersin_VISTA_BOUTIQUE_HOTEL/TWIN_BED_ODA/3.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_otel_bilgi`
--

CREATE TABLE `tbl_otel_bilgi` (
  `bilgi_id` int(11) NOT NULL,
  `otel_id` int(11) NOT NULL,
  `otel_adres` varchar(500) NOT NULL,
  `otel_aciklama` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tbl_otel_bilgi`
--

INSERT INTO `tbl_otel_bilgi` (`bilgi_id`, `otel_id`, `otel_adres`, `otel_aciklama`) VALUES
(1, 1, 'SİRİNYALİ MAH. LARA 07160 ANTALYA, TURKEY', 'Akdeniz\'in büyüleyici manzarasına sahip, Türkiye\'nin en sevilen şehirlerinden birinde yer alan The Marmara Antalya, ikonik falezleri üzerindeki muhteşem tesisinde konuklarını ağırlıyor. Dünyanın 360 derece dönen ilk ve tek binasının yer aldığı otelde, günün farklı saatlerinde odalarda farklı bir eşsiz doğa harikasıyla karşılaşmanız mümkün.'),
(2, 2, 'Akdeniz Mah. 39600 Sk. No:16 Mezitli, İçel, Türkiye', 'Önceliğimiz sizsiniz ilkesi ile çıktığımız yolda ; iş amaçlı konaklamalarınız dışında deniz kenarında turizm eğlence amaçlı konaklamalarınız için benzersiz kalite anlayışıyla, sizlere Mersin Mezitli’de hizmet veriyor. Vista Boutique Hotelde özel olarak dizayn edilmiş mekanları ve teknolojik alt yapıyı bir arada bulabilirsiniz.\r\n\r\nVista Boutique Hotel, denize 100 m mesafede olup denizden ve plajdan gün boyu faydalanabilir şık ve özel dizayn edilmiş deniz manzaralı odalarda zengin yiyecek ikramlarımız eşliğinde içeceklerinizi yudumlayarak günün yorgunluğunu üzerinizden atarak dinlenebilirsiniz.'),
(3, 3, 'Akyaka Mahallesi, Atatürk Cad. No:68, 48640 Ula / Muğla', 'Evinizde Hissedin...\r\nHer yanı muhteşem orman ve sonsuz mavi bir koy güzelliği ile sarılı olan otelimiz, müşterilerimizin konforuna ve mutluluklarına odaklanmıştır. Aile huzuruna önem veren hizmet anlayışımız, müşterilerimize \"memnuniyetle\" hizmet ederek, evlerini aratmayacak düzeydedir.'),
(4, 4, 'Beyazıt, Ordu Cd. No:31, 34130 Fatih/İstanbul', 'Otelimiz Haliç’te, İstanbul’un Tarihi Yarımadası’nın merkezinde, denize on dakika mesafededir. Kapalı Çarşı, Sultanahmet Camii, Ayasofya ve Topkapı Sarayı dahil olmak üzere önemli turistik mekanlar, otelimizden 3 kilometre uzaklıktadır ve yakındaki tramvay durağı aracılığıyla kolayca ziyaret edilebilir. Sauna ve fitness merkezimizin keyfini çıkarın.'),
(5, 5, 'Sığacık Mahallesi Akkum Caddesi No:20 35460 Seferihisar, İzmir / Türkiye', 'İzmir\'in güzel tatil beldesi Sığacık\'ta bulunan 90.000 metrekarelik alanı ve 423 odası ile Royal Teos Thermal Resort Clinic & Spa otelimiz, termal su kaynakları ile ünlü bir termal oteldir. Konuklarımıza sadece İzmir\'in güzelliğini değil, aynı zamanda helal, aile dostu, alkolsüz her şey dahil bir tatil sunuyoruz.\r\n\r\nOtelimizde, konuklarımızın dinlendirici bir tatil geçirmesi için her şey düşünülmüştür. Sıcak termal su kaynaklarının yanı sıra, otel içerisinde bulunan  Sağlık Merkezimiz ile misafirlerimize sağlıklı bir tatil deneyimi sunuyoruz.\r\n\r\nOtelimiz, alkolsüz her şey dahil konsepti ile hizmet vermektedir. Konuklarımız, günlük hayatın stresinden uzaklaşarak, sevdikleri ile birlikte rahat ve huzurlu bir tatil geçirebilirler. Ayrıca, lezzetli yemekler eşliğinde, ailenizle keyifli bir deneyim yaşamanızı sağlayacaktır.\r\n\r\nBizimle birlikte konaklamanız için sebepler oldukça fazladır. Termal otelimizin özellikleri, İzmir\'in eşsiz güzelliği, helal otel konseptimiz, aile oteli olmamız ve alkolsüz her şey dahil konseptimiz size sunduğumuz imkanlar arasındadır. Siz de kendinize, sevdiklerinize ve ailenize huzurlu bir tatil deneyimi yaşatmak için otelimizi tercih edebilirsiniz.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_otel_isim`
--

CREATE TABLE `tbl_otel_isim` (
  `otel_id` int(11) NOT NULL,
  `otel_ismi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tbl_otel_isim`
--

INSERT INTO `tbl_otel_isim` (`otel_id`, `otel_ismi`) VALUES
(1, 'Antalya The Marmara Hotel'),
(2, 'Mersin Vista Boutique Hotel'),
(3, 'Muğla İskelem Hotel'),
(4, 'DoubleTree by Hilton Istanbul Umraniye'),
(5, 'Royal Teos Hotel');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_otel_resim`
--

CREATE TABLE `tbl_otel_resim` (
  `resim_id` int(11) NOT NULL,
  `otel_id` int(11) NOT NULL,
  `resim_yolu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tbl_otel_resim`
--

INSERT INTO `tbl_otel_resim` (`resim_id`, `otel_id`, `resim_yolu`) VALUES
(1, 1, 'antalya_the_marmara_otel/1.webp'),
(3, 2, 'mersin_VISTA_BOUTIQUE_HOTEL/1.jpg'),
(6, 3, 'muğla_iskelem_otel/1.jpg'),
(10, 4, 'Istanbul_DoubleTree_by_Hilton/1.png'),
(12, 5, 'Izmir_Royal_Teos _Hotel/1.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_resim`
--

CREATE TABLE `tbl_resim` (
  `resim_id` int(11) NOT NULL,
  `otel_id` int(11) NOT NULL,
  `resim_yolu` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tbl_resim`
--

INSERT INTO `tbl_resim` (`resim_id`, `otel_id`, `resim_yolu`) VALUES
(3, 1, 'antalya_the_marmara_otel/1.webp'),
(4, 1, 'antalya_the_marmara_otel/2.jpg'),
(5, 2, 'mersin_VISTA_BOUTIQUE_HOTEL/1.jpg'),
(6, 2, 'mersin_VISTA_BOUTIQUE_HOTEL/2.jpg'),
(7, 2, 'mersin_VISTA_BOUTIQUE_HOTEL/3.jpg'),
(8, 3, 'muğla_iskelem_otel/1.jpg'),
(9, 3, 'muğla_iskelem_otel/2.webp'),
(10, 3, 'muğla_iskelem_otel/3.webp'),
(11, 3, 'muğla_iskelem_otel/4.webp'),
(14, 4, 'Istanbul_DoubleTree_by_Hilton/1.png'),
(15, 4, 'Istanbul_DoubleTree_by_Hilton/2.png'),
(16, 5, 'Izmir_Royal_Teos _Hotel/1.jpg'),
(17, 5, 'Izmir_Royal_Teos _Hotel/2.jpg'),
(18, 5, 'Izmir_Royal_Teos _Hotel/3.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_rezervasyonlar`
--

CREATE TABLE `tbl_rezervasyonlar` (
  `rezervasyon_id` int(11) NOT NULL,
  `otel_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `oda_tipi` varchar(100) NOT NULL,
  `oda_numarasi` int(11) NOT NULL,
  `rezervasyon_tarihi` date NOT NULL,
  `giris_tarihi` date NOT NULL,
  `cikis_tarihi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tbl_rezervasyonlar`
--

INSERT INTO `tbl_rezervasyonlar` (`rezervasyon_id`, `otel_id`, `kullanici_id`, `oda_tipi`, `oda_numarasi`, `rezervasyon_tarihi`, `giris_tarihi`, `cikis_tarihi`) VALUES
(76, 3, 2, 'Ekonomi Odası', 8, '0000-00-00', '2024-07-19', '2024-07-22'),
(80, 4, 2, 'King Yataklı Delüks Oda', 1, '0000-00-00', '2024-12-16', '2024-12-18'),
(81, 2, 2, 'Roof Suit Oda', 12, '0000-00-00', '2010-08-20', '2011-08-25'),
(82, 5, 2, 'Dubleks Aile Süiti', 34, '0000-00-00', '2002-03-15', '2002-04-17'),
(84, 1, 2, 'Revolving Loft Room', 1, '0000-00-00', '2000-10-10', '2000-10-11'),
(86, 3, 4, 'Deniz Manzaralı Standart Oda', 17, '0000-00-00', '2002-03-15', '2002-03-19'),
(91, 4, 5, 'King Yataklı Delüks Oda', 1, '0000-00-00', '2002-02-20', '2002-02-25'),
(93, 1, 4, 'Revolving Loft Room', 1, '0000-00-00', '2002-02-15', '2002-04-15'),
(96, 3, 4, 'Ekonomi Odası', 1, '0000-00-00', '2002-03-15', '2002-03-16'),
(98, 4, 4, 'King Yataklı Delüks Oda', 10, '0000-00-00', '2024-12-03', '2024-12-06');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL,
  `isim` varchar(100) DEFAULT NULL,
  `yorum` text,
  `tarih` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `isim`, `yorum`, `tarih`) VALUES
(1, 'Selen Yılmaz', 'Çok faydalı bir site.', '2024-11-30 21:30:17'),
(2, 'Ahmet Yılmaz', 'Bu site bana çok faydalı oldu.', '2024-11-30 21:30:38'),
(4, 'Mert Dağcı', 'Uygun oteli bulmamda çok yararlı oldu.', '2024-11-30 22:10:51'),
(6, 'ömer demircan', 'harika site...', '2024-12-01 12:06:54'),
(7, 'Mert iyibiçer', 'tebrikler', '2024-12-03 06:40:28');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tbl_kullanicilar`
--
ALTER TABLE `tbl_kullanicilar`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `tbl_oda_tipi_isim_fiyat`
--
ALTER TABLE `tbl_oda_tipi_isim_fiyat`
  ADD PRIMARY KEY (`oda_tipi_id`),
  ADD KEY `d` (`otel_id`);

--
-- Tablo için indeksler `tbl_oda_tipi_resim`
--
ALTER TABLE `tbl_oda_tipi_resim`
  ADD PRIMARY KEY (`resim_id`),
  ADD KEY `c` (`otel_id`);

--
-- Tablo için indeksler `tbl_otel_bilgi`
--
ALTER TABLE `tbl_otel_bilgi`
  ADD PRIMARY KEY (`bilgi_id`),
  ADD KEY `b` (`otel_id`);

--
-- Tablo için indeksler `tbl_otel_isim`
--
ALTER TABLE `tbl_otel_isim`
  ADD PRIMARY KEY (`otel_id`);

--
-- Tablo için indeksler `tbl_otel_resim`
--
ALTER TABLE `tbl_otel_resim`
  ADD PRIMARY KEY (`resim_id`),
  ADD KEY `a` (`otel_id`);

--
-- Tablo için indeksler `tbl_resim`
--
ALTER TABLE `tbl_resim`
  ADD PRIMARY KEY (`resim_id`),
  ADD KEY `h` (`otel_id`);

--
-- Tablo için indeksler `tbl_rezervasyonlar`
--
ALTER TABLE `tbl_rezervasyonlar`
  ADD PRIMARY KEY (`rezervasyon_id`),
  ADD KEY `ş` (`otel_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tbl_kullanicilar`
--
ALTER TABLE `tbl_kullanicilar`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_oda_tipi_isim_fiyat`
--
ALTER TABLE `tbl_oda_tipi_isim_fiyat`
  MODIFY `oda_tipi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_oda_tipi_resim`
--
ALTER TABLE `tbl_oda_tipi_resim`
  MODIFY `resim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_otel_bilgi`
--
ALTER TABLE `tbl_otel_bilgi`
  MODIFY `bilgi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_otel_isim`
--
ALTER TABLE `tbl_otel_isim`
  MODIFY `otel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_otel_resim`
--
ALTER TABLE `tbl_otel_resim`
  MODIFY `resim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_resim`
--
ALTER TABLE `tbl_resim`
  MODIFY `resim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_rezervasyonlar`
--
ALTER TABLE `tbl_rezervasyonlar`
  MODIFY `rezervasyon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `tbl_oda_tipi_isim_fiyat`
--
ALTER TABLE `tbl_oda_tipi_isim_fiyat`
  ADD CONSTRAINT `d` FOREIGN KEY (`otel_id`) REFERENCES `tbl_otel_isim` (`otel_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Tablo kısıtlamaları `tbl_oda_tipi_resim`
--
ALTER TABLE `tbl_oda_tipi_resim`
  ADD CONSTRAINT `c` FOREIGN KEY (`otel_id`) REFERENCES `tbl_otel_isim` (`otel_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Tablo kısıtlamaları `tbl_otel_bilgi`
--
ALTER TABLE `tbl_otel_bilgi`
  ADD CONSTRAINT `b` FOREIGN KEY (`otel_id`) REFERENCES `tbl_otel_isim` (`otel_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Tablo kısıtlamaları `tbl_otel_resim`
--
ALTER TABLE `tbl_otel_resim`
  ADD CONSTRAINT `a` FOREIGN KEY (`otel_id`) REFERENCES `tbl_otel_isim` (`otel_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Tablo kısıtlamaları `tbl_resim`
--
ALTER TABLE `tbl_resim`
  ADD CONSTRAINT `h` FOREIGN KEY (`otel_id`) REFERENCES `tbl_otel_isim` (`otel_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Tablo kısıtlamaları `tbl_rezervasyonlar`
--
ALTER TABLE `tbl_rezervasyonlar`
  ADD CONSTRAINT `ş` FOREIGN KEY (`otel_id`) REFERENCES `tbl_otel_isim` (`otel_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
