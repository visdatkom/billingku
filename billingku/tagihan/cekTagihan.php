<?php

include '../koneksi.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Ganti dengan domain frontend Anda
header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); 
header('Access-Control-Allow-Headers: Content-Type, Authorization'); 

$pelanggan_id = $_GET['pelanggan_id'] ?? null;

if (!$pelanggan_id) {
    echo json_encode(["status" => "error", "message" => "nomor pelanggan tidak ditemukan"]);
    http_response_code(400);
    exit();
}

$sql = "SELECT 
        billing.pelanggan_id,
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
    WHERE billing.pelanggan_id = :pelanggan_id
";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':pelanggan_id', $pelanggan_id);

try{
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    echo json_encode($result);
} catch(PDOException $e) {
    echo json_encode(['error' => 'Query failed: '. $e->getMessage()]);
}

$conn = null;

?>