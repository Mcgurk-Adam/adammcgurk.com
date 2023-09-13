<?php
if (empty($_SERVER['REQUEST_URI'])) {
	$page_path = $argv[1];
} else {
	if ($_SERVER['REQUEST_URI'] === '/') {
		$page_path = 'view/pages/home.php';
	} else {
		$parsed_url = parse_url($_SERVER['REQUEST_URI']);
		$exploded_path = explode('/', $parsed_url['path']);
        $exploded_path = array_filter($exploded_path, function($value) {return trim($value) !== '';});
		$page_path = 'view/pages/' . implode('/', $exploded_path) .  '.php';
	}
}

if (file_exists($page_path)) {
	require_once 'view/includes/header.php';
	require_once $page_path;
    if (str_contains($page_path, 'blog')) {
        require_once 'view/includes/blog-footer.php';
    }
	require_once 'view/includes/footer.php';
} else {
	return false;
}