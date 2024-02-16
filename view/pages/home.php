<main>

	<section class="hero">
        <h1>Welcome to adammcgurk.com</h1>
	</section>

    <section class="home-sections">
        <h2>Professional Experience</h2>
        <div id="mobile-pro-experience"></div>
        <div id="desktop-pro-experience">
            <div id="left-pro-experience">
                <div class="mobile-experience-mark">
                    <img src="/assets/shine-solar-logo.svg" alt="Shine Solar Logo" title="Shine Solar Logo">
                    <h3>Shine Solar</h3>
                </div>
                <div class="mobile-experience-mark">
                    <img src="/assets/unbabel-logo.png" alt="Unbabel Logo" title="Unbabel Logo">
                    <h3>Unbabel</h3>
                </div>
                <div class="mobile-clearfix"></div>
            </div>
            <div id="middle-bar-pro-experience"></div>
            <div id="right-pro-experience">
                <div class="mobile-clearfix"></div>
                <div class="mobile-experience-mark">
                    <img src="/assets/onramp-.svg" alt="Shine Solar Logo" title="Shine Solar Logo">
                    <h3>Shine Solar</h3>
                </div>
            </div>
        </div>
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