<?php
/**
 * Twenty Sixteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentysixteen_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * Create your own twentysixteen_setup() function to override in a child theme.
	 *
	 * @since Twenty Sixteen 1.0
	 */
	function twentysixteen_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen
		 * If you're building a theme based on Twenty Sixteen, use a find and replace
		 * to change 'twentysixteen' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'twentysixteen' );

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
		 * Enable support for custom logo.
		 *
		 *  @since Twenty Sixteen 1.2
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 240,
				'width'       => 240,
				'flex-height' => true,
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'twentysixteen' ),
				'left' => __( 'left Menu', 'twentysixteen' ),
				'social'  => __( 'Social Links Menu', 'twentysixteen' ),
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

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'status',
				'audio',
				'chat',
			)
		);

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );

		// Load regular editor styles into the new block-based editor.
		add_theme_support( 'editor-styles' );

		// Load default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom color scheme.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Dark Gray', 'twentysixteen' ),
					'slug'  => 'dark-gray',
					'color' => '#1a1a1a',
				),
				array(
					'name'  => __( 'Medium Gray', 'twentysixteen' ),
					'slug'  => 'medium-gray',
					'color' => '#686868',
				),
				array(
					'name'  => __( 'Light Gray', 'twentysixteen' ),
					'slug'  => 'light-gray',
					'color' => '#e5e5e5',
				),
				array(
					'name'  => __( 'White', 'twentysixteen' ),
					'slug'  => 'white',
					'color' => '#fff',
				),
				array(
					'name'  => __( 'Blue Gray', 'twentysixteen' ),
					'slug'  => 'blue-gray',
					'color' => '#4d545c',
				),
				array(
					'name'  => __( 'Bright Blue', 'twentysixteen' ),
					'slug'  => 'bright-blue',
					'color' => '#007acc',
				),
				array(
					'name'  => __( 'Light Blue', 'twentysixteen' ),
					'slug'  => 'light-blue',
					'color' => '#9adffd',
				),
				array(
					'name'  => __( 'Dark Brown', 'twentysixteen' ),
					'slug'  => 'dark-brown',
					'color' => '#402b30',
				),
				array(
					'name'  => __( 'Medium Brown', 'twentysixteen' ),
					'slug'  => 'medium-brown',
					'color' => '#774e24',
				),
				array(
					'name'  => __( 'Dark Red', 'twentysixteen' ),
					'slug'  => 'dark-red',
					'color' => '#640c1f',
				),
				array(
					'name'  => __( 'Bright Red', 'twentysixteen' ),
					'slug'  => 'bright-red',
					'color' => '#ff675f',
				),
				array(
					'name'  => __( 'Yellow', 'twentysixteen' ),
					'slug'  => 'yellow',
					'color' => '#ffef8e',
				),
			)
		);

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'twentysixteen_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twentysixteen_content_width', 840 );
}
add_action( 'after_setup_theme', 'twentysixteen_content_width', 0 );

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Sixteen 1.6
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function twentysixteen_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentysixteen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'twentysixteen_resource_hints', 10, 2 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'twentysixteen' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Content Bottom 1', 'twentysixteen' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Content Bottom 2', 'twentysixteen' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer section1', 'twentysixteen' ),
			'id'            => 'footer-1',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer section2', 'twentysixteen' ),
			'id'            => 'footer-2',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer section3', 'twentysixteen' ),
			'id'            => 'footer-3',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);


register_sidebar(
		array(
			'name'          => __( 'Footer section1 Japan language', 'twentysixteen' ),
			'id'            => 'footer-11',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

register_sidebar(
		array(
			'name'          => __( 'Footer section2 Japan language', 'twentysixteen' ),
			'id'            => 'footer-12',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
register_sidebar(
		array(
			'name'          => __( 'Footer section3 Japan language', 'twentysixteen' ),
			'id'            => 'footer-13',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Header language', 'twentysixteen' ),
			'id'            => 'footer-10',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);


	register_sidebar(
		array(
			'name'          => __( 'Product filter', 'twentysixteen' ),
			'id'            => 'product-filter',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);


}
add_action( 'widgets_init', 'twentysixteen_widgets_init' );

if ( ! function_exists( 'twentysixteen_fonts_url' ) ) :
	/**
	 * Register Google fonts for Twenty Sixteen.
	 *
	 * Create your own twentysixteen_fonts_url() function to override in a child theme.
	 *
	 * @since Twenty Sixteen 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function twentysixteen_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'twentysixteen' ) ) {
			$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
		}

		/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'twentysixteen' ) ) {
			$fonts[] = 'Montserrat:400,700';
		}

		/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentysixteen' ) ) {
			$fonts[] = 'Inconsolata:400';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg(
				array(
					'family' => urlencode( implode( '|', $fonts ) ),
					'subset' => urlencode( $subsets ),
				),
				'https://fonts.googleapis.com/css'
			);
		}

		return $fonts_url;
	}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentysixteen_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentysixteen-fonts', twentysixteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'twentysixteen-style', get_stylesheet_uri() );

	// Theme block stylesheet.
	wp_enqueue_style( 'twentysixteen-block-style', get_template_directory_uri() . '/css/blocks.css', array( 'twentysixteen-style' ), '20181230' );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'twentysixteen-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'twentysixteen-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentysixteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160816', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentysixteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160816' );
	}

	wp_enqueue_script( 'twentysixteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20181230', true );

	wp_localize_script(
		'twentysixteen-script',
		'screenReaderText',
		array(
			'expand'   => __( 'expand child menu', 'twentysixteen' ),
			'collapse' => __( 'collapse child menu', 'twentysixteen' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'twentysixteen_scripts' );

/**
 * Enqueue styles for the block-based editor.
 *
 * @since Twenty Sixteen 1.6
 */
function twentysixteen_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'twentysixteen-block-editor-style', get_template_directory_uri() . '/css/editor-blocks.css', array(), '20181230' );
	// Add custom fonts.
	wp_enqueue_style( 'twentysixteen-fonts', twentysixteen_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'twentysixteen_block_editor_styles' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function twentysixteen_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'twentysixteen_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ) . substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ) . substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ) . substr( $color, 2, 1 ) );
	} elseif ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array(
		'red'   => $r,
		'green' => $g,
		'blue'  => $b,
	);
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentysixteen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 840 <= $width ) {
		$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
	}

	if ( 'page' === get_post_type() ) {
		if ( 840 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	} else {
		if ( 840 > $width && 600 <= $width ) {
			$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		} elseif ( 600 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10, 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function twentysixteen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		} else {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
		}
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function twentysixteen_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentysixteen_widget_tag_cloud_args' );


function register_my_session(){
    if( ! session_id() ) {
        session_start();
    }
}

add_action('init', 'register_my_session');

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
function load_posts_by_ajax_callback() {
    
    
 $args7777 = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> -1,
	        'tax_query'  => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug', // Or 'name' or 'term_id'
                'terms'    => array('popular-videos', 'videos', 'events'),
                'operator' => 'NOT IN', // Excluded
            )
            ),
	        //'product_cat'    => 'ourproduct'
	       

	    );
     $my_posts777 = new WP_Query( $args7777 );

    $paged = $_POST['page'];
    $totalcount77 = $_POST['totalcount'];
    $paged = (isset($paged) || !(empty($paged))) ? $paged : 1;
     

	 $args = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> 9,
	        //'product_cat'    => 'ourproduct',
	        'paged'         => $paged,
	        'tax_query'  => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug', // Or 'name' or 'term_id'
                'terms'    => array('popular-videos', 'videos', 'events'),
                'operator' => 'NOT IN', // Excluded
            )
            ),

	    );



    $my_posts = new WP_Query( $args );

    $finaltoal =  $my_posts777->post_count;
     if($totalcount77 <=  $finaltoal){

    if ( $my_posts->have_posts() ){
        ?>
        <?php
        while ( $my_posts->have_posts() ) : $my_posts->the_post(); ?>
          
	<div class="col-lg-4 col-md-6 mb-30 price_box">
           

            <div class="popular_videos pro-iteam">
             <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
             <a href="<?php echo the_permalink(); ?>"> 
<img class="img" src="<?php echo $image[0]; ?>" />

   <div class="text">
                 <div class="cen">     
                <h3><?php the_title();?> </h3> 
              


                  </div> </div>
             </a>
            
           
         </div>
           </div>



        <?php 
      $totalcount++;
     endwhile; ?>


       <?php
    
    }


}else{
	echo '2';
	die();
}
 
    wp_die();
}
add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');

function load_posts_by_ajax1_callback() {

	
   $args7777 = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> -1,
	        'product_cat'    => 'videos'
	       

	    );
     $my_posts777 = new WP_Query( $args7777 );

    $paged = $_POST['page'];
    $totalcount77 = $_POST['totalcount'];
    $paged = (isset($paged) || !(empty($paged))) ? $paged : 1;
     

	 $args = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> 9,
	        'product_cat'    => 'videos',
	        'paged'         => $paged

	    );



     $my_posts = new WP_Query( $args );
     $finaltoal =  $my_posts777->post_count;
     if($totalcount77 <=  $finaltoal){

    if ( $my_posts->have_posts() ){
        ?>
        <?php
        while ( $my_posts->have_posts() ) : $my_posts->the_post(); 
  global $product;
        	?>
          
      <div class="col-lg-4 col-md-6 mb-30 price_box">

      <div class="popular_videos pro-iteam">
             <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
             <a href="<?php echo the_permalink(); ?>"> 
<img class="img" src="<?php echo $image[0]; ?>" />

                  <div class="text">
                  <div class="cen">  
                 <span class="Video-icon-top"><img src="http://theimpossibleco.com/wp-content/themes/theimpossibleco/images/Video-icon.png"></span>   
                <h3> <?php the_title();?> </h3> 

                </div> </div>
                             </a>
                            
                           
                         </div>

             <?php      wp_reset_postdata(); ?>
          </div>

        <?php 
      $totalcount++;
     endwhile; ?>

       <?php
    
    }
}else{
	echo '2';
	die();
}
 
 
    wp_die();
}
add_action('wp_ajax_load_posts_by_ajax1', 'load_posts_by_ajax1_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax1', 'load_posts_by_ajax1_callback');

function load_posts_by_ajax2_callback() {


	$is_admin = current_user_can('manage_options'); 
if ($is_admin) {
$statusaray[] = "publish";
$statusaray[] = "private";
}
else
{
$statusaray[] = "publish";

}

  $args7777 = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> -1,
	         'post_status' => $statusaray,
	        'product_cat'    => 'playing-cards'
	       

	    );
     $my_posts777 = new WP_Query( $args7777 );

    $paged = $_POST['page'];
    $totalcount77 = $_POST['totalcount'];
    $paged = (isset($paged) || !(empty($paged))) ? $paged : 1;
     

	 $args = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> 9,
	         'post_status' => $statusaray,
	        'product_cat'    => 'playing-cards',
	        'paged'         => $paged

	    );



    $my_posts = new WP_Query( $args );

     $finaltoal =  $my_posts777->post_count;

     if($totalcount77 <=  $finaltoal){
    if ( $my_posts->have_posts() ){
        ?>
        <?php
        while ( $my_posts->have_posts() ) : $my_posts->the_post(); ?>
          
      <div class="col-lg-4 col-md-6 price_box mb-30">
 <div class="popular_videos pro-iteam">      	
   <a href="<?php echo the_permalink(); ?>">
 
             <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
          

<img class="img" src="<?php echo $image[0]; ?>">




  <div class="text">
                 <div class="cen">     
                <h3> <?php the_title();?> </h3> 

</div> </div>


           
            </a>  
         </div>
         
           </div>


        <?php 
      $totalcount++;
     endwhile; ?>


      <?php


    }


}else{
	echo '2';
	die();
}
 
 
    wp_die();
}
add_action('wp_ajax_load_posts_by_ajax2', 'load_posts_by_ajax2_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax2', 'load_posts_by_ajax2_callback');



function load_posts_by_ajax12_callback() {

	$is_admin = current_user_can('manage_options'); 
if ($is_admin) {
$statusaray[] = "publish";
$statusaray[] = "private";
}
else
{
$statusaray[] = "publish";

}
  $args7777 = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> -1,
	         'post_status' => $statusaray,
	        'product_cat'    => 'other'
	       

	    );
     $my_posts777 = new WP_Query( $args7777 );

    $paged = $_POST['page'];
    $totalcount77 = $_POST['totalcount'];
    $paged = (isset($paged) || !(empty($paged))) ? $paged : 1;
     

	 $args = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> 9,
	         'post_status' => $statusaray,
	        'product_cat'    => 'other',
	        'paged'         => $paged

	    );



    $my_posts = new WP_Query( $args );

     $finaltoal =  $my_posts777->post_count;

     if($totalcount77 <=  $finaltoal){
    if ( $my_posts->have_posts() ){
        ?>
        <?php
        while ( $my_posts->have_posts() ) : $my_posts->the_post(); ?>
          
      <div class="col-lg-4 col-md-6 price_box mb-30">
 <div class="popular_videos pro-iteam">      	
   <a href="<?php echo the_permalink(); ?>">
 
             <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
          

<img class="img" src="<?php echo $image[0]; ?>">




  <div class="text">
                 <div class="cen">     
                <h3> <?php the_title();?> </h3> 

</div> </div>


           
            </a>  
         </div>
         
           </div>


        <?php 
      $totalcount++;
     endwhile; ?>


      <?php


    }


}else{
	echo '2';
	die();
}
 
 
    wp_die();
}
add_action('wp_ajax_load_posts_by_ajax12', 'load_posts_by_ajax12_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax12', 'load_posts_by_ajax12_callback');




function load_posts_by_ajax50_callback() {

	$is_admin = current_user_can('manage_options'); 
if ($is_admin) {
$statusaray[] = "publish";
$statusaray[] = "private";
}
else
{
$statusaray[] = "publish";

}

  $args7777 = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> -1,
	         'post_status' => $statusaray,
	       'tax_query'  => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug', // Or 'name' or 'term_id'
                'terms'    => array('popular-videos', 'videos', 'events'),
                'operator' => 'NOT IN', // Excluded
            )
            ),
	       

	    );
     $my_posts777 = new WP_Query( $args7777 );

    $paged = $_POST['page'];
    $totalcount77 = $_POST['totalcount'];
     $orderby1 = $_POST['orderby1'];
    $metakey1 = $_POST['metakey1'];
    $ordetype = $_POST['ordetype'];
    $paged = (isset($paged) || !(empty($paged))) ? $paged : 1;
     

	 $args = array(
          'post_type'      => 'product',
           'posts_per_page'=> 9,
            'post_status' => $statusaray,
             'orderby'   => $orderby1,
             'meta_key' => $metakey1,
             'order' => $ordetype,
            'paged'         => $paged,


          'tax_query'  => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug', // Or 'name' or 'term_id'
                'terms'    => array('popular-videos', 'videos', 'events'),
                'operator' => 'NOT IN', // Excluded
            )
            ),


      );


    $my_posts = new WP_Query( $args );

     $finaltoal =  $my_posts777->post_count;

     if($totalcount77 <=  $finaltoal){
    if ( $my_posts->have_posts() ){
        ?>
        <?php
        while ( $my_posts->have_posts() ) : $my_posts->the_post(); ?>
          
      <div class="col-lg-4 col-md-6 price_box mb-30">
 <div class="popular_videos pro-iteam">      	
   <a href="<?php echo the_permalink(); ?>">
 
             <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
          

<img class="img" src="<?php echo $image[0]; ?>">




  <div class="text">
                 <div class="cen">     
                <h3> <?php the_title();?> </h3> 

</div> </div>


           
            </a>  
         </div>
         
           </div>


        <?php 
      $totalcount++;
     endwhile; ?>


      <?php


    }


}else{
	echo '2';
	die();
}
 
 
    wp_die();
}
add_action('wp_ajax_load_posts_by_ajax50', 'load_posts_by_ajax50_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax50', 'load_posts_by_ajax50_callback');



function load_posts_by_ajax16_callback() {




	$is_admin = current_user_can('manage_options'); 
if ($is_admin) {
$statusaray[] = "publish";
$statusaray[] = "private";
}
else
{
$statusaray[] = "publish";

}
  $args7777 = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> -1,
	        'post_status' => $statusaray,
	        'product_cat'    => 'playing-cards',
	       

	    );
     $my_posts777 = new WP_Query( $args7777 );

    $paged = $_POST['page'];
    $totalcount77 = $_POST['totalcount'];

    $orderby1 = $_POST['orderby1'];
    $metakey1 = $_POST['metakey1'];
    $ordetype = $_POST['ordetype'];

    $paged = (isset($paged) || !(empty($paged))) ? $paged : 1;
     

	 $args = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> 9,
	        'post_status' => $statusaray,
	        'product_cat'    => 'playing-cards',
          'orderby'   => $orderby1,
          'meta_key' => $metakey1,
          'order' => $ordetype,
          'paged'         => $paged

	    );



    $my_posts = new WP_Query( $args );

     $finaltoal =  $my_posts777->post_count;

     if($totalcount77 <=  $finaltoal){
    if ( $my_posts->have_posts() ){
        ?>
        <?php
        while ( $my_posts->have_posts() ) : $my_posts->the_post(); ?>
          
      <div class="col-lg-4 col-md-6 price_box mb-30">
 <div class="popular_videos pro-iteam">      	
   <a href="<?php echo the_permalink(); ?>">
 
             <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
          

<img class="img" src="<?php echo $image[0]; ?>">




  <div class="text">
                 <div class="cen">     
                <h3> <?php the_title();?> </h3> 

</div> </div>


           
            </a>  
         </div>
         
           </div>


        <?php 
      $totalcount++;
     endwhile; ?>


      <?php


    }


}else{
	echo '2';
	die();
}
 
 
    wp_die();
}
add_action('wp_ajax_load_posts_by_ajax16', 'load_posts_by_ajax16_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax16', 'load_posts_by_ajax16_callback');


function load_posts_by_ajax70_callback() {

	$is_admin = current_user_can('manage_options'); 
if ($is_admin) {
$statusaray[] = "publish";
$statusaray[] = "private";
}
else
{
$statusaray[] = "publish";

}
  $args7777 = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> -1,
	         'post_status' => $statusaray,
	       'product_cat'    => 'coins',
	       

	    );
     $my_posts777 = new WP_Query( $args7777 );

    $paged = $_POST['page'];
    $totalcount77 = $_POST['totalcount'];
     $orderby1 = $_POST['orderby1'];
    $metakey1 = $_POST['metakey1'];
    $ordetype = $_POST['ordetype'];
    $paged = (isset($paged) || !(empty($paged))) ? $paged : 1;
     

	 $args = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> 9,
	         'post_status' => $statusaray,
	       'product_cat'    => 'coins',
           
	        'paged'         => $paged

	    );



    $my_posts = new WP_Query( $args );

     $finaltoal =  $my_posts777->post_count;

     if($totalcount77 <=  $finaltoal){
    if ( $my_posts->have_posts() ){
        ?>
        <?php
        while ( $my_posts->have_posts() ) : $my_posts->the_post(); ?>
          
      <div class="col-lg-4 col-md-6 price_box mb-30">
 <div class="popular_videos pro-iteam">      	
   <a href="<?php echo the_permalink(); ?>">
 
             <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
          

<img class="img" src="<?php echo $image[0]; ?>">




  <div class="text">
                 <div class="cen">     
                <h3> <?php the_title();?> </h3> 

</div> </div>


           
            </a>  
         </div>
         
           </div>


        <?php 
      $totalcount++;
     endwhile; ?>


      <?php


    }


}else{
	echo '2';
	die();
}
 
 
    wp_die();
}
add_action('wp_ajax_load_posts_by_ajax70', 'load_posts_by_ajax70_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax70', 'load_posts_by_ajax70_callback');


function load_posts_by_ajax61_callback() {

	$is_admin = current_user_can('manage_options'); 
if ($is_admin) {
$statusaray[] = "publish";
$statusaray[] = "private";
}
else
{
$statusaray[] = "publish";

}
  $args7777 = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> -1,
	         'post_status' => $statusaray,
	       'product_cat'    => 'coins',
	       

	    );
     $my_posts777 = new WP_Query( $args7777 );

    $paged = $_POST['page'];
    $totalcount77 = $_POST['totalcount'];
     $orderby1 = $_POST['orderby1'];
    $metakey1 = $_POST['metakey1'];
    $ordetype = $_POST['ordetype'];
    $paged = (isset($paged) || !(empty($paged))) ? $paged : 1;
     

	 $args = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> 9,
	         'post_status' => $statusaray,
	       'product_cat'    => 'coins',
           'orderby'   => $orderby1,
          'meta_key' => $metakey1,
          'order' => $ordetype,
	        'paged'         => $paged

	    );



    $my_posts = new WP_Query( $args );

     $finaltoal =  $my_posts777->post_count;

     if($totalcount77 <=  $finaltoal){
    if ( $my_posts->have_posts() ){
        ?>
        <?php
        while ( $my_posts->have_posts() ) : $my_posts->the_post(); ?>
          
      <div class="col-lg-4 col-md-6 price_box mb-30">
 <div class="popular_videos pro-iteam">      	
   <a href="<?php echo the_permalink(); ?>">
 
             <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
          

<img class="img" src="<?php echo $image[0]; ?>">




  <div class="text">
                 <div class="cen">     
                <h3> <?php the_title();?> </h3> 

</div> </div>


           
            </a>  
         </div>
         
           </div>


        <?php 
      $totalcount++;
     endwhile; ?>


      <?php


    }


}else{
	echo '2';
	die();
}
 
 
    wp_die();
}
add_action('wp_ajax_load_posts_by_ajax61', 'load_posts_by_ajax61_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax61', 'load_posts_by_ajax61_callback');


function load_posts_by_ajax18_callback() {

	$is_admin = current_user_can('manage_options'); 
if ($is_admin) {
$statusaray[] = "publish";
$statusaray[] = "private";
}
else
{
$statusaray[] = "publish";

}

  $args7777 = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> -1,
	         'post_status' => $statusaray,
	        'product_cat'    => 'other',
	       

	    );
     $my_posts777 = new WP_Query( $args7777 );

    $paged = $_POST['page'];
    $totalcount77 = $_POST['totalcount'];

     $orderby1 = $_POST['orderby1'];
    $metakey1 = $_POST['metakey1'];
    $ordetype = $_POST['ordetype'];

    $paged = (isset($paged) || !(empty($paged))) ? $paged : 1;
     

	 $args = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> 9,
	         'post_status' => $statusaray,
	       'product_cat'    => 'other',
          'orderby'   => $orderby1,
          'meta_key' => $metakey1,
          'order' => $ordetype,
	        'paged'         => $paged

	    );



    $my_posts = new WP_Query( $args );

     $finaltoal =  $my_posts777->post_count;

     if($totalcount77 <=  $finaltoal){
    if ( $my_posts->have_posts() ){
        ?>
        <?php
        while ( $my_posts->have_posts() ) : $my_posts->the_post(); ?>
          
      <div class="col-lg-4 col-md-6 price_box mb-30">
 <div class="popular_videos pro-iteam">      	
   <a href="<?php echo the_permalink(); ?>">
 
             <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
          

<img class="img" src="<?php echo $image[0]; ?>">




  <div class="text">
                 <div class="cen">     
                <h3> <?php the_title();?> </h3> 

</div> </div>


           
            </a>  
         </div>
         
           </div>


        <?php 
      $totalcount++;
     endwhile; ?>


      <?php


    }


}else{
	echo '2';
	die();
}
 
 
    wp_die();
}
add_action('wp_ajax_load_posts_by_ajax18', 'load_posts_by_ajax18_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax18', 'load_posts_by_ajax18_callback');


function load_posts_by_ajax19_callback() {

	$is_admin = current_user_can('manage_options'); 
if ($is_admin) {
$statusaray[] = "publish";
$statusaray[] = "private";
}
else
{
$statusaray[] = "publish";

}

  $args7777 = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> -1,
	         'post_status' => $statusaray,
	        'product_cat'    => 'events',
	       

	    );
     $my_posts777 = new WP_Query( $args7777 );

    $paged = $_POST['page'];
    $totalcount77 = $_POST['totalcount'];
       $orderby1 = $_POST['orderby1'];
    $metakey1 = $_POST['metakey1'];
    $ordetype = $_POST['ordetype'];
    $paged = (isset($paged) || !(empty($paged))) ? $paged : 1;
     

	 $args = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> 9,
	         'post_status' => $statusaray,
	        'product_cat'    => 'events',
          'orderby'   => $orderby1,
          'meta_key' => $metakey1,
          'order' => $ordetype,
	        'paged'         => $paged

	    );



    $my_posts = new WP_Query( $args );

     $finaltoal =  $my_posts777->post_count;

     if($totalcount77 <=  $finaltoal){
    if ( $my_posts->have_posts() ){
        ?>
        <?php
        while ( $my_posts->have_posts() ) : $my_posts->the_post(); ?>
          
      <div class="col-lg-4 col-md-6 price_box mb-30">
 <div class="popular_videos pro-iteam">      	
   <a href="<?php echo the_permalink(); ?>">
 
             <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
          

<img class="img" src="<?php echo $image[0]; ?>">




  <div class="text">
                 <div class="cen">     
                <h3> <?php the_title();?> </h3> 

</div> </div>


           
            </a>  
         </div>
         
           </div>


        <?php 
      $totalcount++;
     endwhile; ?>


      <?php


    }


}else{
	echo '2';
	die();
}
 
 
    wp_die();
}
add_action('wp_ajax_load_posts_by_ajax19', 'load_posts_by_ajax19_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax19', 'load_posts_by_ajax19_callback');



function load_posts_by_ajax122_callback() {

	$is_admin = current_user_can('manage_options'); 
if ($is_admin) {
$statusaray[] = "publish";
$statusaray[] = "private";
}
else
{
$statusaray[] = "publish";

}

  $args7777 = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> -1,
	         'post_status' => $statusaray,
	        'product_cat'    => 'events'
	       

	    );
     $my_posts777 = new WP_Query( $args7777 );

    $paged = $_POST['page'];
    $totalcount77 = $_POST['totalcount'];
    $paged = (isset($paged) || !(empty($paged))) ? $paged : 1;
     

	 $args = array(
	        'post_type'      => 'product',
	        'posts_per_page'=> 9,
	         'post_status' => $statusaray,
	        'product_cat'    => 'events',
	        'paged'         => $paged

	    );



    $my_posts = new WP_Query( $args );

     $finaltoal =  $my_posts777->post_count;

     if($totalcount77 <=  $finaltoal){
    if ( $my_posts->have_posts() ){
        ?>
        <?php
        while ( $my_posts->have_posts() ) : $my_posts->the_post(); ?>
          
      <div class="col-lg-4 col-md-6 price_box mb-30">
 <div class="popular_videos pro-iteam">      	
   <a href="<?php echo the_permalink(); ?>">
 
             <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
          

<img class="img" src="<?php echo $image[0]; ?>">




  <div class="text">
                 <div class="cen">     
                <h3> <?php the_title();?> </h3> 

</div> </div>


           
            </a>  
         </div>
         
           </div>


        <?php 
      $totalcount++;
     endwhile; ?>


      <?php


    }


}else{
	echo '2';
	die();
}
 
 
    wp_die();
}
add_action('wp_ajax_load_posts_by_ajax122', 'load_posts_by_ajax122_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax122', 'load_posts_by_ajax122_callback');


function woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 4;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 4; // 4 related products
	
	return $args;
}

/**
 * Adds a new column to the "My Orders" table in the account.
 *
 * @param string[] $columns the columns in the orders table
 * @return string[] updated columns
 */
function sv_wc_add_my_account_orders_column( $columns ) {

    $new_columns = array();

    foreach ( $columns as $key => $name ) {

        $new_columns[ $key ] = $name;

        // add ship-to after order status column
        /*if ( 'order-status' === $key ) {
            $new_columns['order-ship-to'] = __( 'Video', 'textdomain' );
        }*/
    }

    return $new_columns;
}
add_filter( 'woocommerce_my_account_my_orders_columns', 'sv_wc_add_my_account_orders_column' );

function sv_wc_my_orders_ship_to_column( $order ) {
 
 $order = wc_get_order( $order );
$items = $order->get_items();
foreach ( $items as $item ) {
	
     $product_id = $item['product_id'];
     $video_section =  get_field('add_video_demo_url',$product_id);
     if($video_section){
     echo '<a href="'.$video_section.'" class="donwlod-icons"> </a>';    
     } 
     if($video_section){
     
     ?>
     
     <!-- <a href="#" id="openvideop" data-toggle="modal" data-target="#video" class="plays-icon" download>  </a>
    
     <div  id="video">
     	<div  class="videoinner">

	   <iframe id="frame177444"  src="<?php echo $video_section; ?>" width="700" height="390" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>				 
</div>
</div> -->
     <?php   
     }  

}


  
}
add_action( 'woocommerce_my_account_my_orders_column_order-ship-to', 'sv_wc_my_orders_ship_to_column' );

 add_filter('pll_get_post_types', 'add_cpt_to_pll', 10, 2);
function add_cpt_to_pll($post_types, $hide) {
   
        $post_types['my_cpt'] = 'product';
        $post_types['my_cpt1'] = 'forum';
    return $post_types;
}
 add_post_type_support( 'page', 'excerpt' );
 add_theme_support( 'wc-product-gallery-slider' );
 function disable_shipping_calc_on_cart( $show_shipping ) {
    if( is_cart() ) {
        return false;
    }
    return $show_shipping;
}
add_filter( 'woocommerce_cart_ready_to_calc_shipping', 'disable_shipping_calc_on_cart', 99 );

add_filter( 'get_comment_date', 'wpsites_change_comment_date_format' );	
function wpsites_change_comment_date_format( $d ) {
    $d = date("d/m/Y");	
    return $d;
} 

add_action( 'wp_ajax_auto_suggest_front', 'auto_suggest_front_callback' );
add_action( 'wp_ajax_nopriv_auto_suggest_front', 'auto_suggest_front_callback' );
function auto_suggest_front_callback() {
    ob_flush();
      $whatever =  $_POST['whatever'];

     global $wpdb;


$query = "
        SELECT      *
        FROM        $wpdb->posts
        WHERE       $wpdb->posts.post_title LIKE '$whatever%'
        AND         $wpdb->posts.post_type = 'post'
        ORDER BY    $wpdb->posts.post_title
";
$queryresult = $wpdb->get_results($query);


$querypages = "
        SELECT      *
        FROM        $wpdb->posts
        WHERE       $wpdb->posts.post_title LIKE '$whatever%'
        AND         $wpdb->posts.post_type = 'page'
        ORDER BY    $wpdb->posts.post_title
";
$queryresultpages = $wpdb->get_results($querypages);

$query7 = "
        SELECT      *
        FROM        $wpdb->posts
        WHERE       $wpdb->posts.post_title LIKE '$whatever%'
        AND         $wpdb->posts.post_type = 'product'
        ORDER BY    $wpdb->posts.post_title
";
$queryresult77 = $wpdb->get_results($query7);


if($queryresult77){
	echo '<h2>Product</h2>';
foreach ($queryresult77 as  $value) {

	?>
	 <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $value ), 'full' ); ?>
	
<div class="s-l-m">
	<div class="search-images-div"><img src="<?php if(isset($image[0])){ echo $image[0]; }else{ echo 'http://theimpossibleco.com/wp-content/uploads/2019/04/5-1.jpg'; } ?>"></div>
	 <div class="search-content-div">
      <span class="faq-quastion-title"><a style="padding: 0;color: red;" href="<?php echo get_permalink($value); ?>">
        <?php echo $value->post_title; ?></a></span>
      <div class="faq-q-ans-div">
         <?php
        echo wp_trim_words($value->post_content, 10, '...' );
        ?>
      </div>
    </div>
</div>
	<?php

 }
}



elseif($queryresultpages){
	echo '<h2>Pages</h2>';
foreach ($queryresultpages as  $value) {

	?>
	 <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $value ), 'full' ); ?>
	<div class="s-l-m">
		<div class="search-images-div"><img src="<?php if(isset($image[0])){ echo $image[0]; }else{ echo 'http://theimpossibleco.com/wp-content/uploads/2019/04/5-1.jpg'; } ?>"></div>
	 <div class="search-content-div">
      <span class="faq-quastion-title"><a style="padding: 0;color: red;" href="<?php echo get_permalink($value); ?>">
        <?php echo $value->post_title; ?></a></span>
      <div class="faq-q-ans-div">
         <?php
        echo wp_trim_words($value->post_content, 10, '...' );
        ?>
      </div>
    </div>
</div>
	<?php

 }
}
elseif($queryresult){
	echo '<h2>Blog</h2>';
foreach ($queryresult as  $value) {

	?>
	 <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $value ), 'full' ); ?>
<div class="s-l-m">

	<div class="search-images-div"><img src="<?php echo $image[0]; ?>"></div>
	 <div class="search-content-div last-div">
      <span class="faq-quastion-title"><a style="padding: 0;color: red;" href="<?php echo get_permalink($value); ?>">
        <?php echo $value->post_title; ?></a></span>
      <div class="faq-q-ans-div">
         <?php
        echo wp_trim_words($value->post_content, 10, '...' );
        ?>
      </div>
    </div>
</div>
	<?php

 }
}




else{
	echo 'Not found data';
}


    die(); // this is required to terminate immediately and return a proper response
}





/**
 * @snippet       Add First & Last Name to My Account Register Form - WooCommerce
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=21974
 * @author        Rodolfo Melogli
 * @credits       Claudio SM Web
 * @compatible    WC 3.5.2
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
///////////////////////////////
// 1. ADD FIELDS
 
add_action( 'woocommerce_register_form_start', 'bbloomer_add_name_woo_account_registration' );
 
function bbloomer_add_name_woo_account_registration() {
    ?>
 
    <p class="form-row form-row-first">
    <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
    </p>
 
    <p class="form-row form-row-last">
    <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    </p>
 
    <div class="clear"></div>
 
    <?php
}
 
///////////////////////////////
// 2. VALIDATE FIELDS
 
add_filter( 'woocommerce_registration_errors', 'bbloomer_validate_name_fields', 10, 3 );
 
function bbloomer_validate_name_fields( $errors, $username, $email ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
    }
    return $errors;
}
 
///////////////////////////////
// 3. SAVE FIELDS
 
add_action( 'woocommerce_created_customer', 'bbloomer_save_name_fields' );
 
function bbloomer_save_name_fields( $customer_id ) {
    if ( isset( $_POST['billing_first_name'] ) ) {
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        update_user_meta( $customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']) );
    }
    if ( isset( $_POST['billing_last_name'] ) ) {
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        update_user_meta( $customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']) );
    }
 
}

add_filter('woocommerce_template_loop_product_link_open','mbc_remove_link_on_thumbnail' );

 function mbc_remove_link_on_thumbnail($html){
      return strip_tags($html,'<img>');
 }
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );





	add_action( 'template_redirect', 'wc_custom_redirect_after_purchase' ); 
function wc_custom_redirect_after_purchase() {
	global $wp;




	if ( is_checkout() && ! empty( $wp->query_vars['order-received'] ) ) {
        
          if($_SESSION["language"] == 'ja'){
          wp_redirect( 'http://theimpossibleco.com/ja/%e3%81%82%e3%82%8a%e3%81%8c%e3%81%a8%e3%81%86%e3%81%94%e3%81%96%e3%81%84%e3%81%be%e3%81%97%e3%81%9f/' );
          exit;
          }else{
          	wp_redirect( 'http://theimpossibleco.com/thank-you' );
          	exit;
          }


		

		exit;
	}

	/*if ( is_checkout() && ! empty( $wp->query_vars['order-pay'] ) ) {
          $orderpay = $wp->query_vars['order-pay'];
         $key = $_GET['key'];
         $url = $orderpay.'/?key='.$key;
       
         wp_redirect($url);
         exit;
          	
         
	}*/
}


function my_text_strings( $translated_text, $text, $domain ) {
switch ( $translated_text ) {
case 'View basket' :
$translated_text = __( 'View Cart', 'woocommerce' );
break;
}
return $translated_text;
}
add_filter( 'gettext', 'my_text_strings', 20, 3 );

/////////////////////////////////////////////////////////////
add_filter( 'wc_order_statuses', 'wc_renaming_order_status' );
function wc_renaming_order_status( $order_statuses ) {
    foreach ( $order_statuses as $key => $status ) {
        if ( 'wc-processing' === $key ) 
            $order_statuses['wc-processing'] = _x( 'Completed', 'Order status', 'woocommerce' );
    }
    return $order_statuses;
}
////////////////////////////////////////

function new_orders_columns( $columns = array() ) {

    // Hide the columns
    if( isset($columns['order-total']) ) {
        unset( $columns['order-actions'] );
    }

    // Add new columns
    /*$columns['order-number'] = __( 'Reserva', 'Text Domain' );
    $columns['reservation-date'] = __( 'Para el día', 'Text Domain' );
    $columns['reservation-people'] = __( 'Seréis', 'Text Domain' );
    $columns['order-status'] = __( 'Estado de la reserva', 'Text Domain' );
    $columns['order-actions'] = __( '&nbsp;', 'Text Domain' );*/

    return $columns;
}
add_filter( 'woocommerce_account_orders_columns', 'new_orders_columns' );
////////////////////////
add_action( 'pre_get_posts', 'wpse223576_search_woocommerce_only' );

function wpse223576_search_woocommerce_only( $query ) {
  if( ! is_admin() && is_search() && $query->is_main_query() ) {
    $query->set( 'post_type', 'product' );
  }
}
//////////////////////////////////////////////////////////
///////////////////////////////
/*add_filter( 'woocommerce_package_rates', 'binary_carpenter_weight_based_shipping_tiers', 10, 2 );
   
function binary_carpenter_weight_based_shipping_tiers( $rates, $package ) {
     
    if ( WC()->cart->cart_contents_weight <= .10 ) {
      
    foreach($rates as $key => $value)
    {
      if ($value->cost != 5.95)
        unset($rates[$key]);
        
    }
       
    } elseif ( WC()->cart->cart_contents_weight <= .15 ) {
       
    foreach($rates as $key => $value)
    {
      if ($value->cost != 6.45)
        unset($rates[$key]);
        
    }
       
    } elseif ( WC()->cart->cart_contents_weight <= .20 ) {
       
    foreach($rates as $key => $value)
    {
      if ($value->cost != 7.25)
        unset($rates[$key]);
        
    }
       
    } elseif ( WC()->cart->cart_contents_weight <= .30 ) {
       
    foreach($rates as $key => $value)
    {
      if ($value->cost != 8.95)
        unset($rates[$key]);
        
    }
       
    } elseif ( WC()->cart->cart_contents_weight <= .50 ) {
       
    foreach($rates as $key => $value)
    {
      if ($value->cost != 11.45)
        unset($rates[$key]);
        
    }
       
    } elseif ( WC()->cart->cart_contents_weight <= 1 ) {
       
    foreach($rates as $key => $value)
    {
      if ($value->cost != 18.95)
        unset($rates[$key]);
        
    }
       
    } elseif ( WC()->cart->cart_contents_weight <= 1.25 ) {
       
    foreach($rates as $key => $value)
    {
      if ($value->cost != 19.95)
        unset($rates[$key]);
        
    }
       
    } elseif ( WC()->cart->cart_contents_weight <= 2 ) {
       
    foreach($rates as $key => $value)
    {
      if ($value->cost != 24.95)
        unset($rates[$key]);
        
    }
       
    }



    else {
       
        foreach($rates as $key => $value)
    {
      if ($value->cost != 30)
        unset($rates[$key]);
        
    }
       
  
   
  return $rates;
   
}*/