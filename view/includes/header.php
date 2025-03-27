<!DOCTYPE html>
<html lang="en-us" dir="ltr">
	
	<head>
		<meta charset="utf-8">
		<title>Adam McGurk</title>
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600&family=Unica+One&display=swap">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600&family=Unica+One&display=swap" media="print" onload="this.media='all'">
		<noscript>
			<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600&family=Unica+One&display=swap">
		</noscript>
        <?php if ($isHomepage): ?>
            <link rel="preload" href="/assets/hero.webp" as="image">
        <?php endif; ?>
		<link href="/style/style.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="/favicon.ico">
		<meta name="description" content="Explore my projects and background and learn how to work with me!">
        <!-- Fathom - beautiful, simple website analytics -->
        <script src="https://cdn.usefathom.com/script.js" data-site="KQXPWJXD" defer></script>
        <!-- / Fathom -->

        <noscript>
            <style>
                .animated-away {
                    opacity: 1 !important;
                    transform: none !important;
                }
            </style>
        </noscript>
	</head>

	<header>

		<a href="/" title="Go back to the homepage" class="main-title">
			<img src="/assets/logo.svg" alt="A nifty little logo for my McGurk brand" title="McGurk" class="logo">
		</a>

		<input type="checkbox" id="mobile-helper-checkbox" aria-label="Toggle this button">
		
		<nav>

			<a href="/" title="Go back to the homepage" class="main-title">
				<img src="/assets/logo.svg" alt="A nifty little logo for my McGurk brand" title="McGurk" class="logo">
			</a>

			<div id="nav-links">

                <a href="/" title="Go to the home page">Home</a>
				<a href="/writing-hub" title="Blog">Writing Hub</a>
                <a href="/recipes" title="Adam's Recipes">Recipes</a>

			</div>

            <button type="button" class="special" id="close-mobile-button" aria-label="Mobile navigation close button"></button>

		</nav>

	</header>
