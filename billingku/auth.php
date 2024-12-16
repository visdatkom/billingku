    <?php
    include 'koneksi.php';

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *'); // Ganti * dengan domain frontend Anda untuk keamanan yang lebih baik
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); // Metode yang diizinkan
    header('Access-Control-Allow-Headers: Content-Type, Authorization'); // Header yang diizinkan

    // Mendapatkan data dari request
    $data = json_decode(file_get_contents('php://input'), true);
    $email = $data['email'] ?? null; // Menggunakan null coalescing operator untuk menghindari error
    $password = $data['password'] ?? null;

    if (!$email || !$password) {
        echo json_encode(["status" => "error", "message" => "Email dan password harus disertakan."]);
        exit;
    }

    // Mencari user di table user (admin dan superadmin)
    $sql = "SELECT * FROM user WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Memverifikasi password
        if (password_verify($password, $user['password'])) {
            $token = bin2hex(random_bytes(16)); // Token untuk user
            $role = $user['role']; // Ambil role dari database

            // Simpan token di server (opsional: gunakan Redis atau database)
            $updateTokenSql = "UPDATE user SET token = :token WHERE id = :id"; // Pastikan nama tabel dan kolom benar
            $updateTokenStmt = $pdo->prepare($updateTokenSql);
            $updateTokenStmt->bindParam(':token', $token);
            $updateTokenStmt->bindParam(':id', $user['id']);
            $updateTokenStmt->execute();

            echo json_encode([
                "status" => "success",
                "token" => $token,
                "user" => [
                    "id" => $user['id'],
                    "email" => $user['email'],
                    "role" => $role
                ]
            ]);
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid password"]);
        }
    } else {
        // Mencari operator, teknisi, atau kolektor
        $tables = ['operator', 'teknisi', 'kolektor'];
        $foundUser = false;

        foreach ($tables as $table) {
            $sql = "SELECT * FROM $table WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Memverifikasi password
                if (password_verify($password, $user['password'])) {
                    $token = bin2hex(random_bytes(16)); // Token untuk user
                    $role = $table; // Ambil role dari nama tabel

                    // Simpan token di server (opsional: gunakan Redis atau database)
                    $updateTokenSql = "UPDATE $table SET token = :token WHERE id = :id";
                    $updateTokenStmt = $pdo->prepare($updateTokenSql);
                    $updateTokenStmt->bindParam(':token', $token);
                    $updateTokenStmt->bindParam(':id', $user['id']);
                    $updateTokenStmt->execute();

                    echo json_encode([
                        "status" => "success",
                        "token" => $token,
                        "user" => [
                            "id" => $user['id'],
                            // "name" => $user['name'],
                            "email" => $user['email'],
                            "role" => $role
                        ]
                    ]);
                    $foundUser = true;
                    break;
                }
            }
        }

        if (!$foundUser) {
            echo json_encode(["status" => "error", "message" => "User not found"]);
        }
    }

    $pdo = null; // Menutup koneksi PDO
    ?>
