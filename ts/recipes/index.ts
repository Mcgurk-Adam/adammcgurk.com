const recipeCards = document.querySelectorAll(".recipe-blog-card");
const recipeSearch: HTMLInputElement = document.getElementById("recipe-search") as HTMLInputElement;
recipeSearch.focus();
recipeSearch.addEventListener("input", (ev:InputEvent) => {
    const currentSearch:string = recipeSearch.value ?? "";
    recipeCards.forEach((card: HTMLDivElement) => {
        const cardTitle = card.querySelector("h3") as HTMLHeadingElement;
        const cardTitleText = cardTitle.innerText;
        let loweredTags:string = card.getAttribute("data-tags") ?? "";
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