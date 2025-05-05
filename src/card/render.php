<?php
$image = $attributes['image'] ?? '';
$title = $attributes['title'] ?? '';
$content = $attributes['content'] ?? '';
$date = $attributes['date'] ?? '';
$badge = $attributes['badge'] ?? '';
$linkText = $attributes['linkText'] ?? '';
$direction = $attributes['direction'] ?? '';

?>

<div <?php echo get_block_wrapper_attributes(['class'  => 'card ' .  $direction]); ?>>
	<?php if ($image): ?>
		<div>
			<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" />
		</div>
	<?php endif; ?>

	<div class="bg-danger">

		<div class="d-flex flex-column justify-content-between h-auto w-100">
			<!-- Header con badge e data -->
			<div>
				<div class="d-flex justify-content-between align-items-start mb-4">
					<span class="badge bg-secondary fw-bold fs-6">
						<?php echo !empty($badge) ? esc_html($badge) : 'Nessun badge'; ?>
					</span>

					<small class="text-muted">
						<?php echo !empty($date) ? esc_html($date) : 'Nessuna data'; ?>
					</small>
				</div>

				<!-- Corpo principale -->
				<div>
					<h4 class="text-primary fw-bold">
						<?php echo !empty($title) ? esc_html($title) : 'Nessun Titolo'; ?>
					</h4>
					<p class="mb-4">
						<?php echo !empty($content) ? esc_html($content) : 'Nessun Contenuto'; ?>
					</p>
				</div>
			</div>

			<!-- Link in basso -->
			<div class="mb-3">
				<a href="#" class="text-primary fw-bold text-uppercase small">
					<?php echo !empty($linkText) ? esc_html($linkText) : 'Nessun Link'; ?>
				</a>
			</div>
		</div>
	</div>
</div>