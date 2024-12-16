<?php
require '../koneksi.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Ganti dengan domain frontend Anda
header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); 
header('Access-Control-Allow-Headers: Content-Type, Authorization'); 

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    $pengaduan_id = $_PUT['pengaduan_id'];
    $teknisi_id = $_PUT['teknisi_id'];

    // Hanya bisa diambil jika status 'pending' atau 'failed'
    $sql = "UPDATE pengaduan 
            SET teknisi_id = ?, status = 'assigned'
            WHERE id = ? AND (status = 'pending' OR status = 'failed')";
    $stmt = $pdo->prepare($sql);
    $stmt->bind_param("ii", $teknisi_id, $pengaduan_id);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        echo json_encode(["message" => "Pengaduan berhasil diambil"]);
    } else {
        echo json_encode(["error" => "Pengaduan tidak dapat diambil"]);
    }
    $stmt->close();
    $pdo->close();
}
?>
