<?php
$slides = $attributes['slides'] ?? [];
$autoplay = $attributes['autoplay'] ?? false;

$carousel_options = [
	"type"       => "fade",
	"rewind" => true,
	"perPage"    => 1,
	"autoplay"   => $autoplay,
	"pagination" => true,
	"arrows"     => false,
];
?>

<div <?php echo get_block_wrapper_attributes(); ?>>
	<div class="splide carusel-hero" data-splide='<?php echo esc_attr(wp_json_encode($carousel_options)); ?>'>
		<div class="splide__track ">
			<div class="splide__pagination"></div>
			<div class="splide__list">
				<?php foreach ($slides as $slide) :
					$style = '';
					if (! empty($slide['backgroundImage'])) {
						$url   = esc_url($slide['backgroundImage']);
						$style = "background-image: url('{$url}'); background-size: cover; background-position: center; min-height: 400px;";
					}
				?>
					<div class="splide__slide d-flex align-items-center justify-content-center bg-light" style="<?php echo esc_attr($style); ?>">
						<div class="slide-content-wrapper container">
							<div class="it-hero-text-wrapper slide-content">
								<?php if (! empty($slide['overline'])) : ?>
									<h5 class="it-category"><?php echo esc_html($slide['overline']); ?></h5>
								<?php endif; ?>

								<?php if (! empty($slide['title'])) : ?>
									<h2><?php echo esc_html($slide['title']); ?></h2>
								<?php endif; ?>

								<?php if (! empty($slide['subtitle'])) : ?>
									<p><?php echo esc_html($slide['subtitle']); ?></p>
								<?php endif; ?>

								<?php if (! empty($slide['buttonText'])) : ?>
									<div class="it-btn-container mb-3">
										<a
											href="<?php echo esc_url($slide['buttonLink'] ?? '#'); ?>"
											<?php if (! empty($slide['buttonLink']['opensInNewTab'])) : ?>
											target="_blank" rel="noopener noreferrer"
											<?php endif; ?>
											class="btn btn-sm btn-secondary text-white text-decoration-none">
											<?php echo esc_html($slide['buttonText']); ?>
										</a>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

	</div>
</div>