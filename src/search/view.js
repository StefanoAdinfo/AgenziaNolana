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
document.addEventListener( 'DOMContentLoaded', function () {
	const openBtn = document.getElementById( 'openSearchModal' );
	const modal = document.getElementById( 'searchModal' );
	const overlay = document.getElementById( 'searchOverlay' );
	const clearBtn = document.getElementById( 'clearSearch' );
	const closeBtn = document.getElementById( 'closeSearchModal' );

	const searchInput = document.getElementById( 'searchInput' );
	const searchBtn = document.getElementById( 'searchButton' );
	const searchResults = document.getElementById( 'searchResults' );
	const pagination = document.getElementById( 'pagination' );

	let currentQuery = '';
	let currentPage = 1;

	searchInput.addEventListener( 'keydown', function ( event ) {
		if ( event.key === 'Enter' ) {
			event.preventDefault();
			searchBtn.click();
		}
	} );

	searchBtn.addEventListener( 'click', function () {
		currentQuery = searchInput.value.trim();
		currentPage = 1;
		performSearch( currentQuery, currentPage );
	} );

	// 	/wp-admin/admin-ajax.php → è il file di WordPress che riceve e gestisce le chiamate AJAX.
	// action=custom_news_search → dice a WordPress quale funzione eseguire. È una specie di "nome comando".
	// term=... → è il valore che inserisce l’utente nella barra di ricerca (quello che vuoi cercare nel CPT news).
	function performSearch( query, page ) {
		if ( ! query ) {
			searchResults.innerHTML =
				'<p class="text-muted">Inserisci un termine di ricerca.</p>';
			pagination.innerHTML = '';
			return;
		} else {
			searchResults.innerHTML =
				'<p class="text-muted">Caricamento...</p>';
		}

		fetch(
			`/wp-admin/admin-ajax.php?action=custom_news_search&term=${ encodeURIComponent(
				query
			) }&page=${ page }`
		)
			.then( ( response ) => response.json() )
			.then( ( data ) => {
				if ( data.posts.length > 0 ) {
					const html = data.posts
						.map(
							( post ) =>
								`<li><a href="${ post.link }"><h4>${ post.title }</h4></a></li>`
						)
						.join( '' );
					searchResults.innerHTML = `<ul>${ html }</ul>`;

					updatePagination( data.current_page, data.max_num_pages );
				} else {
					searchResults.innerHTML =
						'<p class="text-muted">Nessun risultato trovato.</p>';
					pagination.innerHTML = '';
				}
			} )
			.catch( () => {
				searchResults.innerHTML =
					'<p class="text-danger">Errore nella ricerca.</p>';
				pagination.innerHTML = '';
			} );
	}

	function updatePagination( current, total ) {
		let html = `
		<nav aria-label="Risultati ricerca">
			<ul class="pagination justify-content-center">
				<li class="page-item ${ current <= 1 ? 'disabled' : '' }">
					<a class="page-link" href="#" data-page="${ current - 1 }">&laquo;</a>
				</li>
				<li class="page-item disabled">
					<span class="page-link">${ current } di ${ total }</span>
				</li>
				<li class="page-item ${ current >= total ? 'disabled' : '' }">
					<a class="page-link" href="#" data-page="${ current + 1 }">&raquo;</a>
				</li>
			</ul>
		</nav>
	`;

		pagination.innerHTML = html;

		document
			.querySelectorAll( '#pagination .page-link' )
			.forEach( ( el ) => {
				el.addEventListener( 'click', function ( e ) {
					e.preventDefault();
					const page = parseInt( this.getAttribute( 'data-page' ) );
					if ( ! isNaN( page ) ) {
						currentPage = page;
						performSearch( currentQuery, currentPage );
					}
				} );
			} );
	}

	// Gestione chiusura svuotamenti input
	// e apertura del modal
	const openModal = () => {
		modal.classList.remove( 'd-none' );
		overlay.classList.remove( 'd-none' );
		searchInput.focus();
	};

	const closeModal = () => {
		modal.classList.add( 'd-none' );
		overlay.classList.add( 'd-none' );
		searchInput.value = '';
		clearBtn.classList.add( 'd-none' );

		// Resetta i risultati
		const results = document.getElementById( 'searchResults' );
		const pagination = document.getElementById( 'pagination' );
		if ( results )
			results.innerHTML =
				'<p class="text-muted">Inserisci un termine di ricerca</p>';
		if ( pagination ) pagination.innerHTML = '';
	};

	openBtn.addEventListener( 'click', openModal );
	overlay.addEventListener( 'click', closeModal );

	searchInput.addEventListener( 'input', function () {
		clearBtn.classList.toggle( 'd-none', ! this.value.length );
	} );

	clearBtn.addEventListener( 'click', function () {
		searchInput.value = '';
		searchInput.focus();
		clearBtn.classList.add( 'd-none' );
	} );

	closeBtn.addEventListener( 'click', closeModal );
} );
