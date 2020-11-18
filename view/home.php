<?php include_once "view/templates/header.php"; ?>

<main>

	<section class="hero">

		<div class="content">
		
			<div class="words">

				<h1>Hi, I'm Adam McGurk</h1>
				<h2>Full Stack Developer, with a passion for leadership and excellent technology.</h2>

			</div>

			<img src="/assets/headerillustration.svg" alt="Illustration" title="Illustration">

		</div>

	</section>

	<section id="projects" class="white">
		
		<div class="content">
			
			<h1>Projects<hr></h1>

			<p class="explainer">Use the buttons below to filter on the skills you want to see! If you select a combination of buttons, it will only show projects that use <i>all</i> of your filters. By default, all projects are shown.</p>

			<p class="explainer"> * - Means still in progress...software is <i>never</i> done, right?? :)</p>

			<div class="tab-container">
				
				<button class="tab" name="html-css">HTML5/SCSS</button>
				<button class="tab" name="ts">TypeScript</button>
				<button class="tab" name="php">PHP</button>
				<button class="tab" name="netlify">Netlify</button>
				<button class="tab" name="aws">AWS</button>
				<button class="tab" name="gcp">GCP</button>
				<button class="tab" name="pwa">PWA</button>
				<button class="tab" name="design">UX/UI Design</button>
				<button class="tab" name="twilio">Twilio</button>
				<button class="tab" name="ci/cd">CI/CD</button>
				<button class="tab" name="sendgrid">SendGrid</button>
				<button class="tab" name="sql">MySQL/MariaDB</button>
				<button class="tab" name="rn">React Native</button>
				<button class="tab" name="node">Node.JS</button>

			</div>

			<div class="tile-container">
				
				<div class="tile" data-tech-tags="html-css ts php gcp pwa sql twilio sendgrid ci/cd">

					<img src="/assets/luminary-mark.svg" alt="Luminary" title="Luminary">

					<h3>Luminary*</h3>

					<p>The Sales, Marketing, and Fulfillment platform that powers the business of Shine Solar.</p>

					<a href="https://dev.to/mcgurkadam/lessons-learned-from-building-my-company-s-sales-and-marketing-platform-in-three-months-pm4" title="Read About Luminary" target="_blank" rel="noopener" class="cta">Read about it</a>
					
				</div>
				
				<div class="tile" data-tech-tags="rn sql php aws ci/cd">

					<img src="/assets/shine-solar-mark.svg" alt="Shine Solar Logo" title="Shine Solar">
					<h3>Shine Solar Mobile App*</h3>
					<p>Allows customers to make referrals, and track the status of their solar system.</p>

					<a href="https://shinesolar.app" title="Go to the Shine Solar App landing page" target="_blank" rel="noopener" class="cta">See it</a>
					
				</div>

				<div class="tile" data-tech-tags="netlify html-css ts design node">
					
					<img src="/assets/optimize-mark.svg" alt="Optimize Fonts Logo" title="Optimize Fonts">
					<h3>Optimize Fonts*</h3>
					<p>Takes a Google Font URL or &lt;link&gt; tag and, using the latest techniques, optimizes it for optimal performance.</p>

					<a href="https://optimizefonts.com" title="Go to Optimize Fonts" target="_blank" rel="noopener" class="cta">See it</a>

				</div>

				<div class="tile" data-tech-tags="html-css ts netlify design">
					
					<img src="/assets/csv-mark.svg" alt="Parse CSV" title="Parse CSV">
					<h3>Parse CSV*</h3>
					<p>Parses a CSV file, and allows you to fire certain actions for each row in your CSV file.</p>

					<a href="https://parsecsv.com" title="Go to the Parse CSV landing page" target="_blank" rel="noopener" class="cta">See it</a>

				</div>

<!-- 				<div class="tile" data-tech-tags="netlify gcp html-css ts design php twilio pwa sendgrid sql">
					
					<img src="/assets/signatory-mark.svg" alt="Signatory Logo" title="Signatory Logo">
					<h3>Signatory CRM</h3>
					<p>The CRM that I'm building that gives more customization and options than any CRM on the market, with a sleek UI design.</p>

					<a href="https://signatory.app" title="Go to the Signatory landing page" target="_blank" rel="noopener" class="cta">See it</a>

				</div>

				<div class="tile" data-tech-tags="html-css ts php gcp netlify design twilio">
					
					<img src="/assets/ts-mark.svg" alt="Twilio Secrets" title="Twilio Secrets">
					<h3>Twilio Secrets</h3>
					<p>Something alkdjfaij alsidjf09jjfa asjdfaksj a9jdfa osilkajdf</p>

					<a href="https://twiliosecrets.com" title="Visit Twilio Secrets" target="_blank" rel="noopener" class="cta">See it</a>

				</div> -->

				<div class="tile" data-tech-tags="html-css ts netlify design pwa">
					
					<img src="/assets/money-mark.svg" alt="Money logo" title="Money logo">
					<h3>Budget Tracker*</h3>
					<p>An offline and mobile first budget tracker that keeps all data on your device. (BTW - It only reacts to touch, not click!)</p>

					<a href="https://money.mcgurk.app" title="Go visit the budget tracking app" target="_blank" rel="noopener" class="cta">See it</a>

				</div>

				<div class="tile" data-tech-tags="html-css ts php netlify design sql ci/cd">
					
					<img src="/assets/shinephp-mark.svg" alt="Shine PHP Mark" title="Shine PHP">
					<h3>Shine PHP*</h3>
					<p>A lightweight, simple, PHP microframework for making web app development with PHP so much easier.</p>

					<a href="https://shinephp.dev" title="Go to the landing page for ShinePHP" target="_blank" rel="noopener" class="cta">See it</a>

				</div>

				<div class="tile" data-tech-tags="html-css ts php aws netlify design ci/cd">
					
					<img src="/assets/loc-mark.svg" alt="Lines of Code" title="Lines of Code" class="invert">
					<h3>Count LOC*</h3>
					<p>Takes a URL to a Github repository and returns how many lines of code exist in that repository, including being able to toggle between languages.</p>

					<a href="https://linesofcode.app" title="Go to the count loc app" target="_blank" rel="noopener" class="cta">See it</a>

				</div>

			</div>

		</div>

	</section>

	<section id="about">
		
		<div class="content">
			
			<h1>About <hr></h1>

			<figure class="polaroid">

				<img src="/assets/AdamHeadshot.jpg" alt="A picture of Adam smiling into the camera on a bright, sunny day" title="Adam McGurk" id="adamPicture">
				
				<figcaption class="caption">Me - Adam McGurk</figcaption>

			</figure>

			<p class="explainer left">I started in the tech industry young - maintaining  systems for a prominent radio station in the Bay Area.</p>
			<p class="explainer left">While there, I had own on-air shift, maintained the company's office network, and built the connections that put things such as the Golden State Warriors on the air.</p>
			<p class="explainer left">And while I had an absolute blast doing that, I decided I wanted to attend college, and further my journey there. So, I packed up and moved to Idaho where I attended Brigham Young University - Idaho. I began looking for any job I could find...and soon, I started as an engineer for BYU-Idaho radio.</p>
			<p class="explainer left">BYU-Idaho Radio had no engineering staff, so I had the unique experience of building the department from scratch. Soon after, I got promoted to Chief Engineer. And while I was loving what I was doing, I found myself loving software even more. While at BYU-Idaho Radio, I built several internal web applications where I INSTANTLY fell in love with software.</p>
			<p class="explainer left">I knew I had found my calling and wanted to do more with software. So I looked around my college for a startup that was looking for a young, hungry web developer. And I found one!!</p>

		</div>

	</section>

</main>

<?php include_once "view/templates/footer.php"; ?>
