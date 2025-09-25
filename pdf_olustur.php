<?php
require('C:\AppServ\www\otel\fpdf\fpdf.php'); // FPDF dosyasını dahil et
include 'baglanti.php'; // Veritabanı bağlantısı

// Rezervasyon ID'sini al
if (isset($_GET['id'])) {
    $rezervasyon_id = intval($_GET['id']); // ID'yi güvenlik için tam sayıya çevir

    // Rezervasyon bilgilerini ve otel adını çekmek için sorgu
    $query = "SELECT r.*, o.otel_ismi 
              FROM tbl_rezervasyonlar r 
              INNER JOIN tbl_otel_isim o ON r.otel_id = o.otel_id 
              WHERE r.rezervasyon_id = $rezervasyon_id";
    $result = mysqli_query($baglanti, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $rezervasyon = mysqli_fetch_assoc($result);

        // PDF oluşturma
        class PDF extends FPDF
        {
            // Başlık
            function Header()
            {
                $this->SetFont('Arial', 'B', 14);
                $this->Cell(0, 10, 'Rezervasyon Detaylari', 0, 1, 'C');
                $this->Ln(5);
            }

            // Altbilgi
            function Footer()
            {
                $this->SetY(-15);
                $this->SetFont('Arial', 'I', 8);
                $this->Cell(0, 10, 'Sayfa ' . $this->PageNo(), 0, 0, 'C');
            }
        }

        $pdf = new PDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);

        // PDF İçeriği
        $pdf->Cell(50, 10, 'Otel Adi:', 0, 0);
        $pdf->Cell(100, 10, $rezervasyon['otel_ismi'], 0, 1); // Otel adı tbl_otel_isim'den geliyor
        $pdf->Cell(50, 10, 'Oda Tipi:', 0, 0);
        $pdf->Cell(100, 10, $rezervasyon['oda_tipi'], 0, 1);
        $pdf->Cell(50, 10, 'Oda Numarasi:', 0, 0);
        $pdf->Cell(100, 10, $rezervasyon['oda_numarasi'], 0, 1);
        $pdf->Cell(50, 10, 'Giris Tarihi:', 0, 0);
        $pdf->Cell(100, 10, $rezervasyon['giris_tarihi'], 0, 1);
        $pdf->Cell(50, 10, 'Cikis Tarihi:', 0, 0);
        $pdf->Cell(100, 10, $rezervasyon['cikis_tarihi'], 0, 1);
        $pdf->Cell(50, 10, 'Odeme Durumu:', 0, 0);
        $pdf->Cell(100, 10, $rezervasyon['odeme_durumu'], 0, 1);

        // PDF Çıktısı
        $pdf->Output();
    } else {
        echo "Rezervasyon bulunamadı.";
    }
} else {
    echo "Geçersiz ID.";
}

?>