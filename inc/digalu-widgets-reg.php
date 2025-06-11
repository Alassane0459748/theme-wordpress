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
    exit;
}

function digalu_widgets_init() {

    if( class_exists('ReduxFramework') ) {
        $digalu_sidebar_widget_title_heading_tag = digalu_opt('digalu_sidebar_widget_title_heading_tag');
    } else {
        $digalu_sidebar_widget_title_heading_tag = 'h4';
    }

    //sidebar widgets register
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'digalu' ),
        'id'            => 'digalu-blog-sidebar',
        'description'   => esc_html__( 'Add Blog Sidebar Widgets Here.', 'digalu' ),
        'before_widget' => '<div id="%1$s" class="sidebar-item %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<'.esc_attr($digalu_sidebar_widget_title_heading_tag). ' class="title">',
        'after_title'   => '</'.esc_attr($digalu_sidebar_widget_title_heading_tag).'>',
    ) );

    // page sidebar widgets register
    register_sidebar( array(
        'name'          => esc_html__( 'Page Sidebar', 'digalu' ),
        'id'            => 'digalu-page-sidebar',
        'description'   => esc_html__( 'Add Page Sidebar Widgets Here.', 'digalu' ),
        'before_widget' => '<div id="%1$s" class="sidebar-item %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="title">',
        'after_title'   => '</h4>',
    ) );

    if( class_exists( 'ReduxFramework' ) ){
        // footer widgets register
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 1', 'digalu' ),
           'id'            => 'digalu-footer-1',
           'before_widget' => '<div class="col-lg-4 col-md-6 footer-item pr-50 pr-xs-15 pr-md-15"><div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="widget-title">',
           'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 2', 'digalu' ),
           'id'            => 'digalu-footer-2',
           'before_widget' => '<div class="col-lg-2 col-md-6 footer-item"><div id="%1$s" class="f-item footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="widget-title">',
           'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 3', 'digalu' ),
           'id'            => 'digalu-footer-3',
           'before_widget' => '<div class="col-lg-3 col-md-6 footer-item adress-item"><div id="%1$s" class="f-item footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="widget-title">',
           'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 4', 'digalu' ),
           'id'            => 'digalu-footer-4',
           'before_widget' => '<div class="col-lg-3 col-md-6 footer-item"><div id="%1$s" class="f-item footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="widget-title">',
           'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Offcanvas Item Widgets Area', 'digalu' ),
           'id'            => 'digalu-offcanvus-area',
           'before_widget' => '<div class="widget %2$s"><div id="%1$s" class="offcanvas-sidebar">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="title">',
           'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Service Widgets Area', 'digalu' ),
           'id'            => 'digalu-service-area',
           'before_widget' => '<div class="single-widget"><div id="%1$s" class="services-sidebar %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="widget-title">',
           'after_title'   => '</h4>',
        ) );
    }

}

add_action( 'widgets_init', 'digalu_widgets_init' );