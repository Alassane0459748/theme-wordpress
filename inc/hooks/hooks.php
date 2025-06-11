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

	/**
	* Hook for preloader
	*/
	add_action( 'digalu_preloader_wrap', 'digalu_preloader_wrap_cb', 10 );

	/**
	* Hook for offcanvas cart
	*/
	add_action( 'digalu_main_wrapper_start', 'digalu_main_wrapper_start_cb', 10 );

	/**
	* Hook for Header
	*/
	add_action( 'digalu_header', 'digalu_header_cb', 10 );

	/**
	* Hook for Blog Start Wrapper
	*/
	add_action( 'digalu_blog_start_wrap', 'digalu_blog_start_wrap_cb', 10 );

	/**
	* Hook for Blog Column Start Wrapper
	*/
    add_action( 'digalu_blog_col_start_wrap', 'digalu_blog_col_start_wrap_cb', 10 );

	/**
	* Hook for Service Column Start Wrapper
	*/
    add_action( 'digalu_service_col_start_wrap', 'digalu_service_col_start_wrap_cb', 10 );

	/**
	* Hook for Blog Column End Wrapper
	*/
    add_action( 'digalu_blog_col_end_wrap', 'digalu_blog_col_end_wrap_cb', 10 );

	/**
	* Hook for Blog Column End Wrapper
	*/
    add_action( 'digalu_blog_end_wrap', 'digalu_blog_end_wrap_cb', 10 );

	/**
	* Hook for Blog Pagination
	*/
    add_action( 'digalu_blog_pagination', 'digalu_blog_pagination_cb', 10 );

    /**
	* Hook for Blog Content
	*/
	add_action( 'digalu_blog_content', 'digalu_blog_content_cb', 10 );

    /**
	* Hook for Blog Sidebar
	*/
	add_action( 'digalu_blog_sidebar', 'digalu_blog_sidebar_cb', 10 );


    /**
	* Hook for Service Sidebar
	*/
	add_action( 'digalu_service_sidebar', 'digalu_service_sidebar_cb', 10 );

    /**
	* Hook for Blog Details Sidebar
	*/
	add_action( 'digalu_blog_details_sidebar', 'digalu_blog_details_sidebar_cb', 10 );

	/**
	* Hook for Blog Details Wrapper Start
	*/
	add_action( 'digalu_blog_details_wrapper_start', 'digalu_blog_details_wrapper_start_cb', 10 );

	/**
	* Hook for Blog Details Post Meta
	*/
	add_action( 'digalu_blog_post_meta', 'digalu_blog_post_meta_cb', 10 );

	/**
	* Hook for Blog Details Post Share Options
	*/
	add_action( 'digalu_blog_details_share_options', 'digalu_blog_details_share_options_cb', 10 );

	/**
	* Hook for Blog Details Post Author Bio
	*/
	add_action( 'digalu_blog_details_author_bio', 'digalu_blog_details_author_bio_cb', 10 );

	/**
	* Hook for Blog Details Tags and Categories
	*/
	add_action( 'digalu_blog_details_tags_and_categories', 'digalu_blog_details_tags_and_categories_cb', 10 );
	add_action( 'digalu_blog_details_post_navigation', 'digalu_blog_details_post_navigation_cb', 10 );

	/**
	* Hook for Blog Deatils Comments
	*/
	add_action( 'digalu_blog_details_comments', 'digalu_blog_details_comments_cb', 10 );

	/**
	* Hook for Blog Deatils Column Start
	*/
	add_action('digalu_blog_details_col_start','digalu_blog_details_col_start_cb');

	/**
	* Hook for Blog Deatils Column End
	*/
	add_action('digalu_blog_details_col_end','digalu_blog_details_col_end_cb');

	/**
	* Hook for Blog Deatils Wrapper End
	*/
	add_action('digalu_blog_details_wrapper_end','digalu_blog_details_wrapper_end_cb');

	/**
	* Hook for Blog Post Thumbnail
	*/
	add_action('digalu_blog_post_thumb','digalu_blog_post_thumb_cb');

	/**
	* Hook for Blog Post Content
	*/
	add_action('digalu_blog_post_content','digalu_blog_post_content_cb');


	/**
	* Hook for Blog Post Excerpt And Read More Button
	*/
	add_action('digalu_blog_postexcerpt_read_content','digalu_blog_postexcerpt_read_content_cb');

	/**
	* Hook for footer content
	*/
	add_action( 'digalu_footer_content', 'digalu_footer_content_cb', 10 );

	/**
	* Hook for main wrapper end
	*/
	add_action( 'digalu_main_wrapper_end', 'digalu_main_wrapper_end_cb', 10 );

	/**
	* Hook for Page Start Wrapper
	*/
	add_action( 'digalu_page_start_wrap', 'digalu_page_start_wrap_cb', 10 );

	/**
	* Hook for Page End Wrapper
	*/
	add_action( 'digalu_page_end_wrap', 'digalu_page_end_wrap_cb', 10 );

	/**
	* Hook for Page Column Start Wrapper
	*/
	add_action( 'digalu_page_col_start_wrap', 'digalu_page_col_start_wrap_cb', 10 );

	/**
	* Hook for Page Column End Wrapper
	*/
	add_action( 'digalu_page_col_end_wrap', 'digalu_page_col_end_wrap_cb', 10 );

	/**
	* Hook for Page Column End Wrapper
	*/
	add_action( 'digalu_page_sidebar', 'digalu_page_sidebar_cb', 10 );

	/**
	* Hook for Page Content
	*/
	add_action( 'digalu_page_content', 'digalu_page_content_cb', 10 );