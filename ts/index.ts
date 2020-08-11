/// <reference path="Tabs.ts" />

const projectTabs:Tabs = new Tabs("#projects .tab-container", (allTabs:NodeListOf<HTMLButtonElement>) => {

	const projectTiles = document.querySelectorAll("#projects .tile");
	const selectedTags:Array<string> = [];
	allTabs.forEach((tab:HTMLButtonElement) => {
		if (tab.classList.contains("selected")) {
			selectedTags.push(tab.getAttribute("name"));
		}
	});

	// if nothing is selected, it defaults back to showing everything
	if (selectedTags.length == 0) {
		projectTiles.forEach((tile:HTMLElement) => tile.style.display = "flex");
	} else {

		projectTiles.forEach((tile:HTMLElement) => {

			const allTags = tile.getAttribute("data-tech-tags");
			let inTag = true;
			selectedTags.forEach((tag:string) => {

				if (!allTags.includes(tag)) {
					inTag = false;
				}

			});

			tile.style.display = inTag ? "flex" : "none";

		})

	}

});
projectTabs.addListeners();
