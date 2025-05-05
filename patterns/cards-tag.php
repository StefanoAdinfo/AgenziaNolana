<?php

/**
 * Title: Cards Tag
 * Slug: AgenziaNolana/cards-tag
 * Category: AgenziaNolana
 * Description: Cards Tag
 * 
 * 
 * @package AgenziaNolana
 * @since 1.0.0
 */
?>


<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center"} -->
    <h2 class="wp-block-heading has-text-align-center"><a href="http://localhost:10003/news/" data-type="page" data-id="36">News</a></h2>
    <!-- /wp:heading -->

    <!-- wp:group {"layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:query {"queryId":16,"query":{"perPage":10,"pages":0,"offset":0,"postType":"news","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[],"format":[]}} -->
        <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
            <!-- wp:pattern {"slug":"AgenziaNolana/card-tag"} -->
            <!-- /wp:post-template -->

            <!-- wp:query-no-results -->
            <!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
            <p>Nessuna Notizia</p>
            <!-- /wp:paragraph -->
            <!-- /wp:query-no-results -->
        </div>
        <!-- /wp:query -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->