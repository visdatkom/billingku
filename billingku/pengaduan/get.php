<?php
include '../koneksi.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

try {
    $sql = "SELECT
    pengaduan.id AS pengaduan_id,
    pengaduan.pelanggan_id, 
    pengaduan.created_at,
    pengaduan.status,
    pengaduan.deskripsi,
    pelanggan.nm_user AS nm_pelanggan
    FROM pengaduan 
    LEFT JOIN pelanggan ON pengaduan.pelanggan_id = pelanggan.id;
    ";  
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($result);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}

$pdo = null;
?>