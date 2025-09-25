<?php
include 'baglanti.php'; // Veritabanı bağlantısını içerir

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isim = mysqli_real_escape_string($baglanti, htmlspecialchars($_POST['isim']));
    $yorum = mysqli_real_escape_string($baglanti, htmlspecialchars($_POST['yorum']));
    $tarih = date('Y-m-d H:i:s'); // Şu anki tarih ve saat

    $sql = "INSERT INTO yorumlar (isim, yorum, tarih) VALUES ('$isim', '$yorum', '$tarih')";

    if (mysqli_query($baglanti, $sql)) {
        echo "<script>alert('Yorumunuz başarıyla eklendi!');</script>";
        echo "<script>window.location.href = 'hakkimizda.php';</script>";
    } else {
        echo "Hata: " . mysqli_error($baglanti);
    }
}

?>
