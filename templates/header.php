<?php
/**
 * @Packge     : Digalu
 * @Version    : 1.0
 * @Author     : Digalu
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    if( class_exists( 'ReduxFramework' ) && defined('ELEMENTOR_VERSION') ) {
        if( is_page() || is_page_template('template-builder.php') ) {
            $digalu_post_id = get_the_ID();

            // Get the page settings manager
            $digalu_page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

            // Get the settings model for current post
            $digalu_page_settings_model = $digalu_page_settings_manager->get_model( $digalu_post_id );

            // Retrieve the color we added before
            $digalu_header_style = $digalu_page_settings_model->get_settings( 'digalu_header_style' );
            $digalu_header_builder_option = $digalu_page_settings_model->get_settings( 'digalu_header_builder_option' );

            if( $digalu_header_style == 'header_builder'  ) {

                if( !empty( $digalu_header_builder_option ) ) {
                    $digaluheader = get_post( $digalu_header_builder_option );
                    echo '<header>';
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $digaluheader->ID );
                    echo '</header>';
                }
            } else {
                // global options
                $digalu_header_builder_trigger = digalu_opt('digalu_header_options');
                if( $digalu_header_builder_trigger == '2' ) {
                    echo '<header>';
                    $digalu_global_header_select = get_post( digalu_opt( 'digalu_header_select_options' ) );
                    $header_post = get_post( $digalu_global_header_select );
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_post->ID );
                    echo '</header>';
                } else {
                    // wordpress Header
                    digalu_global_header_option();
                }
            }
        } else {
            $digalu_header_options = digalu_opt('digalu_header_options');
            if( $digalu_header_options == '1' ) {
                digalu_global_header_option();
            } else {
                $digalu_header_select_options = digalu_opt('digalu_header_select_options');
                $digaluheader = get_post( $digalu_header_select_options );
                echo '<header>';
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $digaluheader->ID );
                echo '</header>';
            }
        }
    } else {
        digalu_global_header_option();
    }