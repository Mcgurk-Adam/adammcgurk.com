if (window.location.pathname === "/") {

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

					// @ts-ignore working on the includes thing
					if (!allTags.includes(tag)) {
						inTag = false;
					}

				});

				tile.style.display = inTag ? "flex" : "none";

			})

		}

	});

	projectTabs.addListeners();

}
if ("serviceWorker" in navigator) {
	window.addEventListener("load", () => {
		navigator.serviceWorker.register("/sw.js")
			.then(registration => {
				console.log("ServiceWorker registration successful with scope: ", registration.scope);
			})
			.catch(error => {
				console.log("ServiceWorker registration failed: ", error);
			});
	});
}