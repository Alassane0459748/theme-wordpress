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
    // Header
    get_header();

    /**
    * 
    * Hook for Blog Start Wrapper
    *
    * Hook digalu_blog_start_wrap
    *
    * @Hooked digalu_blog_start_wrap_cb 10
    *  
    */
    do_action( 'digalu_blog_start_wrap' );

    /**
    * 
    * Hook for Blog Column Start Wrapper
    *
    * Hook digalu_blog_col_start_wrap
    *
    * @Hooked digalu_blog_col_start_wrap_cb 10
    *  
    */
    do_action( 'digalu_blog_col_start_wrap' );

    /**
    * 
    * Hook for Blog Content
    *
    * Hook digalu_blog_content
    *
    * @Hooked digalu_blog_content_cb 10
    *  
    */
    do_action( 'digalu_blog_content' );

    /**
    * 
    * Hook for Blog Pagination
    *
    * Hook digalu_blog_pagination
    *
    * @Hooked digalu_blog_pagination_cb 10
    *  
    */
    do_action( 'digalu_blog_pagination' ); 

    /**
    * 
    * Hook for Blog Column End Wrapper
    *
    * Hook digalu_blog_col_end_wrap
    *
    * @Hooked digalu_blog_col_end_wrap_cb 10
    *  
    */
    do_action( 'digalu_blog_col_end_wrap' ); 

    /**
    * 
    * Hook for Blog Sidebar
    *
    * Hook digalu_blog_sidebar
    *
    * @Hooked digalu_blog_sidebar_cb 10
    *  
    */
    do_action( 'digalu_blog_sidebar' );     
        
    /**
    * 
    * Hook for Blog End Wrapper
    *
    * Hook digalu_blog_end_wrap
    *
    * @Hooked digalu_blog_end_wrap_cb 10
    *  
    */
    do_action( 'digalu_blog_end_wrap' );

    //footer
    get_footer();