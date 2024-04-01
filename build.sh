#!/bin/bash

rm -rf js
npm install
# compile css
node_modules/.bin/sass --style=compressed style/scss/style.scss > style/style.css

# compile js
mkdir js
node_modules/.bin/tsc -p ts/
node_modules/.bin/tsc -p ts/recipes/

# build php pages
for f in $(find view/pages -name '*.php')
do
	SHORT_FILENAME=${f#*"/pages/"}
	if [[ "$SHORT_FILENAME" == "home.php" ]]; then
		php index.php $f > index.html
	else
		PAGE_NAME=${SHORT_FILENAME%%"."*}
		if [[ ! -d "$PAGE_NAME/" ]]; then
			mkdir -p "$PAGE_NAME"
		fi
		php index.php "$f" > "$PAGE_NAME/index.html"
	fi
done

# build recipes
cat recipes.json | jq -c '.[]' | while read i; do
    title=$(echo "$i" | jq -r '.title')
    NORMALIZED_PATH=$(echo "$title" | tr '[:upper:]' '[:lower:]' | tr ' ' '-' | tr -d '\n')
		if [[ ! -d "recipes/$NORMALIZED_PATH/" ]]; then
			mkdir -p "recipes/$NORMALIZED_PATH"
		fi
    php index.php recipe "$i" > "recipes/$NORMALIZED_PATH/index.html"
done
