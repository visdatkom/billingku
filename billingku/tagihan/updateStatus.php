<?php
// updateStatuses.php

include '../koneksi.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

try {
    // Mendapatkan data JSON dari permintaan
    $data = json_decode(file_get_contents("php://input"), true);
    if (!is_array($data)) {
        echo json_encode(["error" => "Invalid data format"]);
        exit;
    }

    $sql = "UPDATE billing SET status = :status, terakhir_update = NOW() WHERE pelanggan_id = :pelanggan_id";
    $stmt = $pdo->prepare($sql);

    // Mulai transaksi
    $pdo->beginTransaction();

    foreach ($data as $update) {
        $stmt->execute([
            ':status' => $update['status'],
            ':pelanggan_id' => $update['pelanggan_id']
        ]);
    }

    // Commit transaksi jika semua pembaruan berhasil
    $pdo->commit();

    echo json_encode(["success" => "Statuses updated successfully"]);

} catch (PDOException $e) {
    $pdo->rollBack(); // Batalkan transaksi jika ada error
    echo json_encode(["error" => "Database error: " . $e->getMessage()]);
}
?>
