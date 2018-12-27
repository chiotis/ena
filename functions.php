<?php
// ENA only works in WordPress 4.7 or later.
// if ( version_compare( $GLOBALS['wp_version'], '5.0', '<' ) ) {
// 	require get_template_directory() . '/inc/back-compat.php';
// 	return;
// }

if ( ! function_exists( 'ena_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ena_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replace
		 * to change 'ena' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ena', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		// add_theme_support( 'automatic-feed-links' );

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
		// set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary' => __( 'Primary', 'ena' ),
				'footer' => __( 'Footer Menu', 'ena' ),
				'social' => __( 'Social Links Menu', 'ena' ),
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
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'ena_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function ena_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ena_content_width', 640 );
}
add_action( 'after_setup_theme', 'ena_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function ena_scripts() {
	wp_enqueue_style( 'ena-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ), 'all' );

	wp_enqueue_script( 'ena-uikitjs', 'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.25/js/uikit.min.js', array(), '20151215', true );
	wp_enqueue_script( 'ena-uikiticonsjs', 'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.25/js/uikit-icons.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ena_scripts' );

function ena_enqueue_custom_admin_style() {
	wp_enqueue_style( 'custom_wp_admin_css', get_template_directory_uri() . '/inc/admin-style.css', array(), wp_get_theme()->get( 'Version' ), 'all' );
}
add_action( 'admin_enqueue_scripts', 'ena_enqueue_custom_admin_style' );
/**
 * Custom Comment Walker template.
 */
// require get_template_directory() . '/classes/class-ena-walker-comment.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
// require get_template_directory() . '/inc/template-functions.php';

/**
 * SVG Icons related functions.
 */
// require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom template tags for the theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Theme Options Page
 */
require get_template_directory() . '/inc/options-page.php';

/**
 * Remove Emojis
 */
require get_template_directory() . '/inc/remove-emojis.php';

/**
 * Remove Emojis
 */
require get_template_directory() . '/inc/body-class.php';

/**
 * Disable Pings
 */
require get_template_directory() . '/inc/disable-ping.php';

/**
 * Clean up Head
 */
require get_template_directory() . '/inc/cleanup-head.php';

// Register Custom Navigation Walker
require_once get_template_directory() . '/classes/ena-navwalker.php';

// Register custom neu items in primary menu
require_once get_template_directory() . '/inc/custom-menu-items.php';

// Action Hooks
require_once get_template_directory() . '/inc/action-hooks.php';

// Gravity Forms Compatibility functions
require_once get_template_directory() . '/inc/gf-compatibility.php';

