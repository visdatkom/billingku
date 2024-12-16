<?php

include '../koneksi.php';

// Menambahkan header CORS
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Menangani permintaan preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Memeriksa apakah permintaan menggunakan metode DELETE
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Mengambil ID dari URL
    $url = explode('/', $_SERVER['REQUEST_URI']);
    $operator_id = intval(end($url)); // Mengambil ID terakhir dari URL

    // Memeriksa apakah id valid
    if ($operator_id) {
        // Query untuk menghapus data berdasarkan id
        $sql = "DELETE FROM kolektor WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        
        // Mengikat parameter
        $stmt->bindParam(':id', $operator_id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            echo json_encode(['success' => 'Data operator berhasil dihapus']);
        } else {
            echo json_encode(['error' => 'Gagal menghapus data operator']);
        }
    } else {
        echo json_encode(['error' => 'ID tidak diberikan']);
    }
} else {
    echo json_encode(['error' => 'Hanya metode DELETE yang diperbolehkan']);
}
