
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hakkımızda</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Genel Stil */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background-image: url('img/sahil.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1, h2, h3 {
            text-align: center;
            color: #333;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            color: #666;
            text-align: justify;
        }

        .highlight {
            color: #4CAF50;
            font-weight: bold;
        }

        /* Buton Stili */
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

        /* Yorum Formu */
        .comment-form {
            margin-top: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .comment-form h3 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .comment-form label {
            font-weight: bold;
            color: #333;
        }

        .comment-form input, .comment-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .comment-form button {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .comment-form button:hover {
            background-color: #45a049;
        }

        /* Yorumlar */
        .comments {
            margin-top: 30px;
        }

        .comments .comment {
            padding: 15px;
            margin-bottom: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .comments h4 {
            margin: 0;
            color: #4CAF50;
        }

        .comments small {
            color: #999;
            font-size: 12px;
        }

        /* Video Alanı */
        .video-container {
            text-align: center;
            margin: 30px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
        }

        .video-container video {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Footer */
        .footer {
            text-align: center;
            background-color: #f9f9f9;
            padding: 20px;
            margin-top: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .footer h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .footer p {
            font-size: 16px;
            color: #666;
            margin: 5px 0;
        }

        .social-icons a {
            text-decoration: none;
            font-size: 24px;
            color: #4CAF50;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #45a049;
        }

      /* Modal Genel Ayarları */
.modal {
    display: none; /* Varsayılan olarak gizli */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5); /* Arka plan karartma */
}

/* Modal İçeriği */
.modal-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #ddd;
    width: 60%;
    max-width: 600px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    text-align: center;
}

/* Başlık */
.modal-content h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

/* Liste Stil */
.hotel-list {
    list-style: none; /* Noktaları kaldır */
    padding: 0;
    margin: 0;
}

.hotel-list li {
    margin: 10px 0;
}

.hotel-list a {
    color: #4CAF50;
    text-decoration: none;
    font-size: 18px;
    font-weight: bold;
    transition: color 0.3s ease, transform 0.3s ease;
}

.hotel-list a:hover {
    color: #45a049;
    transform: scale(1.1); /* Hover efekti */
}

/* Kapat Butonu */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
}




        .hizli-rezervasyon-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 100px;
    height: 100px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 50%;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: transform 0.3s ease, background-color 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 1000;
}


    </style>
</head>

<script>
    function openModal() {
        document.getElementById("hizliRezervasyonModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("hizliRezervasyonModal").style.display = "none";
    }

    window.onclick = function(event) {
        var modal = document.getElementById("hizliRezervasyonModal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


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

    <div class="video-container">
        <h2>Hayalinizdeki Tatil Planı</h2>
        <video controls autoplay muted loop>
            <source src="tanitim.mp4" type="video/mp4">
            Tarayıcınız bu videoyu desteklemiyor.
        </video>
    </div>

    <div class="comment-form">
        <h3>Yorum Ekle</h3>
        <form action="yorum_ekle.php" method="POST">
            <label for="isim">Adınız:</label>
            <input type="text" id="isim" name="isim" required placeholder="Adınızı yazınız">
            <label for="yorum">Yorumunuz:</label>
            <textarea id="yorum" name="yorum" required placeholder="Yorumunuzu yazınız"></textarea>
            <button type="submit">Yorum Gönder</button>
        </form>
    </div>

    <div class="comments">
        <h2>Kullanıcı Yorumları</h2>
        <?php
        include 'baglanti.php';
        $sql = "SELECT * FROM yorumlar ORDER BY tarih DESC";
        $result = mysqli_query($baglanti, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='comment'>";
                echo "<h4>" . htmlspecialchars($row['isim']) . "</h4>";
                echo "<p>" . htmlspecialchars($row['yorum']) . "</p>";
                echo "<small>" . $row['tarih'] . "</small>";
                echo "</div>";
            }
        } else {
            echo "<p>Henüz yorum yapılmamış. İlk yorumu siz yapabilirsiniz!</p>";
        }
        ?>
    </div>

    <div class="footer">
        <h3>BİZE ULAŞIN</h3>
        <p>Email: destek@otelrezervasyon.com</p>
        <p>Telefon: +90 555 555 55 55</p>
        <div class="social-icons">
            <a href="https://www.facebook.com" target="_blank" class="fab fa-facebook"></a>
            <a href="https://www.twitter.com" target="_blank" class="fab fa-twitter"></a>
            <a href="https://www.instagram.com" target="_blank" class="fab fa-instagram"></a>
        </div>
    </div>
</div>
<button class="hizli-rezervasyon-btn" onclick="openModal()">Hızlı Rezervasyon</button>


<div id="hizliRezervasyonModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Hızlı Rezervasyon</h2>
        <ul class="hotel-list">
            <?php
            include_once 'baglanti.php';
            $otel_sql = "SELECT otel_id, otel_ismi FROM tbl_otel_isim";
            $otel_result = mysqli_query($baglanti, $otel_sql);
            if ($otel_result && mysqli_num_rows($otel_result) > 0) {
                while ($otel = mysqli_fetch_assoc($otel_result)) {
                    echo "<li><a href='otel.php?otel_id={$otel['otel_id']}'>{$otel['otel_ismi']}</a></li>";
                }
            } else {
                echo "<li>Mevcut otel bulunamadı.</li>";
            }
            ?>
        </ul>
    </div>
</div>



</body>
</html>




