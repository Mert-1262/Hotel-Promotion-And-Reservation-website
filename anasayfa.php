<?php session_start(); ?>
<!DOCTYPE html>
<html lang="tr">



<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otel Rezervasyon Sitesi</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eaeaea;
            /* Light Grey */
        }

        header {
            background-color: #333;
            /* Koyu Gri */
            color: #fff;
            padding: 20px 0;
        }

        .container {
            max-width: 100%;
            /* Tüm ekran genişliğini kapla */
            margin: 0;
            /* Varsayılan boşlukları kaldır */
            padding: 0;
            /* Varsayılan iç boşlukları kaldır */
            display: flex;
            justify-content: center;
            /* İçeriği ortala */
        }

        .container h1 {
            font-size: 36px;
            /* Yazı boyutu */
            font-weight: bold;
            /* Kalın yazı */
            text-align: center;
            /* Ortalanmış metin */
            background: linear-gradient(90deg, #ff0000, #ff7300, #f0ff00, #00ff6b, #00dfff, #2f00ff, #8c00ff);
            background-size: 400%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: color-change 5s infinite linear;
            /* Hareketli renk değişimi */
            margin: 20px 0;
            /* Üst ve alt boşluk */
        }

        @keyframes color-change {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }



        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            /* Yatay düzen için flex kullanımı */
            flex-direction: row;
            /* Menüyü yan yana hizalar */
            justify-content: center;
            /* Menüyü yatayda ortalar */
            align-items: center;
            /* Dikeyde hizalar */
            gap: 20px;
            /* Menü öğeleri arasına boşluk bırakır */
        }

        nav ul li {
            position: relative;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            display: flex;
            align-items: center;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        nav ul li a i {
            margin-right: 8px;
            color: #ff9800;
            /* İkon rengi */
            font-size: 18px;
        }

        nav ul li a:hover {
            background-color: #333;
            color: #ff9800;
            transform: scale(1.05);
        }

        nav ul li ul {
            display: none;
            position: absolute;
            top: 100%;
            /* Alt menüyü ana menünün hemen altına yerleştirir */
            left: 0;
            background-color: #1f1f1f;
            padding: 10px;
            border-radius: 5px;
        }

        nav ul li:hover ul {
            display: block;
        }

        nav ul li ul li {
            margin-bottom: 5px;
            /* Alt menüde öğeler arasına boşluk bırakır */
        }

        nav ul li ul li a {
            font-size: 14px;
            color: white;
        }

        nav ul li ul li a:hover {
            color: #ff9800;
        }




        .contact-panel {
            background-color: #666;
            /* Açık gri arka plan */
            padding: 20px;
            text-align: center;
            margin-top: 20px;
            border-top: 2px solid #ddd;
            font-family: Arial, sans-serif;
            color: #333;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
            /* Hafif gölge efekti */
        }

        .contact-panel h2 {
            font-size: 24px;
            color: #333;
            /* Koyu gri */
            margin-bottom: 10px;
        }

        .contact-panel i {
            color: #4CAF50;
            margin-right: 10px;
        }


        .contact-panel p {
            font-size: 18px;
            margin: 5px 0;
        }

        .contact-panel a {
            color: #4CAF50;
            /* Yeşil renk */
            text-decoration: none;
            font-weight: bold;
        }

        .contact-panel a:hover {
            text-decoration: underline;
            color: #45a049;
            /* Daha koyu yeşil */
        }

        .contact-panel em {
            font-style: italic;
            color: #777;
            /* Orta gri */
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 20px;
            transition: color 0.3s;
            padding: 5px 10px;
        }

        nav ul li a:hover {
            color: #4CAF50;
            /* Yeşil renk */
            background-color: #fff;
            /* Beyaz arkaplan */
            border-radius: 5px;
        }


        /* Bölme işaretini stilize et */
        nav ul li a::after {
            /*content: '';*/
            position: absolute;
            width: 2px;
            height: 10px;
            background-color: #fff;
            top: 50%;
            right: -10px;
            transform: translateY(-50%);
        }

        /* Son linkte bölme işaretini gizle */
        nav ul li:last-child a::after {
            display: none;
        }

        nav ul li a:hover {
            color: #ff9800;
            /* Turuncu */
        }



        main {
            padding: 20px;
            text-align: center;
        }

        /*footera kadar yeni*/
        .hotel-section {
            display: flex;
            flex-direction: row;
            /* Resim ve yazıları yan yana hizalayacağız */
            align-items: center;
            /* Dikeyde ortalama */
            justify-content: flex-start;
            /* Soldan hizalama */
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .hotel-section img {
            width: 100%;
            height: auto;
            max-width: 400px;
            /* Resmin genişliği 400px olarak sabitlenmiş */
            border-radius: 10px;
            margin-right: 20px;
            /* Resmin sağında biraz boşluk bırakıyoruz */
        }

        .hotel-section .hotel-info {
            flex: 1;
            /* Sağdaki metnin geri kalan alanı kaplamasını sağlar */
            text-align: left;
            /* Yazıları sola hizala */
        }

        .hotel-section h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .hotel-section p {
            font-size: 16px;
            color: #666;
            margin-bottom: 8px;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 5%;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            /* Transparent Black */
            padding: 10px 0;
            color: #fff;
            text-align: center;
        }

        .user-actions {
            float: right;
            margin-top: -44px;
            margin-right: 30px;
        }

        .user-actions button {
            font-size: 18px;
            background-color: #2196f3;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-left: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .user-actions button:hover {
            background-color: #f57c00;
        }

        .welcome-message {
            font-size: 24px;
            animation: fadeIn 2s ease-in-out;
            /* Animasyon ekleme */
            color: #4CAF50;
            /* Yeşil renk */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }


        .user-actions button[type="submit"] {
            font-size: 18px;
            background-color: #f44336;
            /* Kırmızı */
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-left: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .user-actions button[type="submit"]:hover {
            background-color: #d32f2f;
            /* Koyu kırmızı */
        }

        nav ul li {
            position: relative;
            /* Alt menü için konumlandırma */
        }

        nav ul li ul {
            display: none;
            /* Varsayılan olarak gizle */
            position: absolute;
            top: 100%;
            left: 0;
            background-color: white;
            list-style: none;
            padding: 0;
            margin: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        nav ul li ul li {
            width: 200px;
            /* Alt menü genişliği */
        }

        nav ul li ul li a {
            color: #333;
            padding: 10px;
            display: block;
            text-decoration: none;
        }

        nav ul li:hover ul {
            display: block;
            /* Hover ile alt menüyü göster */
        }


        .search-container {
            display: flex;
            justify-content: center;
            /* Ortada hizalanır */
            margin: 10px 0;
            /* Yukarı ve aşağı boşluk eklenir */
            padding: 10px 0;
        }


        .search-container form {
            display: flex;
            align-items: center;
        }

        .search-container input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            outline: none;
            width: 200px;
            transition: width 0.3s ease;
        }

        .search-container input[type="text"]:focus {
            width: 300px;
            /* Odaklanınca genişlik artar */
        }

        .search-container button {
            padding: 10px 15px;
            font-size: 16px;
            background-color: #4CAF50;
            /* Yeşil buton */
            color: white;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-container button:hover {
            background-color: #45a049;
            /* Daha koyu yeşil */
        }

        .hizli-rezervasyon-btn {
            position: fixed;
            bottom: 20px;
            /* Ekranın altından uzaklığı */
            right: 20px;
            /* Ekranın sağından uzaklığı */
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
            /* Butonun diğer öğelerin üzerinde görünmesi için */
        }


        .hizli-rezervasyon-btn:hover {
            background-color: #45a049;
            transform: scale(1.1);
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }


        .modal-content ul {
            list-style-type: none;
            padding: 0;
        }

        .modal-content ul li {
            margin: 10px 0;
        }

        .modal-content ul li a {
            color: #4CAF50;
            text-decoration: none;
            font-size: 18px;
        }

        .modal-content ul li a:hover {
            text-decoration: underline;
        }

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
            cursor: pointer;
        }

        .faq-section {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .faq-section h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
            font-weight: bold;
        }

        .faq-item {
            margin-bottom: 15px;
            border-bottom: 1px solid #ddd;
        }

        .faq-section {
            width: 100%;
            /* Tam genişlik */
            max-width: none;
            /* Genişlik sınırı olmamasını sağlar */
            margin: 0;
            /* Merkezleme veya boşluk kaldırılır */
            padding: 20px;
            /* İçerik için iç boşluk */
            background: #1a1a1a;
            /* Koyu arka plan */
            color: #f2f2f2;
            /* Yazı rengini açık gri yap */
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            /* Hafif gölge efekti */
            border-radius: 0;
            /* Köşe yuvarlama kaldırılır */
            box-sizing: border-box;
            /* Padding genişliğe dahil edilir */
        }


        .faq-section h2 {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #e0e0e0;
        }

        .faq-item {
            margin-bottom: 10px;
        }

        .faq-question {
            width: 100%;
            background: #333;
            color: #f2f2f2;
            padding: 10px;
            border: none;
            border-radius: 5px;
            text-align: left;
            font-size: 16px;
            cursor: pointer;
            outline: none;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .faq-question:hover {
            background: #444;
            color: #fff;
        }

        .faq-answer {
            display: none;
            padding: 10px;
            background: #252525;
            color: #cfcfcf;
            border-radius: 5px;
            margin-top: 5px;
            font-size: 14px;
            line-height: 1.5;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Kenar Slider */
        .side-slider {
            position: fixed;
            top: 0;
            /* Üstte başlasın */
            left: 0;
            /* Solda başlasın */
            width: 10px;
            /* Başlangıçta ince bir çizgi */
            height: 100%;
            /* Ekranın tamamını kaplasın */
            background-color: #333;
            /* Koyu arka plan */
            border-radius: 0 10px 10px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: width 0.3s ease-in-out;
            z-index: 1000;
            cursor: pointer;
            overflow: hidden;
            /* İçeriğin taşmasını engeller */
        }

        /* Fare ile üzerine gelindiğinde slider açılır */
        .side-slider:hover {
            width: 250px;
            /* Slider tamamen açılır */
        }

        /* Slider içeriği */
        .slider-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 10px;
            /* İçerik hizalaması */
            gap: 10px;
            opacity: 0;
            /* Başlangıçta görünmez */
            transition: opacity 0.3s ease-in-out;
            height: 100%;
            /* İçerik slider yüksekliğine uyum sağlar */
            overflow-y: auto;
            /* Kaydırma çubuğu görünür */
        }

        /* Hover durumunda içerik görünür */
        .side-slider:hover .slider-content {
            opacity: 1;
        }

        /* Görsel ayarları */
        .slider-content img {
            width: 90%;
            /* Görsellerin genişliği slider genişliğine uyum sağlar */
            height: auto;
            /* Görsel oranını korur */
            border-radius: 5px;
            object-fit: cover;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        /* Resim hover efekti */
        .slider-content img:hover {
            transform: scale(1.05);
        }

        /* Slider ikonu */
        .slider-icon {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            font-size: 20px;
            color: #fff;
            z-index: 10;
            pointer-events: none;
        }

        /* Slider başlığı */
        .slider-header {
            position: absolute;
            top: 10px;
            /* Slider'ın üstünde yer alacak */
            left: 50%;
            /* Ortalayarak hizalama */
            transform: translateX(-50%);
            z-index: 1500;
            /* Başlığın görünür olması için yüksek z-index */
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            /* Hafif beyaz arka plan */
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            /* Hafif gölge efekti */
        }

        .slider-header h2 {
            font-size: 24px;
            font-weight: bold;
            color: #4CAF50;
            /* Yeşil renk */
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            /* Hafif gölge */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>

    <script>
        function openModal() {
            document.getElementById("hizliRezervasyonModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("hizliRezervasyonModal").style.display = "none";
        }

        // Modal dışında bir yere tıklayınca kapatma
        window.onclick = function (event) {
            var modal = document.getElementById("hizliRezervasyonModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const questions = document.querySelectorAll(".faq-question");

            questions.forEach((question) => {
                question.addEventListener("click", () => {
                    const answer = question.nextElementSibling;

                    // Cevapları aç/kapat
                    if (answer.style.display === "block") {
                        answer.style.display = "none";
                    } else {
                        answer.style.display = "block";
                    }
                });
            });
        });
    </script>



</head>




<body>
    <header>



        <div class="container">
            <h1>Otel Rezervasyonu Ve Tanıtımı</h1>
            <button class="hizli-rezervasyon-btn" onclick="openModal()">Hızlı Rezervasyon</button>
            <nav>
                <ul>
                    <li>
                        <a href="#"><i class="fa fa-hotel"></i> Anlaşmalı Otellerimiz</a>
                        <ul>
                            <li><a href="iskelem.php"><i class="fa fa-tree"></i> İskelem Otel</a></li>
                            <li><a href="marmara.php"><i class="fa fa-building"></i> The Marmara Otel</a></li>
                            <li><a href="double.php"><i class="fa fa-bed"></i> Double/Tree By Hilton</a></li>
                            <li><a href="vista.php"><i class="fa fa-eye"></i> Vista Boutique</a></li>
                            <li><a href="royal.php"><i class="fa fa-crown"></i> Royal Teos</a></li>
                        </ul>
                    </li>
                    <li><a href="rezervasyonlarım.php"><i class="fa fa-calendar-check"></i> Rezervasyonlarım</a></li>
                    <li><a href="hakkimizda.php"><i class="fa fa-info-circle"></i> Hakkımızda</a></li>
                    <li>
                        <a href="#"><i class="fa fa-blog"></i> Blog</a>
                        <ul>
                            <!-- Blog alt menüsü güncellendi -->
                            <li><a href="haberler.php#haberler"><i class="fa fa-newspaper"></i> Haberler</a></li>
                            <li><a href="haberler.php#tatil-onerileri"><i class="fa fa-umbrella-beach"></i> Tatil
                                    Önerileri</a></li>
                        </ul>
                    </li>
                    <li><a href="profil.php"><i class="fa fa-user"></i> Profilim</a></li>
                </ul>
            </nav>
        </div>




    </header>

    <div id="hizliRezervasyonModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Hızlı Rezervasyon</h2>
            <ul>
                <?php
                include 'baglanti.php'; // Otel bilgilerini alın
                $otel_sql = "SELECT otel_id, otel_ismi FROM tbl_otel_isim";
                $otel_result = mysqli_query($baglanti, $otel_sql);
                if ($otel_result && mysqli_num_rows($otel_result) > 0) {
                    while ($otel = mysqli_fetch_assoc($otel_result)) {
                        // Dinamik olarak otel sayfasına yönlendirme
                        echo "<li><a href='otel.php?otel_id={$otel['otel_id']}'>{$otel['otel_ismi']}</a></li>";
                    }
                } else {
                    echo "<li>Mevcut otel bulunamadı.</li>";
                }
                ?>
            </ul>
        </div>
    </div>




    <?php
    // Örnek olarak, kullanıcı giriş yaptıysa ve ad-soyad bilgileri bulunuyorsa
    $user_fullname = ""; // Kullanıcının ad ve soyadını bu değişkene atayacağız
    if (isset($_SESSION["ad"]) && isset($_SESSION["soyad"])) {
        $ad = ucfirst(strtolower($_SESSION["ad"])); // İlk harfi büyük yapmak için ucfirst kullanıyoruz
        $soyad = ucfirst(strtolower($_SESSION["soyad"])); // İlk harfi büyük yapmak için ucfirst kullanıyoruz
        $user_fullname = $ad . ' ' . $soyad;
    }
    ?>


    </ul>
    </div>
    </div>



    <div class="user-actions">
        <?php if (!empty($user_fullname)) { ?>
            <div>
                <span class="welcome-message">Hoş geldiniz, <?php echo $user_fullname; ?>!</span>
                <form id="logout-form" method="post" action="logout.php" style="display: inline;">
                    <button type="submit">Çıkış Yap</button>
                </form>
            </div>
        <?php } else { ?>
            <!-- jQuery kütüphanesi -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <!-- jQuery ile JavaScript kodları -->
            <script>
                $(document).ready(function () {
                    // Giriş Yap butonuna tıklama işlemi
                    $("#login-btn").click(function () {
                        window.location.href = "giris.php";
                    });

                    // Kayıt Ol butonuna tıklama işlemi
                    $("#register-btn").click(function () {
                        window.location.href = "kayit.php";
                    });



                });
            </script>
            <button id="login-btn" onclick="window.location.href='giris.php'">Giriş Yap</button>
            <button id="register-btn" onclick="window.location.href='kayit.php'">Kayıt Ol</button>
        <?php } ?>
    </div>






    <main>
        <?php
        include 'baglanti.php'; // baglanti.php dosyasını include et
        
        // Otellerin açıklamalarını, isimlerini, resimlerini ve adreslerini getiren sorgu
        $sql = "SELECT b.otel_aciklama, b.otel_adres, i.otel_ismi, r.resim_yolu
        FROM tbl_otel_bilgi b
        INNER JOIN tbl_otel_resim r ON b.otel_id = r.otel_id
        INNER JOIN tbl_otel_isim i ON b.otel_id = i.otel_id";

        $result = mysqli_query($baglanti, $sql); // Bağlantıyı kullanarak sorguyu çalıştır
        
        if ($result) { // Sorgu başarılı bir şekilde çalışırsa devam et
            if (mysqli_num_rows($result) > 0) {
                // Verileri döngü ile al
                while ($row = mysqli_fetch_assoc($result)) {
                    // Her otel için bir HTML section oluştur
                    echo "<section class='hotel-section'>";
                    echo "<div class='hotel-images'>";
                    echo "<img src='" . $row['resim_yolu'] . "' alt='Otel Resmi'>";
                    echo "</div>";
                    echo "<div class='hotel-info'>";
                    echo "<h2>" . $row['otel_ismi'] . "</h2>";
                    echo "<p>" . $row['otel_aciklama'] . "</p>";
                    echo "<p>Adres: " . $row['otel_adres'] . "</p>";
                    echo "</div>";
                    echo "</section>";

                }
            } else {
                echo "Veritabanında otel açıklaması bulunamadı.";
            }
        } else {
            // Sorguda bir hata oluşursa hatayı yazdır
            echo "Sorguda bir hata oluştu: " . mysqli_error($baglanti);
        }


        // Bağlantıyı kapat
        mysqli_close($baglanti);
        ?>
    </main>


    <div class="faq-section">
        <h2>Sıkça Sorulan Sorular</h2>
        <div class="faq-item">
            <button class="faq-question">Ödemesi yapılan rezervasyonun iptali olur mu?</button>
            <div class="faq-answer">
                <p>Ödemesi yapılan rezervasyonların iptali mümkün değildir.</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Rezervasyonumu nasıl yapabilirim?</button>
            <div class="faq-answer">
                <p>Rezervasyon yapmak için giriş yaparak otel ve oda seçimi,giriş ve çıkış tarihi belirledikten sonra
                    hemen rezervasyon yapmanız mümkündür..</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Ödeme yöntemleri nelerdir?</button>
            <div class="faq-answer">
                <p>Ödeme yöntemleri olarak kredi kartı, banka havalesi seçenekleri sunulmaktadır.</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Kayıt olmadan rezervasyon işlemi yapabilir miyim ?</button>
            <div class="faq-answer">
                <p>Hayır,kayıt olmadan rezervasyon işlemi yapılamaz.</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Kredi kartı ile yapılan ödemelerde taksit imkanı var mı ? </button>
            <div class="faq-answer">
                <p>WORD kartlarına 6, ACCES kartlarına 8 taksit imkanı sağlanmaktadır.</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Kayıt olurken bilgimi yanlış girdim ne yapmam gerek ? </button>
            <div class="faq-answer">
                <p>Profilim kısmından yanlış girdiğiniz bilgiyi düzeltebilirsiniz.</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Yapılan rezervasyonda yanımızda götürdüğümüz çocuklar için ek ücret alınır mı ?
            </button>
            <div class="faq-answer">
                <p>Sitemize özel her otelde ücretsiz 1 çocuk(13 yaş sınırı vardır) tatilden yararlanabilir.</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Rezervasyon oluşturdum fakat ödemesini yapmadım ne olur ? </button>
            <div class="faq-answer">
                <p>12 saat içerisinde ödemesi yapılmayan rezervasyon iptal olmaktadır.</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Mevcut fiyatlar kaç kişi için geçerlidir ? </button>
            <div class="faq-answer">
                <p>Sadece kayıt yapan kullanıcı için geçerlidir.Kullanıcı yanında 1 çocuğu da otel fark etmeksizin
                    yanında götürüp otelde girişini sağlayabilir.</p>
            </div>
        </div>
    </div>
    <div class="contact-panel">
        <h2>Bize Ulaşın</h2>
        <p><i class="fas fa-phone-alt"></i> Bizi Arayın: <strong>+90 555 555 55 55</strong></p>
        <p><i class="fas fa-envelope"></i> Mail Hesabı: <a
                href="mailto:mertiyibicer1262@gmail.com">otels_destek@gmail.com</a></p>
        <p><i class="fas fa-fax"></i> Fax: <em>....</em></p>
    </div>
</body>

<div class="side-slider">
    <div class="slider-header">
        <h2>Keşfetmeye Hazır Mısınız?</h2>
        <span class="slider-icon">❯</span> <!-- İnce çizgiye simge -->
        <div class="slider-content">
            <img src="images/slider1.jpg" alt="Slider 1">
            <img src="images/slider2.jpg" alt="Slider 2">
            <img src="images/slider3.jpg" alt="Slider 3">
            <img src="images/slider4.jpg" alt="Slider 4">
            <img src="images/slider5.jpg" alt="Slider 5">

        </div>
    </div>


</html>