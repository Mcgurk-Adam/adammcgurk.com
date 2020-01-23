<?php
declare(strict_types=1);
session_start();

if (preg_match('/\.(?:png|jpg|jpeg|gif|webmanifest|mp4|mp3|css|js|webp|svg|map|ttf)$/', $_SERVER["REQUEST_URI"])) {
	return false;
}

$path = get_required_php_file(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
require_once $path;

function get_required_php_file(string $path): string {

	// just require the index file
	if ($path === '/') return 'index.php';

	// getting the true php path (no beginning or ending slashes and index.php at the end)
	$full_php_path = \ltrim(\rtrim($path, '/'), '/').'/index.php';

	// returning the path as long as it exists, if it doesn't, return 404.php
	return (\file_exists($full_php_path) ? $full_php_path : '404.php');

}
