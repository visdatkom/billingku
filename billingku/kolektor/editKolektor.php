<?php
// Sertakan file config untuk koneksi database
include '../koneksi.php';

// Mengatur header untuk CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

// Mengambil data dari request (method PUT)
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id'], $data['tgl_daftar'], $data['nm_user'], $data['nm_lengkap'], $data['email'], $data['password'], $data['status'])) {
    // Ambil data dari inputan
    $id = intval($data['id']); // ID untuk mengidentifikasi record yang akan diupdate
    $tgl_daftar = $data['tgl_daftar'];
    $nm_user = $data['nm_user'];
    $nm_lengkap = $data['nm_lengkap'];
    $email = $data['email'];
    $status = $data['status'];
    $password = password_hash($data['password'], PASSWORD_DEFAULT); // Hash password

    // Siapkan query untuk update data di database
    $sql = "UPDATE kolektor SET tgl_daftar = :tgl_daftar, nm_user = :nm_user, nm_lengkap = :nm_lengkap, email = :email, password = :password, status = :status WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    // Eksekusi query dengan parameter
    $result = $stmt->execute([
        ':id' => $id,
        ':tgl_daftar' => $tgl_daftar,
        ':nm_user' => $nm_user,
        ':nm_lengkap' => $nm_lengkap,
        ':email' => $email, 
        ':status' => $status, 
        ':password' => $password,
    ]);

    if ($result) {
        // Jika berhasil, kirimkan response JSON
        echo json_encode(['status' => 'success', 'message' => 'User updated successfully']);
    } else {
        // Jika gagal, kirimkan response JSON
        echo json_encode(['status' => 'error', 'message' => 'Failed to update user']);
    }
} else {
    // Jika input tidak lengkap, kirimkan response JSON
    echo json_encode(['status' => 'error', 'message' => 'Incomplete input']);
}
?>
