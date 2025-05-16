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
	const openBtn = document.getElementById("openSearchModal");
	const modal = document.getElementById("searchModal");
	const overlay = document.getElementById("searchOverlay");
	const clearBtn = document.getElementById("clearSearch");
	const closeBtn = document.getElementById("closeSearchModal");

	const searchInput = document.getElementById("searchInput");
	const searchBtn = document.getElementById("searchButton");
	const searchResults = document.getElementById("searchResults");
	const noResults = document.getElementById("noResults");
	const searchFilters = document.getElementById("searchFilters");
	const pagination = document.getElementById("pagination");

	let currentQuery = "";
	let currentPage = 1;

	searchInput.addEventListener("keydown", function (event) {
		if (event.key === "Enter") {
			event.preventDefault();
			searchBtn.click();
		}
	});

	searchBtn.addEventListener("click", function () {
		currentQuery = searchInput.value.trim();
		currentPage = 1;
		performSearch(currentQuery, currentPage);
	});

	// 	/wp-admin/admin-ajax.php → è il file di WordPress che riceve e gestisce le chiamate AJAX.
	// action=custom_news_search → dice a WordPress quale funzione eseguire. È una specie di "nome comando".
	// term=... → è il valore che inserisce l’utente nella barra di ricerca (quello che vuoi cercare nel CPT news).

	let selectedPostType = "news"; // Post type attualmente selezionato

	function performSearch(query, page) {
		if (!query) {
			searchResults.innerHTML = "";
			searchFilters.innerHTML = "";
			noResults.classList.remove("d-none");
			noResults.innerHTML =
				'<p class="text-muted">Inserisci un termine di ricerca.</p>';
			pagination.innerHTML = "";
			return;
		} else {
			searchFilters.innerHTML = "";
			searchResults.innerHTML = "";
			noResults.classList.remove("d-none");
			noResults.innerHTML = '<p class="text-muted">Caricamento...</p>';
		}

		// Notare l'aggiunta di selectedPostType
		fetch(
			`/wp-admin/admin-ajax.php?action=custom_news_search&term=${encodeURIComponent(
				query,
			)}&page=${page}&post_type=${selectedPostType}`,
		)
			.then((response) => response.json())
			.then((data) => {
				console.log(data);
				if (data.posts.length > 0) {
					noResults.innerHTML = "";
					noResults.classList.add("d-none");

					const htmlResult = data.posts
						.map(
							(post) => `
						<div class="border border-1 rounded-2 shadow-sm p-4 mb-3">
							<div class="d-flex justify-content-between mb-2">
								<h6 class="text-uppercase text-muted mb-2">${post.post_type.toUpperCase()}</h6>
								<p class="text-muted mb-2">Data: 10/01/2025</p>
							</div>
							<a href="${post.link}"><h4>${post.title}</h4></a>
						</div>
					`,
						)
						.join("");

					searchResults.innerHTML = `<h5 class="mb-3">${
						selectedPostType.charAt(0).toUpperCase() +
						selectedPostType.slice(1).toLowerCase()
					} </h5>${htmlResult}`;

					const filterHtml = data.filtri
						.map((filter) => {
							// Controlla se il filtro è quello attivo
							const isActive = filter.name == selectedPostType;
							console.log(selectedPostType, filter.name, isActive);
							let textColor = "";

							if (isActive && filter.count > 0) {
								textColor = "text-primary clickable";
							} else if (!isActive && filter.count > 0) {
								textColor = "text-black clickable";
							} else if (filter.count == 0) {
								textColor = "disabled";
							}

							return `
							<li class="list-group-item ">
								<p class="${textColor} text-decoration-none fw-bold mb-0" data-post-type="${
									filter.name
								}" data-count="${filter.count}">
									${filter.name.charAt(0).toUpperCase() + filter.name.slice(1).toLowerCase()} (${
										filter.count
									})
								</p>
							</li>
						`;
						})
						.join("");

					searchFilters.innerHTML = `
					<h5 class="mb-3">Filtri</h5>
					<div class="card">
							<div class="card-body">
								<ul class="list-group list-group-flush">
									${filterHtml}
								</ul>
							</div>
						</div>
					`;

					updatePagination(data.current_page, data.max_num_pages);

					//this.dataset è un oggetto automatico che JavaScript crea  esso contiene tutti gli attributi data- di un elemento HTML.
					document.querySelectorAll("#searchFilters p").forEach((p) => {
						p.addEventListener("click", function (e) {
							e.preventDefault();
							const count = parseInt(this.dataset.count, 10);
							if (count === 0) {
								// Se il filtro ha 0 elementi, non fare nulla
								return;
							}
							selectedPostType = this.dataset.postType; // Cambio il post_type selezionato
							performSearch(query, 1); // Rifai la ricerca da pagina 1
						});
					});
				} else {
					noResults.classList.remove("d-none");
					searchResults.innerHTML = "";
					searchFilters.innerHTML = "";
					noResults.innerHTML =
						'<p class="text-muted">Nessun risultato trovato.</p>';
					pagination.innerHTML = "";
				}
			})
			.catch(() => {
				searchResults.innerHTML = "";
				searchFilters.innerHTML = "";
				noResults.innerHTML =
					'<p class="text-danger">Errore nella ricerca.</p>';
				pagination.innerHTML = "";
			});
	}

	function updatePagination(current, total) {
		let html = `
		<nav aria-label="Risultati ricerca">
			<ul class="pagination justify-content-center">
				<li class="page-item ${current <= 1 ? "disabled" : ""}">
					<a class="page-link" href="#" data-page="${current - 1}">&laquo;</a>
				</li>
				<li class="page-item disabled">
					<span class="page-link">${current} di ${total}</span>
				</li>
				<li class="page-item ${current >= total ? "disabled" : ""}">
					<a class="page-link" href="#" data-page="${current + 1}">&raquo;</a>
				</li>
			</ul>
		</nav>
	`;

		pagination.innerHTML = html;

		document.querySelectorAll("#pagination .page-link").forEach((el) => {
			el.addEventListener("click", function (e) {
				e.preventDefault();
				const page = parseInt(this.getAttribute("data-page"));
				if (!isNaN(page)) {
					currentPage = page;
					performSearch(currentQuery, currentPage);
				}
			});
		});
	}

	// Gestione chiusura svuotamenti input
	// e apertura del modal
	const openModal = () => {
		modal.classList.remove("d-none");
		overlay.classList.remove("d-none");
		searchInput.focus();
	};

	const closeModal = () => {
		modal.classList.add("d-none");
		overlay.classList.add("d-none");
		searchInput.value = "";
		clearBtn.classList.add("d-none");

		// Resetta i risultati
		const noResults = document.getElementById("noResults");
		const pagination = document.getElementById("pagination");
		if (noResults) searchFilters.innerHTML = "";
		searchResults.innerHTML = "";
		noResults.innerHTML =
			'<p class="text-muted">Inserisci un termine di ricerca.</p>';
		if (pagination) pagination.innerHTML = "";
	};

	openBtn.addEventListener("click", openModal);
	overlay.addEventListener("click", closeModal);

	searchInput.addEventListener("input", function () {
		clearBtn.classList.toggle("d-none", !this.value.length);
	});

	clearBtn.addEventListener("click", function () {
		searchInput.value = "";
		searchInput.focus();
		clearBtn.classList.add("d-none");
	});

	closeBtn.addEventListener("click", closeModal);
});
