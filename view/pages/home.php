<main>

	<section class="hero">
        <h1>Welcome to adammcgurk.com</h1>
	</section>

    <section class="home-sections">
        <h2>Professional Experience</h2>
    </section>

    <section class="home-sections white">
        <h2>Recipes</h2>
        <div id="recipe-carousel">
            <?php foreach ($recipes as $recipe): ?>
				<?php
                    $implodedTitle = implode('-', explode(' ', strtolower($recipe['title'])));
                    $url = '/recipes/' . $implodedTitle;
				?>
                <div class="recipe-teaser">
                    <img src="/assets/recipes/small/<?=$recipe['image']?>" alt="<?=$recipe['imageAlt']?>" title="<?=$recipe['imageTitle'] ?? $recipe['imageAlt']?>">
                    <a href="<?=$url?>" title="<?=$recipe['title']?>"><?=$recipe['title']?></a>
                </div>
			<?php endforeach; ?>
        </div>
    </section>

    <section class="home-sections">
        <h2>Writing Hub</h2>
    </section>

</main>