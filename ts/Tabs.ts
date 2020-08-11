class Tabs {

	private tabContainer:HTMLElement;
	private tabs:NodeListOf<HTMLButtonElement>;
	private tabClickedFunction:Function;

	constructor(tabContainerSelector:string, tabClickedFunction:Function) {
		this.tabContainer = document.querySelector(tabContainerSelector);
		this.tabs = this.tabContainer.querySelectorAll("button.tab");
		this.tabClickedFunction = tabClickedFunction;
	}

	addListeners(): void {

		this.tabs.forEach((tab:HTMLButtonElement) => {

			tab.addEventListener("click", () => {

				tab.classList.toggle("selected");
				this.tabClickedFunction(this.tabs);

			}, false);

		});

	}

}
