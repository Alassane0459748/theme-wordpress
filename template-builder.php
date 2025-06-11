<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( );
}
/**
 * @Packge    : Digalu
 * @version   : 1.0
 * @Author    : Digalu
 * @Author URI: https://themeforest.net/user/validthemes/portfolio
 * Template Name: Template Builder
 */

//Header
get_header();

// Container or wrapper div
$digalu_layout = digalu_meta( 'custom_page_layout' );

if( $digalu_layout == '1' ){
	echo '<div class="digalu-main-wrapper">';
		echo '<div class="container">';
			echo '<div class="row">';
				echo '<div class="col-sm-12">';
}elseif( $digalu_layout == '2' ){
    echo '<div class="digalu-main-wrapper">';
		echo '<div class="container-fluid">';
			echo '<div class="row">';
				echo '<div class="col-sm-12">';
}else{
	echo '<div class="digalu-fluid">';
}
	echo '<div class="builder-page-wrapper">';
	// Query
	if( have_posts() ){
		while( have_posts() ){
			the_post();
			the_content();
		}
        wp_reset_postdata();
	}

	echo '</div>';
if( $digalu_layout == '1' ){
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}elseif( $digalu_layout == '2' ){
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}else{
	echo '</div>';
}

//footer
get_footer();