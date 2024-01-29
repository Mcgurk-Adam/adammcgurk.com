<?php
$recipes = json_decode(file_get_contents('recipes.json'), true);
if (empty($_SERVER['REQUEST_URI']) && $argv[1] === 'recipe') {
	$singleRecipe = json_decode($argv[2], true);
	$pagePath = 'view/includes/recipe-template.php';
} else if (empty($_SERVER['REQUEST_URI']) && $argv[1] !== 'recipe') {
	$pagePath = $argv[1];
} else {
	$urls = array_map(function ($recipe) {
		return '/recipes/' . implode('-', explode(' ', strtolower($recipe['title'])));
	}, $recipes);
	$parsedUrl = parse_url($_SERVER['REQUEST_URI']);
	$explodedPath = explode('/', $parsedUrl['path']);
	$explodedPath = array_filter($explodedPath, function($value) {return trim($value) !== '';});
	$inlinedPath = implode('/', $explodedPath);
	if ($_SERVER['REQUEST_URI'] === '/') {
		$pagePath = 'view/pages/home.php';
	} else {
		if (in_array('/' . $inlinedPath, $urls)) {
			$elementPosition = array_search('/' . $inlinedPath, $urls);
			$singleRecipe = $recipes[$elementPosition];
			$pagePath = 'view/includes/recipe-template.php';
		} else {
			$pagePath = 'view/pages/' . $inlinedPath .  '.php';
		}
	}
}
if (file_exists($pagePath)) {
	require_once 'view/includes/header.php';
	require_once $pagePath;
    if (str_contains($pagePath, 'blog')) {
        require_once 'view/includes/blog-footer.php';
    }
	require_once 'view/includes/footer.php';
} else {
	return false;
}