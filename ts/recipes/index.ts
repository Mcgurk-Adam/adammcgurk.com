const recipeCards = document.querySelectorAll(".recipe-blog-card");
const recipeSearch: HTMLInputElement = document.getElementById("recipe-search") as HTMLInputElement;
const emptyRecipeState = document.getElementById("empty-recipe-state") as HTMLElement;
recipeSearch.focus();
recipeSearch.addEventListener("input", (ev:InputEvent) => {
    if (!checkForAllHidden()) {
        emptyRecipeState.style.display = "none";
    }
    // reset empty state
    const currentSearch:string = recipeSearch.value ?? "";
    for (const card of recipeCards) {
        const cardTitle = card.querySelector("h3") as HTMLHeadingElement;
        const cardTitleText = cardTitle.innerText;
        let loweredTags:string = card.getAttribute("data-tags") ?? "";
        if (cardTitleText.toLowerCase().includes(currentSearch.toLowerCase()) || loweredTags.includes(currentSearch.toLowerCase())) {
            card.classList.remove("hidden");
        } else {
            card.classList.add("hidden");
        }
    }
    if (checkForAllHidden()) {
        emptyRecipeState.style.display = "flex";
    } else {
        emptyRecipeState.style.display = "none";
    }
});

const tags = document.querySelectorAll(".tag");
tags.forEach((tag: HTMLSpanElement) => {
    tag.addEventListener("click", (ev:MouseEvent) => {
        ev.preventDefault();
        const tagText = tag.innerText;
    });
});

function checkForAllHidden(): boolean {
    return !(document.querySelectorAll(".recipe-blog-card:not(.hidden)").length > 0);
}