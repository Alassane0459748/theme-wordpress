<?php

/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

 /**
 * Only return default value if we don't have a post ID (in the 'post' query variable)
 *
 * @param  bool  $default On/Off (true/false)
 * @return mixed          Returns true or '', the blank default
 */
function digalu_set_checkbox_default_for_new_post( $default ) {
	return isset( $_GET['post'] ) ? '' : ( $default ? (string) $default : '' );
}

add_action( 'cmb2_admin_init', 'digalu_register_metabox' );

/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */

function digalu_register_metabox() {

	$prefix = '_digalu_';

	$prefixpage = '_digalupage_';
	
	$digalu_service_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'service_page_control',
		'title'         => esc_html__( 'Service Page Controller', 'digalu' ),
		'object_types'  => array( 'carvis_service' ), // Post type
		'closed'        => true
	) );
	$digalu_service_meta->add_field( array(
		'name' => esc_html__( 'Write Flaticon Class', 'digalu' ),
	   	'desc' => esc_html__( 'Write Flaticon Class For The Icon', 'digalu' ),
	   	'id'   => $prefix . 'flat_icon_class',
		'type' => 'text',
    ) );
	
	$digalu_post_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'blog_post_control',
		'title'         => esc_html__( 'Post Thumb Controller', 'digalu' ),
		'object_types'  => array( 'post' ), // Post type
		'closed'        => true
	) );
	$digalu_post_meta->add_field( array(
		'name' => esc_html__( 'Post Format Video', 'digalu' ),
		'desc' => esc_html__( 'Use This Field When Post Format Video', 'digalu' ),
		'id'   => $prefix . 'post_format_video',
        'type' => 'text_url',
    ) );
	$digalu_post_meta->add_field( array(
		'name' => esc_html__( 'Post Format Audio', 'digalu' ),
		'desc' => esc_html__( 'Use This Field When Post Format Audio', 'digalu' ),
		'id'   => $prefix . 'post_format_audio',
        'type' => 'oembed',
    ) );
	$digalu_post_meta->add_field( array(
		'name' => esc_html__( 'Post Thumbnail For Slider', 'digalu' ),
		'desc' => esc_html__( 'Use This Field When You Want A Slider In Post Thumbnail', 'digalu' ),
		'id'   => $prefix . 'post_format_slider',
        'type' => 'file_list',
    ) );
	
	$digalu_page_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_meta_section',
		'title'         => esc_html__( 'Page Meta', 'digalu' ),
		'object_types'  => array( 'page' ), // Post type
        'closed'        => true
    ) );

    $digalu_page_meta->add_field( array(
		'name' => esc_html__( 'Page Breadcrumb Area', 'digalu' ),
		'desc' => esc_html__( 'check to display page breadcrumb area.', 'digalu' ),
		'id'   => $prefix . 'page_breadcrumb_area',
        'type' => 'select',
        'default' => '1',
        'options'   => array(
            '1'   => esc_html__('Show','digalu'),
            '2'     => esc_html__('Hide','digalu'),
        )
    ) );


    $digalu_page_meta->add_field( array(
		'name' => esc_html__( 'Page Breadcrumb Settings', 'digalu' ),
		'id'   => $prefix . 'page_breadcrumb_settings',
        'type' => 'select',
        'default'   => 'global',
        'options'   => array(
            'global'   => esc_html__( 'Global Settings', 'digalu' ),
            'page'     => esc_html__( 'Page Settings', 'digalu' ),
        )
	) );
	
	$digalu_page_meta->add_field( array(
	    'name'    => esc_html__( 'Breadcumb Image', 'digalu' ),
	    'desc'    => esc_html__( 'Upload an image or enter an URL.', 'digalu' ),
	    'id'      => $prefix . 'breadcumb_image',
	    'type'    => 'file',
	    // Optional:
	    'options' => array(
	        'url' => false, // Hide the text input for the url
	    ),
	    'text'    => array(
	        'add_upload_file_text' => __( 'Add File', 'digalu' ) // Change upload button text. Default: "Add or Upload File"
	    ),
	    'preview_size' => 'large', // Image size to use when previewing in the admin.
	) );
	
    $digalu_page_meta->add_field( array(
		'name' => esc_html__( 'Page Title', 'digalu' ),
		'desc' => esc_html__( 'check to display Page Title.', 'digalu' ),
		'id'   => $prefix . 'page_title',
        'type' => 'select',
        'default' => '1',
        'options'   => array(
            '1'   	=> esc_html__( 'Show','digalu'),
            '2'     => esc_html__( 'Hide','digalu'),
        )
	) );

    $digalu_page_meta->add_field( array(
		'name' => esc_html__( 'Page Title Settings', 'digalu' ),
		'id'   => $prefix . 'page_title_settings',
        'type' => 'select',
        'options'   => array(
            'default'  => esc_html__('Default Title','digalu'),
            'custom'  => esc_html__('Custom Title','digalu'),
        ),
        'default'   => 'default'
    ) );

    $digalu_page_meta->add_field( array(
		'name' => esc_html__( 'Custom Page Title', 'digalu' ),
		'id'   => $prefix . 'custom_page_title',
        'type' => 'text'
    ) );

    $digalu_page_meta->add_field( array(
		'name' => esc_html__( 'Breadcrumb', 'digalu' ),
		'desc' => esc_html__( 'Select Show to display breadcrumb area', 'digalu' ),
		'id'   => $prefix . 'page_breadcrumb_trigger',
        'type' => 'switch_btn',
        'default' => digalu_set_checkbox_default_for_new_post( true ),
    ) );

    $digalu_layout_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_layout_section',
		'title'         => esc_html__( 'Page Layout', 'digalu' ),
        'context' 		=> 'side',
        'priority' 		=> 'high',
        'object_types'  => array( 'page' ), // Post type
        'closed'        => true
	) );

	$digalu_layout_meta->add_field( array(
		'desc'       => esc_html__( 'Set page layout container,container fluid,fullwidth or both. It\'s work only in template builder page.', 'digalu' ),
		'id'         => $prefix . 'custom_page_layout',
		'type'       => 'radio',
        'options' => array(
            '1' => esc_html__( 'Container', 'digalu' ),
            '2' => esc_html__( 'Container Fluid', 'digalu' ),
            '3' => esc_html__( 'Fullwidth', 'digalu' ),
        ),
	) );

	$digalu_product_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'product_meta_section',
		'title'         => esc_html__( 'Swap Image', 'digalu' ),
		'object_types'  => array( 'product' ), // Post type
		'closed'        => true,
		'context'		=> 'side',
		'priority'		=> 'default'
	) );

	$digalu_product_meta->add_field( array(
		'name' 		=> esc_html__( 'Product Swap Image', 'digalu' ),
		'desc' 		=> esc_html__( 'Set Product Swap Image', 'digalu' ),
		'id'   		=> $prefix.'product_swap_image',
		'type'    	=> 'file',
		// Optional:
		'options' 	=> array(
			'url' 		=> false, // Hide the text input for the url
		),
		'text'    	=> array(
			'add_upload_file_text' => __( 'Add Swap Image', 'digalu' ) // Change upload button text. Default: "Add or Upload File"
		),
	) );
}

add_action( 'cmb2_admin_init', 'digalu_register_taxonomy_metabox' );
/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function digalu_register_taxonomy_metabox() {

    $prefix = '_digalu_';
	/**
	 * Metabox to add fields to categories and tags
	 */
	$digalu_term_meta = new_cmb2_box( array(
		'id'               => $prefix.'term_edit',
		'title'            => esc_html__( 'Category Metabox', 'digalu' ),
		'object_types'     => array( 'term' ),
		'taxonomies'       => array( 'category'),
	) );
	$digalu_term_meta->add_field( array(
		'name'     => esc_html__( 'Extra Info', 'digalu' ),
		'id'       => $prefix.'term_extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );
	$digalu_term_meta->add_field( array(
		'name' => esc_html__( 'Category Image', 'digalu' ),
		'desc' => esc_html__( 'Set Category Image', 'digalu' ),
		'id'   => $prefix.'term_avatar',
        'type' => 'file',
        'text'    => array(
			'add_upload_file_text' => esc_html__('Add Image','digalu') // Change upload button text. Default: "Add or Upload File"
		),
	) );


	/**
	 * Metabox for the user profile screen
	 */
	$digalu_user = new_cmb2_box( array(
		'id'               => $prefix.'user_edit',
		'title'            => esc_html__( 'User Profile Metabox', 'digalu' ), // Doesn't output for user boxes
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );
	$digalu_user->add_field( array(
		'name'     => esc_html__( 'Social Profile', 'digalu' ),
		'id'       => $prefix.'user_extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$group_field_id = $digalu_user->add_field( array(
        'id'          => $prefix .'social_profile_group',
        'type'        => 'group',
        'description' => __( 'Social Profile', 'digalu' ),
        'options'     => array(
            'group_title'       => __( 'Social Profile {#}', 'digalu' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Social Profile', 'digalu' ),
            'remove_button'     => __( 'Remove Social Profile', 'digalu' ),
            'closed'         => true
        ),
    ) );

    $digalu_user->add_group_field( $group_field_id, array(
        'name'        => __( 'Select Icon', 'digalu' ),
        'id'          => $prefix .'social_profile_icon',
        'type'        => 'fontawesome_icon', // This field type
    ) );

    $digalu_user->add_group_field( $group_field_id, array(
        'desc'       => esc_html__( 'Set social profile link.', 'digalu' ),
        'id'         => $prefix . 'lawyer_social_profile_link',
        'name'       => esc_html__( 'Social Profile link', 'digalu' ),
        'type'       => 'text'
    ) );
}