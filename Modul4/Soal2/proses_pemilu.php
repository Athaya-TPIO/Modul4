<?php
include 'db.php';

$nama = htmlspecialchars(trim($_POST['nama']));
$calon = htmlspecialchars($_POST['pilihan']);

$cek = $conn->prepare("SELECT * FROM pemilih WHERE nama = ?");
$cek->bind_param("s", $nama);
$cek->execute();
$result = $cek->get_result();

if ($result->num_rows > 0) {
    echo "❌ Maaf, Anda sudah pernah memilih.";
} else {
    $stmt = $conn->prepare("INSERT INTO pemilih (nama) VALUES (?)");
    $stmt->bind_param("s", $nama);
    $stmt->execute();
    $id_pemilih = $conn->insert_id;

    $stmt2 = $conn->prepare("INSERT INTO suara (id_pemilih, calon) VALUES (?, ?)");
    $stmt2->bind_param("is", $id_pemilih, $calon);
    $stmt2->execute();

    echo "✅ Terima kasih! Suara Anda telah direkam.";
}
?>
