<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit();
}
/**
 * @Packge     : Digalu
 * @Version    : 1.0
 * @Author     : Digalu
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */

// enqueue css
function digalu_common_custom_css(){
	wp_enqueue_style( 'digalu-color-schemes', get_template_directory_uri().'/assets/css/color.schemes.css' );

    $CustomCssOpt  = digalu_opt( 'digalu_css_editor' );
    $preloader_display  =  digalu_opt('digalu_display_preloader');
	if( $CustomCssOpt ){
		$CustomCssOpt = $CustomCssOpt;
	}else{
		$CustomCssOpt = '';
	}

    $customcss = "";
    
    if( get_header_image() ){
        $digalu_header_bg =  get_header_image();
    }else{
        if( digalu_meta( 'page_breadcrumb_settings' ) == 'page' && is_page() ){
            if( ! empty( digalu_meta( 'breadcumb_image' ) ) ){
                $digalu_header_bg = digalu_meta( 'breadcumb_image' );
            }
        }
    }
    
    if( !empty( $digalu_header_bg ) ){
        $customcss .= ".breadcrumb-area{
            background:url('{$digalu_header_bg}')!important;
            background-position: center center !important;
            background-size: cover !important;
        }";
    }
    if( !empty( $preloader_display ) ){
        $digalu_pre_img = digalu_opt( 'digalu_preloader_img','url' );
        if( ! empty( digalu_opt( 'digalu_preloader_img','url' ) ) ){
            $customcss .= ".se-pre-con{
                background:url('{$digalu_pre_img}')!important;
                text-align: center;
                position: absolute;
                left: 50%;
                top: 50%;
                -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                text-align: center;
                line-height: 1;
                width: 96px;
                height: 48px;
                display: inline-block;
                position: relative;
                background: #fff;
                border-radius: 48px 48px 0 0;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                overflow: hidden;
                            }";
        }
    }
    
	// theme color
    $digaluthemecolor = digalu_opt('digalu_theme_color');
	$digaluthemecolor2 = digalu_opt('digalu_theme_color2');

    list($r, $g, $b) = sscanf( $digaluthemecolor, "#%02x%02x%02x");
    list($r2, $g2, $b2) = sscanf( $digaluthemecolor2, "#%02x%02x%02x");

    $digalu_real_color = $r.','.$g.','.$b;
    $digalu_real_color2 = $r2.','.$g2.','.$b2;


	if( !empty( $digaluthemecolor ) ) {
		$customcss .= ":root {
		  --color-primary: rgb({$digalu_real_color});
		}";
	}

    // theme color for home1 Gradient color
    if( !empty( $digaluthemecolor && $digaluthemecolor2) ) {
        $customcss .= ":root {
          --color-primary: rgb({$digalu_real_color});
          --color-optional-secondary: rgb({$digalu_real_color2});
        }";
    }

    // theme body font
    $digaluthemebodyfont = digalu_opt('digalu_theme_body_typography', 'font-family');

    if( !empty( $digaluthemebodyfont ) ) {
        $customcss .= ":root {
          --font-default: $digaluthemebodyfont ;
        }";
    }

    // theme title font
    $digaluthemetitlefont = digalu_opt('digalu_theme_title_typography', 'font-family');

    if( !empty( $digaluthemetitlefont ) ) {
        $customcss .= ":root {
          --font-heading: $digaluthemetitlefont ;
        }";
    }

	if( !empty( $CustomCssOpt ) ){
		$customcss .= $CustomCssOpt;
	}

    wp_add_inline_style( 'digalu-color-schemes', $customcss );
}
add_action( 'wp_enqueue_scripts', 'digalu_common_custom_css', 100 );