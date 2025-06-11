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

    //header
    get_header();

    /**
    * 
    * Hook for Blog Details Wrapper
    *
    * Hook digalu_blog_details_wrapper_start
    *
    * @Hooked digalu_blog_details_wrapper_start_cb 10
    *  
    */
    do_action( 'digalu_blog_details_wrapper_start' );
    
    /**
    * 
    * Hook for Blog Details Column Start
    *
    * Hook digalu_blog_details_col_start
    *
    * @Hooked digalu_blog_details_col_start_cb 10
    *  
    */
    do_action( 'digalu_blog_details_col_start' );

    while( have_posts( ) ) :
        the_post();
        
        get_template_part( 'templates/content-single');
        
    endwhile;
    /**
    * 
    * Hook for Blog Details Column End
    *
    * Hook digalu_blog_details_col_end
    *
    * @Hooked digalu_blog_details_col_end_cb 10
    *  
    */
    do_action( 'digalu_blog_details_col_end' );

    /**
    * 
    * Hook for Blog Details Sidebar
    *
    * Hook digalu_blog_details_sidebar
    *
    * @Hooked digalu_blog_details_sidebar_cb 10
    *  
    */
    do_action( 'digalu_blog_details_sidebar' );
    /**
    * 
    * Hook for Blog Details Wrapper End
    *
    * Hook digalu_blog_details_wrapper_end
    *
    * @Hooked digalu_blog_details_wrapper_end_cb 10
    *  
    */
    do_action( 'digalu_blog_details_wrapper_end' );

    //footer
    get_footer();