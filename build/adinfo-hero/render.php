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
	<div class="splide  adinfo-hero-render adinfo-hero" data-splide='<?php echo esc_attr(wp_json_encode($carousel_options)); ?>'>
		<div class="splide__track ">
			<div class="splide__pagination"></div>
			<div class="splide__list it-dark it-overlay">
				<?php foreach ($slides as $slide) :

				?>
					<div class="splide__slide it-hero-wrapper it-dark it-overlay">
						<!-- Immagine di sfondo -->
						<div class="img-responsive-wrapper">
							<div class="img-responsive">
								<div class="img-wrapper">
									<?php if (! empty($slide['backgroundImage'])) : ?>
										<img src="<?php echo esc_url($slide['backgroundImage']); ?>"
											alt="<?php echo esc_attr($slide['title'] ?? ''); ?>"
											title="<?php echo esc_attr($slide['title'] ?? ''); ?>">
									<?php endif; ?>
								</div>
							</div>
						</div>

						<!-- Contenuto slide -->
						<div class="container">
							<div class="row">
								<div class="col-12">
									<div class="it-hero-text-wrapper bg-dark text-white">
										<?php if (! empty($slide['overline'])) : ?>
											<span class="it-category"><?php echo esc_html($slide['overline']); ?></span>
										<?php endif; ?>

										<?php if (! empty($slide['title'])) : ?>
											<h2><?php echo esc_html($slide['title']); ?></h2>
										<?php endif; ?>

										<?php if (! empty($slide['subtitle'])) : ?>
											<p class="d-none d-lg-block"><?php echo esc_html($slide['subtitle']); ?></p>
										<?php endif; ?>

										<?php if (! empty($slide['buttonText'])) : ?>
											<div class="it-btn-container">
												<a href="<?php echo esc_url($slide['buttonLink'] ?? '#'); ?>"
													class="btn btn-sm btn-secondary text-white text-decoration-none">
													<?php echo esc_html($slide['buttonText']); ?>
												</a>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>