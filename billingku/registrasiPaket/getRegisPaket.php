<?php
include '../koneksi.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: http://localhost:3000'); // Ganti dengan domain frontend Anda
header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); 
header('Access-Control-Allow-Headers: Content-Type, Authorization'); 

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Ambil parameter operator_id dari request
$operator_id = $_GET['operator_id'] ?? null;

if (!$operator_id) {
    echo json_encode(["status" => "error", "message" => "operator_id tidak ditemukan"]);
    http_response_code(400);
    exit();
}

$sql = "SELECT pelanggan.nm_user AS nm_pelanggan, operator.nm_user AS nm_operator,
               data_paket.nm_paket, data_paket.harga_paket, registrasi_paket.tanggal_registrasi
        FROM registrasi_paket
        JOIN pelanggan ON registrasi_paket.pelanggan_id = pelanggan.id
        JOIN operator ON registrasi_paket.operator_id = operator.id
        JOIN data_paket ON registrasi_paket.dataPaket_id = data_paket.id
        WHERE registrasi_paket.operator_id = :operator_id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':operator_id', $operator_id);
$stmt->execute();

$regisPaket = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($regisPaket) {
    echo json_encode(["status" => "success", "data" => $regisPaket]);
} else {
    echo json_encode(["status" => "error", "message" => "Tidak ada data ditemukan untuk operator ini"]);
}

$pdo = null;
?>
