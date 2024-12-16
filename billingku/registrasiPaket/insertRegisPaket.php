<?php
include '../koneksi.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Mendapatkan data JSON yang dikirim
$data = json_decode(file_get_contents('php://input'), true);

if(isset($data['operator_id'], $data['dataPaket_id'], $data['pelanggan_id'])) {

    $operator_id = $data['operator_id'];
    $dataPaket_id = $data['dataPaket_id'];
    $pelanggan_id = $data['pelanggan_id'];
    
    // Query untuk menambahkan data ke tabel registrasi_paket
    $sql = "INSERT INTO registrasi_paket (operator_id, dataPaket_id, pelanggan_id)
    VALUES (:operator_id, :dataPaket_id, :pelanggan_id)";

    $stmt = $pdo->prepare($sql);

    // Eksekusi query dengan parameter yang sesuai
    $result = $stmt->execute([
    ':operator_id' => $operator_id,
    ':dataPaket_id' => $dataPaket_id,
    ':pelanggan_id' => $pelanggan_id
    ]);
        

    if ($result) {
        echo json_encode(["status" => "success", "message" => "Registrasi paket pelanggan berhasil ditambahkan"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal menambahkan pelanggan"]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Incomplete input']);
}
?>
