<?php
$titolo_carosello = $attributes['titolo_carosello'] ?? '';
$slides = $attributes['slides'] ?? [];
$autoplay = $attributes['autoplay'] ?? true;

$carousel_options = [
	"type"       => "loop",
	"padding"    => "15rem",
	"autoplay"   => $autoplay,
	"pagination" => true,
	"arrows"     => false,
	"rewind"     => false,
	"gap"        => "1rem",
	"focus"      => "center",
	"breakpoints" => [
		"992" => [
			"padding" => "15rem",
			"gap"     => "1rem",
			"focus"   => "center",
		],
		"768" => [
			"padding" => "15rem",

		],
		"480" => [
			"padding" => "15rem",
			"gap"     => "1rem",
			"focus"   => "center",
		],
	],
];
?>

<div <?php echo get_block_wrapper_attributes(); ?>>
	<div class="container overflow-hidden it-carousel-wrapper adinfo-carusel-render adinfo-carusel">
		<?php if (!empty($titolo_carosello)) : ?>
			<div class="it-header-block">
				<div class="it-header-block-title">
					<h2><?php echo esc_html($titolo_carosello); ?></h2>
				</div>
			</div>
		<?php endif; ?>

		<div class="splide adinfo-carusel-render" data-splide='<?php echo esc_attr(wp_json_encode($carousel_options)); ?>'>
			<div class="splide__track">
				<div class="splide__list">
					<?php foreach ($slides as $slide) : ?>
						<div class="splide__slide bg-light">
							<img
								src="<?php echo esc_url($slide['image']); ?>"
								alt="<?php echo esc_attr__('Slide image', 'text-domain'); ?>" />
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>