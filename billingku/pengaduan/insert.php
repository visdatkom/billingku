<?php
require '../koneksi.php'; // Koneksi database

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

$data = json_decode(file_get_contents('php://input'), true);

error_log(print_r($data, true));

$pelanggan_id = $data['pelanggan_id'];
$deskripsi = $data['deskripsi'];

try {
    $sql = "INSERT INTO pengaduan (pelanggan_id, deskripsi, status, teknisi_id, created_at)
            VALUES (:pelanggan_id, :deskripsi, 'pending', NULL, NOW())";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':pelanggan_id', $pelanggan_id);
    $stmt->bindParam(':deskripsi', $deskripsi);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Pengaduan berhasil ditambahkan"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal menambahkan pelanggan"]);
    }
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}

$pdo = null; 
?>
