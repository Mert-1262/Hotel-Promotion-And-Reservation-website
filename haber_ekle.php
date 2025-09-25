<?php
session_start();

// Şifre kontrolü
if (!isset($_SESSION['giris_yapildi']) || $_SESSION['giris_yapildi'] !== true) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sifre'])) {
        if ($_POST['sifre'] == '12345') { // Şifrenizi buraya yazın
            $_SESSION['giris_yapildi'] = true;
        } else {
            echo "Hatalı şifre!";
        }
    } else {
        ?>
        <form method="POST">
            <label for="sifre">Şifre:</label>
            <input type="password" name="sifre" id="sifre" required>
            <button type="submit">Giriş Yap</button>
        </form>
        <?php
        exit;
    }
}
?>

<?php
include 'baglanti.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $baslik = $_POST['baslik'];
    $icerik = $_POST['icerik'];
    $resim = $_POST['resim'];

    $query = "INSERT INTO tbl_haberler (haber_baslik, haber_icerik, haber_resim) VALUES ('$baslik', '$icerik', '$resim')";
    mysqli_query($baglanti, $query);
    header('Location: haberler.php');
}
$link = $_POST['link'];

$query = "INSERT INTO tbl_haberler (haber_baslik, haber_icerik, haber_resim, haber_link) 
          VALUES ('$baslik', '$icerik', '$resim', '$link')";
mysqli_query($baglanti, $query);
header('Location: haberler.php');

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haber Ekle</title>
</head>
<body>
 <form action="" method="POST">
    <label for="baslik">Başlık:</label><br>
    <input type="text" id="baslik" name="baslik" required><br><br>
    <label for="icerik">İçerik:</label><br>
    <textarea id="icerik" name="icerik" rows="5" required></textarea><br><br>
    <label for="resim">Resim Yolu:</label><br>
    <input type="text" id="resim" name="resim"><br><br>
    <label for="link">Haber Linki:</label><br>
    <input type="text" id="link" name="link" required><br><br>
    <button type="submit">Ekle</button>
</form>

</body>
</html>
