<main id="recipes" class="page">
    <h1>Recipes</h1>
    <p>I've curated a collection of recipes that elevate my culinary game. From Apple Blackberry Pie to my go-to barbecue spice rub, explore and find a dish that tempts your taste buds.</p>
    <input type="search" id="recipe-search" placeholder="Search Recipes">

    <?php
    ?>
    <div id="recipe-card-container">
		<?php foreach ($recipes as $recipe): ?>
			<?php
            if (empty($recipe['ingredients']) || empty($recipe['steps'])) {
                continue;
            }
			$implodedTitle = implode('-', explode(' ', strtolower($recipe['title'])));
			$url = '/recipes/' . $implodedTitle;
			?>
            <div class="recipe-blog-card" data-tags="<?=implode(' ', $recipe['tags'])?>">
                <div class="image">
                    <a href="<?=$url?>" title="<?=$recipe['title']?>"><img src="/assets/recipes/small/<?=$recipe['image']?>" title="<?=$recipe['imageTitle'] ?? $recipe['imageAlt']?>" alt="<?=$recipe['imageAlt']?>"></a>
                </div>
                <div class="words">
                    <h3><a href="<?=$url?>" title="<?=$recipe['title']?>"><?=$recipe['title']?></a></h3>
                    <p><?=$recipe['description']?></p>
                </div>
                <hr>
            </div>
		<?php endforeach; ?>
    </div>
    <div id="empty-recipe-state">
        <img src="/assets/not-found-illustration.svg" title="Not found" alt="Woman in front of empty folder">
        <p>Sorry, no recipes resembling that name! Delete your search and try again.</p>
    </div>
</main>

<script src="/js/recipes.js"></script>