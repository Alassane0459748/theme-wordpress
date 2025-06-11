<?php
/**
 * @Packge     : Digalu
 * @Version    : 1.0
 * @Author     : Digalu
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
    /**
    *
    * Hook for Footer Content
    *
    * Hook digalu_footer_content
    *
    * @Hooked digalu_footer_content_cb 10
    *
    */
    do_action( 'digalu_footer_content' );


    wp_footer();
    ?>
</body>
</html>