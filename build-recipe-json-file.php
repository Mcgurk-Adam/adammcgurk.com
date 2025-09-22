<?php

require_once "vendor/autoload.php";
require_once "env.php";
require_once "php_utils/cloudflare.php";

$megaJson = [];

$recipeDbResponse = queryDb('SELECT title, image_name as image, image_alt FROM recipes');
var_dump($recipeDbResponse);