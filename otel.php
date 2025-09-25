<?php
session_start();

// Otel ID'sini GET parametresinden al
$otel_id = isset($_GET['otel_id']) ? intval($_GET['otel_id']) : 0;

// Veritabanı bağlantısı
include 'baglanti.php';

// Otel bilgilerini al
$otel_bilgi_sql = "SELECT i.otel_ismi, b.otel_aciklama, b.otel_adres, r.resim_yolu 
                   FROM tbl_otel_isim i 
                   INNER JOIN tbl_otel_bilgi b ON i.otel_id = b.otel_id
                   INNER JOIN tbl_otel_resim r ON i.otel_id = r.otel_id
                   WHERE i.otel_id = ?";
$stmt = $baglanti->prepare($otel_bilgi_sql);
$stmt->bind_param("i", $otel_id);
$stmt->execute();
$result = $stmt->get_result();
$otel_bilgi = $result->fetch_assoc();

// Oda tiplerini al
$oda_tipi_sql = "SELECT oda_tipi_isim FROM tbl_oda_tipi_isim_fiyat WHERE otel_id = ?";
$stmt = $baglanti->prepare($oda_tipi_sql);
$stmt->bind_param("i", $otel_id);
$stmt->execute();
$oda_tipleri_result = $stmt->get_result();
$oda_tipleri = [];
while ($oda_tipi = $oda_tipleri_result->fetch_assoc()) {
    $oda_tipleri[] = $oda_tipi;
}

// Rezervasyon işlemi
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




// Veritabanı bağlantısını kapat
$baglanti->close();
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $otel_bilgi['otel_ismi']; ?> - Otel Bilgileri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            padding: 15px;
            text-align: center;
        }

        header a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            margin: 0 10px;
            padding: 10px 15px;
            background-color: #4CAF50;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        header a:hover {
            background-color: #45a049;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        img {
            max-width: 100%;
            border-radius: 8px;
        }

        form {
            margin-top: 20px;
        }

        form label {
            font-weight: bold;
        }

        form input,
        form select {
            display: block;
            width: 100%;
            margin: 10px 0 20px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #45a049;
        }

        .back-to-home {
            margin: 20px auto;
            text-align: center;
        }

        .back-to-home a {
            text-decoration: none;
            font-size: 18px;
            color: white;
            background-color: #007BFF;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-to-home a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <header>
        <a href="anasayfa.php">Anasayfa</a>
    </header>

    <div class="container">
        <h1><?php echo $otel_bilgi['otel_ismi']; ?></h1>
        <img src="<?php echo $otel_bilgi['resim_yolu']; ?>" alt="Otel Resmi">
        <p><?php echo $otel_bilgi['otel_aciklama']; ?></p>
        <p><strong>Adres:</strong> <?php echo $otel_bilgi['otel_adres']; ?></p>

        <h2>Rezervasyon Yap</h2>

        <?php if (isset($mesaj)) echo "<p style='color: red;'>$mesaj</p>"; ?>

        <form action="" method="post">
            <label for="oda_tipi">Oda Tipi:</label>
            <select name="oda_tipi" id="oda_tipi" required>
                <?php
                if (!empty($oda_tipleri)) {
                    foreach ($oda_tipleri as $oda_tipi) {
                        echo "<option value='{$oda_tipi['oda_tipi_isim']}'>{$oda_tipi['oda_tipi_isim']}</option>";
                    }
                } else {
                    echo "<option value=''>Bu otel için oda tipi bulunamadı</option>";
                }
                ?>
            </select>

            <label for="oda_numarasi">Oda Numarası:</label>
            <input type="number" name="oda_numarasi" id="oda_numarasi" min="1" max="100" required>

           
<div class='reservation-form'>
    <form action='' method='post'>

        
        </select>

        <label for='giris_tarihi'>Giriş Tarihi:</label>
        <input type='date' name='giris_tarihi' id='giris_tarihi' min="<?php echo date('Y-m-d'); ?>" required>

        <label for='cikis_tarihi'>Çıkış Tarihi:</label>
        <input type='date' name='cikis_tarihi' id='cikis_tarihi' min="<?php echo date('Y-m-d'); ?>" required>

        <button type='submit'>Rezervasyon Yap</button>
    </form>
</div>

<script>
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

</script>


</body>

</html>
