<?php
/**
 * encontrarnos_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package encontrarnos_theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function encontrarnos_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on encontrarnos_theme, use a find and replace
		* to change 'encontrarnos_theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'encontrarnos_theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'encontrarnos_theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'encontrarnos_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 218,
			'width'       => 510,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'encontrarnos_theme_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function encontrarnos_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'encontrarnos_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'encontrarnos_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function encontrarnos_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'encontrarnos_theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'encontrarnos_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'encontrarnos_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function encontrarnos_theme_scripts() {
	wp_enqueue_style( 'underscores_theme_base-style', get_template_directory_uri() . './style.css', array(), _S_VERSION );
	wp_enqueue_style( 'encontrarnos_theme-style', get_template_directory_uri() . './src/css/styles.css', array(), _S_VERSION );
	
	wp_style_add_data( 'encontrarnos_theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'encontrarnos_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'encontrarnos_theme-main', get_template_directory_uri() . './src/js/main.js', array('jquery'), _S_VERSION, true );
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'encontrarnos_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function custom_post_type_equipo(){

	$args = array(

		'labels' => array(
			'name' => 'Equipo',
			'singular_name' => 'Integrante'
		),
		'menu_icon' => 'dashicons-groups',
		'heriarchy' => true,
		'public' => true, 
		'has_archive' => true, 
		'supports' => array('title', 'editor', 'thumbnail', 'custom fields'),
		'' 
	);

	register_post_type('equipo', $args);
}

add_action('init', 'custom_post_type_equipo');

function custom_post_type_faqs(){

	$args = array(

		'labels' => array(
			'name' => 'FAQS',
			'singular_name' => 'FAQ'
		),
		'menu_icon' => 'dashicons-format-chat',
		'hierarchical' => false,
		'public' => true, 
		'has_archive' => true, 
		'supports' => array('title', 'editor', 'custom fields'),
		'' 
	);

	register_post_type('faqs', $args);
}

add_action('init', 'custom_post_type_faqs');

function faqs_taxonomy(){

	$args = array(

		'public' => true, 
	);

	register_taxonomy('tipo-de-busqueda', array('faqs'), $args);
}

add_action('init', 'faqs_taxonomy');

function custom_post_type_organismos(){

	$args = array(

		'labels' => array(
			'name' => 'Organismos',
			'singular_name' => 'Organismo'
		),
		'menu_icon' => 'dashicons-networking',
		'hierarchical' => true,
		'public' => true, 
		'has_archive' => true, 
		'supports' => array('title', 'editor', 'custom fields'),
		'' 
	);

	register_post_type('organismos', $args);
}

add_action('init', 'custom_post_type_organismos');

function organismos_taxonomy(){

	$args = array(
		'labels' => array(
			'name' => 'Tipos de Organismos',
			'singular_name' => 'Tipo de Organismo'
		),
		'public' => true, 
		'hierarchical' => true,
	);

	register_taxonomy('tipos-de-organismo', array('organismos'), $args);
}

add_action('init', 'organismos_taxonomy');

if (function_exists('acf_add_options_page')){
	acf_add_options_page(
		array(
			'page_title' => 'Heros Personalizados',
			'menu_title' => 'Heros Personalizados',
			'menu_slug' =>  'heros-personalizados',
			'capability' => 'edit_posts',
			'icon_url' => 'dashicons-heading'

		)
		);

		acf_add_options_sub_page(
			array(
				'page_title' => 'Home Page',
				'menu_title' => 'Home Page',
				'parent_slug' =>  'heros-personalizados'
	
			)
			
			);

		acf_add_options_sub_page(
			array(
				'page_title' => 'Quiénes Somos',
				'menu_title' => 'Quiénes Somos',
				'parent_slug' =>  'heros-personalizados'
	
			)
			
			);

		acf_add_options_sub_page(
			array(
				'page_title' => 'Preguntas Frecuentes',
				'menu_title' => 'Preguntas Frecuentes',
				'parent_slug' =>  'heros-personalizados'
	
			)
			
			);

		acf_add_options_sub_page(
			array(
				'page_title' => 'Glosario',
				'menu_title' => 'Glosario',
				'parent_slug' =>  'heros-personalizados'
	
			)
			
			);

		acf_add_options_sub_page(
			array(
				'page_title' => 'Organismos',
				'menu_title' => 'Organismos',
				'parent_slug' =>  'heros-personalizados'
	
			)
			
			);

		acf_add_options_sub_page(
			array(
				'page_title' => 'Páginas Útiles',
				'menu_title' => 'Páginas Útiles',
				'parent_slug' =>  'heros-personalizados'
	
			)
			
			);

		acf_add_options_sub_page(
			array(
				'page_title' => 'Novedades',
				'menu_title' => 'Novedades',
				'parent_slug' =>  'heros-personalizados'
	
			)
			
			);

		acf_add_options_sub_page(
			array(
				'page_title' => 'Contacto',
				'menu_title' => 'Contacto',
				'parent_slug' =>  'heros-personalizados'
	
			)
			
			);
}

function mytheme_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );

add_image_size('card-img', 200, 200, false);

add_image_size('hero-img', 800, 600, true);


