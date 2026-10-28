
<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$host = getenv('DB_HOST');
$port = (int) (getenv('DB_PORT') ?: 3306);
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$db   = getenv('DB_NAME');

$koneksi = mysqli_init();

if (!$host || !$user || !$db || $pass === false) {
    http_response_code(500);
    exit('Konfigurasi database belum lengkap.');
}

if (!$koneksi->real_connect(
    $host,
    $user,
    $pass,
    $db,
    $port
)) {
    error_log('Koneksi database gagal.');
    http_response_code(500);
    exit('Koneksi database gagal.');
}

mysqli_set_charset($koneksi, 'utf8mb4');
