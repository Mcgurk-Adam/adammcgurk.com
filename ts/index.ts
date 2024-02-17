if (window.location.pathname === "/") {
	const recipeCarousel = document.getElementById("recipe-carousel");
	let happened = 0;
	let cloneNumber = 0;
	const animateCards = () => {
		const cards:NodeListOf<HTMLElement> = document.querySelectorAll('.recipe-teaser');
		happened++;
		cards.forEach((card: HTMLElement) => {
			let translateX = new WebKitCSSMatrix(getComputedStyle(card).transform).m41 - .5;
			card.style.transform = `translate3d(${translateX}px, 0, 0)`;
		});
		if (happened !== 0 && happened % 500 === 0) {
			const cardToClone = cards[cloneNumber];
			const clone = cardToClone.cloneNode(true) as HTMLElement;
			recipeCarousel.appendChild(clone);
			cloneNumber++;
		}
		requestAnimationFrame(animateCards);
	}
	requestAnimationFrame(animateCards);
}
const modals = document.querySelectorAll(".modal");
modals.forEach((modal: HTMLElement) => {
	const closeButton = modal.querySelector(".close");
	closeButton.addEventListener("click", () => {
		modal.classList.remove("open");
	});
});
const modalOpenButtons = document.querySelectorAll("[data-opens]");
modalOpenButtons.forEach((button: HTMLElement) => {
	button.addEventListener("click", () => {
		const queryOfModal = button.getAttribute("data-opens");
		const modal = document.querySelector(queryOfModal);
		modal.classList.add("open");
	});
});
// @ts-ignore this is a checkbox element
document.getElementById("close-mobile-button").addEventListener("click", () => document.getElementById("mobile-helper-checkbox").checked = false);
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