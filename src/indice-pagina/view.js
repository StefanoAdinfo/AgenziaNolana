/**
 * Use this file for JavaScript code that you want to run in the front-end
 * on posts/pages that contain this block.
 *
 * When this file is defined as the value of the `viewScript` property
 * in `block.json` it will be enqueued on the front end of the site.
 *
 * Example:
 *
 * ```js
 * {
 *   "viewScript": "file:./view.js"
 * }
 * ```
 *
 * If you're not making any changes to this file because your project doesn't need any
 * JavaScript running in the front-end, then you should delete this file and remove
 * the `viewScript` property from `block.json`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/#view-script
 */

document.addEventListener("DOMContentLoaded", function () {
	const sections = document.querySelectorAll("div[id]"); // Seleziona tutti i div con un ID
	const navLinks = document.querySelectorAll(".indice-list a");
	const bar = document.querySelector(".indice-bar-fill");

	const setActiveLink = () => {
		let currentId = "";
		let activeIndex = -1;
		let activeFound = false;

		sections.forEach((section) => {
			const rect = section.getBoundingClientRect();
			if (rect.top <= 100 && rect.bottom >= 100) {
				currentId = section.id;
				activeFound = true;
			}
		});

		// Per ogni link dell'indice, controlla se il suo href corrisponde all'ID attivo
		navLinks.forEach((link, index) => {
			const li = link.closest("li");
			const href = link.getAttribute("href");

			if (activeFound) {
				// Applica active solo se corrisponde alla sezione visibile
				if (href === `#${currentId}`) {
					li.classList.add("active");
					activeIndex = index;
				} else {
					li.classList.remove("active");
				}
			} else {
				// Nessuna sezione visibile → imposta il primo link come attivo
				if (index === 0) {
					li.classList.add("active");
					activeIndex = 0;
				} else {
					li.classList.remove("active");
				}
			}
		});
		// Aggiorna la barra di avanzamento
		if (bar && navLinks.length > 0) {
			const perc = ((activeIndex + 1) / navLinks.length) * 100;
			bar.style.width = `${perc}%`;
		}
	};

	// Ascolta lo scroll per attivare o rimuovere la classe active
	document.addEventListener("scroll", setActiveLink, { passive: true });
	setActiveLink(); // Imposta inizialmente la classe active
});
