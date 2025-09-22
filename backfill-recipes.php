<?php

require_once "vendor/autoload.php";
require_once "env.php";
require_once "php_utils/cloudflare.php";

echo 'Cleaning the tables';
echo "\n";
queryDb('DELETE FROM recipes; DELETE FROM recipe_tags; DELETE FROM recipe_suggested_questions; DELETE FROM recipe_steps; DELETE FROM recipe_ingredient_sections; DELETE FROM recipe_ingredients;');
echo 'Done cleaning the tables';
echo "\n";
echo 'Reading from file';
echo "\n";
$recipeJson = json_decode(file_get_contents("recipes.json"), true);
echo 'extracted recipes from file';
echo "\n";
$i = 0;
foreach ($recipeJson as $recipe) {
	$i++;

	# base recipe
	echo 'inserting recipe #' . $i . ' into database';
	echo "\n";
	$responseFromDb = queryDb("INSERT INTO recipes (title, image_name, image_alt, description) VALUES (?, ?, ?, ?)", [$recipe['title'], $recipe['image'], $recipe['imageAlt'], $recipe['description']]);
	echo 'inserted recipe #' . $i . ' into database';
	echo "\n";
	$recipeId = $responseFromDb['result'][0]['meta']['last_row_id'];

	# Tags
	if (!empty($recipe['tags'])) {
		echo 'inserting tags into database';
		echo "\n";
		$tagSql = "INSERT INTO recipe_tags (tag_name, recipe_id) VALUES ";
		$tagParams = [];
		foreach ($recipe['tags'] as $tag) {
			$tagSql .= "(?, ?),";
			$tagParams[] = $tag;
			$tagParams[] = $recipeId;
		}
		$tagSql = rtrim($tagSql, ',');
		queryDb($tagSql, $tagParams);
		echo 'done inserting tags into database';
		echo "\n";
	}

	# Suggested Questions
	if (!empty($recipe['suggestedQuestions'])) {
		echo 'inserting suggested questions into database';
		echo "\n";
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
		echo 'done inserting suggested questions into database';
		echo "\n";
	}

	# Steps
	if (!empty($recipe['steps'])) {
		echo 'inserting steps into database';
		echo "\n";
		$stepSql = "INSERT INTO recipe_steps (step_value, recipe_id) VALUES ";
		$stepParams = [];
		foreach ($recipe['steps'] as $step) {
			$stepSql .= "(?, ?),";
			$stepParams[] = $step;
			$stepParams[] = $recipeId;
		}
		$stepSql = rtrim($stepSql, ',');
		queryDb($stepSql, $stepParams);
		echo 'done inserting steps into database';
		echo "\n";
	}

	# Ingredients
	if (!empty($recipe['ingredients'])) {
		echo 'inserting ingredients into database';
		echo "\n";
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
		echo 'done inserting ingredients into database';
		echo "\n";
	}
}