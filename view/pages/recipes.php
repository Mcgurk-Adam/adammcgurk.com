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
            'description' => 'This is my all-time favorite treat. A must-make every holiday season.',
            'image' => '/assets/apple-blackberry-pie.png',
            'imageAlt' => 'An apple blackberry pie with an oat topping',
            'tags' => ['dessert', 'holidays', 'pie'],
        ],
		[
			'title' => 'Instant Pot Pot Roast',
			'description' => 'Such a delicious and simple and fast way of making pot roast',
			'image' => '/assets/pot-roast.png',
			'imageAlt' => 'A delicious looking pot roast and vegetables',
			'tags' => ['dinner', 'beef', 'instant-pot'],
		],
		[
			'title' => 'Popcorn Seasoning',
			'description' => 'A smoky, delicious seasoning for popcorn',
			'image' => '/assets/popcorn-seasoning.png',
			'imageAlt' => 'Some popcorn surrounded by salt, pepper, paprika, and chilis',
			'tags' => ['popcorn', 'spices', 'spice-rubs'],
		],
		[
			'title' => 'Chicken Florentine',
			'description' => 'A delicious creamy florentine sauce with crispy chicken.',
			'image' => '/assets/chicken-florentine.png',
			'imageAlt' => 'creamy sauce with chicken and noodles',
			'tags' => ['dinner', 'sauce', 'pasta', 'chicken', 'italian'],
		],
		[
			'title' => 'Cajun Pasta',
			'description' => 'A delicious creamy and spicy cajun pasta',
			'image' => '/assets/cajun-pasta.png',
			'imageAlt' => 'penne noodles with parsley, sausage, and a creamy sauce',
			'tags' => ['dinner', 'sauce', 'pasta', 'sausage', 'italian', 'spicy'],
		],
		[
			'title' => 'Birria Tacos',
			'description' => 'Slow cooked shredded beef, cooked in a birria consomme, with pepperjack cheese',
			'image' => '/assets/birria-tacos.png',
			'imageAlt' => 'Fully stuffed tacos with beef and cheese, next to a bowl of consomme',
			'tags' => ['tacos', 'beef', 'mexican'],
		],
		[
			'title' => 'Cornbread',
			'description' => 'A moist, sweet, delicious buttermilk cornbread',
			'image' => '/assets/cornbread.png',
			'imageAlt' => 'A cornbread with a slice from it in a cast iron pan with accouterments around it',
			'tags' => ['sides', 'butter', 'bread', 'southern'],
		],
		[
			'title' => 'Taco Seasoning',
			'description' => 'A delicious, spicy, full bodied taco/mexican seasoning',
			'image' => '/assets/taco-seasoning.png',
			'imageAlt' => 'A bunch of spices, peppers, and chilis surrounding other spices',
			'tags' => ['mexican', 'spices', 'spice-rubs', 'spicy'],
		],
		[
			'title' => 'Salmon',
			'description' => 'A classic oven baked salmon with a lemon garlic glaze and an avocado salsa',
			'image' => '/assets/salmon.png',
			'imageAlt' => 'A salmon adorned with spices garlic and oil, with an avocado salsa',
			'tags' => ['avocado', 'salmon', 'fish', 'easy', 'quick'],
		],
		[
			'title' => 'Shrimp Tacos',
			'description' => 'Shrimp tacos with a spicy rub topped with a tangy salsa',
			'image' => '/assets/shrimp-tacos.png',
			'imageAlt' => 'Shrimp and mango salsa in a tortilla surrounded by spices, limes, garlic, and oil',
			'tags' => ['tacos', 'shrimp', 'spicy', 'mango', 'mexican'],
		],
		[
			'title' => 'Buffalo Wings',
			'description' => 'Smoked, fried, or air fried chicken wings with a tangy, spicy buffalo sauce',
			'image' => '/assets/buffalo-wings.png',
			'imageAlt' => 'fried chicken covered in a red sauce with celery and dipping sauces',
			'tags' => ['fried-chicken', 'chicken-wings', 'buffalo-sauce', 'spicy'],
		],
		[
			'title' => 'Bacon Treats',
			'description' => 'A tater tot wrapped in bacon with jalapenos and cheese',
			'image' => '/assets/bacon-treats.png',
			'imageAlt' => 'A bunch of tater tots wrapped in bacon topped with jalapenos and cracked black pepper with cheese poking out',
			'tags' => ['bacon', 'snack', 'spicy'],
		],
		[
			'title' => 'Fondant Potatoes',
			'description' => 'Seared potatoes cooked off with aromatics and chicken broth',
			'image' => '/assets/fondant-potatoes.png',
			'imageAlt' => 'A bunch of seared potatoes in broth surrounded by aromatics in a cast iron pan',
			'tags' => ['sides', 'potatoes'],
		],
		[
			'title' => 'Chipotle Chicken',
			'description' => 'A smokey, spicy, marinated chicken thigh cooked in a variety of ways',
			'image' => '/assets/chipotle-chicken.png',
			'imageAlt' => 'A single piece of chicken with a chipotle marinade, topped with herbs and surrounded by spices and chilis',
			'tags' => ['mexican', 'chicken', 'marinated', 'spicy', 'dinner'],
		],
		[
			'title' => 'Skirt Steak',
			'description' => 'A citrus-y, mexican, marinated skirt steak',
			'image' => '/assets/skirt-steak.png',
			'imageAlt' => 'A sliced, seared skirt steak on a plate surrounded by different citruses and spices',
			'tags' => ['mexican', 'steak', 'marinated', 'dinner'],
		],
		[
			'title' => 'Award-Winning Chili',
			'description' => 'A deep, rich spicy chili with a variety of meats, veggies, spices, and beans',
			'image' => '/assets/chili.png',
			'imageAlt' => 'A pot of deep red and dark chili with vegetables and beans and surrounded by spices',
			'tags' => ['chili', 'spicy', 'dinner'],
		],
    ];
    ?>
    <div id="recipe-card-container">
		<?php foreach ($recipes as $recipe): ?>
			<?php
			$implodedTitle = implode('-', explode(' ', strtolower($recipe['title'])));
			$url = '/recipes/' . $implodedTitle;
			?>
            <div class="recipe-blog-card" data-tags="<?=implode(' ', $recipe['tags'])?>">
                <div class="image">
                    <a href="<?=$url?>" title="<?=$recipe['title']?>"><img src="<?=$recipe['image']?>" title="<?=$recipe['imageTitle'] ?? $recipe['imageAlt']?>" alt="<?=$recipe['imageAlt']?>"></a>
                </div>
                <div class="words">
                    <h3><a href="<?=$url?>" title="<?=$recipe['title']?>"><?=$recipe['title']?></a></h3>
                    <p><?=$recipe['description']?></p>
                </div>
                <hr>
            </div>
		<?php endforeach; ?>
    </div>
</main>

<script src="/js/recipes.js"></script>