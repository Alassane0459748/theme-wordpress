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
        exit();
    }

    if( class_exists( 'ReduxFramework' ) ) {
        $digalu404title        = digalu_opt( 'digalu_fof_title' );
        $digalu404subtitle     = digalu_opt( 'digalu_fof_subtitle' );
        $digalu404description  = digalu_opt( 'digalu_fof_description' );
        $digalu404btntext      = digalu_opt( 'digalu_fof_btn_text' );
    } else {
        $digalu404title        = __( '404', 'digalu' );
        $digalu404subtitle     = __( 'Oops! That page can’t be found', 'digalu' );
        $digalu404description  = __( 'Sorry, but the page you are looking for does not existing', 'digalu' );
        $digalu404btntext      = __( ' Back To Home', 'digalu');    
    }


    // get header
    get_header();

    echo '<div class="error-page-area text-center default-padding">';
        echo '<div class="container">';
            echo '<div class="row align-center">';
                echo '<div class="col-lg-8 offset-lg-2">';
                    echo '<div class="error-box">';
                        echo '<h1>'.esc_html( $digalu404title ).'</h1>';
                        echo '<h2>'.esc_html( $digalu404subtitle ).'</h2>';
                        echo '<p>'.esc_html( $digalu404description ).'</p>';
                        echo '<a class="btn circle btn-theme effect btn-md" href="'.esc_url( home_url('/') ).'">'.esc_html( $digalu404btntext ).'</a>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';

    //footer
    get_footer();