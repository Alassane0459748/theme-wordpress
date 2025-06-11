<?php

/**
 * @Packge     : Digalu
 * @Version    : 1.0
 * @Author     : Digalu
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */


// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit;
}

if ( ! is_active_sidebar( 'digalu-blog-sidebar' ) ) {
    return;
}
?>

<div class="sidebar col-lg-4 col-md-12">
	<aside>
    <?php dynamic_sidebar( 'digalu-blog-sidebar' ); ?>
</aside>
</div>