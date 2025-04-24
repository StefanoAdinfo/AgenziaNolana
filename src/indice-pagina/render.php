<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<p <?php echo get_block_wrapper_attributes(); ?>>
<div class="accordion border-0 " id="accordionExample">
	<div class="accordion-item border-0">
		<h2 class="accordion-header">
			<button class="accordion-button indice-title bg-transparent border-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				INDICE DELLA PAGINA
			</button>
		</h2>
		<div class="indice-bar">
			<div class="indice-bar-fill"></div>
		</div>

		<div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
			<div class="accordion-body">
				<ul class="indice-list">
					<li class="indice-item ">
						<a href="#descrizione">Descrizione</a>
					</li>
					<li class="indice-item">
						<a href="#a-cura-di">A cura di</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
</p>