<main>

	<section class="hero">
        <h1>Welcome to adammcgurk.com</h1>
	</section>

    <section class="home-sections">
        <h2>Professional Experience</h2>
        <div class="home-card-container" style="max-width: 1200px; width: 95%; margin: 0 auto;">
            <div class="home-card animated-away">
                <img src="/assets/shine-solar-mark.svg" alt="Shine Solar Logo" title="Shine Solar Logo">
                <h3>Shine Solar</h3>
                <button type="button" class="light-blue small" data-opens="#experience-modal" data-link="https://shinesolar.com" data-title="Shine Solar" data-img="/assets/shine-solar-mark.svg" data-undertext="Lead Developer" data-points="Was the first engineering hire and grew the team to seven.|Built the company's mobile app <a href='https://shinesolar.app' title='Shine Solar App' target='_blank' rel='noopener'>The Shine Solar App</a>, supporting over 1000 customers during and after their installation.|Built and maintained the company's custom CRM and ERP <a href='https://luminaryapps.io' title='Luminary' target='_blank' rel='noopener'>Luminary</a> which supported thousands of calls a day and tens of millions of dollars a month.|Built and maintained over 50 websites for the company.">Learn More</button>
            </div>
            <div class="home-card animated-away">
                <img src="/assets/unbabel-mark.svg" alt="Unbabel Logo" title="Unbabel Logo">
                <h3>Unbabel</h3>
                <button type="button" class="light-blue small" data-opens="#experience-modal" data-link="https://unbabel.com" data-title="Unbabel" data-img="/assets/unbabel-mark.svg" data-undertext="Software Engineering Consultant" data-points="Built and maintained the company's <a href='https://appsource.microsoft.com/en-us/product/dynamics-365/unbabel1586431770145.unbabel' title='Microsoft Dynamics app link' target='_blank' rel='noopener'>Microsoft Dynamics App</a>, powering translation for thousands of customer emails a month.|Pioneered fully automated CI/CD for testing, building, and delivering a Microsoft App Source app on Github Actions.|Worked closely with Fortune 500 companies to support their specific needs and iterate on the integration build.|Built a micro blog around my learnings and findings building a Microsoft Dynamics app - <a href='https://dynamicsdevhub.com' title='DynamicsDevHub link'>DynamicsDevHub</a>.">Learn More</button>
            </div>
            <div class="home-card animated-away">
                <img src="/assets/onramp-mark.svg" alt="OnRamp Logo" title="OnRamp Logo">
                <h3>OnRamp</h3>
                <button type="button" class="light-blue small" data-opens="#experience-modal" data-link="https://onramp.us" data-title="OnRamp" data-img="/assets/onramp-mark.svg" data-undertext="Software Engineering Consultant" data-points="Built and maintained the company's full integration suite, including full integrations with Salesforce, Hubspot, Slack, and more.|Built and maintained the company's main application SSO implementation, inclusive of both Google SSO and SAML SSO.|Built the company's queueing system that processed emails, webhook reception, and integration processing.|Worked closely with customers on specific customer issues as they arose.">Learn More</button>
            </div>
            <div class="home-card animated-away">
                <img src="/assets/bamboohr-mark.svg" alt="BambooHR Logo Mark" title="BambooHR Logo Mark">
                <h3>BambooHR</h3>
                <button type="button" class="light-blue small" data-opens="#experience-modal" data-link="https://bamboohr.com" data-title="BambooHR" data-img="/assets/bamboohr-mark.svg" data-undertext="Principal Software Engineer, Backend. Tech Lead" data-points="Was the founding tech lead of the Customer Lifecycle team, working on customer signup, in app implementation, and cancellation.|Shipped a revamped cancellation experience that decreased total customer support tickets by 15% in the company.|Pioneered AI in the product by introducing the first in product feature that used AI, a data cleaning feature for onboarding.|Led the team as we built a completely reimagined onboarding experience, allowing our customer success team to adopt 25% more customers with no increase in internal headcount.|Transitioned to the tech lead of the AI Experience team, building AI powered chat called BambooHR<sup>&reg;</sup> Answers">Learn More</button>
            </div>
        </div>
    </section>

    <section class="home-sections white">
        <h2>Projects</h2>
        <div class="home-card-container">
            <div class="home-card animated-away">
                <img src="/assets/cloud-kill-switch-logo.svg" alt="Cloud Kill Switch logo" title="Cloud Kill Switch logo">
                <h3>Cloud Kill Switch</h3>
                <a href="https://cloudkillswitch.com/" title="Cloud Kill Switch Link" class="button light-blue" target="_blank" rel="noopener">Visit Website</a>
            </div>
            <div class="home-card animated-away">
                <img src="/assets/optimize-mark.svg" alt="OptimizeFonts logo" title="OptimizeFonts logo">
                <h3>Optimize Fonts</h3>
                <a href="https://optimizefonts.com/" title="OptimizeFonts Link" class="button yellow" target="_blank" rel="noopener">Visit Website</a>
            </div>
            <div class="home-card animated-away">
                <img src="/assets/quitplanetfitnesslogo.svg" alt="Quit Planet Fitness logo" title="Quit Planet Fitness logo">
                <h3>Quit Planet Fitness</h3>
                <a href="https://quitplanetfitness.com/" title="Quit Planet Fitness Link" class="button red" target="_blank" rel="noopener">Visit Website</a>
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
        <div class="top">
            <button type="button" class="close special"></button>
            <a href="" title="" target="_blank" rel="noopener" class="img-a"><img src="" alt="Logo" title="Logo"></a>
            <a href="" title="" target="_blank" rel="noopener" class="name"></a>
            <p class="undertext"></p>
        </div>
        <div class="scrollable-body">
            <ul class="points">
                <li></li>
            </ul>
        </div>
    </div>
</div>

<script>
    /**
     * Home Card Animation
     */
    window.addEventListener("load", () => {
        const cards = document.querySelectorAll(".home-card");
        const observer = new IntersectionObserver(
            entries => {
                const intersectingEntries = entries.filter(entry => entry.isIntersecting);
                if (intersectingEntries.length === 1) {
                    intersectingEntries[0].target.classList.remove("animated-away");
                    observer.unobserve(intersectingEntries[0].target);
                } else if (intersectingEntries.length > 1) {
                    for (let i = 0; i < intersectingEntries.length; i++) {
                        if (i === 0) {
                            intersectingEntries[i].target.classList.remove("animated-away");
                            observer.unobserve(intersectingEntries[i].target);
                        } else {
                            setTimeout(() => {
                                intersectingEntries[i].target.classList.remove("animated-away");
                                observer.unobserve(intersectingEntries[i].target);
                            }, 125 * i);
                        }
                    }
                }
            },
            { threshold: 0.5 } // Adjust threshold as needed
        );

        cards.forEach(card => observer.observe(card));
    });
    /**
     * End Home Card Animation
     */

    /**
     * Recipe Carousel Animation
     */
    const recipeCarousel = document.getElementById("recipe-carousel");
    let happened = 0;
    let cloneNumber = 0;
    const animateCards = () => {
        const cards = document.querySelectorAll('.recipe-teaser');
        happened++;
        cards.forEach((card) => {
            let translateX = new WebKitCSSMatrix(getComputedStyle(card).transform).m41 - .5;
            card.style.transform = `translate3d(${translateX}px, 0, 0)`;
        });
        if (happened !== 0 && happened % 500 === 0) {
            const cardToClone = cards[cloneNumber];
            const clone = cardToClone.cloneNode(true);
            recipeCarousel.appendChild(clone);
            cloneNumber++;
        }
        requestAnimationFrame(animateCards);
    }
    requestAnimationFrame(animateCards);
    /**
     * End Recipe Carousel Animation
     */
</script>
