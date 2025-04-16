<?php
include 'db.php';

// Validasi input POST
if (!isset($_POST['nama']) || !isset($_POST['pilihan']) || !isset($_POST['usia'])) {
    echo "❌ Error: Data tidak lengkap.";
    exit;
}

$nama = htmlspecialchars(trim($_POST['nama']));
$pilihan = htmlspecialchars($_POST['pilihan']);
$usia = (int)$_POST['usia'];

// Cek apakah pengguna sudah pernah memilih berdasarkan nama DAN usia
$cek = $conn->prepare("SELECT * FROM survey WHERE nama = ? AND usia = ?");
$cek->bind_param("si", $nama, $usia);
$cek->execute();
$result = $cek->get_result();

if ($result->num_rows > 0) {
    echo "❌ Maaf, Anda sudah pernah memilih.";
} else {
    // Simpan data ke tabel survey
    $stmt = $conn->prepare("INSERT INTO survey (nama, usia, pilihan) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $nama, $usia, $pilihan);

    if ($stmt->execute()) {
        echo "✅ Terima kasih! Suara Anda telah direkam.";
    } else {
        echo "❌ Terjadi kesalahan saat menyimpan data: " . $stmt->error;
    }
}
?>