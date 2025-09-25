<?php
session_start();

include 'baglanti.php';

if (isset($_GET['otel_id'])) {
    $otel_id = $_GET['otel_id'];

    // Otomatik rezervasyon ekleme
    $kullanici_id = $_SESSION["id"]; // Kullanıcının giriş yaptığını varsayıyoruz
    $oda_tipi = "Standart Oda"; // Varsayılan oda tipi
    $oda_numarasi = rand(1, 100); // Rastgele oda numarası
    $giris_tarihi = date("Y-m-d"); // Bugünün tarihi
    $cikis_tarihi = date("Y-m-d", strtotime("+1 day")); // Yarın

    $rezervasyon_sql = "INSERT INTO tbl_rezervasyonlar (otel_id, kullanici_id, oda_tipi, oda_numarasi, giris_tarihi, cikis_tarihi) 
                        VALUES ('$otel_id', '$kullanici_id', '$oda_tipi', '$oda_numarasi', '$giris_tarihi', '$cikis_tarihi')";

    if (mysqli_query($baglanti, $rezervasyon_sql)) {
        echo "<script>alert('Rezervasyon başarıyla yapıldı!'); window.location.href = 'rezervasyonlarım.php';</script>";
    } else {
        echo "<script>alert('Rezervasyon sırasında hata oluştu!'); window.location.href = 'anasayfa.php';</script>";
    }
} else {
    echo "<script>alert('Otel seçilmedi!'); window.location.href = 'anasayfa.php';</script>";
}
if (!isset($_SESSION["id"])) {
    die("Hata: Kullanıcı oturum açmamış. Lütfen giriş yapınız.");
}
if (!isset($_SESSION["id"])) {
    header("Location: giris.php");
    exit();
}

?>


