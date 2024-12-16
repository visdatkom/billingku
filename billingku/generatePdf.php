<?php
// Matikan output buffering
ob_clean();

// Set error reporting
error_reporting(E_ALL);
ini_set('display_errors', 0);

require 'vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

// Enable CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Accept');

// Handle preflight request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Pastikan tidak ada output sebelum headers
if (headers_sent($filename, $linenum)) {
    error_log("Headers already sent in $filename on line $linenum");
    http_response_code(500);
    exit('Internal Server Error');
}

// Koneksi ke database
try {
    include('koneksi.php');
} catch (Exception $e) {
    error_log("Database connection error: " . $e->getMessage());
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}

// Parameter yang dikirim dari frontend
$pelanggan_id = $_GET['pelanggan_id'] ?? null;

if (!$pelanggan_id) {
    http_response_code(400);
    header('Content-Type: application/json');
    echo json_encode(["status" => "error", "message" => "pelanggan_id tidak ditemukan"]);
    exit();
}

try {
    // Query untuk mendapatkan data billing
    $sql = "SELECT 
            billing.id,
            pelanggan.nm_user AS nm_pelanggan,
            -- kolektor.nm_user AS nm_kolektor,
            pelanggan.alamat,
            pelanggan.no_telepon,
            billing.jatuh_tempo,
            data_paket.harga_paket,
            billing.status
        FROM billing
        LEFT JOIN pelanggan ON billing.pelanggan_id = pelanggan.id
        -- LEFT JOIN kolektor ON billing.kolektor_id = kolektor.id
        LEFT JOIN data_paket ON billing.operator_id = data_paket.id
        WHERE billing.pelanggan_id = :pelanggan_id";
        
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':pelanggan_id', $pelanggan_id);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$data) {
        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode(["status" => "error", "message" => "Data tidak ditemukan"]);
        exit();
    }

    // Konfigurasi DomPDF
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);
    $options->set('defaultFont', 'Arial');
    $options->set('isFontSubsettingEnabled', true);
    $options->set('defaultMediaType', 'print');
    $options->set('debugKeepTemp', false);
    $options->set('debugCss', false);
    $options->set('debugLayout', false);

    // Inisialisasi DomPDF
    $dompdf = new Dompdf($options);

    // HTML content
    $html = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Kwitansi Pembayaran</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
            }
            .header {
                text-align: center;
                margin-bottom: 30px;
            }
            .header h2 {
                margin: 0;
                padding: 0;
                font-size: 18px;
            }
            .header p {
                margin: 5px 0;
                font-size: 14px;
            }
            .content {
                margin-bottom: 30px;
            }
            .info-row {
                margin: 10px 0;
            }
            .label {
                width: 150px;
                display: inline-block;
                font-size: 12px;
            }
            .value {
                font-size: 12px;
            }
            .footer {
                margin-top: 50px;
                font-size: 12px;
            }
            .warning {
                margin-top: 20px;
                font-style: italic;
                font-size: 12px;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <h2>KWITANSI PEMBAYARAN PELANGGAN</h2>
            <p>PT. TV KABEL</p>
            <p>MGDEV TV KABEL</p>
            <p>Jln. Sisingamangaraja No. 1, Palu</p>
        </div>

        <div class="content">
            <div class="info-row">
                <span class="label">No. Pelanggan:</span>
                <span class="value">' . htmlspecialchars($data['id']) . '</span>
            </div>
            <div class="info-row">
                <span class="label">Nama Pelanggan:</span>
                <span class="value">' . htmlspecialchars($data['nm_pelanggan']) . '</span>
            </div>
            <div class="info-row">
                <span class="label">Alamat:</span>
                <span class="value">' . htmlspecialchars($data['alamat']) . '</span>
            </div>
            <div class="info-row">
                <span class="label">No. Handphone:</span>
                <span class="value">' . htmlspecialchars($data['no_telepon']) . '</span>
            </div>
            <div class="info-row">
                <span class="label">Tanggal Jatuh Tempo:</span>
                <span class="value">' . htmlspecialchars($data['jatuh_tempo']) . '</span>
            </div>
            <div class="info-row">
                <span class="label">Harga Paket:</span>
                <span class="value">Rp. ' . number_format($data['harga_paket'], 0, ',', '.') . '</span>
            </div>
            <div class="info-row">
                <span class="label">Status:</span>
                <span class="value">' . ($data['status'] === '1' ? 'Lunas' : 'Belum Lunas') . '</span>
            </div>
        </div>

        <div class="warning">
            Untuk menghindari pemutusan sambungan TV kabel, harap melakukan pembayaran tepat waktu.
        </div>

        <div class="footer">
            Dibuat oleh Admin, ' . date('d-M-Y') . '
        </div>
    </body>
    </html>';

    // Load HTML ke DomPDF
    $dompdf->loadHtml($html);

    // Set paper size dan orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render PDF
    $dompdf->render();

    // Bersihkan semua output buffer
    while (ob_get_level()) {
        ob_end_clean();
    }

    if (!headers_sent()) {
        // Set header secara eksplisit dan konsisten
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="invoice_' . $pelanggan_id . '.pdf"');
        // Hapus header yang bisa menyebabkan masalah
        header_remove('X-Powered-By');
        header_remove('Cache-Control');
        header_remove('Pragma');
    }

    echo $dompdf->output();
    exit();
    
} catch (Exception $e) {
    error_log("PDF Generation Error: " . $e->getMessage());
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Failed to generate PDF: ' . $e->getMessage()]);
    exit();
}
?>