<main class="page">
	<h1>Sports</h1>
	<p>I love team sports, especially American football, baseball, and basketball. My favorite professional teams are the San Francisco 49ers, the San Francisco Giants, and the Golden State Warriors. These are my different thoughts on those teams or the greater sport landscape as a whole.</p>
    <?php foreach ($sportsArticles as $article): ?>
		<?php
            $implodedTitle = implode('-', explode(' ', strtolower($article['title'])));
            $url = '/assets/writing-hub/sports/' . $implodedTitle;
		?>
        <section class="blog-card">
            <div class="image">
                <img src="<?=$url?>.webp" title="<?=$article['title']?>" alt="<?=$article['imageAlt']?>">
            </div>
            <div class="words">
                <h3><a href="/writing-hub/sports/<?=$implodedTitle?>" title="<?=$article['title']?>"><?=$article['title']?></a></h3>
                <p><?=$article['subtitle']?></p>
            </div>
        </section>
        <hr>
    <?php endforeach; ?>

</main>