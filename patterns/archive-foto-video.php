<?php

/**
 * Title: Archive Foto Video
 * Slug: pa-centrale/archive-foto-video
 * Description: Archive page for Foto Video
 * Category: pa-centrale
 * 
 * 
 *
 * @package pa-centrale
 * @since 1.0.0
 */
?>

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:query {"queryId":19,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[],"format":[]}} -->
    <div class="wp-block-query">
        <!-- wp:post-template -->
        <!-- wp:pattern {"slug":"pa-centrale/foto-video-card"} /-->
        <!-- /wp:post-template -->

        <!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
        <!-- wp:query-pagination-previous {"label":"\u003c\u003c"} /-->

        <!-- wp:query-pagination-numbers /-->

        <!-- wp:query-pagination-next {"label":"\u003e\u003e"} /-->
        <!-- /wp:query-pagination -->

        <!-- wp:query-no-results -->
        <!-- wp:paragraph {"align":"center","placeholder":"Add text or blocks that will display when a query returns no results."} -->
        <p class="has-text-align-center">Nessun Contenuto</p>
        <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->