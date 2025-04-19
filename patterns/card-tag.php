<?php

/**
 * Title: Card Tag
 * Slug: pa-centrale/card-tag
 * Category: pa-centrale
 * Description: Card with img, tags, date, title, content and read more link
 * 
 * 
 * @package pa-centrale
 * @since 1.0.0
 */
?>

<!-- wp:group {"style":{"shadow":"var:preset|shadow|natural"},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="box-shadow:var(--wp--preset--shadow--natural)"><!-- wp:post-featured-image /-->

    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1200px","wideSize":"1300px"}} -->
    <div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
        <div class="wp-block-group"><!-- wp:post-terms {"term":"post_tag","prefix":"Tags: ","style":{"border":{"radius":"5px"}},"backgroundColor":"gray-medium"} /-->

            <!-- wp:post-date {"format":"F j, Y","fontSize":"small"} /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:post-title {"level":6,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-blue"}}}},"textColor":"light-blue"} /-->

        <!-- wp:post-excerpt /-->

        <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
        <div class="wp-block-group"><!-- wp:read-more {"content":"\u003cstrong\u003eLeggi di più  -\u003e\u003c/strong\u003e","style":{"elements":{"link":{"color":{"text":"var:preset|color|light-blue"}}}},"textColor":"light-blue"} /--></div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->