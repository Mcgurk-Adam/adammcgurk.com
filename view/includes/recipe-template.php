<div class="recipe-header" style="background-image: url('/assets/recipes/<?=$singleRecipe['image']?>')">
    <h1><?=$singleRecipe['title']?></h1>
</div>

<div class="recipe-desktop">
    <div id="desktop-ingredients">
        <h2>Ingredients</h2>
		<?php foreach ($singleRecipe['ingredients'] as $ingredient): ?>
			<?php if (gettype($ingredient) === 'array'): ?>
                <h3><?=$ingredient['sectionTitle']?></h3>
				<?php foreach ($ingredient['sectionIngredients'] as $sectionIngredient): ?>
                    <div class="ingredient">
                        <input type="checkbox">
                        <span><?=$sectionIngredient?></span>
                    </div>
				<?php endforeach; ?>
			<?php else: ?>
                <div class="ingredient">
                    <input type="checkbox">
                    <span><?=$ingredient?></span>
                </div>
			<?php endif; ?>
		<?php endforeach; ?>
    </div>
    <hr>
    <div id="desktop-steps">
        <h2>Steps</h2>
        <ol>
			<?php foreach ($singleRecipe['steps'] as $step): ?>
                <li><?=$step?></li>
			<?php endforeach; ?>
        </ol>
    </div>
</div>

<div class="recipe-mobile">
    <div class="tabs">
        <div class="tab active" data-tab="ingredients">Ingredients</div>
        <div class="tab" data-tab="steps">Steps</div>
    </div>
    <div id="mobile-ingredients" class="mobile-recipe-body active">
		<?php foreach ($singleRecipe['ingredients'] as $ingredient): ?>
            <?php if (gettype($ingredient) === 'array'): ?>
                <h3><?=$ingredient['sectionTitle']?></h3>
                <?php foreach ($ingredient['sectionIngredients'] as $sectionIngredient): ?>
                    <div class="ingredient">
                        <input type="checkbox">
                        <span><?=$sectionIngredient?></span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="ingredient">
                    <input type="checkbox">
                    <span><?=$ingredient?></span>
                </div>
            <?php endif; ?>
		<?php endforeach; ?>
    </div>
    <div id="mobile-steps" class="mobile-recipe-body">
        <ol>
        <?php foreach ($singleRecipe['steps'] as $step): ?>
            <li><?=$step?></li>
        <?php endforeach; ?>
        </ol>
    </div>
</div>

<script>
    const tabs = document.querySelectorAll('.tab');
    const mobileRecipeBodies = document.querySelectorAll('.mobile-recipe-body');
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(tab => tab.classList.remove('active'));
            mobileRecipeBodies.forEach(body => body.classList.remove('active'));
            tab.classList.add('active');
            document.querySelector(`#mobile-${tab.dataset.tab}`).classList.add('active');
        });
    });
</script>