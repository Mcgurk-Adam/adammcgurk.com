const recipeCards = document.querySelectorAll(".blog-card");
const recipeSearch: HTMLInputElement = document.getElementById("recipe-search") as HTMLInputElement;
recipeSearch.addEventListener("input", (ev:InputEvent) => {
    const currentSearch:string = recipeSearch.value ?? "";
    // match all recipes that have the search term in the title
    recipeCards.forEach((card: HTMLDivElement) => {
        const cardTitle = card.querySelector("h3") as HTMLHeadingElement;
        const cardTitleText = cardTitle.innerText;
        let loweredTags:string;
        const cardTags = card.querySelectorAll(".tag");
        cardTags.forEach((tag: HTMLSpanElement) => {
            loweredTags += tag.innerText.toLowerCase();
        });
        if (cardTitleText.toLowerCase().includes(currentSearch.toLowerCase()) || loweredTags.includes(currentSearch.toLowerCase())) {
            card.classList.remove("hidden");
        } else {
            card.classList.add("hidden");
        }
    });
});

const tags = document.querySelectorAll(".tag");
tags.forEach((tag: HTMLSpanElement) => {
    tag.addEventListener("click", (ev:MouseEvent) => {
        ev.preventDefault();
        const tagText = tag.innerText;
    });
});