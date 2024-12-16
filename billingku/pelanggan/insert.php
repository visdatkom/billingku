<?php
include '../koneksi.php'; // Menghubungkan ke database

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

$data = json_decode(file_get_contents('php://input'), true);

error_log(print_r($data, true));

$tgl_daftar = $data['tgl_daftar'] ?? null;
$nm_user = $data['nm_user'] ?? null;
$nm_lengkap = $data['nm_lengkap'] ?? null;
$email = $data['email'] ?? null;
$no_telepon = $data['no_telepon'] ?? null;
$alamat = $data['alamat'] ?? null;
$lat = $data['lat'] ?? null;
$lng = $data['lng'] ?? null;
$operator_id = $data['operator_id'] ?? null;
$kolektor_id = $data['kolektor_id'] ?? null;
$status = $data['status'] ?? null;

if (empty($tgl_daftar) || empty($nm_user) || empty($nm_lengkap) || empty($email) || empty($no_telepon) || empty($alamat) || empty($lat) || empty($lng) || empty($operator_id) || empty($kolektor_id || empty($status))) {
    echo json_encode(["status" => "error", "message" => "Semua field harus diisi"]);
    exit;
}

try {
    $sql = "INSERT INTO pelanggan (tgl_daftar, nm_user, nm_lengkap, email, no_telepon, alamat, lat, lng, operator_id, kolektor_id, status) 
            VALUES (:tgl_daftar, :nm_user, :nm_lengkap, :email, :no_telepon, :alamat, :lat, :lng, :operator_id, :kolektor_id, :status)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':tgl_daftar', $tgl_daftar);
    $stmt->bindParam(':nm_user', $nm_user);
    $stmt->bindParam(':nm_lengkap', $nm_lengkap);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':no_telepon', $no_telepon);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':lat', $lat);
    $stmt->bindParam(':lng', $lng);
    $stmt->bindParam(':operator_id', $operator_id);
    $stmt->bindParam(':kolektor_id', $kolektor_id);
    $stmt->bindParam(':status', $status);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Pelanggan berhasil ditambahkan"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal menambahkan pelanggan"]);
    }
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}

$pdo = null; // Menutup koneksi database
?>
