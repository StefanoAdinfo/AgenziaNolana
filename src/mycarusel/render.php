<?php
// Carica Swiper CSS e JS da CDN
wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css');
wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', [], null, true);

// Attributi
$post_type            = $attributes['postType'] ?? 'post';
$show_title           = $attributes['showTitle'] ?? true;
$show_excerpt         = $attributes['showExcerpt'] ?? true;
$show_featured_image  = $attributes['showFeaturedImage'] ?? true;
$autoplay             = $attributes['autoplay'] ?? true;
$slides_per_view      = $attributes['slidesPerView'] ?? 1;

// Query CPT
$query = new WP_Query([
	'post_type'      => $post_type,
	'posts_per_page' => -1,
]);

if (!$query->have_posts()) {
	return '<p>Nessun contenuto trovato.</p>';
}
?>

<div class="swiper carusel-block">
	<div class="swiper-wrapper">
		<?php while ($query->have_posts()) : $query->the_post(); ?>
			<div class="swiper-slide">
				<div class="carusel-slide-inner">
					<?php if ($show_featured_image && has_post_thumbnail()) : ?>
						<div class="carusel-img">
							<?php the_post_thumbnail('medium'); ?>
						</div>
					<?php endif; ?>

					<?php if ($show_title && get_the_title()) : ?>
						<h3 class="carusel-title"><?php the_title(); ?></h3>
					<?php endif; ?>

					<?php if ($show_excerpt && get_the_excerpt()) : ?>
						<p class="carusel-excerpt"><?php the_excerpt(); ?></p>
					<?php endif; ?>
				</div>
			</div>
		<?php endwhile;
		wp_reset_postdata(); ?>
	</div>

	<div class="swiper-pagination"></div>
	<div class="swiper-button-prev"></div>
	<div class="swiper-button-next"></div>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		if (typeof Swiper !== "undefined") {
			new Swiper('.carusel-block', {
				loop: true,
				slidesPerView: <?php echo esc_js($slides_per_view); ?>,
				autoplay: <?php echo $autoplay ? '{ delay: 3000 }' : 'false'; ?>,
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				},
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