all:
	npm install
	@tsc -w -p ts/
	@sass --watch style/scss/style.scss:style/style.css --style compressed
	@php -S localhost:3000 index.php