<?php
session_start();

// Misafir oturumunu başlat veya eski oturumu sıfırla
$_SESSION["misafir"] = true;

// Anasayfaya yönlendir
header("Location: anasayfa.php");
exit();
?>
