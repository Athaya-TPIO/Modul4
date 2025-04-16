<?php
include 'db.php';

$data = [['Calon', 'Jumlah Suara']];

$query = "SELECT calon, COUNT(*) as jumlah FROM suara GROUP BY calon ORDER BY calon";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [$row['calon'], (int)$row['jumlah']];
}

header('Content-Type: application/json');
echo json_encode($data);
?>