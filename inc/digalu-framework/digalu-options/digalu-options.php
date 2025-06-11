<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "digalu_opt";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }


    $alowhtml = array(
        'p' => array(
            'class' => array()
        ),
        'span' => array()
    );


    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Digalu Options', 'digalu' ),
        'page_title'           => esc_html__( 'Digalu Options', 'digalu' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );


    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'digalu' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'digalu' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'digalu' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'digalu' )
        )
    );
    Redux::set_help_tab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'digalu' );
    Redux::set_help_sidebar( $opt_name, $content );



    // -> START General Fields

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General', 'digalu' ),
        'id'               => 'digalu_general',
        'customizer_width' => '450px',
        'icon'             => 'el el-cog',
        'fields'           => array(
            array(
                'id'       => 'digalu_theme_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Theme Color', 'digalu' ),
                'subtitle' => esc_html__( 'Set Theme Color', 'digalu' )
            ),
            array(
                'id'       => 'digalu_theme_color2',
                'type'     => 'color',
                'title'    => esc_html__( 'Theme Color 2', 'digalu' ),
                'subtitle' => esc_html__( 'Set Theme Color 2 (Gradient)', 'digalu' ),
               
            ),
            array(
                'id'       => 'digalu_theme_title_typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'Title Typography', 'digalu' ),
                'subtitle' => esc_html__( 'Set Theme title font family', 'digalu'  ),
                'google'      => true, 
                'font-size' => false,
                'line-height' => false,
                'subsets' => false,
                'text-align' => false,
                'color' => false,
                'font-style' => false,
                'font-weight' => false,
                'output'      => array(''),
            ),
              
            array(
                'id'       => 'digalu_theme_body_typography',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Typography', 'digalu' ),
                'subtitle' => esc_html__( 'Set Theme body font family', 'digalu'  ),
                 'google'      => true, 
                'font-size' => false,
                'line-height' => false,
                'subsets' => false,
                'text-align' => false,
                'color' => false,
                'font-style' => false,
                'font-weight' => false,
                'output'      => array(''),

                
            ),
        )

    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Preloader', 'digalu' ),
        'id'               => 'digalu_preloader',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'digalu_display_preloader',
                'type'     => 'switch',
                'title'    => esc_html__( 'Preloader', 'digalu' ),
                'subtitle' => esc_html__( 'Switch Enabled to Display Preloader.', 'digalu' ),
                'default'  => true,
                'on'       => esc_html__('Enabled','digalu'),
                'off'      => esc_html__('Disabled','digalu'),
            ),

            array(
                'id'       => 'digalu_preloader_text',
                'type'     => 'text',
                'validate' => 'html',
                'default'  => esc_html__( 'DIGALU', 'digalu' ),
            ),
        )
    ));

    /* End General Fields */

    /* Admin Lebel Fields */
    Redux::setSection( $opt_name, array(
        'title'             => esc_html__( 'Admin Label', 'digalu' ),
        'id'                => 'digalu_admin_label',
        'customizer_width'  => '450px',
        'subsection'        => true,
        'fields'            => array(
            array(
                'title'     => esc_html__( 'Admin Login Logo', 'digalu' ),
                'subtitle'  => esc_html__( 'It belongs to the back-end of your website to log-in to admin panel.', 'digalu' ),
                'id'        => 'digalu_admin_login_logo',
                'type'      => 'media',
            ),
            array(
                'title'     => esc_html__( 'Custom CSS For admin', 'digalu' ),
                'subtitle'  => esc_html__( 'Any CSS your write here will run in admin.', 'digalu' ),
                'id'        => 'digalu_theme_admin_custom_css',
                'type'      => 'ace_editor',
                'mode'      => 'css',
                'theme'     => 'chrome',
                'full_width'=> true,
            ),
        ),
    ) );

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'digalu' ),
        'id'               => 'digalu_header',
        'customizer_width' => '400px',
        'icon'             => 'el el-credit-card',
        'fields'           => array(
            array(
                'id'       => 'digalu_header_options',
                'type'     => 'button_set',
                'default'  => '1',
                'options'  => array(
                    "1"         => esc_html__( 'Prebuilt', 'digalu' ),
                    "2"         => esc_html__( 'Header Builder', 'digalu' ),
                ),
                'title'    => esc_html__( 'Header Options', 'digalu' ),
                'subtitle' => esc_html__( 'Select header options.', 'digalu' ),
            ),
            array(
                'id'       => 'digalu_header_select_options',
                'type'     => 'select',
                'data'     => 'posts',
                'args'     => array(
                    'post_type'     => 'digalu_header'
                ),
                'title'    => esc_html__( 'Header', 'digalu' ),
                'subtitle' => esc_html__( 'Select header.', 'digalu' ),
                'required' => array( 'digalu_header_options', 'equals', '2' )
            ),
            array(
                'id'       => 'digalu_info_slogan',
                'type'     => 'text',
                'validate' => 'html',
                'default'  => esc_html__( 'Info Slogan?', 'digalu' ),
                'title'    => esc_html__( 'Info Slogan', 'digalu' ),
                'subtitle' => esc_html__( 'Set Info Slogan', 'digalu' ),
            ),
            array(
                'id'       => 'digalu_email',
                'type'     => 'text',
                'default'  => esc_html__( 'info@crysta.com', 'digalu' ),
                'title'    => esc_html__( 'EmaiL ?', 'digalu' ),
                'subtitle' => esc_html__( 'Set Email Here', 'digalu' ),
            ),
            array(
                'id'       => 'digalu_btn_text',
                'type'     => 'text',
                'default'  => esc_html__( 'Get Started', 'digalu' ),
                'title'    => esc_html__( 'Button ?', 'digalu' ),
                'subtitle' => esc_html__( 'Set Button Here', 'digalu' ),
            ),
            array(
                'id'       => 'digalu_btn_url',
                'type'     => 'text',
                'default'  => esc_html__( '#', 'digalu' ),
                'title'    => esc_html__( 'Button url?', 'digalu' ),
                'subtitle' => esc_html__( 'Set Button url Here', 'digalu' ),
            ),
        ),
    ) );
    // -> START Header Logo
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Logo', 'digalu' ),
        'id'               => 'digalu_header_logo_option',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'digalu_site_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo', 'digalu' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Upload your site logo for header ( recommendation png format ).', 'digalu' ),
            ),
            array(
                'id'       => 'digalu_site_logo_dimensions',
                'type'     => 'dimensions',
                'units'    => array('px'),
                'title'    => esc_html__('Logo Dimensions (Width/Height).', 'digalu'),
                'output'   => array('.header-logo .logo img'),
                'subtitle' => esc_html__('Set logo dimensions to choose width, height, and unit.', 'digalu'),
            ),
            array(
                'id'       => 'digalu_site_logomargin_dimensions',
                'type'     => 'spacing',
                'mode'     => 'margin',
                'output'   => array('.header-logo .logo img'),
                'units_extended' => 'false',
                'units'    => array('px'),
                'title'    => esc_html__('Logo Top and Bottom Margin.', 'digalu'),
                'left'     => false,
                'right'    => false,
                'subtitle' => esc_html__('Set logo top and bottom margin.', 'digalu'),
                'default'            => array(
                    'units'           => 'px'
                )
            ),
            array(
                'id'       => 'digalu_text_title',
                'type'     => 'text',
                'validate' => 'html',
                'title'    => esc_html__( 'Text Logo', 'digalu' ),
                'subtitle' => esc_html__( 'Write your logo text use as logo ( You can use span tag for text color ).', 'digalu' ),
            )
        )
    ) );
    // -> End Header Logo

    // -> START Header Menu
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Menu', 'digalu' ),
        'id'               => 'digalu_header_menu_option',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'digalu_header_menu_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Color', 'digalu' ),
                'subtitle' => esc_html__( 'Set Menu Color', 'digalu' ),
                'output'   => array( 'color'    =>  'nav.navbar ul.nav > li > a' ),
            ),
            array(
                'id'       => 'digalu_header_menu_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Hover Color', 'digalu' ),
                'subtitle' => esc_html__( 'Set Menu Hover Color', 'digalu' ),
                'output'   => array( 'color'    =>  'nav.navbar ul.nav > li > a:hover' ),
            ),
            array(
                'id'       => 'digalu_header_dropdown_menu_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Dropdown Menu Color', 'digalu' ),
                'subtitle' => esc_html__( 'Set Menu Color', 'digalu' ),
                'output'   => array( 'color'    =>  'nav.navbar.validnavs ul li.dropdown ul.dropdown-menu li a' ),
            ),
            array(
                'id'       => 'digalu_header_dropdown_menu_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Dropdown Menu Hover Color', 'digalu' ),
                'subtitle' => esc_html__( 'Set Menu Hover Color', 'digalu' ),
                'output'   => array( 'color'    =>  'nav.navbar.validnavs ul li.dropdown ul.dropdown-menu li a:hover' ),
            ),
        )
    ) );
    // -> End Header Menu

    // -> START Blog Page
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog', 'digalu' ),
        'id'         => 'digalu_blog_page',
        'icon'  => 'el el-blogger',
        'fields'     => array(

            array(
                'id'       => 'digalu_blog_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layout', 'digalu' ),
                'subtitle' => esc_html__( 'Choose blog layout from here. If you use this option then you will able to change three type of blog layout ( Default Left Sidebar Layour ). ', 'digalu' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('No Sidebar','digalu'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('Left Sidebar','digalu'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('Right Sidebar','digalu'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '3'
            ),
            array(
                'id'       => 'digalu_blog_grid',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Post Column', 'digalu' ),
                'subtitle' => esc_html__( 'Select your blog post column from here. If you use this option then you will able to select three type of blog post layout ( Default Two Column ).', 'digalu' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','digalu'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/1column.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','digalu'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/2column.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','digalu'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/3column.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'digalu_blog_page_title_switcher',
                'type'     => 'switch',
                'default'  => 1,
                'on'       => esc_html__('Show','digalu'),
                'off'      => esc_html__('Hide','digalu'),
                'title'    => esc_html__('Blog Page Title', 'digalu'),
                'subtitle' => esc_html__('Control blog page title show / hide. If you use this option then you will able to show / hide your blog page title ( Default Setting Show ).', 'digalu'),
            ),
            array(
                'id'       => 'digalu_blog_page_title_setting',
                'type'     => 'button_set',
                'title'    => esc_html__('Blog Page Title Setting', 'digalu'),
                'subtitle' => esc_html__('Control blog page title setting. If you use this option then you can able to show default or custom blog page title ( Default Blog ).', 'digalu'),
                'options'  => array(
                    "predefine"   => esc_html__('Default','digalu'),
                    "custom"      => esc_html__('Custom','digalu'),
                ),
                'default'  => 'predefine',
                'required' => array("digalu_blog_page_title_switcher","equals","1")
            ),
            array(
                'id'       => 'digalu_blog_page_custom_title',
                'type'     => 'text',
                'title'    => esc_html__('Blog Custom Title', 'digalu'),
                'subtitle' => esc_html__('Set blog page custom title form here. If you use this option then you will able to set your won title text.', 'digalu'),
                'required' => array('digalu_blog_page_title_setting','equals','custom')
            ),
            array(
                'id'            => 'digalu_blog_postExcerpt',
                'type'          => 'slider',
                'title'         => esc_html__( 'Blog Posts Excerpt', 'digalu' ),
                'subtitle'      => esc_html__( 'Control the number of characters you want to show in the blog page for each post.. If you use this option then you can able to control your blog post characters from here ( Default show 10 ).', 'digalu'),
                "default"       => 46,
                "min"           => 0,
                "step"          => 1,
                "max"           => 100,
                'resolution'    => 1,
                'display_value' => 'text',
            ),
            array(
                'id'       => 'digalu_blog_readmore_setting',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Read More Text Setting', 'digalu' ),
                'subtitle' => esc_html__( 'Control read more text from here.', 'digalu' ),
                'options'  => array(
                    "default"   => esc_html__('Default','digalu'),
                    "custom"    => esc_html__('Custom','digalu'),
                ),
                'default'  => 'default',
            ),
            array(
                'id'       => 'digalu_blog_custom_readmore',
                'type'     => 'text',
                'title'    => esc_html__('Read More Text', 'digalu'),
                'subtitle' => esc_html__('Set read moer text here. If you use this option then you will able to set your won text.', 'digalu'),
                'required' => array('digalu_blog_readmore_setting','equals','custom')
            ),
            array(
                'id'       => 'digalu_blog_title_color',
                'output'   => array( '.blog-area .info h3 a'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Title Color', 'digalu' ),
                'subtitle' => esc_html__( 'Set Blog Title Color.', 'digalu' ),
            ),
            array(
                'id'       => 'digalu_blog_title_hover_color',
                'output'   => array( '.blog-area .info h3 a:hover'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Title Hover Color', 'digalu' ),
                'subtitle' => esc_html__( 'Set Blog Title Hover Color.', 'digalu' ),
            ),
            array(
                'id'       => 'digalu_blog_read_more_button_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Read More Button Color', 'digalu' ),
                'subtitle' => esc_html__( 'Set Read More Button Color.', 'digalu' ),
                'output'  => array('background'   => '.blog-area.full-blog .btn.btn-md')
            ),
            array(
                'id'       => 'digalu_blog_read_more_button_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Read More Button Hover Color', 'digalu' ),
                'subtitle' => esc_html__( 'Set Read More Button Hover Color.', 'digalu' ),
                'output'  => array('background-color'   => '.blog-area.full-blog .btn.btn-theme::after')
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Single Blog Page', 'digalu' ),
        'id'         => 'digalu_post_detail_styles',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'digalu_blog_single_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Layout', 'digalu' ),
                'subtitle' => esc_html__( 'Choose blog single page layout from here. If you use this option then you will able to change three type of blog single page layout ( Default Left Sidebar Layour ). ', 'digalu' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','digalu'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','digalu'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','digalu'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '3'
            ),
            array(
                'id'       => 'digalu_post_details_title_position',
                'type'     => 'button_set',
                'default'  => 'header',
                'options'  => array(
                    'header'        => esc_html__('On Header','digalu'),
                    'below'         => esc_html__('Below Thumbnail','digalu'),
                ),
                'title'    => esc_html__('Blog Post Title Position', 'digalu'),
                'subtitle' => esc_html__('Control blog post title position from here.', 'digalu'),
            ),
            array(
                'id'       => 'digalu_post_details_custom_title',
                'type'     => 'text',
                'title'    => esc_html__('Blog Details Custom Title', 'digalu'),
                'subtitle' => esc_html__('This title will show in Breadcrumb title.', 'digalu'),
                'required' => array('digalu_post_details_title_position','equals','below')
            ),
            array(
                'id'       => 'digalu_display_post_tags',
                'type'     => 'switch',
                'title'    => esc_html__( 'Tags', 'digalu' ),
                'subtitle' => esc_html__( 'Switch On to Display Tags.', 'digalu' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','digalu'),
                'off'       => esc_html__('Disabled','digalu'),
            ),
            array(
                'id'       => 'digalu_post_details_share_options',
                'type'     => 'switch',
                'title'    => esc_html__('Share Options', 'digalu'),
                'subtitle' => esc_html__('Control post share options from here. If you use this option then you will able to show or hide post share options.', 'digalu'),
                'on'        => esc_html__('Show','digalu'),
                'off'       => esc_html__('Hide','digalu'),
                'default'   => '0',
            ),
            array(
                'id'       => 'digalu_post_details_author_desc_trigger',
                'type'     => 'switch',
                'title'    => esc_html__('Biography Info', 'digalu'),
                'subtitle' => esc_html__('Control biography info from here. If you use this option then you will able to show or hide biography info ( Default setting Show ).', 'digalu'),
                'on'        => esc_html__('Show','digalu'),
                'off'       => esc_html__('Hide','digalu'),
                'default'   => '0',
            ),
            array(
                'id'       => 'digalu_post_details_post_navigation',
                'type'     => 'switch',
                'title'    => esc_html__('Post Navigation', 'digalu'),
                'subtitle' => esc_html__('Control post navigation from here. If you use this option then you will able to show or hide post navigation ( Default setting Show ).', 'digalu'),
                'on'        => esc_html__('Show','digalu'),
                'off'       => esc_html__('Hide','digalu'),
                'default'   => true,
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Meta Data', 'digalu' ),
        'id'         => 'digalu_common_meta_data',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'digalu_blog_meta_icon_color',
                'output'   => array( '.blog-area .item .info .meta ul li i'),
                'type'     => 'color',
                'title'    => esc_html__('Blog Meta Icon Color', 'digalu'),
                'subtitle' => esc_html__('Set Blog Meta Icon Color.', 'digalu'),
            ),
            array(
                'id'       => 'digalu_blog_meta_text_color',
                'output'   => array( '.blog-area .item .info .meta ul li a'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Meta Text Color', 'digalu' ),
                'subtitle' => esc_html__( 'Set Blog Meta Text Color.', 'digalu' ),
            ),
            array(
                'id'       => 'digalu_blog_meta_text_hover_color',
                'output'   => array( '.blog-area .item .info .meta ul li a:hover'),
                'type'     => 'color',
                'title'    => esc_html__( 'Blog Meta Hover Text Color', 'digalu' ),
                'subtitle' => esc_html__( 'Set Blog Meta Hover Text Color.', 'digalu' ),
            ),
            array(
                'id'       => 'digalu_display_post_date',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Date', 'digalu' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Date.', 'digalu' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','digalu'),
                'off'       => esc_html__('Disabled','digalu'),
            ),
            array(
                'id'       => 'digalu_display_admin',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Admin', 'digalu' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Admin.', 'digalu' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','digalu'),
                'off'       => esc_html__('Disabled','digalu'),
            ),
            array(
                'id'       => 'digalu_display_post_cat',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Category', 'digalu' ),
                'subtitle' => esc_html__( 'Switch On to Display Post Category.', 'digalu' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','digalu'),
                'off'       => esc_html__('Disabled','digalu'),
            ),
            array(
                'id'       => 'digalu_display_post_views',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post View Count', 'digalu' ),
                'subtitle' => esc_html__( 'Switch On to Display Post View Counter.', 'digalu' ),
                'default'  => true,
                'on'        => esc_html__('Enabled','digalu'),
                'off'       => esc_html__('Disabled','digalu'),
            ),
        )
    ));

    /* Sidebar Start */
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Sidebar Options', 'digalu' ),
        'id'         => 'digalu_sidebar_options',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'      => 'digalu_sidebar_bg_color',
                'type'    => 'color',
                'title'   => esc_html__('Widgets Background Color', 'digalu'),
                'output'  => array('background'   => '.blog-area .sidebar .sidebar-item')
            ),
            array(
                'id'      => 'digalu_sidebar_padding_margin_box_shadow_trigger',
                'type'    => 'switch',
                'title'   => esc_html__('Widgets Custom Box Shadow/Padding/Margin/border', 'digalu'),
                'on'      => esc_html__('Show','digalu'),
                'off'     => esc_html__('Hide','digalu'),
                'default' => false
            ),
            array(
                'id'      => 'box-shadow',
                'type'    => 'box_shadow',
                'title'   => esc_html__('Box Shadow', 'digalu'),
                'units'   => array( 'px', 'em', 'rem' ),
                'output'  => ( '.blog-area .sidebar .sidebar-item' ),
                'opacity' => true,
                'rgba'    => true,
                'required'=> array( 'digalu_sidebar_padding_margin_box_shadow_trigger', 'equals' , '1' )
            ),
            array(
                'id'      => 'digalu_sidebar_widget_margin',
                'type'    => 'spacing',
                'title'   => esc_html__('Widget Margin', 'digalu'),
                'units'   => array('em', 'px'),
                'output'  => ( '.blog-area .sidebar .sidebar-item' ),
                'mode'    => 'margin',
                'required'=> array( 'digalu_sidebar_padding_margin_box_shadow_trigger', 'equals' , '1' )
            ),
            array(
                'id'      => 'digalu_sidebar_widget_padding',
                'type'    => 'spacing',
                'title'   => esc_html__('Widget Padding', 'digalu'),
                'units'   => array('em', 'px'),
                'output'  => ( '.blog-area .sidebar .sidebar-item' ),
                'mode'    => 'padding',
                'required'=> array( 'digalu_sidebar_padding_margin_box_shadow_trigger', 'equals' , '1' )
            ),
            array(
                'id'      => 'digalu_sidebar_widget_border',
                'type'    => 'border',
                'title'   => esc_html__('Widget Border', 'digalu'),
                'units'   => array('em', 'px'),
                'output'  => ( '.blog-area .sidebar .sidebar-item' ),
                'all'     => false,
                'required'=> array( 'digalu_sidebar_padding_margin_box_shadow_trigger', 'equals' , '1' )
            ),
            array(
                'id'      => 'digalu_sidebar_widget_title_heading_tag',
                'type'     => 'select',
                'options'  => array(
                    'h1'        => esc_html__('H1','digalu'),
                    'h2'        => esc_html__('H2','digalu'),
                    'h3'        => esc_html__('H3','digalu'),
                    'h4'        => esc_html__('H4','digalu'),
                    'h5'        => esc_html__('H5','digalu'),
                    'h6'        => esc_html__('H6','digalu'),
                ),
                'default'  => 'h4',
                'title'   => esc_html__('Widget Title Tag', 'digalu'),
            ),
            array(
                'id'      => 'digalu_sidebar_widget_title_margin',
                'type'    => 'spacing',
                'title'   => esc_html__('Widget Title Margin', 'digalu'),
                'mode'    => 'margin',
                'output'  => array('.blog-sidebar .widget .widget_title'),
                'units'   => array('em', 'px'),
            ),
            array(
                'id'      => 'digalu_sidebar_widget_title_padding',
                'type'    => 'spacing',
                'title'   => esc_html__('Widget Title Padding', 'digalu'),
                'mode'    => 'padding',
                'output'  => array('.blog-sidebar .widget .widget_title'),
                'units'   => array('em', 'px'),
            ),
            array(
                'id'       => 'digalu_sidebar_widget_title_color',
                'output'   =>  array('.blog-area .sidebar h1,.blog-area .sidebar h2,.blog-area .sidebar h3,.blog-area .sidebar h4,.blog-area .sidebar h5,.blog-area .sidebar h6'),
                'type'     => 'color',
                'title'    => esc_html__('Widget Title Color', 'digalu'),
                'subtitle' => esc_html__('Set Widget Title Color.', 'digalu'),
            ),
            array(
                'id'       => 'digalu_sidebar_widget_text_color',
                'output'   => array('.blog-area .sidebar'),
                'type'     => 'color',
                'title'    => esc_html__('Widget Text Color', 'digalu'),
                'subtitle' => esc_html__('Set Widget Text Color.', 'digalu'),
            ),
            array(
                'id'       => 'digalu_sidebar_widget_anchor_color',
                'type'     => 'color',
                'output'   => array('.blog-area .sidebar a'),
                'title'    => esc_html__('Widget Anchor Color', 'digalu'),
                'subtitle' => esc_html__('Set Widget Anchor Color.', 'digalu'),
            ),
            array(
                'id'       => 'digalu_sidebar_widget_anchor_hover_color',
                'type'     => 'color',
                'output'   => array('.blog-area .sidebar a:hover'),
                'title'    => esc_html__('Widget Hover Color', 'digalu'),
                'subtitle' => esc_html__('Set Widget Anchor Hover Color.', 'digalu'),
            )
        )
    ));
    /* Sidebar End */

    /* End blog Page */

    // -> START Page Option
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Page', 'digalu' ),
        'id'         => 'digalu_page_page',
        'icon'  => 'el el-file',
        'fields'     => array(
            array(
                'id'       => 'digalu_page_sidebar',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Select layout', 'digalu' ),
                'subtitle' => esc_html__( 'Choose your page layout. If you use this option then you will able to choose three type of page layout ( Default no sidebar ). ', 'digalu' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('1 Column','digalu'),
                        'img' => esc_url( get_template_directory_uri(). '/assets/img/no-sideber.png')
                    ),
                    '2' => array(
                        'alt' => esc_attr__('2 Column Left','digalu'),
                        'img' => esc_url( get_template_directory_uri() .'/assets/img/left-sideber.png')
                    ),
                    '3' => array(
                        'alt' => esc_attr__('2 Column Right','digalu'),
                        'img' => esc_url(  get_template_directory_uri() .'/assets/img/right-sideber.png' )
                    ),

                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'digalu_page_layoutopt',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar Settings', 'digalu'),
                'subtitle' => esc_html__('Set page sidebar. If you use this option then you will able to set three type of sidebar ( Default no sidebar ).', 'digalu'),
                //Must provide key => value pairs for options
                'options' => array(
                    '1' => esc_html__( 'Page Sidebar', 'digalu' ),
                    '2' => esc_html__( 'Blog Sidebar', 'digalu' )
                 ),
                'default' => '1',
                'required'  => array('digalu_page_sidebar','!=','1')
            ),
            array(
                'id'       => 'digalu_page_title_switcher',
                'type'     => 'switch',
                'title'    => esc_html__('Title', 'digalu'),
                'subtitle' => esc_html__('Switch enabled to display page title. Fot this option you will able to show / hide page title.  Default setting Enabled', 'digalu'),
                'default'  => '1',
                'on'        => esc_html__('Enabled','digalu'),
                'off'       => esc_html__('Disabled','digalu'),
            ),
            array(
                'id'       => 'digalu_page_title_tag',
                'type'     => 'select',
                'options'  => array(
                    'h1'        => esc_html__('H1','digalu'),
                    'h2'        => esc_html__('H2','digalu'),
                    'h3'        => esc_html__('H3','digalu'),
                    'h4'        => esc_html__('H4','digalu'),
                    'h5'        => esc_html__('H5','digalu'),
                    'h6'        => esc_html__('H6','digalu'),
                ),
                'default'  => 'h1',
                'title'    => esc_html__( 'Title Tag', 'digalu' ),
                'subtitle' => esc_html__( 'Select page title tag. If you use this option then you can able to change title tag H1 - H6 ( Default tag H1 )', 'digalu' ),
                'required' => array("digalu_page_title_switcher","equals","1")
            ),
            array(
                'id'       => 'digalu_allHeader_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Title Color', 'digalu' ),
                'subtitle' => esc_html__( 'Set Title Color', 'digalu' ),
                'output'   => array( 'color' => '.breadcumb-title' ),
            ),
            array(
                'id'       => 'digalu_allHeader_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Background', 'digalu' ),
                'output'   => array('.breadcrumb-area'),
                'subtitle' => esc_html__( 'Setting page header background. If you use this option then you will able to set Background Color, Background Image, Background Repeat, Background Size, Background Attachment, Background Position.', 'digalu' ),
            ),
            array(
                'id'       => 'digalu_enable_breadcrumb',
                'type'     => 'switch',
                'title'    => esc_html__( 'Breadcrumb Hide/Show', 'digalu' ),
                'subtitle' => esc_html__( 'Hide / Show breadcrumb from all pages and posts ( Default settings hide ).', 'digalu' ),
                'default'  => '1',
                'on'       => 'Show',
                'off'      => 'Hide',
            ),
            array(
                'id'       => 'digalu_allHeader_breadcrumbtextcolor',
                'type'     => 'color',
                'title'    => esc_html__( 'Breadcrumb Color', 'digalu' ),
                'subtitle' => esc_html__( 'Choose page header breadcrumb text color here.If you user this option then you will able to set page breadcrumb color.', 'digalu' ),
                'required' => array("digalu_page_title_switcher","equals","1"),
                'output'   => array( 'color' => '.breadcrumb-area .breadcrumb a, .breadcrumb-area .breadcrumb li' ),
            ),
            array(
                'id'       => 'digalu_allHeader_breadcrumbtextactivecolor',
                'type'     => 'color',
                'title'    => esc_html__( 'Breadcrumb Active Color', 'digalu' ),
                'subtitle' => esc_html__( 'Choose page header breadcrumb text active color here.If you user this option then you will able to set page breadcrumb active color.', 'digalu' ),
                'required' => array( "digalu_page_title_switcher", "equals", "1" ),
                'output'   => array( 'color' => '.breadcrumb-area .breadcrumb li.active' ),
            ),
            array(
                'id'       => 'digalu_allHeader_dividercolor',
                'type'     => 'color',
                'output'   => array( 'background'=>'.breadcrumb-area .breadcrumb li::after' ),
                'title'    => esc_html__( 'Breadcrumb Divider Color', 'digalu' ),
                'subtitle' => esc_html__( 'Choose breadcrumb divider color.', 'digalu' ),
            ),
        ),
    ) );
    /* End Page option */

    // -> START 404 Page

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( '404 Page', 'digalu' ),
        'id'         => 'digalu_404_page',
        'icon'       => 'el el-ban-circle',
        'fields'     => array(
            array(
                'id'       => 'digalu_fof_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Page Title', 'digalu' ),
                'subtitle' => esc_html__( 'Set Page Title', 'digalu' ),
                'default'  => esc_html__( '404', 'digalu' ),
            ),
            array(
                'id'       => 'digalu_fof_subtitle',
                'type'     => 'text',
                'title'    => esc_html__( 'Page Subtitle', 'digalu' ),
                'subtitle' => esc_html__( 'Set Page Subtitle ', 'digalu' ),
                'default'  => esc_html__( 'Oops! That page can\'t be found.', 'digalu' ),
            ),
            array(
                'id'       => 'digalu_fof_description',
                'type'     => 'text',
                'title'    => esc_html__( 'Page Description', 'digalu' ),
                'subtitle' => esc_html__( 'Set Page Subtitle ', 'digalu' ),
                'default'  => esc_html__( 'Unfortunately, something went wrong and this page does not exist. Try using the search or return to the previous page.', 'digalu' ),
            ),
            array(
                'id'       => 'digalu_fof_btn_text',
                'type'     => 'text',
                'title'    => esc_html__( 'Button Text', 'digalu' ),
                'subtitle' => esc_html__( 'Set Button Text ', 'digalu' ),
                'default'  => esc_html__( 'Return To Home', 'digalu' ),
            ),
            array(
                'id'       => 'digalu_fof_text_color',
                'type'     => 'color',
                'output'   => array( '.error-page-area .error-box h1' ),
                'title'    => esc_html__( 'Title Color', 'digalu' ),
                'subtitle' => esc_html__( 'Pick a title color', 'digalu' ),
                'validate' => 'color'
            ),
            array(
                'id'       => 'digalu_fof_subtitle_color',
                'type'     => 'color',
                'output'   => array( '.error-page-area .error-box h2' ),
                'title'    => esc_html__( 'Subtitle Color', 'digalu' ),
                'subtitle' => esc_html__( 'Pick a subtitle color', 'digalu' ),
                'validate' => 'color'
            ),
        ),
    ) );

    // -> START Gallery
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Gallery', 'digalu' ),
        'id'         => 'digalu_gallery_widget',
        'icon'       => 'el el-gift',
        'fields'     => array(
            array(
                'id'          => 'digalu_gallery_image_widget',
                'type'        => 'slides',
                'title'       => esc_html__( 'Add Gallery Image', 'digalu' ),
                'subtitle'    => esc_html__( 'Add gallery Image and url.', 'digalu' ),
                'show'        => array(
                    'title'          => false,
                    'description'    => false,
                    'progress'       => false,
                    'icon'           => false,
                    'facts-number'   => false,
                    'facts-title1'   => false,
                    'facts-title2'   => false,
                    'facts-number-2' => false,
                    'facts-title3'   => false,
                    'facts-number-3' => false,
                    'url'            => true,
                    'project-button' => false,
                    'image_upload'   => true,
                ),
            ),
        ),
    ) );
    // -> START Subscribe
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Subscribe', 'digalu' ),
        'id'         => 'digalu_subscribe_page',
        'icon'       => 'el el-eject',
        'fields'     => array(

            array(
                'id'       => 'digalu_subscribe_apikey',
                'type'     => 'text',
                'title'    => esc_html__( 'Mailchimp API Key', 'digalu' ),
                'subtitle' => esc_html__( 'Set mailchimp api key.', 'digalu' ),
            ),
            array(
                'id'       => 'digalu_subscribe_listid',
                'type'     => 'text',
                'title'    => esc_html__( 'Mailchimp List ID', 'digalu' ),
                'subtitle' => esc_html__( 'Set mailchimp list id.', 'digalu' ),
            ),
        ),
    ) );

    /* End Subscribe */

    // -> START Social Media

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Social', 'digalu' ),
        'id'         => 'digalu_social_media',
        'icon'      => 'el el-globe',
        'desc'      => esc_html__( 'Social', 'digalu' ),
        'fields'     => array(
            array(
                'id'          => 'digalu_social_links',
                'type'        => 'slides',
                'title'       => esc_html__('Social Profile Links', 'digalu'),
                'subtitle'    => esc_html__('Add social icon and url.', 'digalu'),
                'show'        => array(
                    'title'          => true,
                    'description'    => true,
                    'progress'       => false,
                    'facts-number'   => false,
                    'facts-title1'   => false,
                    'facts-title2'   => false,
                    'facts-number-2' => false,
                    'facts-title3'   => false,
                    'facts-number-3' => false,
                    'url'            => true,
                    'project-button' => false,
                    'image_upload'   => false,
                ),
                'placeholder'   => array(
                    'icon'          => esc_html__( 'Icon (example: fa fa-facebook) ','digalu'),
                    'title'         => esc_html__( 'Social Icon Class', 'digalu' ),
                    'description'   => esc_html__( 'Social Icon Title', 'digalu' ),
                ),
            ),
        ),
    ) );

    /* End social Media */


    // -> START Footer Media
    Redux::setSection( $opt_name , array(
       'title'            => esc_html__( 'Footer', 'digalu' ),
       'id'               => 'digalu_footer',
       'desc'             => esc_html__( 'digalu Footer', 'digalu' ),
       'customizer_width' => '400px',
       'icon'              => 'el el-photo',
   ) );

   Redux::setSection( $opt_name, array(
       'title'      => esc_html__( 'Pre-built Footer / Footer Builder', 'digalu' ),
       'id'         => 'digalu_footer_section',
       'subsection' => true,
       'fields'     => array(
            array(
               'id'       => 'digalu_footer_builder_trigger',
               'type'     => 'button_set',
               'default'  => 'prebuilt',
               'options'  => array(
                   'footer_builder'        => esc_html__('Footer Builder','digalu'),
                   'prebuilt'              => esc_html__('Pre-built Footer','digalu'),
               ),
               'title'    => esc_html__( 'Footer Builder', 'digalu' ),
            ),
            array(
               'id'       => 'digalu_footer_builder_select',
               'type'     => 'select',
               'required' => array( 'digalu_footer_builder_trigger','equals','footer_builder'),
               'data'     => 'posts',
               'args'     => array(
                   'post_type'     => 'digalu_footer'
               ),
               'on'       => esc_html__( 'Enabled', 'digalu' ),
               'off'      => esc_html__( 'Disable', 'digalu' ),
               'title'    => esc_html__( 'Select Footer', 'digalu' ),
               'subtitle' => esc_html__( 'First make your footer from footer custom types then select it from here.', 'digalu' )
            ),
            array(
               'id'       => 'digalu_footerwidget_enable',
               'type'     => 'switch',
               'title'    => esc_html__( 'Footer Widget', 'digalu' ),
               'default'  => 0,
               'on'       => esc_html__( 'Enabled', 'digalu' ),
               'off'      => esc_html__( 'Disable', 'digalu' ),
               'required' => array( 'digalu_footer_builder_trigger','equals','prebuilt'),
            ),
            array(
               'id'       => 'digalu_footer_background',
               'type'     => 'background',
               'default'  => '#202942',
               'title'    => esc_html__( 'Footer Background', 'digalu' ),
               'subtitle' => esc_html__( 'Set footer background.', 'digalu' ),
               'output'   => array( '.footer-custom-style' ),
               'important' => true,
               'required' => array( 'digalu_footerwidget_enable','=','1' ),
            ),
            array(
               'id'       => 'digalu_footer_widget_title_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Widget Title Color', 'digalu' ),
               'required' => array('digalu_footerwidget_enable','=','1'),
               'output'   => array( '.footer-custom-style h4' ),
            ),
            array(
               'id'       => 'digalu_footer_widget_anchor_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Widget Anchor Color', 'digalu' ),
               'required' => array('digalu_footerwidget_enable','=','1'),
               'output'   => array( '.footer-custom-style a' ),
            ),
            array(
               'id'       => 'digalu_footer_widget_anchor_hov_color',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Widget Anchor Hover Color', 'digalu' ),
               'required' => array('digalu_footerwidget_enable','=','1'),
               'output'   => array( '.footer-layout4 .footer-wid-wrap .widget_contact p a:hover,.footer-layout4 .footer-wid-wrap .widget-links ul li a:hover' ),
            ),
            array(
               'id'       => 'digalu_disable_footer_bottom',
               'type'     => 'switch',
               'title'    => esc_html__( 'Footer Bottom?', 'digalu' ),
               'default'  => 1,
               'on'       => esc_html__('Enabled','digalu'),
               'off'      => esc_html__('Disable','digalu'),
               'required' => array('digalu_footer_builder_trigger','equals','prebuilt'),
            ),
            array(
               'id'       => 'digalu_footer_bottom_background',
               'type'     => 'color',
               'title'    => esc_html__( 'Footer Bottom Background Color', 'digalu' ),
               'required' => array( 'digalu_disable_footer_bottom','=','1' ),
               'output'   => array( 'background-color'   =>   '.footer-bottom' ),
            ),
            array(
               'id'       => 'digalu_copyright_text',
               'type'     => 'text',
               'title'    => esc_html__( 'Copyright Text', 'digalu' ),
               'subtitle' => esc_html__( 'Add Copyright Text', 'digalu' ),
               'default'  => sprintf( 'Copyright <i class="fal fa-copyright"></i> %s <a href="%s">%s</a> All Rights Reserved by <a href="%s">%s</a>',date('Y'),esc_url('#'),__( 'Digalu.','digalu' ),esc_url('#'),__( 'Validthemes', 'digalu' ) ),
               'required' => array( 'digalu_disable_footer_bottom','equals','1' ),
            ),
       ),
   ) );


    /* End Footer Media */

    // -> START Custom Css
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Custom Css', 'digalu' ),
        'id'         => 'digalu_custom_css_section',
        'icon'  => 'el el-css',
        'fields'     => array(
            array(
                'id'       => 'digalu_css_editor',
                'type'     => 'ace_editor',
                'title'    => esc_html__('CSS Code', 'digalu'),
                'subtitle' => esc_html__('Paste your CSS code here.', 'digalu'),
                'mode'     => 'css',
                'theme'    => 'monokai',
            )
        ),
    ) );

    /* End custom css */



    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'digalu' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'digalu' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'digalu' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }