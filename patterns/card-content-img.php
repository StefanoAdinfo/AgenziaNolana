<?php

/**
 * Title: Card  Content Img
 * Slug: agenzia-nolana/card-content-img
 * Description: Card with img, tags, date, title, content and read more link
 * Category: agenzia-nolana
 * 
 * 
 *
 * @package agenzia-nolana
 * @since 1.0.0
 */
?>



<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"grid","columnCount":2,"minimumColumnWidth":null}} -->
    <div class="wp-block-group">
        <!-- wp:group {"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"><!-- wp:post-title /-->
            <?php echo ($title); ?>

            <!-- wp:post-excerpt /-->
            <!-- wp:html -->
            <div class="wp-block-html">
                <p><a class="wp-block-read-more__link fw-bold has-light-blue-color has-text-color has-link-color" href="http://newagenzianolanaportatile.local/agenzia/agenzia/">L'Agenzia →</a> </p>
                <p><a class="wp-block-read-more__link fw-bold has-light-blue-color has-text-color has-link-color" href="http://newagenzianolanaportatile.local/agenzia/obiettivi/">Gli Obbiettivi →</a></p>
                <p><a class="wp-block-read-more__link fw-bold has-light-blue-color has-text-color has-link-color" href="http://newagenzianolanaportatile.local/agenzia/territorio/">Il Territorio →</a></p>
            </div>
            <!-- /wp:html -->
        </div>
        <!-- /wp:group -->
        <!-- wp:post-featured-image /-->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->