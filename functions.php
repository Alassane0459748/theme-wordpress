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

/**
 * Include File
 *
 */

// Constants
require_once get_parent_theme_file_path() . '/inc/digalu-constants.php';

//theme setup
require_once DIGALU_DIR_PATH_INC . 'theme-setup.php';

//essential scripts
require_once DIGALU_DIR_PATH_INC . 'essential-scripts.php';

//NavWalker
require_once DIGALU_DIR_PATH_INC . 'digalu-navwalker.php';

// plugin activation
require_once DIGALU_DIR_PATH_FRAM . 'plugins-activation/digalu-active-plugins.php';

// meta options
require_once DIGALU_DIR_PATH_FRAM . 'digalu-meta/digalu-config.php';

// page breadcrumbs
require_once DIGALU_DIR_PATH_INC . 'digalu-breadcrumbs.php';

// sidebar register
require_once DIGALU_DIR_PATH_INC . 'digalu-widgets-reg.php';

//essential functions
require_once DIGALU_DIR_PATH_INC . 'digalu-functions.php';

// theme dynamic css
require_once DIGALU_DIR_PATH_INC . 'digalu-commoncss.php';

// helper function
require_once DIGALU_DIR_PATH_INC . 'wp-html-helper.php';

// Demo Data
require_once DIGALU_DEMO_DIR_PATH . 'demo-import.php';

// digalu options
require_once DIGALU_DIR_PATH_FRAM . 'digalu-options/digalu-options.php';

// hooks
require_once DIGALU_DIR_PATH_HOOKS . 'hooks.php';

// hooks funtion
require_once DIGALU_DIR_PATH_HOOKS . 'hooks-functions.php';

require_once DIGALU_DIR_PATH_INC . '/woocommerce-hooks/woocommerce-hooks.php';

// woocommerce hooks
require_once DIGALU_DIR_PATH_INC . '/woocommerce-hooks/woocommerce-hooks-functions.php';