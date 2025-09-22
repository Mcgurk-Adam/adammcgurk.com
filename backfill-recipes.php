<?php

require_once "vendor/autoload.php";
require_once "env.php";
require_once "php_utils/cloudflare.php";

queryDb('DELETE FROM recipes; DELETE FROM recipe_tags; DELETE FROM recipe_suggested_questions; DELETE FROM recipe_steps; DELETE FROM recipe_ingredient_sections; DELETE FROM recipe_ingredients;');
$recipeJson = json_decode(file_get_contents("recipes.json"), true);

foreach ($recipeJson as $recipe) {

	# base recipe
	$responseFromDb = queryDb("INSERT INTO recipes (title, image_name, image_alt) VALUES (?, ?, ?)", [$recipe['title'], $recipe['image'], $recipe['imageAlt']]);
	$recipeId = $responseFromDb['result'][0]['meta']['last_row_id'];

	$singleStringValueColumnsAndTables = [
		[
			'table' => 'recipe_tags',
			'column' => 'tag_name',
			'json_key' => 'tags',
		],
		[
			'table' => 'recipe_suggested_questions',
			'column' => 'question_value',
			'json_key' => 'suggestedQuestions',
		]
	];

	# Tags
	$tagSql = "INSERT INTO recipe_tags (tag_name, recipe_id) VALUES ";
	$tagParams = [];
	foreach ($recipe['tags'] as $tag) {
		$tagSql .= "(?, ?),";
		$tagParams[] = $tag;
		$tagParams[] = $recipeId;
	}
	$tagSql = rtrim($tagSql, ',');
	queryDb($tagSql, $tagParams);

	# Suggested Questions
	if (!empty($recipe['suggestedQuestions'])) {
		$suggestedQuestionSql = "INSERT INTO recipe_suggested_questions (question_title, question_content, recipe_id) VALUES ";
		$suggestedQuestionParams = [];
		foreach ($recipe['suggestedQuestions'] as $suggestedQuestion) {
			$suggestedQuestionSql .= "(?, ?, ?),";
			$suggestedQuestionParams[] = $suggestedQuestion['title'];
			$suggestedQuestionParams[] = $suggestedQuestion['content'];
			$suggestedQuestionParams[] = $recipeId;
		}
		$suggestedQuestionSql = rtrim($suggestedQuestionSql, ',');
		queryDb($suggestedQuestionSql, $suggestedQuestionParams);
	}

	# Steps
	$stepSql = "INSERT INTO recipe_steps (step_value, recipe_id) VALUES ";
	$stepParams = [];
	foreach ($recipe['steps'] as $step) {
		$stepSql .= "(?, ?),";
		$stepParams[] = $step;
		$stepParams[] = $recipeId;
	}
	$stepSql = rtrim($stepSql, ',');
	queryDb($stepSql, $stepParams);

	# Ingredients
	if (!empty($recipe['ingredients'])) {
		if (is_string($recipe['ingredients'][0])) {
			$ingredientSql = "INSERT INTO recipe_ingredients (ingredient_value, recipe_id) VALUES ";
			$ingredientParams = [];
			foreach ($recipe['ingredients'] as $ingredient) {
				$ingredientSql .= "(?, ?),";
				$ingredientParams[] = $ingredient;
				$ingredientParams[] = $recipeId;
			}
			$ingredientSql = rtrim($ingredientSql, ',');
			queryDb($ingredientSql, $ingredientParams);
		} else {
			foreach ($recipe['ingredients'] as $ingredientSection) {
				$individualSectionIngredientSqlResponse = queryDb("INSERT INTO recipe_ingredient_sections (section_name, recipe_id) VALUES (?, ?)", [$ingredientSection['sectionTitle'], $recipeId]);
				$sectionIngredientId = $individualSectionIngredientSqlResponse['result'][0]['meta']['last_row_id'];
				$ingredientSql = "INSERT INTO recipe_ingredients (ingredient_value, section_id) VALUES ";
				$ingredientParams = [];
				foreach ($ingredientSection['sectionIngredients'] as $ingredient) {
					$ingredientSql .= "(?, ?),";
					$ingredientParams[] = $ingredient;
					$ingredientParams[] = $sectionIngredientId;
				}
				$ingredientSql = rtrim($ingredientSql, ',');
				queryDb($ingredientSql, $ingredientParams);
			}
		}
	}
}