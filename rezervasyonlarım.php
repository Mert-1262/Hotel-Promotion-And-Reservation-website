<?php
include 'baglanti.php';
session_start();
$kullanici_id = $_SESSION["id"];
// Kullanıcının yaptığı rezervasyonları çekmek için sorgu
$rezervasyonlar_sql = "SELECT r.rezervasyon_id, i.otel_ismi, r.oda_tipi, r.oda_numarasi, r.giris_tarihi, r.cikis_tarihi, r.odeme_durumu
                       FROM tbl_rezervasyonlar r
                       INNER JOIN tbl_otel_isim i ON r.otel_id = i.otel_id
                       WHERE r.kullanici_id = $kullanici_id";


// Rezervasyonları getir
$rezervasyonlar_result = mysqli_query($baglanti, $rezervasyonlar_sql);

// Rezervasyonu iptal etmek için form gönderildiğinde
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancel_reservation'])) {
    $rezervasyon_id = $_POST['rezervasyon_id'];

    // Rezervasyonu veritabanından sil
    $silme_sorgusu = "DELETE FROM tbl_rezervasyonlar WHERE rezervasyon_id = $rezervasyon_id";
    if (mysqli_query($baglanti, $silme_sorgusu)) {
        // Başarıyla silindiğine dair mesaj göster
        echo "<script>alert('Rezervasyon başarıyla iptal edildi.');</script>";
        // Sayfayı yenile
        echo "<script>window.location.href = 'anasayfa.php';</script>";
    } else {
        // Silinemediğine dair hata mesajı göster
        echo "<script>alert('Rezervasyon iptal edilemedi.');</script>";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['make_payment'])) {
    $rezervasyon_id = $_POST['rezervasyon_id'];
    $odeme_yontemi = $_POST['odeme_yontemi'];
    $odeme_tutari = $_POST['odeme_tutari'];

    // Ödeme işlemi
    $odeme_sorgusu = "INSERT INTO odemeler (rezervasyon_id, odeme_tutari, odeme_yontemi)
                      VALUES ('$rezervasyon_id', '$odeme_tutari', '$odeme_yontemi')";

    if (mysqli_query($baglanti, $odeme_sorgusu)) {
        $odeme_durum_guncelleme = "UPDATE tbl_rezervasyonlar SET odeme_durumu = 'Ödendi' WHERE rezervasyon_id = $rezervasyon_id";
        mysqli_query($baglanti, $odeme_durum_guncelleme);

        // Ödeme işlemi başarılı, mesaj için oturuma kayıt
        $_SESSION['odeme_mesaji'] = 'Ödeme başarıyla tamamlandı.';

        // Anasayfaya yönlendir
        header('Location: anasayfa.php');
        exit;
    } else {
        echo "<script>alert('Ödeme işlemi başarısız.');</script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervasyonlarım</title>
    <style>
        body {
            background-color: #000;
            /* Tüm arka planı siyah yapar */
            color: #fff;
            /* Metin rengini beyaz yapar */
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #222;
            /* İçerik kutusunu koyu gri yapar */
            color: #fff;
            /* İçerik kutusundaki metin rengini beyaz yapar */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
            /* Hafif bir beyaz gölge ekler */
        }

        h2 {
            text-align: center;
        }

        table {
            background-color: #333;
            /* Tablo arka planını koyu gri yapar */
            color: #fff;
            /* Tablo metin rengini beyaz yapar */
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #555;
            /* Tablo kenarlarına daha koyu bir renk ekler */
        }

        th {
            background-color: #444;
            /* Başlıkların arka planını koyu yapar */
            font-weight: bold;
        }

        .no-reservations {
            text-align: center;
            margin-top: 20px;
        }

        .cancel-form {
            display: inline-block;
        }

        .cancel-button {
            background-color: #ff4444;
            /* İptal Et butonunu kırmızı bırakır */
            color: #fff;
            /* Buton metin rengini beyaz yapar */
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        .cancel-button:hover {
            background-color: #ff0000;
            /* Üzerine gelindiğinde daha parlak kırmızı yapar */
        }

        .anasayfa-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
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
            transform: scale(1.05);
        }


        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <button class="anasayfa-btn" onclick="window.location.href='anasayfa.php'">Ana Sayfa</button>

    <div class="container">
        <h2>Rezervasyonlarım</h2>
        <?php if ($rezervasyonlar_result && mysqli_num_rows($rezervasyonlar_result) > 0): ?>
            <table>
                <tr>
                    <th>Otel İsmi</th>
                    <th>Oda Tipi</th>
                    <th>Oda Numarası</th>
                    <th>Giriş Tarihi</th>
                    <th>Çıkış Tarihi</th>
                    <th>Fiyat (TL)</th> <!-- Fiyat sütunu eklendi -->
                    <th>Ödeme Durumu</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($rezervasyonlar_result)):
                    // Oda fiyatını almak için SQL sorgusu
                    $oda_fiyat_sql = "SELECT oda_tipi_fiyat FROM tbl_oda_tipi_isim_fiyat 
                                      WHERE oda_tipi_isim = '{$row['oda_tipi']}'";
                    $oda_fiyat_result = mysqli_query($baglanti, $oda_fiyat_sql);
                    $oda_fiyat_row = mysqli_fetch_assoc($oda_fiyat_result);
                    $oda_fiyat = $oda_fiyat_row ? $oda_fiyat_row['oda_tipi_fiyat'] : 0;

                    // Rezervasyon süresi
                    $giris_tarihi = strtotime($row['giris_tarihi']);
                    $cikis_tarihi = strtotime($row['cikis_tarihi']);
                    $gun_sayisi = ($cikis_tarihi - $giris_tarihi) / (60 * 60 * 24); // Gün sayısını hesapla
            
                    // Toplam fiyat
                    $toplam_fiyat = $oda_fiyat * $gun_sayisi;
                    ?>
                    <tr>
                        <td><?php echo $row['otel_ismi']; ?></td>
                        <td><?php echo $row['oda_tipi']; ?></td>
                        <td><?php echo $row['oda_numarasi']; ?></td>
                        <td><?php echo $row['giris_tarihi']; ?></td>
                        <td><?php echo $row['cikis_tarihi']; ?></td>
                        <td><?php echo $toplam_fiyat . ' TL'; ?></td> <!-- Toplam fiyat gösteriliyor -->
                        <td><?php echo $row['odeme_durumu'] ?? 'Bekliyor'; ?></td>
                        <td>
                            <!-- PDF İndir butonu -->
                            <a href="pdf_olustur.php?id=<?php echo $row['rezervasyon_id']; ?>" class="btn btn-pdf">
                                <i class="fa fa-file-pdf-o"></i> PDF İndir
                            </a>
                        </td>
                        <td>
                            <form class="cancel-form" action="" method="post">
                                <input type="hidden" name="rezervasyon_id" value="<?php echo $row['rezervasyon_id']; ?>">
                                <button class="cancel-button" type="submit" name="cancel_reservation">İptal Et</button>
                            </form>
                            <?php if ($row['odeme_durumu'] === 'Bekliyor'): ?>
                                <form action="odeme_isle.php" method="POST">
                                    <input type="hidden" name="rezervasyon_id" value="<?php echo $row['rezervasyon_id']; ?>">
                                    <input type="hidden" name="odeme_tutari" value="<?php echo $toplam_fiyat; ?>">
                                    <label for="odeme_yontemi">Ödeme Yöntemi:</label>
                                    <select name="odeme_yontemi" required>
                                        <option value="Kredi Kartı">Kredi Kartı</option>
                                        <option value="Banka Havalesi">Banka Havalesi</option>
                                    </select>
                                    <button class="pay-button" type="submit" name="make_payment">Öde</button>
                                </form>
                            <?php endif; ?>
                        </td>

                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p class="no-reservations">Henüz rezervasyon yapmamışsınız.</p>
        <?php endif; ?>
    </div>
</body>

</html>