<?php
// Router for `php -S`: serve real files, send everything else (incl. /robots.txt, /llms.txt, pretty permalinks) to WordPress.
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$file = __DIR__ . '/wp' . $path;
if ($path !== '/' && is_file($file) && !preg_match('#^/(robots|llms|llms-full|llms-faq)\.txt$#', $path)) return false;
$_SERVER['SCRIPT_NAME'] = '/index.php';
require __DIR__ . '/wp/index.php';
