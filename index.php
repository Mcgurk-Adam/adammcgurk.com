<?php
$recipes = (json_decode(file_get_contents('recipes.json'), true));
$sportsArticles = (json_decode(file_get_contents('sports-writing-hub.json'), true));
shuffle($recipes);
if (empty($_SERVER['REQUEST_URI']) && $argv[1] === 'recipe') {
	$singleRecipe = json_decode($argv[2], true);
	$pagePath = 'view/includes/recipe-template.php';
} else if (empty($_SERVER['REQUEST_URI']) && ($argv[1] === 'sports' || $argv[1] === 'fiction' || $argv[1] === 'technology' || $argv[1] === 'blog')) {
	$article = json_decode($argv[2], true);
	$pagePath = 'view/includes/recipe-template.php';
} else if (empty($_SERVER['REQUEST_URI']) && $argv[1] !== 'recipe' && $argv[1] !== 'sports' && $argv[1] !== 'fiction' && $argv[1] !== 'technology' && $argv[1] !== 'blog') {
	$pagePath = $argv[1];
} else {
	$recipeUrls = array_map(function ($recipe) {
		return '/recipes/' . implode('-', explode(' ', strtolower($recipe['title'])));
	}, $recipes);
	$parsedUrl = parse_url($_SERVER['REQUEST_URI']);
	$explodedPath = explode('/', $parsedUrl['path']);
	$explodedPath = array_filter($explodedPath, function($value) {return trim($value) !== '';});
	$inlinedPath = implode('/', $explodedPath);
	if ($_SERVER['REQUEST_URI'] === '/') {
		$pagePath = 'view/pages/home.php';
	} else {
		if (in_array('/' . $inlinedPath, $recipeUrls)) {
			$elementPosition = array_search('/' . $inlinedPath, $recipeUrls);
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
	require_once 'view/includes/footer.php';
} else {
	return false;
}