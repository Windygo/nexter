<?php
/**
 * nexter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nexter
 */


if ( ! function_exists( 'nexter_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function nexter_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on nexter, use a find and replace
		 * to change 'nexter' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'nexter', get_template_directory() . '/languages' );

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

		// Add support for two menu locations - Zvi
		function register_my_menus() {
			register_nav_menus(
				array(
					'header-menu' => __( 'Header Menu' ),
					'footer-menu' => __( 'Footer Menu' )
				)
			);
		}
		add_action( 'init', 'register_my_menus' );

		function get_first_slide() {
			$slides = get_field('slider_gallery','option');		
			return $slides[0];
		}

		function site_support(){  // use this function to add support for various features you need from WP			
			
			add_theme_support('title-tag'); //this enabled dynamic page title (shown on the tab) based on the page title
		}		
		add_action('after_setup_theme','site_support');


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'nexter_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'nexter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nexter_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'nexter_content_width', 640 );
}
add_action( 'after_setup_theme', 'nexter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nexter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nexter' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'nexter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'nexter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nexter_scripts() {

	//wp_enqueue_style( 'nexter-style', get_stylesheet_uri());

	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/main.css', false, '1.0', 'all' );
	
	wp_enqueue_script( 'nexter-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'nexter-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'nexter-slider', get_template_directory_uri() . '/js/slider.js', array(), '20151215', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nexter_scripts' );

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

// 	OPTIONS PAGE - ACF
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

// 	CPT REALTORS

function realtors_post_type() {
 
	// Set UI labels for Custom Post Type
			$labels = array(
					'name'                => _x( 'Realtors', 'Post Type General Name', 'twentythirteen' ),
					'singular_name'       => _x( 'Realtor', 'Post Type Singular Name', 'twentythirteen' ),
					'menu_name'           => __( 'Realtors', 'twentythirteen' ),
					'parent_item_colon'   => __( 'Parent Realtor', 'twentythirteen' ),
					'all_items'           => __( 'All Realtors', 'twentythirteen' ),
					'view_item'           => __( 'View Realtor', 'twentythirteen' ),
					'add_new_item'        => __( 'Add New Realtor', 'twentythirteen' ),
					'add_new'             => __( 'Add New', 'twentythirteen' ),
					'edit_item'           => __( 'Edit Realtor', 'twentythirteen' ),
					'update_item'         => __( 'Update Realtor', 'twentythirteen' ),
					'search_items'        => __( 'Search Realtor', 'twentythirteen' ),
					'not_found'           => __( 'Not Found', 'twentythirteen' ),
					'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
			);
			 
	// Set other options for Custom Post Type
			 
			$args = array(
					'label'               => __( 'Realtors', 'twentythirteen' ),
					'description'         => __( 'Realtor news and reviews', 'twentythirteen' ),
					'labels'              => $labels,
	
					'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),

					'taxonomies'          => array( 'genres' ),
					'hierarchical'        => false,
					'public'              => true,
					'show_ui'             => true,
					'show_in_menu'        => true,
					'show_in_nav_menus'   => true,
					'show_in_admin_bar'   => true,
					'menu_position'       => 5,
					'can_export'          => true,
					'has_archive'         => true,
					'exclude_from_search' => false,
					'publicly_queryable'  => true,
					'capability_type'     => 'post',
			);			 
		register_post_type( 'Realtors', $args );
	 
	}
	 
	add_action( 'init', 'realtors_post_type', 0 );


// 	CPT FeatureS

function features_post_type() {
 
	// Set UI labels for Custom Post Type
			$labels = array(
					'name'                => _x( 'Features', 'Post Type General Name', 'twentythirteen' ),
					'singular_name'       => _x( 'Feature', 'Post Type Singular Name', 'twentythirteen' ),
					'menu_name'           => __( 'Features', 'twentythirteen' ),
					'parent_item_colon'   => __( 'Parent Feature', 'twentythirteen' ),
					'all_items'           => __( 'All Features', 'twentythirteen' ),
					'view_item'           => __( 'View Feature', 'twentythirteen' ),
					'add_new_item'        => __( 'Add New Feature', 'twentythirteen' ),
					'add_new'             => __( 'Add New', 'twentythirteen' ),
					'edit_item'           => __( 'Edit Feature', 'twentythirteen' ),
					'update_item'         => __( 'Update Feature', 'twentythirteen' ),
					'search_items'        => __( 'Search Feature', 'twentythirteen' ),
					'not_found'           => __( 'Not Found', 'twentythirteen' ),
					'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
			);
			 
	// Set other options for Custom Post Type
			 
			$args = array(
					'label'               => __( 'Features', 'twentythirteen' ),
					'description'         => __( 'Feature news and reviews', 'twentythirteen' ),
					'labels'              => $labels,
	
					'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),

					'taxonomies'          => array( 'genres' ),
					'hierarchical'        => false,
					'public'              => true,
					'show_ui'             => true,
					'show_in_menu'        => true,
					'show_in_nav_menus'   => true,
					'show_in_admin_bar'   => true,
					'menu_position'       => 5,
					'can_export'          => true,
					'has_archive'         => true,
					'exclude_from_search' => false,
					'publicly_queryable'  => true,
					'capability_type'     => 'post',
			);			 
		register_post_type( 'Features', $args );
	 
	}
	 
	add_action( 'init', 'features_post_type', 0 );

	
// 	CPT Properties

function Properties_post_type() {
 
	// Set UI labels for Custom Post Type
			$labels = array(
					'name'                => _x( 'Properties', 'Post Type General Name', 'twentythirteen' ),
					'singular_name'       => _x( 'Property', 'Post Type Singular Name', 'twentythirteen' ),
					'menu_name'           => __( 'Properties', 'twentythirteen' ),
					'parent_item_colon'   => __( 'Parent Property', 'twentythirteen' ),
					'all_items'           => __( 'All Properties', 'twentythirteen' ),
					'view_item'           => __( 'View Property', 'twentythirteen' ),
					'add_new_item'        => __( 'Add New Property', 'twentythirteen' ),
					'add_new'             => __( 'Add New', 'twentythirteen' ),
					'edit_item'           => __( 'Edit Property', 'twentythirteen' ),
					'update_item'         => __( 'Update Property', 'twentythirteen' ),
					'search_items'        => __( 'Search Property', 'twentythirteen' ),
					'not_found'           => __( 'Not Found', 'twentythirteen' ),
					'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
			);
			 
	// Set other options for Custom Post Type
			 
			$args = array(
					'label'               => __( 'Properties', 'twentythirteen' ),
					'description'         => __( 'Property news and reviews', 'twentythirteen' ),
					'labels'              => $labels,
	
					'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),

					'taxonomies'          => array( 'genres' ),
					'hierarchical'        => false,
					'public'              => true,
					'show_ui'             => true,
					'show_in_menu'        => true,
					'show_in_nav_menus'   => true,
					'show_in_admin_bar'   => true,
					'menu_position'       => 5,
					'can_export'          => true,
					'has_archive'         => true,
					'exclude_from_search' => false,
					'publicly_queryable'  => true,
					'capability_type'     => 'post',
			);			 
		register_post_type( 'Properties', $args );
	 
	}
	 
	add_action( 'init', 'Properties_post_type', 0 );


	// ADD POST ID COLUMN TO ADMIN
	add_filter('manage_posts_columns', 'posts_columns_id', 5);
	add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);
	add_filter('manage_pages_columns', 'posts_columns_id', 5);
	add_action('manage_pages_custom_column', 'posts_custom_id_columns', 5, 2);

function posts_columns_id($defaults){
	$defaults['wps_post_id'] = __('ID');
	return $defaults;
}
function posts_custom_id_columns($column_name, $id){
	if($column_name === 'wps_post_id'){
					echo $id;
	}
}


