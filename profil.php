<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Ekranı</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #f6f9fc, #e9f7f9);
            margin: 0;
            padding: 0;
        }


        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            flex: 1;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            font-size: 32px;
            margin-bottom: 20px;
            position: relative;
        }

        h1:before {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #4CAF50;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }

        .profile-header .profile-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            /* Yuvarlak yapı */
            margin: 0 auto 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            object-fit: cover;
        }

        .profile-header h2 {
            font-size: 24px;
            color: #333;
            margin-top: 15px;
        }

        .profile-header p {
            font-size: 16px;
            color: #777;
        }

        .profile-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .profile-info p {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin: 10px 0;
        }


        .profile-info p:hover {
            transform: translateX(10px);
            color: #4CAF50;
        }

        .profile-info strong {
            color: #333;
        }

        .update-button {
            display: inline-block;
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .update-button:hover {
            background: linear-gradient(135deg, #45a049, #3e9141);
            transform: scale(1.05);
        }


        /* Pop-up Form */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .popup-content {
            background: linear-gradient(135deg, #ffffff, #f7f7f7);
            border: 2px solid #ddd;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .popup-content button {
            background: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .popup-content button:hover {
            background: #45a049;
        }


        .popup-content .close-popup {
            position: absolute;
            top: 10px;
            right: 10px;
            background: transparent;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #777;
        }

        .popup-content .close-popup:hover {
            color: #333;
        }

        .anasayfa-btn {
            position: fixed;
            /* Butonu sabitler */
            top: 20px;
            /* Üstten uzaklık */
            right: 20px;
            /* Sağdan uzaklık */
            padding: 10px 20px;
            background-color: #4CAF50;
            /* Yeşil renk */
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
            /* Daha koyu yeşil */
            transform: scale(1.05);
            /* Hafif büyütme efekti */
        }

        .footer {
            background: linear-gradient(to right, #4CAF50, #45a049);
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .footer h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #fff;
        }

        .footer p {
            font-size: 16px;
            color: #e0f7ea;
            margin: 5px 0;
        }

        .social-icons a {
            font-size: 24px;
            color: #fff;
            margin: 0 15px;
            transition: transform 0.3s, color 0.3s;
        }

        .social-icons a:hover {
            transform: scale(1.2);
            color: #b2fab4;
        }


        .social-icons a {
            font-size: 28px;
            color: #333;
            margin: 0 15px;
            transition: transform 0.3s, color 0.3s;
        }

        .social-icons a:hover {
            transform: scale(1.2);
            color: #45a049;
        }
    </style>
</head>

<body>
    <button class="anasayfa-btn" onclick="window.location.href='anasayfa.php'">Ana Sayfa</button>
    <div class="container">
        <div class="profile-header">
            <img src="images/profile-icon.png" alt="Profil İkonu" class="profile-icon">
            <h2>Profilim</h2>
            <p>Hoş geldiniz, <?php echo isset($_SESSION['ad']) ? $_SESSION['ad'] : 'Kullanıcı'; ?>!</p>
        </div>
        <div class="profile-info">
            <p><strong>Ad:</strong>
                <?php echo isset($_SESSION['ad']) ? $_SESSION['ad'] : 'Kullanıcı Adı'; ?></p>
            <p><strong>Soyad:</strong>
                <?php echo isset($_SESSION['soyad']) ? $_SESSION['soyad'] : 'Kullanıcı Soyadı'; ?></p>
            <p><strong>Telefon:</strong>
                <?php echo isset($_SESSION['telefon']) ? $_SESSION['telefon'] : 'Kullanıcı Telefonu'; ?></p>
            <p><strong>E-posta:</strong>
                <?php echo isset($_SESSION['e-posta']) ? $_SESSION['e-posta'] : 'Kullanıcı E-posta'; ?></p>
            <p><strong>Adres:</strong>
                <?php echo isset($_SESSION['adres']) ? $_SESSION['adres'] : 'Kullanıcı adresi'; ?></p>

        </div>
        <button class="update-button" onclick="openPopup()">Bilgileri Güncelle</button>
    </div>

    <div class="popup" id="popup">
        <div class="popup-content">
            <button class="close-popup" onclick="closePopup()">&times;</button>
            <h3>Profil Bilgilerini Güncelle</h3>
            <form action="update_profile.php" method="POST">
                <label for="ad">Ad:</label>
                <input type="text" id="ad" name="ad"
                    value="<?php echo isset($_SESSION['ad']) ? $_SESSION['ad'] : ''; ?>" required>
                <label for="soyad">Soyad:</label>
                <input type="text" id="soyad" name="soyad"
                    value="<?php echo isset($_SESSION['soyad']) ? $_SESSION['soyad'] : ''; ?>" required>
                <label for="telefon">Telefon:</label>
                <input type="text" id="telefon" name="telefon"
                    value="<?php echo isset($_SESSION['telefon']) ? $_SESSION['telefon'] : ''; ?>" required>
                <label for="eposta">E-posta:</label>
                <input type="email" id="eposta" name="eposta"
                    value="<?php echo isset($_SESSION['e-posta']) ? $_SESSION['e-posta'] : ''; ?>" required>
                <label for="adres">Adres:</label>
                <input type="text" id="adres" name="adres"
                    value="<?php echo isset($_SESSION['adres']) ? $_SESSION['adres'] : ''; ?>" required>

                <button type="submit">Güncelle</button>
            </form>
        </div>
    </div>

    <div class="footer">
        <h3>Bize Ulaşın</h3>
        <p>Email: destek@otelrezervasyon.com</p>
        <p>Telefon: +90 555 555 55 55</p>
        <div class="social-icons">
            <a href="https://www.facebook.com" target="_blank" class="fab fa-facebook"></a>
            <a href="https://www.twitter.com" target="_blank" class="fab fa-twitter"></a>
            <a href="https://www.instagram.com" target="_blank" class="fab fa-instagram"></a>
        </div>
    </div>

    <script>
        function openPopup() {
            document.getElementById('popup').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
</body>

</html>