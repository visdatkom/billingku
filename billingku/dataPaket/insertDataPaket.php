<?php
include '../koneksi.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);

$nm_paket = $data['nm_paket'] ?? null;
$jenis_paket = $data['jenis_paket'] ?? null;
$harga_paket = $data['harga_paket'] ?? null;
$deskripsi = $data['deskripsi'] ?? null;
$operator_id = $data['operator_id'] ?? null;

if (empty($nm_paket) || empty($jenis_paket) || empty($harga_paket) || empty($deskripsi)) {
    echo json_encode(["status" => "error", "message" => "Semua field harus diisi"]);
    exit;
}

try{
    $sql = "INSERT INTO data_paket (nm_paket, jenis_paket, harga_paket, deskripsi, operator_id) 
    VALUES (:nm_paket, :jenis_paket, :harga_paket, :deskripsi, :operator_id)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nm_paket', $nm_paket);
    $stmt->bindParam(':jenis_paket', $jenis_paket);
    $stmt->bindParam(':harga_paket', $harga_paket);
    $stmt->bindParam(':deskripsi', $deskripsi);
    $stmt->bindParam(':operator_id', $operator_id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Pelanggan berhasil ditambahkan"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal menambahkan pelanggan"]);
    }
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}

$pdo = null;

?>