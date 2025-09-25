<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İskelem Otel Resimleri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e0e0e0;
            /* Arka plan rengini değiştir */
        }

        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .title {
            text-align: center;
            font-size: 36px;
            margin-bottom: 50px;
            text-transform: uppercase;
            background: linear-gradient(to right, violet, indigo, blue, green, yellow, orange, red);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 2px;
            position: relative;
        }

        .title::after {
            content: '';
            display: block;
            width: 1300px;
            /* Çizgi genişliği */
            height: 2px;
            /* Çizgi boyunu buradan ayarlayabilirsiniz */
            background-color: black;
            /* Siyah bir çizgi */
            position: absolute;
            bottom: -10px;
            left: calc(100% - 1250px);
            /* Sayfanın tam ortasında çizgiyi yerleştir */
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .image {
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            /* Resimleri ortala */
        }

        .image img {
            max-width: 120%;
            /* Resimlerin maksimum genişliği */
            max-height: 100%;
            /* Resimlerin maksimum yüksekliği */
            height: 250px;
            width: 500px;
            transition: transform 0.3s ease;
        }

        .image:hover img {
            transform: scale(1.1);
        }

        .room-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .room-info {
            margin-bottom: 40px;
        }

        .room-info table {
            width: 100%;
            border-collapse: collapse;
            background-color: #333;
            /* Siyah arka plan */
            color: #fff;
            /* Beyaz yazı */
            font-size: 16px;
            border-radius: 10px;
            /* Köşeleri yuvarlat */
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            /* Gölgelendirme */
        }

        .room-info th,
        .room-info td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #444;
            /* Satır ayırıcı */
        }

        .room-info th {
            background-color: #444;
            /* Başlıklar için koyu gri */
            font-weight: bold;
            text-transform: uppercase;
        }

        .room-info tr:hover {
            background-color: #555;
            /* Hover sırasında arka plan değişimi */
        }

        .room-info table {
            width: 100%;
            border-collapse: collapse;
            background-color: #333;
            /* Siyah arka plan */
            color: #fff;
            /* Beyaz yazı */
            font-size: 16px;
            border-radius: 10px;
            /* Köşeleri yuvarlat */
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            /* Gölgelendirme */
        }

        .room-info th,
        .room-info td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #444;
            /* Satır ayırıcı */
        }

        .room-info th {
            background-color: #444;
            /* Başlıklar için koyu gri */
            font-weight: bold;
            text-transform: uppercase;
        }

        .room-info tr:hover {
            background-color: #555;
            /* Hover sırasında arka plan değişimi */
        }

        /* Form genel tasarımı */
        .reservation-form {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #333;
            /* Arka plan siyah */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            /* Gölgelendirme */
            color: #fff;
            /* Yazılar beyaz */
            font-size: 16px;
        }

        /* Label tasarımı */
        .reservation-form label {
            margin-right: 10px;
            font-weight: bold;
        }

        /* Dropdown ve input tasarımı */
        .reservation-form select,
        .reservation-form input[type="date"] {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #444;
            /* Koyu gri arka plan */
            color: #fff;
            /* Beyaz yazı */
            font-size: 14px;
            width: 150px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .reservation-form select:hover,
        .reservation-form input[type="date"]:hover {
            background-color: #555;
            /* Daha açık gri */
            transform: scale(1.05);
            /* Hafif büyütme */
        }

        .reservation-form select:focus,
        .reservation-form input[type="date"]:focus {
            outline: none;
            background-color: #666;
            /* Daha belirgin odak rengi */
        }

        /* Buton tasarımı */
        .reservation-form button {
            padding: 10px 20px;
            background-color: #ff4500;
            /* Turuncu buton */
            border: none;
            border-radius: 4px;
            color: #fff;
            /* Beyaz yazı */
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .reservation-form button:hover {
            background-color: #ff6347;
            /* Daha açık turuncu */
            transform: scale(1.1);
            /* Hafif büyütme efekti */
        }

        .reservation-form button:active {
            background-color: #ff2e00;
            /* Daha koyu turuncu */
            transform: scale(1);
            /* Eski haline döndür */
        }

        .anasayfa-btn {
            position: fixed;
            /* Butonu sabitler */
            top: 20px;
            /* Üstten uzaklık */
            right: 20px;
            /* Sağdan uzaklık */
            padding: 10px 20px;
            background-color: #4CAF50;
            /* Yeşil renk */
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, transform 0.2s;
        }

        .anasayfa-btn:hover {
            background-color: #45a049;
            /* Daha koyu yeşil */
            transform: scale(1.05);
            /* Hafif büyütme efekti */
        }

        .ozellikler-container {
            margin: 20px 0;
            padding: 20px;
            background: #1a1a1a;
            /* Siyah arka plan */
            color: #fff;
            /* Beyaz yazı */
            border-radius: 10px;
            /* Köşeleri yuvarla */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
            /* Daha belirgin gölge */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .ozellikler-container:hover {
            transform: scale(1.02);
            /* Hafif büyüme efekti */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.6);
            /* Daha yoğun gölge */
        }

        .ozellikler-container h2 {
            font-size: 28px;
            text-align: center;
            color: #ff6347;
            /* Dikkat çeken turuncu ton */
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .ozellikler-listesi {
            list-style: none;
            padding: 0;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* İki sütun düzeni */
            gap: 15px;
        }

        .ozellikler-listesi li {
            font-size: 18px;
            color: #d9d9d9;
            /* Hafif gri yazı */
            display: flex;
            align-items: center;
            background-color: #333;
            /* Koyu gri kutular */
            padding: 12px 15px;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .ozellikler-listesi li:hover {
            background-color: #444;
            /* Daha açık gri */
            transform: translateY(-3px);
            /* Hafif yukarı hareket */
        }

        .ozellikler-listesi li i {
            font-size: 20px;
            margin-right: 10px;
            color: #ff6347;
            /* Turuncu ikon */
        }

        .image-container {
            position: relative;
            text-align: center;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }

        .image-container img {
            width: 100%;
            height: auto;
            display: block;
        }

        .caption {
            background-color: #f7f7f7;
            font-size: 16px;
            color: #333;
            padding: 10px;
            border-top: 1px solid #ccc;
            text-align: center;
        }
    </style>

</head>

<body>
    <button class="anasayfa-btn" onclick="window.location.href='anasayfa.php'">Ana Sayfa</button>

    <div class="container">
        <h1 class="title">İSKELEM HOTEL</h1>
        <div class="ozellikler-container">
            <h2>Öne Çıkan Özellikler</h2>
            <ul class="ozellikler-listesi">
                <li><i class="fa fa-child"></i> 2 Çocuk Ücretsiz</li>
                <li><i class="fa fa-ring"></i> Balayı Konsepti</li>
                <li><i class="fa fa-water"></i> Denize Sıfır</li>
                <li><i class="fa fa-spa"></i> Spa Merkezi</li>
                <li><i class="fa fa-umbrella-beach"></i> Kum Plaj</li>
                <li><i class="fa fa-wheelchair"></i> Tekerlekli Sandalyeye Uygun</li>
            </ul>
        </div>
        <?php
        include 'baglanti.php'; // baglanti.php dosyasını include et
        
        $otel_id = 3;
        $kullanici_id = $_SESSION["id"];
        // Otellerin resimlerini getiren sorgu (otel_id'si 3 olanlar)
        $otel_resim_sql = "SELECT resim_yolu FROM tbl_resim WHERE otel_id = 3";
        $oda_resim_sql = "SELECT resim_yolu FROM tbl_oda_tipi_resim WHERE otel_id = 3";
        $oda_bilgi_sql = "SELECT oda_tipi_isim, oda_tipi_fiyat FROM tbl_oda_tipi_isim_fiyat WHERE otel_id = 3";

        // Otelden resimleri çek
        $otel_resim_result = mysqli_query($baglanti, $otel_resim_sql);
        // Odadan resimleri çek
        $oda_resim_result = mysqli_query($baglanti, $oda_resim_sql);
        // Oda bilgilerini çek
        $oda_bilgi_result = mysqli_query($baglanti, $oda_bilgi_sql);

        if ($otel_resim_result) {
            if (mysqli_num_rows($otel_resim_result) > 0) {
                echo "<h2 class='room-title'>Otel Resimleri</h2>";
                echo "<div class='gallery'>";
                while ($otel_row = mysqli_fetch_assoc($otel_resim_result)) {
                    echo "<div class='image'>";
                    echo "<img src='" . $otel_row['resim_yolu'] . "' alt='Otel Resmi'>";
                    echo "</div>";
                }
                echo "</div>";
            } else {
                echo "<p style='text-align: center;'>Veritabanında otel resmi bulunamadı.</p>";
            }
        } else {
            echo "<p style='text-align: center;'>Otel resimleri sorgusunda bir hata oluştu: " . mysqli_error($baglanti) . "</p>";
        }

        if ($oda_resim_result) {
            if (mysqli_num_rows($oda_resim_result) > 0) {
                echo "<h2 class='room-title'>Oda Tipi Resimleri</h2>";
                echo "<div class='gallery'>";

                // Oda tipi görselleri ve isimlerini manuel olarak eşleştiriyoruz
                $oda_tipleri = [
                    "Ekonomi Odası",
                    "Ekonomi Odası",
                    "Deniz Manzaralı Standart Oda",
                    "Deniz Manzaralı Standart Oda",
                    "Ekonomi Odası",
                    "Deniz Manzaralı Junior Suit",
                    "Deniz Manzaralı Junior Suit"
                ];

                $i = 0; // Görsel sayacını başlat
                while ($oda_row = mysqli_fetch_assoc($oda_resim_result)) {
                    echo "<div class='image-container'>"; // Görsel kapsayıcısı
                    echo "<img src='" . $oda_row['resim_yolu'] . "' alt='" . $oda_tipleri[$i] . "'>"; // Görsel
                    echo "<div class='caption'>" . $oda_tipleri[$i] . "</div>"; // Oda tipi adı
                    echo "</div>";
                    $i++;
                }

                echo "</div>";
            } else {
                echo "<p style='text-align: center;'>Veritabanında oda tipi resmi bulunamadı.</p>";
            }
        } else {
            echo "<p style='text-align: center;'>Oda tipi resimleri sorgusunda bir hata oluştu: " . mysqli_error($baglanti) . "</p>";
        }



        if ($oda_bilgi_result) {
            if (mysqli_num_rows($oda_bilgi_result) > 0) {
                echo "<div class='room-info'>";
                echo "<h2 class='room-title'>Oda Tipleri ve Fiyatları</h2>";
                echo "<table>";
                echo "<tr><th>Oda Tipi</th><th>Fiyat</th></tr>";
                while ($row = mysqli_fetch_assoc($oda_bilgi_result)) {
                    echo "<tr>";
                    echo "<td>{$row['oda_tipi_isim']}</td>";
                    echo "<td>{$row['oda_tipi_fiyat']} TL</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            } else {
                echo "<p style='text-align: center;'>Veritabanında oda bilgisi bulunamadı.</p>";
            }
        } else {
            echo "<p style='text-align: center;'>Oda bilgisi sorgusunda bir hata oluştu: " . mysqli_error($baglanti) . "</p>";
        }



        // Çakışma kontrolü ekle
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $selected_room_type = $_POST['oda'];
            $selected_room_number = $_POST['oda_numarasi'];
            $giris_tarihi = $_POST['giris_tarihi'];
            $cikis_tarihi = $_POST['cikis_tarihi'];

            if (!empty($giris_tarihi) && !empty($cikis_tarihi)) {
                // Geçmiş tarih kontrolü
                if (strtotime($giris_tarihi) < strtotime(date("Y-m-d"))) {
                    echo "<script>alert('Geçmiş bir tarihe rezervasyon yapılamaz!');</script>";
                    die(); // İşlemi durdur
                }

                // Çıkış tarihi, giriş tarihinden büyük olmalı
                if (strtotime($cikis_tarihi) <= strtotime($giris_tarihi)) {
                    echo "<script>alert('Çıkış tarihi, giriş tarihinden büyük olmalıdır!');</script>";
                    die(); // İşlemi durdur
                }

                // Çakışma kontrolü
                $check_conflict_sql = "SELECT * FROM tbl_rezervasyonlar WHERE oda_tipi = '$selected_room_type' AND oda_numarasi = '$selected_room_number' 
                                        AND ((giris_tarihi <= '$cikis_tarihi' AND cikis_tarihi >= '$giris_tarihi'))";
                $conflict_result = mysqli_query($baglanti, $check_conflict_sql);

                if (mysqli_num_rows($conflict_result) > 0) {
                    echo "<script>alert('Bu oda zaten rezerveli. Lütfen başka bir tarih veya oda seçin.');</script>";
                    die(); // İşlemi durdur
                }

                // Tüm kontroller geçti, rezervasyonu ekle
                $rezervasyon_ekle_sql = "INSERT INTO tbl_rezervasyonlar 
                                        (otel_id, kullanici_id, oda_tipi, oda_numarasi, giris_tarihi, cikis_tarihi) 
                                        VALUES ('$otel_id', '$kullanici_id', '$selected_room_type', '$selected_room_number', '$giris_tarihi', '$cikis_tarihi')";
                if (mysqli_query($baglanti, $rezervasyon_ekle_sql)) {
                    echo "<script>alert('Rezervasyon başarıyla yapıldı.');</script>";
                } else {
                    echo "<script>alert('Rezervasyon sırasında bir hata oluştu: " . mysqli_error($baglanti) . "');</script>";
                }
            } else {
                echo "<script>alert('Lütfen giriş ve çıkış tarihlerini doldurun.');</script>";
                die(); // İşlemi durdur
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $giris_tarihi = $_POST['giris_tarihi'];
            $cikis_tarihi = $_POST['cikis_tarihi'];

            // Tarihlerin formatını kontrol et
            if (!empty($giris_tarihi) && !empty($cikis_tarihi)) {
                if (strtotime($giris_tarihi) < strtotime(date("Y-m-d"))) {
                    echo "<script>alert('Geçmiş bir tarihe rezervasyon yapılamaz!');</script>";
                    die(); // İşlemi sonlandır
                } elseif (strtotime($cikis_tarihi) <= strtotime($giris_tarihi)) {
                    echo "<script>alert('Çıkış tarihi, giriş tarihinden büyük olmalıdır!');</script>";
                    die(); // İşlemi sonlandır
                } else {
                    // Tarihler doğruysa rezervasyonu kaydet
                    $rezervasyon_ekle_sql = "INSERT INTO tbl_rezervasyonlar 
                    (otel_id, kullanici_id, oda_tipi, oda_numarasi, giris_tarihi, cikis_tarihi) 
                    VALUES ('$otel_id', '$kullanici_id', '$selected_room_type', '$selected_room_number', '$giris_tarihi', '$cikis_tarihi')";
                    if (mysqli_query($baglanti, $rezervasyon_ekle_sql)) {
                        echo "<p style='text-align: center; color: #009900;'>Rezervasyon başarıyla yapıldı.</p>";
                    } else {
                        echo "<p style='text-align: center;'>Rezervasyon sırasında bir hata oluştu: " . mysqli_error($baglanti) . "</p>";
                    }
                }
            }
        }


        // Bağlantıyı kapat
        mysqli_close($baglanti);
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("form").submit(function (event) {
                if (!<?php echo isset($_SESSION['giris_yapildi']) ? 'true' : 'false'; ?>) {
                    event.preventDefault();
                    window.location.href = "giris.php";
                }
            });
        });
    </script>

</body>
<div class='reservation-form'>
    <form action='' method='post'>

        <label for='oda'>Oda Tipi Seçin:</label>
        <select name='oda' id='oda'>
            <?php
            mysqli_data_seek($oda_bilgi_result, 0);
            while ($row = mysqli_fetch_assoc($oda_bilgi_result)) {
                echo "<option value='{$row['oda_tipi_isim']}'>{$row['oda_tipi_isim']}</option>";
            }
            ?>
        </select>

        <label for='oda_numarasi'>Oda Numarası Seçin:</label>
        <select name='oda_numarasi' id='oda_numarasi'>
            <?php
            for ($i = 1; $i <= 100; $i++) {
                echo "<option value='{$i}'>{$i}</option>";
            }
            ?>
        </select>

        <label for='giris_tarihi'>Giriş Tarihi:</label>
        <input type='date' name='giris_tarihi' id='giris_tarihi' min="<?php echo date('Y-m-d'); ?>" required>

        <label for='cikis_tarihi'>Çıkış Tarihi:</label>
        <input type='date' name='cikis_tarihi' id='cikis_tarihi' min="<?php echo date('Y-m-d'); ?>" required>

        <button type='submit'>Rezervasyon Yap</button>
    </form>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const today = new Date();

        const girisPicker = flatpickr("#giris_tarihi", {
            dateFormat: "Y-m-d",
            minDate: today,
            onChange: function (selectedDates, dateStr) {
                cikisPicker.set("minDate", dateStr); // Çıkış tarihinin minDate'i ayarlanıyor
            },
        });

        const cikisPicker = flatpickr("#cikis_tarihi", {
            dateFormat: "Y-m-d",
            minDate: today,
            onChange: function (selectedDates, dateStr) {
                const girisTarihi = document.getElementById("giris_tarihi").value;
                if (girisTarihi && new Date(dateStr) <= new Date(girisTarihi)) {
                    alert("Çıkış tarihi, giriş tarihinden büyük olmalıdır!");
                    document.getElementById("cikis_tarihi").value = ""; // Hatalı tarihi temizle
                }
            },
        });
    });

<label for="giris_tarihi">Giriş Tarihi:</label>
<input type="text" id="giris_tarihi" name="giris_tarihi" required>

<label for="cikis_tarihi">Çıkış Tarihi:</label>
<input type="text" id="cikis_tarihi" name="cikis_tarihi" required>


</script>



</html>