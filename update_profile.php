<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['ad'] = $_POST['ad'];
    $_SESSION['soyad'] = $_POST['soyad'];
    $_SESSION['telefon'] = $_POST['telefon'];
    $_SESSION['e-posta'] = $_POST['eposta'];
    $_SESSION['adres'] = $_POST['adres'];
    
    header('Location: profil.php');
    exit();
}
?>
