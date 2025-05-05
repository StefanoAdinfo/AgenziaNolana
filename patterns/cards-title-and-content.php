<?php

/**
 * Title: CardS Title and Content
 * Slug: agenzia-nolana/cards-title-and-content
 * Description: CardS Title and Content
 * Category: agenzia-nolana
 * 
 * 
 *
 * @package agenzia-nolana
 * @since 1.0.0
 */
?>



<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:query {"queryId":16,"query":{"perPage":10,"pages":0,"offset":0,"postType":"servizi","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[],"format":[]}} -->
        <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
            <!-- wp:pattern {"slug":"agenzia-nolana/card-tag"} -->
            <!-- /wp:post-template -->

            <!-- wp:query-no-results -->
            <!-- wp:paragraph {"align":"center","placeholder":"Add text or blocks that will display when a query returns no results."} -->
            <p class="has-text-align-center">Nessun Servizio</p>
            <!-- /wp:paragraph -->
            <!-- /wp:query-no-results -->

            <!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
            <!-- wp:query-pagination-previous {"label":"\u003c\u003c"} /-->

            <!-- wp:query-pagination-numbers /-->

            <!-- wp:query-pagination-next {"label":"\u003e\u003e"} /-->
            <!-- /wp:query-pagination -->
        </div>
        <!-- /wp:query -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->