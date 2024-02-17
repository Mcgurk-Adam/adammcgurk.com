<main>

	<section class="hero">
        <h1>Welcome to adammcgurk.com</h1>
	</section>

    <section class="home-sections">
        <h2>Professional Experience</h2>
        <div id="pro-experience-container">
            <div class="experience-card">
                <img src="/assets/shine-solar-mark.svg" alt="Shine Solar Logo" title="Shine Solar Logo">
                <h3>Shine Solar</h3>
                <button type="button" class="light-blue small" data-opens="#experience-modal">Learn More</button>
            </div>
            <div class="experience-card">
                <img src="/assets/unbabel-mark.svg" alt="Unbabel Logo" title="Unbabel Logo">
                <h3>Unbabel</h3>
                <button type="button" class="light-blue small" data-opens="#experience-modal">Learn More</button>
            </div>
            <div class="experience-card">
                <img src="/assets/onramp-mark.svg" alt="OnRamp Logo" title="OnRamp Logo">
                <h3>OnRamp</h3>
                <button type="button" class="light-blue small" data-opens="#experience-modal">Learn More</button>
            </div>
            <div class="experience-card">
                <img src="/assets/bamboohr-mark.svg" alt="BambooHR Logo Mark" title="BambooHR Logo Mark">
                <h3>BambooHR</h3>
                <button type="button" class="light-blue small" data-opens="#experience-modal">Learn More</button>
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

<div class="modal" id="experience-modal">
    <div class="inner">
        <button type="button" class="close special"></button>
        <img src="/assets/shine-solar-mark.svg" alt="Logo" title="Logo">
        <h3>Shine Solar</h3>
        <p class="position">Lead Developer</p>
        <div class="points"></div>
    </div>
</div>