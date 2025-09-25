<?php
include 'baglanti.php';

$haber_id = $_GET['haber_id'];
$query = "SELECT * FROM tbl_haberler WHERE haber_id = $haber_id";
$result = mysqli_query($baglanti, $query);
$haber = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $haber['haber_baslik']; ?></title>
</head>
<body>
    <div class="container">
        <h1><?php echo $haber['haber_baslik']; ?></h1>
        <p><?php echo $haber['haber_tarih']; ?></p>
        <img src="<?php echo $haber['haber_resim']; ?>" alt="Haber Resmi">
        <p><?php echo $haber['haber_icerik']; ?></p>
    </div>
</body>
</html>
