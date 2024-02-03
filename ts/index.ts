if (window.location.pathname === "/") {
	const recipeCarousel = document.getElementById("recipe-carousel");
	let happened = 0;
	let cloneNumber = 0;
	const animateCards = () => {
		const cards:NodeListOf<HTMLElement> = document.querySelectorAll('.recipe-teaser');
		happened++;
		cards.forEach((card: HTMLElement) => {
			let translateX = new WebKitCSSMatrix(getComputedStyle(card).transform).m41 - 50;
			card.style.transform = `translate3d(${translateX}px, 0, 0)`;
		});
		if (happened !== 0 && happened % 2000 === 0) {
			const cardToClone = cards[cloneNumber];
			const clone = cardToClone.cloneNode(true) as HTMLElement;
			recipeCarousel.appendChild(clone);
			cloneNumber++;
		}
		requestAnimationFrame(animateCards);
	}
	requestAnimationFrame(animateCards);
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