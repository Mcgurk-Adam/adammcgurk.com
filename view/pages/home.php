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
                <button type="button" class="light-blue small" data-opens="#experience-modal" data-title="Shine Solar" data-img="/assets/shine-solar-mark.svg" data-undertext="Lead Developer">Learn More</button>
            </div>
            <div class="experience-card">
                <img src="/assets/unbabel-mark.svg" alt="Unbabel Logo" title="Unbabel Logo">
                <h3>Unbabel</h3>
                <button type="button" class="light-blue small" data-opens="#experience-modal" data-title="Unbabel" data-img="/assets/unbabel-mark.svg" data-undertext="Software Development Consultant">Learn More</button>
            </div>
            <div class="experience-card">
                <img src="/assets/onramp-mark.svg" alt="OnRamp Logo" title="OnRamp Logo">
                <h3>OnRamp</h3>
                <button type="button" class="light-blue small" data-opens="#experience-modal" data-title="OnRamp" data-img="/assets/onramp-mark.svg" data-undertext="Software Development Consultant">Learn More</button>
            </div>
            <div class="experience-card">
                <img src="/assets/bamboohr-mark.svg" alt="BambooHR Logo Mark" title="BambooHR Logo Mark">
                <h3>BambooHR</h3>
                <button type="button" class="light-blue small" data-opens="#experience-modal" data-title="BambooHR" data-img="/assets/bamboohr-mark.svg" data-undertext="Senior Software Engineer, Backend">Learn More</button>
            </div>
        </div>
    </section>

    <section class="home-sections white">
        <h2>Projects</h2>
        <div id="project-container">
            <div class="project-card">
                <img src="/assets/cloud-kill-switch-logo.svg" alt="Cloud Kill Switch logo" title="Cloud Kill Switch logo">
                <h3>Cloud Kill Switch</h3>
                <a href="https://cloudkillswitch.com/" title="Cloud Kill Switch Link" class="button red" target="_blank" rel="noopener">Visit Website</a>
            </div>
            <div class="project-card">
                <img src="/assets/optimize-mark.svg" alt="OptimizeFonts logo" title="OptimizeFonts logo">
                <h3>Optimize Fonts</h3>
                <a href="https://optimizefonts.com/" title="OptimizeFonts Link" class="button yellow" target="_blank" rel="noopener">Visit Website</a>
            </div>
            <div class="project-card">
                <img src="/assets/dynamics-dev-hub-logo.svg" alt="DynamicsDevHub logo" title="DynamicsDevHub logo">
                <h3>DynamicsDevHub</h3>
                <a href="https://dynamicsdevhub.com/" title="DynamicsDevHub Link" class="button light-blue" target="_blank" rel="noopener">Visit Website</a>
            </div>
        </div>
    </section>

    <section class="home-sections">
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

<!--    <section class="home-sections" id="writing-hub">
        <h2>Writing Hub</h2>
        <p>I love expressing myself through writing. My website is my canvas, featuring everything from fictional tales and tech articles to sports commentary and assorted musings. Explore my writing hub for a diverse collection of my works.</p>
        <a href="/writing-hub" title="Go to the writing hub" class="button yellow">Explore the writing hub</a>
    </section>-->

</main>

<div class="modal" id="experience-modal">
    <div class="inner">
        <button type="button" class="close special"></button>
        <img src="" alt="Logo" title="Logo">
        <h3></h3>
        <p class="undertext"></p>
        <div class="points"></div>
    </div>
</div>