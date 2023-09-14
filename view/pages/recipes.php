<main id="recipes" class="page">
    <h1>Recipes</h1>
    <p>I've curated a collection of recipes that elevate my culinary game. From Apple Blackberry Pie to my go-to barbecue spice rub, explore and find a dish that tempts your taste buds.</p>
    <input type="search" id="recipe-search" placeholder="Search Recipes">

    <?php
    $recipes = [
        [
            'title' => 'Simplest Barbecue Spice Rub',
            'description' => 'My go to barbecue rub for pulled pork and brisket.',
            'image' => '/assets/bbq-rub.jpeg',
            'imageAlt' => 'A jar of BBQ rub with different spices.',
            'imageTitle' => 'A jar of BBQ rub with different spices.',
            'tags' => ['bbq', 'spice-rubs', 'easy'],
        ],
        [
            'title' => 'Apple Blackberry Pie',
            'description' => 'This is my all time favorite dessert. I\'m not a huge dessert guy, but this is my go to every holiday season.',
            'image' => '/assets/recipe-placeholder.svg',
            'imageAlt' => 'An apple blackberry pie with an oat topping',
            'imageTitle' => 'An apple blackberry pie with an oat topping',
            'tags' => ['dessert', 'holidays', 'pie'],
        ],
    ];
    ?>

    <div class="recipe-cards">
        <?php foreach ($recipes as $recipe): ?>
            <?php
                $implodedTitle = implode('-', explode(' ', strtolower($recipe['title'])));
                $url = '/recipes/' . $implodedTitle;
            ?>
            <a class="recipe-card" title="<?=$recipe['title']?>" href="<?=$url?>">
                <img src="<?= $recipe['image'] ?>" alt="<?= $recipe['imageAlt'] ?>" title="<?= $recipe['imageTitle'] ?>">
                <div class="bottom-text">
                    <h2><?= $recipe['title'] ?></h2>
                    <p class="description"><?= $recipe['description'] ?></p>
                    <div class="tags">
						<?php foreach ($recipe['tags'] as $tag): ?>
                            <span class="tag"><?= $tag ?></span>
						<?php endforeach; ?>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</main>

<script src="/js/recipes.js"></script>