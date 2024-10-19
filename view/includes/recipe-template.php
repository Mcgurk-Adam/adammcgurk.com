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
        <div class="tab active" data-tab="ingredients">Ingredients</div>
        <div class="tab" data-tab="steps">Steps</div>
        <div class="tab" data-tab="recipe-ai">Recipe AI <img src="/assets/sparkle-icon.svg" class="tab-icon" alt="AI Sparkles" title="AI Sparkle Icon"></div>
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
    <div id="mobile-recipe-ai" class="mobile-recipe-body" data-track-click="clicked on ai tab" style="position: relative;">
        <div id="mobile-chat-message-container">
            <div id="mobile-chat-messages"></div>
            <div id="mobile-chat-empty-state">
                <h3>Welcome to Recipe AI!</h3>
            </div>
        </div>
        <form id="recipe-ai-input-container" method="POST" action="/ai/chat">
            <textarea name="chat-message" id="chat-input" placeholder="Ask a question about this recipe!" required></textarea>
            <div id="button-container">
                <button type="submit" class="special"></button>
            </div>
        </form>
    </div>
    <div id="mobile-recipe-ai-onboard-flow" style="align-items: center;" class="mobile-recipe-body">
        <h3>Recipe AI <img src="/assets/sparkle-icon.svg" alt="sparkle icon" title="sparkle icon"></h3>
        <p>Start using AI to ask questions about these recipes! Maybe you're looking for a substitution, or to make something less spicy (or more spicy!!). Recipe AI can answer those questions for you because it has been taught my recipes, technique, and even some tips.</p>
        <p>If you're a more advanced user, you can click the button to enter your own OpenAI API Key and use my AI tool at no extra cost to you! (click here if you want to know what this means).</p>
        <p>If you just want to get started now, click the button to signup for Recipe AI below and you can start using this AI tool in seconds!</p>
        <button type="button" class="ghost light-blue small" id="mobile-use-own-open-ai-key" title="Use your own OpenAI API key" style="margin-bottom: 20px; width: fit-content;">Use my own OpenAI API Key</button>
        <button type="button" class="green" id="mobile-buy-recipe-ai" title="Buy Recipe AI">Start using Recipe AI now</button>
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

            if (tab.dataset.tab === 'recipe-ai') {
                document.querySelector('#chat-input').focus();
                const openAiKey = localStorage.getItem("open-ai-key");
                if (!openAiKey || !openAiKey.length) {
                    document.querySelector('#mobile-recipe-ai-onboard-flow').classList.add('active');
                } else {
                    document.querySelector('#mobile-recipe-ai').classList.add('active');
                }
            } else {
                document.querySelector(`#mobile-${tab.dataset.tab}`).classList.add('active');
            }
        });
    });
    const chatInput = document.getElementById("chat-input");
    chatInput.addEventListener("input", () => {
        chatInput.style.height = "auto";
        chatInput.style.height = (chatInput.scrollHeight) + "px";
    });
</script>