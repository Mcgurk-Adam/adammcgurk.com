all:
	@tsc -w -p ts/ &
	@tsc -w -p ts/recipes &
	@tsc -w -p ts/recipes/chat &
	@sass --watch style/scss/style.scss:style/style.css --style compressed &
	@php -S localhost:3001 index.php &