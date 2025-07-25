<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
 if( is_shop() || is_product_category() || is_product_tag() ) {
            echo '<div class="validtheme-shop-area default-padding">';
            	echo '<div class="container">';
        }elseif(is_product()){
            echo '<div class="validtheme-shop-single-area default-padding">';
                echo '<div class="container">';
                    echo '<div class="product-details">';
                        echo '<div class="row">';
        }else {
            echo '<div class="validtheme-shop-single-area default-padding">';
                echo '<div class="container">';
                    echo '<div class="row">';
        }
?>
<div class="row">
	<?php 
	if(is_active_sidebar('digalu-shop-sidebar')){
        do_action( 'digalu_woocommerce_sidebar' );
    }
	if(is_active_sidebar('digalu-shop-sidebar')){
        echo '<div class="col-lg-9 shop-right-elements">';
    }else{
        echo '<div class="col-lg-12">';
    }
	
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	do_action( 'digalu_woocommerce_product_content' );

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
?>
	</div>
</div>
<?php 
	do_action( 'digalu_shop_main_content_end' );
/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */

get_footer( 'shop' );