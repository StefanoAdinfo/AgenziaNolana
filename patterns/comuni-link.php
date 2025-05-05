<?php

/**
 * Title: Comuni link
 * Slug: AgenziaNolana/comuni-link
 * Category: AgenziaNolana
 * Description: Comuni link
 * 
 * 
 *
 * @package AgenziaNolana
 * @since 1.0.0
 */
?>


<!-- wp:group {"backgroundColor":"light-blue","layout":{"type":"default"}} -->
<div class="wp-block-group has-light-blue-background-color has-background"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60","padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
        <h2 class="wp-block-heading has-base-color has-text-color has-link-color">I comuni</h2>
        <!-- /wp:heading -->
        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained","contentSize":"1200px","wideSize":"1300px"}} -->
        <div class="wp-block-group">
            <!-- wp:query {"query":{"postType":"comuni","perPage":3},"displayLayout":{"type":"flex","columns":3}} -->
            <div class="wp-block-query">
                <!-- wp:post-template -->
                <!-- wp:pattern {"slug":"AgenziaNolana/arrow-link"}  /-->
                <!-- /wp:post-template -->
            </div>
            <!-- /wp:query -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->