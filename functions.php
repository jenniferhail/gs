<?php
/**
 * Theme functions
 *
 * Sets up the theme and provides some helper functions.
 *
 * @package Gildersleeve
 */


/* OEMBED SIZING
 ========================== */
 
if ( ! isset( $content_width ) )
	$content_width = 600;
	
	
/* THEME SETUP
 ========================== */
 
if ( ! function_exists( 'gildersleeve_setup' ) ):
function gildersleeve_setup() {

	// Available for translation
	load_theme_textdomain( 'gildersleeve', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// Add custom nav menu support
	register_nav_menu( 'leftmenu', __( 'Left Menu', 'gildersleeve' ) );
	register_nav_menu( 'rightmenu', __( 'Right Menu', 'gildersleeve' ) );
    register_nav_menu( 'responsivemenu', __( 'Responsive Menu', 'gildersleeve' ) );
	
	// Add featured image support
	add_theme_support( 'post-thumbnails' );
	
	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );

	// Enable support for a custom header
	add_theme_support( 'custom-header', array (
	'flex-width'	=> true,
	'width'         => 300,
	'flex-height'	=> true,
	'height'        => 206,
	'default-image' => get_template_directory_uri() . '/images/logo.png',
	'uploads'       => true,
	) );

	// Enable support for a custom background
	add_theme_support( 'custom-background', array (
	'default-color'	=> 'FFFFFF',
	) );
	
	// Add custom image sizes
	// add_image_size( 'name', 500, 300 );
}
endif;
add_action( 'after_setup_theme', 'gildersleeve_setup' );


/* SIDEBARS & WIDGET AREAS
 ========================== */
function gildersleeve_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Footer', 'gildersleeve' ),
		'id' => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget-footer %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Sidebar', 'gildersleeve' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
}
add_action( 'widgets_init', 'gildersleeve_widgets_init' );


/* ENQUEUE SCRIPTS & STYLES
 ========================== */
function gildersleeve_scripts() {
	// theme style.css file
	wp_enqueue_style( 'gildersleeve-style', get_stylesheet_uri() );
	
	// threaded comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// custom scripts
	wp_enqueue_script(
		'theme',
		get_template_directory_uri() . '/assets/theme.js',
		array('jquery')
	);
}    
add_action('wp_enqueue_scripts', 'gildersleeve_scripts');

/* CUSTOMIZER
 ========================== */

function gildersleeve_customize_register($wp_customize){
   
	$wp_customize->add_section('gildersleeve_color_scheme', array(
        'title'    => __('Font Styles', 'gildersleeve'),
        'priority' => 120,
    ));   

 	//  =============================
    //  = Color Picker H1           =
    //  =============================
    $wp_customize->add_setting('gildersleeve_theme_options[h1_color]', array(
        'default'           => '#497fb9',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'h1_color', array(
        'label'    => __( 'H1 Color', 'gildersleeve' ),
        'name'     => 'h1_color',
        'section'  => 'gildersleeve_color_scheme',
        'settings' => 'gildersleeve_theme_options[h1_color]',
        'priority' => 1,        
    )));

 	//  =============================
    //  = Color Picker H2           =
    //  =============================
    $wp_customize->add_setting('gildersleeve_theme_options[h2_color]', array(
        'default'           => '#497fb9',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'option',
 
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'h2_color', array(
        'label'    => __('H2 Color', 'gildersleeve'),
        'section'  => 'gildersleeve_color_scheme',
        'settings' => 'gildersleeve_theme_options[h2_color]',
        'priority' => 2,        
    )));
 
 	//  =============================
    //  = Color Picker H3           =
    //  =============================
    $wp_customize->add_setting('gildersleeve_theme_options[h3_color]', array(
        'default'           => '#497fb9',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'h3_color', array(
        'label'    => __('H3 Color', 'gildersleeve'),
        'section'  => 'gildersleeve_color_scheme',
        'settings' => 'gildersleeve_theme_options[h3_color]',
        'priority' => 3,
    )));

 	//  =============================
    //  = Color Picker H4           =
    //  =============================
    $wp_customize->add_setting('gildersleeve_theme_options[h4_color]', array(
        'default'           => '#497fb9',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'h4_color', array(
        'label'    => __('H4 Color', 'gildersleeve'),
        'section'  => 'gildersleeve_color_scheme',
        'settings' => 'gildersleeve_theme_options[h4_color]',
        'priority' => 4,        
    )));

 	//  =============================
    //  = Color Picker H5           =
    //  =============================
    $wp_customize->add_setting('gildersleeve_theme_options[h5_color]', array(
        'default'           => '#497fb9',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'h5_color', array(
        'label'    => __('H5 Color', 'gildersleeve'),
        'section'  => 'gildersleeve_color_scheme',
        'settings' => 'gildersleeve_theme_options[h5_color]',
        'priority' => 5,        
    )));

 	//  =============================
    //  = Color Picker H6           =
    //  =============================
    $wp_customize->add_setting('gildersleeve_theme_options[h6_color]', array(
        'default'           => '#497fb9',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'h6_color', array(
        'label'    => __('H6 Color', 'gildersleeve'),
        'section'  => 'gildersleeve_color_scheme',
        'settings' => 'gildersleeve_theme_options[h6_color]',
        'priority' => 6,        
    )));

    //  =============================
    //  = Text Input H1             =
    //  =============================
    $wp_customize->add_setting('gildersleeve_theme_options[h1_size]', array(
        'default'        => '32px',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('gildersleeve_h1_size', array(
        'label'      => __('H1 Size', 'gildersleeve'),
        'section'    => 'gildersleeve_color_scheme',
        'settings'   => 'gildersleeve_theme_options[h1_size]',
        'priority' => 7,        
    ));

    //  =============================
    //  = Text Input H2             =
    //  =============================
    $wp_customize->add_setting('gildersleeve_theme_options[h2_size]', array(
        'default'        => '24px',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('gildersleeve_h2_size', array(
        'label'      => __('H2 Size', 'gildersleeve'),
        'section'    => 'gildersleeve_color_scheme',
        'settings'   => 'gildersleeve_theme_options[h2_size]',
        'priority' => 8,        
    ));

    //  =============================
    //  = Text Input H3             =
    //  =============================
    $wp_customize->add_setting('gildersleeve_theme_options[h3_size]', array(
        'default'        => '20px',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('gildersleeve_h3_size', array(
        'label'      => __('H3 Size', 'gildersleeve'),
        'section'    => 'gildersleeve_color_scheme',
        'settings'   => 'gildersleeve_theme_options[h3_size]',
        'priority' => 9,        
    ));

    //  =============================
    //  = Text Input H4             =
    //  =============================
    $wp_customize->add_setting('gildersleeve_theme_options[h4_size]', array(
        'default'        => '18px',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('gildersleeve_h4_size', array(
        'label'      => __('H4 Size', 'gildersleeve'),
        'section'    => 'gildersleeve_color_scheme',
        'settings'   => 'gildersleeve_theme_options[h4_size]',
        'priority' => 10,        
    ));

    //  =============================
    //  = Text Input H5             =
    //  =============================
    $wp_customize->add_setting('gildersleeve_theme_options[h5_size]', array(
        'default'        => '14px',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('gildersleeve_h5_size', array(
        'label'      => __('H5 Size', 'gildersleeve'),
        'section'    => 'gildersleeve_color_scheme',
        'settings'   => 'gildersleeve_theme_options[h5_size]',
        'priority'   => 11,        
    ));

    //  =============================
    //  = Text Input H6             =
    //  =============================
    $wp_customize->add_setting('gildersleeve_theme_options[h6]', array(
        'default'        => '12px',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('gildersleeve_h6', array(
        'label'      => __('H6 Size', 'gildersleeve'),
        'section'    => 'gildersleeve_color_scheme',
        'settings'   => 'gildersleeve_theme_options[h6]',
        'priority'   => 12,        
    )); 

    //  =============================
    //  = Text Input Headers        =
    //  =============================
    $wp_customize->add_setting('gildersleeve_theme_options[h_font_family]', array(
        'default'        => 'Lato',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('gildersleeve_h_font_family', array(
        'label'      => __('Font Family for Headings', 'gildersleeve'),
        'section'    => 'gildersleeve_color_scheme',
        'settings'   => 'gildersleeve_theme_options[h_font_family]',
        'priority'   => 13,        
    ));    

    //  =============================
    //  = Font Weight Headers       =
    //  =============================
     $wp_customize->add_setting('gildersleeve_theme_options[h_font_weight]', array(
        'default'        => '300',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
    $wp_customize->add_control( 'gildersleeve_h_font_weight', array(
        'settings' => 'gildersleeve_theme_options[h_font_weight]',
        'label'   => 'Font Weight for Headers:',
        'section' => 'gildersleeve_color_scheme',
        'type'    => 'select',
        'choices'    => array(
            '300' => '300',
            '400' => '400',
            '700' => '700',
        ),
        'priority' => 14,
    ));

    //  =============================
    //  = Text Input Body           =
    //  =============================
    $wp_customize->add_setting('gildersleeve_theme_options[font_family]', array(
        'default'        => 'Georgia',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('gildersleeve_h6_size', array(
        'label'      => __('Font Family for Body', 'gildersleeve'),
        'section'    => 'gildersleeve_color_scheme',
        'settings'   => 'gildersleeve_theme_options[font_family]',
        'priority'   => 15,        
    )); 

    //  =============================
    //  = Color Picker Body         =
    //  =============================
    $wp_customize->add_setting('gildersleeve_theme_options[font_color]', array(
        'default'           => '#939598',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'font_color', array(
        'label'    => __('Body Font Color', 'gildersleeve'),
        'section'  => 'gildersleeve_color_scheme',
        'settings' => 'gildersleeve_theme_options[font_color]',
        'priority' => 16,        
    )));

    //  =============================
    //  = Color Picker Body         =
    //  =============================
    $wp_customize->add_setting('gildersleeve_theme_options[link_color]', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color', array(
        'label'    => __('Link Color', 'gildersleeve'),
        'section'  => 'gildersleeve_color_scheme',
        'settings' => 'gildersleeve_theme_options[link_color]',
        'priority' => 17,        
    )));

    //  =============================
    //  = Color Picker Body         =
    //  =============================
    $wp_customize->add_setting('gildersleeve_theme_options[link_hover_color]', array(
        'default'           => '#939598',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_hover_color', array(
        'label'    => __('Link Hover Color', 'gildersleeve'),
        'section'  => 'gildersleeve_color_scheme',
        'settings' => 'gildersleeve_theme_options[link_hover_color]',
        'priority' => 18,        
    )));    

    //  =============================
    //  = Home Page Text Size       =
    //  =============================
    $wp_customize->add_setting('gildersleeve_theme_options[home_font_size]', array(
        'default'        => '25px',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
 
    $wp_customize->add_control('gildersleeve_home_font_size', array(
        'label'      => __('Font Size for the Home Page', 'gildersleeve'),
        'section'    => 'gildersleeve_color_scheme',
        'settings'   => 'gildersleeve_theme_options[home_font_size]',
        'priority'   => 19,        
    )); 

}
add_action('customize_register', 'gildersleeve_customize_register');

function gildersleeve_customize_css()
{
    $options = get_option('gildersleeve_theme_options');
    ?>
        <style type="text/css">
            h1 { 
            	color: <?php echo $options['h1_color']; ?>; 
                font-size: <?php echo $options['h1_size']; ?>;
            }
            h2,
            h1.entry-title { 
                color: <?php echo $options['h2_color']; ?>; 
                font-size: <?php echo $options['h2_size']; ?>;
            }
            h3 { 
                color: <?php echo $options['h3_color']; ?>; 
                font-size: <?php echo $options['h3_size']; ?>;
            }
            h4 { 
                color: <?php echo $options['h4_color']; ?>; 
                font-size: <?php echo $options['h4_size']; ?>;
            }
            h5 { 
                color: <?php echo $options['h5_color']; ?>; 
                font-size: <?php echo $options['h5_size']; ?>;
            }
            h6 { 
                color: <?php echo $options['h6_color']; ?>; 
                font-size: <?php echo $options['h6']; ?>;
            }
            h1, h2, h3, h4, h5, h6, #site-header, .textbox, .widget ul li {
                font-family: <?php echo $options['h_font_family']; ?>;
                font-weight: <?php echo $options['h_font_weight']; ?>;
            }
            body {
                font-family: <?php echo $options['font_family']; ?>;
                color: <?php echo $options['font_color']; ?>;
            }
            .textbox p {
                font-size: <?php echo $options['home_font_size']; ?>;
            }
            .navigation ul li a {
                color: <?php echo $options['font_color']; ?>;
            }
            .navigation ul li a:hover {
                color: <?php echo $options['h1_color']; ?>;
            }
            #leftmenu .current-menu-item a,
            #rightmenu .current-menu-item a {
                border-bottom: 1px solid <?php echo $options['h1_color'] ?>;
            }
            input[type="submit"] {
                background-color: <?php echo $options['h1_color']; ?>;
                color: #fff;
            }
            input[type="submit"]:hover {
                opacity: 0.5;
            }
            a {
                color: <?php echo $options['link_color']; ?>;
            }
            a:hover {
                color: <?php echo $options['link_hover_color']; ?>;
            }
        </style>
    <?php
}
add_action( 'wp_head', 'gildersleeve_customize_css' );

/* MISC EXTRAS
 ========================== */
 
// Comments & pingbacks display template
include('inc/functions/comments.php');

// Optional Customizations
// Includes: TinyMCE tweaks, admin menu & bar settings, query overrides
include('inc/functions/customizations.php');