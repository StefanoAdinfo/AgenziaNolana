<?php
// Attributi
$slides = $attributes['slides'] ?? [];
$autoplay = $attributes['autoplay'] ?? false;
$icons = $attributes['icons'] ?? [];
?>
<div class="hero-block">
	<div class="hero-swiper-container">
		<div class="swiper-wrapper">
			<?php foreach ($slides as $slide) : ?>
				<div class="swiper-slide" style="background-image: url('<?php echo esc_url($slide['backgroundImage']); ?>');">
					<!-- Titolo e Sottotitolo -->
					<div class="text-center slide-text">
						<h2><?php echo esc_html($slide['title']); ?></h2>
						<p><?php echo esc_html($slide['subtitle']); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
			<!-- Paginazione -->
		</div>

		<div class="swiper-pagination"></div>
	</div>

	<!-- Icone Fisse Sopra la Slide -->
	<div class=" icons-above-slider w-100">
		<div class="row gap-4">
			<?php foreach ($icons as $icon) : ?>
				<div class="circle-icon col-4">
					<p class="icon-title fw-light">
						<?php echo esc_html($icon['title']); ?>
					</p>
					<?php
					// Ottieni l'URL completo 
					$url = $icon['icon'];

					// Ottieni la base dell'upload dir
					$upload_dir = wp_get_upload_dir(); // ti dà 'baseurl' e 'basedir'

					// Sostituisci la parte URL con il percorso reale del server
					$svg_path = str_replace($upload_dir['baseurl'], $upload_dir['basedir'], $url);
					if (file_exists($svg_path)) {

						$svg = file_get_contents($svg_path);

						// Applica modifiche al contenuto SVG
						$svg = preg_replace('/<svg\b([^>]*)>/', '<svg class="icon-svg my-2"$1>', $svg);
						$svg = preg_replace('/fill="[^"]*"/', 'fill="currentColor"', $svg);

						echo $svg;
					}
					?>
					<a href="<?php echo isset($icon['url']) && (strpos($icon['url'], 'http://') === 0 || strpos($icon['url'], 'https://') === 0) ? esc_url($icon['url']) : '#'; ?>">
						<?php
						// Path del file SVG
						$svg_path = get_template_directory() . '/assets/svg/arrow-down-angle-svgrepo-com.svg';

						// Controlla se il file esiste
						if (file_exists($svg_path)) {
							// Carica il contenuto SVG
							$svg = file_get_contents($svg_path);

							// Aggiungi le classi e cambia il fill in currentColor
							$svg = preg_replace('/<svg\b([^>]*)>/', '<svg class="icon-svg-arrow"$1>', $svg);
							$svg = preg_replace('/fill="[^"]*"/', 'fill="currentColor"', $svg);

							// Stampa l'SVG modificato
							echo $svg;
						}
						?>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>


<script>
	document.addEventListener('DOMContentLoaded', function() {
		if (typeof Swiper !== "undefined") {
			new Swiper('.hero-swiper-container', {
				allowTouchMove: false,
				loop: true,
				slidesPerView: 1,
				effect: 'fade',
				fadeEffect: {
					crossFade: true,
					speed: 3000,
				},
				autoplay: <?php echo $autoplay ? '{ delay: 5000 }' : 'false'; ?>,
				pagination: {
					el: '.swiper-pagination',
					clickable: true,
				},
			});
		} else {
			console.warn("Swiper non è stato caricato.");
		}
	});
</script>