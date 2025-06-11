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


    // preloader hook function
    if( ! function_exists( 'digalu_preloader_wrap_cb' ) ) {
        function digalu_preloader_wrap_cb() {
            $preloader_display  =  digalu_opt('digalu_display_preloader');

            if( class_exists('ReduxFramework') ){
                if( $preloader_display ){
                    
                    if( ! empty( digalu_opt( 'digalu_preloader_text' ) ) ){

                        $str = digalu_opt( 'digalu_preloader_text' );
                        $chars = str_split($str);

                        echo '<div id="preloader">';
                            echo '<div id="ambrox-preloader" class="ambrox-preloader">';
                                echo '<div class="animation-preloader">';
                                    echo '<div class="spinner"></div>';
                                    echo '<div class="txt-loading">';
                                        foreach ($chars as $char) {
                                            echo '<span data-text-preloader="'.esc_attr($char).'" class="letters-loading"> '.esc_html($char).' </span>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="loader">';
                                    echo '<div class="row">';
                                        echo '<div class="col-3 loader-section section-left"><div class="bg"></div></div>';
                                        echo '<div class="col-3 loader-section section-left"><div class="bg"></div></div>';
                                        echo '<div class="col-3 loader-section section-right"><div class="bg"></div></div>';
                                        echo '<div class="col-3 loader-section section-right"><div class="bg"></div></div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                }
            }
        }
    }

    // Header Hook function
    if( !function_exists('digalu_header_cb') ) {
        function digalu_header_cb( ) {
            get_template_part('templates/header');
            get_template_part('templates/header-menu-bottom');
        }
    }

    // Blog Start Wrapper Function
    if( !function_exists('digalu_blog_start_wrap_cb') ) {
        function digalu_blog_start_wrap_cb() {

            echo '<div class="blog-area right-sidebar full-blog default-padding">';
                echo '<div class="container">';
                    echo '<div class="blog-items">';
                        echo '<div class="row">';
        }
    }

    // Blog End Wrapper Function
    if( !function_exists('digalu_blog_end_wrap_cb') ) {
        function digalu_blog_end_wrap_cb() {
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    }

    // Blog Column Start Wrapper Function
    if( !function_exists('digalu_blog_col_start_wrap_cb') ) {
        function digalu_blog_col_start_wrap_cb() {
            if( class_exists('ReduxFramework') ) {
                $digalu_blog_sidebar = digalu_opt('digalu_blog_sidebar');
                $digalu_blog_grid = digalu_opt('digalu_blog_grid');
                if( $digalu_blog_sidebar == '2' && is_active_sidebar('digalu-blog-sidebar') ) {
                    echo '<div class="blog-content col-xl-8 col-lg-7 col-md-12 pl-35 pr-md-15 pl-md-15 pr-xs-15 pl-xs-15 order-lg-last">';
                } elseif( $digalu_blog_sidebar == '3' && is_active_sidebar('digalu-blog-sidebar') ) {
                    echo '<div class="blog-content col-lg-8 col-md-12">';
                } else {
                    if( $digalu_blog_grid != '1' ) {
                        echo '<div class="blog-content col-md-12">';
                    }else{
                        echo '<div class="blog-content col-lg-10 offset-lg-1 col-md-12">';
                    }
                }
            } else {
                if( is_active_sidebar('digalu-blog-sidebar') ) {
                    echo '<div class="blog-content col-lg-8 col-md-12">';
                } else {
                    echo '<div class="blog-content col-lg-10 offset-lg-1 col-md-12">';
                }
            }
        }
    }
    // Blog Column End Wrapper Function
    if( !function_exists('digalu_blog_col_end_wrap_cb') ) {
        function digalu_blog_col_end_wrap_cb() {
            echo '</div>';
        }
    }

    // Blog Sidebar
    if( !function_exists('digalu_blog_sidebar_cb') ) {
        function digalu_blog_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $digalu_blog_sidebar = digalu_opt('digalu_blog_sidebar');
            } else {
                $digalu_blog_sidebar = 2;
            }
            if( $digalu_blog_sidebar != 1 && is_active_sidebar('digalu-blog-sidebar') ) {
                // Sidebar
                get_sidebar();
            }
        }
    }


    if( !function_exists('digalu_blog_details_sidebar_cb') ) {
        function digalu_blog_details_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $digalu_blog_single_sidebar = digalu_opt('digalu_blog_single_sidebar');
            } else {
                $digalu_blog_single_sidebar = 4;
            }
            if( $digalu_blog_single_sidebar != 1 ) {
                // Sidebar
                get_sidebar();
            }

        }
    }

    // Blog Pagination Function
    if( !function_exists('digalu_blog_pagination_cb') ) {
        function digalu_blog_pagination_cb( ) {
            get_template_part('templates/pagination');
        }
    }

    // Blog Content Function
    if( !function_exists('digalu_blog_content_cb') ) {
        function digalu_blog_content_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $digalu_blog_grid = digalu_opt('digalu_blog_grid');
            } else {
                $digalu_blog_grid = '1';
            }

            if( $digalu_blog_grid == '1' ) {
                $digalu_blog_grid_class = 'col-lg-12 single-item';
            } elseif( $digalu_blog_grid == '2' ) {
                $digalu_blog_grid_class = 'col-lg-6 col-md-6 single-item';
            } else {
                $digalu_blog_grid_class = 'col-lg-4 col-md-6 single-item';
            }
            if( $digalu_blog_grid == '1' ) {
                echo '<div class="blog-item-box">';
                    if( have_posts() ) {
                        while( have_posts() ) {
                            the_post();
                            echo '<div class="'.esc_attr($digalu_blog_grid_class).'">';
                                get_template_part('templates/content',get_post_format());
                            echo '</div>';
                        }
                        wp_reset_postdata();
                    } else{
                        get_template_part('templates/content','none');
                    }
                echo '</div>';
            }else{
                echo '<div class="row">';
                    if( have_posts() ) {
                        while( have_posts() ) {
                            the_post();
                            echo '<div class="'.esc_attr($digalu_blog_grid_class).'">';
                                get_template_part('templates/content',get_post_format());
                            echo '</div>';
                        }
                        wp_reset_postdata();
                    } else{
                        get_template_part('templates/content','none');
                    }
                echo '</div>'; 
            }
            
        }
    }

    // footer content Function
    if( !function_exists('digalu_footer_content_cb') ) {
        function digalu_footer_content_cb( ) {

            if( class_exists('ReduxFramework') && did_action( 'elementor/loaded' )  ){
                if( is_page() || is_page_template('template-builder.php') ) {
                    $post_id = get_the_ID();

                    // Get the page settings manager
                    $page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

                    // Get the settings model for current post
                    $page_settings_model = $page_settings_manager->get_model( $post_id );

                    // Retrieve the Footer Style
                    $footer_settings = $page_settings_model->get_settings( 'digalu_footer_style' );

                    // Footer Local
                    $footer_local = $page_settings_model->get_settings( 'digalu_footer_builder_option' );

                    // Footer Enable Disable
                    $footer_enable_disable = $page_settings_model->get_settings( 'digalu_footer_choice' );

                    if( $footer_enable_disable == 'yes' ){
                        if( $footer_settings == 'footer_builder' ) {
                            // local options
                            $digalu_local_footer = get_post( $footer_local );
                            echo '<footer>';
                            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $digalu_local_footer->ID );
                            echo '</footer>';
                        } else {
                            // global options
                            $digalu_footer_builder_trigger = digalu_opt('digalu_footer_builder_trigger');
                            if( $digalu_footer_builder_trigger == 'footer_builder' ) {
                                echo '<footer>';
                                $digalu_global_footer_select = get_post( digalu_opt( 'digalu_footer_builder_select' ) );
                                $footer_post = get_post( $digalu_global_footer_select );
                                echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_post->ID );
                                echo '</footer>';
                            } else {
                                // wordpress widgets
                                digalu_footer_global_option();
                            }
                        }
                    }
                } else {
                    // global options
                    $digalu_footer_builder_trigger = digalu_opt('digalu_footer_builder_trigger');
                    if( $digalu_footer_builder_trigger == 'footer_builder' ) {
                        echo '<footer>';
                        $digalu_global_footer_select = get_post( digalu_opt( 'digalu_footer_builder_select' ) );
                        $footer_post = get_post( $digalu_global_footer_select );
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_post->ID );
                        echo '</footer>';
                    } else {
                        // wordpress widgets
                        digalu_footer_global_option();
                    }
                }
            } else {
                echo '<footer>';
                    echo '<div class="bg-dark">';
                        echo '<div class="footer-bottom">';
                            echo '<div class="container">';
                                echo '<p class="text-center text-light">'.esc_html__( 'Copyright', 'digalu' ).' <i class="fal fa-copyright"></i> '.esc_html( date('Y') ).' <a href="'.esc_url( '#' ).'">'.esc_html( 'Digalu', 'digalu' ).'</a>'.esc_html__( ' All Rights Reserved by', 'digalu' ).' <a href="'.esc_url('#').'">'.esc_html__( 'Validthemes', 'digalu' ).'</a></p>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</footer>';
            }

        }
    }

    // blog details wrapper start hook function
    if( !function_exists('digalu_blog_details_wrapper_start_cb') ) {
        function digalu_blog_details_wrapper_start_cb( ) {
            echo '<section class="blog-area single full-blog right-sidebar full-blog default-padding">';
                echo '<div class="container">';
                    echo '<div class="blog-items">';
                        echo '<div class="row">';
        }
    }

    // blog details column wrapper start hook function
    if( !function_exists('digalu_blog_details_col_start_cb') ) {
        function digalu_blog_details_col_start_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $digalu_blog_single_sidebar = digalu_opt('digalu_blog_single_sidebar');
                if( $digalu_blog_single_sidebar == '2' && is_active_sidebar('digalu-blog-sidebar') ) {
                    echo '<div class="blog-content col-xl-8 col-lg-7 col-md-12 pl-35 pr-md-15 pl-md-15 pr-xs-15 pl-xs-15 order-last">';
                } elseif( $digalu_blog_single_sidebar == '3' && is_active_sidebar('digalu-blog-sidebar') ) {
                    echo '<div class="blog-content col-lg-8 col-md-12">';
                } else {
                    echo '<div class="blog-content col-lg-10 offset-lg-1 col-md-12">';
                }

            } else {
                if( is_active_sidebar('digalu-blog-sidebar') ) {
                    echo '<div class="blog-content col-lg-8 col-md-12">';
                } else {
                    echo '<div class="blog-content col-lg-10 offset-lg-1 col-md-12">';
                }
            }
        }
    }

    // blog details post meta hook function
    if( !function_exists('digalu_blog_post_meta_cb') ) {
        function digalu_blog_post_meta_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $digalu_display_post_date      =  digalu_opt('digalu_display_post_date');
                $digalu_display_post_admin     =  digalu_opt('digalu_display_admin');
                $digalu_display_post_cat      =  digalu_opt('digalu_display_post_cat');
                $digalu_display_post_views     =  digalu_opt('digalu_display_post_views');

            } else {
                $digalu_display_post_date      = '1';
                $digalu_display_post_admin     = '1';
                $digalu_display_post_views     = '';
                $digalu_display_post_cat       = '';
            }

            echo '<!-- Blog Meta -->';
            if( ! is_single() ){
                if( $digalu_display_post_cat ){
                    echo '<div class="tags">';
                        echo get_the_category_list();
                    echo '</div>';
                }
            }
            echo '<div class="meta">';

                echo '<ul>';
                    if( $digalu_display_post_date ){
                        echo '<li>';
                            echo '<a href="'.esc_url( digalu_blog_date_permalink() ).'"><i class="fas fa-calendar-alt"></i> <time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time></a>';
                        echo '</li>';
                    }
                    if( $digalu_display_post_admin ){
                        echo '<li>';
                            echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'"><i class="fas fa-user-circle"></i> '.esc_html(  get_the_author() ).'</a>';
                        echo '</li>';
                    }
                    if( $digalu_display_post_views ){
                        echo '<li>';
                        echo '<a href="'.esc_url( get_comments_link( get_the_ID() ) ).'"><i class="fal fa-eye"></i> ';
                        echo digalu_getPostViews( get_the_ID() );
                        echo esc_html__( ' Views', 'digalu' );
                        echo '</a>';
                        echo '</li>';
                    }
                echo '</ul>';
            echo '</div>';

        }
    }
    // Blog Details Post Navigation hook function
    if( !function_exists( 'digalu_blog_details_post_navigation_cb' ) ) {
        function digalu_blog_details_post_navigation_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $digalu_post_details_post_navigation = digalu_opt('digalu_post_details_post_navigation');
            } else {
                $digalu_post_details_post_navigation = true;
            }

            $prevpost = get_previous_post();
            $nextpost = get_next_post();

            $allowhtml = array(
                'p'         => array(
                    'class'     => array()
                ),
                'span'      => array(),
                'a'         => array(
                    'href'      => array(),
                    'title'     => array()
                ),
                'br'        => array(),
                'em'        => array(),
                'strong'    => array(),
                'b'         => array(),
            );

            if( $digalu_post_details_post_navigation && ! empty( $prevpost ) || !empty( $nextpost ) ) {

                echo '<div class="post-pagi-area">';
                    if( ! empty( $prevpost ) ) {
                        echo '<div class="post-previous">';
                            echo '<a href="'.esc_url( get_permalink( $prevpost->ID ) ).'"><div class="icon"><i class="fas fa-angle-double-left"></i></div><div class="nav-title">'.esc_html__( ' Previus Post', 'digalu' ).'<h5>'.wp_trim_words( wp_kses( get_the_title( $prevpost->ID ), $allowhtml ), '2', '' ).'</h5></div></a>';
                        echo '</div>';
                    }
                    if( ! empty( $nextpost ) ) {
                        echo '<div class="post-next">';
                            echo '<a href="'.esc_url( get_permalink( $nextpost->ID ) ).'"><div class="nav-title">'.esc_html__( 'Next Post ', 'digalu' ).'<h5>'.wp_trim_words( wp_kses( get_the_title( $nextpost->ID ), $allowhtml ), '2', '' ).'</h5></div> <div class="icon"><i class="fas fa-angle-double-right"></i></div></a>';
                        echo '</div>';
                    }
                echo '</div>';
            }
        }
    }

    // blog details share options hook function
    if( !function_exists('digalu_blog_details_share_options_cb') ) {
        function digalu_blog_details_share_options_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $digalu_post_details_share_options = digalu_opt('digalu_post_details_share_options');
            } else {
                $digalu_post_details_share_options = false;
            }
            if( function_exists( 'digalu_social_sharing_buttons' ) && $digalu_post_details_share_options ) {
                echo '<div class="social">';
                    echo '<h4>'.esc_html__('Share:','digalu').'</h4>';
                    echo '<ul>';
                        echo digalu_social_sharing_buttons();
                    echo '</ul>';
                    echo '<!-- End Social Share -->';
                echo '</div>';
            }
        }
    }

    // blog details author bio hook function
    if( !function_exists('digalu_blog_details_author_bio_cb') ) {
        function digalu_blog_details_author_bio_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $postauthorbox =  digalu_opt( 'digalu_post_details_author_desc_trigger' );
            } else {
                $postauthorbox = '1';
            }
            if( !empty( get_the_author_meta('description')  ) && $postauthorbox == '1' ) {
                echo '<!-- Start Post Author -->';
                echo '<div class="post-author">';
                    echo '<div class="thumb">';
                        echo digalu_img_tag( array(
                            "url"   => esc_url( get_avatar_url( get_the_author_meta('ID')) ),
                        ) );
                    echo '</div>';
                    echo '<div class="info">';
                        echo digalu_heading_tag( array(
                            "tag"   => "h4",
                            "text"  => digalu_anchor_tag( array(
                                "text"  => esc_html( ucwords( get_the_author() ) ),
                                "url"   => esc_url( get_author_posts_url( get_the_author_meta('ID') ) ),
                            ) ),
                        ) );
                        if( ! empty( get_the_author_meta('description') ) ) {
                            echo '<p>';
                                echo esc_html( get_the_author_meta('description') );
                            echo '</p>';
                        }
                    echo '</div>';
                echo '</div>';
                echo '<!-- Ebd Post Author -->';
            }

        }
    }

    // Blog Details Comments hook function
    if( !function_exists('digalu_blog_details_comments_cb') ) {
        function digalu_blog_details_comments_cb( ) {
            if ( ! comments_open() ) {
                echo '<div class="blog-comment-area">';
                    echo digalu_heading_tag( array(
                        "tag"   => "h3",
                        "text"  => esc_html__( 'Comments are closed', 'digalu' ),
                        "class" => "inner-title"
                    ) );
                echo '</div>';
            }

            // comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }
    }

    // Blog Details Column end hook function
    if( !function_exists('digalu_blog_details_col_end_cb') ) {
        function digalu_blog_details_col_end_cb( ) {
            echo '</div>';
        }
    }

    // Blog Details Wrapper end hook function
    if( !function_exists('digalu_blog_details_wrapper_end_cb') ) {
        function digalu_blog_details_wrapper_end_cb( ) {
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // page start wrapper hook function
    if( !function_exists('digalu_page_start_wrap_cb') ) {
        function digalu_page_start_wrap_cb( ) {
            echo '<section class="default-padding">';
                echo '<div class="container">';
                    echo '<div class="row">';
        }
    }

    // page wrapper end hook function
    if( !function_exists('digalu_page_end_wrap_cb') ) {
        function digalu_page_end_wrap_cb( ) {
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // page column wrapper start hook function
    if( !function_exists('digalu_page_col_start_wrap_cb') ) {
        function digalu_page_col_start_wrap_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $digalu_page_sidebar = digalu_opt('digalu_page_sidebar');
            }else {
                $digalu_page_sidebar = '1';
            }
            if( $digalu_page_sidebar == '2' && is_active_sidebar('digalu-page-sidebar') ) {
                echo '<div class="col-lg-8 order-last">';
            } elseif( $digalu_page_sidebar == '3' && is_active_sidebar('digalu-page-sidebar') ) {
                echo '<div class="col-lg-8">';
            } else {
                echo '<div class="col-lg-12">';
            }

        }
    }

    // page column wrapper end hook function
    if( !function_exists('digalu_page_col_end_wrap_cb') ) {
        function digalu_page_col_end_wrap_cb( ) {
            echo '</div>';
        }
    }

    // page sidebar hook function
    if( !function_exists('digalu_page_sidebar_cb') ) {
        function digalu_page_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $digalu_page_sidebar = digalu_opt('digalu_page_sidebar');
            }else {
                $digalu_page_sidebar = '1';
            }

            if( class_exists('ReduxFramework') ) {
                $digalu_page_layoutopt = digalu_opt('digalu_page_layoutopt');
            }else {
                $digalu_page_layoutopt = '3';
            }

            if( $digalu_page_layoutopt == '1' && $digalu_page_sidebar != 1 ) {
                get_sidebar('page');
            } elseif( $digalu_page_layoutopt == '2' && $digalu_page_sidebar != 1 ) {
                get_sidebar();
            }
        }
    }

    // page content hook function
    if( !function_exists('digalu_page_content_cb') ) {
        function digalu_page_content_cb( ) {
            
            echo '<div class="page--content clearfix">';
                the_content();
                // Link Pages
                digalu_link_pages();

            echo '</div>';
            // comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }
    }

    if( !function_exists('digalu_blog_post_thumb_cb') ) {
        function digalu_blog_post_thumb_cb( ) {
            if( get_post_format() ) {
                $format = get_post_format();
            }else{
                $format = 'standard';
            }

            $digalu_post_slider_thumbnail = digalu_meta( 'post_format_slider' );

            if( !empty( $digalu_post_slider_thumbnail ) ){
                echo '<div class="thumb">';
                    echo '<div class="blog-slider owl-carousel owl-theme">';
                        foreach( $digalu_post_slider_thumbnail as $single_image ){
                            if( ! is_single() ){
                                echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                            }
                                echo digalu_img_tag( array(
                                    'url'   => esc_url( $single_image )
                                ) );
                            if( ! is_single() ){
                                echo '</a>';
                            }
                        }
                    echo '</div>';
                echo '</div>';
            }elseif( has_post_thumbnail() && $format == 'standard' ) {
                echo '<!-- Post Thumbnail -->';
                echo '<div class="thumb">';
                    if( ! is_single() ){
                        echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                    }
                        the_post_thumbnail();
                    if( ! is_single() ){
                        echo '</a>';
                    }
                echo '</div>';
                echo '<!-- End Post Thumbnail -->';
            }elseif( $format == 'video' ){
                if( has_post_thumbnail() && !empty ( digalu_meta( 'post_format_video' ) ) ){
                    echo '<div class="thumb responsive-video">';
                        if( ! is_single() ){
                            echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                        }
                            the_post_thumbnail();
                        if( ! is_single() ){
                            echo '</a>';
                        }
                        echo '<a href="'.esc_url( digalu_meta( 'post_format_video' ) ).'">';
                          echo '<i class="fas fa-play"></i>';
                        echo '</a>';
                    echo '</div>';
                }elseif( ! has_post_thumbnail() && ! is_single() ){
                    echo '<div class="blog-video">';
                        if( ! is_single() ){
                            echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                        }
                            echo digalu_embedded_media( array( 'video', 'iframe' ) );
                        if( ! is_single() ){
                            echo '</a>';
                        }
                    echo '</div>';
                }
            }elseif( $format == 'audio' ){
                $digalu_audio = digalu_meta( 'post_format_audio' );
                if( !empty( $digalu_audio ) ){
                    echo '<div class="thumb audio-post">';
                        echo wp_oembed_get( $digalu_audio );
                    echo '</div>';
                }elseif( !is_single() ){
                    echo '<div class="blog-audio blog-img">';
                        echo digalu_embedded_media( array( 'audio', 'iframe' ) );
                    echo '</div>';
                }
            }

        }
    }

    if( !function_exists( 'digalu_blog_post_content_cb' ) ) {
        function digalu_blog_post_content_cb( ) {
            $allowhtml = array(
                'p'         => array(
                    'class'     => array()
                ),
                'span'      => array(),
                'a'         => array(
                    'href'      => array(),
                    'title'     => array()
                ),
                'br'        => array(),
                'em'        => array(),
                'strong'    => array(),
                'b'         => array(),
                'sup'       => array(),
                'sub'       => array(),
            );

            // Blog Post Meta
            do_action( 'digalu_blog_post_meta' );
        }
    }

    if( ! function_exists( 'digalu_blog_postexcerpt_read_content_cb') ) {
        function digalu_blog_postexcerpt_read_content_cb( ) {
            if( class_exists( 'ReduxFramework' ) ) {
                $digalu_excerpt_length = digalu_opt('digalu_blog_postExcerpt');
            } else {
                $digalu_excerpt_length = '45';
            }
            $allowhtml = array(
                'p'         => array(
                    'class'     => array()
                ),
                'span'      => array(),
                'a'         => array(
                    'href'      => array(),
                    'title'     => array()
                ),
                'br'        => array(),
                'em'        => array(),
                'strong'    => array(),
                'b'         => array(),
            );

            if( class_exists( 'ReduxFramework' ) ) {
                $digalu_blog_admin = digalu_opt( 'digalu_blog_post_author' );

                $digalu_blog_readmore_setting_val = digalu_opt('digalu_blog_readmore_setting');
                if( $digalu_blog_readmore_setting_val == 'custom' ) {
                    $digalu_blog_readmore_setting = digalu_opt('digalu_blog_custom_readmore');
                } else {
                    $digalu_blog_readmore_setting = __( 'Read More', 'digalu' );
                }
            } else {
                $digalu_blog_readmore_setting = __( 'Read More', 'digalu' );
                $digalu_blog_admin = true;
            }

            echo '<h2><a href="'.esc_url( get_permalink() ).'">'.wp_kses( get_the_title( ), $allowhtml ).'</a></h2>';
            echo '<!-- Post Summary -->';
                echo digalu_paragraph_tag( array(
                    "text"  => wp_kses( wp_trim_words( get_the_excerpt(), $digalu_excerpt_length, '' ), $allowhtml ),
                ) );
            echo '<!-- End Post Summary -->';
            if( $digalu_blog_admin || !empty( $digalu_blog_readmore_setting ) ){
                if( !empty( $digalu_blog_readmore_setting ) ){
                    echo '<!-- Button -->';
                        echo '<a href="'.esc_url( get_permalink() ).'" class="btn mt-10 btn-md circle btn-theme animation">'.esc_html( $digalu_blog_readmore_setting ).'</a>';
                    echo '<!-- End Button -->';
                }
            }     
        }
    }