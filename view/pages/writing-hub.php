<?php
    $sections = [
        [
			'title' => 'Fiction',
			'icon_alt' => 'A pencil icon',
		],
        [
			'title' => 'Technology',
			'icon_alt' => 'An icon showing some code',
		],
        [
			'title' => 'Sports',
			'icon_alt' => 'A megaphone icon',
		],
        [
			'title' => 'Music',
			'icon_alt' => 'An icon showing headphones',
        ],
    ];
?>

<main id="writing-hub" class="page">
    <h1>Writing Hub</h1>
    <p>From a young age, reading ignited a passion for writing. Dive into my diverse interests below, from career insights to personal musings. Choose your journey.</p>
    <div class="writing-tile-container">
        <?php foreach ($sections as $section): ?>
            <a class="writing-tile" href="/writing-hub/<?= strtolower($section['title']) ?>" title="The <?= $section['title'] ?> section of the writing hub">
                <h3><?= $section['title'] ?></h3>
                <img src="/assets/<?= strtolower($section['title']) ?>-icon.svg" alt="<?= $section['icon_alt'] ?>" title="<?= $section['icon_alt'] ?>">
            </a>
        <?php endforeach; ?>
    </div>
</main>