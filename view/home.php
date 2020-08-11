<?php include_once "view/templates/header.php"; ?>

<main>

	<section class="hero">

		<div class="content">
		
			<div class="words">
				<h1>Hi, I'm Adam McGurk</h1>
				<h2>Full Stack Developer, Tech manager, and lover of food</h2>
			</div>

			<img src="/assets/headerillustration.svg" alt="Illustration" title="Illustration">

		</div>

	</section>

	<section id="projects">
		
		<div class="content">
			
			<h1>Experience</h1>
			<hr>

		</div>

	</section>

	<section id="projects">
		
		<div class="content">
			
			<h1>Projects</h1>
			<hr>

			<div class="tab-container">
				
				<button class="tab" name="html-css">HTML5/SCSS</button>
				<button class="tab" name="ts">TypeScript</button>
				<button class="tab" name="php">PHP</button>
				<button class="tab" name="netlify">Netlify</button>
				<button class="tab" name="aws">AWS</button>
				<button class="tab" name="gcp">GCP</button>
				<button class="tab" name="pwa">PWA</button>
				<button class="tab" name="twilio">Twilio</button>
				<button class="tab" name="sendgrid">SendGrid</button>
				<button class="tab" name="sql">MySQL/MariaDB</button>
				<button class="tab" name="rn">React Native</button>

			</div>

			<div class="tile-container">
				
				<div class="tile" data-tech-tags="html-css ts php gcp pwa sql twilio sendgrid">

					<img src="/assets/luminary-mark.svg" alt="Luminary" title="Luminary">

					<h3>Luminary</h3>

					<p>The Sales, Marketing, and Fulfillment platform that powers the business of Shine Solar.</p>
					
				</div>
				
				<div class="tile" data-tech-tags="rn sql php aws">

					<img src="/assets/shine-solar-mark.svg" alt="Shine Solar Logo" title="Shine Solar">
					<h3>Shine Solar Mobile App</h3>
					<p>A customer-facing mobile app available in the App Store and Google Play that allows customers to make referrals, and track the status of their solar system.</p>
					
				</div>

				<div class="tile" data-tech-tags="netlify html-css ts">
					
					<img src="/assets/optimize-mark.svg" alt="Optimize Fonts Logo" title="Optimize Fonts">
					<h3>Optimize Fonts</h3>
					<p>A simple web app that takes a Google Font URL or &lt;link&gt; tag and, using the latest techniques, optimizes it for optimal performance.</p>

				</div>
				
				<div class="tile" data-tech-tags="php html-css ts pwa">

					<img src="/assets/shine-solar-mark.svg" alt="Shine Solar Logo" title="Shine Solar">
					<h3>Signature Generator</h3>
					<p>A web app that allows employees of Shine Solar to input their data and return a Shine Solar design-approved email signature.</p>
					
				</div>

				<div class="tile" data-tech-tags="html-css ts netlify">
					
					<img src="/assets/csv-mark.svg" alt="Parse CSV" title="Parse CSV">
					<h3>ParseCsv.com</h3>
					<p>A web app parses a CSV file, and allows you to fire certain actions for each row in your CSV file</p>

				</div>

				<div class="tile" data-tech-tags="html-css ts php aws netlify">
					
					<img src="/assets/loc-mark.svg" alt="Lines of Code" title="Lines of Code" class="invert">
					<h3>LinesOfCode.app</h3>
					<p>A web app that takes a URL to a Github repository and returns how many lines of code exist in that repository, including being able to toggle between languages.</p>

				</div>

			</div>

		</div>

	</section>

</main>

<?php include_once "view/templates/footer.php"; ?>