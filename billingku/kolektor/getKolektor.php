<?php
// Sertakan file config untuk koneksi database
include '../koneksi.php';

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

// Siapkan query untuk mengambil data dari database
$sql = "SELECT * FROM kolektor";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Debug: Cek hasil query
if (empty($result)) {
    echo json_encode(['error' => 'No data found']);
} else {
    echo json_encode($result);
}

?>