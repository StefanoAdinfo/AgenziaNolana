<?php
$post_id = get_the_ID();

if (!$post_id) return;

$image_url = get_the_post_thumbnail_url($post_id, 'medium');
$acf_caption = get_field('caption', $post_id);
$acf_video_link = get_field('video_link', $post_id);


// Estrai l'ID del video YouTube
$youtube_id = '';
if ($acf_video_link && preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([\w\-]+)/', $acf_video_link, $matches)) {
	$youtube_id = $matches[1];
}

?>

<div class="mb-4">
	<div class="modale-card" data-bs-toggle="modal" data-bs-target="#modal-<?php echo esc_attr($post_id); ?>">
		<?php if ($youtube_id): ?>
			<!-- Preview YouTube con bottone play -->
			<div class="position-relative">
				<img src="https://img.youtube.com/vi/<?php echo esc_attr($youtube_id); ?>/hqdefault.jpg" class="card-img-top" alt="Video Preview">
				<div class="position-absolute top-50 start-50 translate-middle">
					<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="white" class="bi bi-play-circle-fill" viewBox="0 0 16 16">
						<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.271 5.055A.5.5 0 0 0 5.5 5.5v5a.5.5 0 0 0 .771.424l4-2.5a.5.5 0 0 0 0-.848l-4-2.5z" />
					</svg>
				</div>
			</div>
		<?php elseif ($image_url): ?>
			<img src="<?php echo esc_url($image_url); ?>" class="card-img-top" alt="">
		<?php endif; ?>
		<div class="card-body mt-3">
			<p class="fs-6"><?php echo esc_html($acf_caption); ?></p>
		</div>
	</div>

	<div class="modal fade flex justify-content-center align-content-center" id="modal-<?php echo esc_attr($post_id); ?>" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-lg ">
			<div class="modal-content">
				<div class="p-4">
					<?php if ($youtube_id): ?>
						<div class="ratio ratio-16x9">
							<iframe src="https://www.youtube.com/embed/<?php echo esc_attr($youtube_id); ?>?autoplay=1&rel=0"
								title="YouTube video" allow=" encrypted-media" allowfullscreen id="video-<?php echo esc_attr($post_id); ?>"></iframe>
						</div>
					<?php elseif ($image_url): ?>
						<img src="<?php echo esc_url($image_url); ?>" class="img-fluid w-100" alt="">
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>