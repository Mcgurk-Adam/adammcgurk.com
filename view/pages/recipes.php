<main id="recipes" class="page">
    <h1>Recipes</h1>
    <p>I've curated a collection of recipes that elevate my culinary game. From Apple Blackberry Pie to my go-to barbecue spice rub, explore and find a dish that tempts your taste buds.</p>
    <input type="search" id="recipe-search" placeholder="Search Recipes">

    <?php
    $recipes = [
        [
            'title' => 'Simplest Barbecue Spice Rub',
            'description' => 'My go to barbecue rub for pulled pork and brisket.',
            'image' => '/assets/spice-rub.png',
            'imageAlt' => 'A jar of BBQ rub with different spices.',
            'imageTitle' => 'A jar of BBQ rub with different spices.',
            'tags' => ['bbq', 'spice-rubs', 'easy'],
        ],
        [
            'title' => 'Apple Blackberry Pie',
            'description' => 'This is my all time favorite dessert. I\'m not a huge dessert guy, but this is my go to every holiday season.',
            'image' => '/assets/apple-blackberry-pie.png',
            'imageAlt' => 'An apple blackberry pie with an oat topping',
            'imageTitle' => 'An apple blackberry pie with an oat topping',
            'tags' => ['dessert', 'holidays', 'pie'],
        ],
		[
			'title' => 'Instant Pot Pot Roast',
			'description' => 'Such a delicious and simple and fast way of making pot roast',
			'image' => '/assets/pot-roast.png',
			'imageAlt' => 'A delicious looking pot roast and vegetables',
			'imageTitle' => 'A delicious looking pot roast and vegetables',
			'tags' => ['dinner', 'beef', 'instant-pot'],
		],
		[
			'title' => 'Chicken Florentine',
			'description' => 'A delicious creamy florentine sauce with crispy chicken.',
			'image' => '/assets/chicken-florentine.png',
			'imageAlt' => 'creamy sauce with chicken and noodles',
			'imageTitle' => 'creamy sauce with chicken and noodles',
			'tags' => ['dinner', 'sauce', 'pasta', 'chicken', 'italian'],
		],
    ];
    ?>
	<?php foreach ($recipes as $recipe): ?>
        <?php
            $implodedTitle = implode('-', explode(' ', strtolower($recipe['title'])));
            $url = '/recipes/' . $implodedTitle;
        ?>
        <div class="blog-card" data-tags="<?=implode(' ', $recipe['tags'])?>">
            <div class="image">
                <img src="<?=$recipe['image']?>" title="<?=$recipe['imageTitle']?>" alt="<?=$recipe['imageAlt']?>">
            </div>
            <div class="words">
                <h3><a href="<?=$url?>" title="<?=$recipe['title']?>"><?=$recipe['title']?></a></h3>
                <p><?=$recipe['description']?></p>
            </div>
            <hr>
        </div>
	<?php endforeach; ?>
</main>

<script src="/js/recipes.js"></script>