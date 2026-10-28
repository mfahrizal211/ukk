
<?php
$root = dirname(__DIR__);
chdir($root);

$file = $_GET['file'] ?? 'index.php';
$file = basename($file);

if ($file === '' || !preg_match('/^[a-zA-Z0-9_-]+\.php$/', $file)) {
    http_response_code(400);
    exit('Permintaan tidak valid.');
}

$path = $root . DIRECTORY_SEPARATOR . $file;

if (!is_file($path)) {
    http_response_code(404);
    require $root . '/404.php';
    exit;
}

require $path;
