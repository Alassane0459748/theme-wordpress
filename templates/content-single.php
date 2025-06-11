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
    digalu_setPostViews( get_the_ID() );
    ?>
    <div <?php post_class(); ?> >
        <div class="blog-item-box">
        <?php
            if( class_exists('ReduxFramework') ) {
                $digalu_post_details_title_position = digalu_opt('digalu_post_details_title_position');
            } else {
                $digalu_post_details_title_position = 'header';
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

            // Blog Post Thumbnail
            do_action( 'digalu_blog_post_thumb' );

            if( $digalu_post_details_title_position != 'header' ) {
                echo '<h4 class="title">'.wp_kses( get_the_title(), $allowhtml ).'</h4>';
            }
            echo '<div class="info">';
                // Blog Post Meta
                do_action( 'digalu_blog_post_meta' );

                if( get_the_content() ){
                    the_content();
                    // Link Pages
                    digalu_link_pages();
                }
            echo '</div>';        
        echo '</div>';
    echo '</div>';
    /**
    *
    * Hook for Blog Details Author Bio
    *
    * Hook digalu_blog_details_author_bio
    *
    * @Hooked digalu_blog_details_author_bio_cb 10
    *
    */
    do_action( 'digalu_blog_details_author_bio' );

    $digalu_post_tag = get_the_tags();
    if( class_exists('ReduxFramework') ) {
        $digalu_post_details_share_options = digalu_opt('digalu_post_details_share_options');
        $digalu_show_post_tag = digalu_opt( 'digalu_display_post_tags' );
    } else {
        $digalu_show_post_tag = true;
        $digalu_post_details_share_options = false;
    }

    if( ! empty( $digalu_post_tag ) && $digalu_show_post_tag || $digalu_post_details_share_options ){
        echo '<div class="post-tags share">';
            if( $digalu_show_post_tag  && is_array( $digalu_post_tag ) && ! empty( $digalu_post_tag ) ){
                if( count( $digalu_post_tag ) > 1 ){
                    $tag_text = __( 'Tags: ', 'digalu' );
                }else{
                    $tag_text = __( 'Tag: ', 'digalu' );
                }
                echo '<div class="tags">';
                    echo '<h4>'.esc_html( $tag_text ).'</h4>';
                    foreach( $digalu_post_tag as $tags ){
                        echo '<a href="'.esc_url( get_tag_link( $tags->term_id ) ).'">'.esc_html( $tags->name ).'</a> ';
                    }
                echo '</div>';
            }
            /**
            *
            * Hook for Blog Social Share Options
            *
            * Hook digalu_blog_details_share_options
            *
            * @Hooked digalu_blog_details_share_options_cb 10
            *
            */
            do_action( 'digalu_blog_details_share_options' );
            
        echo '</div>';
        
    }

    /**
    *
    * Hook for Blog Navigation
    *
    * Hook digalu_blog_details_post_navigation
    *
    * @Hooked digalu_blog_details_post_navigation_cb 10
    *
    */
    do_action( 'digalu_blog_details_post_navigation' );

    /**
    *
    * Hook for Blog Details Comments
    *
    * Hook digalu_blog_details_comments
    *
    * @Hooked digalu_blog_details_comments_cb 10
    *
    */
    do_action( 'digalu_blog_details_comments' );