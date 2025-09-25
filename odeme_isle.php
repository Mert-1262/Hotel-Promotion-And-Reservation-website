<?php
require_once('baglanti.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['make_payment'])) {
    $rezervasyon_id = $_POST['rezervasyon_id'];
    $odeme_tutari = $_POST['odeme_tutari'];
    $odeme_yontemi = $_POST['odeme_yontemi'];

    // Ödemeyi kaydet
    $odeme_sorgusu = "INSERT INTO odemeler (rezervasyon_id, odeme_tutari, odeme_yontemi) VALUES (?, ?, ?)";
    $stmt = $baglanti->prepare($odeme_sorgusu);
    $stmt->bind_param("ids", $rezervasyon_id, $odeme_tutari, $odeme_yontemi);

    if ($stmt->execute()) {
        // Rezervasyon ödeme durumunu güncelle
        $guncelle_sorgu = "UPDATE tbl_rezervasyonlar SET odeme_durumu = 'Tamamlandı' WHERE rezervasyon_id = ?";
        $stmt2 = $baglanti->prepare($guncelle_sorgu);
        $stmt2->bind_param("i", $rezervasyon_id);
        $stmt2->execute();

        echo "<script>alert('Ödeme başarıyla tamamlandı.');</script>";
        echo "<script>window.location.href = 'rezervasyonlarim.php';</script>";
    } else {
        echo "<script>alert('Ödeme sırasında bir hata oluştu.');</script>";
        echo "<script>window.location.href = 'rezervasyonlarim.php';</script>";
    }
    $stmt->close();
    $stmt2->close();
    $baglanti->close();
}
?>
