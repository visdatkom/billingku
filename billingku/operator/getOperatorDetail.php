<?php
include '../koneksi.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan data operator berdasarkan ID
    $stmt = $pdo->prepare("SELECT * FROM operator WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $operator = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($operator) {
        // Jika data ditemukan, kembalikan sebagai JSON
        echo json_encode($operator);
    } else {
        // Jika data tidak ditemukan, kembalikan pesan error
        echo json_encode(['error' => 'Operator not found']);
    }
} else {
    echo json_encode(['error' => 'ID is required']);
}

?>