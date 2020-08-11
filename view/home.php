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
					
				</div>
				
				<div class="tile" data-tech-tags="rn sql php aws">

					<img src="/assets/shine-solar-mark.svg" alt="Shine Solar Logo" title="ShineSolar">

					<h3>Shine Solar Mobile App</h3>
					
				</div>

				<div class="tile" data-tech-tags="netlify html-css ts">
					
					<img src="/assets/optimize-mark.svg" alt="Optimize Fonts Logo" title="Optimize Fonts">

					<h3>Optimize Fonts</h3>

				</div>

				<div class="tile" data-tech-tags="html-css ts php aws netlify">
					
					<img src="/assets/loc-mark.svg" alt="Lines of Code" title="Lines of Code">

					<h3>LinesOfCode.app</h3>

				</div>

			</div>

		</div>

	</section>

	<section id="projects">
		
		<div class="content">
			
			<h1>Experience</h1>
			<hr>

		</div>

	</section>

</main>

<?php include_once "view/templates/footer.php"; ?>