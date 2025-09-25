<?php

$host="localhost";
$kullanici="root";
$parola="20012001";
$vt="rezervasyon";

$baglanti = mysqli_connect($host, $kullanici, $parola, $vt);
mysqli_set_charset($baglanti, "UTF8");



?>