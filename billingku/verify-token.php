<?php
include 'koneksi.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Ganti * dengan domain frontend Anda untuk keamanan yang lebih baik
header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); // Metode yang diizinkan
header('Access-Control-Allow-Headers: Content-Type, Authorization'); // Header yang diizink

// Mendapatkan token dari request
$data = json_decode(file_get_contents('php://input'), true);
$token = $data['token'] ?? null;

if (!$token) {
    echo json_encode(["status" => "error", "message" => "Token tidak ditemukan."]);
    exit;
}

// Daftar tabel untuk memeriksa token
$tables = ['user', 'operator', 'kolektor', 'teknisi'];
$foundUser = false;

// Memeriksa token di setiap tabel
foreach ($tables as $table) {
    $sql = "SELECT * FROM $table WHERE token = :token";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo json_encode(["status" => "valid", "user" => $user]);
        $foundUser = true;
        break; // Berhenti jika pengguna ditemukan
    }
}

if (!$foundUser) {
    echo json_encode(["status" => "invalid"]);
}

$pdo = null; // Menutup koneksi PDO
?>
