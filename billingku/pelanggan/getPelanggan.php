<?php
include '../koneksi.php'; // Menghubungkan ke database

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: http://localhost:3000'); // Ganti dengan domain frontend Anda
header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); // Pastikan metode yang diizinkan sudah benar
header('Access-Control-Allow-Headers: Content-Type, Authorization'); // Header yang diizinkan

// Menangani permintaan OPTIONS
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Mendapatkan operator_id dari request query
$operator_id = $_GET['operator_id'] ?? null;

if (!$operator_id) {
    echo json_encode(["status" => "error", "message" => "Operator ID harus disertakan"]);
    exit;
}

// SQL query untuk mendapatkan data pelanggan yang diinput oleh operator yang login
$sql = "SELECT * FROM pelanggan WHERE operator_id = :operator_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':operator_id', $operator_id);

// Eksekusi query
$stmt->execute();
$pelanggan = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Jika ada data pelanggan, kirimkan sebagai respons
if ($pelanggan) {
    echo json_encode(["status" => "success", "data" => $pelanggan]);
} else {
    echo json_encode(["status" => "error", "message" => "Tidak ada pelanggan ditemukan untuk operator ini"]);
}

$pdo = null; // Menutup koneksi database
?>
