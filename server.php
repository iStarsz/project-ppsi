<?php

$port = (int) ($_ENV["PORT"] ?? 8000); // cast biar gak error + int
$_SERVER["SERVER_PORT"] = $port;

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if ($uri !== '/' && file_exists(__DIR__ . '/public' . $uri)) {
    return false;
}

require_once __DIR__ . '/public/index.php';
