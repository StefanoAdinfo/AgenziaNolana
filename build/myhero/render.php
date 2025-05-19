<?php
// Attributi
$slides = $attributes['slides'] ?? [];
$autoplay = $attributes['autoplay'] ?? false;

?>
<div class="myhero-block">
	<div class="myhero-swiper-container">
		<div class="swiper-wrapper">
			<?php foreach ($slides as $slide) : ?>
				<div class="swiper-slide" style="background-image: url('<?php echo esc_url($slide['backgroundImage']); ?>');">
					<!-- Titolo e Sottotitolo -->
					<div class="text-center myhero-slide-text">
						<h2><?php echo esc_html($slide['title']); ?></h2>
						<p><?php echo esc_html($slide['subtitle']); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
			<!-- Paginazione -->
		</div>

		<div class="swiper-pagination"></div>
	</div>



</div>


<script>
	document.addEventListener('DOMContentLoaded', function() {
		if (typeof Swiper !== "undefined") {
			new Swiper('.myhero-swiper-container', {
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