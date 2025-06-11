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

    if( defined( 'CMB2_LOADED' )  ){
        if( !empty( digalu_meta('page_breadcrumb_area') ) ) {
            $digalu_page_breadcrumb_area  = digalu_meta('page_breadcrumb_area');
        } else {
            $digalu_page_breadcrumb_area = '1';
        }
    }else{
        $digalu_page_breadcrumb_area = '1';
    }

    $allowhtml = array(
        'p'         => array(
            'class'     => array()
        ),
        'span'      => array(
            'class'     => array(),
        ),
        'a'         => array(
            'href'      => array(),
            'title'     => array()
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
        'sub'       => array(),
        'sup'       => array(),
    );

    if(  is_page() || is_page_template( 'template-builder.php' )  ) {
        if( $digalu_page_breadcrumb_area == '1' ) {
            if( class_exists( 'ReduxFramework' )  ){
                $class = 'thumb-in';
            }else{
                $class = 'thumb-less';
            }
            echo '<!-- Page title -->';
            echo '<div class="breadcrumb-area custom-breadcrumb text-center bg-gray '.esc_attr($class).'">';
                echo '<div class="container">';
                    echo '<div class="row">';
                        echo '<div class="col-lg-12 col-md-12">';
                            if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {
                                if( digalu_meta('page_breadcrumb_settings') == 'page' ) {
                                    $digalu_page_title_switcher = digalu_meta('page_title');
                                } elseif( digalu_opt('digalu_page_title_switcher') == true ) {
                                    $digalu_page_title_switcher = digalu_opt('digalu_page_title_switcher');
                                }else{
                                    $digalu_page_title_switcher = '1';
                                }
                            } else {
                                $digalu_page_title_switcher = '1';
                            }

                            if( $digalu_page_title_switcher == '1' ){
                                if( class_exists( 'ReduxFramework' ) ){
                                    $digalu_page_title_tag    = digalu_opt('digalu_page_title_tag');
                                }else{
                                    $digalu_page_title_tag    = 'h1';
                                }

                                if( defined( 'CMB2_LOADED' )  ){
                                    if( !empty( digalu_meta('page_title_settings') ) ) {
                                        $digalu_custom_title = digalu_meta('page_title_settings');
                                    } else {
                                        $digalu_custom_title = 'default';
                                    }
                                }else{
                                    $digalu_custom_title = 'default';
                                }

                                if( $digalu_custom_title == 'default' ) {
                                    echo digalu_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $digalu_page_title_tag ),
                                            "text"  => esc_html( get_the_title( ) ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                } else {
                                    echo digalu_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $digalu_page_title_tag ),
                                            "text"  => esc_html( digalu_meta('custom_page_title') ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }

                            }
                            if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {

                                if( digalu_meta('page_breadcrumb_settings') == 'page' ) {
                                    $digalu_breadcrumb_switcher = digalu_meta('page_breadcrumb_trigger');
                                } else {
                                    $digalu_breadcrumb_switcher = digalu_opt('digalu_enable_breadcrumb');
                                }

                            } else {
                                $digalu_breadcrumb_switcher = '1';
                            }

                            if( $digalu_breadcrumb_switcher == '1' && (  is_page() || is_page_template( 'template-builder.php' ) )) {
                                digalu_breadcrumbs(
                                    
                                );
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<!-- End of Page title -->';
        }
    } else {
        if( class_exists( 'ReduxFramework' )  ){
            $class = 'thumb-in';
        }else{
            $class = 'thumb-less';
        }
        echo '<!-- Page title -->';
        echo '<div class="breadcrumb-area text-center bg-gray '.esc_attr($class).'">';
            echo '<div class="container">';
                echo '<div class="row">';
                    echo '<div class="col-lg-12 col-md-12">';
                        if( class_exists( 'ReduxFramework' )  ){
                            $digalu_page_title_switcher  = digalu_opt('digalu_page_title_switcher');
                        }else{
                            $digalu_page_title_switcher = '1';
                        }

                        if( $digalu_page_title_switcher ){
                            if( class_exists( 'ReduxFramework' ) ){
                                $digalu_page_title_tag    = digalu_opt('digalu_page_title_tag');
                            }else{
                                $digalu_page_title_tag    = 'h1';
                            }
                            if ( is_archive() ){
                                echo digalu_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $digalu_page_title_tag ),
                                        "text"  => wp_kses( get_the_archive_title(), $allowhtml ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }elseif ( is_home() ){
                                $digalu_blog_page_title_setting = digalu_opt('digalu_blog_page_title_setting');
                                $digalu_blog_page_title_switcher = digalu_opt('digalu_blog_page_title_switcher');
                                $digalu_blog_page_custom_title = digalu_opt('digalu_blog_page_custom_title');
                                if( class_exists('ReduxFramework') ){
                                    if( $digalu_blog_page_title_switcher ){
                                        echo digalu_heading_tag(
                                            array(
                                                "tag"   => esc_attr( $digalu_page_title_tag ),
                                                "text"  => !empty( $digalu_blog_page_custom_title ) && $digalu_blog_page_title_setting == 'custom' ? esc_html( $digalu_blog_page_custom_title) : esc_html__( 'Blog', 'digalu' ),
                                                'class' => 'breadcumb-title'
                                            )
                                        );
                                    }
                                }else{
                                    echo digalu_heading_tag(
                                        array(
                                            "tag"   => "h1",
                                            "text"  => esc_html__( 'Blog', 'digalu' ),
                                            'class' => 'breadcumb-title',
                                        )
                                    );
                                }
                            }elseif( is_search() ){
                                echo digalu_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $digalu_page_title_tag ),
                                        "text"  => esc_html__( 'Search Result', 'digalu' ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }elseif( is_404() ){
                                echo digalu_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $digalu_page_title_tag ),
                                        "text"  => esc_html__( '404 PAGE', 'digalu' ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }else{
                                $posttitle_position  = digalu_opt('digalu_post_details_title_position');
                                $postTitlePos = false;
                                if( is_single() ){
                                    if( class_exists( 'ReduxFramework' ) ){
                                        if( $posttitle_position && $posttitle_position != 'header' ){
                                            $postTitlePos = true;
                                        }
                                    }else{
                                        $postTitlePos = false;
                                    }
                                }
                                if( $postTitlePos != true ){
                                    echo digalu_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $digalu_page_title_tag ),
                                            "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                } else {
                                    if( class_exists( 'ReduxFramework' ) ){
                                        $digalu_post_details_custom_title  = digalu_opt('digalu_post_details_custom_title');
                                    }else{
                                        $digalu_post_details_custom_title = __( 'Blog Details','digalu' );
                                    }

                                    if( !empty( $digalu_post_details_custom_title ) ) {
                                        echo digalu_heading_tag(
                                            array(
                                                "tag"   => esc_attr( $digalu_page_title_tag ),
                                                "text"  => wp_kses( $digalu_post_details_custom_title, $allowhtml ),
                                                'class' => 'breadcumb-title'
                                            )
                                        );
                                    }
                                }
                            }
                        }
                        if( class_exists('ReduxFramework') ) {
                            $digalu_breadcrumb_switcher = digalu_opt( 'digalu_enable_breadcrumb' );
                        } else {
                            $digalu_breadcrumb_switcher = '1';
                        }
                        if( $digalu_breadcrumb_switcher == '1' ) {
                            digalu_breadcrumbs(
                                array(
                                    'breadcrumbs_classes' => 'nav',
                                )
                            );
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
        echo '<!-- End of Page title -->';
    }