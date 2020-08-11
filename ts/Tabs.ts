class Tabs {

	private tabContainer:HTMLElement;
	private tabs:NodeListOf<HTMLButtonElement>;

	constructor(tabContainerSelector:string) {
		this.tabContainer = document.querySelector(tabContainerSelector);
		this.tabs = this.tabContainer.querySelectorAll("button.tab");
	}

	addListeners(): void {

		this.tabs.forEach((tab:HTMLButtonElement) => {

			tab.addEventListener("click", () => {

				tab.classList.toggle("selected");

			}, false);

		});

	}

}
