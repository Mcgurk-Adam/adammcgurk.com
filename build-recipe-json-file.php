<?php

require_once "vendor/autoload.php";
require_once "env.php";
require_once "php_utils/cloudflare.php";

$recipeDbResponse = queryDb('SELECT id, title, image_name as image, image_alt as imageAlt, description FROM recipes');
$recipeJson = $recipeDbResponse['result'][0]['results'];

foreach ($recipeJson as &$recipe) {
	$recipeId = $recipe['id'];
	unset($recipe['id']);
	$recipe['tags'] = array_map(function ($tag) {
		return $tag['tag_name'];
	}, queryDb('SELECT tag_name FROM recipe_tags WHERE recipe_id = ?', [$recipeId])['result'][0]['results']);
	$recipe['ingredients'] = array_map(function ($ingredient) {
		return $ingredient['ingredient_value'];
	}, queryDb('SELECT ingredient_value FROM recipe_ingredients WHERE recipe_id = ?', [$recipeId])['result'][0]['results']);
	$recipeSections = queryDb('SELECT id, section_name as sectionTitle FROM recipe_ingredient_sections WHERE recipe_id = ?', [$recipeId])['result'][0]['results'];
	foreach ($recipeSections as &$recipeSection) {
		$recipeSectionId = $recipeSection['id'];
		unset($recipeSection['id']);
		$recipeSection['sectionIngredients'] = array_map(function ($ingredient) {
			return $ingredient['ingredient_value'];
		}, queryDb('SELECT ingredient_value FROM recipe_ingredients WHERE section_id = ?', [$recipeSectionId])['result'][0]['results']);
		$recipe['ingredients'][] = $recipeSection;
	}
	$recipe['steps'] = array_map(function ($step) {
		return $step['step_value'];
	}, queryDb('SELECT step_value FROM recipe_steps WHERE recipe_id = ?', [$recipeId])['result'][0]['results']);
	$recipe['suggestedQuestions'] = array_map(function ($suggestedQuestion) {
		return [
			'title' => $suggestedQuestion['question_title'],
			'content' => $suggestedQuestion['question_content'],
		];
	}, queryDb('SELECT question_title, question_content FROM recipe_suggested_questions WHERE recipe_id = ?', [$recipeId])['result'][0]['results']);
}

unlink('test-recipes.json');
file_put_contents('test-recipes.json', json_encode($recipeJson));
