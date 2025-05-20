 <!-- <?php
		$slides = $attributes['slides'] ?? [];
		$autoplay = $attributes['autoplay'] ?? false;

		?> -->
 <!--
<div <?php echo get_block_wrapper_attributes(); ?>>
	<div class="it-carousel-wrapper it-carousel-landscape-abstract-three-cols splide">
		<div class="splide__track pl-lg-3 pr-lg-3">
			<div class="splide__list it-carousel-all">

				<div class="splide__slide">
					<div class="it-single-slide-wrapper">


					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->





 <?php
	$slides = $attributes['slides'] ?? [];
	$autoplay = $attributes['autoplay'] ?? false;

	$carousel_options = [
		"type" => "fade",
		"perPage" => 1,
		"autoplay" => $autoplay,
		"pagination" => true,
		"arrows" => false,
		"rewind" => false,
		"drag" => false,
	];

	?>
 <div <?php echo get_block_wrapper_attributes(["class" => "carusel-hero"]); ?>>
 	<div class="splide" data-splide='<?php echo wp_json_encode($carousel_options); ?>'>
 		<div class="splide__track">
 			<div class="splide__list">
 				<?php foreach ($slides as $slide) :
						$backgroundImage = !empty($slide['backgroundImage']) ? "background-image: url('{$slide['backgroundImage']}');" : '';
					?>
 					<div class="splide__slide d-flex align-items-center justify-content-center bg-light" style="<?php echo esc_attr($backgroundImage); ?> background-size: cover; background-position: center; min-height: 400px;">
 						<div class="slide-content-wrapper container">
 							<div class="it-hero-text-wrapper slide-content">
 								<?php if (!empty($slide['overline'])) : ?>
 									<h5 class="it-category"><?php echo esc_html($slide['overline']); ?></h5>
 								<?php endif; ?>

 								<?php if (!empty($slide['title'])) : ?>
 									<h2><?php echo esc_html($slide['title']); ?></h2>
 								<?php endif; ?>

 								<?php if (!empty($slide['subtitle'])) : ?>
 									<p><?php echo esc_html($slide['subtitle']); ?></p>
 								<?php endif; ?>

 								<?php if (!empty($slide['buttonText'])): ?>
 									<div class="it-btn-container mb-3">
 										<!-- <?php echo ($slide['buttonText']); ?> -->
 										<a
 											href="<?php echo esc_url($slide['buttonLink']['url']); ?>"
 											<?php if (!empty($slide['buttonLink']['opensInNewTab'])) echo 'target="_blank" rel="noopener noreferrer"'; ?>
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