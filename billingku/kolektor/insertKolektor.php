<?php
// Sertakan file config untuk koneksi database
include '../koneksi.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");



// Ambil data dari request (method POST)
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['tgl_daftar'], $data['nm_user'], $data['nm_lengkap'], $data['email'], $data['password'], $data['status'])) {
    // Ambil data dari inputan
    $tgl_daftar = $data['tgl_daftar'];
    $nm_user = $data['nm_user'];
    $nm_lengkap = $data['nm_lengkap'];
    $email = $data['email'];
    $status = $data['status'];
    $password = password_hash($data['password'], PASSWORD_DEFAULT); // Hash password

    // Siapkan query untuk insert data ke database
    $sql = "INSERT INTO kolektor (tgl_daftar, nm_user, nm_lengkap, email, password, status) VALUES (:tgl_daftar, :nm_user, :nm_lengkap, :email, :password, :status)";
    $stmt = $pdo->prepare($sql);

    // Eksekusi query dengan parameter
    $result = $stmt->execute([
        ':tgl_daftar' => $tgl_daftar,
        ':nm_user' => $nm_user,
        ':nm_lengkap' => $nm_lengkap,
        ':email' => $email, 
        ':status' => $status, 
        ':password' => $password,
    ]);

    if ($result) {
        // Jika berhasil, kirimkan response JSON
        echo json_encode(['status' => 'success', 'message' => 'User registered successfully']);
    } else {
        // Jika gagal, kirimkan response JSON
        echo json_encode(['status' => 'error', 'message' => 'Failed to register user']);
    }
} else {
    // Jika input tidak lengkap, kirimkan response JSON
    echo json_encode(['status' => 'error', 'message' => 'Incomplete input']);
}
?>
