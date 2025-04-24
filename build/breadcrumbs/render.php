<?php


function custom_render_breadcrumb()
{
	$separator = ' / ';
	$home_title = 'Home';

	echo '<nav class="custom-breadcrumb fs-5 fw-medium mb-4" aria-label="breadcrumb">';
	echo '<a class="text-decoration-none me-1" href="' . home_url() . '">' . $home_title . '</a>';

	if (is_singular()) {
		$post_type = get_post_type(); // Ottieni lo slug del CPT

		if ($post_type !== 'post' && $post_type !== 'page') {
			$parent_page = get_page_by_path($post_type);
			if ($parent_page) {
				echo '<span class="mx-1">' . $separator . '</span>';
				echo '<a class="text-decoration-none me-1" href="' . get_permalink($parent_page->ID) . '">' . get_the_title($parent_page->ID) . '</a>';
			}
		}

		echo '<span class="mx-1">' . $separator . '</span>';
		echo '<span class="text-secondary">' . get_the_title() . '</span>';
	} elseif (is_single()) {
		$category = get_the_category();
		if (!empty($category)) {
			echo '<span class="mx-1">' . $separator . '</span>';
			echo '<a class="text-decoration-none me-1" href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->name . '</a>';
		}
		echo '<span class="mx-1">' . $separator . '</span>';
		echo '<span class="text-secondary">' . get_the_title() . '</span>';
	} elseif (is_page()) {
		global $post;
		if ($post->post_parent) {
			$ancestors = array_reverse(get_post_ancestors($post->ID));
			foreach ($ancestors as $ancestor) {
				echo '<span class="mx-1">' . $separator . '</span>';
				echo '<a class="text-decoration-none me-1" href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a>';
			}
		}
		echo '<span class="mx-1">' . $separator . '</span>';
		echo '<span class="text-secondary">' . get_the_title() . '</span>';
	} elseif (is_category()) {
		echo '<span class="mx-1">' . $separator . '</span>';
		echo '<span class="text-secondary">' . single_cat_title('', false) . '</span>';
	} elseif (is_search()) {
		echo '<span class="mx-1">' . $separator . '</span>';
		echo '<span class="text-secondary">Risultati per: ' . get_search_query() . '</span>';
	}

	echo '</nav>';
}




?>
<p <?php echo get_block_wrapper_attributes(); ?>>
	<?php custom_render_breadcrumb(); ?>
</p>