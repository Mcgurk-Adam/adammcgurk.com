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
document.addEventListener("keydown", (event: KeyboardEvent) => {
	if (event.key === "Escape") {
		modals.forEach((modal: HTMLElement) => {
			modal.classList.remove("open");
		});
	}
});
modals.forEach((modal: HTMLElement) => {
	const closeButton = modal.querySelector(".close");
	closeButton.addEventListener("click", () => {
		modal.classList.remove("open");
	});
	modal.addEventListener("click", (event: Event) => {
		if (event.target === modal) {
			modal.classList.remove("open");
		}
	});
});
const modalOpenButtons = document.querySelectorAll("[data-opens]");
modalOpenButtons.forEach((button: HTMLElement) => {
	button.addEventListener("mouseover", (ev: MouseEvent) => {
		const queryOfModal = button.getAttribute("data-opens");
		const modal = document.querySelector(queryOfModal);
		const img = button.getAttribute("data-img");
		modal.querySelector("img").setAttribute("src", img);
	});
	button.addEventListener("touchstart", (ev: TouchEvent) => {
		const queryOfModal = button.getAttribute("data-opens");
		const modal = document.querySelector(queryOfModal);
		const img = button.getAttribute("data-img");
		modal.querySelector("img").setAttribute("src", img);
	}, {
		passive: true,
	});
	button.addEventListener("click", (ev: MouseEvent) => {
		const queryOfModal = button.getAttribute("data-opens");
		const modal = document.querySelector(queryOfModal);
		const title = button.getAttribute("data-title");
		const link = button.getAttribute("data-link");
		const img = button.getAttribute("data-img");
		const undertext = button.getAttribute("data-undertext");
		const points = button.getAttribute("data-points").split("|");
		const nameElement: HTMLElement = modal.querySelector(".name");
		nameElement.innerText = title;
		nameElement.setAttribute("href", link);
		nameElement.setAttribute("title", title);
		const imgATag = modal.querySelector(".img-a");
		imgATag.setAttribute("href", link);
		imgATag.setAttribute("title", title);
		modal.querySelector("img").setAttribute("src", img);
		// @ts-expect-error
		modal.querySelector(".undertext").innerText = undertext;
		const copiedLiElementFromPoints = modal.querySelector("ul").querySelector("li").cloneNode(true);
		modal.querySelector("ul").innerHTML = "";
		points.forEach((point: string) => {
			const li = copiedLiElementFromPoints.cloneNode(true) as HTMLUListElement;
			li.innerHTML = point;
			modal.querySelector("ul").appendChild(li);
		});
		modal.classList.add("open");
	});
});
// @ts-ignore this is a checkbox element
document.getElementById("close-mobile-button").addEventListener("click", () => document.getElementById("mobile-helper-checkbox").checked = false);
if ("serviceWorker" in navigator) {
	window.addEventListener("load", () => {
		navigator.serviceWorker.register("/sw.js").catch(error => {
				console.log("ServiceWorker registration failed: ", error);
			});
	});
}