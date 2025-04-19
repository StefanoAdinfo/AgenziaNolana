<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<div <?php echo get_block_wrapper_attributes(); ?>>
	<div class="search-button rounded-circle d-flex align-items-center justify-content-center ">
		<button id="openSearchModal"
			class="btn rounded-circle ">
			<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 256 256">
				<g fill="#0066cc" fill-rule="nonzero">
					<g transform="scale(5.12,5.12)">
						<path
							d="M21,3c-9.37891,0 -17,7.62109 -17,17c0,9.37891 7.62109,17 17,17c3.71094,0 7.14063,-1.19531 9.9375,-3.21875l13.15625,13.125l2.8125,-2.8125l-13,-13.03125c2.55469,-2.97656 4.09375,-6.83984 4.09375,-11.0625c0,-9.37891 -7.62109,-17 -17,-17zM21,5c8.29688,0 15,6.70313 15,15c0,8.29688 -6.70312,15 -15,15c-8.29687,0 -15,-6.70312 -15,-15c0,-8.29687 6.70313,-15 15,-15z">
						</path>
					</g>
				</g>
			</svg>
		</button>
	</div>

	<!-- Modale full screen -->
	<div id="searchModal" class="position-fixed top-0 start-0 w-100 vh-100 bg-white d-none" style="z-index: 1055;">
		<div class="container py-5 h-100 d-flex flex-column">
			<!-- X per chiudere la modale (in alto a destra) -->
			<div class="d-flex justify-content-end align-items-center mb-4" style="cursor: pointer;" id="closeSearchModal">
				<svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="close-btn">
					<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
					<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
					<g id="SVGRepo_iconCarrier">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M19.207 6.207a1 1 0 0 0-1.414-1.414L12 10.586 6.207 4.793a1 1 0 0 0-1.414 1.414L10.586 12l-5.793 5.793a1 1 0 1 0 1.414 1.414L12 13.414l5.793 5.793a1 1 0 0 0 1.414-1.414L13.414 12l5.793-5.793z"></path>
					</g>
				</svg>
			</div>

			<div class="d-flex align-items-center mb-4 mt-2 w-100">
				<!-- Campo di ricerca (90%) -->
				<div class="position-relative flex-grow-1 me-2">
					<input type="text" id="searchInput" class="form-control form-control-lg ps-5 pe-5" placeholder="Cerca..." />

					<!-- Lente -->
					<div class="position-absolute top-50 start-0 translate-middle-y ms-2 text-muted" style="pointer-events: none;">
						<!-- SVG lente -->
						<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 256 256">
							<g fill="#0066cc" fill-rule="nonzero">
								<g transform="scale(5.12,5.12)">
									<path
										d="M21,3c-9.37891,0 -17,7.62109 -17,17c0,9.37891 7.62109,17 17,17c3.71094,0 7.14063,-1.19531 9.9375,-3.21875l13.15625,13.125l2.8125,-2.8125l-13,-13.03125c2.55469,-2.97656 4.09375,-6.83984 4.09375,-11.0625c0,-9.37891 -7.62109,-17 -17,-17zM21,5c8.29688,0 15,6.70313 15,15c0,8.29688 -6.70312,15 -15,15c-8.29687,0 -15,-6.70312 -15,-15c0,-8.29687 6.70313,-15 15,-15z">
									</path>
								</g>
							</g>
						</svg>
					</div>

					<!-- X per cancellare -->
					<button id="clearSearch" class="btn d-none position-absolute top-50 end-0 translate-middle-y me-2">
						<!-- SVG X -->
						<svg width="30px" height="30px" viewBox="0 0 24 24" fill="none">
							<path fill-rule="evenodd" clip-rule="evenodd"
								d="M19.207 6.207a1 1 0 0 0-1.414-1.414L12 10.586 6.207 4.793a1 1 0 0 0-1.414 1.414L10.586 12l-5.793 5.793a1 1 0 1 0 1.414 1.414L12 13.414l5.793 5.793a1 1 0 0 0 1.414-1.414L13.414 12l5.793-5.793z"
								fill="#000000"></path>
						</svg>
					</button>
				</div>


				<div style="width: 8%;" class="mx-2">
					<button id="searchButton" class="btn btn-primary w-100 rounded-2">
						Cerca
					</button>
				</div>
			</div>


			<!-- Risultati statici -->
			<div id="searchResults" class="mt-3">
				<p class="text-muted">Inserisci un termine di ricerca</p>
			</div>
			<div id="pagination" class="mt-3 text-center"></div>
		</div>
	</div>

	<!-- Overlay per chiudere -->
	<div id="searchOverlay" class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-none" style="z-index: 1054;"></div>
</div>