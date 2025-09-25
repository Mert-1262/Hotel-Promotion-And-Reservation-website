<?php
include 'baglanti.php';

$query = "SELECT * FROM tbl_haberler ORDER BY haber_tarih DESC";
$result = mysqli_query($baglanti, $query);
?>
<?php
// Tatil önerilerini getir
$tatil_query = "SELECT * FROM tbl_tatil_onerileri ORDER BY oner_tarih DESC";
$tatil_result = mysqli_query($baglanti, $tatil_query);
?>


<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haberler</title>
    <style>
        /* Genel Gövde Stili */
        /* Genel Ayarlar */
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        /* Haber ve Tatil Kartları İçin Ortak Stil */
        .card-container {
            margin-left: 0;
            /* Sol hizalama */
            margin-right: 0;
            /* Sağ boşluk kaldırıldı */
        }

        /* Haber Kartları */
        .haber-card,
        .item {
            display: flex;
            flex-direction: row;
            margin-bottom: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .haber-card:hover,
        .item:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .haber-card img,
        .item img {
            width: 200px;
            height: 150px;
            object-fit: cover;
        }

        /* Haber İçeriği */
        .haber-content,
        .item-content {
            padding: 15px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .haber-content h2,
        .item-content h2 {
            font-size: 22px;
            color: #333;
            margin: 0;
            font-weight: 600;
        }

        .haber-content p,
        .item-content p {
            font-size: 14px;
            color: #777;
            margin: 10px 0;
        }

        .haber-content a,
        .item-content a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
            align-self: flex-start;
            margin-top: auto;
            transition: color 0.3s ease;
        }

        .haber-content a:hover,
        .item-content a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
    <style>
        body {
            background-color: #ADD8E6;
            /* Açık Mavi (LightBlue) */
            color: #333;
            /* Yazı rengini koyu gri yap */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>




</head>

<body>
    <div class="container">
        <style>
            h1 {
                text-align: center;
            }
        </style>
        <style>
            h1 {
                text-align: center;
            }
        </style>

        <div id="haberler">
            <h2 style="text-align: center; color: #4CAF50;">HABERLER:</h2>
            <div class="card-container">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="haber-card">
                        <img src="<?php echo $row['haber_resim']; ?>" alt="Haber Resmi">
                        <div class="haber-content">
                            <h2><?php echo $row['haber_baslik']; ?></h2>
                            <p><?php echo substr($row['haber_icerik'], 0, 100) . '...'; ?></p>
                            <a href="<?php echo $row['haber_link']; ?>" target="_blank">Devamını Oku</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div id="tatil-onerileri">
            <h2 style="margin-top: 40px; color: #4CAF50; font-size: 24px; text-align: center;">TATİL ÖNERİLERİ:</h2>
            <div class="tatil-container">
                <?php while ($tatil_row = mysqli_fetch_assoc($tatil_result)) { ?>
                    <div class="item">
                        <img src="<?php echo $tatil_row['oner_resim']; ?>" alt="Tatil Resmi">
                        <div class="item-content">
                            <h2><?php echo $tatil_row['oner_baslik']; ?></h2>
                            <p><?php echo substr($tatil_row['oner_icerik'], 0, 100) . '...'; ?></p>
                            <a href="<?php echo $tatil_row['oner_link']; ?>" target="_blank">Devamını Oku</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>


</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa Butonu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ADD8E6;
            /* Açık Mavi Arka Plan */
            margin: 0;
            padding: 0;
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
    </style>
</head>

<body>
    <button class="anasayfa-btn" onclick="window.location.href='anasayfa.php'">Anasayfa</button>
</body>

</html>