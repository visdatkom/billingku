<?php
// Sertakan file config untuk koneksi database
include '../koneksi.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

// Siapkan query untuk mengambil data dari database
$sql = "SELECT * FROM operator";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Kirimkan hasil query dalam bentuk JSON
echo json_encode($result);
?>
