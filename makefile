all:
	@tsc -w -p ts/ &
	@tsc -w -p ts/recipes &
	@sass --watch style/scss/style.scss:style/style.css --style compressed &
	@php -S localhost:3001 index.php &