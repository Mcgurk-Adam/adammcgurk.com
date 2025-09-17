all:
	@tsc -w -p ts/ &
	@tsc -w -p ts/recipes &
	@tsc -w -p ts/recipes/chat &
	@sass --watch style/scss/style.scss:style/style.css --style compressed &
	@php -S localhost:3001 index.php &

clean:
	rm -f style/style.css
	rm -rf js/ contact/ recipes/ writing-hub/
	rm -f index.html
	rm -rf build/

build:
	./build.sh

fresh-build: clean build
clean-build: clean build
build-clean: clean build
build-fresh: clean build