<?php
include('../koneksi.php');  // Pastikan untuk menghubungkan dengan database Anda

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Ganti dengan domain frontend Anda
header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); 
header('Access-Control-Allow-Headers: Content-Type, Authorization'); 

// Operator ID yang ingin di-filter, bisa didapat dari input pengguna
$operator_id = $_GET['operator_id'] ?? null;  // Gantilah dengan nilai yang sesuai

if (!$operator_id) {
    echo json_encode(["status" => "error", "message" => "operator_id tidak ditemukan"]);
    http_response_code(400);
    exit();
}

$sql = "SELECT 
        billing.id,
        billing.pelanggan_id,
        billing.operator_id,
        billing.jatuh_tempo, 
        billing.status, 
        billing.terakhir_update,
        pelanggan.nm_user AS nm_pelanggan,
        operator.nm_user AS nm_operator,
        data_paket.nm_paket, 
        data_paket.harga_paket
    FROM billing
    LEFT JOIN pelanggan ON billing.pelanggan_id = pelanggan.id
    LEFT JOIN operator ON billing.operator_id = operator.id
    LEFT JOIN registrasi_paket ON billing.pelanggan_id = registrasi_paket.pelanggan_id AND billing.operator_id = registrasi_paket.operator_id
    LEFT JOIN data_paket ON registrasi_paket.dataPaket_id = data_paket.id
    WHERE billing.operator_id = :operator_id
";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':operator_id', $operator_id);

try {
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Menyimpan hasil dalam array asosiatif
    echo json_encode($result);  // Mengembalikan data dalam format JSON
} catch (PDOException $e) {
    echo json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
}

$conn = null;  // Jangan lupa untuk menutup koneksi
?>
