<?php
/**
 * @Packge     : Digalu
 * @Version    : 1.0
 * @Author     : Digalu
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 * Template Name: Coming Soon Page
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    if( class_exists( 'ReduxFramework' ) ) {
        $digalucoming_soontitle     = digalu_opt( 'digalu_coming_soon_title' );
        $digalucoming_soonsubtitle  = digalu_opt( 'digalu_coming_soon_subtitle' );
        $digalucoming_soonbtntext   = digalu_opt( 'digalu_coming_soon_btn_text' );
    } else {
        $digalucoming_soontitle     = __( 'Website Under Construction', 'digalu' );
        $digalucoming_soonsubtitle  = __( 'Website Under Construction. Work Is Going On For The Website Please Stay With Us.', 'digalu' );
        $digalucoming_soonbtntext   = __( 'Return To Home', 'digalu' );
    }


    // get header
    get_header();

    echo '<section class="vs-error-wrapper space">';
        echo '<div class="container">';
            echo '<div class="error-content text-center">';
                if( ! empty( digalu_opt( 'digalu_coming_soon_image', 'url' ) ) ){
                    echo '<div class="error-img">';
                        echo digalu_img_tag( array(
                            'url'   => esc_url( digalu_opt( 'digalu_coming_soon_image', 'url' ) ),
                        ) );
                    echo '</div>';
                }
                echo '<div class="row justify-content-center">';
                    echo '<div class="col-xl-9">';
                        if( ! empty( $digalucoming_soontitle ) ){
                            echo '<h2 class="error-title">'.esc_html( $digalucoming_soontitle ).'</h2>';
                        }
                        if( ! empty( $digalucoming_soonsubtitle ) ){
                            echo '<p class="error-text px-xl-5">'.esc_html( $digalucoming_soonsubtitle ).'</p>';
                        }
                        echo '<a href="'.esc_url( home_url('/') ).'" class="vs-btn mask-btn"><span class="btn-text">'.esc_html( $digalucoming_soonbtntext ).'</span><span class="btn-text-mask">'.esc_html( $digalucoming_soonbtntext ).'</span></a>';

                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</section>';

    //footer
    get_footer();