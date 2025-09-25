<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hakkımızda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('sahil.jpg'); /* Görsel dosyasının yolu */
            background-size: cover; /* Arka planı kapla */
            background-attachment: fixed; /* Sabit bir arka plan */
            background-position: center; /* Görseli ortala */
            color: #ffffff; /* Yazı rengini açık renk yap */
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7); /* Şeffaf arka plan */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #4CAF50; /* Daha dikkat çekici bir renk */
            margin-bottom: 20px;
            animation: fadeInDown 1.5s ease-in-out; /* Animasyon eklendi */
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            color: #f9f9f9;
            text-align: justify;
            animation: fadeInUp 1.5s ease-in-out; /* Animasyon eklendi */
        }

        .highlight {
            color: #FFD700; /* Sarı renk (altın tonlarında) */
            font-weight: bold;
        }

        .btn-container {
            text-align: center;
            margin-top: 30px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
}

h2, h3 {
    text-align: center;
    color: #333;
}

.comment {
    margin: 20px 0;
    padding: 15px;
    background-color: #f9f9f9;
    border-left: 4px solid #4CAF50;
    border-radius: 5px;
}

.comment h4 {
    margin: 0 0 10px 0;
    color: #4CAF50;
}

.comment p {
    margin: 0;
    color: #666;
    line-height: 1.5;
}

form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

form label {
    font-weight: bold;
    color: #333;
}

form input, form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

form button {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #45a049;
}


    </style>
</head>
<body>
<div class="container">
    <h1>Hakkımızda</h1>
    <p>
        Hoş geldiniz! <span class="highlight">[Otel Rezervasyon Sitesi]</span>, sizlere en iyi otel rezervasyon deneyimini sunmayı hedefleyen bir platformdur.
        Türkiye'nin dört bir yanındaki en kaliteli otelleri sizin için bir araya getiriyor ve rezervasyon yapmanızı kolaylaştırıyoruz.
    </p>
    <p>
        Misyonumuz, müşterilerimize güvenilir, hızlı ve kolay bir rezervasyon deneyimi sunmaktır. Geniş otel ağımız ve uygun fiyat politikalarımız sayesinde
        tatilinizi planlamak artık çok daha kolay. Sitemizde bulunan <span class="highlight">güvenli ödeme</span> yöntemleri ve 
        kullanıcı dostu arayüz ile her şey elinizin altında.
    </p>
    <p>
        Ekibimiz, müşteri memnuniyetini ön planda tutarak size destek sunmak için buradadır. Tatil, iş gezisi ya da özel günler için
        otel rezervasyonu yaparken aklınıza gelebilecek her soruya çözüm sunuyoruz.
    </p>
    <p>
        Siz de bizimle, hayalinizdeki tatil planını gerçekleştirin!
    </p>

    <div class="btn-container">
        <a href="anasayfa.php" class="btn">Ana Sayfa</a>
    </div>
</div>

<div class="container">
    <h2>Kullanıcı Yorumları</h2>
    <div class="comment">
        <h4>Mehmet Yıldız</h4>
        <p>"Muğla İskelem Otel'de muhteşem bir tatil geçirdim. Hizmet kalitesi harikaydı!"</p>
    </div>
    <div class="comment">
        <h4>Ayşe Kaya</h4>
        <p>"The Marmara Otel'in manzarası tek kelimeyle büyüleyiciydi. Kesinlikle tekrar geleceğim."</p>
    </div>

    <h3>Yorum Ekle</h3>
    <form action="yorum_ekle.php" method="POST">
        <label for="isim">Adınız:</label>
        <input type="text" id="isim" name="isim" required>

        <label for="yorum">Yorumunuz:</label>
        <textarea id="yorum" name="yorum" required></textarea>

        <button type="submit">Yorum Gönder</button>
    </form>
</div>



</body>
</html>
