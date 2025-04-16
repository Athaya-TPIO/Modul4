<?php
include 'db.php';

$data = [['Calon', 'Jumlah Suara']];

$query = "SELECT pilihan, COUNT(*) as jumlah FROM survey GROUP BY pilihan ORDER BY pilihan";
$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = [$row['pilihan'], (int)$row['jumlah']];
    }
} else {
    echo json_encode(['error' => 'Query failed: ' . mysqli_error($conn)]);
    exit;
}

header('Content-Type: application/json');
echo json_encode($data);
?>