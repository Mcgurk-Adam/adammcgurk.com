<?php include_once "view/templates/header.php"; ?>

<main>

	<section class="hero">

		<div class="content">
		
			<div class="words">
				<h1>Hi, I'm Adam McGurk</h1>
				<h2>Full Stack Developer, Maker, and Doer</h2>
			</div>

			<img src="/assets/headerillustration.svg" alt="Illustration" title="Illustration">

		</div>

	</section>

	<section id="projects" class="white">
		
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
				<button class="tab" name="design">UX/UI Design</button>
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
					<p>Allows customers to make referrals, and track the status of their solar system.</p>

					<a href="https://shinesolar.app" title="Go to the Shine Solar App landing page" target="_blank" rel="noopener" class="cta">See it</a>
					
				</div>

				<div class="tile" data-tech-tags="netlify html-css ts design">
					
					<img src="/assets/optimize-mark.svg" alt="Optimize Fonts Logo" title="Optimize Fonts">
					<h3>Optimize Fonts</h3>
					<p>Takes a Google Font URL or &lt;link&gt; tag and, using the latest techniques, optimizes it for optimal performance.</p>

					<a href="https://optimizefonts.com" title="Go to Optimize Fonts" target="_blank" rel="noopener" class="cta">See it</a>

				</div>

				<div class="tile" data-tech-tags="netlify gcp html-css ts design php twilio pwa sendgrid sql">
					
					<img src="/assets/signatory-mark.svg" alt="Signatory Logo" title="Signatory Logo">
					<h3>Signatory CRM</h3>
					<p>The CRM that I'm making that gives more customization and options than any CRM on the market, with a sleek UI design.</p>

					<a href="https://signatory.app" title="Go to the Signatory landing page" target="_blank" rel="noopener" class="cta">See it</a>

				</div>
				
				<div class="tile" data-tech-tags="php html-css ts pwa aws">

					<img src="/assets/shine-solar-mark.svg" alt="Shine Solar Logo" title="Shine Solar">
					<h3>Signature Generator</h3>
					<p>Allows employees of Shine Solar to input their data and return a Shine Solar design-approved email signature.</p>
					
				</div>

				<div class="tile" data-tech-tags="html-css ts netlify design">
					
					<img src="/assets/csv-mark.svg" alt="Parse CSV" title="Parse CSV">
					<h3>ParseCsv.com</h3>
					<p>Parses a CSV file, and allows you to fire certain actions for each row in your CSV file</p>

					<a href="https://parsecsv.com" title="Go to the Parse CSV landing page" target="_blank" rel="noopener" class="cta">See it</a>

				</div>

				<div class="tile" data-tech-tags="html-css ts netlify design">
					
					<img src="/assets/money-mark.svg" alt="Money logo" title="Money logo">
					<h3>Budget Tracker</h3>
					<p>A simple money tracking app I use to track my discretionary expenses.</p>

					<a href="https://money.mcgurk.app" title="Go visit the budget tracking app" target="_blank" rel="noopener" class="cta">See it</a>

				</div>

				<div class="tile" data-tech-tags="html-css ts php aws netlify design">
					
					<img src="/assets/loc-mark.svg" alt="Lines of Code" title="Lines of Code" class="invert">
					<h3>LinesOfCode.app</h3>
					<p>Takes a URL to a Github repository and returns how many lines of code exist in that repository, including being able to toggle between languages.</p>

					<a href="https://linesofcode.app" title="Go to the linesofcode.app app" target="_blank" rel="noopener" class="cta">See it</a>

				</div>

			</div>

		</div>

	</section>

</main>

<?php include_once "view/templates/footer.php"; ?>