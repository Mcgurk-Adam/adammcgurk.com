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
    <button class="special" id="desktop-recipe-ai-button"></button>
</div>

<div class="recipe-mobile">
    <div class="tabs">
        <div class="tab" data-tab="ingredients">Ingredients</div>
        <div class="tab" data-tab="steps">Steps</div>
        <div class="tab active" data-tab="recipe-ai">Recipe AI <img src="/assets/sparkle-icon.svg" class="tab-icon" alt="AI Sparkles" title="AI Sparkle Icon"></div>
    </div>
    <div id="mobile-ingredients" class="mobile-recipe-body">
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
    <div id="mobile-recipe-ai" class="mobile-recipe-body active" data-track-click="clicked on ai tab">
        <form id="recipe-ai-input-container" method="POST" action="/ai/chat">
            <textarea name="chat-message" id="chat-input"></textarea>
            <div id="button-container">
                <button type="submit" class="special"></button>
            </div>
        </form>
    </div>
</div>

<script>
    const tabs = document.querySelectorAll('.tab');
    const mobileRecipeBodies = document.querySelectorAll('.mobile-recipe-body');
    tabs.forEach((tab) => {
        tab.addEventListener('click', () => {
            tabs.forEach(tab => tab.classList.remove('active'));
            mobileRecipeBodies.forEach(body => body.classList.remove('active'));
            tab.classList.add('active');
            document.querySelector(`#mobile-${tab.dataset.tab}`).classList.add('active');
            if (tab.dataset.tab === 'recipe-ai') {
                document.querySelector('#chat-input').focus();
            }
        });
    });
    const chatInput = document.getElementById("chat-input");
    chatInput.addEventListener("input", () => chatInput.style.height = (chatInput.scrollHeight) + "px");
</script>