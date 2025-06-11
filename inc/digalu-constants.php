<?php
/**
 * @Packge     : Digalu
 * @Version    : 1.0
 * @Author     : Digalu
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */

// Block direct access
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 *
 * Define constant
 *
 */

// Base URI
if ( ! defined( 'DIGALU_DIR_URI' ) ) {
    define('DIGALU_DIR_URI', get_parent_theme_file_uri().'/' );
}

// Assist URI
if ( ! defined( 'DIGALU_DIR_ASSIST_URI' ) ) {
    define( 'DIGALU_DIR_ASSIST_URI', get_theme_file_uri('/assets/') );
}


// Css File URI
if ( ! defined( 'DIGALU_DIR_CSS_URI' ) ) {
    define( 'DIGALU_DIR_CSS_URI', get_theme_file_uri('/assets/css/') );
}

// Skin Css File
if ( ! defined( 'DIGALU_DIR_SKIN_CSS_URI' ) ) {
    define( 'DIGALU_DIR_SKIN_CSS_URI', get_theme_file_uri('/assets/css/skins/') );
}


// Js File URI
if (!defined('DIGALU_DIR_JS_URI')) {
    define('DIGALU_DIR_JS_URI', get_theme_file_uri('/assets/js/'));
}


// External PLugin File URI
if (!defined('DIGALU_DIR_PLUGIN_URI')) {
    define('DIGALU_DIR_PLUGIN_URI', get_theme_file_uri( '/assets/plugins/'));
}

// Base Directory
if (!defined('DIGALU_DIR_PATH')) {
    define('DIGALU_DIR_PATH', get_parent_theme_file_path() . '/');
}

//Inc Folder Directory
if (!defined('DIGALU_DIR_PATH_INC')) {
    define('DIGALU_DIR_PATH_INC', DIGALU_DIR_PATH . 'inc/');
}

//DIGALU framework Folder Directory
if (!defined('DIGALU_DIR_PATH_FRAM')) {
    define('DIGALU_DIR_PATH_FRAM', DIGALU_DIR_PATH_INC . 'digalu-framework/');
}

//Classes Folder Directory
if (!defined('DIGALU_DIR_PATH_CLASSES')) {
    define('DIGALU_DIR_PATH_CLASSES', DIGALU_DIR_PATH_INC . 'classes/');
}

//Hooks Folder Directory
if (!defined('DIGALU_DIR_PATH_HOOKS')) {
    define('DIGALU_DIR_PATH_HOOKS', DIGALU_DIR_PATH_INC . 'hooks/');
}

//Demo Data Folder Directory Path
if( !defined( 'DIGALU_DEMO_DIR_PATH' ) ){
    define( 'DIGALU_DEMO_DIR_PATH', DIGALU_DIR_PATH_INC.'demo-data/' );
}
    
//Demo Data Folder Directory URI
if( !defined( 'DIGALU_DEMO_DIR_URI' ) ){
    define( 'DIGALU_DEMO_DIR_URI', DIGALU_DIR_URI.'inc/demo-data/' );
}