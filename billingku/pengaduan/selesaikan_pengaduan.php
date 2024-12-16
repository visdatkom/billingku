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

    $sql = "UPDATE pengaduan 
            SET status = 'completed', updated_at = NOW()
            WHERE id = ? AND teknisi_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bind_param("ii", $pengaduan_id, $teknisi_id);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        echo json_encode(["message" => "Pengaduan berhasil diselesaikan"]);
    } else {
        echo json_encode(["error" => "Gagal menyelesaikan pengaduan"]);
    }
    $stmt->close();
    $pdo->close();
}
?>
